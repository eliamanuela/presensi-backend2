@extends('layouts.app')

@section('content')
<!-- resources/views/profile/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profil Pengguna</div>

                    <div class="card-body">
                        <img src="{{ asset($user->profile_photo_path) }}" alt="Profile Photo" class="rounded-circle" width="150">
                        <p>Nama: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Alamat: {{ $user->address }}</p>
                        <p>Kontak: {{ $user->contact }}</p>
                        <p>Peran: {{ $user->role }}</p>
                        <p>Tanggal Lahir: {{ $user->birthdate }}</p>
                        <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection
