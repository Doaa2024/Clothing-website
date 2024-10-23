<!DOCTYPE html>
<html lang="en">
<?php require_once("class/categories.class.php"); ?>
<?php require_once("class/products.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $categories = new Categories();
$allCategories = $categories->getAllCategories(); ?>
<?php $products = new Products();
$allProducts = $products->getAllProducts();
?>




<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- for images enctype -->
                    <form id="addForm" enctype="multipart/form-data" action="actions/add_products.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Products Name</span>
                            </div>
                            <input type="text" placeholder="product_name" aria-label="product" name="productname" aria-describedby="basic-addon1" size="20" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Category Name</span>
                            </div>

                            <select id="categoryid" name="categoryID" class="form-control">
                                <?php
                                foreach ($allCategories as $category) {
                                ?>
                                    <option value="<?php echo $category['categories_id'] ?>"><?php echo $category['categories_name'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Price</span>
                            </div>
                            <input type="number" placeholder="price" aria-label="product" name="price" aria-describedby="basic-addon1" size="20" required class="form-control" step="0.1" min="0">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Quantity</span>
                            </div>
                            <input type="number" placeholder="quantity" aria-label="product" name="discount" aria-describedby="basic-addon1" size="20" required class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">General Description</span>
                            </div>
                            <input type="text" placeholder="general description" aria-label="product" name="general_description" aria-describedby="basic-addon1" size="20" required class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Deep Description</span>
                            </div>
                            <input type="text" placeholder="deep description" aria-label="product" name="deep_description" aria-describedby="basic-addon1" size="20" required class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Images</span>
                            </div>
                            <input type="file" class="form-control input-control" placeholder="Images" aria-label="Images" name="images[]" aria-describedby="basic-addon3" multiple>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" value="upload-image" id="confirmAdd">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" id="closet" class="btn close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteProductButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Category Modal -->
    <div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clos" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="updateForm" method="post" action="actions/update_products.php">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Products Name</span>
                            </div>
                            <input type="text" placeholder="product_name" aria-label="product" name="name" aria-describedby="basic-addon1" size="20" class="form-control" id="name" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Category Name</span>
                            </div>
                            <input id="ID" name="id" hidden>
                            <select id="categoryID" name="categoryID" class="form-control">
                                <?php foreach ($allCategories as $category) { ?>
                                    <?php
                                    // Check if the current category's name matches the predefined value

                                    ?>
                                    <option value="<?php echo $category['categories_id']; ?>">
                                        <?php echo $category['categories_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>


                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Price</span>
                            </div>
                            <input type="number" placeholder="price" aria-label="product" name="price" aria-describedby="basic-addon1" size="20" required class="form-control" min="0" id="price">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Quantity</span>
                            </div>
                            <input type="text" placeholder="quantity" aria-label="product" name="quantity" aria-describedby="basic-addon1" size="20" required class="form-control" id="quantity">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Quantity</span>
                            </div>
                            <input type="text" placeholder="quantity" aria-label="product" name="discount" aria-describedby="basic-addon1" size="20" required class="form-control" id="discount">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Image</span>
                            </div>
                            <input type="file" placeholder="product_image" aria-label="product" name="images[]" aria-describedby="basic-addon1" size="20" class="form-control" id="image" multiple>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="confirmUpdateProductButton">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>






    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Products</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
                <div align="right" class="mb-3">
                    <button type="button" class="btn btn-primary close" data-toggle="modal" data-target="#addModal">Add Product</button>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Products
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Product_id</th>
                                    <th>Product_Name</th>
                                    <th>
                                        Category_ID
                                    </th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>General Description</th>
                                    <th>Deep Description</th>
                                    <th>Product_Image</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allProducts as $product) {
                                ?>
                                    <tr>
                                        <td><?php echo $product['product_id'] ?></td>
                                        <td><?php echo $product['product_name'] ?></td>
                                        <td><?php echo $product['category_id'] ?></td>
                                        <td><?php echo $product['price'] ?></td>
                                        <td><?php echo $product['quantity'] ?></td>
                                        <td><?php echo $product['small_description'] ?></td>
                                        <td><?php echo $product['large_description'] ?></td>
                                        <?php $allimages = $products->getimages($product['product_id']) ?>
                                        <td>
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="1500">
                                                <div class="carousel-inner">
                                                    <?php foreach ($allimages as $k => $row) { ?>
                                                        <div class="carousel-item <?php echo $k == 0 ? 'active' : ''; ?>">
                                                            <img class="d-block w-100" src="assets/img/<?php echo $row['image_name'] ?>" alt="Slide <?php echo $k + 1; ?>" width="150px" height="200px">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </td>







                                        </td>
                                        <td>
                                            <button class="btn btn-danger close" id=<?php echo $product['product_id'] ?> data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fas fa-trash-alt"></i></button>
                                            <a class="btn btn-primary" href="update_form_products.php?id=<?php echo $product['product_id'] ?>"><i class="fas fa-edit"></i></a>
                                        </td>

                                    </tr>

                                <?php } ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once('components/footer.php'); ?>
    </div>
    </div>
    <?php require_once('components/script.php'); ?>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#carouselExampleControls').carousel();
    });
    document.getElementById('closet').addEventListener('mouseover', function() {
        this.style.boxShadow = '0 0 5px blue';

    });

    document.getElementById('closet').addEventListener('mouseout', function() {
        this.style.boxShadow = 'none';
    });
    document.getElementById('close').addEventListener('mouseover', function() {
        this.style.boxShadow = '0 0 5px blue';

    });

    document.getElementById('close').addEventListener('mouseout', function() {
        this.style.boxShadow = 'none';
    });
    $(document).ready(function() {
        $('#addForm').submit(function(e) {
            e.preventDefault();
            var form = new FormData(this);
            var selectedCategoryId = $('#categoryid').val();
            form.append('selectedCategoryId', selectedCategoryId);
            console.log(form);
            console.log(selectedCategoryId);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                data: form,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            timer: 1500,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            window.location.href = 'products.php';
                        });

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        });
                    }
                }
            });
        });
    });
    $('#datatablesSimple').on('click', '.close', function() {
        var id = $(this).attr('id');
        console.log(id);
        $('#confirmDeleteProductButton').on('click', function() {

            $.ajax({
                url: 'actions/delete_products.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            window.location.href = 'products.php';
                        });

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        });
                    }
                }

            });

        });
    });
</script>