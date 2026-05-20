
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Nossas Receitas</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="register-container">
        <!-- Painel Esquerdo -->
        <div class="left-panel">
            <h1>Seja Bem vindo</h1>
            <h2>Nossas<br>Receitas</h2>
        </div>

        <!-- Painel Direito - Formulário -->
        <div class="right-panel">
            <h2 class="form-title">Faça Seu Cadastro:</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nome -->
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus
                    >
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required
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

                <!-- Confirmar Senha -->
                <div class="form-group">
                    <label for="password_confirmation">Confirme sua Senha:</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        required
                    >
                </div>

                <!-- Botão Submit -->
                <button type="submit" class="btn-submit">Entrar</button>

                <!-- Link para Login -->
                <div class="login-link">
                    Já tem uma conta? <a href="{{ route('login') }}">Faça login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
