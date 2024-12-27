<?php
    $user_id = "";
    $name = "";
    $email = "";
    $phone = "";
    $address = "";
    $country = ""; 
    $city_legion = "";
    if(isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        
        // Get user details from database
        $user_profile = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'"); 
        foreach($user_profile as $profile){
            $name = $profile['name'];
            $email = $profile['email'];
            $phone = $profile['phone'];
            $address = $profile['address'];
            $country = $profile['country']; 
            $city_legion = $profile['city_legion'];
        }
        
    }
?>

<style>

    input:invalid{
        border: 1px solid red;
    }
</style>
<div class="container mt-5">
    <!-- Profile Section --> 
    <div class="row ">
   
        <div class="col-md-6">
            <p style="font-size: 35px; font-weight: 700;"><?=$name?></p> 
        </div>
        <div class="col-md-3 text-center"> 
        </div>
        <div class="col-md-3 text-end">
            <?php 

                if(empty($phone)) {  
                        ?>
                            <button  class="btn text-white" style="background: black;">Complete Profile</button>
                        <?php
                    
                } else {
                    ?>
                    <button  class="btn text-white" style="background: black;" >Edit Profile</button>
                        
                    <?php
                }
            ?>
            <button class="btn text-white" style="background: orange;">Logout</button>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="row mt-4">
        <!-- User Information Form (Left) -->
        <div class="col-md-8">
            <div class="card p-4 mb-4">
                <h5>User Information</h5>
                <form action="./services/profile/complete_profile.php" method="POST">
                    <input type="hidden" name="user_id" value="<?=$user_id?>" id="">
                    <div class="mb-3">
                        <label for="names" class="form-label">Full names</label>
                        <input type="text" class="form-control" id="names" name="names" placeholder="Full names" value="<?=$name?>" required disabled>
                    </div>  
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="<?=$email?>" required disabled>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="unknown" value="<?=$profile['phone']?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="country" class="form-label" name="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="unknown" value="<?=$profile['country']?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label" >Legion</label>
                            <input type="text" class="form-control" id="" name="city_legion" placeholder="unknown" value="<?=$profile['city_legion']?>" required>
                            
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="unknown" value="<?=$profile['address']?>" required>
                    </div>
                    <div class="mb-3">
                        <?php
                            if(empty($phone)) {
                                ?>
                                <button  class="btn text-white w-100" style="background: black;" name="complete_profile">Complete Profile</button>
                                    
                                <?php
                            } else {
                                ?>
                                    <button  class="btn text-white w-100" style="background: black;" name="complete_profile">Edit Profile</button>
                                <?php
                            }
                        ?>
                   
                    </div>
                </form>
            </div>
        </div>

        <!-- Intro Section (Right) -->
        <div class="col-md-4">
            <div class="card p-3 mb-4">
                <h6>Intro</h6>
                <ul class="list-unstyled">
                    <li><strong>CMO</strong> at SingleFire</li>
                    <li><strong>Went to:</strong> Oxford International</li>
                    <li><strong>Lives in:</strong> Virginia, NY</li>
                    <li><strong>Followed by:</strong> 12.5k people</li>
                </ul>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope"></i> <a href="mailto:jhon@contact.com">jhon@contact.com</a></li>
                    <li><i class="bi bi-linkedin"></i> <a href="#">LinkedIn @jhon_S</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>









 <!-- Modal -->
 <div class="modal fade" id="profileUpdateModal" style="z-index: 111111;" tabindex="-1" aria-labelledby="profileUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileUpdateModalLabel">Update Your Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Carousel for slidable stages -->
                    <div id="profileUpdateCarousel" class="carousel slide" data-bs-interval="false">
                        <div class="carousel-inner">
                            <!-- Stage 1: Personal Information -->
                            <div class="carousel-item active">
                                <h5>Personal Information</h5>
                                <form>
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                </form>
                            </div>
                            <!-- Stage 2: Profile Picture -->
                            <div class="carousel-item">
                                <h5>Profile Picture</h5>
                                <form>
                                    <div class="mb-3">
                                        <label for="profilePicture" class="form-label">Upload Profile Picture</label>
                                        <input type="file" class="form-control" id="profilePicture">
                                    </div>
                                </form>
                            </div>
                            <!-- Stage 3: Account Security -->
                            <div class="carousel-item">
                                <h5>Account Security</h5>
                                <form>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Carousel controls for sliding between stages -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#profileUpdateCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#profileUpdateCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    
     