<?php
include 'controllers/customerController.php';
include 'controllers/productController.php';

// Obtener todos los clientes y productos
$customers = getCustomers();
$products = getProducts();

// Manejar el formulario de creación de cliente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create_customer'])) {
        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <customer>
            <firstname>' . htmlspecialchars($_POST['firstname']) . '</firstname>
            <lastname>' . htmlspecialchars($_POST['lastname']) . '</lastname>
            <email>' . htmlspecialchars($_POST['email']) . '</email>
            <passwd>' . htmlspecialchars($_POST['password']) . '</passwd>
        </customer>';
        createCustomer($data);
        header("Location: index.php");
        exit;
    } elseif (isset($_POST['delete_customer'])) {
        $id = $_POST['id'];
        deleteCustomer($id);
        header("Location: index.php");
        exit;
    } elseif (isset($_POST['create_product'])) {
        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <product>
            <name>
                <language id="1">' . htmlspecialchars($_POST['product_name']) . '</language>
            </name>
            <price>' . htmlspecialchars($_POST['product_price']) . '</price>
            <active>1</active>
        </product>';
        createProduct($data);
        header("Location: index.php");
        exit;
    } elseif (isset($_POST['delete_product'])) {
        $id = $_POST['product_id'];
        deleteProduct($id);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes y Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Gestión de Clientes</h1>

    <h2>Clientes</h2>
    <ul class="list-group mb-4">
        <?php if ($customers && $customers->customer): ?>
            <?php foreach ($customers->customer as $customer): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $customer->firstname ?> <?= $customer->lastname ?>
                    <form action="index.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $customer->id ?>">
                        <input type="submit" name="delete_customer" value="Eliminar" class="btn btn-danger btn-sm">
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">No se encontraron clientes.</li>
        <?php endif; ?>
    </ul>

    <h2>Crear Cliente</h2>
    <form action="index.php" method="post" class="mb-4">
        <div class="form-group">
            <input type="text" name="firstname" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <input type="text" name="lastname" class="form-control" placeholder="Apellido" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <button type="submit" name="create_customer" class="btn btn-primary">Crear Cliente</button>
    </form>

    <h1 class="mb-4">Gestión de Productos</h1>

    <h2>Productos</h2>
    <ul class="list-group mb-4">
        <?php if ($products && $products->product): ?>
            <?php foreach ($products->product as $product): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $product->name->language[0] ?> - $<?= $product->price ?>
                    <form action="index.php" method="post" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?= $product->id ?>">
                        <input type="submit" name="delete_product" value="Eliminar" class="btn btn-danger btn-sm">
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">No se encontraron productos.</li>
        <?php endif; ?>
    </ul>

    <h2>Crear Producto</h2>
    <form action="index.php" method="post" class="mb-4">
        <div class="form-group">
            <input type="text" name="product_name" class="form-control" placeholder="Nombre del Producto" required>
        </div>
        <div class="form-group">
            <input type="number" name="product_price" class="form-control" placeholder="Precio" required>
        </div>
        <button type="submit" name="create_product" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
