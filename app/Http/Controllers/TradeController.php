<?php

namespace App\Http\Controllers;

use App\Models\Materai;
use App\Models\Trade;
use App\Models\TradingStyle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TradeController extends Controller
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
        $user = Auth::id();
        $users = User::find($user);
        $trades = User::find($user)->trade->where('status', 'running');
        return view('admins.tradeAktif', compact('trades', 'users'));
    }

    public function selesai()
    {
        $user = Auth::id();
        $users = User::find($user);
        $trades = User::find($user)->trade->where('status', 'selesai');
        return view('admins.tradeSelesai', compact('trades', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.tradeCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Beli saham
    public function store(Request $request)
    {
        // Fee broker        
        $user = Auth::id();
        $fee = User::find($user)->TradingStyle;
        // End Fee broker

        $Trade = new Trade;
        $Trade->user_id = $user;
        $Trade->trade_id = $user;
        $Trade->kode_saham = Str::upper($request->kode_saham);
        $this->lot = $Trade->lot = $request->lot;
        $beli = $Trade->harga_beli = $request->harga_beli;
        $this->tgl_beli = $Trade->tanggal_beli = $request->tgl_beli;
        $this->nominal_beli = $Trade->nominal_beli = ($this->lot * $beli * 100);
        $fee_b = $Trade->fee_beli = ($this->nominal_beli * ($fee->fee_broker_beli / 100)); //0.0015 default phintraco
        $Trade->net_beli = ($this->nominal_beli + $fee_b);
        $Trade->status = 'running';
        $Trade->save();
        // return redirect('trade/aktif')->with(['status' => 'Data Berhasil Ditambahkan']);
        return $this->materaiBuy();
    }

    // Inialisasi awal
    public function materaiBuy()
    {
        $this->user = Auth::id();
        $getMaterai = User::find($this->user)->materai;

        // Jika databse kosong langsusng isi        
        if ($getMaterai->count() == 0) {
            $dbMaterai = new Materai;
            $dbMaterai->user_id = $this->user;
            $dbMaterai->tanggal = $this->tgl_beli;
            $dbMaterai->lot = $this->lot;
            $transaksi = $dbMaterai->transaksi = $this->nominal_beli;
            if ($transaksi >= 10000000) {
                $dbMaterai->materai = 10000;
            } else {
                $dbMaterai->materai = 0;
            }
            $dbMaterai->save();
            return redirect('trade/aktif')->with(['status' => 'Data Berhasil Ditambahkan']);
        } else {
            $this->materaiBuy2();
            return redirect('trade/aktif')->with(['status' => 'Data Berhasil Ditambahkan']);
        }
    }

    // Tahap 2
    public function materaiBuy2()
    {
        // echo '<pre>';
        $getMaterai = User::find($this->user)->materai->where('tanggal', $this->tgl_beli);
        $modal = User::find($this->user)->TradingStyle;

        $id = [];
        $statusMaterai = [];
        foreach ($getMaterai as $materai) {
            $id[] = ($materai->id);
            $statusMaterai[] = $materai->materai;
        }

        if (empty($id)) {
            $dbMaterai = new Materai;
            $dbMaterai->user_id = $this->user;
            $dbMaterai->tanggal = $this->tgl_beli;
            $dbMaterai->lot = $this->lot;
            $transaksi = $dbMaterai->transaksi = $this->nominal_beli;
            if ($transaksi >= 10000000) {
                $dbMaterai->materai = 10000;
                // Update modal (dikurangi materai)                
                $modal->modal += -10000;
                $modal->save();
            } else {
                $dbMaterai->materai = 0;
            }
            $dbMaterai->save();
        } else {
            $dbMaterai = Materai::find($id[0]);
            $dbMaterai->user_id = $this->user;
            $dbMaterai->tanggal = $this->tgl_beli;
            $dbMaterai->lot += $this->lot;
            $transaksi = $dbMaterai->transaksi += $this->nominal_beli;
            if ($transaksi >= 10000000 && $statusMaterai[0] == 0) {
                $dbMaterai->materai = 10000;
                // Update modal (dikurangi materai)                
                $modal->modal += -10000;
                $modal->save();
            }
            $dbMaterai->save();
        }
    }

    public function debug()
    {
        $user = Auth::id();
        $modal = User::find($user)->TradingStyle;
        $modal->modal += -10000;
        $modal->save();
        echo "<pre>";
        // print_r($trades->fee_bro);
        // print_r($tradingStyle->modal);
        print_r($modal->modal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trade  $trade
     * @return \Illuminate\Http\Response
     */
    public function show($trade)
    {
        $trades = Trade::findOrFail($trade);
        return view('admins.tradeJual', compact('trades'));

        // echo "<pre>";
        // print_r($trades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trade  $trade
     * @return \Illuminate\Http\Response
     */
    public function edit(Trade $trade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trade  $trade
     * @return \Illuminate\Http\Response
     */
    public function jual(Request $request, $trade)
    {
        $this->user = Auth::id();
        $data = User::find($this->user);

        // Fee broker        
        $fee_broker = User::find($this->user)->TradingStyle;
        // End Fee broker

        $jual = Trade::find($trade);
        $h_jual = $jual->harga_jual = $request->harga_jual;
        $this->lot = $jual->lot;
        $this->tgl_jual = $jual->tanggal_jual = $request->tgl_jual;
        $this->n_jual = $jual->nominal_jual = ($h_jual * $this->lot * 100);

        // Gain / Loss
        $this->gls = $jual->gain_loss_persen = round((($h_jual - $jual->harga_beli) / $jual->harga_beli) * 100, 2);
        $this->gln = $jual->gain_loss_nominal = ($this->n_jual - $jual->nominal_beli);

        // Jangka Waktu
        $diff = date_diff(date_create($jual->tanggal_beli), date_create($this->tgl_jual));
        $jual->jangka_waktu = $diff->format('%a');

        // Net jual
        $net_jual = $jual->net_jual = $this->n_jual - ($this->n_jual * ($fee_broker->fee_broker_jual / 100)); //default 0.0025

        // Net profit
        $this->net_ofit = $jual->net_profit = ($net_jual - $jual->net_beli);

        // Fee
        $fee_j = $jual->fee_jual = ($this->n_jual * ($fee_broker->fee_broker_jual / 100));
        $fee = $jual->fee = ($jual->fee_beli + $fee_j);
        $jual->status = 'selesai';
        $jual->save();

        // Update modal        
        $data2 = $data->TradingStyle->id;
        $tradingStyle = TradingStyle::find($data2);
        $tradingStyle->modal += $this->gln - $fee;
        $tradingStyle->save();

        $this->materaiSell();
        return redirect('trade/selesai')->with(['status' => 'Data Berhasil Terjual']);
    }

    public function materaiSell()
    {
        // echo '<pre>';
        $getMaterai = User::find($this->user)->materai->where('tanggal', $this->tgl_jual);
        $modal = User::find($this->user)->TradingStyle;

        $id = [];
        $statusMaterai = [];
        foreach ($getMaterai as $materai) {
            $id[] = ($materai->id);
            $statusMaterai[] = $materai->materai;
        }

        if (empty($id)) {
            $dbMaterai = new Materai;
            $dbMaterai->user_id = $this->user;
            $dbMaterai->tanggal = $this->tgl_jual;
            $dbMaterai->lot += $this->lot;
            $transaksi = $dbMaterai->transaksi += $this->n_jual;
            $dbMaterai->gain_loss_persen += $this->gls;
            $dbMaterai->gain_loss_nominal += $this->gln;
            $dbMaterai->net_profit += $this->net_ofit;
            if ($transaksi >= 10000000) {
                $dbMaterai->materai = 10000;
                // Update modal (dikurangi materai)                
                $modal->modal += -10000;
                $modal->save();
            } else {
                $dbMaterai->materai = 0;
            }
            $dbMaterai->save();
        } else {
            $dbMaterai = Materai::find($id[0]);
            $dbMaterai->user_id = $this->user;
            $dbMaterai->tanggal = $this->tgl_jual;
            $dbMaterai->lot += $this->lot;
            $transaksi = $dbMaterai->transaksi += $this->n_jual;
            $dbMaterai->gain_loss_persen += $this->gls;
            $dbMaterai->gain_loss_nominal += $this->gln;
            $dbMaterai->net_profit += $this->net_ofit;
            if ($transaksi >= 10000000 && $statusMaterai[0] == 0) {
                $dbMaterai->materai = 10000;
                // Update modal (dikurangi materai)                
                $modal->modal += -10000;
                $modal->save();
            }
            $dbMaterai->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trade  $trade
     * @return \Illuminate\Http\Response
     */
    public function destroy($trade)
    {
        // $trades = Trade::findOrFail($trade);
        // print_r($trade);
        // $trades->delete();
        // $trade->delete();

        Trade::where('id', $trade)->delete();
        return redirect('trade/aktif')->with(['status' => 'Data Berhasil Dihapus']);
    }
}
