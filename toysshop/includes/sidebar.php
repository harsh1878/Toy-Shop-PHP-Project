<div class="side-bar col-lg-3">
                  <div class="search-hotel">
                     <h3 class="agileits-sear-head">Search Here..</h3>
                     <form action="search.php" method="post">
                        <input type="search" type="search" name="search" required="">
                        <input type="submit" value=" ">
                     </form>
                  </div>
                     
                  <!--preference -->
                  <div class="left-side">
                     <h3 class="agileits-sear-head">Category</h3>
                     <ul>
                         <?php $query=mysqli_query($con,"select category.id as catid,category.categoryName from category ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                        <li>
                          
                           <span class="span"><a class="btn btn-primary btn-xs" href="categorywise-toys.php?cid=<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['categoryName']);?></a></span>
                        </li> <?php } ?>
                       
                     </ul>
                  </div>
                  <!-- // preference -->
            
           
                  <!-- deals -->
                  <div class="deal-leftmk left-side">
                     <h3 class="agileits-sear-head">Special Deals</h3>
                      <?php 




    $query=mysqli_query($con,"select tbltoys.id as pid,tbltoys.ToyImage1,tbltoys.ToyName,tbltoys.ToyPriceBeforeDiscount,tbltoys.ToyPriceAfterDiscount from tbltoys order by pid desc limit 10");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  
                       <div class="row special-sec1">
                        <div class="col-xs-4 img-deals">
                           <img src="admin/productimages/<?php echo htmlentities($row['ToyImage1']);?>" alt=""  width="50" height="50">
                        </div>
                        <div class="col-xs-8 img-deal1">
                           <h3><a href="toy-details.php?pid=<?php echo htmlentities($row['pid']);?>"><?php echo htmlentities($row['ToyName']);?></a></h3>
                           <a href="toy-details.php?pid=<?php echo htmlentities($row['pid']);?>">$<?php echo htmlentities($row['ToyPriceAfterDiscount']);?></a>
                        </div>
                        <div class="clearfix"></div>
                     </div><?php } ?>
                   
                 
                  </div>
                  <!-- //deals -->
               </div>