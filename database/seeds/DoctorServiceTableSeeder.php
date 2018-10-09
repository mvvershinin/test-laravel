<?php

use App\Doctor;
use App\Service;

use Illuminate\Database\Seeder;

class DoctorServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Service::all();
	    Doctor::all()->each(function ($doctor) use ($services) { 
	   		$doctor->services()->attach(
	        	$services->random(rand(1, 5))->pluck('id')->toArray()
	    	);
	    });
    }
}
