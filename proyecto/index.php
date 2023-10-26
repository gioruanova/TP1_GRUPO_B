<?php
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
$productos = getProductos($conexion);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ---IMPORT HEADERS--- -->
    <?php require('layout/_headers.php') ?>
    <!-- ---IMPORT HEADERS--- -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Distribuidora</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->
    <!-- ---IMPORT NAV--- -->
    <?php require('js/_bootstrap.js') ?>
    <!-- ---IMPORT NAV--- -->


    <!-- -----------------------------BODY----------------------------- -->
    <div class="contentCustomized animate__animated animate__fadeInDown">

        <div class="container containerCustomized mt-8">
            <h1>NEXT GEN Distribuidora</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis aperiam nostrum cumque
                ex
                nesciunt deserunt, accusamus, vero, rerum suscipit ducimus quos. Nisi dolor asperiores, libero optio
                necessitatibus ipsam laudantium.</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis aperiam nostrum cumque
                ex
                nesciunt deserunt.</p>
        </div>

        <div class="container containerCustomized mt-3">

            <div class="container text-center">
                <div class="row justify-content-md-center">
                    <!-- -------Comienza CARD------- -->


                    <?php foreach ($productos as $prod): ?>
                        <div class="col justify-content-md-center">
                            <div class="card text-bg-dark">
                            <?php echo ($prod['producto_promo'] == 0 ? "" : "<span class='promoAvailable'>SALE</span>") ?>
                                <img src="img/<?php echo ($prod['nombre_archivo_producto'] == NULL) ? "error-image.jpg" : $prod['nombre_archivo_producto'] . '.jpg'; ?>"
                                    alt="<?php echo ($prod['nombre_archivo_producto'] == NULL) ? "Producto sin imagen para " . $prod['nombre_producto'] : $prod['nombre_producto'] ?>">
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title">
                                            <?php echo $prod['nombre_producto'] ?>
                                        </h5>
                                        <span class="categoria">(
                                            <?php echo $prod['categoria_producto'] ?>)
                                        </span>
                                    </div>
                                    <div class="card-text">
                                        <div class="card-descripcion">
                                            <?php echo $prod['descripcion_producto'] ?>
                                        </div>
                                        <div class="precios">

                                            <span class="price">
                                                <?php echo ($prod['descuento_producto'] != 0 ? "$" . number_format($prod['precio_producto'], 2, ',', '.') : ''); ?>
                                            </span>
                                            <span class="final-price">$
                                                <?php echo ($prod['descuento_producto'] != 0 ? number_format(($prod['precio_producto'] - $prod['descuento_producto']), 2, ',', '.') : number_format($prod['precio_producto'], 2, ',', '.')); ?>
                                            </span>

                                        </div>
                                    </div>
                                    <a href="productoDetalle.php?id=<?php echo $prod['id_producto'] ?>"
                                        class="btn btn-primary">Ver mas</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>



                    <!-- -------Termina CARD------- -->

                </div>
            </div>
        </div>

        <div class="container containerCustomized mt-2">
            <h3>Garantia en importacion</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis aperiam nostrum cumque
                ex
                nesciunt deserunt, accusamus, vero, rerum suscipit ducimus quos. Nisi dolor asperiores, libero optio
                necessitatibus ipsam laudantium.</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis aperiam nostrum cumque
                ex
                nesciunt deserunt.</p>
        </div>
    </div>
    <!-- -----------------------------BODY----------------------------- -->

    <!-- ---IMPORT FOOTER--- -->
    <?php require('layout/_footer.php') ?>
    <!-- ---IMPORT FOOTER--- -->
    <!-- ---IMPORT WHATSAPP--- -->
    <?php require('layout/_whatsappIcon.php') ?>
    <!-- ---IMPORT WHATSAPP--- -->

</body>

</html>