<?php

namespace App\Http\Controllers;

use App\Models\Materai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateraiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $this->user = Auth::id();
        $trades = User::find($this->user)->trade->where('status', 'aktif');
        // $trades = User::find($this->user)->trade->where('status', 'selesai');
        // $trades = User::find($user)->trade;
        // return view('admins.laporan', compact('trades'));

        echo '<pre>';
        print_r($trades);
    }

    public function materai()
    {
    }

    public function cekEquals0()
    {
    }

    public function cekEquals1()
    {
    }
}
