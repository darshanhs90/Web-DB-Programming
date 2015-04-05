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
    if(isset($_POST['email']) && isset($_POST['pwd'])){
    $email=($_POST['email']);
    $pwd=($_POST['pwd']);
    $fname=($_POST['fname']);
    $lname=($_POST['lname']);
    $lcn=($_POST['lcn']);
    $ppic=($_POST['ppic']);
    $look=($_POST['look']);
    $sql = "INSERT into users (fname,lname,email,pwd,lcn,look,ppic) VALUES('$fname','$lname','$email','$pwd','$lcn','$look','$ppic')";
    $result = $conn->query($sql);
    echo "Registration Successful";
}
}
$conn->close();
exit();
?>