<?php

if(!isset($_POST['id'])){
    header('Location: index.php?message=error');
    exit();
}

include_once 'Model/conecction.php';

$id = $_POST['id'];
$product_name = $_POST['name'];
$reference = $_POST['reference'];
$price = $_POST['price'];
$weigth = $_POST['weigth'];
$category = $_POST['category'];
$stock = $_POST['stock'];

$query = $bd->prepare("UPDATE products SET product_name = ?, reference = ?, price = ?, weigth = ?, category = ?,
                      stock = ? WHERE id = ?;");
$result = $query->execute([$product_name, $reference, $price, $weigth, $category, $stock, $id]);

if ($result === TRUE) {
    header('Location: index.php?message=updated');
    exit();
} else {
    header('Location: index.php?message=error');
    exit();
}


?>