<?php

class ConDB
{
    
    function connectToDB()
    {
        try {
            return $pdo = new PDO('mysql:host=127.0.0.1;dbname=tutorial', 'root', '');

        } catch (PDOExceotion $e) {
            die($e->getMessage());
        }
    }

    function SaveImageToDB($sitename, $local_path, $picture_name, $ext_type, $created_at, $size, $dimension_x, $dimension_y)
    {

        try {

            $Conn = new ConDB();
            $dbh =$Conn->connectToDB();

            $stmt = $dbh->prepare('INSERT INTO imageinfo (sitename , local_path, picture_name,ext_type,created_at,size,dimension_x,dimension_y) VALUES (:sitename , :local_path, :picture_name,:ext_type,:created_at,:size,:dimension_x,:dimension_y)');
            $stmt->bindParam(':sitename', $sitename);
            $stmt->bindParam(':local_path', $local_path);
            $stmt->bindParam(':picture_name', $picture_name);
            $stmt->bindParam(':ext_type', $ext_type);
            $stmt->bindParam(':created_at', $created_at);
            $stmt->bindParam(':size', $size);
            $stmt->bindParam(':dimension_x', $dimension_x);
            $stmt->bindParam(':dimension_y', $dimension_y);
            $stmt->execute();

            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}
?>