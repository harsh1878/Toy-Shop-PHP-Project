<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['review']))
  {
    $name=$_POST['name'];
    $preview=$_POST['preview'];
    $reviewtitle=$_POST['reviewtitle'];
     $pid=$_GET['pid'];
    $query=mysqli_query($con, "insert into tblreview(ProductID,ReviewTitle,Review,Name) value('$pid','$reviewtitle','$preview','$name')");
    if ($query) {
   echo "<script>alert('Your review was sent successfully!.');</script>";
echo "<script>window.location.href ='about.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
//Code for Wish List
$pid=intval($_GET['pid']);
if(isset($_POST['wishlist'])){
if(strlen($_SESSION['id'])==0)
{   
echo "<script>alert('Login is required to wishlist a product');</script>";
} else{
$userid=$_SESSION['id'];    
$query=mysqli_query($con,"select id from wishlist where userId='$userid' and productId='$pid'");
$count=mysqli_num_rows($query);
if($count==0){
mysqli_query($con,"insert into wishlist(userId,productId) values('$userid','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
  echo "<script type='text/javascript'> document.location ='my-wishlist.php'; </script>";
} else { 
echo "<script>alert('This product is already added in your wishlist.');</script>";
}
}}

//Code for Adding Product in to Cart
if(isset($_POST['addtocart'])){
if(strlen($_SESSION['id'])==0)
{   
echo "<script>alert('Login is required to add a product in to the cart');</script>";
} else{
$userid=$_SESSION['id']; 
$pqty=$_POST['inputQuantity'];  
$query=mysqli_query($con,"select id,productQty from cart where userId='$userid' and productId='$pid'");
$count=mysqli_num_rows($query);
if($count==0){
mysqli_query($con,"insert into cart(userId,productId,productQty) values('$userid','$pid','$pqty')");
echo "<script>alert('Product aaded in cart');</script>";
  echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
} else { 
$row=mysqli_fetch_array($query);
$currentpqty=$row['productQty'];
$productqty=$pqty+$currentpqty;
mysqli_query($con,"update cart set productQty='$productqty' where userId='$userid' and productId='$pid'");
echo "<script>alert('Product aaded in cart');</script>";
  echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
}}
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Toys Shop | Toy Details </title>
      <!--meta tags -->
      
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--Shoping cart-->
      <link rel="stylesheet" href="css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
      <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
   </head>
   <body>
      <!--headder-->
      <?php include_once('includes/header.php');?>
      <!--//headder-->
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="index.php">Home</a>
                  <span>/ </span>
               </li>
               <li>Toy Details</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--//banner -->
      <!--/shop-->
      <section class="banner-bottom py-lg-5 py-3">
         
         <?php 
$pid=intval($_GET['pid']);
$query=mysqli_query($con,"select tbltoys.id as pid,tbltoys.ToyImage1,tbltoys.ToyImage2,tbltoys.ToyImage3,tbltoys.ToyName,category.categoryName,subcategory.subcategoryName as subcatname,tbltoys.postingDate,tbltoys.updationDate,subcategory.id as subid,tbladmin.username,category.id as catid,tbltoys.Age,tbltoys.Battery,tbltoys.Materials,tbltoys.ProductDimension,tbltoys.BoxDimension,tbltoys.Countryoforigin,tbltoys.Instruction,tbltoys.Features,tbltoys.ToyPriceAfterDiscount,tbltoys.ToyPriceBeforeDiscount,tbltoys.ToyAvailability,tbltoys.ToyDescription,tbltoys.ShippingCharge,tblbrand.id as bid,tblbrand.BrandName from tbltoys join subcategory on tbltoys.subCategory=subcategory.id join category on tbltoys.category=category.id join tbladmin on tbladmin.id=tbltoys.addedBy join tblbrand on tblbrand.id=tbltoys.Brandid where  tbltoys.id='$pid'");
while($row=mysqli_fetch_array($query))
{
?>
         <div class="container">
            <div class="inner-sec-shop pt-lg-4 pt-3">
               <div class="row">
                  <div class="col-lg-4 single-right-left ">
                     <div class="grid images_3_of_2">
                        <div class="flexslider1">
                           <ul class="slides">
                              <li data-thumb="admin/productimages/<?php echo htmlentities($row['ToyImage1']);?>">
                                 <div class="thumb-image"> <img src="admin/productimages/<?php echo htmlentities($row['ToyImage1']);?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                              </li>
                              <li data-thumb="admin/productimages/<?php echo htmlentities($row['ToyImage2']);?>">
                                 <div class="thumb-image"> <img src="admin/productimages/<?php echo htmlentities($row['ToyImage2']);?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                              </li>
                              <li data-thumb="admin/productimages/<?php echo htmlentities($row['ToyImage3']);?>">
                                 <div class="thumb-image"> <img src="admin/productimages/<?php echo htmlentities($row['ToyImage3']);?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                              </li>
                           </ul>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                     <h3><?php echo htmlentities($row['ToyName']);?></h3>
                     <p>        <del>$<?php echo htmlentities($row['ToyPriceBeforeDiscount']);?></del>
                        <span class="item_price">₹<?php echo htmlentities($row['ToyPriceAfterDiscount']);?></span>
                
                     </p>
                   
                     <div class="description">
                        <h5>Brief Details</h5>
                        <p><?php echo htmlentities($row['ToyDescription']);?></p>
                     </div>
                 
                  <form action="#" method="post">
                     <div class="occasion-cart">
                        <input class="form-control"  id="inputQuantity" name="inputQuantity" type="number" value="1">

                        <?php if($row['ToyAvailability']=='In Stock'):?>
                        <div class="toys single-item singlepage" style="padding-top:20px">
                         
                             

                              <button type="submit" class="toys-cart ptoys-cart add"  type="submit" name="addtocart">
                              Add to Cart
                              </button>
                         

                        
                              <button type="submit" class="toys-cart ptoys-cart add" type="submit" name="wishlist">
                              Wishlist
                              </button>
                         
                     </div>
                     <?php else: ?>
                        <h5 style="color:red;">Out of Stock</h5>
                        <div style="padding-top: 10px;">
                       
                              <button type="submit" class="toys-cart ptoys-cart add" type="submit" name="wishlist">
                              Wishlist
                              </button>
                         
                     </div>

<?php endif;?> 
                     </div>
</form>

                  </div>
                  <div class="clearfix"> </div>
                  <!--/tabs-->
                  <div class="responsive_tabs">
                     <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                           <li>Description</li>
                           <li>Reviews</li>
                           <li>Information</li>
                        </ul>
                        <div class="resp-tabs-container">
                           <!--/tab_one-->
                           <div class="tab1">
                              <div class="single_page">
                                 <h6>Product Decription</h6>
                                 <p><?php echo htmlentities($row['ToyDescription']);?>                                 </p>
                            
                                 <p class="para"><?php echo htmlentities($row['Features']);?>
                                 </p>
                              </div>
                           </div>
                           <!--//tab_one-->
                           <div class="tab2">

                              <div class="single_page">
                                 <div class="bootstrap-tab-text-grids">
<?php $ret=mysqli_query($con,"select * from tblreview where Status='Review Accept' and  ProductID='$pid'");
while ($result=mysqli_fetch_array($ret)) {
?>
                                    <div class="bootstrap-tab-text-grid">
                                       <div class="bootstrap-tab-text-grid-left">
                                          <img src="images/team1.jpg" alt=" " class="img-fluid">
                                       </div>




                                       <div class="bootstrap-tab-text-grid-right">

                                          <ul>
                                             
                                             <li><a href="#"><?php echo htmlentities($result['Name']);?></a></li>
                                        <li><?php echo htmlentities($result['DateofReview']);?></li> 
                                          </ul>
                                           <b><?php echo htmlentities($result['ReviewTitle']);?></b><br />
<?php echo htmlentities($result['Review']);?>
                             
                                       </div>
                                       <div class="clearfix"> </div>
                                    </div>
<?php } ?>


                                    <div class="add-review">
                                       <h4>Write a review</h4>
                                       <form action="#" method="post" class="form-box">
                                    <div class="form-box__single-group">
                                        <label for="form-message">Title for your review*</label>
                                        <input type="text" id="reviewtitle" name="reviewtitle" required="true">
                                    </div>
                                    <br>
                                    <div class="form-box__single-group">
                                        <label for="form-review">Your review*</label>
                                        <textarea id="review" rows="5" name="preview" required="true"></textarea>

                                    </div>

                                    <div class="form-box__single-group">
                                        <label for="form-name">Your name*</label>
                                        <input type="text" id="name" name="name">
                                    </div>
                                    <div class="from-box__buttons d-flex justify-content-between d-flex-warp m-t-25 align-items-center" style="padding-top:20px">
                                        <div class="from-box__left">
                                            <span>* Required fields</span>
                                        </div>
                                        <div class="form-box-right">
                                            <button class="btn btn-block sent-butnn" type="submit" name="review">Send</button>
                                          
                                        </div>
                                    </div>
                                </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab3">
                              <div class="single_page">
                                 

  <table border="1" class="table table-bordered">

                                    <tr>
                                       <th>Materials</th>
                                       <td><?php echo htmlentities($row['Materials']);?></td>
                                    </tr>

                                      <tr>
                                       <th>Age</th>
                                       <td><?php echo htmlentities($row['Age']);?></td>
                                    </tr>


                                    <tr>
                                       <th>Battery</th>
                                       <td><?php echo htmlentities($row['Battery']);?></td>
                                    </tr>


                                   <tr>
                                       <th>Product Dimension</th>
                                       <td><?php echo htmlentities($row['ProductDimension']);?></td>
                                    </tr>


                                       <tr>
                                       <th>Box Dimension</th>
                                       <td><?php echo htmlentities($row['BoxDimension']);?></td>
                                    </tr>

                                      <tr>
                                       <th>Country of origin</th>
                                       <td><?php echo htmlentities($row['Countryoforigin']);?></td>
                                    </tr>

                                      <tr>
                                       <th>Category</th>
                                       <td><?php echo htmlentities($row['categoryName']);?></td>
                                    </tr>

                                       <tr>
                                       <th>Subcategory</th>
                                       <td><?php echo htmlentities($row['subcatname']);?></td>
                                    </tr>

                                      <tr>
                                       <th>Instruction</th>
                                       <td><?php echo htmlentities($row['Instruction']);?></td>
                                    </tr>

                                   </table>





                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--//tabs-->
               </div>
            </div>
         </div>
         <?php } ?>
         
      </section>
      <!--subscribe-address-->

<?php include_once('includes/footer.php');?>
      <!--jQuery-->
      <script src="js/jquery-2.2.3.min.js"></script>
      <!-- newsletter modal -->
      <!-- cart-js -->
      <script src="js/minicart.js"></script>
      <script>
         toys.render();
         
         toys.cart.on('toys_checkout', function (evt) {
         	var items, len, i;
         
         	if (this.subtotal() > 0) {
         		items = this.items();
         
         		for (i = 0, len = items.length; i < len; i++) {}
         	}
         });
      </script>
      <!-- //cart-js -->
      <!-- price range (top products) -->
      <script src="js/jquery-ui.js"></script>
      <script>
         //<![CDATA[ 
         $(window).load(function () {
         	$("#slider-range").slider({
         		range: true,
         		min: 0,
         		max: 9000,
         		values: [50, 6000],
         		slide: function (event, ui) {
         			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
         		}
         	});
         	$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
         
         }); //]]>
      </script>
      <!-- //price range (top products) -->
      <!-- single -->
      <script src="js/imagezoom.js"></script>
      <!-- single -->
      <!-- script for responsive tabs -->
      <script src="js/easy-responsive-tabs.js"></script>
      <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion           
         		width: 'auto', //auto or any width like 600px
         		fit: true, // 100% fit in a container
         		closed: 'accordion', // Start closed if in accordion view
         		activate: function (event) { // Callback function if tab is switched
         			var $tab = $(this);
         			var $info = $('#tabInfo');
         			var $name = $('span', $info);
         			$name.text($tab.text());
         			$info.show();
         		}
         	});
         	$('#verticalTab').easyResponsiveTabs({
         		type: 'vertical',
         		width: 'auto',
         		fit: true
         	});
         });
      </script>
      <!-- FlexSlider -->
      <script src="js/jquery.flexslider.js"></script>
      <script>
         // Can also be used with $(document).ready()
         $(window).load(function () {
         	$('.flexslider1').flexslider({
         		animation: "slide",
         		controlNav: "thumbnails"
         	});
         });
      </script>
      <!-- //FlexSlider-->
      <!-- start-smoth-scrolling -->
      <script src="js/move-top.js"></script>
      <script src="js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 900);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};
         
         
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!-- //smooth-scrolling-of-move-up -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working--> 
   </body>
</html>