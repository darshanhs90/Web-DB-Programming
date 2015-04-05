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
    /*$mail='asd@asd.com';    
    $data = json_decode(file_get_contents("php://input"));
    $mail_new = mysqli_real_escape_string($conn,$data->mail);
    $field = mysqli_real_escape_string($conn,$data->field);*/
    $sql = "SELECT users.fname,users.lname,users.ppic,users.lcn,relations.relativemail,relations.friendmail from users inner join relations on relations.email='$mail' where users.email=relations.relativemail or users.email=relations.friendmail";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"fname":"'  . $rs["fname"].'",';
    $outp .= '"lname":"'  . $rs["lname"].'",';
    $outp .= '"ppic":"'  . $rs["ppic"].'",';
    if($rs["friendmail"]==''){
    $outp .= '"relation":"'."Relative".'",';
    $outp .= '"email":"'  . $rs["relativemail"].'",';
    }
    else{
        $outp .= '"relation":"'."Friend".'",';
    $outp .= '"email":"'  . $rs["friendmail"].'",';
    }
    $outp .= '"lcn":"'   . $rs["lcn"]. '"}';
}
$outp .="]";
echo($outp);
} else {
    echo "[]";
}
}
}
$conn->close();
exit();
?>