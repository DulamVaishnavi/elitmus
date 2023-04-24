<?php
// Get the POST data
$visited_page = $_POST['visited_page'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$time_spent = $_POST['time_spent'];

// Connect to the database
$host = 'sql305.epizy.com';
$username = 'epiz_34068661';
$password = 'EPaSnPI6ojN';
$dbname = 'epiz_34068661_game1';
$conn = new mysqli($host, $username, $password, $dbname);

// Convert the time value to seconds
$time_array = explode(':', $time_spent);
$time_seconds = ($time_array[0] * 3600) + ($time_array[1] * 60) + $time_array[2];

// Get the email where userid=1
$sql = "SELECT email FROM users WHERE userid = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row["email"];

    // Insert the data into the database
    $sql = "INSERT INTO user_sessions3 (email, visited_page, start_time, end_time, time_spent)
            VALUES ('$email', '$visited_page', FROM_UNIXTIME($start_time/1000), FROM_UNIXTIME($end_time/1000), SEC_TO_TIME($time_seconds))";
    if ($conn->query($sql) === TRUE) {
        echo "Page visit saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No user found with userid = 1";
}

// Close the database connection
$conn->close();
?>
