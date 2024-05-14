<?php
require_once "connection.php";

$CuentaEliminar = $_GET["idUsuario"];
$conn = Db::connect();
$eliminar = "DELETE FROM users WHERE IdUsuario ='$CuentaEliminar'";
$resultado = mysqli_query($con, $eliminar);
if($resultado){
    echo"<script>alert('Dato eliminado correctamente'); window.location.href = '../account.php'</script>";
}
else{
    echo"<script>alert('Ocurrio un problema'); window.location.href = '../account.php'</script>";
}
?>