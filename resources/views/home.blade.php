@extends('layouts.app')

@section('content')
@include('modal.tambah_user_modal')
@include('modal.tambah_present_modal')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Admin</strong> Dashboard</h1>

    <div class="row">
        <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Calendar</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="chart">
                            <div id="datetimepicker-dashboard"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Presensi</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th class="d-none d-xl-table-cell">Waktu</th>
                            <th class="d-none d-xl-table-cell">Masuk</th>
                            <th class="d-none d-xl-table-cell">Pulang</th>
                            <th class="d-none d-md-table-cell">Lokasi (Latitude, Longitude)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($presensis as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td class="d-none d-xl-table-cell">{{$item->tanggal}}</td>
                            <td class="d-none d-xl-table-cell">{{$item->masuk}}</td>
                            <td><span class="badge bg-success">{{$item->pulang}}</span></td>
                            <td class="d-none d-md-table-cell">{{$item->latitude}}, {{$item->longitude}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 20px; font-size: 20px; text-align: center;"><span>Tidak ditemukan data</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Daftar User</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah User
                    </button>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th class="d-none d-xl-table-cell">Email</th>
                            <th class="d-none d-xl-table-cell">Jumlah Absen<small>(tahun)</small></th>
                            <th class="d-none d-xl-table-cell">Tanggal Lahir</th>
                            <th class="d-none d-md-table-cell">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td class="d-none d-xl-table-cell">{{$item->tanggal}}</td>
                            <td class="d-none d-xl-table-cell">{{$item->masuk}}</td>
                            <td><span class="badge bg-success">{{$item->pulang}}</span></td>
                            <td class="d-none d-md-table-cell">{{$item->latitude}}, {{$item->longitude}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 20px; font-size: 20px; text-align: center;">
                                <span>Tidak ditemukan data user</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $users->links() }} <!-- Menampilkan tombol paginasi -->
            </div>
        </div>
    </div>
</div>
@endsection
