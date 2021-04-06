<!DOCTYPE html>
<html>
<head>
	
	<title>2Pence.co.uk</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<style>
.button {
  background-color: #7851a9;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>

<button class="button" onclick="getLocation()">Get Location</button>
<button class="button" onclick="borough(0)">Barking and Dagenham</button>
<button class="button" onclick="borough(1)">Barnet</button>
<button class="button" onclick="borough(2)">Bexley</button>
<button class="button" onclick="borough(3)">Brent</button>
<button class="button" onclick="borough(4)">Bromley</button>
<button class="button" onclick="borough(5)">Camden</button>
<button class="button" onclick="borough(6)">Croydon</button>
<button class="button" onclick="borough(7)">Ealing</button>
<button class="button" onclick="borough(8)">Enfield</button>
<button class="button" onclick="borough(9)">Greenwich</button>
<button class="button" onclick="borough(10)">Hackney</button>
<button class="button" onclick="borough(11)">Hammersmith and Fulham</button>
<button class="button" onclick="borough(12)">Haringey</button>
<button class="button" onclick="borough(13)">Harrow</button>
<button class="button" onclick="borough(14)">Havering</button>
<button class="button" onclick="borough(15)">Hillingdon</button>
<button class="button" onclick="borough(16)">Hounslow</button>
<button class="button" onclick="borough(17)">Islington</button>
<button class="button" onclick="borough(18)">Kensington and Chelsea</button>
<button class="button" onclick="borough(19)">Kingston upon Thames</button>
<button class="button" onclick="borough(20)">Lambeth</button>
<button class="button" onclick="borough(21)">Lewisham</button>
<button class="button" onclick="borough(22)">Merton</button>
<button class="button" onclick="borough(23)">Newham</button>
<button class="button" onclick="borough(24)">Redbridge</button>
<button class="button" onclick="borough(25)">Richmond upon Thames</button>
<button class="button" onclick="borough(26)">Southwark</button>
<button class="button" onclick="borough(27)">Sutton</button>
<button class="button" onclick="borough(28)">Tower Hamlets</button>
<button class="button" onclick="borough(29)">Waltham Forest</button>
<button class="button" onclick="borough(30)">Wandsworth</button>
<button class="button" onclick="borough(31)">Westminster</button>
<button class="button" onclick="borough(32)">CIty of London</button>
<p id="demo"></p>

<div id="mapid" style="width: 90%; height: 800px;"></div>
	<p id="err"></p>
<script>

	var map = L.map('mapid').setView([51.5135, -0.1866], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

	L.marker([51.5135, -0.1866]).addTo(map)
		.bindPopup("<b>Bayswater</b><br /> Station").openPopup();

	L.circle([51.5135, -0.1866], 500, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(map);
 
	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent(" " + e.latlng.toString())
			.openOn(map);
	}

	map.on('click', onMapClick);

  
  
  var locker = L.icon({
	iconUrl: 'locker.png',  
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






map.on('moveend', function(e) {
   var c = map.getBounds();    
   var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {    
 var data = eval(this.responseText); 
    }
  };
  xhttp.open("GET", "mapGet.php?lat="+c.getSouth().toFixed(3)+"&lon="+c.getWest().toFixed(3)+"&lat2="+c.getNorth().toFixed(3)+"&lon2="+c.getEast().toFixed(3), true);
  xhttp.send();
 
});


 
 
 
 
function borough(x){
document.getElementById('mapid').scrollIntoView();
switch(x){ 
case 0: map.flyTo(boroughs.BarkingDagenham.split(","), 15); break;
case 1: map.flyTo(boroughs.Barnet.split(","), 15); break;
case 2: map.flyTo(boroughs.Bexley.split(","), 15); break;
case 3: map.flyTo(boroughs.Brent.split(","), 15); break;
case 4: map.flyTo(boroughs.Bromley.split(","), 15); break;
case 5: map.flyTo(boroughs.Camden.split(","), 15); break;
case 6: map.flyTo(boroughs.Croydon.split(","), 15); break;
case 7: map.flyTo(boroughs.Ealing.split(","), 15); break;
case 8: map.flyTo(boroughs.Enfield.split(","), 15); break;
case 9: map.flyTo(boroughs.Greenwich.split(","), 15); break;
case 10: map.flyTo(boroughs.Hackney.split(","), 15); break;
case 11: map.flyTo(boroughs.HammersmithFulham.split(","), 15); break;
case 12: map.flyTo(boroughs.Haringey.split(","), 15); break;
case 13: map.flyTo(boroughs.Harrow.split(","), 15); break;
case 14: map.flyTo(boroughs.Havering.split(","), 15); break;
case 15: map.flyTo(boroughs.Hillingdon.split(","), 15); break;
case 16: map.flyTo(boroughs.Hounslow.split(","), 15); break;
case 17: map.flyTo(boroughs.Islington.split(","), 15); break;
case 18: map.flyTo(boroughs.KensingtonChelsea.split(","), 15); break;
case 19: map.flyTo(boroughs.KingstonThames.split(","), 15); break;
case 20: map.flyTo(boroughs.Lambeth.split(","), 15); break;
case 21: map.flyTo(boroughs.Lewisham.split(","), 15); break;
case 22: map.flyTo(boroughs.Merton.split(","), 15); break;
case 23: map.flyTo(boroughs.Newham.split(","), 15); break;
case 24: map.flyTo(boroughs.Redbridge.split(","), 15); break;
case 25: map.flyTo(boroughs.RichmondThames.split(","), 15); break;
case 26: map.flyTo(boroughs.Southwark.split(","), 15); break;
case 27: map.flyTo(boroughs.Sutton.split(","), 15); break;
case 28: map.flyTo(boroughs.TowerHamlets.split(","), 15); break;
case 29: map.flyTo(boroughs.WalthamForest.split(","), 15); break;
case 30: map.flyTo(boroughs.Wandsworth.split(","), 15); break;
case 31: map.flyTo(boroughs.Westminster.split(","), 15); break;
case 32: map.flyTo(boroughs.CityLondon.split(","), 15); break;
default:
return
}}

var boroughs = {
BarkingDagenham: "51.5607,0.1557",
Barnet: "51.6252,-0.1517",
Bexley: "51.4549,0.1505",
Brent: "51.5588,-0.2817",
Bromley: "51.4039,0.0198",
Camden: "51.5290,-0.1255",
Croydon: "51.3714,-0.0977",
Ealing: "51.5130,-0.3089",
Enfield: "51.6538,-0.0799",
Greenwich: "51.4892,0.0648",
Hackney: "51.5450,-0.0553",
HammersmithFulham: "51.4927,-0.2339",
Haringey: "51.6000,-0.1119",
Harrow: "51.5898,-0.3346",
Havering: "51.5812,0.1837",
Hillingdon: "51.5441,-0.4760",
Hounslow: "51.4746,-0.3680",
Islington: "51.5416,-0.1022",
KensingtonChelsea: "51.5020,-0.1947",
KingstonThames: "51.4085,-0.3064",
Lambeth: "51.4607,-0.1163",
Lewisham: "51.4452,-0.0209",
Merton: "51.4014,-0.1958",
Newham: "51.5077,0.0469",
Redbridge: "51.5590,0.0741",
RichmondThames: "51.4479,-0.3260",
Southwark: "51.5035,-0.0804",
Sutton: "51.3618,-0.1945",
TowerHamlets: "51.5099,-0.0059",
WalthamForest: "51.5908,-0.0134",
Wandsworth: "51.4567,-0.1910",
Westminster: "51.4973,-0.1372",
CityLondon: "51.5155,-0.0922"
}


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
var y = document.getElementById("err");
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            y.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            y.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            y.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            y.innerHTML = "An unknown error occurred."
            break;
    }
}

 
</script>
</body>
</html>
