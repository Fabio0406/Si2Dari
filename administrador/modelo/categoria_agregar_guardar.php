<?php include("../vista/cabeceracodigo.php"); ?>
                <main>
                    <div class="container-fluid px-4">
                        <br><br>                    
                        
                        <div class="card mb-4">
                           
                            <div class="card-body">

								
							<?php
include('../config/conexion.php');


$ID=$_POST['Id'];
$nombre=$_POST['Descripcion'];


$sql_insert= "INSERT INTO categoria(Id,Descripcion) 
VALUES ( '$ID', '$nombre')";

$resultado=$mysqli->query($sql_insert);

if($resultado)
{
    echo '<font color="green">DATOS AGREGADOS EXITOSAMENTE </font>';
}else {
	echo '<font color="red">ERROR NO SE PUDO AGERGAR LOS DATOS , INTENTELO DE NUEVO</font>';
}
?>		
			
				
				<br>
				
				
  </div>
  <div>
  
 <a href="../vista/categoria.php" class="btn btn-danger" class="button">VOLVER</a>

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