<?php

$connection = new mysqli('mysql.hostinger.es', "u485235902_admin", "123456", "u485235902_misco");
//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
?>