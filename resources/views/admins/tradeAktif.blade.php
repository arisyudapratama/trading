@extends('admins.trade')
@section('content-transaksi')
@section('count-aktif', $users->trade->where('status', 'running')->count())
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
            <td class="text-warning">{{ $trade->status }}</td>
            <td>
                <a href="{{ route('tradeShow', $trade->id) }}">
                    <button type="button" class="btn btn-danger">Jual</button>
                </a>
                <!-- <button type="button" class="btn btn-danger ml-auto" data-id="{{ $trade->id }}"
                    onclick="jualSaham(event.target)" data-toggle="modal" data-target="#jualModal">
                    Jual
                </button> -->
                <a href="{{ route('tradeDel', $trade->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-warning">Hapus</button>
                </a>
                <!-- <form method="post" action="{{ route('tradeDel', $trade->id) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-warning">Hapus</button>
                </form> -->
            </td>


        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="jualModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jualModalLabel">JUDUL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Jual</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-trans')
<script>
    $(document).ready(function() {
        $("li:nth-child(1) > .nav-link").addClass("active");
    });
</script>
@endsection