<?php
session_start();
require("../class/products.class.php");
$products = new Products();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
  }

  .cart-container {
    display: flex;
    flex-direction: column;
    width: 100%;
    border-radius: 10px;
  }

  .cart-item {
    display: flex;
    align-items: center;
    padding-bottom: 5px;
    padding-top: 5px;
    border-bottom: 1px solid #e5e5e5;
    transition: transform 0.2s ease;
  }

  .cart-item:last-child {
    border-bottom: none;
  }

  .cart-item img {
    width: 100px;
    /* Larger image size */
    height: auto;
    margin-right: 30px;
    transition: transform 0.2s ease;
  }

  .cart-item-details {
    flex-grow: 1;
  }

  .cart-item-details h4 {
    margin: 0 0 5px;
    font-size: 20px;
    /* Larger font size */
  }

  .cart-item-details p {
    margin: 0;
    font-size: 16px;
    /* Larger font size */
    color: #555;
  }

  .cart-item-quantity {
    display: flex;
    align-items: center;
  }

  .quantity-button {
    background-color: #333;
    color: white;
    border: none;
    width: 30px;
    height: 30px;
    display: flex;
    border-radius: 50%;
    /* Circular shape */
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 20px;
    transition: background-color 0.2s ease;
  }

  .quantity-button:hover {
    background-color: #555;
  }

  .quantity-value {
    margin: 0 10px;
    font-size: 16px;
    /* Larger font size */
    font-weight: 500;
  }

  .cart-item-remove {
    margin-left: 20px;
    margin-right: 30px;
    font-size: 1.75rem;
    cursor: pointer;
    transition: transform 0.2s ease;
  }

  .cart-item-remove:hover {
    transform: scale(1.2);
  }

  .cart-item:hover {
    transform: scale(1.01);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  .cart-summary {

    bottom: 0;
    right: 0;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    background-color: transparent;
    padding: 10px 20px;
    margin-bottom: 0px;
    margin-top: 12px;
    width: 100%;
    max-width: 400px;
    margin-left: 70%;
    z-index: 1000;
  }

  .total {
    font-size: 1.75rem;
    font-weight: bold;
    color: #333;
    margin: 0 20px 0 0;
  }

  .checkout-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #333;
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
  }

  .checkout-btn:hover {
    background-color: #555;
    transform: scale(1.05);
    color: white;
  }
</style>


<!DOCTYPE html>
<html lang="en">
<?php require_once('common/header.php'); ?>

