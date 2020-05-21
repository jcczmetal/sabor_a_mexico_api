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
    console.log(place);

    //del objeto que arroja la API, convertimos el campo formatted_address en array.
    var fullAddressArray = place.formatted_address.split(",");

    //validamos que sea number el primer char(con substr) del primer elemento de fullAddressArray.
    var numbersPattern = /[0-9]/g;
    var isNumber = fullAddressArray[0].substr(0,1).match(numbersPattern);

    var streetToArray;

    //si isNumber no es null, entonces fullAddressArray[0] trae zipcode en el primer elemento, por eso hay que recorrer
    isNumber != null ? streetToArray = fullAddressArray[1].split(" ") : streetToArray = fullAddressArray[0].split(" ")

    var streetOnly = ' ';

    for (var total = 1; total <= (streetToArray.length - 2); total++) {
        streetOnly = streetOnly.concat(' ',streetToArray[total]);
    }

    $('#branch_name').val(place.name);

    $('#street').val(streetOnly.trim());

    $('#number').val(streetToArray[streetToArray.length - 1]);

    $('#city').val(fullAddressArray[2]);

    $('#state').val(fullAddressArray[fullAddressArray.length - 1]);
}

$('#createaddress-form').submit( function(e){

    e.preventDefault();

    $.ajax({
        type:"POST",
        url:"/restaurants/"+ $('#slug').val() +"/store",
        data: $('#createaddress-form').serialize(),
        async: true,
        dataType: 'json',

        success: function(data){
            setTimeout(function(){
                window.location.replace('/restaurants/'+ $('#slug').val() +'/addresses');
            },1000);
        },

        error: function(data){
            const entries = Object.entries(data.responseJSON.errors);

            for(const entry of entries){
                handleErrorAndResponse(entry);
            }
        }
    });
});
