<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trade_id',
        'kode_saham',
        'lot',
        'harga_beli',
        'tanggal_beli',
        'nominal_beli',
        'harga_jual',
        'tanggal_jual',
        'nominal_jual',
        'gain_loss_persen',
        'gain_loss_nominal',
        'jangka_waktu',
        'fee_beli',
        'fee_jual',
        'net_beli',
        'net_jual',
        'net_profit',
        'fee',
        'status',
    ];
}
