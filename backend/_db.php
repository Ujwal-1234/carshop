<?php
global $conn;
$conn = mysqli_connect("localhost", "root", "", "carshop");
if(!$conn){
    echo "database not connected ".mysqli_connect_error();
}
?>