<?php

include 'main.php';

/*dd($persons);*/

$newPerson = array();

foreach ($persons as $row)
{
   if(isset($row['contact_no'])){
       $row['Password']=md5($row['contact_no']);
   }
   else
   {

       $row['Password']="";
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




