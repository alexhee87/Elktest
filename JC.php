<?php

include 'main.php';

/*dd($persons);*/

$newPerson = array();

foreach ($persons as $row)
{
   if(isset($row['contact_no'])){
       $row['Password']=md5($row['contact_no']);
   }

    if($row['age']<18){
        unset($row['age']);

    }
    $newPerson[]=$row;
}


if(isset($_GET['random']) && $_GET['random']==1){

    shuffle($newPerson);
}


if(isset($_GET['limit']) && $_GET['limit']>0){

    $newPerson= array_slice($newPerson,0, $_GET['limit']);
}

dd($newPerson);

/*
for ($row = 0; $row < 2; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col <= 3; $col++) {
        echo "<li>".$persons[$row][$col]."</li>";
    }
    echo "</ul>";
}
*/
?>




//include the file "main.php" here

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

//last but not least
