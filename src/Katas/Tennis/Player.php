<?php  namespace Katas\Tennis; 

/**
 * Class Player
 * @package Katas\Tennis
 * @author Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class Player {

    public $name;
    public $points;

    /**
     * @param $name
     * @param $points
     */
    public function __construct($name, $points)
    {
        $this->name = $name;
        $this->points = $points;
    }

    /**
     * @param $points
     */
    public function earnPoints($points)
    {
        $this->points = $points;
    }
    
}