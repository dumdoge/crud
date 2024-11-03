<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Product Details</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Edit Product</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php 
            
            if (isset($_GET['id'])) {
                include("connect.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM loading_dock WHERE id='$id'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                     <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="product" placeholder="Product Name:" value="<?php echo $row["product"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="manufacturer" placeholder="Manufacturer:" value="<?php echo $row["manufacturer"]; ?>">
            </div>

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="type" placeholder="Product Type:" value="<?php echo $row["type"]; ?>">
            </div>
            
            <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Location:"><?php echo $row["location"]; ?></textarea>
            </div>
                
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit Product" class="btn btn-primary">
            </div>
                <?php
            }else{
                echo "<h3>Product Does Not Exist</h3>";
            }
            ?>
           
        </form>
        
        
    </div>
</body>
</html>