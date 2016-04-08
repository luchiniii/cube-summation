<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;

class Cube extends Model
{
    public $data_t;
    public $string;
    public $queries;

    public function setString($string='')
    {
    	if ( !empty($string) ) {
    		
    		$this->string = $string;
    		$response = $this->validateFirstLine();

    		if ( $response['error'] == 1 ) {
    			return view('error.error', $response)->render();
    		}
    		unset($this->string[0]);
    		
    		$this->string = array_values($this->string);
    		
    		$response = $this->validateTestCasesNumbers();

    		if( $response['error'] == 1 ){
    			return view('error.error', $response)->render();
    		}

    		$response = $this->validateTestCases();

    		if( $response['error'] == 1 ){
    			return view('error.error', $response)->render();
    		}

    		dd($response);

    	}
		return false;
    }

    public function validateFirstLine()
    {
    	$error['error'] = 0;
    	$error['message'] = '';

		if ( !is_numeric( $this->string[0] ) ) {
			$error['error'] = 1;
			$error['message'][] = 'First Line: This character must be numeric.';
		}elseif ( !(1 <= (int)$this->string[0] && (int)$this->string[0] <= 50) ) {
			$error['error'] = 1;
			$error['message'][] = 'First Line: This character must be between 1 and 50.';
		}elseif( (int)$this->string[0] !=  $this->string[0] ){
			$error['error'] = 1;
			$error['message'][] = 'First Line: This character must be integer.';
		}else{
			$this->data_t = (int)$this->string[0];
		}

		return $error;
    }

    public function validateTestCasesNumbers()
    {
    	$error['error'] = 0;
    	$error['message'] = '';
        
    	$count = 0;
    	foreach ($this->string as $key => $value) {
    		$explodedStr = explode(' ', $value);
    		if ( count($explodedStr) == 2 ) {
    			if ( is_numeric( $explodedStr[0] ) && is_numeric( $explodedStr[1] ) ) {
    				if ( ((int)$explodedStr[0] == $explodedStr[0]) && ((int)$explodedStr[1] && $explodedStr[1]) ) {
    					$count++;
    				}
    			}
    		}
    	}

    	if ( $count == 0 ) {
    		$error['error'] = 1;
    		$error['message'][] = 'There are no Test Cases defined by two integers separated by a single space.';
    	}

    	if ( $count != $this->data_t ) {
    		$error['error'] = 1;
    		$error['message'][] = 'The Number of Test Cases is not Equal to the Test Cases found on your input.';
    	}
		return $error;
    }

    public function validateTestCases()
    {
    	$error['error'] = 0;
    	$error['message'] = '';

    	$index = [];
    	foreach ($this->string as $key => $value) {
    		$explodedStr = explode(' ', $value);
    		if ( count($explodedStr) == 2 ) {
    			if ( is_numeric( $explodedStr[0] ) && is_numeric( $explodedStr[1] ) ) {
    				if ( ((int)$explodedStr[0] == $explodedStr[0]) && ((int)$explodedStr[1] && $explodedStr[1]) ) {
    					$index[] = $key;
    				}
    			}
    		}
    	}

    	for ($i=0; $i < (count( $this->string )) ; $i++) { 
    		if ( in_array($i, $index) ) {
    			$j = $i;
    			$array[$i][] = $this->string[$i];
    		}else{
    			$array[$j][] = $this->string[$i];
    		}
    	}

    	$queries = [];
    	$j = 0;
    	foreach ($array as $key => $value) {
    		for ($i=0; $i < count($value); $i++) { 
    			if ( $i == 0 ) {
    				$explodedStr = explode(' ', $value[$i]);
    				$n = $explodedStr[0];
    				$m = $explodedStr[1];
    				$queries[$j]['n'] = $n;
    				$queries[$j]['m'] = $m;
    			}else{
    				$queries[$j]['queries'][] = $value[$i];
    			}
    		}
    		$j++;
    	}

    	foreach ($queries as $key => $value) {
 			if ( (int)$value['m'] != count($value['queries']) ) {
				$error['error'] = 1;
    			$error['message'][] = 'Amount of queries is not equal to M parameter in the testcase number: '.($key+1);
			}	
    	}
    	return $error;
    }
}