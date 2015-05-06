<?php namespace Calculator;


class Calculator {

    private $movingAverage = 0;

    private $movingAverageArray = [];

    public function getMovingAverage()
    {
        return $this->movingAverage;
    }

    public function getMovingAverageArray()
    {
        return $this->movingAverageArray;
    }

    public function processValues($values, $interval)
    {
        foreach ($values as $key => $value)
        {
            $this->excludeBeginningValues($key, $interval, $values);
        }
    }

    private function excludeBeginningValues($key, $interval, $values)
    {
        if ($key >= $interval)
        {
            $this->calculateMovingAverage($interval, $values, $key);

            $this->movingAverage = round($this->movingAverage, 1);

            $this->movingAverageArray[] = $this->movingAverage;

            $this->resetMovingAverage();
        }
    }

    private function calculateMovingAverage($interval, $array, $key)
    {
        $x = 0;

        while ($x <= $interval)
        {
            $this->movingAverage += $array[$key - ($interval - $x)];
            $x++;
        }
        $this->movingAverage /= $interval + 1;
    }

    private function resetMovingAverage()
    {
        $this->movingAverage = 0;
    }
}