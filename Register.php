<?php
//@author Colm Varain
$servername = "sql2.freemysqlhosting.net"; //database details
$username = "sql2274553";
$password = "mR6%lK2*";
$dbname = "sql2274553";
session_start();
$puser = $_SESSION['user'];  

$username1 = ($_POST['txt_uname']);
$user1 = ($_POST['txt_name']);  // Link textfields to corresponding rows in database
$password1 = ($_POST['txt_pwd']);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // connect to database 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['but_submit'])){
$sql = "INSERT INTO users (username, name, password)
VALUES ('$username1', '$user1', '$password1')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; 
}

}
$conn->close();
?>


<!DOCTYPE HTML>
<html>
    <head>
   <title>Register</title>
   <link href="css/style1.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Register</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_name" name="txt_name" placeholder="add Employee name" />
                    </div>
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="add new Username" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="add new Password"/>
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