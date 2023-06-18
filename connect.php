<?php

$con=new mysqli('localhost', 'root','', 'cocktails'); //hier maak ik de connectie met de database 

if(!$con){
   die(mysqli_error($con));
}

?>