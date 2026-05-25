<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeApprovalController;
use Illuminate\Support\Facades\Route;

// ============================================
// ROTAS PÚBLICAS
// ============================================

Route::get('/', function () {
       if (auth()->check()) {
           return redirect()->route('home');
       }
       return redirect()->route('login');
   });

Route::get('/home', [RecipeController::class, 'index'])->name('home');

// ============================================
// ROTAS AUTENTICADAS
// ============================================

Route::middleware(['auth', 'verified'])->group(function () {
    
    /*Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); rota que veio com autenticação do breeze laravel*/

    // ============================================
    // PERFIL
    // ============================================
    
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/receitas', [ProfileController::class, 'myRecipes'])->name('profile.recipes');
    
    // ============================================
    // RECEITAS - ORDEM CORRETA!
    // ============================================
    
    //  CREATE (específica)
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    
    //  EDIT (específica com parâmetro)
    Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    
    // DELETE (genéricas mas com método específico)
    Route::patch('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});

    //SHOW (pública, genérica) - DEVE SER A ÚLTIMA!
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

// ============================================
// GERENCIAMENTO (ADMIN/MANAGER)
// ============================================

Route::middleware(['auth', 'manager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/recipes', [RecipeApprovalController::class, 'index'])->name('recipes.index');
    Route::get('/recipes/{recipe}', [RecipeApprovalController::class, 'show'])->name('recipes.show');
    Route::patch('/recipes/{recipe}/approve', [RecipeApprovalController::class, 'approve'])->name('recipes.approve');
    Route::patch('/recipes/{recipe}/reject', [RecipeApprovalController::class, 'reject'])->name('recipes.reject');
});

Route::middleware(['auth', 'manager'])->get('/solicitacoes', [RecipeApprovalController::class, 'index'])->name('solicitacoes');

require __DIR__.'/auth.php';