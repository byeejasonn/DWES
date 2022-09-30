<?php
    $productos = [
        "naranja" => 1.2,
        "manzana" => 1.5,
        "pera" => 1.8,
        "platano" => 1.1,
        "kiwi" => 2,
        "macarrones" => 0.5,
        "arroz" => 0.75,
        "salchichas" => 1
    ];

    $lista = [];

    function imprimirLista($productos) {
?>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>
        <?php 
            foreach ( $productos as $producto => $precio) :
        ?>
                <tr>
                    <td><?= ucfirst($producto) ?></td>
                    <td><?= $precio ?>€</td>
                    <td><input type="number" step="1" min="0" max="99" name="<?= $producto ?>" value="<?= (empty($_GET))?'0':$_GET[$producto]; ?>"></td>
                </tr>
        <?php
            endforeach;
        ?>
<?php
    }

    function generarFactura($productos) {
        $productosCompra = array_intersect_key($_GET, $productos);

        foreach ($productosCompra as $producto => $cantidad) {
            if($cantidad != 0) {
                $factura[$producto] = $productos[$producto]*$cantidad;
            }
        }

        if(!empty($factura)) {
            imprimirFactura($factura);
        }
    }

    function imprimirFactura($factura) {
?>
        <table>
            <tr><th>Producto</th><th>Precio</th></tr>

            <?php foreach ($factura as $producto => $precio) : ?>

                <tr>
                    <td><?= ucfirst($producto) ?></td> <td><?= $precio ?>€</td>
                </tr>

            <?php endforeach; ?>

            <tr><td><b>Total:</b></td><td><?= array_sum($factura) ?>€</td></tr>
        </table>
<?php
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de la compra</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 4px 6px;
            margin: 30px 0;
        }

        input[type=number] {
            width: 60px;
        }

        input[type=submit] {
            height: 25px;
            width: 80px;
        }

        .center {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
        }

        .formulario {
            padding: 30px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>

    <div class="center">
        <form action="" method="get" class="formulario">
            <h2>Lista de la compra</h2>

            <table>
                <?php imprimirLista($productos) ?>
    
                <tr>
                    <td colspan="3"><input type="submit" value="Enviar"></td>
                </tr>
            </table>
    
            <?php
                if (!empty($_GET)) {
                    generarFactura($productos);
                }
            ?>
        </form>
    </div>
</body>
</html>