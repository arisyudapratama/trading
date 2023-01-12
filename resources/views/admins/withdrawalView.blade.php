@extends('layouts.admin')

@section('title', 'Withdrawal')
@section('content')
<form action="{{ route('cf_withdrawal_post') }}" method="post">
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
                        <label for="withdrawal">Withdrawal (Rp)</label>
                        <input type="number" class="form-control" name="withdrawal" id="withdrawal" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Withdrawal</button>
        </div>
    </div>
</form>

@if (Session('status'))
<script>
    $(document).ready(function() {
        $('#resetModal').modal('show');
    });
</script>
@endif

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resetModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Info</h5>
                <button type="button" class="close" onclick="closeModal()" data-dismiss=" modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="alert alert alert-danger">
                    <h1><i class="fa-solid fa-circle-exclamation"></i></h1>
                    {{ session('status') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    function closeModal() {
        $('#resetModal').modal('hide');
    }
</script>
@endsection