<?php include_once 'inc/header.php';?>
<?php include_once 'inc/nav.php';?>

<!-- connect to mysql database -->

<?php
$con = mysqli_connect("localhost", "root", "", "fashionstore") 
or die("Error " . mysqli_error($con));

//Upload Image

 if(isset($_POST['cover_up']))
 {

 $imgFile = $_FILES['coverimg']['name'];
 $tmp_dir = $_FILES['coverimg']['tmp_name'];
 $imgSize = $_FILES['coverimg']['size']; 
 
 if(!empty($imgFile))
 {

 $upload_dir = 'image/'; // upload directory
 
 $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
 
 // valid image extensions
 $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
 
 // rename uploading image
 $coverpic = rand(1000,1000000).".".$imgExt;
 
 // allow valid image file formats
 if(in_array($imgExt, $valid_extensions)){ 
 // Check file size '5MB'
 if($imgSize < 5000000) {
 move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
 }
 else{
 $errMSG = "Sorry, your file is too large.";
 }
 }
 else{
 $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
 }

//For Database Insertion
 // if no error occured, continue ....
 if(!isset($errMSG))
 {
 $que = "INSERT INTO image(b_image) VALUES('" . $coverpic . "')";

 if(mysqli_query($con, $que))
 {
 echo "<script type='text/javascript'>alert('Posted succesfully.');</script>";
 }
 else
 {
 echo "<script type='text/javascript'>alert('error while inserting....');</script>";
 }
 
 }
 

 }
}
 
 //Get Last Inserted Id
 $last_id = mysqli_insert_id($con);

 //Fetch Qquery
 $que = "SELECT * FROM image where id='$last_id' ";
 $result = mysqli_query($con, $que);
 $row=mysqli_fetch_assoc($result);


 if (isset($_POST['btn_save'])) {
    $err_flag = false;
    
    if (!empty($_POST['product_name'])) {
        $productName = $_POST['product_name'];
      } else {
        echo "<script>alert('Add product name')</script>";
        $err_flag = true;
      }

      if (!empty($_FILES['picture'])) {
        $productImg_dir = 'Product_image/';

        $productPicture = $_FILES['picture']['name'];
        $productPicturetmp = $_FILES['picture']['tmp_name'];
        move_uploaded_file($productPicturetmp, $productImg_dir.$productPicture);
      } else {
        echo "<script>alert('Add product Image')</script>";
        $err_flag = true;
      }
      

      if (!empty($_POST['details'])) {
          $productdetails = $_POST['details'];
      } else {
        echo "<script>alert('Add product description')</script>";
        $err_flag = true;
      }

      if (!empty($_POST['price'])) {
          $productprice = $_POST['price'];
      } else {
        echo "<script>alert('Add product price')</script>";
        $err_flag = true;
      }

      if (!empty($_POST['product_type'])) {
          $productCat = $_POST['product_type'];
      } else {
        echo "<script>alert('Add product category')</script>";
        $err_flag = true;
      }

      if (!empty($_POST['brand'])) {
          $productbrand = $_POST['brand'];
      } else {
        echo "<script>alert('Add product brand')</script>";
        $err_flag = true;
      }

      if (!empty($_POST['tags'])) {
          $producttags = $_POST['tags'];
      } else {
        echo "<script>alert('Add product tags')</script>";
        $err_flag = true;
      }

      if ($err_flag === false) {
          $sql = "INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) VALUES ('$productCat', '$productbrand', '$productName', '$productprice', '$productdetails', '$productPicture', '$producttags')";
          $query = mysqli_query($con, $sql);

          if ($query) {
              echo "<script>alert('Product added succesfully')</script>";
          } else {
            echo "<script>alert('Failed to upload product')</script>";
          }
      }
 }

?>



<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            
            <!-- page start-->
    
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Product
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category</label>
                        <select name="product_type" class="form-control">
                            
                          <?php
                              $sqlCat = "SELECT * FROM categories";
                              $catquery = mysqli_query($con, $sqlCat);

                              foreach ($catquery as $cat) {
                                extract($cat); ?>

                                <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>

                                <?php } ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Product Brand</label>
                        <select name="brand" required="" class="form-control">
                            
                          <?php
                              $sqlBrand = "SELECT * FROM brands";
                              $brandquery = mysqli_query($con, $sqlBrand);

                              foreach ($brandquery as $brand) {
                                extract($brand); ?>

                                <option value="<?php echo $brand_id; ?>"><?php echo $brand_title; ?></option>

                                <?php } ?>

                        </select>
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Keywords</label>
                        <input type="text" id="tags" name="tags" required class="form-control" >
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="col-md-5">
            <div class="card">
              <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Upload Product</button>
              </div>
            </div>
          </div>  
        </div>
        </form>
          
        </div>
      </div>
     </section>
    </div>
</div>
            <!-- page end-->
</div>
</section>


<?php include_once 'inc/footer.php';?>


</section>