$(function() {

  $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var name = $("input#name").val();
      var email = $("input#email").val();
      var phone = $("input#Phone").val();
      var message = $("textarea#message").val();
      var capInput = $("input#capInput").val();
      var capA = $("#conA").val();
      var capB = $("#conB").val();
      var capC = $("#conC").val();
      var capD = $("#conD").val();
      var firstName = name; // For Success/Failure Message

      console.log(capA);
      console.log(capB);
      console.log(capC);
      console.log(capD);
      console.log(capInput);
      // Check for white space in name for Success/Fail message
      if (firstName.indexOf(' ') >= 0) {
        firstName = name.split(' ').slice(0, -1).join(' ');
      }
      $this = $("#sendMessageButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      $.ajax({
        url: "./captcha/contact.php",
        type: "POST",
        data: {
          name: name,
          phone: phone,
          email: email,
          message: message,
          capInput: capInput,
          capA: capA,
          capB: capB,
          capC: capC,
          capD: capD
        },
        cache: false,
        success: function(msg) {
          if(msg == "true")
          {
            console.log("email send");
            console.log(name);
            console.log(email);
            // Success message
            $('#success').html("<div class='alert alert-success'>");
            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-success')
              .append("<strong>Message send!.</strong>");
            $('#success > .alert-success')
              .append('</div>');
            //clear all fields
            $('#contactForm').trigger("reset");
          }
          else
          {
             // Failure message
             $('#error').html("<div class='alert alert-danger'>");
             $('#error > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
               .append("</button>");
             $('#error > .alert-danger')
               .append("<strong>Error: " + msg + " </strong>");
             $('#error > .alert-danger')
               .append('</div>');
          }
        	
        },
        error: function(msg) {
            // Failure message
            $('#error').html("<div class='alert alert-danger'>");
            $('#error > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#error > .alert-danger')
              .append("<strong>Error: " + msg + " </strong>");
            $('#error > .alert-danger')
              .append('</div>');
        },
        complete: function() {
          setTimeout(function() {
            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
          }, 1000);
        }
      });
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
  $('#success').html('');
});
