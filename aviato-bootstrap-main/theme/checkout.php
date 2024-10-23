<?php
session_start();
require_once("../class/moreinfo.class.php");
$info = new Info();
$allInfo = $info->getAllInfo();

$total_price = 0;
if (isset($_SESSION['total_price'])) {
   $total_price = $_SESSION['total_price'];
}
// Example total price and shipping cost
// Replace with your actual total price calculation
$shipping = $allInfo[0]['shipping'];

// Initialize discount and discounted price
$discount = 0;
$discounted_price = $total_price;

if (isset($_SESSION['coupon_discount'])) {
   $discount = $_SESSION['coupon_discount'];
   unset($_SESSION['coupon_discount']);
   $discounted_price = $total_price - ($total_price * $discount / 100);
}
?>
<style>
   .form {
      display: flex;

      flex-direction: column;
      gap: 20px;
      background: transparent;
      padding: 30px;
      width: 100%;
      padding-top: 0px;
      margin-top: -3%;
      transition: transform 1s;
   }

   form:hover {
      transform: scale(1.02);
      /* Slightly enlarge image on hover */
   }

   .payment--options {
      width: 100%;
      padding: 0px;
      align-items: center;
      display: flex;
      justify-content: center;

   }

   .payment--options svg {

      border-radius: 11px;
      border: 0;
      outline: none;
   }





   .separator {
      width: calc(100% - 20px);
      display: grid;
      grid-template-columns: 1fr 2fr 1fr;
      gap: 10px;
      color: #8B8E98;
      margin: 0 10px;
   }

   .separator>p {
      word-break: keep-all;
      display: block;
      text-align: center;
      font-weight: 600;
      font-size: 16px;
      margin: auto;
   }

   .separator .line {
      display: inline-block;
      width: 100%;
      height: 2px;
      border: 0;
      background-color: #e8e8e8;
      margin: auto;
   }

   .credit-card-info--form {
      display: flex;
      flex-direction: column;
      gap: 15px;
   }

   .input_container {
      width: 100%;
      height: fit-content;
      display: flex;
      flex-direction: column;
      gap: 5px;
   }

   .split {
      display: grid;
      grid-template-columns: 4fr 2fr;
      gap: 15px;
   }

   .split input {
      width: 100%;
   }

   .input_label {
      font-size: 15px;
      color: #8B8E98;
      font-weight: 400;
   }

   .input_field {
      width: auto;
      height: 40px;
      padding: 0 0 0 16px;
      border-radius: 9px;
      outline: none;
      background-color: #F2F2F2;
      border: 1px solid #e5e5e500;
      transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
   }

   .apply {
      width: auto;
      height: 40px;
      padding: 0 0 0 16px;
      border-radius: 9px;
      outline: none;
      background-color: #F2F2F2;
      border: 1px solid #e5e5e500;
      transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
   }


   .input_field:focus {
      border: 1px solid transparent;
      box-shadow: 0px 0px 0px 2px #242424;
      background-color: transparent;
   }

   .purchase--btn {
      height: 55px;
      background: #F2F2F2;
      border-radius: 11px;
      border: 0;
      outline: none;
      color: #ffffff;
      font-size: 13px;
      font-weight: 700;
      background: linear-gradient(180deg, #363636 0%, #1B1B1B 50%, #000000 100%);
      box-shadow: 0px 0px 0px 0px #FFFFFF, 0px 0px 0px 0px #000000;
      transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
   }

   .purchase--btn:hover {
      box-shadow: 0px 0px 0px 2px #FFFFFF, 0px 0px 0px 4px #0000003a;
   }

   /* Reset input number styles */
   .input_field::-webkit-outer-spin-button,
   .input_field::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
   }

   .input_field[type=number] {
      -moz-appearance: textfield;
   }

   .back {

      background-image: url('page.jpg');
      /* Path to your image */
      background-size: cover;
      /* Ensures the image covers the entire element */
      background-position: center;
      /* Centers the image */
      background-repeat: no-repeat;
      /* Prevents the image from repeating */
      background-attachment: fixed;
      /* Keeps the image fixed in place */

   }
</style>

<!DOCTYPE html>
<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<html lang="en">
<?php require_once('common/header.php'); ?>

