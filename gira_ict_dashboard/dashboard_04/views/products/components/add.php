<style>
    /* input:invalid{
        border: 1px solid red;
    } */
</style>
<div class="modal fade" id="formModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <!-- <div id="responseMessage"></div> -->
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add new product</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="./services/products/products.php" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <div class="mb-1">
                            <label for="">Product category</label>
                        </div>
                        <div class="mb-3">
                            <select name="product_category" id=""  class="border rounded py-2 px-3 w-100" required>
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
                        <div class="mb-1">
                            <label for="">Product name</label>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Product Name" name="product_name" required>
                        </div>
                        <div class="mb-1">
                            <label for="">Product description</label>
                        </div>
                        <div class="mb-3">
                            <textarea class="border rounded py-2 px-3 w-100" placeholder="Description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-1">
                            <label for="">Product price</label>
                        </div>
                        <div class="mb-3">
                            <input type="number" min="0" class="border rounded py-2 px-3 w-100" placeholder="Product price" name="product_price" required>
                        </div>
                        <div class="mb-1">
                            <label for="">Product stock</label>
                        </div>
                        <div class="mb-3">
                            <select name="product_stock" id=""  class="border rounded py-2 px-3 w-100" required>
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
                        <div class="mb-1">
                            <label for="">Stock status</label>
                        </div>
                        <div class="mb-3">
                            <select name="in_stock" id=""  class="border rounded py-2 px-3 w-100" required> 
                                <option value="" selected hidden>In Stock</option>
                                <option value="true">In Stock</option>
                                <option value="false">Out of Stock</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="">Product image</label>
                        </div>
                        <div class="mb-3">
                            <div class="my-2">
                                <label for="file_input" class="btn btn-sm btn-outline-dark w-100 rounded-0">Please choose Image file that is a PNG, JPEG or Gif</label>
                            </div>
                            <div class="px-3 w-100 min-h-[100px] rounded border  grid grid-cols-1 items-center relative flex justify-center"> 
                                <div class="w-100 text-center" id="icon_wrapper">
                                    <i class="bi bi-card-image text-dark text-3xl" style="width: 30px;"></i>
                                </div>
                                <input type="file" class="bg-transparent w-100 h-5 absolute " style="width: 100%; height: 100px; opacity: 0;" name="product_image" onchange="previewImage(event)" required id="file_input">
                                <!-- Image Preview --> 
                                <div class="w-100 flex items-center justify-center" style="display: none;" id="img_container">
                                    <img id="image_preview" src="" alt="Image Preview" style="display: none; min-width: 50px; max-width: 60px;">
                                    <p id="img_name" class="text-sm"></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- ///right aside -->

                    <div>
                        <div class="mb-1">
                            <label for="">Product quantity</label>
                        </div>
                        <div class="mb-3">
                            <input type="number" min="0" class="border rounded py-2 px-3 w-100" placeholder="Product Quantity in numbers" name="product_quantity" required>
                        </div>
                        <div class="mb-1">
                            <label for="">Product brand</label>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Product Brand" name="product_brand" required>
                        </div> 
                        <div class="mb-3">
                            <label for="">Product color</label>
                            <input type="color" class="border rounded py-2 px-3 w-100" placeholder="Product Color" name="product_color" required>
                        </div>
                        <div class="mb-1">
                            <label for="">Product skin material</label>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Product Material eg: metal, plastic, " name="product_material" required>
                        </div>
                        <div class="mb-1">
                            <label for="">Product country of manufacturer</label>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Country of origin" name="country_of_origin" required>
                        </div>
                        <div class="mb-1">
                            <label for="">Product condition</label>
                        </div>
                        <div class="mb-3">
                            <select name="product_condition" id=""  class="border rounded py-2 px-3 w-100" required>
                                 
                                <option value="" selected hidden>Select Product condition</option>
                                <option value="new">New</option>
                                <option value="used">Used</option>
                                <option value="opened">Opened</option>
                                <option value="damaged">Damaged</option>
                                           
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="">Product size (optional)</label>
                        </div>
                        <div class="mb-3">
                            <input type="number" min="0" class="border rounded py-2 px-3 w-100" placeholder="Product size (optional)" name="product_size">
                        </div>
                        <div class="mb-1">
                            <label for="">Product aside components</label>
                        </div>
                        <div class="mb-3">
                            <textarea class="border rounded py-2 px-3 w-100" placeholder="Included materials" name="included_materials" rows="3" required></textarea>
                        </div> 
                    </div>
                </div>

                <div class="mb-3">
                    <button class="w-100 py-2 text-white rounded bg-[--primary] hover:bg-[--light-primary]" type="submit" name="new_product">Add product</button>
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