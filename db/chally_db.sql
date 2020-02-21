-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2020 a las 00:46:15
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chally_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amistades`
--

CREATE TABLE `amistades` (
  `id_amistad` int(11) NOT NULL,
  `id_usuario1` int(11) DEFAULT NULL,
  `id_usuario2` int(11) DEFAULT NULL,
  `fecha_amistad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `id_respuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Diseño y Arte', NULL),
(2, 'Fotografia', NULL),
(3, 'Programacion y Logica', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_desafio` int(11) DEFAULT NULL,
  `id_respuesta` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desafios`
--

CREATE TABLE `desafios` (
  `id_desafio` int(11) NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `imagen` varchar(40) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_respuesta_ganadora` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `dificultad` tinyint(4) DEFAULT NULL,
  `requisitos` text DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `desafios`
--

INSERT INTO `desafios` (`id_desafio`, `fecha_creacion`, `fecha_limite`, `imagen`, `descripcion`, `id_respuesta_ganadora`, `id_categoria`, `id_autor`, `dificultad`, `requisitos`, `nombre`) VALUES
(8, '2020-02-13', '2020-02-27', 'img_5e458478ababd.jpg', 'Realizar la secuencia de Fibonacci en PHP la cual se define como que el siguiente numero es la suma de los dos anteriores <br />\r\n<br />\r\n1 1 2 3 5 8 13 21 44 65 etc<br />\r\n<br />\r\nEl objetiv es obtener la cantidad de veces que se necesita iterar la funcion hasta tener el numero 102334155 (ni mas ni menos)', NULL, 3, 1, 2, ' -->Navegador<br />\r\n-->Editor de texto(notepad++ ,vscode , atom ,sublimetext etc)<br />\r\n-->Servidor PHP (xampp)', 'Desafio de programar la secuencia de Fibonacci'),
(10, '2020-02-13', '2020-02-13', 'img_5e45bf9291242.png', 'Aprobar sprint4 (PDO) de DigitalHouse   ', NULL, 3, 7, 2, '              ABM Posteos <br /><br /><br /><br /><br /><br />\r\nY no me acuerdo que mas', 'Aprobar SPRINT4 DigitalHouse  xd'),
(16, '2020-02-14', '2020-02-27', 'img_5e45dd93952d2.jpeg', 'Se invita a artistas, diseñadores e ilustradores  a crear material gráfico único para Joker inspirado en las últimas imágenes y avances de la película. ¡También se alienta a los artistas a grabar y enviar videos de time-lapse de su trabajo para que los fans puedan ver cómo el arte cobra vida!<br /><br /><br />\r\n<br /><br /><br />\r\nLos artistas pueden descargar el Paquete de Recursos desde https://tlnt.at/2LfTS4d para obtener inspiración y referencias visuales de los personajes que aparecen en la película.', NULL, 3, 10, 3, '   <br /><br /><br />\r\n· Los diseños serán presentados en JPEG o PNG con un tamaño máximo de 10MB. <br /><br /><br />\r\n· Todas las presentaciones deben ser material gráfico original (es decir, no utilizar materiales preexistentes de terceros, ya sea de stock o protegidos por derechos de autor). <br /><br /><br />\r\n· Los Artistas pueden representar retratos de los personajes de Guasón y pueden incluir el logotipo del título de Guasón en su material gráfico. Todos los derechos sobre y para los personajes y el logotipo del título están reservados por Warner Bros. Pictures', 'Poster alternativo inspirado en la pelíc Joker ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desafios_destacados`
--

CREATE TABLE `desafios_destacados` (
  `id_desafio_destacado` int(11) NOT NULL,
  `id_desafio` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `id_interes` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intereses`
--

INSERT INTO `intereses` (`id_interes`, `nombre`, `id_usuario`, `id_categoria`) VALUES
(1, NULL, 1, 2),
(2, NULL, 1, 3),
(3, NULL, 2, 3),
(4, NULL, 3, 3),
(5, NULL, 4, 2),
(6, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_desafio` int(11) DEFAULT NULL,
  `id_respuesta` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_respuesta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_desafio` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `contrasena` varchar(60) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `mail` varchar(60) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `fecha_nacimiento`, `sexo`, `nombre`, `apellido`, `contrasena`, `username`, `mail`, `avatar`) VALUES
(1, '1998-09-21', 'h', 'Franco', 'Fourmantin', '$2y$10$bR0jDF6inx29uICA5H60U.oNBKaPJC6RE', 'franklinss', 'francofourmantin@gmail.com', 'img_5df7b954b822e.png'),
(2, '1981-05-29', 'h', 'Matias', 'Bruno', '$2y$10$APje3LOVckLEQ.ZA2s35J.c3e82kcV/0i', 'matiasbr1', 'matias@mail.com', 'img_5df68b928a2d4.jpg'),
(3, '1994-11-24', 'h', 'Emiliano', 'Gioia', '$2y$10$oqhBCHEiBTdE.m8HE/BgS.5Ef.FvbX2Ts', 'EmilianoG', 'emiliano@gioia.com.ar', 'img_5df80ba7eafe4.jpg'),
(4, '1994-11-24', 'h', 'Emiliano', 'Gioia', '$2y$10$N5VrZv.fqvwmCC/RaCpEf.75iGGtqHSza', 'emilainog94', 'emiliano@gioia.com.ara', 'img_5df81ce9eefe3.jpg'),
(5, '1994-11-24', 'h', 'Emiliano', 'Gioia', '$2y$10$dsKYZd3CFhQKSi0U24GcP.otRQG9P1Jw6', 'Emilainoasdasd', 'emiliano@gioiaa.com.ar', 'img_5df81d1a5019f.jpg'),
(6, '1998-09-21', 'h', 'Franco', 'Fourmantin', '$2y$10$tpcTQhvHub42dNeh3qqcqub87BurDnqpl', 'franklinsss', 'franco@netactics.com.ar', 'img_5e456934af44e.jpg'),
(7, '1998-09-21', 'h', 'Franco', 'Fourmantin', '$2y$10$uBVWXMGlagqMbJ7pX9FNnuN8/uNdzBY90', 'FranKlin420', 'franco@gmail.com', 'img_5e45913d5ce02.jpg'),
(8, '1998-09-21', 'h', 'Franco', 'Fourmantin', '$2y$10$heAvDgRCqoU3kWAkFrRvKe64IOMdDYfjn', 'franklinsssss', 'asdasdadasd@123123.com', 'img_5e45d835625e5.jpg'),
(9, '2020-02-06', 'h', 'Franco', 'Fourmantin', '$2y$10$yL0/Y80nRHdaWcKS0X8/F../yfH0fbMK3', 'onomatopeya', 'francoo@gmail.com', 'img_5e45db0add107.jpg'),
(10, '1998-09-21', 'h', 'Franco', 'Fourmantin', '$2y$10$RpEKCaOVH7kDTAs68mKr.OLKGqQPZzV7xxo5Cb8ZPYhtK5v5vDhuO', '420Franklin', 'francooo@gmail.com', 'img_5e45dc3a6e7a5.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amistades`
--
ALTER TABLE `amistades`
  ADD PRIMARY KEY (`id_amistad`),
  ADD KEY `id_usuario1` (`id_usuario1`),
  ADD KEY `id_usuario2` (`id_usuario2`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_respuesta` (`id_respuesta`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_desafio` (`id_desafio`),
  ADD KEY `id_respuesta` (`id_respuesta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `desafios`
--
ALTER TABLE `desafios`
  ADD PRIMARY KEY (`id_desafio`),
  ADD KEY `id_respuesta_ganadora` (`id_respuesta_ganadora`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `desafios_destacados`
--
ALTER TABLE `desafios_destacados`
  ADD PRIMARY KEY (`id_desafio_destacado`),
  ADD KEY `id_desafio` (`id_desafio`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD PRIMARY KEY (`id_interes`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_desafio` (`id_desafio`),
  ADD KEY `id_respuesta` (`id_respuesta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `id_desafio` (`id_desafio`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amistades`
--
ALTER TABLE `amistades`
  MODIFY `id_amistad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `desafios`
--
ALTER TABLE `desafios`
  MODIFY `id_desafio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `desafios_destacados`
--
ALTER TABLE `desafios_destacados`
  MODIFY `id_desafio_destacado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intereses`
--
ALTER TABLE `intereses`
  MODIFY `id_interes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amistades`
--
ALTER TABLE `amistades`
  ADD CONSTRAINT `amistades_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `amistades_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id_respuesta`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_desafio`) REFERENCES `desafios` (`id_desafio`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id_respuesta`),
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `desafios`
--
ALTER TABLE `desafios`
  ADD CONSTRAINT `desafios_ibfk_1` FOREIGN KEY (`id_respuesta_ganadora`) REFERENCES `respuestas` (`id_respuesta`),
  ADD CONSTRAINT `desafios_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `desafios_ibfk_3` FOREIGN KEY (`id_autor`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `desafios_destacados`
--
ALTER TABLE `desafios_destacados`
  ADD CONSTRAINT `desafios_destacados_ibfk_1` FOREIGN KEY (`id_desafio`) REFERENCES `desafios` (`id_desafio`),
  ADD CONSTRAINT `desafios_destacados_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD CONSTRAINT `intereses_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `intereses_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_desafio`) REFERENCES `desafios` (`id_desafio`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id_respuesta`),
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_desafio`) REFERENCES `desafios` (`id_desafio`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
