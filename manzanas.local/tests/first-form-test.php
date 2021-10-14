<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>First Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {font-family: Verdana}
    </style>
</head>
<body>
    <h1>Registro de usuario</h1>
    <form method="get">
        <input type="text" placeholder="Nombre" name="name">
        <input type="text" placeholder="Edad" name="age">
        <input type="text" placeholder="Email" name="email">
        <button type="submit">Enviar respuesta</button>
    </form>

    <div>
        <p>Bienvenido <?php echo $_GET["name"];?> </p>
        <p> Tu edad es <?php echo $_GET["age"];?> y tu email registrado <?php echo $_GET["email"];?></p>
    </div>

</body>
</html>
