<?php
require_once 'action/validar_session.php';
require_once "action/functions.php";

// Obtener todos los usuarios
$usuarios = get_user();
// Verificar si se encontraron los datos del usuario
if ($usuarios === false) {
    // Si no se encontraron, redireccionar al usuario a una página de error o mostrar un mensaje
    echo "Error: No se encontraron datos de usuario.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | Dashboard</title>
    <?php include 'action/inc/link.php'?>
    <main class="main">
        <div class="container container_max">
            <?php include 'action/inc/header.php'?>
            <section class="contender">
                <article class="welcome_index">
                    <img class="filter" src="./assets/img/user_icon.png">

                    <?php foreach ($usuarios as $usuario) { ?>
                    <h1>Welcome <span><?php echo $usuario['Nombres']; ?> <?php echo $usuario['Apellidos']; ?></span></h1>
                    <p>Check my profile <a href="account.php">Here</a></p>
                     <a class="label bg_danger color_verify"  href="./action/Logout.php"><span class="color_dark"><i class='bx bx-power-off'></i> Cerrar</span></a>
                    <?php } ?>
                </article>
            </section>
        </div>
    </main>
    <?php include 'action/inc/footer.php'?>
</body>
</html>