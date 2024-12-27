<?php
session_start();

// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $reply_to = trim($_POST['reply_to']);
    $message = trim($_POST['message']);

    // Validate inputs
    if (filter_var($reply_to, FILTER_VALIDATE_EMAIL) && !empty($message)) {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'scamil350@gmail.com'; // Replace with your email
            $mail->Password = 'sovi mvcf dvvq dabp'; // Replace with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('scamil350@gmail.com', 'GiraICT'); // Replace with your email and name
            $mail->addAddress($reply_to); // Add recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reply to your message';
            $mail->Body = nl2br(htmlspecialchars($message)); // Convert newlines to <br> for HTML
            $mail->AltBody = strip_tags($message); // Plain text alternative

            // Send email
            $mail->send();
            $_SESSION['reply_sent'] = "You have successfully replied to $reply_to.";
        } catch (Exception $e) {
            $_SESSION['reply_sent'] = "Failed to reply to $reply_to. Error: " . htmlspecialchars($e->getMessage());
        }
    } else {
        $_SESSION['reply_sent'] = "Invalid email or empty message.";
    }

    // Redirect after processing
    header('Location: ../../messages.php');
    exit;
}
?>
