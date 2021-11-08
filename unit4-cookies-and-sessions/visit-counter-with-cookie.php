<h2>Contador de sesiones</h2>
<p>

<?php
phpinfo();
    if (isset($_COOKIE["visits"])) {
    setcookie("visits", ++$_COOKIE["visits"]);
        echo "Vista número " . $_COOKIE["visits"];
    } else {
        echo "Eres la primera visita :)";
        setcookie("visits", $_COOKIE["visits"] = 1);
    }
    ?>
</p>
<?php
////Deleting a cookie
//    setcookie("visits", "", time() - 3600);
//    ?>
