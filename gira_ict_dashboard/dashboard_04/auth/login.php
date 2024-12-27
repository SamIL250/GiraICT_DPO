<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GiraIct | Auth</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{
            background: white;
            display: flex;
            align-items: center;
            height: 100vh;
        }
        input:invalid{
            border: 1px solid #D22127;
        }
        input:valid {
            border: 1px solid green;
        }
        .button:hover{
            background: #D22127;
        }
    </style>
</head>
<body>
    <div>
        <div class="container py-3">
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-6 relative border p-3  grid grid-cols-1 items-center">
                    <div class="min-h-10 bg-[#F5ED4D] sticky top-0 border  shadow-sm flex items-center p-2 justify-between">
                        <img src="../img/logo.jpg" width="20%" alt="" srcset="">
                        <a href="register.php">
                            <button class="button  bg-black text-white transition px-4 py-1 hover:bg-red">Create Account</button>
                        </a>
                        
                    </div>
                    <div id="demo" class="carousel slide mt-4" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../img/bghh.jpg" alt="Los Angeles" class="d-block brightness-50" style="width:100%">
                            <div class="carousel-caption">
                            <h3  class="text-white text-2xl font-bold">Trusted eCommerce Shopping Mall</h3>
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="../img/Keyboard.jpg" alt="Chicago" class="d-block brightness-50" style="width:100%">
                            <div class="carousel-caption">
                            <h3  class="text-white text-2xl font-bold">Trusted eCommerce Shopping Mall</h3>
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                            </div> 
                        </div>
                        <div class="carousel-item">
                            <img src="../img/deli_guy.jpg" alt="New York" class="d-block brightness-50" style="width:100%">
                            <div class="carousel-caption">
                            <h3  class="text-white text-2xl font-bold">Trusted eCommerce Shopping Mall</h3>
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                            </div>  
                        </div>
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        </button>
                    </div> 
                </div>
                <div class="col-span-6">
                    <div class="py-16 px-20">
                        <?php
                            if(isset($_SESSION['login_error'])) {
                                
                                if($_SESSION['login_error'] === ""){
                                    unset($_SESSION['login_error']);
                                } else {
                                    echo '<div class="alert alert-warning rounded-0">'.$_SESSION['login_error'].'</div>';
                                    unset($_SESSION['login_error']);
                                }
                            } 
                        ?>
                        <div class="mb-3">
                            <p class="text-3xl">Login to your account</p>
                        </div>
                        <div class="mb-1">
                            <p>Don't have ab account? <a href="register.php">Login</a></p>
                        </div>
                        <div>
                            <form action="./services/login.php" method="post"> 
                                <div class="pb-3">
                                    <input type="email" class="w-100 bg-light border  py-2 px-2" name="email" placeholder="Email" id="" required>
                                </div>
                                <div class="pb-3">
                                    <input type="password" class="w-100 bg-light border  py-2 px-2" placeholder="Password" name="password" id="" required>
                                </div> 
                                <div class="pb-3">
                                    <button class="w-100 border  py-2 bg-[#D22127] text-white" name="login">Login</button>
                                </div>
                                <div class="grid grid-cols-12 flex items-center gap-3 pb-3">
                                    <div class="col-span-4">
                                        <hr>
                                    </div>
                                    <div class="col-span-4 text-center">
                                        <p class="text-sm">Or Login with</p>
                                    </div>
                                    <div class="col-span-4">
                                        <hr>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-5">
                                    <div class="border text-center  py-2">
                                        <button>Google</button>
                                    </div>
                                    <div class="border text-center  py-2">
                                        <button>Apple</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>