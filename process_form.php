<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $category = $_POST["category"];
    $message = $_POST["message"];
    $messageBody = "Name: $name\nEmail: $email\nMobile: $mobile\nCategory: $category\nMessage: $message";
    echo $messageBody;
    header("Location: getquote.php?submitted=true");
    exit();
} else {
    echo "No form data received.";
}
?>
