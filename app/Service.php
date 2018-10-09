<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'description', 
    ];

    public function doctors()
	{
		return $this->belongsToMany('App\Doctor');
	}
}
