<?php
    require '../../config/config.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send_feedback"])) {
        $names = $_POST["names"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $back_url = $_POST["url"];

        // Validate the input
        if(empty($names) || empty($email) || empty($subject) || empty($message)) {
            echo "All fields are required!";
            exit();
        }

        //send feedback
        $send_feedback = mysqli_query(
            $conn,
            "INSERT INTO feedbacks (names, email, subject, message) VALUES ('$names', '$email', '$subject', '$message')"
        );

        if($send_feedback) {
            $_SESSION['feedback_sent'] = "Thank you for your feedback!";
            header("location: ".$back_url);
        } else {
            $_SESSION['feedback_sent'] = "Thank you for your feedback!";
            header("location: ".$back_url); 
        }


    }
?>