<?php

    function connectToDB()
    {
        try {
            return $pdo = new PDO('mysql:host=127.0.0.1;dbname=mytodo', 'root', '');
        } catch (PDOExceotion $e) {
            die($e->getMessage());
        }
    }

    function insert($table, $rows, $values) {
        $params = rtrim(", ", str_repeat("?, ", count($values)));
        try {
            $stmt = $this->prepare("INSERT INTO $table ($rows) VALUES ($params)");
            for($i = 1; $i <= count($values); $i++) {
                $stmt->bindValue($i, $values[$i-1]);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Oops... {$e->getMessage()}";
        }
}


?>