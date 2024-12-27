<?php
    session_start();
    require '../../config/config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complete_profile'])) {
        $user_id = $_POST['user_id'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $city = $_POST['city_legion'];
        $address = $_POST['address'];

        //update user profile
        $update_user_profile = mysqli_query(
            $conn,
            "UPDATE users SET phone = '$phone', country = '$country', city_legion = '$city', address = '$address' WHERE user_id = '$user_id'"
        );
        if($update_user_profile) {
            $_SESSION['profile_update_success'] = "Profile updated successfully!";
            header('location:../../profile.php?user_id='.$user_id);
        } else {
            $_SESSION['profile_update_success'] = "Failed to update profile!";
            header('location:../../profile.php?user_id='.$user_id);
        }
    }
?>