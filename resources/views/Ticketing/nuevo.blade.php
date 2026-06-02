<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Ticket</title>
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
        .form-control, .form-select {
            border-radius: 50px;
            border: 1px solid rgba(255, 182, 193, 0.4);
            padding-left: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #555;
        }
        textarea.form-control {
            border-radius: 20px !important;
            padding: 15px;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 4px rgba(255, 126, 179, 0.15);
            border-color: #ff7eb3;
            outline: none;
        }
        
        .form-label {
            color: #6c5b7b;
        }

        .btn-info {
            background: linear-gradient(to right, #c471ed, #f64f59);
            border: none;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 6px 15px rgba(246, 79, 89, 0.25);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(246, 79, 89, 0.35);
            color: white !important;
        }
        .btn-light {
            border-radius: 50px;
            background: white;
            color: #6c5b7b;
            border: 1px solid rgba(255, 182, 193, 0.4) !important;
            font-weight: 500;
        }
        .btn-light:hover {
            background: #fff0f5;
            color: #ff7eb3;
        }
        .btn-secondary {
            background: white;
            color: #a18cd1;
            border: 1px solid #e2d1f9;
            border-radius: 50px;
            padding: 6px 16px;
        }
        .btn-secondary:hover {
            background: #a18cd1;
            color: white;
            border-color: #a18cd1;
        }
        .btn-group {
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border-radius: 50px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 182, 193, 0.3);
        }
        .btn-group .btn {
            font-weight: 600;
            border: none;
            padding: 10px 20px;
        }
        
        /* Baja */
        .btn-outline-success { color: #66a6ff; border-right: 1px solid rgba(255, 182, 193, 0.3); }
        .btn-outline-success:hover { background: #f0f8ff; color: #66a6ff; }
        .btn-check:checked + .btn-outline-success { background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%); color: white; }
        
        /* Media */
        .btn-outline-warning { color: #fda085; border-right: 1px solid rgba(255, 182, 193, 0.3); }
        .btn-outline-warning:hover { background: #fff5eb; color: #fda085; }
        .btn-check:checked + .btn-outline-warning { background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); color: white; }
        
        /* Alta */
        .btn-outline-danger { color: #ff7eb3; }
        .btn-outline-danger:hover { background: #fff0f5; color: #ff7eb3; }
        .btn-check:checked + .btn-outline-danger { background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%); color: white; }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg glass-nav sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#"><i class="bi bi-ticket-perforated-fill me-2"></i>Ticketing</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="mb-4">
                    <a href="/Ticketing" class="btn btn-sm btn-secondary shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> Volver
                    </a>
                </div>

                <div class="card border-0">
                    <div class="card-header bg-transparent py-4 border-bottom-0 text-center">
                        <h4 class="card-title mb-0 fw-bold" style="color: #6c5b7b;">Nuevo Ticket</h4>
                    </div>
                    <div class="card-body p-4 pt-0 px-md-5 pb-5">
                        <form action="/Ticketing" method="POST">

                            <div class="row g-4">
                                <div class="col-md-8">
                                <label for="problema" class="form-label fw-semibold ms-1">Seleccione el Error</label>
                                    <select class="form-select shadow-sm" id="problema" name="problema" required>
                                        <option value="" selected disabled>Seleccione el error...</option>
                                        <option value="1">Mala comunicación</option>
                                        <option value="2">Mal async</option>
                                        <option value="2">Delay de 3 min. al momento de correr el programa</option>
                                        <option value="3">No enciende la pantalla</option>
                                        <option value="3">Pantalla con pixeles muertos</option>
                                        <option value="4">La bombilla no funciona</option>
                                        <option value="4">Los pasantes estan llorando en el ba;o</option>
                                        <option value="1">QA en Linea telefonica</option>
                                        <option value="1">El programador U.U</option> 
                                        <option value="1">Servidor caido</option>
                                    </select>       
                                    
                                </div>
                                
                                <div class="col-md-4" hidden>
                                    <input type="hidden" name="categoria" id="categoria_input">
                                </div>
                                {{-- <div class="col-8" >
                                    <label for="tecnico" class="form-label fw-semibold">Nombre del tecnico en truno</label>
                                    <input class="form-control" type="text" id="tecnico" name="tecnico" rows="1" placeholder="Nombre" required>
                                </div> --}}

                                <div class="col-12">
                                    <label class="form-label fw-semibold d-block ms-1">Prioridad</label>
                                    <div class="btn-group w-100 shadow-sm" role="group">
                                        <input type="radio" class="btn-check" name="prioridad" id="prio-baja" value="Baja">
                                        <label class="btn btn-outline-success" for="prio-baja">Baja</label>

                                        <input type="radio" class="btn-check" name="prioridad" id="prio-media" value="Media" checked>
                                        <label class="btn btn-outline-warning" for="prio-media">Media</label>

                                        <input type="radio" class="btn-check" name="prioridad" id="prio-alta" value="Alta">
                                        <label class="btn btn-outline-danger" for="prio-alta">Alta</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="comentario" class="form-label fw-semibold ms-1">Comentario</label>
                                    <textarea class="form-control shadow-sm" id="comentario" name="comentario" rows="4" placeholder="Describa el problema detalladamente..." required></textarea>
                                </div>

                                <div class="col-md-6" hidden>
                                    <label for="fecha" class="form-label fw-semibold text-muted ms-1">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" value="{{ date('Y-m-d') }}" required >
                                </div>

                                <div class="col-12 mt-5 d-flex justify-content-end gap-3">
                                    <button type="reset" class="btn btn-light px-4" id="btnReset">Limpiar</button>
                                    <button type="submit" class="btn btn-info text-white px-5">
                                        <i class="bi bi-check-circle-fill me-2"></i> Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {   
            const selprob = document.getElementById('problema');
            const selcat = document.getElementById('categoria');

            const SelId = {
                "1": "Soporte",
                "2": "Software",
                "3": "Hardware",
                "4": "Servicio",
            };

            selprob.addEventListener('change', function() {
                const valsel = this.value;
                const categoria_cambio = SelId[valsel];
                
                document.getElementById('categoria_input').value = categoria_cambio;
            
            });

        }); 
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>