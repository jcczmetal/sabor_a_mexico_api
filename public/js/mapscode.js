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
    $('#branch').val('');
    $('#street').val('');
    $('#number').val('');
    $('#city').val('');
    $('#state').val('');

    console.log(place.formatted_address);
    console.log(place.address_components);

    var addressObjects = place.address_components.filter(function(object){
        if(object.types[0] == 'street_number' ||
           object.types[0] == 'route' ||
           object.types[0] == 'locality' ||
           object.types[0] == 'administrative_area_level_1') {
            return object;
        }
    }).map(element => element.long_name);

    console.log(addressObjects);

    $('#branch').val(place.name);

    $('#number').val(addressObjects[0]);

    $('#street').val(addressObjects[1]);

    $('#city').val(addressObjects[2]);

    $('#state').val(addressObjects[3]);

    var lat = place.geometry.location.lat();
    $('#lat').val(lat);

    var lng = place.geometry.location.lng();
    $('#lng').val(lng);
}
