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
        .body {
            background: white;
            display: flex;
            align-items: center;
            height: 100vh;
        }

        input:invalid {
            border: 1px solid #D22127;
        }

        input:valid {
            border: 1px solid green;
        }

        .button:hover {
            background: #D22127;
        }

        .small-screen-auth {
            display: none;
        }


        @media(width <=1024px) {
            .body {
                display: none;
            }

            .small-screen-auth {
                display: flex !important;
                align-items: center;
                justify-content: center;
                padding: 30px 30px;
            }
        }

        @media(max-width: 768px) {
            .grid {
                display: block !important;
            }

            .carouser-section {
                display: none !important;
            }

            .col-span-6 {
                flex: 0 0 100% !important;
                /* Equivalent to col-span-12 */
                max-width: 100% !important;
                width: 100% !important;
                /* background: red; */
            }

            .back-button {
                display: none;
            }
        }


        @media(width <=570px) {

            .form-padding,
            .small-screen-auth {
                padding: 5px !important;
            }
        }

        @media(width <=769px) {
            hr {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="absolute top-5 left-3 back-button">
            <?php
            require '../components/back_btn.php';
            ?>
        </div>
        <div>
            <div class="container py-3 auth-main-container">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-6 relative border p-3 rounded grid grid-cols-1 items-center">
                        <div class="min-h-10 bg-[#F5ED4D] sticky top-0 mt-3 border rounded shadow-sm flex items-center p-2 justify-between">
                            <img src="../img/logo.jpg" width="20%" alt="" srcset="">
                            <a href="login.php">
                                <button class="button btn border rounded  bg-black text-white hover:text-white transition px-4">Login</button>
                            </a>

                        </div>
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">

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
                                        <h3 class="text-white text-2xl font-bold">Trusted eCommerce Shopping Mall</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="../img/Keyboard.jpg" alt="Chicago" class="d-block brightness-50" style="width:100%">
                                    <div class="carousel-caption">
                                        <h3 class="text-white text-2xl font-bold">Trusted eCommerce Shopping Mall</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="../img/deli_guy.jpg" alt="New York" class="d-block brightness-50" style="width:100%">
                                    <div class="carousel-caption">
                                        <h3 class="text-white text-2xl font-bold">Trusted eCommerce Shopping Mall</h3>
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
                            if (isset($_SESSION['register_error'])) {
                                echo '<div class="alert alert-warning">' . $_SESSION['register_error'] . '</div>';
                                // unset($_SESSION['register_error']);
                            }
                            ?>
                            <div class="mb-3">
                                <p class="text-3xl">Create an account</p>
                            </div>
                            <div class="mb-1">
                                <p>Already have ab account? <a href="login.php">Login</a></p>
                            </div>
                            <div>
                                <form action="./services/register.php" method="post">
                                    <div class="grid grid-cols-2 gap-4 py-3">
                                        <div class="">
                                            <input type="text" class="w-100 bg-light border rounded py-2 px-2" placeholder="First name" name="fname" id="" required>
                                        </div>
                                        <div>
                                            <input type="text" class="w-100 bg-light border rounded py-2 px-2" placeholder="First name" name="lname" id="" required>
                                        </div>
                                    </div>

                                    <div class="pb-3">
                                        <input type="email" class="w-100 bg-light border rounded py-2 px-2" name="email" placeholder="Email" id="" required>
                                    </div>
                                    <div class="pb-3">
                                        <input type="password" class="w-100 bg-light border rounded py-2 px-2" placeholder="Password" name="password" id="" required>
                                    </div>
                                    <div class="pb-3">
                                        <input type="password" class="w-100 bg-light border rounded py-2 px-2" placeholder="Confirm Password" name="confirm_password" id="" required>
                                    </div>
                                    <div class="grid grid-cols-12 pb-3">
                                        <div class="col-span-1">
                                            <input type="checkbox" name="" id="">
                                        </div>
                                        <div class="col-span-11">
                                            <p>I agree to the terms <a href="">Terms & conditions</a></p>
                                        </div>
                                    </div>
                                    <div class="pb-3">
                                        <button class="w-100 border rounded py-2 bg-[#D22127] text-white" name="register">Create account</button>
                                    </div>
                                    <div class="grid grid-cols-12 flex items-center gap-3 pb-3">
                                        <div class="col-span-4">
                                            <hr>
                                        </div>
                                        <div class="col-span-4 text-center">
                                            <p class="text-sm">Or register</p>
                                        </div>
                                        <div class="col-span-4">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-5">
                                        <div class="border text-center rounded py-2">
                                            <button>Google</button>
                                        </div>
                                        <div class="border text-center rounded py-2">
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
    </div>

    <!-- //small device login -->
    <div class="small-screen-auth">
        <div>
            <div class="absolute top-5 left-3 back-button">

                <?php
                require '../components/back_btn.php';
                ?>
            </div>
            <div class="min-h-10 bg-[#F5ED4D] sticky top-0 border rounded shadow-sm flex items-center p-2 justify-between">
                <img src="../img/logo.jpg" width="20%" alt="" srcset="">
                <a href="login.php">
                    <button class="button btn border rounded  bg-black text-white hover:text-white transition px-4">Login</button>
                </a>

            </div>
            <div>
                <div class="container py-3 auth-main-container">
                    <div class="gap-3">

                        <div class="">
                            <div class="form-padding py-16 px-20">
                                <?php
                                if (isset($_SESSION['login_error'])) {

                                    if ($_SESSION['login_error'] === "") {
                                        unset($_SESSION['login_error']);
                                    } else {
                                        echo '<div class="alert alert-warning">' . $_SESSION['login_error'] . '</div>';
                                        unset($_SESSION['login_error']);
                                    }
                                }
                                ?>
                                <div class="mb-3">
                                    <p class="text-3xl">Create an account</p>
                                </div>
                                <div class="mb-1">
                                    <p>Already have an account? <a href="login.php">Login</a></p>
                                </div>
                                <div>
                                    <form action="./services/register.php" method="post">
                                        <div class="grid grid-cols-2 gap-4 py-3">
                                            <div class="">
                                                <input type="text" class="w-100 bg-light border rounded py-2 px-2" placeholder="First name" name="fname" id="" required>
                                            </div>
                                            <div>
                                                <input type="text" class="w-100 bg-light border rounded py-2 px-2" placeholder="First name" name="lname" id="" required>
                                            </div>
                                        </div>

                                        <div class="pb-3">
                                            <input type="email" class="w-100 bg-light border rounded py-2 px-2" name="email" placeholder="Email" id="" required>
                                        </div>
                                        <div class="pb-3">
                                            <input type="password" class="w-100 bg-light border rounded py-2 px-2" placeholder="Password" name="password" id="" required>
                                        </div>
                                        <div class="pb-3">
                                            <input type="password" class="w-100 bg-light border rounded py-2 px-2" placeholder="Confirm Password" name="confirm_password" id="" required>
                                        </div>
                                        <div class="grid grid-cols-12 pb-3">
                                            <div class="col-span-1">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                            <div class="col-span-11">
                                                <p>I agree to the terms <a href="">Terms & conditions</a></p>
                                            </div>
                                        </div>
                                        <div class="pb-3">
                                            <button class="w-100 border rounded py-2 bg-[#D22127] text-white" name="register">Create account</button>
                                        </div>
                                        <div class="pb-3">
                                            <a href="../index.php" class="w-100 border btn rounded py-2 " name="login">Continue without Login</a>
                                        </div>
                                        <div class="grid grid-cols-12 flex items-center gap-3 pb-3">
                                            <div class="col-span-4">
                                                <hr>
                                            </div>
                                            <div class="col-span-4 text-center">
                                                <p class="text-sm">Or register</p>
                                            </div>
                                            <div class="col-span-4">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-5">
                                            <div class="border text-center rounded py-2">
                                                <button class=""><span class="d-flex items-center gap-2">
                                                        <svg style="color: 	#4285F4;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                                            <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                                                        </svg> Google
                                                    </span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>