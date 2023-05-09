<?php
require('../publico/fpdf.php');
include('../config/conexion.php');
class PDF extends FPDF{


   // Cabecera de página
function Header()
{
    // Logo
    $this->Image('../publico/Imagenes/SALOEZ.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',9);
    $textypos = 5;
    $this->setY(12);
    $this->setX(10);
    // Movernos a la derecha
    $this->Cell(40);
    // Título
   
 



//salto de linea
   
    // Agregamos los datos de la empresa
    
$this->Cell(5,$textypos,"SERVICIOS DE REPARACION, MANTENIMIENTO DE DISPOSITIVOS ELECTRONICOS 'SALOEZ'");
$this->Cell(180);
$this->Cell(5,$textypos,"NIT:1007017022");
$this->setY(20);$this->setX(10);
$this->Cell(40);
$this->Cell(5,$textypos,utf8_decode("Feria de la Computación-Local 239"));
$this->setY(25);$this->setX(10);
$this->Cell(40);
$this->Cell(5,$textypos,utf8_decode("Teléfono(591-3)3415500"));
$this->setY(30);$this->setX(10);
$this->Cell(40);
$this->Cell(5,$textypos,"serviciossaloez@gmail.com");
$this->setY(35);$this->setX(10);
$this->Cell(40);
$this->Cell(5,$textypos,"Santa Cruz");


    // Salto de línea
    $this->Ln(10);
    $this->SetFont('Arial','B',15);
    $this->Cell(260,10,'FACTURA',0,0,'C');



    
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
/*function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}*/



}
$numero = $_GET['nro'];
//---------------------------------------------------------------

// Creación del objeto de la clase heredada
//$pdf = new PDF();

$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

//---------------------llenado de datos del cliente------------------------------------;
$sql_select1 = "(select DISTINCT factura.nrofactura , factura.nit,factura.nombre,notaentrega.nro,notaentrega.fecha,notaentrega.hora
                
    from factura,notaentrega,notaservicio
    where factura.nronotaentrega=notaentrega.nro and $numero=factura.nrofactura 

)";
 $resultado = $mysqli->query($sql_select1);

 while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(50,5,utf8_decode('Factura N°         :'),0,0,'C');
     $pdf->Cell(50,5, $fila['nrofactura'],0,0,'C',0);

     $pdf->Cell(50,5,utf8_decode('Fecha         :'),0,0,'C');
     $pdf->Cell(50,5, $fila['fecha'],0,1,'C',0);

     $pdf->Cell(50,5,utf8_decode('Nit                     :'),0,0,'C');
     $pdf->Cell(50,5, $fila['nit'],0,0,'C',0);

     $pdf->Cell(50,5,utf8_decode('Hora           :'),0,0,'C');
     $pdf->Cell(50,5, $fila['hora'],0,1,'C',0);

     $pdf->Cell(50,5,utf8_decode('Nota de Entrega:'),0,0,'C');
     $pdf->Cell(50,5, $fila['nro'],0,1,'C',0);

     $pdf->Cell(50,5,utf8_decode('Nombre             :'),0,0,'C');
     $pdf->Cell(50,5, $fila['nombre'],0,1,'C',0);

 }
 // Salto de línea
 $pdf->Ln(5);
//---------------------------------------------------------------
/*for($i=1;$i<=40;$i++)
$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);*/

$pdf->Cell(20,5,utf8_decode('ID         '),1,0,'C');
$pdf->Cell(105,5,utf8_decode('SERVICIO                     '),1,0,'C');
$pdf->Cell(50,5,utf8_decode('COSTO DEL SERVICIO'),1,0,'C');
$pdf->Cell(50,5,utf8_decode('COSTO DEL REPUESTO'),1,0,'C');
$pdf->Cell(50,5,utf8_decode('SUBTOTAL'),1,1,'C');
//-------------------SERVICIO--------------------------------------;
$sql_select2 = "select servicio.id, categoriaservicio.descripcion, detalleservicio.costo from detalleservicio,servicio,categoriaservicio
 where detalleservicio.idservicio = servicio.id and servicio.idcategoriaservicio = categoriaservicio.id and detalleservicio.nronotaservicio 
