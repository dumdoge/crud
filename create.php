<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add New Products</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justfiy-content-between my-4">
                <h1>Dock</h1>
        </header>

        <div>
                <a href="index.php" class="btn btn-primary">Back</a>
        </div> 
                
        <form action="process.php" method="post">

          <!--  <div class="form-element my-4">
                <select name="type" id="" class="form-control">
                    <option value=" ">Select Product Type</option>
                    <option value=" ">Computer Hardware</option>
                    <option value=" ">Electronics</option>
                    <option value=" ">Other</option>
                </select>
            </div> -->

            <div class="form-element my-4">
            <input type="text" class="form-control" name="type" placeholder="Type of Product">            
            <div class="form-element my-4">
                <input type="text" class="form-control" name="product" placeholder="Product Name">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="manufacturer" placeholder="Manufacturer">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="location" placeholder="Location Shipped From">
            </div>
            <div class="form-element">
                <input type="submit" name="create" value="Add Product" class="btn btn-primary">
            </div>
        </form>

    </div>
</body>
</html>