<?php namespace Calculator; 


class Output {

    public function getOutput($array)
    {
        $this->showChange($array);

        $this->echoValues($array);
    }

    private function showChange($array)
    {
        $count = count($array);

        $difference = $array[$count - 1] - $array[0];

        echo 'Total difference = ' . round($difference, 2) . '<br>';
        echo 'Average change per week ' . round($difference / ($count / 7), 2) . '<br><br>';
    }

    private function echoValues($array)
    {
        foreach ($array as $value)
        {
            echo $value . '<br>';
        }
    }
}