<?php include("cabeceracodigo.php"); ?>
<main>
    <div class="container-fluid px-4">
        <br><br>
        <div class="card mb-4">
            <div class="card-body">
                <h1> TABLA DE FACTURAS </h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NRO FACTURA</th>
                            <th>NOMBRE</th>
                            <th>NIT</th>
                            <th>FECHA</th>
                            <th>NRO DE COMPRA</th>
                            <th>GENERAR FACTURA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_select = "select * from factura";
                        $resultado = $mysqli->query($sql_select);

                        while ($fila_usu = $resultado->fetch_assoc()) {
                            $nro_factura = $fila_usu['Id'];
                            $nombre = $fila_usu['Nombre'];
                            $nit = $fila_usu['Nit'];
                            $fecha = $fila_usu['fecha'];
                            $compra= $fila_usu['nota_compra'];

                        ?>
                            <tr>
                                <td><?php echo $nro_factura; ?></td>
                                <td><?php echo  $nombre;      ?></td>
                                <td><?php echo  $nit; ?></td>
                                <td><?php echo  $fecha; ?></td>
                                <td><?php echo  $compra; ?></td>
                                <td> <a href='../controles/facturareporte.php?nro=<?php echo $nro_factura; ?>'> Imprimir</a> </td>
                            </tr>
                        <?php    } ?>

                    </tbody>
                </table>
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