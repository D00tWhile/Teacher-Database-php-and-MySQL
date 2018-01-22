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
<p><b>Lessons and the students who have taken each lesson in chronological and alphabetical order:</b></p>
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

// Lessons and the students who have taken each lesson in chronological and alpha order
$sql = "SELECT Lesson_Name, Date, Time, Taken_ID, Last_Name, First_Name, Student_ID
FROM `LESSONS` 
INNER JOIN `STUDENT`
ON Student_ID = Taken_ID 
ORDER BY Last_Name, Date LIMIT 0, 30 ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Lesson Name</th><th>Lesson Date</th><th>Lesson Time</th><th>Student First Name</th><th>Student Last Name</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["Lesson_Name"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["Time"]. "</td><td>" . $row["First_Name"]. "</td><td>" . $row["Last_Name"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
$conn->close();
?>  
<p> <a href="https://csci3287s34.ucdenver.pvt"> Return to Main Menu</a>.</p>
</body>
</html>
