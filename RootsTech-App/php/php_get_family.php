<?php
$servername = "localhost";
$username = "darshan";
$password = "darshan";
$dbname="rootstech";
// Create connection
session_start();
$mail=$_SESSION['user_mail'];
session_write_close();
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Database Connection Error";
}
else{
    if(true){
    $sql = "SELECT * FROM family  where email='$mail'";
    
    $result = $conn->query($sql);
    echo $name.' Added Successfully as '.$reln;
}
}
$conn->close();
exit();
?>