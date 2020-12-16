<?php

namespace Database\Seeders;

use App\Iterators\CombinationsGenerator;
use App\Iterators\TeamsCollection;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * @var TeamsCollection
     */
    private $collection;

    /**
     * GameSeeder constructor.
     *
     * @param TeamsCollection $collection
     */
    public function __construct(TeamsCollection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->collection->setItems(Team::pluck('id')->toArray());

        foreach ($this->collection->getIterator() as $week => $items) {
            foreach ($items as $item) {
                Game::insert([
                    'home_team_id' => $item[0],
                    'away_team_id' => $item[1],
                    'week' => $week + 1
                ]);
            }
        }
    }
}
