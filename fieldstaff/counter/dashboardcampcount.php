<?php

$servername="localhost";
$uname="root";
$pass="";
$db="secyear";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM camps";
    $query = $conn->query($sql);

    echo "<h1>".$query->num_rows."</h1>";
?>