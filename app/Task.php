<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $fillable = ['title', 'content', 'isDone'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function issuedBy()
    {
        $this->belongsTo(User::class);
    }
}
