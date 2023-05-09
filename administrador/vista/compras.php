<?php include("cabeceracodigo.php"); ?>

<main>
    <div class="container-fluid px-4">
        <br><br>

        <div class="card mb-4">

            <div class="card-body">

                <h1> TABLA DE COMPRAS </h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Tipo Pago</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                  
									
									$sql_select=" SELECT compra.id,usurario.Nombre,compra.fecha,compra.tipo_pago,estado.descripcion from compra,usurario,estado where compra.cliente=usurario.Id and compra.estado=estado.Id" ;
									$resultado=$mysqli->query($sql_select);
									
										while($fila_usu=$resultado->fetch_assoc())
									{
	$id_compra=$fila_usu['id'];
    $cliente=$fila_usu['Nombre'];
    $fecha=$fila_usu['fecha'];
    $pago=$fila_usu['tipo_pago'];
    $estado=$fila_usu['descripcion'];	
										?>
                        <tr>
                            <td><?php  echo $id_compra; ?></td>
                            <td><?php echo $cliente; ?></td>
                            <td><?php echo $fecha; ?></td>
                            <td><?php echo $pago; ?></td>
                            <td><?php echo $estado; ?></td>
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