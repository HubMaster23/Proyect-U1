//Resumen.php
<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'cliente') {
    header("Location: index.php");
    exit();
}

$productosBD = [
    1 => ["nombre" => "Laptop Pro", "precio" => 1200],
    2 => ["nombre" => "Mouse Inalámbrico", "precio" => 25],
    3 => ["nombre" => "Teclado Mecánico", "precio" => 80]
];

$cantidades = $_POST['cantidades'] ?? [];
$resumen = [];
$subtotalG = 0;

foreach ($cantidades as $id => $cantidad) {
    $cant = intval($cantidad);
    if ($cant > 0 && isset($productosBD[$id])) {
        $precio = $productosBD[$id]['precio'];
        $subtotal = $precio * $cant;
        $subtotalG += $subtotal;
        
        $resumen[] = [
            "nombre" => $productosBD[$id]['nombre'],
            "precio" => $precio,
            "cantidad" => $cant,
            "subtotal" => $subtotal
        ];
    }
}

$iva = $subtotalG * 0.16;
$total = $subtotalG + $iva;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Compra</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Resumen de Compra</h1>

        <?php if (empty($resumen)): ?>
            <p class="text-gray-600 mb-4">No seleccionaste ningún producto.</p>
        <?php else: ?>
            <table class="w-full text-left border-collapse mb-6">
                <thead>
                    <tr class="border-b text-gray-600 text-sm">
                        <th class="py-2">Producto</th>
                        <th class="py-2">Precio U.</th>
                        <th class="py-2">Cant.</th>
                        <th class="py-2 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resumen as $item): ?>
                        <tr class="border-b text-gray-800">
                            <td class="py-2"><?php echo $item['nombre']; ?></td>
                            <td class="py-2">$<?php echo number_format($item['precio'], 2); ?></td>
                            <td class="py-2"><?php echo $item['cantidad']; ?></td>
                            <td class="py-2 text-right">$<?php echo number_format($item['subtotal'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="border-t pt-4 space-y-2 text-right">
                <p class="text-gray-600">Subtotal: <span class="font-bold">$<?php echo number_format($subtotalG, 2); ?></span></p>
                <p class="text-gray-600">IVA (16%): <span class="font-bold">$<?php echo number_format($iva, 2); ?></span></p>
                <p class="text-xl font-bold text-gray-800">Total a pagar: <span class="text-green-600">$<?php echo number_format($total, 2); ?></span></p>
            </div>
        <?php endif; ?>

        <div class="mt-6 flex justify-between">
            <a href="cliente.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm">Volver al catálogo</a>
            <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>