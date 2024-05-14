<?php
include 'connection.php';

function register_user($codUsuario, $usuario, $password, $nombres, $apellidos, $email, $permisos, $estado, $fechaRegistro) {
    $conn = Db::connect(); // Conectar a la base de datos
    
    // Preparar la consulta SQL para realizar la inserción
    $query = "INSERT INTO users (CodUsuario, Usuario, Password, Nombres, Apellidos, Email, Permisos, Estado, FechaRegistro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssss", $codUsuario, $usuario, $password, $nombres, $apellidos, $email, $permisos, $estado, $fechaRegistro);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Inserción exitosa
        return true;
    } else {
        // Error al insertar los datos
        return false;
    }
}

function get_user() {
    $conn = Db::connect();
    $UserActual = $_SESSION['email'];
    // Database query
    $query = "SELECT * FROM users WHERE Email = '$UserActual'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $usuarios = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
        mysqli_free_result($result);
        return $usuarios;
    } else {
        return false;
    }
}
function show_users(){
    $conn = Db::connect();
    // Database query
    $query = "SELECT * FROM users WHERE Permisos = 'Usuario normal'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $usuarios = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
        mysqli_free_result($result);
        return $usuarios;
    } else {
        return false;
    }
}

function modify_user($nombres, $apellidos, $usuario, $password, $fechaModificacion) {
    $conn = Db::connect(); // Connect to the database
    $UserActual = $_SESSION['email'];

    // Verify password
    $consulta = "SELECT * FROM users WHERE Email = '$UserActual' AND Password = '$password'";
    $resultado = mysqli_query($conn, $consulta);
    $fila = mysqli_fetch_assoc($resultado);
    
    if ($fila) {
        $actualizar = "UPDATE users SET Nombres = '$nombres', Apellidos = '$apellidos', Usuario = '$usuario', FechaModificacion = '$fechaModificacion' WHERE Email = '$UserActual'";
        $resultado_actualizacion = mysqli_query($conn, $actualizar);

        if ($resultado_actualizacion) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function get_permits() {
    $conn = Db::connect(); // Conectar a la base de datos
    $query = "SHOW COLUMNS FROM users LIKE 'Permisos'";
    $result = mysqli_query($conn, $query);
    
    // Extraer los valores del enum Permisos
    $row = mysqli_fetch_assoc($result);
    preg_match_all("/'(.*?)'/", $row['Type'], $matches);
    $permits = $matches[1];
    
    return $permits;
}

function get_status() {
    $conn = Db::connect(); // Conectar a la base de datos
    $query = "SHOW COLUMNS FROM users LIKE 'Estado'";
    $result = mysqli_query($conn, $query);
    
    // Extraer los valores del enum Estados
    $row = mysqli_fetch_assoc($result);
    preg_match_all("/'(.*?)'/", $row['Type'], $matches);
    $status = $matches[1];
    
    return $status;
}
function modify_status($estado) {
    $conn = Db::connect(); // Conectar a la base de datos
    
    // Preparar la consulta SQL para actualizar el estado
    $query = "UPDATE users SET Estado = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $estado);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Actualización exitosa, refrescar la página
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        // Error al actualizar el estado
        return false;
    }
}

function delete_user($idUsuario) {
    $conn = Db::connect(); // Conectar a la base de datos
    
    // Preparar la consulta SQL para eliminar al usuario por su ID
    $query = "DELETE FROM users WHERE IdUsuario = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUsuario);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Eliminación exitosa
        return true;
    } else {
        // Error al eliminar el usuario
        return false;
    }
}
