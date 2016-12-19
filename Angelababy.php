<?php

//include the file "main.php" here
include 'main.php';

//dd($persons);

foreach($persons as $person=>&$loop )
{
    if (isset($loop['contact_no']))
    {
        $loop['password'] = md5($loop['contact_no']);
    }

    if (isset($loop['age']))
    {
        if ($loop['age']<18) {
            unset($loop['gender']);
        }
    }
}

$random = $_GET['random'];
$limit = $_GET['limit'];

    if ($random == 1) {
        shuffle($persons);
    }


if ($limit>0)
{
    $persons=array_slice($persons,0,$limit);
}

dd($persons);

//NOTE : we will have an array called $persons [refer to main], to print out the info and die, use dd($yourVar)
// 1. Loop through all the array and add additional data to each person called password,
// use md5 encryption as te password with the value from their mobile number.
// 2. For those who doesn't have contact number, the password will be empty
// 3. For those who are underage (18), remove the gender key from the array.
// 4. Retrieve a GET parameter called random and limit
//    If random is set to 1, randomize the array arrangement.
//    If limit is set and more than 0, limit the length of the array to the limit set.
//    Limit is only applicable if random is set to 1.

//when its done, create [your name].html, include it here, and print out the data in a list or table. At the end of the table, add in the average age of this group.

//last but not least, commit all your files and changes and push to server.