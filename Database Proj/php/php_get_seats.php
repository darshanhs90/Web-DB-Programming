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
    $flt_no = mysqli_real_escape_string($conn,$data->dep_code);
    $dte = mysqli_real_escape_string($conn,$data->arr_code);
    $sql = "SELECT Number_of_available_seats from FLIGHT_Instance where Flight_number='$flt_no' and Date='$dte'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Seats":"'  . $rs["Number_of_available_seats"].'"}';
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