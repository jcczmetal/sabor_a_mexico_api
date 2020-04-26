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
            setTimeout(function(){
                window.location.replace('/restaurants/index');
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
