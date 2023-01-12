@extends('layouts.admin')

@section('title', 'Fee Broker')
@section('content')
<div class="dropdown-divider"></div>
<form action="{{ route('setting_edit') }}">
    <fieldset disabled>
        @csrf

        <!-- <div class="form-group">
            <label for="modal">Modal (Rp)</label>
            <input type="number" class="form-control" name="modal" id="modal" value="{{ @$users->TradingStyle->modal }}">
        </div> -->
        <!-- <div class="form-group">
            <label for="resiko">Resiko per Transaksi (Rp)</label>
            <input type="number" class="form-control" name="resiko" id="resiko" value="{{ @$users->TradingStyle->resiko_per_transaksi }}">
        </div>
        <div class="form-group">
            <label for="resiko">Resiko per Transaksi %</label>
            <input type="number" class="form-control" name="resiko" id="resiko" value="{{ @$users->TradingStyle->	resiko_per_transaksi_persentase }}">
        </div>
        <div class="form-group">
            <label for="rasio">Risk Reward Ratio</label>
            <input type="number" class="form-control" name="rasio" id="rasio" value="{{ @$users->TradingStyle->risk_reward_ratio }}">
        </div>
        <div class="form-group">
            <label for="cutLos">Cut Los (CL) %</label>
            <input type="number" class="form-control" name="cutlos" id="cutLos" value="{{ @$users->TradingStyle->cut_los }}">
        </div> -->
        <div class="form-group">
            <label for="cutLos">Fee Beli (%)</label>
            <input type="number" class="form-control" name="cutlos" id="cutLos" value="{{ @$users->TradingStyle->fee_broker_beli }}">
        </div>
        <div class="form-group">
            <label for="cutLos">Fee Jual (%)</label>
            <input type="number" class="form-control" name="cutlos" id="cutLos" value="{{ @$users->TradingStyle->fee_broker_jual }}">
        </div>


    </fieldset>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection