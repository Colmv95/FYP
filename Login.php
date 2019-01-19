<?php
include "config.php";
//@author Colm Varain

if(isset($_POST['but_submit'])){
    $user = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']); //on login button click check if text in user and password fields match username and password in database
session_start();
$_SESSION['user'] = $user;

    if ($user != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$user."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        if($count > 0){
      
            header('Location: MemberMenu.php'); // if username and password found in db open member menu
        }else{
            echo "Invalid username and password"; 
        }

    }

}
?>
<html>
    <head>
        <title>Log In</title>
        <link href="css/style1.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Sign In" name="but_submit" id="but_submit" />
                    </div>
                    <input type="button" value="Go Back" class="button1" onclick="history.back()">
                </div>
            </form>
        </div>
    </body>
</html>

