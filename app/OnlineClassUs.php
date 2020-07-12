<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineClassUs extends Model
{
    use SoftDeletes;
    public function masterClass()
    {
        return $this->belongsTo(MasterClass::class);
    }
    

    protected $guarded = array();
}
