<!-- Modal -->
<div class="modal fade" id="exampleModalCalender" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Target Kehadiran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('presence_store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Bulan</label>
                        <input type="month" class="form-control" name="bulan_karyawan" value="{{old('bulan_karyawan')}}">
                    </div>
                    <div class="form-group mt-2">
                        <label>Presence</label>
                        <input type="number" class="form-control" name="presence" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>User</label>
                        <select name="user_id" class="form-control" required>
                            <option></option>
                            @foreach ($users as $data)
                                <option value="{{ $data->id }}"> {{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
