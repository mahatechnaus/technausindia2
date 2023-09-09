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
    $userResponses[$currentQuestionId - 1] = $response;
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

<?php
// Display user responses
if (!empty($userResponses) && $currentQuestionId == 10) {
    echo '<div class="container">';
   
    echo '<ul class="list-group user-responses-list text-left">';
    echo '<h2 class="technaus-second-text-color user-responses-heading">User Responses:</h2>';
    foreach ($userResponses as $questionId => $response) {
        echo '<li class="list-group-item user-response-item">';
        // Get the corresponding question from the JSON data
        $questionText = $survey[$questionId]['question'];
        echo "<strong>Question:</strong> $questionText<br>";
        echo "<strong>Response:</strong> $response";
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
}
?>

<?php
// send to email user response
if (!empty($userResponses) && $currentQuestionId == 10) {
    // Build the email content
    $emailSubject = 'Survey Responses';
    $emailMessage = 'User Responses:' . PHP_EOL;
    foreach ($userResponses as $questionId => $response) {
        // Get the corresponding question from the JSON data
        $questionText = $survey[$questionId]['question'];
        $emailMessage .= "Question: $questionText" . PHP_EOL;
        $emailMessage .= "Response: $response" . PHP_EOL . PHP_EOL;
    }

    // Recipient's email address
    $recipientEmail = 'magadev110@gmail.com'; // Change to the recipient's email address

    // Sender's email address
    $senderEmail = 'magadev110@gmail.com'; // Change to the sender's email address

    // Send the email
    if (mail($recipientEmail, $emailSubject, $emailMessage, "From: $senderEmail")) {
        echo '<div class="alert alert-success" role="alert">Email sent successfully.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error sending email.</div>';
    }
}
?>

<!-- 
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload.php
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output (set to SMTP::DEBUG_SERVER for detailed debug)
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify SMTP server
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'magha.d@technaus.co.in'; // SMTP username
    $mail->Password = 'Maga@0110'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also accepted
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('magha.d@technaus.co.in', 'Technaus Solar Renewable'); // Sender's email address and name
    $mail->addAddress('magadev110@gmail.com', 'Tech'); // Recipient's email address and name

    // Content
    $mail->isHTML(false); // Set email format to plain text (change to true for HTML emails)
    $mail->Subject = 'Survey Response Mail';
    $mail->Body = 'This is the email body content.';

    // Send email
    $mail->send();
    echo 'Email sent successfully.';
} catch (Exception $e) {
    echo 'Error sending email: ', $mail->ErrorInfo;
}
?> -->




<form action="#" method="post" id="surveyformid" name="surveyformid" class="technaus-contact-form">

    <div id="question<?php echo $currentQuestionId; ?>" class="card-3d">
        <div class="card-body">
            <?php
            // Display user responses
            if (!empty($userResponses) && $currentQuestionId == 10) {
                // Display the thank you image
                echo '<img src="assets/custom/images/site/thanks.png" alt="Thank You" style="height:200px">';
            }
            ?>

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