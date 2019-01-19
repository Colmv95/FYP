<?php
//@author Colm Varain
$servername = "sql2.freemysqlhosting.net"; //database details
$username = "sql2274553";
$password = "mR6%lK2*";
$dbname = "sql2274553";
session_start();
$puser = $_SESSION['user']; // check which user is logged in and display their Username
echo "Logged In:",$puser;
$user = mysqli_real_escape_string($con,$_POST['txt_uname']);
// Create connection to db
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection to db
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT member_id, username FROM users WHERE username='$puser'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<html>
    <head>
        <title>Sports and Social Events</title>
        <link href="css/style1.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Event Voting</h1>
                        <input type="button" value="Submit Event" name="but_submit" class="button" onclick="window.location.href='AddEvents.php'" />
                        <input type="button" value="Vote on Upcoming Events" name="but_submit" class="button" onclick="window.location.href='EventVoting.php'" />
                        <input type="button" value="Feedback" name="but_submit" class="button" onclick="window.location.href='EventFeedback.php'" />
                        <input type="button" value="Go Back" class="button1" onclick="history.back()">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>