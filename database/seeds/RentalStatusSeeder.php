<?php

use App\RentalStatus;
use Illuminate\Database\Seeder;

class RentalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RentalStatus::create(['name' => 'SEEKING TENANT']);
    }
}
