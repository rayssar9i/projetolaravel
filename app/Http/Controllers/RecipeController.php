<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\View\View;

class RecipeController extends Controller
{
  public function index() { 
    return view('recipes.home', [
        'categorias'=> Category::all(),
        'ultimas'=> Recipe::where('status', 'approved')->latest()->take(6)->get(),
        'almoco'=> Recipe::where('category_id', 5)->where('status', 'approved')->take(6)->get(),
        'ComidaEstrangeira'=> Recipe::where('category_id', 4)->where('status', 'approved')->take(6)->get(),
        'Massas'=> Recipe::where('category_id', 3)->where('status', 'approved')->take(6)->get(),
        'DietasRestritivas' => Recipe::where('category_id', 6)->where('status', 'approved')->take(6)->get(),
        'Doces' =>Recipe::where('category_id', 2)->where('status', 'approved')->take(6)->get(), 
        'Salgados' =>Recipe::where('category_id', 1)->where('status', 'approved')->take(6)->get(),
        'destaques' => Recipe::where('status', 'approved')->whereNotNull('image')->inRandomOrder()->take(6)->get()    
    ]);
}

    public function solicitacoes(){
        // Busca todas as receitas pendentes
        $recipes = Recipe::where('status', 'pending')->latest()->paginate(10); 
        return view('recipes.solicitacoes', compact('recipes'));
    }

    public function create(){
        $categorias = Category::all();
        return view('recipes.create', compact('categorias'));
    }
    
    public function store(Request $request)
    {
        //  VALIDAÇÃO DOS DADOS
        $request->validate([
            'title' => 'required|string|max:100',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra' => 'nullable|string',
        ]);

        $recipe = new Recipe; 
        $recipe->title = $request->title;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;
        $recipe->extra_info = $request->extra;
        $recipe->category_id = $request->category_id;
        
        // CORREÇÃO CRÍTICA 1: user_id do usuário logado
        $recipe->user_id = auth()->id();
        
        //CORREÇÃO CRÍTICA 2: Status SEMPRE pending ao criar
        $recipe->status = 'pending';

        // Upload da imagem
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/recipes'), $imageName);
            $recipe->image = $imageName;
        }

        $recipe->save();
        
        //  Redireciona para o perfil com mensagem de sucesso
        return redirect()
            ->route('profile.show')
            ->with('success', 'Receita enviada para aprovação! Aguarde a análise do gerente.');
    }

    /**
     * Mostrar detalhes da receita
     * IMPORTANTE: Apenas receitas aprovadas podem ser vistas publicamente
     */
    public function show($id) {
        $recipe = Recipe::findOrFail($id);
        
        // Se a receita não está aprovada, só o autor ou admin pode ver
        if ($recipe->status !== 'approved') {
            if (!auth()->check() || (auth()->id() !== $recipe->user_id && !auth()->user()->isManager())) {
                abort(403, 'Esta receita ainda não foi aprovada.');
            }
        }
        
        return view('recipes.show', ['recipe' => $recipe]);
    }

    /**
     * Formulário de editar receita
     */
    public function edit($id): View
    {
        $recipe = Recipe::findOrFail($id);
        
        // Verificar se é o dono ou admin
        if ($recipe->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Você não tem permissão para editar esta receita.');
        }
        
        // 🔥 CORREÇÃO: Não permitir editar receitas aprovadas
        if ($recipe->status === 'approved') {
            return redirect()
                ->route('profile.show')
                ->with('error', 'Receitas aprovadas não podem ser editadas. Se precisar fazer alterações, entre em contato com o gerente.');
        }
        
        $categorias = Category::all();
        return view('recipes.edit', compact('recipe', 'categorias'));
    }

    /**
     * Atualizar receita
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $recipe = Recipe::findOrFail($id);
        
        // Verificar permissão
        if ($recipe->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Você não tem permissão para editar esta receita.');
        }
        
        // Não permitir editar receitas aprovadas
        if ($recipe->status === 'approved') {
            return redirect()
                ->route('profile.show')
                ->with('error', 'Receitas aprovadas não podem ser editadas.');
        }

        $request->validate([
            'title' => 'required|string|max:100',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra' => 'nullable|string',
        ]);

        $recipe->title = $request->title;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;
        $recipe->extra_info = $request->extra;
        $recipe->category_id = $request->category_id;
        
        // 🔥 CORREÇÃO CRÍTICA 3: Status volta para PENDING ao atualizar
        $recipe->status = 'pending';
        
        // Limpa motivo de rejeição anterior
        $recipe->rejection_reason = null;

        // Upload da nova imagem (se houver)
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Deletar imagem antiga
            if ($recipe->image) {
                $oldImagePath = public_path('img/recipes/' . $recipe->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            // Upload da nova imagem
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/recipes'), $imageName);
            $recipe->image = $imageName;
        }

        $recipe->save();
        
        return redirect()
            ->route('profile.show')
            ->with('success', 'Receita atualizada e enviada para nova aprovação!');
    }

    /**
     * Deletar receita
     */
    public function destroy($id): RedirectResponse
    {
        $recipe = Recipe::findOrFail($id);
        
        // Verificar se é o dono ou admin
        if ($recipe->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Você não tem permissão para excluir esta receita.');
        }
        
        // Deletar imagem se existir
        if ($recipe->image) {
            $imagePath = public_path('img/recipes/' . $recipe->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $recipe->delete();
        
        return redirect()
            ->route('profile.show')
            ->with('success', 'Receita excluída com sucesso!');
    }
}