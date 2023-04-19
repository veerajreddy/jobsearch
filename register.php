<?php
// Set database information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobsearch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user input from registration form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash password before storing it in the database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user information into the users table
$sql = "INSERT INTO users (username, email, password)
VALUES ('$username', '$email', '$hashed_password')";

// Add UNIQUE constraint to username column
$sql2 = "ALTER TABLE users ADD CONSTRAINT unique_username UNIQUE (username)";

// Execute SQL statements
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  // Check if username already exists
  if ($conn->errno == 1062) {
    echo "Error: Username already exists";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if ($conn->query($sql2) === TRUE) {
  // UNIQUE constraint added successfully
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
