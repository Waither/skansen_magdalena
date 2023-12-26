<?php
    function query(string $query) {

        // Connect with database
        $connect = new mysqli('mysql.db.mdbgo.com','waither550_admin','M4gdalena_','waither550_skansenmagdalena',3306);

        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: ".$connect->connect_error);
            return 0;
        }
        
        // Query
        $result = $connect->query($query)->fetch_all();
        return $result;
    }
    
?>