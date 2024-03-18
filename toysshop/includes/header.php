<div class="header-outs" id="home">
      <div class="header-bar">
         <div class="info-top-grid">
            <div class="info-contact-agile">
               <ul><?php
$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                  <li>
                     <span class="fas fa-phone-volume"></span>
                     <p>+<?php  echo $row['MobileNumber'];?></p>
                  </li>
                  <li>
                     <span class="fas fa-envelope"></span>
                     <p><?php  echo $row['Email'];?></p>
                  </li>
                  <li>
                  </li><?php } ?>
               </ul>
            </div>
         </div>
         <div class="container-fluid">
            <div class="hedder-up row">
               <div class="col-lg-3 col-md-3 logo-head">
                  <h1><a class="navbar-brand" href="index.html">Toys-Shop</a></h1>
               </div>
               <div class="col-lg-5 col-md-6 search-right">
                  <form class="form-inline my-lg-0"  action="search.php" method="post">
                     <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search">
                     <button class="btn" type="submit">Search</button>
                  </form>
               </div>
               <div class="col-lg-4 col-md-3 right-side-cart">
                  <div class="cart-icons">
                     <ul>
                        <?php if($_SESSION['id']==0): ?>
                        <li>
                           <a href="my-wishlist.php"><span class="far fa-heart"><sup>0</sup></span></a>
                        </li>
                        <?php else:
$uid=$_SESSION['id'];
$ret=mysqli_query($con,"select id  from wishlist where userId='$uid'");
$num=mysqli_num_rows($ret);
?><li>
                           <a href="my-wishlist.php"><span class="far fa-heart"><sup><?php echo $num;?></sup></span></a>
                        </li>
                        <?php endif; 
                         if($_SESSION['id']==''){?>
                        <li>
                           <button type="button" data-toggle="modal" data-target="#exampleModal"> <span class="far fa-user" title="Login"></span></button>
                        </li>
                         <li>
                           <button type="button" data-toggle="modal" data-target="#exampleModal1"> <span class="far fa-user" title="Signup/ Registration"></span></button>
                        </li> <?php }
if($_SESSION['id']==0):
?> 
                        <li class="toyscart toyscart2 cart cart box_1">
                       
                              <a href="my-cart.php"><span class="fas fa-cart-arrow-down"><sup>0</sup></span></a>
                              </button>
                          
                        </li>
                        <?php else: 
$uid=$_SESSION['id'];
$ret1=mysqli_query($con,"select id  from cart where cart.userID='$uid' ");
$num1=mysqli_num_rows($ret1);
    ?>
      <li class="toyscart toyscart2 cart cart box_1">
                       
                              <a href="my-cart.php"><span class="fas fa-cart-arrow-down"><sup><?php echo $num1;?></sup></span></a>
                              </button>
                          
                        </li><?php endif; ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
               <ul class="navbar-nav ">
                  <li class="nav-item ">
                     <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a href="about.php" class="nav-link">About</a>
                  </li>
                       </li>
                  <li class="nav-item">
                     <a href="shop.php" class="nav-link">Shop Now</a>
                  </li>
                   <li class="nav-item">
                     <a href="contact.php" class="nav-link">Contact</a>
             
                  <?php if($_SESSION['id']==0):?>
                 <li class="nav-item">
                     <a href="admin/index.php" class="nav-link">Admin</a>
                  </li><?php endif;?>
                    <?php if($_SESSION['id']!=0):?>
     <li class="nav-item">
                     <a href="my-wishlist.php" class="nav-link">Wishlist</a>
                  </li>
                     
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     My Account
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="profile.php">My Profile</a>
                        <a class="nav-link" href="setting.php">Setting</a>
                        <a href="manage-addresses.php" class="nav-link">Manage Addresses</a>
                         <a class="nav-link" href="my-orders.php">Order History</a>
                          <a class="nav-link" href="logout.php">logout</a>
                     </div>
                  </li>
             
                 
                  <?php endif;?> 
               </ul>
            </div>
         </nav>
      </div>
        </div>
      <!--//headder-->