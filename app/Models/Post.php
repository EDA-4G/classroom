<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'title', 'image', 'type', 'color', 'can_pay', 'is_active', 'created_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
