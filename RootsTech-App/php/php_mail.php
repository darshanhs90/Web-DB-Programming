<?php
$servername = "localhost";
$username = "darshan";
$password = "darshan";
$dbname="rootstech";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Database Connection Error";
}
else{
    if(isset($_POST['mail'])){
    $mail=$_POST['mail'];
    $sql = "SELECT * FROM users WHERE email='$mail'";
    $result = $conn->query($sql);
    if($result->num_rows >0){
    echo "0";
    }
    else{
        echo "1";
    }
}
}
$conn->close();
exit();
?>