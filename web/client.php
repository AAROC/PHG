<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/



project by Charles MUiruri , njarambacharles01@gmail.com

            Dennis MUoki, muokid3@gmail.com

A SCI-GaIA Based project.
-->
<!DOCTYPE html>
<html>

<head>
	<title>PHG WEB PORTAL DEM</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Easy Multiple Forms Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}

	</script>








	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- //for-mobile-apps -->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/map.js"></script>

	<!-- //js -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="//www.sanwebe.com/wp-content/themes/sanwebe-lite/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBwvyOwVQpg2UDaGeohdIdD1qIU0eBOuNU&libraries=places&sensor=false"></script>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="js/moment.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

	<link rel="stylesheet" href="css/datepicker.css"/>
	<script src="datepicker/datepicker.js"></script>

	 <script>
  $( function() {
	  $('#basic_example_1').datetimepicker();
  } );
  </script>

	<script type="text/javascript">

		$(document).ready(function() {

				var mapCenter = new google.maps.LatLng(47.6145, -122.3418); //Google map Coordinates
				var map;
				map_initialize(); // load map
				initAutocomplete();
				geoLocation();

				function map_initialize() {
					//Google map option
					var googleMapOptions = {
						center: mapCenter, // map center
						zoom: 17, //zoom level, 0 = earth view to higher value
						panControl: true, //enable pan Control
						zoomControl: true, //enable zoom control
						zoomControlOptions: {
							style: google.maps.ZoomControlStyle.SMALL //zoom control size
						},
						scaleControl: true, // enable scale control
						mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
					};
					map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);



					});
				}

				function initAutocomplete() {

					// Create the search box and link it to the UI element.
					var input = document.getElementById('pac-input');
					var searchBox = new google.maps.places.SearchBox(input);
					map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

					// Bias the SearchBox results towards current map's viewport.
					map.addListener('bounds_changed', function() {
						searchBox.setBounds(map.getBounds());
					});

					var markers = [];
					// Listen for the event fired when the user selects a prediction and retrieve
					// more details for that place.
					searchBox.addListener('places_changed', function() {
						var places = searchBox.getPlaces();

						if (places.length == 0) {
							return;
						}

						// Clear out the old markers.
						markers.forEach(function(marker) {
							marker.setMap(null);
						});
						markers = [];

						// For each place, get the icon, name and location.
						var bounds = new google.maps.LatLngBounds();
						places.forEach(function(place) {
							if (!place.geometry) {
								console.log("Returned place contains no geometry");
								return;
							}
							var icon = {
								url: place.icon,
								size: new google.maps.Size(71, 71),
								origin: new google.maps.Point(0, 0),
								anchor: new google.maps.Point(17, 34),
								scaledSize: new google.maps.Size(25, 25)
							};

							// Create a marker for each place.
							markers.push(new google.maps.Marker({
								map: map,
								icon: icon,
								title: place.name,
								position: place.geometry.location
							}));

							if (place.geometry.viewport) {
								// Only geocodes have viewport.
								bounds.union(place.geometry.viewport);
							} else {
								bounds.extend(place.geometry.location);
							}
						});
						map.fitBounds(bounds);
					});
				}



				function geoLocation() {


					var infoWindow = new google.maps.InfoWindow({
						map: map
					});

					// Try HTML5 geolocation.
					if (navigator.geolocation) {
						navigator.geolocation.getCurrentPosition(function(position) {
							var pos = {
								lat: position.coords.latitude,
								lng: position.coords.longitude
							};

							infoWindow.setPosition(pos);
							infoWindow.setContent('Location found.');
							map.setCenter(pos);
						}, function() {
							handleLocationError(true, infoWindow, map.getCenter());
						});
					} else {
						// Browser doesn't support Geolocation
						handleLocationError(false, infoWindow, map.getCenter());
					}
				}

				function handleLocationError(browserHasGeolocation, infoWindow, pos) {
					infoWindow.setPosition(pos);
					infoWindow.setContent(browserHasGeolocation ?
						'Error: The Geolocation service failed.' :
						'Error: Your browser doesn\'t support geolocation.');
				}

			}



		);

	</script>
	<style type="text/css">
		h1.heading {
			padding: 0px;
			margin: 0px 0px 10px 0px;
			text-align: center;
			font: 18px Georgia, "Times New Roman", Times, serif;
		}
		/* width and height of google map */

		#google_map {
			width: 100%;
			height: 500px;
			margin-top: 10px;
			margin-left: auto;
			margin-right: auto;
			border: 6px solid #C4B2FF;
			border-radius: 5px;
		}
		/* Marker Info Window */

		h1.marker-heading {
			color: #585858;
			margin: 0px;
			padding: 0px;
			font: 18px "Trebuchet MS", Arial;
			border-bottom: 1px dotted #D8D8D8;
		}

		div.marker-info-win p {
			padding: 0px;
			margin: 10px 0px 10px 0;
		}

		div.marker-inner-win {
			padding: 5px;
		}

		button.save-marker,
		button.remove-marker {
			border: none;
			background: rgba(0, 0, 0, 0);
			color: #00F;
			padding: 0px;
			text-decoration: underline;
			margin-right: 10px;
			cursor: pointer;
		}

	</style>
	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
		ga('create', 'UA-50194497-1', 'sanwebe.com');
		ga('send', 'pageview');

	</script>
	<!-- BuySellAds Ad Code -->
	<script type="text/javascript">
		(function() {
			var bsa = document.createElement('script');
			bsa.type = 'text/javascript';
			bsa.async = true;
			bsa.src = '//s3.buysellads.com/ac/bsa.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
		})();

	</script>

	<style>
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		#map {
			height: 100%;
		}
		#floating-panel {
			position: absolute;
			top: 10px;
			left: 25%;
			z-index: 5;
			background-color: #fff;
			padding: 5px;
			border: 1px solid #999;
			text-align: center;
			font-family: 'Roboto','sans-serif';
			line-height: 30px;
			padding-left: 10px;
		}
		#floating-panel {
			background-color: #fff;
			border: 1px solid #999;
			left: 25%;
			padding: 5px;
			position: absolute;
			top: 10px;
			z-index: 5;
		}
	</style>
</head>





	<body>

			<input id="pac-input" class="controls" type="text" placeholder="Search Box" style="margin-top:10px; min-height:31px" onkeypress="initAutocomplete()">


			<div id="google_map"></div>

			<div class="copyright">
				<p  > <a style="Color:white" href="https://github.com/AAROC/PHG">© 2016 Pulic Health Gateway .</a> <a style="Color:white" href="http://www.sci-gaia.eu/">A SCI-GaIA project</a></p>
			</div>

		</div>
	</body>

</html>
