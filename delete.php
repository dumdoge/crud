<?php
if (isset($_GET['id'])) {
include("connect.php");
$id = $_GET['id'];
$conn = Connect::getInstance()->getConnection();
$sql = "DELETE FROM loading_dock WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "Product Deleted Successfully!";
    header("Location:index.php");
}else{
    die("Something went wrong");
}
}else{
    echo "Product does not exist";
}
?>