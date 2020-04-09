/*
    First, handle the create process.
*/
/*
    keydown
        removeClass("is-valid") on input
        .empty() on div showing validation error messages

    dismiss modal
        removeClass("is-valid") on input
        .empty() on div showing validation error messages

    on error ajax request
        .addClass("is-invalid")
        .append(data.errors.attribute)
*/

$("#newadmin_firstname").keydown(function() {
    $('#newadmin_firstname').removeClass("is-invalid");
    $('#newadmin_firstname').empty();
});

$("#newadmin_lastname").keydown(function() {
    $('#newadmin_lastname').removeClass("is-invalid");
    $('#newadmin_lastname').empty();
});

$("#newadmin_email").keydown(function() {
    $('#newadmin_email').removeClass("is-invalid");
    $('#newadmin_email').empty();
});

$("#newadmin_password").keydown(function() {
    $('#newadmin_password').removeClass("is-invalid");
    $('#newadmin_password').empty();
});

$("#dismissModal").click(function() {
    $('#newadmin_firstname').removeClass("is-invalid");
    $('#newadmin_firstname').empty();
    $('#newadmin_firstname_error').empty();
    $('#newadmin_lastname').removeClass("is-invalid");
    $('#newadmin_lastname').empty();
    $('#newadmin_lastname_error').empty();
    $('#newadmin_email').removeClass("is-invalid");
    $('#newadmin_email').empty();
    $('#newadmin_email_error').empty();
    $('#newadmin_password').removeClass("is-invalid");
    $('#newadmin_password').empty();
    $('#newadmin_password_error').empty();
});

$('#createadmin-form').submit( function(e){
    e.preventDefault();

    console.log($('#createadmin-form').serialize());

    $.ajax({
        type:"POST",
        url:"/administrators/store",
        data: $('#createadmin-form').serialize(),
        async: true,
        dataType: 'json',

        success: function(data){
            alert("good");
            setTimeout(function(){
                window.location.replace('/administrators/index');
            },3000);
        },

        error: function(data){
            var data = data.responseJSON;

            console.log(data);

            if(data.errors.newadmin_firstname){
                $('#newadmin_firstname').addClass("is-invalid");
                if(!$('#newadmin_firstname_error').text().length){
                    $('#newadmin_firstname_error').append(data.errors.newadmin_firstname);
                }
            }

            if(data.errors.newadmin_lastname){
                $('#newadmin_lastname').addClass("is-invalid");
                if(!$('#newadmin_lastname_error').text().length){
                    $('#newadmin_lastname_error').append(data.errors.newadmin_lastname);
                }
            }

            if(data.errors.newadmin_email){
                $('#newadmin_email').addClass("is-invalid");
                if(!$('#newadmin_email_error').text().length){
                    $('#newadmin_email_error').append(data.errors.newadmin_email);
                }
            }

            if(data.errors.newadmin_password){
                $('#newadmin_password').addClass("is-invalid");
                if(!$('#newadmin_password_error').text().length){
                    $('#newadmin_password_error').append(data.errors.newadmin_password);
                }
            }
        }
    });
});
/*
    After that, handle the edit
*/

//First, handle the keydown for every form input
$("#editadmin-firstname").keydown(function() {
    $('#editadmin-firstname').removeClass("is-invalid");
    $('#editadmin-firstname-error').empty();
});

$("#editadmin-lastname").keydown(function() {
    $('#editadmin-lastname').removeClass("is-invalid");
    $('#editadmin-lastname-error').empty();
});

$("#editadmin-email").keydown(function() {
    $('#editadmin-email').removeClass("is-invalid");
    $('#editadmin-email-error').empty();
});

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
            alert("good");
            setTimeout(function(){
                window.location.replace('/administrators/index');
            },3000);
        },

        error: function(data){
            var data = data.responseJSON;

            console.log(data);

            if(data.errors.editadmin_firstname){
                $('#editadmin_firstname').addClass("is-invalid");
                if(!$('#editadmin_firstname_error').text().length){
                    $('#editadmin_firstname_error').append(data.errors.editadmin_firstname);
                }
            }

            if(data.errors.editadmin_lastname){
                $('#editadmin_lastname').addClass("is-invalid");
                if(!$('#editadmin_lastname_error').text().length){
                    $('#editadmin_lastname_error').append(data.errors.editadmin_lastname);
                }
            }

            if(data.errors.editadmin_email){
                $('#editadmin_email').addClass("is-invalid");
                if(!$('#editadmin_email_error').text().length){
                    $('#editadmin_email_error').append(data.errors.editadmin_email);
                }
            }
        }
    });
});

$("#dismiss-modal-edit").click(function() {
    $('#editadmin_firstname').removeClass("is-invalid");
    $('#editadmin_firstname_error').empty();
    $('#editadmin_lastname').removeClass("is-invalid");
    $('#editadmin_lastname_error').empty();
    $('#editadmin_email').removeClass("is-invalid");
    $('#editadmin_email_error').empty();
    $('#editadmin_active').removeClass("is-invalid");
});

//Falta hacer que las validaciones desaparezcan cuando se hace click fuera del modal.
