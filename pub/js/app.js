(function () {
  // Variable to hold request
  var request;

  if ( $('#check_user_form') != 'undefined' ) {
    $('#check_user_form').submit(
      function (e) {
        e.preventDefault();
        // Abort any pending request
        if (request) {
            request.abort();
        }
        // Let's select and cache all the fields
        var $inputs = $('#check_user_form').find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $('#check_user_form').serialize();
        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url: $('#check_user_form').attr('action'),
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            // Log a message to the console
            var json_data = JSON.parse(response);
            var $output = "";
            if (json_data['username_count'] > 0)
            {
              $output += '<span class="result">Username already exists.</span><br>';
            }
            else if (json_data['email_count'] > 0)
            {
              $output += '<span class="result">Email already exists.</span>';
            }
            else
            {
              $output += '<span class="result">Congratulation! you can register yourself with this.</span>';
            }
            $('.advice').html($output);
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });
      }
    );
  }
})();
