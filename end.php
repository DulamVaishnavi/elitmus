<!DOCTYPE html>
<head>

</head>
<body>
    <style>
      body{
        background-image: url("images/deadbg.jpg");
        background-size: 1535px 765px;
      }
      img{
        position: relative;
        top:250px;
        left:580px;
      }
      #msg{
        position: absolute;
        top: 60px;
        left:850px;
      }
      p{
        position: absolute;
        top: 120px;
        left: 1000px;
      
      }
  
      .button {
        background-color: #1c87c9;
        -webkit-border-radius: 60px;
        border-radius: 60px;
        border: none;
        color: #eeeeee;
        cursor: pointer;
        display: inline-block;
        font-family: sans-serif;
        font-size: 20px;
        padding: 5px 15px;
        text-align: center;
        text-decoration: none;
        position: absolute;
        top: 690px;
        left:800px;
      }
      @keyframes glowing {
        0% {
          background-color: #106587;
          box-shadow: 0 0 5px  #106587;
        }
        50% {
          background-color:  #106587;
          box-shadow: 0 0 20px  #106587;
        }
        100% {
          background-color:  #106587;
          box-shadow: 0 0 5px  #106587;
        }
      }
      .button {
        animation: glowing 1300ms infinite;
      }
    </style>
    <img id="msg" src="images/dead.png"  style="width: 500px;height: 400px;">
    <p style="color: rgb(14, 255, 231);font-size:35px;"><b>congrats<br>you have succeeded<br> in finding Leo </p>
    <img src="images/end1.png">

    <form method="post" action="">
      <input class="button"type="submit" name="submit" value="play Again">
    </form>
    <?php
// Start the session

// Start the session
session_start();

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the user ID from the session
  $userid = $_SESSION['userid'];

  // Destroy the session to log out the user
  session_destroy();

  // Update the user's record in the database
  $host = 'sql305.epizy.com';
  $username = 'epiz_34068661';
  $password = 'EPaSnPI6ojN';
  $dbname = 'epiz_34068661_game1';
  $conn = new mysqli($host, $username, $password, $dbname);

  // Check for errors in the database connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE users SET userid=0 WHERE userid='$userid'";
  $result = $conn->query($sql);

  // Check for errors in the query
  if (!$result) {
    die("Error updating record: " . $conn->error);
  }

  // Close the database connection
  $conn->close();

  // Redirect the user to the login page
  header("Location: index.html");
  exit();
}
?>




  
  </body>