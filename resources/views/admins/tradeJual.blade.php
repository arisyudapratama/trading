@extends('layouts.admin')

@section('content')

<form action="{{ route('tradeJual', $trades->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- <fieldset disabled> -->
    <div class="form-group">
        <label for="kode_saham">Kode Saham</label>
        <input type="text" class="form-control" name="kode_saham" id="kode_saham" value="{{ $trades->kode_saham }}" disabled>
    </div>
    <div class="form-group">
        <label for="lot">Jumlah LOT</label>
        <input type="number" class="form-control" name="lot" id="lot" value="{{ $trades->lot }}" disabled>
    </div>
    <div class="form-group">
        <label for="harga_jual">Harga Jual</label>
        <input type="number" class="form-control" name="harga_jual" id="harga_jual" required>
    </div>
    <!-- <div class="form-row"> -->
    <div class="form-group">
        <label for="tgl_jual">Tanggal Jual</label>
        <input type="date" class="form-control" name="tgl_jual" id="tgl_jual" required>
    </div>
    <!-- </div> -->
    <button type="submit" class="btn btn-danger">Jual</button>
    <!-- </fieldset> -->
</form>

@endsection