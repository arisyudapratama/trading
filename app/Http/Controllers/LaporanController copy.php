<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
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
        $trades = User::find($user)->trade->where('status', 'selesai');
        // $trades = User::find($user)->trade;
        // return view('admins.laporan', compact('trades'));

        // echo '<pre>';
        // print_r($trades);

        $tanggal_beli = [];
        $tanggal_jual = [];
        foreach ($trades as $trade) {
            $tanggal_beli[] = $trade->tanggal_beli;
            $tanggal_jual[] = $trade->tanggal_jual;
        }

        $tgl_unik_beli = (array_unique($tanggal_beli));
        $tgl_unik_jual = (array_unique($tanggal_jual));

        // print_r($tgl_unik_beli);
        // print_r($tgl_unik_jual);

        $merge = array_merge($tgl_unik_beli, $tgl_unik_jual);
        // print_r($merge);

        $merge_unik = array_unique($merge);
        // print_r($merge_unik);

        // jumlah all beli
        $t_buy['tanggal'] = 0;
        $t_buy['lot'] = 0;
        $t_buy['harga'] = 0;
        $t_buy['nominal'] = 0;

        $all_buy = [];

        foreach ($tgl_unik_beli as $unik) {
            // echo $unik;
            // echo "<br>"
            $t_buy['tanggal'] = 0;
            $t_buy['lot'] = 0;
            $t_buy['harga'] = 0;
            $t_buy['nominal'] = 0;
            $buys = ($trades->where('tanggal_beli', $unik));
            foreach ($buys as $buy) {
                // echo $buy->lot;
                // echo "<br>";
                $t_buy['tanggal'] = $buy->tanggal_beli;
                $t_buy['lot'] += $buy->lot;
                $t_buy['harga'] = $buy->harga_beli;
                $t_buy['nominal'] = $buy->nominal_beli;
            }
            $all_buy[] = $t_buy;
        }
        // print_r($all_buy);

        $t_sell['tanggal'] = 0;
        $t_sell['lot'] = 0;
        $t_sell['harga'] = 0;
        $t_sell['nominal'] = 0;

        $all_sell = [];
        // jumlah all jual
        foreach ($tgl_unik_jual as $unik) {
            // echo $unik;
            // echo "<br>";
            $t_sell['tanggal'] = 0;
            $t_sell['lot'] = 0;
            $t_sell['harga'] = 0;
            $t_sell['nominal'] = 0;
            $buys = ($trades->where('tanggal_jual', $unik));
            foreach ($buys as $buy) {
                // echo $buy->lot;
                // echo "<br>";
                $t_sell['tanggal'] = $buy->tanggal_jual;
                $t_sell['lot'] += $buy->lot;
                $t_sell['harga'] = $buy->harga_jual;
                $t_sell['nominal'] = $buy->nominal_jual;
            }
            $all_sell[] = $t_sell;
        }
        // print_r($all_buy);
        // print_r($all_sell);
        $t_bs['tanggal'] = 0;
        $t_bs['lot'] = 0;
        $t_bs['harga'] = 0;
        $t_bs['nominal'] = 0;
        $t_bs['materai'] = 0;

        $combine_buy_sell = (array_merge($all_buy, $all_sell)); //menggabungkan 2 array
        $all_bs = [];
        // print_r($all);
        foreach ($all_buy as $select) {
            foreach ($all_sell as $select2) {
                if ($select['tanggal'] == $select2['tanggal']) {
                    $t_bs['tanggal'] = $select['tanggal'];
                    $t_bs['lot'] = $select['lot'] + $select2['lot'];
                    $t_bs['harga'] = $select['harga'] + $select2['harga'];
                    $t_bs['nominal'] = $select['nominal'] + $select2['nominal'];
                } else {
                    continue;
                }

                if ($t_bs['nominal'] >= 10000000) {
                    $t_bs['materai'] = 10000;
                }
                $all_bs[] = $t_bs;
            }
        }
        // print_r($combine_buy_sell); //gabungan buy sell
        // echo '<br>======================================<br>';
        // print_r($all_bs); //buy + sell

        $sum_buysell = [];
        foreach ($all_bs as $sums) {
            $sum_buysell[] = $sums['tanggal'];
        }

        // print_r($sum_buysell);

        // echo '<br>======================================<br>';
        // echo '======================================<br>';

        // print_r($merge_unik);

        $result_buysell = array_diff($merge_unik, $sum_buysell);
        // print_r($result_buysell);

        $materai['tanggal'] = 0;
        $materai['lot'] = 0;
        $materai['harga'] = 0;
        $materai['nominal'] = 0;
        $materai['materai'] = 0;

        $materai_buy = [];

        foreach ($result_buysell as $combine) {
            // print_r($combine);
            $materai['materai'] = 0;
            foreach ($combine_buy_sell as $buss) {
                if ($buss['tanggal'] == $combine) {
                    // print_r($buss['tanggal']);
                    // echo '<br>';
                    $materai['tanggal'] = $buss['tanggal'];
                    $materai['lot'] = $buss['lot'];
                    $materai['harga'] = $buss['harga'];
                    $materai['nominal'] = $buss['nominal'];
                    // $materai['materai'] = $buss['materai'];
                }
            }

            if ($materai['nominal'] >= 10000000) {
                $materai['materai'] = 10000;
            }
            $materai_buy[] = $materai;
        }
        // print_r($materai_buy);

        // echo '<br>======================================<br>';
        // echo '================Result======================<br>';

        $meterai_result = array_merge($materai_buy, $all_bs);
        // print_r($meterai_result);
        return view('admins.laporan', compact('meterai_result'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
