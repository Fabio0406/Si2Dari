<?php include("cabeceracodigo.php"); ?>

<main>
    <div class="container-fluid px-4">
        <br><br>

        <div class="card mb-4">

            <div class="card-body">

                <h1> TABLA DE PRODUCTOS </h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>PRECIO</th>
                            <th>CATEGORIA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                  
									
									$sql_select=" Select producto.ID,producto.nombre,producto.Precio,categoria.Descripcion from producto,categoria where producto.Categoria_Producto=categoria.Id" ;
									$resultado=$mysqli->query($sql_select);
									
										while($fila_usu=$resultado->fetch_assoc())
									{
	$id_producto=$fila_usu['ID'];
    $Nombre=$fila_usu['nombre'];
    $precio=$fila_usu['Precio'];
    $categoria=$fila_usu['Descripcion'];			
										?>
                        <tr>
                            <td><?php  echo $id_producto; ?></td>
                            <td><?php echo $Nombre; ?></td>
            
                            <td><?php echo $precio; ?></td>
                            <td><?php echo $categoria; ?></td>
                        </tr>
                        <?php	} ?>

                    </tbody>
                </table>




                <br>

                <div>


</div>
            </div>
            <div>

                
            
            </div>
        </div>
    </div>
</main>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
<?php include("piedecodigo.php"); ?>