@extends('layouts.main')

@section('title', 'Página Principal')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
<div class="container mt-4">
    
  <!-- Seção de Resultados da Busca -->
@if(request('search'))
    <div class="search-results-section">
        <h2>
            <ion-icon name="search-outline"></ion-icon>
            Resultados da busca por: <strong>"{{ request('search') }}"</strong>
            <span class="results-badge">{{ $recipes->count() }} {{ $recipes->count() == 1 ? 'receita' : 'receitas' }}</span>
        </h2>
        
        @if($recipes->count() > 0)
            <div class="row g-4">
                @foreach($recipes as $recipe)
                    <div class="col-lg-4 col-md-6">
                        <div class="card search-result-card">
                            @if($recipe->image)
                                <img src="/img/recipes/{{ $recipe->image }}" 
                                     class="card-img-top" 
                                     alt="{{ $recipe->title }}">
                            @else
                                <div class="search-result-placeholder">
                                    <ion-icon name="restaurant-outline"></ion-icon>
                                </div>
                            @endif
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $recipe->title }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <ion-icon name="pricetag-outline"></ion-icon>
                                        {{ $recipe->category->name ?? 'Sem categoria' }}
                                    </small>
                                </p>
                                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary">
                                    <ion-icon name="eye-outline"></ion-icon>
                                    Ver Receita
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                <ion-icon name="alert-circle-outline"></ion-icon>
                <div>
                    <p>Nenhuma receita encontrada com o termo <strong>"{{ request('search') }}"</strong></p>
                    <p class="mb-0" style="font-size: 14px; color: #6c757d;">Tente usar outras palavras-chave ou navegue pelas categorias abaixo.</p>
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                        Voltar para home
                    </a>
                </div>
            </div>
        @endif
    </div>
