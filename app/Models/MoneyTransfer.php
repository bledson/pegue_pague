<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyTransfer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'payer',
        'payee',
        'status'
    ];

    public function payer() {
        $this->belongsTo(User::class, 'payer');
    }

    public function payee() {
        $this->belongsTo(User::class, 'payee');
    }
}
