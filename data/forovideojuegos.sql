-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2026 a las 07:09:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `forovideojuegos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_usuario` (IN `p_usuario_nuevo` VARCHAR(20), IN `p_usuario_antiguo` VARCHAR(20))   BEGIN
	UPDATE usuario
    SET nombre_usuario = p_usuario_nuevo
    WHERE nombre_usuario = p_usuario_antiguo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_usuario` (IN `p_nombre_usuario` VARCHAR(20), IN `p_clave` VARCHAR(255), OUT `p_resultado` INT)   BEGIN
    IF EXISTS (SELECT 1 FROM usuario WHERE nombre_usuario = p_nombre_usuario) THEN
        SET p_resultado = 1;
    ELSE
        INSERT INTO usuario(nombre_usuario, clave) VALUES (p_nombre_usuario, p_clave);
        SET p_resultado = 0;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_comentario` (IN `p_comentarioid` INT, IN `p_usuarioid` INT)   BEGIN
	DELETE FROM comentarios
    WHERE comentario_id = p_comentarioid AND usuario_id = p_usuarioid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hacer_comentario` (IN `p_usuarioid` INT, IN `p_juegoid` INT, IN `p_comentario` VARCHAR(500), IN `p_valoracion` INT(1))   BEGIN
	INSERT INTO comentarios(usuario_id, juego_id, comentario, valoracion)
    VALUES (p_usuarioid, p_juegoid, p_comentario, p_valoracion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_promedio_valoracion` (IN `p_juego_id` INT)   BEGIN
    SELECT ROUND(AVG(valoracion), 1) AS promedio,
           COUNT(*) AS total_comentarios
    FROM comentarios
    WHERE juego_id = p_juego_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_usuario` (IN `p_usuario` VARCHAR(20))   BEGIN
	SELECT usuario_id, nombre_usuario, clave FROM usuario
    WHERE nombre_usuario = p_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ver_comentarios` (IN `p_juegoid` INT)   BEGIN
	SELECT c.comentario_id, c.comentario, c.fecha_comentario, c.valoracion, u.nombre_usuario FROM comentarios AS c
    JOIN usuario AS u ON u.usuario_id = c.usuario_id
    WHERE juego_id = p_juegoid
    ORDER BY c.fecha_comentario DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `nombre_catgoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `clasificacion_id` int(11) NOT NULL,
  `juego_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `juego_id` int(11) NOT NULL,
  `fecha_comentario` date NOT NULL DEFAULT curdate(),
  `valoracion` int(1) NOT NULL,
  `comentario` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`comentario_id`, `usuario_id`, `juego_id`, `fecha_comentario`, `valoracion`, `comentario`) VALUES
(1, 4, 1, '2026-05-13', 5, 'wen juego bro'),
(4, 2, 3, '2026-05-13', 5, 'Bakanoso'),
(6, 1, 4, '2026-05-14', 5, 'Excelente juego de aventura y buen coop de oleadas e historia'),
(9, 1, 2, '2026-05-14', 3, 'Curioso'),
(10, 1, 2, '2026-05-14', 2, 'holi'),
(11, 1, 2, '2026-05-14', 2, 'hmmm ta piola'),
(12, 1, 3, '2026-05-15', 5, 'El mejor juego con árbol de decisiones de la vidaaaa'),
(13, 1, 6, '2026-05-15', 4, 'Me encanta el gatito n.n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `juego_id` int(11) NOT NULL,
  `nombre_juego` varchar(100) NOT NULL,
  `ano_publicacion` int(4) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`juego_id`, `nombre_juego`, `ano_publicacion`, `descripcion`, `imagen`) VALUES
(1, 'Resident Evil 4 Remake', 2023, 'Remake del clásico survival horror de Capcom', 'residentevil.jpeg'),
(2, 'Devil May Cry V', 2019, 'Juego de acción hack and slash desarrollado por Capcom', 'devilmaycry.jpeg'),
(3, 'Mass Effect Legendary Edition', 2021, 'Compilación remasterizada de la trilogía Mass Effect', 'masseffect.jpeg'),
(4, 'Uncharted 3 La Traición de Drake', 2011, 'Juego de acción y aventura de Naughty Dog', 'uncharted3.jpeg'),
(5, 'Little Big Planet 2', 2011, 'Juego de plataformas creativo de Media Molecule', 'littlebigplanet2.jpeg'),
(6, 'Stray', 2022, 'Juego de aventura donde controlas un gato callejero', 'stray.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT 1,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nombre_usuario`, `clave`, `tipo`, `fecha_registro`) VALUES
(1, 'Miwatsuki12', '$2y$10$7QAXsBNdaVB6wrg2c3TWB.IADuxeV2woTEfOzjruzoY2nHkTCml4q', 1, '2026-05-12 19:16:41'),
(2, 'Silvestre', '$2y$10$NhopNyoyCWqIPSEHzDosbuOSe/ud2Byd9XCoiQZ1dUAuCozft8kFS', 1, '2026-05-12 19:23:11'),
(3, 'Ñoños', '$2y$10$Nbix24oxwwbIlTYijbegr.Ugz1DUJtEe94KMQwauuLUIq/dCE851a', 1, '2026-05-12 20:23:29'),
(4, 'smilechazz', '$2y$10$s6uAQ7Xy8iD9ukoaiEDc1eM6rPZPWXRD6M36.nCW62QRWYy7V8QTe', 1, '2026-05-13 03:33:26'),
(5, 'SuperSam', '$2y$10$HdLxAGdX4YUdIXrHYniTy.NjnKbewj4BXPKJPaWkFlZNALDXVsG5.', 1, '2026-05-15 00:37:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`clasificacion_id`),
  ADD KEY `juego_id` (`juego_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `juego_id` (`juego_id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`juego_id`);

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `uq_nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `clasificacion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `juego_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD CONSTRAINT `clasificacion_ibfk_1` FOREIGN KEY (`juego_id`) REFERENCES `juegos` (`juego_id`),
  ADD CONSTRAINT `clasificacion_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`juego_id`) REFERENCES `juegos` (`juego_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
