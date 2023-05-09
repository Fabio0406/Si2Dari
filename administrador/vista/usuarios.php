<?php include("cabeceracodigo.php"); ?>

<main>
    <div class="container-fluid px-4">
        <br><br>

        <div class="card mb-4">

            <div class="card-body">

                <h1> TABLA DE USUARIOS </h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NUMERO</th>
                            <th>NOMBRE CLIENTE</th>
                            <th>CORREO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                  
									
									$sql_select="select * 
		                         	from usurario " ;
									$resultado=$mysqli->query($sql_select);
									
										while($fila_usu=$resultado->fetch_assoc())
									{
	$id_Cliente=$fila_usu['Id'];
    $nombre=$fila_usu['Nombre'];
	$correo=$fila_usu['Email'];	
									
										?>
                        <tr>
                            <td><?php  echo $id_Cliente; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $correo; ?></td>
                        </tr>
                        <?php	} ?>

                    </tbody>
                </table>




                <br>


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