<!-- Carousel Start -->
 <style>


 </style>
<!-- Carousel Start -->
<!-- Carousel Start -->
<div class="container-fluid page-header mb-5 py-5">
        <div class="container grid grid-cols-2" style="display: flex !important; justify-content: space-between; align-items: center;">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Shop with Us</h1> 
            <div class="display-3 text-white mb-3 animated slideInDown random-products"> 
                <div class="w-100">
                    <div class="grid grid-cols-3 p-3" style="max-width: 500px; display: flex !important; gap: 10px;">
                        <?php
                            $select_product = mysqli_query($conn, "SELECT * FROM products ORDER BY RAND() DESC LIMIT 3");
                            foreach ($select_product as $product ) {
                                ?>
                                    <div class="card p-3" style="background: black;">
                                        <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" style="width: 140px; height: 145px;  object-fit: cover; max-height: 200px; margin-top: 10px; padding: 10px; border: 1px solid FF4917;" alt="" srcset="">
                                    </div>
                                <?php
                            }

                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- Carousel End -->


<!-- Carousel End -->

<style> 
    @media(width <= 768px) {
        .random-products{
            display: none;
        }
    }
</style>