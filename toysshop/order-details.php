<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Toys Shop | Order Details </title>
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
      <!--checkout-->
      <link rel="stylesheet" type="text/css" href="css/checkout.css">
      <!--//checkout-->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
      <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
   </head>
   <body>
      <!--headder-->
<?php include_once('includes/header.php');?>
         <!--//headder-->
         <!-- banner -->
         <div class="inner_page-banner one-img">
         </div>
         <!-- short -->
         <div class="using-border py-3">
            <div class="inner_breadcrumb  ml-4">
               <ul class="short_ls">
                  <li>
                     <a href="index.php">Home</a>
                     <span>/ /</span>
                  </li>
                  <li>Order Details</li>
               </ul>
            </div>
         </div>
         <!-- //short-->
         <!--Checkout-->  
         <!-- //banner -->
         <!-- top Products -->
         <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Order<span>Details</span></h3>
                     <div class="checkout-right">
                        <?php include_once('includes/header.php');?>
 <?php
$uid=$_SESSION['id'];
$orderno=intval($_GET['onumber']);
$ret=mysqli_query($con,"select *,orders.id as orderid from orders 
left join addresses on addresses.id=orders.addressId
    where orders.userId='$uid' and orders.orderNumber='$orderno'");
while ($row=mysqli_fetch_array($ret)) {?>
                        <h4>Orders Detail: <span>(<?php echo intval($_GET['onumber']);?>)</span></h4>

                        <table class="table table-bordered">
                           <tr>
    <th>Order Number</th>
    <td><?php echo htmlentities($row['orderNumber']);?></td>

    <th>Order Date</th>
    <td><?php echo htmlentities($row['orderDate']);?></td>
</tr>
<tr>
    <th>Total Amount</th>
    <td><?php echo htmlentities($row['totalAmount']);?></td>

    <th>Txn Type</th>
    <td><?php echo htmlentities($row['txnType']);?></td>
</tr>
<tr>
    <th>Txn Number</th>
    <td><?php echo htmlentities($row['txnNumber']);?></td>

    <th>Status</th>
    <td><?php $ostatus=$row['orderStatus'];
                    if( $ostatus==''): echo "Not Processed Yet";
                        else: echo $ostatus; endif;?>
                            <br />
<a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo $row['orderid'];?>');" title="Track order"> <strong style="color:red;"> Track order</strong>
</a>

                        </td>
</tr>

<tr>
    <th>Billing Address</th>
    <td><address><?php echo htmlentities($row['billingAddress']);?><br />
<?php echo htmlentities($row['biilingCity']);?>,<?php echo htmlentities($row['billingState']);?><br />
<?php echo htmlentities($row['billingPincode']);?>, <?php echo htmlentities($row['billingCountry']);?>
</address>
    </td>

    <th>Shipping Address</th>
    <td><address><?php echo htmlentities($row['shippingAddress']);?><br />
<?php echo htmlentities($row['shippingCity']);?>,<?php echo htmlentities($row['shippingState']);?><br />
<?php echo htmlentities($row['shippingPincode']);?>, <?php echo htmlentities($row['shippingCountry']);?>
</address>
    </td>
</tr>
<tr><td colspan="2"><a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $row['orderid'];?>');" title="Cancel Order" class="btn-upper btn btn-danger">Canel this Order
</a></td></tr> <?php }?>
                        </table>
                    

<table class="table table-bordered">
          
                <tr>
                    <th colspan="4"><h4>Order Products / Items</h4></th>
                </tr>
          
            <tr>
                <thead>
                    <th>SL No.</th>
                                 <th>Product</th>
                                 <th>Quantity</th>
                                 <th>Product Name</th>
                                 <th>Price</th>
                                 <th>Shipping Charge</th>
                                 <th>Total Amount</th>
                </thead>
            </tr>
            <tbody>
<?php
$ret=mysqli_query($con,"select tbltoys.ToyName as pname,tbltoys.ShippingCharge,tbltoys.ToyName as proid,tbltoys.ToyImage1 as pimage,tbltoys.ToyPriceAfterDiscount as pprice,ordersdetails.productId as pid,ordersdetails.id as cartid,tbltoys.ToyPriceBeforeDiscount,ordersdetails.quantity from ordersdetails left join tbltoys on tbltoys.id=ordersdetails.productId where ordersdetails.userId='$uid'  and ordersdetails.orderNumber='$orderno'");
$cnt=1;
$num=mysqli_num_rows($ret);
    if($num>0)
    {
while ($row=mysqli_fetch_array($ret)) {

?>

               <tr>
                    <td class="invert"><?php echo htmlentities($cnt);?></td>
                                 <td class="invert-image"><a href="toy-details.php?pid=<?php echo htmlentities($row['pid']);?>"><img src="admin/productimages/<?php echo htmlentities($row['pimage']);?>" width="150" height="120" alt=" " class="img-responsive"></a></td>
                                 <td class="invert">
                                    <div class="quantity">
                                       <div class="quantity-select">
                                          
                                          <div class="entry value"><span><?php echo htmlentities($pq=$row['quantity']);?></span></div>
                                          
                                       </div>
                                    </div>
                                 </td>
                                 <td class="invert"><?php echo htmlentities($row['pname']);?></td>
                                 <td class="invert">₹<?php echo htmlentities($pp=$row['pprice']);?></td>
                                  <td class="invert">₹<?php echo htmlentities($sc=$row['ShippingCharge']);?></td>
                                 <td class="invert">₹<?php echo htmlentities($totalamount=$pq*$pp+$sc);?></td>
        
                </tr>
            
                <?php $cnt=$cnt+1;
                $grantotal+=$totalamount; } ?>
<tr>
    <th colspan="4">Grand Total</th>
    <th colspan="2"><?php echo $grantotal;?></th>
</tr>
                <?php } else{ ?>
                <tr>
                    <td style="font-size: 18px; font-weight:bold; color:red;">Invalid Request

                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
                     </div>
               
                  </div>
               </div>
               <!-- //top products -->
            </div>
      </section>
      <!--subscribe-address-->
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
      <!--// cart-js -->
      <!--quantity-->
      <script>
         $('.value-plus').on('click', function () {
         	var divUpd = $(this).parent().find('.value'),
         		newVal = parseInt(divUpd.text(), 10) + 1;
         	divUpd.text(newVal);
         });
         
         $('.value-minus').on('click', function () {
         	var divUpd = $(this).parent().find('.value'),
         		newVal = parseInt(divUpd.text(), 10) - 1;
         	if (newVal >= 1) divUpd.text(newVal);
         });
      </script>
      <!--quantity-->
      <!--closed-->
      <script>
         $(document).ready(function (c) {
         	$('.close1').on('click', function (c) {
         		$('.rem1').fadeOut('slow', function (c) {
         			$('.rem1').remove();
         		});
         	});
         });
      </script>
      <script>
         $(document).ready(function (c) {
         	$('.close2').on('click', function (c) {
         		$('.rem2').fadeOut('slow', function (c) {
         			$('.rem2').remove();
         		});
         	});
         });
      </script>
      <script>
         $(document).ready(function (c) {
         	$('.close3').on('click', function (c) {
         		$('.rem3').fadeOut('slow', function (c) {
         			$('.rem3').remove();
         		});
         	});
         });
      </script>
      <!--//closed-->
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
      <!-- //bootstrap working-->
   </body>
</html><?php } ?>