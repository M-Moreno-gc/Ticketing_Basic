<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Close;

class TicketController extends Controller
{
    public function index()
    {
        // Si es admin ve todos, si es usuario solo ve los suyos
        if (Auth::user()->isAdmin()) {
            $Ticketing = Ticket::with('user')->get();
        } else {
            $Ticketing = Ticket::where('user_id', Auth::id())->get();
        }
        return view('Ticketing.index', compact('Ticketing')); 
    }

    public function create()
    {
        return view('Ticketing.nuevo');
    }

    public function showRegister()
    {
        return view('Ticketing.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('Ticketing.login')->with('success', 'Usuario registrado con éxito. Ya puedes iniciar sesión.');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['fecha'] = now();

        Ticket::create($data);
        return redirect()->route('Ticketing.index')->with('success', 'Ticket creado con éxito');
    }

    

    public function show($id)
    {
        $ticket = Ticket::with(['user', 'comments.user'])->findOrFail($id);
        return view('Ticketing.show', compact('ticket'));
    }

    public function storeComment(Request $request, $id)
    {

        Comment::create([
            'ticket_id' => $id,
            'user_id' => Auth::id(),
            'comentario' => $request->comentario
        ]);

        return redirect()->back()->with('success', 'Respuesta enviada');
    }

    public function login(Request $request) {
        if ($request->isMethod("get")) {
            return view('Ticketing.login');
        }
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->route('Ticketing.index');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('Ticketing.login');
    }
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        if (Auth::user()->role !== 'admin' && $ticket->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este ticket.');
        }
    
        return view('Ticketing.edit', compact('ticket'));
    }
    
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
    
        $data = $request->validate([
            'problema'   => 'required|string',
            'categoria'  => 'required|string',
            'prioridad'  => 'required|in:Baja,Media,Alta',
            'comentario' => 'required|string',
            'tecnico'    => 'nullable|string',
        ]);
    
        $ticket->update($data);
    
        return redirect()->route('Ticketing.index')->with('success', 'Ticket actualizado correctamente.');
    }


    //cerrar
    public function close($id){

    $ticket = Ticket::findOrFail($id);

    if (Auth::user()->role !== 'admin' && $ticket->user_id !== Auth::id()) {
        abort(403, 'No tienes permiso para cerrar este ticket.');
    }

    Close::create([
            'ticket_id' => $ticket->id,
            'user_id'   => $ticket->user_id,
            'problema'  => $ticket->problema,
            'categoria' => $ticket->categoria,
            'prioridad' => $ticket->prioridad,
            'fecha'     => now(),
        ]);

    return redirect()->route('Ticketing.index')->with('success', 'Ticket cerrado correctamente.');

    }
}