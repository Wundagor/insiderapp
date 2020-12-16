<?php

namespace App\Iterators;

class TeamsCollection implements \IteratorAggregate
{
    /**
     * @var array
     */
    private array $items = [];

    /**
     * Get items array
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Set items after combination of them
     *
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $this->getCombinedItems($items);
    }

    /**
     * Get iterator
     *
     * @return CombinationIterator
     */
    public function getIterator(): CombinationIterator
    {
        return new CombinationIterator($this);
    }

    /**
     * Get combined teams
     *
     * @param array $items
     * @return array
     */
    private function getCombinedItems(array $items): array
    {
        return $this->getCombinedMatches($items);
    }

    /**
     * Get combined items
     *
     * @param array $items
     * @return array
     */
    private function getCombinedTeams(array $items): array
    {
        $item_combination = [];
        $count = count($items);

        for($i = 0; $i < $count; $i++) {
            for($j = $i + 1; $j < $count; $j++) {
                $item_combination[] = [$items[$i], $items[$j]];
            }
        }

        return $item_combination;
    }

    /**
     * Get combined matches
     *
     * @param array $items
     * @return array
     */
    private function getCombinedMatches(array $items): array
    {
        $item_combination = [];
        $team_combination = $this->getCombinedTeams($items);
        $count = count($team_combination);

        for($i = 0; $i < $count; $i++) {
            for($j = $i + 1; $j < $count; $j++) {
                if(
                    ($team_combination[$i][0] !== $team_combination[$j][0]) &&
                    ($team_combination[$i][0] !== $team_combination[$j][1])&&
                    ($team_combination[$i][1] !== $team_combination[$j][0]) &&
                    ($team_combination[$i][1] !== $team_combination[$j][1])
                ) $item_combination[] = [$team_combination[$i], $team_combination[$j]];
            }
        }

        return array_merge($item_combination, $this->getReversedMatches($item_combination));
    }

    /**
     * Get reversed combined matches
     *
     * @param array $items
     * @return array
     */
    private function getReversedMatches(array $items): array
    {
        $item_combination = [];
        $count = count($items);

        for($i = 0; $i < $count; $i++) {
            $reverse = [];

            for($j = 0; $j < count($items[$i]); $j++) {
                $reverse[] = array_reverse($items[$i][$j]);
            }

            $item_combination[] = $reverse;
        }

        return $item_combination;
    }
}
