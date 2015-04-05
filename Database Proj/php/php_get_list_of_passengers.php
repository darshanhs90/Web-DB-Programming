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
    $fltnum = mysqli_real_escape_string($conn,$data->flt);
    $date = mysqli_real_escape_string($conn,$data->date);
    $sql = "SELECT Customer_name,Seat_number from seat_reservation where Flight_number='$fltnum' and Date='$date'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"name":"'  . $rs["Customer_name"].'",';
    $outp .= '"seatnum":"'   . $rs["Seat_number"]. '"}';
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