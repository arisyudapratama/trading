<?php

namespace App\Http\Controllers;

use App\Models\TradingStyle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TradingStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        // $tradingStyles = TradingStyle::all();
        // return view('admins.view', compact('tradingStyles'));
        // $users = User::all();
        $user = Auth::id();
        $users = User::find($user);
        // $users = $users->trade->count();
        // echo "<pre>";
        // print_r($users);
        return view('admins.view', compact('users'));
    }

    public function profile()
    {
        // $tradingStyles = TradingStyle::all();
        // return view('admins.view', compact('tradingStyles'));
        // $users = User::all();
        $user = Auth::id();
        $users = User::find($user);
        // echo "<pre>";
        // print_r($users);
        return view('admins.profile', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admins.dashboard');
        return redirect('style/0');

        // DEBUG
        // $user = Auth::id();
        // print_r($user);
        // $data = User::find($user);
        // $data2 = $data->TradingStyle->id;
        // echo "<pre>";
        // print_r($data2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tradingStyle = new TradingStyle;
        // $tradingStyle->user_id = Auth::user()->id;
        $tradingStyle->user_id = $request->user_id;
        $modal = $tradingStyle->modal = $request->modal;
        $resiko = $tradingStyle->resiko_per_transaksi = $request->resiko;
        $tradingStyle->resiko_per_transaksi_persentase = ($resiko / $modal) * 100;
        $rasio = $tradingStyle->risk_reward_ratio = $request->rasio;
        $cutLos = $tradingStyle->cut_los = $request->cutlos;
        $tradingStyle->target_profit = $rasio * $cutLos;
        // $tradingStyle->maksimal_pembelian = ($resiko / $cutLos) * 100;
        $tradingStyle->fee_broker_beli = $request->fee_broker_beli;
        $tradingStyle->fee_broker_jual = $request->fee_broker_jual;
        $tradingStyle->save();

        // $tradingStyle = $request->all();
        // print_r($tradingStyle);
        // return redirect()->route('tradingStyleIndex')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TradingStyle  $tradingStyle
     * @return \Illuminate\Http\Response
     */
    public function show(TradingStyle $tradingStyle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TradingStyle  $tradingStyle
     * @return \Illuminate\Http\Response
     */
    public function edit(TradingStyle $tradingStyle)
    {
        $user = Auth::id();
        $users = User::find($user);
        return view('admins.update', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TradingStyle  $tradingStyle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TradingStyle $tradingStyle)
    {
        $user = Auth::id();
        $data = User::find($user);
        $data2 = $data->TradingStyle->id;
        $tradingStyle = TradingStyle::find($data2);
        $modal = $tradingStyle->modal = $request->modal;
        $resiko = $tradingStyle->resiko_per_transaksi = $request->resiko;
        $tradingStyle->resiko_per_transaksi_persentase = round(($resiko / $modal) * 100, 2);
        $rasio = $tradingStyle->risk_reward_ratio = $request->rasio;
        $cutLos = $tradingStyle->cut_los = round($request->cutlos, 2);
        $tradingStyle->target_profit = $rasio * $cutLos;
        // $tradingStyle->maksimal_pembelian = ($resiko / $cutLos) * 100;        
        $tradingStyle->save();
        return redirect('profile')->with(['status' => 'Data Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TradingStyle  $tradingStyle
     * @return \Illuminate\Http\Response
     */
    public function destroy(TradingStyle $tradingStyle)
    {
        //
    }
}
