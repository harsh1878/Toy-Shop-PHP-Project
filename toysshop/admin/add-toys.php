<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

//For Adding Products
if(isset($_POST['submit']))
{
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
    $toyimage1=$_FILES["toyimage1"]["name"];
    $toyimage2=$_FILES["toyimage2"]["name"];
    $toyimage3=$_FILES["toyimage3"]["name"];
$extension1 = substr($toyimage1,strlen($toyimage1)-4,strlen($toyimage1));
$extension2 = substr($toyimage2,strlen($toyimage2)-4,strlen($toyimage2));
$extension3 = substr($toyimage3,strlen($toyimage3)-4,strlen($toyimage3));
//Renaming the  image file
$imgnewfile1=md5($toyimage1.time()).$extension1;
$imgnewfile2=md5($toyimage2.time()).$extension2;
$imgnewfile3=md5($toyimage3.time()).$extension3;
$addedby=$_SESSION['aid'];


    move_uploaded_file($_FILES["toyimage1"]["tmp_name"],"productimages/".$imgnewfile1);
    move_uploaded_file($_FILES["toyimage2"]["tmp_name"],"productimages/".$imgnewfile2);
    move_uploaded_file($_FILES["toyimage3"]["tmp_name"],"productimages/".$imgnewfile3);
    
$sql=mysqli_query($con,"insert into tbltoys(Category,SubCategory,ToyName,Brandid,Age,Battery,Materials,ProductDimension,BoxDimension,Countryoforigin,Instruction,ToyPriceBeforeDiscount,ToyPriceAfterDiscount,ToyDescription,Features,ShippingCharge,ToyAvailability,ToyImage1,ToyImage2,ToyImage3,addedBy) values('$category','$subcat','$toyname','$brandid','$age','$battery','$materials','$prodimension','$boxdimension','$cof','$instructions','$toypricebd','$toypricead','toydescription','$features','$toyshippingcharge','$toyavailability','$imgnewfile1','$imgnewfile2','$imgnewfile3','$addedby')");
if($sql){
echo "<script>alert('toy added successfully');</script>";
echo "<script>window.location.href='add-toys.php'</script>";
} else{
echo "<script>alert('Some thing went wrong Please try again');</script>";
    echo "<script type='text/javascript'> document.location ='add-toys.php'; </script>";   
}
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Toys Store | Add Toys</title>
  <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script> 
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
                        <h1 class="mt-4">Add Toy</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Toy</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" enctype="multipart/form-data">                                
<div class="row">
<div class="col-3">Category Name</div>
<div class="col-7">
<select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Sub Category name</div>
<div class="col-7"><select   name="subcategory"  id="subcategory" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Toys Name</div>
<div class="col-7"><input type="text"    name="toyname"  placeholder="Enter Toy Name" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Brand</div>
<div class="col-7"><select   name="brandid"  id="brandid" class="form-control" required><option value="">Select Brand</option> 
<?php $query=mysqli_query($con,"select * from tblbrand");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['BrandName'];?></option><?php } ?>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Age</div>
<div class="col-7"><input type="text"    name="age"  placeholder="Enter Age" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Battery</div>
<div class="col-7"><input type="radio" name="battery"  value="Required">Required<input type="radio" name="battery"  value="Notrequired">Notrequired

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Materials</div>
<div class="col-7"><input type="text"    name="materials"  placeholder="Enter Material of Toys" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Product Dimension</div>
<div class="col-7"><input type="text"    name="prodimension"  placeholder="Product Dimension" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Box Dimension</div>
<div class="col-7"><input type="text"    name="boxdimension"  placeholder="Box Dimension" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Country of Origin</div>
<div class="col-7"><input type="text"    name="cof"  placeholder="Country of Origin" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Instruction(How to Use?)</div>
<div class="col-7"><textarea name="instructions"  placeholder="How to Use?" class="form-control" required></textarea>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Price Before Discount(MRP)</div>
<div class="col-7"><input type="text"    name="toypricebd"  placeholder="Enter toy Price" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Price After Discount(Selling Price)</div>
<div class="col-7"><input type="text"    name="toypricead"  placeholder="Enter toy Price" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Description</div>
<div class="col-7"><textarea  name="toydescription"  placeholder="Enter toy Description" rows="6" class="form-control"></textarea>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Features</div>
<div class="col-7"><textarea name="features"  placeholder="Product Features" class="form-control" required></textarea>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3">Shipping Charge</div>
<div class="col-7"><input type="text"    name="toyshippingcharge"  placeholder="Enter toy Shipping Charge" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Availability</div>
<div class="col-7"><select   name="toyavailability"  id="toyavailability" class="form-control" required>
<option value="">Select</option>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
</select>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Toy Featured Image</div>
<div class="col-7"><input type="file" name="toyimage1" id="toyimage1"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">Toy Image 2</div>
<div class="col-7"><input type="file" name="toyimage2"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-3">Toy Image 3</div>
<div class="col-7"><input type="file" name="toyimage3"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>

<div class="row" style="margin-top:1%">
    <div class="col-3">&nbsp;</div>
<div class="col-3"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
</div>

</form>
                            </div>
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
