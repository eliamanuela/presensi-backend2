<?php

namespace App\Http\Controllers;

use App\Models\bulanModel;
use App\Models\presence;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class presenceController extends Controller
{
    public function presence_create() {
        $bulan = bulanModel::all();
        $user = User::all();
        return view('presence.create', compact([
            'bulan',
            'user'
        ]));
    }
    public function presence_store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'bulan_id' => 'required|exists:bulan,id',
        'presence' => 'required|numeric',
    ]);

    presence::create([
        'user_id'=>$request->user_id,
        'bulan_id' => $request->bulan_id,
        'presence' => $request->presence,
    ]);

    session()->flash('success', 'Data berhasil disimpan.');

    return redirect()->route('home');
}

}
