<!DOCTYPE html>
<html>
  <head>
    <title>User Data</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
      }

      th {
        background-color: #f2f2f2;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      tr:hover {
        background-color: #ddd;
      }
    </style>
  </head>
  <body>
   <button><a href="index.html">go to home</a></button>
    <h1><b>DISPLAY THE TOTAL TIME SPENT BY THE USER IN EACH LEVEL</b></h1>
    <table>
      <tr>
        <th>User</th>
        <th>Page</th>
        <th>Time Spent</th>
      </tr>
    
      <!-- table rows generated by PHP code -->
      <?php
        // Connect to the database
        $host = 'sql305.epizy.com';
        $username = 'epiz_34068661';
        $password = 'EPaSnPI6ojN';
        $dbname = 'epiz_34068661_game1';
        $conn = new mysqli($host, $username, $password, $dbname);

        // Get the distinct emails from the user_sessions tables
        $sql = "SELECT DISTINCT email FROM user_sessions UNION SELECT DISTINCT email FROM user_sessions2 UNION SELECT DISTINCT email FROM user_sessions3 UNION SELECT DISTINCT email FROM user_sessions4";
        $result = $conn->query($sql);

        // Loop through each email
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];

            // Get the time spent on each page for this user
            $sql2 = "SELECT visited_page, SEC_TO_TIME(SUM(TIME_TO_SEC(time_spent))) AS time_spent FROM (
                        SELECT visited_page, time_spent FROM user_sessions WHERE email='$email' 
                        UNION ALL SELECT visited_page, time_spent FROM user_sessions2 WHERE email='$email' 
                        UNION ALL SELECT visited_page, time_spent FROM user_sessions3 WHERE email='$email' 
                        UNION ALL SELECT visited_page, time_spent FROM user_sessions4 WHERE email='$email'
                    ) AS all_sessions GROUP BY visited_page";
            $result2 = $conn->query($sql2);

            // Display the table for this user
            while ($row2 = $result2->fetch_assoc()) {
                $visited_page = $row2['visited_page'];
                $time_spent = $row2['time_spent'];
                echo "<tr><td>$email</td><td>$visited_page</td><td>$time_spent</td></tr>";
            }
        }

        // Close the database connection
        $conn->close();
      ?>
    </table>
  </body>
</html>