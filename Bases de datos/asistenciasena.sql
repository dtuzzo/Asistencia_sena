-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2020 a las 02:35:30
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistenciasena`
--
CREATE DATABASE IF NOT EXISTS `asistenciasena` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `asistenciasena`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `ACTUALIZAR_APRENDIZ`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_APRENDIZ` (IN `tipodocumento_aprendiz_U` VARCHAR(20), IN `numerodocumento_aprendiz_U` INT, IN `nombre_aprendiz_U` VARCHAR(30), IN `apellido_aprendiz_U` VARCHAR(30), IN `celular_aprendiz_U` BIGINT(20), IN `correosena_aprendiz_U` VARCHAR(40), IN `correopersonal_aprendiz_U` VARCHAR(40), IN `id_aprendiz_U` INT, IN `id_estado_fk_U` INT, IN `id_ficha_fk_U` INT)  BEGIN
UPDATE aprendiz SET
tipodocumento_aprendiz = tipodocumento_aprendiz_U,
numerodocumento_aprendiz = numerodocumento_aprendiz_U,
nombre_aprendiz = nombre_aprendiz_U,
apellido_aprendiz = apellido_aprendiz_U,
celular_aprendiz = celular_aprendiz_U,
correosena_aprendiz = correosena_aprendiz_U,
correopersonal_aprendiz = correopersonal_aprendiz_U,
id_estado_fk = id_estado_fk_U,
id_ficha_fk = id_ficha_fk_U
WHERE id_aprendiz = id_aprendiz_U;
END$$

DROP PROCEDURE IF EXISTS `ACTUALIZAR_ASISTENCIA`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_ASISTENCIA` (IN `id_asistencia_U` INT, IN `tipo_asistencia_U` VARCHAR(15))  BEGIN
UPDATE asistencia SET

tipo_asistencia = tipo_asistencia_U

WHERE id_asistencia = id_asistencia_U;

END$$

DROP PROCEDURE IF EXISTS `ACTUALIZAR_FUNCIONARIO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_FUNCIONARIO` (IN `numerodocumento_funcionario_U` INT, IN `nombre_funcionario_U` VARCHAR(30), IN `apellido_funcionario_U` VARCHAR(30), IN `celular_funcionario_U` VARCHAR(20), IN `correo_funcionario_U` VARCHAR(40), IN `id_rol_fk_U` INT, IN `id_funcionario_U` INT)  BEGIN
UPDATE funcionario SET  
numerodocumento_funcionario =  numerodocumento_funcionario_U,
nombre_funcionario = nombre_funcionario_U,
apellido_funcionario = apellido_funcionario_U,
celular_funcionario = celular_funcionario_U,
correo_funcionario = correo_funcionario_U,
id_rol_fk = id_rol_fk_U

WHERE id_funcionario = id_funcionario_U;

END$$

DROP PROCEDURE IF EXISTS `ACTUALIZAR_PERFIL_FUNCIONARIO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_PERFIL_FUNCIONARIO` (IN `id_funcionario_P` INT, IN `id_nombre_P` VARCHAR(30), IN `id_apellido_P` VARCHAR(30), IN `id_celular_P` VARCHAR(20), IN `id_contra_P` VARCHAR(100))  BEGIN
UPDATE funcionario SET  

nombre_funcionario = id_nombre_P,
apellido_funcionario = id_apellido_P,
celular_funcionario = id_celular_P,
clave_funcionario = id_contra_P

WHERE id_funcionario = id_funcionario_P;

END$$

DROP PROCEDURE IF EXISTS `ELIMINAR_APRENDIZ`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_APRENDIZ` (IN `id_aprendiz_D` INT)  BEGIN
DELETE FROM aprendiz WHERE id_aprendiz = id_aprendiz_D;
END$$

DROP PROCEDURE IF EXISTS `ELIMINAR_FUNCIONARIO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_FUNCIONARIO` (IN `id_funcionario_D` INT)  BEGIN
DELETE FROM detalle_materia_funcionario WHERE id_funcionario_fk = id_funcionario_D;
DELETE FROM funcionario WHERE id_funcionario = id_funcionario_D;
END$$

DROP PROCEDURE IF EXISTS `INSERTAR_APRENDIZ`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTAR_APRENDIZ` (IN `tipodocumento_aprendiz` VARCHAR(5), IN `numerodocumento_aprendiz` BIGINT(15), IN `nombre_aprendiz` VARCHAR(30), IN `apellido_aprendiz` VARCHAR(30), IN `celular_aprendiz` VARCHAR(20), IN `correosena_aprendiz` VARCHAR(40), IN `correopersonal_aprendiz` VARCHAR(40), IN `id_estado_fk` INT, IN `id_ficha_fk` INT)  BEGIN 
INSERT INTO aprendiz (tipodocumento_aprendiz, numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, celular_aprendiz, correosena_aprendiz, correopersonal_aprendiz, id_estado_fk, id_ficha_fk)
VALUES (tipodocumento_aprendiz, numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, celular_aprendiz, correosena_aprendiz, correopersonal_aprendiz, id_estado_fk, id_ficha_fk);
END$$

DROP PROCEDURE IF EXISTS `INSERTAR_ASISTENCIA`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTAR_ASISTENCIA` (IN `tipo_asistencia` VARCHAR(15))  BEGIN
INSERT INTO asistencia (fecha_registro, tipo_asistencia)
VALUES (fecha_registro = CURDATE(), tipo_asistencia);
END$$