<body id="body">

  <!-- Start Top Header Bar -->
  <?php require_once('common/navbar.php'); ?>

  <section class="page-header" style="background-color:#333;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h1 class="page-name" style="color:white;">Cart</h1>
            <ol class="breadcrumb">
              <li><a href="index.php" style="color:white;">Home</a></li>
              <li class="active" style="color:white;">cart</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
    <div class="page-wrapper" style="padding-top:1px;margin-left:0.5%; padding-bottom:5px;">
      <div class="cart shopping" style="width:100%;">
        <div class="container" style="width:100%;">
          <div class="cart-container">
            <?php foreach ($_SESSION['cart'] as $cart_item) : ?>
              <?php
              $product = $products->getProductByID($cart_item['id']);
              $allimages = $products->getimages($cart_item['id']);
              ?>
              <div class="cart-item" data-id="<?php echo $cart_item['id'] ?>" data-size="<?php echo $cart_item['size']; ?>">
                <img src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>" alt="product-img" />
                <div class="cart-item-details">
                  <h4><?php echo $product[0]['product_name']; ?></h4>
                  <p><?php echo $cart_item['size'] ?></p>
                  <p class="item-price">$<?php echo $product[0]['price'] ?></p>
                </div>
                <div class="cart-item-quantity">
                  <button class="quantity-button decrease quan" onclick="updateQuantity(this, 'decrease')">-</button>
                  <span class="quantity-value"><?php echo $cart_item['quantity'] ?></span>
                  <button class="quantity-button increase quan" onclick="updateQuantity(this, 'increase')">+</button>
                </div>
                <div class="cart-item-remove">
                  <button class="del" id="remove" data-id="<?php echo $cart_item['id'] ?>" data-size="<?php echo $cart_item['size']; ?>" style="background-color:transparent; border:none;">
                    <i class="fas fa-trash-alt" style="color:red;"></i>
                  </button>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="cart-summary">
              <p style="margin-bottom:6%" class="total" id="total"></p>
              <?php if (isset($_SESSION['username']) && $_SESSION['login'] === true) : ?>
                <a href="empty-cart.php" class="checkout-btn" id="checkoutBtn" style="margin-bottom:6%">Checkout</a>
              <?php else : ?>
                <a href="empty-cart.php" class="checkout-btn" id="" style="margin-bottom:6%">Checkout</a>
              <?php endif; ?>


            </div>




          </div>
        </div>
      </div>
    </div>
    <div>
    <?php else : ?>

      <section class="empty-cart page-wrapper" style="padding-top:100px; padding-bottom:150px;">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="block text-center">
                <i class="tf-ion-ios-cart-outline"></i>
                <h2 class="text-center">Your cart is currently empty!</h2>
                <p>Start shopping & fill your basket with amazing deals and products...</p>
                <a href="shop-sidebar.php" class="custom-btn">Return to shop</a>
              </div>
            </div>
          </div>
        </div>
      </section>

    <?php endif; ?>





    <?php require_once('common/footer.php'); ?>
    <?php require_once('common/script.php'); ?>

    <script>
      function updateTotal() {
        let cartItems = document.querySelectorAll('.cart-item');
        let total = 0;

        cartItems.forEach(function(cartItem) {
          let quantity = parseInt(cartItem.querySelector('.quantity-value').innerText);
          let price = parseFloat(cartItem.querySelector('.item-price').innerText.replace('$', ''));
          total += quantity * price;
        });

        document.querySelector('.total').innerText = total.toFixed(2) + "$";
      }
      document.addEventListener('DOMContentLoaded', function() {
        updateTotal();
      });


      function updateQuantity(button, action) {
        let cartItem = button.closest('.cart-item');
        let quantityElement = cartItem.querySelector('.quantity-value');
        let currentQuantity = parseInt(quantityElement.innerText);

        if (action === 'increase') {
          currentQuantity += 1;
        } else if (action === 'decrease' && currentQuantity > 1) {
          currentQuantity -= 1;
        }

        quantityElement.innerText = currentQuantity;

        // Retrieve product id and size from the cart item
        var productId = cartItem.getAttribute('data-id');
        var productSize = cartItem.getAttribute('data-size');

        // Send AJAX request to update_quantity.php
        $.ajax({
          url: '../actions/update_quantity.php',
          type: 'POST',
          data: {
            id: productId,
            size: productSize,
            quantity: currentQuantity
          },
          success: function(response) {
            console.log(response);
            updateTotal(); // Log success message
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log error message
          }
        });
      }


      document.addEventListener('DOMContentLoaded', function() {
        // Get the total amount element and checkout button
        var totalElement = document.getElementById('total');
        var checkoutBtn = document.getElementById('checkoutBtn');

        // Function to update the checkout button's href
        function updateCheckoutLink() {
          var totalAmount = totalElement.textContent.replace(/[^0-9.]/g, ''); // Remove non-numeric characters
          checkoutBtn.href = '../actions/totalprice.php?total=' + encodeURIComponent(totalAmount);
        }

        // Initial update
        updateCheckoutLink();

        // Create a MutationObserver to watch for changes in the total amount
        var observer = new MutationObserver(function(mutations) {
          mutations.forEach(function(mutation) {
            if (mutation.type === 'childList' || mutation.type === 'characterData') {
              updateCheckoutLink();
            }
          });
        });

        // Configuration for the observer
        var config = {
          childList: true,
          characterData: true,
          subtree: true
        };

        // Start observing the total amount element
        observer.observe(totalElement, config);
      });

      $('#remove').click(function() {
        let productId = $(this).data('id');
        let productSize = $(this).data('size');

        $.ajax({
          url: '../actions/remove_from_cart.php',
          type: 'POST',
          data: {
            id: productId,
            size: productSize
          },
          success: function(response) {
            window.location.href = "cart.php";
          }
        });
      });
    </script>

    <?php require_once('common/footer.php'); ?>
    <?php require_once('common/script.php'); ?>

</body>

</html>