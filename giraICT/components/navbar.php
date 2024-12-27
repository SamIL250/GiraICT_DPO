<?php
    // session_start();
    require './vendor/autoload.php';
    require './config/config.php';

    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    use Firebase\JWT\ExpiredException;

    $key = "gfrewbfiugrwekjfiueg_fewfmy_secrete_key_34rgfrewbfiugrwekjfiueg";

    //check if the user is logged in
    if(isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        try {
            //decode the token to show user data
            $decode = JWT::decode($token, new Key($key, 'HS256'));
        } catch (ExpiredException $e) {
            $_SESSION['token_expired'] = "Your token has expired!, please login again.";
            header('location: ./index.php');
        } catch (Exception $e) {
            $_SESSION['token_expired'] = "Your token has expired!, please login again.";
            header('location:./index.php');
        }
    } else {
        $_SESSION['token_expired'] = "Your token has expired!, please login again.";
        header('location:./index.php');
    }

?>

<div class="eshuriHeaderAd" style="padding: 20px 80px;">
    <div style="display: flex; align-items: center;" class="border">
        <img src="./img/eshuri.png" style="width: 20%;" alt="">
        <div style="padding: 0 20px;">
            <p>Get powered with a Learning Management Engine that can create a strong Digital libraries aligned with national curriculum.</p>
            <button onclick="window.location.replace('https://eshuri.org/')" class="btn border" style="background: #3170f6; color: white;">Apply now </button>
        </div>
    </div>
</div>

<style>
    @media(width <= 980px) {
        .eshuriHeaderAd{
            padding: 5px 5px !important;
        }

        .eshuriHeaderAd p{
            font-size: 14px;
        }
    }
</style>

<div id="lg" style="background-color: #f5ed4d;" class="container-fluid  d-none d-lg-block">
    <div class="row align-items-center top-bar">
        <div class="col-lg-3 col-md-12 text-center text-lg-start">
            <a href="home.php" class="navbar-brand m-0 p-0">
                <img src="img/logo.jpg" style="width:150px;">
            </a>
        </div>
        <div class="col-lg-9 col-md-12 text-end">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                <p class="m-0" style="color: black;">Makuza Peace Plaza F5 Tower C</p>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <i class="bi bi-envelope-fill text-danger me-2"></i>
                <p class="m-0" style="color: black;">info@giraict.rw</p>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <a style="background-color: red;" class="btn btn-sm-square text-white me-1" href="https://www.facebook.com/GiraICTDataSystemsLtd/"><i class="bi bi-facebook"></i></a>
                <a style="background-color: red;" class="btn btn-sm-square text-white me-1" href="https://x.com/Giraict"><i class="bi bi-twitter"></i></a>
                <a style="background-color: red;" class="btn btn-sm-square text-white me-1" href="https://www.linkedin.com/company/giraict/?originalSubdomain=rw"><i class="bi bi-linkedin"></i></a>
                <a style="background-color: red;" class="btn btn-sm-square text-white me-0" href="https://www.instagram.com/giraict.rw/"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-black">
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
        <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
            <img src="img/logo.jpg" width="100px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="bi bi-list"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto">
                <a href="home.php" class="nav-item nav-link ">Home</a>
                <a href="Shop.php" class="nav-item nav-link">Shop</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                    
                    <!-- Dropdown with grid system for two columns -->
                    <div class="dropdown-menu fade-up m-0 shadow p-3" style="width: 400px;">
                        <div class="row">
                            <?php
                                $select_category_links = mysqli_query(
                                    $conn,
                                    "SELECT * FROM categories"
                                );

                                foreach($select_category_links as $category) {
                                    ?>
                                        <div class="col-6">
                                            <a href="category_products.php?category_id= <?=$category['category_id']?>" class="dropdown-item"><?=$category['name']?></a> 
                                        </div>
                                    <?php
                                }
                            ?>
 
                        </div>
                    </div>
                </div>
                <a href="about.php" class="nav-item nav-link">About Us</a>
                <a href="service.php" class="nav-item nav-link">Services</a>
                
                <a href="contact.php" class="nav-item nav-link">Contact us</a>
            </div>
            <!-- Search form -->
            <form class="d-flex me-4" action="search_result.php" method="GET">
                <input type="text" name="query" class="form-control" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary ms-2" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <div style="background-color: whitesmoke;" class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 d-flex align-items-center">

                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                        <?php
                            $user_id = $decode -> data -> id;
                            $_SESSION['user_id'] = $user_id;
                            $select_profile = mysqli_query(
                                $conn, 
                                "SELECT * FROM users WHERE user_id = '$user_id'"
                            );

                            if($select_profile) {
                                foreach($select_profile as $profile) {
                                    ?>
                                        <?=$profile['name']?>
                                    <?php
                                }
                            }
                        ?>
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="profile.php?user_id= <?=$user_id = $decode -> data -> id?>">Your Account</a></li>
                    
                    <li><a class="dropdown-item" href="cart.php?user_id= <?php  $user_id = $decode -> data -> id; echo $user_id; ?>">Cart</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li style="background: var(--primary); color: white;"><a class="dropdown-item text-white" href="./auth/logout.php">Logout</a></li>
                    </ul>
                </div>
                <a href="cart.php?user_id= <?php  $user_id = $decode -> data -> id; echo $user_id; ?>" class="d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px; background: black; position: relative;">
                    <i class="bi bi-cart3 text-white"></i>
                    <span style="position: absolute; top: -15px; right: -5px; background: orange; padding: 0 5px; border-radius: 30px; color: white;">
                        <?php   
                            $count_cart_items = mysqli_query(
                                $conn, 
                                "SELECT * FROM cart_items INNER JOIN cart ON cart_items.cart_id = cart.cart_id
                                WHERE user_id = '$user_id'"
                            );
                            echo mysqli_num_rows($count_cart_items);
                            
                        ?>
                    </span>
                </a> 
            </div>
        </div>
    </nav>
</div>