<?php include("../vista/cabeceracodigo.php"); ?>
          

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
                            <th>ELIMINAR</th>
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
                            <td><a href='../modelo/categoria_eliminar_guardar.php?id=<?php echo $id_categoria ;?>'>
                            Eliminar</a> </td>
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
                <?php include("../vista/piedecodigo.php"); ?> 