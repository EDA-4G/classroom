<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['id', 'description', 'image', 'is_active', 'created_at'];
}
