<?php

namespace App\Http\Controllers;

use App\Models\bulanModel;
use App\Models\presence;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class presenceController extends Controller
{
    public function presence_index() {
        $bulan = bulanModel::all();
        return view('presence.index', compact([
            'bulan'
        ]));
    }
    public function presence_store(Request $request)
{
    $user = Auth::user()->id;
    // Menghitung total data Presensi dengan filter user_id
    $totalPresensi = Presensi::where('user_id', $user)->count();
    // dd($totalPresensi);
    $request->validate([
        'bulan_id' => 'required|exists:bulan,id',
        'presence' => 'required|numeric',
    ]);

    presence::create([
        'user_id'=>$user,
        'bulan_id' => $request->bulan_id,
        'presence' => $request->presence,
        'total_presence' => $totalPresensi
    ]);

    session()->flash('success', 'Data berhasil disimpan.');

    return redirect()->route('home');
}

}
