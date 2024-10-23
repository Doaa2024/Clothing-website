<?php require("class/products.class.php");
require("class/categories.class.php");
$products = new Products();
$categories = new Categories();
$id = $_GET['id'];
$allcategories = $categories->getAllCategories();
$allproducts = $products->getProductByID($id);
$allimages = $products->getimages($id);
// var_dump($allimages);exit;

?>
<?php require('components/header.php') ?>

<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>


    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Update Products</li></a>
                    <li class="breadcrumb-item"><a href="products.php">Product</li></a>
                    <li class="breadcrumb-item active">Update_Products</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="modal-body">
                            <form action="actions/update_products.php" id="updateForm" method="POST" enctype="multipart/form-data">
                                <div class="input-group mb-3" hidden>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">ID</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="id" aria-label="ID" name="id" aria-describedby="basic-addon1" value="<?php echo $allproducts[0]['product_id'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="Name" aria-label="Username" name="product_name" aria-describedby="basic-addon1" value="<?php echo $allproducts[0]['product_name'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Category_name</label>
                                    </div>
                                    <select name="cat_id" id="inputGroupSelect02" class="form-control input-control">
                                        <?php foreach ($allcategories as $category) { ?>
                                            <option value="<?php echo $category["categories_id"] ?>" <?php echo ($category["categories_id"] == $allproducts[0]["category_id"]) ? "selected" : ""; ?>>
                                                <?php echo $category["categories_name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Price</span>
                                    </div>
                                    <input type="number" class="form-control input-control" placeholder="price" aria-label="price" name="price" aria-describedby="basic-addon2" value="<?php echo $allproducts[0]['price'] ?>" step="0.1" min="0">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Quantity</span>
                                    </div>
                                    <input type="number" class="form-control input-control" placeholder="price" aria-label="price" name="discount" aria-describedby="basic-addon2" value="<?php echo $allproducts[0]['quantity'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="width: 150px;">General Description</span>
                                    </div>
                                    <input type="text" placeholder="general description" aria-label="product" name="general_description" aria-describedby="basic-addon1" size="20" required class="form-control" value="<?php echo $allproducts[0]['small_description'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="width: 150px;">Deep Description</span>
                                    </div>
                                    <input type="text" placeholder="deep description" aria-label="product" name="deep_description" aria-describedby="basic-addon1" size="20" required class="form-control" value="<?php echo $allproducts[0]['large_description'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Images</span>
                                    </div>
                                    <input type="file" class="form-control input-control" placeholder="Images" aria-label="Images" name="images[]" aria-describedby="basic-addon3" multiple>
                                </div>
                                <div class="row">
                                    <?php foreach ($allimages as $k => $row) { ?>
                                        <div class="col-sm-4 text-center my-3" style="display:flex;">

                                            <img src="assets/img/<?php echo $row['image_name'] ?>" class="rounded" height="200px" width="200px" style="position:relative;">

                                            <a class="text-white delete_img d-flex align-items-center justify-content-center rounded-circle bg-danger delete_img" data-id="<?php echo $row['image_id'] ?>" style="position:absolute; margin-left:185px; width: 18px; height: 20px; text-decoration: none;">
                                                <i class="fa-solid fa-xmark" style="font-size: 10px;"></i>
                                            </a>


                                        </div>
                                    <?php
                                    } ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" value="submit"> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </div>

    </main>


</body>

</html>


<?php require('components/script.php') ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script>
    $(document).ready(function() {
        $('.delete_img').on('click', function() {
            var image_id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        cache: false,
                        type: 'POST',
                        data: {
                            image_id: image_id
                        },
                        url: 'actions/image_delete.php',
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then((result) => {
                                    window.location.href = "update_form_products.php?id=<?php echo $id ?>";
                                })

                            } else {
                                Swal.fire('You can not deleted this category')
                            }


                        }

                    });

                }
            })
        })
    })

    // This code uses the FormData object directly to send the form data via AJAX. Also, note that I've set contentType: false and processData: false to ensure that jQuery doesn't process the data or set the content type, as it would with a standard form submission.

    // Make sure your server-side script ("actions/add_products.php") handles the FormData correctly, using $_POST for form fields and $_FILES for file uploads.

    $('#updateForm').submit(function(e) {
        e.preventDefault();

        // Create FormData object
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "actions/update_products.php",
            type: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false, // Set content type to false
            processData: false, // Prevent jQuery from processing the data
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
                        window.location.href = 'update_form_products.php?id=<?php echo $id ?>';
                    });
                } else if (response.status === 'error') {
                    Swal.fire({
                        icon: 'warning',
                        title: response.message,
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'button btn btn-primary app_style'
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            }
        });
    });
</script>