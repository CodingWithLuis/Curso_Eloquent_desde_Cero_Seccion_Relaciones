<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use App\Models\Doctor;
use App\Models\Document;
use App\Models\Hospital;
use App\Models\Image;
use App\Models\Profile;
use App\Models\Specialty;
use App\Models\User;
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

        //CREANDO REGISTRO PARA RELACION POLIMORFICA PERFIL E IMAGEN
        $profiles = Profile::all();

        foreach ($profiles as $profile) {

            // Image::create([
            //     'url' => fake()->imageUrl(),
            //     'imageable_id' => $profile->id,
            //     'imageable_type' => 'App\Models\Profile'
            // ]);

            $profile->image()->create([
                'url' => fake()->imageUrl()
            ]);
        }

        //CREANDO REGISTRO PARA RELACION POLIMORFICA COUNTRY E IMAGE
        $countries = Country::all();

        foreach ($countries as $country) {

            Image::create([
                'url' => fake()->imageUrl(),
                'imageable_id' => $country->id,
                'imageable_type' => 'App\Models\Country'
            ]);
        }

        //CREANDO REGISTRO PARA RELACION POLIMORFICA HOSPITAL Y DOCUMENT
        $hospitals = Hospital::all();

        foreach ($hospitals as $hospital) {

            Document::create([
                'filename' => fake()->word(),
                'documentable_id' => $hospital->id,
                'documentable_type' => 'App\Models\Hospital'
            ]);
        }

        //CREANDO REGISTRO PARA RELACION POLIMORFICA USER Y DOCUMENT
        $users = User::all();

        foreach ($users as $user) {

            Document::create([
                'filename' => fake()->word(),
                'documentable_id' => $user->id,
                'documentable_type' => 'App\Models\User'
            ]);
        }
    }
}
