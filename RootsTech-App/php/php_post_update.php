<?php
$servername = "localhost";
$username = "darshan";
$password = "darshan";
$dbname="rootstech";
// Create connection
session_start();
$email=$_SESSION['user_mail'];
//$mail='asd@asd.com';
session_write_close();
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Database Connection Error";
}
else{
    if(true){
    $data = json_decode(file_get_contents("php://input"));
    $txt = mysqli_real_escape_string($conn,$data->txt);
    //$txt = 'asdasdsad';
    //$email = 'asd@asd.com';
    $date=Date('d M Y,H:i:s',time());
    $sql = "INSERT into messages(email,msgs,tmstamp) VALUES('$email','$txt','$date')";
    $result = $conn->query($sql);
    echo "Posted Successfully";
}
}
$conn->close();
exit();
?>