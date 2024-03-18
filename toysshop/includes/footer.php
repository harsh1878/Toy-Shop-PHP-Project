 <?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['subscribe']))
{

$email=$_POST['emailid'];

$sql=mysqli_query($con,"select id from tblsubscriber where Email='$email'");
$count=mysqli_num_rows($sql);
if($count==0){
$query=mysqli_query($con,"insert into tblsubscriber(Email) values('$email')");
if($query)
{
    echo "<script>alert('You are successfully subscribe with us');</script>";
    echo "<script type='text/javascript'> document.location ='about.php'; </script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
    echo "<script type='text/javascript'> document.location ='about.php'; </script>";
} } else{
 echo "<script>alert('Email id already subcribe with other user. Please try  with another email id.');</script>";
    echo "<script type='text/javascript'> document.location ='about.php'; </script>";   
}}
if(isset($_POST['login']))
{
   $email=$_POST['emailid'];
   $password=md5($_POST['inputuserpwd']);
$query=mysqli_query($con,"SELECT id,name FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
//If Login Suceesfull
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
echo "<script type='text/javascript'> document.location ='about.php'; </script>";
}
//If Login Failed
else{
    echo "<script>alert('Invalid login details');</script>";
    echo "<script type='text/javascript'> document.location ='about.php'; </script>";
exit();
}
}

// Sign up
if(isset($_POST['signup']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactnumber'];
$password=md5($_POST['inputuserpwd']);
$sql=mysqli_query($con,"select id from users where email='$email'");
$count=mysqli_num_rows($sql);
if($count==0){
$query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
if($query)
{
    echo "<script>alert('You are successfully register');</script>";
    echo "<script type='text/javascript'> document.location ='about.php'; </script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
    echo "<script type='text/javascript'> document.location ='about.php'; </script>";
} } else{
 echo "<script>alert('Email id already registered with another accout. Please try  with another email id.');</script>";
    echo "<script type='text/javascript'> document.location ='about.php'; </script>";   
}}

if(isset($_POST['pass']))
{
$emailid=$_POST['emailid'];
$cnumber=$_POST['contactno'];
$newpassword=md5($_POST['inputPassword']);
$ret=mysqli_query($con,"SELECT id FROM users WHERE email='$emailid' and contactno='$cnumber'");
$num=mysqli_num_rows($ret);
if($num>0)
{
$query=mysqli_query($con,"update users set password='$newpassword' WHERE  email='$emailid' and contactno='$cnumber'");

echo "<script>alert('Password reset successfully.');</script>";
echo "<script type='text/javascript'> document.location ='about.php'; </script>";
}else{
echo "<script>alert('Invalid username or Contact Number');</script>";
echo "<script type='text/javascript'> document.location ='about.php'; </script>";
}
}

?>
      <!--subscribe-address-->
      <section class="subscribe">
         <div class="container-fluid">
         <div class="row">

            <div class="col-lg-12 col-md-6 address-w3l-right text-center">
                <?php
$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
               <div class="address-gried ">
                  <span class="far fa-map"></span>
                  <p><?php  echo $row['PageDescription'];?>
                  <p>
               </div>
               <div class="address-gried mt-3">
                  <span class="fas fa-phone-volume"></span>
                  <p> +<?php  echo $row['MobileNumber'];?></p>
               </div>
               <div class=" address-gried mt-3">
                  <span class="far fa-envelope"></span>
                  <p><?php  echo $row['Email'];?>
                     
                  </p>
               </div><?php } ?>
            </div>
         </div>
         </div>
      </section>
      <!--//subscribe-address-->
      <section class="sub-below-address py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Get In Touch Us</h3>

            <div class="email-sub-agile">
               <form action="#" method="post">
                  <div class="form-group sub-info-mail">
                     <input type="email" class="form-control email-sub-agile" placeholder="Email" name="emailid">
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn subscrib-btnn" name="subscribe">Subscribe</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!--//subscribe-->
      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
            <p> 
               Toys Shop
            </p>
         </div>
      </footer>
      <!-- //footer -->
      <!-- Modal 1-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form method="post" name="login">
                        <div class="fields-grid">
                           
                           <div class="styled-input">
                              
                              <input type="email" placeholder="Your Email" name="emailid" id="emailid" onBlur="emailAvailability()" required>
                           </div>
                          

                           <div class="styled-input">
                            
                              <input type="password" placeholder="password" name="inputuserpwd" required>
                           </div>
                           <button type="submit" class="btn subscrib-btnn" name="login" id="login">Login</button>
                        </div>
                     </form>
                 
                     <button type="button" data-toggle="modal"  class="btn subscrib-btnn" data-target="#exampleModal2"> Forgot Password</button>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- //Modal 1-->
      <!-- Modal 2-->
      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Signup</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form method="post" name="signup">
                        <div class="fields-grid">
                           <div class="styled-input">
                              
                              <input type="text" placeholder="Enter Your Name" name="fullname" required>
                           </div>
                           
                           <div class="styled-input">
                              
                              <input type="email" placeholder="Your Email" name="emailid" id="emailid" onBlur="emailAvailability()" required>
                           </div>
                            <div class="styled-input">
                              
                              <input type="text" placeholder="Contact Number" name="contactnumber" pattern="[0-9]{10}" title="10 numeric characters only" required>
                           </div>
                           <div class="styled-input">
                            
                              <input type="password" placeholder="password" name="inputuserpwd" required>
                           </div>
                           <button type="submit" class="btn subscrib-btnn" name="signup" id="signup">Register</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- //Modal 2-->
       <!-- Modal 3-->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form method="post" name="passwordrecovery" onSubmit="return valid();">
                        <div class="fields-grid">
                           <div class="styled-input">
                              
                              <label>Email Id</label>
                     <input type="email" name="emailid" id="emailid"  onBlur="emailAvailability()" required>
                           </div>
                           
                           <div class="styled-input">
                              
                              <label>Contact No</label>
                      <input id="contactno" name="contactno" type="text" required />
                           </div>
                            <div class="styled-input">
                              
                              <label>New Password</label>
                      <input id="inputPassword" name="inputPassword" type="password" required />
                           </div>
                           <div class="styled-input">
                            
                              <label>Confirm Password</label>
                     <input  id="cinputPassword" name="cinputPassword" type="password" required />
                      <small><a href="about.php">Signin</a></small>
                           </div>
                           <button type="submit" class="btn subscrib-btnn" name="pass" id="pass">Reset</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <script>
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-email-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
 if(document.passwordrecovery.inputPassword.value!= document.passwordrecovery.cinputPassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.passwordrecovery.cinputPassword.focus();
return false;
}
return true;
}
</script>