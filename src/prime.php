<?php

  class MultiplicationPrimesTables {
    public static function print( $tableStart ) {

      $tableLines = 10; // no of lines per table
      $borderV = str_repeat('_', 17); // verticle borders
      $borderH = '|';
      $primes = array();
      $is_prime_no = false;
      $is_negative_number = false;

      if ($tableStart < 0){
        $is_negative_number = true;
      }
      
      for ($i = $tableStart; $i < ($tableStart+$tableLines); $i++) {
        $is_prime_no = true; 
        for ($j = 2; $j <= ($i/2); $j++) {
            if ($i % $j==0) {
                $is_prime_no = false; 
                break;
            }
        }
        if ($is_prime_no) {
           array_push($primes,$i);
        }
        if (count($primes) == $tableStart + $tableLines) {
           break;
        }
      }
      $tableFirst = $primes[0];
      
      // validation
      if (in_array(0, [$tableFirst, $tableLines])) {
        $error =  "\n\n Error : invalid input\n\n" . "1. Table-start should be non-zero\n2. No of table-lines should be non zero . \n\n";
        echo $error;
        exit;
      }
      if ($is_negative_number) {
        $error = "Negative numbers are not allowed!";
        echo $error;
        exit;
      }

      foreach ($primes as $prime){
        echo "\n$borderV";
        for ($rowLine = 1; $rowLine <= $tableLines + 1; $rowLine++ ) {
            if ($rowLine == $tableLines + 1){
               $aTableLine = $borderV;
            } else {
                $aTableLine = "$borderH $prime x $rowLine = " . $prime * $rowLine . "\t$borderH"; 
            } echo "\n". $aTableLine;
        }  
      }
    }
  }

  //starting from 14 end number will be 24 primes check will be [14 to 24];
  echo '<pre>';
  MultiplicationPrimesTables::print( 14 );

  //negative number are not allowed
  echo "\n\n";
  MultiplicationPrimesTables::print(-3);

  //null not allowed
  echo "\n\n";
  MultiplicationPrimesTables::print(0);

  echo '</pre>';
?>