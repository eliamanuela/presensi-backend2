<?php

namespace App\Http\Controllers;

use App\Models\bulanModel;
use App\Models\presence;
use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $presensis = Presensi::select('presensis.*', 'users.name')
            ->join('users', 'presensis.user_id', '=', 'users.id')
            ->get();
        foreach ($presensis as $item) {
            $datetime = Carbon::parse($item->tanggal)->locale('id');

            $datetime->settings(['formatFunction' => 'translatedFormat']);

            $item->tanggal = $datetime->format('l, j F Y');
        }
        $kehadiran = Presence::query()
            ->select('table_present.presence', 'users.name', 'table_present.bulan_karyawan')
            ->join('users', 'table_present.user_id', '=', 'users.id')
            ->paginate(5);

        $users = User::query()
            ->select('users.*')
            ->selectSub(function ($query) {
                $query->selectRaw('COUNT(*)')
                    ->from('presensis')
                    ->whereColumn('users.id', 'presensis.user_id')
                    ->groupBy('presensis.user_id');
            }, 'total_presensi')
            ->where('role', 'user')
            ->leftJoin('presensis', 'users.id', '=', 'presensis.user_id')
            ->distinct('users.id')
            ->paginate(5);

        $user = User::query()
            ->select('users.name', 'users.id')
            ->where('role', 'user')
            ->get();

        return view('home', compact([
            'presensis',
            'users',
            'user',
            'kehadiran',
            // 'bulan',
        ]));
    }
}
