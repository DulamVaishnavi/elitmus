<?php
$email = $_POST['email'];
$password = $_POST['password'];

if ($email == 'leo@gmail.com' && $password == 'leo@gmail.com') {
  echo 'Login success!';
  header("location:userdisplay.php");
} else {
  echo 'Invalid email or password.';
}
?>
