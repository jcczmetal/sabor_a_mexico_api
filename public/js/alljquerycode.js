/*
    First, handle the create process.
*/
$("#firstNameNewAdmin").keydown(function() {
    $('#firstNameNewAdmin').removeClass("is-invalid");
});

$("#lastNameNewAdmin").keydown(function() {
    $('#lastNameNewAdmin').removeClass("is-invalid");
});

$("#emailNewAdmin").keydown(function() {
    $('#emailNewAdmin').removeClass("is-invalid");
});

$("#passwordNewAdmin").keydown(function() {
    $('#passwordNewAdmin').removeClass("is-invalid");
});

$("#dismissModal").click(function() {
    $('#firstNameNewAdmin').removeClass("is-invalid");
    $('#lastNameNewAdmin').removeClass("is-invalid");
    $('#emailNewAdmin').removeClass("is-invalid");
    $('#passwordNewAdmin').removeClass("is-invalid");
});

$('#createAdmin').submit( function(e){
    e.preventDefault();

    console.log($('#createAdmin').serialize());

    $.ajax({
        type:"POST",
        url:"/administrators/store",
        data: $('#createAdmin').serialize(),
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

            if(data.errors.firstNameNewAdmin){
                $('#firstNameNewAdmin').addClass("is-invalid");
            }
            
            if(data.errors.lastNameNewAdmin){
                $('#lastNameNewAdmin').addClass("is-invalid");
            }

            if(data.errors.emailNewAdmin){
                $('#emailNewAdmin').addClass("is-invalid");
            }

            if(data.errors.passwordNewAdmin){
                $('#passwordNewAdmin').addClass("is-invalid");
            }
        }
    });
});
/*
    After that, handle the edit
*/

//First, handle the keydown for every form input 
$("#edit_first_name").keydown(function() {
    $('#edit_first_name').removeClass("is-invalid");
});

$("#edit_last_name").keydown(function() {
    $('#edit_last_name').removeClass("is-invalid");
});

$("#edit_email").keydown(function() {
    $('#edit_email').removeClass("is-invalid");
});


$('#editAdminModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var adminId = button.data('admin_id_edit')
    var firstName = button.data('first_name_edit')
    var lastName = button.data('last_name_edit')
    var email = button.data('email_edit')
    var profile = button.data('profile_edit')
    var active = button.data('active_edit')
    
    var modal = $(this)

    modal.find('#edit_admin_id').val(adminId)
    modal.find('#edit_first_name').val(firstName)
    modal.find('#edit_last_name').val(lastName)
    modal.find('#edit_email').val(email)
    modal.find('#edit_active').val(active)
    modal.find('#edit_profile').val(profile)
})

$('#editAdmin').submit( function(e){
    e.preventDefault();

    $.ajax({
        type:"PUT",
        url:'/administrators/'+ $('#edit_admin_id').val() +'/update',
        data: $('#editAdmin').serialize(),
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

            if(data.errors.edit_first_name){
                $('#edit_first_name').addClass("is-invalid");
                $('#edit_first_name_error').append(data.errors.edit_first_name);
            }
            
            if(data.errors.edit_last_name){
                $('#edit_last_name').addClass("is-invalid");
                $('#edit_last_name_error').append(data.errors.edit_last_name);
            }

            if(data.errors.edit_email){
                $('#edit_email').addClass("is-invalid");
                $('#edit_email_error').append(data.errors.edit_email);
            }
        }
    });
});


$("#dismiss-modal-edit").click(function() {
    $('#edit_first_name').removeClass("is-invalid");
    $('#edit_last_name').removeClass("is-invalid");
    $('#edit_email').removeClass("is-invalid");
    $('#edit_active').removeClass("is-invalid");
});


//Falta hacer que las validaciones desaparezcan cuando se hace click fuera del modal.
