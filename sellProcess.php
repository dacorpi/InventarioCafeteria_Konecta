<?php

if(!isset($_POST['id'])){
    header('Location: index.php?message=error');
    exit();
}

include_once 'Model/conecction.php';


$id = $_POST['id'];
$product_name = $_POST['name'];
$stock = (($_POST['stock'])-1);

$query = $bd->prepare("UPDATE products SET stock = ? WHERE id = ?;");
$result = $query->execute([$stock, $id]);

if ($result === TRUE) {
    $consulta = $bd->prepare("INSERT INTO sell(id_producto_vendido, nombre_producto) VALUES (?,?);");
    $resultado = $consulta->execute([$id, $product_name]);
    header('Location: index.php?message=selled');
    exit();
} else {
    header('Location: index.php?message=error');
    exit();
}
?>