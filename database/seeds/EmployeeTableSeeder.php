<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class EmployeeTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        for($i = 0; $i < 20; $i ++)
        {
            $firstname = $faker->firstName;
            $lastname = $faker->lastName;

            $id = \DB::table('employees')->insertGetId(array(
                'full_name'                 => "$firstname $lastname",
                'identification'            => $faker->biasedNumberBetween($min = 100000000, $max = 999999999, $function = 'sqrt'),
                'identification_type'       => $faker->randomElement(['CC','TI','PS']),
                'expedition_municipality'   => 'Barranquilla',
                'expedition_department'     => 'Atlantico',
                'state'                     => 0,
            ));

            \DB::table('contracts')->insert(array(
                'employee_id'   =>  $id,
                'position'      =>  $faker->randomElement(['Secretaria','Ingeniero','Cordinador','Profesor']),
                'entered_date'  =>  $faker->dateTimeBetween('-5 years','-1 years')->format('Y-m-d'),
                'salary'        =>  $faker->randomElement([650000,800000,1200000]),
                'contract_type' =>  $faker->randomElement(['Definio','Indefinido','Termino Fijo']),
            ));

        }

	}

}
