-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2024 a las 11:20:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `ruta` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Categoria`, `categoria`, `descripcion`, `ruta`) VALUES
(1, 'Fantasía', 'Como su nombre indica, el género literario de la fantasía se refiere a historias llenas de elementos imaginarios y poco realistas. Los eventos en una fantasía operan fuera de las leyes del universo real y típicamente involucran elementos sobrenaturales, como criaturas mágicas o mágicas.', 'fantasia.php'),
(2, 'Ciencia Ficción', 'La ciencia ficción es un género narrativo que sitúa la acción en unas coordenadas espacio-temporales imaginarias y diferentes a las nuestras, y que especula racionalmente sobre posibles avances científicos o sociales y su impacto en la sociedad.', 'cienciaFiccion.php'),
(3, 'Aventuras', 'Los libros de aventuras cuentan con tramas de paquetes de acción y un ritmo rápido, y un héroe que tiene que completar una misión o un viaje inesperado en un corto período de tiempo. A menudo, el personaje principal tiene la tarea de salvar a otra persona o luchar contra algo malvado y aterrador, y el azar juega un papel importante en lo que sucede a lo largo de la historia.', 'aventuras.php'),
(4, 'Policíaco', 'La novela policíaca es un género narrativo en donde la trama consiste generalmente en la resolución de un misterio de tipo criminal. El protagonista en la novela policíaca es normalmente un policía o un detective, habitualmente recurrente a lo largo de varias novelas del mismo autor, que, mediante la observación, el análisis y el razonamiento deductivo, consigue finalmente averiguar cómo, dónde, por qué se produjo el crimen y quién lo perpetró.', 'policiaco.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Autor` varchar(50) NOT NULL,
  `Año` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `ID_Categoria`, `Nombre`, `Autor`, `Año`) VALUES
(6, 3, 'Harry Potter y la Piedra Filosofal', 'J.K. Rowling', 1997),
(7, 4, 'Estudio en escarlata', 'Arthur Conan Doyle', 1887),
(8, 3, 'El Alquimista', 'Paulo Coelho', 1988),
(9, 4, 'Asesinato en el Orient Express', 'Agatha Christie', 1934),
(10, 4, 'Muerte en el Nilo', 'Agatha Christie', 1937),
(15, 3, 'La vuelta al mundo en ochenta días', 'Julio Verne', 1873),
(16, 2, 'Dune', 'Frank Herbert', 1965),
(28, 3, 'La isla del tesoro', 'Robert Louis Stevenson', 1883),
(29, 3, 'Argonáuticas', 'Apolonio de Rodas', 1496),
(30, 3, 'Las Minas Del Rey Salomón', ' H. Rider Haggard', 1885),
(31, 3, 'Moby Dick', 'Herman Melville', 1851),
(32, 3, 'Los tres mosqueteros', 'Alejandro Dumas', 1844),
(33, 3, 'En Las Montañas De La Locura Y Otros Relatos', ' H. P. Lovecraft', 1936),
(34, 3, 'El Corazón De Las Tinieblas', 'Joseph Conrad', 1899),
(35, 3, 'Don Quijote De La Mancha', 'Miguel de Cervantes', 1605),
(36, 2, 'Un mundo feliz', 'Aldous Huxley ', 1932),
(38, 2, 'Fundacion', 'Isaac Asimov', 1951),
(39, 2, 'Neuromante', 'William Gibson', 1984),
(40, 2, '1984', 'George Orwell', 1949),
(41, 2, 'El juego de Ender', 'Orson Scott Card', 1985),
(42, 2, 'Solaris', 'Stanislaw Lem', 1961),
(43, 2, 'Blade Runner', 'Philip K. Dick', 1968),
(44, 2, 'Hyperion', 'Dan Simmons', 1989),
(45, 2, 'La mano izquierda de la oscuridad', 'Ursula K. Le Guin', 1969),
(46, 2, 'Snow Crash', 'Neal Stephenson', 1992),
(47, 2, 'La guerra de los mundos', 'H.G. Wells', 1898),
(48, 2, 'El fin de la eternidad', 'Isaac Asimov', 1955),
(49, 2, 'La invención de Morel', 'Adolfo Bioy Casares', 1940),
(50, 2, 'El hombre en el castillo', 'Philip K. Dick', 1962),
(51, 1, 'El nombre del viento', 'Patrick Rothfuss', 2007),
(52, 1, 'Cazadores de sombras: Ciudad de hueso', 'Cassandra Clare', 2007),
(53, 1, 'La espada del destino', 'Andrzej Sapkowski', 1992),
(54, 1, 'El ciclo de la puerta de la muerte', 'Margaret Weis y Tracy Hickman', 1984),
(55, 1, 'La rueda del tiempo: El ojo del mundo', 'Robert Jordan', 1990),
(56, 1, 'Elantris', 'Brandon Sanderson', 2005),
(57, 4, 'La sombra del viento', 'Carlos Ruiz Zafón', 2001),
(58, 4, 'La muerte de Artemio Cruz', 'Carlos Fuentes', 1962),
(59, 4, 'Infierno', 'Dan Brown', 2013),
(60, 4, 'Mystic River', 'Dennis Lehane', 2001),
(61, 4, 'El cuarto protocolo', 'Frederick Forsyth', 1984);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `usuario` varchar(45) NOT NULL,
  `ID_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`usuario`, `ID_Categoria`) VALUES
('Diego', 1),
('Diego', 2),
('Diego', 3),
('Diego', 4),
('UsuarioPrueba', 1),
('UsuarioPrueba', 2),
('UsuarioPrueba', 3),
('UsuarioPrueba', 4),
('UsuarioTest', 1),
('UsuarioTest', 2),
('UsuarioTest', 3),
('UsuarioTest', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`, `admin`) VALUES
('Admin', '147258', 1),
('Diego', '0000', 0),
('UsuarioPrueba', '665544', 0),
('UsuarioTest', '654321', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`usuario`,`ID_Categoria`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
