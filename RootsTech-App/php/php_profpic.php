<?php
session_start();
$username = "darshan";
$password = "darshan";
$dbname="rootstech";
$servername = "localhost";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Database Connection Error";
}
else{/*
if(true){
$mail='asd@asd.com';*/
if(isset($_POST['mail'])){
$mail=$_POST['mail'];
$sql = "SELECT ppic FROM users WHERE email='$mail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
 session_regenerate_id();
 while($row = $result->fetch_assoc()) {
    $link=$row['ppic'];
    echo $link;
    }
  }
    else{
        echo "No image";
  exit();
    }
} else {
    echo "No image";
  exit();
}
$conn->close();
exit();
}
?>