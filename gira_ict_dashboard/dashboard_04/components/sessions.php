<?php
    if (isset($_SESSION['change_password_mssg'])) {
        if($_SESSION['change_password_mssg'] == "Password has been updated successfully") {
            ?>
                <div class="alert alert-success alert-dismissible fade show rounded-0" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                    <?= $_SESSION['change_password_mssg']; ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        } else {
            ?>
            <div class="alert alert-warning alert-dismissible fade show rounded-0" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                <?= $_SESSION['change_password_mssg']; ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }

        unset($_SESSION['change_password_mssg']);
    }

    if (isset($_SESSION['payment_message'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show rounded-0" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                    <?= $_SESSION['payment_message']; ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
        unset($_SESSION['payment_message']);
    }

    if(isset($_SESSION['remove_order_item'])) {
        if($_SESSION['remove_order_item'] == 'Product removed successfully!') {
            ?>
                <div class="alert alert-success  alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;">
                    <?=$_SESSION['remove_order_item']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
             
        } else {
            ?>
            <div class="alert alert-warning  alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;">
                <?=$_SESSION['remove_order_item']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
           
        }
        unset($_SESSION['remove_order_item']);
    }

    if(isset($_SESSION['delete_message'])) {
        if($_SESSION['delete_message'] == "Message deleted successfully!") {
            ?>
                 <div class="alert alert-success  alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;">
                    <?=$_SESSION['delete_message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        } else {
            ?>
                 <div class="alert alert-warning  alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;">
                    <?=$_SESSION['delete_message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }

        unset($_SESSION['delete_message']);
    }

    if(isset($_SESSION['reply_sent'])) {
        if($_SESSION['reply_sent'] != "Failed to reply the message") {
            ?>
                 <div class="alert alert-success  alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;">
                    <?=$_SESSION['reply_sent']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        } else {
            ?>
                 <div class="alert alert-warning  alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;">
                    <?=$_SESSION['reply_sent']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }

        unset($_SESSION['reply_sent']);
    }
 
    

    // payment_message
 ?>