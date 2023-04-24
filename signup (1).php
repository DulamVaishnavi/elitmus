
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://fonts.google.com/">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

  <style>
    body{
    background-image: url("images/signupbg.jpg"); 
    background-size: 1540px 1020px;
   }
  </style>

<div class="center">
  <h1>Sign UP</h1>
  <form action="signup.php" method="post">
   
      <div class="txt_field">
      <label>E-Mail</label> 
      <span></span>   
      <input type="text" id="email" name="email" required>
    </div>
    <div class="txt_field">
      
      <label> Create Password</label>
      <span></span>
      <input type="password" id="password" name="password"required>
    </div>
    <input type="submit" id="register" name="create" value="Login">
  </form>
</div>


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

// Insert new user into the users table
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
if ($conn->query($sql) === TRUE) {
  echo "User registered successfully";
  header("location:loginpage.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>

</body>
</html>
