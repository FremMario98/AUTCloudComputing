
<?php

//Second One
include("connect.php");

$sql = "SELECT * FROM cloud_student.students ";
$result = $conn->query($sql);

$students = [];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$student =  new stdClass();
		$student->id = $row["id"];
		$student->name = $row["name"];
		$student->lname = $row["lastname"];
		$student->classroom = $row["classroom"];
        array_push($students, $student);
    }
}
echo json_encode($students);




// First One
// $students = [];
//
// $student =  new stdClass();
// $student->name = "Name 1";
// $student->lname = "LName 1";
// $student->classroom = "Class 1";
//
// $student2 =  new stdClass();
// $student2->name = "Name 2";
// $student2->lname = "LName 2";
// $student2->classroom = "Class 2";
//
// $student3 =  new stdClass();
// $student3->name = "Name 3";
// $student3->lname = "LName 3";
// $student3->classroom = "Class 3";
//
// array_push($students, $student);
// array_push($students, $student2);
// array_push($students, $student3);
//
// echo json_encode($students);
?>
