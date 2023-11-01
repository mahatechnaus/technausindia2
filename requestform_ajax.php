<?php 
include_once('includes/config.php'); 
// print_r("ajaxpage");
if (isset($_POST['quoteSubmited'])) {
    require_once('postToGooggleSheet.php');   
    $reCaptchaToken = $_POST['g-recaptcha-response'];
    $postArray = array(
        'secret' => Config::GOOGLE_RECAPTCHA_SECRET_KEY,
        'response' => $reCaptchaToken
    );
    // print_r($postArray);
 
    $postJSON = http_build_query($postArray);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);
    $response = curl_exec($curl);
    curl_close($curl);
    $curlResponseArray = json_decode($response, true);

if ($curlResponseArray["success"] == true && !empty($curlResponseArray["action"]) && $curlResponseArray["score"] >= 0.5 ) {
  
    $dataArray = array(    
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'mobile' => $_POST['mobile'],
        'category' => $_POST['category'],     
        'message' => (isset($_POST['message'])) ?$_POST['message'] :'-'
    );
    // print_r($dataArray);
    insertIntoSheets('Get_quote', $dataArray);

    $arrayResp = array(
        'status' => 'success',
        'message' => '<div class="text-sucess"> Thanks for your interest, We will reach out you Soon. </div>',
    );
    header("Content-Type: application/json");
    echo json_encode($arrayResp);
      
 }
}