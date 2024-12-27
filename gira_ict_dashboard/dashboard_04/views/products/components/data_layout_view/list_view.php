<style>
    .rounded{
        border-radius: 0 !important;
    }

    .card{
        border-radius: 0 !important;
    }
</style>

<div class="" id="list_view">
    <div class="grid grid-cols-12 card shadow-sm p-3 list-title">
        <div class="col-span-4">
            <p>Product</p>
        </div> 
        <div class="col-span-6">
            <p>Description</p>
        </div>
        <div class="col-span-2">
            <p>Action</p>
        </div>
    </div>
    <?php
    if(isset($_POST['filter_product_by_name'])) {
        $select_products_by_name = mysqli_query(
            $conn, 
            "SELECT * FROM products 
                INNER JOIN categories ON products.category_id = categories.category_id
                INNER JOIN stock ON products.stock_id = stock.stock_id ORDER BY product_name ASC
            "
        );
        if(mysqli_num_rows($select_products_by_name) > 0) {
            $_id = 1;
            foreach($select_products_by_name as $products) {
                ?>
                    <div class="card my-3">
                        <div class="grid grid-cols-12 w-100 p-2 items-center">
                            <div class="col-span-4">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-3">
                                        <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                    </div>
                                    <div class="col-span-9">
                                        <div class="grid grid-cols-1 items-center">
                                        <a class="font-bold" href="product_details.php?product_detail_id=<?=$products['product_id']?>"><?=$products['product_name']?></a>
                                            <div class="grid grid-cols-3 items-center gap-1">
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['name']?></p>
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['stock_name']?></p>
                                                <p><?=$products['price']?>$</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="col-span-5 items-center">
                                <p><?=$products['description']?></p>
                            </div>
                            <div class="col-span-3 items-center">
                                <a href="" class="mx-2 rounded-0 px-3 py-1 bg-light " data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                $category = mysqli_fetch_assoc($select_category);
                                echo $category['category_id'];
                                ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                $stock = mysqli_fetch_assoc($select_stock);
                                echo $stock['stock_id'];
                                ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                            </div>
                        </div> 
                    </div>
                <?php
            }
        }   
    }  elseif (isset($_POST['filter_product_by_date'])) {
        $select_products_by_date = mysqli_query(
            $conn, 
            "SELECT * FROM products 
                INNER JOIN categories ON products.category_id = categories.category_id
                INNER JOIN stock ON products.stock_id = stock.stock_id ORDER BY product_created_at ASC
            "
        );

        if(mysqli_num_rows($select_products_by_date) > 0) {
            $_id = 1;
            foreach($select_products_by_date as $products) {
                ?>
                <div class="card my-3">
                        <div class="grid grid-cols-12 w-100 p-2 items-center">
                            <div class="col-span-4">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-3">
                                        <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                    </div>
                                    <div class="col-span-9">
                                        <div class="grid grid-cols-1 items-center">
                                        <a class="font-bold" href="product_details.php?product_detail_id=<?=$products['product_id']?>"><?=$products['product_name']?></a>
                                            <div class="grid grid-cols-3 items-center gap-1">
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['name']?></p>
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['stock_name']?></p>
                                                <p><?=$products['price']?>$</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="col-span-5 items-center">
                                <p><?=$products['description']?></p>
                            </div>
                            <div class="col-span-3 items-center">
                                <a href="" class="mx-2 rounded-0 px-3 py-1 bg-light " data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                $category = mysqli_fetch_assoc($select_category);
                                echo $category['category_id'];
                                ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                $stock = mysqli_fetch_assoc($select_stock);
                                echo $stock['stock_id'];
                                ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                            </div>
                        </div> 
                    </div>
            <?php
            }
        } else {
            echo 'No products found.';
        } 
    } elseif(isset($_POST['filter_product_by_price'])) {
        $select_products_by_price = mysqli_query(
            $conn, 
            "SELECT * FROM products 
                INNER JOIN categories ON products.category_id = categories.category_id
                INNER JOIN stock ON products.stock_id = stock.stock_id ORDER BY price DESC
            "
        );

        if(mysqli_num_rows($select_products_by_price) > 0) {
            $_id = 1;
            foreach($select_products_by_price as $products) {
                ?>
                <div class="card my-3">
                        <div class="grid grid-cols-12 w-100 p-2 items-center">
                            <div class="col-span-4">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-3">
                                        <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                    </div>
                                    <div class="col-span-9">
                                        <div class="grid grid-cols-1 items-center">
                                        <a class="font-bold" href="product_details.php?product_detail_id=<?=$products['product_id']?>"><?=$products['product_name']?></a>
                                            <div class="grid grid-cols-3 items-center gap-1">
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['name']?></p>
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['stock_name']?></p>
                                                <p><?=$products['price']?>$</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="col-span-5 items-center">
                                <p><?=$products['description']?></p>
                            </div>
                            <div class="col-span-3 items-center">
                                <a href="" class="mx-2 rounded-0 px-3 py-1 bg-light " data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                $category = mysqli_fetch_assoc($select_category);
                                echo $category['category_id'];
                                ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                $stock = mysqli_fetch_assoc($select_stock);
                                echo $stock['stock_id'];
                                ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                            </div>
                        </div> 
                    </div>
            <?php
            }
        } else {
            echo 'No products found.';
        } 
    } elseif(isset($_POST['search_product'])) {
        $product_name = $_POST['product_search_name'];
        $select_products_by_search = mysqli_query(
            $conn, 
            "SELECT * FROM products 
                INNER JOIN categories ON products.category_id = categories.category_id
                INNER JOIN stock ON products.stock_id = stock.stock_id WHERE product_name LIKE '%$product_name%'
            "
        );

        if(mysqli_num_rows($select_products_by_search) > 0) {
            $_id = 1;
            foreach($select_products_by_search as $products) {
                ?>
                    <div class="card my-3">
                        <div class="grid grid-cols-12 w-100 p-2 items-center">
                            <div class="col-span-4">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-3">
                                        <img  onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                    </div>
                                    <div class="col-span-9">
                                        <div class="grid grid-cols-1 items-center">
                                        <a class="font-bold" href="product_details.php?product_detail_id=<?=$products['product_id']?>"><?=$products['product_name']?></a>
                                            <div class="grid grid-cols-3 items-center gap-1">
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['name']?></p>
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['stock_name']?></p>
                                                <p><?=$products['price']?>$</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="col-span-5 items-center">
                                <p><?=$products['description']?></p>
                            </div>
                            <div class="col-span-3 items-center">
                                <a href="" class="mx-2 rounded-0 px-3 py-1 bg-light " data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                $category = mysqli_fetch_assoc($select_category);
                                echo $category['category_id'];
                                ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                $stock = mysqli_fetch_assoc($select_stock);
                                echo $stock['stock_id'];
                                ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                            </div>
                        </div> 
                    </div>
                <?php
            }
        } else {
            echo '<div class="alert alert-warning rounded-0">No search found.</div>';
        }
    } else {
        $select_products = mysqli_query(
            $conn, 
            "SELECT * FROM products 
                INNER JOIN categories ON products.category_id = categories.category_id
                INNER JOIN stock ON products.stock_id = stock.stock_id
            "
        );
    
        if(mysqli_num_rows($select_products) > 0) {
            $_id = 1;
            foreach($select_products as $products) {
                ?>
                    <div class="card my-3">
                        <div class="grid grid-cols-12 w-100 p-2 items-center">
                            <div class="col-span-4">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-3">
                                        <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                    </div>
                                    <div class="col-span-9">
                                        <div class="grid grid-cols-1 items-center">
                                            <a class="font-bold" href="product_details.php?product_detail_id=<?=$products['product_id']?>"><?=$products['product_name']?></a>
                                            <div class="grid grid-cols-3 items-center gap-1">
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['name']?></p>
                                                <p class="border rounded-2xl text-center p-1" style="font-size: 0.8rem;"><?=$products['stock_name']?></p>
                                                <p><?=$products['price']?>$</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="col-span-5 items-center">
                                <p><?=$products['description']?></p>
                            </div>
                            <div class="col-span-3 items-center">
                                <a href="" class="mx-2 rounded-0 px-3 py-1 bg-light " data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                $category = mysqli_fetch_assoc($select_category);
                                echo $category['category_id'];
                                ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                $stock = mysqli_fetch_assoc($select_stock);
                                echo $stock['stock_id'];
                                ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"
                                data-inStock="<?=$products['in_stock']?>"
                                data-quantity="<?=$products['product_quantity']?>"
                                data-brand="<?=$products['product_brand']?>"
                                data-color="<?=$products['color']?>"
                                data-material="<?=$products['product_material']?>"
                                data-country="<?=$products['country_of_origin']?>"
                                data-condition="<?=$products['condition']?>"
                                data-size="<?=$products['size']?>"
                                data-includedMaterials="<?=$products['included_materials']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                            </div>
                        </div> 
                    </div>
                <?php
            }
        } else {
            echo '<tr><td colspan="8">No products found.</td></tr>';
        }
    }

    

    ?>
    </div>

    <!-- //////enlarged image view//// -->
<div class="modal fade rounded-0" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded-0">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Product Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="modalImage" src="" class="img-fluid" alt="Enlarged Image">
      </div>
    </div>
  </div>
</div>


<script>
      function showImage(imageElement) {
    // Set the clicked image source in the modal
    document.getElementById('modalImage').src = imageElement.src;
    // Show the modal
    $('#imageModal').modal('show');
  }
</script>