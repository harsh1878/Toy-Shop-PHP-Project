<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {
//For Adding Products
if(isset($_POST['submit']))
{
$currentimage=$_POST['currentimage'];
$imagepath="productimages"."/".$currentimage;
$Toyimage3=$_FILES["Toyimage3"]["name"];
$extension1 = substr($Toyimage3,strlen($Toyimage3)-4,strlen($Toyimage3));
//Renaming the  image file
$imgnewfile=md5($Toyimage3.time()).$extension1;
move_uploaded_file($_FILES["Toyimage3"]["tmp_name"],"productimages/".$imgnewfile);
$updatedby=$_SESSION['aid'];
$pid=intval($_GET['id']);
$sql=mysqli_query($con,"update tbltoys set ToyImage3='$imgnewfile', lastUpdatedBy='$updatedby' where id='$pid'");
unlink($imagepath);
echo "<script>alert('Toy image updated successfully');</script>";
echo "<script>window.location.href='manage-Toys.php'</script>";
}








?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Toys Store | Update Image</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>   

    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Image</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Image</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">


<?php 
$pid=intval($_GET['id']);
$query=mysqli_query($con,"select tbltoys.ToyImage3,tbltoys.ToyName from tbltoys  where  tbltoys.id='$pid' ");
while($row=mysqli_fetch_array($query))
{
?>                                 
<form  method="post" enctype="multipart/form-data">                                

<input type="hidden" name="currentimage" value="<?php echo htmlentities($row['ToyImage3']);?>">
<div class="row" style="margin-top:1%;">
<div class="col-3">Toy Name</div>
<div class="col-4"><input type="text"    name="ToyName"  value="<?php echo htmlentities($row['ToyName']);?>" class="form-control" required>
</select>
</div>
</div>



<div class="row" style="margin-top:1%;">
<div class="col-3">Old Toy Image</div>
<div class="col-4"><img src="productimages/<?php echo htmlentities($row['ToyImage3']);?>" width="350"><br />
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3">New Toy Image</div>
<div class="col-4"><input type="file" name="Toyimage3" id="Toyimage3"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>


<div class="row">
<div class="col-3"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
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
