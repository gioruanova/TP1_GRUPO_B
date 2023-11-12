<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_usuarios.php');

if ($_SESSION['usuario']['rol'] !== 'Admin') {
    header('Location: index.php');
}


if (isset($_GET['id'])) {
    $usuario = getUsuarioById($conexion, $_GET['id']);



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aca tenemos que armar el codigo para actualizar la tabla de usuarios por id 
    // con la condicion de que si la opcion no cambia, mantener la opcion actual
    // Creo que seria crear la consulta editByUserId

    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ---IMPORT HEADERS--- -->
    <?php require('layout/_headers.php') ?>
    <!-- ---IMPORT HEADERS--- -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen - Mantenimiento Usuarios </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__backInDown">
        <div class="container containerCustomized mt-8">
            <h1>Editar Usuario</h1>


        </div>

        <div class="container containerCustomized mt-3">
            <div class="admin-container-table">

                <form action="" class="form-contacto">
                    <label for="nombre" class="form-label text-light"
                        style="width: 100%;text-align: left;">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control mb-2"
                        placeholder="Ejemplo: Pepe Luis" required value="<?php echo $usuario['nombre'] ?>">

                    <label for="email" class="form-label text-light"
                        style="width: 100%;text-align: left;">Email:</label>
                    <input type="text" name="email" id="email" class="form-control mb-2"
                        placeholder="Ejemplo: Pepe Luis" required value="<?php echo $usuario['email'] ?>">

                    <label for="password" class="form-label text-light" style="width: 100%;text-align: left;">Nueva
                        Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control mb-2"
                        placeholder="Ejemplo: Pepe Luis" required value="<?php echo $usuario['password'] ?>">

                    <label for="password" class="form-label text-light"
                        style="width: 100%;text-align: left;">Rol:</label>
                    <select type="select" class="form-control mb-3" name="rol" id="rol">
                        <option value="Admin" <?php if ($usuario['rol'] == 'Admin'): ?>
                                selected <?php endif ?>>Admin</option>
                                <option value="Empleado" <?php if ($usuario['rol'] == 'Empleado'): ?>
                                selected <?php endif ?>>Empleado</option>
                                <option value="Usuario" <?php if ($usuario['rol'] == 'Usuario'): ?>
                                selected <?php endif ?>>Usuario</option>

                        
                    </select>


                    <div style="display: flex;">
                        <input <?php echo ($usuario['newsletter'] == "1") ? "checked" : "" ?> name="newsletter" value="1"
                            class="form-check-input" type="checkbox" id="newsletter"><label for="newsletter"
                            class="form-label text-light ms-1" style="font-weight:300;">Suscribir al newsletter</label>
                    </div>

                    <div style="display: flex;justify-content: center;">
                    <button href="" class="btn btn-success mt-2">Actualizar</button>
                    </div>
   
                </form>


            </div>

            <a href="<?php echo BASE_URL ?>admin_usuarios.php" class="btn btn-warning mt-5"><i
                    class="bi bi-arrow-left-circle me-2"></i>Volver</a>
        </div>
    </div>


    <!-- -----------------------------BODY----------------------------- -->

    <!-- ---IMPORT FOOTER--- -->
    <?php require('layout/_footer.php') ?>
    <!-- ---IMPORT FOOTER--- -->

    <!-- ---IMPORT WHATSAPP--- -->
    <?php require('layout/_whatsappIcon.php') ?>
    <!-- ---IMPORT WHATSAPP--- -->

    <!-- ---IMPORT JS--- -->
    <?php require('js/_bootstrap.js') ?>
    <!-- ---IMPORT JS--- -->
</body>

</html>