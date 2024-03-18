<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {
//For Adding Products
if(isset($_POST['submit']))
{

    $pid=intval($_GET['id']);
   $category=$_POST['category'];
    $subcat=$_POST['subcategory'];
    $toyname=$_POST['toyname'];
    $brandid=$_POST['brandid'];
    $age=$_POST['age'];
    $battery=$_POST['battery'];
    $materials=$_POST['materials'];
    $prodimension=$_POST['prodimension'];
    $boxdimension=$_POST['boxdimension'];
    $cof=$_POST['cof'];
    $instructions=addslashes($_POST['instructions']);
    $toypricebd=$_POST['toypricebd'];
    $toypricead=$_POST['toypricead'];
    $toydescription=addslashes($_POST['toydescription']);
    $features=addslashes($_POST['features']);
    $toyshippingcharge=$_POST['toyshippingcharge'];
    $toyavailability=$_POST['toyavailability'];
    $updatedby=$_SESSION['aid'];

$sql=mysqli_query($con,"update tbltoys set category='$category',subCategory='$subcat',ToyName='$toyname',Brandid='$brandid',Age='$age',Battery='$battery',Materials='$materials',ProductDimension='$prodimension',BoxDimension='$boxdimension',Countryoforigin='$cof',Instruction='$instructions',ToyPriceBeforeDiscount='$toypricebd',ToyPriceAfterDiscount='$toypricead',ToyDescription='$toydescription',Features='$features',ShippingCharge='$toyshippingcharge',ToyAvailability='$toyavailability',lastUpdatedBy='$updatedby' where id='$pid'");
echo "<script>alert('Product details updated successfully');</script>";
echo "<script>window.location.href='manage-toys.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Toys Store | Edit Toys</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
   <script>
function getSubcat(val) {
    $.ajax({
    type: "POST",
    url: "get_subcat.php",
    data:'cat_id='+val,
    success: function(data){
        $("#subcategory").html(data);
    }
    });
}
</script>   

    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Toys</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Toys</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">


<?php 
$pid=intval($_GET['id']);
$query=mysqli_query($con,"select tbltoys.id as pid,tbltoys.ToyImage1,tbltoys.ToyImage2,tbltoys.ToyImage3,tbltoys.ToyName,category.categoryName,subcategory.subcategoryName as subcatname,tbltoys.postingDate,tblbrand.BrandName,tblbrand.id as bid,tbltoys.updationDate,subcategory.id as subid,tbladmin.username,category.id as catid,tbltoys.Age,tbltoys.Battery,tbltoys.Materials,tbltoys.ProductDimension,tbltoys.BoxDimension,tbltoys.Countryoforigin,tbltoys.Instruction,tbltoys.Features,tbltoys.ToyPriceAfterDiscount,tbltoys.ToyPriceBeforeDiscount,tbltoys.ToyAvailability,tbltoys.ToyDescription,tbltoys.ShippingCharge from tbltoys join subcategory on tbltoys.subCategory=subcategory.id join category on tbltoys.category=category.id join tbladmin on tbladmin.id=tbltoys.addedBy join tblbrand on tbltoys.Brandid=tblbrand.id where  tbltoys.id='$pid' order by pid desc");
while($row=mysqli_fetch_array($query))
{
?>                                 
<form  method="post" enctype="multipart/form-data">                                
<div class="row">
<div class="col-3">Category Name</div>
<div class="col-7">
<select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
<option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['categoryName']);?></option> 
<?php $ret=mysqli_query($con,"select * from category");
while($result=mysqli_fetch_array($ret))
{?>

<option value="<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Sub Category name</div>
<div class="col-7"><select   name="subcategory"  id="subcategory" class="form-control" required>
    <option value="<?php echo htmlentities($row['subid']);?>"><?php echo htmlentities($row['subcatname']);?>
</select>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Toys Name</div>
<div class="col-7"><input type="text"    name="toyname"  value="<?php echo  htmlentities($row['ToyName']);?>" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Brand</div>
<div class="col-7"><select   name="brandid"  id="brandid" class="form-control" required><option value="<?php echo htmlentities($row['bid']);?>"><?php echo htmlentities($row['BrandName']);?></option> 
<?php $query1=mysqli_query($con,"select * from tblbrand");
while($row1=mysqli_fetch_array($query1))
{?>

<option value="<?php echo $row1['id'];?>"><?php echo $row1['BrandName'];?></option><?php } ?>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Age</div>
<div class="col-7"><input type="text"    name="age"  value="<?php echo  htmlentities($row['Age']);?>" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Battery</div>
<div class="col-7">
<?php if($row['Battery']=='Required'){?>

    <input type="radio" name="battery"  value="Required" checked >Required
    <input type="radio" name="battery"  value="Notrequired">Notrequired
<?php } else {?>

    <input type="radio" name="battery"  value="Required" >Required
    <input type="radio" name="battery"  value="Notrequired" checked>Notrequired
<?php } ?>    

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Materials</div>
<div class="col-7"><input type="text"    name="materials"  value="<?php echo  htmlentities($row['Materials']);?>" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Product Dimension</div>
<div class="col-7"><input type="text"    name="prodimension"  value="<?php echo  htmlentities($row['ProductDimension']);?>" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Box Dimension</div>
<div class="col-7"><input type="text"    name="boxdimension"  value="<?php echo  htmlentities($row['BoxDimension']);?>" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Country of Origin</div>
<div class="col-7"><input type="text"    name="cof" value="<?php echo  htmlentities($row['Countryoforigin']);?>" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Instruction(How to Use?)</div>
<div class="col-7"><textarea name="instructions"   class="form-control" required><?php echo  htmlentities($row['Instruction']);?></textarea>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Price Before Discount(MRP)</div>
<div class="col-7"><input type="text"    name="toypricebd"  value="<?php echo  htmlentities($row['ToyPriceBeforeDiscount']);?>" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Price After Discount(Selling Price)</div>
<div class="col-7"><input type="text"    name="toypricead"  value="<?php echo  htmlentities($row['ToyPriceAfterDiscount']);?>" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Description</div>
<div class="col-7"><textarea  name="toydescription"  rows="6" class="form-control"><?php echo  htmlentities($row['ToyDescription']);?></textarea>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Features</div>
<div class="col-7"><textarea name="features" class="form-control" required><?php echo  htmlentities($row['Features']);?></textarea>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Shipping Charge</div>
<div class="col-7"><input type="text"    name="toyshippingcharge"  value="<?php echo  htmlentities($row['ShippingCharge']);?>" class="form-control" required>
</select>
</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-3">Availability</div>
<div class="col-7"><select   name="toyavailability"  id="toyavailability" class="form-control" required>
<?php $pa=$row['ToyAvailability'];
if($pa=='In Stock'):
?>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
<?php else: ?>
<option value="Out of Stock">Out of Stock</option>    
<option value="In Stock">In Stock</option>
<?php endif; ?>
</select>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Toy Featured Image</div>
<div class="col-7"><img src="productimages/<?php echo htmlentities($row['ToyImage1']);?>" width="250"><br />
    <a href="change-image1.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Toy Image 2</div>
<div class="col-7"><img src="productimages/<?php echo htmlentities($row['ToyImage2']);?>" width="250"><br />
    <a href="change-image2.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-3">Toy Image 3</div>
<div class="col-7"><img src="productimages/<?php echo htmlentities($row['ToyImage3']);?>" width="250"><br />
    <a href="change-image3.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>

<div class="row" style="margin-top:1%">
    <div class="col-3">&nbsp;</div>
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
</div>

</form>
      
      <?php } ?>                      </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>
