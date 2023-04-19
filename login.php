
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
  // Redirect to login page
  header("Location: login.html");
  exit();
}

// Get user input from login form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Validate user input
if (empty($username) || empty($password)) {
  // Display error message and redirect to login page
  echo "Please enter a username and password";
  header("Location: login.html");
  exit();
}

// Prepare and execute SQL statement with parameterized query
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists in database
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();

  // Verify the user's password
  if (password_verify($password, $row['password'])) {
    // Redirect to jobsearch.html
    header("Location: jobsearch.html");
    exit();
  } else {
    // Display error message and redirect to login page
    echo "Incorrect password";
    header("Location: login.html");
    exit();
  }
} else {
  // Display error message and redirect to login page
  echo "User not found";
  header("Location: login.html");
  exit();
}

// Close connection
$stmt->close();
$conn->close();
?>