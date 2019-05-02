<?php

include("connect.php");

//Third One
$name=$_GET["name"];
$lastname=$_GET["lastname"];
$selected=$_GET["selected"];

$sql="INSERT INTO `cloud_student`.students (`name`, `lastname`, `classroom`) VALUES ( '$name', '$lastname', '$selected');";

$result = new stdClass();

try
{
  $conn->query($sql);
  $result->status = "ok";
}
catch(Exception $e)
{
  $result->status = "error";
}

echo json_encode($result);


 ?>
