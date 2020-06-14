$(document).ready(function () {

  $("#profile-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var formData = new FormData(form);
    formData.append('update', true);
    $.ajax({
      method: "POST",
      url: "includes/edit-profile.inc.php?",
      data: formData,
      dataType: "JSON",
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);


        if (!response.password) {
          Swal.fire({
            icon: 'error',
            title: "Incorrect Password"
          })
        }
        else {

          if (!response.changed) {
            Swal.fire({
              icon: 'error',
              title: "Nothing Changed"
            })
          } else {

            
              if (!response.valid_email) {
                Swal.fire({
                  icon: 'error',
                  title: "Invalid e-mail"
                })
              }
              else {
                if (response.exist) {
                  Swal.fire({
                    icon: 'error',
                    title: "E-mail already exist"
                  })
                }
              }

             
            


              if (!response.valid_name) {
                Swal.fire({
                  icon: 'error',
                  title: "Invalid Name",
                  text: "Only A-Z a-z allowed"
                })
              }
            



            if (response.newImg) {

              if (!response.valid_ext) {
                Swal.fire({
                  icon: 'error',
                  title: "Incorrect Extension",
                  text: '{gif, png or jpg Only!}'
                })
              }else {

                if (!response.size) {
                  Swal.fire({
                    icon: 'error',
                    title: "Size should be less than 2MB"
                  })
                }
              }
              }



            }


            if (response.name || response.email || response.img) {
              Swal.fire({
                icon: 'success',
                title: "Profile Updated!"
              })
            }
          }


        },
      });
  });


  $("#password-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var formData = new FormData(form);
    formData.append('reset', true);

    $.ajax({
      method: "POST",
      url: "includes/edit-profile.inc.php?",
      data: formData,
      dataType: "JSON",
      processData: false,
      contentType: false,
      success: function (response, textStatus, jqXHR) {

        if (!response.password) {
          Swal.fire({
            icon: 'error',
            title: "Incorrect Password",
          })
        }

        if (!response.password_match) {
          Swal.fire({

            title: "Password Does't Match",
          })
        }


        if (response.password && response.password_match && response.password_changed) {
          Swal.fire({
            title: 'Password Changed',
            icon: 'success',
          })

        }


      },
      error: function (jqXHR, textStatus, errorThrown, exception) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      },
    });
  });





  $("#delete-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var formData = new FormData(form);
    formData.append('delete', true);
    Swal.fire({
      title: 'Are you sure?',
      text: 'You will not be able to recover your account!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete!',
      cancelButtonText: 'Cancel',
      confirmButtonColor: 'red',
      cancelButtonColor: 'green'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "includes/edit-profile.inc.php?",
          data: formData,
          dataType: "JSON",
          contentType: false,
          processData: false,
          success: function (response) {
            console.log(response);

            if (!response.password) {
              $('#delete-input').addClass('error2');
              $('#delete-input').after('<span class="err2"> Incorrect Password</span>');
            }

            if (response.deleted) {
              window.location = "logout.php?deleted=" + response.deleted;
            }

          },

        });

      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelled',
          'You can keep enjoying us with'
        )
      }
    })

  });


  $('#home-tab').click(function () {
    $('#home').show('slow');
    $('#profile').hide('slow');
    $('#password').hide('slow');
    $('#delete').hide('slow');
  });

  $('#profile-tab').click(function () {
    $('#profile').show('slow');
    $('#home').hide('slow');
    $('#password').hide('slow');
    $('#delete').hide('slow');
  });

  $('#password-tab').click(function () {
    $('#password').show('slow');
    $('#home').hide('slow');
    $('#profile').hide('slow');
    $('#delete').hide('slow');
  });

  $('#delete-tab').click(function () {
    $('#delete').show('slow');
    $('#home').hide('slow');
    $('#profile').hide('slow');
    $('#password').hide('slow');
  });

});