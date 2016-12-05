<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocName extends Model
{	
	use SoftDeletes;
	protected $fillable = ['name'];
	protected $table = 'doc_names';
	protected $dates = ['deleted_at'];
    public function doc_page(){
    	return $this->hasMany('App\DocPage');
    }
}
