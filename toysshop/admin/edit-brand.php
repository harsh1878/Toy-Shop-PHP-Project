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

$id=intval($_GET['id']);

$sql=mysqli_query($con,"update tblbrand set BrandName='$brandname',BrandDescription='$description' where id='$id'");
echo "<script>alert('Brand updated successfully');</script>";
echo "<script>window.location.href='manage-brand.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Toys Store | Update Brand</title>
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
                        <h1 class="mt-4">Update Brand</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Brand</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from tblbrand where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<form  method="post">                                
<div class="row">
<div class="col-2">Brand Name</div>
<div class="col-4"><input type="text" value="<?php echo  htmlentities($row['BrandName']);?>"  name="brandname" class="form-control" required></div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Brand Description</div>
<div class="col-4"><textarea name="description" class="form-control" required><?php echo  htmlentities($row['BrandDescription']);?></textarea></div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
</div>

</form><?php } ?>
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
