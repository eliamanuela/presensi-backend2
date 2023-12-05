@extends('layouts.app')
@section('content')
    <style>

    </style>
    <div class="cover">
        <div class="profile-container">
            <!-- resources/views/profile/show.blade.php -->
            <div class="profile-card">
                @if ($user->photo)
                    <img src="{{ asset('storage/photos/' . $user->photo) }}" class="img-thumbnail mx-auto d-block">
                @else
                    <img src="{{ url('https://i.pinimg.com/originals/0f/bb/ac/0fbbac26dcbd2670d1f9442949edb45e.jpg') }}" class="img-thumbnail mx-auto d-block">
                @endif
            </div>
            <div class="info-card">
                <div class="card-header">
                    <h2>Informasi Profil</h2>
                </div>
                <form action="" method="get">
                    <div class="card-body">
                        <div class="row">
                            <div class="column">
                                <div class="form-group">
                                    <label for="nip">NIP:</label>
                                    <input type="text" id="nip" value="123456789">
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" id="nama" value="{{ $user->name }}" >
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" value="{{ $user->email }}" >
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                                    <input type="text" id="jenis_kelamin" value="Laki-laki" >
                                </div>
                            </div>

                            <div class="column">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat, Tanggal Lahir:</label>
                                    <input type="date" id="tempat_lahir" value="Jakarta, 01 Januari 1990">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk:</label>
                                    <input type="date" id="tanggal_masuk" value="01 Januari 2020">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" id="alamat" value="Jalan Contoh No. 123">
                                </div>

                                <div class="form-group">
                                    <label for="no_handphone">No Handphone:</label>
                                    <input type="text" id="no_handphone" value="081234567890">
                                </div>
                            </div>
                            <button type="button" id="editButton" class="btn btn-primary ">Edit Profil</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Status Edit
        var isEditMode = false;

        document.getElementById('editButton').addEventListener('click', function() {
            toggleEditMode();
        });

        function toggleEditMode() {
            var editButton = document.getElementById('editButton');

            if (!isEditMode) {
                enableFormEditing();
                editButton.innerText = 'Simpan Perubahan';
            } else {
                disableFormEditing();
                editButton.innerText = 'Edit Profil';
            }

            isEditMode = !isEditMode;
        }

        function enableFormEditing() {
            document.querySelectorAll('.form-group input').forEach(function(input) {
                input.removeAttribute('readonly');
            });
        }

        function disableFormEditing() {
            document.querySelectorAll('.form-group input').forEach(function(input) {
                input.setAttribute('readonly', true);
            });
        }
    </script>
@endsection
