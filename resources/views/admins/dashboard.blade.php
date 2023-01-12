@extends('layouts.admin')

@section('content')

<form action="{{ route('tradingStyleStore') }}" method="post">
    @csrf
    <!-- <fieldset disabled> -->
    <input type="number" class="form-control d-none" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
    <!-- <input type="number" class="form-control" name="user_id" id="user_id" value=2 disabled> -->

    <div class="form-group">
        <label for="modal">Modal (Rp)</label>
        <input type="number" class="form-control" name="modal" id="modal" placeholder="1.000.000">
    </div>
    <div class="form-group">
        <label for="resiko">Resiko per Transaksi (%)</label>
        <input type="number" class="form-control" name="resiko" id="resiko" placeholder="4">
    </div>
    <div class="form-group">
        <label for="rasio">Risk Reward Ratio</label>
        <input type="number" class="form-control" name="rasio" id="rasio" placeholder="2">
    </div>
    <!-- <div class="form-row"> -->
    <div class="form-group">
        <label for="cutLos">Cut Los (CL) %</label>
        <input type="number" class="form-control" name="cutlos" id="cutLos" placeholder="2">
    </div>
    <!-- </div> -->
    <button type="submit" class="btn btn-primary">Submit</button>
    <!-- </fieldset> -->
</form>

@endsection