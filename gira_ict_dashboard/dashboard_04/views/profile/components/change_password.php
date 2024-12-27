<div class="card rounded-0 p-4 mb-4">
    <p class="font-bold text-lg">Change Password</p>
    <form class="mt-3" action="./services/profile/change_password.php" method="POST">
        <input type="hidden" name="user_id" value="<?=$profile_id?>" id="">
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" required>
        </div>
        <div class="mb-3">
            <label for="current_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="current_password" name="new_password" placeholder="Current Password" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="new_password" name="confirm_password" placeholder="New Password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">
            </label>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn rounded-0 w-100 bg-black text-white" name="change_password">Change Password</button>
        </div>
    </form>
    
</div>