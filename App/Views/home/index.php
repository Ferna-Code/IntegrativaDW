<head>
    <link rel="stylesheet" href="../../../../public/css/home.css">
    <title>Pagina principal</title>
</head>

<div class="container">
    <?php if (!isset($_SESSION['nivelUsuario'])) : ?>
        <div class="form-container">
            <h3>Ingreso</h3>

            <form method="post">
                <input type="text" name="rut" placeholder="Ingrese RUT proyecto 2">
                <input type="password" name="clave" placeholder="Clave">
                <br>
                <div class="contenedor">

                    <?php
                    if ($showCreateTableButton) ://verificamos si la tablas
                    ?>
                        <input type="submit" value="Ingresar">
                        <input type="hidden" name="op" value="VALIDAR">
                    <?php else : ?>
                        <input type="hidden" name="op" value="CREAR_TABLA">
                        <input type="submit" value="Crear tabla">
                    <?php endif; ?>
                </div>
            </form>
        <?php endif; ?>

        </div>
        <div class="slider-container">
            <?php include 'complementos/slider.php' ?>

        </div>
</div>

<div class="container">
    <div class="servicios">
        <?php include 'complementos/info.php' ?>
    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.0317974110176!2d-70.65215712397256!3d-33.44847809741169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c50bb37913d1%3A0xfccfb6ad72599cdb!2sArturo%20Prat%20269%2C%208330307%20Santiago%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses-419!2scl!4v1705553626795!5m2!1ses-419!2scl" width="100%" height="340" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>