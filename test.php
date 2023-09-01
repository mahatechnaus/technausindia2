<?php

class Config
{

    const GOOGLE_RECAPTCHA_SITE_KEY = '6LfKYpIjAAAAAJ8OSkWEy3MCjeD7MT8cOYCfjzDU';

    const GOOGLE_RECAPTCHA_SECRET_KEY = '6LfKYpIjAAAAAJrltbdH6agUwMRX4VLxmDFsfvSw';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Quote Form</title>
        <!-- recaptcha  -->
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {
        $("#getquote").on('submit', function (e) {
            e.preventDefault();
            grecaptcha.ready(function () {
                grecaptcha.execute('<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>', { action: 'submit' }).then(function (token) {
                    $('#g-recaptcha-response').val(token);
                    // Continue with form submission
                    $("#getquote")[0].submit(); // Submit the form
                });
            });
        });
    });
</script>
</head>
<body>
<?php
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    $successMessage = $_GET['message'];
    // Debugging statements
    echo "Entered the success condition.";
    echo "Success Message: " . $successMessage;
    ?>
    <div id="respmessage" class="respmessage">
        <?php echo $successMessage; ?>
    </div>
<?php
}
?>
            <form action="requestform_ajax.php" method="post" id="getquote" name="getquote"
                class="technaus-contact-form">

                <!-- <form class="technaus-contact-form" id="quoteForm" method="POST" action="process_form.php"
                onsubmit="return validateForm()"> -->
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control rounded-0 p-3" placeholder="Name"
                        required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control rounded-0 p-3" placeholder="Email"
                        required>
                </div>
                <div class="form-group">
                    <input type="tel" id="mobile" name="mobile" class="form-control rounded-0 p-3" placeholder="Mobile"
                        required>
                </div>
                <div class="form-group">
                    <select class="form-control rounded-0 p-3" id="category" name="category" style="height: auto;"
                        required>
                        <option value="" selected disabled>Select Category</option>
                        <option value="ressolarcat">Residential Solar</option>
                        <option value="comsolarcat">Commercial Solar</option>
                        <option value="batterycat">Battery Storage</option>
                        <option value="evchargingcat">EV Charging</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control rounded-0 p-3" id="message" name="message" placeholder="Message"
                        rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="g-recaptcha-response" value="" id="g-recaptcha-response">
                </div>


                <button type="submit" id="quote_form" name="quote_form"
                    class="btn technaus-second-background-color rounded-0 text-white btn-block p-3 g-recaptcha">
                    Get Quote</button>
                <input type="hidden" name="quoteSubmited" value="quoteSubmited" />
            </form>
</body>
<!-- recaptcha -->
<script>
    $(function () {
        $("#getquote").on('submit', function (e) {
            e.preventDefault();
            var partnerForm = $(this);
            grecaptcha.ready(function () {
                grecaptcha.execute('6LfKYpIjAAAAAJ8OSkWEy3MCjeD7MT8cOYCfjzDU', {
                    action: 'submit'
                }).then(function (token) {
                    $('#g-recaptcha-response').val(token);
                    $.ajax({
                        url: partnerForm.attr('action'),
                        type: 'post',
                        data: partnerForm.serialize(),
                        success: function (response) {
                            if (response.status == 'success') {
                                // $("#partner_request_form").hide();
                                $('#getquote')[0].reset();
                            }
                            $("#respmessage").html(response.message);
                        }
                    });
                });
            });
        });
    });

</script>
<!-- recaptcha end -->

</html>
