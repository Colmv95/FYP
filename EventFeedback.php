<?php
   //@author Colm Varain
$servername = "sql2.freemysqlhosting.net"; //database details
$username = "sql2274553";
$password = "mR6%lK2*"; 
$dbname = "sql2274553";
session_start();
$puser = $_SESSION['user']; // check which user is logged in and display their Username
echo $puser;
$Event3 = ($_POST['txt_Event']);
$Feedback = ($_POST['txt_feed']); // Link textfields to corresponding rows in database
$username1 = ($_POST['txt_user']);
$Department = ($_POST['txt_dep']);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // connect to database 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
}
// on button click insert data from textfields into feedback table in the database 
if(isset($_POST['but_submit'])){ 
$sql = "INSERT INTO Feedback (Event, Feedback, username, Department)
VALUES ('$Event3', '$Feedback', '$username1', '$Department')";
if ($conn->query($sql) === TRUE) {
    echo "Your feedback has been added"; //if data added correctly display "Your feedback has been added"
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; 
}

}
$conn->close(); // close connection
?>



<!DOCTYPE HTML>
<html>
    <head>
   <title>Event Feedback</title>
   <link href="css/style1.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Event Feedback</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_Event" name="txt_Event" placeholder="add Event Name" />
                    </div>
                    <div>
                        <input type="text" class="textbox" id="txt_feed" name="txt_feed" placeholder="add your feedback here" />
                    </div>
                    <div>
                        <input type="text" class="textbox" id="txt_user" name="txt_user" placeholder="add your username"/>
                    </div>
                    <div>
                        <input type="Date" class="textbox" id="txt_dep" name="txt_dep" placeholder="add your department"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                    <input type="button" value="Go Back" class="button2" onclick="window.location.href='MemberMenu.php'" />
                </div>
            </form>
        </div>
    </body>
</html>
