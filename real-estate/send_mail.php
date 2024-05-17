<?php
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path as needed

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'appiaishu123@gmail.com'; // SMTP username
        $mail->Password = 'vjxl osgg vzat oyqi';   // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('defencehabitat24@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "Name: $name<br>Email: $email<br>Subject: $subject<br>Message: $message";

        // Send email
        $mail->send();
        
        // Return success response
        echo 'OK';
    } catch (Exception $e) {
        // Return error response
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
