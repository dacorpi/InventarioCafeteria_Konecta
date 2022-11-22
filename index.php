<?php include 'Template/header.php'?>

<?php
    include_once 'Model/conecction.php';

    $query = $bd -> query("SELECT * FROM products");
    $product = $query->fetchAll(PDO::FETCH_OBJ);
    //print_r($product);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <!--Inicio Alert - Error -->
            <?php
                if(isset($_GET['message']) and $_GET['message'] == 'error'){

            ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>¡ERROR!</strong> Ha ocurrido un error con el producto.
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>

            <?php
                }
            ?>
            <!--Fin Alert - Error -->

            <!--Inicio Alert - Deleted -->
            <?php
                if(isset($_GET['message']) and $_GET['message'] == 'deleted'){

            ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>¡BIEN!</strong> Ha eliminado exitosamente el producto.
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>

            <?php
                }
            ?>
            <!--Fin Alert - Deleted -->

            <!--Inicio Alert - Inserted -->
            <?php
                if(isset($_GET['message']) and $_GET['message'] == 'inserted'){

            ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>¡BIEN!</strong> Se ha creado el producto.
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>

            <?php
                }
            ?>
            <!--Fin Alert - Inserted -->

            <!--Inicio Alert - Updated -->
            <?php
                if(isset($_GET['message']) and $_GET['message'] == 'updated'){

            ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>¡BIEN!</strong> Se ha actualizado el producto.
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>

            <?php
                }
            ?>
            <!--Fin Alert - Updated -->

            <div class="card">
                <div class="card-header text-center">
                    <b>PRODUCTOS</b>                    
                </div>
                <div class="p-3">
                        <table class="table text-center">
                            <thead class="align-middle">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Referencia</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Peso</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col" colspan="1">Fecha de Creación</th>
                                    <th scope="col" colspan="2">Opciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($product as $dato){
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->ID;?></td>
                                    <td><?php echo $dato->product_name;?></td>
                                    <td ><?php echo $dato->reference;?></td>
                                    <td><?php echo "$". $dato->price;?></td>
                                    <td><?php echo $dato->weigth. "g";?></td>
                                    <td><?php echo $dato->category;?></td>
                                    <td><?php echo $dato->stock;?></td>
                                    <td><?php echo $dato->creation_date;?></td>
                                    <td><a class="text-info" href="update.php?id=<?php echo $dato->ID;?>"><i class="
                                    bi bi-pencil-fill"></a></i></td>
                                    <td><a class="text-danger" href="delete.php?id=<?php echo $dato->ID;?>"><i class="
                                    bi bi-trash3-fill"></i></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>                    
                </div>
            </div>
        </div>
        <div class="col-md-4 p-4">
            <!--Inicio Alert - Missing -->
            <?php
                if(isset($_GET['message']) and $_GET['message'] == 'missing'){

            ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>¡ERROR!</strong> Faltan algunos campos necesarios para crear el producto.
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>

            <?php
                }
            ?>
            <!--Fin Alert - Missing -->

            


            <div class="card">
                <div class="card-header text-center">
                    <b>CREACIÓN DE PRODUCTOS</b>
                </div>
                <form class="form-group p-3" method="POST" action="create.php">
                <div class="form-group row">    
                    <div class="mb-2 col-md-6 form-group">
                        <label for="name" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-2 mb-2 col-md-6 form-group">
                        <label for="reference" class="form-label">Referencia: </label>
                        <input type="text" class="form-control" name="reference" id="reference" required> 
                    </div>
                </div>
                <div class="form-group row">  
                    <div class="mb-2 col-md-6 form-group">
                        <label for="price" class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div>
                    <div class="mb-2 col-md-6 form-group">
                        <label for="weigth" class="form-label">Peso: </label>
                        <input type="number" class="form-control" name="weigth" id="weigth" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mb-2 col-md-6 form-group">
                        <label for="category" class="form-label">Categor&iacute;a: </label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="" disabled selected>Selecciona</option>
                            <option value="Bebidas">Bebidas</option>
                            <option value="Comidas">Comidas</option>
                            <option value="Panader&iacute;a">Panader&iacute;a</option>
                            <option value="Ensadalas">Ensaladas</option>
                        </select>    
                    </div>
                    <div class="mb-2 col-md-6 form-group">
                        <label for="stock" class="form-label">Stock: </label>
                        <input type="number" class="form-control" name="stock" id="stock" required>
                    </div>
                </div>
                <div class="d-grid p-2">
                    <input type="hidden" name="hidden" value="1">
                    <input type="submit" class="btn btn-info" value="Crear">
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 p-4">
            <div class="card">
                <div class="card-header text-center">
                    <b>VENTA DE PRODUCTOS</b>
                </div>
                <form action="" class="form-group p-3" method="POST" action="create.php">
                <div class="form-group row">    
                    <div class="mb-2 col-md-6 form-group">
                        <label for="name" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-2 mb-2 col-md-6 form-group">
                        <label for="reference" class="form-label">Referencia: </label>
                        <input type="text" class="form-control" name="reference" id="reference">
                    </div>
                </div>
                <div class="form-group row">  
                    <div class="mb-2 col-md-6 form-group">
                        <label for="price" class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                    <div class="mb-2 col-md-6 form-group">
                        <label for="weigth" class="form-label">Peso: </label>
                        <input type="number" class="form-control" name="weigth" id="weigth">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mb-2 col-md-6 form-group">
                        <label for="category" class="form-label">Categor&iacute;a: </label>
                        <input type="text" class="form-control" name="category" id="category">
                    </div>
                    <div class="mb-2 col-md-6 form-group">
                        <label for="stock" class="form-label">Stock: </label>
                        <input type="number" class="form-control" name="stock" id="stock">
                    </div>
                </div>
                <div class="d-grid p-2">
                    <input type="hidden" name="hidden" value="1">
                    <input type="submit" class="btn btn-info" value="Vender">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<//?php include 'Template/footer.php' ?>