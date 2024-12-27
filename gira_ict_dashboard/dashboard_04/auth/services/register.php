<?php
    require'../../config/config.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $full_name = $fname ." ". $lname;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];


        //validation
        $_SESSION['register_error'] = "";
        if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($confirm_password)) {
            $_SESSION['register_error'] = "All fields are required!";
            header('location:../register.php');
        }

        //email validation
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['register_error'] = "Invalid email format!";
            header('location:../register.php');
        }

        //password validation
        if($password!= $confirm_password) {
            $_SESSION['register_error'] = "Passwords do not match!";
            header('location:../register.php');
        }

        //check user
        $check_user = mysqli_query(
            $conn, 
            "SELECT * FROM users WHERE name = '$full_name' AND email = '$email'"
        );

        if(mysqli_num_rows($check_user) > 0) {
            $_SESSION['register_error'] = "User already exists!";
            header('location:../register.php');
        }

        //hashed password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //create user
        if(empty($_SESSION['register_error'])) { 
            $register_user = mysqli_query(
                $conn, 
                "INSERT INTO `users`(`name`, `email`, `password`, `address`, `phone`, `role`) 
                VALUES ('$full_name','$email','$hashed_password',NULL,NULL,'admin')"
            );
            if($register_user) {
                header("Location: register_timeout.php");
            } else {
                $_SESSION['register_error'] = "Error creating user!";
                header('location:../register.php');
            }
        }
    }

?>