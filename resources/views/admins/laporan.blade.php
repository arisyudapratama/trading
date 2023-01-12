@extends('layouts.admin')

@section('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('title', 'Laporan')
@section('content')
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <!-- <th>#</th> -->
            <th>Tanggal</th>
            <th>LOT</th>
            <th>Transaksi</th>
            <th>Gain</th>
            <th>Profit</th>
            <th>Net&nbspProfit</th>
            <th>Materai</th>
        </tr>
    </thead>
    <tbody>
        <!-- {{ $i = 1 }} -->
        @foreach($laporans as $laporan)
        <tr>
            <!-- <td>{{ $i++ }}</td> -->
            <td>{{ $laporan->tanggal }}</td>
            <td>{{ $laporan->lot }}</td>

            <!-- Transaksi -->
            <td>{{ 'Rp.'.number_format($laporan->transaksi, 0, ',', '.') }}</td>

            @if($laporan->gain_loss_persen > 0)
            <td class="bg-gradient-success text-white">{{ number_format($laporan->gain_loss_persen, 2).'%' }}</td>
            @elseif($laporan->gain_loss_persen == 0)
            <td class="bg-gradient-secondary text-white">{{ number_format($laporan->gain_loss_persen, 2).'%' }}</td>
            @else
            <td class="bg-gradient-danger text-white">{{ number_format($laporan->gain_loss_persen, 2).'%' }}</td>
            @endif

            <td>{{ 'Rp.'.number_format($laporan->gain_loss_nominal, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($laporan->net_profit, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($laporan->materai, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true,
            order: [
                [0, 'asc']
            ],

        });

        $("ul > li > .nav-item,.active4").addClass("active");
    });
</script>
@endsection