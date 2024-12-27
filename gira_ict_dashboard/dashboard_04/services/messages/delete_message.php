<?php
    session_start();
    require '../../config/config.php';

    if(isset($_GET['message'])) {
        $message = $_GET['message'];

        $delete_message = mysqli_query(
            $conn,
            "DELETE FROM feedbacks WHERE feed_id = '$message'"
        );

        if($delete_message) {
            $_SESSION['delete_message'] = "Message deleted successfully!";
            header('location:../../messages.php');
        } else {
            $_SESSION['delete_message'] = "Failed to delete message, try again!";
            header('location:../../messages.php');
        }
    }
?>