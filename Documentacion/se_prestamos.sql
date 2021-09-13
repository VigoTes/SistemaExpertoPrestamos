-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2021 a las 06:21:13
-- Versión del servidor: 5.7.32-log
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `se_prestamos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE `cuota` (
  `codCuota` int(11) NOT NULL,
  `codPrestamo` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `pago` float NOT NULL,
  `montoInteres` float NOT NULL,
  `montoAmortizacion` float NOT NULL,
  `saldoDeuda` float NOT NULL,
  `pagado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`codCuota`, `codPrestamo`, `item`, `pago`, `montoInteres`, `montoAmortizacion`, `saldoDeuda`, `pagado`) VALUES
(1, 3, 1, 433.27, 25.11, 408.16, 2102.84, 0),
(2, 3, 2, 433.27, 21.03, 412.24, 1690.6, 0),
(3, 3, 3, 433.27, 16.91, 416.36, 1274.24, 0),
(4, 3, 4, 433.27, 12.74, 420.53, 853.71, 0),
(5, 3, 5, 433.27, 8.54, 424.73, 428.98, 0),
(6, 3, 6, 433.27, 4.29, 428.98, 0, 0),
(7, 4, 1, 9.27, 1.52, 7.75, 144.25, 0),
(8, 4, 2, 9.27, 1.44, 7.83, 136.42, 0),
(9, 4, 3, 9.27, 1.36, 7.91, 128.52, 0),
(10, 4, 4, 9.27, 1.29, 7.98, 120.53, 0),
(11, 4, 5, 9.27, 1.21, 8.06, 112.47, 0),
(12, 4, 6, 9.27, 1.12, 8.14, 104.33, 0),
(13, 4, 7, 9.27, 1.04, 8.23, 96.1, 0),
(14, 4, 8, 9.27, 0.96, 8.31, 87.79, 0),
(15, 4, 9, 9.27, 0.88, 8.39, 79.4, 0),
(16, 4, 10, 9.27, 0.79, 8.48, 70.93, 0),
(17, 4, 11, 9.27, 0.71, 8.56, 62.37, 0),
(18, 4, 12, 9.27, 0.62, 8.65, 53.72, 0),
(19, 4, 13, 9.27, 0.54, 8.73, 44.99, 0),
(20, 4, 14, 9.27, 0.45, 8.82, 36.17, 0),
(21, 4, 15, 9.27, 0.36, 8.91, 27.26, 0),
(22, 4, 16, 9.27, 0.27, 9, 18.26, 0),
(23, 4, 17, 9.27, 0.18, 9.09, 9.18, 0),
(24, 4, 18, 9.27, 0.09, 9.18, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_persona`
--

CREATE TABLE `estado_persona` (
  `codEstado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_persona`
--

INSERT INTO `estado_persona` (`codEstado`, `nombre`) VALUES
(1, 'con antecedentes'),
(2, 'sin antecedentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `codPersona` int(11) NOT NULL,
  `codEstado` int(11) NOT NULL,
  `dni` char(8) NOT NULL,
  `montoAdeudado` float NOT NULL,
  `añoUltimaDeuda` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazos_posibles_paga`
--

CREATE TABLE `plazos_posibles_paga` (
  `codPlazo` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `unidadTiempo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plazos_posibles_paga`
--

INSERT INTO `plazos_posibles_paga` (`codPlazo`, `valor`, `unidadTiempo`) VALUES
(1, 6, 'meses'),
(2, 12, 'meses'),
(3, 18, 'meses'),
(4, 24, 'meses'),
(5, 5, '\r\naños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `codPrestamo` int(11) NOT NULL,
  `cliente_dni` varchar(100) NOT NULL,
  `cliente_nombres` varchar(100) NOT NULL,
  `cliente_utilidad` float NOT NULL,
  `cliente_edad` int(11) NOT NULL,
  `cliente_patrimonioTotal` float NOT NULL,
  `cliente_ingresos` float NOT NULL,
  `cliente_egresos` float NOT NULL,
  `montoPrestado` float NOT NULL,
  `codRazon` int(11) NOT NULL,
  `valorCuota` float NOT NULL,
  `montoPagado` float NOT NULL,
  `codTasaInteres` int(11) NOT NULL,
  `codPlazo` int(11) NOT NULL,
  `evaluacion_nivelUtilidades` varchar(100) NOT NULL,
  `evaluacion_riesgoPorEdad` varchar(100) NOT NULL,
  `evaluacion_nivelRetorno` varchar(100) NOT NULL,
  `evaluacion_nivelPrestamo` varchar(100) NOT NULL,
  `evaluacion_nivelCapacidadFinanciera` varchar(100) NOT NULL,
  `evaluacion_nivelRespaldoFinanciero` varchar(100) NOT NULL,
  `saldoRestante` float NOT NULL,
  `fechaHoraCreacion` datetime NOT NULL,
  `evaluacion_condicionEvaluacionPrestamo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`codPrestamo`, `cliente_dni`, `cliente_nombres`, `cliente_utilidad`, `cliente_edad`, `cliente_patrimonioTotal`, `cliente_ingresos`, `cliente_egresos`, `montoPrestado`, `codRazon`, `valorCuota`, `montoPagado`, `codTasaInteres`, `codPlazo`, `evaluacion_nivelUtilidades`, `evaluacion_riesgoPorEdad`, `evaluacion_nivelRetorno`, `evaluacion_nivelPrestamo`, `evaluacion_nivelCapacidadFinanciera`, `evaluacion_nivelRespaldoFinanciero`, `saldoRestante`, `fechaHoraCreacion`, `evaluacion_condicionEvaluacionPrestamo`) VALUES
(1, '71208489', 'VIGO BRIONES DIEGO ERNESTO', -38964, 25, 0, 12251, 51215, 15221200, 6, 0, 0, 2, 1, 'bajo', 'suficiente', 'alto', 'alto', 'mediano', 'poco', 15221200, '2021-09-12 00:58:14', 'no_aprobado'),
(2, '71208489', 'VIGO BRIONES DIEGO ERNESTO', -38964, 25, 0, 12251, 51215, 15221200, 6, 0, 0, 2, 1, 'bajo', 'suficiente', 'alto', 'alto', 'mediano', 'poco', 15221200, '2021-09-12 00:58:54', 'no_aprobado'),
(3, '71208489', 'VIGO BRIONES DIEGO ERNESTO', -38743, 51, 0, 12512, 51255, 2511, 2, 0, 0, 2, 1, 'bajo', 'suficiente', 'alto', 'bajo', 'mediano', 'poco', 2511, '2021-09-12 04:04:47', 'aprobado'),
(4, '71208489', 'VIGO BRIONES DIEGO ERNESTO', -508613, 26, 0, 12512, 521125, 152, 1, 0, 0, 2, 3, 'bajo', 'suficiente', 'alto', 'bajo', 'mediano', 'poco', 152, '2021-09-11 23:07:19', 'aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razon_prestamo`
--

CREATE TABLE `razon_prestamo` (
  `codRazon` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `tasa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `razon_prestamo`
--

INSERT INTO `razon_prestamo` (`codRazon`, `nombre`, `tasa`) VALUES
(1, 'Compra de casa', 0.1),
(2, 'Negocio de abarrotes', 0.05),
(4, 'Por Salud', 0.01),
(5, 'Compra de Casa', 0.03),
(6, 'Compra de Terreno', 0.1),
(7, 'Compra de Electródomestico', 0.07),
(8, 'Financiar estudios', 0.03),
(9, 'Compra de televisor', 0.04),
(10, 'Compra de carro', 0.01),
(11, 'Compra de motocicleta', 0.05);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasa_interes`
--

CREATE TABLE `tasa_interes` (
  `codTasaInteres` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaEliminacion` date DEFAULT NULL,
  `activo` tinyint(4) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasa_interes`
--

INSERT INTO `tasa_interes` (`codTasaInteres`, `fechaCreacion`, `fechaEliminacion`, `activo`, `valor`) VALUES
(1, '2021-09-06', '2021-09-06', 0, 0.01),
(2, '2021-09-06', NULL, 1, 0.01);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `usuario`, `password`) VALUES
(1, 'admin', '$2y$10$NT382fPkmou2YFXnAfN5V.DghGqNKhA5Ai/DycFWTIQ4dJKmlbXOu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD PRIMARY KEY (`codCuota`);

--
-- Indices de la tabla `estado_persona`
--
ALTER TABLE `estado_persona`
  ADD PRIMARY KEY (`codEstado`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`codPersona`);

--
-- Indices de la tabla `plazos_posibles_paga`
--
ALTER TABLE `plazos_posibles_paga`
  ADD PRIMARY KEY (`codPlazo`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`codPrestamo`);

--
-- Indices de la tabla `razon_prestamo`
--
ALTER TABLE `razon_prestamo`
  ADD PRIMARY KEY (`codRazon`);

--
-- Indices de la tabla `tasa_interes`
--
ALTER TABLE `tasa_interes`
  ADD PRIMARY KEY (`codTasaInteres`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
  MODIFY `codCuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `estado_persona`
--
ALTER TABLE `estado_persona`
  MODIFY `codEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `codPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plazos_posibles_paga`
--
ALTER TABLE `plazos_posibles_paga`
  MODIFY `codPlazo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `codPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `razon_prestamo`
--
ALTER TABLE `razon_prestamo`
  MODIFY `codRazon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tasa_interes`
--
ALTER TABLE `tasa_interes`
  MODIFY `codTasaInteres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
