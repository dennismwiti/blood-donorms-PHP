<?php

if(isset($_GET['id'])){
$id=$_GET['id'];

include 'dbconnect.php';


$qry="delete from camps where id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location: deletedcampaign.php');
}else{
    echo"ERROR!!";
}
}
?>