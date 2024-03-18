<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
   header('location:logout.php');
} else {
   if ($_SESSION['address'] == 0):
      echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
   endif;



   //Order details
   if (isset($_POST['submit'])) {
      $orderno = mt_rand(100000000, 999999999);
      $userid = $_SESSION['id'];
      $address = $_SESSION['address'];
      $totalamount = $_SESSION['gtotal'];
      $txntype = $_POST['paymenttype'];
      $txnno = $_POST['txnnumber'];
      $query = mysqli_query($con, "insert into orders(orderNumber,userId,addressId,totalAmount,txnType,txnNumber) values('$orderno','$userid','$address','$totalamount','$txntype','$txnno')");
      if ($query) {

         $sql = "insert into ordersdetails (userId,productId,quantity) select userID,productId,productQty from cart where userID='$userid';";
         $sql .= "update ordersdetails set orderNumber='$orderno' where userId='$userid' and orderNumber is null;";
         $sql .= "delete from  cart where userID='$userid'";
         $result = mysqli_multi_query($con, $sql);
         if ($query) {
            unset($_SESSION['address']);
            unset($_SESSION['gtotal']);
            echo '<script>alert("Your order successfully placed. Order number is "+"' . $orderno . '")</script>';
            echo "<script type='text/javascript'> document.location ='my-orders.php'; </script>";
         }
      } else {
         echo "<script>alert('Something went wrong. Please try again');</script>";
         echo "<script type='text/javascript'> document.location ='payment.php'; </script>";
      }
   }
   ?>
   <!DOCTYPE html>
   <html lang="zxx">

   <head>
      <title>Toys Shop | Contact Us</title>

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
      <?php include_once('includes/header.php'); ?>
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
               <li>Payment</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--contact -->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Payment Details</h3>
            <div class="contact-list-grid d-flex justify-content-center ">
               <form action="#" method="post">
                  <div class="form-group contact-forms">
                     <label>Total Payment</label>
                     <input type="text" name="totalamount" value="<?php echo $_SESSION['gtotal']; ?>" class="form-control"
                        readonly>
                  </div>
                  <script src="https://checkout.razorpay.com/v1/payment-button.js"
                     data-payment_button_id="pl_NOaQBSwVRFJ6XH" async> </script>

                  <div class=" agile-wls-contact-mid">
                     
                     <div class="form-group contact-forms">
                        <label>Payment Type</label>
                        <select class="form-control" name="paymenttype" id="paymenttype" >
           
                       
                        




            

                
                
                
                
                
                        <option value="">Select</option>
                <option value="e-Wallet" a href = "https://rzp.io/i/s3q8KiGjZ">UPI </a></option>
                <option value="Internet Banking" a href = "https://rzp.io/i/s3q8KiGjZ" >Internet Banking </a> </option>
                <option value="Debit/Credit Card" a href = "https://rzp.io/i/s3q8KiGjZ">Debit/Credit Card </a></option>
                <option value="Cash on Delivery">Cash on Delivery (COD)</option>

                
            </select>
                     </div>
                     <div class="form-group contact-forms" id="txnno">
                        <label>Transaction Number</label>
                        <input type="text" name="txnnumber" id="txnnumber" class="form-control" maxlength="50">
                     </div>
                     
                     <button type="submit" class="btn btn-block sent-butnn" name="submit">Submit</button>
                  </div> 
               </form>
            </div>
         </div>
         <!--//contact-map -->


      </section>


      <?php include_once('includes/footer.php'); ?>
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

               for (i = 0, len = items.length; i < len; i++) { }
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
         $(document).ready(function () {
            $('#paymenttype').change(function () {
               if ($('#paymenttype').val() == 'Cash on Delivery') {
                  $('#txnno').hide();
                  jQuery("#txnnumber").prop('required', false);
               } else if ($('#paymenttype').val() == '') {
                  $('#txnno').hide();
                  jQuery("#txnnumber").prop('required', false);
               } else {
                  $('#txnno').show();
                  jQuery("#txnnumber").prop('required', true);
               }
            })
         }) 
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working--> <!-- //OnScroll-Number-Increase-JavaScript -->



   </body>

   </html>
<?php } ?>