<div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <div id="responseMessage"></div> -->
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Update product</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="./actions/updates/product.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="product_id" id="updateProductId">
                <div class="mb-3">
                    <select name="product_category" id="productCategory"  class="border rounded py-2 px-3 w-100">
                        <?php
                            $select_categories = mysqli_query(
                                $conn, 
                                "SELECT * FROM categories"
                            );
                            if(mysqli_num_rows($select_categories) > 0) {
                                
                                foreach($select_categories as $category) {
                                    ?>
                                        <option value="" selected hidden>Select category</option>
                                        <option value="<?=$category['category_id']?>"><?=$category['name']?></option>
                                    <?php
                                }
                            } else {
                                    echo '<option value="">No categories found.</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Product Name" name="product_name" id="productName" required>
                </div>
                <div class="mb-3">
                    <textarea class="border rounded py-2 px-3 w-100" placeholder="Description" name="description" rows="3" required id="productDescription"></textarea>
                </div>
                <div class="mb-3">
                    <input type="number" min="0" class="border rounded py-2 px-3 w-100" placeholder="Product price" name="product_price" id="productPrice" required>
                </div>
                <div class="mb-3">
                    <select name="product_stock" id="productStock"  class="border rounded py-2 px-3 w-100">
                        <?php
                            $select_categories = mysqli_query(
                                $conn, 
                                "SELECT * FROM stock"
                            );
                            if(mysqli_num_rows($select_categories) > 0) {
                                
                                foreach($select_categories as $category) {
                                    ?>
                                        <option value="" selected hidden>Select stock</option>
                                        <option value="<?=$category['stock_id']?>"><?=$category['stock_name']?></option>
                                    <?php
                                }
                            } else {
                                    echo '<option value="">No categories found.</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="px-3 w-100 h-[100px] rounded border  grid grid-cols-1 items-center relative flex justify-center"> 
                            
                        <input type="file" class="bg-transparent w-100 h-5 absolute " style="width: 100%; height: 100px; opacity: 0;" name="product_image" onchange="previewImage(event)" required id="file_input">
                        <!-- Image Preview --> 
                        <div class="w-100 flex items-center justify-center" style="display: block;" id="img_container">
                            <img id="productImage" alt="Image Preview" style="min-width: 50px; max-width: 60px;">
                            <p id="imageName" class="text-sm"></p>
                        </div>
                        
                    </div>
                </div>
                <!-- <img id="productImage" src="" alt="Image Preview" style="min-width: 50px; max-width: 60px;"> -->
                <div class="mb-3">
                    <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Date added" name="product_date" id="productDate" required>
                </div>

                <div class="mb-3">
                    <button class="w-100 py-2 text-white rounded bg-[--primary] hover:bg-[--light-primary]" type="submit" name="update_product">Update product</button>
                </div>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="rounded py-2 px-6 bg-[--secondary]" data-bs-dismiss="modal" name="new_category">Cancer</button>
        </div>

        </div>
    </div>
</div>