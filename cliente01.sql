-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2023 a las 03:03:47
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cliente01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `rol` int(1) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `rol`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(32, 'usuario', 'test', '1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'avatar_hombre.png', '0a1d0061edfaff3d4de26845e610aa81.png', 1, 0),
(33, 'Jared Isaias', 'Monje Flores', 'jared@gmail.com', '1234', 1, 'avatar.png', 'baacaa7c6e070db60949e21573c9024d.png', 1, 0),
(34, 'Ruben', 'Maldonado', 'ruben@gmail.com', '827', 1, 'avatar_hombre.png', '0a1d0061edfaff3d4de26845e610aa81.png', 1, 0),
(35, 'Javier', 'Cueva Figuera', 'jacufi322@gmail.com', '5812', 2, 'avatar_hombre.png', '0a1d0061edfaff3d4de26845e610aa81.png', 1, 0),
(36, 'Salvador', 'Cueva Cueva', 'chava@gmail.com', '27654', 2, 'avatar_hombre.png', '0a1d0061edfaff3d4de26845e610aa81.png', 1, 0),
(37, 'Jessica Esmeralda', 'Lara Guevara', 'jess@gmail.com', '2147483647', 2, 'avatar_mujer.png', '1eed6577a7217307895f94e3f8df8d38.png', 1, 0),
(38, 'Nuevo', 'Usuario 3', 'nuevo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'avatar_mujer.png', '1eed6577a7217307895f94e3f8df8d38.png', 1, 0),
(39, 'usuario', 'tester', 'test1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'avatar.png', 'baacaa7c6e070db60949e21573c9024d.png', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0,
  `archivo_n` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre`, `archivo`, `status`, `eliminado`, `archivo_n`) VALUES
(4, 'Banner 1', '17f24e98492df58020e2231e96a0032e.png', 1, 1, 'banner_1.png'),
(5, 'Expo ganadera', '87951ab51543bd3eae56af83d5bccd94.png', 1, 1, 'banner_3.png'),
(6, 'expo ganadera', '17f24e98492df58020e2231e96a0032e.png', 1, 1, 'banner_1.png'),
(7, 'Banner 2', '669b6002a34e01ca38495f825d1e54d0.png', 1, 1, 'banner_2.png'),
(8, 'Banner 3', '4901dfcf3da6abd4f25a1ab54aa0e40f.png', 1, 1, 'banner_4.png'),
(9, 'Banner 5', '45b358f129becc38c6340f486a23e828.png', 1, 1, 'banner_5.png'),
(10, 'Continental', '4afe368edb7b0b639ee59981176fa812.png', 1, 0, 'banner_continental.png'),
(11, 'IBM', 'a4f98547a6c8a29c7faf12fba552540c.png', 1, 0, '7.png'),
(12, 'Apple', 'f521675981ab95733812c38bd9fb34de.png', 1, 0, 'banner_apple.png'),
(13, 'Bosch', '304b763a3a81e2118ec2ee8d35b3c3ab.png', 1, 0, 'banner_bosch.png'),
(14, 'Continental', '3890a2d359fd2f18e617ef5a8c26ff62.png', 1, 0, 'banner_continental_2.png'),
(15, 'Intel', 'e14c8503fefc1ffa30f407a1e4f18b00.png', 1, 0, 'banner_intel.png'),
(16, 'Lenovo', '62ae8f4ce25789831e9aa3a40cd8b6da.png', 1, 0, 'banner_lenovo.png'),
(17, 'Microsoft', 'fcd5dd0bfbaac96d1a677d19d8b0554f.png', 1, 0, 'banner_microsoft.png'),
(18, 'Oracle', '4e8ab53d8c5622ed843239882699ec88.png', 1, 0, 'banner_oracle.png'),
(19, 'Apple', 'f1b7883e4cefce8c6f703e7221bc9269.png', 1, 0, 'banner_samsung.png'),
(20, 'Samsung', '46be45bcbbac8927723f2155f3410d3f.png', 1, 0, 'banner_samsung_1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `usuario` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `usuario`, `status`) VALUES
(1, '2022-12-08', 'JARED', 1),
(2, '0000-00-00', '', 1),
(3, '0000-00-00', '', 1),
(4, '2022-12-07', '', 1),
(5, '2022-12-07', '', 1),
(6, '2023-02-07', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`id`, `id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(2, 2, 5, 1, 35000),
(3, 3, 10, 1, 35000),
(7, 1, 1, 1, 35000),
(8, 1, 46, 1, 35000),
(9, 1, 46, 1, 35000),
(10, 3, 43, 1, 20000),
(12, 4, 53, 1, 30000),
(13, 5, 45, 1, 35000),
(14, 5, 44, 1, 45000),
(15, 5, 47, 1, 35000),
(19, 6, 54, 1, 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(128) NOT NULL,
  `codigo_producto` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` double NOT NULL,
  `stock` int(11) NOT NULL,
  `archivo_n_productos` varchar(255) NOT NULL,
  `archivo_productos` varchar(128) NOT NULL,
  `status_producto` int(1) NOT NULL DEFAULT 1,
  `eliminado_producto` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `codigo_producto`, `descripcion`, `costo`, `stock`, `archivo_n_productos`, `archivo_productos`, `status_producto`, `eliminado_producto`) VALUES
(1, 'La Sabina', '001', 'Preparandose para su segundo parto.\r\nHija de La Reina, una de nuestras mejores vacas.\r\nTenemos grandes esperanzas en ella.', 35000, 1, 'La_Sabina.png', '6b37539454df93fb92f0a38f87872b0d.png', 1, 1),
(34, 'La Gardenia', '002', 'Madre de La Katy.\r\nMitad Suizo Americano mitad Suizo Europeo.\r\nNos regaló una becerrita producto de nuestro semental Suizo Americano.', 35000, 1, 'La_Gardenia.png', 'c4013330b08ac571e180fab2b6bd704d.png', 1, 1),
(35, 'La Katy', '003', 'Se le llegó el dia de ser mamá.\r\nOtra de las primerizas hijas de nuestro semental Barroso Cárter por payoff.', 35000, 1, 'La_Katy.png', 'ff74ee6f2d380c161456733a216f53c5.png', 1, 1),
(36, 'La Mariposa', '004', 'Otra Holstein para esos amantes del blanco y negro.Nos dió una becerra Gyrolando 5/8 producto de una inseminación.', 45000, 3, 'La_Mariposa.png', '45ad998167c63f5a783e7294718d207b.png', 1, 1),
(37, 'La Hormiga', '005', 'Una de nuestras vacas jerseys, madurando muy bien para su segundo parto.Tenemos grandes expectativas en ella, preñada de suizo americano.', 35000, 1, 'La_Hormiga.png', 'b0d0d97c3e9d9cf5e87b322d7fb44b4a.png', 1, 1),
(38, 'Vaca feliz', '010', 'esto es un test', 35000, 1, 'La_Habanera.png', 'cf0fafdfb7e1a282348e54287a10902a.png', 1, 1),
(39, 'La Camelia', '006', 'Hija La gran Muñeca. Vaca 3/4 Suizo Europeo por 1/4 Suizo Americano\r\nSe encuentra en su segunda lactancia.\r\nProducto de hembra de Suizo Americano.', 35000, 1, 'La_Camelia.png', 'b4d732ff08e4ac4ca44f70befd2436c8.png', 1, 1),
(40, 'La Coqueta', '007', 'Otra mas que le llegó su momento de ser mamá. Nos regaló un macho ( DISPONIBLE ) Hijo de nuestro semental Cárter por payoff.', 30000, 1, 'La_Coqueta.png', '6958edb43280a59af72e819073bd68f7.png', 1, 1),
(41, 'La Cuerva', '008', 'Jersey por Holstein.\r\nEn su tercera lactancia.\r\nProducto de macho Suizo Americano.', 25000, 1, 'La_Cuerva.png', '3cb9bc0e229be7149faa63cb71645e47.png', 1, 1),
(42, 'La Diana', '009', '3/4 holstein 1/4 simental. En su segunda lactancia. Producto, una becerra de nuestro semental Suizo Americano BarrosoCárter por payoff.', 35000, 1, 'La_Diana.png', '179b5b33f72e2626929b076500348ef4.png', 1, 1),
(43, 'La Granada', '011', 'Vaca 1/2 Suizo Americano 1/2 Suizo Europeo. Una de las abuelitas del rancho. 🐮Producto, una becerra hija de nuestro semental Suizo Amercano BarrosoCárter por payoff.', 20000, 1, 'La_Granada.png', 'e3d0428cee07b35ce4781d6c68831bba.png', 1, 1),
(44, 'La Guapa', '012', 'Una de nuestras vacas pequeña pero picosa, en su primera lactancia.\r\nLa genética se nota.', 45000, 1, 'La_Guapa.png', '715ff0d59a95af15fabe889c69e4c468.png', 1, 1),
(45, 'La Habanera', '013', 'Preparandose para su siguiente parto. El parto pasado nos dejó sorprendidos con su producción, vamos a ver qué tal en este. Preñada de nuestro semental suizo americano Barroso Cárter por payoff.', 35000, 1, 'La_Habanera.png', 'cf0fafdfb7e1a282348e54287a10902a.png', 1, 1),
(46, 'La Jirafa', '014', 'vaca Holsein en su segunda lactancia. Producto macho de Suizo Americano disponible a la venta.', 35000, 1, 'La_Jirafa.png', '648be60fb86266b9f11277a196c08205.png', 1, 1),
(47, 'La Joya', '015', 'Vaca Suizo Americano con Suizo Europeo en su tercer lactancia. Nos regaló una hermosa hembra de Suizo Americano.', 35000, 1, 'La_Joya.png', 'd6539e07b3dcb4221417a5a777e693bf.png', 1, 1),
(48, 'La Muñeca', '016', 'Mitad Suizo Americano mitad Suizo Europeo. Sangre de Medor y de Vigor. Vaca de 5to parto. Como productos nos dio un macho de nuestro semental Barroso Cárter por payoff.', 35000, 1, 'La_Muneca.png', '57c04c5d3417be0682f9375563b85fa4.png', 1, 1),
(49, 'La Tablilla', '017', 'Vaca jersey con holstein. En su 4ta lactancia. Producto, una hermosa hembra de Suizo Americano.', 35000, 1, 'La_Tablilla.png', 'c1f8c3c593bbc1781a74b7a94f883560.png', 1, 1),
(50, 'La Tejona', '018', 'Debutando como mamá. Hija de la gran Cuerva. Producto, una hembra de nuestro semental Barroso Seaman por jetway.', 35000, 1, 'La_Tejona.png', '4d23950f594ee71462ad5dd3ea7d4d3c.png', 1, 1),
(51, 'La Tortuga', '019', 'Una de nuestras vacas primerizas. Suiza americano con Suizo Europeo    Nos dió una linda hembra de nuestro toro Suizo Americano Cárter del rancho el Barroso.', 40000, 1, 'La_Tortuga.png', '43dfb7b89496d69052999a5bf705d241.png', 1, 1),
(52, 'La Toscana', '020', 'Hija de Urraca y de nuestro semental Cárter por payoff. Nos dió una becerra hija de nuestro semental Barroso Seaman por Jetway.', 20000, 1, 'La_Toscana.png', '4698562408be7d4c6cb336959ede4060.png', 1, 1),
(53, 'La Urraca', '021', 'Jersey por Holstein. Se encuentra en su 4ta lactancia.\r\nProducto hembra de Suizo Americano.', 30000, 1, 'La_Urraca.png', '4eb1ca5b2292113f3265515a5c7f86f1.png', 1, 1),
(54, 'Oracle', '16342669', 'DBA ORACLE\r\n\r\nContratación: Permanente\r\nHorario: Tiempo completo\r\nEspacio de trabajo: Presencial\r\n\r\nPrestaciones de ley.\r\nSeguro de gastos medicos.\r\nBono anual por desempeño.\r\n\r\nConocimientos:\r\nNecesario Base de Datos Oracle\r\nAplicaciones en Java y .Net\r\n', 20000, 3, 'Oracle.png', 'd00a77531988d90d5a731d3464055b79.png', 1, 0),
(55, 'Samsung', '16294928', 'Ingeniero Jr de Sistemas.\r\n\r\nContratación: Permanente.\r\nHorario: Tiempo completo.\r\nEspacio de trabajo: Presencial.\r\n\r\nRequisitos:\r\ningeniería en sistemas termianda.\r\n3 años de experiencia.\r\nInglés intermedio.\r\nConocimientos en hardware\r\n\r\nOfrecemos sueldo dependiendo de la experiencia.\r\nPrestaciones ofrecidas.\r\nOportunidad de desarrollo.\r\n', 40000, 2, 'Samsung.png', '5ba99199b8091a58750a35d8a2570e3b.png', 1, 0),
(56, 'Microsoft', '16330025', 'ANALISTA PROGRAMADOR MICROSOFT:\r\n\r\nContratación: Temporal.\r\nHorario: Tiempo completo.\r\nEspacio de trabajo: Híbido.\r\n\r\nRequerimientos:\r\nProgramación en .Net.\r\nPython\r\nAzure\r\n3 años de experiencia\r\n\r\nOfrecemos sueldo competitivo, esquema nominal, prestaciones de ley y oportunidad de desarrollo.\r\n', 45000, 3, 'Microsoft.png', '36fa092bd955601531d90e1ae9ccce9a.png', 1, 0),
(57, 'Apple', '16339478', 'SENIOR ¡OS DEVELOPER:\r\n\r\nContratación: Permanente\r\nHorario: Tiempo completo.\r\nEspacio de trabajo: Presencial.\r\n\r\nDescripcion:\r\nMinimo 9 años de experiencia en TI.\r\nHaber publicado al menos una aplicación en Apple Store.\r\nMínimo 4 años de experiencia con Swift + Objective C.\r\n', 50000, 5, 'Apple.png', 'db5c5b309a672517246e5b7c654b923d.png', 1, 0),
(58, 'AT&T', '16313948', 'FULL STACK DEVELOPER:\r\n\r\nContratación: Permanente.\r\nHorario: Tiempo completo.\r\nEspacio de trabajo: Presencial.\r\n\r\nRequisitos:\r\nOffice\r\nJavascript intermedio.\r\nTypescript intermedio.\r\n.Net\r\n\r\nOfrecemos:\r\nBono de productividad.\r\nPrestaciones de ley.\r\nExcelente ambiente de trabajo.\r\n', 12000, 1, 'AT&T.png', '759b9e9a8a7095aea961d6e4555e57a3.png', 1, 0),
(59, 'Cisco', '16342426', 'PROGRAMADOR CNC:\r\n\r\nContratación: Permanente.\r\nHorario: Tiempo completo.\r\nEspacio de trabajo: Presencial.\r\n\r\nRequerimientos:\r\nProgramacción en NX/SIEMENS\r\nDiseño de productos.\r\nExperiencia en giro automotriz 2 a 3 años requerido.\r\n\r\n', 18000, 3, 'Cisco.png', '4919774fdeae07c90b6de0e4f0206fce.png', 1, 0),
(60, 'Continental', '16295037', 'EMBEBIDOS:\r\n\r\nContratación: Temporal.\r\nModalidad: Híbrido.\r\nHorario: Medio tiempo.\r\n\r\nRequerimientos:\r\nMayor de edad.\r\nConocimientos en C++, C y Python.\r\nInglés intermedio.\r\n\r\nOfrecemos prestaciones de ley, posibilidad de crecer en poco tiempo.', 24000, 1, 'Continental.png', 'e0554c45f7753fe8edc8019c30428bd9.png', 1, 0),
(61, 'General Eléctronic', '16310941', 'TEST TECHNICIAN:\r\n\r\nContratación: Permanente.\r\nHorario: Tiempo completo.\r\nEspacio de trabajo: Presencial.\r\n\r\nTécnico de pruebas\r\n\r\nActividades a realizar:\r\nMantenimiento de equipos.\r\nControl de repuestos para equipos.\r\nSoporte al departamento de producción.\r\n\r\nRequerimientos:\r\nExperiencia es proceso SMT.\r\nIndustria eléctronica.\r\nICT', 22000, 5, 'General_Electronic.png', '264915f1bd787ff6a1a878b3f07596c5.png', 1, 0),
(62, 'Google', '16210117', 'ANALISTA EN GOOGLE SEO Y DESARROLLO WEB:\r\n\r\nContratación: Permanente.\r\nHorario: Tiempo completo.\r\nEspacio de trabajo: Presencial.\r\n\r\nBeneficios:\r\nPrestaciones de ley (IMSS, vacaciones, aguinaldo).\r\n\r\nRequisitos:\r\nLic, pasante o titulado de programación.\r\n+1 año de experiencia laboral.\r\nConocimientos en Google Analytics, Data Studio, Ads, Meta ads y conocimientos en diseño (básico).\r\nInglés básico.', 50000, 1, 'Google.png', 'd161b5b1a8f60e85bb26264d414617c1.png', 1, 0),
(63, 'IBM', '16995678', 'jehwbrhbwhr', 30000, 3, 'IBM.png', '37e1fca175f584ccca771df949943b16.png', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
