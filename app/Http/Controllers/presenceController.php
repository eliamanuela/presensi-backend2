<?php

namespace App\Http\Controllers;

use App\Models\bulanModel;
use App\Models\presence;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class presenceController extends Controller
{

    public function presence_store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'bulan_id' => 'required|exists:bulan,id',
        'presence' => 'required|numeric',
    ]);

    DB::transaction(function () use ($request) {
        Presence::create([
            'user_id' => $request->user_id,
            'bulan_id' => $request->bulan_id,
            'presence' => $request->presence,
        ]);

        $user = User::find($request->user_id);
        $user->update([
            'status' => "on",
        ]);
    });

    session()->flash('success', 'Data berhasil disimpan.');

    return redirect()->route('home');
}

}
