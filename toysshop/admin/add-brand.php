<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

//For Adding categories
if(isset($_POST['submit']))
{
$brandname=$_POST['brandname'];
$description=addslashes($_POST['description']);
$createdby=$_SESSION['aid'];
$sql=mysqli_query($con,"insert into tblbrand(BrandName,BrandDescription,createdBy) values('$brandname','$description','$createdby')");
echo "<script>alert('Brand added successfully');</script>";
echo "<script>window.location.href='add-brand.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Toys Store | Add Brand</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Brand</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Brand</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post">                                
<div class="row">
<div class="col-2">Brand Name</div>
<div class="col-4"><input type="text" placeholder="Enter Brand Name"  name="brandname" class="form-control" required></div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Brand Description</div>
<div class="col-4"><textarea placeholder="Enter Brand Descriptions"  name="description" class="form-control" required></textarea></div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
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
