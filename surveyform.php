<?php
include_once('includes/config.php');
if (!isset($_SESSION['userselected'])) {
    $_SESSION['userselected'] = array();
}
$surveyJSON = file_get_contents('survey-questions.json');
$survey = json_decode($surveyJSON, true);
$currentQuestionId = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentQuestionId = $_POST['currentQuestionId'];
    $response = $_POST['response'];
    $_SESSION['userselected']['question_no' . ($currentQuestionId - 1)] = $response;

    // Check if the user selected "Commercial" for question 1
    if ($currentQuestionId == 6) {
        $question1Response = isset($_SESSION['userselected']['question_no1']) ? $_SESSION['userselected']['question_no1'] : '';

        // Check if the user selected "Commercial" for question 1
        if ($question1Response == 'Commercial') {
            // Skip question 6 by setting the next question ID to the appropriate value
            $currentQuestionId = 7; // Change this to the ID of the next relevant question
        } elseif ($question1Response == 'Rent') {
            // If "Rent" is selected, you want to show question 6 as well
            $currentQuestionId = 6; // Change this to the ID of the next relevant question
        }
    }



    if ($currentQuestionId == 2) {
        $mobileNumber = isset($_POST['mobileNumber']) ? trim($_POST['mobileNumber']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';

        // // Debugging: Print the values of mobileNumber and email
        // echo "mobileNumber: " . $mobileNumber . "<br>";
        // echo "email: " . $email . "<br>";
        $_SESSION['userselected']['question_no11'] = $mobileNumber;
        $_SESSION['userselected']['question_no12'] = $email;

        print_r($_SESSION['userselected']);
    }
}

$currentQuestion = $survey[$currentQuestionId];
if ($currentQuestionId == 10 || $currentQuestionId == 9) {
    // Determine the sheet name based on the response to question no. 2
    $question2Response = isset($_SESSION['userselected']['question_no2']) ? trim($_SESSION['userselected']['question_no2']) : '';
    $sheetName = ($question2Response == 'Own') ? 'Survey_Own' : 'Survey_Rent';
    require_once('postToGooggleSheet.php');
    foreach ($_SESSION['userselected'] as $question => $response) {
        $dataArray[$question] = $response;
    }
    insertIntoSheets($sheetName, $dataArray);
    unset($_SESSION['userselected']);
}
?>

<form action="#" method="post" id="surveyformid" name="surveyformid" class="technaus-contact-form">
    <div id="question<?php echo $currentQuestionId; ?>" class="card-3d">
        <div class="card-body">
            <?php
            if ($currentQuestionId == 9 || $currentQuestionId == 10) {
                // Display the thank you image
                echo '<img src="assets/custom/images/site/thanks.png" alt="Thank You" style="height:200px">';
            }
            ?>
            <!-- // for 1st question need to get mobile and email -->
            <?php
            if ($currentQuestionId == 1) { ?>

                <div class="form-group text-left" style="margin-left: 70px;">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="technaus-second-text-color" for="mobileNumber">Mobile Number: <span
                                    style="color: red;">*</span></label>
                            <input class="form-control" type="text" name="mobileNumber" id="mobileNumber" required
                                placeholder="xxxxxxxxxx">
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

                <h4 class="card-title text-left technaus-second-text-color" style="margin-left: 50px;">
                    <?php echo $currentQuestion['question']; ?>
                </h4>

                <div class="form-group text-left" style="margin-left: 70px;">
                    <div class="form-check mb-2">
                        <?php foreach ($currentQuestion['options'] as $option => $nextQuestionId): ?>
                            <input class="form-check-input" type="radio" name="response"
                                id="<?php echo 'option_' . $nextQuestionId; ?>" value="<?php echo $option; ?>"
                                data-next-question="<?php echo $nextQuestionId; ?>" required>
                            <label for="<?php echo 'option_' . $nextQuestionId; ?>">
                                <?php echo $option; ?>
                            </label><br>
                        <?php endforeach; ?>
                    </div>
                </div>             

            <?php } else { ?>
                <!-- ------- qestion here ----  -->
                <h4 class="card-title text-left technaus-second-text-color" style="margin-left: 50px;">
                    <?php echo $currentQuestion['question']; ?>
                </h4>

                <div class="form-group text-left" style="margin-left: 70px;">
                    <div class="form-check mb-2">
                        <?php foreach ($currentQuestion['options'] as $option => $nextQuestionId): ?>
                            <input class="form-check-input" type="radio" name="response"
                                id="<?php echo 'option_' . $nextQuestionId; ?>" value="<?php echo $option; ?>"
                                data-next-question="<?php echo $nextQuestionId; ?>" required>
                            <label for="<?php echo 'option_' . $nextQuestionId; ?>">
                                <?php echo $option; ?>
                            </label><br>
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <input id="currentQuestionId" type="hidden" name="currentQuestionId" value="<?php echo $currentQuestionId; ?>" />
    <button type="submit" id="nextButton" name="nextButton"
        class="btn technaus-second-background-color rounded-0 text-white btn-block p-3 mt-5">Next</button>
    <button type="button" id="backButton" name="backButton" onclick="history.back()"
        class="btn btn-secondary rounded-0 text-white btn-block p-3 mt-3" <?php if ($currentQuestionId == 1)
            echo 'style="display: none;"'; ?>>Back</button>
</form>

<script>
    $(function () {
        var currentQuestionId = <?php echo $currentQuestionId; ?>; // Initialize with the current question ID
        function toggleButtons() {
            if (currentQuestionId === 9 || currentQuestionId === 10) {
                $('#nextButton, #backButton').hide();
            } else if (currentQuestionId === 1) {
                $('#backButton').hide(); // Hide the Back button on the first question
                $('#nextButton').show(); // Show the Next button
            } else {
                $('#nextButton, #backButton').show(); // Show both buttons for other questions
            }
        }
        toggleButtons(); // Initial button visibility setup

        $('#surveyformid').submit(function () {
            $('#buttontype').val("nextbutton");
            var selectedResponse = $('input[name="response"]:checked');
            if (selectedResponse) {
                var nextQuestionId = selectedResponse.data('next-question');
                $('#currentQuestionId').val(nextQuestionId);
                currentQuestionId = nextQuestionId; // Update currentQuestionId
                toggleButtons(); // Update button visibility
            }
        });

        // Show User Responses section when the survey is complete
        if (currentQuestionId === 8) {
            $('#userResponses').show();
        }
    });
</script>