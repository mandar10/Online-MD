<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Google Map</title>
  <style>
    #map{
      height:400px;
      width:100%;
    }
  </style>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <h1>My Google Map</h1>
  <div id="map"></div>
  <script type="text/javascript">
    function initMap(){
      // Map options
      var options = {
        zoom:8,
        center:{lat:42.3601,lng:-71.0589}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      // Listen for click on map
      google.maps.event.addListener(map, 'click', function(event){
        // Add marker
        addMarker({coords:event.latLng});
      });

      /*
      // Add marker
      var marker = new google.maps.Marker({
        position:{lat:42.4668,lng:-70.9495},
        map:map,
        icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
      });

      var infoWindow = new google.maps.InfoWindow({
        content:'<h1>Lynn MA</h1>'
      });

      marker.addListener('click', function(){
        infoWindow.open(map, marker);
      });
      */

      // Array of markers
      var markers = [
        {
          coords:{lat:42.4668,lng:-70.9495},
          iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
          content:'<h1>Lynn MA</h1>'
        },
        {
          coords:{lat:42.8584,lng:-70.9300},
          content:'<h1>Amesbury MA</h1>'
        },
        {
          coords:{lat:42.7762,lng:-71.0773}
        }
      ];

      // Loop through markers
      for(var i = 0;i < markers.length;i++){
        // Add marker
        addMarker(markers[i]);
      }

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

    function initMapPhp(){
      // New map
      // Map options
      var lati = parseFloat(document.getElementById("lati0").innerHTML);
      var longi =parseFloat(document.getElementById("longi0").innerHTML);
      //alert(lati);
      var options = {
        zoom:15,
        center:{lat:lati,lng:longi}
      }
      var map = new google.maps.Map(document.getElementById('map'), options);
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

      for(i=0;i<13;i++)
      {
      lati = parseFloat(document.getElementById("lati"+i.toString()).innerHTML);
      longi =parseFloat(document.getElementById("longi"+i.toString()).innerHTML);
      addMarker({coords:{lat:lati, lng:longi},content:"<b>"+document.getElementById("name"+i.toString()).innerHTML+"</b>"});
      }

    }
  </script>
  <?php
    $arr = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=19.1340,72.8655&radius=500&type=pharmacy&key=AIzaSyDDchxQv2kePoyr4MskFYSz6kstKxj_QQI"));
    foreach($arr as $arrele)
    {
        $i=0;
        foreach($arrele as $arrlist)
        {
            echo "<p id='json'>";
            echo "<b id='name".$i."'>".$arrlist->name."</b> ";
            echo "<b id='lati".$i."'>".$arrlist->geometry->location->lat."</b> <b id='longi".$i."'>".$arrlist->geometry->location->lng."</b><br>";
            $i++;
            echo "</p>";
          }
    }

      echo "<script async defer
        src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDDchxQv2kePoyr4MskFYSz6kstKxj_QQI&callback=initMapPhp'></script>";
      echo "<br><br>";
    ?>

  <!--<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDchxQv2kePoyr4MskFYSz6kstKxj_QQI&callback=initMap">
  </script>-->
</body>
</html>
