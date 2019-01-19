<?php
//@author Colm Varain
$servername = "sql2.freemysqlhosting.net"; //database details
$username = "sql2274553";
$password = "mR6%lK2*"; 
$dbname = "sql2274553";
session_start();
$puser = $_SESSION['user'];
echo $puser;
$Event = ($_POST['txt_Event']);
$Event_Description = ($_POST['txt_EvDesc']); // Link textfields to corresponding rows in database
$Location = ($_POST['txt_Loca']);
$Date = ($_POST['txt_locdate']);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // connect to database 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  
// on button click enter event details from textfields into database
if(isset($_POST['but_submit'])){
$sql = "INSERT INTO Events1 (Event, Event_Description, Location, Date)
VALUES ('$Event', '$Event_Description', '$Location', '$Date')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; 
}

}
$conn->close(); // close connection
?>


<!DOCTYPE HTML>
<html>
    <head>
   <title>Events</title>
   <link href="css/style1.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Events</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_Event" name="txt_Event" placeholder="add Event" />
                    </div>
                    <div>
                        <input type="text" class="textbox" id="txt_EvDesc" name="txt_EvDesc" placeholder="add Event Description" />
                    </div>
                    <div>
                        <input type="text" class="textbox" id="txt_Loca" name="txt_Loca" placeholder="add Event Location"/>
                    </div>
                    <div>
                        <input type="Date" class="textbox" id="txt_locdate" name="txt_locdate" placeholder="add Proposed Event Date"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                    <input type="button" value="Go Back" class="button2" onclick="history.back()">
                </div>
            </form>
        </div>
    </body>
</html>
