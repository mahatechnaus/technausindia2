<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize user inputs
    $mobileNumber = isset($_POST['mobileNumber']) ? trim($_POST['mobileNumber']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Check if the mobile number is 10 characters and contains only digits
    if (strlen($mobileNumber) === 10 && ctype_digit($mobileNumber)) {
        // Store mobile number in session
        $_SESSION['mobileNumber'] = $mobileNumber;
    }

    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Store email in session
        $_SESSION['email'] = $email;
    }

}
ob_end_flush();
?>

<!-- Start of your HTML content -->
<form action="survey.php" method="post" id="surveymobid" name="surveymobid" class="technaus-contact-form">
    <div class="card-3d">
        <div class="card-body">
            <div class="form-group text-left" style="margin-left: 70px;">
                <div class="row">
                    <div class="col-md-6">
                        <label class="technaus-second-text-color" for="mobileNumber">Mobile Number: <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="mobileNumber" id="mobileNumber" required
                            placeholder="xxxxx xxxxx">
                        <span id="mobileNumberError" style="color: red;"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="technaus-second-text-color" for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" 
                        placeholder="youremail@email.com">
                        <span id="emailError" style="color: red;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" id="startsurveybtn" name="startsurveybtn"
                class="btn technaus-second-background-color rounded-0 text-white  p-3 mt-3">Start Survey</button>

            <button type="button" id="clearbtn" name="clearbtn"
                class="btn btn-secondary rounded-0 text-white p-3 mt-3">Reset</button>

        </div>
    </div>
</form>
<!-- End of your HTML content -->


<script>
    // JavaScript to clear input fields when the Reset button is clicked
    $(document).ready(function () {
        $('#clearbtn').click(function () {
            $('#mobileNumber').val('');
            $('#email').val('');
        });
    });
</script>
<script>
    document.getElementById('mobileNumber').addEventListener('input', function () {
        var mobileNumber = this.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters

        if (mobileNumber.length > 10) {
            mobileNumber = mobileNumber.substring(0, 10); // Limit to 10 digits
        }

        var formattedMobileNumber = mobileNumber.replace(/(\d{5})(\d{5})/, '$1 $2'); // Format as "xxxxx xxxxx"
        this.value = formattedMobileNumber;

        var mobileNumberError = document.getElementById('mobileNumberError');
        if (mobileNumber.length !== 10) {
            mobileNumberError.textContent = 'Please enter a 10-digit mobile number';
        } else {
            mobileNumberError.textContent = ''; // Clear the error message
        }
    });

    document.getElementById('email').addEventListener('input', function () {
        var email = this.value;
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        var emailError = document.getElementById('emailError');
        if (!emailPattern.test(email)) {
            emailError.textContent = 'Please enter a valid email address';
        } else {
            emailError.textContent = ''; // Clear the error message
        }
    });
</script>
