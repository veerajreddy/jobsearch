<?php
// Define database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobsearch";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form values
$name = $_POST['name'];
$current_address = $_POST['current_address'];
$permanent_address = $_POST['permanent_address'];
$degree = $_POST['degree'];
$university = $_POST['university'];
$year = $_POST['year'];
$award = $_POST['award'];
$company = $_POST['company'];
$position = $_POST['position'];
$duration = $_POST['duration'];
$activity = $_POST['activity'];
$skills = $_POST['skills'];

// Insert values into resume table
$sql = "INSERT INTO resume (name, current_address, permanent_address, degree, university, year, award, company, position, duration, activity, skills) 
        VALUES ('$name', '$current_address', '$permanent_address', '$degree', '$university', '$year', '$award', '$company', '$position', '$duration', '$activity', '$skills')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
