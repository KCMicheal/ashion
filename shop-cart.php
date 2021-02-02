<?php include_once 'inc/header.php';?>
<?php include_once 'inc/nav.php';?>

<?php 
session_start(); // Start session first thing in script
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Connect to the MySQL database  
include "dbconnect.php"; 
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	header("location: cart.php"); 
    exit();
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
?>

<body>

<div class="breadcrumb-option">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb__links">
<a href="index.php"><i class="fa fa-home"></i> Home</a>
<span>Shopping cart</span>
</div>
</div>
</div>
</div>
</div>


<section class="shop-cart spad">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="shop__cart__table">
<table>
<thead>
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<td class="cart__product__item">
<img src="img/shop-cart/cp-1.jpg" alt="">
<div class="cart__product__item__title">
<h6>Chain bucket bag</h6>
<div class="rating">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
</div>
</td>
<td class="cart__price">$ 150.0</td>
<td class="cart__quantity">
<div class="pro-qty">
<input type="text" value="1">
</div>
</td>
<td class="cart__total">$ 300.0</td>
<td class="cart__close"><span class="icon_close"></span></td>
</tr>
<tr>
<td class="cart__product__item">
<img src="img/shop-cart/cp-2.jpg" alt="">
<div class="cart__product__item__title">
<h6>Zip-pockets pebbled tote briefcase</h6>
<div class="rating">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
</div>
</td>
<td class="cart__price">$ 170.0</td>
<td class="cart__quantity">
<div class="pro-qty">
<input type="text" value="1">
</div>
</td>
<td class="cart__total">$ 170.0</td>
<td class="cart__close"><span class="icon_close"></span></td>
</tr>
<tr>
<td class="cart__product__item">
<img src="img/shop-cart/cp-3.jpg" alt="">
<div class="cart__product__item__title">
<h6>Black jean</h6>
<div class="rating">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
</div>
</td>
<td class="cart__price">$ 85.0</td>
<td class="cart__quantity">
<div class="pro-qty">
<input type="text" value="1">
</div>
</td>
<td class="cart__total">$ 170.0</td>
<td class="cart__close"><span class="icon_close"></span></td>
</tr>
<tr>
<td class="cart__product__item">
<img src="img/shop-cart/cp-4.jpg" alt="">
<div class="cart__product__item__title">
<h6>Cotton Shirt</h6>
<div class="rating">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
</div>
</td>
<td class="cart__price">$ 55.0</td>
<td class="cart__quantity">
<div class="pro-qty">
<input type="text" value="1">
</div>
</td>
<td class="cart__total">$ 110.0</td>
<td class="cart__close"><span class="icon_close"></span></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="cart__btn">
<a href="#">Continue Shopping</a>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="cart__btn update__btn">
<a href="#"><span class="icon_loading"></span> Update cart</a>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="discount__content">
<h6>Discount codes</h6>
<form action="#">
<input type="text" placeholder="Enter your coupon code">
<button type="submit" class="site-btn">Apply</button>
</form>
</div>
</div>
<div class="col-lg-4 offset-lg-2">
<div class="cart__total__procced">
<h6>Cart total</h6>
<ul>
<li>Subtotal <span>$ 750.0</span></li>
<li>Total <span>$ 750.0</span></li>
</ul>
<a href="checkout.php" class="primary-btn">Proceed to checkout</a>
</div>
</div>
</div>
</div>
</section>


<div class="instagram">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-4 col-sm-4 p-0">
<div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
<div class="instagram__text">
<i class="fa fa-instagram"></i>
<a href="#">@ ashion_shop</a>
</div>
</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-4 p-0">
<div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
<div class="instagram__text">
<i class="fa fa-instagram"></i>
<a href="#">@ ashion_shop</a>
</div>
</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-4 p-0">
<div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
<div class="instagram__text">
<i class="fa fa-instagram"></i>
<a href="#">@ ashion_shop</a>
</div>
</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-4 p-0">
<div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
<div class="instagram__text">
<i class="fa fa-instagram"></i>
<a href="#">@ ashion_shop</a>
</div>
</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-4 p-0">
<div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
<div class="instagram__text">
<i class="fa fa-instagram"></i>
<a href="#">@ ashion_shop</a>
</div>
</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-4 p-0">
<div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
<div class="instagram__text">
<i class="fa fa-instagram"></i>
<a href="#">@ ashion_shop</a>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include_once 'inc/footer.php';?>


<div class="search-model">
<div class="h-100 d-flex align-items-center justify-content-center">
<div class="search-close-switch">+</div>
<form class="search-model-form">
<input type="text" id="search-input" placeholder="Search here.....">
</form>
</div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
  </script>
</body>

</html>