<body>
   <!-- Start Top Header Bar -->
   <?php require_once('common/navbar.php'); ?>
   <div class="back">
      <div class="page-wrapper">
         <div class="checkout shopping">
            <div class="container">
               <div class="checkout-container">
                  <div class="form-container">
                     <form class="form" id="checkout-form">
                        <div class="payment--options">
                           <svg xmlns="http://www.w3.org/2000/svg" width="5em" height="5em" viewBox="0 0 24 24">
                              <path fill="#46af46" d="M18.5 16.8c-.7 0-1.2-.6-1.2-1.2c0-.7.6-1.2 1.2-1.2s1.2.6 1.2 1.2c.1.6-.5 1.2-1.2 1.2m0-4.8c-1.9 0-3.5 1.6-3.5 3.5c0 2.6 3.5 6.5 3.5 6.5s3.5-3.9 3.5-6.5c0-1.9-1.6-3.5-3.5-3.5m-3.6-.7C14.6 10 13.4 9 12 9c-1.7 0-3 1.3-3 3s1.3 3 3 3c.4 0 .7-.1 1-.2c.2-1.4.9-2.6 1.9-3.5M13 16H7a2 2 0 0 0-2-2v-4a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2s1 0 2 .6V6H3v12h10.5c-.2-.7-.4-1.3-.5-2" />
                           </svg>
                        </div>
                        <div class="separator">
                           <hr class="line">
                           <p>Cash on Delivery Only</p>
                           <hr class="line">
                        </div>
                        <div class="credit-card-info--form">
                           <div class="input_container">
                              <?php if (isset($_SESSION['username']) && $_SESSION['login'] === true) : ?>
                                 <label for="username" class="input_label">User Name</label>
                                 <input id="username" class="input_field" type="text" name="username" title="Username" placeholder="User Name" value="<?= $_SESSION['username'] ?>" readonly style="border-radius: 9px;">
                              <?php endif; ?>
                           </div>
                           <div class="input_container">
                              <label for="phone" class="input_label">Phone Number</label>
                              <input id="phone" class="input_field" type="text" name="phone" title="Phone Number" placeholder="Phone Number" required style="border-radius: 9px;">
                           </div>
                           <div class="input_container">
                              <label for="user_address" class="input_label">Address</label>
                              <input id="user_address" class="input_field" type="text" name="address" title="Address" placeholder="Address" required style="border-radius: 9px;">
                           </div>
                           <div class="input_container">
                              <label for="user_post_code" class="input_label">Zip Code / City</label>
                              <div class="split">
                                 <input id="user_post_code" class="input_field" type="text" name="zipcode" title="Zip Code" placeholder="Zip Code" required style="border-radius: 9px;">
                                 <input id="user_city" class="input_field" type="text" name="city" title="City" placeholder="City" required style="border-radius: 9px;">
                              </div>
                           </div>
                        </div>
                        <button type="submit" class="purchase--btn" id="place-order-btn">Place Order</button>
                     </form>
                  </div>

                  <div class="order-summary-container">
                     <div class="product-checkout-details">
                        <div class="block">
                           <h4 class="widget-title">Order Summary</h4>
                           <div class="media product-card">
                              <div class="media-body">
                                 <?php if (isset($_SESSION['cart'])) { ?>
                                    <?php foreach ($_SESSION['cart'] as $item) : ?>

                                       <div style="margin-bottom:5px;">
                                          <a class="pull-left">
                                             <?php $allDetails = $info->getDetails($item['id']) ?>

                                             <img class="media-object" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allDetails[0]['image_name'] ?> " alt=" Image" style="width: 50px; height:50px; border-radius: 40px;" />
                                          </a>
                                          <p class="price" style="margin-left: 0%; font-size:15px;"><?= $allDetails[0]['product_name'] ?> <span style="margin-left:20%"><?= $item['quantity'] ?> x $<?= $item['price'] ?></span> <span style="margin-left:2%; font-size: large;"><?= $item['size'] ?></span></p>
                                       </div>
                                    <?php endforeach ?>
                                 <?php } ?>
                              </div>

                           </div>
                           <div class="discount-code">
                              <p style="font-size: 16px;">Have a discount? <a id="couponLink" href="#!">Enter it here!</a></p>
                           </div>
                           <ul class="summary-prices">

                              <?php if (!isset($_SESSION['cart'])) { ?>
                                 <li>
                                    <span style="font-size: 18px;">Subtotal:</span>
                                    <span class="price">$0</span>
                                 </li>
                                 <li>
                                    <span style="font-size: 18px;">Shipping:</span>
                                    <span class="price">$0</span>
                                 </li>
                           </ul>
                           <div class="summary-total">
                              <span style="font-size: 20px;">Total</span>
                              <span id="total-price">$0</span>
                           </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['cart'])) { ?>
                           <?php if ($discount > 0) : ?>
                              <span class="discount-value" id="discount-value" style="color: red; margin-left: 0%; display: flex; justify-content: space-between; width: 100%; font-size:18px;">
                                 <span>Discount:</span>
                                 <span style="margin-left: 69%;">-<?= $discount ?>%</span>
                              </span>
                           <?php endif; ?>
                           <li>
                              <span style="font-size: 18px;">Subtotal:</span>
                              <span class="price" id="subtotal">$<?= number_format($total_price, 2) ?></span>
                              <span class="price discount" id="discounted-subtotal" style="display: none;">$<?= number_format($discounted_price, 2) ?></span>
                           </li>
                           <li>
                              <span style="font-size: 18px;">Shipping:</span>
                              <span class="price">$<?= number_format($shipping, 2) ?></span>
                           </li>
                           </ul>
                           <div class="summary-total">
                              <span style="font-size: 20px;">Total</span>
                              <span id="total-price">$<?= number_format($shipping + $discounted_price, 2) ?></span>
                           </div>
                        <?php } ?>
                        <div class="verified-icon">
                           <img src="images/shop/verified.png">
                        </div>
                        </div>
                     </div>
                  </div>
               </div>

            </div>

         </div>

      </div>
      <?php require_once('common/footer.php'); ?>
   </div>
