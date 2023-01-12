@extends('layouts.admin')

@section('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('title', 'Portofolio')
@section('content')
<div class="container-fluid d-flex">
    <button type="button" class="btn btn-lg btn-outline-success ml-auto bg-gradient-success text-light"
        data-toggle="modal" data-target="#exampleModal">
        Beli Saham
    </button>
</div>
<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tradeIndex') }}">Running <span
                class="badge bg-warning">@yield('count-aktif')</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tradeSelesai') }}">Selesai</a>
    </li>
</ul>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Beli Saham</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tradeStore') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <!-- <fieldset disabled> -->
                    <div class="form-group">
                        <label for="kode_saham">Kode Saham</label>
                        <input type="text" class="form-control" name="kode_saham" id="kode_saham" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" id="harga_beli" required>
                    </div>
                    <div class="form-group">
                        <label for="lot">LOT</label>
                        <input type="number" class="form-control" name="lot" id="lot" required>
                    </div>
                    <!-- <div class="form-row"> -->
                    <div class="form-group">
                        <label for="tgl_beli">Tanggal Beli</label>
                        <input type="date" class="form-control" name="tgl_beli" id="tgl_beli" required>
                    </div>
                    <!-- </div> -->
                    <!-- </fieldset> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Beli</button>
                </div>
            </form>
        </div>
    </div>
</div>
@yield('content-transaksi')
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "scrollX": true
        });

        $("ul > li > .nav-item,.active3").addClass("active");
    });
</script>
@yield('js-trans')
@endsection