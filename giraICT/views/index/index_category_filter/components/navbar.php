

<div id="lg" style="background-color: #f5ed4d;" class="container-fluid  d-none d-lg-block">
    <div class="row align-items-center top-bar">
        <div class="col-lg-3 col-md-12 text-center text-lg-start">
            <a href="" class="navbar-brand m-0 p-0">
                <img src="img/logo.jpg" style="width:150px;">
            </a>
        </div>
        <div class="col-lg-9 col-md-12 text-end">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <i class="fa fa-map-marker-alt text-danger me-2"></i>
                <p class="m-0" style="color: black;">Makuza Peace Plaza F5 Tower C</p>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <i class="far fa-envelope-open text-danger me-2"></i>
                <p class="m-0" style="color: black;">giraict@gmail.com</p>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <a style="background-color: red;" class="btn btn-sm-square text-white me-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a style="background-color: red;" class="btn btn-sm-square text-white me-1" href=""><i class="fab fa-twitter"></i></a>
                <a style="background-color: red;" class="btn btn-sm-square text-white me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                <a style="background-color: red;" class="btn btn-sm-square text-white me-0" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-black">
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
        <a href="home.php" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
            <img src="img/logo.jpg" width="100px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto">
                <a href="index.php#service" class="nav-item nav-link">About Us</a> 
                <a href="index.php#products" class="nav-item nav-link">Shop</a>
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
                <a href="index.php#service" class="nav-item nav-link">Services</a> 
                <a href="index.php#contact" class="nav-item nav-link">Contact us</a>
            </div>
            <div style="background-color: whitesmoke;" class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 d-flex align-items-center">

                <div class="">
                    <button type="button" class="btn">
                        <a href="./auth/login.php" class="btn" style="background: black; color: white;">Login</a>
                    </button>
                    
                </div>
                <a href="session_cart.php" class="d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 35px; background: black; position: relative;">
                    <i class="bi bi-cart3 text-white"></i>
                    <span style="position: absolute; top: -15px; right: -5px; background: orange; padding: 0 5px; border-radius: 30px; color: white;">
                        <?php  
                            if(isset($_SESSION['cart'])) { 
                                $count_products = count($_SESSION['cart']);
                                echo $count_products;
                            }
                        ?>
                    </span>
                </a> 
            </div>
        </div>
    </nav>
</div>