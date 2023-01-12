@extends('layouts.admin')

@section('title', 'Edit Fee Broker')
@section('content')
<form action="{{ route('setting_update') }}" method="post">
    @csrf
    @method('PUT')
    <!-- <fieldset disabled> -->
    <!-- <div class="form-group">
        <label for="modal">Modal (Rp)</label>
        <input type="number" class="form-control" name="modal" id="modal" value="{{ old('modal', $users->TradingStyle->modal) }}" placeholder="1.000.000" required>
    </div>
    <div class="form-group">
        <label for="resiko">Resiko per Transaksi</label>
        <input type="number" class="form-control" name="resiko" id="resiko" placeholder="4" value="{{ old('modal', $users->TradingStyle->resiko_per_transaksi) }}">
    </div>
    <div class="form-group">
        <label for="rasio">Risk Reward Ratio</label>
        <input type="number" class="form-control" name="rasio" id="rasio" placeholder="2" value="{{ old('modal', $users->TradingStyle->risk_reward_ratio) }}">
    </div>
    <div class="form-group">
        <label for="cutLos">Cut Los (CL) %</label>
        <input type="float" class="form-control" name="cutlos" id="cutLos" placeholder="2" value="{{ old('modal', $users->TradingStyle->cut_los) }}">
    </div> -->
    <div class="form-group">
        <label for="fee_broker_beli">Fee Beli (%)</label>
        <input type="float" class="form-control" name="fee_broker_beli" id="fee_broker_beli" value="{{ old('modal', $users->TradingStyle->fee_broker_beli) }}" required>
        <p class="font-italic font-weight-lighter">Default 0.15</p>
    </div>
    <div class="form-group">
        <label for="fee_broker_jual">Fee Jual (%)</label>
        <input type="float" class="form-control" name="fee_broker_jual" id="fee_broker_jual" value="{{ old('modal', $users->TradingStyle->fee_broker_jual) }}" required>
        <p class="font-italic font-weight-lighter">Default 0.25</p>
    </div>

    <a href="{{ route('show_setting') }}">
        <button type="button" class="btn btn-secondary">Batal</button>
    </a>
    <button type=" submit" class="btn btn-primary">Simpan</button>
    <!-- </fieldset> -->
</form>

@endsection