<?php 
    $conn=pg_connect("host = localhost port = 5432 dbname = baze_poa user = postgres password = Xtreme@123");
    if(!$conn){
        die(pg_last_error($conn));
    }
?>