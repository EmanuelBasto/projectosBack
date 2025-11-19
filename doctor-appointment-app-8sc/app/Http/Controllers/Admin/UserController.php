<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validación mínima
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Crear usuario correctamente
        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Alerta
        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Usuario creado exitosamente',
            'text'  => 'El usuario ha sido creado correctamente.',
        ]);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $user->update([
        'name' => $request->name,
    ]);

    session()->flash('swal', [
        'icon'  => 'success',
        'title' => 'Usuario actualizado',
        'text'  => 'El usuario fue actualizado exitosamente.',
    ]);

    return redirect()->route('admin.users.index');
}
 

    public function destroy(User $user)
    {
        if ($user->id <= 1) {
            session()->flash('swal', [
                'icon'  => 'error',
                'title' => 'Error',
                'text'  => 'No se puede eliminar este usuario.',
            ]);
            return redirect()->route('admin.users.index');
        }

        $user->delete();

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Usuario eliminado',
            'text'  => 'El usuario fue eliminado correctamente.',
        ]);

        return redirect()->route('admin.users.index');
    }
}

