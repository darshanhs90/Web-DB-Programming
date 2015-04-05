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
    $arr_code = mysqli_real_escape_string($conn,$data->arr_code);
    $connections = mysqli_real_escape_string($conn,$data->cnct);
    if($connections==1)
    {
    $sql = "Select f1.Flight_number as flight1,f2.Flight_number as flight2,f1.Weekdays as wkdys,
 timediff(f2.Scheduled_departure_time,f1.Scheduled_arrival_time) as tmdiff from FLIGHT f1 join FLIGHT f2 on f1.Arrival_airport_code= f2.Departure_airport_code and f2.Arrival_airport_code = '$arr_code' where f1.Departure_airport_code = '$dep_code'  and timediff(f2.Scheduled_departure_time,f1.Scheduled_arrival_time)>'01:00:00'
 and ((f1.Weekdays LIKE '%Mon%' and f2.Weekdays LIKE '%Mon%') or (f1.Weekdays LIKE '%Tue%' and f2.Weekdays LIKE '%Tue%') or 
(f1.Weekdays LIKE '%Wed%' and f2.Weekdays LIKE '%Wed%') or 
(f1.Weekdays LIKE '%Thu%' and f2.Weekdays LIKE '%Thu%') or 
(f1.Weekdays LIKE '%Fri%' and f2.Weekdays LIKE '%Fri%') or 
(f1.Weekdays LIKE '%Sat%' and f2.Weekdays LIKE '%Sat%') or 
(f1.Weekdays LIKE '%Sun%' and f2.Weekdays LIKE '%Sun%'))";    
    }
    else if($connections==2)
    {
    $sql = " select f1.Flight_number as flight1,f2.Flight_number as flight2,f3.Flight_number as flight3,f1.arrival_airport_code as farrcode1,f2.arrival_airport_code as farrcode2,f2.Weekdays as wkdys,
 timediff(f2.Scheduled_departure_time,f1.Scheduled_arrival_time) as tmdiff12,timediff(f3.Scheduled_departure_time,f2.Scheduled_arrival_time) as tmdiff23 from flight f1 inner join flight f2 on f1.Arrival_airport_code= f2.Departure_airport_code
 inner join flight f3 on f2.Arrival_airport_code= f3.Departure_airport_code
 and f3.Arrival_airport_code = '$arr_code' where f1.Departure_airport_code = '$dep_code'  and f2.Arrival_airport_code != '$arr_code' and f3.Departure_airport_code != '$arr_code' 
 and timediff(f2.Scheduled_departure_time,f1.Scheduled_arrival_time)>'01:00:00' and timediff(f3.Scheduled_departure_time,f2.Scheduled_arrival_time)>'01:00:00'
 and 
((f1.Weekdays LIKE '%Mon%' and f2.Weekdays LIKE '%Mon%' and f3.Weekdays LIKE '%Mon%') or 
(f1.Weekdays LIKE '%Tue%' and f2.Weekdays LIKE '%Tue%' and f3.Weekdays LIKE '%Tue%') or 
(f1.Weekdays LIKE '%Wed%' and f2.Weekdays LIKE '%Wed%' and f3.Weekdays LIKE '%Wed%') or 
(f1.Weekdays LIKE '%Thu%' and f2.Weekdays LIKE '%Thu%' and f3.Weekdays LIKE '%Thu%') or 
(f1.Weekdays LIKE '%Fri%' and f2.Weekdays LIKE '%Fri%' and f3.Weekdays LIKE '%fri%') or 
(f1.Weekdays LIKE '%Sat%' and f2.Weekdays LIKE '%Sat%' and f3.Weekdays LIKE '%Sat%') or 
(f1.Weekdays LIKE '%Sun%' and f2.Weekdays LIKE '%Sun%' and f3.Weekdays LIKE '%Sun%'))";    
    }
    else 
    {
$sql=" select f1.Flight_number as flt1,f2.Flight_number as flt2,f3.Flight_number as flt3,f4.Flight_number as flt4,f1.Departure_airport_code as f1depp,f2.Departure_airport_code as f2depp,f2.arrival_airport_code as f3depp,f1.Weekdays as wkdys,
 timediff(f2.Scheduled_departure_time,f1.Scheduled_arrival_time)as time12,timediff(f3.Scheduled_departure_time,f2.Scheduled_arrival_time)as time23,timediff(f4.Scheduled_departure_time,f3.Scheduled_arrival_time)as time34 from flight f1 join flight f2 on f1.Arrival_airport_code= f2.Departure_airport_code
 join flight f3 on f2.Arrival_airport_code= f3.Departure_airport_code
 join flight f4 on f3.Arrival_airport_code= f4.Departure_airport_code 
 and f3.Arrival_airport_code = '$arr_code' where f1.Departure_airport_code = '$dep_code'  and f2.Arrival_airport_code != '$arr_code' and f3.Departure_airport_code != '$arr_code' and f4.Arrival_airport_code != '$arr_code' and
timediff(f2.Scheduled_departure_time,f1.Scheduled_arrival_time)>'01:00:00' and timediff(f3.Scheduled_departure_time,f2.Scheduled_arrival_time)>'01:00:00'
 and timediff(f4.Scheduled_departure_time,f3.Scheduled_arrival_time)>'01:00:00' and 
((f1.Weekdays LIKE '%Mon%' and f2.Weekdays LIKE '%Mon%' and f3.Weekdays LIKE '%Mon%' and f4.Weekdays LIKE '%Mon%') or 
(f1.Weekdays LIKE '%Tue%' and f2.Weekdays LIKE '%Tue%' and f3.Weekdays LIKE '%Tue%' and f4.Weekdays LIKE '%Tue%') or 
(f1.Weekdays LIKE '%Wed%' and f2.Weekdays LIKE '%Wed%' and f3.Weekdays LIKE '%Wed%' and f4.Weekdays LIKE '%Wed%') or 
(f1.Weekdays LIKE '%Thu%' and f2.Weekdays LIKE '%Thu%' and f3.Weekdays LIKE '%Thu%' and f4.Weekdays LIKE '%Thu%') or 
(f1.Weekdays LIKE '%Fri%' and f2.Weekdays LIKE '%Fri%' and f3.Weekdays LIKE '%Fri%' and f4.Weekdays LIKE '%Fri%') or 
(f1.Weekdays LIKE '%Sat%' and f2.Weekdays LIKE '%Sat%' and f3.Weekdays LIKE '%Sat%' and f4.Weekdays LIKE '%Sat%') or 
(f1.Weekdays LIKE '%Sun%' and f2.Weekdays LIKE '%Sun%' and f3.Weekdays LIKE '%Sun%' and f4.Weekdays LIKE '%Sun%'))";
    }
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
   if($connections==1){ 
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"flt1":"'  . $rs["flight1"].'",';
    $outp .= '"flt2":"'  . $rs["flight2"].'",';
    $outp .= '"wkd":"'  . $rs["wkdys"].'",';
    $outp .= '"tmdiff":"'   . $rs["tmdiff"]. '"}';
}
$outp .="]";
}
else   if($connections==2){ 
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"flt1":"'  . $rs["flight1"].'",';
    $outp .= '"flt2":"'  . $rs["flight2"].'",';
    $outp .= '"flt3":"'  . $rs["flight3"].'",';
    $outp .= '"wkd":"'  . $rs["wkdys"].'",';
    $outp .= '"f1arrcode":"'  . $rs["farrcode1"].'",';
    $outp .= '"f2arrcode":"'  . $rs["farrcode2"].'",';
    $outp .= '"tmdiff12":"'  . $rs["tmdiff12"].'",';
    $outp .= '"tmdiff23":"'   . $rs["tmdiff23"]. '"}';
}
$outp .="]";
}
else{
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"flt1":"'  . $rs["flt1"].'",';
    $outp .= '"flt2":"'  . $rs["flt2"].'",';
    $outp .= '"flt3":"'  . $rs["flt3"].'",';
    $outp .= '"flt4":"'  . $rs["flt4"].'",';
    $outp .= '"wkd":"'  . $rs["wkdys"].'",';
    $outp .= '"f1depp":"'  . $rs["f1depp"].'",';
    $outp .= '"f2depp":"'  . $rs["f2depp"].'",';
    $outp .= '"f3depp":"'  . $rs["f3depp"].'",';
    $outp .= '"time12":"'  . $rs["time12"].'",';
    $outp .= '"time23":"'  . $rs["time23"].'",';
    $outp .= '"time34":"'   . $rs["time34"]. '"}';
}
$outp .="]";
}
} else {
    echo "Invalid query";
    exit();
}//else echo no match found
echo $outp;
}
$conn->close();
exit();
?>