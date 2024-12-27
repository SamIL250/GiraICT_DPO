<script> 
        var tableViewBtn = document.getElementById('table'); 
 
        var listView = document.getElementById('list_view');
        var contentView = document.getElementById('content_view');
        
        tableView.style.display = 'none';
        contentView.style.display = 'none';
        
 
        listViewBtn.addEventListener('click', function() { 
            listView.style.display = 'block';
            contentView.style.display = 'none';
        });

        contentViewBtn.addEventListener('click', function() { 
            listView.style.display = 'none';
            contentView.style.display = 'grid';
        });
 
        document.addEventListener('DOMContentLoaded', function() {
            var updateModal = document.getElementById('updateModal');
            
            updateModal.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = event.relatedTarget;
                // Extract info from data-* attributes
                var productId = button.getAttribute('data-id');
                // console.log(categoryId);
                
                var productCategory = button.getAttribute('data-category');
                var productName = button.getAttribute('data-name');
                var productDescription = button.getAttribute('data-description');
                var productPrice = button.getAttribute('data-price');
                var productStock = button.getAttribute('data-stock');
                var imageUrl = button.getAttribute('data-url');
                var inStock = button.getAttribute('data-inStock');
                var quantity = button.getAttribute('data-quantity');
                var brand = button.getAttribute('data-brand');
                var color = button.getAttribute('data-color');
                var material = button.getAttribute('data-material');
                var country = button.getAttribute('data-country');
                var condition = button.getAttribute('data-condition');
                var size = button.getAttribute('data-size');
                var includedMaterials = button.getAttribute('data-includedMaterials');
                // console.log(imageUrl);
                
                var dateAdded = button.getAttribute('data-date');

                // Update the modal's content
                document.getElementById('updateProductId').value = productId;
                document.getElementById('productCategory').value = productCategory;
                document.getElementById('productName').value = productName;
                console.log(productName);
                

                document.getElementById('productDescription').value = productDescription;
                document.getElementById('productPrice').value = productPrice;
                document.getElementById('productStock').value = productStock;
                document.getElementById('imageName').innerHTML = imageUrl;
                document.getElementById('inStock').value = inStock;
                document.getElementById('quantity').value = quantity;
                document.getElementById('brand').value = brand;
                document.getElementById('color').value = color;
                document.getElementById('material').value = material;
                document.getElementById('country').value = country;
                document.getElementById('condition').value = condition;
                document.getElementById('size').value = size;
                document.getElementById('includedMaterials').value = includedMaterials;


                //imagePath 
                var imagePath = './data/images/' + imageUrl;
                console.log(imagePath); 
                document.getElementById('productImage').setAttribute('src', imagePath)
                document.getElementById('productDate').value = dateAdded;
               
            });
        });  
        
         


</script>