<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Ticket #{{ $ticket->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>

        body {
            background-color: #fcf9f9;
            background-image: radial-gradient(circle at 50% 0%, #fff0f5 0%, #fcf9f9 100%);
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #4a4a4a;
            min-height: 100vh;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.75) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 192, 203, 0.3) !important;
            box-shadow: 0 4px 20px rgba(255, 182, 193, 0.05);
        }
        .navbar-brand {
            color: #ff7eb3 !important;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .card {
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 15px 35px rgba(200, 150, 170, 0.1);
        }
        .card-header {
            border-bottom: 1px solid rgba(255, 182, 193, 0.2) !important;
        }


        .text-info { color: #6c5b7b !important; }
        .text-dark { color: #4a4a4a !important; }
        .text-primary { color: #ff7eb3 !important; }
        .text-muted { color: #9a8c98 !important; }

      
        .btn-success {
            background: linear-gradient(to right, #ff758c 0%, #ff7eb3 100%);
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 600;
            box-shadow: 0 6px 15px rgba(255, 117, 140, 0.25);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 117, 140, 0.35);
        }

        .btn-info {
            background: linear-gradient(to right, #c471ed, #f64f59);
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 600;
            box-shadow: 0 6px 15px rgba(246, 79, 89, 0.25);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(246, 79, 89, 0.35);
            color: white;
        }

        .btn-secondary {
            background: white;
            color: #a18cd1;
            border: 1px solid #e2d1f9;
            border-radius: 50px;
            padding: 6px 16px;
        }
        .btn-secondary:hover:not(:disabled) {
            background: #a18cd1;
            color: white;
            border-color: #a18cd1;
        }
        .btn-secondary:disabled {
            background: #fdf3f5;
            color: #d1bfae;
            border-color: #fbe4e8;
            opacity: 0.8;
        }


        .badge { padding: 0.5em 0.8em; font-weight: 600; letter-spacing: 0.3px; border-radius: 12px; }
        .bg-danger { background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%) !important; color: white !important; border: none; }
        .bg-warning { background: linear-gradient(135deg, #f6d365 0%, #fda085 100%) !important; color: white !important; border: none; }
        .bg-primary { background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%) !important; color: white !important; border: none; }
        .bg-secondary { background: #e2d1f9 !important; color: #6b5b95 !important; border: none; }

        .comment-avatar {
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%) !important;
            box-shadow: 0 4px 10px rgba(161, 140, 209, 0.3);
        }
        .comment-bubble {
            background: white !important;
            border: 1px solid rgba(255, 182, 193, 0.2);
            border-radius: 20px;
            border-top-left-radius: 4px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.02) !important;
            transition: transform 0.2s ease;
        }
        .comment-bubble:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 154, 158, 0.08) !important;
        }

        .form-control {
            border-radius: 20px;
            border: 1px solid rgba(255, 182, 193, 0.4);
            padding: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #555;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(255, 126, 179, 0.15);
            border-color: #ff7eb3;
            outline: none;
        }
    </style>
</head>
<body>
    @php
        $Isclosed = \App\Models\Close::where('ticket_id', $ticket->id)->exists();
    @endphp

    <nav class="navbar navbar-expand-lg glass-nav sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#"><i class="bi bi-ticket-perforated-fill me-2"></i>Ticketing</a>
        </div>
    </nav>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                
                <div class="mb-4 d-flex justify-content-between align-items-center px-2">
                    <a href="/Ticketing" class="btn btn-sm btn-secondary shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> Volver al Listado
                    </a>

                    @if (!$Isclosed)
                        <form action="{{ route('Ticketing.close', $ticket->id) }}" method="POST" onsubmit="return confirm('¿Estás segura de que deseas cerrar este ticket?');" class="m-0">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="bi bi-check-circle-fill me-1"></i> Cerrar Ticket
                            </button>
                        </form>
                    @else
                        <button class="btn btn-sm btn-secondary fw-bold shadow-sm" disabled>
                            <i class="bi bi-lock-fill me-1"></i> Ticket Cerrado
                        </button>
                    @endif
                </div>

      
                <div class="card border-0 mb-4">
                    <div class="card-header bg-transparent py-4 text-center">
                        <h4 class="card-title mb-0 text-info fw-bold">
                            Detalles > Ticket #{{ $ticket->id }}
                        </h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <div class="row mb-5 g-4">
                            <div class="col-md-4">
                                <p class="text-muted mb-1 fw-medium"><i class="bi bi-exclamation-circle me-1"></i> Problema</p>
                                <h4 class="fw-bold text-dark">{{ $ticket->problema }}</h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-2 fw-medium">Categoría</p>
                                <span class="badge bg-secondary shadow-sm">{{ $ticket->categoria }}</span>
                            </div>
                            <div class="col-md-3">
                                <p class="text-muted mb-2 fw-medium">Prioridad</p>
                                @php
                                    $prioClass = match($ticket->prioridad) {
                                        'Alta'  => 'bg-danger',
                                        'Media' => 'bg-warning text-dark',
                                        'Baja'  => 'bg-primary',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $prioClass }} shadow-sm">{{ $ticket->prioridad }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <p class="text-muted mb-1 fw-medium"><i class="bi bi-person me-1"></i> Solicitante</p>
                                <p class="fw-semibold text-dark fs-5">{{ $ticket->user->name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-1 fw-medium"><i class="bi bi-tag-fill"></i> Categoría</p>
                                <p class="fw-semibold text-dark fs-5">{{ $ticket->categoria }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-1 fw-medium"><i class="bi bi-calendar3 me-1"></i> Fecha de creación</p>
                                <p class="fw-semibold text-dark fs-5">{{ $ticket->fecha }}</p>
                            </div>
                        </div>

                        <div class="border-top pt-4 mt-2">
                            <p class="text-muted mb-3 fw-medium"><i class="bi bi-card-text me-1"></i> Descripción del problema:</p>
                            <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.5); border: 1px solid rgba(255, 182, 193, 0.3);">
                                <p class="fs-5 mb-0" style="color: #555;">{{ $ticket->comentario }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Comentarios / Respuestas -->
                <div class="card border-0">
                    <div class="card-header bg-transparent py-4 text-center">
                        <h4 class="card-title mb-0 text-info fw-bold">
                            <i class="bi bi-chat-heart-fill me-2" style="color: #ff7eb3;"></i>Comentarios y Respuestas
                        </h4>
                    </div>
                    <div class="card-body p-4 p-md-5 pt-3">
                        
                        <!-- Lista de Comentarios -->
                        <div class="comment-list mb-4">
                            @forelse($ticket->comments as $comment)
                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="comment-avatar text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                            <i class="bi bi-person-fill fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="comment-bubble p-4">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-bold text-primary">{{ $comment->user->name }}</span>
                                                <span class="text-muted fw-medium" style="font-size: 0.8rem; background: #fdf3f5; padding: 4px 10px; border-radius: 20px;">
                                                    <i class="bi bi-clock me-1"></i>{{ $comment->created_at->format('d/m/Y H:i') }}
                                                </span>
                                            </div>
                                            <p class="mb-0 text-dark" style="line-height: 1.6;">{{ $comment->comentario }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5 text-muted">
                                    <i class="bi bi-chat-square-heart d-block mb-3" style="font-size: 2.5rem; color: #fbc2eb;"></i>
                                    <span class="fw-medium">No hay respuestas aún. ¡Sé el primero en comentar!</span>
                                </div>
                            @endforelse
                        </div>

                        <!-- Formulario de Respuesta -->
                        @if(Auth::check())
                            <div class="border-top pt-4 mt-2">
                                <h6 class="fw-bold mb-3 text-info ms-1">Escribe una respuesta</h6>
                                <form action="/Ticketing/{{ $ticket->id }}/comment" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <textarea name="comentario" class="form-control shadow-sm" rows="3" placeholder="..." required></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-info text-white">
                                            <i class="bi bi-send-fill me-2"></i> Enviar Respuesta
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif

                    </div>
                </div> <!-- Fin card comentarios -->

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>