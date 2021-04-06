<?php
$lat = $_GET['lat'];
$lon = $_GET['lon'];
$lat2 = $_GET['lat2'];
$lon2 = $_GET['lon2'];

$con = mysqli_connect('db.2pence.co.uk', 'user', 'pass', 'mainframe');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"mainframe");
$sql="SELECT * FROM locs WHERE lat BETWEEN ".$lat." AND ".$lat2." AND lon BETWEEN ".$lon." AND ". $lon2." LIMIT 40 " ;
$result = mysqli_query($con,$sql);
   
while($row = mysqli_fetch_array($result)) {
 echo "L.marker([" . $row['lat'] . ", " .$row['lon'] . "], {icon: locker}).addTo(map);" ;

}   
mysqli_close($con);
?>
