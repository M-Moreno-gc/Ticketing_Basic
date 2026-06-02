<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Registro | Ticketing System</title>
    <style>

        body {
            background-color: #fcf9f9;
            background-image: radial-gradient(circle at 50% 0%, #fff0f5 0%, #fcf9f9 100%);
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #4a4a4a;
        }
        .login-container { 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            padding: 2rem 0;
        }
        .icon-gradient {
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0px 4px 6px rgba(251, 194, 235, 0.3));
        }
        h2.fw-bold {
            color: #6c5b7b;
            letter-spacing: -0.5px;
        }
        .card {
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 15px 35px rgba(200, 150, 170, 0.1);
            border: none;
        }


        .form-label {
            color: #6c5b7b;
            font-weight: 500;
            margin-left: 10px;
        }
        .input-group {
            border-radius: 50px;
            transition: all 0.2s ease;
        }
        .input-group:focus-within {
            box-shadow: 0 0 0 4px rgba(255, 126, 179, 0.15);
        }
        
        .input-group-text {
            border-top-left-radius: 50px !important;
            border-bottom-left-radius: 50px !important;
            border: 1px solid rgba(255, 182, 193, 0.4);
            border-right: none;
            background: rgba(255, 255, 255, 0.9);
            padding-left: 20px;
            color: #ff7eb3 !important;
        }
        .form-control {
            border-top-right-radius: 50px !important;
            border-bottom-right-radius: 50px !important;
            border: 1px solid rgba(255, 182, 193, 0.4);
            border-left: none;
            background: rgba(255, 255, 255, 0.9);
            padding-left: 5px;
            color: #555;
        }
        .form-control:focus {
            box-shadow: none !important;
            border-color: #ff7eb3;
        }
        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: #ff7eb3;
            background: #ffffff;
        }

        .btn-submit {
            background: linear-gradient(to right, #c471ed, #f64f59);
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: 600;
            color: white;
            box-shadow: 0 6px 15px rgba(246, 79, 89, 0.25);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(246, 79, 89, 0.35);
            color: white;
        }
        .link-pink {
            color: #ff7eb3;
            transition: color 0.2s;
        }
        .link-pink:hover {
            color: #c471ed;
        }

        .alert-danger {
            background-color: #fff0f5;
            border: 1px solid #fbe4e8;
            color: #d63384;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">
            
            <div class="text-center mb-4">
                <div class="display-3 mb-2">
                    <i class="bi bi-person-heart icon-gradient"></i>
                </div>
                <h2 class="fw-bold">Crear Cuenta</h2>
                <p class="text-muted fw-medium">Regístrate para abrir tus propios tickets</p>
            </div>

            <div class="card">
                <div class="card-body p-4 p-sm-5">
                    
                    <!-- Mostrar mensajes de error de validación -->
                    @if ($errors->any())
                        <div class="alert alert-danger small shadow-sm">
                            <ul class="mb-0 fw-medium">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('Ticketing.register') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="form-label">Nombre completo</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Tu nombre" required autofocus>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-heart-fill"></i>
                                </span>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required>
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                            </div>
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-5">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-shield-check"></i>
                                </span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="••••••••" required>
                            </div>
                        </div>

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-submit btn-lg">
                                Registrarme
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted fw-medium">
                    ¿Ya tienes cuenta? 
                    <a href="{{ route('Ticketing.login') }}" class="text-decoration-none fw-bold link-pink">Inicia Sesión</a>
                </p>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>