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
$sql = "SELECT *  from relations where email='$mail'";
$result = $conn->query($sql);
$count1= $result->num_rows;
$sql = "SELECT * from users where email!='$mail'";
$result1 = $conn->query($sql);
$count2= $result1->num_rows;
if ($count1 == $count2) {
    echo "[]";
} 
else{
    $sql = "SELECT users.fname,users.lname,users.email,users.lcn,users.ppic from relations Inner join users on relations.email='$mail' and users.email!='$mail' and relations.friendmail!=users.email and relations.relativemail!=users.email";
//$sql = "SELECT distinct users.fname,users.lname,users.email,users.lcn,users.ppic FROM users INNER JOIN relations  on relations.email='$mail' where users.email!=relations.relativemail and users.email!=relations.friendmail and users.email!='$mail'";
    $result = $conn->query($sql);
    if ($result->num_rows >0) {
    //echo "Here1";
    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"name":"'  . $rs["fname"] .' '.$rs["lname"] . '",';
        $outp .= '"email":"'   . $rs["email"]        . '",';
        $outp .= '"location":"'   . $rs["lcn"]        . '",';
        $outp .= '"ppic":"'. $rs["ppic"]     . '"}'; 
            }
    $outp .="]";
    echo($outp);
    } else 
    {
        $sql = "SELECT relativemail FROM relations where email='$mail'";
        $result = $conn->query($sql);
        //echo $result->num_rows;
        if ($result->num_rows <1) {
            $sql = "SELECT users.fname,users.lname,users.email,users.lcn,users.ppic FROM users where users.email!='$mail'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            $outp = "[";
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                if ($outp != "[") {$outp .= ",";}
                $outp .= '{"name":"'  . $rs["fname"] .' '.$rs["lname"] . '",';
                $outp .= '"email":"'   . $rs["email"]        . '",';
                $outp .= '"location":"'   . $rs["lcn"]        . '",';
                $outp .= '"ppic":"'. $rs["ppic"]     . '"}'; 
                }
        $outp .="]";
        echo($outp);
            }
            else{
                echo "[]";
            }
        }
        else{
            echo "[]";
            }
        }
    }
}
$conn->close();
exit();
?>