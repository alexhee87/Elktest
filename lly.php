<?php

//include the file "main.php" here
include 'main.php';

//dd ($persons);
$newPersons = array();
foreach ($persons as $person) {
    if(isset ( $person['contact_no'])){
        $person['password'] = md5($person['contact_no'] );
    }
    else{
        $person['password']='';
    }
    if ((isset($person['age'])) &&((int)$person['age'] < 18)) {
        //echo $person['age'];
        //echo '<br>';
        unset($person['age']);
    }
    $newPersons[] = $person;

}

if ((isset($_GET['random'])) && ($_GET['random']==1 )){
    shuffle($newPersons);
}

//$newPersons1= array();

if ((isset($_GET['limit'])) && ($_GET['limit']>0 )){
//    for ($counter = 0; $counter <($_GET['limit']); $counter++) {
//        $newPersons1[$counter] = $newPersons[$counter];
//    }
    echo count($newPersons);
    $limit = $_GET['limit'];
    //array_slice($newPersons,count($newPersons)-($_GET['limit']));
    $newPersons = array_slice($newPersons, 0, $limit);
}

dd($newPersons);
//dd($persons);

//NOTE : we will have an array called $persons [refer to main], to print out the info and die, use dd($yourVar)
// 1. Loop through all the array and add additional data to each person called password,
// use md5 encryption as the password with the value from their mobile number.
// 2. For those who doesn't have contact number, the password will be empty
// 3. For those who are underage (18), remove the gender key from the array.
// 4. Retrieve a GET parameter called random and limit
//    If random is set to 1, randomize the array arrangement.
//    If limit is set and more than 0, limit the length of the array to the limit set.
//    Limit is only applicable if random is set to 1.

/**
 * Useful readups :
 * http://php.net/manual/en/book.var.php
 * http://php.net/manual/en/language.references.php
 * http://php.net/manual/en/book.array.php
 */


//when its done, create [your name].html, include it here, and print out the data in a list or table. At the end of the table, add in the average age of this group.

//last but not least, commit all your files and changes and push to server.