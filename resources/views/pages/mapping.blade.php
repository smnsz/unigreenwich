@extends('layouts.app', ['title' => 'Mapping'])


@section('content')
	<div class="container">
		<div id="map-canvas" style="width:100%; height:640px;">	
		</div>
	</div>
	<br>
@stop



@section('scripts.footer')
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="https://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js"></script>
	<script type="text/javascript">
		function initialize() {
			var middflefield_road_palo_alto = {
				latitude: 51.5072,
				longitude: -127.1419,
			};

			var myLatlng = new google.maps.LatLng(
				middflefield_road_palo_alto.latitude,
				middflefield_road_palo_alto.longitude
			);

		  	var mapOptions = {
		    	zoom: 2,
		    	center: myLatlng,
		    	mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

			var users = Community.users;

		  	var infowindow = new google.maps.InfoWindow();

			var marker, i;

			var markers = [];

	    	users.forEach(function(user){
	    		var latLng = new google.maps.LatLng(user.latitude, user.longitude);

		        marker = new google.maps.Marker({
		          position: latLng,
		          map: map,
		          animation:  google.maps.Animation.DROP
		        });

	            google.maps.event.addListener(marker, 'click', (function(marker, i) {
			        return function() {
			          infowindow.setContent('<a class="special" href="' + user.profile_url +'"><img style="max-height: 25px; max-width: 25px;" class="img-circle" src="' + user.avatar + '">&nbsp;<span><b>' + user.username + '</b></span></a>');
			          infowindow.open(map, marker);
			        }
			    })(marker, i));

			    markers.push(marker);
		    });

		    var clusterOptions = {
				gridSize: 60,
				minimumClusterSize: 2
			};

		    var markerCluster = new MarkerClusterer(map, markers, clusterOptions);

		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
@stop