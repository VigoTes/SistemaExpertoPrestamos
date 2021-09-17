-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 06:00 AM
-- Server version: 5.7.32-log
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se_prestamos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuota`
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
-- Dumping data for table `cuota`
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
(24, 4, 18, 9.27, 0.09, 9.18, 0, 0),
(25, 5, 1, 151.04, 17, 134.04, 1565.96, 0),
(26, 5, 2, 151.04, 15.66, 135.38, 1430.57, 0),
(27, 5, 3, 151.04, 14.31, 136.74, 1293.84, 0),
(28, 5, 4, 151.04, 12.94, 138.1, 1155.73, 0),
(29, 5, 5, 151.04, 11.56, 139.49, 1016.25, 0),
(30, 5, 6, 151.04, 10.16, 140.88, 875.37, 0),
(31, 5, 7, 151.04, 8.75, 142.29, 733.08, 0),
(32, 5, 8, 151.04, 7.33, 143.71, 589.36, 0),
(33, 5, 9, 151.04, 5.89, 145.15, 444.22, 0),
(34, 5, 10, 151.04, 4.44, 146.6, 297.61, 0),
(35, 5, 11, 151.04, 2.98, 148.07, 149.55, 0),
(36, 5, 12, 151.04, 1.5, 149.55, 0, 0),
(37, 6, 1, 424.81, 24.62, 400.19, 2061.81, 0),
(38, 6, 2, 424.81, 20.62, 404.2, 1657.61, 0),
(39, 6, 3, 424.81, 16.58, 408.24, 1249.37, 0),
(40, 6, 4, 424.81, 12.49, 412.32, 837.05, 0),
(41, 6, 5, 424.81, 8.37, 416.44, 420.61, 0),
(42, 6, 6, 424.81, 4.21, 420.61, 0, 0),
(43, 7, 1, 2.07, 0.12, 1.95, 10.05, 0),
(44, 7, 2, 2.07, 0.1, 1.97, 8.08, 0),
(45, 7, 3, 2.07, 0.08, 1.99, 6.09, 0),
(46, 7, 4, 2.07, 0.06, 2.01, 4.08, 0),
(47, 7, 5, 2.07, 0.04, 2.03, 2.05, 0),
(48, 7, 6, 2.07, 0.02, 2.05, 0, 0),
(49, 8, 1, 690.19, 40, 650.19, 3349.81, 0),
(50, 8, 2, 690.19, 33.5, 656.7, 2693.11, 0),
(51, 8, 3, 690.19, 26.93, 663.26, 2029.85, 0),
(52, 8, 4, 690.19, 20.3, 669.89, 1359.95, 0),
(53, 8, 5, 690.19, 13.6, 676.59, 683.36, 0),
(54, 8, 6, 690.19, 6.83, 683.36, 0, 0),
(55, 9, 1, 517.65, 30, 487.65, 2512.35, 0),
(56, 9, 2, 517.65, 25.12, 492.52, 2019.83, 0),
(57, 9, 3, 517.65, 20.2, 497.45, 1522.39, 0),
(58, 9, 4, 517.65, 15.22, 502.42, 1019.97, 0),
(59, 9, 5, 517.65, 10.2, 507.45, 512.52, 0),
(60, 9, 6, 517.65, 5.13, 512.52, 0, 0),
(61, 10, 1, 172.55, 10, 162.55, 837.45, 0),
(62, 10, 2, 172.55, 8.37, 164.17, 673.28, 0),
(63, 10, 3, 172.55, 6.73, 165.82, 507.46, 0),
(64, 10, 4, 172.55, 5.07, 167.47, 339.99, 0),
(65, 10, 5, 172.55, 3.4, 169.15, 170.84, 0),
(66, 10, 6, 172.55, 1.71, 170.84, 0, 0),
(67, 11, 1, 690.19, 40, 650.19, 3349.81, 0),
(68, 11, 2, 690.19, 33.5, 656.7, 2693.11, 0),
(69, 11, 3, 690.19, 26.93, 663.26, 2029.85, 0),
(70, 11, 4, 690.19, 20.3, 669.89, 1359.95, 0),
(71, 11, 5, 690.19, 13.6, 676.59, 683.36, 0),
(72, 11, 6, 690.19, 6.83, 683.36, 0, 0),
(73, 12, 1, 690.19, 40, 650.19, 3349.81, 0),
(74, 12, 2, 690.19, 33.5, 656.7, 2693.11, 0),
(75, 12, 3, 690.19, 26.93, 663.26, 2029.85, 0),
(76, 12, 4, 690.19, 20.3, 669.89, 1359.95, 0),
(77, 12, 5, 690.19, 13.6, 676.59, 683.36, 0),
(78, 12, 6, 690.19, 6.83, 683.36, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `estado_persona`
--

CREATE TABLE `estado_persona` (
  `codEstado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombreParaVista` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado_persona`
