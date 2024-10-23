<!DOCTYPE html>
<html lang="en">
<?php require_once("class/order.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $order = new Order();
$allOrders = $order->getAllOrders(); ?>

<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Orders</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>

                <!-- Update Category Modal -->
                <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close" style="border: none; background-color: #e9ecef; border-radius: 40px; box-shadow: none; transition: box-shadow 0.3s, background-color 0.3s; padding:3px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="statusForm">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Status</span>
                                        </div>
                                        <input value="" name="OrderID" id="ids" hidden>
                                        <select id="status" name="status" class="form-control">
                                            <option value="Pending">
                                                Pending
                                            </option>
                                            <option value="Delivered">
                                                Deliverd
                                            </option>
                                            <option value="Shipped">
                                                Shipped
                                            </option>
                                        </select>


                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="confirmUpdateStatusButton">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Order
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>OrderID</th>
                                    <th>CustomerID</th>
                                    <th>OrderDate</th>
                                    <th>
                                        TotalAmount
                                    </th>

                                    <th>PhoneNumber</th>
                                    <th>Address</th>
                                    <th>
                                        ZipCode
                                    </th>

                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Order Details</th>
                                    <th>Set Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allOrders as $orders) {
                                ?>
                                    <tr>
                                        <td><?php echo $orders['OrderID'] ?></td>
                                        <td><?php echo $orders['CustomerID'] ?></td>
                                        <td><?php echo $orders['OrderDate'] ?></td>
                                        <td><?php echo $orders['TotalAmount'] ?></td>
                                        <td><?php echo $orders['PhoneNumber'] ?></td>
                                        <td><?php echo $orders['Address'] ?></td>
                                        <td><?php echo $orders['ZipCode'] ?></td>
                                        <td><?php echo $orders['City'] ?></td>
                                        <td><?php echo $orders['Status'] ?></td>

                                        <td>
                                            <a href="orderitems.php?id=<?php echo $orders['OrderID'] ?>" style="font-size:1.35rem; color:red; margin-left:22px"><i class="fas fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary edit" data-id="<?php echo $orders['OrderID'] ?>" data-status="<?php echo $orders['Status'] ?>" data-toggle="modal" data-target="#updateStatusModal"><i class="fas fa-edit"></i></a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('close').addEventListener('mouseover', function() {
            this.style.boxShadow = '0 0 5px blue';

        });

        document.getElementById('close').addEventListener('mouseout', function() {
            this.style.boxShadow = 'none';
        });



        $(document).ready(function() {
            var status;
            var id;

            // Open the modal and set the category name
            $('.edit').on('click', function() {
                status = $(this).attr('data-status');
                id = $(this).attr('data-id');
                console.log(status);
                // Set the status in the modal
                $('#status').val(status);
                $('#ids').val(id);
            });

            $('#confirmUpdateStatusButton').on('click', function(e) {
                e.preventDefault();
                // Create FormData object from the form element
                var formData = new FormData(document.querySelector("#statusForm"));
                $.ajax({
                    url: "actions/update_status.php",
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
                                })
                                .then(function() {
                                    window.location.href = 'orders.php';
                                })
                        } else if (response.status === 'error') {
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
</body>