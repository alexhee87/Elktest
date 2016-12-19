<?php

function switch_array($array)
{
    $tmp=array();
    //switch last 2 position
    $tmp[0] =  $array[0];
    $tmp[1] =  $array[2];
    $tmp[2] =  $array[1];
    return $tmp;
}

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

for($i = 0; $i < $totalRun; $i++) { // please do not remove this part

    //Step 1 : initialize Question class
    $obj = new Question();
    //Step 2 : Call the guess function, you want to put this in loop and break the loop if the answer is correct.

    $input1='123';
    $guessArray = array();
    for ($x = 0; $x <= 999; $x=$x+111) {
        //echo "The number is: $x <br>";
        if ($x === 0){
            $results = $obj->guess('000');
        }else{
            $results = $obj->guess($x);        
        }


        if ($results[0] == 1 || $results[1] == 1) {

            //@remark it can be auto assigned
            $guessArray[] = $x/111;

            /*
            if(!isset($guessArray[0])){
                $guessArray[0]=$x/111;
            }elseif(!isset($guessArray[1])){
                $guessArray[1]=$x/111;
            }elseif(!isset($guessArray[2])){
                $guessArray[2]=$x/111;
            }
            */
        }else if($results[0] == 2 || $results[1] == 2){
            $guessArray[] = $x/111;
            $guessArray[] = $x/111;
            /*
            if (!isset($guessArray[0])){
                $guessArray[0]=$x/111;
                $guessArray[1]=$x/111;
            } else {
                $guessArray[1]=$x/111;
                $guessArray[2]=$x/111;
            }
            */
        }
    }

    //var_dump($guessArray);
    if ((isset($guessArray[0])) && (isset($guessArray[1])) && (isset($guessArray[2]))){

        $answer = $obj->guess($guessArray[0].$guessArray[1].$guessArray[2]);
        if($answer === true){
            echo 'Correct answer is : '.$guessArray[0].$guessArray[1].$guessArray[2].'<br/>';
            //@Remarks : Instead of break, you should use continue because you will break the initial loop if you use break
            continue;
            //break;
        }
        //echo 'array 0 : ';
        //var_dump($guessArray);

        $tmpArr=switch_array($guessArray);
        //echo 'array 0a';
        //var_dump($tmpArr);
        $answer = $obj->guess($tmpArr[0].$tmpArr[1].$tmpArr[2]);
        if($answer === true){
            echo 'Correct answer is : '.$tmpArr[0].$tmpArr[1].$tmpArr[2].'<br/>';
            break;
        }

        for ($y = 1; $y < sizeof($guessArray); $y++) {

            $tmp_int = $guessArray[0];
            for ($z = 1; $z < sizeof($guessArray); $z++) {
                $guessArray[$z - 1] = $guessArray[$z];
            }
            $guessArray[sizeof($guessArray) - 1] = $tmp_int;
            //echo 'array ' .$y.': ';
            //var_dump($guessArray);
            $answer = $obj->guess($guessArray[0].$guessArray[1].$guessArray[2]);
            if($answer === true){
                echo 'Correct answer is : '.$guessArray[0].$guessArray[1].$guessArray[2].'<br/>';
                break;
            }

            $tmpArr=switch_array($guessArray);
            //echo 'array ' .$y.'a: ';
            //var_dump($tmpArr);
            $answer = $obj->guess($tmpArr[0].$tmpArr[1].$tmpArr[2]);
            if($answer === true){
                echo 'Correct answer is : '.$tmpArr[0].$tmpArr[1].$tmpArr[2].'<br/>';
                break;
            }


            //Remark: You are missing out some other cases here
            if($answer === false){
                echo 'Could not find the answer</br>';
            }

        }


    }

    //Use guess function from the question to guess, make sure your input is in string.


}