@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Form Presence</div>

                <div class="card-body">
                    <form method="POST"  action="{{ route('presence_store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="bulan_id" class="form-control" required>
                                    <option></option>
                                @foreach ($bulan as $item)
                                    <option value="{{$item->id}}"> {{$item->nama_bulan}}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="form-group mt-2">
                            <label>Presence</label>
                            <input type="number" class="form-control" name="presence" required>

                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<script type="text/javascript" class="init">


$(document).ready(function () {
	var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
});

</script>

@endsection



