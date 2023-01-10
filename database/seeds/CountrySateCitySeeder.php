<?php

use App\City;
use App\Country;
use App\State;
use Illuminate\Database\Seeder;

class CountrySateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*------------------------------------------
        --------------------------------------------
        US Country Data
        --------------------------------------------
        --------------------------------------------*/
        $country = Country::create(['name' => 'United State']);

        $state = State::create(['country_id' => $country->id, 'name' => 'Tennessee']);

        City::create(['state_id' => $state->id, 'name' => 'Nashville']);
        City::create(['state_id' => $state->id, 'name' => 'Memphis']);
    }
}
