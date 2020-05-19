function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 19.370952, lng: -99.164937},
        zoom: 13,
        mapTypeId: 'roadmap'
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('addressComplete');
    var searchBox = new google.maps.places.SearchBox(input);

    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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

            getGeoAddress(place);
        });

        map.fitBounds(bounds);
    });
}

function getGeoAddress(place) {
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();

    var formattedAddress = place.formatted_address;
    var addressChunk = formattedAddress.split(",");

    //cada chunk debe analizarse si empieza con un número o con letra.

    console.log(addressChunk.length);

    //$('#number').val(number);

    //var street = place.address_components[1].long_name;
    //$('#street').val(street);

    //var zipcode = place.address_components[6].long_name; //zipcode
    //$('#zipcode').val(zipcode);

    //var city = place.address_components[2].long_name; //Ciudad... estado, más bien.
    //$('#city').val(city);

    //var five = place.address_components[4]; //
}
