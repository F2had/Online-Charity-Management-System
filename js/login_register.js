$(document).ready(function () {
  $("#signup-form").submit(function (event) {
    event.preventDefault();
    
    $.ajax({
      method: "POST",
      url: "includes/signup.inc.php?",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (response) {
        console.log(response);
        rmAll();
        if(!response.validnmae){
            $('#name_input').addClass('error');
            $('#name_input').after('<span class="err"> Name should be A-Z a-z and space only</span>');
        }

        if(!response.validuname){
            $('#usrname_input').addClass('error');
            $('#usrname_input').after('<span class="err"> Username should be A-Z a-z and 0-9 Only</span>');
        }

        if(!response.validemail){
          $('#email_input').addClass('error');
          $('#email_input').after('<span class="err"> Use a valid email</span>');
      }

        if(!response.matchpass){
            $('#ps1').addClass('error');
            $('#ps1').after('<span class="err"> Password does not match</span>');
            $('#ps2').addClass('error');
            $('#ps2').after('<span class="err"> Password does not match</span>');
        }

        if(response.exist){
        
            $('#usrname_input').addClass('error');
            $('#usrname_input').after('<span id="reg-mesg" class="err"> Account already registered</span>');
            $('#email_input').addClass('error');
            
        }

        if(response.success){
          $('#register').hide();
          $('#reg-suc').after('<h2 id="reg-mesg" class="py-4 suc-message">Account created successfully</h2>');
          
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

  //Remove all errors spans if any
  function rmAll(){
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
  }

  // Aimate hide forms
  $(".login").click(function () {
    $("#login").slideDown("slow");
    $("#register").hide("slow");
    $("#reg-mesg").hide();
  });

  $(".register").click(function () {
    $("#login").hide("slow");
    $("#register").animate({ width: "show" }, "slow");
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
