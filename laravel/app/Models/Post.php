<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
