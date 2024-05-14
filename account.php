<?php
require_once 'action/validar_session.php';
require_once "action/functions.php";

// Get all users
$usuarios = get_user();
// Check if user data was found
if ($usuarios === false) {
    // If not found, redirect the user to an error page or display a message
    echo "Error: No se encontraron datos de usuario.";
    exit();
}
// Process the data update form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $fechaModificacion = $_POST['fechaModificacion'];
    $password = $_POST['password'];

    if (modify_user($nombres, $apellidos, $usuario, $password, $fechaModificacion)) {
        echo "Datos actualizados correctamente.";
        echo"<META HTTP-EQUIV='REFRESH' CONTENT='1;'> ";
    } else {
        echo "Error al actualizar los datos o contraseña incorrecta.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | My Account</title>
    <?php include 'action/inc/link.php'?>
    <main class="main">
        <div class="container container_max">
            <?php include 'action/inc/header.php'?>
            <section class="form_contender">
                <div class="form_register">
                    <?php foreach ($usuarios as $usuario) { ?>
                    <div class="head">
                        <h2>My Account <i class='bx bx-globe'></i>
                        <p>Account created on <span class="color_primary"><?php echo $usuario['FechaRegistro']; ?></span></p>
                        </h2>
                        <a class="right color_text" href="./"><h6><i class="ai-chevron-left-small"></i> Back Home</h6></a>
                    </div>
                    <div class="body">
                        <form method="post" class="column" action="">
                            <div class="column-6">
                                <div class="group">
                                    <label>Names</label>
                                    <input type="text" name="nombres" value="<?php echo $usuario['Nombres']; ?>">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Last name</label>
                                    <input type="text" name="apellidos"  value="<?php echo $usuario['Apellidos']; ?>">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>User</label>
                                    <input type="text" name="usuario" value="<?php echo $usuario['Usuario']; ?>">
                                </div>
                            </div>                       

                            <div class="column-6">
                                <div class="group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $usuario['Email']; ?>">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>User Code</label>
                                    <div class="label bg_secondary color_dark_p"><?php echo $usuario['CodUsuario']; ?></div>
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Status</label>
                                    <div class="label bg_third color_verify"><?php echo $usuario['Estado']; ?></div>
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="">
                                    <p class="obs">Enter password to save data</p>
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Last modification</label>
                                    <div class="label bg_secondary color_dark_p"><?php echo $usuario['FechaModificacion']; ?></div>
                                    <input type="hidden" name="fechaModificacion" value="<?php echo date('Y-m-d\TH-i:s');?>">
                                </div>
                            </div>
                            

                            <div class="column-12">
                                <div class="f_r">
                                    <?php } ?>
                                    <button type="submit" class="bg_verify">Update<i class="ai-save"></i></button>
                                </div>
                            </div>
                        </form>
                        <a class="btn_abrir button border bg_light color_dark"><i class="ai-circle-x-fill"></i>Delete my account</a>
                        <?php include 'action/inc/actions/delete_ac.php'?> 
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include 'action/inc/footer.php'?>
</body>
</html>