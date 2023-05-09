<?php include("cabeceracodigo.php"); ?>

<main>
    <div class="container-fluid px-4">
        <br><br>

        <div class="card mb-4">

            <div class="card-body">

                <h1> TABLA DE TIPOS DE PAGOS</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DESCRIPCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                  
									
									$sql_select=" Select * from tipopago;" ;
									$resultado=$mysqli->query($sql_select);
									
										while($fila_usu=$resultado->fetch_assoc())
									{
	$id_pago=$fila_usu['Id'];
    $Nombre=$fila_usu['Descripcion'];			
										?>
                        <tr>
                            <td><?php  echo $id_pago; ?></td>
                            <td><?php echo $Nombre; ?></td>
            
                            
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