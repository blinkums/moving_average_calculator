<?php namespace Calculator; 


class Format {

    public function textAreaToArray($values)
    {
        $values = str_replace("\r", "\n", str_replace("\r\n", "\n", $values));
        $values = explode("\n", $values);
        $values = array_filter($values);

        return $values;
    }
}