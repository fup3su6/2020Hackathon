<?php
error_reporting(0);
mysqli_query( "SET NAME ‘UTF8′");
mysqli_query( "SET CHARACTER_SET_CLIENT='utf8'");
mysqli_query( "SET CHARACTER_SET_RESULTS='utf8'");
$name=$_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$number=$_POST['number'];
$address=$_POST['address'];
$garden_label = $_POST['garden_label'];
$count=$_POST['count'];
$dept = $_POST['dept'];
$message = $_POST['message'];
$type = $_POST['type'];
$program = $_POST['program'];
$host = 'localhost';
$dbname = 'root';
$dbpw = 'root';
$db = 'order';

$conn = new mysqli($host, $dbname, $dbpw, $db);

if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

if($program == 1)
{
    $program = 300;
}
else if($program == 2)
{
    $program = 499;
}
else
{
    $program = 1000;
}

$sql="INSERT INTO `purchase`(`No`, `FarmName`, `Type`, `Amount`, `CustomName`, `Gender`, `Tel`, `Address`, `Mail`, `Payment`, `Income`) VALUES ('null','$garden_label','$type','$count','$name','$age','$phone','$address', '$email','$dept','$program')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$message = "訂單收到摟";
echo "<script type='text/javascript'>alert('$message');</script>";

header("refresh:3;url=generic.html");
exit();
?>