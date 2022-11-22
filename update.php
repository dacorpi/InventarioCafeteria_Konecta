<?php include 'Template/header.php'?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?message=error');
        exit();
    }

    include_once 'Model/conecction.php';
    $id = $_GET['id'];

    $query = $bd->prepare("SELECT * FROM products WHERE id = ?;");
    $query->execute([$id]);
    $product = $query->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5 p-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
        <div class="card">
                <div class="card-header text-center">
                    <b>EDICIÓN DE PRODUCTOS</b>
                </div>
                <form class="form-group p-3" method="POST" action="updateProcess.php">
                <div class="form-group row">    
                    <div class="mb-2 col-md-6 form-group">
                        <label for="name" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="name" id="name" required value="<?php echo $product->product_name ?>">
                    </div>
                    <div class="mb-2 mb-2 col-md-6 form-group">
                        <label for="reference" class="form-label">Referencia: </label>
                        <input type="text" class="form-control" name="reference" id="reference" required value="<?php echo $product->reference ?>"> 
                    </div>
                </div>
                <div class="form-group row">  
                    <div class="mb-2 col-md-6 form-group">
                        <label for="price" class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="price" id="price" required value="<?php echo $product->price ?>">
                    </div>
                    <div class="mb-2 col-md-6 form-group">
                        <label for="weigth" class="form-label">Peso: </label>
                        <input type="number" class="form-control" name="weigth" id="weigth" required value="<?php echo $product->weigth ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mb-2 col-md-6 form-group">
                        <label for="category" class="form-label">Categor&iacute;a: </label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="<?php echo $product->category ?>"><?php echo $product->category ?></option>
                            <option value="Bebidas">Bebidas</option>
                            <option value="Comidas">Comidas</option>
                            <option value="Panader&iacute;a">Panader&iacute;a</option>
                            <option value="Ensadalas">Ensaladas</option>
                        </select>
                    </div>
                    <div class="mb-2 col-md-6 form-group">
                        <label for="stock" class="form-label">Stock: </label>
                        <input type="number" class="form-control" name="stock" id="stock" required value="<?php echo $product->stock ?>">
                    </div>
                </div>
                <div class="d-grid p-2">
                    <input type="hidden" name="id" value="<?php echo $product->ID; ?>">
                    <input type="submit" class="btn btn-info m-2" value="Editar">
                    <a class="text-center" href="index.php"><i class="bi bi-box-arrow-left"></i></a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

