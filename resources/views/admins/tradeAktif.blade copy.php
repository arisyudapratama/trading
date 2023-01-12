@extends('layouts.admin')

@section('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('title', 'Transaksi Aktif')
@section('content')
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal&nbspBeli</th>
            <th>Kode&nbspSaham</th>
            <th>LOT</th>
            <th>Harga&nbspBeli</th>
            <th>Nominal&nbspBeli</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- {{ $i = 1 }} -->
        @foreach($trades as $trade)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $trade->tanggal_beli }}</td>
            <td>{{ $trade->kode_saham }}</td>
            <td>{{ $trade->lot }}</td>
            <td>{{ 'Rp.'.number_format($trade->harga_beli, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->nominal_beli, 0, ',', '.') }}</td>
            <!-- <td>10%</td> -->
            <!-- <td>Rp.2.000.000</td> -->
            <td class="text-warning">{{ $trade->status }}</td>
            <td>
                <a href="{{ route('tradeShow', $trade->id) }}">
                    <button type="button" class="btn btn-danger">Jual</button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <!-- <tfoot>
        <tr>
            <th>#</th>
            <th>Tanggal&nbspBeli</th>
            <th>Kode&nbspSaham</th>
            <th>LOT</th>
            <th>Harga&nbspBeli</th>
            <th>Nominal&nbspBeli</th>            
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot> -->
</table>


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true
        });

        // $(".nav-link.data").addClass("active");
        // $(".nav-link.sub-data1").addClass("active");
    });
</script>
@endsection