<?php
session_start();
// Verificar si la sesión no está iniciada
if (isset($_SESSION['email'])) {
    // Redireccionar al usuario a la página de inicio de sesión
    header("Location: ./");
    exit();
}
// Si la sesión está iniciada, podemos mostrar el contenido de la página
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | Login</title>
    <?php include 'action/inc/link.php'?>
    <main class="main">
        <div class="container container_max">
           <?php include 'action/inc/header.php'?>
            <section class="form_contender">
                <div class="form_login">
                    <div class="head">
                        <h2>Sign in <i class='bx bx-user-circle'></i>
                            <p>Don’t have an account? <a href="register.php">Register</a></p>
                        </h2>
                    </div>
                    <div class="body">
                        <form method="post" action="action/session.php">
                            <label>Email</label>
                            <input type="text" name="email">
                            <label>Password</label>
                            <input type="password" name="password">
                            <button type="submit">Login<i class="ai-arrow-up-right"></i></button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include 'action/inc/footer.php'; ?>
</body>
</html>