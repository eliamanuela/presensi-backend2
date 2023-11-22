
@extends('layouts.app')
@section('content')
    <div class="cover">
        <div class="profile-container">
            <!-- resources/views/profile/show.blade.php -->
            <div class="profile-card">
                @if($user->photo)
                    <img src="{{ asset('storage/photos/'.$user->photo) }}" class="img-thumbnail mx-auto d-block">
                @else
                    <img src="{{ url('https://i.pinimg.com/originals/0f/bb/ac/0fbbac26dcbd2670d1f9442949edb45e.jpg') }}" class="img-thumbnail mx-auto d-block">
                @endif
            </div>
            <div class="info-card">
                <div class="card-header">
                    <h2>Informasi Profil</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="column">
                            <div class="form-group">
                                <label for="nip">NIP:</label>
                                <input type="text" id="nip" value="123456789" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" id="nama" value="John Doe" readonly>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" value="johndoe@example.com" readonly>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <input type="text" id="jenis_kelamin" value="Laki-laki" readonly>
                            </div>
                        </div>

                        <div class="column">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat, Tanggal Lahir:</label>
                                <input type="text" id="tempat_lahir" value="Jakarta, 01 Januari 1990" readonly>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_masuk">Tanggal Masuk:</label>
                                <input type="text" id="tanggal_masuk" value="01 Januari 2020" readonly>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" id="alamat" value="Jalan Contoh No. 123" readonly>
                            </div>

                            <div class="form-group">
                                <label for="no_handphone">No Handphone:</label>
                                <input type="text" id="no_handphone" value="081234567890" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
