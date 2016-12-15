<?php

class Question
{
	private $number;

	public function __construct(){
		$this->number = str_split('775');
	}

	public function guess($num){
		$guess = str_split($num);

		$samePosition = 0;
		$diffPosition = 0;

		$tempNum = $tempRemaining = $this->number;
		//check for same position 
		foreach($tempNum as $key=>$num){
			if($guess[$key] == $num){
				$samePosition++;
				unset($guess[$key]);
				unset($tempRemaining[$key]);
			}
		}

		//remaining can be in diff location
		foreach($guess as $key=>$value){
			if(in_array($value, $tempRemaining)){
				$diffPosition++;
			}
		}

		return ($samePosition == 3) ? true : array($samePosition,$diffPosition);
	}
}