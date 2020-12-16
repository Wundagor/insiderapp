<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::insert(
            collect(config('teams.names'))->map(function($name) {
                return ['name' => $name];
            })->toArray()
        );
    }
}
