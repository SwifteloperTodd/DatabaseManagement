<html>
	<head>
	</head>
	<body>
		<form action="" method="post">
			<label for="name">User Email</label>
			<input type="text" name="email" id="email">
			<br/>
			<br/>

			<input type="submit" name="search" id="search">
			<br/>
		</form>
	</body>
</html> 
<?php

$email="";
if($_SERVER["REQUEST_METHOD"]== "POST") {
	$conn = new mysqli('localhost', 'root', '', 'caradvertising');
	if ($conn->connect_error) {
		echo "connection failed";
		die("Connection failed: " . $conn->connect_error);
	}
	$email=$_POST['email'];

	echo "<h4>Showing information for user with email $email</h4>";
	
	echo "<h3>User Info</h3>";
	$resultSet = $conn->query("SELECT * FROM users WHERE email='$email'");
	if ($resultSet->num_rows != 0) {
		while ($rows = $resultSet->fetch_assoc()) {
			$firstname = $rows['firstname'];
			$lastname = $rows['lastname'];
			$email = $rows['email'];
			echo "<p>First: $firstname, Last: $lastname, Email: $email</p>";
		}
		
		echo "<h3>Driver Info</h3>";
		$resultSet = $conn->query("SELECT * FROM driver WHERE email='$email'");
		if ($resultSet->num_rows != 0) {
			echo "<p>User is a Driver</p>";
			
			echo "<h3>Vehicle Info</h3>";
			$resultSet = $conn->query("SELECT * FROM vehicle WHERE driver_email='$email'");
			if ($resultSet->num_rows != 0) {
				while ($rows = $resultSet->fetch_assoc()) {
					$make = $rows['make'];
					$model = $rows['model'];
					$year = $rows['year_made'];
					echo "<p>Make: $make, Model: $model, Year: $year</p>";
				}
			}
		} else {
			echo "<p>User is NOT a Driver</p>";
		}
		
		echo "<h3>Advertiser Info</h3>";
		$resultSet = $conn->query("SELECT * FROM advertiser WHERE email='$email'");
		if ($resultSet->num_rows != 0) {
			echo "<p>User is an Advertiser</p>";
			while ($rows = $resultSet->fetch_assoc()) {
				$companyname = $rows['companyname'];
				echo "<p>Company Name: $companyname</p>";
			}
		} else {
			echo "<p>User is NOT an Advertiser</p>";
		}
	} else {
		echo "<p>No users with email: $email</p>";
	}
}
else {
	echo "<p>Submit Query has not been hit yet.</p>";
}

?>