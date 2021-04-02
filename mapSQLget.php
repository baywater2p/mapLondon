<?php
$lat = $_GET['lat'];
$lon = $_GET['lon'];
$lat2 = $_GET['lat2'];
$lon2 = $_GET['lon2'];

$con = mysqli_connect('db.2pence.co.uk','username','password','db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"db");
$sql="SELECT * FROM lockers WHERE stop_lat BETWEEN ".$lat." AND ".$lat2." AND stop_lon BETWEEN ".$lon." AND ". $lon2." LIMIT 40 " ;
$result = mysqli_query($con,$sql);
   
while($row = mysqli_fetch_array($result)) {
 echo "L.marker([" . $row['locker_lat'] . ", " .$row['locker_lon'] . "], {icon: locker}).bindPopup(' " . $row['locker_addr'] ." ').addTo(cities);" ;
}   
mysqli_close($con);
?>
