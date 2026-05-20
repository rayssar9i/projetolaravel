<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nossas Receitas</title>
   
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <!-- Painel Esquerdo -->
        <div class="left-panel">
            <h1>Seja Bem vindo</h1>
            <h2>Nossas<br>Receitas</h2>
        </div>

        <!-- Painel Direito - Formulário -->
        <div class="right-panel">
            <h2 class="form-title">Ja tem conta?<br>Faça login:</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                    >
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Senha -->
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                    >
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botão Submit -->
                <button type="submit" class="btn-submit">Entrar</button>

                <!-- Link para Cadastro -->
                <div class="register-link">
                    Ainda não tem conta? Faça seu <a href="{{ route('register') }}">Cadastro</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
