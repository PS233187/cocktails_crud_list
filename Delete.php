<?php
include 'connect.php';
if(isset($_GET['deleteid'])){    // $id heb ik deleteid genoemd haalt de informatie op en verwijderd het op deze locatie
    $id=$_GET['deleteid'];

$sql="delete from `drankjes` where id=$id";
$result=mysqli_query($con, $sql);
if($result){
    header('location:display.php');                     
}


}
