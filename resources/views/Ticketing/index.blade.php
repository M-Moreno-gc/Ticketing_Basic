<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing System</title>
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
            border-bottom: 1px solid rgba(255, 192, 203, 0.3);
            box-shadow: 0 4px 20px rgba(255, 182, 193, 0.05);
        }
        .navbar-brand {
            color: #ff7eb3 !important;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .navbar-text {
            color: #6c5b7b !important;
            font-weight: 500;
        }
        .btn-logout {
            color: #ff7eb3;
            border: 1px solid #ff7eb3;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background: #ff7eb3;
            color: white;
            box-shadow: 0 4px 12px rgba(255, 126, 179, 0.3);
        }
        .admin-header { 
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%); 
            color: white; 
        }
        .bg-primary { 
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 99%, #fecfef 100%) !important; 
            color: #555 !important; 
        }
        .banner-card {
            border-radius: 24px;
            box-shadow: 0 12px 30px rgba(255, 154, 158, 0.15);
        }
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
        
        .btn-primary {
            background: linear-gradient(to right, #c471ed, #f64f59);
            border: none;
            border-radius: 50px;
            font-weight: 600;
        }
        .form-control {
            border-radius: 50px;
            border: 1px solid rgba(255, 182, 193, 0.4);
            padding-left: 15px;
            background: rgba(255, 255, 255, 0.9);
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(255, 126, 179, 0.15);
            border-color: #ff7eb3;
        }
        .input-group {
            box-shadow: 0 4px 15px rgba(0,0,0,0.03) !important;
            border-radius: 50px;
        }
        .card {
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 15px 35px rgba(200, 150, 170, 0.1);
        }
        .table {
            border-collapse: separate;
            border-spacing: 0 12px;
            margin-top: -12px;
        }
        .table-light th {
            background-color: transparent !important;
            border-bottom: none;
            color: #a18cd1;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            padding-bottom: 0;
        }
        .table tbody tr {
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            border-radius: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .table tbody tr:hover {
            transform: scale(1.005) translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 154, 158, 0.1);
        }
        .table tbody td {
            border: none !important;
            padding: 1.2rem 1rem;
            vertical-align: middle;
        }
        .table tbody td:first-child { border-top-left-radius: 20px; border-bottom-left-radius: 20px; }
        .table tbody td:last-child { border-top-right-radius: 20px; border-bottom-right-radius: 20px; }


        .badge { padding: 0.5em 0.8em; font-weight: 600; letter-spacing: 0.3px; }
        .bg-danger { background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%) !important; color: white !important; border: none; }
        .bg-warning { background: linear-gradient(135deg, #f6d365 0%, #fda085 100%) !important; color: white !important; border: none; }
        .bg-info { background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%) !important; color: white !important; border: none; }
        .bg-secondary { background: #e2d1f9 !important; color: #6b5b95 !important; border: none; }
        .bg-light { background: #fdf3f5 !important; color: #ff7eb3 !important; border-color: #fbe4e8 !important; }


        .btn-sm { border-radius: 12px; padding: 6px 12px; font-weight: 500; }
        .btn-outline-primary { color: #c471ed; border-color: #c471ed; }
        .btn-outline-primary:hover { background: #c471ed; color: white; border-color: #c471ed; }
        .btn-outline-secondary { color: #a18cd1; border-color: #e2d1f9; background: #faf5ff; }
        .btn-outline-secondary:hover { background: #a18cd1; color: white; }


        .ticket-cerrado { opacity: 0.65; filter: grayscale(20%); }
        .ticket-cerrado:hover { opacity: 0.85; filter: grayscale(0%); }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light glass-nav sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#"><i class="bi bi-ticket-perforated-fill me-2 text-gradient"></i>Ticketing</a>
            <div class="d-flex align-items-center">
                <span class="navbar-text me-3">Hola, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-logout btn-sm px-3">Salir</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container-fluid px-4 mt-4">
        <div class="{{ Auth::user()->isAdmin() ? 'admin-header' : 'bg-primary text-white' }} py-4 mb-4 banner-card">
            <div class="row align-items-center px-4">
                <div class="col">
                    <h2 class="mb-1 fw-bold" style="letter-spacing: -0.5px;">
                        🌸 Mis Tickets
                    </h2>
                </div>
                <div class="col-auto">
                    @if(Auth::user()->isAdmin())
                        <span class="badge bg-danger p-2 px-3 shadow-sm" style="border-radius: 12px;">MODO ADMIN</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4 pb-4">
        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
            <h4 class="fw-bold mb-0" style="color: #6c5b7b;">Lista de Registros</h4>
            
            <div class="d-flex gap-3">
                <a href="/Ticketing/nuevo" class="btn btn-success">
                    <i class="bi bi-plus-lg me-1"></i> Nuevo Ticket
                </a>
                
                @if(Auth::user()->isAdmin())
                    <div class="input-group">
                        <input type="number" id="Ticketid" placeholder="ID Ticket" class="form-control border-end-0" style="width: 120px;">
                        <button type="button" onclick="redEditar()" class="btn btn-primary px-3">
                            <i class="bi bi-pencil-square"></i> Editar
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="card border-0 p-3">
            <div class="table-responsive px-2 pb-2">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Categoría</th>
                            <th>Solicitante</th>
                            <th>Prioridad</th>
                            <th>Comentario</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Ticketing as $Ticket)
                            @php
                                $Isclosed = \App\Models\Close::where('ticket_id', $Ticket->id)->exists();
                            @endphp
                        <tr class="{{ $Isclosed ? 'ticket-cerrado' : '' }}">
                                <td class="ps-4 fw-bold" style="color: #6c5b7b;">
                                    #{{ $Ticket->id }}
                                    @if($Isclosed)
                                        <br><span class="badge bg-secondary mt-1" style="font-size: 0.65rem;">Cerrado</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $Isclosed ? 'bg-secondary' : 'bg-light text-dark' }} border">
                                        {{ $Ticket->categoria }}
                                    </span>
                                </td>
                                <td class="fw-medium text-secondary">
                                    <div class="d-flex align-items-center">
                                        {{ $Ticket->user->name }}
                                    </div>
                                </td>
                                <td>
                                    @php
                                        if($Isclosed) {
                                            $prioClass = 'bg-secondary';
                                        } else {
                                            $prioClass = match($Ticket->prioridad) {
                                                'Alta'  => 'bg-danger',
                                                'Media' => 'bg-warning text-dark',
                                                'Baja'  => 'bg-info text-dark',
                                                default => 'bg-secondary'
                                            };
                                        }
                                    @endphp
                                    <span class="badge rounded-pill shadow-sm {{ $prioClass }}">{{ $Ticket->prioridad }}</span>
                                </td>
                                <td class="small text-muted" style="max-width: 250px;">{{ Str::limit($Ticket->comentario, 40) }}</td>
                                <td class="text-end pe-4">
                                    @if(Auth::user()->isAdmin())
                                        <a href="/Ticketing/{{ $Ticket->id }}" class="btn btn-sm {{ $Isclosed ? 'btn-secondary' : 'btn-outline-primary' }}">
                                            <i class="bi {{ $Isclosed ? 'bi-eye' : 'bi-chat-left-text' }}"></i> 
                                            {{ $Isclosed ? 'Ver' : 'Responder' }}
                                        </a>
                                    @else
                                        <a href="/Ticketing/{{ $Ticket->id }}" class="btn btn-sm {{ $Isclosed ? 'btn-secondary' : 'btn-outline-secondary' }}">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted fw-medium" style="background: transparent; box-shadow: none;">
                                    <i class="bi bi-inbox-fill d-block mb-2" style="font-size: 2rem; color: #fbc2eb;"></i>
                                    No se encontraron tickets registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function redEditar() {
            const ticketId = document.getElementById('Ticketid').value;
            
            if (!ticketId) {
                alert("Por favor, introduce un ID de ticket para editar.");
                return;
            }
            const rows = document.querySelectorAll('table tbody tr');
            let isClosed = false;

            for (let row of rows) {
                const idCell = row.querySelector('td:first-child');
                
                if (idCell) {
                    const match = idCell.textContent.match(/#(\d+)/);
                    
                    if (match && match[1] === ticketId) {
                        if (row.classList.contains('ticket-cerrado')) {
                            isClosed = true;
                        }
                        break;
                    }
                }
            }

            if (isClosed) {
                alert("Este ticket ya se encuentra cerrado y no puede ser editado.");
            } else {
                window.location.href = `/Ticketing/${ticketId}/edit`;
            }
        }
    </script>
</body>
</html>

```