DROP PROCEDURE IF EXISTS `INSERTAR_FUNCIONARIO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTAR_FUNCIONARIO` (IN `numerodocumento_funcionario` INT, IN `nombre_funcionario` VARCHAR(30), IN `apellido_funcionario` VARCHAR(30), IN `celular_funcionario` VARCHAR(20), IN `correo_funcionario` VARCHAR(40), IN `clave_funcionario` VARCHAR(30), IN `id_rol_fk` INT)  BEGIN
INSERT INTO funcionario (numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, correo_funcionario, clave_funcionario, id_rol_fk)
VALUES (numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, correo_funcionario, clave_funcionario, id_rol_fk);
END$$

DROP PROCEDURE IF EXISTS `ObtenerRegistrosAprendiz`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerRegistrosAprendiz` (IN `id_aprendiz_O` INT)  BEGIN
SELECT
aprendiz.id_aprendiz, aprendiz.tipodocumento_aprendiz, aprendiz.numerodocumento_aprendiz, 
aprendiz.nombre_aprendiz, aprendiz.apellido_aprendiz, aprendiz.celular_aprendiz, 
aprendiz.correosena_aprendiz, aprendiz.correopersonal_aprendiz, estado.nombre_estado, ficha.numero_ficha
FROM APRENDIZ

INNER JOIN ficha
ON ficha.id_ficha = aprendiz.id_ficha_fk

INNER JOIN estado 
ON estado.id_estado = aprendiz.id_estado_fk

WHERE id_aprendiz = id_aprendiz_O;
END$$

DROP PROCEDURE IF EXISTS `ObtenerRegistrosAsistencia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerRegistrosAsistencia` (IN `id_asistencia_O` INT)  BEGIN
SELECT
asistencia.id_asistencia 
FROM asistencia 

WHERE id_asistencia = id_asistencia_O;
END$$

DROP PROCEDURE IF EXISTS `ObtenerRegistrosFuncionario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerRegistrosFuncionario` (IN `id_funcionario_O` INT)  BEGIN
SELECT
funcionario.id_funcionario, funcionario.numerodocumento_funcionario, funcionario.nombre_funcionario, 
funcionario.apellido_funcionario,funcionario.celular_funcionario, funcionario.correo_funcionario, rol.id_rol
FROM funcionario
INNER JOIN rol
ON rol.id_rol = funcionario.id_rol_fk
INNER JOIN detalle_materia_funcionario
ON detalle_materia_funcionario.id_funcionario_fk = funcionario.id_funcionario
WHERE id_funcionario = id_funcionario_O;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

DROP TABLE IF EXISTS `aprendiz`;
CREATE TABLE `aprendiz` (
  `id_aprendiz` int(11) NOT NULL,
  `tipodocumento_aprendiz` varchar(5) NOT NULL,
  `numerodocumento_aprendiz` bigint(15) NOT NULL,
  `nombre_aprendiz` varchar(30) NOT NULL,
  `apellido_aprendiz` varchar(30) NOT NULL,
  `celular_aprendiz` varchar(20) NOT NULL,
  `correosena_aprendiz` varchar(40) NOT NULL,
  `correopersonal_aprendiz` varchar(40) NOT NULL,
  `id_estado_fk` int(11) NOT NULL,
  `id_ficha_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id_aprendiz`, `tipodocumento_aprendiz`, `numerodocumento_aprendiz`, `nombre_aprendiz`, `apellido_aprendiz`, `celular_aprendiz`, `correosena_aprendiz`, `correopersonal_aprendiz`, `id_estado_fk`, `id_ficha_fk`) VALUES
(1, 'C.C', 1001191862, 'Julian Esteban', 'Ramirez Cajamarca', '3194689993', 'jeramirez2681@misena.edu.co', 'julian.ramirez02@hotmail.com', 1, 1),
(2, 'C.C', 1004683516, 'Simon Eduardo', 'Jimenez', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@misena.edu.co', 1, 1),
(3, 'T.I', 1000732706, 'Brandon Sneider', 'Serrato Toro', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(4, 'T.I', 1001187361, 'Brayam Andres', 'Blanco Candela', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(5, 'T.I', 1000851577, 'Cristian Arturo', 'Parra Gonzalez', '123456', 'sejimenez61@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(6, 'T.I', 1001274848, 'Cristian Danilo', 'Avila Ramirez', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(7, 'T.I', 1031120272, 'Cristian David', 'Runza Quiroga', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(8, 'C.C', 1007008202, 'Daniel José', 'Tuzzo Torres', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(9, 'C.C', 1000271435, 'Edisson Gabriel', 'Lopez Salamanca', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(10, 'T.I', 1002937899, 'Ervin Erney', 'Penna Cardenas', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(11, 'T.I', 1125082670, 'Gynet', 'Amado Duarte', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(12, 'T.I', 1000625717, 'Harold Stiven', 'Camargo Castellanos', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(13, 'C.C', 1000988526, 'Hector Andres', 'Cardenas Riaño', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(14, 'C.C', 1127600677, 'Henry Daniel', 'Carvajal Aguilar', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(15, 'T.I', 1001061192, 'Ivan Alejandro', 'Lopez Fracica', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(16, 'T.I', 1000707099, 'Jaider Felipe', 'Moreno Traslaviña', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(17, 'T.I', 1000320734, 'Javier Alejandro', 'Sanchez Salamanca', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(18, 'T.I', 1000860009, 'Jean Paul', 'Espinosa Ortiz', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(19, 'T.I', 1007477669, 'Jonathan Danilo', 'Bohorquez Madrid', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(20, 'C.C', 1006814000, 'Juan Esteban', 'Velez Perilla', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(21, 'T.I', 1000228032, 'Julian David', 'Moreno Martinez', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(22, 'T.I', 1000694636, 'Kevin Santiago', 'Jimenez Salamanca', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(23, 'T.I', 1000574148, 'Luis Fernando', 'Amado Lopez', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(24, 'T.I', 1001095022, 'Santiago', 'Reyes Buitrago', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(25, 'C.C', 1000620334, 'Yeremit Andrey', 'Rodriguez Cordoba', '123456', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1),
(26, 'C.C', 2147483647, 'Camila', 'Munevar', '3333333', 'CorreoPrueba@misena.edu.co', 'CorreoPrueba@hotmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `tipo_asistencia` varchar(15) DEFAULT NULL,
  `id_aprendiz_fk` int(11) NOT NULL,
  `id_funcionario_fk` int(11) NOT NULL,
  `id_materia_fk` int(11) NOT NULL,
  `id_ficha_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha_registro`, `tipo_asistencia`, `id_aprendiz_fk`, `id_funcionario_fk`, `id_materia_fk`, `id_ficha_fk`) VALUES
(1, '2020-10-29', 'Asistio', 1, 14, 3, 1),
(2, '2020-10-29', 'Asistio', 2, 14, 3, 1),
(3, '2020-10-29', 'Asistio', 3, 14, 3, 1),
(4, '2020-10-29', 'Retardo', 4, 14, 3, 1),
(5, '2020-10-29', 'Falla', 5, 14, 3, 1),
(6, '2020-10-29', 'Asistio', 6, 14, 3, 1),
(7, '2020-10-29', 'Asistio', 7, 14, 3, 1),
(8, '2020-10-29', 'Falla', 8, 14, 3, 1),
(9, '2020-10-29', 'Asistio', 9, 14, 3, 1),
(10, '2020-10-29', 'Asistio', 10, 14, 3, 1),
(11, '2020-10-29', 'Asistio', 11, 14, 3, 1),
(12, '2020-10-29', 'Falla', 12, 14, 3, 1),
(13, '2020-10-29', 'Asistio', 13, 14, 3, 1),
(14, '2020-10-29', 'Falla', 14, 14, 3, 1),
(15, '2020-10-29', 'Asistio', 15, 14, 3, 1),
(16, '2020-10-29', 'Asistio', 16, 14, 3, 1),
(17, '2020-10-29', 'Asistio', 17, 14, 3, 1),
(18, '2020-10-29', 'Falla', 18, 14, 3, 1),
(19, '2020-10-29', 'Asistio', 19, 14, 3, 1),
(20, '2020-10-29', 'Asistio', 20, 14, 3, 1),
(21, '2020-10-29', 'Asistio', 21, 14, 3, 1),
(22, '2020-10-29', 'Asistio', 22, 14, 3, 1),
(23, '2020-10-29', 'Retardo', 23, 14, 3, 1),
(24, '2020-10-29', 'Falla', 24, 14, 3, 1),
(25, '2020-10-29', 'Falla', 25, 14, 3, 1),
(26, '2020-10-30', NULL, 1, 14, 3, 1),
(27, '2020-10-30', NULL, 2, 14, 3, 1),
(28, '2020-10-30', 'Retardo', 3, 14, 3, 1),
(29, '2020-10-30', 'Asistio', 4, 14, 3, 1),
(30, '2020-10-30', NULL, 5, 14, 3, 1),
(31, '2020-10-30', NULL, 6, 14, 3, 1),
(32, '2020-10-30', NULL, 7, 14, 3, 1),
(33, '2020-10-30', NULL, 8, 14, 3, 1),
(34, '2020-10-30', NULL, 9, 14, 3, 1),
(35, '2020-10-30', NULL, 10, 14, 3, 1),
(36, '2020-10-30', NULL, 11, 14, 3, 1),
(37, '2020-10-30', NULL, 12, 14, 3, 1),
(38, '2020-10-30', NULL, 13, 14, 3, 1),
(39, '2020-10-30', NULL, 14, 14, 3, 1),
(40, '2020-10-30', NULL, 15, 14, 3, 1),
(41, '2020-10-30', NULL, 16, 14, 3, 1),
(42, '2020-10-30', NULL, 17, 14, 3, 1),
(43, '2020-10-30', NULL, 18, 14, 3, 1),
(44, '2020-10-30', NULL, 19, 14, 3, 1),
(45, '2020-10-30', NULL, 20, 14, 3, 1),
(46, '2020-10-30', NULL, 21, 14, 3, 1),
(47, '2020-10-30', NULL, 22, 14, 3, 1),
(48, '2020-10-30', NULL, 23, 14, 3, 1),
(49, '2020-10-30', NULL, 24, 14, 3, 1),
(50, '2020-10-30', NULL, 25, 14, 3, 1),
(51, '2020-10-30', NULL, 1, 14, 3, 1),
(52, '2020-10-30', NULL, 2, 14, 3, 1),
(53, '2020-10-30', NULL, 3, 14, 3, 1),
(54, '2020-10-30', NULL, 4, 14, 3, 1),
(55, '2020-10-30', NULL, 5, 14, 3, 1),
(56, '2020-10-30', NULL, 6, 14, 3, 1),
(57, '2020-10-30', NULL, 7, 14, 3, 1),
(58, '2020-10-30', NULL, 8, 14, 3, 1),
(59, '2020-10-30', NULL, 9, 14, 3, 1),
(60, '2020-10-30', NULL, 10, 14, 3, 1),
(61, '2020-10-30', NULL, 11, 14, 3, 1),
(62, '2020-10-30', NULL, 12, 14, 3, 1),
(63, '2020-10-30', NULL, 13, 14, 3, 1),
(64, '2020-10-30', NULL, 14, 14, 3, 1),
(65, '2020-10-30', NULL, 15, 14, 3, 1),
(66, '2020-10-30', NULL, 16, 14, 3, 1),
(67, '2020-10-30', NULL, 17, 14, 3, 1),
(68, '2020-10-30', NULL, 18, 14, 3, 1),
(69, '2020-10-30', NULL, 19, 14, 3, 1),
(70, '2020-10-30', NULL, 20, 14, 3, 1),
(71, '2020-10-30', NULL, 21, 14, 3, 1),
(72, '2020-10-30', NULL, 22, 14, 3, 1),
(73, '2020-10-30', NULL, 23, 14, 3, 1),
(74, '2020-10-30', NULL, 24, 14, 3, 1),
(75, '2020-10-30', NULL, 25, 14, 3, 1),
(76, '2020-10-30', 'Falla', 26, 14, 3, 1),
(77, '2020-10-30', NULL, 1, 14, 3, 1),
(78, '2020-10-30', NULL, 2, 14, 3, 1),
(79, '2020-10-30', NULL, 3, 14, 3, 1),
(80, '2020-10-30', NULL, 4, 14, 3, 1),
(81, '2020-10-30', NULL, 5, 14, 3, 1),
(82, '2020-10-30', NULL, 6, 14, 3, 1),
(83, '2020-10-30', NULL, 7, 14, 3, 1),
(84, '2020-10-30', NULL, 8, 14, 3, 1),
(85, '2020-10-30', NULL, 9, 14, 3, 1),
(86, '2020-10-30', NULL, 10, 14, 3, 1),
(87, '2020-10-30', NULL, 11, 14, 3, 1),
(88, '2020-10-30', NULL, 12, 14, 3, 1),
(89, '2020-10-30', NULL, 13, 14, 3, 1),
(90, '2020-10-30', NULL, 14, 14, 3, 1),
(91, '2020-10-30', NULL, 15, 14, 3, 1),
(92, '2020-10-30', NULL, 16, 14, 3, 1),
(93, '2020-10-30', NULL, 17, 14, 3, 1),
(94, '2020-10-30', NULL, 18, 14, 3, 1),
(95, '2020-10-30', NULL, 19, 14, 3, 1),
(96, '2020-10-30', NULL, 20, 14, 3, 1),
(97, '2020-10-30', NULL, 21, 14, 3, 1),
(98, '2020-10-30', NULL, 22, 14, 3, 1),
(99, '2020-10-30', NULL, 23, 14, 3, 1),
(100, '2020-10-30', NULL, 24, 14, 3, 1),
(101, '2020-10-30', NULL, 25, 14, 3, 1),
(102, '2020-10-30', NULL, 26, 14, 3, 1),
(105, '0000-00-00', 'Falla', 5, 1, 3, 1),
(106, '0000-00-00', 'Falla', 5, 1, 3, 1),
(107, '0000-00-00', 'Falla', 5, 1, 3, 1),
(108, '0000-00-00', 'Falla', 5, 1, 3, 1),
(109, '2020-12-03', 'Asistio', 1, 4, 6, 1),
(110, '2020-12-03', 'Asistio', 2, 4, 6, 1),
(111, '2020-12-03', 'Asistio', 3, 4, 6, 1),
(112, '2020-12-03', 'Asistio', 4, 4, 6, 1),
(113, '2020-12-03', 'Falla', 5, 4, 6, 1),
(114, '2020-12-03', 'Falla', 6, 4, 6, 1),
(115, '2020-12-03', 'Asistio', 7, 4, 6, 1),
(116, '2020-12-03', 'Asistio', 8, 4, 6, 1),
(117, '2020-12-03', 'Asistio', 9, 4, 6, 1),
(118, '2020-12-03', 'Asistio', 10, 4, 6, 1),
(119, '2020-12-03', 'Asistio', 11, 4, 6, 1),
(120, '2020-12-03', 'Falla', 12, 4, 6, 1),
(121, '2020-12-03', 'Retardo', 13, 4, 6, 1),
(122, '2020-12-03', 'Excusado', 14, 4, 6, 1),
(123, '2020-12-03', 'Falla', 15, 4, 6, 1),
(124, '2020-12-03', 'Asistio', 16, 4, 6, 1),
(125, '2020-12-03', 'Asistio', 17, 4, 6, 1),
(126, '2020-12-03', 'Asistio', 18, 4, 6, 1),
(127, '2020-12-03', 'Asistio', 19, 4, 6, 1),
(128, '2020-12-03', 'Falla', 20, 4, 6, 1),
(129, '2020-12-03', 'Falla', 21, 4, 6, 1),
(130, '2020-12-03', 'Asistio', 22, 4, 6, 1),
(131, '2020-12-03', NULL, 23, 4, 6, 1),
(132, '2020-12-03', 'Asistio', 24, 4, 6, 1),
(133, '2020-12-03', 'Falla', 25, 4, 6, 1),
(134, '2020-12-03', 'Asistio', 26, 4, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ficha_funcionario`
--

