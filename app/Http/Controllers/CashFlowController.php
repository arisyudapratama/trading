<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashFlowController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function deposit()
    {
        return view('admins.depositView');
    }

    public function withdrawal()
    {
        return view('admins.withdrawalView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::id();
        $deposit = new CashFlow;
        $deposit->user_id = $user;
        $deposit->tanggal = $request->tanggal;
        $dp = $deposit->cashflow = $request->deposit;
        $deposit->keterangan = 'Deposit';
        $deposit->save();

        $modal = User::find($user)->TradingStyle;
        $modal->modal += $dp;
        $modal->save();

        return redirect('home')->with(['status' => 'Deposit berhasil']);
    }

    public function wd(Request $request)
    {
        $user = Auth::id();
        $modal = User::find($user)->TradingStyle;

        $withdrawal = new CashFlow;
        $withdrawal->user_id = $user;
        $withdrawal->tanggal = $request->tanggal;
        $dp = $withdrawal->cashflow = $request->withdrawal;
        $withdrawal->keterangan = 'Withdrawal';
        $cek = $modal->modal - $dp;
        $modal->modal -= $dp;

        if ($cek < 0) {
            return redirect('withdrawal')->with(['status' => 'Withdrawal yang anda ajukan melebihi dari Equity yang tersedia']);
        } else {
            $withdrawal->save();
            $modal->save();
            return redirect('home')->with(['status' => 'Deposit berhasil']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function show(CashFlow $cashFlow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function edit(CashFlow $cashFlow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashFlow $cashFlow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashFlow $cashFlow)
    {
        //
    }
}
