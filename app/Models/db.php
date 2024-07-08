<?php 
    namespace  App\Models;

    require 'env.php';
    use PDO;

    class DB {
        function connect(){
            $connect = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.";charset=".DBCHARSET,DBUSER,DBPASS);
            return $connect;
        }
        
        function getData($query, $getAll = true){
            $conn = $this->connect();
            $stmt = $conn -> prepare($query);
            $stmt->execute();

            if($getAll){
                return $stmt ->fetchAll();
            }
            return $stmt->fetch();
        }
    }
?>