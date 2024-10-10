<?php
include "connect.php";

if(isset($_POST['create'])){
    echo "Form data received:";
    print_r($_POST);

    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $product = mysqli_real_escape_string($conn, $_POST["product"]);
    $manufacturer = mysqli_real_escape_string($conn, $_POST["manufacturer"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $sqlInsert = "INSERT INTO loading_dock (type, product, manufacturer, location) VALUES ('$type', '$product', '$manufacturer', '$location')";

    if (mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION['create'] = "Product Added Successfully";
    } else {
        die("Something went wrong");
    }
}

?>