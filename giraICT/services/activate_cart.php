<?php
    require '../config/config.php';

    session_start();
  
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['activateCart']) && isset($_POST['page_url'])) {
        $user_id = $_POST['user_id'];
        $page_url = urldecode($_POST['page_url']);

        $activate_cart = mysqli_query(
            $conn,
            "INSERT INTO `cart`(`user_id`) 
            VALUES ('$user_id')"
        );
        if($page_url == 'giraIct/cart.php') {
            if($activate_cart) {
                $_SESSION['cart_activated'] = "Your cart has been activated";
                header('location: ../cart.php?user_id='.$user_id);
            }
        } else {
            $_SESSION['cart_activated'] = "Your cart has been activated, now you can add to the cart";
            header('location: '.$page_url);
        }

    }

?>