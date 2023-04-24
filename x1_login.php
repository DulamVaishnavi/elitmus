

<?php
// Establish database connection
$servername = "sql305.epizy.com";
$username = "epiz_34068661";
$password = "EPaSnPI6ojN";
$dbname = "epiz_34068661_game1";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the login form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the email and password from the form
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Check if the email and password are correct
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    // Login successful, set userid to 1
    $sql = "UPDATE users SET userid=1 WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
      echo "Login successful";
      header("location:level1story.html");
    } else {
      echo "Error updating record: " . $conn->error;
    }
  } else {
    // Login failed
    echo "Invalid email or password";
  }
}

// Close database connection
$conn->close();
?>
