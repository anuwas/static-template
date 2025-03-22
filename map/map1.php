<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
  </head>
  <body>
    <div id="map"></div>
    <script>
   
   

      var map;
      function initMap() {
         var myLatLng = {lat: -34.397, lng: 150.644}
          var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwRAK2-NThynx0Eo6xLSgAZ0_vnDNaCF0&callback=initMap"
    async defer></script> -->
  </body>
</html>