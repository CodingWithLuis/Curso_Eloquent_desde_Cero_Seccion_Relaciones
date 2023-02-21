<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Profile::factory(5)->create();
        \App\Models\Specialty::factory(10)->create();
        \App\Models\Country::factory(10)->create();
        \App\Models\City::factory(100)->create();

        $this->call([
            HospitalSeeder::class,
            DoctorSeeder::class,
        ]);

        $doctors = Doctor::all();

        foreach ($doctors as $doctor) {
            $specialties = Specialty::inRandomOrder()->take(rand(1, 3))->pluck('id');

            $doctor->specialties()->attach($specialties, ['is_specialty_abroad' => rand(0, 1)]);
        }
    }
}
