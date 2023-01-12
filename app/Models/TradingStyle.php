<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'modal',
        'resiko_per_transaksi',
        'risk_reward_ratio',
        'cut_los',
        'fee_broker_beli',
        'fee_broker_jual',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
