<?php
	session_start();
	//most of map interaction taken from google api webpage
	$lat = getLat();
	$long = getLong();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Place searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
    function display() {
		var map;
		var infowindow;
		var lat = <?php echo $lat;?>;
		var long = <?php echo $long;?>;


		function initialize() {
		  var pyrmont = new google.maps.LatLng(lat, long);

		  map = new google.maps.Map(document.getElementById('map-canvas'), {
			center: pyrmont,
			zoom: 15
		  });

		  var request = {
			location: pyrmont,
			radius: 10000,
			types: ['gym']
		  };
		  infowindow = new google.maps.InfoWindow();
		  var service = new google.maps.places.PlacesService(map);
		  service.nearbySearch(request, callback);
		}

		function callback(results, status) {
		  if (status == google.maps.places.PlacesServiceStatus.OK) {
			for (var i = 0; i < results.length; i++) {
			  createMarker(results[i]);
			}
		  }
		}

		function createMarker(place) {
		  var placeLoc = place.geometry.location;
		  var marker = new google.maps.Marker({
			map: map,
			position: place.geometry.location
		  });

		  google.maps.event.addListener(marker, 'click', function() {
			infowindow.setContent(place.name);
			infowindow.open(map, this);
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
}
    </script>
  </head>
  <body>
  	<?php
	if(isset($_POST['submit'])){
			echo '<script> display(); </script>';   // If join button is clicked
	}


	function getLat(){
			$address = $_POST['address'];
	   		$geocodeURL = "https://maps.googleapis.com/maps/api/geocode/xml?";
			$address = "address=" . urlencode($address);
			// https://console.developers.google.com
			$key = "key=AIzaSyCV0r2ioNauxNtttF_l2st3Lg2OuaRlKsU";
			$geocoderequest = "$geocodeURL$address" . "&" . $key;


	   		$xml= new SimpleXMLElement( file_get_contents( $geocoderequest ) );

	   		if($xml->status != 'OK') {
	   			$status = $xml->error_message;
	   			die("bad result status $status");
	   		}

			$placeRequestURL = "https://maps.googleapis.com/maps/api/place/details/xml?";
	   		$placeID = "placeid=" . $xml->place_id;
	   		$placedetailsrequest = "$placeRequestURL$placeID" . "&" . $key;


	   		$xml2 = new SimpleXMLElement( file_get_contents( $geocoderequest ) );
	   		$loc = getLocation($xml);
	   		$latitude  = $xml->result->geometry->location->lat;
			//$longitude = $xml->result->geometry->location->lng;
			return $latitude;
			//$location = array("latitude" => $latitude, "longitude" => $longitude);


			//echo '<script> display(); </script>';

		}

function getLong(){
			$address = $_POST['address'];
	   		$geocodeURL = "https://maps.googleapis.com/maps/api/geocode/xml?";
			$address = "address=" . urlencode($address);
			// https://console.developers.google.com
			$key = "key=AIzaSyCV0r2ioNauxNtttF_l2st3Lg2OuaRlKsU";
			$geocoderequest = "$geocodeURL$address" . "&" . $key;


	   		$xml= new SimpleXMLElement( file_get_contents( $geocoderequest ) );

	   		if($xml->status != 'OK') {
	   			$status = $xml->error_message;
	   			die("bad result status $status");
	   		}

			$placeRequestURL = "https://maps.googleapis.com/maps/api/place/details/xml?";
	   		$placeID = "placeid=" . $xml->place_id;
	   		$placedetailsrequest = "$placeRequestURL$placeID" . "&" . $key;


	   		$xml2 = new SimpleXMLElement( file_get_contents( $geocoderequest ) );
	   		$loc = getLocation($xml);
	   		//$latitude  = $xml->result->geometry->location->lat;
			$longitude = $xml->result->geometry->location->lng;
			return $longitude;
			//$location = array("latitude" => $latitude, "longitude" => $longitude);


			//echo '<script> display(); </script>';

		}

	    function getLocation($xml)
	    {
	        //echo "<pre>"; print_r( $xml);  	echo "</pre>";
	        $latitude  = $xml->result->geometry->location->lat;
	        $longitude = $xml->result->geometry->location->lng;

	        $location = array("latitude" => $latitude, "longitude" => $longitude);

	        return ($location);
    }
    ?>

    <div id="map-canvas"></div>
  </body>
</html>

