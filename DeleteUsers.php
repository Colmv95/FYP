<?php
//@author Colm Varain
$servername = "sql2.freemysqlhosting.net"; //database details
$username = "sql2274553";
$password = "mR6%lK2*";
$dbname = "sql2274553";
session_start();
$puser = $_SESSION['user'];
echo $puser;
$username1 = ($_POST['txt_uname']); // Link textfields to corresponding rows in database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // connect to database 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// if username found in db remover and display "User Successfully Removed"
if(isset($_POST['but_submit'])){ 
$sql = "DELETE FROM users WHERE username = '$username1'";


if ($conn->query($sql) === TRUE) {
    echo "User Successfully Removed"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close(); //close connection
?>


<!DOCTYPE HTML>
<html>
    <head>
   <title>Remover User</title>
   <link href="css/style1.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Remover User</h1>
    
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Remove user by Username" />
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

