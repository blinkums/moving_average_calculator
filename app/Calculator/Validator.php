<?php namespace Calculator; 


class Validator {

    public function forceNonNegatives($integer)
    {
        if ($integer < 0)
        {
            throw new \Exception('Non-negative numbers only');
        }
    }

    public function forceWholeNumber($input)
    {
        if (! $this->isInteger($input))
        {
            throw new \Exception('Whole numbers only');
        }
    }

    private function isInteger($input)
    {
        return ctype_digit(strval($input));
    }
}