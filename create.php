<?php
    if(empty($_POST["hidden"]) || empty($_POST["name"]) || empty($_POST["reference"]) 
    || empty($_POST["price"]) || empty($_POST["weigth"]) || empty($_POST["category"]) 
    || empty($_POST["stock"]) ){
        echo "¡ERROR! Faltan datos necesarios para crear un producto";
        header('Location: index.php?message=missing');
        exit();
        
    }

    include_once 'Model/conecction.php';
    $product_name = $_POST["name"];
    $reference = $_POST["reference"];
    $price = $_POST["price"];
    $weigth = $_POST["weigth"];
    $category = $_POST["category"];
    $stock = $_POST["stock"];

    $query = $bd->prepare("INSERT INTO products(product_name, reference, price, weigth, category, stock) VALUES (?,?,?,?,?,?);");
    $result = $query->execute([$product_name, $reference, $price, $weigth, $category, $stock]);

    if ($result === TRUE) {
        header('Location: index.php?message=inserted');
        exit();
        
    } else {
        header('Location: index.php?message=noinserted');
        exit();
        
    }
    
?>