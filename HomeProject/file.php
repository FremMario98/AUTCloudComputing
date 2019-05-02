<?php

include("connect.php");


$name=$_GET["name"];
$lastname=$_GET["lastname"];
$age=$_GET["age"];
$email=$_GET["email"];

echo "Greetings ".$name." ";
echo $lastname." Your Email ";
echo $email." Is Accepted And You Are ";
echo $age." Years Old";




$sql="INSERT INTO `cloud_student`.people (`name`, `lastname`, `email`, `age`, `id`) VALUES ( '$name', '$lastname', '$age',`$email`,`NULL`);";

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
