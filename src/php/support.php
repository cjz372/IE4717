<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $to = $_POST['email'];
    $phone = $_POST['phone'];
    $problem = $_POST['problem'];

    $subject = 'Support Request from ' . $name;
    $message = "Name: " . $name . "\n" .
               "Email: " . $to . "\n" .
               "Phone: " . $phone . "\n" .
               "Problem: " . $problem;
    $headers = 'From: sender@example.com' . "\r\n" .
        'Reply-To: sender@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
?>
