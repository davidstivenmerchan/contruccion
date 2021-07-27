-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2021 a las 19:14:20
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_construccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceptacion_usuarios`
--

CREATE TABLE `aceptacion_usuarios` (
  `id_aceptacion` int(11) NOT NULL,
  `documento` int(12) NOT NULL,
  `id_estado_aprobacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aceptacion_usuarios`
--

INSERT INTO `aceptacion_usuarios` (`id_aceptacion`, `documento`, `id_estado_aprobacion`) VALUES
(29, 1002636576, 1),
(30, 1005827694, 1),
(31, 1005712070, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenamiento`
--

CREATE TABLE `almacenamiento` (
  `id_almacena` int(3) NOT NULL,
  `tamano_almacena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacenamiento`
--

INSERT INTO `almacenamiento` (`id_almacena`, `tamano_almacena`) VALUES
(1, '4 GB'),
(2, '8 GB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `id_ambiente` int(5) NOT NULL,
  `n_ambiente` int(50) NOT NULL,
  `id_nave` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id_ambiente`, `n_ambiente`, `id_nave`) VALUES
(2, 3, 60),
(4, 4342, 60),
(12, 23, 59),
(13, 3, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_equipos`
--

CREATE TABLE `asignacion_equipos` (
  `id_asignacion_equipos` int(11) NOT NULL,
  `id_entrada_aprendiz` int(11) NOT NULL,
  `serial` varchar(30) NOT NULL,
  `descripcion_inicial` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `hora_inicial` time DEFAULT NULL,
  `descripcion_final` varchar(50) CHARACTER SET latin1 DEFAULT 'En Uso',
  `hora_final` varchar(10) CHARACTER SET latin1 DEFAULT 'En Uso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacion_equipos`
--

INSERT INTO `asignacion_equipos` (`id_asignacion_equipos`, `id_entrada_aprendiz`, `serial`, `descripcion_inicial`, `hora_inicial`, `descripcion_final`, `hora_final`) VALUES
(56, 70, 'hk1231ma', NULL, '10:23:28', 'En Uso', 'En Uso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compu_peris`
--

CREATE TABLE `compu_peris` (
  `id_compu_peris` int(11) NOT NULL,
  `serial` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `id_periferico` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `fecha_compu_peris` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compu_peris`
--

INSERT INTO `compu_peris` (`id_compu_peris`, `serial`, `id_periferico`, `fecha_compu_peris`) VALUES
(5, 'hk1231ma', '21167', '2021-07-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo_electronico`
--

CREATE TABLE `dispositivo_electronico` (
  `serial` varchar(30) NOT NULL,
  `placa_sena` varchar(30) NOT NULL,
  `id_tipo_dispositivo` int(3) NOT NULL,
  `id_procesador` int(3) NOT NULL,
  `ramGB` int(11) NOT NULL,
  `id_tipo_sistema` int(3) NOT NULL,
  `id_estado_disponibilidad` int(3) NOT NULL,
  `id_estado_dispositivo` int(3) NOT NULL,
  `id_marca` int(3) NOT NULL,
  `id_almacena` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dispositivo_electronico`
--

INSERT INTO `dispositivo_electronico` (`serial`, `placa_sena`, `id_tipo_dispositivo`, `id_procesador`, `ramGB`, `id_tipo_sistema`, `id_estado_disponibilidad`, `id_estado_dispositivo`, `id_marca`, `id_almacena`) VALUES
('hk1231ma', '1234', 2, 1, 1, 3, 2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disposi_ambientes`
--

CREATE TABLE `disposi_ambientes` (
  `id_disposi_ambientes` int(3) NOT NULL,
  `id_compu_peris` int(11) NOT NULL,
  `id_ambiente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `disposi_ambientes`
--

INSERT INTO `disposi_ambientes` (`id_disposi_ambientes`, `id_compu_peris`, `id_ambiente`) VALUES
(1, 5, 12),
(2, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_aprendiz`
--

CREATE TABLE `entrada_aprendiz` (
  `id_entrada_aprendiz` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `hora_salida` time DEFAULT NULL,
  `documento` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada_aprendiz`
--

INSERT INTO `entrada_aprendiz` (`id_entrada_aprendiz`, `fecha`, `hora`, `hora_salida`, `documento`) VALUES
(67, '2021-07-22', '08:42:46', NULL, 1002636576),
(68, '2021-07-22', '08:42:55', NULL, 1005827694),
(69, '2021-07-22', '08:43:11', NULL, 1005712070),
(70, '2021-07-26', '10:23:28', NULL, 1002636576);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `serial` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_aprobacion`
--

CREATE TABLE `estado_aprobacion` (
  `id_estado_aprobacion` int(3) NOT NULL,
  `nom_aprobacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_aprobacion`
--

INSERT INTO `estado_aprobacion` (`id_estado_aprobacion`, `nom_aprobacion`) VALUES
(1, 'Aprobado'),
(2, 'No Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_disponibilidad`
--

CREATE TABLE `estado_disponibilidad` (
  `id_estado_disponibilidad` int(3) NOT NULL,
  `nom_estado_disponibilidad` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_disponibilidad`
--

INSERT INTO `estado_disponibilidad` (`id_estado_disponibilidad`, `nom_estado_disponibilidad`) VALUES
(1, 'Disponible'),
(2, 'Ocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_dispositivo`
--

CREATE TABLE `estado_dispositivo` (
  `id_estado_dispositivo` int(3) NOT NULL,
  `nom_estado_dispositivo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_dispositivo`
--

INSERT INTO `estado_dispositivo` (`id_estado_dispositivo`, `nom_estado_dispositivo`) VALUES
(1, 'Bueno'),
(2, 'Malo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `ficha` int(15) NOT NULL,
  `id_jornada` int(3) NOT NULL,
  `id_ambiente` int(5) NOT NULL,
  `id_formacion` int(3) NOT NULL,
  `instructor` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`ficha`, `id_jornada`, `id_ambiente`, `id_formacion`, `instructor`) VALUES
(2060060, 1, 2, 6, 444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion`
--

CREATE TABLE `formacion` (
  `id_formacion` int(3) NOT NULL,
  `nom_formacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formacion`
--

INSERT INTO `formacion` (`id_formacion`, `nom_formacion`) VALUES
(6, 'adsi'),
(7, 'multimedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nom_genero` varchar(15) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nom_genero`) VALUES
(1, 'Hombre'),
(2, 'Mujer'),
(3, 'Indefinido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `id_jornada` int(3) NOT NULL,
  `nom_jornada` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id_jornada`, `nom_jornada`) VALUES
(1, 'Mañana'),
(2, 'Tarde'),
(3, 'Noche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(3) NOT NULL,
  `nom_marca` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nom_marca`) VALUES
(1, 'HP'),
(2, 'Lenovo'),
(4, 'Janus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `ficha` int(15) NOT NULL,
  `aprendiz` int(12) NOT NULL,
  `fecha_matricula` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `ficha`, `aprendiz`, `fecha_matricula`) VALUES
(17, 2060060, 1002636576, '2021-07-21'),
(18, 2060060, 1005827694, '2021-07-13'),
(19, 2060060, 1005712070, '2021-07-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nave`
--

CREATE TABLE `nave` (
  `id_nave` int(3) NOT NULL,
  `nom_nave` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nave`
--

INSERT INTO `nave` (`id_nave`, `nom_nave`) VALUES
(59, 'nave 1'),
(60, 'nave 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periferico`
--

CREATE TABLE `periferico` (
  `id_periferico` varchar(30) NOT NULL,
  `id_tip_periferico` int(10) UNSIGNED NOT NULL,
  `id_marca` int(3) NOT NULL,
  `estado_disponibilidad` int(3) NOT NULL,
  `estado_dispositivo` int(3) NOT NULL,
  `pulgadas` int(11) DEFAULT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periferico`
--

INSERT INTO `periferico` (`id_periferico`, `id_tip_periferico`, `id_marca`, `estado_disponibilidad`, `estado_dispositivo`, `pulgadas`, `descripcion`) VALUES
('0048632', 4, 1, 1, 1, 12, 'monitor negro'),
('21167', 2, 1, 1, 1, NULL, 'mouse rojo super melo'),
('31235', 1, 2, 1, 1, NULL, 'teclado mecanico '),
('990', 2, 1, 1, 1, NULL, 'mouse rojo super melo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesadores`
--

CREATE TABLE `procesadores` (
  `id_procesador` int(3) NOT NULL,
  `nom_procesador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procesadores`
--

INSERT INTO `procesadores` (`id_procesador`, `nom_procesador`) VALUES
(1, 'Intel(R) Core(TM) i5-9400 CPU'),
(2, 'Intel(R) Core(TM) i7-9800 CPU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ram`
--

CREATE TABLE `ram` (
  `ramGB` int(3) NOT NULL,
  `tamano_ram` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ram`
--

INSERT INTO `ram` (`ramGB`, `tamano_ram`) VALUES
(1, '4 GB'),
(2, '8 GB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dispositivo`
--

CREATE TABLE `tipo_dispositivo` (
  `id_tipo_dispositivo` int(3) NOT NULL,
  `nom_tipo_dispositivo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_dispositivo`
--

INSERT INTO `tipo_dispositivo` (`id_tipo_dispositivo`, `nom_tipo_dispositivo`) VALUES
(1, 'Portatill'),
(2, 'Escritorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(3) NOT NULL,
  `nom_documento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `nom_documento`) VALUES
(3, 'CC'),
(4, 'TI'),
(9, 'RC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sistema`
--

CREATE TABLE `tipo_sistema` (
  `id_tipo_sistema` int(3) NOT NULL,
  `nom_tipo_sistema` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_sistema`
--

INSERT INTO `tipo_sistema` (`id_tipo_sistema`, `nom_tipo_sistema`) VALUES
(1, 'Windows (64 bits)'),
(2, 'Linux (64 bits)'),
(3, 'Windows (32 bits)'),
(4, 'Linux (32 bits)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(3) NOT NULL,
  `nom_tipo_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nom_tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Aprendiz'),
(3, 'Instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_periferico`
--

CREATE TABLE `tip_periferico` (
  `id_tip_periferico` int(10) UNSIGNED NOT NULL,
  `nom_tip_periferico` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tip_periferico`
--

INSERT INTO `tip_periferico` (`id_tip_periferico`, `nom_tip_periferico`) VALUES
(1, 'teclado'),
(2, 'mouse'),
(3, 'cargador'),
(4, 'monitor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trigger_usu`
--

CREATE TABLE `trigger_usu` (
  `documento` int(12) NOT NULL,
  `id_tipo_documento` int(3) NOT NULL,
  `id_tipo_documento_viejo` int(3) NOT NULL,
  `id_tipo_usuario` int(3) NOT NULL,
  `Cod_Carnet` int(25) NOT NULL,
  `Nombres` varchar(35) NOT NULL,
  `Nombres_viejo` varchar(35) NOT NULL,
  `Apellidos` varchar(35) NOT NULL,
  `Apellidos_viejo` varchar(35) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo_personal` varchar(50) NOT NULL,
  `correo_personal_viejo` varchar(50) NOT NULL,
  `correo_sena` varchar(50) NOT NULL,
  `telefono` int(13) NOT NULL,
  `telefono_viejo` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `password_vieja` varchar(30) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_genero_viejo` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `accion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trigger_usu`
--

INSERT INTO `trigger_usu` (`documento`, `id_tipo_documento`, `id_tipo_documento_viejo`, `id_tipo_usuario`, `Cod_Carnet`, `Nombres`, `Nombres_viejo`, `Apellidos`, `Apellidos_viejo`, `fecha_nacimiento`, `correo_personal`, `correo_personal_viejo`, `correo_sena`, `telefono`, `telefono_viejo`, `password`, `password_vieja`, `id_genero`, `id_genero_viejo`, `usuario`, `fecha_hora`, `accion`) VALUES
(2002, 3, 3, 2, 2002, 'maluma', 'maluma', 'maluma', 'maluma', '2021-07-27', 'maluma@', 'maluma@', 'maluma@misena.edu.co', 2002, 2002, '111', '111', 2, 2, 'root@localhost', '2021-07-13 07:56:12', 'Actualizar'),
(444, 3, 3, 3, 444, 'lucas', 'lucas', 'totoro', 'totoro', '2010-06-23', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@misena.ed.co', 765454, 765454, '444', '444', 1, 1, 'root@localhost', '2021-07-13 07:59:00', 'Actualizar'),
(444, 3, 3, 3, 444, 'lucas', 'lucas', 'totoro', 'totoro', '2010-06-23', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@misena.ed.co', 765454, 765454, '444', '444', 1, 1, 'root@localhost', '2021-07-13 07:59:00', 'Actualizar'),
(444, 3, 3, 3, 444, 'lucas', 'lucas', 'totoro', 'totoro', '2010-06-23', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@misena.edu.co', 765454, 765454, '444', '444', 1, 1, 'root@localhost', '2021-07-13 07:59:40', 'Actualizar'),
(444, 3, 3, 3, 444, 'lucas', 'lucas', 'totoro', 'totoro', '2010-06-23', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@misena.edu.co', 765454, 765454, '444', '444', 1, 1, 'root@localhost', '2021-07-13 07:59:40', 'Actualizar'),
(444, 3, 3, 3, 444, 'lucas', 'lucas', 'totoro', 'totoro', '2010-06-23', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@misena.edu.co', 765454, 765454, '444', '444', 1, 1, 'root@localhost', '2021-07-13 07:59:40', 'Actualizar'),
(444, 3, 3, 3, 444, 'lucas', 'lucas', 'totoro', 'totoro', '2010-06-23', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@misena.edu.co', 765454, 765454, '444', '444', 1, 1, 'root@localhost', '2021-07-13 07:59:40', 'Actualizar'),
(666, 3, 3, 1, 333, 'shun', 'shun', 'merchan', 'merchan', '2021-05-02', 'merchan@gmail.com', 'merchan@gmail.com', 'dsmerchan6@misena.edu.co', 310, 310, '666', '666', 1, 1, 'root@localhost', '2021-07-20 15:58:20', 'Actualizar'),
(444, 3, 3, 3, 730001, 'david', 'david', 'merchan', 'merchan', '2021-07-11', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 2147483647, 2147483647, '444', '444', 1, 1, 'root@localhost', '2021-07-21 09:35:42', 'Actualizar'),
(123, 3, 3, 1, 333, 'shun', 'shun', 'merchan', 'merchan', '2021-05-02', 'merchan@gmail.com', 'merchan@gmail.com', 'dsmerchan6@misena.edu.co', 310, 310, '666', '666', 1, 1, 'root@localhost', '2021-07-22 14:23:45', 'Actualizar'),
(123, 3, 3, 1, 333, 'shun', 'shun', 'merchan', 'merchan', '2021-05-02', 'merchan@gmail.com', 'merchan@gmail.com', 'dsmerchan6@misena.edu.co', 310, 310, '', '666', 1, 1, 'root@localhost', '2021-07-22 14:23:51', 'Actualizar'),
(123, 3, 3, 1, 333, 'shun', 'shun', 'merchan', 'merchan', '2021-05-02', 'merchan@gmail.com', 'merchan@gmail.com', 'dsmerchan6@misena.edu.co', 310, 310, '123', '', 1, 1, 'root@localhost', '2021-07-22 14:23:53', 'Actualizar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `documento` int(12) NOT NULL,
  `id_tipo_documento` int(3) NOT NULL,
  `id_tipo_usuario` int(3) NOT NULL,
  `Cod_Carnet` int(25) NOT NULL,
  `Nombres` varchar(35) NOT NULL,
  `Apellidos` varchar(35) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo_personal` varchar(50) NOT NULL,
  `correo_sena` varchar(50) NOT NULL,
  `telefono` bigint(13) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`documento`, `id_tipo_documento`, `id_tipo_usuario`, `Cod_Carnet`, `Nombres`, `Apellidos`, `fecha_nacimiento`, `correo_personal`, `correo_sena`, `telefono`, `password`, `id_genero`) VALUES
(123, 3, 1, 333, 'shun', 'merchan', '2021-05-02', 'merchan@gmail.com', 'dsmerchan6@misena.edu.co', 310, '123', 1),
(444, 3, 3, 730001, 'david', 'merchan', '2021-07-11', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@gmail.com', 2147483647, '444', 1),
(1002636576, 3, 2, 11111111, 'david', 'merchan', '2021-07-20', 'david@misena.edu.co', 'david@misena.edu.co', 2147483647, '1111', 1),
(1005712070, 3, 2, 1005712070, 'luis', 'garcia', '2021-06-28', 'luis@gmail.com', 'luis@gmail.com', 1005712070, '1111', 1),
(1005827694, 3, 2, 1005827694, 'lany', 'acosta', '2021-07-19', 'lany@gmail.com', 'lany@gmail.com', 11222222, '1111', 2);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `Eliminacion_usuarios_AD` AFTER DELETE ON `usuarios` FOR EACH ROW INSERT INTO usuarios_eliminados (documento,id_tipo_documento,id_tipo_usuario,Cod_Carnet,Nombres,Apellidos,fecha_nacimiento,correo_personal,correo_sena,telefono,password,id_genero,usuario,fecha_eliminacion)
VALUES (old.documento,old.id_tipo_documento,old.id_tipo_usuario,old.Cod_Carnet,old.Nombres,old.Apellidos,old.fecha_nacimiento,old.correo_personal,old.correo_sena,old.telefono,old.password,old.id_genero,CURRENT_USER, NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_mod_usu` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
INSERT INTO
trigger_usu(documento, id_tipo_documento,  id_tipo_documento_viejo,id_tipo_usuario,Cod_Carnet,Nombres,Nombres_viejo,Apellidos,Apellidos_viejo,fecha_nacimiento,correo_personal,correo_personal_viejo,correo_sena,telefono,telefono_viejo,password,password_vieja,id_genero,id_genero_viejo,usuario,fecha_hora, accion)
VALUES(new.documento,new.id_tipo_documento,old.id_tipo_documento,new.id_tipo_usuario,new.Cod_carnet,new.Nombres,old.Nombres,new.Apellidos,old.Apellidos, new.fecha_nacimiento,new.correo_personal,old.correo_personal,new.correo_sena,new.telefono,old.telefono,new.password,old.password,new.id_genero, old.id_genero,USER(),NOW(),'Actualizar'); END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_eliminados`
--

CREATE TABLE `usuarios_eliminados` (
  `documento` int(12) NOT NULL,
  `id_tipo_documento` int(3) NOT NULL,
  `id_tipo_usuario` int(3) NOT NULL,
  `Cod_Carnet` int(25) NOT NULL,
  `Nombres` varchar(35) NOT NULL,
  `Apellidos` varchar(35) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo_personal` varchar(50) NOT NULL,
  `correo_sena` varchar(50) NOT NULL,
  `telefono` int(13) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `fecha_eliminacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_eliminados`
--

INSERT INTO `usuarios_eliminados` (`documento`, `id_tipo_documento`, `id_tipo_usuario`, `Cod_Carnet`, `Nombres`, `Apellidos`, `fecha_nacimiento`, `correo_personal`, `correo_sena`, `telefono`, `password`, `id_genero`, `usuario`, `fecha_eliminacion`) VALUES
(123, 4, 1, 111, 'Luis', 'Garcia', '2002-06-11', 'lmgarcia@gmail.com', 'lmgarcia07021@misena.edu.co', 111, '123', 1, 'root@localhost', '2021-07-20 15:56:39'),
(222, 4, 3, 222, 'cesar', 'esquivel', '2021-05-02', 'luis@gmail.com', 'luis@misena.edu.co', 222, '222', 1, 'root@localhost', '2021-07-20 15:57:19'),
(444, 3, 3, 444, 'lucas', 'totoro', '2010-06-23', 'merchangonzalesstiven@gmail.com', 'merchangonzalesstiven@misena.edu.co', 765454, '444', 1, 'root@localhost', '2021-07-20 15:57:19'),
(888, 4, 2, 88, 'pedro pablo', 'leon', '2020-03-10', 'anino@gmai.com', 'anino@misena.edu.co', 3221212, '888', 1, 'root@localhost', '2021-07-20 15:57:19'),
(999, 4, 2, 999, 'david', 'merchan', '2021-06-09', 'p@gmail.com', 'wp@gmail.com', 2147483647, '999', 1, 'root@localhost', '2021-07-20 15:57:19'),
(1089, 4, 2, 1089, 'juan', 'gonzalez', '2021-07-01', 'juan@gmail.com', 'juan@misena.edu.co', 22311, '111', 1, 'root@localhost', '2021-07-20 15:57:19'),
(2002, 3, 2, 2002, 'maluma', 'maluma', '2021-07-27', 'maluma@', 'maluma@misena.edu.co', 2002, '111', 2, 'root@localhost', '2021-07-20 15:57:19'),
(4040, 4, 2, 4040, 'sofia', 'patricia', '2021-07-05', 'sofia@gmail.com', 'sofia@gmail.com', 2147483647, '111', 2, 'root@localhost', '2021-07-20 15:57:19'),
(7777, 3, 2, 7777, 'tobey ', 'maguire', '2021-07-13', 'tobey@gmail', 'tobey@gmail', 7777, '111', 1, 'root@localhost', '2021-07-20 15:57:19'),
(8008, 3, 2, 8008, 'shakira', 'shakira', '2021-07-27', 'shakira@', 'shakira@', 2147483647, '111', 2, 'root@localhost', '2021-07-20 15:57:19'),
(9090, 3, 2, 9090, 'kaka', 'koko', '2021-07-13', 'koko@gmail.com', 'koko@gmail.com', 2147483647, '111', 1, 'root@localhost', '2021-07-20 15:57:19'),
(10101, 4, 2, 10101, 'aldemar', 'niño c', '2021-06-02', 'aldemar@gmail.com', 'alde@misena.edu.co', 321221211, '121212', 2, 'root@localhost', '2021-07-20 15:57:19'),
(321233, 4, 2, 321233, 'tomas', 'brody', '2021-07-14', 'tomas@', 'tomas@', 321233, '111', 2, 'root@localhost', '2021-07-20 15:57:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aceptacion_usuarios`
--
ALTER TABLE `aceptacion_usuarios`
  ADD PRIMARY KEY (`id_aceptacion`),
  ADD KEY `documento` (`documento`),
  ADD KEY `id_estado_aprobacion` (`id_estado_aprobacion`);

--
-- Indices de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  ADD PRIMARY KEY (`id_almacena`);

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id_ambiente`),
  ADD KEY `id_nave` (`id_nave`);

--
-- Indices de la tabla `asignacion_equipos`
--
ALTER TABLE `asignacion_equipos`
  ADD PRIMARY KEY (`id_asignacion_equipos`),
  ADD KEY `id_entrada_aprendiz` (`id_entrada_aprendiz`),
  ADD KEY `id_equipo` (`serial`),
  ADD KEY `serial` (`serial`);

--
-- Indices de la tabla `compu_peris`
--
ALTER TABLE `compu_peris`
  ADD PRIMARY KEY (`id_compu_peris`),
  ADD KEY `serial` (`serial`),
  ADD KEY `id_periferico` (`id_periferico`),
  ADD KEY `serial_2` (`serial`);

--
-- Indices de la tabla `dispositivo_electronico`
--
ALTER TABLE `dispositivo_electronico`
  ADD PRIMARY KEY (`serial`,`placa_sena`),
  ADD KEY `id_tipo_dispositivo` (`id_tipo_dispositivo`),
  ADD KEY `id_estado_disponibilidad` (`id_estado_disponibilidad`),
  ADD KEY `id_estado_dispositivo` (`id_estado_dispositivo`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_tipo_sistema` (`id_tipo_sistema`),
  ADD KEY `id_procesador` (`id_procesador`),
  ADD KEY `ramGB` (`ramGB`),
  ADD KEY `id_almacena` (`id_almacena`);

--
-- Indices de la tabla `disposi_ambientes`
--
ALTER TABLE `disposi_ambientes`
  ADD PRIMARY KEY (`id_disposi_ambientes`),
  ADD KEY `id_compu_peris` (`id_compu_peris`),
  ADD KEY `id_ambiente` (`id_ambiente`);

--
-- Indices de la tabla `entrada_aprendiz`
--
ALTER TABLE `entrada_aprendiz`
  ADD PRIMARY KEY (`id_entrada_aprendiz`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `serial` (`serial`);

--
-- Indices de la tabla `estado_aprobacion`
--
ALTER TABLE `estado_aprobacion`
  ADD PRIMARY KEY (`id_estado_aprobacion`);

--
-- Indices de la tabla `estado_disponibilidad`
--
ALTER TABLE `estado_disponibilidad`
  ADD PRIMARY KEY (`id_estado_disponibilidad`);

--
-- Indices de la tabla `estado_dispositivo`
--
ALTER TABLE `estado_dispositivo`
  ADD PRIMARY KEY (`id_estado_dispositivo`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`ficha`),
  ADD KEY `id_jornada` (`id_jornada`),
  ADD KEY `id_ambiente` (`id_ambiente`),
  ADD KEY `id_formacion` (`id_formacion`),
  ADD KEY `instructor` (`instructor`);

--
-- Indices de la tabla `formacion`
--
ALTER TABLE `formacion`
  ADD PRIMARY KEY (`id_formacion`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id_jornada`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `aprendiz` (`aprendiz`),
  ADD KEY `ficha` (`ficha`);

--
-- Indices de la tabla `nave`
--
ALTER TABLE `nave`
  ADD PRIMARY KEY (`id_nave`);

--
-- Indices de la tabla `periferico`
--
ALTER TABLE `periferico`
  ADD PRIMARY KEY (`id_periferico`),
  ADD KEY `fk_ESTADODISPO_periferico` (`estado_disponibilidad`),
  ADD KEY `fk_estadoDispositivo_periferico` (`estado_dispositivo`),
  ADD KEY `fk_marca_Periferico` (`id_marca`),
  ADD KEY `fk_tipPeriferico_periferico` (`id_tip_periferico`);

--
-- Indices de la tabla `procesadores`
--
ALTER TABLE `procesadores`
  ADD PRIMARY KEY (`id_procesador`);

--
-- Indices de la tabla `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`ramGB`);

--
-- Indices de la tabla `tipo_dispositivo`
--
ALTER TABLE `tipo_dispositivo`
  ADD PRIMARY KEY (`id_tipo_dispositivo`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `tipo_sistema`
--
ALTER TABLE `tipo_sistema`
  ADD PRIMARY KEY (`id_tipo_sistema`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `tip_periferico`
--
ALTER TABLE `tip_periferico`
  ADD PRIMARY KEY (`id_tip_periferico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `id_tipo_documento` (`id_tipo_documento`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`),
  ADD KEY `id_genero` (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aceptacion_usuarios`
--
ALTER TABLE `aceptacion_usuarios`
  MODIFY `id_aceptacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  MODIFY `id_almacena` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id_ambiente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `asignacion_equipos`
--
ALTER TABLE `asignacion_equipos`
  MODIFY `id_asignacion_equipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `compu_peris`
--
ALTER TABLE `compu_peris`
  MODIFY `id_compu_peris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `disposi_ambientes`
--
ALTER TABLE `disposi_ambientes`
  MODIFY `id_disposi_ambientes` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entrada_aprendiz`
--
ALTER TABLE `entrada_aprendiz`
  MODIFY `id_entrada_aprendiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estado_aprobacion`
--
ALTER TABLE `estado_aprobacion`
  MODIFY `id_estado_aprobacion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_disponibilidad`
--
ALTER TABLE `estado_disponibilidad`
  MODIFY `id_estado_disponibilidad` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estado_dispositivo`
--
ALTER TABLE `estado_dispositivo`
  MODIFY `id_estado_dispositivo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formacion`
--
ALTER TABLE `formacion`
  MODIFY `id_formacion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id_jornada` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `nave`
--
ALTER TABLE `nave`
  MODIFY `id_nave` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `procesadores`
--
ALTER TABLE `procesadores`
  MODIFY `id_procesador` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ram`
--
ALTER TABLE `ram`
  MODIFY `ramGB` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_dispositivo`
--
ALTER TABLE `tipo_dispositivo`
  MODIFY `id_tipo_dispositivo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_sistema`
--
ALTER TABLE `tipo_sistema`
  MODIFY `id_tipo_sistema` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tip_periferico`
--
ALTER TABLE `tip_periferico`
  MODIFY `id_tip_periferico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aceptacion_usuarios`
--
ALTER TABLE `aceptacion_usuarios`
  ADD CONSTRAINT `aceptacion_usuarios_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `usuarios` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aceptacion_usuarios_ibfk_2` FOREIGN KEY (`id_estado_aprobacion`) REFERENCES `estado_aprobacion` (`id_estado_aprobacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `ambiente_ibfk_1` FOREIGN KEY (`id_nave`) REFERENCES `nave` (`id_nave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignacion_equipos`
--
ALTER TABLE `asignacion_equipos`
  ADD CONSTRAINT `asignacion_equipos_ibfk_1` FOREIGN KEY (`id_entrada_aprendiz`) REFERENCES `entrada_aprendiz` (`id_entrada_aprendiz`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_equipos_ibfk_2` FOREIGN KEY (`serial`) REFERENCES `dispositivo_electronico` (`serial`);

--
-- Filtros para la tabla `compu_peris`
--
ALTER TABLE `compu_peris`
  ADD CONSTRAINT `compu_peris_ibfk_1` FOREIGN KEY (`id_periferico`) REFERENCES `periferico` (`id_periferico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compu_peris_ibfk_2` FOREIGN KEY (`serial`) REFERENCES `dispositivo_electronico` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dispositivo_electronico`
--
ALTER TABLE `dispositivo_electronico`
  ADD CONSTRAINT `dispositivo_electronico_ibfk_1` FOREIGN KEY (`id_estado_disponibilidad`) REFERENCES `estado_disponibilidad` (`id_estado_disponibilidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_electronico_ibfk_2` FOREIGN KEY (`id_estado_dispositivo`) REFERENCES `estado_dispositivo` (`id_estado_dispositivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_electronico_ibfk_3` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tipo_dispositivo` (`id_tipo_dispositivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_electronico_ibfk_4` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_electronico_ibfk_5` FOREIGN KEY (`id_tipo_sistema`) REFERENCES `tipo_sistema` (`id_tipo_sistema`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_electronico_ibfk_7` FOREIGN KEY (`id_procesador`) REFERENCES `procesadores` (`id_procesador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_electronico_ibfk_8` FOREIGN KEY (`ramGB`) REFERENCES `ram` (`ramGB`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_electronico_ibfk_9` FOREIGN KEY (`id_almacena`) REFERENCES `almacenamiento` (`id_almacena`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `disposi_ambientes`
--
ALTER TABLE `disposi_ambientes`
  ADD CONSTRAINT `disposi_ambientes_ibfk_1` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposi_ambientes_ibfk_2` FOREIGN KEY (`id_compu_peris`) REFERENCES `compu_peris` (`id_compu_peris`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrada_aprendiz`
--
ALTER TABLE `entrada_aprendiz`
  ADD CONSTRAINT `entrada_aprendiz_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `usuarios` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`serial`) REFERENCES `dispositivo_electronico` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fichas_ibfk_2` FOREIGN KEY (`id_formacion`) REFERENCES `formacion` (`id_formacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fichas_ibfk_3` FOREIGN KEY (`id_jornada`) REFERENCES `jornada` (`id_jornada`),
  ADD CONSTRAINT `fichas_ibfk_4` FOREIGN KEY (`instructor`) REFERENCES `usuarios` (`documento`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`aprendiz`) REFERENCES `usuarios` (`documento`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`ficha`) REFERENCES `fichas` (`ficha`);

--
-- Filtros para la tabla `periferico`
--
ALTER TABLE `periferico`
  ADD CONSTRAINT `fk_ESTADODISPO_periferico` FOREIGN KEY (`estado_disponibilidad`) REFERENCES `estado_disponibilidad` (`id_estado_disponibilidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estadoDispositivo_periferico` FOREIGN KEY (`estado_dispositivo`) REFERENCES `estado_dispositivo` (`id_estado_dispositivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_marca_Periferico` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipPeriferico_periferico` FOREIGN KEY (`id_tip_periferico`) REFERENCES `tip_periferico` (`id_tip_periferico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
