//Todo input vacío (con error al hacer submit), al escribir en el, se elimina la clase is-invalid.
$(".form-control").keydown(function(){
    var input =  '#' + $(this).attr("id");

    $(input).removeClass("is-invalid");
});

//Todo input con error (y su respectivo mensaje desde servidor) es eliminado al ocultarse el modal.
$('.modal').on('hide.bs.modal', function () {
    $.each($('.form-control'), function(){
        var input = '#' + $(this).attr('id');
        var error = '#' + $(this).attr('id') + '_error';

        $(input).removeClass("is-invalid");
        $(input).empty();
        $(error).empty();
    });
})

// en cada manejo de respuesta error de un ajax request, pintar valores adecuados para inputs en modal forms.
function handleErrorAndResponse(data) {
    const id      = '#' + data[0];
    const error   = id + '_error'
    const message = Object.values(data[1]);

    $(id).addClass("is-invalid");

    if (!$(error).text().length) {
        $(error).append(message[0]);
    }
}

$('#createadmin-form').submit( function(e){

    e.preventDefault();

    $.ajax({
        type:"POST",
        url:"/administrators/store",
        data: $('#createadmin-form').serialize(),
        async: true,
        dataType: 'json',

        success: function(data){
            setTimeout(function(){
                window.location.replace('/administrators/index');
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
/*
    After that, handle the edit
*/

$('#editadmin-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var adminId = button.data('editadmin_id')
    var firstName = button.data('editadmin_firstname')
    var lastName = button.data('editadmin_lastname')
    var email = button.data('editadmin_email')
    var profile = button.data('editadmin_profile')
    var active = button.data('editadmin_active')

    var modal = $(this)

    modal.find('#editadmin_id').val(adminId)
    modal.find('#editadmin_firstname').val(firstName)
    modal.find('#editadmin_lastname').val(lastName)
    modal.find('#editadmin_email').val(email)
    modal.find('#editadmin_active').val(active)
    modal.find('#editadmin_profile').val(profile)
})

$('#editadmin-form').submit( function(e){
    e.preventDefault();

    $.ajax({
        type:"PUT",
        url:'/administrators/'+ $('#editadmin_id').val() +'/update',
        data: $('#editadmin-form').serialize(),
        async: true,
        dataType: 'json',

        success: function(data){
            setTimeout(function(){
                window.location.replace('/administrators/index');
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


$('#createassociate-form').submit( function(e){
    e.preventDefault();

    console.log($('#createassociate-form').serialize());

    $.ajax({
        type:"POST",
        url:"/associate/store",
        data: $('#createassociate-form').serialize(),
        async: true,
        dataType: 'json',

        success: function(data){
            setTimeout(function(){
                window.location.replace('/associate/index');
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

/*
    After that, handle the edit
*/
$('#editassociate-modal').on('show.bs.modal', function (event) {
    var button    = $(event.relatedTarget) // Button that triggered the modal
    var adminId   = button.data('editassociate_id')
    var firstName = button.data('editassociate_firstname')
    var lastName  = button.data('editassociate_lastname')
    var email     = button.data('editassociate_email')
    var profile   = button.data('editassociate_profile')
    var active    = button.data('editassociate_active')

    var modal = $(this)

    modal.find('#editassociate_id').val(adminId)
    modal.find('#editassociate_firstname').val(firstName)
    modal.find('#editassociate_lastname').val(lastName)
    modal.find('#editassociate_email').val(email)
    modal.find('#editassociate_active').val(active)
    modal.find('#editassociate_profile').val(profile)
})

$('#editassociate-form').submit( function(e){
    e.preventDefault();

    $.ajax({
        type:"PUT",
        url:'/associate/'+ $('#editassociate_id').val() +'/update',
        data: $('#editassociate-form').serialize(),
        async: true,
        dataType: 'json',

        success: function(data){
            setTimeout(function(){
                window.location.replace('/associate/index');
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

$('#createrestaurant-form').submit( function(e){
    e.preventDefault();

    $.ajax({
        type:"POST",
        url:"/restaurants/store",
        data: $('#createrestaurant-form').serialize(),
        async: true,
        dataType: 'json',

        success: function(data){
            //Maneja una mensaje de que el restaurante fue guardado con éxito y que el usuario será redireccionado

            setTimeout(function(){
                window.location.replace('/restaurants/'+ data);
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



/*
function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13,
        mapTypeId: 'roadmap'
    });

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

            console.log(place);
        });

        map.fitBounds(bounds);
    });
}
*/
