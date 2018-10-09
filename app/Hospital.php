<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'title', 'street', 'building', 'description',
    ];

    public function doctors()
	{
		return $this->belongsToMany('App\Doctor');
	}
}
