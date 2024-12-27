<?php
    session_start();

    require '../../config/config.php';
    require '../../vendor/autoload.php';
    
    use Firebase\JWT\JWT;

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $_SESSION['login_error'] = "";

        //validate input values
        if(empty($email) || empty($password)) {
            $_SESSION['login_error'] = "All fields are required!";
            header('location:../login.php');
            exit;
        }

        //validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['login_error'] = "Invalid email format!";
            header('location:../login.php');
            exit;
        }

        //check user email
        $check_user= mysqli_query(
            $conn, 
            "SELECT * FROM users WHERE email = '$email'"
        );

        if(mysqli_num_rows($check_user) <= 0) {
            $_SESSION['login_error'] = "User email not found!";
            header('location:../login.php');
            exit;
        } else {
            //get user data
            $user = mysqli_fetch_assoc($check_user);

            //validate password with hashed password
            if(!password_verify($password, $user['password'])) {
                $_SESSION['login_error'] = "Incorrect password!";
                header('location:../login.php');
                exit;
            }else {
                //generate JWT token
                $key = "gfrewbfiugrwekjfiueg_fewfmy_secrete_key_34rgfrewbfiugrwekjfiueg";
                $token = JWT::encode(
                    array(
                        'iat' => time(),
                        'nbf' => time(),
                        'exp' => time() + 86400, // 1 hr
                        'data' => array(
                            'id' => $user['user_id'],
                            'email' => $user['email'],
                            'role' => $user['role']
                        )
                    ), 
                    $key, 'HS256'
                );

                //store jwt oin cookies
                setcookie("token", $token, time() + 86400, "/", "", false, true);

                //redirect to index.php
                header('location:login_timeout.php');
            }



        }

       


    } 
?>