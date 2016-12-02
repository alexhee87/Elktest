<html>
<body>


    <?php
        include 'main.php';

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

    /* -- Print HTML Table -- */
    echo "<table border=\"1\" >";
    echo "<tr><th>Name</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Contact_no</th>";
    echo "<th>Password</th></tr>";
    for ( $counter = 0; $counter <= count($newPerson)-1; $counter ++) {
        echo('<tr>');
        printHTMLTable($newPerson,'name',$counter);
        printHTMLTable($newPerson,'age',$counter);
        printHTMLTable($newPerson,'gender',$counter) ;
        printHTMLTable($newPerson,'contact_no',$counter);
        printHTMLTable($newPerson,'Password',$counter) ;

        echo('</tr>');

    }
    echo('<tr>');
    echo('<td>Average Age</td>');
    echo('<td colspan="4">' .AveAge($newPerson) . '</td>');
    echo('</tr>');
    echo "</table>";

    /* -- End Print HTML Table -- */

    function printHTMLTable($arrayNewPerson = array(),$col,$i){
        if(isset( $arrayNewPerson[$i][$col])){
            echo('<td>' .$arrayNewPerson[$i][$col]  . '</td>');
        }
        else
        {
            echo('<td></td>');
        }
    }

    function AveAge($arrayNewPerson = array()){

        $TotalAge=0;
        $AveAge=0;
        for ( $counter = 0; $counter <= count($arrayNewPerson)-1; $counter ++) {
            if(isset( $arrayNewPerson[$counter]['age'])){
                $TotalAge=$TotalAge + $arrayNewPerson[$counter]['age'];
            }
            else
            {
                $TotalAge=$TotalAge+0;
            }
        }

        $AveAge=$TotalAge/count($arrayNewPerson);

        return $AveAge;

    }

    ?>

</body>
</html>








