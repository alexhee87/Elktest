<?php

class Question
{
	private $number;
	private $totalTries;
	private static $loop = 0;

	public function __construct(){
		$this::$loop++;
		$this->totalTries = 0;
		$this->number = str_split(str_pad(rand(0,999), 3, 0, STR_PAD_LEFT));
	}

	public function guess($num){
		$this->totalTries++;
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

		if($samePosition == 3){
			$answer = implode('',$this->number);
			echo 'Total tries for loop '.$this::$loop.' is '.$this->totalTries.' tries. (Answer :'.$answer.' )<br/>';
			return true;
		}

		return array($samePosition,$diffPosition);

	}
}