in (select notaservicio.nronotaservicio from notaservicio where notaservicio.nronotaservicio 
in(select notaentrega.nronotaservicio from notaentrega where notaentrega.nro 
in(select factura.nronotaentrega from factura where notaentrega.nro=factura.nronotaentrega and $numero =factura.nrofactura) ) )";
 $resultado2 = $mysqli->query($sql_select2);


 while ($fila = $resultado2->fetch_assoc()) {
   
     $pdf->Cell(20,5, $fila['id'],1,0,'C',0);
   
     $pdf->Cell(105,5, $fila['descripcion'],1,0,'C',0);
     
     $pdf->Cell(50,5, $fila['costo'],1,0,'C',0);

     $pdf->Cell(50,5,utf8_decode(''),1,0,'C');

     $pdf->Cell(50,5, $fila['costo'],1,1,'C',0);
     
 }
//---------------------------------------------------------------
//-------------------SERVICIO-CON-REPUESTO------------------------------------;
$sql_select3 = "select   serviciorepuesto.id,
                                                categoriaservicio.descripcion, 
                                                detalleserviciorepuesto.costoservicio, 
                                                detalleserviciorepuesto.costorepuesto,
                                                detalleserviciorepuesto.subtotal
                        from    detalleserviciorepuesto,serviciorepuesto,categoriaservicio
                        where   detalleserviciorepuesto.idserviciorepuesto = serviciorepuesto.id and 
                                serviciorepuesto.idcategoriaservicio = categoriaservicio.id and
                                detalleserviciorepuesto.nronotaservicio in (select notaservicio.nronotaservicio from notaservicio where notaservicio.nronotaservicio 
                                in(select notaentrega.nronotaservicio from notaentrega where notaentrega.nro 
                                in(select factura.nronotaentrega from factura where notaentrega.nro=factura.nronotaentrega and $numero =factura.nrofactura) ))";
    $resultado3 = $mysqli->query($sql_select3);

 while ($fila = $resultado3->fetch_assoc()) {
   
     $pdf->Cell(20,5, $fila['id'],1,0,'C',0);
   
     $pdf->Cell(105,5, $fila['descripcion'],1,0,'C',0);
     
     $pdf->Cell(50,5, $fila['costoservicio'],1,0,'C',0);

     $pdf->Cell(50,5, $fila['costorepuesto'],1,0,'C',0);

     $pdf->Cell(50,5, $fila['subtotal'],1,1,'C',0);
 }
//---------------------------------------------------------------
 // Salto de línea
 $pdf->Ln(5);
//-------------------NOTAENTREGA--------------------------------------;
$sql_select4 = "select  notaentrega.subtotal,
                         notaentrega.costototal,
                         personal.nombrepersonal,
                         personal.apellidop,
                         personal.apellidom,
                         tipopago.formapago
                from notaentrega,personal,tipopago
                          WHERE  notaentrega.codpersonal=personal.cod and notaentrega.idtipopago=tipopago.id and notaentrega.nro 
                          in(select factura.nronotaentrega from factura where notaentrega.nro=factura.nronotaentrega and $numero =factura.nrofactura)" ;
                       
 $resultado4 = $mysqli->query($sql_select4);

 while ($fila = $resultado4->fetch_assoc()) {
    $pdf->Cell(44,5,utf8_decode('Forma de Pago'),0,0,'C');
     $pdf->Cell(61,5, $fila['formapago'],0,0,'C',0);

    $pdf->Cell(120,5,utf8_decode('                                                                          Anticipo'),0,0,'C');
     $pdf->Cell(50,5, $fila['subtotal'],1,1,'C',0);

     $pdf->Cell(50,5,utf8_decode('Personal/Cobrador'),0,0,'C');
     $pdf->Cell(45,5, $fila['nombrepersonal'],0,0,'C',0);
     $pdf->Cell(5,5, $fila['apellidop'],0,0,'C',0);
     $pdf->Cell(45,5, $fila['apellidom'],0,0,'C',0);

     $pdf->Cell(80,5,utf8_decode('                                         Costo Total'),0,0,'C');
     $pdf->Cell(50,5, $fila['costototal'],1,1,'C',0);


 
 }
//---------------------------------------------------------------/
$pdf->Output();


?>