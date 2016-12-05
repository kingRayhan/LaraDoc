<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocPage extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    public function doc_name(){
    	return $this->belongsTo('App\DocName');
    }
}
