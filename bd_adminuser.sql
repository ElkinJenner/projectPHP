CREATE TABLE IF NOT EXISTS bd_adminuser.users (
  IdUsuario INT NOT NULL AUTO_INCREMENT,
  CodUsuario VARCHAR(100) NOT NULL,
  Usuario VARCHAR(100) NOT NULL,
  Password VARCHAR(100) NOT NULL,
  Nombres VARCHAR(100) NOT NULL,
  Apellidos VARCHAR(100) NOT NULL,
  Email VARCHAR(100) NOT NULL,
  Permisos ENUM('Administrador','Usuario normal') NOT NULL,
  Estado ENUM('Activo','Desactivo','Eliminado','Bloqueado') NOT NULL,
  FechaRegistro DATETIME NOT NULL,
  FechaModificacion DATETIME NULL,
  PRIMARY KEY (IdUsuario)
);