<?php
include 'connection.php'; //  Data base Integration

function verificar_credenciales($email, $password, $conn) {
    // Preparamos la consulta para evitar inyecciones SQL
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificamos si se encontró algún usuario con las credenciales proporcionadas
    if ($result->num_rows === 1) {
        return true; // Credenciales válidas
    } else {
        return false; // Credenciales inválidas
    }
}
function iniciar_sesion($email) {
    // Guarda session
    session_start();
    $_SESSION['email'] = $email;
}
// Verificar si se han enviado datos de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validación de credenciales
    $conn = Db::connect(); // Conectamos a la base de datos
    if (verificar_credenciales($email, $password, $conn)) {
        // Iniciar sesión y redirigir al usuario a una página de bienvenida
        iniciar_sesion($email);
        header("Location: ../");
        exit();
    } else {
        // Si las credenciales son incorrectas, redirigir al usuario de vuelta al formulario de inicio de sesión
        header("Location: ../login.php?error=credenciales_invalidas");
        exit();
    }
}