<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        if(!Auth::check() || Auth::user()->role !== "admin"){
//            return redirect('/');
//        }

        $users = User::all();

        return view('users.welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        if(!Auth::check() || Auth::user()->role !== "admin"){
//            return redirect('/');
//        }

        return view('users.createuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        if(!Auth::check() || Auth::user()->role !== "admin"){
            return redirect('/');
        }

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.welcome')->with('error', 'Gönderilen parametreyle Uyuşan Bir Form Nesnesi bulunamadı');
        }

        return view('users.edituser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        if (!Auth::check() || Auth::user()->role !== "admin") {
            return redirect('/');
        }

        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:8'],
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('users')->with("Success", "Kullanıcı başarıyla güncellendi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!Auth::check() || Auth::user()->role !== "admin"){
            return redirect('/');
        }

        $user = User::findOrFail($id);

        $user->delete($user);

        return redirect()->route('users.welcome');
    }
}
