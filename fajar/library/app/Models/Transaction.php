<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function details(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
}