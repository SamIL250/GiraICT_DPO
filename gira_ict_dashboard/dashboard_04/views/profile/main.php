<style>
    input, .btn{
        border-radius: 0 !important;
    }

    .form-control:focus {
        border-color: #FF5733; /* Replace with your desired color */
        box-shadow: 0 0 0 0.25rem rgba(255, 87, 51, 0.25); /* Adjust shadow and color */
        outline: none; /* Remove default outline (optional) */
    }
</style>

<?php
    //user info
    $profile_id = "";
    $names = "";
    $email = "";
    $password = "";


    if(isset($_GET['profile_id'])){
        $profile_id = $_GET['profile_id'];

        //get user profile
        $select_profile = mysqli_query(
            $conn, 
            "SELECT * FROM users WHERE user_id = '$profile_id'"
        );

        //use foreach loop
        foreach($select_profile as $profile) {
            $names = $profile['name'];
            $email = $profile['email'];
            $password = $profile['password'];  
            
        }
    }
?>

<div class="container-fluid pt-4 px-4 relative">
    <div class="">
        <div class="grid grid-cols-12 items-center ">
            <div class="col-span-6">
                <p class="text-3xl">Profile</p>
            </div> 
        </div>
    </div> 

    <div class="">
        <!-- Profile Section --> 
        <div class="row ">
    
            <div class="col-md-6">
                <p style="font-size: 35px; font-weight: 700;">Username</p> 
            </div>
            <div class="col-md-3 text-center"> 
            </div>
            <div class="col-md-3 text-end"> 
                <button class="btn text-white rounded-0" style="background: orange;">Logout</button>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="row mt-4">
            <!-- User Information Form (Left) -->
            <div class="col-md-8">
                <div class="card rounded-0 p-4 mb-4">
                    <p class="font-bold text-lg">User Information</p>
                    <form class="mt-3" action="./services/profile/complete_profile.php" method="POST">
                        <input type="hidden" name="user_id" value="" id="">
                        <div class="mb-3">
                            <label for="names" class="form-label">Full names</label>
                            <input type="text" class="form-control" id="names" name="names" placeholder="Full names" value="<?=$names?>" required disabled>
                        </div>  
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="<?=$email?>" required disabled>
                        </div>   
 
                        <div class="mb-3">   
                            <span  class="btn text-white w-100" style="background: black;" name="complete_profile">Edit Profile</span> 
                        </div>
                    </form>
                </div>
                
                <!-- ///change password -->
                 <?php
                    require 'components/change_password.php'
                 ?>

            </div>

            <!-- Intro Section (Right) -->
            <?php
                require 'components/more.php';
            ?>
        </div>
    </div>

</div>

  <!-- Bootstrap 5 JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