DROP TABLE IF EXISTS `detalle_ficha_funcionario`;
CREATE TABLE `detalle_ficha_funcionario` (
  `id_detalle` int(11) NOT NULL,
  `id_ficha_fk` int(11) NOT NULL,
  `id_funcionario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_ficha_funcionario`
--

INSERT INTO `detalle_ficha_funcionario` (`id_detalle`, `id_ficha_fk`, `id_funcionario_fk`) VALUES
(1, 1, 3),
(2, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_materia_funcionario`
--

DROP TABLE IF EXISTS `detalle_materia_funcionario`;
CREATE TABLE `detalle_materia_funcionario` (
  `id_detalle` int(11) NOT NULL,
  `id_materia_fk` int(11) NOT NULL,
  `id_funcionario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_materia_funcionario`
--

INSERT INTO `detalle_materia_funcionario` (`id_detalle`, `id_materia_fk`, `id_funcionario_fk`) VALUES
(1, 1, 2),
(2, 13, 3),
(3, 6, 4),
(4, 7, 5),
(5, 9, 6),
(6, 13, 7),
(7, 12, 8),
(8, 11, 9),
(9, 11, 10),
(10, 10, 11),
(11, 1, 12),
(12, 9, 13),
(13, 4, 14),
(14, 2, 15),
(15, 3, 16),
(16, 5, 17),
(17, 8, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'Activo'),
(2, 'Desertado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE `ficha` (
  `id_ficha` int(11) NOT NULL,
  `numero_ficha` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_materia_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `numero_ficha`, `fecha_inicio`, `fecha_fin`, `id_materia_fk`) VALUES
(1, 2056293, '2020-10-22', '2021-06-16', 1),
(2, 2056294, '2020-10-23', '2021-06-16', 1),
(3, 2056283, '2020-10-23', '2021-06-16', 1),
(4, 2059357, '2020-10-29', '2021-06-16', 1),
(5, 2059344, '2020-10-29', '2021-06-16', 1),
(6, 2059350, '2020-10-29', '2021-06-16', 1),
(7, 2056357, '2020-10-29', '2021-06-16', 1),
(8, 2059348, '2020-10-29', '2021-06-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `numerodocumento_funcionario` int(11) NOT NULL,
  `nombre_funcionario` varchar(30) NOT NULL,
  `apellido_funcionario` varchar(30) NOT NULL,
  `celular_funcionario` varchar(20) NOT NULL,
  `correo_funcionario` varchar(40) NOT NULL,
  `clave_funcionario` varchar(100) NOT NULL,
  `id_rol_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `numerodocumento_funcionario`, `nombre_funcionario`, `apellido_funcionario`, `celular_funcionario`, `correo_funcionario`, `clave_funcionario`, `id_rol_fk`) VALUES
(1, 123456789, 'Gustavo', 'Beltran', '3134321234', 'gubelma@misena.edu.co', '123', 2),
(2, 51948055, 'Julian Ricardo', 'Urrea Mantilla', '3195854269', 'CorreoPrueba@gmail.com', '657048ab24', 1),
(3, 75422213, 'Uldarico', 'Andrade Hernandez', '3124543211', 'CorreoPrueba@gmail.com', '801bb9aad2', 1),
(4, 66428890, 'José Fernando', 'Galindo Suárez', '3134811255', 'CorreoPrueba@gmail.com', 'b8a7a0afee', 1),
(5, 12215567, 'Carolina', 'Forero Sanchez', '3123966543', 'CorreoPrueba@gmail.com', '6be110afbf', 1),
(6, 90985541, 'Yury Yasmin', 'Palacios Yate', '3114555432', 'CorreoPrueba@gmail.com', '9c31d40a1b', 1),
(7, 11344378, 'Luisa Fernanda', 'Reyes Ramirez', '3199677543', 'CorreoPrueba@gmail.com', 'e3ce96842b', 1),
(8, 71999869, 'Andrea del Pilar', 'Ramos Caicedo', '320544399', 'CorreoPrueba@gmail.com', '8ea9cda3e4', 1),
(9, 11434789, 'Cristian', 'Buitrago Ortega', '3196577665', 'CorreoPrueba@gmail.com', '85461a2ab9', 1),
(10, 871123320, 'Adriana', 'Duarte Mateus', '315555675', 'CorreoPrueba@gmail.com', 'c1ea315758', 1),
(11, 10045529, 'Luis Enrique', 'Baquero Ramirez', '3194889994', 'CorreoPrueba@gmail.com', '45e0c5ed59', 1),
(12, 10909087, 'Alejandro', 'Munevar Betancourt', '3104333456', 'CorreoPrueba@gmail.com', 'e29f92ba5d', 1),
(13, 90098894, 'Sandra Liliana', 'Rodriguez Tellez', '312876543', 'CorreoPrueba@gmail.com', 'e974f0339b', 1),
(14, 61211234, 'Erick', 'Granados Torres', '3200900987', 'CorreoPrueba@gmail.com', '22f5a4e82d', 1),
(15, 66090120, 'Jesús ', 'Ropero Barbosa', '310778555', 'CorreoPrueba@gmail.com', 'b928c040eb', 1),
(16, 33286868, 'Amparo', 'Rueda Jaimes', '313666690', 'CorreoPrueba@gmail.com', '74692305fd', 1),
(17, 88443121, 'Sandra Yanneth', 'Rueda Guevara', '3114885541', 'CorreoPrueba@gmail.com', '223511a38a', 1),
(18, 79009909, 'Jorge Enrique', 'Portella Cleves', '312388789', 'CorreoPrueba@gmail.com', 'ef4c479688', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(30) NOT NULL,
  `trimestre_materia` varchar(5) NOT NULL,
  `id_programa_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `trimestre_materia`, `id_programa_fk`) VALUES
(1, 'PHP', 'V', 1),
(2, 'JavaScript', 'V', 1),
(3, 'Calidad', 'V', 1),
(4, 'Java', 'V', 1),
(5, 'Base de datos', 'V', 1),
(6, 'Migracion y Testing', 'V', 1),
(7, 'Seguimiento de proyecto', 'V', 1),
(8, 'Procesos de negociacion', 'V', 1),
(9, 'Ingles', 'V', 1),
(10, 'Cultura fisica', 'V', 1),
(11, 'Diseño', 'V', 1),
(12, 'Proyeccion social', 'V', 1),
(13, 'No aplica', 'V', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

DROP TABLE IF EXISTS `programa`;
CREATE TABLE `programa` (
  `id_programa` int(11) NOT NULL,
  `nombre_programa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_programa`, `nombre_programa`) VALUES
(1, 'ADSI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Instructor'),
(2, 'Coordinador');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_aprendiz`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_aprendiz`;
CREATE TABLE `vista_aprendiz` (
`id_aprendiz` int(11)
,`tipodocumento_aprendiz` varchar(5)
,`numerodocumento_aprendiz` bigint(15)
,`nombre_aprendiz` varchar(30)
,`apellido_aprendiz` varchar(30)
,`celular_aprendiz` varchar(20)
,`correosena_aprendiz` varchar(40)
,`correopersonal_aprendiz` varchar(40)
,`nombre_estado` varchar(30)
,`numero_ficha` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_aprendiz2`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_aprendiz2`;
CREATE TABLE `vista_aprendiz2` (
`id_aprendiz` int(11)
,`tipodocumento_aprendiz` varchar(5)
,`numerodocumento_aprendiz` bigint(15)
,`nombre_aprendiz` varchar(30)
,`apellido_aprendiz` varchar(30)
,`celular_aprendiz` varchar(20)
,`correosena_aprendiz` varchar(40)
,`correopersonal_aprendiz` varchar(40)
,`numero_ficha` int(11)
,`nombre_estado` varchar(30)
,`id_ficha_fk` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_asistencia`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_asistencia`;
CREATE TABLE `vista_asistencia` (
`id_asistencia` int(11)
,`nombre_aprendiz` varchar(30)
,`apellido_aprendiz` varchar(30)
,`fecha_registro` date
,`nombre_funcionario` varchar(30)
,`apellido_funcionario` varchar(30)
,`nombre_materia` varchar(30)
,`tipo_asistencia` varchar(15)
,`id_funcionario_fk` int(11)
,`id_ficha_fk` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_fichas_funcionario`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_fichas_funcionario`;
CREATE TABLE `vista_fichas_funcionario` (
`id_funcionario_fk` int(11)
,`id_ficha_fk` int(11)
,`numero_ficha` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_funcionario`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_funcionario`;
CREATE TABLE `vista_funcionario` (
`id_funcionario` int(11)
,`numerodocumento_funcionario` int(11)
,`nombre_funcionario` varchar(30)
,`apellido_funcionario` varchar(30)
,`celular_funcionario` varchar(20)
,`correo_funcionario` varchar(40)
,`nombre_rol` varchar(30)
,`nombre_materia` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_inasistencia`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_inasistencia`;
CREATE TABLE `vista_inasistencia` (
`id_asistencia` int(11)
,`numerodocumento_aprendiz` bigint(15)
,`nombre_aprendiz` varchar(30)
,`apellido_aprendiz` varchar(30)
,`fecha_registro` date
,`nombre_estado` varchar(30)
,`celular_aprendiz` varchar(20)
,`id_ficha_fk` int(11)
,`tipo_asistencia` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_inasistencias`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_inasistencias`;
CREATE TABLE `vista_inasistencias` (
`numerodocumento_aprendiz` bigint(15)
,`nombre_aprendiz` varchar(30)
,`apellido_aprendiz` varchar(30)
,`nombre_estado` varchar(30)
,`correosena_aprendiz` varchar(40)
,`celular_aprendiz` varchar(20)
,`id_ficha_fk` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_inasistencias_aa`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_inasistencias_aa`;
CREATE TABLE `vista_inasistencias_aa` (
`numero_ficha` int(11)
,`nombre_aprendiz` varchar(30)
,`apellido_aprendiz` varchar(30)
,`COUNT(A.tipo_asistencia)` bigint(21)
,`id_ficha` int(11)
,`correosena_aprendiz` varchar(40)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_materias`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_materias`;
CREATE TABLE `vista_materias` (
`id_funcionario_fk` int(11)
,`id_materia_fk` int(11)
,`nombre_materia` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_aprendiz` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_aprendiz`;
CREATE TABLE`vista_aprendiz`(
    `id_aprendiz` int(11) NOT NULL DEFAULT '0',
    `tipodocumento_aprendiz` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
    `numerodocumento_aprendiz` bigint(15) NOT NULL,
    `nombre_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `apellido_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `celular_aprendiz` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `correosena_aprendiz` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
    `correopersonal_aprendiz` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
    `nombre_estado` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `numero_ficha` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_aprendiz2` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_aprendiz2`;
CREATE TABLE`vista_aprendiz2`(
    `id_aprendiz` int(11) NOT NULL DEFAULT '0',
    `tipodocumento_aprendiz` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
    `numerodocumento_aprendiz` bigint(15) NOT NULL,
    `nombre_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `apellido_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `celular_aprendiz` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `correosena_aprendiz` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
    `correopersonal_aprendiz` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
    `numero_ficha` int(11) NOT NULL,
    `nombre_estado` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `id_ficha_fk` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_asistencia` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_asistencia`;
CREATE TABLE`vista_asistencia`(
    `id_asistencia` int(11) NOT NULL DEFAULT '0',
    `nombre_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `apellido_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `fecha_registro` date NOT NULL,
    `nombre_funcionario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `apellido_funcionario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `nombre_materia` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `tipo_asistencia` varchar(15) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    `id_funcionario_fk` int(11) NOT NULL,
    `id_ficha_fk` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_fichas_funcionario` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_fichas_funcionario`;
CREATE TABLE`vista_fichas_funcionario`(
    `id_funcionario_fk` int(11) NOT NULL,
    `id_ficha_fk` int(11) NOT NULL,
    `numero_ficha` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_funcionario` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_funcionario`;
CREATE TABLE`vista_funcionario`(
    `id_funcionario` int(11) NOT NULL DEFAULT '0',
    `numerodocumento_funcionario` int(11) NOT NULL,
    `nombre_funcionario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `apellido_funcionario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `celular_funcionario` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `correo_funcionario` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
    `nombre_rol` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `nombre_materia` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_inasistencia` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_inasistencia`;
CREATE TABLE`vista_inasistencia`(
    `id_asistencia` int(11) NOT NULL DEFAULT '0',
    `numerodocumento_aprendiz` bigint(15) NOT NULL,
    `nombre_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `apellido_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `fecha_registro` date NOT NULL,
    `nombre_estado` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `celular_aprendiz` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `id_ficha_fk` int(11) NOT NULL,
    `tipo_asistencia` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_inasistencias` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_inasistencias`;
CREATE TABLE`vista_inasistencias`(
    `numerodocumento_aprendiz` bigint(15) NOT NULL,
    `nombre_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `apellido_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `nombre_estado` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `correosena_aprendiz` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
    `celular_aprendiz` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `id_ficha_fk` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_inasistencias_aa` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_inasistencias_aa`;
CREATE TABLE`vista_inasistencias_aa`(
    `numero_ficha` int(11) NOT NULL,
    `nombre_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `apellido_aprendiz` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
    `COUNT(A.tipo_asistencia)` bigint(21) NOT NULL DEFAULT '0',
    `id_ficha` int(11) NOT NULL DEFAULT '0',
    `correosena_aprendiz` varchar(40) COLLATE utf8mb4_general_ci NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista de `vista_materias` exportada como una tabla
--
DROP TABLE IF EXISTS `vista_materias`;
CREATE TABLE`vista_materias`(
    `id_funcionario_fk` int(11) NOT NULL,
    `id_materia_fk` int(11) NOT NULL,
    `nombre_materia` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id_aprendiz`),
  ADD KEY `aprestadoFK` (`id_estado_fk`),
  ADD KEY `aprefichaFK` (`id_ficha_fk`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `asisapreFK` (`id_aprendiz_fk`),
  ADD KEY `asisfunciFK` (`id_funcionario_fk`),
  ADD KEY `asismateFK` (`id_materia_fk`),
  ADD KEY `asisfichaFK` (`id_ficha_fk`);

--
-- Indices de la tabla `detalle_ficha_funcionario`
--
ALTER TABLE `detalle_ficha_funcionario`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `detallefichaFK` (`id_ficha_fk`),
  ADD KEY `detallefuncionario_F_FK` (`id_funcionario_fk`);

--
-- Indices de la tabla `detalle_materia_funcionario`
--
ALTER TABLE `detalle_materia_funcionario`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `detallemateriaFK` (`id_materia_fk`),
  ADD KEY `detallefuncionarioFK` (`id_funcionario_fk`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `fichamateFK` (`id_materia_fk`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `numerodocumento_funcionario` (`numerodocumento_funcionario`),
  ADD KEY `funcirolFK` (`id_rol_fk`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `mateprograFK` (`id_programa_fk`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_programa`),
  ADD UNIQUE KEY `nombre_programa` (`nombre_programa`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id_aprendiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `detalle_ficha_funcionario`
--
ALTER TABLE `detalle_ficha_funcionario`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_materia_funcionario`
--
ALTER TABLE `detalle_materia_funcionario`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `aprefichaFK` FOREIGN KEY (`id_ficha_fk`) REFERENCES `ficha` (`id_ficha`),
  ADD CONSTRAINT `aprestadoFK` FOREIGN KEY (`id_estado_fk`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asisapreFK` FOREIGN KEY (`id_aprendiz_fk`) REFERENCES `aprendiz` (`id_aprendiz`),
  ADD CONSTRAINT `asisfichaFK` FOREIGN KEY (`id_ficha_fk`) REFERENCES `ficha` (`id_ficha`),
  ADD CONSTRAINT `asisfunciFK` FOREIGN KEY (`id_funcionario_fk`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `asismateFK` FOREIGN KEY (`id_materia_fk`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `detalle_ficha_funcionario`
--
ALTER TABLE `detalle_ficha_funcionario`
  ADD CONSTRAINT `detallefichaFK` FOREIGN KEY (`id_ficha_fk`) REFERENCES `ficha` (`id_ficha`),
  ADD CONSTRAINT `detallefuncionario_F_FK` FOREIGN KEY (`id_funcionario_fk`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Filtros para la tabla `detalle_materia_funcionario`
--
ALTER TABLE `detalle_materia_funcionario`
  ADD CONSTRAINT `detallefuncionarioFK` FOREIGN KEY (`id_funcionario_fk`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `detallemateriaFK` FOREIGN KEY (`id_materia_fk`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `fichamateFK` FOREIGN KEY (`id_materia_fk`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcirolFK` FOREIGN KEY (`id_rol_fk`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `mateprograFK` FOREIGN KEY (`id_programa_fk`) REFERENCES `programa` (`id_programa`);


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla aprendiz
--

--
-- Metadatos para la tabla asistencia
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'asistenciasena', 'asistencia', '{\"sorted_col\":\"`asistencia`.`fecha_registro`  ASC\"}', '2020-11-19 23:41:22');

--
-- Metadatos para la tabla detalle_ficha_funcionario
--

--
-- Metadatos para la tabla detalle_materia_funcionario
--

--
-- Metadatos para la tabla estado
--

--
-- Metadatos para la tabla ficha
--

--
-- Metadatos para la tabla funcionario
--

--
-- Metadatos para la tabla materia
--

--
-- Metadatos para la tabla programa
--

--
-- Metadatos para la tabla rol
--

--
-- Metadatos para la tabla vista_aprendiz
--

--
-- Metadatos para la tabla vista_aprendiz2
--

--
-- Metadatos para la tabla vista_asistencia
--

--
-- Metadatos para la tabla vista_fichas_funcionario
--

--
-- Metadatos para la tabla vista_funcionario
--

--
-- Metadatos para la tabla vista_inasistencia
--

--
-- Metadatos para la tabla vista_inasistencias
--

--
-- Metadatos para la tabla vista_inasistencias_aa
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'asistenciasena', 'vista_inasistencias_aa', '{\"sorted_col\":\"`vista_inasistencias_aa`.`correosena_aprendiz` ASC\"}', '2020-11-20 01:20:50');

--
-- Metadatos para la tabla vista_materias
--

--
-- Metadatos para la base de datos asistenciasena
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
