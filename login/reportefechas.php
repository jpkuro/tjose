<?php
include('TD_reportes.php');
include_once 'dbConnection.php';
if (isset($_POST['inicio']) || isset($_POST['fin'])) {
  if ($_POST['inicio']!="" && $_POST['fin']!="") {
    $inicio=$_POST['inicio'];
    $fin=$_POST['fin'];
    $query=" and history.date Between '$inicio' and '$fin' ";
    $fechas="Fecha desde ".$inicio." hasta ".$fin;
  }else {
    $query="";
    $fechas="";
  }
}else {
  $query="";
  $fechas="";
}

$combo = $_POST['combo'];



$consulta="SELECT user.id,user.cedula,user.name,user.gender,user.email, quiz.title, history.level, history.sahi, history.wrong, history.score, history.date FROM user INNER JOIN history INNER JOIN quiz on user.email=history.email and history.eid=quiz.eid  where user.id='$combo' $query ";

$resultado = $con->query($consulta);
$sql=mysqli_query($con,"SELECT * FROM user WHERE id='$combo'" )or die('Error197');
while($row=mysqli_fetch_array($sql) )
{
  

$nombre=$row['name'];
$idd=$row['id'];   
$cedu=$row['cedula'];
$correo=$row['email'];
$apellido=$row['gender'];
}


//$consulta=mysqli_query($con,"SELECT * from tareas T INNER JOIN empleados E on T.id_empleado=E.id_empleado INNER JOIN actividades A on A.id_actividad=T.id_actividad INNER JOIN parcelas P on P.id_parcela=T.id_parcela where T.fecha BETWEEN '$desde' and '$hasta' ORDER BY T.fecha ASC");

$pdf=new PDF('L','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',20);
$pdf->SetXY(20,17);
$pdf->Cell(260,10,'REPORTE ESTUDIANTIL',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)
$pdf->SetFont('arial','',15);
$pdf->SetXY(55,33);
$y=$pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(100,6,$fechas ,0,1,'C');
$y=$pdf->GetY();
$pdf->SetY($y+10);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0, 0, 0);

$pdf->Cell(40,6,utf8_decode('ID: '),'T',0,'C'); $pdf->Cell(100,6,utf8_decode( $idd),'T',0,'L');
$pdf->Cell(30,6,utf8_decode('cedula Nº: '),'T',0,'C'); $pdf->Cell(35,6,utf8_decode($cedu),'T',0,'L');
$pdf->Cell(20,6,utf8_decode(''),'T',0,'C'); $pdf->Cell(45,6,utf8_decode(''),'T',1,'L');

$pdf->Cell(40,6,utf8_decode('Estudiante: '),'B',0,'C'); $pdf->Cell(90,6,utf8_decode($nombre." ".$apellido),'B',0,'L');
$pdf->Cell(60,6,utf8_decode('Correo: '),'B',0,'C'); $pdf->Cell(60,6,utf8_decode($correo),'B',1,'L');


$pdf->Cell(110,6,utf8_decode('Resultados'),0,1,'C');
$pdf->Cell(60,6,utf8_decode('Examen '),'B',0,'C');
 $pdf->Cell(40,6,utf8_decode('Preguntas Resueltas '),'B',0,'C');
 $pdf->Cell(30,6,utf8_decode('Buenas '),'B',0,'C'); 
 $pdf->Cell(30,6,utf8_decode('Equivocadas '),'B',0,'C');
  $pdf->Cell(30,6,utf8_decode('Puntaje'),'B',0,'C'); 
$pdf->Cell(60,6,utf8_decode('tiempo y hora '),'B',1,'C');

while($row =$resultado->fetch_array()){

$pdf->Cell(80,6,utf8_decode($row['title']),'B',0,'L');
$pdf->Cell(30,6,utf8_decode($row['level']),'B',0,'L');
$pdf->Cell(30,6,utf8_decode($row['sahi']),'B',0,'L');
$pdf->Cell(30,6,utf8_decode($row['wrong']),'B',0,'L');
$pdf->Cell(30,6,utf8_decode($row['score']),'B',0,'L');
$pdf->Cell(50,6,utf8_decode($row['date']),'B',1,'L');
}

$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);



/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
