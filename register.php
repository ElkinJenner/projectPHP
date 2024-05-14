<?php
require_once "action/functions.php";

$permits = get_permits();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $codUsuario = $_POST['codUsuario'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $permisos = $_POST['permisos'];
    $estado = 'Activo'; // Por defecto, establecemos el estado como 'Activo'
    $fechaRegistro = $_POST['fechaRegistro'];

    // Verificar que las contraseñas coincidan
    if ($password === $password_repeat) {
        // Registrar el usuario en la base de datos
        if (register_user($codUsuario, $usuario, $password, $nombres, $apellidos, $email, $permisos, $estado, $fechaRegistro)) {
            // Registro exitoso
            echo "Usuario registrado correctamente.";
             header("Location: ./login.php");
            // Puedes redirigir al usuario a otra página si lo deseas
        } else {
            // Error al registrar el usuario
            echo "Error al registrar el usuario.";
        }
    } else {
        // Las contraseñas no coinciden, mostrar mensaje de error
        echo "Error: Las contraseñas no coinciden.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | Sign up</title>
     <?php include './action/inc/link.php'?>
    <main class="main">
        <div class="container container_max">
            <?php include 'action/inc/header.php'?>
            <section class="form_contender">
                <div class="form_register">
                    <div class="head">
                        <h2>Sign up <i class='bx bx-user-circle'></i>
                            <p>Have an account? <a href="login.php">Login</a></p>
                        </h2>
                    </div>
                    <div class="body">
                        <form method="post" class="column">
                            <input type="hidden" name="codUsuario" value="U<?php echo date('d\is');?>">
                            <input type="hidden" name="fechaRegistro" value="<?php echo date('Y-m-d\TH-i:s');?>">
                            <div class="column-6">
                                <div class="group">
                                    <label>Names</label>
                                    <input type="text" name="nombres">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Last name</label>
                                    <input type="text" name="apellidos">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>User</label>
                                    <input type="text" name="usuario">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Email</label>
                                    <input type="email" name="email">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Password</label>
                                    <input type="password" name="password">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Repeat Password</label>
                                    <input type="password" name="password_repeat">
                                </div>
                            </div>

                            <div class="column-6">
                                <div class="group">
                                    <label>Select user type</label><br>

                                    <div class="select_contender">
                                        <?php foreach ($permits as $permit): ?>
                                            <div class="group">
                                                <input type="radio" name="permisos" value="<?php echo $permit; ?>">
                                                <i></i>
                                                <label><?php echo $permit; ?></label>
                                            </div>
                                        
                                        <?php endforeach; ?>
                                  
                                    </div>
                                </div>
                            </div>

                            <div class="column-12">
                                <div class="f_r">
                                    <button>Create an account<i class="ai-arrow-up-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
     <?php include './action/inc/footer.php'?>
</body>
</html>