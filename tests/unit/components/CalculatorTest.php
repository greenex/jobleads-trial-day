<?php
/**
 * Created by PhpStorm.
 * User: Salah
 * Date: 8/12/19
 * Time: 6:00 PM
 */

namespace tests\unit\components;


use app\components\Calclulator;

class CalculatorTest extends \Codeception\Test\Unit
{
    public function testPlus()
    {
        $calc = new Calclulator();
        expect_that($calc->plus(1,2)==3);
    }

    public function testMinus()
    {
        $calc = new Calclulator();
        expect_that($calc->Minus(10,1)==9);
    }

    public function testSubTract()
    {
        $calc = new Calclulator();
        expect_that($calc->Minus(10,1)==9);
    }

    public function testSquareRoot()
    {
        $calc = new Calclulator();
        expect_that($calc->squareRoot(9)==3);
    }

    public function testCalculate()
    {
        expect_that(Calclulator::Calculate(10,5)==2);
    }

    public function testMultiply()
    {
        $calc = new Calclulator();
        expect_that($calc->multiply_values(5,4)==20);
    }
}