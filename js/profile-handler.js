$(document).ready(function () {
   
    $("#profile-form").submit(function (event) {
        event.preventDefault();
        var form = $(this)[0];
        var formData = new FormData(form);
        for (var value of formData.values()) {
            console.log(value); 
         }
        $.ajax({
          method: "POST",
          url: "includes/edit-profile.inc.php?",
          data: formData,
          dataType: "JSON",
          contentType: false, 
           processData: false,
          success: function (response) {
            console.log(response);
            rmAll();

          },
        });
      });

      $("#password-form").submit(function (event) {
        event.preventDefault();
        var form = $(this)[0];
        var formData = new FormData(form);
        formData.append('reset', true);
        for (var value of formData.values()) {
            console.log(value); 
         }
        $.ajax({
          method: "POST",
          url: "includes/edit-profile.inc.php?",
          data: formData,
          dataType: "JSON",
          processData: false,
          contentType: false,
          success: function (response , textStatus, jqXHR) {
            console.log(response);
            rmAll();

            if(!response.password){
                $('#newPass_input3').addClass('error2');
                $('#newPass_input3').after('<span class="err2"> Incorrect Password</span>');
            }

            if(!response.password_match){
                $('#newPass_input1').addClass('error2');
                $('#newPass_input1').after('<span class="err2"> Password does not match</span>');
                $('#newPass_input2').addClass('error2');
                $('#newPass_input2').after('<span class="err2"> Password does not match</span>');
            }


            if(response.password && response.password_match && response.password_changed){
                $('#reset').after('<span class="sueccess"> Password changed sueccessfully</span>');
               
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
        console.log(formData);
        $.ajax({
          method: "POST",
          url: "includes/edit-profile.inc.php?",
          data: formData,
          dataType: "JSON",
          contentType: false, 
           processData: false,
          success: function (response) {
            console.log(response);
            rmAll();

          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log("jqXHR:");
            console.log(jqXHR);
            console.log("textStatus:");
            console.log(textStatus);
            console.log("errorThrown:");
            console.log(errorThrown);
          },
        });
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

//Remove all errors spans if any
  function rmAll(){
    $('#newPass_input3').removeClass('error2');
    $('#newPass_input3 + span').remove();

    $('#newPass_input1').removeClass('error2');
    $('#newPass_input1 + span').remove();
    
    $('#newPass_input2').removeClass('error2');
    $('#newPass_input2 + span').remove();

    $('#reset + span').remove();
  }
        

});