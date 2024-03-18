<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

if(isset($_GET['del']))
{
mysqli_query($con,"delete from tbltoys where id = '".$_GET['id']."'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-toys.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
 
        <title>Toys Store | Manage Toys</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Toys</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Toys</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                             Manage Toys Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Toy Name</th>
                                            <th>Brand Name</th>
                                            <th>Sub Category</th>
                                            <th>Category</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Toy Name</th>
                                            <th>Brand Name</th>
                                            <th>Sub Category</th>
                                            <th>Category</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select tbltoys.id as pid,tbltoys.ToyImage1,tbltoys.ToyName,category.categoryName,subcategory.subcategoryName as subcatname,tblbrand.BrandName,tbltoys.postingDate,tbltoys.updationDate,subcategory.id as subid,tbladmin.username from tbltoys join subcategory on tbltoys.subCategory=subcategory.id join category on tbltoys.category=category.id join tbladmin on tbladmin.id=tbltoys.addedBy join tblbrand on tbltoys.Brandid=tblbrand.id order by pid desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                                <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><img src="productimages/<?php echo htmlentities($row['ToyImage1']);?>" width="120">

                                                <?php echo htmlentities($row['ToyName']);?></td>

                                            <td><?php echo htmlentities($row['BrandName']);?></td>
                                            <td><?php echo htmlentities($row['categoryName']);?></td>
                                            <td><?php echo htmlentities($row['subcatname']);?></td>
                                            <td><?php echo htmlentities($row['postingDate']);?></td>
                                            <td><?php echo htmlentities($row['updationDate']);?></td>
                                            <td><?php echo htmlentities($row['username']);?></td>
                                            <td>
                                            <a href="edit-toy.php?id=<?php echo $row['pid']?>"><i class="fas fa-edit"></i></a> | 
                                            <a href="manage-toys.php?id=<?php echo $row['pid']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
