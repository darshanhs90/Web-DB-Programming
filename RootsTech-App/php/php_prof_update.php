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
    if(true){
    $data = json_decode(file_get_contents("php://input"));
    $fname = mysqli_real_escape_string($conn,$data->fname);
    $lname = mysqli_real_escape_string($conn,$data->lname);
    $email = mysqli_real_escape_string($conn,$data->email);
    $pwd = mysqli_real_escape_string($conn,$data->pwd);
    $lcn = mysqli_real_escape_string($conn,$data->lcn);
    $ppic = mysqli_real_escape_string($conn,$data->ppic);
    $sql = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`pwd`='$pwd',`lcn`='$lcn',`ppic`='$ppic' WHERE email='$email'";
    $result = $conn->query($sql);
    echo "Update Successful";
}
}
$conn->close();
exit();
?>