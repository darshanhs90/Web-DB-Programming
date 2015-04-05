<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="airlines_new";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Database Connection Error";
}
else{
    $data = json_decode(file_get_contents("php://input"));
    $dep_code = mysqli_real_escape_string($conn,$data->dep_code);
    //$arr_code = mysqli_real_escape_string($conn,$data->arr_code);
    $sql = "SELECT Fare_code,Amount,Restrictions from fare where Flight_number='$dep_code'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"fare":"'  . $rs["Fare_code"].'",';
    $output = preg_replace('!\s+!', ' ', $rs["Restrictions"]);
    $outp .= '"restr":"'  . $output.'",';
    $outp .= '"amt":"'   . $rs["Amount"]. '"}';
}
$outp .="]";
} else {
    echo "Invalid query";
    exit();
}//else echo no match found
echo $outp;
}
$conn->close();
exit();
?>