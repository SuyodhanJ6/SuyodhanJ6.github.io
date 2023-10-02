<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Gmail SMTP Configuration
    $smtpUsername = 'your@gmail.com'; // Your Gmail address
    $smtpPassword = 'your_password'; // Your Gmail password
    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;
    
    // Create a PHPMailer instance
    require 'PHPMailer/PHPMailerAutoload.php'; // Download PHPMailer library
    
    $mail = new PHPMailer;
    
    // Enable SMTP
    $mail->isSMTP();
    
    // SMTP configuration
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = $smtpPort;
    
    // Sender and recipient
    $mail->setFrom($email, $name);
    $mail->addAddress('prashantmalge181@gmail.com'); // Your Gmail address
    
    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission from ' . $name;
    $mail->Body = 'Name: ' . $name . '<br>Email: ' . $email . '<br>Message:<br>' . $message;
    
    // Send the email
    if ($mail->send()) {
        echo 'success'; // You can redirect or display a success message here
    } else {
        echo 'error'; // You can handle errors here
    }
}
?>
