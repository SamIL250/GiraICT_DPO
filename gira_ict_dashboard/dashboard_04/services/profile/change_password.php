<?php
    session_start();
    require '../../config/config.php'; 

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
        $user_id = $_POST['user_id'];
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password']; 
        //select_user
        $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$user_id'");
        //use foreach loop
        foreach($select_user as $user) { 
            if(password_verify($current_password, $user['password'])) {
                if($new_password == $confirm_password) {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $update_password = mysqli_query($conn, "UPDATE `users` SET `password` = '$hashed_password' WHERE `user_id` = '$user_id'");

                    if($update_password) {
                        $_SESSION['change_password_mssg'] = "Password has been updated successfully";
                        echo "Done";
                        header("location: ../../profile.php?profile_id= " . $user_id);
                       
                        exit();
                    } else {
                        $_SESSION['change_password_mssg'] = "Failed to update password";
                        echo "No";
                        header("location: ../../profile.php?profile_id= " . $user_id);
                    }
                } else {
                    $_SESSION['change_password_mssg'] = "New password and confirm password does not match";
                    echo "No";
                    header("location: ../../profile.php?profile_id= " . $user_id);
                }
            } else {
                $_SESSION['change_password_mssg'] = "Current password is incorrect";
                echo "No";
                header("location: ../../profile.php?profile_id= " . $user_id);
            }
        }
    }
?>