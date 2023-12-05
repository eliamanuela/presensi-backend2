@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

   

    <table id="example" class="display nowrap" style="width:100%">
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
        <tfoot>
            <tr>
                <th>Nama</th>
                <th class="d-none d-xl-table-cell">Waktu</th>
                <th class="d-none d-xl-table-cell">Masuk</th>
                <th class="d-none d-xl-table-cell">Pulang</th>
                <th class="d-none d-md-table-cell">Lokasi (Latitude, Longitude)</th>
            </tr>
        </tfoot>
    </table>




    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
