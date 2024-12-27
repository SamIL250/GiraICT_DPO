<div class="table-responsive" id="table_view">
    <table class="table table-striped">
        <thead >
            <tr>
                <th></th>
                <th>#</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Description</th> 
                <th>Price</th>
                <th>Stock</th>
                <th>Date created</th> 
            </tr>
        </thead>
        <tbody>
            <?php

                if(isset($_POST['filter_product_by_name'])){

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
                            <tr>
                                <td>
                                    
                                        <a href="" class="mx-1" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                        $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                        $category = mysqli_fetch_assoc($select_category);
                                        echo $category['category_id'];
                                        ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                        $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                        $stock = mysqli_fetch_assoc($select_stock);
                                        echo $stock['stock_id'];
                                        ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td> 
                                    <img src="./data/images/<?=$products['image_url']?>" class="rounded-0 shadow" alt="" srcset=""  onclick="showImage(this)">
                                </td>
                                <td><?=$products['product_name']?></td> 
                                <td><?=$products['product_description']?></td>
                                <td><?=$products['price']?></td> 
                                <td><?=$products['stock_name']?></td> 
                                <td><?=$products['product_created_at']?></td> 
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="8">No products found.</td></tr>';
                    }
                    
                } elseif(isset($_POST['filter_product_by_date'])) {
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
                            <tr>
                                <td>
                                    
                                        <a href="" class="mx-1" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                        $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                        $category = mysqli_fetch_assoc($select_category);
                                        echo $category['category_id'];
                                        ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                        $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                        $stock = mysqli_fetch_assoc($select_stock);
                                        echo $stock['stock_id'];
                                        ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td> 
                                    <img src="./data/images/<?=$products['image_url']?>" class="rounded-0 shadow" alt="" srcset=""  onclick="showImage(this)">
                                </td>
                                <td><?=$products['product_name']?></td> 
                                <td><?=$products['product_description']?></td>
                                <td><?=$products['price']?></td> 
                                <td><?=$products['stock_name']?></td> 
                                <td><?=$products['product_created_at']?></td> 
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="8">No products found.</td></tr>';
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
                            <tr>
                                <td>
                                    
                                        <a href="" class="mx-1" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                        $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                        $category = mysqli_fetch_assoc($select_category);
                                        echo $category['category_id'];
                                        ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                        $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                        $stock = mysqli_fetch_assoc($select_stock);
                                        echo $stock['stock_id'];
                                        ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td> 
                                    <img src="./data/images/<?=$products['image_url']?>" class="rounded-0 shadow" alt="" srcset=""  onclick="showImage(this)">
                                </td>
                                <td><?=$products['product_name']?></td> 
                                <td><?=$products['product_description']?></td>
                                <td><?=$products['price']?></td> 
                                <td><?=$products['stock_name']?></td> 
                                <td><?=$products['product_created_at']?></td> 
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="8">No products found.</td></tr>';
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
                            <tr>
                                <td>
                                    
                                        <a href="" class="mx-1" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                        $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                        $category = mysqli_fetch_assoc($select_category);
                                        echo $category['category_id'];
                                        ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                        $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                        $stock = mysqli_fetch_assoc($select_stock);
                                        echo $stock['stock_id'];
                                        ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td> 
                                    <img src="./data/images/<?=$products['image_url']?>" class="rounded-0 shadow" alt="" srcset=""  onclick="showImage(this)">
                                </td>
                                <td><?=$products['product_name']?></td> 
                                <td><?=$products['product_description']?></td>
                                <td><?=$products['price']?></td> 
                                <td><?=$products['stock_name']?></td> 
                                <td><?=$products['product_created_at']?></td> 
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="8">No search found.</td></tr>';
                    } 
                }  else {
                    $select_products = mysqli_query(
                        $conn, 
                        "SELECT * FROM products 
                            INNER JOIN categories ON products.category_id = categories.category_id
                            INNER JOIN stock ON products.stock_id = stock.stock_id ORDER BY product_created_at DESC
                        "
                    );

                    if(mysqli_num_rows($select_products) > 0) {
                        $_id = 1;
                        foreach($select_products as $products) {
                            ?>
                            <tr>
                                <td>
                                    
                                        <a href="" class="mx-1" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$products['product_id']?>" data-category="<?php
                                        $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = '{$products['category_id']}'"); 
                                        $category = mysqli_fetch_assoc($select_category);
                                        echo $category['category_id'];
                                        ?>" data-name="<?=$products['product_name']?>" data-description="<?=$products['product_description']?>" data-price="<?=$products['price']?>" data-stock="<?php
                                        $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '{$products['stock_id']}'"); 
                                        $stock = mysqli_fetch_assoc($select_stock);
                                        echo $stock['stock_id'];
                                        ?>" data-url = "<?=$products['image_url']?>" data-date="<?=$products['product_created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>  
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td> 
                                    <img src="./data/images/<?=$products['image_url']?>" class="rounded-0 shadow brightness-90 cursor-pointer hover:brightness-75 transition" alt="" srcset="" onclick="showImage(this)">
                                </td>
                                <td><?=$products['product_name']?></td> 
                                <td><?=$products['product_description']?></td>
                                <td><?=$products['price']?></td> 
                                <td><?=$products['stock_name']?></td> 
                                <td><?=$products['product_created_at']?></td> 
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="8">No products found.</td></tr>';
                    }
                }
                
                    
                
            ?> 
            
            

        </tbody>
    </table>
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