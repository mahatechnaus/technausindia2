<?php
require_once('includes/config.php');

if (isset($_POST['surveySubmitted'])) {
    require_once('postToGoogleSheetSurvey.php'); // Include your script for Google Sheets API
    
    $reCaptchaToken = $_POST['g-recaptcha-response'];
    
    // Verify reCAPTCHA
    $postArray = array(
        'secret' => Config::GOOGLE_RECAPTCHA_SECRET_KEY,
        'response' => $reCaptchaToken
    );
    
    $postJSON = http_build_query($postArray);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);
    $response = curl_exec($curl);
    curl_close($curl);
    $curlResponseArray = json_decode($response, true);

    // If reCAPTCHA is verified successfully
    if ($curlResponseArray["success"] == true && !empty($curlResponseArray["action"]) && $curlResponseArray["score"] >= 0.5) {
        // Process and insert survey data into Google Sheets
        $dataArray = array(
            // Define your survey form fields and their corresponding values here
            'question1' => $_POST['question1'],
            'question2' => $_POST['question2'],
            // Add more fields as needed
        );
        insertIntoSheets('Survey_Response', $dataArray); // Insert into Google Sheets

        $arrayResp = array(
            'status' => 'success',
            'message' => '<div class="text-success">Thanks for participating in the survey!</div>',
        );
        header("Content-Type: application/json");
        echo json_encode($arrayResp);
    } else {
        $arrayResp = array(
            'status' => 'error',
            'message' => '<div class="text-danger">reCAPTCHA verification failed.</div>',
        );
        header("Content-Type: application/json");
        echo json_encode($arrayResp);
    }
}
?>
