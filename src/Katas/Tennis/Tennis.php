<?php

namespace Katas\Tennis;

class Tennis
{

    /**
     * @var Player
     */
    private $player1;

    /**
     * @var Player
     */
    private $player2;

    /**
     * @var array
     */
    private $lookup = [
        'Love',
        'Fifteen',
        'Thirty',
        'Fourty'
    ];

    /**
     * @param Player $player1
     * @param Player $player2
     */
    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if( $this->hasAWinner() )
        {
            return 'Win for ' . $this->winner()->name;
        }

        if( $this->hasTheAdvantage() )
        {
            return 'Advantage ' . $this->leader()->name;
        }

        if( $this->isDeuce() )
        {
            return 'Deuce';
        }

        return $this->generalScore();

    }

    /**
     * @return Player
     */
    public function winner()
    {
        return $this->leader();
    }

    /**
     * @return Player
     */
    public function leader()
    {
        return $this->player1->points > $this->player2->points
            ? $this->player1
            : $this->player2;
    }

    /**
     * @return bool
     */
    private function isTie()
    {
        return ($this->player1->points == $this->player2->points);
    }

    /**
     * @return bool
     */
    private function isDeuce()
    {
        return $this->hasEnoughPointsToBeDeuce() && $this->isTie();
    }

    /**
     * @return bool
     */
    private function isLeadingByOne()
    {
        return abs($this->player1->points - $this->player2->points) >= 1;
    }

    /**
     * @return bool
     */
    private function isLeadingByAtLeastTwo()
    {
        return abs($this->player1->points - $this->player2->points) >= 2;
    }

    /**
     * @return bool
     */
    private function hasAWinner()
    {
        return  $this->hasEnoughPointsToBeWon() && $this->isLeadingByAtLeastTwo();
    }

    /**
     * @return bool
     */
    private function hasTheAdvantage()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByOne();
    }

    /**
     * @return bool
     */
    private function hasEnoughPointsToBeWon()
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    /**
     * @return bool
     */
    private function hasEnoughPointsToBeDeuce()
    {
        return $this->player1->points + $this->player2->points >= 6;
    }

    /**
     * @return string
     */
    private function generalScore()
    {
        $score = $this->lookup[$this->player1->points] . '-';

        return $score .= $this->isTie() ? 'All' : $this->lookup[$this->player2->points];
    }

}
