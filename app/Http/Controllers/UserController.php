<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $users = User::where('role', 'user')->get();
        return view('user', [
            'users' =>$users
        ]);
    }

    function create()
    {
        return view('create-user');
    }

    function store(Request $request)
    {
        $status = "off";
        $role = "user";
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'status' => $status,
            'password' => Hash::make($request->password),
        ]);


        // return redirect()->route('user');
        session()->flash('success', 'Data berhasil disimpan.');

        return redirect()->route('home');
    }
}
