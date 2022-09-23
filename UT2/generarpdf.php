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
        generarpdf();
    }
}

function generarpdf() {
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'Hola gente soy Jason!');
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