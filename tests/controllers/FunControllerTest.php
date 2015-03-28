<?php

use app\Http\Controllers\CalculatorController as Calculator;

class FunControllerTest extends TestCase {

    public function testAddFails()
    {
        $calculator = new Calculator();

        $actual = $calculator->add(2, 2);
        $expected = 3;

        $this->assertFalse($expected == $actual);
    }

    public function testAddPasses()
    {
        $calculator = new Calculator();

        $actual = $calculator->add(1, 2);
        $expected = 3;

        $this->assertTrue($expected == $actual);
    }

}