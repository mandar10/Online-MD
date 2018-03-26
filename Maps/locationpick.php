<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Google Map</title>
  <style>
    #map{
      height:300px;
      width:100%;
    }
  </style>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
  <div id="map"></div>
  <script type="text/javascript">
    function initMap(){
      // Map options
      var options = {
        zoom:12,
        center:{lat:19.0760,lng:72.8777}
      }
      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      // Listen for click on map
      google.maps.event.addListener(map, 'click', function(event){
        // Add marker
        document.getElementById("lat").value=event.latLng.lat();
        document.getElementById("long").value=event.latLng.lng();
        addMarker({coords:event.latLng});
      });


      // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
          //icon:props.iconImage
        });

        // Check for customicon
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });

          marker.addListener('click', function(){
            infoWindow.open(map, marker);
          });
        }
      }
    }

  </script>
    <input type="text" name="lati" id="lat" style="margin-bottom: 10px;margin-top: 10px; " placeholder="Latitude" />
    <input type="text" name="longi" id="long" placeholder="Longitude" />

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDchxQv2kePoyr4MskFYSz6kstKxj_QQI&callback=initMap">
  </script>

