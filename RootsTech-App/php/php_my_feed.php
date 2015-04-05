<?php
session_start();
$mail=$_SESSION['user_mail'];
//$mail='asd@asd.com';
session_write_close();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
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
if(true){
$sql = "SELECT id,email,msgs,tmstamp FROM messages where email='$mail' order by id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"email":"'  . $rs["email"].'",';
    $output = preg_replace('!\s+!', ' ', $rs["msgs"]);
    $outp .= '"msgs":"'  . $output.'",';
    $outp .= '"tmstamp":"'   . $rs["tmstamp"]. '"}';
}
$outp .="]";
echo($outp);
} else {
    echo "[]";
}
$conn->close();
exit();
}

?>