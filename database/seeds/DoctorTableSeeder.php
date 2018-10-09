<?php

use App\Doctor;

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

	    $limit = 10000;

	    for ($i = 0; $i < $limit; $i++) {
	        Doctor::create([
		        'name' => $faker->firstNameMale, 
		        'surname' => $faker->lastName,
		        'patronymic' => $faker->middleNameMale,
	        ]);
	    }
    }
}
