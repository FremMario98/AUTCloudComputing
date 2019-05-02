<?php

$MyUserName = "root";
$Password = "";
$MyHostName="localhost";

$conn = new mysqli($MyHostName,$MyUserName,$Password);

if($conn->connect_error){
  die("Connection Failed: ".$conn->connect_error);
}
// -> is the same as object.something
//echo "Connected Successfully";


 ?>
