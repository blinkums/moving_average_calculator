<?php namespace App\Http\Controllers;

use Calculator\Calculator;
use Calculator\Output;
use Calculator\Format;
use Calculator\Validator;

class CalculatorController extends Controller {

    public function __construct(Calculator $calc, Output $output, Format $format, Validator $validator)
    {
        $this->calc = $calc;
        $this->output = $output;
        $this->format = $format;
        $this->validator = $validator;
    }

    public function index()
    {
        return view('calculator');
    }

    public function calculate()
    {
        $values = \Input::get('values');
        $values = $this->format->textAreaToArray($values);

        $interval = \Input::get('interval');
        $this->validator->forceNonNegatives($interval);
        $this->validator->forceWholeNumber($interval);
        
        $this->calc->processValues($values, $interval);

        $this->output->getOutput($this->calc->getMovingAverageArray());
    }
}