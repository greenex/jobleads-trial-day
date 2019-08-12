<?php
 namespace app\components;


 class Calclulator
 {

     /**
      * sum 2 values
      *
      * @param $a
      * @param $b
      * @return mixed
      */
	public function plus ($a, $b){
		return  $a + $b;
	}

     /**
      * sub $zahl2 from $Zahl1
      *
      * @param $Zahl1
      * @param $zahl2
      * @return mixed
      */
	public function Minus($Zahl1, $zahl2)
	{
		return $Zahl1-$zahl2;
	}

     /**
      * sub b from a
      *
      * @param $a
      * @param $b
      * @return mixed
      */
	public static function SubTract ($a, $b)
    {
		return $a - $b;
	}

     /**
      * calculate square root of number
      *
      * @param $a
      * @return float
      */
	public function squareRoot($a)
	{
		return sqrt($a);
    }

	/**
	 * Berechnet eine division:
	 * @param int $value Divisor
	 * @param int $value2 Divident
	 * @return double
	 */
	public static function Calculate($value, $value2)
	{
		return $value / $value2;
	}

     /**
      * multiply tow values
      *
      * @param $value1
      * @param $value2
      * @return float|int
      */
	public function multiply_values($value1, $value2)
    {
		return $value1*$value2;
	}
	
	
	/**
	 * Needed until 2013-03-01 for backwards compatibility
	 */
	private function output($line) {
		echo $line;
	}
	
}