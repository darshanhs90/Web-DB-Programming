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
else{
/*if(true){
$mail='asd@asd.com';
$password='asdasdasd';
*/if(isset($_POST['mail']) && isset($_POST['password'])){
$mail=$_POST['mail'];
$password=$_POST['password'];
$sql = "SELECT pwd FROM users WHERE email='$mail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
 session_regenerate_id();
 while($row = $result->fetch_assoc()) {
    $link=$row['pwd'];
    if($link==$password){
         $_SESSION['user_mail'] = $mail;
  session_write_close();
  //echo "login";
  header('Location: ../home.php');
  exit();
    }
    else{
        echo "Invalid Credentials,Login Failed";
  //header('Location: ../signIn.php');
  exit();
    }
 }
 //recommended since the user session is now authenticated
 
} else {
    echo "Invalid Credentials,Login Failed";
  //header('Location: ../signIn.php');
  exit();
}
$conn->close();
}
}
?>