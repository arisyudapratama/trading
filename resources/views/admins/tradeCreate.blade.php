@extends('layouts.admin')

@section('content')

<form action="{{ route('tradeStore') }}" method="post">
    @csrf
    <!-- <fieldset disabled> -->
    <div class="form-group">
        <label for="kode_saham">Kode Saham</label>
        <input type="text" class="form-control" name="kode_saham" id="kode_saham" required>
    </div>
    <div class="form-group">
        <label for="lot">Jumlah LOT</label>
        <input type="number" class="form-control" name="lot" id="lot" required>
    </div>
    <div class="form-group">
        <label for="harga_beli">Harga Beli</label>
        <input type="number" class="form-control" name="harga_beli" id="harga_beli" required>
    </div>
    <!-- <div class="form-row"> -->
    <div class="form-group">
        <label for="tgl_beli">Tanggal Beli</label>
        <input type="date" class="form-control" name="tgl_beli" id="tgl_beli" required>
    </div>
    <!-- </div> -->
    <button type="submit" class="btn btn-success">Beli</button>
    <!-- </fieldset> -->
</form>

@endsection