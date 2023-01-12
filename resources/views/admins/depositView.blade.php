@extends('layouts.admin')

@section('title', 'Deposit')
@section('content')
<form action="{{ route('cf_deposit_post') }}" method="post">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @csrf
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="deposit">Deposit (Rp)</label>
                        <input type="number" class="form-control" name="deposit" id="deposit" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Deposit</button>
        </div>
    </div>
</form>
@endsection