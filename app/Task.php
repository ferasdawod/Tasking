<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $fillable = ['title', 'content', 'isDone'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function issuedBy()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