</body>
<!-- Modal structure -->
<div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <form id="codeform" action="../actions/couponcode.php">
               <div class="form-group">
                  <input class="form-control" type="text" placeholder="Enter Coupon Code" name="code" style="border-radius:40px">
               </div>
               <button type="submit" class="btn btn-main">Apply Coupon</button>
            </form>
         </div>

      </div>

   </div>

</div>


<style>
   /* CSS */


   .product-card .media-body {
      display: flex;
      flex-direction: column;
      width: 100%;
   }

   .product-card .media-body div {
      display: flex;
      flex-direction: row;
      /* Align image and text side by side */
      align-items: center;
      /* Vertically align image and text */
      width: 100%;
      margin-bottom: 10px;
      /* Add spacing between items */
   }

   .product-card .media-body a {
      align-self: flex-start;
      width: auto;
      /* Adjust width to fit image */
      margin-right: 10px;
      /* Add some space between image and text */
      margin-left: 0;
      /* Ensure image starts from the beginning */
   }

   .product-card .media-body .price {
      align-self: flex-start;
      margin-left: 0;
      width: 100%;
      /* Ensure the price uses the full width of its parent */
      font-size: 15px;
   }

   .price {
      padding-left: 8px;
      font-size: 18px;
      /* Adjust the padding to add space between the spans */
   }

   .checkout-container {
      display: flex;
      align-items: stretch;


      /* Ensure both divs are of the same height */
   }

   .form-container {
      border-radius: 26px 0 0 26px;
      background-color: rgba(280, 280, 280);
      box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.01),
         /* Shadow on the right side */
         2px 0px 6px rgba(0, 0, 0, 0.05),
         /* Shadow on the right side */
         2px 0px 6px rgba(0, 0, 0, 0.09),
         /* Shadow on the right side */
         2px 0px 2px rgba(0, 0, 0, 0.1),
         /* Shadow on the right side */
         0px 0px 0px rgba(0, 0, 0, 0.1);
      /* No additional shadow */

      /* Transparent shadow */

   }

   .order-summary-container {
      border-radius: 0 26px 26px 0;
      box-shadow:
         2px 0px 6px rgba(0, 0, 0, 0.01),
         /* Shadow on the right side */
         2px 0px 6px rgba(0, 0, 0, 0.05),
         /* Shadow on the right side */
         2px 0px 6px rgba(0, 0, 0, 0.09),
         /* Shadow on the right side */
         2px 0px 6px rgba(0, 0, 0, 0.1),
         /* Shadow on the right side */
         0px 0px 6px rgba(0, 0, 0, 0.1);
      background-color: rgba(240, 240, 240, 0.5);

      /* Light gray with low opacity */
      backdrop-filter: blur(15px);
      /* Apply blur effect to the background */

      /* No additional shadow */

      /* Transparent shadow to remove right side shadow */

      /* Shadow to the right to hide left side shadow */


   }

   .form-container,
   .order-summary-container {
      flex: 1;
      /* Allow both containers to take equal width */
      color: #000000;



      /* Apply a shadow for consistency */
      padding: 20px;
      /* Add padding inside the containers */
      margin-right: 0;
      /* No margin to keep them together */
   }

   .order-summary-container {
      margin-left: 0;
      /* No margin to keep them together */
   }

   .separator-line {
      width: 1px;
      background-color: #ddd;
      /* Color of the line */
      height: 100%;
      /* Full height of the container */
      margin: 0;
      /* No margin to keep line tight */
   }

   /* Modal Styles */


   .form-control:focus {
      border-color: #333333;
      /* Darker border on focus */
      box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.2);
      /* Stronger inner shadow */
   }

   /* Button */
   .btn-main {
      background-color: #000000;
      /* Black background */
      color: #ffffff;
      /* White text */
      border: none;
      /* No border */
      border-radius: 50px;
      /* Large rounded corners */
      padding: 10px 25px;
      margin-left: 1%;
      /* Padding */
      font-size: 1rem;
      /* Slightly larger font size */
      font-weight: 500;
      /* Bolder text */
      text-transform: uppercase;
      /* Uppercase text */
      letter-spacing: 1.5px;
      /* Spacing between letters */
      cursor: pointer;
      /* Pointer cursor on hover */
      transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
      /* Smooth transitions */
   }

   .btn-main:hover {
      background-color: #333333;
      /* Darker button color */
      transform: translateY(-3px);
      /* Slight lift effect on hover */
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      /* Shadow effect */
   }

   .btn-main:focus,
   .btn-main:active {
      outline: none;
      /* Remove default focus outline */
      box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
      /* Focus shadow */
   }
