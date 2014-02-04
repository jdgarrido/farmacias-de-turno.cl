<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Mapa Farmacias de Turno Chile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="farmasias, Farmasias de turno, farmacias turno, Farmacia, farmacia, turno, turnos, farmacias antofagasta, farmacias santiago, farmacias temuco, farmacias biobio, farmacias rancagua">
		<meta name="description" content="Farmacias de Turno en Chile para las distintas regiones del país">
		<meta name="author" content="José Damián Garrido Muñoz (@jgarrido)">
		<meta name="mobile-web-app-capable" content="yes">

		<link rel="shortcut icon" sizes="128x128" href="/assets/img/farmacia-ico.png">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD-QOzxVKf0lgmTnllZqvnqVdA3YWijcro&sensor=true">
    </script>
		<script type="text/javascript">
			var map;
			
	    function initialize() {
	    	var mapOptions = {
			    zoom: 13
			  };
			  map = new google.maps.Map(document.getElementById('map_canvas'),
			      mapOptions);
			  
			  // Try HTML5 geolocation
			  if(navigator.geolocation) {
			    navigator.geolocation.getCurrentPosition(function(position) {
			      var pos = new google.maps.LatLng(position.coords.latitude,
			                                       position.coords.longitude);

			      var infowindow = new google.maps.InfoWindow({
			        map: map,
			        position: pos
			      });

			      
			      var marker = new google.maps.Marker({
			      	position: pos,
				      map: map,
				      title: 'Holi!'
					  });

			      var json_url = '/json.php?type=json';
					  $.getJSON(json_url,function(data){
					    $.each(data.result, function(i, field){
					      if(i>0)
					      {
					      	var image = 'https://cdn1.iconfinder.com/data/icons/nuvola2/22x22/apps/kcmdrkonqi.png';
					      	var pos = new google.maps.LatLng(field[6],field[7]);

					      	var contentString = '<div><p><strong>Dirección</strong>: '+field[2]+'</p><p><strong>Nombre Farmacia</strong>: '+field[3]+'</p><p><strong>Horario </strong>: '+field[4]+' - '+field[5]+'</p><p><strong>Teléfono</strong>: <a href="tel:'+field[8]+'">'+field[8]+'</a></p><p><a href="http://maps.apple.com/?q='+field[6]+','+field[7]+'">ver ruta</a></p></div>';

								  var infowindow = new google.maps.InfoWindow({
								      content: contentString
								  });

					      	var marker = new google.maps.Marker({
						      	position: pos,
							      map: map,
							      title: 'Farmacia: '+field[3],
							      icon: image
								  });

								  google.maps.event.addListener(marker, 'click', function() {
								    infowindow.open(map,marker);
								  });
					      }
					    });
					  });

			      map.setCenter(pos);
			    }, function() {
			      handleNoGeolocation(true);
			    });
			  } else {
			    // Browser doesn't support Geolocation
			    handleNoGeolocation(false);
			  }
	    }

	    function handleNoGeolocation(errorFlag) {
			  if (errorFlag) {
			    var content = 'Error: The Geolocation service failed.';
			  } else {
			    var content = 'Error: Your browser doesn\'t support geolocation.';
			  }

			  var options = {
			    map: map,
			    position: new google.maps.LatLng(60, 105),
			    content: content
			  };

			  var infowindow = new google.maps.InfoWindow(options);
			  map.setCenter(options.position);
			}

	    $(document).ready(function(){
	    	var d = document.getElementById("map_canvas");
						d.className = d.className + "set_Width_Height";
	    })


		</script>
		<style>
			.set_Width_Height {
				width: auto;
				min-height: 500px;
			}
			.container {
				padding-right: initial;
				padding-left: initial;
			}
		</style>
	</head>

	<body onload="initialize()">
		
		<div class="container">
			<div id="map_canvas"></div>
		</div>
		
		<?php include_once("ganalytics.php") ?>
	</body>
</html>