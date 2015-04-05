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
    //$mail='asd@asd.com';    
    $data = json_decode(file_get_contents("php://input"));
    $reln = mysqli_real_escape_string($conn,$data->reln);
    $name = mysqli_real_escape_string($conn,$data->name);
    $relation=$reln.' : '.$name;
$sql = "INSERT into family  (email,relation) VALUES('$mail','$relation')";
    $result = $conn->query($sql);
    echo $name.' Added Successfully as '.$reln;
}
}
$conn->close();
exit();
?>