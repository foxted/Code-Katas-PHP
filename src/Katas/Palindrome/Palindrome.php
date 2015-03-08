<?php  namespace Katas\Palindrome;

/**
 * Class Palindrome
 * @package Katas\Palindrome
 * @author  Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class Palindrome
{
    /**
     * @param $word
     * @return bool
     */
    public function check($word)
    {
        if($this->hasAtLeastTwoLetters($word) && $this->isPalindrome($word)) return true;
        return false;
    }

    /**
     * @param $sentence
     * @return array
     */
    public function find($sentence)
    {
        $palindromes = [];

        foreach(explode(' ', $sentence) as $word)
        {
            if($this->check($word))
            {
                $palindromes[] = $word;
            }
        }

        return $palindromes;
    }

    /**
     * @param $word
     * @return bool
     */
    private function isPalindrome($word)
    {
        return $this->cleanString(strrev($word)) == $this->cleanString($word);
    }

    /**
     * @param $word
     * @return bool
     */
    private function hasAtLeastTwoLetters($word)
    {
        return strlen($word) > 2;
    }

    /**
     * @param $word
     * @return string
     */
    private function cleanString($word)
    {
        return preg_replace('/[.!? -_:;,]/', '', strtolower($word));
    }

}
