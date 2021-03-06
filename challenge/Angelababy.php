<?php

include 'question.php'; //include the question file

// Question made on 14 Dec 2016. [Alex Hee]
// You have one hour to finish this question
// This lesson will let you familiarize with php basic syntax and class.

// Task : This game is about guessing the correct 3 digits number.
// You can pass a 3 digit number to guess('111') function, and get the hint for the number you just passed in.
// For example, the answer is 775. And you passed pass in the guess number 570, you will get an array result. First element of the returned array is the exact number that matched that number. Second element is you have the number but it is not at the right position. In the example given, you will get array(1,1), because you have 7 in the second place matched the right number and position, and 1 number that is correct but not in the right position.
// And if you pass in 770, you will get array(2,0) because there are 2 numbers that is matched perfectly.
// if you guessed correctly, you will get a true.

//please do not change this part.
$totalRun = (isset($_GET['iteration']) && $_GET['iteration'] > 0) ? $_GET['iteration'] : 1;

for($i = 0; $i < $totalRun; $i++){ // please do not remove this part

    //Step 1 : initialize Question class
    $myQuestion = new Question();
    //Step 2 : Call the guess function, you want to put this in loop and break the loop if the answer is correct.
    //Use guess function from the question to guess, make sure your input is in string.
    $randomNumber = "000";
    $getResult = false;
    $j = 1;
    $Result = array(); //Remarks : always declare variable in small letter
    $ResultCount=0; //Remarks : be consistent, space before and after the assign
    $arrayResult;

    //@Remarks you forgot another case, if the answer is 000,111...999.
    //Indent the code properly with 4 space/tab to space[4 spaces]. 
    
    while($getResult==false) {
        $myResult = $myQuestion->guess($randomNumber);

        if (($myResult[0]>0 || $myResult[1]>0) && $randomNumber < 1000)
        {
           for($k = 0; $k < $myResult[0]; $k++)
            {
                $arrayResult =str_split($randomNumber);
                array_push($Result, $arrayResult[$k]);
            }
            if ($ResultCount==3) {
                $getResult = true;
                break;
            }
        }elseif($randomNumber > 999 || count($Result) == 3){
            break;
        }

        $randomNumber = $randomNumber + 111;
    }

    $getResult = false;
    $test = '';
    while(!$getResult) {
        $test = (string)$Result[0] . (string)$Result[1] . (string)$Result[2];
        $myResult = $myQuestion->guess($test);
        if ($myResult===true) {
            break;
         } else {
            shuffle($Result);
            $getResult = false;
        }
    }
    //var_dump($Result);
    echo 'Bryan answer is : '.$test.'<br/>';

}