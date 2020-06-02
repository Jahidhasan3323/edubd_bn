<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=['name','permission'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
