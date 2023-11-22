<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\presence;
use Illuminate\Http\Request;
use App\Models\Presensi;
use  Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;

date_default_timezone_set("Asia/Jakarta");

class PresensiController extends Controller
{
    function getPresensis()
    {
        $presensi = Presensi::where('user_id', Auth::user()->id)->orderBy('tanggal', 'desc')->get();

        foreach ($presensi as $item) {
            if ($item->tanggal == date('Y-m-d')) {
                $item->is_hari_ini = true;
            } else {
                $item->is_hari_ini = false;
            }

            $datetime = Carbon::parse($item->tanggal)->locale('id');
            $masuk = Carbon::parse($item->masuk)->locale('id');

            // Cek apakah pulang null atau tidak
            if ($item->pulang !== null) {
                $pulang = Carbon::parse($item->pulang)->locale('id');
                $pulang->settings(['formatFunction' => 'translatedFormat']);
                $item->pulang = $pulang->format('H:i');
            } else {
                // Jika pulang null, set nilai pulang menjadi null
                $item->pulang = null;
            }

            $datetime->settings(['formatFunction' => 'translatedFormat']);
            $masuk->settings(['formatFunction' => 'translatedFormat']);
            $item->tanggal = $datetime->format('l, j F Y');
            $item->masuk = $masuk->format('H:i');
        }

        return response()->json([
            'success' => true,
            'data' => $presensi,
            'message' => 'Sukses menampilkan data'
        ]);
    }
    function savePresensi(Request $request)
    {
        $keterangan = "";
        $presensi = Presensi::whereDate('tanggal', '=', date('Y-m-d'))
            ->where('user_id', Auth::user()->id)
            ->first();
        if ($presensi == null) {
            $presensi = Presensi::create([
                'user_id' => Auth::user()->id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'tanggal' => date('Y-m-d'),
                'masuk' => date('H:i:s')
            ]);
        } else {
            $data = [
                'pulang' => date('H:i:s')
            ];

            Presensi::whereDate('tanggal', '=', date('Y-m-d'))->update($data);
        }
        $presensi = Presensi::whereDate('tanggal', '=', date('Y-m-d'))
            ->first();

        return response()->json([
            'success' => true,
            'data' => $presensi,
            'message' => 'Sukses simpan'
        ]);
    }
    public function getTotalPresensis()
    {
        $totalPresensi = Presensi::where('user_id', Auth::user()->id)->count();

        return response()->json([
            'success' => true,
            'total_presensi' => $totalPresensi,
            'message' => 'Total presensi retrieved successfully'
        ]);
    }

    public function saveTotalPresensi(Request $request)
    {
        $client = new Client();
        $yourAuthToken = 'Bearer ' . $request->header('Authorization');

        try {
            // Lakukan permintaan ke URI API
            $response = $client->request('GET', 'http://10.0.2.2:8000/api/get-total-presensi', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $yourAuthToken, // Ganti dengan token otentikasi yang sesuai
                ],
            ]);

            // Periksa kode status respons HTTP
            if ($response->getStatusCode() == 200) {
                // Respons berhasil, baca data JSON
                $totalPresensiData = json_decode($response->getBody(), true);

                // Pastikan Anda telah mendapatkan total_presensi dari respons
                if (isset($totalPresensiData['total_presensi'])) {
                    $totalPresensi = $totalPresensiData['total_presensi'];

                    // Sekarang Anda dapat menggunakan $totalPresensi untuk memperbarui tabel present
                    $present = Presensi::where('user_id', Auth::user()->id)->first();

                    // Perbarui nilai total_presence dalam tabel present
                    $present->total_presence = $totalPresensi;

                    // Simpan perubahan
                    $present->save();

                    return response()->json([
                        'success' => true,
                        'message' => 'Total presensi berhasil diperbarui dalam tabel present'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal mendapatkan total presensi dari respons API'
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengambil data total presensi: Kode status HTTP tidak valid'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data total presensi: ' . $e->getMessage()
            ]);
        }
    }

    public function getTotalPresence(Request $request)
    {
        try {
            // Mengambil total kehadiran
            $totalPresensi = Presensi::where('user_id', Auth::user()->id)->count();

            // Mengambil data user
            $user = Auth::user();

            // Mengambil nama bulan berdasarkan bulan_id
            $presence = presence::where('user_id', Auth::user()->id)->first();
            $bulanModel = $presence->bulanModel; // Buat relasi di model Presence

            $namabulan = $bulanModel ? $bulanModel->nama_bulan : null;

            $target_kehadiran = Presence::where('user_id', Auth::user()->id)->pluck('presence');

            return response()->json([
                'success' => true,
                'total_presensi' => $totalPresensi,
                'user_id' => $user->id,
                'name' => $user->name,
                'nama bulan'    => $namabulan,
                'target kehadiran'  => $target_kehadiran,
                'message' => 'Data di temukan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengambil data total presensi: ' . $e->getMessage()
            ]);
        }
    }
}
