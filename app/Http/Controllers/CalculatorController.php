<?php namespace App\Http\Controllers;

class CalculatorController extends Controller {

    private $movingAverage = 0;
    private $movingAverageArray = [];
 
    public function index()
    {
        return view('calculator');
    }

    public function calculate()
    {
        $values = \Input::get('values');
        $values = $this->textAreaToArray($values);

        $interval = \Input::get('interval');
        $this->validateIntervalInput($interval);
        
        foreach ($values as $key => $value)
        {
            $this->excludeBeginningValues($key, $interval, $values);
        }
        $this->echoValues();
    }   

    private function textAreaToArray($values)
    {
        $values = str_replace("\r", "\n", str_replace("\r\n", "\n", $values));
        $values = explode("\n", $values);
        $values = array_filter($values);

        return $values;
    }

    private function validateIntervalInput($interval)
    {
        if ($interval < 0)
        {
            throw new \Exception('Non-negative numbers only');
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

    private function echoValues()
    {
        foreach ($this->movingAverageArray as $value)
        {
            echo $value . '<br>';
        }
    }
}