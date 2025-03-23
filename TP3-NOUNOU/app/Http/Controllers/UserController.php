<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'img' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'role' => 'required|integer|exists:roles,id',
        ]);

        $data = $request->except('password', 'img');
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('users', 'public');
        }

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:255',
            'role' => 'int'
        ]);


        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('img')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->img) {
                Storage::delete('public/users/' . $user->img);
            }
            $path = $request->file('img')->store('users', 'public');
            $user->img = $path;
        }

        $user->description = $request->description;
        if ($request->has('role')) {
            $user->role = $request->role;
        }

        $user->save();


        return back()->with('alert', ["type" => 'success', "msg" => 'Profils mis à jours avec succés']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        //
        $User->delete();
        return redirect()->route('users.index')->with('alert', ["type" => 'success', "msg" => 'Profils supprimé']);
    }
}
