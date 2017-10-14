<!DOCTYPE html>
<html>
<head>
	<title>Map Test</title>
<head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
</head>
<body>
    <h3>My Google Maps Demo</h3>
    <div id="map" style="width: 500px; height: 500px;"></div>
</body>
<script>
	function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
	}
</script>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWDhwOMEpimFfwyod7RC6SbqfIrvk17j0&callback=initMap">
</script>
</html>