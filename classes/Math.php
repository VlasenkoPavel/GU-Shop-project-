<?php

class Math
{
    public function factorial($n)
    {
        if($n == 0) return 1;

        return $n * $this->factorial($n - 1);
    }
}