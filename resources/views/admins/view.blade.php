@extends('layouts.admin')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css">
@endsection

@section('title', 'Dashboard')
@section('content')
<div class="row">
    <!-- Mocal -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Equity</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ 'Rp. '.number_format(@$users->TradingStyle->modal, 0, ',', '.') }}</div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        <i class="fa-solid fa-rupiah-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Trade Aktif -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Running Trade</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users->trade->where('status', 'running')->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                        <i class="fa-solid fa-chart-simple fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Trade Aktif -->

    <!-- Trade Selesai -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Trade Done</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users->trade->where('status', 'selesai')->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                        <i class="fa-solid fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Trade Selesai -->
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $("ul > li > .nav-item,.active1").addClass("active");
    });
</script>
@endsection