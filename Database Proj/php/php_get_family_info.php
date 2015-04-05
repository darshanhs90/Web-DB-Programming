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
    $sql = "SELECT relation from family where email='$mail'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    $outp='';
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $outp .= $rs["relation"].' ';
}
echo($outp);
} else {
    echo "''";
}
}
}
$conn->close();
exit();
?>