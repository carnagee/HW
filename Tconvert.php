<?php

$handle = fopen('php://stdin','r');
echo "\n If you want to convert:\n         
    |Celsius to Fahrenheit enter 1.\n    |
    |Celsius to Kelvin enter 2.\n    |
    |Fahrenheit to Celsius enter 3.\n    |
    |Fahrenheit to Kelvin enter 4.\n    |
    |Kelvin to Celsius enter 5.\n    |
    |Kelvin to Fahrenheit enter 6.\n    
 You enter:";
$what = fgets($handle);
switch ($what) {
	case 1:
		echo "\n Please enter Celsius.\n
 You enter: ";
		$cels = fgets($handle);
		$fin = $cels*(9/5)+32;
		break;
	case 2:
		echo "\n Please enter Celsius.\n
 You enter: ";
		$cels = fgets($handle);
		$fin = $cels + 273;
		break;
	case 3:
		echo "\n Please enter Fahrenheit.\n
 You enter: ";
		$fahr = fgets($handle);
		$fin = ($fahr-32)*(5/9);
		break;
		case 4:
		echo "\n Please enter Fahrenheit.\n
 You enter: ";
		$fahr = fgets($handle);
		$fin = (5*($fahr-32)/9)+273;
		break;
		case 5:
		echo "\n Please enter Kelvin.\n
 You enter: ";
		$kelv = fgets($handle);
		$fin = $kelv - 273;
		break;
		case 6:
		echo "\n Please enter Kelvin.\n
 You enter: ";
		$kelv = fgets($handle);
		$fin = (9*($kelv-273)/5)+32 ;
		break;
}
echo "\n Result: $fin\n_______________________________________________________________
 Thanks for using our software :)\n";

?>