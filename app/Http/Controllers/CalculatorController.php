<?php namespace App\Http\Controllers;

class CalculatorController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('calculator');
    }

    public function calculate()
    {
        $values = \Input::get('values');
        $values = str_replace("\r", "\n", str_replace("\r\n", "\n", $values));
        $values = explode("\n", $values);
        $values = array_filter($values);

        $interval = \Input::get('interval');

        foreach ($values as $valueKey => $value)
        {
            if ($valueKey >= $interval)
            {
                $movingAverage =
                    ($values[$valueKey - ($interval - 6)] +
                        $values[$valueKey - ($interval - 5)] +
                        $values[$valueKey - ($interval - 4)] +
                            $values[$valueKey - ($interval - 3)] +
                                $values[$valueKey - ($interval - 2)] +
                                    $values[$valueKey - ($interval - 1)] +
                        $values[$valueKey - $interval] +
                        $values[$valueKey])
                    / ($interval + 1);

                echo $movingAverage.'<br>';
            }
        }
    }

}