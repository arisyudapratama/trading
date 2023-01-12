<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal',
        'lot',
        'transaksi',
        'gain_loss_persen',
        'gain_loss_nominal',
        'net_profit',
        'materai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
