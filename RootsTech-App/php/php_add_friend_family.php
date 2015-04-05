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
    $field = mysqli_real_escape_string($conn,$data->field);
    
    //$mail_new='mail@mail.com';
    //$field='relative';
    if($field=='Friend')
    {
        //echo "friend added";
        $friendmail=$mail_new;
        //$relativemail='';
    }
    else{
        echo "relative added";
        $relativemail=$mail_new;
        $friendmail='';
    }
$sql = "INSERT into relations (email,relativemail,friendmail) VALUES('$mail','$relativemail','$friendmail')";
    $result = $conn->query($sql);
    echo $field." Added Successfully";
}
}
$conn->close();
exit();
?>