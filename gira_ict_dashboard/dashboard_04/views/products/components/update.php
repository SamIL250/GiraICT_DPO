<div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="./services/products/products.php" method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <!-- Product Category -->
                            <div class="mb-1">
                                <label for="productCategory">Product Category</label>
                            </div>
                            <div class="mb-3">
                                <select name="product_category" id="productCategory" class="border rounded py-2 px-3 w-100" required>
                                    <?php
                                    $select_categories = mysqli_query($conn, "SELECT * FROM categories");
                                    if (mysqli_num_rows($select_categories) > 0) {
                                        foreach ($select_categories as $category) {
                                    ?>
                                            <option value="" selected hidden>Select category</option>
                                            <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo '<option value="">No categories found.</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Product Name -->
                            <div class="mb-1">
                                <label for="productName">Product Name</label>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Product Name" name="product_name" id="productName" required>
                            </div>

                            <!-- Product Description -->
                            <div class="mb-1">
                                <label for="productDescription">Product Description</label>
                            </div>
                            <div class="mb-3">
                                <textarea class="border rounded py-2 px-3 w-100" placeholder="Description" name="description" id="productDescription" rows="3" required></textarea>
                            </div>

                            <!-- Product Price -->
                            <div class="mb-1">
                                <label for="productPrice">Product Price</label>
                            </div>
                            <div class="mb-3">
                                <input type="number" min="0" class="border rounded py-2 px-3 w-100" placeholder="Product Price" name="product_price" id="productPrice" required>
                            </div>

                            <!-- Product Stock -->
                            <div class="mb-1">
                                <label for="productStock">Product Stock</label>
                            </div>
                            <div class="mb-3">
                                <select name="product_stock" id="productStock" class="border rounded py-2 px-3 w-100" required>
                                    <?php
                                    $select_categories = mysqli_query($conn, "SELECT * FROM stock");
                                    if (mysqli_num_rows($select_categories) > 0) {
                                        foreach ($select_categories as $category) {
                                    ?>
                                            <option value="" selected hidden>Select stock</option>
                                            <option value="<?= $category['stock_id'] ?>"><?= $category['stock_name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo '<option value="">No stock found.</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- In Stock Status -->
                            <div class="mb-1">
                                <label for="inStock">Stock Status</label>
                            </div>
                            <div class="mb-3">
                                <select name="in_stock" id="inStock" class="border rounded py-2 px-3 w-100" required>
                                    <option value="" selected hidden>In Stock</option>
                                    <option value="true">In Stock</option>
                                    <option value="false">Out of Stock</option>
                                </select>
                            </div>

                            <!-- Product Image -->
                            <div class="mb-1">
                                <label for="file_input">Product Image</label>
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

                        <!-- Right Section -->
                        <div>
                            <!-- Product Quantity -->
                            <div class="mb-1">
                                <label for="productQuantity">Product Quantity</label>
                            </div>
                            <div class="mb-3">
                                <input type="number" min="0" class="border rounded py-2 px-3 w-100" placeholder="Product Quantity" name="product_quantity" id="productQuantity" required>
                            </div>

                            <!-- Product Brand -->
                            <div class="mb-1">
                                <label for="productBrand">Product Brand</label>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Product Brand" name="product_brand" id="productBrand" required>
                            </div>

                            <!-- Product Color -->
                            <div class="mb-3">
                                <label for="productColor">Product Color</label>
                                <input type="color" class="border rounded py-2 px-3 w-100" name="product_color" id="productColor" required>
                            </div>

                            <!-- Product Material -->
                            <div class="mb-1">
                                <label for="productMaterial">Product Skin Material</label>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Product Material" name="product_material" id="productMaterial" required>
                            </div>

                            <!-- Country of Origin -->
                            <div class="mb-1">
                                <label for="countryOfOrigin">Country of Manufacturer</label>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Country of origin" name="country_of_origin" id="countryOfOrigin" required>
                            </div>

                            <!-- Product Condition -->
                            <div class="mb-1">
                                <label for="productCondition">Product Condition</label>
                            </div>
                            <div class="mb-3">
                                <select name="product_condition" id="productCondition" class="border rounded py-2 px-3 w-100" required>
                                    <option value="" selected hidden>Select Condition</option>
                                    <option value="new">New</option>
                                    <option value="used">Used</option>
                                    <option value="opened">Opened</option>
                                    <option value="damaged">Damaged</option>
                                </select>
                            </div>

                            <!-- Product Size -->
                            <div class="mb-1">
                                <label for="productSize">Product Size (optional)</label>
                            </div>
                            <div class="mb-3">
                                <input type="number" min="0" class="border rounded py-2 px-3 w-100" placeholder="Product Size" name="product_size" id="productSize">
                            </div>

                            <!-- Included Materials -->
                            <div class="mb-1">
                                <label for="includedMaterials">Included Materials</label>
                            </div>
                            <div class="mb-3">
                                <textarea class="border rounded py-2 px-3 w-100" placeholder="Included materials" name="included_materials" id="includedMaterials" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button class="w-100 py-2 text-white rounded bg-[--primary] hover:bg-[--light-primary]" type="submit" name="update_product">Update Product</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="rounded py-2 px-6 bg-[--secondary]" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
