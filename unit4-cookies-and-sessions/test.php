<?php
    session_start();
    echo 'session_id(): ' . session_id();
    echo "<br>";
    echo 'session_name(): ' . session_name();
    echo "<br>";
?>

<?php
    $new_contact = filter_input(INPUT_GET, "contact");
    $new_phone = filter_input(INPUT_GET, "phone");
    if(isset($_GET["submit"])) {
        $_SESSION[$new_contact] = $new_phone;
    }
?>

<form method="get">
    <input type="text" name="contact" placeholder="Nombre"/>
    <input type="text" name="phone" placeholder="Teléfono"/>
    <input type="submit" name="submit" value="Enviar"/>
</form>

<?php
    echo "<br>";
    print_r($_SESSION);
    //session_destroy();
?>