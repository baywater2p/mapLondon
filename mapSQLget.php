<?php
$lat = $_GET['lat'];
$lon = $_GET['lon'];
$lat2 = $_GET['lat2'];
$lon2 = $_GET['lon2'];

$con = mysqli_connect('ftp.domain.com','username','password','db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"db");
$sql="SELECT * FROM stops WHERE stop_lat BETWEEN ".$lat." AND ".$lat2." AND stop_lon BETWEEN ".$lon." AND ". $lon2." LIMIT 40 " ;
$result = mysqli_query($con,$sql);
   
while($row = mysqli_fetch_array($result)) {
 echo "L.marker([" . $row['stop_lat'] . ", " .$row['stop_lon'] . "], {icon: busStop}).bindPopup('" .$row['stop_code'] ."# : ".$row['stop_name']  ."<br>Send <a href=sms:628246;?&body=BUS%20".$row['stop_code']."%20001>BUS stop# bus#</a> to 628246').addTo(cities);" ;
}   
mysqli_close($con);
?>
