<!-- Main -->
<?php
	$host = 'localhost';
	$dbname = 'root';
	$dbpw = 'root';
	$db = 'order';
	$account=$_POST['account'];
	$password=$_POST['password'];
	
	$conn = new mysqli($host, $dbname, $dbpw, $db);

	if($conn->connect_error)
	{
		die("Connection failed: ".$conn->connect_error);
	}

	$sql="SELECT * FROM `account` WHERE `FarmName` = '$account' AND `Password` = '$password'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		header('Location: ../cool/dashboard.php'.$account);
		exit();
		$show= "SELECT * FROM `booking`";
		
		$result2 = $conn->query($show) ;
		
	} 
	else {
		echo "<div>Login failed</div>";
		header('Location: login.html');
		exit();
	}
	$conn->close();
?>