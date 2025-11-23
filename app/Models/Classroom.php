<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['id', 'description', 'image', 'level','status','is_active', 'created_at'];
    public function departament(){
        return $this->belongsTo(Department::class);
    }
}
