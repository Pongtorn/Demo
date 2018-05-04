
<html>
<head>
     <title>getlocation</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
.container {
  max-width: 980px;
  text-align: center;
  margin: 20px auto;
}

h1 {
  margin-bottom: 20px;
}

#geocoding_form {
  margin: 40px auto 40px;
}

.input-group {
  margin-left: 4%;
}

.find-me.btn:focus {
  border-color: transparent;
  outline: 0;
}

.coordinates {
  font-size: 18px;
  opacity: 0;
  margin-bottom: 40px;
}

.no-browser-support {
  font-size: 18px;
  opacity: 0;
}

.coordinates b:first-child {
  margin-right: 15px;
}

.visible {
  opacity: 1;
}

.map-overlay {
  max-width: 600px;
  height: 400px;
  margin: 0 auto;
  background-color: #fff;
  position: relative;
  border-radius: 2px;
}

#map {
  max-width: 550px;
  height: 400px;
  margin: 0 auto;
}

</style>
<script>
function onloadpage(){

var findMeButton = $('.find-me');

// Check if the browser has support for the Geolocation API
if (!navigator.geolocation) {

  findMeButton.addClass("disabled");
  $('.no-browser-support').addClass("visible");

} else {

  findMeButton.on('click', function(e) {

    e.preventDefault();

    navigator.geolocation.getCurrentPosition(function(position) {

      // Get the coordinates of the current possition.
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;

      $('.latitude').text(lat.toFixed(3));
      $('.longitude').text(lng.toFixed(3));
      $('.coordinates').addClass('visible');

      // Create a new map and place a marker at the device location.
      var map = new GMaps({
        el: '#map',
        lat: lat,
        lng: lng
      });

      map.addMarker({
        lat: lat,
        lng: lng
      });

    });

  });

}


}




</script>

<body onload="onloadpage()">

<div class="container">

  <h1>Geolocation Demo</h1>

  <form id="geocoding_form" class="form-horizontal">
    <div class="form-group">
      <div class="col-xs-12 col-md-6 col-md-offset-3">
        <button type="button" class="find-me btn btn-info btn-block">Find My Location</button>
      </div>
    </div>
  </form>

  <p class="no-browser-support">Sorry, the Geolocation API isn't supported in Your browser.</p>
  <p class="coordinates">Latitude: <b class="latitude">42</b> Longitude: <b class="longitude">32</b></p>

  <div class="map-overlay">
    <div id="map"></div>
  </div>

</div>

</body>
</html>
