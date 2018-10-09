<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $fillable = [
        'name', 'surname', 'patronymic', 
    ];

    public function services()
	{
		return $this->belongsToMany('App\Service', 'doctors_services');
	}

	public function hospitals()
	{
		return $this->belongsToMany('App\Hospital', 'doctors_hospitals');
	}
}
