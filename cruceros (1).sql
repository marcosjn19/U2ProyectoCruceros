-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 04:03:46
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cruceros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabina`
--

CREATE TABLE `cabina` (
  `id_cabina` int(3) NOT NULL,
  `tipo_cabina` varchar(30) NOT NULL,
  `refimagen_cabina` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cabina`
--

INSERT INTO `cabina` (`id_cabina`, `tipo_cabina`, `refimagen_cabina`) VALUES
(1, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2015/02/Viajar-solo-en-camarote-de-crucero.jpg'),
(2, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2015/02/Viajar-solo-en-camarote-de-crucero.jpg'),
(3, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2015/02/Viajar-solo-en-camarote-de-crucero.jpg'),
(4, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2015/02/Viajar-solo-en-camarote-de-crucero.jpg'),
(5, 'Familiar', 'https://secure.parksandresorts.wdpromedia.com/media/dcl_v0400/Site/DCLContent/Media/es/thumbs/2017/staterooms-00-904x450.jpg'),
(6, 'Familiar', 'https://secure.parksandresorts.wdpromedia.com/media/dcl_v0400/Site/DCLContent/Media/es/thumbs/2017/staterooms-00-904x450.jpg'),
(7, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2015/02/Viajar-solo-en-camarote-de-crucero.jpg'),
(8, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2015/02/Viajar-solo-en-camarote-de-crucero.jpg'),
(9, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2015/02/Viajar-solo-en-camarote-de-crucero.jpg'),
(10, 'Familiar', 'https://secure.parksandresorts.wdpromedia.com/media/dcl_v0400/Site/DCLContent/Media/es/thumbs/2017/staterooms-00-904x450.jpg'),
(11, 'Familiar', 'https://secure.parksandresorts.wdpromedia.com/media/dcl_v0400/Site/DCLContent/Media/es/thumbs/2017/staterooms-00-904x450.jpg'),
(12, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(13, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(14, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(15, 'Familiar', 'https://secure.parksandresorts.wdpromedia.com/media/dcl_v0400/Site/DCLContent/Media/es/thumbs/2017/staterooms-00-904x450.jpg'),
(16, 'Familiar', 'https://s3.amazonaws.com/a-us.storyblok.com/f/1005231/94177e9a86/spanish-article-test_18055.jpg'),
(17, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(18, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(19, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(20, 'Familiar', 'https://s3.amazonaws.com/a-us.storyblok.com/f/1005231/94177e9a86/spanish-article-test_18055.jpg'),
(21, 'Familiar', 'https://s3.amazonaws.com/a-us.storyblok.com/f/1005231/94177e9a86/spanish-article-test_18055.jpg'),
(22, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(23, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(24, 'Individual', 'https://cruceroadicto.com/wp-content/uploads/2016/07/camarote-interior.jpg'),
(25, 'Familiar', 'https://s3.amazonaws.com/a-us.storyblok.com/f/1005231/94177e9a86/spanish-article-test_18055.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabina_crucero`
--

CREATE TABLE `cabina_crucero` (
  `id_rcc` int(3) NOT NULL,
  `id_cabina` int(3) NOT NULL,
  `id_crucero` int(11) NOT NULL,
  `disponible_rcc` int(1) NOT NULL,
  `precio_rcc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cabina_crucero`
--

INSERT INTO `cabina_crucero` (`id_rcc`, `id_cabina`, `id_crucero`, `disponible_rcc`, `precio_rcc`) VALUES
(101, 1, 2, 0, 9999),
(102, 2, 2, 0, 9999),
(103, 3, 2, 0, 11111),
(104, 4, 2, 0, 3213),
(105, 5, 2, 0, 1233),
(106, 6, 2, 1, 0),
(107, 7, 2, 1, 0),
(108, 8, 2, 1, 0),
(109, 9, 2, 1, 0),
(110, 10, 2, 1, 0),
(111, 11, 2, 1, 0),
(112, 12, 2, 1, 0),
(113, 13, 2, 1, 0),
(114, 14, 2, 1, 0),
(115, 15, 2, 1, 0),
(116, 16, 2, 1, 0),
(117, 17, 2, 1, 0),
(118, 18, 2, 1, 0),
(119, 19, 2, 1, 0),
(120, 20, 2, 1, 0),
(121, 21, 2, 1, 0),
(122, 22, 2, 1, 0),
(123, 23, 2, 1, 0),
(124, 24, 2, 1, 0),
(125, 25, 2, 0, 0),
(126, 1, 123, 0, 9999),
(127, 2, 123, 0, 1234),
(128, 3, 123, 0, 123),
(129, 4, 123, 1, 9999),
(130, 5, 123, 0, 9999),
(131, 6, 123, 0, 9999),
(132, 7, 123, 1, 9999),
(133, 8, 123, 1, 9999),
(134, 9, 123, 1, 9999),
(135, 10, 123, 1, 9999),
(136, 11, 123, 1, 9999),
(137, 12, 123, 1, 9999),
(138, 13, 123, 1, 9999),
(139, 14, 123, 1, 9999),
(140, 15, 123, 1, 9999),
(141, 16, 123, 1, 9999),
(142, 17, 123, 1, 9999),
(143, 18, 123, 1, 9999),
(144, 19, 123, 1, 9999),
(145, 20, 123, 0, 20),
(146, 21, 123, 1, 9999),
(147, 22, 123, 1, 9999),
(148, 23, 123, 1, 9999),
(149, 24, 123, 1, 9999),
(150, 25, 123, 1, 9999),
(151, 1, 12345, 0, 9999),
(152, 2, 12345, 0, 9999),
(153, 3, 12345, 1, 9999),
(154, 4, 12345, 1, 9999),
(155, 5, 12345, 1, 9999),
(156, 6, 12345, 1, 9999),
(157, 7, 12345, 1, 9999),
(158, 8, 12345, 0, 9999),
(159, 9, 12345, 1, 9999),
(160, 10, 12345, 1, 9999),
(161, 11, 12345, 1, 9999),
(162, 12, 12345, 1, 9999),
(163, 13, 12345, 1, 9999),
(164, 14, 12345, 1, 9999),
(165, 15, 12345, 1, 9999),
(166, 16, 12345, 1, 9999),
(167, 17, 12345, 1, 9999),
(168, 18, 12345, 1, 9999),
(169, 19, 12345, 1, 9999),
(170, 20, 12345, 1, 9999),
(171, 21, 12345, 1, 9999),
(172, 22, 12345, 1, 9999),
(173, 23, 12345, 1, 9999),
(174, 24, 12345, 1, 9999),
(175, 25, 12345, 1, 9999),
(176, 1, 31231, 1, 9999),
(177, 2, 31231, 1, 9999),
(178, 3, 31231, 1, 9999),
(179, 4, 31231, 1, 9999),
(180, 5, 31231, 1, 9999),
(181, 6, 31231, 1, 9999),
(182, 7, 31231, 1, 9999),
(183, 8, 31231, 1, 9999),
(184, 9, 31231, 1, 9999),
(185, 10, 31231, 1, 9999),
(186, 11, 31231, 1, 9999),
(187, 12, 31231, 1, 9999),
(188, 13, 31231, 1, 9999),
(189, 14, 31231, 1, 9999),
(190, 15, 31231, 1, 9999),
(191, 16, 31231, 1, 9999),
(192, 17, 31231, 1, 9999),
(193, 18, 31231, 1, 9999),
(194, 19, 31231, 1, 9999),
(195, 20, 31231, 1, 9999),
(196, 21, 31231, 1, 9999),
(197, 22, 31231, 1, 9999),
(198, 23, 31231, 1, 9999),
(199, 24, 31231, 1, 9999),
(200, 25, 31231, 1, 9999),
(201, 1, 12332432, 1, 9999),
(202, 2, 12332432, 1, 9999),
(203, 3, 12332432, 1, 9999),
(204, 4, 12332432, 1, 9999),
(205, 5, 12332432, 1, 9999),
(206, 6, 12332432, 1, 9999),
(207, 7, 12332432, 1, 9999),
(208, 8, 12332432, 1, 9999),
(209, 9, 12332432, 1, 9999),
(210, 10, 12332432, 1, 9999),
(211, 11, 12332432, 1, 9999),
(212, 12, 12332432, 1, 9999),
(213, 13, 12332432, 1, 9999),
(214, 14, 12332432, 1, 9999),
(215, 15, 12332432, 1, 9999),
(216, 16, 12332432, 1, 9999),
(217, 17, 12332432, 1, 9999),
(218, 18, 12332432, 1, 9999),
(219, 19, 12332432, 1, 9999),
(220, 20, 12332432, 1, 9999),
(221, 21, 12332432, 1, 9999),
(222, 22, 12332432, 1, 9999),
(223, 23, 12332432, 1, 9999),
(224, 24, 12332432, 1, 9999),
(225, 25, 12332432, 1, 9999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(60) NOT NULL,
  `apellido_cliente` varchar(60) NOT NULL,
  `correo_cliente` varchar(30) NOT NULL,
  `telefono_cliente` varchar(12) NOT NULL,
  `contraseña_cliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `correo_cliente`, `telefono_cliente`, `contraseña_cliente`) VALUES
(12, 'perro niga', '', 'niga73@muchoniga.com', '23121231', 'marioloco'),
(13, 'marcos juarez', '', 'juarez@gmail.com', '987201', 'marioperro12'),
(14, 'marcos juarez', '', 'juarez@gmail.com', '987201', 'marioperro12'),
(16, 'humbrerto medina', '', 'medina@gmail.com', '312313', 'joselitopereez'),
(17, 'fernanda Torres', '', 'fer@gmail.com', '313123', 'sdsadsd'),
(18, 'dasas', '', 'asdasds', '123312', 'dasdas'),
(19, 'marquitos torresita', '', 'dadaa', 'dasd', 'sadadads'),
(20, 'mario lopez', '', 'cisena@cien.com', '213213123', 'sdadadas'),
(21, 'sdassd', '', 'sdadsd', '2131123', 'sdsdasd'),
(22, 'wewsds', '', 'sadasdsa', 'sadd', 'sad'),
(23, 'antonio lopez', '', 'sergio21@gmail.com', '8897464', 'jasjajajaja'),
(24, 'carlos delgado', '', 'delgado98@gmail.com', '9098912', 'carlos jaja'),
(25, 'mauricio lopez', '', 'mau@gmail.com', '23123', '123'),
(26, 'mario', '', '123', '213231', '123'),
(27, '', 'Torres Herrera', 'marifer21@gmail.com', '87123231', '1234'),
(28, 'konan big', 'fernandez torema', 'konan12@gmail.com', '3123', '123'),
(29, 'Denisse ', 'Lozano', 'nenis87@gmail.com', '87139623', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(10) NOT NULL,
  `nombre_compra` varchar(60) NOT NULL,
  `personas_compra` int(2) NOT NULL,
  `total_compra` int(10) NOT NULL,
  `correo_compra` varchar(30) NOT NULL,
  `id_rcc` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `nombre_compra`, `personas_compra`, `total_compra`, `correo_compra`, `id_rcc`) VALUES
(4, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(5, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(6, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(7, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(8, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(9, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(10, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(11, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(12, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(13, 'Denisse ', 1, 0, 'nenis87@gmail.com', 105),
(14, 'maurio', 1, 0, 'gonzalitoqgmail.com', 103),
(15, 'sdas', 1, 0, 'sada', 152);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_clientes`
--

CREATE TABLE `compra_clientes` (
  `id_clientecompra` int(10) NOT NULL,
  `id_compra` int(10) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compra_clientes`
--

INSERT INTO `compra_clientes` (`id_clientecompra`, `id_compra`, `id_cliente`) VALUES
(1, 4, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crucero`
--

CREATE TABLE `crucero` (
  `id_crucero` int(11) NOT NULL,
  `destino_crucero` varchar(50) NOT NULL,
  `fechainicio_crucero` varchar(10) NOT NULL,
  `fechacierre_crucero` varchar(10) NOT NULL,
  `barco_crucero` varchar(30) NOT NULL,
  `descripcion_crucero` varchar(100) NOT NULL,
  `itinerario_crucero` varchar(150) NOT NULL,
  `refimagen_crucero` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `crucero`
--

INSERT INTO `crucero` (`id_crucero`, `destino_crucero`, `fechainicio_crucero`, `fechacierre_crucero`, `barco_crucero`, `descripcion_crucero`, `itinerario_crucero`, `refimagen_crucero`) VALUES
(2, 'marruecosasd perro', '2023-10-12', '2023-10-24', 'parras-nigaa-dada-21', 'arriba las chivas', ' sad ', 'aaaaaaaa'),
(123, 'TAMAULIPAS', '2023-10-18', '2023-10-20', 'Alianza resort', 'VEN Y PREUBA ESTA MARAVILLOSA EXPERIENCIA DE VIAJAR AL TRANQUILO ESTADO DE TAMAULIPAS', '      -REYNOSA -CD VICTORIA - CIDUAR LERDO -MATAMOROS\r\n      ', 'https://s7g10.scene7.com/is/image/barcelo/vacacion...'),
(12345, 'RUSSIA', '2023-10-13', '2023-10-26', 'DALIAS PERICAN', 'VODKA VODKA VODKA', ' -MOSCU -ASKERDIA -SIBERIA -DUGESTAN ', 'https:'),
(31231, 'yucatan', '2023-11-15', '2023-11-23', 'cd nazas plus', 'parios olaaaa', '-mapasria -saopal', 'https://s7g10.scene7.com/is/image/barcelo/vacacion...'),
(12332432, 'dasdsa', '2023-11-10', '2023-11-25', 'saddad', 'asddsad', 'dsda', 'aaaaaaaaaaaaaaaaaaaaaaa');

--
-- Disparadores `crucero`
--
DELIMITER $$
CREATE TRIGGER `tr_crear_registros_cabina_crucero` AFTER INSERT ON `crucero` FOR EACH ROW BEGIN
  DECLARE id_cabina_temp INT;
  DECLARE id_rcc_temp INT;
  DECLARE done INT DEFAULT 0;
  DECLARE cur CURSOR FOR SELECT id_cabina FROM cabina;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
  
  OPEN cur;
  read_loop: LOOP
    FETCH cur INTO id_cabina_temp;
    IF done THEN
      LEAVE read_loop;
    END IF;
    
    -- Obtener el siguiente valor de id_rcc
    SELECT IFNULL(MAX(id_rcc), 0) + 1 INTO id_rcc_temp FROM cabina_crucero;
    
    -- Insertar un nuevo registro en cabinas_crucero
    INSERT INTO cabina_crucero (id_rcc, id_cabina, id_crucero, disponible_rcc, precio_rcc)
    VALUES (id_rcc_temp, id_cabina_temp, NEW.id_crucero, 1, 9999);
  END LOOP;
  
  CLOSE cur;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabina`
--
ALTER TABLE `cabina`
  ADD PRIMARY KEY (`id_cabina`);

--
-- Indices de la tabla `cabina_crucero`
--
ALTER TABLE `cabina_crucero`
  ADD PRIMARY KEY (`id_rcc`),
  ADD KEY `id_cabina` (`id_cabina`),
  ADD KEY `id_crucero` (`id_crucero`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_rcc` (`id_rcc`);

--
-- Indices de la tabla `compra_clientes`
--
ALTER TABLE `compra_clientes`
  ADD PRIMARY KEY (`id_clientecompra`),
  ADD KEY `COMPRA_CLIENTES_ibfk_1` (`id_cliente`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `crucero`
--
ALTER TABLE `crucero`
  ADD PRIMARY KEY (`id_crucero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `compra_clientes`
--
ALTER TABLE `compra_clientes`
  MODIFY `id_clientecompra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabina_crucero`
--
ALTER TABLE `cabina_crucero`
  ADD CONSTRAINT `CABINA_CRUCERO_ibfk_1` FOREIGN KEY (`id_cabina`) REFERENCES `cabina` (`id_cabina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CABINA_CRUCERO_ibfk_2` FOREIGN KEY (`id_crucero`) REFERENCES `crucero` (`id_crucero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `COMPRA_ibfk_1` FOREIGN KEY (`id_rcc`) REFERENCES `cabina_crucero` (`id_rcc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra_clientes`
--
ALTER TABLE `compra_clientes`
  ADD CONSTRAINT `COMPRA_CLIENTES_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `COMPRA_CLIENTES_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
