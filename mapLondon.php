
<!DOCTYPE html>
<html>
<head>
	
	<title>Quick Start - Leaflet</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


	
</head>
<body>



<div id="mapid" style="width: 600px; height: 400px;"></div>
<script>

	var mymap = L.map('mapid').setView([51.5135, -0.1866], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	L.marker([51.5135, -0.1866]).addTo(mymap)
		.bindPopup("<b>Bayswater</b><br /> Station").openPopup();

	L.circle([51.5135, -0.1866], 500, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(mymap).bindPopup("I am a circle.");
 
	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent(" " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);

  
  
  var tube = L.icon({
	iconUrl: 'tube.png',  
	iconSize:     [16, 16], // size of the icon
	iconAnchor:   [8, 16], // point of the icon which will correspond to marker's location
	popupAnchor:  [0, -16] // point from which the popup should open relative to the iconAnchor
});
 
 


	a = [];
	function createGPSarray(latlon) {
		a.push(latlon.lat.toString()+', '+latlon.lng.toString().toString());
		console.log(a);		
	}
	function onMapClick(e) {
		createGPSarray(e.latlng);
	}
	map.on('click', onMapClick);
	
		
 function  createPolyline(inputArray, col){
var polyline = L.polyline(inputArray, {color: col}).addTo(map);
 }
 


var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        console.log("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
document.getElementById('mapid').scrollIntoView();
map.setView([position.coords.latitude, position.coords.longitude], 15);
	 	
} 
var x = document.getElementById("intro");
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

 
</script>
</body>
</html>





