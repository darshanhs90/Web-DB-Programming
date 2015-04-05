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
    $name = mysqli_real_escape_string($conn,$data->name);
    $sql = "SELECT distinct s.Flight_number as flt_num,s.Seat_number as seat,f.airplane_id as id,f.Departure_time as dept,f.Arrival_time as arrvl,s.Date as dte from flight_instance f  inner join seat_reservation s on s.Flight_number=f.Flight_number where s.Customer_name='$name'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"flt":"'  . $rs["flt_num"].'",';
    $output = preg_replace('!\s+!', ' ', $rs["dte"]);
    $outp .= '"date":"'  . $output.'",';
    $outp .= '"id":"'  . $rs["id"].'",';
    $outp .= '"dept":"'  . $rs["dept"].'",';
    $outp .= '"arrvl":"'  . $rs["arrvl"].'",';
    $outp .= '"seatnum":"'   . $rs["seat"]. '"}';
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