--

INSERT INTO `estado_persona` (`codEstado`, `nombre`, `nombreParaVista`) VALUES
(1, 'con_antecedentes', 'Con Antecedentes'),
(2, 'sin_antecedentes', 'Sin Antecedentes');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `codPersona` int(11) NOT NULL,
  `codEstado` int(11) NOT NULL,
  `dni` char(8) NOT NULL,
  `montoAdeudado` float NOT NULL,
  `añoUltimaDeuda` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`codPersona`, `codEstado`, `dni`, `montoAdeudado`, `añoUltimaDeuda`) VALUES
(2, 1, '73710888', 14888, 2020),
(4, 1, '71208489', 2000, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `plazos_posibles_paga`
--

CREATE TABLE `plazos_posibles_paga` (
  `codPlazo` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `unidadTiempo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plazos_posibles_paga`
--

INSERT INTO `plazos_posibles_paga` (`codPlazo`, `valor`, `unidadTiempo`) VALUES
(1, 6, 'meses'),
(2, 12, 'meses'),
(3, 18, 'meses'),
(4, 24, 'meses'),
(5, 5, '\r\naños');

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
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
-- Dumping data for table `prestamo`
--

INSERT INTO `prestamo` (`codPrestamo`, `cliente_dni`, `cliente_nombres`, `cliente_utilidad`, `cliente_edad`, `cliente_patrimonioTotal`, `cliente_ingresos`, `cliente_egresos`, `montoPrestado`, `codRazon`, `valorCuota`, `montoPagado`, `codTasaInteres`, `codPlazo`, `evaluacion_nivelUtilidades`, `evaluacion_riesgoPorEdad`, `evaluacion_nivelRetorno`, `evaluacion_nivelPrestamo`, `evaluacion_nivelCapacidadFinanciera`, `evaluacion_nivelRespaldoFinanciero`, `saldoRestante`, `fechaHoraCreacion`, `evaluacion_condicionEvaluacionPrestamo`) VALUES
(3, '71208489', 'VIGO BRIONES DIEGO ERNESTO', -38743, 51, 0, 12512, 51255, 2511, 2, 0, 0, 2, 1, 'bajo', 'suficiente', 'alto', 'bajo', 'mediano', 'poco', 2511, '2021-09-12 04:04:47', 'aprobado'),
(4, '71208489', 'VIGO BRIONES DIEGO ERNESTO', -508613, 26, 0, 12512, 521125, 152, 1, 0, 0, 2, 3, 'bajo', 'suficiente', 'alto', 'bajo', 'mediano', 'poco', 152, '2021-09-11 23:07:19', 'aprobado'),
(5, '73370259', 'MASLUCAN ROJAS ELISA MARGARITA', 1000, 27, 0, 2500, 1500, 1700, 11, 0, 0, 2, 2, 'bajo', 'suficiente', 'alto', 'bajo', 'mediano', 'poco', 1700, '2021-09-12 17:56:32', 'aprobado'),
(6, '70513890', 'OLIVARES GUTIERREZ XIOMARA CAROLINA', -50361, 22, 0, 5151, 55512, 2462, 1, 424.81, 0, 2, 1, 'bajo', 'suficiente', 'alto', 'bajo', 'mediano', 'poco', 2462, '2021-09-12 18:47:37', 'aprobado'),
(7, '71208489', 'VIGO BRIONES DIEGO ERNESTO', 11246000, 21, 0, 11251100, 5125, 12, 4, 2.07, 0, 2, 1, 'alto', 'suficiente', 'alto', 'bajo', 'grande', 'poco', 12, '2021-09-12 19:02:11', 'aprobado'),
(8, '74387518', 'RODRIGUEZ PAREDES ESTEFANY MARICIELO', 4000, 22, 0, 5500, 1500, 4000, 2, 690.19, 0, 2, 1, 'medio', 'suficiente', 'regular', 'bajo', 'grande', 'poco', 4000, '2021-09-13 00:53:03', 'aprobado'),
(9, '33720143', 'ROJAS DE MASLUCAN PETRONILA', 1000, 25, 0, 2000, 1000, 3000, 4, 517.65, 0, 2, 1, 'bajo', 'suficiente', 'alto', 'bajo', 'mediano', 'poco', 3000, '2021-09-13 12:43:01', 'aprobado'),
(10, '71208488', 'VIGO BRIONES ARTURO ELISEO', 2200, 23, 0, 2500, 300, 1000, 7, 172.55, 0, 2, 1, 'medio', 'suficiente', 'regular', 'bajo', 'grande', 'poco', 1000, '2021-09-13 13:27:30', 'aprobado'),
(11, '19082305', 'SANCHEZ TICONA ROBERT JERRY', 2000, 22, 0, 3500, 1500, 4000, 2, 690.19, 0, 2, 1, 'medio', 'suficiente', 'regular', 'bajo', 'grande', 'poco', 4000, '2021-09-13 18:25:54', 'aprobado'),
(12, '71208489', 'VIGO BRIONES DIEGO ERNESTO', 1000, 20, 0, 2500, 1500, 4000, 4, 690.19, 0, 2, 1, 'bajo', 'suficiente', 'alto', 'bajo', 'mediano', 'poco', 4000, '2021-09-15 22:09:43', 'aprobado');

-- --------------------------------------------------------

--
-- Table structure for table `razon_prestamo`
--

CREATE TABLE `razon_prestamo` (
  `codRazon` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `tasa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `razon_prestamo`
--

INSERT INTO `razon_prestamo` (`codRazon`, `nombre`, `tasa`) VALUES
(1, 'Compra de casa', 0.03),
(2, 'Negocio de abarrotes', 0.04),
(4, 'Por Salud', 0.01),
(5, 'Compra de Departamento', 0.03),
(6, 'Compra de Terreno', 0.01),
(7, 'Compra de Electródomestico', 0.02),
(8, 'Financiar estudios', 0.03),
(9, 'Compra de televisor', 0.01),
(10, 'Compra de carro', 0.01),
(11, 'Compra de motocicleta', 0.01),
(12, 'Negocio de Farmacia', 0.03),
(13, 'Negocio de Restaurant', 0.03);

-- --------------------------------------------------------

--
-- Table structure for table `tasa_interes`
--

CREATE TABLE `tasa_interes` (
  `codTasaInteres` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaEliminacion` date DEFAULT NULL,
  `activo` tinyint(4) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasa_interes`
--

INSERT INTO `tasa_interes` (`codTasaInteres`, `fechaCreacion`, `fechaEliminacion`, `activo`, `valor`) VALUES
(1, '2021-09-06', '2021-09-06', 0, 0.01),
(2, '2021-09-06', NULL, 1, 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `usuario`, `password`) VALUES
(1, 'admin', '$2y$10$xbeBcFEZa5uhbV1UhA6tiOBWPakPPv1SxHwgvZ/8DIpn.VAivZkDe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuota`
--
ALTER TABLE `cuota`
  ADD PRIMARY KEY (`codCuota`);

--
-- Indexes for table `estado_persona`
--
ALTER TABLE `estado_persona`
  ADD PRIMARY KEY (`codEstado`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`codPersona`);

--
-- Indexes for table `plazos_posibles_paga`
--
ALTER TABLE `plazos_posibles_paga`
  ADD PRIMARY KEY (`codPlazo`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`codPrestamo`);

--
-- Indexes for table `razon_prestamo`
--
ALTER TABLE `razon_prestamo`
  ADD PRIMARY KEY (`codRazon`);

--
-- Indexes for table `tasa_interes`
--
ALTER TABLE `tasa_interes`
  ADD PRIMARY KEY (`codTasaInteres`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuota`
--
ALTER TABLE `cuota`
  MODIFY `codCuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `estado_persona`
--
ALTER TABLE `estado_persona`
  MODIFY `codEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `codPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plazos_posibles_paga`
--
ALTER TABLE `plazos_posibles_paga`
  MODIFY `codPlazo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `codPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `razon_prestamo`
--
ALTER TABLE `razon_prestamo`
  MODIFY `codRazon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tasa_interes`
--
ALTER TABLE `tasa_interes`
  MODIFY `codTasaInteres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
