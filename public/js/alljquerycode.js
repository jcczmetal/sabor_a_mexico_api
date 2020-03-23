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
    var firstNameEditAdmin = button.data('firstNameEditAdmin')
    var lastNameEditAdmin = button.data('lastNameEditAdmin')
    var emailEditAdmin = button.data('emailEditAdmin')
    var passwordEditAdmin = button.data('lastNameEditAdmin')
    
    
    var modal = $(this)
    modal.find('#modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })