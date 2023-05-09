<?php include("cabeceracodigo.php"); ?>

<main>
    <div class="container-fluid px-4">
        <br><br>

        <div class="card mb-4">

            <div class="card-body">

                <h1> TABLA DE CATEGORIAS </h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NUMERO</th>
                            <th>CATEGORIA</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                  
									
									$sql_select="select * 
		                         	from categoria " ;
									$resultado=$mysqli->query($sql_select);
									
										while($fila_usu=$resultado->fetch_assoc())
									{
	$id_categoria=$fila_usu['Id'];
    $nombre=$fila_usu['Descripcion'];
	
									
										?>
                        <tr>
                            <td><?php  echo $id_categoria; ?></td>
                            <td><?php echo $nombre; ?></td>
                            
                        </tr>
                        <?php	} ?>

                    </tbody>
                </table>




                <br>

                <div>

<a href="../controles/agregarcategoria.php" class="btn btn-danger" class="button">AGREGAR</a>
<a href="../controles/eliminarcategoria.php" class="btn btn-danger" class="button">ELIMINAR</a>
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