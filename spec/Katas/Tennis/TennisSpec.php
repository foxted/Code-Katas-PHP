<?php

namespace spec\Katas\Tennis;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Katas\Tennis\Player;

class TennisSpec extends ObjectBehavior
{

    protected $john;

    protected $jane;

    function let()
    {
        $this->jane = new Player('Jane Doe', 0);
        $this->john = new Player('John Doe', 0);
        $this->beConstructedWith($this->jane, $this->john);
    }

    function it_scores_a_scoreless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }

    function it_scores_a_1_0_game()
    {
        $this->jane->earnPoints(1);
        $this->score()->shouldReturn('Fifteen-Love');
    }

    function it_scores_a_2_0_game()
    {
        $this->jane->earnPoints(2);
        $this->score()->shouldReturn('Thirty-Love');
    }

    function it_scores_a_3_0_game()
    {
        $this->jane->earnPoints(3);
        $this->score()->shouldReturn('Fourty-Love');
    }

    function it_scores_a_4_3_game()
    {
        $this->jane->earnPoints(4);
        $this->john->earnPoints(3);
        $this->score()->shouldReturn('Advantage Jane Doe');
    }

    function it_scores_a_3_4_game()
    {
        $this->jane->earnPoints(3);
        $this->john->earnPoints(4);
        $this->score()->shouldReturn('Advantage John Doe');
    }

    function it_scores_a_6_5_game()
    {
        $this->jane->earnPoints(6);
        $this->john->earnPoints(5);
        $this->score()->shouldReturn('Advantage Jane Doe');
    }

    function it_scores_a_7_8_game()
    {
        $this->jane->earnPoints(7);
        $this->john->earnPoints(8);
        $this->score()->shouldReturn('Advantage John Doe');
    }

    function it_scores_a_4_4_game()
    {
        $this->jane->earnPoints(3);
        $this->john->earnPoints(3);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_8_8_game()
    {
        $this->jane->earnPoints(8);
        $this->john->earnPoints(8);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_4_0_game()
    {
        $this->jane->earnPoints(4);
        $this->score()->shouldReturn('Win for Jane Doe');
    }

    function it_scores_a_0_4_game()
    {
        $this->john->earnPoints(4);
        $this->score()->shouldReturn('Win for John Doe');
    }

    function it_scores_a_10_8_game()
    {
        $this->jane->earnPoints(10);
        $this->john->earnPoints(8);
        $this->score()->shouldReturn('Win for Jane Doe');
    }


}
