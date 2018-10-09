<?php

use App\Doctor;
use App\Hospital;

use Illuminate\Database\Seeder;

class DoctorHospitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$hospitals = Hospital::all();
	    Doctor::all()->each(function ($doctor) use ($hospitals) { 
	   		$doctor->hospitals()->attach(
	        	$hospitals->random(rand(1, 15))->pluck('id')->toArray()
	    	);
	    });
    }
}
