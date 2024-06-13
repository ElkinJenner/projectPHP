<?php

require_once 'action/validar_session.php';
require_once "action/functions.php";

$usuarios = show_users();
$status = get_status();
// Check if user data was found
if ($usuarios === false) {
    // If not found, redirect the user to an error page or display a message
    echo "Error: No se encontraron datos de usuario.";
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del usuario a eliminar
    $idUsuario = $_POST['idUsuario'];

    // Intentar eliminar al usuario
    if (delete_user($idUsuario)) {
        // Eliminación exitosa
        echo "Usuario eliminado correctamente.";
        header("Location: ./manage.php");
        // Puedes redirigir al usuario a otra página si lo deseas
    } else {
        // Error al eliminar al usuario
        echo "Error al eliminar al usuario.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $new_estado = $_POST['estado'];

    if (modify_status($new_estado)) {
        echo "Estado actualizado.";
        echo"<META HTTP-EQUIV='REFRESH' CONTENT='1;'> ";
    } else {
        echo "Error al actualizar estado.";
    }
}

$usuarios = $_SESSION['email'];
// Obtener los permisos del usuario
$userPermits = get_user_permit($usuarios);

if ($userPermits !== 'Administrador') {
    // Si el usuario no es administrador, mostrar un mensaje y salir
    header("Location: permiso_denegado.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | manage accounts</title>
    <?php include './action/inc/link.php'?>
    <main class="main">
        <div class="container container_max">
            <?php include 'action/inc/header.php'?>
            <section class="form_contender">
                <div class="form_manage">
                    <div class="head">
                        <h2>Accounts <i class="ai-people-multiple"></i>
                            <p>Authorized only for administrators</p>
                         </h2>
                         <ul class="searcher_contender">
                            <li class="searcher_icon"><i class="ai-search sz24"></i></li>
                            <li class="searcher"><input type="search" placeholder="search"></li>
                        </ul>
                    </div>
                    <!--Table Title-->
                    <div class="t_head">
                        <div class="contender">
                            <article class="table">
                            <div class="table_item">
                                <div class="column">
                                    <div class="column-2 outline">
                                        <div class="title">Id</div>
                                    </div>
                                    <div class="column-5 outline">
                                        <div class="title">Name</div>
                                    </div>

                                    <div class="column-5 outline">
                                        <div class="title">Lastname</div>
                                    </div>

                                </div>
                            </div>

                            <div class="table_item">
                                <div class="column">
                                    <div class="column-3 outline">
                                        <div class="title">User</div>
                                    </div>
                                    <div class="column-3 outline">
                                        <div class="title">Code</div>
                                    </div>
                                    <div class="column-6 outline">
                                        <div class="title">Email</div>
                                    </div>
                                </div>
                            </div>

                            <div class="table_item">
                                <div class="column">
                                    <div class="column-4 outline">
                                        <div class="title">Status</div>
                                    </div>
                                    <div class="column-4 outline">
                                        <div class="title">Available</div>
                                    </div>
                                    <div class="column-4 outline">
                                        <div class="title">Action</div>
                                    </div>
                                </div>
                            </div>
                            </article>
                        </div>
                    </div>
                    <!--Table Info-->
                    <div class="t_body">
                        <div class="contender">
                        <?php foreach ($usuarios as $usuario) { ?>
                            <article class="table">
                                <div class="table_item">
                                    <div class="column">
                                        <div class="column-2 outline">
                                            <div class="date"><?php echo $usuario['IdUsuario']; ?></div>
                                        </div>
                                        <div class="column-5 outline">
                                            <div class="date"><?php echo $usuario['Nombres']; ?></div>
                                        </div>
                            
                                        <div class="column-5 outline">
                                            <div class="date"><?php echo $usuario['Apellidos']; ?></div>
                                        </div>
                            
                                    </div>
                                </div>
                            
                                <div class="table_item">
                                    <div class="column">
                                        <div class="column-3 outline">
                                            <div class="date"><?php echo $usuario['Usuario']; ?></div>
                                        </div>
                                        <div class="column-3 outline">
                                            <div class="date"><?php echo $usuario['CodUsuario']; ?></div>
                                        </div>
                                        <div class="column-6 outline">
                                            <div class="date"><?php echo $usuario['Email']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="table_item">
                                    <div class="column">
                                        <div class="column-4 outline">
                                            <div class="date">
                                                <div class="bg_third color_verify label"><?php echo $usuario['Estado']; ?></div>
                                            </div>
                                        </div>
                                        <div class="column-4 outline">
                                            <div class="date">
                                                <div class="label">ONLINE</div>
                                            </div>
                                        </div>
                                        <div class="column-4 outline">
                                            <div class="date">
                                                <div class="actions">
                                                    <a class="btn_abrir"><i class="ai-eye-open"></i></a>
                                                    <?php include 'action/inc/actions/view.php'?>
                                                    <a class="btn_abrir"><i class="ai-pencil"></i></a>
                                                     <?php include 'action/inc/actions/edit.php'?>
                                                    <a class="btn_abrir"><i class="ai-trash-can"></i></a>
                                                     <?php include 'action/inc/actions/delete.php'?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'action/inc/footer.php'?>
    </main>
</body>
</html>