</style>

<script>
   document.addEventListener('DOMContentLoaded', function() {
      var couponLink = document.getElementById('couponLink');

      // Function to show the modal
      function showModal() {
         $('#coupon-modal').modal('show');
      }

      // Add hover event listener
      couponLink.addEventListener('mouseover', showModal);
   });
   $(document).on('submit', '#codeform', function(e) {
      e.preventDefault();
      var form = new FormData(this);
      console.log(form);
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
                  customClass: {
                     confirmButton: 'button btn btn-primary app_style'
                  }
               }).then(function() {
                  window.location.href = 'checkout.php';
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
   document.addEventListener("DOMContentLoaded", function() {
      const subtotalElement = document.getElementById('subtotal');
      const discountedSubtotalElement = document.getElementById('discounted-subtotal');
      const totalPriceElement = document.getElementById('total-price');
      const discountValueElement = document.getElementById('discount-value');

      const discount = <?= json_encode($discount) ?>;
      const originalSubtotal = <?= json_encode(number_format($total_price, 2)) ?>;
      const discountedSubtotal = <?= json_encode(number_format($discounted_price, 2)) ?>;
      const shipping = <?= json_encode(number_format($shipping, 2)) ?>;

      if (discount > 0) {
         subtotalElement.style.textDecoration = 'line-through';
         subtotalElement.style.color = 'red';
         discountedSubtotalElement.style.display = 'inline';
         discountValueElement.style.display = 'inline';

         totalPriceElement.innerHTML = `$${(parseFloat(discountedSubtotal.replace(',', '')) + parseFloat(shipping)).toFixed(2)}`;
      }
   });
   $(document).ready(function() {
      $('#place-order-btn').click(function(event) {
         // Prevent default form submission
         event.preventDefault();

         // Get the form element
         var form = $('#checkout-form')[0];

         // Check if all required fields are filled and form is valid
         if (!form.checkValidity()) {
            form.reportValidity();
            return;
         }

         // Serialize form data
         var formData = $(form).serialize();

         // Retrieve the total price separately if needed
         var total_price = parseFloat($('#total-price').text().replace('$', ''));

         // Append total price to the form data
         formData += '&total_price=' + total_price;

         // Proceed with AJAX request
         $.ajax({
            url: '../actions/process_order.php',
            type: 'POST',
            data: formData,
            success: function(response) {
               if (response.success) {
                  window.location.href = 'confirmation.php';
               } else {
                  alert('Error placing order. Please try again.');
               }
            }
         });
      });
   });
</script>



<?php require_once('common/script.php'); ?>

</body>

</html>