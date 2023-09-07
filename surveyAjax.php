<?php

$buttontype = "";
$currentQuestionId = 1;
$previousQuestionId = 1;
if (isset($_POST['surveyformid'])) {

    $buttontype = $_POST['buttontype'];

    if ($buttontype == 'nextButton') {
        $currentQuestionId = $_POST['currentQuestionId'];
        $previousQuestionId = $_POST['previousQuestionId'];
        echo "Next";
    }
    if ($buttontype == 'backButton') {
        echo "Back";
        $currentQuestionId = $_POST['currentQuestionId'];
        $previousQuestionId = $_POST['previousQuestionId'];
    }
    $currentQuestion = $survey[$currentQuestionId];
} else {
    $currentQuestion = $survey[1];
}