-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-05-2024 a las 22:16:59
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_adminuser`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `CodUsuario` varchar(100) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Permisos` enum('Administrador','Usuario normal') NOT NULL,
  `Estado` enum('Activo','Desactivo','Eliminado','Bloqueado') NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`IdUsuario`, `CodUsuario`, `Usuario`, `Password`, `Nombres`, `Apellidos`, `Email`, `Permisos`, `Estado`, `FechaRegistro`, `FechaModificacion`) VALUES
(1, 'U08i20', 'anibalD', 'anibalD', 'Anibal Dayron', 'Anderson Rua', 'anibalD@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:03:20', NULL),
(2, 'U08i01', 'bryanD', 'bryanD', 'Bryan Dylan', 'Ramos Durand', 'bryanD@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:04:01', NULL),
(3, 'U08i59', 'carlosF', 'carlosF', 'Carlos Melo', 'Francia Perez', 'carlosF@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:04:59', NULL),
(4, 'U08i03', 'damianF', 'damianF', 'Damian Enner', 'Montenegro Diaz', 'damianF@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:06:03', NULL),
(5, 'U08i52', 'eduardoB', 'eduardoB', 'Eduardo', 'Brunner Lima', 'eduardoB@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:06:52', NULL),
(6, 'U08i50', 'faridL', 'faridL', 'Farid Luca', 'Rivas AcuÃ±a', 'faridL@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:07:50', NULL),
(7, 'U08i38', 'gabrielV', 'gabrielV', 'Gabriel Elmer', 'Villas Rua', 'gabrielV@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:08:38', NULL),
(8, 'U08i48', 'helenaJ', 'helenaJ', 'Helena Bria', 'Jimenez Diaz', 'helenaJ@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:09:48', NULL),
(9, 'U08i43', 'irinaR', 'irinaR', 'Irina Carmen', 'De la Rosa Mendez', 'irinaR@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:10:43', NULL),
(10, 'U08i58', 'jordiP', 'jordiP', 'Jordi ENP', 'Patricio Anders', 'jordiP@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:11:58', NULL),
(11, 'U08i58', 'katherineL', 'katherineL', 'Katherine ', 'Limas Vega', 'katherineL@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:12:58', NULL),
(12, 'U08i38', 'lucasS', 'lucasS', 'Lucas Marcos', 'Santos Villa', 'lucasS@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:13:38', NULL),
(13, 'U08i18', 'marleneD', 'marleneD', 'Marlene', 'Diaz Buitron', 'marleneD@gmail.com', 'Usuario normal', 'Activo', '2024-05-08 22:14:18', NULL),
(14, 'U08i02', 'elkinR', 'elkinR', 'Elkin', 'Jenner Rivera', 'elkinR@gmail.com', 'Administrador', 'Activo', '2024-05-08 22:15:02', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
