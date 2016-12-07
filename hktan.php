<?php

//include the file "main.php" here
include "main.php";

//NOTE : we will have an array called $persons [refer to main], to print out the info and die, use dd($yourVar)
//dd($persons);

// 1. Loop through all the array and add additional data to each person called password,
// use md5 encryption as the password with the value from their mobile number.
// 2. For those who doesn't have contact number, the password will be empty
// 3. For those who are underage (18), remove the gender key from the array.
// 4. Retrieve a GET parameter called random and limit
//    If random is set to 1, randomize the array arrangement.
//    If limit is set and more than 0, limit the length of the array to the limit set.
//    Limit is only applicable if random is set to 1.

foreach($persons as $person => &$x_value) {
    if (isset($x_value['contact_no']))  {
        $x_value['password'] = md5($x_value['contact_no']);
    }
    else {
        $x_value['password'] =  '';
    }

    if (isset($x_value['age'])){
        if ($x_value['age'] < 18) {
            unset($x_value['gender']);
        }
    }
}

$random = htmlspecialchars($_GET["random"]);
$limit  = htmlspecialchars($_GET["limit"]);

if (isset($random)) {
    if ($random == 1) {
        shuffle($persons);

        if ($limit > 0) {
            $persons = array_slice($persons, 0, $limit);
        }
    }
}

dd($persons);
/**
 * Useful readups :
 * http://php.net/manual/en/book.var.php
 * http://php.net/manual/en/language.references.php
 * http://php.net/manual/en/book.array.php
 */


//when its done, create [your name].html, include it here, and print out the data in a list or table. At the end of the table, add in the average age of this group.

//last but not least, commit all your files and changes and push to server.