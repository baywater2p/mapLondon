
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

<style>
html, body {
height: 100%;
margin: 0;
}
 a {
	 text-decoration: none;
 }
#map {
width: 600px;
height: 400px;
}


table {
border-spacing: 0;
width: 100%;
border: 1px solid #ddd;
}

th, td {
text-align: left;
padding: 16px;
}

tr:nth-child(even) {
background-color: #f2f2f2
}

.button {
background-color: #555; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;

}

.accordion {
background-color: #eee;
color: #444;
cursor: pointer;
padding: 18px;
width: 100%;
border: none;
text-align: left;
outline: none;
font-size: 15px;
transition: 0.4s;
}

.active, .accordion:hover {
background-color: #ccc; 
}

.panel {
padding: 0 18px;
display: none;
background-color: white;
overflow: hidden;
}


.btn {
border: none;
outline: none;
padding: 10px 16px;
background-color: #f1f1f1;
cursor: pointer;
font-size: 14px;
}

/* Style the active class, and buttons on mouse-over */
.active, .btn:hover {
background-color: #666;
color: white;
}
</style>
</head>
<body>

<h2>London [UK]</h2>
<a href="http://www.2pence.co.uk">home</a>
<br>
<div style="max-width:600px">

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
<button class="button" onclick="borough(32)">City of London</button>
</div>
<br><br>

<div id='map'></div>
<br>


<p id="demo"></p>
 
<button class="accordion">Bus</button>
<div class="panel">
links
<br>
<table id="myTable">
<tr>
<th><button class="button" onclick="sortTable(0)">Bus</button></th>
<th><button class="button" onclick="sortTable(1)">Route A-B</button></th>
<th><button class="button" onclick="sortTable(2)">Route B-A</button></th>
</tr>

<?php  
$file = fopen("routes.txt","r");
while(! feof($file)){
$x = fgetcsv($file);
// sort by destination 
$y = explode("-",$x[3]);
$z = $y[1].' - '. $y[0];

echo '<tr><td><a href="'.$x[6].'">' . str_pad($x[0], 3, "0", STR_PAD_LEFT) . "</a></td><td>" . $x[3] . '</td><td>'.$z.'</td></tr>';
}
fclose($file); 
?>
</table>
</div>

<button class="accordion">Train</button>
<div class="panel">
...

</div>

<button class="accordion">Bike</button>
<div class="panel">
 ...
 
</div>
 
<script> 

var busStop = L.icon({
	iconUrl: 'stop.png', 
	iconSize:     [16, 16], // size of the icon
	iconAnchor:   [8, 16], // point of the icon which will correspond to marker's location
	popupAnchor:  [0, -16] // point from which the popup should open relative to the iconAnchor
});
 

  var tube = L.icon({
	iconUrl: 'tube.png',  
	iconSize:     [16, 16], // size of the icon
	iconAnchor:   [8, 16], // point of the icon which will correspond to marker's location
	popupAnchor:  [0, -16] // point from which the popup should open relative to the iconAnchor
});
 P
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




var cities = L.layerGroup();
L.marker([51.7701, -0.1937]).bindPopup('London').addTo(cities),

var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidzNyM2MzIiwiYSI6ImNqZW9semFlNjA4dTkycWx0d2lxMDIxbXcifQ.3gA4YIELmf1k_hj1QmpPDA';

var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});
var marker = L.marker([0,0]);
var map = L.map('map', {
center: [33.7, -117.9],
zoom: 9, 
layers: [grayscale, cities]
}); 
map.on('moveend', function(e) {
   var c = map.getBounds();    
   var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
cities.clearLayers();		
 var data = eval(this.responseText); 
    }
  };
  xhttp.open("GET", "mapSQLget.php?lat="+c.getSouth().toFixed(3)+"&lon="+c.getWest().toFixed(3)+"&lat2="+c.getNorth().toFixed(3)+"&lon2="+c.getEast().toFixed(3), true);
  xhttp.send();
 
});

var baseLayers = {
"Grayscale": grayscale,
"Streets": streets
};

var overlays = {
"Bus Stops": cities
};

L.control.layers(baseLayers, overlays).addTo(map);

document.getElementById("myTable").deleteRow(1);
document.getElementById("myTable").deleteRow(-1);

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
acc[i].addEventListener("click", function() {
this.classList.toggle("active");
var panel = this.nextElementSibling;
if (panel.style.display === "block") {
panel.style.display = "none";
} else {
panel.style.display = "block";
}
});
}




//FlyTo buttons
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
btns[i].addEventListener("click", function() {
var current = document.getElementsByClassName("active");
if (current.length > 0) { 
current[0].className = current[0].className.replace(" active", "");
}
this.className += " active";
});
}


function sortTable(k) {
var table, rows, switching, i, x, y, shouldSwitch;
table = document.getElementById("myTable");
switching = true;
/*Make a loop that will continue until
no switching has been done:*/
while (switching) {
//start by saying: no switching is done:
switching = false;
rows = table.rows;
/*Loop through all table rows (except the
first, which contains table headers):*/
for (i = 1; i < (rows.length - 1); i++) {
//start by saying there should be no switching:
shouldSwitch = false;
/*Get the two elements you want to compare,
one from current row and one from the next:*/
x = rows[i].getElementsByTagName("TD")[k];
y = rows[i + 1].getElementsByTagName("TD")[k];
//check if the two rows should switch place:
if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
//if so, mark as a switch and break the loop:
shouldSwitch = true;
break;
}
}
if (shouldSwitch) {
/*If a switch has been marked, make the switch
and mark that a switch has been done:*/
rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
switching = true;
}
}
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
	
map.setView([position.coords.latitude, position.coords.longitude], 14);
	 	
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

