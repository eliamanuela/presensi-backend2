<?php

namespace App\Http\Controllers;

use App\Models\bulanModel;
use App\Models\presence;
use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function report_index()
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
            ->select('table_present.presence', 'users.name')
            ->join('users', 'table_present.user_id', '=', 'users.id')
            ->paginate(5);


        $users = User::query()
            ->select('users.*')
            ->where('role', 'user')
            ->where('status', 'off')
            ->paginate(5);
        $user = User::query()
            ->select('users.name', 'users.id')
            ->where('role', 'user')
            ->get();
        

        return view('Report.index', compact([
            'presensis',
            'users',
            'user',
            'kehadiran',

        ]));
    }
}
