   $(document).ready(function() {
            var mapCenter = new google.maps.LatLng(47.6145, -122.3418); //Google map Coordinates
            var map;
            map_initialize(); // load map
            initAutocomplete();

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
                        icon: "public/images/google_map_icons/pin_green.png" //custom pin icon
                    });

                    //Content structure of info Window for the Markers
                    var contentString = $('<div class="marker-info-win">' +
                        '<div class="marker-inner-win"><span class="info-content">' +
                        '<h1 class="marker-heading">New Marker</h1>' +
                        'This is a new marker infoWindow' +
                        '</span>' +
                        '<br /><button name="remove-marker" class="remove-marker" title="Remove Marker" style="margin-top: 10px;">Remove Marker</button></div></div>');

                    //Create an infoWindow
                    var infowindow = new google.maps.InfoWindow();

                    //set the content of infoWindow
                    infowindow.setContent(contentString[0]);

                    //add click listner to marker which will open infoWindow 		 
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map, marker); // click on marker opens info window 
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

        });