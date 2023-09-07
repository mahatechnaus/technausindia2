<?php
// Check if the page is loaded for the first time (no POST data)
$isFirstLoad = empty($_POST);
// Delete the user-responses.json file if it's the first load
if ($isFirstLoad && file_exists('user-responses.json')) {
    unlink('user-responses.json');
}
$surveyJSON = file_get_contents('survey-questions.json');
$survey = json_decode($surveyJSON, true);
$currentQuestionId = 1;
$userResponses = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentQuestionId = $_POST['currentQuestionId'];
    $response = $_POST['response']; 
    // Check if the user-responses.json file exists before reading it
    if (file_exists('user-responses.json')) {
        $userResponsesJSON = file_get_contents('user-responses.json');
        $userResponses = json_decode($userResponsesJSON, true);
    }    
    $userResponses[$currentQuestionId-1] = $response;
    // Save the updated JSON object to a file
    $userResponsesJSON = json_encode($userResponses, JSON_PRETTY_PRINT);
    if (file_put_contents('user-responses.json', $userResponsesJSON) === false) {
        echo 'Error saving user responses.';
    } else {
        // echo 'User responses saved successfully.';
    }
}
$currentQuestion = $survey[$currentQuestionId];
// Load and display user responses
if (file_exists('user-responses.json')) {
    $userResponsesJSON = file_get_contents('user-responses.json');
    $userResponses = json_decode($userResponsesJSON, true);
}
?>


<div id="respmessage" class="respmessage" style="display: none;">Please submit your answer</div>

<!-- <?php
// Display user responses
if (!empty($userResponses) && $currentQuestionId == 8) {
    echo '<h2 class="user-responses-heading">User Responses:</h2>';
    echo '<ul class="user-responses-list">';
    foreach ($userResponses as $questionId => $response) {
        echo '<li class="user-response-item">';
        echo "Question $questionId: $response";
        echo '</li>';
    }
    echo '</ul>';
}
?> -->

<form action="#" method="post" id="surveyformid" name="surveyformid" class="technaus-contact-form">

    <div id="question<?php echo $currentQuestionId; ?>" class="card-3d">
        <div class="card-body">

        <?php
// Display user responses
if (!empty($userResponses) && $currentQuestionId == 8) {
      // Display the thank you image
    echo '<img src="assets/custom/images/site/thanks.png" alt="Thank You" style="height:200px">';
}
?>


            <h4 class="card-title text-left" style="margin-left: 50px;">
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
            if (currentQuestionId === 8 || currentQuestionId === 10) {
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




<!-- working uk  -->
<!-- <script>
    $(function () {     
         
        $('#surveyformid').submit(function () {
            $('#buttontype').val("nextbutton");
            var selectedResponse = $('input[name="response"]:checked');      
            if (selectedResponse) {
                var nextQuestionId = selectedResponse.data('next-question');
                $('#currentQuestionId').val(nextQuestionId);
                if (nextQuestionId == 8) {
                $('#nextButton, #backButton').hide(); // Hide both buttons
            }
            }          
        });   
    });
</script> -->
