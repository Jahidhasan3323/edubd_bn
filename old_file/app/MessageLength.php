<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class MessageLength extends Model
{
	protected $guarded=[];
    use SoftDeletes;

	public function school(){
		return $this->belongsTo(School::class);
	}



}