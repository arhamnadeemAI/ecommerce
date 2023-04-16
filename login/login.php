<?php
$login = false;
$showError = false;
if (isset($_POST['pass'])) 
{
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password);

if (!$con) {
	die("connection to this database failed due to" . mysqli_connect_error());
}
//echo "succes connecting to the db";
$p  = $_POST['pass'];
$e  = $_POST['email'];
$sql = "SELECT * FROM `registeration`.`register` WHERE Email = '$e' AND Password = '$p' ;";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if($num == 1)
{
	$login = true;
	if ($login == true) {
    echo "<strong>Success!</strong> Logged in succesfully.";
}
}
else
{
$showError = "Invalid Credentials";
echo "<strong>". $showError . "</strong>";
//echo "error: $sql <br> $con->error";
$con->close();
}
}
?> 