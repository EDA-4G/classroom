<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'id',
        'description',
        'type',
        'cover',
        'level',
        'access_state',
        'usage_state',
        'is_fixed',
        'is_active',
        'created_at'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
