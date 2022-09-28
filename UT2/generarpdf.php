<?php
require('../1.libraries/fpdf184/fpdf.php');

$nombre;
$empresa;
$representante;
$fecha;

if(isset($_GET['nombre'],$_GET['empresa'],$_GET['representante'],$_GET['fecha'])) {
    $nombre = $_GET['nombre'];
    $empresa = $_GET['empresa'];
    $representante = $_GET['representante'];
    $fecha = $_GET['fecha'];
    if($nombre!='' && $empresa!=''&& $representante!='' && $fecha!='') {
        generarpdf($nombre,$empresa,$representante,$fecha);
    }
} else {
    $nombre="";
    $empresa="";
    $representante="";
    $fecha="";
}

function generarpdf($nombre,$empresa,$representante,$fecha) {
    $pdf=new FPDF();
    $pdf->SetTitle('CartaMotivacion',true);
    $pdf->SetMargins(15,10,15);
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->MultiCell(0,18,utf8_decode('Carta de motivación'),0,'C');
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(0,12,utf8_decode("Estimado/a $representante"));
    $pdf->Cell(10);
    $pdf->MultiCell(0,6,utf8_decode("Me dirijo a usted para solicitar el puesto de desarrollador web en $empresa. Durante los últimos siete años, he estado programando sitios web y utilizando CSS para crear interfaces funcionales y sencillas de usar. Esta ha sido mi pasión desde que estaba en el instituto, donde ya comencé a familiarizarme con la programación. Desde entonces, he seguido de cerca la evolución de su empresa. Cuando hace dos años recibieron el premio de Innovación, tuve claro que algún día me gustaría formar parte de su equipo."));
    $pdf->SetFont('Courier','',11);
    $pdf->Cell(0,12,utf8_decode("$fecha"),0,0,'L');
    $pdf->Cell(0,12,utf8_decode("Firmado: $nombre"),0,0,'R');
    $pdf->Output();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Carta de Motivación</title>
    <link rel="stylesheet" href="./css/generarpdf.css">
</head>
<body>
    <main>
        <h2>Generar carta de motivación</h2>

        <form action="" method="GET">

            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value=<?=$nombre?>>

            <label for="empresa">Empresa: </label>
            <input type="text" name="empresa" id="empresa" value=<?=$empresa?>>

            <label for="representante">Representante: </label>
            <input type="text" name="representante" id="representante" value=<?=$representante?>>

            <label for="fecha">Fecha: </label>
            <input type="date" name="fecha" id="fecha" value=<?=$fecha?>>

            <input type="submit" value="Generar">
            
        </form>
    </main>
</body>
</html>