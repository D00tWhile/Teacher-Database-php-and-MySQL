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
<p><b>Bill for students who took lessons last month (October 2016):</b></p>
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

// Bill for a student who took lessons last month 
$sql = "SELECT Student_ID, First_Name, Last_Name, SUM(Price) AS 'Current_Balance' 
FROM LESSONS
INNER JOIN STUDENT ON STUDENT.Student_ID = LESSONS.Taken_ID
WHERE Date
BETWEEN '2016-10-01'
AND '2016-11-01'
GROUP BY Student_ID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Amount Due in Dollars</th><th>Student First Name</th><th>Student Last Name</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["Current_Balance"]. "</td><td>" . $row["First_Name"]. "</td><td>" . $row["Last_Name"]. "</td></tr>";
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
