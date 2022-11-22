<?php

if(!isset($_GET['id'])){
    header('Location: index.php?message=error');
    exit();
}

include_once 'Model/conecction.php';

$id = $_GET['id'];

$query = $bd->prepare("DELETE FROM products WHERE id = ?;");
$result = $query->execute([$id]);

if ($result === TRUE) {
    header('Location: index.php?message=deleted');
    exit();
} else {
    header('Location: index.php?message=error');
    exit();
}

?>