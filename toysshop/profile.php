<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

//For updating User  Profile
if(isset($_POST['update']))
{
$name=$_POST['fullname'];
$uid=$_SESSION['id'];
$contactno=$_POST['contactnumber'];
$query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='$uid'");
if($query)
{
    echo "<script>alert('Profile Updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='profile.php'; </script>";
}else{
echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script type='text/javascript'> document.location ='profile.php'; </script>";
} }
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Toys Shop  | Profile</title>
     
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
                  <span>/ /</span>
               </li>
               <li>Profile</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--contact -->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <?php 
$uid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$uid'");
while($result=mysqli_fetch_array($query)){

?>
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3"><?php echo htmlentities($result['name']);?>'s Profile</h3>
            <div class="contact-list-grid">
               <form action="#" method="post">

                  <div class=" agile-wls-contact-mid">
                     <div class="form-group contact-forms">
                        <label>Full Name</label>
                        <input type="text" name="fullname" value="<?php echo htmlentities($result['name']);?>" class="form-control" required>
                     </div>
                     <div class="form-group contact-forms">
                        <label>Email Id</label>
                        <input type="email" name="emailid" id="emailid" class="form-control" value="<?php echo htmlentities($result['email']);?>" readonly>
                     </div>
                     <div class="form-group contact-forms">
                        <label>Contact Number</label>
                        <input type="text" name="contactnumber" value="<?php echo htmlentities($result['contactno']);?>" pattern="[0-9]{10}" title="10 numeric characters only" class="form-control" required>
                     </div>
                    <?php } ?>
                     <button type="submit" class="btn btn-block sent-butnn" name="update">Update</button>
                  </div>
               </form>
            </div>
         </div>
         <!--//contact-map -->
      </section>
     

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
      <script type="text/javascript">

  //For report file
  $('#txnno').hide();
  $(document).ready(function(){
  $('#paymenttype').change(function(){
  if($('#paymenttype').val()=='Cash on Delivery')
  {
  $('#txnno').hide();
    jQuery("#txnnumber").prop('required',false);  
  } else if($('#paymenttype').val()==''){
      $('#txnno').hide();
        jQuery("#txnnumber").prop('required',false);  
  } else{
    $('#txnno').show();
  jQuery("#txnnumber").prop('required',true);  
  }
})}) 
</script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->      <!-- //OnScroll-Number-Increase-JavaScript -->
   </body>
</html><?php } ?>