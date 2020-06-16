$(document).ready(function () {

  $("#signup-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var formData = new FormData(form);
    $.ajax({
      method: "POST",
      url: "includes/signup.inc.php?",
      data: formData,
      dataType: "JSON",
      contentType: false,
      processData: false,
      success: function (response) {
        rmAll();
        console.log(response);
        if (!response.validnmae) {

          $('#name_input').addClass('error');
          $('#name_input').after('<span class="err"> Name should be A-Z a-z and space only</span>');
        }

        if (!response.validuname) {
          $('#usrname_input').addClass('error');
          $('#usrname_input').after('<span class="err"> Username should be A-Z a-z and 0-9 Only</span>');
        }

        if (!response.validemail) {
          $('#email_input').addClass('error');
          $('#email_input').after('<span class="err"> Use a valid email</span>');
        }

        if (!response.validphone) {
          $('#phone_input').addClass('error');
          $('#phone_input').after('<span class="err"> Invalid phone number e.g. 01234567213</span>');
        }

        if (!response.validoccupation) {
          $('#occ_input').addClass('error');
          $('#occ_input').after('<span class="err"> Occupation should be A-Z a-z e.g. Web Developer</span>');
        }

        if (!response.matchpass) {
          $('#ps1').addClass('error');
          $('#ps1').after('<span class="err"> Password does not match</span>');
          $('#ps2').addClass('error');
          $('#ps2').after('<span class="err"> Password does not match</span>');
        }

        if (response.exist) {

          $('#usrname_input').addClass('error');
          $('#usrname_input').after('<span id="reg-mesg" class="err"> Account already registered</span>');
          $('#email_input').addClass('error');

        }

        if(!response.needPH){
          if (!response.validext) {
            $('#file-Input').addClass('error');
            $('#file-Input').after('<span class="err"> Invalid extenstion {gif, png, jpg, jpeg} are allowed only</span>');
  
            
          }
  
          if (!response.size) {
            $('#file-Input').addClass('error');
            $('#file-Input').after('<span class="err">Maximum size 2MB </span> 	');
      
          }
        }


        if (response.success) {
          $('#register').hide();
          $('#reg-suc').after('<h2 id="reg-mesg" class="py-4 suc-message">Account created successfully</h2>');

        } else {
          console.log('register error');
        }
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

  $("#reset-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var formData = new FormData(form);

    $.ajax({
      method: "POST",
      url: "includes/resetPassword-inc.php?",
      data: formData,
      dataType: "JSON",
      contentType: false,
      processData: false,
      success: function (response) {
        if (response) {
          Swal.fire({
            title: 'Password Reset',
            text: 'Instrctions will be send to your Email if a match found in our Database. Make sure to check spam/junk folder',
            icon: 'info'
          })
        }
      }

    });
  });


  //Remove all errors spans if any
  function rmAll() {
    $('#name_input').removeClass('error');
    $('#name_input + span').remove();
    $('#email_input').removeClass('error');
    $('#email_input + span').remove();
    $('#ps1').removeClass('error');
    $('#ps1 + span').remove();
    $('#ps2').removeClass('error');
    $('#ps2 + span').remove();
    $('#usrname_input').removeClass('error');
    $('#usrname_input + span').remove();
    $('#name_input').removeClass('error');
    $('#name_input + span').remove();

    $('#file-Input').removeClass('error');
    $('#file-Input + span ').remove();
    $('#file-Input + span').remove();

    $('#phone_input').removeClass('error');
    $('#phone_input + span ').remove();

    $('#occ_input').removeClass('error');
    $('#occ_input + span').remove();
  }

  // Aimate hide forms
  $(".login").click(function () {
    $("#login").slideDown("slow");
    $("#passform").hide();
    $("#register").hide("slow");
    $("#reg-mesg").hide();
  });

  $(".register").click(function () {
    $("#login").hide("slow");
    $("#passform").hide();
    $("#register").animate({ width: "show" }, "slow");
  });

  $('#resetpass').click(function () {
    $('#login').hide('slow');
    $('#passform').slideDown('slow');
  });


  // Animate buttons
  $(".btn-custom").mouseenter(function () {
    $(".btn").stop();
    $(".btn").animate({ width: "40%" }, "slow");
  });

  $(".btn-custom").mouseleave(function () {
    $(".btn").stop();
    $(".btn").animate({ width: "30%" }, "slow");
  });

  
  
});
