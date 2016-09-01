<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'content', 'isDone'];
    protected $guarded = ['userId', 'issuedById'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function issuedBy()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
