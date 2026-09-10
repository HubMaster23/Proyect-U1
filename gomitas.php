<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'cliente') {
    header("Location: index.php");
    exit();
}

$productos = [
    1 => ["nombre" => "Laptop Pro", "precio" => 1200, "existencias" => 5, "imagen" => "https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300"],
    2 => ["nombre" => "Mouse Inalámbrico", "precio" => 25, "existencias" => 15, "imagen" => "https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=300"],
    3 => ["nombre" => "Teclado Mecánico", "precio" => 80, "existencias" => 8, "imagen" => "https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=300"]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-6">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Catálogo de Productos</h1>
            <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm">Cerrar Sesión</a>
        </div>

        <form action="resumen.php" method="POST">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($productos as $id => $prod): ?>
                    <div class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between">
                        <div>
                            <img src="<?php echo $prod['imagen']; ?>" alt="<?php echo $prod['nombre']; ?>" class="w-full h-40 object-cover rounded-md mb-4">
                            <h3 class="font-bold text-lg text-gray-800"><?php echo $prod['nombre']; ?></h3>
                            <p class="text-gray-600 text-sm">Existencias: <?php echo $prod['existencias']; ?></p>
                            <p class="text-blue-600 font-bold text-xl mt-2">$<?php echo number_format($prod['precio'], 2); ?></p>
                        </div>
                        <div class="mt-4">
                            <label class="block text-xs text-gray-500 mb-1">Cantidad a comprar:</label>
                            <input type="number" name="cantidades[<?php echo $id; ?>]" value="0" min="0" max="<?php echo $prod['existencias']; ?>" class="w-full p-2 border rounded-md">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-8 text-right">
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-md font-bold hover:bg-green-700 transition">Procesar Compra</button>
            </div>
        </form>
    </div>
</body>
</html>