<?php include_once 'inc/header.php';?>
<?php include_once 'inc/nav.php';?>
<?php include_once 'dbconnect.php';?>



<div class="breadcrumb-option">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb__links">
<a href="index.html"><i class="fa fa-home"></i> Home</a>
<span>Shop</span>
</div>
</div>
</div>
</div>
</div>


<section class="shop spad">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3">
<div class="shop__sidebar">
<div class="sidebar__categories">
<div class="section-title">
<h4>Categories</h4>
</div>
<div class="categories__accordion">
<div class="accordion" id="accordionExample">
<div class="card">
<div class="card-heading active">
<!-- <a data-toggle="collapse" data-target="#collapseOne">Drinks</a> -->
</div>
<div id="collapseOne" class="collapse show" data-parent="#accordionExample">
<div class="card-body">
<ul>

<?php
	$sql1 = "SELECT * FROM categories";
	$query1 = mysqli_query($con, $sql1);

	foreach ($query1 as $cat) {
		extract($cat); ?>

	<li><a href="#"><?php echo $cat_title; ?></a></li>
<?php } ?>



</ul>
</div>
</div>
</div>

</div>
</div>
</div>
<div class="sidebar__filter">
<div class="section-title">
<!-- <h4>Shop by price</h4>
</div>
<div class="filter-range-wrap">
<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="99"></div>
<div class="range-slider">
<div class="price-input">
<p>Price:</p>
<input type="text" id="minamount">
<input type="text" id="maxamount">
</div>
</div>
</div>
<a href="#">Filter</a>
</div>
<div class="sidebar__sizes">
<div class="section-title">
<h4>Shop by size</h4>
</div>
<div class="size__list">
<label for="xxs">
xxs
<input type="checkbox" id="xxs">
<span class="checkmark"></span>
</label>
<label for="xs">
xs
<input type="checkbox" id="xs">
<span class="checkmark"></span>
</label>
<label for="xss">
xs-s
<input type="checkbox" id="xss">
<span class="checkmark"></span>
</label>
<label for="s">
s
<input type="checkbox" id="s">
<span class="checkmark"></span>
</label>
<label for="m">
m
<input type="checkbox" id="m">
<span class="checkmark"></span>
</label>
<label for="ml">
m-l
<input type="checkbox" id="ml">
<span class="checkmark"></span>
</label>
<label for="l">
l
<input type="checkbox" id="l">
<span class="checkmark"></span>
</label>
<label for="xl">
xl
<input type="checkbox" id="xl">
<span class="checkmark"></span>
</label>
</div>
</div>
<div class="sidebar__color">
<div class="section-title">
<h4>Shop by size</h4>
</div>
<div class="size__list color__list">
<label for="black">
Blacks
<input type="checkbox" id="black">
<span class="checkmark"></span>
</label>
<label for="whites">
Whites
<input type="checkbox" id="whites">
<span class="checkmark"></span>
</label>
<label for="reds">
Reds
<input type="checkbox" id="reds">
<span class="checkmark"></span>
</label>
<label for="greys">
Greys
<input type="checkbox" id="greys">
<span class="checkmark"></span>
</label>
<label for="blues">
Blues
<input type="checkbox" id="blues">
<span class="checkmark"></span>
</label>
<label for="beige">
Beige Tones
<input type="checkbox" id="beige">
<span class="checkmark"></span>
</label>
<label for="greens">
Greens
<input type="checkbox" id="greens">
<span class="checkmark"></span>
</label>
<label for="yellows">
Yellows
<input type="checkbox" id="yellows">
<span class="checkmark"></span>
</label> -->
</div>
</div>
</div>
</div>
<div class="col-lg-9 col-md-9">
<div class="row">

<?php
	$sql2 = "SELECT * FROM products";
	$query2 = mysqli_query($con, $sql2);

	foreach ($query2 as $product) {
		extract($product); ?>

		<div class="col-lg-4 col-md-6">
		<div class="product__item">
		<div class="product__item__pic set-bg" data-setbg="admin/Product_image/<?php echo $product_image; ?>">
		<div class="label new">New</div>
		<ul class="product__hover">
		<li><a href="img/shop/shop-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
		<li><a href="#"><span name="add" class="icon_heart_alt" name="add"></span></a></li>
		<li><a href="#"><span class="icon_bag_alt"></span></a></li>
		</ul>
		</div>
		<div class="product__item__text">
		<h6><a href="product-details.php?id=<?php echo $product_id; ?>"><?php echo $product_title; ?></a></h6>
		<div class="rating">
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		</div>
		<div class="product__price">$ <?php echo $product_price; ?></div>
		</div>
		</div>
		</div>
		
	<?php } ?>
<div class="col-lg-12 text-center">
<div class="pagination__option">
<a href="#">1</a>
<a href="#">2</a>
 <a href="#">3</a>
<a href="#"><i class="fa fa-angle-right"></i></a>
</div>
</div>
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


<footer class="footer">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-7">
<div class="footer__about">
<div class="footer__logo">
<a href="index-2.html"><img src="img/logo.png" alt=""></a>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
cilisis.</p>
<div class="footer__payment">
<a href="#"><img src="img/payment/payment-1.png" alt=""></a>
<a href="#"><img src="img/payment/payment-2.png" alt=""></a>
<a href="#"><img src="img/payment/payment-3.png" alt=""></a>
<a href="#"><img src="img/payment/payment-4.png" alt=""></a>
<a href="#"><img src="img/payment/payment-5.png" alt=""></a>
</div>
</div>
</div>
<div class="col-lg-2 col-md-3 col-sm-5">
<div class="footer__widget">
<h6>Quick links</h6>
<ul>
<li><a href="#">About</a></li>
<li><a href="#">Blogs</a></li>
<li><a href="#">Contact</a></li>
<li><a href="#">FAQ</a></li>
</ul>
</div>
</div>
<div class="col-lg-2 col-md-3 col-sm-4">
<div class="footer__widget">
<h6>Account</h6>
<ul>
<li><a href="#">My Account</a></li>
<li><a href="#">Orders Tracking</a></li>
<li><a href="#">Checkout</a></li>
<li><a href="#">Wishlist</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-8 col-sm-8">
<div class="footer__newslatter">
<h6>NEWSLETTER</h6>
<form action="#">
<input type="text" placeholder="Email">
<button type="submit" class="site-btn">Subscribe</button>
</form>
<div class="footer__social">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-youtube-play"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">

<div class="footer__copyright__text">
<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
</div>

</div>
</div>
</div>
</footer>


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

