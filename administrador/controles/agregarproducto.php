<?php include("../vista/cabeceracodigo.php"); ?>
          
<main>
                    <div class="container-fluid px-4">
                        <br><br>                    
                        
                        <div class="card mb-4">
                           
                            <div class="card-body">
							
                     <form action="../modelo/producto_agregar_guardar.php" method="POST" >	

ID
 <input type="number" id="" name="Id" class="form-control">
Nombre
 <input type="text" id="" name="nombre" class="form-control">

PRECIO
<input type="text" id="" name="precio" class="form-control">
CATEGORIA
<select name="categoria" required="required" class="form-control">
 <?php
   $sql_select1="select Id,Descripcion from categoria";
   $resultado=$mysqli->query($sql_select1);
    while($fila=$resultado->fetch_assoc())
   {
      $id=$fila['Id'];  
	  $nombre=$fila['Descripcion'];
	 
	  
?>
<option value="<?php echo $id; ?>"><?php echo  strtoupper($nombre); ?></OPTION>
<?php
   }
 ?>
 </select>
<br>
<br>
		 
<input type="submit" class="form-control" name="" Value="AGREGAR PRODUCTO">


  </form>  
 
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