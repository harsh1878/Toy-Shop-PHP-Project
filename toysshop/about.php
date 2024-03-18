<?php session_start();
error_reporting(0);
include_once('includes/config.php');
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Toys Shop | Home</title>
      
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
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
   </head>
<body>
      <!--headder-->
      <?php include_once('includes/header.php');?>
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
                  <span>/ /</span>
               </li>
               <li>About</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--About -->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">About Us</h3>
            <div class="about-innergrid-agile text-center">
               <h4>Welcome To Our Store</h4>
               <?php
$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
               <p class="mb-3"> <?php  echo $row['PageDescription'];?> 
               </p><?php } ?>
               <div class=" img-toy-w3l-top">
               </div>
            </div>
            <div class="about-sub-inner text-center mt-lg-4 mt-3">
               <h4>A faster and better
                  best to shop
               </h4>
               <div class="row">
                  <div class="col-lg-4 col-md-4 abut-gride">
                     <span class="fas fa-truck"></span>
                     <h5>Shipping</h5>
                     <p class="mt-3"> velit sagittis vehicula. Duis posuere 
                        ex in mollis iaculis. Suspendisse tincidunt
                     </p>
                  </div>
                  <div class="col-lg-4 col-md-4 abut-gride">
                     <span class="fas fa-phone-volume"></span>  
                     <h5>Support</h5>
                     <p class="mt-3"> velit sagittis vehicula. Duis posuere 
                        ex in mollis iaculis. Suspendisse tincidunt
                     </p>
                  </div>
                  <div class="col-lg-4 col-md-4 abut-gride">
                     <span class="fas fa-undo"></span>
                     <h5> Return</h5>
                     <p class="mt-3"> velit sagittis vehicula. Duis posuere 
                        ex in mollis iaculis. Suspendisse tincidunt
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--//about -->
      <!--Customers Review -->
    <section class="clients py-lg-4 py-md-3 py-sm-3 py-3" id="clients">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Customers Review</h3>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                     
<?php $ret=mysqli_query($con,"select tblreview.ReviewTitle,tblreview.Review,tblreview.Name,tbltoys.ToyImage1 from tblreview join tbltoys on tbltoys.id=tblreview.ProductID where Status='Review Accept' ORDER BY rand()  limit 2");
while ($result=mysqli_fetch_array($ret)) {
?> 

                        <div class="col-lg-6 clients-w3layouts-row">
                           <div class="least-w3layouts-text-gap">
                              <div class="row">
                                 <div class="col-md-4 col-sm-4 news-img">
                                    <img src="images/user.png" alt="" class="image-fluid">
                                 </div>
                                 <div class="col-md-8 col-sm-8 clients-says-w3layouts">
                                    <h4><?php echo htmlentities($result['Name']);?>
                                    </h4>
                                    <span class="mt-2"><?php echo htmlentities($result['ReviewTitle']);?></span>
                                 </div>
                                 <div class="mt-3 news-agile-text">
                                    <img src="admin/productimages/<?php echo htmlentities($result['ToyImage1']);?>" alt="" class="image-fluid" width="480" height="400">
                                    <p class="mt-3"><span class="fas fa-quote-left"></span>  <?php echo htmlentities($result['Review']);?> <span class="fas fa-quote-right"></span>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
<?php } ?>

         
                     </div>
                  </div>
                  
                  
               </div>
    
            </div>
         </div>
      </section>
      <!--//Customers Review -->
<?php include_once('includes/footer.php');?>
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
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
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->      <!-- //OnScroll-Number-Increase-JavaScript -->
   </body>
</html>