<script src="https://www.google.com/recaptcha/api.js?render=<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>"></script>
<div class="col-12 col-sm-6 wow fadeInLeft">
    <div id="respmessage" class="respmessage" style="display: none;"></div>
    <form action="requestform_ajax.php" method="post" id="getquote" name="getquote" class="technaus-contact-form">
        <div class="form-group">
            <input type="text" id="name" name="name" class="form-control rounded-0 p-3" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="email" id="email" name="email" class="form-control rounded-0 p-3" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="tel" id="mobile" name="mobile" class="form-control rounded-0 p-3" placeholder="Mobile"
                required>
        </div>
        <div class="form-group">
            <select class="form-control rounded-0 p-3" id="category" name="category" style="height: auto;" required>
                <option value="" selected disabled>Select Category</option>
                <option value="Residential Solar">Residential Solar</option>
                <option value="Commercial Solar">Commercial Solar</option>
                <option value="Battery Storage">Battery Storage</option>
                <option value="EV Charging">EV Charging</option>
            </select>
        </div>
        <div class="form-group">
            <textarea class="form-control rounded-0 p-3" id="message" name="message" placeholder="Message" rows="3"
                required></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="g-recaptcha-response" value="" id="g-recaptcha-response">
        </div>
        <button type="submit" id="quote_form" name="quote_form"
            class="btn technaus-second-background-color rounded-0 text-white btn-block p-3 g-recaptcha">
            Get Quote</button>
        <input type="hidden" name="quoteSubmited" value="quoteSubmited" />
    </form>
</div>



<script>
    $(document).ready(function () {
        $("#respmessage").html('');
    });  
</script>

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
                            console.log(response);
                            if (response.status == 'success') {
                                $('#getquote')[0].reset();
                            }
                            $("#respmessage").html(response.message).show();
                        }
                    });
                });
            });
        });
    });


</script>
<!-- recaptcha end -->