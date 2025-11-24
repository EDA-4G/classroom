<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['id', 'mpesa_nr', 'amount', 'is_paid', 'created_at'];
}
