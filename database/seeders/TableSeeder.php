<?php

namespace Database\Seeders;

use App\Models\Table;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::all()->map(function($team) {
            (new Table)->team()->associate($team)->save();
        });
    }
}
