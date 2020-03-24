//Handle the keydown
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

$('#createAdmin').submit( function(e){
    e.preventDefault();

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

$('#editAdminModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var firstName = button.data('first_name_edit')
    var lastName = button.data('last_name_edit')
    var email = button.data('email_edit')
    var profile = button.data('profile_edit')
    var active = button.data('active_edit')
    
    var modal = $(this)

    modal.find('#edit_first_name').val(firstName)
    modal.find('#edit_last_name').val(lastName)
    modal.find('#edit_email').val(email)
    modal.find('#edit_active').val(active)
    modal.find('#edit_profile').val(profile)
  })