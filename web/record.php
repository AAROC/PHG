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

					//##### drop a new marker on right click ######
					google.maps.event.addListener(map, 'rightclick', function(event) {
						var marker = new google.maps.Marker({
							position: event.latLng, //map Coordinates where user right clicked
							map: map,
							draggable: true, //set marker draggable 
							animation: google.maps.Animation.DROP, //bounce animation
							title: "Hello World!",
							icon: "images/pin_green.png" //custom pin icon
						});
						var position = event.latLng;


						document.cookie = "latLang=position";
						//Content structure of info Window for the Markers
						var contentString = $('<div class="marker-info-win">' +
							'<div class="marker-inner-win"><span class="info-content">' +
							'<h1 class="marker-heading">New Marker</h1>' +
							'This is a new marker infoWindow' +
							'</span>' +
							'<br /><button name="remove-marker" class="remove-marker" title="Remove Marker" style="margin-top: 10px;">Remove Marker</button> <button name="report-marker" value="' + position + '" title="Report" style="margin-top: 10px;"class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Record</button></div></div>');

						//Create an infoWindow
						var infowindow = new google.maps.InfoWindow();

						//set the content of infoWindow
						infowindow.setContent(contentString[0]);

						//add click listner to marker which will open infoWindow 		 
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.open(map, marker); // click on marker opens info window 

							document.getElementById('latlang').value = "ssssssss";
						});


						//###### remove marker #########/
						var removeBtn = contentString.find('button.remove-marker')[0];
						google.maps.event.addDomListener(removeBtn, "click", function(event) {
							marker.setMap(null);
						});

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
</head>

<?php
    session_start();
    $token = $_SESSION["token"];
	
	 $phpVar =  $_COOKIE['latLang'];

   echo $phpVar;
    //echo $token;
?>



	<body>
		<div class="main">
			<div style="margin-top: -39px;">
				<h1 style style="font-size: 1.8em;"><image src="images/group.png" alt=""/>PHG WEB PORTAL DEMO </h1>

			</div>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="w3l_main_grids">
					<div class="clear"> </div>
					<input id="latlang" value="">
					<div class="wthree_leave_your_comment">
						<h3>Record Accident</h3>
						<div class="wthree_leave_your_commentl">
							<form action="#" method="post">
								<h4>County*</h4>
								<input type="text" name="county" placeholder="Your County" required=" ">
								<h4>Date*</h4>
								<input type="text" name="date" placeholder="Date of accident " required=" ">

								<div style="float: right">
									<h4>Severity*</h4>
									<select type="text" name="description">
                        
                            <option type="text"value="1">1</option>
                            <option type="text"value="2">2</option>
                            <option value="3" type="text">3</option>
                            <option value="4" type="text">4</option>
                            <option value="5"type="text">5</option>
                        </select>
									<h4>Road Category*</h4>

									<select type="text" name="description">
                        
                            <option type="text"value="highway">Highway</option>
                            <option type="text"value="driveway">Driveway</option>
                            <option value="parkway" type="text">Parkway</option>
                            <option value="singlecarriage" type="text">Single Carriage</option>
                            <option value="dualcarriage"type="text">Dual Carriage</option>
                        </select>
								</div>

								<h4>Surface*</h4>
								<select type="text" name="description">
                        
                            <option type="text"value="tarmac">Tarmac </option>
                            <option type="text"value="dirt">Dirt </option>
                            <option value="paved" type="text">Paved </option>
                            <option value="sandy" type="text">Sandy </option>
                            <option value="concrete" type="text">Concrete</option>
                        </select>

								<h4>Weather*</h4>
								<select type="text" name="description">
                        
                            <option type="text"value="normal">NORMAL</option>
                            <option type="text"value="fog">FOG</option>
                            <option value="rain" type="text">RAIN</option>
                            <option value="hail" type="text">SNOW/HAIL</option>
                            <option value="dusty"type="text">DUSTY</option>
                        </select>


								<h4>Location*</h4>
								<input type="text" name="location" placeholder="Accident Location" required=" ">

								<h4>Passangers*</h4>
								<input type="text" name="passagerno" placeholder=" Passanger No" required=" ">


						</div>
						<div class="wthree_leave_your_commentr">





							<div class="wthree_leave_your_commentl  " style="width:93% !important">

								<h4>Vehile Make*</h4>
								<input type="text" name="vehiclemake" placeholder="Vehicle Make" required=" " />

								<h4>Vehicle Model*</h4>
								<input type="text" name="vehiclemodel" placeholder="Vehicle Model" required=" ">

								<h4>Vehicle Plate*</h4>
								<input type="text" name="vehicleplate" placeholder="Vehicle Plate" required=" ">
							</div>



							<h4>Your Comment Here*</h4>
							<textarea name="Message" placeholder="Type Your Text Here...." required=" "></textarea>
							<input type="submit" value="Submit">
							</form>
						</div>
						<div class="clear"> </div>
						<div class="close4"> </div>
					</div>
					<script>
						$(document).ready(function(c) {
							$('.close4').on('click', function(c) {
								$('.wthree_leave_your_comment').fadeOut('slow', function(c) {
									$('.wthree_leave_your_comment').remove();
								});
							});
						});

					</script>
				</div>
			</div>



			<input id="pac-input" class="controls" type="text" placeholder="Search Box" style="margin-top:10px; min-height:31px" onkeypress="initAutocomplete()">


			<div id="google_map"></div>

			<div class="copyright">
				<p> <a style="Color:white" href="https://github.com/AAROC/PHG">© 2016 Pulic Health Gateway . All rights reserved</a>| Design by <a href="http://w3layouts.com" style="Color:white">W3layouts</a></p>
			</div>

		</div>
	</body>

</html>
