<?php
 require_once('signup_connection.php');
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://fonts.google.com/">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div>
    <?php
    if(isset($_POST['create'])){
      
     
      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = "SELECT email FROM signup WHERE email=?";
      $stmt = $db->prepare($sql);
      $stmt->execute([$email]);
      $existingEmail = $stmt->fetchColumn();
      if($existingEmail) {
    
        echo "Email already exists";
      }
      else{
        $sql = "INSERT INTO signup(email,password) VALUES(?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([ $email,  $password]);
      if($result){
          echo 'successfully registered';
        header("location:loginpage.html");
        exit;
      }
      else{
          echo 'problem registering';
      }
    }
    
    }
    ?>	
  </div>
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

</body>
</html>
