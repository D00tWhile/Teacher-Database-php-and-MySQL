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
<p><b>Student's history of lessons taken since 9/1/2016 with lessons taken, total number of lessons</b></p>
<p><b>accomplished, and the total price paid for all lessons taken.:</b></p>
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
$sql = "SELECT Lesson_Name, Time, Date, Lesson_Accomplished, First_Name, Last_Name,  Lessons_Taken, SUM(Price) AS Total_Paid
FROM LESSONS
LEFT OUTER JOIN STUDENT ON STUDENT.Student_ID = LESSONS.Taken_ID
WHERE Date
BETWEEN '2016-09-01'
AND '2016-12-30'
GROUP BY Lesson_Name";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Lesson Name</th><th>Lesson Date</th><th>Lesson Time</th><th>Total Lessons Accomplished</th><th>Student First Name</th><th>Student Last Name</th><th>Total Lessons Taken</th><th>Total Paid in Dollars</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["Lesson_Name"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["Time"]. "</td><td>" . $row["Lesson_Accomplished"]. "</td><td>" . $row["First_Name"]. "</td><td>" . $row["Last_Name"]. "</td><td>" . $row["Lessons_Taken"]. "</td><td>" . $row["Total_Paid"]. "</td></tr>";
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
