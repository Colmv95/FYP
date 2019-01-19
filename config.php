<?php
//@author Colm Varain
session_start();

$servername = "sql2.freemysqlhosting.net";  /* Servers name */
$username = "sql2274553";  /* Database Username */
$password = "mR6%lK2*"; /* Database password */
$dbname = "sql2274553"; /* Database name */

$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection to db
if (!$con) {
 die("Connection failed: " . mysqli_connect_error()); // if there is an error close page
}