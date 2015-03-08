<?php

namespace spec\Katas\Palindrome;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PalindromeSpec extends ObjectBehavior
{

    function it_detects_that_word_is_not_a_palydrome()
    {
        $this->check('word')->shouldReturn(false);
    }

    function it_detects_that_a_even_letter_word_is_a_palydrome()
    {
        $this->check('anna')->shouldReturn(true);
    }

    function it_detects_that_a_odd_letter_word_is_a_palydrome()
    {
        $this->check('laval')->shouldReturn(true);
    }

    function it_is_case_insensitive()
    {
        $this->check('Anna')->shouldReturn(true);
    }

    function it_detecs_a_palindrome_in_sentence_with_no_palindromes()
    {
        $this->find('My name is John')->shouldReturn([]);
    }

    function it_detecs_a_palindrome_in_sentence_with_one_palindromes()
    {
        $this->find('My name is Anna')->shouldReturn(['Anna']);
    }

    function it_detecs_a_palindrome_in_sentence_with_various_palindromes()
    {
        $this->find('My name is Anna and I live in Laval')->shouldReturn(['Anna', 'Laval']);
    }

    function it_detects_a_whole_sentence_with_special_characters_as_palindrome()
    {
        $this->check('Barge in! Relate mere war of 1991 for a were-metal Ernie grab!')->shouldReturn(true);
    }

}
