<?php include("../vista/cabeceracodigo.php"); ?>
                <main>
                    <div class="container-fluid px-4">
                        <br><br>                    
                        
                        <div class="card mb-4">
                           
                            <div class="card-body">

					
			
			<h2>ELIMINAR PRODUCTO</h2>
 
 
 <?php

include('../config/conexion.php');


$Id_producto=$_GET['id'];


$sql = "DELETE  from `producto`  WHERE id=$Id_producto";

$resultado=$mysqli->query ($sql);


if($resultado)
{




 echo '<font color="green">DATOS ELIMINADOS EXITOSAMENTE</font>';
}ELSE {
	echo '<font color="red">ERROR NO SE PUDO ELIMINAR LOS DATOS , INTENTELO DE NUEVO</font>';
}
?>
<br>
<br>				
	<a href="../vista/producto.php" class="btn btn-danger" class="button">VOLVER</a>				
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