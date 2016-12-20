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
    $objQuestion = new Question();
    $guessPossibleNumber='';
    for ($counter=0;$counter<=999;$counter=$counter+111) {
        $result = $objQuestion->guess(strval(($counter=='0') ? '000' : $counter));

        //@Remarks : What is the result is true, in the case of 000,111...999?
        if ( $result[0] >=1 ) {
            echo "Guess Number" . strval($counter).'<br>' ;

            for($counterResult=1; $counterResult<=$result[0]+$result[1]; $counterResult++){
                $guessPossibleNumber .= strval($counter){0}  ;
            }
//            if ($result[0]==1) {
//                $guessPossibleNumber =   $guessPossibleNumber . substr(strval($counter), 0, 1) ;
//
//            }
//            else if ($result[0]==2){
//                $guessPossibleNumber =   $guessPossibleNumber . substr(strval($counter), 0, 1) ;
//                $guessPossibleNumber =   $guessPossibleNumber . substr(strval($counter), 0, 1) ;
//
//            }
//            else {
//                $guessPossibleNumber =   $guessPossibleNumber . substr(strval($counter), 0, 1) ;
//                $guessPossibleNumber =   $guessPossibleNumber . substr(strval($counter), 0, 1) ;
//                $guessPossibleNumber =   $guessPossibleNumber . substr(strval($counter), 0, 1) ;
//
//            }

        }

    }

    $possibleCombination = array(
        '012','021','120','102','201','210'
    );

    foreach ($possibleCombination as $rowArr){

        $GuessNum=$guessPossibleNumber[$rowArr{0}].$guessPossibleNumber[$rowArr{1}].$guessPossibleNumber[$rowArr{2}];
        $result = $objQuestion->guess($GuessNum);

        if($result === true){
            echo "This is the Result = ".$GuessNum;
            break;
        }

    }
}