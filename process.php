<?php
include "connect.php";

if(isset($_POST['create'])){
    print_r($_POST);
    $conn = Connect::getInstance()->getConnection();
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $product = mysqli_real_escape_string($conn, $_POST["product"]);
    $manufacturer = mysqli_real_escape_string($conn, $_POST["manufacturer"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $sqlInsert = "INSERT INTO loading_dock (type, product, manufacturer, location) VALUES ('$type', '$product', '$manufacturer', '$location')";

    if (mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION['create'] = "Product Added Successfully";
        header("Location:loading_dock.php");
    } else {
        die("Something went wrong");
    }
}

if (isset($_POST["edit"])) {
    $conn = Connect::getInstance()->getConnection();
    $title = mysqli_real_escape_string($conn, $_POST["type"]);
    $type = mysqli_real_escape_string($conn, $_POST["product"]);
    $author = mysqli_real_escape_string($conn, $_POST["manufacturer"]);
    $description = mysqli_real_escape_string($conn, $_POST["location"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE loading_dock SET type = '$type', product = '$product', manufacturer = '$manufacturer', location = '$location' WHERE id= '$id' ";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Product Updated Successfully!";
        header("Location:loading_dock.php");
    }else{
        die("Something went wrong");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        $product = $_POST['product'];
        $manufacturer = $_POST['manufacturer'];
        $type = $_POST['type'];
        $description = $_POST['description'];
    
        $sql = "UPDATE loading_dock SET product = '$product', manufacturer = '$manufacturer', type = '$type', location = '$description' WHERE id = '$id'";
        $conn = Connect::getInstance()->getConnection();
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            header("Location: loading_dock.php");
            exit;
        } else {
            echo "Error updating product: " . mysqli_error($conn);
        }
    }
}


?>