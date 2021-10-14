<html>
<head>
    <meta charset="UTF-8">
    <title>Test PHP</title>
</head>

<body>
    <?php
    var_dump($_GET); // Se revisa el contenido de la variable global a ver qué contenido se está enviando
    ?>


    <form>
        <!--
        - Los inputs necesitan el atributo "name" para enviarse por el servidor.
        - Si dos inputs tienen el mismo valor de "name", el siguiente sobreescribe al primero.
        Sin embargo si indicamos el valor con corchetes al final almacena los dos valores en el array: esto nos hará falta para la práctica de la agenda!
        -->

        <input type="text" name="contacto[]" value="Carmen"/>
        <input type="text" name="contacto[]" value="Pepe"/>
        <input type="text" name="telefono" />
        <input type="submit" name ="submit" value="Enviar"/>
    </form>

</body>
</html>