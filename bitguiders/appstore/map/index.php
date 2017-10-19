<!DOCTYPE html>
<html>
<body>
<?php 
	$lattitude="41.9022770409637";
	$longitude="-93.1640625";
	$loc = "Iowa";
	if(isset($_GET['loc'])){
		$loc = $_GET['loc'];
		if($_GET['loc']=='texas'){
		$lattitude = "31.12819929911196";
		$longitude = "-99.31640625";
		}else if($_GET['loc']=='ohio'){
		$lattitude = "40.17887331434696";
		$longitude = "-82.353515625";
		}
	}
?>
<div id="map" style="width:100%;height:500px;"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter=new google.maps.LatLng(<?php echo $lattitude; ?>,<?php echo $longitude; ?>);
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({
	    position: myCenter,
	    icon:'photos/fitsum.png',
	    animation: google.maps.Animation.BOUNCE
	  });
  marker.setMap(map);
  
  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(map, event.latLng);
  });

  var infowindow = new google.maps.InfoWindow({
	    content: 'Location: '+<?php echo $loc; ?>+'Latitude: ' + <?php echo $lattitude; ?> + '<br>Longitude: ' + <?php echo $longitude; ?>
	  });
	  infowindow.open(map,marker);
}

function placeMarker(map, location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv32ekFCp4xRAqz12R8_3DLyCQIFG4mSg&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>

