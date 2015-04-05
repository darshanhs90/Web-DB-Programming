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
    $mail_new = mysqli_real_escape_string($conn,$data->mail);
    $relation = mysqli_real_escape_string($conn,$data->relation);
    //$relation='Friend';
    //$mail_new='mail1@mail1.com';
    /*if($relation=='Friend'){
        $relativemail=$mail_new;
        $friendmail='';
    }
    else{
        $friendmail=$mail_new;
        $relativemail='';
    }*/
    $sql = "DELETE from relations where email='$mail' and relativemail='$mail_new' or friendmail='$mail_new'";
    $result = $conn->query($sql);
    if(mysqli_affected_rows($conn)==0){
    echo "Deletion Unsuccessful";   
    }
    else{
    echo "Deletion Successful";
}
} else {
    echo "Error while Deleting,Try Again";
}
}
$conn->close();
exit();
?>