@else
    <!-- Conteúdo normal da home -->

    @if($destaques->count() > 0)
    <div id="bannerCarousel" class="carousel slide mb-5 shadow-sm" data-bs-ride="carousel" style="border-radius: 15px; overflow: hidden;">
        <div class="carousel-indicators">
            @foreach($destaques as $index => $recipe)
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        
        <div class="carousel-inner">
            @foreach($destaques as $index => $recipe)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="4000">
                    <a href="{{ route('recipes.show', $recipe->id) }}">
                        <div class="position-relative">
                           <div class="carousel-banner-bg" style="background-image: url('{{ asset('img/recipes/' . $recipe->image) }}');"></div>
                            
                            <div class="carousel-caption d-none d-md-block text-start" style="left: 5%; bottom: 10%; background: rgba(0,0,0,0.5); padding: 15px; border-radius: 10px; max-width: 50%;">
                                <span class="badge mb-2" style="background-color: #e57373;">Sugestão do Dia</span>
                                <h3 class="fw-bold text-white mb-0">{{ $recipe->title }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
    @endif

    <h5 class="section-title">Receitas mais buscadas</h5>
<div class="d-flex justify-content-between mb-5 text-center flex-wrap gap-3">
    @foreach($categorias as $cat)
        @php
            $slug = Str::slug($cat->name);
        @endphp
        <a href="#{{ $slug }}" class="category-link text-decoration-none">
            <div class="category-item">
                <div class="category-circle">
                    @if($cat->image)
                        <img src="{{ asset('img/categorias/' . $cat->image) }}" 
                             alt="{{ $cat->name }}"
                             class="category-image">
                    @else
                        <div class="category-placeholder">
                            <ion-icon name="restaurant-outline"></ion-icon>
                        </div>
                    @endif
                </div>
                <span class="category-name">{{ $cat->name }}</span>
            </div>
        </a>
    @endforeach
</div>

    <div class="recipe-section mb-5">
        <h5 class="section-title">Últimas Receitas</h5>
        <div class="row g-3">
            @foreach($ultimas as $recipe)
                <div class="col-md-2 col-6">
                    <div class="card mini-recipe-card">
                        <div class="card-img-top recipe-thumb">
                            @if($recipe->image)
                                <img src="{{ asset('img/recipes/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            @else
                                <div class="placeholder-thumb" style="background: #eee; height: 100%; border-radius: 10px;"></div>
                            @endif
                        </div>
                        <div class="card-body p-2 text-center">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none text-dark">
                                <p class="card-text m-0 text-truncate">{{ $recipe->title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="almoco" class="recipe-section mb-5" style="scroll-margin-top: 90px;">
        <h5 class="section-title">Receitas para o almoço</h5>
        <div class="row g-3">
            @foreach($almoco as $recipe)
                <div class="col-md-2 col-6">
                    <div class="card mini-recipe-card">
                        <div class="card-img-top recipe-thumb">
                            @if($recipe->image)
                                <img src="{{ asset('img/recipes/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            @else
                                <div class="placeholder-thumb" style="background: #eee; height: 100%; border-radius: 10px;"></div>
                            @endif
                        </div>
                        <div class="card-body p-2 text-center">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none text-dark">
                                <p class="card-text m-0 text-truncate">{{ $recipe->title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="comida-estrangeira" class="recipe-section mb-5" style="scroll-margin-top: 90px;">
        <h5 class="section-title">Comidas Estrangeiras</h5>
        <div class="row g-3">
            @foreach($ComidaEstrangeira as $recipe)
                <div class="col-md-2 col-6">
                    <div class="card mini-recipe-card">
                        <div class="card-img-top recipe-thumb">
                            @if($recipe->image)
                                <img src="{{ asset('img/recipes/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            @else
                                <div class="placeholder-thumb" style="background: #eee; height: 100%; border-radius: 10px;"></div>
                            @endif
                        </div>
                        <div class="card-body p-2 text-center">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none text-dark">
                                <p class="card-text m-0 text-truncate">{{ $recipe->title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="massas" class="recipe-section mb-5" style="scroll-margin-top: 90px;">
        <h5 class="section-title">Massas</h5>
        <div class="row g-3">
            @foreach($Massas as $recipe)
                <div class="col-md-2 col-6">
                    <div class="card mini-recipe-card"> 
                        <div class="card-img-top recipe-thumb">
                            @if($recipe->image)
                                <img src="{{ asset('img/recipes/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            @else
                                <div class="placeholder-thumb" style="background: #eee; height: 100%; border-radius: 10px;"></div>
                            @endif
                        </div>
                        <div class="card-body p-2 text-center">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none text-dark">
                                <p class="card-text m-0 text-truncate">{{ $recipe->title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="dietas-restritivas" class="recipe-section mb-5" style="scroll-margin-top: 90px;">
        <h5 class="section-title">Dietas Restritivas</h5>
        <div class="row g-3">
            @foreach($DietasRestritivas as $recipe)
                <div class="col-md-2 col-6">
                    <div class="card mini-recipe-card"> 
                        <div class="card-img-top recipe-thumb">
                            @if($recipe->image)
                                <img src="{{ asset('img/recipes/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            @else
                                <div class="placeholder-thumb" style="background: #eee; height: 100%; border-radius: 10px;"></div>
                            @endif
                        </div>
                        <div class="card-body p-2 text-center">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none text-dark">
                                <p class="card-text m-0 text-truncate">{{ $recipe->title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="doces" class="recipe-section mb-5" style="scroll-margin-top: 90px;">
        <h5 class="section-title">Doces</h5>
        <div class="row g-3">
            @foreach($Doces as $recipe)
                <div class="col-md-2 col-6">
                    <div class="card mini-recipe-card"> 
                        <div class="card-img-top recipe-thumb">
                            @if($recipe->image)
                                <img src="{{ asset('img/recipes/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            @else
                                <div class="placeholder-thumb" style="background: #eee; height: 100%; border-radius: 10px;"></div>
                            @endif
                        </div>
                        <div class="card-body p-2 text-center">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none text-dark">
                                <p class="card-text m-0 text-truncate">{{ $recipe->title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="salgados" class="recipe-section mb-5" style="scroll-margin-top: 90px;">
        <h5 class="section-title">Salgados</h5>
        <div class="row g-3">
            @foreach($Salgados as $recipe)
                <div class="col-md-2 col-6">
                    <div class="card mini-recipe-card"> 
                        <div class="card-img-top recipe-thumb">
                            @if($recipe->image)
                                <img src="{{ asset('img/recipes/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            @else
                                <div class="placeholder-thumb" style="background: #eee; height: 100%; border-radius: 10px;"></div>
                            @endif
                        </div>
                        <div class="card-body p-2 text-center">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none text-dark">
                                <p class="card-text m-0 text-truncate">{{ $recipe->title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection