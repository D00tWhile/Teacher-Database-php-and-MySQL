<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
	}
</style>
</head>
<body>
<p><b>Students and their contact information in alphabetical order by last name:</b></p>
<?php
$servername = "ucdencsesql05.ucdenver.pvt";
$username = "student34";
$password = "4klJU6PhX";
$dbname = "student34db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	} 

//Student alphabeticall names, phone, and email. 
$sql = "SELECT * FROM `STUDENT` ORDER BY Last_Name ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Student First Name</th><th>Student Last Name</th><th>Phone</th><th>Email</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["First_Name"]. "</td><td>" . $row["Last_Name"]. "</td><td>" . $row["Phone_Number"]. "</td><td>" . $row["Email"]. "</td></tr>";
     }
     echo "</table>";
	} 
	else {
     echo "0 results";
}	

$conn->close();
?> 
<p> <a href="https://csci3287s34.ucdenver.pvt"> Return to Main Menu</a>.</p>
</body>
</html>
