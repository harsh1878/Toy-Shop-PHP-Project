<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

// For Address Insertion
if(isset($_POST['submit'])){
$uid=$_SESSION['id'];    
//Getting Post Values
$baddress=$_POST['baddress'];
$bcity=$_POST['bcity'];
$bstate=$_POST['bstate'];
$bpincode=$_POST['bpincode'];
$bcountry=$_POST['bcountry'];
$saddress=$_POST['saddress'];
$scity=$_POST['scity'];
$sstate=$_POST['sstate'];
$spincode=$_POST['spincode'];
$scountry=$_POST['scountry'];

$sql=mysqli_query($con,"insert into addresses(userId,billingAddress,biilingCity,billingState,billingPincode,billingCountry,shippingAddress,shippingCity,shippingState,shippingPincode,shippingCountry) values('$uid','$baddress','$bcity','$bstate','$bpincode','$bcountry','$saddress','$scity','$sstate','$spincode','$scountry')");
if($sql)
{
    echo "<script>alert('You Address added successfully');</script>";
    echo "<script type='text/javascript'> document.location ='manage-addresses.php'; </script>";
}
else{
echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script type='text/javascript'> document.location ='manage-addresses.php'; </script>";
}
}

?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Toys Shop  | Manage Address</title>
      
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
                  <li>Address</li>
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
                    
                   
                     <h4 style="color:blue">Already Listed Addresses</h4>
<?php 
$uid=$_SESSION['id'];
$query=mysqli_query($con,"select * from addresses where userId='$uid'");
$count=mysqli_num_rows($query);
if($count==0):
echo "<font color='red'>No addresses Found.</font>";
else:
 ?>
 <form method="post">
    <input type="hidden" name="grandtotal" value="<?php echo $grantotal; ?>">
<div class="row">
<div class="col-6">
      <table class="table">
            <thead>
                <tr>
                    <th colspan="4"><h5>Billing Address</h5></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th>#</th>
                    <th width="250">Adresss</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Pincode</th>
                    <th>Country</th>
            
                </thead>
            </tr>
            </table>  

</div>
<div class="col-6">
          <table class="table">
            <thead>
                <tr>
                    <th colspan="4"><h5>Shipping Address</h5></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th width="250">Adresss</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Pincode</th>
                    <th>Country</th>
            
                </thead>
            </tr>
            </tbody>
            </table> 
</div>
</div>
<!-- Fecthing Values-->
<?php while ($result=mysqli_fetch_array($query)) { ?>
<div class="row">
<div class="col-6">
      <table class="table">

            <tbody> 

                <tr>
                    <td><input type="radio" name="selectedaddress" value="<?php echo $result['id'];?>" required></td>
                    <td width="250"><?php echo $result['billingAddress'];?></td>
                    <td><?php echo $result['biilingCity'];?></td>
                    <td><?php echo $result['billingState'];?></td>
                    <td><?php echo $result['billingPincode'];?></td>
                    <td><?php echo $result['billingCountry'];?></td>
                </tr>
            </tbody>
            </table>  

</div>
<div class="col-6">
          <table class="table">
            <tbody> 
                <tr>
                    <td width="250"><?php echo $result['shippingAddress'];?></td>
                    <td><?php echo $result['shippingCity'];?></td>
                    <td><?php echo $result['shippingState'];?></td>
                    <td><?php echo $result['shippingPincode'];?></td>
                    <td><?php echo $result['shippingCountry'];?></td>
                </tr>
            </tbody>
            </table> 
</div>
</div>


<?php } endif;?>

</form>
                     <div class="checkout-left">
                        <form method="post" name="address" class="creditly-card-form agileinfo_form">
                        <div class="col-md-6 checkout-left-basket">
                           <h4>New Shipping Address</h4>
                           
                        
                               <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">
                                    <div class="first-row form-group">
                                       <div class="controls">
                                          <label class="control-label">Address: </label>
                                          
                                          <input type="text" name="saddress"  id="saddress" class="form-control" required >
                                       </div>
                                       <div class="card_number_grids">
                                          <div class="card_number_grid_left">
                                             <div class="controls">
                                                <label class="control-label">City:</label>
                                                <input type="text" name="scity" id="scity" class="form-control" required>
                                             </div>
                                          </div>
                                          <div class="card_number_grid_right">
                                             <div class="controls">
                                                <label class="control-label">State: </label>
                                                <input type="text" name="sstate" id="sstate" class="form-control" required>
                                             </div>
                                          </div>
                                          <div class="clear"> </div>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Pincode: </label>
                                          <input type="text" name="spincode" id="spincode" pattern="[0-9]+" title="only numbers" maxlength="6" class="form-control" required>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Country: </label>
                                         <input type="text" name="scountry" id="scountry" class="form-control" required>
                                       </div>
                                    </div>
                                    
                                 </div>
                                 <input type="checkbox" name="adcheck" value="1"/> <small>Shipping Adress same as billing Address</small>
                              </section>
                           
                        </div>
                        <div class="col-md-6 checkout-left-basket">
                           <h4>A New Billing Address</h4>
                           
                              <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">
                                    <div class="first-row form-group">
                                       <div class="controls">
                                          <label class="control-label">Address: </label>
                                          
                                          <input type="text" name="baddress" id="baddress" class="billing-address-name form-control" required >
                                       </div>
                                       <div class="card_number_grids">
                                          <div class="card_number_grid_left">
                                             <div class="controls">
                                                <label class="control-label">City:</label>
                                                <input class="form-control" type="text" name="bcity" id="bcity">
                                             </div>
                                          </div>
                                          <div class="card_number_grid_right">
                                             <div class="controls">
                                                <label class="control-label">State: </label>
                                                <input type="text" name="bstate" id="bstate" class="form-control" required>
                                             </div>
                                          </div>
                                          <div class="clear"> </div>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Pincode: </label>
                                          <input type="text" name="bpincode" id="bpincode" pattern="[0-9]+" title="only numbers" maxlength="6" class="form-control" required>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Country: </label>
                                         <input type="text" name="bcountry" id="bcountry" class="form-control" required>
                                       </div>
                                    </div>
                                   
                                 </div>
                              </section>
                           
                           <div class="checkout-center-basket">
                              <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Add" required>
                           </div></form>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="clearfix"></div>
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
 
       <script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#baddress').val($('#saddress').val() );
                $('#bcity').val($('#scity').val());
                $('#bstate').val($('#sstate').val());
                $('#bpincode').val( $('#spincode').val());
                  $('#bcountry').val($('#scountry').val() );
            } 
            
        });
    });
</script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->
   </body>
</html><?php } ?> 