<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepoDocument extends Model
{
    protected $table = 'documents';
    protected $fillable = ['id', 'description', 'document', 'size', 'extension', 'is_active', 'created_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
