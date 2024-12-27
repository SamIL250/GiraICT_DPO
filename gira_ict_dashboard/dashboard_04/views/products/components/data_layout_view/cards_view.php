<style>
    .rounded{
        border-radius: 0 !important;
    }
</style>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="content_view">
                
    <?php
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
            <div class="card"> 
                <img src="./data/images/<?=$products['image_url']?>" onclick="showImage(this)" class="p-1 card-img-top"  style="width:100%" alt="" srcset="">
                <hr>
                <div class="card-body">
                    <h4 class="card-title"><?=$products['product_name']?></h4>
                    <p class="card-text"><?=$products['description']?></p>
                    <div class="dropdown">
                        <button type="button" class="border rounded bg-light text-dark px-4 py-2 dropdown-toggle" data-bs-toggle="dropdown">
                            Action
                        </button>
                        <ul class="dropdown-menu">
                        <li>
                            <a href="" class="dropdown-item" 
                                data-bs-toggle="modal" 
                                data-bs-target="#updateModal" 
                                data-id="<?=$products['product_id']?>" 
                                data-category="<?php
                                    $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                    $category = mysqli_fetch_assoc($select_category);
                                    echo $category['category_id'];?>" 
                                data-name="<?=$products['product_name']?>" 
                                data-description="<?=$products['product_description']?>" 
                                data-price="<?=$products['price']?>" 
                                data-stock="<?php
                                    $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                    $stock = mysqli_fetch_assoc($select_stock);
                                    echo $stock['stock_id'];?>" 
                                data-url = "<?=$products['image_url']?>" 
                                data-date="<?=$products['product_created_at']?>"
                                data-inStock="<?=$products['in_stock']?>"
                                data-quantity="<?=$products['product_quantity']?>"
                                data-brand="<?=$products['product_brand']?>"
                                data-color="<?=$products['color']?>"
                                data-material="<?=$products['product_material']?>"
                                data-country="<?=$products['country_of_origin']?>"
                                data-condition="<?=$products['condition']?>"
                                data-size="<?=$products['size']?>"
                                data-includedMaterials="<?=$products['included_materials']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <?php
        }
    } else {
        echo 'No products found.';
    }

    ?>
</div>

<script>
      function showImage(imageElement) {
    // Set the clicked image source in the modal
    document.getElementById('modalImage').src = imageElement.src;
    // Show the modal
    $('#imageModal').modal('show');
  }
</script>