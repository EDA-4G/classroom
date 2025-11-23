<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['id', 'description', 'is_active', 'created_at'];
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
