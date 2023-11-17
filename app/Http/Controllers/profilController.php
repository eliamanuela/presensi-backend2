<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profilController extends Controller
{
    public function profil_index(){
        $user = Auth::user();
        return view("profil", compact([
            'user',
        ]));
    }
}
