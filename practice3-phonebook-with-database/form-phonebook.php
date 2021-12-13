<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulario | Agenda de contactos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>

<main class="main-of-form">
    <section class="contact-form">
        <?php
        /**
         * Carga de uno u otro formulario dependiendo de si se ha pulsado el botón de añadir nuevo contacto
         */
        if(isset($_POST['add'])){
            include_once("resources/add-contact-content.php");
        } else {
            include_once("resources/edit-contact-content.php");
        }

        ?>
    </section>
</main>

</body>
</html>