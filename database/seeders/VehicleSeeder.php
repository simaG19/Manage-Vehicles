<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'make' => 'Toyota',
            'model' => 'Corolla',
            'year' => 2020,
            'license_plate' => 'ABC123'
        ]);

        Vehicle::create([
            'make' => 'Honda',
            'model' => 'Civic',
            'year' => 2019,
            'license_plate' => 'XYZ456'
        ]);

        Vehicle::create([
            'make' => 'Ford',
            'model' => 'Mustang',
            'year' => 2021,
            'license_plate' => 'LMN789'
        ]);
    }
}
