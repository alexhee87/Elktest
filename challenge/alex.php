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
    $question = new Question();

    echo $question->guess('757');die;

	//Step 2 : Call the guess function, you want to put this in loop and break the loop if the answer is correct.
	//Use guess function from the question to guess, make sure your input is in string.

    $initialGuess = array(
        '000',
        '111',
        '222',
        '333',
        '444',
        '555',
        '666',
        '777',
        '888',
        '999'
    );

    $possibleCombination = array(
        '012','021','120','102','201','210'
    );

    $correctNumber = array();
    $totalTries = 0;
    $found = false;

    foreach($initialGuess as $guess){
        $tips = $question->guess($guess);
        $existFrequency = $tips[0] + $tips[1];

        if($tips == true){
            echo 'Correct answer is : '.$guess;
            $found = true;
            break;
        }

        if($existFrequency){
            for($j=0; $j < $existFrequency; $j++){
                $correctNumber[] = $guess{0};
            }
            $totalTries += $existFrequency;
        }

        if($totalTries == 3){
            break;
        }
    }

    if($found){
        continue;
    }

    foreach($possibleCombination as $combination){
        $guessNum = $correctNumber[$combination{0}].$correctNumber[$combination{1}].$correctNumber[$combination{2}];
        $answer = $question->guess($guessNum);

        if($answer === true){
            echo 'Correct answer is : '.$guessNum.' Total tries :'.$question->call.'<br/>';
            break;
        }
    }
}