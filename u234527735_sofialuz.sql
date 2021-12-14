-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-01-2021 a las 17:01:53
-- Versión del servidor: 10.3.25-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u234527735_sofialuz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apu`
--

CREATE TABLE `apu` (
  `id` int(11) NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vr_equipo` int(11) NOT NULL,
  `vr_material` int(11) NOT NULL,
  `vr_transporte` int(11) NOT NULL,
  `vr_mdo` int(11) NOT NULL,
  `vr_aiu` int(11) NOT NULL,
  `m1` int(11) NOT NULL,
  `p1` float NOT NULL,
  `m2` int(11) NOT NULL,
  `p2` float NOT NULL,
  `m3` int(11) NOT NULL,
  `p3` float NOT NULL,
  `m4` int(11) NOT NULL,
  `p4` float NOT NULL,
  `m5` int(11) NOT NULL,
  `p5` float NOT NULL,
  `m6` int(11) NOT NULL,
  `p6` float NOT NULL,
  `m7` int(11) NOT NULL,
  `p7` float NOT NULL,
  `m8` int(11) NOT NULL,
  `p8` float NOT NULL,
  `m9` int(11) NOT NULL,
  `p9` float NOT NULL,
  `m10` int(11) NOT NULL,
  `p10` float NOT NULL,
  `soporte` varchar(1200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `apu`
--

INSERT INTO `apu` (`id`, `producto_id_producto`, `fecha`, `vr_equipo`, `vr_material`, `vr_transporte`, `vr_mdo`, `vr_aiu`, `m1`, `p1`, `m2`, `p2`, `m3`, `p3`, `m4`, `p4`, `m5`, `p5`, `m6`, `p6`, `m7`, `p7`, `m8`, `p8`, `m9`, `p9`, `m10`, `p10`, `soporte`) VALUES
(1, 7, '2020-07-20', 9540, 18795, 860, 805, 6000, 17, 10, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(2, 3, '2020-07-20', 9540, 18795, 860, 805, 6000, 17, 10, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(3, 8, '2020-07-20', 9540, 18795, 860, 805, 6000, 17, 10, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(4, 9, '2020-07-20', 9540, 18795, 860, 805, 6000, 17, 10, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(5, 6, '2020-07-20', 9540, 18795, 860, 805, 6000, 17, 10, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(6, 17, '2020-07-20', 9540, 18795, 860, 805, 6000, 17, 10, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(7, 18, '2020-07-20', 9540, 18795, 860, 805, 6000, 17, 10, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(8, 16, '2020-07-20', 9540, 18795, 860, 805, 6000, 17, 10, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id_caja` int(11) NOT NULL,
  `nombre_caja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saldo_inicial` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `estado_caja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caja_publicada` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `creada_por` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id_caja`, `nombre_caja`, `saldo_inicial`, `usuario_id_usuario`, `marca_temporal`, `estado_caja`, `caja_publicada`, `creada_por`, `observaciones`) VALUES
(4, 'CM-OBINCO', 0, 1, '2021-01-16 12:30:10', '1', '1', 1, 'NINGUNA'),
(5, 'CM-JOSE DANIEL MEZA', 0, 1, '2019-02-28 16:40:44', '1', '1', 1, 'CUENTA PERSONAL'),
(6, 'CM ANABELL', 0, 1, '2019-03-03 10:13:18', '1', '0', 1, 'Caja gastos 2018'),
(7, 'CM KAREN DE LA OSSA', 0, 1, '2019-03-03 10:14:22', '1', '0', 1, 'Caja 2018'),
(8, 'CM- JESICA BELLO', 0, 1, '2019-04-25 14:29:43', '1', '0', 1, ''),
(9, 'CM- MAYRA L DELGADO', 0, 1, '2019-04-25 14:30:51', '1', '0', 1, ''),
(10, 'CM- OSNAIDER MARTINEZ', 0, 1, '2019-04-25 14:31:28', '1', '0', 1, ''),
(11, 'CM- MARCOS GALVAN', 0, 1, '2019-04-25 14:32:00', '1', '0', 1, ''),
(12, 'CM- ELVIN MANJARREZ', 0, 1, '2019-04-25 14:32:36', '1', '0', 1, ''),
(13, 'CM- JEFFERSON MACHADO', 0, 1, '2019-04-25 14:32:58', '1', '0', 1, ''),
(14, 'CM- LORENA SOTO', 0, 1, '2019-04-25 14:33:31', '1', '0', 1, ''),
(15, 'CM- DIDIER TORRES', 0, 1, '2019-04-25 14:33:52', '1', '0', 1, ''),
(16, 'CM- JAIR ZAPATA', 0, 1, '2019-04-25 14:34:12', '1', '0', 1, ''),
(17, 'CM- DANIEL LUNA', 0, 1, '2019-04-25 14:34:31', '1', '0', 1, ''),
(18, 'CM- MOHAMED ROHAL', 0, 1, '2019-04-25 14:34:53', '1', '0', 1, ''),
(19, 'CM- CONDUCTOR', 0, 1, '2019-04-25 14:35:14', '1', '0', 1, ''),
(20, 'CM- JOSE BERMUDEZ', 0, 1, '2019-04-25 14:35:34', '1', '0', 1, ''),
(21, 'CM- OSCAR COTES', 0, 1, '2019-04-25 14:36:00', '1', '0', 1, ''),
(22, 'CM- SILFREDO PADILLA', 0, 1, '2019-04-25 15:15:40', '1', '0', 1, ''),
(23, 'CM- LUIS RODRIGUEZ', 0, 1, '2019-04-25 14:37:08', '1', '0', 1, ''),
(24, 'CM- DAVID CASTRO', 0, 1, '2019-04-25 14:37:45', '1', '0', 1, ''),
(25, 'CM- CESAR DIAZ', 0, 1, '2019-04-25 14:38:25', '1', '0', 1, ''),
(26, 'CM- LAURA SOTO', 0, 1, '2019-04-25 14:39:03', '1', '0', 1, ''),
(27, 'CM- EDILBERTO TOVAR', 0, 1, '2019-04-25 14:39:21', '1', '0', 1, ''),
(28, 'CM- RAY TORRES', 0, 1, '2019-04-25 14:39:44', '1', '0', 1, ''),
(29, 'CM- JULIO FIGUEROA', 0, 1, '2019-04-25 14:40:03', '1', '0', 1, ''),
(30, 'CM- JHON CATALAN', 0, 1, '2019-04-25 14:40:21', '1', '0', 1, ''),
(31, 'CM- JHON ROJAS', 0, 1, '2019-04-25 14:40:37', '1', '0', 1, ''),
(32, 'CM- JORGE RIVAS', 0, 1, '2019-04-25 14:40:58', '1', '0', 1, ''),
(33, 'CM- FREDY GONZALEZ', 0, 1, '2019-04-25 14:41:17', '1', '1', 1, ''),
(34, 'CM- JHONATAN DIAZ', 0, 1, '2019-04-25 14:41:38', '1', '0', 1, ''),
(35, 'CM- LUIS FAJARDO', 0, 1, '2019-04-25 14:42:03', '1', '0', 1, ''),
(36, 'CM- ELIANA MOGOLLON', 0, 1, '2019-04-25 14:42:25', '1', '0', 1, ''),
(37, 'CM- JOAQUIN GUERRA', 0, 1, '2019-04-25 14:42:43', '1', '0', 1, ''),
(38, 'CM- SERGIO MEJIA', 0, 1, '2019-04-25 14:43:08', '1', '0', 1, ''),
(39, 'CM- SERGIO MEJIA', 0, 1, '2019-04-25 14:43:08', '1', '0', 1, ''),
(40, 'CM- LIBARDO CASTRO', 0, 1, '2019-04-25 14:44:00', '1', '0', 1, ''),
(41, 'CM- ROSA COTES', 0, 1, '2019-04-25 14:44:17', '1', '0', 1, ''),
(42, 'CM- LEONEL MORALES', 0, 1, '2019-04-25 14:44:39', '1', '0', 1, ''),
(43, 'CM- PROSPERO DIAZ', 0, 1, '2019-04-25 14:44:57', '1', '0', 1, ''),
(44, 'CM- NELSON DUARTE', 0, 1, '2019-04-25 14:45:19', '1', '0', 1, ''),
(45, 'CM- LUIS SOLANO', 0, 1, '2019-04-25 14:45:38', '1', '0', 1, ''),
(46, 'CM- ENDER CAMACHO', 0, 1, '2019-05-18 10:21:13', '1', '1', 1, ''),
(47, 'CM- NATALIA HERNANDEZ', 0, 1, '2019-05-22 17:53:24', '1', '1', 1, ''),
(48, 'CM- JHONATAN SANTOS', 0, 1, '2019-05-22 17:54:03', '1', '0', 1, ''),
(49, 'CM- RAUL VERGARA', 0, 1, '2019-05-22 17:54:29', '1', '1', 1, ''),
(50, 'CM- CARLOS DIAZ', 0, 1, '2019-05-22 17:54:59', '1', '1', 1, ''),
(51, 'CM-FREDY GONZALEZ', 0, 1, '2019-06-20 08:01:22', '1', '0', 1, ''),
(52, 'CM-JUAN PABLO', 0, 1, '2019-06-27 09:01:55', '1', '0', 1, ''),
(53, 'CM-PEDRO PASCUAL', 0, 1, '2019-07-05 08:03:27', '1', '1', 1, ''),
(54, 'CM - ING RAFAEL', 0, 1, '2019-07-15 09:34:33', '1', '1', 1, 'CAJA MENOR GASTOS EN CANTERA'),
(55, 'CM-THALIA', 0, 2, '2021-01-17 12:49:08', '1', '1', 1, 'CAJA PARA PEAJES'),
(56, 'CM-LUZMILA', 0, 1, '2020-10-28 13:28:53', '1', '1', 1, 'SE INICIA EN CERO'),
(57, 'CM-XIOMARA', 0, 18, '2021-01-17 11:42:02', '1', '1', 1, 'CAJA ING. XIOMARA'),
(58, 'CM-KATIA MARCELA', 0, 1, '2020-12-11 10:55:46', '1', '1', 1, 'CAJA KATIA SISO'),
(59, 'CM-WILMIRO ACEVEDO', 0, 2, '2021-01-17 12:44:08', '1', '1', 1, 'CAJA WILMIRO'),
(60, 'CM-PRUEBA', 0, 17, '2021-01-24 12:35:41', '1', '1', 1, 'OK'),
(61, 'CM-DEMO2', 0, 16, '2021-01-24 12:39:06', '1', '1', 1, 'OK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_cargo` int(11) NOT NULL,
  `cargo_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`, `estado_cargo`, `cargo_publicado`) VALUES
(1, 'Administrativo', 1, 1),
(2, 'Operador minicargador', 1, 1),
(3, 'Conductor volqueta Sencilla', 1, 1),
(4, 'Conductor Doble troque', 1, 1),
(5, 'Ayudante de equipos', 1, 1),
(6, 'Jefe de equipos', 1, 1),
(7, 'Ayudante de planta de Asfalto', 1, 1),
(8, 'Operador de planta', 1, 1),
(9, 'Conductor tractomula', 1, 1),
(10, 'Director de planta', 1, 1),
(11, 'Asistente administrativo', 1, 1),
(12, 'Contador', 1, 1),
(13, 'Cordinador financiero', 1, 1),
(14, 'Gerente general', 1, 1),
(15, 'Operador Pajarita', 1, 1),
(16, 'Operador Retro', 1, 1),
(17, 'Vigilante', 1, 1),
(18, 'Soldador', 1, 1),
(19, 'Operador Trituradora', 1, 1),
(20, 'Auxiliar SISO', 1, 1),
(21, 'Operador de Cargador', 1, 1),
(22, 'Operador Clasificadora', 1, 1),
(23, 'Ayudante de Trituradora', 1, 1),
(24, 'Ayudante de Clasificadora', 1, 1),
(25, 'Operador Bascula', 1, 1),
(26, 'Mecanico', 1, 1),
(27, 'Relaciones Publicas', 1, 1),
(28, 'Abogado', 1, 1),
(29, 'Auditoria', 1, 1),
(30, 'Oficios Varios', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_folder`
--

CREATE TABLE `categorias_folder` (
  `id` int(11) NOT NULL,
  `categoria_ppal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_folder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias_folder`
--

INSERT INTO `categorias_folder` (`id`, `categoria_ppal`, `nombre_folder`, `estado_folder`) VALUES
(1, 'Cuentas', 'Explosivos', 1),
(2, 'Cuentas', 'Credito', 1),
(3, 'Cuentas', 'Varios', 1),
(4, 'Cuentas', 'Megavias', 1),
(7, 'Cuentas', 'Formatos', 1),
(8, 'Recursos Humanos', 'Formatos RH', 1),
(9, 'Cuentas', 'recursos humanos', 1),
(10, 'Cuentas', 'contrato de operacion minera', 1),
(11, 'Cuentas', 'gestion ambiental', 1),
(12, 'Recursos Humanos', 'Capacitaciones y charlas', 1),
(13, 'Recursos Humanos', 'COPASST', 1),
(14, 'Recursos Humanos', 'SST', 1),
(15, 'Cuentas', 'INFORMES SOCIOS', 1),
(16, 'Cuentas', 'SUB BASE ENSAYOS', 1),
(17, 'Cuentas', 'BARUC', 1),
(18, 'Cuentas', 'BASE ENSAYOS', 1),
(19, 'Cuentas', 'ASFALTO ENSAYOS', 1),
(20, 'Cuentas', 'PRUEBA', 1),
(21, 'Recursos Humanos', 'covid-19', 1),
(22, 'Recursos Humanos', 'Notificaciones Whatsapp', 1),
(23, 'Cuentas', 'KENWORTH DE LA MONTA?A', 1),
(24, 'Recursos Humanos', 'GRUPO OBINCO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheques`
--

CREATE TABLE `cheques` (
  `id_cheque` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `numero_cheque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_cheque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `concepto_cheque` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `valor_cheque` int(11) NOT NULL,
  `fecha_cheque` date NOT NULL,
  `cheque_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_cheque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cheques`
--

INSERT INTO `cheques` (`id_cheque`, `cuenta_id_cuenta`, `numero_cheque`, `nombre_cheque`, `concepto_cheque`, `valor_cheque`, `fecha_cheque`, `cheque_publicado`, `marca_temporal`, `creado_por`, `estado_cheque`) VALUES
(1, 3, 'FFF123', 'CARLOS M', 'PAGO CAMIONETA', 1000000, '2019-02-27', 1, '2019-02-27 10:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `estado_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `estado_cliente`) VALUES
(21, 'GRUPO OBINCO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuenta` int(11) NOT NULL,
  `nombre_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cc_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `representante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saldo_inicial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado_cuenta` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `cuenta_publicada` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `nombre_cuenta`, `cc_cuenta`, `numero_cuenta`, `tipo_cuenta`, `banco`, `representante`, `saldo_inicial`, `observaciones`, `estado_cuenta`, `creado_por`, `marca_temporal`, `cuenta_publicada`) VALUES
(5, 'NOMADAS', '123456', '123456', 'Ahorros', 'Bancolombia', 'OBINCO', '0', 'CUENTA INICIAL', 1, 1, '2019-04-12 09:04:51', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_documento`, `modulo_id_modulo`, `nombre_documento`, `estado_documento`) VALUES
(3, 1, 'EJEMPLO', 0),
(4, 4, 'Cedula de Ciudadania', 1),
(5, 1, 'RUT', 1),
(6, 1, 'Cedula Representante Legal', 1),
(7, 1, 'Cedula Representante Legal Suplente', 1),
(8, 1, 'Cedula del Contador publico', 1),
(9, 1, 'RUP', 1),
(10, 1, 'Certificacion Bancaria', 1),
(11, 1, 'Estados Financieros', 1),
(12, 1, 'Certificado de existencia y representacion legal', 1),
(13, 1, 'Declaracion de Renta', 1),
(14, 2, 'Contrato Arrendamiento', 1),
(15, 2, 'Soat', 1),
(16, 2, 'Tarjeta de Propiedad', 1),
(17, 2, 'Factura', 1),
(18, 2, 'CONTRATO LEASING Y/O CESION', 1),
(19, 2, 'DECLARACION DE IMPORTACION', 1),
(20, 2, 'POLIZA', 1),
(21, 2, 'TECNOMECANICA', 1),
(22, 1, 'Acuerdo consorcial', 1),
(23, 1, 'Brochure', 1),
(24, 1, 'Acta de inicio', 1),
(25, 2, 'CONTRATO DE COMPRA-VENTA', 1),
(26, 3, 'Hoja de vida', 1),
(27, 3, 'Documento Identidad', 1),
(28, 3, 'Contrato', 1),
(29, 3, 'Certificacion Bancaria', 1),
(30, 3, 'ARL', 1),
(31, 3, 'EPS', 1),
(32, 3, 'Capacitacion Seguridad e higiene', 0),
(33, 3, 'Examen de Ingreso', 1),
(34, 3, 'CERTIFICACION PENSION', 0),
(35, 1, 'composicion accionaria', 1),
(36, 1, 'estatutos', 1),
(37, 1, 'Registro mercantil', 1),
(38, 5, 'RUT', 1),
(39, 5, 'CERTIFICACION BANCARIA', 1),
(40, 6, 'RUT', 1),
(41, 6, 'CAMARA Y COMERCIO', 1),
(42, 2, 'LICENCIA CONDUCTOR', 1),
(43, 2, 'HOJA DE VIDA EQUIPO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_varios`
--

CREATE TABLE `documentos_varios` (
  `id_midocumento` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `id_folder` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_variosemp`
--

CREATE TABLE `documentos_variosemp` (
  `id_midocumento` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `id_folder` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_varioseq`
--

CREATE TABLE `documentos_varioseq` (
  `id_midocumento` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `documentos_varioseq`
--

INSERT INTO `documentos_varioseq` (`id_midocumento`, `cuenta_id_cuenta`, `nombre_documento`, `imagen`, `fecha_expira`, `alerta`, `marca_temporal`, `creado_por`, `estado_midocumento`, `midocumento_publicado`) VALUES
(1, 4, 'V3', 'images/documentosemp/2728alferez2.jpeg', '2069-12-31', 'No', '2019-11-06 15:30:16', 1, 1, 1),
(2, 68, 'Certificaci??n de peso', 'images/documentoseq/29977Cerificado.jpeg', '2069-12-31', 'No', '2019-04-18 13:25:37', 1, 1, 1),
(3, 69, 'certificaci?n ambiental', 'images/documentoseq/54313Certificaci?n ambiental.pdf', '2069-12-31', 'No', '2019-05-28 14:25:30', 4, 1, 1),
(4, 45, 'carta terminacion de contrato', 'images/documentoseq/4887420190704092023917.pdf', '2069-12-31', 'No', '2019-07-04 08:17:50', 4, 1, 1),
(5, 4, 'SOAT', 'images/documentoseq/7073271099SOAT WNL 374.png', '2069-12-31', 'No', '2019-10-30 15:49:20', 1, 1, 0),
(6, 4, 'V1', 'images/documentoseq/69663Captura de Pantalla 2019-09-25 a la(s) 10.17.14 a. m..png', '2069-12-31', 'No', '2019-11-06 14:55:36', 1, 1, 0),
(7, 4, 'v2', 'images/documentosemp/2909371099SOAT WNL 374.png', '2069-12-31', 'No', '2019-11-06 14:59:27', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos_caja`
--

CREATE TABLE `egresos_caja` (
  `id_egreso_caja` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipo_beneficiario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_egreso` date NOT NULL,
  `caja_ppal` int(11) NOT NULL,
  `caja_id_caja` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `beneficiario` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `id_rubro` int(11) DEFAULT NULL,
  `id_subrubro` int(11) DEFAULT NULL,
  `valor_egreso` int(11) NOT NULL,
  `observaciones` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `egreso_publicado` int(11) NOT NULL,
  `estado_egreso` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `egresos_caja`
--

INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(45, 'images/egresoscaja/59768peajes.pdf', 'Beneficiario Externo', '2019-02-28', 4, 0, 0, 'PEAJES FEBRERO', 2, 7, 412000, 'PEAJES FEBRERO', '2019-02-28 11:27:42', 1, 1, 1),
(46, 'images/egresoscaja/65045image.jpg', 'Beneficiario Externo', '2019-02-28', 4, 0, 0, 'Estaci??n arcas costa azul', 2, 7, 179560, 'Gasto gasolina', '2019-02-28 10:33:26', 1, 1, 1),
(47, 'images/egresoscaja/64794image.jpg', 'Beneficiario Externo', '2019-02-15', 4, 0, 0, 'Mercado campesino', 4, 18, 5300, 'Compra de alimentos', '2019-02-28 12:16:03', 1, 1, 1),
(48, 'images/egresoscaja/55184image.jpg', 'Beneficiario Externo', '2019-02-25', 4, 0, 0, 'Caribe plaza cco', 2, 7, 3400, 'Parqueadero', '2019-02-28 14:10:44', 1, 1, 1),
(49, 'images/egresoscaja/98489image.jpg', 'Beneficiario Externo', '2019-02-08', 4, 0, 0, 'Bonca SAS', 2, 36, 100000, 'Gasolina', '2019-02-28 14:14:27', 1, 1, 1),
(50, 'images/egresoscaja/3378image.jpg', 'Beneficiario Externo', '2019-02-03', 4, 0, 0, 'EXITO RAMBLAS', 2, 36, 174100, 'Gasolina', '2019-02-28 14:16:26', 1, 1, 1),
(51, 'images/egresoscaja/2075image.jpg', 'Beneficiario Externo', '2019-02-25', 4, 0, 0, 'ESTACI??N DE SERVICIO LAS AMERICAS', 2, 36, 165300, 'Gasto gasolina', '2019-02-28 14:31:46', 1, 1, 1),
(52, 'images/egresoscaja/61492image.jpg', 'Beneficiario Externo', '2019-02-03', 4, 0, 0, '??XITOS LAS RAMBLAS', 2, 36, 174100, 'Gasto gasolina', '2019-02-28 14:34:30', 1, 1, 1),
(53, 'images/egresoscaja/18786image.jpg', 'Beneficiario Externo', '2019-02-25', 4, 0, 0, 'PROCAFECOL', 4, 19, 7200, 'Compra de agua', '2019-02-28 14:37:39', 1, 1, 1),
(54, 'images/egresoscaja/44491image.jpg', 'Beneficiario Externo', '2019-02-15', 4, 0, 0, 'EDS BONCA', 3, 10, 50000, 'Combustible', '2019-02-28 14:39:38', 1, 1, 1),
(55, 'images/egresoscaja/11886image.jpg', 'Beneficiario Externo', '2019-02-26', 4, 0, 0, 'Central de inversiones donato', 4, 18, 17300, 'Almuerzo', '2019-02-28 14:41:30', 1, 1, 1),
(56, 'images/egresoscaja/30560image.jpg', 'Beneficiario Externo', '2019-02-25', 4, 0, 0, 'Cafetera san Joaqu??n express', 4, 19, 7000, 'Desayuno', '2019-02-28 14:45:37', 1, 1, 1),
(57, 'images/egresoscaja/10952image.jpg', 'Beneficiario Externo', '2019-02-26', 4, 0, 0, 'Complejo plaza boca grande', 2, 7, 5400, 'Parquadero', '2019-02-28 14:52:10', 1, 1, 1),
(58, 'images/egresoscaja/20605image.jpg', 'Beneficiario Externo', '2019-02-26', 4, 0, 0, 'Complejo plaza boca grande', 2, 7, 5400, 'Parqueadero', '2019-02-28 15:00:16', 1, 1, 1),
(59, 'images/egresoscaja/41445image.jpg', 'Beneficiario Externo', '2019-02-04', 4, 0, 0, 'Servientrega', 4, 19, 12600, 'Env??o documentos', '2019-02-28 15:02:04', 1, 1, 1),
(60, 'images/egresoscaja/4873image.jpg', 'Beneficiario Externo', '2019-02-22', 4, 0, 0, 'Hotel Boston', 2, 7, 431300, 'Hospedaje Cartagena por tres d??as', '2019-02-28 15:04:18', 1, 1, 1),
(61, 'images/egresoscaja/60705image.jpg', 'Beneficiario Externo', '2019-02-26', 4, 0, 0, 'Hotel Boston', 2, 7, 146550, 'Hospedaje Cartagena por un d??a', '2019-02-28 15:06:50', 1, 1, 1),
(62, 'images/egresoscaja/94976OCJY8460.JPG', 'Beneficiario Externo', '2019-04-18', 8, 0, 0, 'jesica bello', 4, 26, 60000, 'caja menor', '2019-04-25 08:28:43', 1, 1, 1),
(63, 'images/egresoscaja/93789Soporte - 2019-04-25T105208.725.jpg', 'Beneficiario Externo', '2018-08-04', 45, 0, 0, 'Luis Solano', 4, 26, 30000, 'compra', '2019-04-25 14:46:03', 1, 1, 1),
(64, 'images/egresoscaja/55368Soporte - 2019-04-25T105227.721.jpg', 'Beneficiario Externo', '2018-08-03', 45, 0, 0, 'Luis Solano', 4, 26, 20000, 'servicios', '2019-04-25 14:50:39', 1, 1, 1),
(65, 'images/egresoscaja/37734Soporte - 2019-04-25T105636.366.jpg', 'Beneficiario Externo', '2018-08-06', 45, 0, 0, 'Luis Solano', 4, 26, 100000, 'servicios', '2019-04-25 14:52:16', 1, 1, 1),
(66, 'images/egresoscaja/34368Soporte - 2019-04-25T105101.324.jpg', 'Beneficiario Externo', '2018-04-12', 44, 0, 0, 'Nelson Duarte', 4, 26, 70000, 'compra', '2019-04-25 14:59:23', 1, 1, 1),
(67, 'images/egresoscaja/34240Soporte - 2019-04-25T105101.324.jpg', 'Beneficiario Externo', '2018-07-31', 22, 0, 0, 'Silfredo Padilla', 4, 26, 30000, 'compra', '2019-04-25 15:02:50', 1, 1, 1),
(68, 'images/egresoscaja/25381Soporte - 2019-04-25T110348.527.jpg', 'Beneficiario Externo', '2018-07-15', 22, 0, 0, 'Silfredo Padilla', 4, 26, 15000, 'transporte', '2019-04-25 15:04:41', 1, 1, 1),
(69, 'images/egresoscaja/79177Soporte - 2019-04-25T110806.189.jpg', 'Beneficiario Externo', '2018-07-16', 22, 0, 0, 'Silfredo Padilla', 4, 26, 15000, 'transporte', '2019-04-25 15:10:24', 1, 1, 1),
(70, 'images/egresoscaja/72854Soporte - 2019-04-25T104911.496.jpg', 'Beneficiario Externo', '2018-07-30', 43, 0, 0, 'propero diaz', 4, 26, 38000, 'compra', '2019-04-25 15:13:41', 1, 1, 1),
(71, 'images/egresoscaja/36508Soporte - 2019-04-25T111253.129.jpg', 'Beneficiario Externo', '2018-07-24', 43, 0, 0, 'propero diaz', 4, 26, 18000, 'transporte', '2019-04-25 15:19:15', 1, 1, 1),
(72, 'images/egresoscaja/78140Soporte - 2019-04-25T110520.328.jpg', 'Beneficiario Externo', '2018-07-29', 42, 0, 0, 'Leonel Morales', 4, 26, 120000, 'compra', '2019-04-25 15:23:00', 1, 1, 1),
(73, 'images/egresoscaja/86163Soporte - 2019-04-25T104938.942.jpg', 'Beneficiario Externo', '2018-07-30', 42, 0, 0, 'Leonel Morales', 4, 26, 30000, 'compra', '2019-04-25 15:24:12', 1, 1, 1),
(74, 'images/egresoscaja/64334Soporte - 2019-04-25T104803.440.jpg', 'Beneficiario Externo', '2018-10-01', 41, 0, 0, 'rosa cotes', 4, 26, 250000, 'tramites', '2019-04-25 15:27:43', 1, 1, 1),
(75, 'images/egresoscaja/95056Soporte - 2019-04-25T111341.079.jpg', 'Beneficiario Externo', '2018-07-24', 40, 0, 0, 'libardo castro', 4, 26, 14000, 'transporte', '2019-04-25 15:29:50', 1, 1, 1),
(76, 'images/egresoscaja/8029Soporte - 2019-04-25T105917.886.jpg', 'Beneficiario Externo', '2018-08-08', 38, 0, 0, 'sergio mejia', 4, 26, 30000, 'corte de lamina', '2019-04-25 15:36:26', 1, 1, 1),
(77, 'images/egresoscaja/39019Soporte - 2019-04-25T105726.283.jpg', 'Beneficiario Externo', '2018-08-07', 37, 0, 0, 'joaquin guerra', 4, 26, 70000, 'avance elaboraci??n de puertas', '2019-04-25 15:38:40', 1, 1, 1),
(78, 'images/egresoscaja/17456Soporte - 2019-04-25T110945.401.jpg', 'Beneficiario Externo', '2018-07-19', 37, 0, 0, 'joaquin guerra', 4, 26, 50000, 'avance mdo', '2019-04-25 15:40:47', 1, 1, 1),
(79, 'images/egresoscaja/70828Soporte - 2019-04-25T111225.684.jpg', 'Beneficiario Externo', '2018-07-23', 37, 0, 0, 'joaquin guerra', 4, 26, 100000, 'elaboraci??n de puerta', '2019-04-25 15:42:48', 1, 1, 1),
(80, 'images/egresoscaja/20050Soporte - 2019-04-25T105603.979.jpg', 'Beneficiario Externo', '2018-10-03', 36, 0, 0, 'eliana mogollon', 4, 26, 20000, 'transporte', '2019-04-25 15:45:28', 1, 1, 1),
(81, 'images/egresoscaja/95013Soporte - 2019-04-25T105358.934.jpg', 'Beneficiario Externo', '2018-10-11', 35, 0, 0, 'luis fajardo', 4, 26, 335000, 'elaboraci??n de canaleta', '2019-04-25 15:47:21', 1, 1, 1),
(82, 'images/egresoscaja/71121Soporte - 2019-04-25T111153.205.jpg', 'Beneficiario Externo', '2018-07-21', 35, 0, 0, 'luis rodriguez', 4, 26, 1200000, 'abono mdo', '2019-04-25 15:49:08', 1, 1, 1),
(83, 'images/egresoscaja/59082Soporte - 2019-04-25T111110.292.jpg', 'Beneficiario Externo', '2018-07-21', 34, 0, 0, 'jhonatan diaz', 4, 26, 210000, 'celaduria', '2019-04-25 16:00:22', 1, 1, 1),
(84, 'images/egresoscaja/13796Soporte - 2019-04-25T110023.524.jpg', 'Beneficiario Externo', '2018-08-25', 32, 0, 0, 'jorge luis rivas', 4, 26, 360000, 'compra', '2019-04-25 16:02:40', 1, 1, 1),
(85, 'images/egresoscaja/16162Soporte - 2019-04-25T105503.039.jpg', 'Beneficiario Externo', '2018-10-09', 32, 0, 0, 'jorge luis rivas', 4, 26, 40000, 'transporte', '2019-04-25 16:04:09', 1, 1, 1),
(86, 'images/egresoscaja/78164Soporte - 2019-04-25T102608.667.jpg', 'Beneficiario Externo', '2018-06-21', 32, 0, 0, 'jorge luis rivas', 4, 26, 300000, 'mdo', '2019-04-25 16:07:30', 1, 1, 1),
(87, 'images/egresoscaja/77166Soporte - 2019-04-25T104605.541.jpg', 'Beneficiario Externo', '2018-07-25', 33, 0, 0, 'fredy gonzales', 4, 26, 320000, 'transporte', '2019-04-25 16:09:10', 1, 1, 1),
(88, 'images/egresoscaja/45742Soporte - 2019-04-25T104439.057.jpg', 'Beneficiario Externo', '2018-07-26', 31, 0, 0, 'jhon rojas', 4, 26, 18000, 'transporte', '2019-04-25 16:12:00', 1, 1, 1),
(89, 'images/egresoscaja/35894Soporte - 2019-04-25T102527.579.jpg', 'Beneficiario Externo', '2018-06-21', 29, 0, 0, 'julio figueroa', 4, 26, 15000, 'transporte', '2019-04-25 16:13:34', 1, 1, 1),
(90, 'images/egresoscaja/92349Soporte - 2019-04-25T104318.760.jpg', 'Beneficiario Externo', '2018-07-27', 30, 0, 0, 'jhon catalan', 4, 26, 20000, 'compra', '2019-04-25 16:15:09', 1, 1, 1),
(91, 'images/egresoscaja/92382Soporte - 2019-04-25T104353.593.jpg', 'Beneficiario Externo', '2018-07-25', 30, 0, 0, 'jhon catalan', 4, 26, 70000, 'acompa??amiento', '2019-04-25 16:16:43', 1, 1, 1),
(92, 'images/egresoscaja/1150Soporte - 2019-04-25T105805.296.jpg', 'Beneficiario Externo', '2018-08-07', 30, 0, 0, 'jhon catalan', 4, 26, 250000, 'Acompa??amiento', '2019-04-25 16:19:30', 1, 1, 1),
(93, 'images/egresoscaja/44738Soporte (99).jpg', 'Beneficiario Externo', '2018-06-25', 28, 0, 0, 'ray alexander torres', 4, 26, 50000, 'transporte', '2019-04-25 16:21:45', 1, 1, 1),
(94, 'images/egresoscaja/86822Soporte - 2019-04-25T104200.180.jpg', 'Beneficiario Externo', '2018-08-03', 27, 0, 0, 'edilberto tovar', 4, 26, 40000, 'transporte', '2019-04-25 16:23:44', 1, 1, 1),
(95, 'images/egresoscaja/28222Soporte (97).jpg', 'Beneficiario Externo', '2018-06-26', 6, 0, 0, 'anabella', 4, 26, 12000, 'transporte', '2019-04-25 16:26:31', 1, 1, 1),
(96, 'images/egresoscaja/14547Soporte - 2019-04-25T110307.210.jpg', 'Beneficiario Externo', '2018-07-13', 6, 0, 0, 'anabella', 4, 26, 30000, 'transporte', '2019-04-25 16:27:57', 1, 1, 1),
(97, 'images/egresoscaja/89056Soporte (98).jpg', 'Beneficiario Externo', '2018-06-25', 26, 0, 0, 'laura e soto', 4, 26, 17192, 'transporte', '2019-04-25 16:29:37', 1, 1, 1),
(98, 'images/egresoscaja/35147Soporte - 2019-04-25T104525.988.jpg', 'Beneficiario Externo', '2018-07-24', 25, 0, 0, 'cesar diaz', 4, 26, 30000, 'vigilancia', '2019-04-25 16:31:36', 1, 1, 1),
(99, 'images/egresoscaja/32662Soporte - 2019-04-25T102941.711.jpg', 'Beneficiario Externo', '2018-08-23', 25, 0, 0, 'cesar diaz', 4, 26, 10000, 'transporte', '2019-04-25 16:35:04', 1, 1, 1),
(100, 'images/egresoscaja/63436Soporte - 2019-04-25T102718.982.jpg', 'Beneficiario Externo', '2018-06-19', 24, 0, 0, 'david castro', 4, 26, 15000, 'transporte', '2019-04-25 16:37:32', 1, 1, 1),
(101, 'images/egresoscaja/1333Soporte - 2019-04-25T110137.134.jpg', 'Beneficiario Externo', '2018-07-11', 24, 0, 0, 'david castro', 4, 26, 20000, 'transporte', '2019-04-25 16:39:23', 1, 1, 1),
(102, 'images/egresoscaja/57119Soporte (9).jpg', 'Beneficiario Externo', '2018-07-05', 23, 0, 0, 'luis rodriguez', 4, 26, 220000, 'desmonte', '2019-04-25 16:40:50', 1, 1, 1),
(103, 'images/egresoscaja/29428Soporte - 2019-04-25T110557.921.jpg', 'Beneficiario Externo', '2018-07-16', 20, 0, 0, 'jose bermudez', 4, 26, 15000, 'transporte', '2019-04-25 16:59:47', 1, 1, 1),
(104, 'images/egresoscaja/10134Soporte (66).jpg', 'Beneficiario Externo', '2018-06-26', 21, 0, 0, 'oscar cotes', 4, 26, 10000, 'compra', '2019-04-25 17:01:21', 1, 1, 1),
(105, 'images/egresoscaja/95117Soporte (92).jpg', 'Beneficiario Externo', '2018-07-05', 19, 0, 0, 'conductor', 4, 26, 20000, 'transporte', '2019-04-25 17:02:35', 1, 1, 1),
(106, 'images/egresoscaja/87686Soporte (95).jpg', 'Beneficiario Externo', '2018-06-27', 18, 0, 0, 'mohamed rahal', 4, 26, 20000, 'transporte', '2019-04-25 17:03:41', 1, 1, 1),
(107, 'images/egresoscaja/82397Soporte (6).jpg', 'Beneficiario Externo', '2018-07-06', 15, 0, 0, 'didier torres', 4, 26, 50000, 'avance nomina', '2019-04-25 17:04:39', 1, 1, 1),
(108, 'images/egresoscaja/2630Soporte - 2019-04-25T105130.877.jpg', 'Beneficiario Externo', '2018-07-31', 15, 0, 0, 'didier torres', 4, 26, 50000, 'avance nomina', '2019-04-25 17:05:29', 1, 1, 1),
(109, 'images/egresoscaja/13949Soporte - 2019-04-25T110741.779.jpg', 'Beneficiario Externo', '2018-07-16', 15, 0, 0, 'didier torres', 4, 26, 50000, 'avance nomina', '2019-04-25 17:06:57', 1, 1, 1),
(110, 'images/egresoscaja/58636Soporte (94).jpg', 'Beneficiario Externo', '2018-06-30', 17, 0, 0, 'daniel luna', 4, 26, 20000, 'transporte', '2019-04-25 17:08:37', 1, 1, 1),
(111, 'images/egresoscaja/54605Soporte (100).jpg', 'Beneficiario Externo', '2018-06-22', 17, 0, 0, 'daniel luna', 4, 26, 25000, 'transporte', '2019-04-25 17:10:15', 1, 1, 1),
(112, 'images/egresoscaja/28698Soporte - 2019-04-25T102820.364.jpg', 'Beneficiario Externo', '2018-06-14', 17, 0, 0, 'daniel luna', 4, 26, 25000, 'Transporte', '2019-04-25 17:11:22', 1, 1, 1),
(113, 'images/egresoscaja/14108Soporte - 2019-04-25T102858.639.jpg', 'Beneficiario Externo', '2018-06-12', 17, 0, 0, 'daniel luna', 4, 26, 20000, 'transporte', '2019-04-25 17:12:39', 1, 1, 1),
(114, 'images/egresoscaja/50024Soporte (71).jpg', 'Beneficiario Externo', '2018-07-23', 11, 0, 0, 'marcos galvan', 4, 26, 50000, 'acompa??amiento', '2019-04-25 17:29:23', 1, 1, 1),
(115, 'images/egresoscaja/26507Soporte (84).jpg', 'Beneficiario Externo', '2018-07-30', 12, 0, 0, 'elvin manjarrez', 4, 26, 20000, 'transporte', '2019-04-25 17:30:41', 1, 1, 1),
(116, 'images/egresoscaja/31121Soporte (79).jpg', 'Beneficiario Externo', '2018-08-25', 12, 0, 0, 'elvin manjarrez', 4, 26, 90000, 'transporte', '2019-04-25 17:32:42', 1, 1, 1),
(117, 'images/egresoscaja/49887Soporte (83).jpg', 'Beneficiario Externo', '2018-08-01', 13, 0, 0, 'jefferson machado', 4, 26, 90000, 'transporte', '2019-04-25 17:34:36', 1, 1, 1),
(118, 'images/egresoscaja/47463Soporte (82).jpg', 'Beneficiario Externo', '2018-08-03', 13, 0, 0, 'jefferson machado', 4, 26, 72000, 'transporte', '2019-04-25 17:36:43', 1, 1, 1),
(119, 'images/egresoscaja/92340Soporte (81).jpg', 'Beneficiario Externo', '2018-08-05', 13, 0, 0, 'jefferson machado', 4, 26, 84000, 'transporte', '2019-04-25 17:39:08', 1, 1, 1),
(120, 'images/egresoscaja/52200Soporte (18).jpg', 'Beneficiario Externo', '2018-06-27', 10, 0, 0, 'osnaider martinez', 4, 26, 15000, 'transporte', '2019-04-26 08:08:13', 1, 1, 1),
(121, 'images/egresoscaja/22180Soporte (22).jpg', 'Beneficiario Externo', '2018-06-25', 10, 0, 0, 'osnaider martinez', 4, 26, 15000, 'transporte', '2019-04-26 08:10:53', 1, 1, 1),
(122, 'images/egresoscaja/41558Soporte - 2019-04-25T110830.268.jpg', 'Beneficiario Externo', '2018-07-17', 16, 0, 0, 'jair zapata', 4, 26, 15000, 'transporte', '2019-04-26 08:26:30', 1, 1, 1),
(123, 'images/egresoscaja/74426Soporte - 2019-04-25T104838.328.jpg', 'Beneficiario Externo', '2018-07-15', 16, 0, 0, 'jair zapata', 4, 26, 12000, 'transporte', '2019-04-26 08:28:09', 1, 1, 1),
(124, 'images/egresoscaja/7028Soporte - 2019-04-25T110421.521.jpg', 'Beneficiario Externo', '2018-07-16', 16, 0, 0, 'jair zapata', 4, 26, 12000, 'transporte', '2019-04-26 08:29:18', 1, 1, 1),
(125, 'images/egresoscaja/35083Soporte - 2019-04-25T110230.772.jpg', 'Beneficiario Externo', '2018-07-13', 16, 0, 0, 'jair zapata', 4, 26, 10000, 'transporte', '2019-04-26 08:30:28', 1, 1, 1),
(126, 'images/egresoscaja/64877Soporte - 2019-04-25T110207.968.jpg', 'Beneficiario Externo', '2018-07-14', 16, 0, 0, 'jair zapata', 4, 26, 188166, 'avance n??mina', '2019-04-26 08:32:43', 1, 1, 1),
(127, 'images/egresoscaja/8966Soporte - 2019-04-25T110100.489.jpg', 'Beneficiario Externo', '2018-07-11', 16, 0, 0, 'jair zapata', 4, 26, 15000, 'transporte', '2019-04-26 08:34:01', 1, 1, 1),
(128, 'images/egresoscaja/262Soporte (93).jpg', 'Beneficiario Externo', '2018-07-02', 16, 0, 0, 'jair zapata', 4, 26, 10000, 'transporte', '2019-04-26 08:36:18', 1, 1, 1),
(129, 'images/egresoscaja/14050Soporte - 2019-04-25T102747.226.jpg', 'Beneficiario Externo', '2018-06-15', 16, 0, 0, 'jair zapata', 4, 26, 10000, 'transporte', '2019-04-26 08:47:13', 1, 1, 1),
(130, 'images/egresoscaja/53836Soporte - 2019-04-25T104634.297.jpg', 'Beneficiario Externo', '2018-07-26', 16, 0, 0, 'jair zapata', 4, 26, 10000, 'transporte', '2019-04-26 08:48:15', 1, 1, 1),
(131, 'images/egresoscaja/90869Soporte - 2019-04-25T104715.116.jpg', 'Beneficiario Externo', '2018-07-26', 16, 0, 0, 'jair zapata', 4, 26, 5000, 'acpm', '2019-04-26 09:10:00', 1, 1, 1),
(132, 'images/egresoscaja/17703Soporte - 2019-04-25T104715.116.jpg', 'Beneficiario Externo', '2018-07-26', 16, 0, 0, 'jair zapata', 4, 26, 5000, 'acpm', '2019-04-26 09:10:00', 1, 1, 1),
(133, 'images/egresoscaja/23931Soporte - 2019-04-25T105258.284.jpg', 'Beneficiario Externo', '2018-10-16', 16, 0, 0, 'jair zapata', 4, 26, 16667, 'transporte', '2019-04-26 09:10:59', 1, 1, 1),
(134, 'images/egresoscaja/75234Soporte (1).jpg', 'Beneficiario Externo', '2018-07-10', 14, 0, 0, 'lorena soto', 4, 26, 2000, 'parqueadero', '2019-04-26 09:15:48', 1, 1, 1),
(135, 'images/egresoscaja/94885Soporte (5).jpg', 'Beneficiario Externo', '2018-07-06', 14, 0, 0, 'lorena soto', 4, 26, 1000, 'transporte', '2019-04-26 09:17:34', 1, 1, 1),
(136, 'images/egresoscaja/87008Soporte - 2019-04-25T103019.648.jpg', 'Beneficiario Externo', '2018-08-09', 14, 0, 0, 'lorena soto', 4, 26, 6000, 'refrigerio', '2019-04-26 09:18:40', 1, 1, 1),
(137, 'images/egresoscaja/73495Soporte - 2019-04-25T103049.719.jpg', 'Beneficiario Externo', '2018-08-09', 14, 0, 0, 'lorena soto', 4, 26, 2000, 'medicamento', '2019-04-26 09:24:53', 1, 1, 1),
(138, 'images/egresoscaja/21249Soporte - 2019-04-25T103117.426.jpg', 'Beneficiario Externo', '2018-08-09', 14, 0, 0, 'lorena soto', 4, 26, 6000, 'transporte', '2019-04-26 09:25:51', 1, 1, 1),
(139, 'images/egresoscaja/5111Soporte - 2019-04-25T103146.190.jpg', 'Beneficiario Externo', '2018-08-08', 14, 0, 0, 'lorena soto', 4, 26, 25000, 'compra', '2019-04-26 09:26:52', 1, 1, 1),
(140, 'images/egresoscaja/75805Soporte - 2019-04-25T103210.957.jpg', 'Beneficiario Externo', '2018-08-08', 14, 0, 0, 'lorena soto', 4, 26, 6500, 'compra', '2019-04-26 09:27:44', 1, 1, 1),
(141, 'images/egresoscaja/35903Soporte - 2019-04-25T103237.024.jpg', 'Beneficiario Externo', '2018-08-08', 14, 0, 0, 'lorena soto', 4, 26, 13100, 'compra', '2019-04-26 09:28:46', 1, 1, 1),
(142, 'images/egresoscaja/72021Soporte - 2019-04-25T103922.444.jpg', 'Beneficiario Externo', '2018-08-08', 14, 0, 0, 'lorena soto', 4, 26, 3000, 'domicilio', '2019-04-26 09:29:43', 1, 1, 1),
(143, 'images/egresoscaja/65554Soporte - 2019-04-25T103957.066.jpg', 'Beneficiario Externo', '2018-08-08', 14, 0, 0, 'lorena soto', 4, 26, 6500, 'compra', '2019-04-26 09:30:40', 1, 1, 1),
(144, 'images/egresoscaja/17761Soporte - 2019-04-25T104031.241.jpg', 'Beneficiario Externo', '2018-08-05', 14, 0, 0, 'lorena soto', 4, 26, 53650, 'compra', '2019-04-26 09:31:29', 1, 1, 1),
(145, 'images/egresoscaja/68463Soporte - 2019-04-25T104224.876.jpg', 'Beneficiario Externo', '2018-07-31', 14, 0, 0, 'lorena soto', 4, 26, 51030, 'compra', '2019-04-26 09:32:34', 1, 1, 1),
(146, 'images/egresoscaja/52764Soporte - 2019-04-25T105949.227.jpg', 'Beneficiario Externo', '2018-08-08', 14, 0, 0, 'lorena soto', 4, 26, 10000, 'compra', '2019-04-26 09:33:44', 1, 1, 1),
(147, 'images/egresoscaja/26928Soporte - 2019-04-25T110710.396.jpg', 'Beneficiario Externo', '2018-07-16', 14, 0, 0, 'lorena soto', 4, 26, 41300, 'compra', '2019-04-26 09:35:14', 1, 1, 1),
(148, 'images/egresoscaja/64395Soporte - 2019-04-25T111012.535.jpg', 'Beneficiario Externo', '2018-07-19', 14, 0, 0, 'lorena soto', 4, 26, 2800, 'compra', '2019-04-26 09:36:27', 1, 1, 1),
(149, 'images/egresoscaja/32888Soporte.jpg', 'Beneficiario Externo', '2018-08-13', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 10:30:43', 1, 1, 1),
(150, 'images/egresoscaja/15072Soporte (2).jpg', 'Beneficiario Externo', '2018-07-09', 9, 0, 0, 'mayra l delgado', 4, 26, 20000, 'transporte', '2019-04-26 10:32:51', 1, 1, 1),
(151, 'images/egresoscaja/49127Soporte (33).jpg', 'Beneficiario Externo', '2018-07-09', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 10:33:51', 1, 1, 1),
(152, 'images/egresoscaja/32269Soporte (4).jpg', 'Beneficiario Externo', '2018-07-07', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 10:50:58', 1, 1, 1),
(153, 'images/egresoscaja/56735Soporte (7).jpg', 'Beneficiario Externo', '2018-07-06', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 10:52:40', 1, 1, 1),
(154, 'images/egresoscaja/1770Soporte (8).jpg', 'Beneficiario Externo', '2018-07-06', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 10:56:30', 1, 1, 1),
(155, 'images/egresoscaja/10919Soporte (10).jpg', 'Beneficiario Externo', '2018-07-05', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 10:58:13', 1, 1, 1),
(156, 'images/egresoscaja/2026Soporte (11).jpg', 'Beneficiario Externo', '2018-07-04', 9, 0, 0, 'mayra l delgado', 4, 26, 30000, 'transporte', '2019-04-26 10:59:40', 1, 1, 1),
(157, 'images/egresoscaja/69070Soporte (12).jpg', 'Beneficiario Externo', '2018-07-04', 9, 0, 0, 'mayra l delgado', 4, 26, 42000, 'transporte', '2019-04-26 11:00:35', 1, 1, 1),
(158, 'images/egresoscaja/8721Soporte (13).jpg', 'Beneficiario Externo', '2018-07-01', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 11:01:34', 1, 1, 1),
(159, 'images/egresoscaja/31838Soporte (14).jpg', 'Beneficiario Externo', '2018-07-30', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 11:02:55', 1, 1, 1),
(160, 'images/egresoscaja/93051Soporte (15).jpg', 'Beneficiario Externo', '2018-06-29', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 11:04:25', 1, 1, 1),
(161, 'images/egresoscaja/97344Soporte (16).jpg', 'Beneficiario Externo', '2018-06-29', 9, 0, 0, 'mayra l delgado', 4, 26, 18000, 'transporte', '2019-04-26 11:06:17', 1, 1, 1),
(162, 'images/egresoscaja/77581Soporte (17).jpg', 'Beneficiario Externo', '2018-06-29', 9, 0, 0, 'mayra l delgado', 4, 26, 18000, 'transporte', '2019-04-26 14:09:15', 1, 1, 1),
(163, 'images/egresoscaja/49438Soporte (19).jpg', 'Beneficiario Externo', '2018-06-27', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:10:25', 1, 1, 1),
(164, 'images/egresoscaja/5740Soporte (20).jpg', 'Beneficiario Externo', '2018-06-27', 9, 0, 0, 'mayra l delgado', 4, 26, 60000, 'transporte', '2019-04-26 14:11:35', 1, 1, 1),
(165, 'images/egresoscaja/98709Soporte (21).jpg', 'Beneficiario Externo', '2018-06-26', 9, 0, 0, 'casaseo ltda', 4, 26, 12000, 'compra', '2019-04-26 14:12:39', 1, 1, 1),
(166, 'images/egresoscaja/51712Soporte (23).jpg', 'Beneficiario Externo', '2018-06-24', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:14:00', 1, 1, 1),
(167, 'images/egresoscaja/94387Soporte (24).jpg', 'Beneficiario Externo', '2018-06-22', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 14:15:28', 1, 1, 1),
(168, 'images/egresoscaja/19058Soporte (25).jpg', 'Beneficiario Externo', '2018-06-20', 9, 0, 0, 'mayra l delgado', 4, 26, 18000, 'transporte', '2019-04-26 14:16:53', 1, 1, 1),
(169, 'images/egresoscaja/63677Soporte (27).jpg', 'Beneficiario Externo', '2018-06-20', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:18:48', 1, 1, 1),
(170, 'images/egresoscaja/47476Soporte (26).jpg', 'Beneficiario Externo', '2018-06-20', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 14:20:36', 1, 1, 1),
(171, 'images/egresoscaja/73791Soporte (28).jpg', 'Beneficiario Externo', '2018-06-18', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:21:43', 1, 1, 1),
(172, 'images/egresoscaja/15380Soporte (29).jpg', 'Beneficiario Externo', '2018-06-18', 9, 0, 0, 'mayra l delgado', 4, 26, 36000, 'transporte', '2019-04-26 14:22:40', 1, 1, 1),
(173, 'images/egresoscaja/17254Soporte (30).jpg', 'Beneficiario Externo', '2018-06-18', 9, 0, 0, 'mayra l delgado', 4, 26, 4000, 'transporte', '2019-04-26 14:23:51', 1, 1, 1),
(174, 'images/egresoscaja/17010Soporte (31).jpg', 'Beneficiario Externo', '2018-06-18', 9, 0, 0, 'mayra l delgado', 4, 26, 18000, 'transporte', '2019-04-26 14:25:20', 1, 1, 1),
(175, 'images/egresoscaja/95687Soporte (32).jpg', 'Beneficiario Externo', '2018-06-15', 9, 0, 0, 'mayra l delgado', 4, 26, 30000, 'transporte', '2019-04-26 14:26:19', 1, 1, 1),
(176, 'images/egresoscaja/93542Soporte (33).jpg', 'Beneficiario Externo', '2018-06-13', 9, 0, 0, 'mayra l delgado', 4, 26, 30000, 'v', '2019-04-26 14:27:21', 1, 1, 1),
(177, 'images/egresoscaja/45159Soporte (34).jpg', 'Beneficiario Externo', '2018-06-13', 9, 0, 0, 'mayra l delgado', 4, 26, 4000, 'transporte', '2019-04-26 14:28:17', 1, 1, 1),
(178, 'images/egresoscaja/494Soporte (35).jpg', 'Beneficiario Externo', '2018-06-13', 9, 0, 0, 'mayra l delgado', 4, 26, 18000, 'transporte', '2019-04-26 14:29:30', 1, 1, 1),
(179, 'images/egresoscaja/2636Soporte (36).jpg', 'Beneficiario Externo', '2018-06-12', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 14:31:37', 1, 1, 1),
(180, 'images/egresoscaja/34454Soporte (37).jpg', 'Beneficiario Externo', '2018-09-04', 9, 0, 0, 'mayra l delgado', 4, 26, 19390, 'transporte', '2019-04-26 14:32:32', 1, 1, 1),
(181, 'images/egresoscaja/48626Soporte (38).jpg', 'Beneficiario Externo', '2018-08-24', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:33:51', 1, 1, 1),
(182, 'images/egresoscaja/65747Soporte (39).jpg', 'Beneficiario Externo', '2018-08-25', 9, 0, 0, 'mayra l delgado', 4, 26, 20000, 'transporte', '2019-04-26 14:34:43', 1, 1, 1),
(183, 'images/egresoscaja/44998Soporte (40).jpg', 'Beneficiario Externo', '2018-08-23', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:35:30', 1, 1, 1),
(184, 'images/egresoscaja/36834Soporte (41).jpg', 'Beneficiario Externo', '2018-08-22', 9, 0, 0, 'mayra l delgado', 4, 26, 17400, 'transporte', '2019-04-26 14:36:15', 1, 1, 1),
(185, 'images/egresoscaja/58248Soporte (42).jpg', 'Beneficiario Externo', '2018-08-22', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:37:21', 1, 1, 1),
(186, 'images/egresoscaja/96148Soporte (43).jpg', 'Beneficiario Externo', '2018-08-14', 9, 0, 0, 'mayra l delgado', 4, 26, 35900, 'almuerzo personal admon', '2019-04-26 14:38:12', 1, 1, 1),
(187, 'images/egresoscaja/14831Soporte (44).jpg', 'Beneficiario Externo', '2018-08-14', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:39:15', 1, 1, 1),
(188, 'images/egresoscaja/87179Soporte (45).jpg', 'Beneficiario Externo', '2018-08-13', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 14:41:39', 1, 1, 1),
(189, 'images/egresoscaja/47619Soporte (46).jpg', 'Beneficiario Externo', '2018-08-13', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 14:43:16', 1, 1, 1),
(190, 'images/egresoscaja/47070Soporte (47).jpg', 'Beneficiario Externo', '2018-08-10', 9, 0, 0, 'mayra l delgado', 4, 26, 41000, 'transporte', '2019-04-26 14:44:09', 1, 1, 1),
(191, 'images/egresoscaja/16720Soporte (48).jpg', 'Beneficiario Externo', '2018-08-09', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 14:45:11', 1, 1, 1),
(192, 'images/egresoscaja/22851Soporte (49).jpg', 'Beneficiario Externo', '2018-08-09', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 14:45:58', 1, 1, 1),
(193, 'images/egresoscaja/73995Soporte (50).jpg', 'Beneficiario Externo', '2018-08-08', 9, 0, 0, 'mayra l delgado', 4, 26, 30000, 'transporte', '2019-04-26 14:47:08', 1, 1, 1),
(194, 'images/egresoscaja/56860Soporte (51).jpg', 'Beneficiario Externo', '2018-08-08', 9, 0, 0, 'mayra l delgado', 4, 26, 15000, 'compra', '2019-04-26 15:04:51', 1, 1, 1),
(195, 'images/egresoscaja/19866Soporte (52).jpg', 'Beneficiario Externo', '2018-07-04', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 15:05:53', 1, 1, 1),
(196, 'images/egresoscaja/87289Soporte (53).jpg', 'Beneficiario Externo', '2018-07-04', 9, 0, 0, 'mayra l delgado', 4, 26, 22000, 'almuerzo personal admon', '2019-04-26 15:07:04', 1, 1, 1),
(197, 'images/egresoscaja/58224Soporte (54).jpg', 'Beneficiario Externo', '2018-08-04', 9, 0, 0, 'mayra l delgado', 4, 26, 8500, 'gasto flete', '2019-04-26 15:08:08', 1, 1, 1),
(198, 'images/egresoscaja/78479Soporte (55).jpg', 'Beneficiario Externo', '2018-08-04', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:08:59', 1, 1, 1),
(199, 'images/egresoscaja/76565Soporte (56).jpg', 'Beneficiario Externo', '2018-08-03', 9, 0, 0, 'mayra l delgado', 4, 26, 34000, 'comida', '2019-04-26 15:12:16', 1, 1, 1),
(200, 'images/egresoscaja/49850Soporte (57).jpg', 'Beneficiario Externo', '2018-08-03', 9, 0, 0, 'mayra l delgado', 4, 26, 2000, 'parqueadero', '2019-04-26 15:13:17', 1, 1, 1),
(201, 'images/egresoscaja/45080Soporte (58).jpg', 'Beneficiario Externo', '2018-08-03', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'almuerzo personal admon', '2019-04-26 15:14:57', 1, 1, 1),
(202, 'images/egresoscaja/10968Soporte (59).jpg', 'Beneficiario Externo', '2018-08-02', 9, 0, 0, 'mayra l delgado', 4, 26, 29000, 'almuerzo personal admon', '2019-04-26 15:16:32', 1, 1, 1),
(203, 'images/egresoscaja/18093Soporte (60).jpg', 'Beneficiario Externo', '2018-08-01', 9, 0, 0, 'mayra l delgado', 4, 26, 29000, 'almuerzo para admon', '2019-04-26 15:18:53', 1, 1, 1),
(204, 'images/egresoscaja/53790Soporte (61).jpg', 'Beneficiario Externo', '2018-08-01', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:20:14', 1, 1, 1),
(205, 'images/egresoscaja/11163Soporte (62).jpg', 'Beneficiario Externo', '2018-08-01', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:21:57', 1, 1, 1),
(206, 'images/egresoscaja/88595Soporte (63).jpg', 'Beneficiario Externo', '2018-07-31', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'almuerzo personal admon', '2019-04-26 15:22:57', 1, 1, 1),
(207, 'images/egresoscaja/91732Soporte (64).jpg', 'Beneficiario Externo', '2018-07-31', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:24:04', 1, 1, 1),
(208, 'images/egresoscaja/98623Soporte (65).jpg', 'Beneficiario Externo', '2018-07-30', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'almuerzo personal admon', '2019-04-26 15:47:42', 1, 1, 1),
(209, 'images/egresoscaja/15737Soporte (66).jpg', 'Beneficiario Externo', '2018-07-30', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:49:04', 1, 1, 1),
(210, 'images/egresoscaja/57723Soporte (66).jpg', 'Beneficiario Externo', '2018-07-30', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:49:04', 1, 1, 1),
(211, 'images/egresoscaja/64669Soporte (67).jpg', 'Beneficiario Externo', '2018-07-27', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:50:47', 1, 1, 1),
(212, 'images/egresoscaja/72476Soporte (68).jpg', 'Beneficiario Externo', '2018-07-26', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:55:30', 1, 1, 1),
(213, 'images/egresoscaja/23025Soporte (69).jpg', 'Beneficiario Externo', '2018-07-26', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 15:59:25', 1, 1, 1),
(214, 'images/egresoscaja/19738Soporte (70).jpg', 'Beneficiario Externo', '2018-07-26', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 16:00:20', 1, 1, 1),
(215, 'images/egresoscaja/23724Soporte (72).jpg', 'Beneficiario Externo', '2018-07-16', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 16:02:52', 1, 1, 1),
(216, 'images/egresoscaja/32159Soporte (74).jpg', 'Beneficiario Externo', '2018-07-13', 9, 0, 0, 'mayra l delgado', 4, 26, 30000, 'transporte', '2019-04-26 16:08:53', 1, 1, 1),
(217, 'images/egresoscaja/40899Soporte (73).jpg', 'Beneficiario Externo', '2018-07-15', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 16:16:31', 1, 1, 1),
(218, 'images/egresoscaja/98785Soporte (75).jpg', 'Beneficiario Externo', '2018-07-13', 9, 0, 0, 'mayra l delgado', 4, 26, 6000, 'transporte', '2019-04-26 16:17:22', 1, 1, 1),
(219, 'images/egresoscaja/18261Soporte (76).jpg', 'Beneficiario Externo', '2018-07-11', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 16:18:10', 1, 1, 1),
(220, 'images/egresoscaja/94055Soporte (77).jpg', 'Beneficiario Externo', '2018-07-12', 9, 0, 0, 'mayra l delgado', 4, 26, 30000, 'transporte', '2019-04-26 16:19:23', 1, 1, 1),
(221, 'images/egresoscaja/73129Soporte (78).jpg', 'Beneficiario Externo', '2018-07-11', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 16:20:17', 1, 1, 1),
(222, 'images/egresoscaja/39157Soporte (80).jpg', 'Beneficiario Externo', '2018-10-04', 9, 0, 0, 'mayra l delgado', 4, 26, 8500, 'compra', '2019-04-26 16:21:23', 1, 1, 1),
(223, 'images/egresoscaja/13507Soporte (85).jpg', 'Beneficiario Externo', '2018-10-19', 9, 0, 0, 'mayra l delgado', 4, 26, 18000, 'transporte', '2019-04-26 16:22:41', 1, 1, 1),
(224, 'images/egresoscaja/76626Soporte (86).jpg', 'Beneficiario Externo', '2018-10-03', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 16:24:01', 1, 1, 1),
(225, 'images/egresoscaja/68353Soporte (87).jpg', 'Beneficiario Externo', '2018-10-01', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 16:24:53', 1, 1, 1),
(226, 'images/egresoscaja/81121Soporte (88).jpg', 'Beneficiario Externo', '2018-10-01', 9, 0, 0, 'mayra l delgado', 4, 26, 30000, 'transporte', '2019-04-26 16:25:51', 1, 1, 1),
(227, 'images/egresoscaja/35360Soporte (89).jpg', 'Beneficiario Externo', '2018-09-29', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'transporte', '2019-04-26 16:27:06', 1, 1, 1),
(228, 'images/egresoscaja/75839Soporte (90).jpg', 'Beneficiario Externo', '2018-09-28', 9, 0, 0, 'mayra l delgado', 4, 26, 12000, 'transporte', '2019-04-26 16:27:59', 1, 1, 1),
(229, 'images/egresoscaja/52389Soporte - 2019-04-25T104102.778.jpg', 'Beneficiario Externo', '2018-08-06', 9, 0, 0, 'mayra l delgado', 4, 26, 24000, 'almuerzo personal admon', '2019-04-26 16:28:56', 1, 1, 1),
(230, 'images/egresoscaja/67944IMG_7885.JPG', 'Beneficiario Externo', '2019-04-20', 8, 0, 0, 'jesica bello', 4, 26, 60000, 'carta', '2019-04-29 14:19:10', 1, 1, 1),
(231, 'images/egresoscaja/91681IMG_7931.JPG', 'Beneficiario Externo', '2019-05-02', 5, 0, 0, 'Jos? Daniel Meza Olmos', 2, 7, 6000, 'transporte para compra de AZ', '2019-05-08 09:25:08', 1, 1, 1),
(232, 'images/egresoscaja/4064image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje el dificil', 2, 7, 9200, 'Peaje', '2019-05-17 09:08:50', 1, 1, 1),
(233, 'images/egresoscaja/92934image.jpg', 'Beneficiario Externo', '2019-05-11', 5, 0, 0, 'Peaje el dificil', 2, 7, 9200, 'Peaje', '2019-05-17 09:10:47', 1, 1, 1),
(234, 'images/egresoscaja/1348image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Sociedad concesionaria vial montes de Maria SAS', 2, 7, 8800, 'Peaje', '2019-05-17 09:12:04', 1, 1, 1),
(235, 'images/egresoscaja/20121image.jpg', 'Beneficiario Externo', '2019-05-11', 5, 0, 0, 'Sociedad concesionaria vial montes de Maria SAS', 2, 7, 8800, 'Peaje', '2019-05-17 09:13:23', 1, 1, 1),
(236, 'images/egresoscaja/1041image.jpg', 'Beneficiario Externo', '2019-05-11', 5, 0, 0, 'Peaje valencia', 2, 7, 8100, 'Peaje', '2019-05-17 09:14:48', 1, 1, 1),
(237, 'images/egresoscaja/71234image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje valencia', 2, 7, 8100, 'Peaje', '2019-05-17 09:15:51', 1, 1, 1),
(238, 'images/egresoscaja/73023image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje pte plato', 2, 7, 9200, 'Peaje', '2019-05-17 09:17:06', 1, 1, 1),
(239, 'images/egresoscaja/13950image.jpg', 'Beneficiario Externo', '2019-05-11', 5, 0, 0, 'Peaje pte plato', 2, 7, 9200, 'Peaje', '2019-05-17 09:21:31', 1, 1, 1),
(240, 'images/egresoscaja/8636image.jpg', 'Beneficiario Externo', '2019-05-11', 5, 0, 0, 'Peaje las flores', 2, 19, 4500, 'Peaje', '2019-05-17 09:24:26', 1, 1, 1),
(241, 'images/egresoscaja/22440image.jpg', 'Beneficiario Externo', '2019-05-11', 5, 0, 0, 'Peaje las flores', 2, 7, 4500, 'Peaje', '2019-05-17 09:24:26', 1, 1, 1),
(242, 'images/egresoscaja/72380image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje las  Fl?rez', 2, 7, 4500, 'Peaje', '2019-05-17 09:28:34', 1, 1, 1),
(243, 'images/egresoscaja/98420image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje las flores', 2, 7, 4500, 'Peaje', '2019-05-17 09:30:02', 1, 1, 1),
(244, 'images/egresoscaja/90859image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje flores', 2, 7, 4500, 'Peaje', '2019-05-17 14:20:53', 1, 1, 1),
(245, 'images/egresoscaja/41269image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje flores', 2, 7, 4500, 'Peaje', '2019-05-17 14:20:53', 1, 1, 1),
(246, 'images/egresoscaja/58891image.jpg', 'Beneficiario Externo', '2019-05-14', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:18:09', 1, 1, 1),
(247, 'images/egresoscaja/17304image.jpg', 'Beneficiario Externo', '2019-05-14', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:19:13', 1, 1, 1),
(248, 'images/egresoscaja/42233image.jpg', 'Beneficiario Externo', '2019-05-16', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:20:14', 1, 1, 1),
(249, 'images/egresoscaja/75810image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:21:37', 1, 1, 1),
(250, 'images/egresoscaja/82363image.jpg', 'Beneficiario Externo', '2019-05-10', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:22:44', 1, 1, 1),
(251, 'images/egresoscaja/48811image.jpg', 'Beneficiario Externo', '2019-05-15', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:23:59', 1, 1, 1),
(252, 'images/egresoscaja/53734image.jpg', 'Beneficiario Externo', '2019-05-15', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:25:00', 1, 1, 1),
(253, 'images/egresoscaja/31396image.jpg', 'Beneficiario Externo', '2019-05-10', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:25:58', 1, 1, 1),
(254, 'images/egresoscaja/1297image.jpg', 'Beneficiario Externo', '2019-05-15', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:27:18', 1, 1, 1),
(255, 'images/egresoscaja/80549image.jpg', 'Beneficiario Externo', '2019-05-11', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:28:15', 1, 1, 1),
(256, 'images/egresoscaja/83922image.jpg', 'Beneficiario Externo', '2019-05-16', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:29:36', 1, 1, 1),
(257, 'images/egresoscaja/91181image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:30:29', 1, 1, 1),
(258, 'images/egresoscaja/5023image.jpg', 'Beneficiario Externo', '2019-05-15', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 15:33:32', 1, 1, 1),
(259, 'images/egresoscaja/79857image.jpg', 'Beneficiario Externo', '2019-04-16', 5, 0, 0, 'Panamericana librer?a y papeleria SAS', 4, 17, 39500, 'Compra', '2019-05-17 15:35:18', 1, 1, 1),
(260, 'images/egresoscaja/72695image.jpg', 'Beneficiario Externo', '2019-05-16', 5, 0, 0, 'Ferreteria RD', 5, 30, 66000, 'Compra', '2019-05-17 15:37:00', 1, 1, 1),
(261, 'images/egresoscaja/68138image.jpg', 'Beneficiario Externo', '2019-05-16', 5, 0, 0, 'Alkosto', 4, 17, 26900, 'Compra', '2019-05-17 15:38:20', 1, 1, 1),
(262, 'images/egresoscaja/75738image.jpg', 'Beneficiario Externo', '2019-05-13', 5, 0, 0, 'Rancher?a SAS', 4, 19, 148000, 'Comida', '2019-05-17 15:39:23', 1, 1, 1),
(264, 'images/egresoscaja/23335image.jpg', 'Beneficiario Externo', '2019-05-16', 5, 0, 0, 'Movistar', 2, 5, 102989, 'Pago plan', '2019-05-17 15:54:17', 1, 1, 1),
(266, 'images/egresoscaja/86162image.jpg', 'Beneficiario Externo', '2019-05-17', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 17:32:08', 1, 1, 1),
(267, 'images/egresoscaja/72314image.jpg', 'Beneficiario Externo', '2019-05-17', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-17 17:33:39', 1, 1, 1),
(268, 'images/egresoscaja/20484IMG_8411.JPG', 'Beneficiario Externo', '2019-05-21', 5, 0, 0, 'tigo', 2, 5, 100000, 'pago de plan', '2019-05-23 15:28:09', 1, 1, 1),
(269, 'images/egresoscaja/99491image.jpg', 'Beneficiario Externo', '2019-05-21', 5, 0, 0, 'Tigo', 2, 5, 100000, 'Pago de plan', '2019-05-23 15:33:07', 1, 1, 1),
(270, 'images/egresoscaja/35892image.jpg', 'Beneficiario Externo', '2019-05-18', 5, 0, 0, 'Sociedad concesionaria vial montes de Mar?a sas', 2, 7, 8800, 'Peaje', '2019-05-23 15:35:10', 1, 1, 1),
(271, 'images/egresoscaja/16482image.jpg', 'Beneficiario Externo', '2019-05-21', 5, 0, 0, 'Peaje la esperanza', 2, 7, 8200, 'Peaje', '2019-05-23 15:36:53', 1, 1, 1),
(272, 'images/egresoscaja/11872IMG_8436.JPG', 'Beneficiario Externo', '2019-05-20', 5, 0, 0, 'peaje el dificil', 2, 7, 9200, 'peaje', '2019-05-23 15:42:27', 1, 1, 1),
(273, 'images/egresoscaja/91934IMG_8437.JPG', 'Beneficiario Externo', '2019-05-18', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-05-23 15:43:31', 1, 1, 1),
(274, 'images/egresoscaja/53465IMG_8438.JPG', 'Beneficiario Externo', '2019-05-20', 5, 0, 0, 'peaje valencia', 2, 7, 8100, 'peaje', '2019-05-23 15:44:18', 1, 1, 1),
(275, 'images/egresoscaja/7829IMG_8439.JPG', 'Beneficiario Externo', '2019-05-22', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-23 15:45:13', 1, 1, 1),
(276, 'images/egresoscaja/81969IMG_8440.JPG', 'Beneficiario Externo', '2019-05-21', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-23 15:47:59', 1, 1, 1),
(277, 'images/egresoscaja/19242IMG_8441.JPG', 'Beneficiario Externo', '2019-05-18', 5, 0, 0, 'peaje el dificil', 2, 7, 9200, 'peaje', '2019-05-23 15:48:54', 1, 1, 1),
(278, 'images/egresoscaja/48735IMG_8448.JPG', 'Beneficiario Externo', '2019-05-18', 5, 0, 0, 'peaje valencia', 2, 7, 8100, 'peaje', '2019-05-24 08:25:07', 1, 1, 1),
(279, 'images/egresoscaja/9167IMG_8449.JPG', 'Beneficiario Externo', '2019-05-18', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 08:26:22', 1, 1, 1),
(280, 'images/egresoscaja/26776IMG_8450.JPG', 'Beneficiario Externo', '2019-05-22', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 08:27:14', 1, 1, 1),
(281, 'images/egresoscaja/66720IMG_8451.JPG', 'Beneficiario Externo', '2019-05-20', 5, 0, 0, 'sociedad concesionaria vial montes de maria sas', 2, 7, 8800, 'peaje', '2019-05-24 08:43:12', 1, 1, 1),
(282, 'images/egresoscaja/73172IMG_8452.JPG', 'Beneficiario Externo', '2019-05-18', 5, 0, 0, 'peaje pte plato', 2, 7, 9200, 'peaje', '2019-05-24 08:44:22', 1, 1, 1),
(283, 'images/egresoscaja/13872IMG_8453.JPG', 'Beneficiario Externo', '2019-05-20', 5, 0, 0, 'peaje pte plato', 2, 7, 9200, 'peaje', '2019-05-24 08:45:14', 1, 1, 1),
(284, 'images/egresoscaja/43550IMG_8454.JPG', 'Beneficiario Externo', '2019-05-20', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 08:46:29', 1, 1, 1),
(285, 'images/egresoscaja/87198IMG_8455.JPG', 'Beneficiario Externo', '2019-05-21', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 08:47:23', 1, 1, 1),
(286, 'images/egresoscaja/46925IMG_8456.JPG', 'Beneficiario Externo', '2019-05-21', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 08:48:19', 1, 1, 1),
(287, 'images/egresoscaja/61432IMG_8457.JPG', 'Beneficiario Externo', '2019-05-18', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 08:49:11', 1, 1, 1),
(288, 'images/egresoscaja/51265IMG_8458.JPG', 'Beneficiario Externo', '2019-05-20', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-05-24 08:53:31', 1, 1, 1),
(289, 'images/egresoscaja/9234IMG_8459.JPG', 'Beneficiario Externo', '2019-05-20', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 08:56:39', 1, 1, 1),
(290, 'images/egresoscaja/45078IMG_8460.JPG', 'Beneficiario Externo', '2019-05-16', 5, 0, 0, 'subway venecia living mall', 4, 19, 30252, 'comida', '2019-05-24 08:57:23', 1, 1, 1),
(291, 'images/egresoscaja/47478IMG_8461.JPG', 'Beneficiario Externo', '2019-05-21', 5, 0, 0, 'Mar?a Angelica Meza', 4, 19, 200000, 'giro', '2019-05-24 08:59:44', 1, 1, 1),
(294, 'images/egresoscaja/13201IMG_8493.JPG', 'Beneficiario Externo', '2019-05-21', 47, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-05-24 10:37:32', 1, 1, 1),
(295, 'images/egresoscaja/48390IMG_8494.JPG', 'Beneficiario Externo', '2019-05-21', 47, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-05-24 10:38:10', 1, 1, 1),
(296, 'images/egresoscaja/40060IMG_8495.JPG', 'Beneficiario Externo', '2019-05-21', 47, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 10:42:50', 1, 1, 1),
(297, 'images/egresoscaja/73556IMG_8497.JPG', 'Beneficiario Externo', '2019-05-21', 47, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-24 10:43:44', 1, 1, 1),
(298, 'images/egresoscaja/67940IMG_8498.JPG', 'Beneficiario Externo', '2019-05-23', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte (motos) compra de filtros', '2019-05-24 10:44:35', 1, 1, 1),
(299, 'images/egresoscaja/27928IMG_8499.JPG', 'Beneficiario Externo', '2019-05-23', 47, 0, 0, 'Oscar Pacheco', 2, 7, 15000, 'transporte de filtros hasta toluviejo', '2019-05-24 10:45:51', 1, 1, 1),
(300, 'images/egresoscaja/25522IMG_8500.JPG', 'Beneficiario Externo', '2019-05-22', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte (motos) entrega y cargue de material', '2019-05-24 10:46:56', 1, 1, 1),
(301, 'images/egresoscaja/74792IMG_8501.JPG', 'Beneficiario Externo', '2019-05-22', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte (motos) recoger facturas y entrega de Certificado de retenci?n', '2019-05-24 10:47:55', 1, 1, 1),
(302, 'images/egresoscaja/74989IMG_8502.JPG', 'Beneficiario Externo', '2019-05-21', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte (motos) recogida de computador', '2019-05-24 10:49:14', 1, 1, 1),
(303, 'images/egresoscaja/83721IMG_8503.JPG', 'Beneficiario Externo', '2019-05-21', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 6000, 'pago de moto taxi gu?a para recoger planta', '2019-05-24 10:50:29', 1, 1, 1),
(304, 'images/egresoscaja/80722IMG_8504.JPG', 'Beneficiario Externo', '2019-05-22', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 6000, 'transporte (motos) retiro de caja menor y pago de deuda telmex JDMO', '2019-05-24 11:04:06', 1, 1, 1),
(305, 'images/egresoscaja/80212IMG_8505.JPG', 'Beneficiario Externo', '2019-05-23', 47, 0, 0, 'Luis Perez', 2, 7, 10000, 'transporte de c?mara de seguridad hacia la cantera', '2019-05-24 11:05:27', 1, 1, 1),
(306, 'images/egresoscaja/60003IMG_8506.JPG', 'Beneficiario Externo', '2019-05-23', 47, 0, 0, 'franco pico', 5, 30, 17000, 'compra de c?mara de seguridad', '2019-05-24 11:06:33', 1, 1, 1),
(307, 'images/egresoscaja/6837IMG_8507.JPG', 'Beneficiario Externo', '2019-05-23', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte (motos) compra de c?mara de seguridad', '2019-05-24 11:07:36', 1, 1, 1),
(308, 'images/egresoscaja/19452IMG_8508.JPG', 'Beneficiario Externo', '2019-05-23', 47, 0, 0, 'Natalia Hern?ndez', 2, 5, 10000, 'recarga de minutos para cotizaciones', '2019-05-24 11:08:49', 1, 1, 1),
(309, 'images/egresoscaja/82224IMG_8509.JPG', 'Beneficiario Externo', '2019-05-20', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte (motos) gu?a de movilidad', '2019-05-24 11:09:44', 1, 1, 1),
(310, 'images/egresoscaja/68692IMG_8510.JPG', 'Beneficiario Externo', '2019-05-22', 47, 0, 0, 'COMCEL S.A.', 2, 5, 225819, 'Pago de deuda de JDMO', '2019-05-24 11:10:35', 1, 1, 1),
(311, 'images/egresoscaja/38894IMG_8511.JPG', 'Beneficiario Externo', '2019-05-23', 47, 0, 0, 'AGROCAT', 3, 12, 400000, 'Compra de filtros', '2019-05-24 11:11:45', 1, 1, 1),
(312, 'images/egresoscaja/79182IMG_8512.JPG', 'Beneficiario Externo', '2019-05-20', 47, 0, 0, 'RUNT', 3, 16, 9200, 'Gu?a de movilizaci?n', '2019-05-24 11:13:51', 1, 1, 1),
(313, 'images/egresoscaja/50550IMG_8518[1].JPG', 'Beneficiario Externo', '2019-05-24', 47, 0, 0, 'erick santos', 4, 17, 18000, 'cerrajero', '2019-05-24 17:15:32', 1, 1, 1),
(314, 'images/egresoscaja/69842IMG_8519[1].JPG', 'Beneficiario Externo', '2019-05-24', 47, 0, 0, 'jose julian valdeblanques', 4, 19, 10000, 'almuerzo conductor', '2019-05-24 17:17:15', 1, 1, 1),
(315, 'images/egresoscaja/98925IMG_8527.JPG', 'Beneficiario Externo', '2019-04-09', 46, 0, 0, 'Copvesa', 3, 10, 20000, 'combustible', '2019-05-25 08:53:29', 1, 1, 1),
(316, 'images/egresoscaja/16527IMG_8528.JPG', 'Beneficiario Externo', '2019-04-11', 46, 0, 0, 'distracom', 3, 10, 30000, 'combustible', '2019-05-25 08:55:40', 1, 1, 1),
(317, 'images/egresoscaja/15276IMG_8529.JPG', 'Beneficiario Externo', '2019-04-09', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 08:57:21', 1, 1, 1),
(318, 'images/egresoscaja/62975IMG_8530.JPG', 'Beneficiario Externo', '2019-04-09', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 08:58:05', 1, 1, 1),
(319, 'images/egresoscaja/62860IMG_8531.JPG', 'Beneficiario Externo', '2019-04-11', 46, 0, 0, 'peaje los garzones', 2, 7, 8200, 'peaje', '2019-05-25 08:58:47', 1, 1, 1),
(320, 'images/egresoscaja/89385IMG_8532.JPG', 'Beneficiario Externo', '2019-04-11', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 08:59:54', 1, 1, 1),
(321, 'images/egresoscaja/61785IMG_8533.JPG', 'Beneficiario Externo', '2019-04-17', 46, 0, 0, 'distracom', 3, 10, 20000, 'combustible', '2019-05-25 09:01:45', 1, 1, 1),
(322, 'images/egresoscaja/23250IMG_8534.JPG', 'Beneficiario Externo', '2019-04-22', 46, 0, 0, 'distracom', 3, 10, 20000, 'combustible', '2019-05-25 09:02:36', 1, 1, 1),
(323, 'images/egresoscaja/68342IMG_8535.JPG', 'Beneficiario Externo', '2019-04-09', 46, 0, 0, 'comercial toluviejo', 3, 12, 2500, 'repuestos', '2019-05-25 09:03:29', 1, 1, 1),
(324, 'images/egresoscaja/99804IMG_8536.JPG', 'Beneficiario Externo', '2019-04-23', 46, 0, 0, 'HELB S.A.S.', 5, 28, 157000, 'dotaci?n de personal', '2019-05-25 09:04:57', 1, 1, 1),
(325, 'images/egresoscaja/38960IMG_8537.JPG', 'Beneficiario Externo', '2019-04-23', 46, 0, 0, 'papeleria e internet maos', 4, 17, 2400, 'impresiones', '2019-05-25 09:07:04', 1, 1, 1),
(326, 'images/egresoscaja/65448IMG_8538.JPG', 'Beneficiario Externo', '2019-04-24', 46, 0, 0, 'C.C. CARIBE S.A.S.', 3, 10, 22000, 'Combustible', '2019-05-25 09:09:05', 1, 1, 1),
(327, 'images/egresoscaja/85740IMG_8539.JPG', 'Beneficiario Externo', '2019-04-26', 46, 0, 0, 'variedades y tecnologia shaday', 4, 17, 4400, 'impresiones', '2019-05-25 09:10:14', 1, 1, 1);
INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(328, 'images/egresoscaja/2125IMG_8540.JPG', 'Beneficiario Externo', '2009-04-26', 46, 0, 0, 'C.C. CARIBE S.A.S.', 3, 10, 20000, 'combustible', '2019-05-25 09:11:19', 1, 1, 1),
(329, 'images/egresoscaja/67906IMG_8541.JPG', 'Beneficiario Externo', '2019-04-27', 46, 0, 0, 'taller y llanter?a toluviejo', 3, 12, 25000, 'repuestos', '2019-05-25 09:12:39', 1, 1, 1),
(330, 'images/egresoscaja/28998IMG_8542.JPG', 'Beneficiario Externo', '2019-04-27', 46, 0, 0, 'C.C. CARIBE S.A.S.', 3, 10, 20000, 'combustible', '2019-05-25 09:13:57', 1, 1, 1),
(331, 'images/egresoscaja/59792IMG_8543.JPG', 'Beneficiario Externo', '2019-04-27', 46, 0, 0, 'BOMBEROS DE COLOMBIA', 5, 30, 85000, 'Compra de extintores', '2019-05-25 09:14:51', 1, 1, 1),
(332, 'images/egresoscaja/33640IMG_8544.JPG', 'Beneficiario Externo', '2019-05-11', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:03:34', 1, 1, 1),
(333, 'images/egresoscaja/13528IMG_8545.JPG', 'Beneficiario Externo', '2019-05-11', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:04:21', 1, 1, 1),
(334, 'images/egresoscaja/53841IMG_8546.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:06:57', 1, 1, 1),
(335, 'images/egresoscaja/43877IMG_8547.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:07:54', 1, 1, 1),
(336, 'images/egresoscaja/13569IMG_8548.JPG', 'Beneficiario Externo', '2019-05-08', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:08:48', 1, 1, 1),
(337, 'images/egresoscaja/30546IMG_8549.JPG', 'Beneficiario Externo', '2019-05-08', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:09:51', 1, 1, 1),
(338, 'images/egresoscaja/6350IMG_8550.JPG', 'Beneficiario Externo', '2019-05-07', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:13:44', 1, 1, 1),
(339, 'images/egresoscaja/69437IMG_8551.JPG', 'Beneficiario Externo', '2019-05-07', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:14:39', 1, 1, 1),
(340, 'images/egresoscaja/19394IMG_8552.JPG', 'Beneficiario Externo', '2019-05-05', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:17:24', 1, 1, 1),
(341, 'images/egresoscaja/94471IMG_8553.JPG', 'Beneficiario Externo', '2019-05-05', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:18:08', 1, 1, 1),
(342, 'images/egresoscaja/99516IMG_8554.JPG', 'Beneficiario Externo', '2019-05-03', 46, 0, 0, 'eds san francisco', 3, 10, 30000, 'combustible', '2019-05-25 10:18:44', 1, 1, 1),
(343, 'images/egresoscaja/30635IMG_8555.JPG', 'Beneficiario Externo', '2019-05-02', 46, 0, 0, 'peaje la esperanza', 2, 7, 19200, 'peaje', '2019-05-25 10:20:16', 1, 1, 1),
(344, 'images/egresoscaja/27532IMG_8556.JPG', 'Beneficiario Externo', '2019-05-02', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:20:53', 1, 1, 1),
(345, 'images/egresoscaja/49896IMG_8557.JPG', 'Beneficiario Externo', '2019-05-02', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:21:25', 1, 1, 1),
(346, 'images/egresoscaja/1630IMG_8558.JPG', 'Beneficiario Externo', '2019-05-01', 46, 0, 0, 'eds san francisco', 3, 10, 30000, 'combustible', '2019-05-25 10:22:01', 1, 1, 1),
(347, 'images/egresoscaja/33585IMG_8559.JPG', 'Beneficiario Externo', '2019-04-29', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:22:53', 1, 1, 1),
(348, 'images/egresoscaja/11937IMG_8560.JPG', 'Beneficiario Externo', '2019-04-29', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:24:35', 1, 1, 1),
(349, 'images/egresoscaja/16768IMG_8561.JPG', 'Beneficiario Externo', '2019-04-29', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:25:08', 1, 1, 1),
(350, 'images/egresoscaja/1653IMG_8562.JPG', 'Beneficiario Externo', '2019-04-29', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-05-25 10:25:47', 1, 1, 1),
(351, 'images/egresoscaja/21168IMG_8563.JPG', 'Beneficiario Externo', '2019-05-18', 46, 0, 0, 'hernando escobar', 5, 31, 6000, 'envio de arnes', '2019-05-25 10:43:23', 1, 1, 1),
(352, 'images/egresoscaja/90317IMG_8564.JPG', 'Beneficiario Externo', '2019-05-18', 46, 0, 0, 'maderas y muebles la bendici?n de Dios', 5, 30, 50000, 'compra de tablas', '2019-05-25 10:44:26', 1, 1, 1),
(353, 'images/egresoscaja/27554IMG_8565.JPG', 'Beneficiario Externo', '2019-05-17', 46, 0, 0, 'elkin garces', 5, 31, 10000, 'acarreo de tablas', '2019-05-25 10:45:51', 1, 1, 1),
(354, 'images/egresoscaja/50089IMG_8566.JPG', 'Beneficiario Externo', '2019-05-13', 46, 0, 0, 'llanteria el amigo', 3, 15, 40000, 'arreglo de llanta', '2019-05-25 10:47:08', 1, 1, 1),
(355, 'images/egresoscaja/54025IMG_8567.JPG', 'Beneficiario Externo', '2019-05-12', 46, 0, 0, 'maderas y muebles la bendici?n de Dios', 5, 30, 210000, 'compra', '2019-05-25 10:48:57', 1, 1, 1),
(356, 'images/egresoscaja/43129IMG_8568.JPG', 'Beneficiario Externo', '2019-05-11', 46, 0, 0, 'el tenderito', 5, 30, 228000, 'compra', '2019-05-25 10:52:30', 1, 1, 1),
(357, 'images/egresoscaja/54800IMG_8569.JPG', 'Beneficiario Externo', '2019-05-11', 46, 0, 0, 'david acosta', 5, 31, 15000, 'acarreo', '2019-05-27 10:38:28', 1, 1, 1),
(358, 'images/egresoscaja/68064IMG_8570.JPG', 'Beneficiario Externo', '2019-05-11', 46, 0, 0, 'elkin garces', 5, 31, 10000, 'acarreo', '2019-05-27 10:41:13', 1, 1, 1),
(359, 'images/egresoscaja/12033IMG_8571.JPG', 'Beneficiario Externo', '2019-05-11', 46, 0, 0, 'ender camacho', 5, 30, 20000, 'compra de agua', '2019-05-27 10:42:16', 1, 1, 1),
(360, 'images/egresoscaja/96993IMG_8572.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'C.C. CARIBE S.A.S.', 3, 10, 30000, 'combustible', '2019-05-27 10:44:41', 1, 1, 1),
(361, 'images/egresoscaja/65485IMG_8573.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'el tenderito', 5, 30, 228000, 'compra', '2019-05-27 10:45:56', 1, 1, 1),
(362, 'images/egresoscaja/47545IMG_8574.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'maderas y muebles la bendici?n de Dios', 5, 30, 60000, 'compra', '2019-05-27 10:46:55', 1, 1, 1),
(363, 'images/egresoscaja/88457IMG_8575.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'ferreteria el centavo menos', 5, 30, 168500, 'compra', '2019-05-27 10:48:00', 1, 1, 1),
(365, 'images/egresoscaja/70410IMG_8576.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'elkin garces', 5, 31, 30000, 'acarreo', '2019-05-27 10:49:24', 1, 1, 1),
(366, 'images/egresoscaja/93698IMG_8577.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'ferreteria el centavo menos', 5, 29, 407000, 'compra', '2019-05-27 10:50:29', 1, 1, 1),
(367, 'images/egresoscaja/20983IMG_8578.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'super tienda tierra de gosen', 5, 30, 1800, 'compra', '2019-05-27 10:51:16', 1, 1, 1),
(368, 'images/egresoscaja/86122IMG_8579.JPG', 'Beneficiario Externo', '2019-05-09', 46, 0, 0, 'carlos olivero', 4, 25, 50000, 'celaduria', '2019-05-27 10:53:02', 1, 1, 1),
(369, 'images/egresoscaja/4605IMG_8580.JPG', 'Beneficiario Externo', '2019-05-08', 46, 0, 0, 'el tenderito', 5, 30, 228000, 'compra', '2019-05-27 11:08:37', 1, 1, 1),
(370, 'images/egresoscaja/92173IMG_8581.JPG', 'Beneficiario Externo', '2019-05-08', 46, 0, 0, 'ferreteria toluviejo', 5, 30, 10000, 'compra', '2019-05-27 11:10:40', 1, 1, 1),
(371, 'images/egresoscaja/59616IMG_8582.JPG', 'Beneficiario Externo', '2019-05-07', 46, 0, 0, 'taller el lata', 5, 30, 165000, 'compra', '2019-05-27 11:11:50', 1, 1, 1),
(372, 'images/egresoscaja/71309IMG_8583.JPG', 'Beneficiario Externo', '2019-05-07', 46, 0, 0, 'el tenderito', 5, 30, 120000, 'compra', '2019-05-27 11:13:05', 1, 1, 1),
(373, 'images/egresoscaja/78735IMG_8584.JPG', 'Beneficiario Externo', '2019-05-07', 46, 0, 0, 'ferreteria el centavo menos', 5, 29, 229800, 'compra', '2019-05-27 13:40:29', 1, 1, 1),
(374, 'images/egresoscaja/45756IMG_8585.JPG', 'Beneficiario Externo', '2019-05-07', 46, 0, 0, 'noris martinez romero', 5, 30, 3400, 'compra', '2019-05-27 13:41:51', 1, 1, 1),
(375, 'images/egresoscaja/29014IMG_8586.JPG', 'Beneficiario Externo', '2019-05-07', 46, 0, 0, 'ferroagro gm', 5, 30, 2500, 'compra', '2019-05-27 13:42:55', 1, 1, 1),
(376, 'images/egresoscaja/41322IMG_8587.JPG', 'Beneficiario Externo', '2019-05-07', 46, 0, 0, 'elkin garces', 5, 31, 15000, 'acarreo', '2019-05-27 13:43:51', 1, 1, 1),
(377, 'images/egresoscaja/61211IMG_8588.JPG', 'Beneficiario Externo', '2019-05-06', 46, 0, 0, 'maderas y muebles la bendici?n de Dios', 5, 29, 240000, 'compra', '2019-05-27 13:44:52', 1, 1, 1),
(378, 'images/egresoscaja/7989IMG_8589.JPG', 'Beneficiario Externo', '2019-05-06', 46, 0, 0, 'ferreteria el centavo menos', 5, 29, 10000, 'compra', '2019-05-27 13:45:39', 1, 1, 1),
(379, 'images/egresoscaja/38462IMG_8590.JPG', 'Beneficiario Externo', '2019-05-06', 46, 0, 0, 'ober julio gutierrez', 3, 12, 40000, 'cambio de aceite de motor volqueta WNL 374', '2019-05-27 13:46:35', 1, 1, 1),
(380, 'images/egresoscaja/37293IMG_8591.JPG', 'Beneficiario Externo', '2019-05-06', 46, 0, 0, 'Paulo perez', 5, 31, 8000, 'acarreo', '2019-05-27 13:47:44', 1, 1, 1),
(381, 'images/egresoscaja/52225IMG_8592.JPG', 'Beneficiario Externo', '2019-05-06', 46, 0, 0, 'ferroagro gm', 5, 30, 5000, 'compra', '2019-05-27 13:48:43', 1, 1, 1),
(382, 'images/egresoscaja/69151IMG_8593.JPG', 'Beneficiario Externo', '2019-05-06', 46, 0, 0, 'ferroagro gm', 5, 30, 17000, 'compra', '2019-05-27 13:49:30', 1, 1, 1),
(383, 'images/egresoscaja/48154IMG_8594.JPG', 'Beneficiario Externo', '2019-05-05', 46, 0, 0, 'C.C. CARIBE S.A.S.', 3, 10, 20000, 'combustible', '2019-05-27 13:50:26', 1, 1, 1),
(384, 'images/egresoscaja/95692IMG_8595.JPG', 'Beneficiario Externo', '2019-05-03', 46, 0, 0, 'Paulo perez', 5, 31, 5000, 'acarreo', '2019-05-27 13:51:52', 1, 1, 1),
(385, 'images/egresoscaja/24480IMG_8596.JPG', 'Beneficiario Externo', '2019-05-03', 46, 0, 0, 'Paulo perez', 5, 29, 60000, 'compra', '2019-05-27 13:53:37', 1, 1, 1),
(386, 'images/egresoscaja/44414IMG_8597.JPG', 'Beneficiario Externo', '2019-05-03', 46, 0, 0, 'el tenderito', 5, 30, 114000, 'compra', '2019-05-27 13:55:26', 1, 1, 1),
(387, 'images/egresoscaja/4326IMG_8598.JPG', 'Beneficiario Externo', '2019-05-02', 46, 0, 0, 'el tenderito', 5, 30, 195000, 'compra', '2019-05-27 13:56:31', 1, 1, 1),
(388, 'images/egresoscaja/14105IMG_8599.JPG', 'Beneficiario Externo', '2019-05-02', 46, 0, 0, 'AGROCAT', 3, 12, 210000, 'compra', '2019-05-27 13:57:26', 1, 1, 1),
(389, 'images/egresoscaja/90139IMG_8600.JPG', 'Beneficiario Externo', '2019-05-02', 46, 0, 0, 'ferroagro gm', 5, 30, 8000, 'compra', '2019-05-27 13:58:10', 1, 1, 1),
(390, 'images/egresoscaja/66757IMG_8601.JPG', 'Beneficiario Externo', '2019-05-02', 46, 0, 0, 'ender camacho', 5, 30, 4000, 'compra', '2019-05-27 13:59:33', 1, 1, 1),
(391, 'images/egresoscaja/52444IMG_8602.JPG', 'Beneficiario Externo', '2019-04-30', 46, 0, 0, 'shaday', 4, 17, 2000, 'compra', '2019-05-27 14:00:37', 1, 1, 1),
(392, 'images/egresoscaja/92454IMG_8603.JPG', 'Beneficiario Externo', '2019-04-30', 46, 0, 0, 'distribuidora anclas sas', 5, 30, 301630, 'compra', '2019-05-27 14:01:21', 1, 1, 1),
(393, 'images/egresoscaja/59018IMG_8604.JPG', 'Beneficiario Externo', '2019-04-30', 46, 0, 0, 'super tienda tierra de gosen', 5, 30, 11600, 'compra', '2019-05-27 14:03:02', 1, 1, 1),
(394, 'images/egresoscaja/18292IMG_8605.JPG', 'Beneficiario Externo', '2019-04-30', 46, 0, 0, 'comercial toluviejo', 5, 30, 14000, 'compra', '2019-05-27 14:04:55', 1, 1, 1),
(395, 'images/egresoscaja/79382IMG_8606.JPG', 'Beneficiario Externo', '2019-04-30', 46, 0, 0, 'cyme sas', 5, 28, 311500, 'compra', '2019-05-27 14:05:46', 1, 1, 1),
(396, 'images/egresoscaja/70955IMG_8607.JPG', 'Beneficiario Externo', '2019-04-30', 46, 0, 0, 'lubritodo', 5, 30, 130000, 'compra', '2019-05-27 14:06:55', 1, 1, 1),
(397, 'images/egresoscaja/55157IMG_8608.JPG', 'Beneficiario Externo', '2019-04-30', 46, 0, 0, 'ober julio gutierrez', 5, 31, 60000, 'acarreo', '2019-05-27 14:08:35', 1, 1, 1),
(398, 'images/egresoscaja/99719IMG_8609.JPG', 'Beneficiario Externo', '2019-04-29', 46, 0, 0, 'TEXACO', 3, 10, 30000, 'combutible', '2019-05-27 14:09:26', 1, 1, 1),
(399, 'images/egresoscaja/14088IMG_8610.JPG', 'Beneficiario Externo', '2019-04-29', 46, 0, 0, 'bordados aryz', 5, 28, 55000, 'compra', '2019-05-27 14:10:26', 1, 1, 1),
(400, 'images/egresoscaja/40714IMG_8653.JPG', 'Beneficiario Externo', '2019-05-25', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 6000, 'transporte', '2019-05-28 08:25:02', 1, 1, 1),
(401, 'images/egresoscaja/32891IMG_8654.JPG', 'Beneficiario Externo', '2019-05-27', 47, 0, 0, 'alexis funieles', 3, 12, 20000, 'lavado sencillo para tecnicomecanica', '2019-05-28 08:32:49', 1, 1, 1),
(402, 'images/egresoscaja/76755IMG_8655.JPG', 'Beneficiario Externo', '2019-05-27', 47, 0, 0, 'maria eugenia romero', 4, 19, 56000, 'comida de personal de la cantera', '2019-05-28 08:34:33', 1, 1, 1),
(403, 'images/egresoscaja/33199IMG_8656.JPG', 'Beneficiario Externo', '2019-05-27', 47, 0, 0, 'germinson arroyo', 2, 7, 4000, 'gasolina moto trabajador', '2019-05-28 08:35:53', 1, 1, 1),
(404, 'images/egresoscaja/97624IMG_8657.JPG', 'Beneficiario Externo', '2019-05-27', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 6000, 'transporte', '2019-05-28 08:37:15', 1, 1, 1),
(405, 'images/egresoscaja/71200IMG_8658.JPG', 'Beneficiario Externo', '2019-05-27', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 8000, 'transporte', '2019-05-28 08:37:51', 1, 1, 1),
(406, 'images/egresoscaja/91435IMG_8659.JPG', 'Beneficiario Externo', '2019-05-25', 47, 0, 0, 'cerrajer?a Yale', 4, 17, 18500, 'duplicado de llave', '2019-05-28 08:40:22', 1, 1, 1),
(407, 'images/egresoscaja/71607IMG_8660.JPG', 'Beneficiario Externo', '2019-05-27', 47, 0, 0, 'certicar sa', 3, 16, 302466, 'tecnicomecanica', '2019-05-28 08:44:27', 1, 1, 1),
(408, 'images/egresoscaja/61986IMG_8661.JPG', 'Beneficiario Externo', '2019-05-27', 47, 0, 0, 'H&amp;B logistica y eventos', 4, 17, 60000, 'alquiler de reflectores', '2019-05-28 08:45:50', 1, 1, 1),
(409, 'images/egresoscaja/70766IMG_8697.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'negocios e inversiones montesur S.A.S.', 5, 29, 31500, 'Compra', '2019-05-29 17:01:19', 1, 1, 1),
(410, 'images/egresoscaja/99269IMG_8698.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'centro mayorista papelero tauro S.A.S.', 4, 17, 4100, 'COMPRA', '2019-05-29 17:03:08', 1, 1, 1),
(411, 'images/egresoscaja/86280IMG_8699.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'Carlos Celis', 2, 7, 38400, 'peajes volqueta SQW 944', '2019-05-29 17:04:15', 1, 1, 1),
(412, 'images/egresoscaja/15814IMG_8700.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-05-29 17:09:28', 1, 1, 1),
(413, 'images/egresoscaja/60372IMG_8701.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-05-29 17:10:36', 1, 1, 1),
(414, 'images/egresoscaja/55333IMG_8703.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'Carlos Celis', 3, 12, 30000, 'montallantas', '2019-05-29 17:11:11', 1, 1, 1),
(415, 'images/egresoscaja/97302IMG_8704.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 10000, 'transporte', '2019-05-29 17:12:16', 1, 1, 1),
(416, 'images/egresoscaja/13511IMG_8721.JPG', 'Beneficiario Externo', '2019-05-30', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-05-30 15:43:59', 1, 1, 1),
(417, 'images/egresoscaja/12425IMG_8721.JPG', 'Beneficiario Externo', '2019-05-30', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-05-30 15:43:59', 1, 1, 1),
(418, 'images/egresoscaja/75270IMG_8722.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'paola de la ossa', 3, 9, 110000, 'pago de reflector', '2019-05-30 15:44:58', 1, 1, 1),
(419, 'images/egresoscaja/83969IMG_8724.JPG', 'Beneficiario Externo', '2019-05-30', 47, 0, 0, 'jose julian valdeblanques', 2, 7, 30000, 'comidas', '2019-05-30 15:46:03', 1, 1, 1),
(420, 'images/egresoscaja/64064IMG_8725.JPG', 'Beneficiario Externo', '2019-05-29', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 8000, 'entrega de reflectores', '2019-05-30 15:47:43', 1, 1, 1),
(422, 'images/egresoscaja/63243IMG_8749.JPG', 'Beneficiario Externo', '2019-05-30', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 6000, 'motos', '2019-05-31 10:22:05', 1, 1, 1),
(423, 'images/egresoscaja/97172IMG_8750.JPG', 'Beneficiario Externo', '2019-05-30', 47, 0, 0, 'jose julian valdeblanques', 2, 7, 40000, 'transporte monteria', '2019-05-31 10:22:59', 1, 1, 1),
(424, 'images/egresoscaja/16047IMG_8751.JPG', 'Beneficiario Externo', '2019-05-30', 47, 0, 0, 'Natalia Hern?ndez', 2, 5, 10000, 'recarga minutos todo destino', '2019-05-31 10:23:55', 1, 1, 1),
(425, 'images/egresoscaja/82073IMG_8769.JPG', 'Beneficiario Externo', '2019-05-31', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-06-01 09:04:25', 1, 1, 1),
(426, 'images/egresoscaja/41814IMG_8770.JPG', 'Beneficiario Externo', '2019-05-31', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 10000, 'vueltas luzmila zuleta', '2019-06-01 09:05:19', 1, 1, 1),
(427, 'images/egresoscaja/78224IMG_8771.JPG', 'Beneficiario Externo', '2019-05-31', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 6000, 'transporte transito', '2019-06-01 09:06:03', 1, 1, 1),
(428, 'images/egresoscaja/87327IMG_8772.JPG', 'Beneficiario Externo', '2019-05-31', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 15000, 'transportes para sacar la camioneta de los parqueaderos', '2019-06-01 09:06:40', 1, 1, 1),
(429, 'images/egresoscaja/57587IMG_8774.JPG', 'Beneficiario Externo', '2019-06-01', 47, 0, 0, 'negocios e inversiones montesur S.A.S.', 5, 30, 59700, 'compra de herramientas', '2019-06-01 09:07:49', 1, 1, 1),
(430, 'images/egresoscaja/94957IMG_8775.JPG', 'Beneficiario Externo', '2019-06-01', 47, 0, 0, 'negocios e inversiones montesur S.A.S.', 5, 30, 38500, 'compra de materiales', '2019-06-01 09:09:19', 1, 1, 1),
(431, 'images/egresoscaja/9443IMG_8776.JPG', 'Beneficiario Externo', '2019-05-31', 5, 0, 0, 'giovani contreras', 3, 16, 670000, 'tramites para sacra la camioneta de los patios', '2019-06-01 09:21:31', 1, 1, 1),
(432, 'images/egresoscaja/92724IMG_8877.JPG', 'Beneficiario Externo', '2019-06-06', 47, 0, 0, 'ferreter?a laminas y metales S.A.S.', 5, 31, 120000, 'TRANSPORTE', '2019-06-07 11:38:54', 1, 1, 1),
(433, 'images/egresoscaja/20113IMG_8878.JPG', 'Beneficiario Externo', '2019-06-04', 47, 0, 0, 'olimpica s.a.', 5, 30, 19900, 'compra', '2019-06-07 11:41:05', 1, 1, 1),
(434, 'images/egresoscaja/735IMG_8879.JPG', 'Beneficiario Externo', '2019-06-06', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 10000, 'transporte', '2019-06-07 11:42:10', 1, 1, 1),
(435, 'images/egresoscaja/80906IMG_8880.JPG', 'Beneficiario Externo', '2019-06-06', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 20000, 'transporte', '2019-06-07 11:42:55', 1, 1, 1),
(436, 'images/egresoscaja/39349IMG_8881.JPG', 'Beneficiario Externo', '2019-06-05', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-06-07 11:44:07', 1, 1, 1),
(437, 'images/egresoscaja/11290IMG_8882.JPG', 'Beneficiario Externo', '2019-06-01', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 12000, 'transportes', '2019-06-07 11:44:54', 1, 1, 1),
(438, 'images/egresoscaja/51664IMG_8883.JPG', 'Beneficiario Externo', '2019-06-01', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-06-07 11:46:09', 1, 1, 1),
(439, 'images/egresoscaja/14795IMG_8884.JPG', 'Beneficiario Externo', '2019-06-07', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 18000, 'transporte', '2019-06-07 11:47:14', 1, 1, 1),
(440, 'images/egresoscaja/3601IMG_8893.JPG', 'Beneficiario Externo', '2019-06-07', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 14000, 'transporte', '2019-06-07 17:56:31', 1, 1, 1),
(441, 'images/egresoscaja/69816IMG_8894.JPG', 'Beneficiario Externo', '2019-06-07', 47, 0, 0, 'torfer mde', 5, 30, 568000, 'compra de herramientas', '2019-06-07 17:57:09', 1, 1, 1),
(442, 'images/egresoscaja/50227IMG_8954.JPG', 'Beneficiario Externo', '2019-05-18', 46, 0, 0, 'variedades y tecnologia shaday', 4, 17, 1200, 'impresiones', '2019-06-10 09:01:48', 1, 1, 1),
(443, 'images/egresoscaja/50808IMG_8955.JPG', 'Beneficiario Externo', '2019-05-21', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-10 09:03:04', 1, 1, 1),
(444, 'images/egresoscaja/71811IMG_8956.JPG', 'Beneficiario Externo', '2019-05-21', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-10 09:03:49', 1, 1, 1),
(445, 'images/egresoscaja/58468IMG_8957.JPG', 'Beneficiario Externo', '2019-05-21', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-10 09:04:40', 1, 1, 1),
(446, 'images/egresoscaja/83562IMG_8958.JPG', 'Beneficiario Externo', '2019-05-21', 46, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-10 09:05:41', 1, 1, 1),
(447, 'images/egresoscaja/58122IMG_8959.JPG', 'Beneficiario Externo', '2019-05-21', 46, 0, 0, 'eds miramar', 3, 10, 20000, 'combustible', '2019-06-10 09:06:27', 1, 1, 1),
(448, 'images/egresoscaja/14525IMG_8960.JPG', 'Beneficiario Externo', '2019-05-21', 46, 0, 0, 'taller de mantenimiento y servicios para automotores', 3, 12, 550000, 'mantenimiento TTN 976', '2019-06-10 09:07:58', 1, 1, 1),
(449, 'images/egresoscaja/48083IMG_8961.JPG', 'Beneficiario Externo', '2019-05-21', 46, 0, 0, 'almacen tractocamiones', 3, 12, 1749998, 'mantenimiento y repuestos TTN 976', '2019-06-10 09:09:30', 1, 1, 1),
(450, 'images/egresoscaja/81690IMG_8962.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'eds terpel', 3, 11, 40000, 'hospedaje operador', '2019-06-10 09:11:20', 1, 1, 1),
(451, 'images/egresoscaja/85577IMG_8963.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'eds terpel', 3, 10, 100000, 'cama baja', '2019-06-10 09:12:12', 1, 1, 1),
(452, 'images/egresoscaja/78763IMG_8964.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'ender camacho', 4, 17, 30800, '4x1000', '2019-06-10 09:20:17', 1, 1, 1),
(453, 'images/egresoscaja/71484IMG_8965.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'ender camacho', 2, 7, 7000, 'compra de almuerzo', '2019-06-10 09:21:45', 1, 1, 1),
(454, 'images/egresoscaja/64831IMG_8966.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'cristian suarez', 2, 7, 10000, 'transporte', '2019-06-10 09:22:38', 1, 1, 1),
(455, 'images/egresoscaja/40557IMG_8967.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'hernando escobar', 2, 7, 10000, 'transporte', '2019-06-10 09:23:35', 1, 1, 1),
(456, 'images/egresoscaja/49458IMG_8968.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'peaje la esperanza', 2, 7, 19200, 'peaje', '2019-06-10 09:24:21', 1, 1, 1),
(457, 'images/egresoscaja/52788IMG_8969.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'abacoa', 3, 11, 30000, 'hospedaje operador', '2019-06-10 09:24:59', 1, 1, 1),
(458, 'images/egresoscaja/85675IMG_8970.JPG', 'Beneficiario Externo', '2019-05-22', 46, 0, 0, 'C.C. CARIBE S.A.S.', 3, 10, 30000, 'combustible', '2019-06-10 09:25:50', 1, 1, 1),
(459, 'images/egresoscaja/15142IMG_8971.JPG', 'Beneficiario Externo', '2019-05-23', 46, 0, 0, 'habitacion familiar', 3, 11, 15000, 'hospedaje operador grua', '2019-06-10 09:26:34', 1, 1, 1),
(460, 'images/egresoscaja/42353IMG_8965.JPG', 'Beneficiario Externo', '2019-05-23', 46, 0, 0, 'ender camacho', 4, 17, 75000, 'compra', '2019-06-10 09:28:05', 1, 1, 1),
(461, 'images/egresoscaja/27675IMG_8973.JPG', 'Beneficiario Externo', '2019-05-23', 46, 0, 0, 'adrian hernandez', 3, 12, 8000, 'compra', '2019-06-10 09:28:56', 1, 1, 1),
(462, 'images/egresoscaja/41137IMG_8974.JPG', 'Beneficiario Externo', '2019-05-23', 46, 0, 0, 'ender camacho', 2, 7, 105000, 'almuerzos', '2019-06-10 09:30:46', 1, 1, 1),
(463, 'images/egresoscaja/44371IMG_8975.JPG', 'Beneficiario Externo', '2019-05-24', 46, 0, 0, 'constructora global del la costa sas', 3, 9, 10000, 'alquiler de tableros', '2019-06-10 09:31:31', 1, 1, 1),
(464, 'images/egresoscaja/18578IMG_8976.JPG', 'Beneficiario Externo', '2019-05-24', 46, 0, 0, 'omar olivera', 2, 0, 30000, 'viaticos', '2019-06-10 09:32:57', 1, 1, 1),
(465, 'images/egresoscaja/79792IMG_8977.JPG', 'Beneficiario Externo', '2019-05-24', 46, 0, 0, 'elkin garces', 3, 14, 10000, 'acarreo tableros', '2019-06-10 09:34:46', 1, 1, 1),
(466, 'images/egresoscaja/99160IMG_8978.JPG', 'Beneficiario Externo', '2019-05-25', 46, 0, 0, 'super tienda el centavo menos', 2, 7, 4000, 'compra', '2019-06-10 09:35:47', 1, 1, 1),
(467, 'images/egresoscaja/9809IMG_8979.JPG', 'Beneficiario Externo', '2019-05-25', 46, 0, 0, 'habitacion familiar', 3, 11, 45000, 'hospedaje operador', '2019-06-10 09:37:20', 1, 1, 1),
(468, 'images/egresoscaja/20703IMG_8980.JPG', 'Beneficiario Externo', '2019-05-25', 46, 0, 0, 'elkin garces', 3, 14, 10000, 'acacarreo', '2019-06-10 09:38:03', 1, 1, 1),
(469, 'images/egresoscaja/5996IMG_8981.JPG', 'Beneficiario Externo', '2019-05-25', 46, 0, 0, 'jairo gomez', 4, 21, 150000, 'adelanto nomina', '2019-06-10 09:39:21', 1, 1, 1),
(470, 'images/egresoscaja/63251IMG_8982.JPG', 'Beneficiario Externo', '2019-05-25', 46, 0, 0, 'luis espa?a', 4, 21, 50000, 'adelanto nomina', '2019-06-10 09:40:37', 1, 1, 1),
(471, 'images/egresoscaja/35415IMG_8984.JPG', 'Beneficiario Externo', '2019-05-25', 46, 0, 0, 'alex quiroz', 4, 21, 50000, 'adelanto nomina', '2019-06-10 09:41:56', 1, 1, 1),
(472, 'images/egresoscaja/70808IMG_8984.JPG', 'Beneficiario Externo', '2019-05-25', 46, 0, 0, 'carlos fuentes', 5, 29, 180000, 'arena', '2019-06-10 09:43:05', 1, 1, 1),
(473, 'images/egresoscaja/66674IMG_8985.JPG', 'Beneficiario Externo', '2019-05-25', 46, 0, 0, 'C.C. CARIBE S.A.S.', 3, 10, 20000, 'combustible', '2019-06-10 09:45:18', 1, 1, 1),
(474, 'images/egresoscaja/39515IMG_9034.JPG', 'Beneficiario Externo', '2019-06-11', 47, 0, 0, 'electricaribe', 4, 17, 264730, 'pago de recibo de expedientes', '2019-06-12 10:28:04', 1, 1, 1),
(475, 'images/egresoscaja/36649IMG_9038.JPG', 'Beneficiario Externo', '2019-06-10', 47, 0, 0, 'pombo parilla', 2, 7, 15400, 'comida', '2019-06-12 10:29:06', 1, 1, 1),
(476, 'images/egresoscaja/67705IMG_9039.JPG', 'Beneficiario Externo', '2019-06-11', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-06-12 10:29:57', 1, 1, 1),
(477, 'images/egresoscaja/97350IMG_9040.JPG', 'Beneficiario Externo', '2019-06-11', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 8000, 'transporte', '2019-06-12 10:30:46', 1, 1, 1),
(478, 'images/egresoscaja/17183WhatsApp Image 2019-05-27 at 9.14.13 AM.jpeg', 'Beneficiario Externo', '2019-05-18', 47, 0, 0, 'llanteria el mo?al', 3, 12, 80000, 'repuestos', '2019-06-12 10:31:43', 1, 1, 1),
(479, 'images/egresoscaja/66385IMG_9046.JPG', 'Beneficiario Externo', '2019-05-24', 5, 0, 0, 'Gildardo benjumea tama', 4, 19, 62000, 'compra', '2019-06-13 08:37:42', 1, 1, 1),
(480, 'images/egresoscaja/92166IMG_9047.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 08:42:51', 1, 1, 1),
(481, 'images/egresoscaja/42836IMG_9048.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 08:45:38', 1, 1, 1),
(482, 'images/egresoscaja/71409IMG_9049.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8300, 'peaje', '2019-06-13 08:46:50', 1, 1, 1),
(483, 'images/egresoscaja/36522IMG_9050.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'peaje sabanagrande', 2, 7, 8500, 'peaje', '2019-06-13 08:48:02', 1, 1, 1),
(484, 'images/egresoscaja/39391IMG_9051.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 08:48:59', 1, 1, 1),
(485, 'images/egresoscaja/63677IMG_9052.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 08:50:08', 1, 1, 1),
(486, 'images/egresoscaja/97912IMG_9053.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'peaje gambote', 2, 7, 8000, 'transporte', '2019-06-13 08:51:15', 1, 1, 1),
(487, 'images/egresoscaja/84435IMG_9054.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'masser sas', 4, 19, 9200, 'compra', '2019-06-13 08:57:16', 1, 1, 1),
(488, 'images/egresoscaja/51919IMG_9055.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'gne soluciones sas', 3, 10, 100000, 'combustible', '2019-06-13 08:58:45', 1, 1, 1),
(489, 'images/egresoscaja/11227IMG_9056.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 08:59:43', 1, 1, 1),
(490, 'images/egresoscaja/1173IMG_9057.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'peaje turbaco', 2, 7, 3100, 'peaje', '2019-06-13 09:00:29', 1, 1, 1),
(491, 'images/egresoscaja/50401IMG_9058.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 09:01:23', 1, 1, 1),
(492, 'images/egresoscaja/93808IMG_9059.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 09:02:04', 1, 1, 1),
(493, 'images/egresoscaja/39668IMG_9060.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 09:02:39', 1, 1, 1),
(494, 'images/egresoscaja/88883IMG_9061.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 09:09:35', 1, 1, 1),
(495, 'images/egresoscaja/28537IMG_9062.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 09:10:39', 1, 1, 1),
(496, 'images/egresoscaja/84674IMG_9063.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 09:12:23', 1, 1, 1),
(497, 'images/egresoscaja/55589IMG_9064.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'peaje turbaco', 2, 7, 3100, 'peaje', '2019-06-13 09:14:31', 1, 1, 1),
(498, 'images/egresoscaja/57442IMG_9065.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 09:26:34', 1, 1, 1),
(499, 'images/egresoscaja/17221IMG_9066.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 09:27:52', 1, 1, 1),
(500, 'images/egresoscaja/10418IMG_9067.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'peaje gambote', 2, 7, 8000, 'peaje', '2019-06-13 09:31:47', 1, 1, 1),
(501, 'images/egresoscaja/74722IMG_9068.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 09:45:57', 1, 1, 1),
(502, 'images/egresoscaja/62165IMG_9069.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 09:51:58', 1, 1, 1),
(503, 'images/egresoscaja/53841IMG_9070.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje pte plato', 2, 7, 9200, 'peaje', '2019-06-13 09:53:02', 1, 1, 1),
(504, 'images/egresoscaja/74820IMG_9071.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje el dificil', 2, 7, 9200, 'peaje', '2019-06-13 09:53:51', 1, 1, 1),
(505, 'images/egresoscaja/8853IMG_9072.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:00:34', 1, 1, 1),
(506, 'images/egresoscaja/99918IMG_9073.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje valencia', 2, 7, 8100, 'peaje', '2019-06-13 10:01:58', 1, 1, 1),
(507, 'images/egresoscaja/13797IMG_9074.JPG', 'Beneficiario Externo', '2019-05-25', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 10:03:03', 1, 1, 1),
(508, 'images/egresoscaja/51141IMG_9075.JPG', 'Beneficiario Externo', '2019-05-25', 5, 0, 0, 'distracom', 3, 10, 100000, 'combustible', '2019-06-13 10:03:44', 1, 1, 1),
(509, 'images/egresoscaja/541IMG_9076.JPG', 'Beneficiario Externo', '2019-05-25', 5, 0, 0, 'peaje el dificil', 2, 7, 9200, 'peaje', '2019-06-13 10:04:32', 1, 1, 1),
(510, 'images/egresoscaja/68884IMG_9077.JPG', 'Beneficiario Externo', '2019-05-25', 5, 0, 0, 'peaje pte plato', 2, 7, 9200, 'peaje', '2019-06-13 10:05:29', 1, 1, 1),
(511, 'images/egresoscaja/65518IMG_9078.JPG', 'Beneficiario Externo', '2019-05-24', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:07:19', 1, 1, 1),
(512, 'images/egresoscaja/3689IMG_9079.JPG', 'Beneficiario Externo', '2019-06-05', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:08:19', 1, 1, 1),
(513, 'images/egresoscaja/64106IMG_9080.JPG', 'Beneficiario Externo', '2019-05-23', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:08:55', 1, 1, 1),
(514, 'images/egresoscaja/73714IMG_9081.JPG', 'Beneficiario Externo', '2019-05-23', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:09:39', 1, 1, 1),
(515, 'images/egresoscaja/40804IMG_9082.JPG', 'Beneficiario Externo', '2019-05-22', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:12:53', 1, 1, 1),
(516, 'images/egresoscaja/99266IMG_9083.JPG', 'Beneficiario Externo', '2019-05-25', 5, 0, 0, 'peaje valencia', 2, 7, 8100, 'peaje', '2019-06-13 10:14:18', 1, 1, 1),
(517, 'images/egresoscaja/83611IMG_9084.JPG', 'Beneficiario Externo', '2019-05-24', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:15:06', 1, 1, 1),
(518, 'images/egresoscaja/36742IMG_9085.JPG', 'Beneficiario Externo', '2019-05-22', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:16:41', 1, 1, 1),
(519, 'images/egresoscaja/74174IMG_9086.JPG', 'Beneficiario Externo', '2019-05-24', 47, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:17:31', 1, 1, 1),
(520, 'images/egresoscaja/96019IMG_9087.JPG', 'Beneficiario Externo', '2019-05-23', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:18:38', 1, 1, 1),
(521, 'images/egresoscaja/7667IMG_9088.JPG', 'Beneficiario Externo', '2019-05-23', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:20:09', 1, 1, 1),
(522, 'images/egresoscaja/5014IMG_9089.JPG', 'Beneficiario Externo', '2019-05-23', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'PEAJE', '2019-06-13 10:20:49', 1, 1, 1),
(523, 'images/egresoscaja/8961IMG_9090.JPG', 'Beneficiario Externo', '2019-06-05', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:21:46', 1, 1, 1),
(524, 'images/egresoscaja/7745IMG_9091.JPG', 'Beneficiario Externo', '2019-05-23', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:25:52', 1, 1, 1),
(525, 'images/egresoscaja/88858IMG_9092.JPG', 'Beneficiario Externo', '2019-05-23', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:27:07', 1, 1, 1),
(526, 'images/egresoscaja/2243IMG_9093.JPG', 'Beneficiario Externo', '2019-05-23', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:39:38', 1, 1, 1),
(527, 'images/egresoscaja/27395IMG_9094.JPG', 'Beneficiario Externo', '2019-05-24', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:41:26', 1, 1, 1),
(528, 'images/egresoscaja/97139IMG_9095.JPG', 'Beneficiario Externo', '2019-05-25', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:43:34', 1, 1, 1),
(529, 'images/egresoscaja/97241IMG_9096.JPG', 'Beneficiario Externo', '2019-05-29', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:44:34', 1, 1, 1),
(530, 'images/egresoscaja/97574IMG_9097.JPG', 'Beneficiario Externo', '2019-05-29', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 10:45:15', 1, 1, 1),
(531, 'images/egresoscaja/55119IMG_9098.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:45:58', 1, 1, 1),
(532, 'images/egresoscaja/46396IMG_9099.JPG', 'Beneficiario Externo', '2019-05-29', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 10:46:35', 1, 1, 1),
(533, 'images/egresoscaja/263IMG_9100.JPG', 'Beneficiario Externo', '2019-05-24', 5, 0, 0, 'la cajita', 4, 19, 78100, 'comida', '2019-06-13 10:47:10', 1, 1, 1),
(534, 'images/egresoscaja/44549IMG_9101.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'la cajita', 4, 19, 38000, 'comida', '2019-06-13 10:48:20', 1, 1, 1),
(535, 'images/egresoscaja/2793IMG_9102.JPG', 'Beneficiario Externo', '2019-05-29', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 11:21:44', 1, 1, 1),
(536, 'images/egresoscaja/47994IMG_9103.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 11:23:06', 1, 1, 1),
(537, 'images/egresoscaja/40238IMG_9104.JPG', 'Beneficiario Externo', '2019-05-30', 5, 0, 0, 'peaje garzones 1', 2, 7, 4500, 'peaje', '2019-06-13 11:23:45', 1, 1, 1),
(538, 'images/egresoscaja/73420IMG_9105.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 11:24:59', 1, 1, 1),
(539, 'images/egresoscaja/5890IMG_9106.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 11:25:57', 1, 1, 1),
(540, 'images/egresoscaja/823IMG_9106.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 11:26:45', 1, 1, 1),
(541, 'images/egresoscaja/46385IMG_9108.JPG', 'Beneficiario Externo', '2019-06-08', 5, 0, 0, 'peaje puerto colombia', 2, 7, 11300, 'peaje', '2019-06-13 11:27:22', 1, 1, 1),
(542, 'images/egresoscaja/41354IMG_9109.JPG', 'Beneficiario Externo', '2019-06-09', 5, 0, 0, 'inversiones combgas sas', 3, 10, 100000, 'combustible', '2019-06-13 11:29:03', 1, 1, 1),
(543, 'images/egresoscaja/61696IMG_9110.JPG', 'Beneficiario Externo', '2019-05-09', 5, 0, 0, 'peaje puerto colombia', 2, 7, 11300, 'peaje', '2019-06-13 11:31:10', 1, 1, 1),
(544, 'images/egresoscaja/41633IMG_9111.JPG', 'Beneficiario Externo', '2019-06-09', 5, 0, 0, 'peaje marahuaco', 2, 7, 11300, 'peaje', '2019-06-13 11:33:35', 1, 1, 1),
(545, 'images/egresoscaja/37419IMG_9112.JPG', 'Beneficiario Externo', '2019-06-08', 5, 0, 0, 'peaje zona franca', 2, 7, 7400, 'peaje', '2019-06-13 11:38:08', 1, 1, 1),
(546, 'images/egresoscaja/37232IMG_9113.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8300, 'peaje', '2019-06-13 11:39:30', 1, 1, 1),
(547, 'images/egresoscaja/81433IMG_9114.JPG', 'Beneficiario Externo', '2019-06-09', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 11:40:23', 1, 1, 1),
(548, 'images/egresoscaja/93638IMG_9115.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 11:41:29', 1, 1, 1),
(549, 'images/egresoscaja/97126IMG_9116.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 11:42:22', 1, 1, 1),
(550, 'images/egresoscaja/19369IMG_9117.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 11:43:14', 1, 1, 1),
(551, 'images/egresoscaja/20934IMG_9118.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'peaje sabanagrande', 2, 7, 8500, 'peaje', '2019-06-13 11:44:12', 1, 1, 1),
(552, 'images/egresoscaja/1315IMG_9120.JPG', 'Beneficiario Externo', '2019-06-09', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 11:45:06', 1, 1, 1),
(553, 'images/egresoscaja/66065IMG_9121.JPG', 'Beneficiario Externo', '2019-05-28', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 11:55:50', 1, 1, 1),
(554, 'images/egresoscaja/88455IMG_9122.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 11:56:56', 1, 1, 1),
(555, 'images/egresoscaja/91568IMG_9123.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 11:57:37', 1, 1, 1),
(556, 'images/egresoscaja/61674IMG_9124.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'peaje flores', 2, 7, 4500, 'peaje', '2019-06-13 11:58:21', 1, 1, 1),
(557, 'images/egresoscaja/63347IMG_9125.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 11:59:00', 1, 1, 1),
(558, 'images/egresoscaja/76728IMG_9126.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 12:00:07', 1, 1, 1),
(559, 'images/egresoscaja/9611IMG_9127.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 12:01:51', 1, 1, 1),
(560, 'images/egresoscaja/19596IMG_9128.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 12:02:36', 1, 1, 1),
(561, 'images/egresoscaja/7183IMG_9129.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 12:03:19', 1, 1, 1),
(562, 'images/egresoscaja/98309IMG_9130.JPG', 'Beneficiario Externo', '2019-06-06', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 12:07:57', 1, 1, 1),
(563, 'images/egresoscaja/7797IMG_9131.JPG', 'Beneficiario Externo', '2019-06-06', 5, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-13 12:09:52', 1, 1, 1),
(564, 'images/egresoscaja/38947IMG_9132.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'peaje zona franca', 2, 7, 7400, 'peaje', '2019-06-13 13:04:19', 1, 1, 1),
(565, 'images/egresoscaja/51464IMG_9133.JPG', 'Beneficiario Externo', '2019-06-08', 5, 0, 0, 'peaje marahuaco', 2, 7, 11300, 'peaje', '2019-06-13 13:08:04', 1, 1, 1),
(566, 'images/egresoscaja/5856IMG_9134.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'peaje sabanagrande', 2, 7, 8500, 'peaje', '2019-06-13 13:18:01', 1, 1, 1),
(567, 'images/egresoscaja/91682IMG_9135.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'peaje sabanagrande', 2, 7, 8500, 'peaje', '2019-06-13 13:18:50', 1, 1, 1),
(568, 'images/egresoscaja/65427IMG_9136.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8300, 'peaje', '2019-06-13 13:19:42', 1, 1, 1),
(569, 'images/egresoscaja/37216IMG_9137.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 13:20:37', 1, 1, 1),
(570, 'images/egresoscaja/3238IMG_9138.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 13:21:22', 1, 1, 1),
(571, 'images/egresoscaja/80496IMG_9139.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'sociedad concesionaria vial montes de marias sas', 2, 7, 8800, 'peaje', '2019-06-13 13:21:58', 1, 1, 1),
(572, 'images/egresoscaja/96393IMG_9140.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 13:22:43', 1, 1, 1),
(573, 'images/egresoscaja/53928IMG_9141.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 13:23:40', 1, 1, 1),
(574, 'images/egresoscaja/5596IMG_9142.JPG', 'Beneficiario Externo', '2019-06-08', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 13:24:40', 1, 1, 1),
(575, 'images/egresoscaja/828IMG_9143.JPG', 'Beneficiario Externo', '2019-06-09', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 13:25:37', 1, 1, 1),
(576, 'images/egresoscaja/76286IMG_9144.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 13:26:58', 1, 1, 1),
(577, 'images/egresoscaja/94294IMG_9145.JPG', 'Beneficiario Externo', '2019-06-07', 5, 0, 0, 'ruta del sol II s.a.', 2, 7, 11400, 'peaje', '2019-06-13 13:27:30', 1, 1, 1),
(578, 'images/egresoscaja/66780IMG_9146.JPG', 'Beneficiario Externo', '2019-06-03', 5, 0, 0, 'kokoriko', 4, 19, 113800, 'compra', '2019-06-13 13:28:07', 1, 1, 1),
(579, 'images/egresoscaja/10557IMG_9147.JPG', 'Beneficiario Externo', '2019-06-03', 5, 0, 0, 'inversisa sas', 4, 19, 3200, 'compra', '2019-06-13 13:29:15', 1, 1, 1),
(580, 'images/egresoscaja/83358IMG_9148.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'la cajita', 4, 19, 167200, 'comida', '2019-06-13 13:37:04', 1, 1, 1),
(581, 'images/egresoscaja/25934IMG_9149.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'la cajita', 4, 19, 128500, 'comida', '2019-06-13 13:38:09', 1, 1, 1),
(582, 'images/egresoscaja/43674IMG_9150.JPG', 'Beneficiario Externo', '2019-05-29', 5, 0, 0, 'sapia ci sas', 4, 19, 6975, 'compra', '2019-06-13 13:38:57', 1, 1, 1),
(583, 'images/egresoscaja/7270IMG_9151.JPG', 'Beneficiario Externo', '2019-05-30', 5, 0, 0, 'air plan sas', 2, 7, 33000, 'parqueadero', '2019-06-13 13:39:56', 1, 1, 1),
(584, 'images/egresoscaja/88688IMG_9152.JPG', 'Beneficiario Externo', '2019-05-09', 5, 0, 0, 'retail inmotion', 4, 19, 10000, 'compra', '2019-06-13 13:41:21', 1, 1, 1),
(585, 'images/egresoscaja/60016IMG_9153.JPG', 'Beneficiario Externo', '2019-06-04', 5, 0, 0, 'eds rodarero liquidos', 3, 10, 100000, 'combustible', '2019-06-13 13:42:42', 1, 1, 1),
(586, 'images/egresoscaja/17323IMG_9155.JPG', 'Beneficiario Externo', '2019-05-27', 5, 0, 0, 'el tropezon eds', 3, 10, 100000, 'combustible', '2019-06-13 13:43:47', 1, 1, 1),
(587, 'images/egresoscaja/43962IMG_9156.JPG', 'Beneficiario Externo', '2019-06-01', 5, 0, 0, 'taller de mantenimiento y servicios para automotores', 3, 13, 300000, 'desmonte, empacada y montaje cilindro', '2019-06-13 13:45:10', 1, 1, 1),
(588, 'images/egresoscaja/14951IMG_9154.JPG', 'Beneficiario Externo', '2019-06-08', 5, 0, 0, 'la pepita bocagrande', 4, 19, 227806, 'comida', '2019-06-13 13:46:52', 1, 1, 1),
(589, 'images/egresoscaja/10315IMG_9160.JPG', 'Beneficiario Externo', '2019-06-13', 47, 0, 0, 'cyme sas', 5, 28, 120000, 'compra de arnes', '2019-06-13 13:54:26', 1, 1, 1),
(590, 'images/egresoscaja/97600IMG_9161.JPG', 'Beneficiario Externo', '2019-06-13', 47, 0, 0, 'cyme sas', 5, 28, 100000, 'eslinga', '2019-06-13 13:56:22', 1, 1, 1),
(591, 'images/egresoscaja/75474IMG_9162.JPG', 'Beneficiario Externo', '2019-06-12', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 8000, 'transporte', '2019-06-13 13:57:06', 1, 1, 1),
(592, 'images/egresoscaja/33410IMG_9163.JPG', 'Beneficiario Externo', '2019-06-12', 47, 0, 0, 'walter calle', 5, 31, 38400, 'peajes transporte de material', '2019-06-13 13:58:00', 1, 1, 1),
(593, 'images/egresoscaja/17197IMG_9164.JPG', 'Beneficiario Externo', '2019-06-13', 47, 0, 0, 'benicio mercado', 5, 31, 90000, 'transporte de material hasta la cantera', '2019-06-13 13:59:01', 1, 1, 1),
(594, 'images/egresoscaja/34856IMG_9165.JPG', 'Beneficiario Externo', '2019-06-13', 5, 0, 0, 'Natalia Hern?ndez', 2, 7, 18000, 'transporte', '2019-06-13 13:59:49', 1, 1, 1),
(595, 'images/egresoscaja/28947peajes abril.JPG', 'Beneficiario Externo', '2019-04-30', 50, 0, 0, 'peajes varios', 2, 7, 76600, 'peajes mes de abril', '2019-06-14 16:52:18', 1, 1, 1),
(596, 'images/egresoscaja/53138peajes mayo.JPG', 'Beneficiario Externo', '2019-05-30', 50, 0, 0, 'peajes varios', 2, 7, 121500, 'peajes mes de mayo', '2019-06-14 16:53:31', 1, 1, 1),
(597, 'images/egresoscaja/46219peajes junio.JPG', 'Beneficiario Externo', '2019-06-10', 50, 0, 0, 'peajes varios', 2, 7, 257300, 'peajes hasta 10 de junio', '2019-06-14 16:54:26', 1, 1, 1),
(598, 'images/egresoscaja/25623IMG_9187.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 6000, 'taxi dielectricos', '2019-06-14 17:07:26', 1, 1, 1),
(599, 'images/egresoscaja/71882IMG_9188.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'Natalia Hern?ndez', 2, 5, 10000, 'recarga de minutos', '2019-06-14 17:08:11', 1, 1, 1),
(600, 'images/egresoscaja/3282IMG_9189.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'super avenas del tolima', 2, 7, 6500, 'desayuno jose julian', '2019-06-14 17:08:56', 1, 1, 1),
(601, 'images/egresoscaja/82973IMG_9190.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-14 17:09:53', 1, 1, 1),
(602, 'images/egresoscaja/26756IMG_9191.JPG', 'Beneficiario Externo', '2019-06-14', 47, 6, 6, 'peaje la esperanza', 2, 7, 8200, 'peaje', '2019-06-14 17:10:41', 1, 1, 1),
(603, 'images/egresoscaja/99158IMG_9194.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'papeleria el cid', 4, 17, 53800, 'compra de papeleria', '2019-06-14 17:11:17', 1, 1, 1),
(604, 'images/egresoscaja/64715IMG_9202.JPG', 'Beneficiario Externo', '2019-06-01', 50, 0, 0, 'gases y combustibles del caribe', 3, 10, 98010, 'combustible', '2019-06-15 09:37:37', 1, 1, 1),
(605, 'images/egresoscaja/38451IMG_9203.JPG', 'Beneficiario Externo', '2019-05-20', 50, 0, 0, 'julio navarro', 4, 21, 700000, 'adelanto de nomina', '2019-06-15 09:38:36', 1, 1, 1),
(606, 'images/egresoscaja/74185IMG_9204.JPG', 'Beneficiario Externo', '2019-06-01', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 12, 40000, 'mantenimiento de minicargador', '2019-06-15 09:39:18', 1, 1, 1),
(607, 'images/egresoscaja/15915IMG_9205.JPG', 'Beneficiario Externo', '2019-05-17', 50, 0, 0, 'ag taller y ferreteria', 3, 12, 15000, 'mantenimiento carro', '2019-06-15 09:40:16', 1, 1, 1),
(608, 'images/egresoscaja/7623IMG_9206.JPG', 'Beneficiario Externo', '2019-05-17', 50, 0, 0, 'taller el mirador', 3, 12, 2000000, 'mantenimiento, repuestos y pintura', '2019-06-15 09:41:13', 1, 1, 1),
(609, 'images/egresoscaja/5912IMG_9207.JPG', 'Beneficiario Externo', '2019-05-06', 50, 0, 0, 'almacen y taller el ?ero', 3, 12, 27000, 'repuestos', '2019-06-15 09:42:44', 1, 1, 1),
(610, 'images/egresoscaja/16660IMG_9208.JPG', 'Beneficiario Externo', '2019-05-18', 50, 0, 0, 'blanca ospina cadavid', 4, 17, 4800, 'internet e impresiones', '2019-06-15 09:43:50', 1, 1, 1),
(611, 'images/egresoscaja/36163IMG_9209.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'Astesmec', 3, 12, 20000, 'cambio de filtro de acpm', '2019-06-15 09:45:58', 1, 1, 1),
(612, 'images/egresoscaja/84895IMG_9210.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'ferrerepuestos t&amp;t', 3, 12, 5000, 'compra de bombillo', '2019-06-15 09:47:11', 1, 1, 1),
(613, 'images/egresoscaja/48264IMG_9211.JPG', 'Beneficiario Externo', '2019-05-06', 50, 0, 0, 'multiservicios tecnologicos', 4, 17, 5200, 'escaner', '2019-06-15 09:48:09', 1, 1, 1),
(614, 'images/egresoscaja/72875IMG_9212.JPG', 'Beneficiario Externo', '2019-05-04', 50, 0, 0, 'taller el mirador', 3, 15, 60000, 'repuestos', '2019-06-15 09:49:05', 1, 1, 1);
INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(615, 'images/egresoscaja/8287IMG_9213.JPG', 'Beneficiario Externo', '2019-05-04', 50, 0, 0, 'almacen y taller el ?ero', 3, 15, 92000, 'repuestos', '2019-06-15 09:49:49', 1, 1, 1),
(616, 'images/egresoscaja/32950IMG_9214.JPG', 'Beneficiario Externo', '2019-05-03', 50, 0, 0, 'multiservicios tecnologicos', 4, 17, 25900, 'gastos varios', '2019-06-15 09:50:44', 1, 1, 1),
(617, 'images/egresoscaja/12078IMG_9215.JPG', 'Beneficiario Externo', '2019-05-03', 50, 0, 0, 'toyocentro', 3, 15, 38000, 'repuestos', '2019-06-15 09:51:42', 1, 1, 1),
(618, 'images/egresoscaja/92581IMG_9216.JPG', 'Beneficiario Externo', '2019-05-03', 50, 0, 0, 'toyocentro', 3, 15, 76000, 'repuestos', '2019-06-15 09:52:25', 1, 1, 1),
(619, 'images/egresoscaja/89766IMG_9217.JPG', 'Beneficiario Externo', '2019-05-03', 50, 0, 0, 'lubricantes do?a pili', 3, 12, 65000, 'filtros', '2019-06-15 09:53:13', 1, 1, 1),
(620, 'images/egresoscaja/45985IMG_9218.JPG', 'Beneficiario Externo', '2019-05-02', 50, 0, 0, 'lubricantes do?a pili', 3, 12, 99000, 'filtros', '2019-06-15 09:54:42', 1, 1, 1),
(621, 'images/egresoscaja/38840IMG_9219.JPG', 'Beneficiario Externo', '2019-04-24', 50, 0, 0, 'ferreteria el cruce', 3, 12, 7000, 'insumo', '2019-06-15 09:56:15', 1, 1, 1),
(622, 'images/egresoscaja/20503IMG_9220.JPG', 'Beneficiario Externo', '2019-04-23', 50, 0, 0, 'hotel dany', 3, 11, 40000, 'pago de hotel', '2019-06-15 09:57:27', 1, 1, 1),
(623, 'images/egresoscaja/77417IMG_9221.JPG', 'Beneficiario Externo', '2019-04-23', 50, 0, 0, 'comercial internacional de equipos y maquinas', 3, 15, 1680767, 'repuestos', '2019-06-15 09:58:19', 1, 1, 1),
(624, 'images/egresoscaja/99909IMG_9222.JPG', 'Beneficiario Externo', '2019-05-18', 50, 0, 0, 'carlos diaz', 2, 7, 6000, 'comida', '2019-06-15 10:20:56', 1, 1, 1),
(625, 'images/egresoscaja/55714IMG_9223.JPG', 'Beneficiario Externo', '2019-05-18', 50, 0, 0, 'carlos diaz', 3, 11, 5000, 'comida', '2019-06-15 10:22:28', 1, 1, 1),
(626, 'images/egresoscaja/86268IMG_9224.JPG', 'Beneficiario Externo', '2019-04-23', 50, 0, 0, 'la casa del chef', 3, 11, 20000, 'comida', '2019-06-15 10:23:14', 1, 1, 1),
(627, 'images/egresoscaja/20174IMG_9225.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'restaurante do?a pepa', 3, 11, 10000, 'comida', '2019-06-15 10:23:54', 1, 1, 1),
(628, 'images/egresoscaja/49902IMG_9226.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'restaurante do?a pepa', 3, 11, 12000, 'comida', '2019-06-15 10:24:32', 1, 1, 1),
(629, 'images/egresoscaja/96329IMG_9227.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'parador monte verde', 3, 11, 12000, 'comida', '2019-06-15 10:25:19', 1, 1, 1),
(630, 'images/egresoscaja/98426IMG_9228.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'parador monte verde', 3, 11, 14000, 'comida', '2019-06-15 10:26:17', 1, 1, 1),
(631, 'images/egresoscaja/66280IMG_9229.JPG', 'Beneficiario Externo', '2019-05-24', 50, 0, 0, 'gases y combustibles del caribe', 3, 10, 40000, 'combustible', '2019-06-15 10:26:56', 1, 1, 1),
(632, 'images/egresoscaja/72298IMG_9230.JPG', 'Beneficiario Externo', '2019-05-29', 50, 0, 0, 'elisbeth gonzalez', 3, 11, 300000, 'hospedaje', '2019-06-15 10:27:38', 1, 1, 1),
(633, 'images/egresoscaja/45081IMG_9231.JPG', 'Beneficiario Externo', '2019-05-31', 50, 0, 0, 'elisbeth gonzalez', 3, 11, 80000, 'hospedaje', '2019-06-15 10:28:30', 1, 1, 1),
(634, 'images/egresoscaja/42095IMG_9232.JPG', 'Beneficiario Externo', '2019-05-31', 50, 0, 0, 'elisbeth gonzalez', 3, 11, 80000, 'hospedaje', '2019-06-15 10:29:17', 1, 1, 1),
(635, 'images/egresoscaja/53089IMG_9233.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'parqueadero y hospedaje mine', 3, 11, 32000, 'hospedaje', '2019-06-15 10:30:00', 1, 1, 1),
(636, 'images/egresoscaja/86657IMG_9234.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'parqueadero y hospedaje mine', 3, 11, 32000, 'hospedaje', '2019-06-15 10:31:08', 1, 1, 1),
(637, 'images/egresoscaja/71060IMG_9235.JPG', 'Beneficiario Externo', '2019-05-18', 50, 0, 0, 'hotel dann karltons', 3, 11, 30000, 'hspedaje', '2019-06-15 10:31:42', 1, 1, 1),
(638, 'images/egresoscaja/59980IMG_9236.JPG', 'Beneficiario Externo', '2019-05-18', 50, 0, 0, 'hotel dann karltons', 3, 11, 30000, 'hospedaje', '2019-06-15 10:32:26', 1, 1, 1),
(639, 'images/egresoscaja/49482IMG_9237.JPG', 'Beneficiario Externo', '2019-04-30', 50, 0, 0, 'julio navarro', 3, 11, 50000, 'adelanto', '2019-06-15 10:33:08', 1, 1, 1),
(640, 'images/egresoscaja/71375IMG_9238.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'transansur sas', 3, 14, 70000, 'movilizaci?n de equipo', '2019-06-15 10:33:57', 1, 1, 1),
(641, 'images/egresoscaja/30866IMG_9239.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'transansur sas', 3, 14, 40000, 'movilizacion de equipo', '2019-06-15 10:35:20', 1, 1, 1),
(642, 'images/egresoscaja/56692IMG_9240.JPG', 'Beneficiario Externo', '2019-04-23', 50, 0, 0, 'eds palermo', 3, 10, 68870, 'combustible', '2019-06-15 10:36:51', 1, 1, 1),
(643, 'images/egresoscaja/39203IMG_9241.JPG', 'Beneficiario Externo', '2019-05-30', 50, 0, 0, 'gases y combustibles del caribe', 3, 10, 20000, 'combustible', '2019-06-15 10:37:55', 1, 1, 1),
(644, 'images/egresoscaja/53485IMG_9242.JPG', 'Beneficiario Externo', '2019-04-24', 50, 0, 0, 'asociacion de palmeros de san pablo', 3, 14, 40000, 'movilizacion de equipos', '2019-06-15 10:38:41', 1, 1, 1),
(645, 'images/egresoscaja/49635IMG_9243.JPG', 'Beneficiario Externo', '2019-04-19', 50, 0, 0, 'ceter', 3, 10, 250000, 'combustible', '2019-06-15 10:39:51', 1, 1, 1),
(646, 'images/egresoscaja/94668IMG_9244.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'eds alvarez sas', 3, 10, 240000, 'combustible', '2019-06-15 10:41:05', 1, 1, 1),
(647, 'images/egresoscaja/32668IMG_9245.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'ceter', 3, 10, 85000, 'combustible', '2019-06-15 10:41:59', 1, 1, 1),
(648, 'images/egresoscaja/76245IMG_9249.JPG', 'Beneficiario Externo', '2019-05-17', 50, 0, 0, 'eds el paraiso', 3, 10, 100000, 'combustible', '2019-06-15 10:42:41', 1, 1, 1),
(649, 'images/egresoscaja/32581IMG_9247.JPG', 'Beneficiario Externo', '2019-04-24', 50, 0, 0, 'eds ed juve', 3, 10, 55300, 'combustible', '2019-06-15 10:43:36', 1, 1, 1),
(650, 'images/egresoscaja/5014IMG_9248.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'eds alvarez sas', 3, 10, 50000, 'combustible', '2019-06-15 10:44:20', 1, 1, 1),
(651, 'images/egresoscaja/42252IMG_9249.JPG', 'Beneficiario Externo', '2019-05-17', 50, 0, 0, 'eds el paraiso', 3, 10, 80000, 'combustible', '2019-06-15 10:44:57', 1, 1, 1),
(652, 'images/egresoscaja/27805IMG_9250.JPG', 'Beneficiario Externo', '2019-05-03', 50, 0, 0, 'eds la floresta', 3, 10, 100000, 'combustible', '2019-06-15 10:45:39', 1, 1, 1),
(653, 'images/egresoscaja/81321IMG_9251.JPG', 'Beneficiario Externo', '2019-04-26', 50, 0, 0, 'eds la floresta', 3, 10, 70000, 'combustible', '2019-06-15 10:46:29', 1, 1, 1),
(654, 'images/egresoscaja/39278IMG_9252.JPG', 'Beneficiario Externo', '2019-05-17', 50, 0, 0, 'eds el paraiso', 3, 10, 50000, 'combustible', '2019-06-15 10:49:20', 1, 1, 1),
(655, 'images/egresoscaja/94722IMG_9254.JPG', 'Beneficiario Externo', '2019-04-24', 50, 0, 0, 'corporacion de restaurantes', 3, 11, 13300, 'comida', '2019-06-15 10:50:06', 1, 1, 1),
(656, 'images/egresoscaja/41780IMG_9255.JPG', 'Beneficiario Externo', '2019-05-03', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-15 10:56:47', 1, 1, 1),
(657, 'images/egresoscaja/62832IMG_9256.JPG', 'Beneficiario Externo', '2019-05-01', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-15 10:57:40', 1, 1, 1),
(658, 'images/egresoscaja/56019IMG_9257.JPG', 'Beneficiario Externo', '2019-05-29', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 14500, 'comida', '2019-06-15 11:24:39', 1, 1, 1),
(659, 'images/egresoscaja/98077IMG_9258.JPG', 'Beneficiario Externo', '2019-04-28', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-15 11:25:31', 1, 1, 1),
(660, 'images/egresoscaja/77520IMG_9259.JPG', 'Beneficiario Externo', '2019-04-27', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-15 11:26:19', 1, 1, 1),
(661, 'images/egresoscaja/1862IMG_9260.JPG', 'Beneficiario Externo', '2019-04-27', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-15 11:26:58', 1, 1, 1),
(662, 'images/egresoscaja/9712IMG_9261.JPG', 'Beneficiario Externo', '2019-04-26', 50, 0, 0, 'restaurante la embajada santandereana', 3, 11, 15000, 'comida', '2019-06-15 11:36:52', 1, 1, 1),
(663, 'images/egresoscaja/67091IMG_9262.JPG', 'Beneficiario Externo', '2019-04-24', 50, 0, 0, 'restaurante paradorl el 15', 3, 11, 15000, 'comida', '2019-06-15 11:38:34', 1, 1, 1),
(664, 'images/egresoscaja/25645IMG_9263.JPG', 'Beneficiario Externo', '2019-04-24', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-15 11:39:33', 1, 1, 1),
(665, 'images/egresoscaja/16213IMG_9264.JPG', 'Beneficiario Externo', '2019-04-23', 50, 0, 0, 'restaurante kwan yin', 3, 11, 15000, 'comida', '2019-06-15 11:40:49', 1, 1, 1),
(666, 'images/egresoscaja/17872IMG_9265.JPG', 'Beneficiario Externo', '2019-05-03', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 100000, 'desayunos', '2019-06-15 11:41:42', 1, 1, 1),
(667, 'images/egresoscaja/54010IMG_9266.JPG', 'Beneficiario Externo', '2019-05-13', 50, 0, 0, 'restaurante el rincon', 3, 11, 15000, 'comida', '2019-06-15 11:42:31', 1, 1, 1),
(668, 'images/egresoscaja/72250IMG_9267.JPG', 'Beneficiario Externo', '2019-05-12', 50, 0, 0, 'restaurante el rincon', 3, 11, 14500, 'comida', '2019-06-15 11:44:47', 1, 1, 1),
(669, 'images/egresoscaja/78256IMG_9303.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'HOTEL EL MURO', 3, 11, 40000, 'hospedaje', '2019-06-17 11:49:05', 1, 1, 1),
(670, 'images/egresoscaja/7261IMG_9304.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 8000, 'transporte', '2019-06-17 11:50:07', 1, 1, 1),
(671, 'images/egresoscaja/51554IMG_9305.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'lavadero el lago', 3, 12, 61000, 'lavado', '2019-06-17 11:51:15', 1, 1, 1),
(672, 'images/egresoscaja/8594IMG_9306.JPG', 'Beneficiario Externo', '2019-06-14', 47, 0, 0, 'tauro', 4, 17, 27000, 'papeleria', '2019-06-17 11:52:43', 1, 1, 1),
(673, 'images/egresoscaja/8185820190617182532574.pdf', 'Beneficiario Externo', '2019-06-17', 47, 0, 0, 'DIAN', 4, 20, 3794000, 'DECLARACI?N DE INCOS', '2019-06-17 17:52:09', 1, 1, 1),
(674, 'images/egresoscaja/78515IMG_9340.JPG', 'Beneficiario Externo', '2019-06-17', 47, 0, 0, 'cerrajer?a Yale', 4, 17, 20500, 'duplicado llave', '2019-06-18 11:39:34', 1, 1, 1),
(675, 'images/egresoscaja/36828IMG_9341.JPG', 'Beneficiario Externo', '2019-06-18', 47, 0, 0, 'Guido Corral', 5, 31, 90000, 'transporte', '2019-06-18 11:40:17', 1, 1, 1),
(676, 'images/egresoscaja/45958IMG_9342.JPG', 'Beneficiario Externo', '2019-06-18', 47, 0, 0, 'Guido Corral', 5, 31, 15000, 'transporte', '2019-06-18 11:41:26', 1, 1, 1),
(677, 'images/egresoscaja/37722IMG_9343.JPG', 'Beneficiario Externo', '2019-06-17', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 18000, 'taxis banco y llave', '2019-06-18 11:42:03', 1, 1, 1),
(678, 'images/egresoscaja/49936IMG_9344.JPG', 'Beneficiario Externo', '2019-06-18', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 12000, 'transporte la socia y concreaceros', '2019-06-18 11:42:41', 1, 1, 1),
(679, 'images/egresoscaja/1125IMG_9346.JPG', 'Beneficiario Externo', '2019-05-11', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-18 13:14:09', 1, 1, 1),
(680, 'images/egresoscaja/83072IMG_9347.JPG', 'Beneficiario Externo', '2019-05-10', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-18 13:15:02', 1, 1, 1),
(681, 'images/egresoscaja/10353IMG_9348.JPG', 'Beneficiario Externo', '2019-05-09', 50, 0, 0, 'restaurante el rincon', 3, 11, 15000, 'comida', '2019-06-18 13:15:53', 1, 1, 1),
(682, 'images/egresoscaja/85858IMG_9349.JPG', 'Beneficiario Externo', '2019-05-08', 50, 0, 0, 'coquetos cafeteria', 3, 11, 10000, 'comida', '2019-06-18 13:16:36', 1, 1, 1),
(683, 'images/egresoscaja/57365IMG_9350.JPG', 'Beneficiario Externo', '2019-05-08', 50, 0, 0, 'restaurante el rincon', 3, 11, 15000, 'comida', '2019-06-18 13:17:25', 1, 1, 1),
(684, 'images/egresoscaja/80649IMG_9351.JPG', 'Beneficiario Externo', '2019-05-07', 50, 0, 0, 'restaurante el rincon', 3, 11, 15000, 'comida', '2019-06-18 13:18:08', 1, 1, 1),
(685, 'images/egresoscaja/28711IMG_9352.JPG', 'Beneficiario Externo', '2019-05-06', 50, 0, 0, 'restaurante el rincon', 3, 11, 15000, 'comida', '2019-06-18 13:18:46', 1, 1, 1),
(686, 'images/egresoscaja/10857IMG_9353.JPG', 'Beneficiario Externo', '2019-05-05', 50, 0, 0, 'yuri mendez', 3, 11, 15000, 'comida', '2019-06-18 13:19:33', 1, 1, 1),
(687, 'images/egresoscaja/54063IMG_9354.JPG', 'Beneficiario Externo', '2019-05-04', 50, 0, 0, 'restaurante el rincon', 3, 11, 15000, 'comida', '2019-06-18 13:20:29', 1, 1, 1),
(688, 'images/egresoscaja/43317IMG_9355.JPG', 'Beneficiario Externo', '2019-05-17', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-18 13:21:25', 1, 1, 1),
(689, 'images/egresoscaja/92840IMG_9356.JPG', 'Beneficiario Externo', '2019-05-17', 50, 0, 0, 'restaurante el rincon', 3, 11, 15000, 'comida', '2019-06-18 13:22:18', 1, 1, 1),
(690, 'images/egresoscaja/84998IMG_9357.JPG', 'Beneficiario Externo', '2019-05-16', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-18 13:23:11', 1, 1, 1),
(691, 'images/egresoscaja/43960IMG_9358.JPG', 'Beneficiario Externo', '2019-05-15', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 17000, 'comida', '2019-06-18 13:23:54', 1, 1, 1),
(692, 'images/egresoscaja/30419IMG_9359.JPG', 'Beneficiario Externo', '2019-05-14', 50, 0, 0, 'asadero el simarron llanero', 3, 11, 15000, 'comida', '2019-06-18 13:25:04', 1, 1, 1),
(693, 'images/egresoscaja/30149IMG_9360.JPG', 'Beneficiario Externo', '2019-05-19', 50, 0, 0, 'restaurante Jaidith', 3, 11, 21000, 'comida', '2019-06-18 13:25:58', 1, 1, 1),
(694, 'images/egresoscaja/27169IMG_9361.JPG', 'Beneficiario Externo', '2019-05-18', 50, 0, 0, 'liv sabor', 3, 11, 10000, 'comida', '2019-06-18 13:28:02', 1, 1, 1),
(695, 'images/egresoscaja/21379IMG_9362.JPG', 'Beneficiario Externo', '2019-05-18', 50, 0, 0, 'liv sabor', 3, 11, 10000, 'comida', '2019-06-18 13:29:01', 1, 1, 1),
(696, 'images/egresoscaja/66027IMG_9363.JPG', 'Beneficiario Externo', '2019-05-05', 50, 0, 0, 'asadero el rey plate?o', 3, 11, 16000, 'comida', '2019-06-18 13:29:36', 1, 1, 1),
(697, 'images/egresoscaja/71406IMG_9364.JPG', 'Beneficiario Externo', '2019-05-20', 50, 0, 0, 'restaurante y hospedaje la mecha', 3, 11, 22000, 'comida', '2019-06-18 13:30:41', 1, 1, 1),
(698, 'images/egresoscaja/63990IMG_9365.JPG', 'Beneficiario Externo', '2019-05-17', 50, 0, 0, 'restaurante el rincon', 3, 11, 15000, 'comida', '2019-06-18 13:31:39', 1, 1, 1),
(699, 'images/egresoscaja/56997IMG_9366.JPG', 'Beneficiario Externo', '2019-05-29', 50, 0, 0, 'elisbeth gonzalez', 3, 11, 326500, 'almuerzos y comidas', '2019-06-18 13:32:53', 1, 1, 1),
(700, 'images/egresoscaja/90581IMG_9367.JPG', 'Beneficiario Externo', '2019-06-08', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 80000, 'montallantas', '2019-06-18 13:41:52', 1, 1, 1),
(701, 'images/egresoscaja/54022IMG_9368.JPG', 'Beneficiario Externo', '2019-06-04', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 35000, 'soldarura', '2019-06-18 13:42:42', 1, 1, 1),
(702, 'images/egresoscaja/88882IMG_9369.JPG', 'Beneficiario Externo', '2019-06-07', 50, 0, 0, 'tu solucion ferreteria sas', 5, 29, 21500, 'compra', '2019-06-18 13:43:20', 1, 1, 1),
(703, 'images/egresoscaja/34690IMG_9370.JPG', 'Beneficiario Externo', '2019-06-01', 50, 0, 0, 'julio navarro', 3, 11, 24000, 'comidas', '2019-06-18 13:44:06', 1, 1, 1),
(704, 'images/egresoscaja/24369IMG_9371.JPG', 'Beneficiario Externo', '2019-06-07', 50, 0, 0, 'carlos diaz', 2, 7, 8000, 'motos', '2019-06-18 13:44:45', 1, 1, 1),
(705, 'images/egresoscaja/50667IMG_9372.JPG', 'Beneficiario Externo', '2019-06-07', 50, 0, 0, 'carlos diaz', 3, 11, 20000, 'comida', '2019-06-18 13:45:30', 1, 1, 1),
(706, 'images/egresoscaja/31336IMG_9373.JPG', 'Beneficiario Externo', '2019-06-07', 50, 0, 0, 'autofax', 3, 15, 1479998, 'compra de llantas', '2019-06-18 13:46:18', 1, 1, 1),
(707, 'images/egresoscaja/32366IMG_9374.JPG', 'Beneficiario Externo', '2019-06-07', 50, 0, 0, 'tornifrenos y repuestos sas', 3, 15, 344000, 'repuestos', '2019-06-18 13:47:21', 1, 1, 1),
(708, 'images/egresoscaja/92488IMG_9375.JPG', 'Beneficiario Externo', '2019-04-09', 50, 0, 0, 'lubrirepuestos de la costa sas', 3, 15, 900000, 'llantas', '2019-06-18 13:48:31', 1, 1, 1),
(709, 'images/egresoscaja/96895IMG_9376.JPG', 'Beneficiario Externo', '2019-06-06', 50, 0, 0, 'lubricosta', 3, 12, 214000, 'filtros', '2019-06-18 13:51:51', 1, 1, 1),
(710, 'images/egresoscaja/57982IMG_9377.JPG', 'Beneficiario Externo', '2019-06-06', 50, 0, 0, 'taller frenocosta', 3, 15, 920000, 'repuestos', '2019-06-18 13:53:04', 1, 1, 1),
(711, 'images/egresoscaja/22604IMG_9378.JPG', 'Beneficiario Externo', '2019-06-06', 50, 0, 0, 'taller frenocosta', 3, 12, 45000, 'lavado', '2019-06-18 13:54:25', 1, 1, 1),
(712, 'images/egresoscaja/70140IMG_9379.JPG', 'Beneficiario Externo', '2019-06-06', 50, 0, 0, 'autocristaleria &amp; lujos jjj', 3, 12, 30000, 'plumillas', '2019-06-18 13:55:27', 1, 1, 1),
(713, 'images/egresoscaja/59910IMG_9380.JPG', 'Beneficiario Externo', '2019-06-08', 50, 0, 0, 'distracom', 3, 10, 10000, 'combustible', '2019-06-18 13:56:27', 1, 1, 1),
(714, 'images/egresoscaja/94878IMG_9381.JPG', 'Beneficiario Externo', '2019-06-06', 50, 0, 0, 'distracom', 3, 10, 26000, 'combustible', '2019-06-18 13:57:27', 1, 1, 1),
(715, 'images/egresoscaja/16065IMG_9382.JPG', 'Beneficiario Externo', '2019-06-06', 50, 0, 0, 'distracom', 3, 10, 2000, 'combustible', '2019-06-18 13:58:15', 1, 1, 1),
(716, 'images/egresoscaja/89658IMG_9383.JPG', 'Beneficiario Externo', '2019-06-08', 50, 0, 0, 'distracom', 3, 10, 96800, 'combustible', '2019-06-18 13:58:51', 1, 1, 1),
(717, 'images/egresoscaja/50707IMG_9384.JPG', 'Beneficiario Externo', '2019-06-08', 50, 0, 0, 'elisbeth gonzalez', 3, 13, 50000, 'arreglo de ruedas', '2019-06-18 14:00:32', 1, 1, 1),
(718, 'images/egresoscaja/60277IMG_9385.JPG', 'Beneficiario Externo', '2019-05-31', 50, 0, 0, 'elisbeth gonzalez', 3, 11, 80000, 'hospedaje', '2019-06-18 14:01:48', 1, 1, 1),
(719, 'images/egresoscaja/72171IMG_9386.JPG', 'Beneficiario Externo', '2019-05-31', 50, 0, 0, 'elisbeth gonzalez', 3, 11, 24000, 'comida', '2019-06-18 14:02:34', 1, 1, 1),
(720, 'images/egresoscaja/82600IMG_9387.JPG', 'Beneficiario Externo', '2019-06-05', 50, 0, 0, 'carlos diaz', 3, 13, 50000, 'arreglo de llantas', '2019-06-18 14:34:36', 1, 1, 1),
(721, 'images/egresoscaja/24510IMG_9388.JPG', 'Beneficiario Externo', '2019-05-31', 50, 0, 0, 'elisbeth gonzalez', 3, 11, 118000, 'comidas', '2019-06-18 14:35:35', 1, 1, 1),
(722, 'images/egresoscaja/48212IMG_9389.JPG', 'Beneficiario Externo', '2019-05-31', 50, 0, 0, 'elisbeth gonzalez', 3, 11, 105000, 'comidas', '2019-06-18 14:36:19', 1, 1, 1),
(723, 'images/egresoscaja/38188IMG_9399.JPG', 'Beneficiario Externo', '2019-06-18', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 20000, 'transportes varios', '2019-06-19 11:20:53', 1, 1, 1),
(724, 'images/egresoscaja/2266IMG_9400.JPG', 'Beneficiario Externo', '2019-06-18', 47, 0, 0, 'servientrega', 2, 6, 9700, 'envio documentos cartagena', '2019-06-19 11:22:25', 1, 1, 1),
(725, 'images/egresoscaja/84765IMG_9401.JPG', 'Beneficiario Externo', '2019-06-18', 47, 0, 0, 'papeleria el cid', 4, 17, 49562, 'compra de papeleria', '2019-06-19 11:24:14', 1, 1, 1),
(726, 'images/egresoscaja/40045IMG_9402.JPG', 'Beneficiario Externo', '2019-06-18', 47, 0, 0, 'papeleria el cid', 4, 17, 99022, 'papeleria', '2019-06-19 11:25:35', 1, 1, 1),
(727, 'images/egresoscaja/89741IMG_9415.JPG', 'Beneficiario Externo', '2019-06-19', 33, 0, 0, 'MAGALI GONZALEZ', 4, 19, 76000, 'GIRO', '2019-06-20 08:07:26', 1, 1, 1),
(729, 'images/egresoscaja/619506-13 CEL-RAFAEL.pdf', 'Beneficiario Externo', '2019-06-13', 5, 0, 0, 'Claro', 2, 5, 107450, 'pago plan ing rafael', '2019-06-20 08:57:01', 1, 1, 1),
(730, 'images/egresoscaja/1111006-18 COMPRA TIQUETE CTG-BOG_176000.pdf', 'Beneficiario Externo', '2019-06-18', 5, 0, 0, 'avianca', 2, 7, 176900, 'tiquete', '2019-06-20 08:58:32', 1, 1, 1),
(731, 'images/egresoscaja/2628806-18 PAGO-TIGOJOSEDANIEL_100069.pdf', 'Beneficiario Externo', '2019-06-18', 5, 0, 0, 'tigo', 2, 5, 100069, 'pago plan', '2019-06-20 08:59:33', 1, 1, 1),
(732, 'images/egresoscaja/83232IMG_9421.JPG', 'Beneficiario Externo', '2019-05-06', 49, 0, 0, 'raul vergara', 3, 15, 8160000, 'legalizado por jocelyn', '2019-06-20 13:29:13', 1, 1, 1),
(733, 'images/egresoscaja/47100IMG_9432.JPG', 'Beneficiario Externo', '2019-06-15', 33, 0, 0, 'fredy gonzalez', 2, 7, 200000, 'viaticos', '2019-06-20 13:53:39', 1, 1, 1),
(734, 'images/egresoscaja/86989IMG_9433.JPG', 'Beneficiario Externo', '2019-06-19', 5, 0, 0, 'GASTO PERSONAL', 4, 19, 5000000, 'Saul Mueg				(Aut. MM)									  	GASTO PERSONAL CONSIGNACION', '2019-06-20 14:01:54', 1, 1, 1),
(735, 'images/egresoscaja/5189IMG_9434.JPG', 'Beneficiario Externo', '2019-06-11', 5, 0, 0, 'Juan carlos gutierrez', 4, 19, 1000000, 'pago personal', '2019-06-20 14:03:14', 1, 1, 1),
(736, 'images/egresoscaja/22049IMG_9435.JPG', 'Beneficiario Externo', '2019-06-12', 5, 0, 0, 'anabell mendoza', 4, 19, 2000000, 'pago', '2019-06-20 14:04:22', 1, 1, 1),
(737, 'images/egresoscaja/56861IMG_9437.JPG', 'Beneficiario Externo', '2019-06-12', 5, 0, 0, 'grace de leon', 4, 19, 1000000, 'pago', '2019-06-20 14:06:09', 1, 1, 1),
(738, 'images/egresoscaja/70288IMG_9439.JPG', 'Beneficiario Externo', '2019-06-12', 5, 0, 0, 'alex', 4, 19, 3000000, 'pago adecuaciones', '2019-06-20 14:06:56', 1, 1, 1),
(739, 'images/egresoscaja/62974IMG_9438.JPG', 'Beneficiario Externo', '2019-06-10', 5, 0, 0, 'fredy gonzalez', 2, 7, 1000000, 'viaticos', '2019-06-20 14:08:31', 1, 1, 1),
(740, 'images/egresoscaja/30579IMG_9440.JPG', 'Beneficiario Externo', '2019-06-12', 5, 0, 0, 'diana dangond', 4, 19, 700000, 'pago tiquetes', '2019-06-20 14:09:11', 1, 1, 1),
(741, 'images/egresoscaja/17337IMG_9464.JPG', 'Beneficiario Externo', '2019-06-21', 47, 0, 0, 'pasteur', 4, 17, 3900, 'compra', '2019-06-21 17:43:36', 1, 1, 1),
(742, 'images/egresoscaja/66632IMG_9465.JPG', 'Beneficiario Externo', '2019-06-21', 47, 0, 0, 'la browniseria', 4, 17, 31000, 'compra', '2019-06-21 17:44:47', 1, 1, 1),
(743, 'images/egresoscaja/54844IMG_9466.JPG', 'Beneficiario Externo', '2019-06-19', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 12000, 'taxis consignacion', '2019-06-21 17:45:46', 1, 1, 1),
(744, 'images/egresoscaja/27187IMG_9467.JPG', 'Beneficiario Externo', '2019-06-19', 47, 0, 0, 'Natalia Hern?ndez', 2, 5, 10000, 'recarga', '2019-06-21 17:46:47', 1, 1, 1),
(745, 'images/egresoscaja/46244IMG_9468.JPG', 'Beneficiario Externo', '2019-06-21', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 49000, 'transporte taxi expreso indumil', '2019-06-21 17:47:22', 1, 1, 1),
(746, 'images/egresoscaja/86065IMG_9473.JPG', 'Beneficiario Externo', '2019-06-12', 47, 0, 0, 'peaje la esperanza', 2, 7, 19200, 'PEAJE', '2019-06-22 12:27:48', 1, 1, 1),
(747, 'images/egresoscaja/52954IMG_9474.JPG', 'Beneficiario Externo', '2019-06-12', 47, 0, 0, 'peaje la esperanza', 2, 7, 19200, 'PEAJE', '2019-06-22 12:28:41', 1, 1, 1),
(748, 'images/egresoscaja/48190IMG_9475.JPG', 'Beneficiario Externo', '2019-06-22', 47, 0, 0, 'DISTRIPLASTICOS LJ', 4, 17, 9000, 'COMPRA', '2019-06-22 12:29:15', 1, 1, 1),
(749, 'images/egresoscaja/32316IMG_9476.JPG', 'Beneficiario Externo', '2019-06-22', 47, 0, 0, 'papeleria el cid', 4, 17, 13490, 'COMPRA', '2019-06-22 12:30:20', 1, 1, 1),
(750, 'images/egresoscaja/70421IMG_9477.JPG', 'Beneficiario Externo', '2019-06-22', 47, 0, 0, 'MOVISTAR', 2, 5, 100000, 'PLAN JDMO', '2019-06-22 12:32:30', 1, 1, 1),
(751, 'images/egresoscaja/18563IMG_9478.JPG', 'Beneficiario Externo', '2019-06-22', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 8000, 'TRANSPORTE', '2019-06-22 12:33:49', 1, 1, 1),
(752, 'images/egresoscaja/5918220190625150407015.pdf', 'Beneficiario Externo', '2019-06-19', 5, 0, 0, 'avianca', 2, 7, 414900, 'TIQUETES', '2019-06-25 14:02:55', 1, 1, 1),
(753, 'images/egresoscaja/3983IMG_9522.JPG', 'Beneficiario Externo', '2019-06-07', 49, 0, 0, 'eds el mulero', 3, 10, 820007, 'combustible mula', '2019-06-25 15:46:13', 1, 1, 1),
(754, 'images/egresoscaja/16455IMG_9523.JPG', 'Beneficiario Externo', '2019-06-06', 49, 0, 0, 'eds celeste', 3, 10, 0, 'combustible nissan', '2019-06-25 15:47:51', 1, 1, 1),
(755, 'images/egresoscaja/62806IMG_9524.JPG', 'Beneficiario Externo', '2019-06-06', 49, 0, 0, 'llanteria toluviejo', 3, 13, 15000, 'arreglo de llantas nissan', '2019-06-25 15:48:57', 1, 1, 1),
(756, 'images/egresoscaja/3150IMG_9525.JPG', 'Beneficiario Externo', '2019-06-08', 49, 0, 0, 'julio cersar de la cruz campo', 3, 13, 260000, 'mantenimiento inyectores', '2019-06-25 15:50:34', 1, 1, 1),
(757, 'images/egresoscaja/31921IMG_9526.JPG', 'Beneficiario Externo', '2019-06-08', 49, 0, 0, 'todo nissan', 3, 15, 463000, 'repuesto', '2019-06-25 15:51:55', 1, 1, 1),
(758, 'images/egresoscaja/36764IMG_9527.JPG', 'Beneficiario Externo', '2019-06-08', 49, 0, 0, 'carlos martinez', 3, 11, 80000, 'comidas', '2019-06-25 15:52:54', 1, 1, 1),
(759, 'images/egresoscaja/74098IMG_9528.JPG', 'Beneficiario Externo', '2019-06-03', 49, 0, 0, 'llanteria aire puro', 3, 13, 35000, 'mantenimiento', '2019-06-25 15:53:54', 1, 1, 1),
(760, 'images/egresoscaja/62013IMG_9529.JPG', 'Beneficiario Externo', '2019-06-08', 49, 0, 0, 'llanteria el amigo', 3, 13, 24000, 'arreglo de llantas', '2019-06-25 15:56:59', 1, 1, 1),
(761, 'images/egresoscaja/77436IMG_9530.JPG', 'Beneficiario Externo', '2019-06-10', 49, 0, 0, 'terpel', 3, 10, 138021, 'combustible nissan', '2019-06-25 15:57:51', 1, 1, 1),
(762, 'images/egresoscaja/55546IMG_9530.JPG', 'Beneficiario Externo', '2019-06-10', 49, 0, 0, 'terpel', 3, 10, 138021, 'combustible nissan', '2019-06-25 15:57:51', 1, 1, 1),
(763, 'images/egresoscaja/35919IMG_9531.JPG', 'Beneficiario Externo', '2019-06-10', 49, 0, 0, 'lubricartagena maz', 3, 12, 59000, 'insumos', '2019-06-25 16:08:12', 1, 1, 1),
(764, 'images/egresoscaja/38823IMG_9532.JPG', 'Beneficiario Externo', '2019-06-12', 49, 0, 0, 'llanteria el paisa', 3, 13, 30000, 'cambio de aceite', '2019-06-25 16:09:49', 1, 1, 1),
(765, 'images/egresoscaja/81258IMG_9533.JPG', 'Beneficiario Externo', '2019-06-10', 49, 0, 0, 'digabe del caribe y cia ltda', 3, 12, 315000, 'filtros', '2019-06-25 16:37:38', 1, 1, 1),
(766, 'images/egresoscaja/13004IMG_9534.JPG', 'Beneficiario Externo', '2019-06-10', 49, 0, 0, 'lubek-oil', 3, 12, 1891520, 'compra de aceite', '2019-06-25 16:39:00', 1, 1, 1),
(767, 'images/egresoscaja/87690IMG_9535.JPG', 'Beneficiario Externo', '2019-06-11', 49, 0, 0, 'transporte golden de colombia sas', 3, 16, 100000, 'manifiestos', '2019-06-25 16:40:37', 1, 1, 1),
(768, 'images/egresoscaja/34959IMG_9538.JPG', 'Beneficiario Externo', '2019-06-11', 49, 0, 0, 'cristian parra', 3, 14, 1400000, 'escolta', '2019-06-25 16:41:55', 1, 1, 1),
(769, 'images/egresoscaja/50852IMG_9539.JPG', 'Beneficiario Externo', '2019-06-12', 49, 0, 0, 'eds el mulero', 3, 10, 400000, 'combustible', '2019-06-25 16:43:03', 1, 1, 1),
(770, 'images/egresoscaja/16467IMG_9540.JPG', 'Beneficiario Externo', '2019-06-11', 49, 0, 0, 'eds las americas', 3, 10, 400000, 'combustible', '2019-06-25 16:44:16', 1, 1, 1),
(771, 'images/egresoscaja/35680IMG_9541.JPG', 'Beneficiario Externo', '2019-06-11', 49, 0, 0, 'cenlotecma sas', 3, 11, 10000, 'parqueadero', '2019-06-25 16:45:12', 1, 1, 1),
(772, 'images/egresoscaja/83534IMG_9542.JPG', 'Beneficiario Externo', '2019-06-13', 49, 0, 0, 'peajes varios', 2, 7, 126600, 'peajes', '2019-06-25 16:49:43', 1, 1, 1),
(773, 'images/egresoscaja/87826IMG_9543.JPG', 'Beneficiario Externo', '2019-06-13', 49, 0, 0, 'peajes varios', 2, 7, 181300, 'peajes', '2019-06-25 16:50:41', 1, 1, 1),
(774, 'images/egresoscaja/59656IMG_9544.JPG', 'Beneficiario Externo', '2019-06-12', 49, 0, 0, 'peajes varios', 2, 7, 77000, 'peajes', '2019-06-25 16:51:30', 1, 1, 1),
(775, 'images/egresoscaja/51113IMG_9545.JPG', 'Beneficiario Externo', '2019-06-11', 49, 0, 0, 'peajes varios', 2, 7, 80100, 'peajes', '2019-06-25 16:52:34', 1, 1, 1),
(776, 'images/egresoscaja/26214IMG_9546.JPG', 'Beneficiario Externo', '2019-06-13', 49, 0, 0, 'peajes varios', 2, 7, 211100, 'peajes', '2019-06-25 16:53:48', 1, 1, 1),
(777, 'images/egresoscaja/46617IMG_9547.JPG', 'Beneficiario Externo', '2019-06-10', 49, 0, 0, 'peajes varios', 2, 7, 310800, 'peajes', '2019-06-25 16:54:52', 1, 1, 1),
(778, 'images/egresoscaja/79380Imagen_no_disponible.svg.png', 'Beneficiario Externo', '2019-05-30', 49, 0, 0, 'raul vergara', 3, 15, 2420000, 'legalizado por jocelyn', '2019-06-25 17:31:19', 1, 1, 1),
(779, 'images/egresoscaja/28509IMG_9551.JPG', 'Beneficiario Externo', '2019-05-31', 49, 0, 0, 'peaje la esperanza', 2, 7, 38400, 'peajes', '2019-06-26 08:40:51', 1, 1, 1),
(780, 'images/egresoscaja/85551IMG_9552.JPG', 'Beneficiario Externo', '2019-06-20', 49, 0, 0, 'peajes varios', 2, 7, 350400, 'peajes', '2019-06-26 08:42:17', 1, 1, 1),
(781, 'images/egresoscaja/97438IMG_9553.JPG', 'Beneficiario Externo', '2019-06-12', 49, 0, 0, 'transporte golden de colombia sas', 3, 16, 50000, 'manifiesto', '2019-06-26 08:43:14', 1, 1, 1),
(782, 'images/egresoscaja/38822IMG_9554.JPG', 'Beneficiario Externo', '2019-06-10', 49, 0, 0, 'transporte golden de colombia sas', 3, 16, 150000, 'despacho de equipos', '2019-06-26 08:44:30', 1, 1, 1),
(783, 'images/egresoscaja/60958IMG_9555.JPG', 'Beneficiario Externo', '2019-06-18', 49, 0, 0, 'transporte golden de colombia sas', 3, 16, 50000, 'manifiestos', '2019-06-26 08:45:38', 1, 1, 1),
(784, 'images/egresoscaja/91028IMG_9556.JPG', 'Beneficiario Externo', '2019-06-13', 49, 0, 0, 'transporte golden de colombia sas', 3, 16, 50000, 'manifiesto', '2019-06-26 08:46:27', 1, 1, 1),
(785, 'images/egresoscaja/51478IMG_9557.JPG', 'Beneficiario Externo', '2019-06-18', 49, 0, 0, 'cristian parra', 3, 14, 700000, 'escolta', '2019-06-26 08:47:34', 1, 1, 1),
(786, 'images/egresoscaja/38679IMG_9558.JPG', 'Beneficiario Externo', '2019-06-18', 49, 0, 0, 'eds el mulero', 3, 10, 600003, 'combustible', '2019-06-26 08:48:37', 1, 1, 1),
(787, 'images/egresoscaja/45113IMG_9559.JPG', 'Beneficiario Externo', '2019-06-14', 49, 0, 0, 'eds el mulero', 3, 10, 500005, 'combustible', '2019-06-26 08:50:08', 1, 1, 1),
(788, 'images/egresoscaja/26179IMG_9560.JPG', 'Beneficiario Externo', '2019-06-12', 49, 0, 0, 'homecenter ctgena', 4, 17, 79900, 'cerradura', '2019-06-26 08:52:00', 1, 1, 1),
(789, 'images/egresoscaja/58041IMG_9561.JPG', 'Beneficiario Externo', '2019-06-15', 49, 0, 0, 'distribuidora cts sas', 3, 10, 85082, 'combustible', '2019-06-26 08:53:12', 1, 1, 1),
(790, 'images/egresoscaja/93009IMG_9562.JPG', 'Beneficiario Externo', '2019-06-15', 49, 0, 0, 'wilson guzman', 3, 12, 40000, 'lavado', '2019-06-26 08:54:31', 1, 1, 1),
(791, 'images/egresoscaja/69464IMG_9563.JPG', 'Beneficiario Externo', '2019-06-15', 49, 0, 0, 'raul vergara', 3, 13, 100000, 'soldadura', '2019-06-26 08:55:34', 1, 1, 1),
(792, 'images/egresoscaja/77777IMG_9564.JPG', 'Beneficiario Externo', '2019-06-13', 49, 0, 0, 'ferreteria ruth', 5, 30, 180000, 'compra', '2019-06-26 08:56:40', 1, 1, 1),
(793, 'images/egresoscaja/78679IMG_9565.JPG', 'Beneficiario Externo', '2019-06-12', 49, 0, 0, 'comercializadora t y t ltda', 3, 15, 20000, 'repuestos', '2019-06-26 08:57:39', 1, 1, 1),
(796, 'images/egresoscaja/90572IMG_9570.JPG', 'Beneficiario Externo', '2019-06-18', 5, 0, 0, 'hostal las olas', 4, 19, 95000, 'hospedaje', '2019-06-26 11:38:53', 1, 1, 1),
(797, 'images/egresoscaja/43296IMG_9571.JPG', 'Beneficiario Externo', '2019-06-22', 5, 0, 0, 'indualpa sas', 4, 19, 12800, 'comida', '2019-06-26 11:40:16', 1, 1, 1),
(798, 'images/egresoscaja/92496IMG_9572.JPG', 'Beneficiario Externo', '2019-05-20', 5, 0, 0, 'surtigas', 4, 19, 2783, 'pago', '2019-06-26 11:41:06', 1, 1, 1),
(799, 'images/egresoscaja/62940IMG_9573.JPG', 'Beneficiario Externo', '2019-06-19', 5, 0, 0, 'd res steakhouse', 4, 19, 10000, 'comida', '2019-06-26 11:44:46', 1, 1, 1),
(800, 'images/egresoscaja/18728IMG_9574.JPG', 'Beneficiario Externo', '2019-06-11', 5, 0, 0, 'distribuciones map', 4, 19, 115000, 'pago', '2019-06-26 11:46:08', 1, 1, 1),
(801, 'images/egresoscaja/76410IMG_9575.JPG', 'Beneficiario Externo', '2019-06-17', 5, 0, 0, 'eds arcas rodadero', 3, 10, 150000, 'combustible', '2019-06-26 11:47:21', 1, 1, 1),
(802, 'images/egresoscaja/72636IMG_9576.JPG', 'Beneficiario Externo', '2019-06-19', 5, 0, 0, 'olimpica s.a.', 4, 19, 21600, 'compra', '2019-06-26 11:48:39', 1, 1, 1),
(803, 'images/egresoscaja/55395IMG_9577.JPG', 'Beneficiario Externo', '2019-06-16', 5, 0, 0, 'eds arcas costa azul', 3, 10, 100063, 'combustible', '2019-06-26 11:49:48', 1, 1, 1),
(804, 'images/egresoscaja/32831IMG_9578.JPG', 'Beneficiario Externo', '2019-06-22', 5, 0, 0, 'olimpica s.a.', 4, 19, 40390, 'compra', '2019-06-26 11:50:52', 1, 1, 1),
(805, 'images/egresoscaja/17476IMG_9579.JPG', 'Beneficiario Externo', '2019-06-21', 5, 0, 0, 'raush kenvelo sas', 4, 19, 91342, 'compra', '2019-06-26 11:53:04', 1, 1, 1),
(806, 'images/egresoscaja/13657IMG_9580.JPG', 'Beneficiario Externo', '2019-06-22', 5, 0, 0, 'eds rodarero liquidos', 3, 10, 156011, 'combustible', '2019-06-26 11:55:45', 1, 1, 1),
(807, 'images/egresoscaja/53017IMG_9581.JPG', 'Beneficiario Externo', '2019-06-17', 5, 0, 0, 'eds rodarero liquidos', 3, 10, 150001, 'combustible', '2019-06-26 11:56:30', 1, 1, 1),
(808, 'images/egresoscaja/11241IMG_9582.JPG', 'Beneficiario Externo', '2019-06-18', 5, 0, 0, 'gastronomia italiana en colombia sas', 4, 19, 129500, 'comida', '2019-06-26 11:57:13', 1, 1, 1),
(809, 'images/egresoscaja/99895IMG_9583.JPG', 'Beneficiario Externo', '2019-05-30', 5, 0, 0, 'le cabrera sas', 4, 19, 288200, 'comida', '2019-06-26 11:59:49', 1, 1, 1),
(810, 'images/egresoscaja/66978IMG_9584.JPG', 'Beneficiario Externo', '2019-06-20', 5, 0, 0, 'le cabrera sas', 4, 19, 273300, 'comida', '2019-06-26 12:02:01', 1, 1, 1),
(811, 'images/egresoscaja/89450IMG_9585.JPG', 'Beneficiario Externo', '2019-06-22', 5, 0, 0, 'nh royal la boheme', 4, 19, 131255, 'pago', '2019-06-26 12:03:14', 1, 1, 1),
(812, 'images/egresoscaja/65864IMG_9586.JPG', 'Beneficiario Externo', '2019-06-25', 5, 0, 0, 'peajes varios', 2, 7, 121800, 'peajes', '2019-06-26 12:04:39', 1, 1, 1),
(813, 'images/egresoscaja/94504IMG_9587.JPG', 'Beneficiario Externo', '2019-06-23', 5, 0, 0, 'peajes varios', 2, 7, 73100, 'peajes', '2019-06-26 12:05:59', 1, 1, 1),
(814, 'images/egresoscaja/46508IMG_9588.JPG', 'Beneficiario Externo', '2019-06-22', 5, 0, 0, 'peajes varios', 2, 7, 64400, 'peajes', '2019-06-26 12:06:47', 1, 1, 1),
(815, 'images/egresoscaja/82757IMG_9640.JPG', 'Beneficiario Externo', '2019-06-25', 47, 0, 0, 'Natalia Hern?ndez', 2, 5, 10000, 'recarga', '2019-06-28 15:11:01', 1, 1, 1),
(816, 'images/egresoscaja/4585IMG_9641.JPG', 'Beneficiario Externo', '2019-06-26', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 15000, 'TRANSPORTE INDUMIL', '2019-06-28 15:12:31', 1, 1, 1),
(817, 'images/egresoscaja/8591IMG_9642.JPG', 'Beneficiario Externo', '2019-06-27', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 6000, 'TAXI BANCO CENTRO', '2019-06-28 15:13:20', 1, 1, 1),
(818, 'images/egresoscaja/69670IMG_9643.JPG', 'Beneficiario Externo', '2019-06-28', 47, 0, 0, 'LUIS DAVID CONTRERAS', 3, 11, 20000, 'COMIDA', '2019-06-28 15:14:07', 1, 1, 1),
(819, 'images/egresoscaja/82448IMG_9644.JPG', 'Beneficiario Externo', '2019-06-28', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 20000, 'TRANSPORTE CONCREACEROS, LAMINAS Y METALES, PAPELERIA Y TORNIMUELLES', '2019-06-28 15:15:29', 1, 1, 1),
(820, 'images/egresoscaja/3987IMG_9645.JPG', 'Beneficiario Externo', '2019-06-28', 47, 0, 0, 'papeleria el cid', 4, 17, 39900, 'COMPRA DE PAPELERIA', '2019-06-28 15:17:23', 1, 1, 1),
(822, 'images/egresoscaja/73512IMG_9668.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'francisco villegas', 4, 25, 350000, 'servicio de motosierra', '2019-06-29 10:29:52', 1, 1, 1),
(823, 'images/egresoscaja/60534IMG_9669.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'carlos diaz', 3, 12, 10000, 'alquiler de cables', '2019-06-29 10:31:15', 1, 1, 1),
(824, 'images/egresoscaja/74505IMG_9670.JPG', 'Beneficiario Externo', '2019-06-12', 50, 0, 0, 'jose daniel meza', 4, 22, 100000, 'prestamo JDMO', '2019-06-29 10:32:35', 1, 1, 1),
(825, 'images/egresoscaja/23684IMG_9671.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'carlos diaz', 3, 11, 20000, 'ALMUERZO CONDUCTORES', '2019-06-29 10:33:29', 1, 1, 1),
(826, 'images/egresoscaja/58253IMG_9672.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'LEONARDO SALAS', 3, 12, 40000, 'ACEITE RETRO', '2019-06-29 10:34:14', 1, 1, 1),
(827, 'images/egresoscaja/21450IMG_9673.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'DEVIS JULIO', 4, 25, 100000, 'PAGO DE CELADURIA', '2019-06-29 10:35:06', 1, 1, 1),
(828, 'images/egresoscaja/93713IMG_9674.JPG', 'Beneficiario Externo', '2019-06-14', 50, 0, 0, 'OLDRISH DIAZ', 3, 11, 347000, 'HOSPEDAJE', '2019-06-29 10:37:54', 1, 1, 1),
(829, 'images/egresoscaja/10532IMG_9675.JPG', 'Beneficiario Externo', '2019-06-18', 50, 0, 0, 'GUILLERMO MORENO', 3, 11, 20000, 'COMIDA', '2019-06-29 10:42:16', 1, 1, 1),
(830, 'images/egresoscaja/43880IMG_9676.JPG', 'Beneficiario Externo', '2019-06-14', 50, 0, 0, 'carlos diaz', 3, 11, 15000, 'COMIDA', '2019-06-29 10:43:43', 1, 1, 1),
(831, 'images/egresoscaja/63948IMG_9677.JPG', 'Beneficiario Externo', '2019-06-12', 50, 0, 0, 'Carlos Celis', 3, 11, 10000, 'COMIDA', '2019-06-29 10:44:56', 1, 1, 1),
(832, 'images/egresoscaja/80131IMG_9678.JPG', 'Beneficiario Externo', '2019-06-12', 50, 0, 0, 'CARLOS HOYOS', 3, 11, 10000, 'COMIDA', '2019-06-29 10:45:42', 1, 1, 1),
(833, 'images/egresoscaja/12776IMG_9679.JPG', 'Beneficiario Externo', '2019-06-17', 50, 0, 0, 'GUILLERMO MORENO', 3, 11, 10000, 'TRANSPORTES', '2019-06-29 10:46:30', 1, 1, 1),
(834, 'images/egresoscaja/48209IMG_9680.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'peajes varios', 2, 7, 106800, 'PEAJES', '2019-06-29 10:48:26', 1, 1, 1),
(835, 'images/egresoscaja/94415IMG_9681.JPG', 'Beneficiario Externo', '2019-06-20', 50, 0, 0, 'peajes varios', 2, 7, 263200, 'PEAJES', '2019-06-29 10:49:35', 1, 1, 1),
(836, 'images/egresoscaja/43177IMG_9682.JPG', 'Beneficiario Externo', '2019-06-26', 50, 0, 0, 'peajes varios', 2, 7, 274200, 'PEAJES', '2019-06-29 10:50:44', 1, 1, 1),
(837, 'images/egresoscaja/43521IMG_9685.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'CDA DEL CARIBE SAS', 3, 16, 304800, 'TECNICOMECANICA SZK 951', '2019-06-29 10:51:25', 1, 1, 1),
(838, 'images/egresoscaja/83953IMG_9686.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'FILTROS Y LLANTAS EL MAIZAL', 3, 15, 206000, 'BATERIAS', '2019-06-29 10:52:35', 1, 1, 1),
(839, 'images/egresoscaja/19791IMG_9687.JPG', 'Beneficiario Externo', '2019-06-12', 50, 0, 0, 'ferreteria el centavo menos', 5, 29, 52500, 'MATERIALES', '2019-06-29 10:53:30', 1, 1, 1),
(840, 'images/egresoscaja/22826IMG_9688.JPG', 'Beneficiario Externo', '2019-06-12', 50, 0, 0, 'comercial toluviejo', 3, 12, 275500, 'COMPRA', '2019-06-29 10:54:14', 1, 1, 1),
(841, 'images/egresoscaja/96564IMG_9689.JPG', 'Beneficiario Externo', '2019-06-08', 50, 0, 0, 'FERRETERIA RD', 5, 29, 20000, 'COMPRA', '2019-06-29 10:55:10', 1, 1, 1),
(842, 'images/egresoscaja/56547IMG_9690.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'comercial toluviejo', 3, 12, 66000, 'COMPRA', '2019-06-29 10:55:58', 1, 1, 1),
(843, 'images/egresoscaja/21253IMG_9691.JPG', 'Beneficiario Externo', '2019-06-12', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 60000, 'ARREGLO DE VALVULA', '2019-06-29 10:56:47', 1, 1, 1),
(844, 'images/egresoscaja/3906IMG_9692.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'VIDRIOS RVM', 3, 15, 230000, 'VIDRIO CAMIONETA', '2019-06-29 10:58:12', 1, 1, 1),
(845, 'images/egresoscaja/15633IMG_9693.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'TORNIPARTES EL MAIZAL', 3, 12, 2800, 'COMPRA', '2019-06-29 10:59:33', 1, 1, 1),
(846, 'images/egresoscaja/7002IMG_9694.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'comercial toluviejo', 3, 12, 48000, 'ENGRASE', '2019-06-29 11:00:44', 1, 1, 1),
(847, 'images/egresoscaja/94662IMG_9695.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'PEDRO SOLER BERTEL', 3, 12, 225000, 'COMPRA DE LINIALES', '2019-06-29 11:01:31', 1, 1, 1),
(848, 'images/egresoscaja/48369IMG_9696.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'comercial toluviejo', 3, 12, 44000, 'COMPRA DE HIDROMAX', '2019-06-29 11:03:13', 1, 1, 1),
(849, 'images/egresoscaja/33444IMG_9697.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'comercial toluviejo', 3, 12, 65900, 'COMPRA DE BISAGRA', '2019-06-29 11:04:23', 1, 1, 1),
(850, 'images/egresoscaja/10226IMG_9698.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'ferreteria el centavo menos', 5, 29, 12500, 'COMPRA', '2019-06-29 11:05:30', 1, 1, 1),
(851, 'images/egresoscaja/61599IMG_9699.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'TALLER HERNANDO ESCOBAR', 3, 12, 30000, 'COMPRA', '2019-06-29 11:06:12', 1, 1, 1),
(852, 'images/egresoscaja/25541IMG_9700.JPG', 'Beneficiario Externo', '2019-12-13', 50, 0, 0, 'comercial toluviejo', 3, 12, 50000, 'LLAVES', '2019-06-29 11:07:24', 1, 1, 1),
(853, 'images/egresoscaja/51576IMG_9701.JPG', 'Beneficiario Externo', '2019-06-12', 50, 0, 0, 'ferreteria el centavo menos', 5, 29, 31500, 'COMPRA', '2019-06-29 11:09:00', 1, 1, 1),
(854, 'images/egresoscaja/63821IMG_9702.JPG', 'Beneficiario Externo', '2019-06-16', 50, 0, 0, 'comercial toluviejo', 3, 12, 32000, 'COMPRA', '2019-06-29 11:10:05', 1, 1, 1),
(855, 'images/egresoscaja/69176IMG_9703.JPG', 'Beneficiario Externo', '2019-06-15', 50, 0, 0, 'SOTECSA', 3, 12, 40000, 'COMPRA', '2019-06-29 11:10:49', 1, 1, 1),
(856, 'images/egresoscaja/87787IMG_9704.JPG', 'Beneficiario Externo', '2019-06-15', 50, 0, 0, 'FERRO AGRO GM', 5, 30, 33800, 'COMPRA', '2019-06-29 11:12:07', 1, 1, 1),
(857, 'images/egresoscaja/16234IMG_9705.JPG', 'Beneficiario Externo', '2019-06-12', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 12, 35000, 'COMPRA', '2019-06-29 11:13:22', 1, 1, 1),
(858, 'images/egresoscaja/1768IMG_9706.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 12, 25000, 'COMPRA', '2019-06-29 11:14:08', 1, 1, 1),
(859, 'images/egresoscaja/21810IMG_9707.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 10000, 'FRENOS', '2019-06-29 11:14:51', 1, 1, 1),
(860, 'images/egresoscaja/61247IMG_9708.JPG', 'Beneficiario Externo', '2019-06-14', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 40000, 'ARREGLO DE LLANTAS', '2019-06-29 11:15:36', 1, 1, 1),
(861, 'images/egresoscaja/68875IMG_9709.JPG', 'Beneficiario Externo', '2019-06-17', 50, 0, 0, 'RADIADORES KOKY', 3, 13, 100000, 'MANTENIMIENTO', '2019-06-29 11:16:29', 1, 1, 1),
(862, 'images/egresoscaja/69955IMG_9710.JPG', 'Beneficiario Externo', '2019-06-24', 50, 0, 0, 'TALLER ALVARO', 3, 13, 60000, 'ARREGLO DE VICEL', '2019-06-29 11:17:21', 1, 1, 1),
(863, 'images/egresoscaja/32090IMG_9711.JPG', 'Beneficiario Externo', '2019-06-17', 50, 0, 0, 'TALLER ALVARO', 3, 13, 35000, 'BAJADA DE TANQUE', '2019-06-29 11:18:29', 1, 1, 1),
(864, 'images/egresoscaja/79948IMG_9712.JPG', 'Beneficiario Externo', '2019-06-17', 50, 0, 0, 'TORNIMUELLES DE SUCRE SAS', 3, 12, 30000, 'COMPRA DE CAUCHOS', '2019-06-29 11:20:43', 1, 1, 1),
(865, 'images/egresoscaja/62816IMG_9713.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'TALLER METALTORNO JG', 3, 12, 30000, 'CAMBIO DE BUJES', '2019-06-29 11:28:26', 1, 1, 1),
(866, 'images/egresoscaja/9810IMG_9714.JPG', 'Beneficiario Externo', '2019-06-18', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 30000, 'CAMBIO DE MANGUERA', '2019-06-29 11:29:29', 1, 1, 1),
(867, 'images/egresoscaja/88356IMG_9715.JPG', 'Beneficiario Externo', '2019-06-15', 50, 0, 0, 'CERRAJERIA JOBY', 3, 15, 16000, 'DUPLICADO LLAVES', '2019-06-29 11:30:49', 1, 1, 1),
(868, 'images/egresoscaja/10676IMG_9716.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'comercial toluviejo', 3, 12, 240000, 'COMPRA', '2019-06-29 11:32:04', 1, 1, 1),
(869, 'images/egresoscaja/70914IMG_9717.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'LLANERA KMO', 3, 11, 20000, 'COMIDA', '2019-06-29 11:33:05', 1, 1, 1),
(870, 'images/egresoscaja/66299IMG_9718.JPG', 'Beneficiario Externo', '2019-06-17', 50, 0, 0, 'ferreteria el centavo menos', 5, 29, 17000, 'COMPRA', '2019-06-29 11:33:55', 1, 1, 1),
(871, 'images/egresoscaja/45857IMG_9719.JPG', 'Beneficiario Externo', '2019-06-17', 50, 0, 0, 'EL BUEN SAZON', 3, 11, 15000, 'COMIDA', '2019-06-29 11:34:38', 1, 1, 1),
(872, 'images/egresoscaja/60785IMG_9720.JPG', 'Beneficiario Externo', '2019-06-11', 50, 0, 0, 'almacen tractocamiones', 3, 12, 44000, 'GRASA', '2019-06-29 11:35:20', 1, 1, 1),
(873, 'images/egresoscaja/82299IMG_9721.JPG', 'Beneficiario Externo', '2019-06-14', 50, 0, 0, 'negocios e inversiones montesur S.A.S.', 5, 29, 357000, 'COMPRA', '2019-06-29 11:36:26', 1, 1, 1),
(874, 'images/egresoscaja/68111IMG_9722.JPG', 'Beneficiario Externo', '2019-06-17', 50, 0, 0, 'SOAT', 3, 16, 1153000, 'SOAT', '2019-06-29 11:38:03', 1, 1, 1),
(875, 'images/egresoscaja/31822IMG_9860.JPG', 'Beneficiario Externo', '2019-06-26', 49, 0, 0, 'comercial toluviejo', 3, 12, 135500, 'COMPRA', '2019-07-02 09:23:31', 1, 1, 1),
(876, 'images/egresoscaja/92590IMG_9861.JPG', 'Beneficiario Externo', '2019-06-26', 49, 0, 0, 'MOVISTAR', 2, 5, 86057, 'PLAN', '2019-07-02 09:24:21', 1, 1, 1),
(877, 'images/egresoscaja/56046IMG_9862.JPG', 'Beneficiario Externo', '2019-06-25', 49, 0, 0, 'eds el mulero', 3, 10, 300002, 'COMBUSTIBLE MULA', '2019-07-02 09:25:34', 1, 1, 1),
(878, 'images/egresoscaja/94224IMG_9863.JPG', 'Beneficiario Externo', '2019-06-30', 49, 0, 0, 'peajes varios', 2, 7, 274200, 'PEAJES', '2019-07-02 09:26:50', 1, 1, 1),
(879, 'images/egresoscaja/69724IMG_9864.JPG', 'Beneficiario Externo', '2019-06-30', 49, 0, 0, 'peajes varios', 2, 7, 384000, 'PEAJES', '2019-07-02 09:27:45', 1, 1, 1),
(880, 'images/egresoscaja/71663IMG_9865.JPG', 'Beneficiario Externo', '2019-06-30', 49, 0, 0, 'peajes varios', 2, 7, 288000, 'PEAJES', '2019-07-02 09:28:36', 1, 1, 1),
(881, 'images/egresoscaja/33990IMG_9866.JPG', 'Beneficiario Externo', '2019-06-30', 49, 0, 0, 'peajes varios', 2, 7, 134800, 'PEAJES', '2019-07-02 09:29:13', 1, 1, 1),
(882, 'images/egresoscaja/28965IMG_9867.JPG', 'Beneficiario Externo', '2019-06-22', 49, 0, 0, 'raul vergara', 3, 11, 50000, 'COMIDA POLICIA', '2019-07-02 09:33:31', 1, 1, 1),
(883, 'images/egresoscaja/85572IMG_9868.JPG', 'Beneficiario Externo', '2019-06-28', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 12000, 'transporte pago de recibo electricaribe', '2019-07-02 09:54:31', 1, 1, 1),
(884, 'images/egresoscaja/91370IMG_9869.JPG', 'Beneficiario Externo', '2019-07-02', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 10000, 'transporte indumil', '2019-07-02 09:55:25', 1, 1, 1),
(885, 'images/egresoscaja/9258120190702105626933.pdf', 'Beneficiario Externo', '2019-06-28', 47, 0, 0, 'electricaribe', 4, 17, 1003370, 'pago de recibo', '2019-07-02 09:58:49', 1, 1, 1),
(886, 'images/egresoscaja/12282IMG_9871.JPG', 'Beneficiario Externo', '2019-07-02', 47, 0, 0, 'servientrega', 2, 6, 17100, 'PAGO DE ENVIO DE CELULARES', '2019-07-02 10:56:54', 1, 1, 1),
(888, 'images/egresoscaja/81844IMG_9886.JPG', 'Beneficiario Externo', '2019-06-14', 5, 0, 0, 'jose julian valdeblanques', 2, 7, 96357, 'viaticos', '2019-07-04 09:16:16', 1, 1, 1),
(889, 'images/egresoscaja/88428IMG_9887.JPG', 'Beneficiario Externo', '2019-06-13', 5, 0, 0, 'jose julian valdeblanques', 4, 25, 303643, 'pago dias trabajados', '2019-07-04 09:17:07', 1, 1, 1),
(890, 'images/egresoscaja/24152IMG_9888.JPG', 'Beneficiario Externo', '2019-07-02', 5, 0, 0, 'cbc sincelejo', 4, 18, 29000, 'comida', '2019-07-04 09:18:08', 1, 1, 1),
(891, 'images/egresoscaja/53823IMG_9889.JPG', 'Beneficiario Externo', '2019-07-03', 5, 0, 0, 'pasteur', 4, 18, 27619, 'compra', '2019-07-04 09:18:54', 1, 1, 1),
(892, 'images/egresoscaja/97151IMG_9892.JPG', 'Beneficiario Externo', '2019-06-27', 50, 0, 0, 'CDA DEL CARIBE SAS', 3, 16, 304800, 'TECNICOMECANICA SZR 048', '2019-07-04 11:07:28', 1, 1, 1),
(893, 'images/egresoscaja/58099IMG_9893.JPG', 'Beneficiario Externo', '2019-06-25', 50, 0, 0, 'peaje la esperanza', 2, 7, 19200, 'PEAJE', '2019-07-04 11:09:03', 1, 1, 1),
(894, 'images/egresoscaja/70881IMG_9894.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'TALLER EL SOL', 3, 13, 50000, 'ARREGLO', '2019-07-04 11:13:11', 1, 1, 1),
(895, 'images/egresoscaja/9567IMG_9895.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'TECNI BALLESTA', 3, 12, 234000, 'COMPRA', '2019-07-04 11:14:09', 1, 1, 1),
(896, 'images/egresoscaja/43477IMG_9896.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'TECNI BALLESTA', 3, 13, 116000, 'LUCES', '2019-07-04 11:24:04', 1, 1, 1),
(897, 'images/egresoscaja/80318IMG_9897.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'comercial toluviejo', 3, 12, 110000, 'pimpina', '2019-07-04 11:45:01', 1, 1, 1),
(898, 'images/egresoscaja/72300IMG_9898.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'comercial toluviejo', 3, 12, 65800, 'galon mobil', '2019-07-04 11:46:35', 1, 1, 1),
(899, 'images/egresoscaja/70401IMG_9899.JPG', 'Beneficiario Externo', '2019-06-26', 50, 0, 0, 'abacoa', 3, 11, 20000, 'hospedaje', '2019-07-04 11:48:10', 1, 1, 1),
(900, 'images/egresoscaja/94264IMG_9900.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'taller el tamarindo', 3, 13, 80000, 'mano de obra', '2019-07-04 11:49:25', 1, 1, 1),
(901, 'images/egresoscaja/70025IMG_9901.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'llanera la 31', 3, 11, 12000, 'comida', '2019-07-04 11:50:23', 1, 1, 1),
(902, 'images/egresoscaja/92713IMG_9904.JPG', 'Beneficiario Externo', '2019-07-03', 47, 0, 0, 'joaquin guerra', 4, 25, 500000, 'giro', '2019-07-04 15:35:05', 1, 1, 1);
INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(904, 'images/egresoscaja/75912IMG_9905.JPG', 'Beneficiario Externo', '2019-07-04', 47, 0, 0, 'katherine gonzalez', 4, 22, 100000, 'Pago prestamo JDMO', '2019-07-04 15:43:41', 1, 1, 1),
(905, 'images/egresoscaja/98448IMG_9906.JPG', 'Beneficiario Externo', '2019-07-04', 47, 0, 0, 'Pedro guevara', 2, 6, 20000, 'envio de improntas de la camioneta', '2019-07-04 15:44:34', 1, 1, 1),
(906, 'images/egresoscaja/5246IMG_9907.JPG', 'Beneficiario Externo', '2019-07-03', 47, 0, 0, 'Natalia Hern?ndez', 2, 5, 10000, 'recarga', '2019-07-04 15:45:34', 1, 1, 1),
(907, 'images/egresoscaja/51291IMG_9908.JPG', 'Beneficiario Externo', '2019-07-03', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 12000, 'taxis bancolombia', '2019-07-04 15:46:15', 1, 1, 1),
(908, 'images/egresoscaja/39379IMG_9909.JPG', 'Beneficiario Externo', '2019-07-03', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 12000, 'taxis bancolombia tarde', '2019-07-04 15:47:12', 1, 1, 1),
(909, 'images/egresoscaja/90754IMG_9912.JPG', 'Beneficiario Externo', '2019-07-04', 47, 0, 0, 'servientrega', 2, 6, 256600, 'pago de envio de talonarios', '2019-07-04 15:55:19', 1, 1, 1),
(910, 'images/egresoscaja/50911IMG_9952.JPG', 'Beneficiario Externo', '2019-07-06', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'MOTOS', '2019-07-08 09:20:35', 1, 1, 1),
(911, 'images/egresoscaja/63248IMG_9953.JPG', 'Beneficiario Externo', '2019-07-06', 47, 0, 0, 'servientrega', 2, 6, 128440, 'Pago de envio de talonarios', '2019-07-08 09:21:25', 1, 1, 1),
(912, 'images/egresoscaja/20867IMG_9954.JPG', 'Beneficiario Externo', '2019-06-10', 53, 0, 0, 'el tornillero', 3, 12, 741000, 'compra', '2019-07-08 09:40:33', 1, 1, 1),
(913, 'images/egresoscaja/70092IMG_9955.JPG', 'Beneficiario Externo', '2019-06-18', 52, 0, 0, 'juan pablo espinoza', 3, 16, 272000, 'tarjeta de propiedad DTW 296', '2019-07-08 09:43:15', 1, 1, 1),
(914, 'images/egresoscaja/34064IMG_9956.JPG', 'Beneficiario Externo', '2019-07-06', 52, 0, 0, 'juan pablo espinoza', 3, 16, 250000, 'pago del tramite de TP', '2019-07-08 09:50:37', 1, 1, 1),
(915, 'images/egresoscaja/60051IMG_9958.JPG', 'Beneficiario Externo', '2019-06-07', 33, 0, 0, 'OSCAR TAVERA', 5, 30, 200000, 'COMPRA', '2019-07-08 09:56:20', 1, 1, 1),
(916, 'images/egresoscaja/78356IMG_0006.JPG', 'Beneficiario Externo', '2019-07-08', 47, 0, 0, 'Natalia Hern?ndez', 2, 5, 10000, 'recarga', '2019-07-11 13:21:53', 1, 1, 1),
(917, 'images/egresoscaja/38157IMG_0007.JPG', 'Beneficiario Externo', '2019-07-09', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 4000, 'transporte', '2019-07-11 13:23:00', 1, 1, 1),
(918, 'images/egresoscaja/66178IMG_0009.JPG', 'Beneficiario Externo', '2019-07-11', 47, 0, 0, 'juan escobar', 2, 7, 10000, 'transporte carsucre', '2019-07-11 13:24:30', 1, 1, 1),
(919, 'images/egresoscaja/64973IMG_0008.JPG', 'Beneficiario Externo', '2019-07-09', 47, 0, 0, 'cerrajer?a Yale', 4, 17, 21000, 'duplicado llave', '2019-07-11 13:26:19', 1, 1, 1),
(920, 'images/egresoscaja/36467IMG_0027.JPG', 'Beneficiario Externo', '2019-05-30', 46, 0, 0, 'peajes varios', 2, 7, 186772, 'peajes', '2019-07-12 14:36:32', 1, 1, 1),
(921, 'images/egresoscaja/73740IMG_0028.JPG', 'Beneficiario Externo', '2019-06-01', 46, 0, 0, 'carlos oliveros', 4, 25, 30000, 'celaduria', '2019-07-12 14:41:42', 1, 1, 1),
(922, 'images/egresoscaja/7849IMG_0029.JPG', 'Beneficiario Externo', '2019-06-03', 46, 0, 0, 'carlos olivero', 4, 25, 40000, 'celaduria', '2019-07-12 14:42:53', 1, 1, 1),
(923, 'images/egresoscaja/37180IMG_0030.JPG', 'Beneficiario Externo', '2019-05-27', 46, 0, 0, 'francisco villega', 4, 25, 175000, 'acerrado de 3 1/2', '2019-07-12 14:43:58', 1, 1, 1),
(924, 'images/egresoscaja/73439IMG_0031.JPG', 'Beneficiario Externo', '2019-05-27', 46, 0, 0, 'yohana martinez', 3, 10, 14000, 'combustible', '2019-07-12 14:46:03', 1, 1, 1),
(925, 'images/egresoscaja/56658image.jpg', 'Beneficiario Externo', '2019-07-12', 47, 0, 0, 'Fredy Gonz?lez', 2, 7, 40000, 'Env?o del servidor', '2019-07-13 08:47:27', 1, 1, 1),
(926, 'images/egresoscaja/38523IMG_0088.JPG', 'Beneficiario Externo', '2019-06-30', 50, 0, 0, 'peajes varios', 2, 7, 617000, 'peajes', '2019-07-15 11:18:12', 1, 1, 1),
(927, 'images/egresoscaja/83175IMG_0089.JPG', 'Beneficiario Externo', '2019-06-30', 50, 0, 0, 'peajes varios', 2, 7, 438800, 'peajes', '2019-07-15 11:47:56', 1, 1, 1),
(928, 'images/egresoscaja/91595IMG_0090.JPG', 'Beneficiario Externo', '2019-06-30', 50, 0, 0, 'peajes varios', 2, 7, 160600, 'peajes', '2019-07-15 11:49:01', 1, 1, 1),
(929, 'images/egresoscaja/12011IMG_0091.JPG', 'Beneficiario Externo', '2019-06-27', 50, 0, 0, 'jose daniel meza', 4, 18, 355000, 'JDMO', '2019-07-15 11:50:30', 1, 1, 1),
(930, 'images/egresoscaja/9276IMG_0092.JPG', 'Beneficiario Externo', '2019-06-27', 50, 0, 0, 'jose daniel meza', 4, 18, 8000, 'compra de medicamentos', '2019-07-15 11:51:32', 1, 1, 1),
(931, 'images/egresoscaja/61491IMG_0093.JPG', 'Beneficiario Externo', '2019-07-03', 50, 0, 0, 'restaurante y lavadero la 4.5', 3, 11, 15000, 'comida', '2019-07-15 11:52:19', 1, 1, 1),
(932, 'images/egresoscaja/66810IMG_0094.JPG', 'Beneficiario Externo', '2019-07-01', 50, 0, 0, 'parking &amp; wash', 3, 12, 40000, 'lavada general y grafitado BLL367', '2019-07-15 11:53:15', 1, 1, 1),
(933, 'images/egresoscaja/48957IMG_0095.JPG', 'Beneficiario Externo', '2019-07-01', 50, 0, 0, 'SUPERMERCADO BAMBI', 3, 12, 5300, 'COMPRA DE ACEITE', '2019-07-15 11:54:48', 1, 1, 1),
(934, 'images/egresoscaja/85775IMG_0096.JPG', 'Beneficiario Externo', '2019-06-21', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 50000, 'REVISION DE UN BOCATO', '2019-07-15 11:55:54', 1, 1, 1),
(935, 'images/egresoscaja/45599IMG_0097.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 70000, 'REVISION DE BOMBA Y DEL GATO', '2019-07-15 11:57:06', 1, 1, 1),
(936, 'images/egresoscaja/26985IMG_0098.JPG', 'Beneficiario Externo', '2019-06-25', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 40000, 'REVISION DE FILTROS', '2019-07-15 11:59:44', 1, 1, 1),
(937, 'images/egresoscaja/45565IMG_0099.JPG', 'Beneficiario Externo', '2019-06-18', 50, 0, 0, 'EDS EXITO LA SELVA', 3, 10, 10000, 'COMBUSTIBLE', '2019-07-15 12:02:52', 1, 1, 1),
(938, 'images/egresoscaja/61562IMG_0100.JPG', 'Beneficiario Externo', '2019-06-27', 50, 0, 0, 'zona de estacionamiento regulado', 2, 7, 2000, 'parqueo', '2019-07-15 12:03:55', 1, 1, 1),
(939, 'images/egresoscaja/18069IMG_0101.JPG', 'Beneficiario Externo', '2019-06-27', 50, 0, 0, 'peaje la esperanza', 2, 7, 19200, 'peaje', '2019-07-15 12:05:37', 1, 1, 1),
(940, 'images/egresoscaja/59760IMG_0102.JPG', 'Beneficiario Externo', '2019-06-27', 50, 0, 0, 'eds sucre dorado', 3, 10, 70000, 'combustible', '2019-07-15 12:06:28', 1, 1, 1),
(941, 'images/egresoscaja/92045IMG_0103.JPG', 'Beneficiario Externo', '2019-06-13', 50, 0, 0, 'ferreteria el centavo menos', 5, 29, 10000, 'cemento', '2019-07-15 12:07:53', 1, 1, 1),
(942, 'images/egresoscaja/6081IMG_0104.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 38000, 'arreglo de llanta', '2019-07-15 12:09:38', 1, 1, 1),
(943, 'images/egresoscaja/87203IMG_0105.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 68000, 'bajada de rueda', '2019-07-15 12:10:33', 1, 1, 1),
(944, 'images/egresoscaja/48814IMG_0106.JPG', 'Beneficiario Externo', '2019-06-22', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 40000, 'cambio de llantas', '2019-07-15 12:11:50', 1, 1, 1),
(945, 'images/egresoscaja/50105IMG_0107.JPG', 'Beneficiario Externo', '2019-06-21', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 45000, 'arreglo de llantas', '2019-07-15 12:13:44', 1, 1, 1),
(946, 'images/egresoscaja/14932IMG_0108.JPG', 'Beneficiario Externo', '2019-06-20', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 30000, 'MONTADA DE 2 LLANTAS NUEVAS', '2019-07-15 12:19:32', 1, 1, 1),
(947, 'images/egresoscaja/33136IMG_0109.JPG', 'Beneficiario Externo', '2019-05-26', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 53000, 'arreglo de llantas', '2019-07-15 12:21:53', 1, 1, 1),
(948, 'images/egresoscaja/78633IMG_0110.JPG', 'Beneficiario Externo', '2019-06-15', 50, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 20000, 'arreglo de llanta', '2019-07-15 12:22:50', 1, 1, 1),
(949, 'images/egresoscaja/54739IMG_0111.JPG', 'Beneficiario Externo', '2019-06-20', 50, 0, 0, 'rafael hernandez', 2, 7, 45000, 'pago de vans JD', '2019-07-15 12:23:46', 1, 1, 1),
(950, 'images/egresoscaja/9523IMG_0112.JPG', 'Beneficiario Externo', '2019-06-27', 50, 0, 0, 'Luis Aznate', 4, 25, 75000, 'celaduria', '2019-07-15 12:25:01', 1, 1, 1),
(951, 'images/egresoscaja/69535IMG_0113.JPG', 'Beneficiario Externo', '2019-06-26', 50, 0, 0, 'deivis julio', 4, 25, 25000, 'celaduria', '2019-07-15 12:26:27', 1, 1, 1),
(952, 'images/egresoscaja/43128IMG_0114.JPG', 'Beneficiario Externo', '2019-06-26', 50, 0, 0, 'masser sas', 4, 18, 30500, 'DESAYUNO LUZMILA', '2019-07-15 12:27:54', 1, 1, 1),
(953, 'images/egresoscaja/55886IMG_0115.JPG', 'Beneficiario Externo', '2019-06-26', 50, 0, 0, 'carlos diaz', 3, 11, 15000, 'COMIDA', '2019-07-15 12:29:47', 1, 1, 1),
(954, 'images/egresoscaja/38878IMG_0116.JPG', 'Beneficiario Externo', '2019-06-26', 50, 0, 0, 'carlos diaz', 3, 11, 15000, 'COMIDA', '2019-07-15 12:30:26', 1, 1, 1),
(955, 'images/egresoscaja/21937IMG_0117.JPG', 'Beneficiario Externo', '2019-06-26', 50, 0, 0, 'MARTA OYALA', 2, 7, 5000, 'PARQUEADERO DTW 296', '2019-07-15 12:31:10', 1, 1, 1),
(956, 'images/egresoscaja/29175IMG_0118.JPG', 'Beneficiario Externo', '2019-06-25', 50, 0, 0, 'MARTA OYALA', 2, 7, 5000, 'paequeadero DTW 296', '2019-07-15 12:32:45', 1, 1, 1),
(957, 'images/egresoscaja/28655IMG_0119.JPG', 'Beneficiario Externo', '2019-06-27', 50, 0, 0, 'distribuidor el palacio de la pantalenta', 4, 18, 9900, 'compra de pa?uelos JD', '2019-07-15 12:39:07', 1, 1, 1),
(958, 'images/egresoscaja/15905IMG_0120.JPG', 'Beneficiario Externo', '2019-06-26', 50, 0, 0, 'carlos diaz', 3, 13, 40000, 'CAMBIO DE PASTILLAS', '2019-07-15 12:43:33', 1, 1, 1),
(959, 'images/egresoscaja/56948IMG_0121.JPG', 'Beneficiario Externo', '2019-06-25', 50, 0, 0, 'ALMACEN SERVIFRENOS', 3, 15, 170000, 'COMPRA DE PASTILLAS', '2019-07-15 12:46:59', 1, 1, 1),
(960, 'images/egresoscaja/55399IMG_0122.JPG', 'Beneficiario Externo', '2019-06-25', 50, 0, 0, 'LLANTAS Y FILTROS EL MAIZAL', 3, 15, 233000, 'COMPRA DE FILTRO DE ACEITE', '2019-07-15 12:48:22', 1, 1, 1),
(961, 'images/egresoscaja/59285IMG_0123.JPG', 'Beneficiario Externo', '2019-06-20', 50, 0, 0, 'POSTOBON', 3, 11, 41500, 'COMPRA DE AGUA', '2019-07-15 12:50:07', 1, 1, 1),
(962, 'images/egresoscaja/83791IMG_0124.JPG', 'Beneficiario Externo', '2019-06-20', 50, 0, 0, 'INV KALE SAS', 3, 10, 20000, 'COMBUSTIBLE', '2019-07-15 12:51:09', 1, 1, 1),
(963, 'images/egresoscaja/92588IMG_0125.JPG', 'Beneficiario Externo', '2019-06-19', 50, 0, 0, 'GUILLERMO MORENO', 3, 11, 30000, 'COMIDAS Y PARQUEADERO', '2019-07-15 12:52:28', 1, 1, 1),
(964, 'images/egresoscaja/4670IMG_0126.JPG', 'Beneficiario Externo', '2019-06-20', 50, 0, 0, 'TECNI BALLESTA', 3, 13, 20000, 'REVISION DE LUCES', '2019-07-15 12:53:35', 1, 1, 1),
(965, 'images/egresoscaja/66228IMG_0127.JPG', 'Beneficiario Externo', '2019-06-20', 50, 0, 0, 'VARIEDADES NISSI', 3, 12, 8000, 'COMPRA', '2019-07-15 12:54:52', 1, 1, 1),
(966, 'images/egresoscaja/71915IMG_0128.JPG', 'Beneficiario Externo', '2019-06-30', 50, 0, 0, 'peajes varios', 2, 7, 138900, 'PEAJES', '2019-07-15 12:55:51', 1, 1, 1),
(967, 'images/egresoscaja/96437IMG_0131.JPG', 'Beneficiario Externo', '2019-06-30', 50, 0, 0, 'peajes varios', 2, 7, 325400, 'peajes', '2019-07-15 14:20:26', 1, 1, 1),
(968, 'images/egresoscaja/88469IMG_0132.JPG', 'Beneficiario Externo', '2019-07-02', 50, 0, 0, 'comercial toluviejo', 3, 12, 50700, 'compra de aceite', '2019-07-15 14:21:51', 1, 1, 1),
(969, 'images/egresoscaja/68269IMG_0133.JPG', 'Beneficiario Externo', '2019-07-01', 50, 0, 0, 'abacoa', 3, 11, 100000, 'hospedaje operador de grua de dinacol', '2019-07-15 14:24:13', 1, 1, 1),
(970, 'images/egresoscaja/21235IMG_0134.JPG', 'Beneficiario Externo', '2019-07-02', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 70000, 'calibrada de freno, arreglo de tubo de comprensor y arrego de buje', '2019-07-15 14:25:08', 1, 1, 1),
(971, 'images/egresoscaja/18944IMG_0135.JPG', 'Beneficiario Externo', '2019-07-02', 50, 0, 0, 'comercial toluviejo', 3, 12, 66200, 'compra de grasa y aceite', '2019-07-15 14:26:23', 1, 1, 1),
(972, 'images/egresoscaja/28923IMG_0136.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'engine electronic', 3, 13, 80000, 'scaner SQW 944', '2019-07-15 14:27:12', 1, 1, 1),
(973, 'images/egresoscaja/92116IMG_0137.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'taller el lata', 3, 13, 20000, 'SOLDADURA EN BRONCE AL TUBO DE LA CULATA', '2019-07-15 14:28:31', 1, 1, 1),
(974, 'images/egresoscaja/21141IMG_0138.JPG', 'Beneficiario Externo', '2019-07-03', 50, 0, 0, 'zona de estacionamiento regulado', 2, 7, 2000, 'PARQUEADERO', '2019-07-15 14:30:06', 1, 1, 1),
(975, 'images/egresoscaja/56995IMG_0139.JPG', 'Beneficiario Externo', '2019-07-02', 50, 0, 0, 'C.C. CARIBE S.A.S.', 3, 10, 50000, 'COMBUSTIBLE', '2019-07-15 14:31:35', 1, 1, 1),
(976, 'images/egresoscaja/7110IMG_0140.JPG', 'Beneficiario Externo', '2019-07-03', 50, 0, 0, 'lavadero el lago', 3, 12, 12000, 'LAVADO', '2019-07-15 14:32:34', 1, 1, 1),
(977, 'images/egresoscaja/52569IMG_0141.JPG', 'Beneficiario Externo', '2019-07-03', 50, 0, 0, 'AGROVETERINARIA JUAN PABLO A', 5, 30, 49500, 'COMPRA DE BARRA FORJADORA', '2019-07-15 14:33:43', 1, 1, 1),
(978, 'images/egresoscaja/94619IMG_0141.JPG', 'Beneficiario Externo', '2019-07-03', 50, 0, 0, 'AGROVETERINARIA JUAN PABLO A', 5, 30, 49500, 'COMPRA DE BARRA FORJADORA', '2019-07-15 14:33:43', 1, 1, 1),
(979, 'images/egresoscaja/18831IMG_0142.JPG', 'Beneficiario Externo', '2019-07-03', 50, 0, 0, 'negocios e inversiones montesur S.A.S.', 3, 12, 4100, 'aceite 3/1', '2019-07-15 14:39:27', 1, 1, 1),
(980, 'images/egresoscaja/55235IMG_0143.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'ferro construcciones', 3, 12, 4200, 'compra', '2019-07-15 14:40:31', 1, 1, 1),
(981, 'images/egresoscaja/76011IMG_0144.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'ferro construcciones', 5, 30, 1000, 'gualla', '2019-07-15 14:57:14', 1, 1, 1),
(982, 'images/egresoscaja/55538IMG_0145.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'restaurante la 32', 3, 11, 12000, 'comida', '2019-07-15 14:58:21', 1, 1, 1),
(983, 'images/egresoscaja/99750IMG_0146.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'frioautos', 3, 13, 100000, 'arreglo de condensor, caja de gas y aceite', '2019-07-15 14:59:13', 1, 1, 1),
(984, 'images/egresoscaja/55910IMG_0147.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'frioautos', 3, 15, 120000, 'compra de ventilador', '2019-07-15 15:00:32', 1, 1, 1),
(985, 'images/egresoscaja/46221IMG_0148.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'fredy gonzalez', 4, 18, 10000, 'comida', '2019-07-15 15:01:42', 1, 1, 1),
(986, 'images/egresoscaja/55544IMG_0149.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'jorge guerra', 3, 12, 24000, 'compra de cauchos para tanque', '2019-07-15 15:02:55', 1, 1, 1),
(987, 'images/egresoscaja/37475IMG_0150.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'llanteria beceril', 3, 13, 80000, 'rotacion de llantas', '2019-07-15 15:04:09', 1, 1, 1),
(988, 'images/egresoscaja/30301IMG_0151.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 30000, 'cambio de aceite', '2019-07-15 15:05:17', 1, 1, 1),
(989, 'images/egresoscaja/87167IMG_0152.JPG', 'Beneficiario Externo', '2019-06-28', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 100000, 'bajada de tanque y soldadura de la cremallera de la balanta', '2019-07-15 15:07:27', 1, 1, 1),
(990, 'images/egresoscaja/30877IMG_0153.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'TALLER DE MECANICA HERMANOS VILLALBA', 3, 13, 30000, 'revision electrica', '2019-07-15 15:10:14', 1, 1, 1),
(991, 'images/egresoscaja/99080IMG_0154.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'RADIADORES KOKY', 3, 10, 80000, 'combustible', '2019-07-15 15:12:22', 1, 1, 1),
(992, 'images/egresoscaja/4939IMG_0155.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'comercial toluviejo', 3, 12, 2600, 'fusibles', '2019-07-15 15:15:43', 1, 1, 1),
(993, 'images/egresoscaja/30161IMG_0156.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'comercial toluviejo', 3, 12, 13500, 'manguera', '2019-07-15 15:16:59', 1, 1, 1),
(994, 'images/egresoscaja/19156IMG_0157.JPG', 'Beneficiario Externo', '2019-06-29', 50, 0, 0, 'frenos la variante', 3, 12, 55000, 'racones', '2019-07-15 15:17:44', 1, 1, 1),
(995, 'images/egresoscaja/50913IMG_0204.JPG', 'Beneficiario Externo', '2019-06-30', 54, 0, 0, 'peajes varios', 2, 7, 551000, 'peajes varios', '2019-07-22 07:59:14', 1, 1, 1),
(996, 'images/egresoscaja/47751IMG_0205.JPG', 'Beneficiario Externo', '2019-07-16', 54, 0, 0, 'zona de estacionamiento regulado', 2, 7, 4000, 'parqueadero', '2019-07-22 08:01:38', 1, 1, 1),
(997, 'images/egresoscaja/33087IMG_0206.JPG', 'Beneficiario Externo', '2019-07-15', 54, 0, 0, 'COMCEL S.A.', 2, 5, 108740, 'plan de celular', '2019-07-22 08:02:42', 1, 1, 1),
(998, 'images/egresoscaja/20721IMG_0208.JPG', 'Beneficiario Externo', '2019-07-16', 54, 0, 0, 'exito sincelejo', 3, 12, 16100, 'compra de bateria', '2019-07-22 08:04:11', 1, 1, 1),
(999, 'images/egresoscaja/28850IMG_0209.JPG', 'Beneficiario Externo', '2019-07-16', 54, 0, 0, 'almacen racores y mangueras', 3, 15, 135000, 'compra de manguera retro', '2019-07-22 08:05:50', 1, 1, 1),
(1000, 'images/egresoscaja/13203IMG_0210.JPG', 'Beneficiario Externo', '2019-07-16', 54, 0, 0, 'POSTOBON', 3, 11, 19800, 'compra de agua', '2019-07-22 08:06:56', 1, 1, 1),
(1001, 'images/egresoscaja/82857IMG_0211.JPG', 'Beneficiario Externo', '2019-07-16', 54, 0, 0, 'nacional de racores y correas', 3, 15, 120000, 'compra de 1 manguera 2 capsulas y 2 acoples bobcat', '2019-07-22 08:08:26', 1, 1, 1),
(1002, 'images/egresoscaja/11541IMG_0212.JPG', 'Beneficiario Externo', '2019-07-13', 54, 0, 0, 'bidio tapia', 4, 25, 200000, 'pago de jornales por 5 dias', '2019-07-22 08:09:50', 1, 1, 1),
(1003, 'images/egresoscaja/38210IMG_0213.JPG', 'Beneficiario Externo', '2019-07-12', 54, 0, 0, 'delmiro julio diaz', 5, 30, 20000, 'suministro de una docena de matafilo', '2019-07-22 08:13:08', 1, 1, 1),
(1004, 'images/egresoscaja/47654IMG_0214.JPG', 'Beneficiario Externo', '2019-07-12', 54, 0, 0, 'delmiro julio diaz', 5, 30, 288000, '2 docenas de tablas para formaleta', '2019-07-22 08:14:42', 1, 1, 1),
(1005, 'images/egresoscaja/59494IMG_0215.JPG', 'Beneficiario Externo', '2019-07-12', 54, 0, 0, 'abacoa', 3, 11, 140000, 'hospedaje operador grua', '2019-07-22 08:16:30', 1, 1, 1),
(1006, 'images/egresoscaja/29200IMG_0216.JPG', 'Beneficiario Externo', '2019-07-12', 54, 0, 0, 'VARIEDADES NISSI', 4, 17, 7900, 'compra de boligrafos y denas', '2019-07-22 08:17:36', 1, 1, 1),
(1007, 'images/egresoscaja/83259IMG_0217.JPG', 'Beneficiario Externo', '2019-07-16', 54, 0, 0, 'hospedaje el paisita', 3, 11, 60000, 'hospedaje Carlos cartagena', '2019-07-22 08:18:40', 1, 1, 1),
(1008, 'images/egresoscaja/94350IMG_0218.JPG', 'Beneficiario Externo', '2019-07-15', 54, 0, 0, 'soldadura los campanos', 3, 13, 20000, 'mano de obra soldadura', '2019-07-22 08:20:36', 1, 1, 1),
(1009, 'images/egresoscaja/21318IMG_0219.JPG', 'Beneficiario Externo', '2019-07-12', 54, 0, 0, 'maria eugenia romero', 3, 11, 357000, 'comida', '2019-07-22 08:21:46', 1, 1, 1),
(1010, 'images/egresoscaja/13824IMG_0263.JPG', 'Beneficiario Externo', '2019-07-14', 5, 0, 0, 'peajes varios', 2, 7, 138700, 'peajes varios', '2019-07-23 11:05:02', 1, 1, 1),
(1011, 'images/egresoscaja/13305IMG_0264.JPG', 'Beneficiario Externo', '2019-07-14', 5, 0, 0, 'peajes varios', 2, 7, 140600, 'peajes varios', '2019-07-23 11:07:05', 1, 1, 1),
(1012, 'images/egresoscaja/9436IMG_0266.JPG', 'Beneficiario Externo', '2019-07-04', 5, 0, 0, 'peajes varios', 2, 7, 37500, 'peajes varios', '2019-07-23 11:08:27', 1, 1, 1),
(1013, 'images/egresoscaja/67286IMG_0267.JPG', 'Beneficiario Externo', '2019-07-15', 5, 0, 0, 'peajes varios', 2, 7, 169100, 'peajes', '2019-07-23 11:09:24', 1, 1, 1),
(1014, 'images/egresoscaja/57157IMG_0268.JPG', 'Beneficiario Externo', '2019-07-09', 5, 0, 0, 'la cajita', 4, 18, 352000, 'compra', '2019-07-23 11:10:58', 1, 1, 1),
(1015, 'images/egresoscaja/87934IMG_0269.JPG', 'Beneficiario Externo', '2019-07-14', 5, 0, 0, 'la cajita', 4, 18, 235400, 'compra', '2019-07-23 11:12:35', 1, 1, 1),
(1016, 'images/egresoscaja/75839IMG_0270.JPG', 'Beneficiario Externo', '2019-07-09', 5, 0, 0, 'basan cocina disco', 4, 18, 85800, 'compra', '2019-07-23 11:13:43', 1, 1, 1),
(1017, 'images/egresoscaja/33850IMG_0271.JPG', 'Beneficiario Externo', '2019-07-02', 5, 0, 0, 'bonca sas', 3, 10, 100000, 'combustible', '2019-07-23 11:15:46', 1, 1, 1),
(1018, 'images/egresoscaja/6359IMG_0272.JPG', 'Beneficiario Externo', '2019-07-03', 5, 0, 0, 'caribe plaza comercial', 2, 7, 1700, 'parqueadero', '2019-07-23 11:17:04', 1, 1, 1),
(1019, 'images/egresoscaja/51931IMG_0273.JPG', 'Beneficiario Externo', '2019-07-06', 5, 0, 0, 'caribe plaza comercial', 2, 7, 1700, 'parqueadero', '2019-07-23 11:18:12', 1, 1, 1),
(1020, 'images/egresoscaja/3374IMG_0275.JPG', 'Beneficiario Externo', '2019-06-29', 5, 0, 0, 'masser sas', 4, 18, 15700, 'compra', '2019-07-23 11:19:02', 1, 1, 1),
(1021, 'images/egresoscaja/26361IMG_0276.JPG', 'Beneficiario Externo', '2019-07-02', 5, 0, 0, 'masser sas', 4, 18, 17300, 'compra', '2019-07-23 11:20:07', 1, 1, 1),
(1022, 'images/egresoscaja/64725IMG_0587.JPG', 'Beneficiario Externo', '2019-07-31', 47, 0, 0, 'hughesnet', 4, 17, 190400, 'pago de instalacion de internet', '2019-08-03 11:06:29', 1, 1, 1),
(1023, 'images/egresoscaja/44559IMG_0588.JPG', 'Beneficiario Externo', '2019-07-31', 47, 0, 0, 'Natalia Hern?ndez - ing juan escobar', 2, 7, 24000, 'pago de transporte, viaticos y recarga', '2019-08-03 11:09:15', 1, 1, 1),
(1024, 'images/egresoscaja/47353IMG_0589.JPG', 'Beneficiario Externo', '2019-07-27', 47, 0, 0, 'Natalia Hern?ndez - ing juan escobar', 2, 7, 58000, 'transporte indumil, cobro de factura y viaticos ing', '2019-08-03 11:10:45', 1, 1, 1),
(1025, 'images/egresoscaja/79005IMG_0590.JPG', 'Beneficiario Externo', '2019-07-31', 47, 0, 0, 'servientrega', 2, 6, 19600, 'pago de envio de documentos riohacha y bogota', '2019-08-03 11:12:14', 1, 1, 1),
(1026, 'images/egresoscaja/7162020190803125608019.pdf', 'Beneficiario Externo', '2019-07-31', 54, 0, 0, 'CANTERA Y EQUIPOS', 5, 29, 2001540, 'LEGALIZACI?N DE CAJA DE 2.000.000', '2019-08-03 11:51:36', 1, 1, 1),
(1027, 'images/egresoscaja/8097820190816111749500.pdf', 'Beneficiario Externo', '2019-07-24', 54, 0, 0, 'VARIOS', 3, 15, 590000, 'COMPRA DE REPUESTOS VARIOS', '2019-08-16 10:16:33', 1, 1, 1),
(1028, 'images/egresoscaja/5311920190816111806751.pdf', 'Beneficiario Externo', '2019-07-30', 54, 0, 0, 'VARIOS', 3, 11, 131000, 'GASTOS DE TRABAJADORES', '2019-08-16 10:18:20', 1, 1, 1),
(1029, 'images/egresoscaja/7054420190816111820924.pdf', 'Beneficiario Externo', '2019-07-30', 54, 0, 0, 'peajes varios', 2, 7, 784000, 'PEAJES', '2019-08-16 10:20:51', 1, 1, 1),
(1030, 'images/egresoscaja/308020190816113056003.pdf', 'Beneficiario Externo', '2019-08-01', 54, 0, 0, 'peajes varios', 2, 7, 145920, 'PEAJES', '2019-08-16 10:25:47', 1, 1, 1),
(1031, 'images/egresoscaja/7173020190816115657688.pdf', 'Beneficiario Externo', '2019-08-05', 54, 0, 0, 'VARIOS', 3, 15, 831280, 'COMPRA DE REPUESTOS, LAVADO DE EQUIPOS Y DEMAS', '2019-08-16 10:54:05', 1, 1, 1),
(1032, 'images/egresoscaja/2018220190816115709042.pdf', 'Beneficiario Externo', '2019-08-05', 54, 0, 0, 'VARIOS', 3, 11, 223100, 'GASTOS DE OPERADORES', '2019-08-16 10:56:19', 1, 1, 1),
(1033, 'images/egresoscaja/4431520190816115727469.pdf', 'Beneficiario Externo', '2019-08-08', 54, 0, 0, 'peajes varios', 2, 7, 945620, 'PEAJES', '2019-08-16 10:58:37', 1, 1, 1),
(1036, 'images/egresoscaja/9098220190816145035834.pdf', 'Beneficiario Externo', '2019-07-09', 49, 0, 0, 'VARIOS', 3, 16, 200000, 'PAGO A TRABAJADORES', '2019-08-16 13:52:13', 1, 1, 1),
(1037, 'images/egresoscaja/3865020190816145035834.pdf', 'Beneficiario Externo', '2019-07-09', 49, 0, 0, 'VARIOS', 3, 10, 380000, 'COMBUSTIBLE', '2019-08-16 13:53:24', 1, 1, 1),
(1038, 'images/egresoscaja/8450320190816145046070.pdf', 'Beneficiario Externo', '2019-07-06', 49, 0, 0, 'JOSE GUZMAN SANCHEZ', 3, 13, 600000, 'PAGO POR DESMONTE CTGENA', '2019-08-16 13:54:10', 1, 1, 1),
(1039, 'images/egresoscaja/667520190816145046070.pdf', 'Beneficiario Externo', '2019-07-06', 49, 0, 0, 'JOSE GUZMAN SANCHEZ', 3, 13, 600000, 'PAGO POR DESMONTE CTGENA', '2019-08-16 13:54:10', 1, 1, 1),
(1040, 'images/egresoscaja/4133120190816145111149.pdf', 'Beneficiario Externo', '2019-07-09', 49, 0, 0, 'VARIOS', 3, 15, 546378, 'COMPRA DE REPUESTOS', '2019-08-16 13:55:43', 1, 1, 1),
(1041, 'images/egresoscaja/2041020190816145127593.pdf', 'Beneficiario Externo', '2019-07-09', 49, 0, 0, 'peajes varios', 2, 7, 366400, 'PEAJES', '2019-08-16 13:57:16', 1, 1, 1),
(1042, 'images/egresoscaja/235220190816152546698.pdf', 'Beneficiario Externo', '2019-07-16', 49, 0, 0, 'IVAN MARMOLEJO', 4, 25, 50000, 'PAGO DE 2 DIAS DE TRABAJO', '2019-08-16 14:23:39', 1, 1, 1),
(1043, 'images/egresoscaja/7891720190816152607448.pdf', 'Beneficiario Externo', '2019-07-15', 49, 0, 0, 'VARIOS', 3, 12, 48000, 'INSUMOS VARIOS', '2019-08-16 14:24:50', 1, 1, 1),
(1044, 'images/egresoscaja/16220190816152618680.pdf', 'Beneficiario Externo', '2019-07-16', 49, 0, 0, 'transporte golden de colombia sas', 3, 14, 50000, 'MANIFIESTO DE CARGA', '2019-08-16 14:26:00', 1, 1, 1),
(1045, 'images/egresoscaja/2804520190816152626950.pdf', 'Beneficiario Externo', '2019-07-17', 49, 0, 0, 'VARIOS', 3, 10, 172000, 'COMBUSTIBLE', '2019-08-16 14:26:46', 1, 1, 1),
(1046, 'images/egresoscaja/2128320190816152637023.pdf', 'Beneficiario Externo', '2019-07-18', 49, 0, 0, 'peajes varios', 2, 7, 681400, 'PEAJES', '2019-08-16 14:27:36', 1, 1, 1),
(1047, 'images/egresoscaja/9685620190816162927736.pdf', 'Beneficiario Externo', '2019-07-26', 49, 0, 0, 'cristian parra', 3, 14, 400000, 'ESCOLTA', '2019-08-16 15:30:27', 1, 1, 1),
(1048, 'images/egresoscaja/860120190816163014304.pdf', 'Beneficiario Externo', '2019-07-27', 49, 0, 0, 'VARIOS', 3, 11, 165000, 'GASTOS VARIOS', '2019-08-16 15:32:54', 1, 1, 1),
(1049, 'images/egresoscaja/3276020190816163014304.pdf', 'Beneficiario Externo', '2019-07-30', 49, 0, 0, 'VARIOS', 3, 15, 188700, 'COMPRA DE REPUESTOS, PARQUEADERO Y OTROS', '2019-08-16 15:34:48', 1, 1, 1),
(1050, 'images/egresoscaja/8420720190816163025483.pdf', 'Beneficiario Externo', '2019-07-30', 49, 0, 0, 'VARIOS', 3, 10, 80000, 'COMBUSTIBLE', '2019-08-16 15:37:12', 1, 1, 1),
(1051, 'images/egresoscaja/7715320190816163034907.pdf', 'Beneficiario Externo', '2019-07-26', 49, 0, 0, 'CDA SUPER CARLA CARTAGENA', 3, 16, 299744, 'TECNICOMECANICA', '2019-08-16 15:38:13', 1, 1, 1),
(1052, 'images/egresoscaja/3583620190816163051755.pdf', 'Beneficiario Externo', '2019-07-26', 49, 0, 0, 'peajes varios', 2, 7, 618000, 'PEAJES', '2019-08-16 15:39:28', 1, 1, 1),
(1053, 'images/egresoscaja/6742520190816170359260.pdf', 'Beneficiario Externo', '2019-08-01', 49, 0, 0, 'VARIOS', 3, 15, 248000, 'COMPRA', '2019-08-16 16:04:39', 1, 1, 1),
(1054, 'images/egresoscaja/69506image.jpg', 'Beneficiario Externo', '2019-08-02', 49, 0, 0, 'Cda del caribe sas', 3, 16, 304800, 'Tecnicomecanica', '2019-08-16 16:07:11', 1, 1, 1),
(1055, 'images/egresoscaja/31748image.jpg', 'Beneficiario Externo', '2019-08-07', 49, 0, 0, 'Peaje', 2, 7, 38400, 'Peajes', '2019-08-16 16:09:18', 1, 1, 1),
(1056, 'images/egresoscaja/1233020190820113650495.pdf', 'Beneficiario Externo', '2019-08-10', 47, 0, 0, 'restaurante y lavadero la 4.5', 3, 12, 40000, 'lavado dtw 296', '2019-08-20 10:32:14', 1, 1, 1),
(1057, 'images/egresoscaja/7386820190820113642346.pdf', 'Beneficiario Externo', '2019-08-12', 47, 0, 0, 'buscatucarro', 3, 14, 70000, 'pago de gos', '2019-08-20 10:33:11', 1, 1, 1),
(1058, 'images/egresoscaja/953520190820113633791.pdf', 'Beneficiario Externo', '2019-08-10', 47, 0, 0, 'INTERRAPIDISIMO', 2, 6, 9500, 'ENVIO', '2019-08-20 10:33:58', 1, 1, 1),
(1059, 'images/egresoscaja/6614520190820113624847.pdf', 'Beneficiario Externo', '2019-08-15', 47, 0, 0, 'MUNDO COPIAS', 4, 17, 40200, 'PAPELERIA', '2019-08-20 10:34:38', 1, 1, 1),
(1060, 'images/egresoscaja/8978520190820113611874.pdf', 'Beneficiario Externo', '2019-08-07', 47, 0, 0, 'servientrega', 2, 6, 18700, 'ENVIO', '2019-08-20 10:35:32', 1, 1, 1),
(1061, 'images/egresoscaja/3732220190820113601427.pdf', 'Beneficiario Externo', '2019-08-10', 47, 0, 0, 'VARIOS', 2, 7, 85000, 'VIATICOS Y TRANSPORTES VARIOS', '2019-08-20 10:36:11', 1, 1, 1),
(1062, 'images/egresoscaja/3457220190820115303651.pdf', 'Beneficiario Externo', '2019-08-15', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 35000, 'VIATICOS Y RECARGA', '2019-08-20 10:47:44', 1, 1, 1),
(1063, 'images/egresoscaja/8357520190820115255700.pdf', 'Beneficiario Externo', '2019-08-15', 47, 0, 0, 'VARIOS', 2, 5, 289200, 'PAGO PLANES JD', '2019-08-20 10:49:04', 1, 1, 1),
(1064, 'images/egresoscaja/1966620190820115246197.pdf', 'Beneficiario Externo', '2019-08-15', 47, 0, 0, 'servientrega', 2, 6, 36000, 'ENVIO DE SE?ALIZACI?N', '2019-08-20 10:50:04', 1, 1, 1),
(1065, 'images/egresoscaja/5509720190820115236701.pdf', 'Beneficiario Externo', '2019-08-15', 47, 0, 0, 'CARSUCRE', 4, 17, 831006, 'PAGO DE CERTIFICADO AMBIENTAL', '2019-08-20 10:50:59', 1, 1, 1),
(1066, 'images/egresoscaja/6885020190821092710032.pdf', 'Beneficiario Externo', '2019-07-10', 50, 0, 0, 'peajes varios', 2, 7, 306800, 'peajes', '2019-08-21 08:22:31', 1, 1, 1),
(1067, 'images/egresoscaja/1705620190821092954865.pdf', 'Beneficiario Externo', '2019-07-19', 50, 0, 0, 'VARIOS', 5, 29, 47600, 'COMPRA', '2019-08-21 08:25:17', 1, 1, 1),
(1068, 'images/egresoscaja/2322020190821093003367.pdf', 'Beneficiario Externo', '2019-07-10', 50, 0, 0, 'francisco villega', 5, 29, 190000, 'COMPRA DE TABLAS', '2019-08-21 08:26:34', 1, 1, 1),
(1069, 'images/egresoscaja/1623120190821093012006.pdf', 'Beneficiario Externo', '2019-07-10', 50, 0, 0, 'peajes varios', 2, 7, 363600, 'PEAJES', '2019-08-21 08:29:04', 1, 1, 1),
(1070, 'images/egresoscaja/3496020190821100016833.pdf', 'Beneficiario Externo', '2019-07-07', 50, 0, 0, 'VARIOS', 3, 11, 82000, 'HOSPEDAJE DE OPERADOR', '2019-08-21 08:56:31', 1, 1, 1),
(1071, 'images/egresoscaja/3388720190821100027762.pdf', 'Beneficiario Externo', '2019-07-09', 50, 0, 0, 'VARIOS', 3, 15, 295000, 'COMPRA', '2019-08-21 08:58:00', 1, 1, 1),
(1072, 'images/egresoscaja/4925220190821100037222.pdf', 'Beneficiario Externo', '2019-07-09', 50, 0, 0, 'distribuidor el palacio de la pantalenta', 4, 19, 10000, 'COMPRA DE PA?UELOS JD', '2019-08-21 08:58:45', 1, 1, 1),
(1073, 'images/egresoscaja/7450320190821100045298.pdf', 'Beneficiario Externo', '2019-07-09', 50, 0, 0, 'zona de estacionamiento regulado', 2, 7, 8000, 'PARQUEADERO', '2019-08-21 08:59:32', 1, 1, 1),
(1074, 'images/egresoscaja/559220190821103236277.pdf', 'Beneficiario Externo', '2019-07-09', 50, 0, 0, 'VARIOS', 5, 29, 106000, 'COMPRA DE MATERIALES', '2019-08-21 09:30:20', 1, 1, 1),
(1075, 'images/egresoscaja/8593620190821103244338.pdf', 'Beneficiario Externo', '2019-07-04', 50, 0, 0, 'jose daniel meza', 4, 19, 15000, 'DESAYUNO JDMO', '2019-08-21 09:32:34', 1, 1, 1),
(1076, 'images/egresoscaja/6258120190821103252681.pdf', 'Beneficiario Externo', '2019-07-09', 50, 0, 0, 'TRANSITO', 3, 16, 30000, 'IMPRONTAS', '2019-08-21 09:33:17', 1, 1, 1),
(1077, 'images/egresoscaja/224020190821103305269.pdf', 'Beneficiario Externo', '2019-07-09', 50, 0, 0, 'VARIOS', 3, 15, 450000, 'COMPRA', '2019-08-21 09:35:56', 1, 1, 1),
(1078, 'images/egresoscaja/8663120190821103305269.pdf', 'Beneficiario Externo', '2019-07-09', 50, 0, 0, 'VARIOS', 3, 15, 450000, 'COMPRA', '2019-08-21 09:35:56', 1, 1, 1),
(1079, 'images/egresoscaja/8912120190822092248219.pdf', 'Beneficiario Externo', '2019-06-03', 5, 0, 0, 'nh royal la boheme', 4, 18, 408419, 'hospedaje', '2019-08-22 08:28:54', 1, 1, 1),
(1080, 'images/egresoscaja/3232420190822092257190.pdf', 'Beneficiario Externo', '2019-06-23', 5, 0, 0, 'la fragola', 4, 18, 69300, 'comida', '2019-08-22 08:30:10', 1, 1, 1),
(1081, 'images/egresoscaja/4977720190822092305236.pdf', 'Beneficiario Externo', '2019-07-28', 5, 0, 0, 'VARIOS', 3, 10, 399818, 'combustible', '2019-08-22 08:31:45', 1, 1, 1),
(1082, 'images/egresoscaja/358620190822092315036.pdf', 'Beneficiario Externo', '2019-07-23', 5, 0, 0, 'masser sas', 4, 18, 10300, 'comida', '2019-08-22 08:32:54', 1, 1, 1),
(1083, 'images/egresoscaja/5545120190822092325074.pdf', 'Beneficiario Externo', '2019-07-23', 5, 0, 0, 'cafe willys', 4, 18, 10300, 'comida', '2019-08-22 08:34:14', 1, 1, 1),
(1084, 'images/egresoscaja/8496520190822092333450.pdf', 'Beneficiario Externo', '2019-08-12', 5, 0, 0, 'julio navarro', 4, 22, 20000, 'PRESTAMO', '2019-08-22 08:35:59', 1, 1, 1),
(1085, 'images/egresoscaja/5232120190822092342338.pdf', 'Beneficiario Externo', '2019-06-20', 5, 0, 0, 'HOT AMERICAS', 4, 18, 55722, 'COMIDA', '2019-08-22 14:01:26', 1, 1, 1),
(1086, 'images/egresoscaja/8504720190822092350294.pdf', 'Beneficiario Externo', '2019-08-11', 5, 0, 0, 'UNITRASCO', 2, 7, 50000, 'PASAJE', '2019-08-22 14:06:07', 1, 1, 1),
(1087, 'images/egresoscaja/7716820190822092358433.pdf', 'Beneficiario Externo', '2019-07-22', 5, 0, 0, 'bidio tapia', 4, 22, 65000, 'PRESTAMO', '2019-08-22 14:06:56', 1, 1, 1),
(1088, 'images/egresoscaja/7131120190822092408052.pdf', 'Beneficiario Externo', '2019-07-16', 5, 0, 0, 'pasteur', 4, 18, 2600, 'COMPRA', '2019-08-22 14:07:43', 1, 1, 1),
(1089, 'images/egresoscaja/9474120190822092433511.pdf', 'Beneficiario Externo', '2019-07-21', 5, 0, 0, 'RAPIMERCAR', 4, 18, 11770, 'COMPRA', '2019-08-22 14:08:19', 1, 1, 1),
(1090, 'images/egresoscaja/3506320190822092443152.pdf', 'Beneficiario Externo', '2019-07-31', 5, 0, 0, 'RESTAURANTE EL FOGON SUAITANO', 4, 18, 25300, 'COMIDA', '2019-08-22 14:09:01', 1, 1, 1),
(1091, 'images/egresoscaja/454820190822092451271.pdf', 'Beneficiario Externo', '2019-07-06', 5, 0, 0, 'IRCC SAS', 4, 18, 67500, 'COMIDA', '2019-08-22 14:10:28', 1, 1, 1),
(1092, 'images/egresoscaja/6506020190822092459302.pdf', 'Beneficiario Externo', '2019-07-24', 5, 0, 0, 'HOTEL LAS HOLAS', 2, 7, 80000, 'HOSPEDAJE', '2019-08-22 14:11:33', 1, 1, 1),
(1093, 'images/egresoscaja/1615220190822092507395.pdf', 'Beneficiario Externo', '2019-07-30', 5, 0, 0, 'PARQUEADERO', 2, 7, 6000, 'PARQUEADERO', '2019-08-22 14:12:39', 1, 1, 1),
(1094, 'images/egresoscaja/868620190822092517153.pdf', 'Beneficiario Externo', '2019-08-16', 5, 0, 0, 'PANAMERICANA', 4, 18, 397550, 'COMPRA', '2019-08-22 14:13:49', 1, 1, 1),
(1095, 'images/egresoscaja/3038420190822092525409.pdf', 'Beneficiario Externo', '2019-08-15', 5, 0, 0, 'FRANQUICIAS Y CONCESIONES SAS', 4, 18, 23500, 'COMIDA', '2019-08-22 14:15:20', 1, 1, 1),
(1096, 'images/egresoscaja/9161120190822092533763.pdf', 'Beneficiario Externo', '2019-07-16', 5, 0, 0, 'la cajita', 4, 18, 130900, 'COMIDA', '2019-08-22 14:16:20', 1, 1, 1),
(1097, 'images/egresoscaja/6485220190822092541898.pdf', 'Beneficiario Externo', '2019-08-01', 5, 0, 0, 'la cajita', 4, 18, 129800, 'COMIDA', '2019-08-22 14:16:48', 1, 1, 1),
(1098, 'images/egresoscaja/6853120190822092550182.pdf', 'Beneficiario Externo', '2019-07-31', 5, 0, 0, 'hostal las olas', 2, 7, 80000, 'HOSPEDAJE', '2019-08-22 14:17:18', 1, 1, 1),
(1099, 'images/egresoscaja/2314820190822092602484.pdf', 'Beneficiario Externo', '2019-07-31', 5, 0, 0, 'HOTEL LAS OLAS', 4, 18, 80000, 'HOSPEDAJE', '2019-08-22 14:17:58', 1, 1, 1),
(1100, 'images/egresoscaja/7701620190822092610541.pdf', 'Beneficiario Externo', '2019-08-17', 5, 0, 0, 'masser sas', 4, 18, 158575, 'COMIDA', '2019-08-22 14:19:02', 1, 1, 1),
(1101, 'images/egresoscaja/5501620190822092618727.pdf', 'Beneficiario Externo', '2019-08-20', 5, 0, 0, 'PETROMIL', 3, 10, 100000, 'COMBUSTIBLE DTW 296', '2019-08-22 14:19:30', 1, 1, 1),
(1102, 'images/egresoscaja/5826720190822092628420.pdf', 'Beneficiario Externo', '2019-08-15', 5, 0, 0, 'caribe plaza comercial', 2, 7, 6000, 'PARQUEADERO', '2019-08-22 14:20:15', 1, 1, 1),
(1103, 'images/egresoscaja/2248420190822092636860.pdf', 'Beneficiario Externo', '2019-08-16', 5, 0, 0, 'caribe plaza comercial', 2, 7, 12000, 'PARQUEADERO', '2019-08-22 14:21:05', 1, 1, 1),
(1104, 'images/egresoscaja/2793720190822092645079.pdf', 'Beneficiario Externo', '2019-08-04', 5, 0, 0, 'RESTCAFE', 4, 18, 12100, 'COMPRA', '2019-08-22 14:21:58', 1, 1, 1),
(1105, 'images/egresoscaja/1948120190822092653905.pdf', 'Beneficiario Externo', '2019-08-20', 5, 0, 0, 'la cajita', 4, 18, 31900, 'COMIDA', '2019-08-22 14:22:44', 1, 1, 1),
(1106, 'images/egresoscaja/5220820190822092704401.pdf', 'Beneficiario Externo', '2019-07-30', 5, 0, 0, 'LA CASA DE LAS CARNES', 4, 18, 81114, 'COMIDA', '2019-08-22 14:23:25', 1, 1, 1),
(1107, 'images/egresoscaja/2765120190822092721919.pdf', 'Beneficiario Externo', '2019-08-08', 5, 0, 0, 'PATACON CON TODO C CIAL PLAZA', 4, 18, 17900, 'COMIDA', '2019-08-22 14:24:15', 1, 1, 1),
(1108, 'images/egresoscaja/4073320190822092729863.pdf', 'Beneficiario Externo', '2019-07-31', 5, 0, 0, 'FRANQUICIAS Y CONCESIONES SAS', 4, 18, 19900, 'COMPRA', '2019-08-22 14:26:28', 1, 1, 1),
(1109, 'images/egresoscaja/2025720190822092738036.pdf', 'Beneficiario Externo', '2019-08-17', 5, 0, 0, 'masser sas', 4, 18, 158575, 'COMIDA', '2019-08-22 14:27:32', 1, 1, 1),
(1110, 'images/egresoscaja/9426120190822092746269.pdf', 'Beneficiario Externo', '2019-07-15', 5, 0, 0, 'ALKOSTO', 4, 18, 48900, 'COMPRA', '2019-08-22 14:28:08', 1, 1, 1),
(1111, 'images/egresoscaja/2793420190822092755433.pdf', 'Beneficiario Externo', '2019-08-22', 5, 0, 0, 'OLIVA PANADERIA', 4, 18, 84130, 'COMIDA', '2019-08-22 14:28:37', 1, 1, 1),
(1112, 'images/egresoscaja/5093120190822092803761.pdf', 'Beneficiario Externo', '2019-07-30', 5, 0, 0, 'RESTAURANTE EL FOGON SUAITANO', 4, 18, 35100, 'COMIDA', '2019-08-22 14:29:36', 1, 1, 1),
(1113, 'images/egresoscaja/6312820190822092812535.pdf', 'Beneficiario Externo', '2019-08-20', 5, 0, 0, 'peajes varios', 2, 7, 98900, 'PEAJES', '2019-08-22 14:30:20', 1, 1, 1),
(1114, 'images/egresoscaja/24720190822092826551.pdf', 'Beneficiario Externo', '2019-08-15', 5, 0, 0, 'peajes varios', 2, 7, 155400, 'PEAJES', '2019-08-22 14:31:14', 1, 1, 1),
(1115, 'images/egresoscaja/7313620190822092836213.pdf', 'Beneficiario Externo', '2019-08-19', 5, 0, 0, 'peajes varios', 2, 7, 218500, 'PEAJES', '2019-08-22 14:31:51', 1, 1, 1),
(1116, 'images/egresoscaja/8561720190822092844346.pdf', 'Beneficiario Externo', '2019-08-22', 5, 0, 0, 'peajes varios', 2, 7, 163200, 'PEAJES', '2019-08-22 14:32:29', 1, 1, 1),
(1117, 'images/egresoscaja/3942020190822092852513.pdf', 'Beneficiario Externo', '2019-08-12', 5, 0, 0, 'peajes varios', 2, 7, 107500, 'PEAJES', '2019-08-22 14:33:14', 1, 1, 1),
(1118, 'images/egresoscaja/6606820190822092900495.pdf', 'Beneficiario Externo', '2019-08-03', 5, 0, 0, 'peajes varios', 2, 7, 33900, 'PEAJES', '2019-08-22 14:33:47', 1, 1, 1),
(1119, 'images/egresoscaja/8788620190822092908664.pdf', 'Beneficiario Externo', '2019-08-08', 5, 0, 0, 'peajes varios', 2, 7, 70300, 'PEAJES', '2019-08-22 14:34:30', 1, 1, 1),
(1120, 'images/egresoscaja/682820190822092916889.pdf', 'Beneficiario Externo', '2019-08-10', 5, 0, 0, 'peajes varios', 2, 7, 72900, 'PEAJES', '2019-08-22 14:35:54', 1, 1, 1),
(1121, 'images/egresoscaja/71236no.png', 'Beneficiario Externo', '2019-05-30', 5, 0, 0, 'varios', 4, 18, 11823052, 'peajes legalizados por cuenta de obinco', '2019-08-24 09:59:21', 1, 1, 1),
(1122, 'images/egresoscaja/8048120190824111957697.pdf', 'Beneficiario Externo', '2019-08-24', 5, 0, 0, 'VARIOS', 4, 18, 608510, 'GASTOS DE COMIDA', '2019-08-24 10:15:34', 1, 1, 1),
(1123, 'images/egresoscaja/1475020190824112006204.pdf', 'Beneficiario Externo', '2019-08-24', 5, 0, 0, 'peaje la esperanza', 2, 7, 49200, 'PEAJES', '2019-08-24 10:16:22', 1, 1, 1),
(1124, 'images/egresoscaja/6170120190924115642796.pdf', 'Beneficiario Externo', '2019-09-05', 49, 0, 0, 'VARIOS', 3, 15, 1001760, 'VARIOS', '2019-09-24 10:53:50', 1, 1, 1),
(1125, 'images/egresoscaja/3450520190924115654295.pdf', 'Beneficiario Externo', '2019-09-05', 49, 0, 0, 'peajes varios', 2, 7, 732400, 'PEAJES', '2019-09-24 10:54:51', 1, 1, 1),
(1127, 'images/egresoscaja/1751420190924130113815.pdf', 'Beneficiario Externo', '2019-09-12', 49, 0, 0, 'VARIOS', 3, 15, 804143, 'COMPRA DE REPUESTOS VARIOS', '2019-09-24 11:56:21', 1, 1, 1),
(1128, 'images/egresoscaja/7224520190924130133790.pdf', 'Beneficiario Externo', '2019-09-12', 49, 0, 0, 'llanteria el amigo', 3, 13, 114000, 'MECANICO', '2019-09-24 11:58:05', 1, 1, 1),
(1129, 'images/egresoscaja/9945220190924130631253.pdf', 'Beneficiario Externo', '2019-09-12', 49, 0, 0, 'avianca', 2, 6, 48600, 'ENVIO', '2019-09-24 12:00:40', 1, 1, 1),
(1130, 'images/egresoscaja/2940020190924130640390.pdf', 'Beneficiario Externo', '2019-09-12', 49, 0, 0, 'VARIOS', 3, 10, 70000, 'COMBUSTIBLE', '2019-09-24 12:01:21', 1, 1, 1),
(1131, 'images/egresoscaja/4795820190924130651882.pdf', 'Beneficiario Externo', '2019-09-12', 49, 0, 0, 'peajes varios', 2, 7, 380500, 'PEAJES', '2019-09-24 12:01:57', 1, 1, 1),
(1132, 'images/egresoscaja/7933720190924130944816.pdf', 'Beneficiario Externo', '2019-09-12', 49, 0, 0, 'VARIOS', 4, 17, 581000, 'GASTOS VARIOS', '2019-09-24 12:03:39', 1, 1, 1),
(1134, 'images/egresoscaja/4031520190924133226411.pdf', 'Beneficiario Externo', '2019-09-18', 49, 0, 0, 'VARIOS', 5, 30, 158000, 'GASTOS VARIOS', '2019-09-24 12:28:43', 1, 1, 1),
(1135, 'images/egresoscaja/1933620190924133238584.pdf', 'Beneficiario Externo', '2019-09-18', 49, 54, 54, 'VARIOS', 3, 13, 988500, 'MECANICOS Y DEMAS', '2019-09-24 12:30:41', 1, 1, 1),
(1136, 'images/egresoscaja/8514020190924133247200.pdf', 'Beneficiario Externo', '2019-09-14', 49, 0, 0, 'RETICAR', 3, 15, 240000, 'COMPRA', '2019-09-24 12:32:14', 1, 1, 1),
(1137, 'images/egresoscaja/9517820190924133255165.pdf', 'Beneficiario Externo', '2019-09-14', 49, 0, 0, 'VIDAGAS', 3, 15, 170000, 'COMPRA DE CILINDRO', '2019-09-24 12:33:06', 1, 1, 1),
(1138, 'images/egresoscaja/7506320190924133314516.pdf', 'Beneficiario Externo', '2019-09-18', 49, 0, 0, 'peajes varios', 2, 7, 295600, 'PEAJES', '2019-09-24 12:33:48', 1, 1, 1),
(1139, 'images/egresoscaja/76766CUENTRA DE COBRO 086, 2 EQUIVALENTES DE ARENA (1).pdf', 'Beneficiario Externo', '2019-09-18', 49, 0, 0, 'gea laboratorio', 5, 30, 150000, 'laboratorio', '2019-09-24 14:33:58', 1, 1, 1),
(1140, 'images/egresoscaja/3680820190924170138456.pdf', 'Beneficiario Externo', '2019-09-20', 49, 0, 0, 'VARIOS', 2, 7, 615300, 'PEAJES', '2019-09-24 15:56:39', 1, 1, 1),
(1141, 'images/egresoscaja/4101820190924170156956.pdf', 'Beneficiario Externo', '2019-09-20', 49, 0, 0, 'VARIOS', 3, 13, 370000, 'MECANICOS', '2019-09-24 15:57:57', 1, 1, 1),
(1142, 'images/egresoscaja/1224120190924170214851.pdf', 'Beneficiario Externo', '2019-09-20', 49, 0, 0, 'VARIOS', 5, 29, 752800, 'COMPRA DE MATERIALES ADECUACION', '2019-09-24 15:59:27', 1, 1, 1),
(1143, 'images/egresoscaja/6030720190924170222920.pdf', 'Beneficiario Externo', '2019-09-20', 49, 0, 0, 'comercializadora de combustible del caribe', 3, 10, 56000, 'COMBUSTIBLE', '2019-09-24 16:01:29', 1, 1, 1),
(1144, 'images/egresoscaja/7530120190924170236076.pdf', 'Beneficiario Externo', '2019-09-20', 49, 0, 0, 'VARIOS', 5, 30, 205900, 'VARIOS', '2019-09-24 16:03:15', 1, 1, 1),
(1145, 'images/egresoscaja/8992020190928101859516.pdf', 'Beneficiario Externo', '2019-09-28', 5, 0, 0, 'peajes varios', 2, 7, 741800, 'peajes varios', '2019-09-28 09:14:07', 1, 1, 1),
(1146, 'images/egresoscaja/5513020190928102208887.pdf', 'Beneficiario Externo', '2019-09-28', 5, 0, 0, 'VARIOS', 2, 7, 739610, 'pasajes avianca y transportes gonzalez', '2019-09-28 09:18:02', 1, 1, 1),
(1147, 'images/egresoscaja/6270020190928102218254.pdf', 'Beneficiario Externo', '2019-09-28', 5, 0, 0, 'VARIOS', 4, 18, 511426, 'otros gastos', '2019-09-28 09:19:09', 1, 1, 1),
(1148, 'images/egresoscaja/7287420190928102227568.pdf', 'Beneficiario Externo', '2019-09-28', 5, 0, 0, 'hotel florida blanca', 2, 7, 1055617, 'hospedaje', '2019-09-28 09:20:09', 1, 1, 1),
(1149, 'images/egresoscaja/4280320190928102242352.pdf', 'Beneficiario Externo', '2019-09-28', 5, 0, 0, 'VARIOS', 3, 10, 1137841, 'combustible', '2019-09-28 09:21:16', 1, 1, 1),
(1150, 'images/egresoscaja/1808320190928102317845.pdf', 'Beneficiario Externo', '2019-09-28', 5, 0, 0, 'VARIOS', 4, 18, 369048, 'gastos varios', '2019-09-28 09:22:53', 1, 1, 1),
(1151, 'images/egresoscaja/2088920190928102357140.pdf', 'Beneficiario Externo', '2019-09-28', 5, 0, 0, 'VARIOS', 4, 18, 1021776, 'comidas', '2019-09-28 09:23:56', 1, 1, 1),
(1152, 'images/egresoscaja/1021920190928102411494.pdf', 'Beneficiario Externo', '2019-08-29', 5, 0, 0, 'cinemark', 4, 19, 5750, 'boleta', '2019-09-28 09:25:32', 1, 1, 1),
(1153, 'images/egresoscaja/5692720190928102411494.pdf', 'Beneficiario Externo', '2019-08-29', 5, 0, 0, 'cinemark', 4, 19, 5750, 'boleta', '2019-09-28 09:25:32', 1, 1, 1),
(1154, 'images/egresoscaja/1362420190928102411494.pdf', 'Beneficiario Externo', '2019-08-29', 5, 0, 0, 'cinemark', 4, 19, 5750, 'boleta', '2019-09-28 09:25:32', 1, 1, 1),
(1155, 'images/egresoscaja/9843020190930114633764.pdf', 'Beneficiario Externo', '2019-09-30', 47, 0, 0, 'VARIOS', 2, 7, 32000, 'pago viaticos ing juan gabriel y aseadora', '2019-09-30 10:41:16', 1, 1, 1),
(1156, 'images/egresoscaja/4117520190930114633764.pdf', 'Beneficiario Externo', '2019-09-30', 47, 0, 0, 'VARIOS', 2, 7, 32000, 'pago viaticos ing juan gabriel y aseadora', '2019-09-30 10:41:16', 1, 1, 1),
(1157, 'images/egresoscaja/8557520190930114644299.pdf', 'Beneficiario Externo', '2019-09-30', 47, 0, 0, 'cerrajer?a Yale', 4, 17, 6000, 'duplicado', '2019-09-30 10:46:17', 1, 1, 1),
(1158, 'images/egresoscaja/7030320190930114652696.pdf', 'Beneficiario Externo', '2019-09-30', 47, 0, 0, 'CARSUCRE', 4, 17, 178773, 'pago', '2019-09-30 10:46:55', 1, 1, 1),
(1159, 'images/egresoscaja/5055120190930114701054.pdf', 'Beneficiario Externo', '2019-09-30', 47, 0, 0, 'tigo', 2, 5, 100000, 'PLAN TIGO JD', '2019-09-30 10:48:43', 1, 1, 1),
(1160, 'images/egresoscaja/1202420191015124222512.pdf', 'Beneficiario Externo', '2019-10-15', 49, 0, 0, 'peajes varios', 2, 7, 602200, 'peajes varios', '2019-10-15 14:08:18', 1, 1, 1),
(1161, 'images/egresoscaja/8145220191015124233666.pdf', 'Beneficiario Externo', '2019-10-15', 49, 0, 0, 'VARIOS', 3, 10, 279310, 'combustible', '2019-10-15 14:10:12', 1, 1, 1),
(1162, 'images/egresoscaja/8787320191015124257760.pdf', 'Beneficiario Externo', '2019-09-30', 49, 0, 0, 'digabe del caribe y cia ltda', 3, 12, 38000, 'compra de filtro', '2019-10-15 14:27:31', 1, 1, 1),
(1163, 'images/egresoscaja/4581620191015124305946.pdf', 'Beneficiario Externo', '2019-10-01', 49, 0, 0, 'la troncal aj', 3, 9, 80000, 'alquiler de planta electrica', '2019-10-15 14:29:05', 1, 1, 1),
(1164, 'images/egresoscaja/3921620191015124314746.pdf', 'Beneficiario Externo', '2019-09-23', 49, 0, 0, 'centro repuestos', 3, 15, 50000, 'compra', '2019-10-15 14:30:24', 1, 1, 1),
(1165, 'images/egresoscaja/508820191015124330978.pdf', 'Beneficiario Externo', '2019-09-30', 49, 0, 0, 'serviluke', 3, 12, 65000, 'lavado camioneta  negra', '2019-10-15 14:33:20', 1, 1, 1),
(1166, 'images/egresoscaja/8061620191015124342391.pdf', 'Beneficiario Externo', '2019-09-27', 49, 0, 0, 'almacen mangueras y partes', 3, 15, 183000, 'repuestos', '2019-10-15 14:35:24', 1, 1, 1),
(1167, 'images/egresoscaja/9563720191015124354682.pdf', 'Beneficiario Externo', '2019-10-15', 49, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 152000, 'mecanico', '2019-10-15 14:36:22', 1, 1, 1),
(1168, 'images/egresoscaja/3953320191015124418283.pdf', 'Beneficiario Externo', '2019-09-25', 49, 0, 0, 'electricas la union', 5, 30, 91000, 'compra', '2019-10-15 14:37:33', 1, 1, 1),
(1169, 'images/egresoscaja/1695420191015124426215.pdf', 'Beneficiario Externo', '2019-09-24', 49, 0, 0, 'maderas y muebles la bendici?n de Dios', 5, 29, 39000, 'compra listones de madera', '2019-10-15 14:38:41', 1, 1, 1),
(1170, 'images/egresoscaja/2678220191015124434143.pdf', 'Beneficiario Externo', '2019-09-26', 49, 0, 0, 'electricos la 18', 5, 30, 63000, 'compra de lamparas', '2019-10-15 14:39:37', 1, 1, 1),
(1171, 'images/egresoscaja/1081720191015124442148.pdf', 'Beneficiario Externo', '2019-09-27', 49, 0, 0, 'triturados romar', 5, 29, 55000, 'compra de bloques', '2019-10-15 14:40:40', 1, 1, 1),
(1172, 'images/egresoscaja/6383320191015124450600.pdf', 'Beneficiario Externo', '2019-09-26', 49, 0, 0, 'mafre', 5, 29, 22500, 'compra', '2019-10-15 14:42:46', 1, 1, 1),
(1173, 'images/egresoscaja/3845120191015124458587.pdf', 'Beneficiario Externo', '2019-09-26', 49, 0, 0, 'romova', 5, 30, 27600, 'compra', '2019-10-15 14:43:31', 1, 1, 1),
(1174, 'images/egresoscaja/3535820191015124508305.pdf', 'Beneficiario Externo', '2019-09-20', 49, 0, 0, 'ferreter?a laminas y metales S.A.S.', 5, 29, 155000, 'compra', '2019-10-15 14:44:11', 1, 1, 1),
(1175, 'images/egresoscaja/2605520191015124519697.pdf', 'Beneficiario Externo', '2019-09-25', 49, 0, 0, 'torfer mde', 3, 12, 48765, 'compra', '2019-10-15 14:46:28', 1, 1, 1),
(1176, 'images/egresoscaja/8333220191015124527696.pdf', 'Beneficiario Externo', '2019-09-27', 49, 0, 0, 'ferreteria el centavo menos', 5, 29, 22000, 'compra', '2019-10-15 14:47:31', 1, 1, 1),
(1177, 'images/egresoscaja/2016820191015124536995.pdf', 'Beneficiario Externo', '2019-09-30', 49, 0, 0, 'comercial toluviejo', 5, 30, 14000, 'COMPRA', '2019-10-15 14:48:34', 1, 1, 1),
(1178, 'images/egresoscaja/8923420191015124608331.pdf', 'Beneficiario Externo', '2019-10-15', 49, 0, 0, 'VARIOS', 3, 11, 48500, 'VARIOS', '2019-10-15 14:49:24', 1, 1, 1),
(1179, 'images/egresoscaja/8265420191015124616454.pdf', 'Beneficiario Externo', '2019-10-15', 49, 0, 0, 'VARIOS', 3, 14, 15700, 'PARQUEO', '2019-10-15 14:51:10', 1, 1, 1),
(1180, 'images/egresoscaja/5835520191015124624682.pdf', 'Beneficiario Externo', '2019-10-02', 49, 0, 0, 'SOTRACOR', 2, 7, 30000, 'PASAJE', '2019-10-15 14:52:06', 1, 1, 1);
INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(1181, 'images/egresoscaja/5565520191015124633309.pdf', 'Beneficiario Externo', '2019-09-30', 49, 0, 0, 'CAMARA DE COMERCIO', 4, 17, 23200, 'CAMARA DE COMERCIO RUCOM', '2019-10-15 14:52:49', 1, 1, 1),
(1182, 'images/egresoscaja/5757720191015124645927.pdf', 'Beneficiario Externo', '2019-10-15', 49, 0, 0, 'VARIOS', 2, 7, 396000, 'VIATICOS Y GASTOS VARIOS EMPLEADOS', '2019-10-15 14:54:26', 1, 1, 1),
(1183, 'images/egresoscaja/712920191030145732066.pdf', 'Beneficiario Externo', '2019-10-30', 5, 0, 0, 'peajes varios', 2, 7, 404200, 'PEAJES', '2019-10-30 13:52:02', 1, 1, 1),
(1184, 'images/egresoscaja/150020191030145741466.pdf', 'Beneficiario Externo', '2019-10-17', 5, 0, 0, 'zona de estacionamiento regulado', 2, 7, 2000, 'PARQUEO', '2019-10-30 13:55:09', 1, 1, 1),
(1185, 'images/egresoscaja/7578120191030145750073.pdf', 'Beneficiario Externo', '2019-10-30', 5, 0, 0, 'VARIOS', 3, 10, 461183, 'COMBUSTIBLE', '2019-10-30 13:56:07', 1, 1, 1),
(1186, 'images/egresoscaja/4748820191030150502352.pdf', 'Beneficiario Externo', '2019-10-30', 5, 0, 0, 'VARIOS', 4, 18, 1573350, 'GASTOS DE COMIDAS', '2019-10-30 13:58:20', 1, 1, 1),
(1187, 'images/egresoscaja/7115020191031153600641.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'AUTO BERLIN', 3, 15, 480482, 'COMPRA', '2019-10-31 14:32:19', 1, 1, 1),
(1188, 'images/egresoscaja/7053020191031153621144.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'almacen tractocamiones', 3, 15, 111000, 'COMPRA', '2019-10-31 14:35:42', 1, 1, 1),
(1189, 'images/egresoscaja/3806720191031153643705.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 240000, 'MECANICOS', '2019-10-31 14:37:12', 1, 1, 1),
(1190, 'images/egresoscaja/3416020191031153652638.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'comercial toluviejo', 3, 12, 26700, 'INSUMOS', '2019-10-31 14:38:06', 1, 1, 1),
(1191, 'images/egresoscaja/4333620191031153704797.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'ferreter?a laminas y metales S.A.S.', 5, 29, 155000, 'COMPRA', '2019-10-31 14:39:00', 1, 1, 1),
(1192, 'images/egresoscaja/1695620191031153716330.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'romova', 5, 29, 600000, 'COMPRA', '2019-10-31 14:39:41', 1, 1, 1),
(1193, 'images/egresoscaja/8939720191031153728715.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'COMPUTADORES DE LA COST', 4, 17, 15000, 'ARREGLO DE PC', '2019-10-31 14:40:22', 1, 1, 1),
(1194, 'images/egresoscaja/7309520191031153737917.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'variedades y tecnologia shaday', 4, 17, 14000, 'IMPRESION Y PAPELERIA', '2019-10-31 14:41:09', 1, 1, 1),
(1195, 'images/egresoscaja/5798220191031153748124.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'EXPRESO BRASILIA', 2, 7, 35000, 'PASAJE', '2019-10-31 14:41:53', 1, 1, 1),
(1196, 'images/egresoscaja/6751420191031153756367.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'distracom', 3, 12, 4300, 'PARQUEO', '2019-10-31 14:42:33', 1, 1, 1),
(1197, 'images/egresoscaja/415420191031153805512.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'zona de estacionamiento regulado', 3, 12, 8000, 'PARQUEO', '2019-10-31 14:43:23', 1, 1, 1),
(1198, 'images/egresoscaja/6964820191031153815800.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'empleados obinco', 3, 11, 166700, 'GASTOS', '2019-10-31 14:44:21', 1, 1, 1),
(1199, 'images/egresoscaja/8064120191031153826354.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'peajes varios', 2, 7, 325100, 'PEAJES', '2019-10-31 14:45:08', 1, 1, 1),
(1200, 'images/egresoscaja/7107120191031153836817.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'MOISES MANUEL PACHECO', 3, 13, 1800000, 'ARREGLOS RETRO', '2019-10-31 14:45:50', 1, 1, 1),
(1201, 'images/egresoscaja/3899420191031155738109.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'peajes varios', 2, 7, 601400, 'PEAJES', '2019-10-31 14:55:00', 1, 1, 1),
(1202, 'images/egresoscaja/8172220191031155754359.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'VARIOS', 3, 10, 317310, 'COMBUSTIBLE', '2019-10-31 14:56:37', 1, 1, 1),
(1203, 'images/egresoscaja/9193920191031155817981.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'VARIOS', 3, 13, 550000, 'VARIOS', '2019-10-31 14:57:34', 1, 1, 1),
(1204, 'images/egresoscaja/2349920191031155826208.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'serviluke', 3, 12, 65000, 'LAVADO', '2019-10-31 14:59:01', 1, 1, 1),
(1205, 'images/egresoscaja/4876620191031155834226.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'almacen mangueras y partes', 3, 15, 183000, 'COMPRA', '2019-10-31 15:00:11', 1, 1, 1),
(1206, 'images/egresoscaja/4987420191031155855059.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 152000, 'mecanico', '2019-10-31 15:02:12', 1, 1, 1),
(1207, 'images/egresoscaja/9886720191031155912132.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'electricas la union', 3, 15, 91000, 'compra', '2019-10-31 15:03:07', 1, 1, 1),
(1208, 'images/egresoscaja/7769320191031155920848.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'maderas y muebles la bendici?n de Dios', 5, 29, 39000, 'compra de listones', '2019-10-31 15:03:53', 1, 1, 1),
(1209, 'images/egresoscaja/6170820191031155931891.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'electricos la 18', 3, 15, 63000, 'compra', '2019-10-31 15:04:34', 1, 1, 1),
(1210, 'images/egresoscaja/9787820191031155941195.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'romova', 5, 29, 55000, 'compra de bloques', '2019-10-31 15:05:12', 1, 1, 1),
(1211, 'images/egresoscaja/8155320191031155952370.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'ferreteria y materiales mafre', 5, 29, 22500, 'compra', '2019-10-31 15:06:00', 1, 1, 1),
(1212, 'images/egresoscaja/2044520191031160000478.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'romova', 5, 29, 27600, 'compra de tablas', '2019-10-31 15:06:49', 1, 1, 1),
(1213, 'images/egresoscaja/2778520191031160009737.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'ferreter?a laminas y metales S.A.S.', 5, 29, 155000, 'compra de laminas', '2019-10-31 15:07:31', 1, 1, 1),
(1214, 'images/egresoscaja/19220191031160021718.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'torfer mde', 5, 30, 48765, 'compra', '2019-10-31 15:08:07', 1, 1, 1),
(1215, 'images/egresoscaja/355920191031160029980.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'ferreteria el centavo menos', 5, 29, 22000, 'compra', '2019-10-31 15:09:34', 1, 1, 1),
(1216, 'images/egresoscaja/1096120191031160041098.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'comercial toluviejo', 3, 12, 14000, 'insumos', '2019-10-31 15:10:11', 1, 1, 1),
(1217, 'images/egresoscaja/3907820191031160110465.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'varios', 3, 11, 48500, 'gastos', '2019-10-31 15:11:03', 1, 1, 1),
(1218, 'images/egresoscaja/1951320191031160122409.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'varios', 3, 14, 45700, 'varios', '2019-10-31 15:12:10', 1, 1, 1),
(1219, 'images/egresoscaja/6197120191031160132439.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'CAMARA DE COMERCIO', 4, 17, 23200, 'certificados', '2019-10-31 15:13:23', 1, 1, 1),
(1220, 'images/egresoscaja/5169320191031160151674.pdf', 'Beneficiario Externo', '2019-10-03', 49, 0, 0, 'empleados obinco', 3, 11, 396000, 'varios', '2019-10-31 15:14:12', 1, 1, 1),
(1221, 'images/egresoscaja/3546520191031165345478.pdf', 'Beneficiario Externo', '2019-10-20', 49, 0, 0, 'peajes varios', 2, 7, 128600, 'peajes', '2019-10-31 15:47:52', 1, 1, 1),
(1222, 'images/egresoscaja/5670620191031165353755.pdf', 'Beneficiario Externo', '2019-10-20', 49, 0, 0, 'VARIOS', 3, 11, 10200, 'varios', '2019-10-31 15:49:34', 1, 1, 1),
(1223, 'images/egresoscaja/4750620191031165402635.pdf', 'Beneficiario Externo', '2019-10-20', 49, 0, 0, 'varios', 3, 15, 80000, 'compra', '2019-10-31 15:50:15', 1, 1, 1),
(1224, 'images/egresoscaja/315620191031165410749.pdf', 'Beneficiario Externo', '2019-10-20', 49, 0, 0, 'ferreteria el centavo menos', 5, 29, 2500, 'compra', '2019-10-31 15:51:05', 1, 1, 1),
(1225, 'images/egresoscaja/8789520191031165418720.pdf', 'Beneficiario Externo', '2019-10-20', 49, 0, 0, 'zona de estacionamiento regulado', 3, 14, 6000, 'parquep', '2019-10-31 15:51:43', 1, 1, 1),
(1226, 'images/egresoscaja/3659320191031165427432.pdf', 'Beneficiario Externo', '2019-10-20', 49, 0, 0, 'agro partes cat', 3, 15, 600000, 'compra de cadena 336', '2019-10-31 15:52:24', 1, 1, 1),
(1227, 'images/egresoscaja/5955020191031165435490.pdf', 'Beneficiario Externo', '2019-10-20', 49, 0, 0, 'codecsa', 5, 29, 130000, 'compra de materiales riego', '2019-10-31 15:53:15', 1, 1, 1),
(1228, 'images/egresoscaja/1814220191108140710876.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'peajes varios', 2, 7, 128600, 'peajes', '2019-11-08 14:03:36', 1, 1, 1),
(1229, 'images/egresoscaja/3806120191108140720168.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'VARIOS', 3, 11, 10200, 'COMPRA DE AGUA', '2019-11-08 14:05:26', 1, 1, 1),
(1230, 'images/egresoscaja/7588520191108140729969.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'VARIOS', 3, 12, 80000, 'COMPRA DE CAPSULA Y ARMADO DE UN PASO E LA CADENA', '2019-11-08 14:06:22', 1, 1, 1),
(1231, 'images/egresoscaja/5368620191108140738373.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'ferreteria el centavo menos', 5, 29, 2500, 'COMPRA', '2019-11-08 14:07:39', 1, 1, 1),
(1232, 'images/egresoscaja/7572720191108140746533.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'zona de estacionamiento regulado', 3, 14, 6000, 'PARQUEO', '2019-11-08 14:08:23', 1, 1, 1),
(1233, 'images/egresoscaja/854820191108140755463.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'agro partes cat', 3, 15, 600000, 'COMPRA DE PASO CADENA 336D', '2019-11-08 14:09:09', 1, 1, 1),
(1234, 'images/egresoscaja/9437320191108140843803.pdf', 'Beneficiario Externo', '2019-10-11', 49, 0, 0, 'codecsa', 3, 12, 130000, 'COMPRA', '2019-11-08 14:10:13', 1, 1, 1),
(1235, 'images/egresoscaja/8941420191108142705545.pdf', 'Beneficiario Externo', '2019-10-02', 49, 0, 0, 'VARIOS', 3, 12, 88400, 'compras', '2019-11-08 14:22:50', 1, 1, 1),
(1236, 'images/egresoscaja/6808020191108142730711.pdf', 'Beneficiario Externo', '2019-10-02', 49, 0, 0, 'VARIOS', 3, 13, 201000, 'mantenimientos', '2019-11-08 14:24:19', 1, 1, 1),
(1237, 'images/egresoscaja/3452820191108142739017.pdf', 'Beneficiario Externo', '2019-10-02', 49, 0, 0, 'CDA DEL CARIBE SAS', 3, 16, 304500, 'tecnicomecanica', '2019-11-08 14:25:12', 1, 1, 1),
(1238, 'images/egresoscaja/9590620191108142809685.pdf', 'Beneficiario Externo', '2019-11-02', 49, 0, 0, 'zona de estacionamiento regulado', 3, 14, 2000, 'parqueo', '2019-11-08 14:26:12', 1, 1, 1),
(1239, 'images/egresoscaja/1091320191108142809685.pdf', 'Beneficiario Externo', '2019-10-02', 49, 0, 0, 'VARIOS', 3, 11, 40270, 'varios', '2019-11-08 14:26:57', 1, 1, 1),
(1240, 'images/egresoscaja/8842020191108142817483.pdf', 'Beneficiario Externo', '2019-10-05', 49, 0, 0, 'codecsa', 5, 30, 9500, 'compra', '2019-11-08 14:28:44', 1, 1, 1),
(1241, 'images/egresoscaja/300820191108142827707.pdf', 'Beneficiario Externo', '2019-10-05', 49, 0, 0, 'peajes varios', 2, 7, 320000, 'peajes', '2019-11-08 14:29:30', 1, 1, 1),
(1242, 'images/egresoscaja/12665image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Taller la troncal', 3, 15, 600000, 'Arreglo volquete SXW794', '2019-11-08 14:46:46', 1, 1, 1),
(1243, 'images/egresoscaja/55426image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Almac?n l?mparas y suspensi?n', 3, 15, 50000, 'Stops volquetes SXW-794', '2019-11-08 14:49:53', 1, 1, 1),
(1244, 'images/egresoscaja/37557image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Nacional de recores y correas', 3, 15, 10000, 'Manguera retro', '2019-11-08 14:53:33', 1, 1, 1),
(1245, 'images/egresoscaja/3913420191108145851695.pdf', 'Beneficiario Externo', '2019-10-18', 49, 0, 0, 'VARIOS', 3, 13, 612000, 'MANTENIMIENTO DE EQUIPOS', '2019-11-08 14:54:15', 1, 1, 1),
(1246, 'images/egresoscaja/92772image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Lavadero el lago', 3, 13, 36000, 'Lavado de volquete SXW-794', '2019-11-08 14:56:09', 1, 1, 1),
(1247, 'images/egresoscaja/99676image.jpg', 'Beneficiario Externo', '2019-10-31', 49, 0, 0, 'Comercial Toluviejo', 3, 15, 13400, 'Compra tornillos', '2019-11-08 14:58:57', 1, 1, 1),
(1248, 'images/egresoscaja/3206420191108145909163.pdf', 'Beneficiario Externo', '2019-10-18', 49, 0, 0, 'VARIOS', 3, 11, 189000, 'gastos varios', '2019-11-08 15:01:36', 1, 1, 1),
(1249, 'images/egresoscaja/2928420191108145918019.pdf', 'Beneficiario Externo', '2019-10-18', 49, 0, 0, 'VARIOS', 5, 29, 984000, 'compra d arena', '2019-11-08 15:03:23', 1, 1, 1),
(1250, 'images/egresoscaja/1182320191108145926225.pdf', 'Beneficiario Externo', '2019-10-18', 49, 0, 0, 'torfer mde', 3, 15, 29398, 'compra', '2019-11-08 15:04:12', 1, 1, 1),
(1251, 'images/egresoscaja/6522920191108145935226.pdf', 'Beneficiario Externo', '2019-10-18', 49, 0, 0, 'peajes varios', 2, 7, 264600, 'peajes', '2019-11-08 15:04:59', 1, 1, 1),
(1252, 'images/egresoscaja/65718image.jpg', 'Beneficiario Externo', '2019-11-05', 49, 0, 0, 'Zona de estacionamiento', 2, 7, 2000, 'Estacionamiento Sincelejo UEW-789', '2019-11-08 15:12:02', 1, 1, 1),
(1253, 'images/egresoscaja/945image.jpg', 'Beneficiario Externo', '2019-11-05', 49, 0, 0, 'Zona de estacionamiento', 2, 7, 2000, 'Estacionamiento Sincelejo UEW-789', '2019-11-08 15:12:02', 1, 1, 1),
(1254, 'images/egresoscaja/64616image.jpg', 'Beneficiario Externo', '2019-11-05', 49, 0, 0, 'Zona de estacionamiento', 2, 7, 2000, 'Estacionamiento Sincelejo UEW-789', '2019-11-08 15:12:02', 1, 1, 1),
(1255, 'images/egresoscaja/66648image.jpg', 'Beneficiario Externo', '2019-11-05', 49, 0, 0, 'Zona de estacionamiento', 2, 7, 2000, 'Estacionamiento Sincelejo UEW-789', '2019-11-08 15:12:02', 1, 1, 1),
(1256, 'images/egresoscaja/9829image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Zona de estacionamiento', 2, 7, 2000, 'Estacionamiento DTW-296', '2019-11-08 15:15:32', 1, 1, 1),
(1257, 'images/egresoscaja/3847520191108151806461.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'taller y llanter?a toluviejo', 3, 13, 270000, 'MANTENIMIENTOS', '2019-11-08 15:18:29', 1, 1, 1),
(1258, 'images/egresoscaja/50448image.jpg', 'Beneficiario Externo', '2019-10-31', 49, 0, 0, 'Zona de estacionamiento', 2, 5, 2000, 'Estacionamiento Sincelejo DTW - 296', '2019-11-08 15:17:28', 1, 1, 1),
(1259, 'images/egresoscaja/234420191108151825719.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'VARIOS', 3, 13, 370000, 'MANTENIMIENTO', '2019-11-08 15:20:11', 1, 1, 1),
(1260, 'images/egresoscaja/22889image.jpg', 'Beneficiario Externo', '2019-10-24', 49, 0, 0, 'Zona de estacionamiento', 2, 5, 2000, 'Estacionamiento Sincelejo DTW - 296', '2019-11-08 15:20:41', 1, 1, 1),
(1261, 'images/egresoscaja/4366image.jpg', 'Beneficiario Externo', '2019-10-24', 49, 0, 0, 'Zona de estacionamiento', 2, 5, 2000, 'Estacionamiento Sincelejo DTW - 296', '2019-11-08 15:20:41', 1, 1, 1),
(1262, 'images/egresoscaja/5495420191108151834192.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'VARIOS', 3, 15, 396000, 'COMPRA', '2019-11-08 15:21:30', 1, 1, 1),
(1263, 'images/egresoscaja/2880320191108151842593.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'MONTA LLANTAS TO?O', 3, 13, 55000, 'MANTENIMIENTO', '2019-11-08 15:22:25', 1, 1, 1),
(1264, 'images/egresoscaja/652120191108151850629.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'NEUMATICAS DEL CARUBE', 3, 15, 264101, 'COMPRA', '2019-11-08 15:23:18', 1, 1, 1),
(1265, 'images/egresoscaja/9080620191108151959708.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'MOISES MANUEL PACHECO', 3, 15, 1020000, 'PAGO', '2019-11-08 15:24:24', 1, 1, 1),
(1266, 'images/egresoscaja/14892image.jpg', 'Beneficiario Externo', '2019-10-30', 49, 0, 0, 'Computadores de la costa sas', 3, 15, 25000, 'Reparaci?n teclado port?til hp (b?scula)', '2019-11-08 15:23:06', 1, 1, 1),
(1267, 'images/egresoscaja/4646320191108152010893.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'VARIOS', 3, 11, 393300, 'VARIOS', '2019-11-08 15:25:17', 1, 1, 1),
(1268, 'images/egresoscaja/218420191108152103662.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'VARIOS', 3, 10, 30028, 'COMBUSTIBLE', '2019-11-08 15:26:31', 1, 1, 1),
(1269, 'images/egresoscaja/87064image.jpg', 'Beneficiario Externo', '2019-11-05', 49, 0, 0, 'Ol?mpica sa', 5, 30, 33400, 'Gastos cafeter?a oficina', '2019-11-08 15:25:56', 1, 1, 1),
(1270, 'images/egresoscaja/28503image.jpg', 'Beneficiario Externo', '2019-11-05', 49, 0, 0, 'Ol?mpica sa', 5, 30, 33400, 'Gastos cafeter?a oficina', '2019-11-08 15:25:56', 1, 1, 1),
(1271, 'images/egresoscaja/6300020191108152122595.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'VARIOS', 3, 11, 150240, 'COMPRA FESTEJOS', '2019-11-08 15:27:24', 1, 1, 1),
(1272, 'images/egresoscaja/8301620191108152132573.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'VARIOS', 3, 15, 711425, 'COMPRA', '2019-11-08 15:28:16', 1, 1, 1),
(1273, 'images/egresoscaja/7727image.jpg', 'Beneficiario Externo', '2019-11-02', 49, 0, 0, 'Ra?l Vergara', 2, 7, 30000, 'Parquero de 6 d?as camioneta', '2019-11-08 15:28:14', 1, 1, 1),
(1274, 'images/egresoscaja/46253image.jpg', 'Beneficiario Externo', '2019-11-02', 49, 0, 0, 'Ra?l Vergara', 2, 7, 30000, 'Parquero de 6 d?as camioneta', '2019-11-08 15:28:14', 1, 1, 1),
(1275, 'images/egresoscaja/4651720191108152203604.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'ARENEROS', 5, 29, 3888000, 'ARENA', '2019-11-08 15:29:29', 1, 1, 1),
(1276, 'images/egresoscaja/66494image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Neumatica lc', 3, 15, 350000, 'Compra de 2 juegos de kits para gatos hidr?ulicos', '2019-11-08 15:29:51', 1, 1, 1),
(1277, 'images/egresoscaja/56989image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Neumatica lc', 3, 15, 350000, 'Compra de 2 juegos de kits para gatos hidr?ulicos', '2019-11-08 15:29:51', 1, 1, 1),
(1278, 'images/egresoscaja/91191image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Neumatica lc', 3, 15, 350000, 'Compra de 2 juegos de kits para gatos hidr?ulicos', '2019-11-08 15:29:51', 1, 1, 1),
(1279, 'images/egresoscaja/482120191108152222314.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'peajes varios', 2, 7, 390800, 'PEAJES', '2019-11-08 15:32:25', 1, 1, 1),
(1280, 'images/egresoscaja/80537image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Areneros de zarandelo', 5, 29, 336000, 'Compra de arena', '2019-11-08 15:32:22', 1, 1, 1),
(1281, 'images/egresoscaja/98733image.jpg', 'Beneficiario Externo', '2019-11-06', 49, 0, 0, 'Areneros de zarandelo', 5, 29, 336000, 'Compra de arena', '2019-11-08 15:32:22', 1, 1, 1),
(1282, 'images/egresoscaja/92796image.jpg', 'Beneficiario Externo', '2019-11-04', 49, 0, 0, 'Taller de mec?nicos hermanos Villalba', 3, 15, 30000, 'Desvare de Mula', '2019-11-08 15:34:13', 1, 1, 1),
(1283, 'images/egresoscaja/6652420191108152212107.pdf', 'Beneficiario Externo', '2019-10-25', 49, 0, 0, 'VARIOS', 3, 15, 259000, 'COMPRA', '2019-11-08 15:37:09', 1, 1, 1),
(1284, 'images/egresoscaja/76785image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Taller de mec?nica hermanos Villalba', 3, 10, 130000, 'Crecer? de segunda', '2019-11-08 15:37:59', 1, 1, 1),
(1285, 'images/egresoscaja/56840image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Taller de mec?nica hermanos Villalba', 3, 10, 130000, 'Crecer? de segunda', '2019-11-08 15:37:59', 1, 1, 1),
(1286, 'images/egresoscaja/9228720191108154537891.pdf', 'Beneficiario Externo', '2019-10-31', 49, 0, 0, 'JOSE WILIAM PEREZ', 3, 15, 2065000, 'COMPRA DE LLANTAS', '2019-11-08 15:39:56', 1, 1, 1),
(1287, 'images/egresoscaja/4565820191108154547509.pdf', 'Beneficiario Externo', '2019-10-31', 49, 0, 0, 'VARIOS', 3, 11, 38000, 'VARIOS', '2019-11-08 15:40:58', 1, 1, 1),
(1288, 'images/egresoscaja/38929image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Taller y suministros Mauricio Lara', 3, 13, 80000, 'Cambio de bujes', '2019-11-08 15:41:10', 1, 1, 1),
(1289, 'images/egresoscaja/5407520191108154626236.pdf', 'Beneficiario Externo', '2019-10-31', 49, 0, 0, 'VARIOS', 3, 13, 304000, 'MANTENIMIENTO', '2019-11-08 15:43:02', 1, 1, 1),
(1290, 'images/egresoscaja/14943image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Carolin castillo', 5, 28, 10000, 'Compra de agua para operarios', '2019-11-08 15:46:34', 1, 1, 1),
(1291, 'images/egresoscaja/52035image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Carolin castillo', 5, 28, 10000, 'Compra de agua para operarios', '2019-11-08 15:46:34', 1, 1, 1),
(1292, 'images/egresoscaja/60951image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Carolin Castillo', 4, 26, 20000, 'Transportes operarios a Sincelejo para ex?menes', '2019-11-08 15:48:34', 1, 1, 1),
(1293, 'images/egresoscaja/26779image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Carolin Castillo', 4, 26, 20000, 'Transportes operarios a Sincelejo para ex?menes', '2019-11-08 15:48:34', 1, 1, 1),
(1294, 'images/egresoscaja/8889image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Carolin Castillo', 4, 26, 20000, 'Transportes operarios a Sincelejo para ex?menes', '2019-11-08 15:48:34', 1, 1, 1),
(1295, 'images/egresoscaja/27780image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Carlos D?az', 4, 18, 100000, 'Transportes para recoger al ing Jos? Gabriel a cartagena', '2019-11-08 15:53:07', 1, 1, 1),
(1296, 'images/egresoscaja/42421image.jpg', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'Carlos D?az', 4, 18, 100000, 'Transportes para recoger al ing Jos? Gabriel a cartagena', '2019-11-08 15:53:07', 1, 1, 1),
(1297, 'images/egresoscaja/38069image.jpg', 'Beneficiario Externo', '2019-11-08', 50, 0, 0, 'Panader?a tolu viejo centro', 4, 26, 13000, 'Botell?n de agua', '2019-11-08 15:55:13', 1, 1, 1),
(1298, 'images/egresoscaja/97361image.jpg', 'Beneficiario Externo', '2019-11-08', 49, 0, 0, 'Comercial Toluviejo', 3, 15, 48000, 'Manguera resortada para radiador de m?quina (alquilada)', '2019-11-08 15:57:08', 1, 1, 1),
(1299, 'images/egresoscaja/59315image.jpg', 'Beneficiario Externo', '2019-11-08', 49, 0, 0, 'Comercial Toluviejo', 3, 15, 48000, 'Manguera resortada para radiador de m?quina (alquilada)', '2019-11-08 15:57:08', 1, 1, 1),
(1300, 'images/egresoscaja/9984image.jpg', 'Beneficiario Externo', '2019-11-08', 49, 0, 0, 'Comercial Toluviejo', 3, 15, 48000, 'Manguera resortada para radiador de m?quina (alquilada)', '2019-11-08 15:57:08', 1, 1, 1),
(1301, 'images/egresoscaja/3609420191108160214703.pdf', 'Beneficiario Externo', '2019-10-28', 47, 0, 0, 'CARSUCRE', 4, 17, 178800, 'PAGO APROVECHAMIENTO FORESTAL', '2019-11-08 15:57:41', 1, 1, 1),
(1302, 'images/egresoscaja/3708420191108160224506.pdf', 'Beneficiario Externo', '2019-10-31', 47, 0, 0, 'servientrega', 2, 6, 27500, 'ENVIO', '2019-11-08 16:00:03', 1, 1, 1),
(1303, 'images/egresoscaja/29892image.jpg', 'Beneficiario Externo', '2019-11-08', 49, 0, 0, 'Mensajer?a 472', 2, 6, 25500, 'Env?o transformadores para reparaci?n', '2019-11-08 15:59:48', 1, 1, 1),
(1304, 'images/egresoscaja/17989image.jpg', 'Beneficiario Externo', '2019-11-08', 49, 0, 0, 'Mensajer?a 472', 2, 6, 25500, 'Env?o transformadores para reparaci?n', '2019-11-08 15:59:48', 1, 1, 1),
(1305, 'images/egresoscaja/1029120191108160232536.pdf', 'Beneficiario Externo', '2019-10-12', 47, 0, 0, 'papeleria el cid', 4, 17, 17900, 'PAPELERIA', '2019-11-08 16:01:00', 1, 1, 1),
(1306, 'images/egresoscaja/62270image.jpg', 'Beneficiario Externo', '2019-11-08', 49, 0, 0, 'Taller el lata', 3, 13, 120000, 'Desprendida de ancla de diente de la retro', '2019-11-08 16:02:53', 1, 1, 1),
(1307, 'images/egresoscaja/5663020191108160240496.pdf', 'Beneficiario Externo', '2019-10-25', 47, 0, 0, 'MRS QUILLERO', 4, 18, 19500, 'COMIDA SARGENTOS INDUMIL', '2019-11-08 16:02:34', 1, 1, 1),
(1308, 'images/egresoscaja/9818520191108160250073.pdf', 'Beneficiario Externo', '2019-10-25', 47, 0, 0, 'VARIOS', 4, 17, 115000, 'varios pasajes y servicios', '2019-11-08 16:04:56', 1, 1, 1),
(1309, 'images/egresoscaja/95220191108161339252.pdf', 'Beneficiario Externo', '2019-10-31', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 64000, 'transportes', '2019-11-08 16:07:21', 1, 1, 1),
(1310, 'images/egresoscaja/4732920191108161347556.pdf', 'Beneficiario Externo', '2019-10-31', 47, 0, 0, 'COMPUTADORES DE LA COST', 4, 17, 30000, 'pago', '2019-11-08 16:08:11', 1, 1, 1),
(1311, 'images/egresoscaja/6935720191108161355848.pdf', 'Beneficiario Externo', '2019-10-26', 47, 0, 0, 'maria angelica mez', 4, 17, 106000, 'envio', '2019-11-08 16:09:29', 1, 1, 1),
(1312, 'images/egresoscaja/8014120191121153717035.pdf', 'Beneficiario Externo', '2019-11-15', 5, 0, 0, 'VARIOS', 3, 10, 360000, 'COMBUSTIBLE USW 020', '2019-11-21 16:45:59', 1, 1, 1),
(1313, 'images/egresoscaja/2584420191121153731710.pdf', 'Beneficiario Externo', '2019-11-11', 5, 0, 0, 'olimpica s.a.', 4, 19, 135668, 'COMPRA', '2019-11-21 16:49:54', 1, 1, 1),
(1314, 'images/egresoscaja/7741020191121153741719.pdf', 'Beneficiario Externo', '2019-11-15', 5, 0, 0, 'CARULLA CASTILO GR EXITO', 4, 19, 1190741, 'COMPRA DE LICORES', '2019-11-21 16:52:41', 1, 1, 1),
(1315, 'images/egresoscaja/4824020191121153753235.pdf', 'Beneficiario Externo', '2019-11-15', 5, 0, 0, 'masser sas', 4, 18, 258186, 'COMPRA', '2019-11-21 17:09:06', 1, 1, 1),
(1316, 'images/egresoscaja/7285820191121153806205.pdf', 'Beneficiario Externo', '2019-11-15', 5, 0, 0, 'MINISO', 4, 18, 31800, 'COMPRA', '2019-11-21 17:10:48', 1, 1, 1),
(1317, 'images/egresoscaja/606620191121153819171.pdf', 'Beneficiario Externo', '2019-11-15', 5, 0, 0, 'peajes varios', 2, 7, 471800, 'PEAJES VARIOS', '2019-11-21 17:20:57', 1, 1, 1),
(1318, 'images/egresoscaja/1807820191205150015116.pdf', 'Beneficiario Externo', '2019-11-30', 47, 0, 0, 'VARIOS', 4, 17, 1160000, 'pagos varios', '2019-12-05 14:56:46', 1, 1, 1),
(1319, 'images/egresoscaja/8060220191205150027912.pdf', 'Beneficiario Externo', '2019-11-30', 47, 0, 0, 'CARSUCRE', 4, 17, 178906, 'pago', '2019-12-05 15:01:59', 1, 1, 1),
(1320, 'images/egresoscaja/9474820191205150103879.pdf', 'Beneficiario Externo', '2019-11-30', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 130000, 'pasajes del mes', '2019-12-05 15:02:54', 1, 1, 1),
(1321, 'images/egresoscaja/1108620191205150112087.pdf', 'Beneficiario Externo', '2019-11-30', 47, 0, 0, 'tigo movistar', 2, 5, 317410, 'pago celulares jd', '2019-12-05 15:03:46', 1, 1, 1),
(1322, 'images/egresoscaja/826920191205150121609.pdf', 'Beneficiario Externo', '2019-11-30', 47, 0, 0, 'papeleria el cid', 4, 17, 74020, 'papeleria', '2019-12-05 15:05:02', 1, 1, 1),
(1323, 'images/egresoscaja/1691720191205150129967.pdf', 'Beneficiario Externo', '2019-11-30', 47, 0, 0, 'peajes varios', 2, 7, 20900, 'peajes', '2019-12-05 15:05:59', 1, 1, 1),
(1324, 'images/egresoscaja/8924920191205150138201.pdf', 'Beneficiario Externo', '2019-11-30', 47, 0, 0, 'servientrega', 2, 6, 40300, 'envios', '2019-12-05 15:08:46', 1, 1, 1),
(1325, 'images/egresoscaja/507720191205150147595.pdf', 'Beneficiario Externo', '2019-11-06', 47, 0, 0, 'word office', 4, 17, 1059100, 'facturacion electronica', '2019-12-05 15:10:19', 1, 1, 1),
(1326, 'images/egresoscaja/7879520191205150156497.pdf', 'Beneficiario Externo', '2019-11-06', 47, 0, 0, 'indumil', 5, 30, 1985160, 'explosivos', '2019-12-05 15:11:07', 1, 1, 1),
(1327, 'images/egresoscaja/2953820191205150205866.pdf', 'Beneficiario Externo', '2019-11-30', 47, 0, 0, 'agro partes cat', 3, 12, 65000, 'compra', '2019-12-05 15:11:56', 1, 1, 1),
(1328, 'images/egresoscaja/9217520191217102842513.pdf', 'Beneficiario Externo', '2019-12-09', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 15000, 'TRANSPORTES VARIOS', '2019-12-17 10:21:35', 1, 1, 1),
(1329, 'images/egresoscaja/3293320191217102709780.pdf', 'Beneficiario Externo', '2019-12-09', 47, 0, 0, 'DEPRISA', 2, 6, 25000, 'ENVIO RELOJ', '2019-12-17 10:22:18', 1, 1, 1),
(1330, 'images/egresoscaja/6231220191217102658983.pdf', 'Beneficiario Externo', '2019-12-09', 47, 0, 0, 'tigo movistar', 2, 5, 202364, 'PLANES JD', '2019-12-17 10:23:19', 1, 1, 1),
(1331, 'images/egresoscaja/4956620191217102650632.pdf', 'Beneficiario Externo', '2019-10-21', 47, 0, 0, 'papeleria el cid', 4, 17, 8990, 'PAPELERIA', '2019-12-17 10:25:22', 1, 1, 1),
(1332, 'images/egresoscaja/17797Imagen_no_disponible.svg.png', 'Beneficiario Externo', '2020-01-08', 47, 0, 0, 'tigo', 2, 5, 100000, 'plan de celular JD', '2020-01-28 16:50:57', 1, 1, 1),
(1333, 'images/egresoscaja/6033120200204151654287.pdf', 'Beneficiario Externo', '2020-01-30', 5, 0, 0, 'peajes varios', 2, 7, 939200, 'peajes', '2020-02-04 15:09:37', 1, 1, 1),
(1335, 'images/egresoscaja/106820200204152350947.pdf', 'Beneficiario Externo', '2019-12-05', 5, 0, 0, 'soloio', 4, 18, 389800, 'COMIDA', '2020-02-04 15:19:15', 1, 1, 1),
(1337, 'images/egresoscaja/2492320200204152406267.pdf', 'Beneficiario Externo', '2019-02-11', 5, 0, 0, 'CENTRO COMERCIALY DE NEGOCIOS ANDINO PH', 3, 14, 50600, 'PARQUEO', '2020-02-04 15:24:56', 1, 1, 1),
(1338, 'images/egresoscaja/5046420200204152414483.pdf', 'Beneficiario Externo', '2019-12-10', 5, 0, 0, 'VARIOS', 4, 18, 15690, 'COMPRA', '2020-02-04 15:26:42', 1, 1, 1),
(1339, 'images/egresoscaja/7954020200204152422931.pdf', 'Beneficiario Externo', '2019-12-16', 5, 0, 0, 'TRANSPORTES GONZALEZ', 2, 7, 40000, 'PASAJE', '2020-02-04 15:27:36', 1, 1, 1),
(1340, 'images/egresoscaja/6262620200204152432439.pdf', 'Beneficiario Externo', '2019-12-11', 5, 0, 0, 'SAAD SAAD YCIA SAS', 3, 10, 105500, 'ACMP Y COMPRA MENOR', '2020-02-04 15:28:39', 1, 1, 1),
(1341, 'images/egresoscaja/9943820200204152440701.pdf', 'Beneficiario Externo', '2019-12-04', 5, 0, 0, 'VARIOS', 4, 18, 99600, 'COMIDA', '2020-02-04 15:29:54', 1, 1, 1),
(1342, 'images/egresoscaja/3814920200204152449276.pdf', 'Beneficiario Externo', '2019-12-13', 5, 0, 0, 'RESTCAFE', 4, 18, 180400, 'COMIDA', '2020-02-04 15:31:26', 1, 1, 1),
(1343, 'images/egresoscaja/966120200204152457903.pdf', 'Beneficiario Externo', '2019-12-12', 5, 0, 0, 'VARIOS', 4, 18, 351641, 'COMIDA', '2020-02-04 15:32:19', 1, 1, 1),
(1344, 'images/egresoscaja/6082920200204152508891.pdf', 'Beneficiario Externo', '2019-11-26', 5, 0, 0, 'BAALKECK', 4, 18, 279151, 'COMIDA', '2020-02-04 15:33:21', 1, 1, 1),
(1345, 'images/egresoscaja/9856020200204152518505.pdf', 'Beneficiario Externo', '2019-12-12', 5, 0, 0, 'VARIOS', 4, 18, 911248, 'COMPRAS VARIAS', '2020-02-04 15:34:31', 1, 1, 1),
(1346, 'images/egresoscaja/2193120200204152540774.pdf', 'Beneficiario Externo', '2019-12-10', 5, 0, 0, 'KATA SAS', 4, 18, 327777, 'COMIDA', '2020-02-04 15:35:31', 1, 1, 1),
(1347, 'images/egresoscaja/2897520200204152609632.pdf', 'Beneficiario Externo', '2019-12-12', 5, 0, 0, 'RESTAURANTE EL FOGON SUAITANO', 4, 18, 45944, 'COMIDA', '2020-02-04 15:37:23', 1, 1, 1),
(1348, 'images/egresoscaja/9210420200204152618003.pdf', 'Beneficiario Externo', '2019-12-04', 5, 0, 0, 'AEROPUERTOS DG SAS', 4, 18, 16900, 'COMIDA', '2020-02-04 15:38:35', 1, 1, 1),
(1349, 'images/egresoscaja/9504120200204152626784.pdf', 'Beneficiario Externo', '2019-12-14', 5, 0, 0, 'CITY GROUP HOTELS SAS', 4, 18, 711355, 'HOSPEDAJE', '2020-02-04 15:39:20', 1, 1, 1),
(1350, 'images/egresoscaja/9227320200205111104893.pdf', 'Beneficiario Externo', '2020-01-13', 5, 0, 0, 'VARIOS', 3, 10, 428044, 'combustible', '2020-02-05 11:14:13', 1, 1, 1),
(1351, 'images/egresoscaja/6950720200205111115634.pdf', 'Beneficiario Externo', '2020-01-21', 5, 0, 0, 'VARIOS', 3, 15, 302793, 'mantenimientos', '2020-02-05 11:15:44', 1, 1, 1),
(1352, 'images/egresoscaja/1726020200205111124075.pdf', 'Beneficiario Externo', '2020-01-20', 5, 0, 0, 'masser sas', 4, 18, 172002, 'comidas', '2020-02-05 11:18:00', 1, 1, 1),
(1353, 'images/egresoscaja/1544520200205111137366.pdf', 'Beneficiario Externo', '2020-01-17', 5, 0, 0, 'VARIOS', 4, 18, 81000, 'compra', '2020-02-05 11:23:47', 1, 1, 1),
(1354, 'images/egresoscaja/5499220200205111145714.pdf', 'Beneficiario Externo', '2020-01-21', 5, 0, 0, 'la cajita', 4, 18, 183700, 'comidas', '2020-02-05 11:24:46', 1, 1, 1),
(1355, 'images/egresoscaja/4658220200205111156182.pdf', 'Beneficiario Externo', '2020-01-10', 5, 0, 0, 'VARIOS', 4, 18, 43000, 'comida', '2020-02-05 11:27:02', 1, 1, 1),
(1356, 'images/egresoscaja/7690320200206163800291.pdf', 'Beneficiario Externo', '2020-01-31', 47, 0, 0, 'tigo', 2, 5, 300000, 'PAGO CELULARES JD', '2020-02-06 16:36:08', 1, 1, 1),
(1357, 'images/egresoscaja/9906320200206163808662.pdf', 'Beneficiario Externo', '2020-01-31', 47, 0, 0, 'MOVISTAR', 2, 5, 347329, 'celulares jd', '2020-02-06 16:38:37', 1, 1, 1),
(1358, 'images/egresoscaja/5518720200206163817032.pdf', 'Beneficiario Externo', '2020-02-05', 47, 0, 0, 'COMPUTADORES DE LA COST', 4, 17, 16551, 'compra de usb ing xiomara', '2020-02-06 16:39:35', 1, 1, 1),
(1359, 'images/egresoscaja/6017120200206163825309.pdf', 'Beneficiario Externo', '2020-02-05', 47, 0, 0, 'STAMPA', 4, 17, 77000, 'SCANER DE PLANOS', '2020-02-06 16:40:27', 1, 1, 1),
(1360, 'images/egresoscaja/4090320200206163833879.pdf', 'Beneficiario Externo', '2020-02-04', 47, 0, 0, 'papeleria el cid', 4, 17, 25250, 'PAPELERIA', '2020-02-06 16:41:17', 1, 1, 1),
(1361, 'images/egresoscaja/9870820200206163848444.pdf', 'Beneficiario Externo', '2020-02-05', 47, 0, 0, 'Natalia Hern?ndez', 2, 7, 76000, 'PASAJES Y ENVIOS', '2020-02-06 16:42:19', 1, 1, 1),
(1362, 'images/egresoscaja/4805320200206163857272.pdf', 'Beneficiario Externo', '2020-02-03', 47, 0, 0, 'DANY MENDOZA', 4, 17, 150000, 'SERVICIO DE ASEO Y LAVADO', '2020-02-06 16:43:05', 1, 1, 1),
(1363, 'images/egresoscaja/9802820200206163906964.pdf', 'Beneficiario Externo', '2020-01-29', 47, 0, 0, 'NOTARIA', 4, 17, 31000, 'ATENTICACI?N', '2020-02-06 16:44:08', 1, 1, 1),
(1364, 'images/egresoscaja/6777120200206163918703.pdf', 'Beneficiario Externo', '2020-01-31', 47, 0, 0, 'cerrajer?a Yale', 4, 17, 70500, 'DUPLICADOS VARIOS', '2020-02-06 16:44:54', 1, 1, 1),
(1365, 'images/egresoscaja/1468920200206163941218.pdf', 'Beneficiario Externo', '2020-02-01', 47, 0, 0, 'servientrega', 2, 6, 55450, 'ENVIOS', '2020-02-06 16:45:34', 1, 1, 1),
(1366, 'images/egresoscaja/3649420200206164201547.pdf', 'Beneficiario Externo', '2020-01-25', 47, 0, 0, 'INTERRAPIDISIMO', 2, 6, 97600, 'ENVIOS', '2020-02-06 16:46:37', 1, 1, 1),
(1367, 'images/egresoscaja/6353820200206164255501.pdf', 'Beneficiario Externo', '2020-01-27', 47, 0, 0, 'CARSUCRE', 4, 17, 148428, 'PAGO', '2020-02-06 16:47:42', 1, 1, 1),
(1368, 'images/egresoscaja/5913620200206164308669.pdf', 'Beneficiario Externo', '2020-01-23', 47, 0, 0, 'CARSUCRE', 4, 17, 25558, 'PAGO', '2020-02-06 16:48:25', 1, 1, 1),
(1369, 'images/egresoscaja/6374520200206164327290.pdf', 'Beneficiario Externo', '2020-01-09', 47, 0, 0, 'HOTEL BOSTON', 4, 18, 117810, 'HOTEL DAVID SANTOS', '2020-02-06 16:49:04', 1, 1, 1),
(1370, 'images/egresoscaja/87959Imagen_no_disponible.svg.png', 'Caja Sistema', '2020-02-04', 5, 47, 47, '', 0, 0, 300000, 'TRANSLADO DE CAJA', '2020-02-06 16:50:03', 1, 1, 1),
(1371, 'images/egresoscaja/9451120200624103027789.pdf', 'Beneficiario Externo', '2019-11-15', 49, 0, 0, 'peajes varios', 2, 7, 590600, 'peajes varios', '2020-06-24 09:27:21', 1, 1, 1),
(1372, 'images/egresoscaja/9855720200624103039873.pdf', 'Beneficiario Externo', '2019-11-15', 49, 0, 0, 'seguros mundial', 3, 16, 672800, 'soat', '2020-06-24 09:29:38', 1, 1, 1),
(1373, 'images/egresoscaja/1313820200624103048918.pdf', 'Beneficiario Externo', '2019-11-20', 49, 0, 0, 'NEGOCIOS E INVERSIONES MONTESUR', 5, 29, 184000, 'COMPRA DE ANCLAJE', '2020-06-24 09:31:26', 1, 1, 1),
(1374, 'images/egresoscaja/9448420200624103108202.pdf', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'TALLERES WILSON', 3, 15, 240000, 'ARREGLO Y REPUESTOS', '2020-06-24 09:32:46', 1, 1, 1),
(1375, 'images/egresoscaja/9120620200624103150864.pdf', 'Beneficiario Externo', '2019-11-07', 49, 0, 0, 'TALLER EL SOL', 3, 15, 850000, 'REPUESTOS Y REVISION MULA', '2020-06-24 09:34:39', 1, 1, 1),
(1376, 'images/egresoscaja/1883520200624103222849.pdf', 'Beneficiario Externo', '2019-11-19', 49, 0, 0, 'RAUL VERGARA', 2, 7, 100000, 'VIATICOS VARIOS', '2020-06-24 09:36:15', 1, 1, 1),
(1377, 'images/egresoscaja/7811920200624103235438.pdf', 'Beneficiario Externo', '2019-11-21', 49, 0, 0, 'RAUL VERGARA', 2, 7, 160700, 'VIATICOS EMPLEADOS', '2020-06-24 09:37:39', 1, 1, 1),
(1378, 'images/egresoscaja/6406120200624103246931.pdf', 'Beneficiario Externo', '2019-11-18', 49, 0, 0, 'CENTRAL DE FRENO', 3, 15, 50200, 'COMPRA DE REPUESTOS', '2020-06-24 09:39:21', 1, 1, 1),
(1379, 'images/egresoscaja/7559220200624103257679.pdf', 'Beneficiario Externo', '2019-11-20', 49, 0, 0, 'CDA DEL CARIBE Y COMPULAGOS', 3, 15, 347500, 'COMPRA DE REPUESTOS Y OTROS', '2020-06-24 09:40:14', 1, 1, 1),
(1380, 'images/egresoscaja/9377720200624103316243.pdf', 'Beneficiario Externo', '2019-11-20', 49, 0, 0, 'ZONA DE ESTACIONAMIENTO', 2, 7, 6000, 'PARQUEO', '2020-06-24 09:41:52', 1, 1, 1),
(1381, 'images/egresoscaja/4901120200624103333058.pdf', 'Beneficiario Externo', '2019-11-22', 49, 0, 0, 'VARIOS', 3, 10, 24671, 'COMBISTIBLE Y OTROS', '2020-06-24 09:42:48', 1, 1, 1),
(1382, 'images/egresoscaja/3933120200624103419214.pdf', 'Beneficiario Externo', '2020-11-20', 49, 0, 0, 'VARIOS', 3, 15, 957700, 'COMPRA DE REPUESTOS Y MANTENIMIENTO EQUIPOS VARIOS', '2020-06-24 09:44:38', 1, 1, 1),
(1383, 'images/egresoscaja/8667620200624110206848.pdf', 'Beneficiario Externo', '2020-12-01', 49, 0, 0, 'PEAJES', 2, 7, 172200, 'PEAJES', '2020-06-24 09:52:48', 1, 1, 1),
(1384, 'images/egresoscaja/7567520200624110215268.pdf', 'Beneficiario Externo', '2020-12-03', 49, 0, 0, 'ARENEROS DE SARANDELO', 5, 30, 648000, 'COMPRA DE ARENA', '2020-06-24 09:53:55', 1, 1, 1),
(1385, 'images/egresoscaja/4540720200624110223478.pdf', 'Beneficiario Externo', '2019-12-05', 49, 0, 0, 'ZONA DE ESTACIONAMIENTO', 2, 7, 10000, 'PARQUEO', '2020-06-24 09:54:38', 1, 1, 1),
(1386, 'images/egresoscaja/5188020200624110231733.pdf', 'Beneficiario Externo', '2020-12-04', 49, 0, 0, 'TIERRA EL GOSEN', 2, 7, 26500, 'COMPRA', '2020-06-24 09:55:41', 1, 1, 1),
(1387, 'images/egresoscaja/872720200624110240643.pdf', 'Beneficiario Externo', '2019-12-03', 49, 0, 0, 'CENTAVO MENOS', 5, 30, 1000, 'COMPRA', '2020-06-24 09:56:27', 1, 1, 1),
(1388, 'images/egresoscaja/8475820200624110248905.pdf', 'Beneficiario Externo', '2019-12-04', 49, 0, 0, 'TALLER AGRO INDUSTRIAL OTERO', 5, 30, 60000, 'SERVICIOS', '2020-06-24 09:57:22', 1, 1, 1),
(1389, 'images/egresoscaja/7661520200624110257001.pdf', 'Beneficiario Externo', '2019-12-01', 49, 0, 0, 'LUIS VILLALBA', 4, 38, 51000, 'COMPRA DE FORMULA MEDICA', '2020-06-24 09:58:54', 1, 1, 1),
(1390, 'images/egresoscaja/9522720200624110308375.pdf', 'Beneficiario Externo', '2019-12-05', 49, 0, 0, 'varios', 3, 15, 831000, 'COMPRA DE REPUESTOS Y MANTENIMIENTOS EQUIPOS', '2020-06-24 10:02:29', 1, 1, 1),
(1391, 'images/egresoscaja/6001520200624121319710.pdf', 'Beneficiario Externo', '2019-12-15', 49, 0, 0, 'PEAJES', 2, 7, 1381100, 'PEAJES VARIOS', '2020-06-24 11:04:09', 1, 1, 1),
(1392, 'images/egresoscaja/1215420200624121331738.pdf', 'Beneficiario Externo', '2019-12-06', 49, 0, 0, 'VARIOS', 2, 7, 102000, 'VIATICOS', '2020-06-24 11:05:37', 1, 1, 1),
(1393, 'images/egresoscaja/2012620200624121340022.pdf', 'Beneficiario Externo', '2019-12-06', 49, 0, 0, 'ZONA DE ESTACIONAMIENTO', 2, 7, 4000, 'PARQUEO', '2020-06-24 11:06:16', 1, 1, 1),
(1394, 'images/egresoscaja/6630620200624121349538.pdf', 'Beneficiario Externo', '2019-12-04', 49, 0, 0, 'COMPUTADORES L Y F', 4, 17, 40000, 'REPARACION PORTATIL', '2020-06-24 11:07:09', 1, 1, 1),
(1395, 'images/egresoscaja/7131620200624121357653.pdf', 'Beneficiario Externo', '2019-12-04', 49, 0, 0, 'FERRETERIA LAMINAS Y METALES', 5, 29, 217000, 'COMPRA', '2020-06-24 11:08:00', 1, 1, 1),
(1396, 'images/egresoscaja/5352420200624121411758.pdf', 'Beneficiario Externo', '2019-12-04', 49, 0, 0, 'ARENACOR', 5, 30, 2280000, 'COMPRA DE ARENA', '2020-06-24 11:08:41', 1, 1, 1),
(1397, 'images/egresoscaja/8021120200624121433957.pdf', 'Beneficiario Externo', '2019-12-10', 49, 0, 0, 'VARIOS', 3, 15, 1509709, 'REPUESTOS Y MANTENIMIENTOS', '2020-06-24 11:09:44', 1, 1, 1),
(1398, 'images/egresoscaja/5597820200624124905971.pdf', 'Beneficiario Externo', '2019-12-20', 49, 0, 0, 'PEAJES', 2, 7, 113500, 'PEAJES VARIOS', '2020-06-24 11:39:04', 1, 1, 1),
(1399, 'images/egresoscaja/9835520200624124915234.pdf', 'Beneficiario Externo', '2019-12-07', 49, 0, 0, 'VARIOS', 2, 7, 243000, 'VIATICOS Y VARIOS', '2020-06-24 11:39:50', 1, 1, 1),
(1400, 'images/egresoscaja/8877020200624124923703.pdf', 'Beneficiario Externo', '2019-12-07', 49, 0, 0, 'TORFER', 3, 15, 32946, 'COMPRA DE REPUESTOS', '2020-06-24 11:42:24', 1, 1, 1),
(1401, 'images/egresoscaja/8486120200624124932381.pdf', 'Beneficiario Externo', '2019-12-07', 49, 0, 0, 'ARENACOR', 5, 29, 648000, 'COMPRA DE ARENA', '2020-06-24 11:43:15', 1, 1, 1),
(1402, 'images/egresoscaja/6035320200624124952842.pdf', 'Beneficiario Externo', '2019-12-20', 49, 0, 0, 'VARIOS', 3, 15, 411000, 'MANTENIMIENTO Y REPUESTOS', '2020-06-24 11:43:58', 1, 1, 1),
(1403, 'images/egresoscaja/578220200624125938115.pdf', 'Beneficiario Externo', '2019-12-11', 49, 0, 0, 'RAUL VERGARA', 2, 7, 12000, 'TRANSPORTE', '2020-06-24 11:50:36', 1, 1, 1),
(1404, 'images/egresoscaja/3901120200624125951652.pdf', 'Beneficiario Externo', '2019-12-17', 49, 0, 0, 'PEAJES', 2, 7, 240600, 'PEAJES VARIOS', '2020-06-24 11:51:18', 1, 1, 1),
(1405, 'images/egresoscaja/6210820200624130029063.pdf', 'Beneficiario Externo', '2019-12-17', 49, 0, 0, 'VARIOS', 3, 15, 945900, 'REPUESTOS Y MANTENIMIENTOS VARIOS', '2020-06-24 11:52:49', 1, 1, 1),
(1406, 'images/egresoscaja/7662620200624131207035.pdf', 'Beneficiario Externo', '2019-12-17', 49, 0, 0, 'PEAJES', 2, 7, 93000, 'peajes varios', '2020-06-24 12:03:57', 1, 1, 1),
(1407, 'images/egresoscaja/1003120200624131215699.pdf', 'Beneficiario Externo', '2019-12-16', 49, 0, 0, 'varios', 3, 10, 1348500, 'COMBUSTIBLE', '2020-06-24 12:18:47', 1, 1, 1),
(1408, 'images/egresoscaja/2510420200624131226633.pdf', 'Beneficiario Externo', '2019-12-18', 49, 0, 0, 'VARIOS', 3, 11, 34000, 'LAVADO Y OTROS', '2020-06-24 12:21:59', 1, 1, 1),
(1409, 'images/egresoscaja/3720120200624131242985.pdf', 'Beneficiario Externo', '2019-12-16', 49, 0, 0, 'RAUL VERGARA', 2, 7, 47000, 'VIATICOS', '2020-06-24 12:29:51', 1, 1, 1),
(1410, 'images/egresoscaja/2029720200624131255631.pdf', 'Beneficiario Externo', '2019-12-17', 49, 0, 0, 'VARIOS', 3, 15, 477200, 'REPUESTOS Y MANTENIMIENTOS', '2020-06-24 12:31:01', 1, 1, 1),
(1411, 'images/egresoscaja/8291020200625094256830.pdf', 'Beneficiario Externo', '2020-01-30', 5, 0, 0, 'PEAJES', 2, 7, 22000, 'PEAJES VARIOS', '2020-06-25 08:39:30', 1, 1, 1),
(1412, 'images/egresoscaja/4010220200625094305049.pdf', 'Beneficiario Externo', '2020-01-25', 5, 0, 0, 'PEAJES', 2, 7, 107700, 'PEAJES VARIOS', '2020-06-25 08:40:45', 1, 1, 1),
(1413, 'images/egresoscaja/2828220200625094313230.pdf', 'Beneficiario Externo', '2020-03-09', 5, 0, 0, 'PEAJES', 2, 7, 84800, 'PEAJES', '2020-06-25 08:41:33', 1, 1, 1),
(1414, 'images/egresoscaja/8913320200625094321669.pdf', 'Beneficiario Externo', '2020-01-28', 5, 0, 0, 'PEAJES', 2, 7, 154800, 'PEAJES', '2020-06-25 08:50:02', 1, 1, 1),
(1415, 'images/egresoscaja/6709720200625094330873.pdf', 'Beneficiario Externo', '2020-03-01', 5, 0, 0, 'PEAJES', 2, 7, 71400, 'PEAJES', '2020-06-25 08:51:17', 1, 1, 1),
(1416, 'images/egresoscaja/6559720200625094347845.pdf', 'Beneficiario Externo', '2020-06-06', 5, 0, 0, 'PEAJES', 2, 7, 65200, 'PEAJES', '2020-06-25 09:01:53', 1, 1, 1),
(1417, 'images/egresoscaja/5905520200625094412133.pdf', 'Beneficiario Externo', '2020-01-20', 5, 0, 0, 'VARIOS', 4, 18, 825422, 'PAGOS VARIOS', '2020-06-25 09:03:00', 1, 1, 1),
(1418, 'images/egresoscaja/4673220200625094420771.pdf', 'Beneficiario Externo', '2020-01-15', 5, 0, 0, 'MI GRAN PARRILA BOYACENSE', 4, 18, 197100, 'COMIDA', '2020-06-25 09:03:59', 1, 1, 1),
(1419, 'images/egresoscaja/8610420200625094429062.pdf', 'Beneficiario Externo', '2020-02-06', 5, 0, 0, 'COMIDAS VARPEL SAS', 4, 18, 30600, 'COMIDA', '2020-06-25 09:04:48', 1, 1, 1),
(1420, 'images/egresoscaja/774020200625094438632.pdf', 'Beneficiario Externo', '2020-01-17', 5, 0, 0, 'LA FRAGOLA', 4, 18, 260700, 'COMIDA', '2020-06-25 09:05:33', 1, 1, 1),
(1421, 'images/egresoscaja/3028220200625094447558.pdf', 'Beneficiario Externo', '2020-02-20', 5, 0, 0, 'IRCC SAS', 4, 18, 26500, 'COMIDA', '2020-06-25 09:06:32', 1, 1, 1),
(1422, 'images/egresoscaja/4801720200625094456815.pdf', 'Beneficiario Externo', '2020-01-30', 5, 0, 0, 'BOUTIQUE MONTBLAC EL DORADO', 4, 18, 3195000, 'COMPRA', '2020-06-25 09:07:25', 1, 1, 1),
(1423, 'images/egresoscaja/5696420200625094504836.pdf', 'Beneficiario Externo', '2020-06-20', 5, 0, 0, 'KATA SAS', 4, 18, 65774, 'COMIDA', '2020-06-25 09:08:59', 1, 1, 1),
(1424, 'images/egresoscaja/2924820200625094513290.pdf', 'Beneficiario Externo', '2020-02-28', 5, 0, 0, 'CBC SINCELEJO', 4, 18, 25800, 'COMIDA', '2020-06-25 09:10:06', 1, 1, 1),
(1425, 'images/egresoscaja/8070420200625094522069.pdf', 'Beneficiario Externo', '2020-01-19', 5, 0, 0, 'CARULLA BELLAVISTA', 4, 18, 102200, 'COMPRA E BEBIDAS', '2020-06-25 09:11:10', 1, 1, 1),
(1426, 'images/egresoscaja/8355420200625094530209.pdf', 'Beneficiario Externo', '2020-06-03', 5, 0, 0, 'OLIMPICA SAO', 4, 18, 52990, 'COMPRA', '2020-06-25 09:12:09', 1, 1, 1),
(1427, 'images/egresoscaja/9500220200625094543854.pdf', 'Beneficiario Externo', '2020-03-11', 5, 0, 0, 'POMBO PARRILA', 4, 18, 21100, 'COMIDA', '2020-06-25 09:12:56', 1, 1, 1),
(1428, 'images/egresoscaja/3037020200625094553091.pdf', 'Beneficiario Externo', '2020-03-01', 5, 0, 0, 'MASSER', 4, 18, 25900, 'COMIDA', '2020-06-25 09:13:35', 1, 1, 1),
(1429, 'images/egresoscaja/4961420200625094604694.pdf', 'Beneficiario Externo', '2020-02-17', 5, 0, 0, 'DIVERSITY', 4, 19, 1137500, 'PAGO DIVERSITI', '2020-06-25 09:14:27', 1, 1, 1),
(1430, 'images/egresoscaja/76720200625094613172.pdf', 'Beneficiario Externo', '2020-03-10', 5, 0, 0, 'MASSER', 4, 18, 75500, 'COMIDAS', '2020-06-25 09:15:43', 1, 1, 1),
(1431, 'images/egresoscaja/1099720200625094624746.pdf', 'Beneficiario Externo', '2020-02-20', 5, 0, 0, 'ANDRES ZULUAGA', 4, 18, 410300, 'COMIDAS', '2020-06-25 09:17:32', 1, 1, 1),
(1432, 'images/egresoscaja/1109620200625094634084.pdf', 'Beneficiario Externo', '2020-03-11', 5, 0, 0, 'EDS VARIAS', 3, 10, 239332, 'COMPRA DE COMBUSTIBLE', '2020-06-25 09:19:29', 1, 1, 1),
(1433, 'images/egresoscaja/4271520200625094643694.pdf', 'Beneficiario Externo', '2020-05-22', 5, 0, 0, 'EDS VARIAS', 3, 10, 264006, 'COMPRA DE COMBUSTIBLE', '2020-06-25 09:20:46', 1, 1, 1),
(1434, 'images/egresoscaja/1014020200625094651968.pdf', 'Beneficiario Externo', '2020-03-11', 5, 0, 0, 'ZONA DE ESTACIONAMIENTO', 2, 7, 10600, 'PARQUEO', '2020-06-25 09:21:36', 1, 1, 1),
(1435, 'images/egresoscaja/8425320200625094700152.pdf', 'Beneficiario Externo', '2020-01-21', 5, 0, 0, 'DIPLOMAT EMBAJADA BOGOTA', 4, 18, 466708, 'HOTEL', '2020-06-25 09:22:30', 1, 1, 1),
(1436, 'images/egresoscaja/4962920200625094708286.pdf', 'Beneficiario Externo', '2020-02-15', 5, 0, 0, 'HOTELES DE CONVIVENCIA SAS', 4, 18, 220000, 'HOSPEDAJE', '2020-06-25 09:24:33', 1, 1, 1),
(1437, 'images/egresoscaja/6840520200625094822020.pdf', 'Beneficiario Externo', '2020-06-03', 5, 0, 0, 'DANY MENDOZA', 4, 19, 70000, 'SERVICIO DE LAVADO Y PLANCHADO', '2020-06-25 09:25:45', 1, 1, 1),
(1438, 'images/egresoscaja/8215820200625094847142.pdf', 'Beneficiario Externo', '2019-12-26', 5, 0, 0, 'PAPELERIA LOS DIBUJANTES', 4, 18, 126000, 'COMPRA DE CALCULADORA', '2020-06-25 09:26:48', 1, 1, 1),
(1439, 'images/egresoscaja/301920200625094855979.pdf', 'Beneficiario Externo', '2020-06-09', 5, 0, 0, 'MAX CELL', 4, 19, 115000, 'COMPRA DE ARTICULOS ELECTRONICOS', '2020-06-25 09:27:39', 1, 1, 1),
(1440, 'images/egresoscaja/1182820200625171453517.pdf', 'Beneficiario Externo', '2019-11-15', 49, 0, 0, 'PEAJES', 2, 7, 224500, 'PEAJES VARIOS', '2020-06-25 16:05:15', 1, 1, 1),
(1441, 'images/egresoscaja/9430520200625171515332.pdf', 'Beneficiario Externo', '2019-11-11', 49, 0, 0, 'VARIOS', 3, 15, 1014999, 'REPUESTOS', '2020-06-25 16:06:03', 1, 1, 1),
(1442, 'images/egresoscaja/3105520200625171525170.pdf', 'Beneficiario Externo', '2020-01-01', 49, 0, 0, 'CLINICA SANTA MARIA', 4, 23, 112301, 'PAGO ATENCION MEDICA', '2020-06-25 16:08:11', 1, 1, 1),
(1443, 'images/egresoscaja/8389820200625171533291.pdf', 'Beneficiario Externo', '2019-11-26', 49, 0, 0, 'VARIOS', 3, 14, 11900, 'OTROS', '2020-06-25 16:09:17', 1, 1, 1),
(1444, 'images/egresoscaja/3021820200625171541972.pdf', 'Beneficiario Externo', '2019-11-26', 49, 0, 0, 'BLOQUERA', 5, 29, 15000, 'COMPRA DE BLOQUES', '2020-06-25 16:10:14', 1, 1, 1),
(1445, 'images/egresoscaja/5642320200625172345169.pdf', 'Beneficiario Externo', '2019-12-18', 49, 0, 0, 'VARIOS', 3, 15, 492000, 'REPUESTOS Y MANTENIMIENTOS', '2020-06-25 16:14:12', 1, 1, 1),
(1446, 'images/egresoscaja/3178120200625173056685.pdf', 'Beneficiario Externo', '2019-12-28', 49, 0, 0, 'VARIOS', 3, 15, 1329700, 'REPUESTOS Y MANTENIMIENTO', '2020-06-25 16:21:17', 1, 1, 1),
(1447, 'images/egresoscaja/9294320200625173123234.pdf', 'Beneficiario Externo', '2019-12-27', 49, 0, 0, 'tauro', 4, 17, 8900, 'papeleria', '2020-06-25 16:23:09', 1, 1, 1),
(1448, 'images/egresoscaja/5326120200625173131485.pdf', 'Beneficiario Externo', '2019-12-27', 49, 0, 0, 'varios', 4, 17, 170100, 'COMPRA ELEMENTOS BOTIQUIN', '2020-06-25 16:24:27', 1, 1, 1),
(1449, 'images/egresoscaja/3997020200625173139687.pdf', 'Beneficiario Externo', '2019-12-27', 49, 0, 0, 'RAUL VERGARA', 2, 7, 128000, 'POLICIA Y MAS', '2020-06-25 16:25:33', 1, 1, 1),
(1450, 'images/egresoscaja/7233520200625173147945.pdf', 'Beneficiario Externo', '2019-12-20', 49, 0, 0, 'SHADAY', 4, 17, 113400, 'PAPELERIA CANTERA', '2020-06-25 16:26:25', 1, 1, 1),
(1451, 'images/egresoscaja/2441220200625173156273.pdf', 'Beneficiario Externo', '2019-12-17', 49, 0, 0, 'CLINICA OFTAMOLOGICA', 4, 23, 180000, 'CONSULTA', '2020-06-25 16:27:21', 1, 1, 1);
INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(1452, 'images/egresoscaja/6090720200625173204428.pdf', 'Beneficiario Externo', '2019-12-28', 49, 0, 0, 'PEAJES', 2, 7, 49900, 'PEAJES', '2020-06-25 16:28:30', 1, 1, 1),
(1453, 'images/egresoscaja/4650620200625174711941.pdf', 'Beneficiario Externo', '2020-01-09', 49, 0, 0, 'CARTA DIESEL', 3, 15, 57000, 'REPUESTOS', '2020-06-25 16:37:10', 1, 1, 1),
(1454, 'images/egresoscaja/6569920200625174722972.pdf', 'Beneficiario Externo', '2020-01-08', 49, 0, 0, 'COMERCIALIZADORA DE COMBUSTIBLE', 3, 10, 369951, 'COMBUSTIBLE', '2020-06-25 16:39:04', 1, 1, 1),
(1455, 'images/egresoscaja/9854220200625174732512.pdf', 'Beneficiario Externo', '2020-01-10', 49, 0, 0, 'PEAJES', 2, 7, 505500, 'PEAJES', '2020-06-25 16:42:31', 1, 1, 1),
(1456, 'images/egresoscaja/1593520200625174747075.pdf', 'Beneficiario Externo', '2020-01-07', 49, 0, 0, 'VARIOS', 5, 29, 284500, 'COMPRA', '2020-06-25 16:43:15', 1, 1, 1),
(1457, 'images/egresoscaja/8426920200713155901084.pdf', 'Beneficiario Externo', '2020-01-18', 49, 0, 0, 'peajes varios', 2, 7, 668600, 'peajes varios', '2020-07-13 14:48:25', 1, 1, 1),
(1458, 'images/egresoscaja/1011320200713155925100.pdf', 'Beneficiario Externo', '2020-01-18', 49, 0, 0, 'VARIOS', 3, 15, 2551400, 'MANTENIMIENTOS Y COMPRA DE REPUESTOS VARIOS', '2020-07-13 14:49:39', 1, 1, 1),
(1459, 'images/egresoscaja/1650520200713160417329.pdf', 'Beneficiario Externo', '2020-02-20', 49, 0, 0, 'PEAJES', 2, 7, 1582450, 'PEAJES', '2020-07-13 14:54:10', 1, 1, 1),
(1460, 'images/egresoscaja/646820200713160449666.pdf', 'Beneficiario Externo', '2020-02-20', 49, 0, 0, 'VARIOS', 3, 15, 2102416, 'MANTENIMIENTO Y COMPRA DE REPUESTOS', '2020-07-13 14:56:20', 1, 1, 1),
(1461, 'images/egresoscaja/6726520200713160504423.pdf', 'Beneficiario Externo', '2020-02-20', 49, 0, 0, 'VARIOS', 2, 7, 570000, 'PAGOS DE VIATICOS, PARQUEO Y DEMAS', '2020-07-13 15:00:09', 1, 1, 1),
(1462, 'images/egresoscaja/6757820200713161708656.pdf', 'Beneficiario Externo', '2020-01-22', 49, 0, 0, 'PEAJES', 2, 7, 713600, 'PEAJES', '2020-07-13 15:06:36', 1, 1, 1),
(1463, 'images/egresoscaja/6498520200713161736746.pdf', 'Beneficiario Externo', '2020-01-22', 49, 0, 0, 'VARIOS', 3, 15, 3068656, 'MANTENIMIENTO Y COMPRA DE REPUESTOS', '2020-07-13 15:07:25', 1, 1, 1),
(1464, 'images/egresoscaja/3539620200713162257055.pdf', 'Beneficiario Externo', '2020-01-25', 49, 0, 0, 'PEAJES', 2, 7, 258500, 'peajes', '2020-07-13 15:12:21', 1, 1, 1),
(1465, 'images/egresoscaja/1401720200713162312119.pdf', 'Beneficiario Externo', '2020-01-25', 49, 0, 0, 'varios', 3, 15, 741500, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-13 15:15:07', 1, 1, 1),
(1466, 'images/egresoscaja/4890720200713163006244.pdf', 'Beneficiario Externo', '2020-01-27', 49, 0, 0, 'PEAJES', 2, 7, 366300, 'peajes', '2020-07-13 15:19:43', 1, 1, 1),
(1467, 'images/egresoscaja/6127120200713163025897.pdf', 'Beneficiario Externo', '2020-01-27', 49, 0, 0, 'VARIOS', 3, 15, 633700, 'MANTENIMIENTO Y COMPRA DE REPUESTOS', '2020-07-13 15:20:24', 1, 1, 1),
(1468, 'images/egresoscaja/2152420200713163312869.pdf', 'Beneficiario Externo', '2020-01-31', 49, 0, 0, 'PEAJES', 2, 7, 273000, 'PEAJES', '2020-07-13 15:22:28', 1, 1, 1),
(1469, 'images/egresoscaja/57120200713163327021.pdf', 'Beneficiario Externo', '2020-01-31', 49, 0, 0, 'VARIOS', 3, 15, 727000, 'MANTENIMIENTO Y COMPRA DE REPUESTOS', '2020-07-13 15:23:08', 1, 1, 1),
(1470, 'images/egresoscaja/8266420200713175313152.pdf', 'Beneficiario Externo', '2020-02-07', 49, 0, 0, 'PEAJES', 2, 7, 312700, 'PEAJES', '2020-07-13 16:43:56', 1, 1, 1),
(1472, 'images/egresoscaja/3745020200713175346754.pdf', 'Beneficiario Externo', '2020-02-11', 49, 0, 0, 'seguros mundial', 3, 16, 678350, 'SOAT UEW 789', '2020-07-13 16:47:51', 1, 1, 1),
(1473, 'images/egresoscaja/4312220200713175400317.pdf', 'Beneficiario Externo', '2020-02-07', 49, 0, 0, 'VARIOS', 3, 11, 233300, 'COMPRAS Y VIATICOS VARIOS', '2020-07-13 16:48:40', 1, 1, 1),
(1474, 'images/egresoscaja/3577420200713180212756.pdf', 'Beneficiario Externo', '2020-02-07', 49, 0, 0, 'PEAJES', 2, 7, 108000, 'PEAJES', '2020-07-13 16:51:21', 1, 1, 1),
(1475, 'images/egresoscaja/5392620200713180223619.pdf', 'Beneficiario Externo', '2020-02-07', 49, 0, 0, 'VARIOS', 3, 15, 892000, 'MANTENIMIENTO Y COMPRA DE REPUESTPS', '2020-07-13 16:51:57', 1, 1, 1),
(1476, 'images/egresoscaja/7460820200715111557578.pdf', 'Beneficiario Externo', '2020-02-24', 49, 0, 0, 'PEAJES', 2, 7, 226100, 'PEAJES VARIOS', '2020-07-15 10:05:51', 1, 1, 1),
(1477, 'images/egresoscaja/6977420200715111611369.pdf', 'Beneficiario Externo', '2020-02-24', 49, 0, 0, 'VARIOS', 3, 15, 273900, 'MANTENIMIENTO Y COMPRE DE REPUESTOS', '2020-07-15 10:06:52', 1, 1, 1),
(1478, 'images/egresoscaja/35020200715112010030.pdf', 'Beneficiario Externo', '2020-03-09', 49, 0, 0, 'VARIOS', 3, 15, 600000, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 10:09:17', 1, 1, 1),
(1479, 'images/egresoscaja/1803420200715112234348.pdf', 'Beneficiario Externo', '2020-02-27', 49, 0, 0, 'PEAJES', 2, 7, 282700, 'PEAJES VARIOS', '2020-07-15 10:12:10', 1, 1, 1),
(1480, 'images/egresoscaja/978020200715112250518.pdf', 'Beneficiario Externo', '2000-01-27', 49, 0, 0, 'VARIOS', 3, 15, 807400, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 10:13:50', 1, 1, 1),
(1481, 'images/egresoscaja/9476820200715112306371.pdf', 'Beneficiario Externo', '2020-02-27', 49, 0, 0, 'VARIOS', 3, 15, 116800, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 10:14:42', 1, 1, 1),
(1482, 'images/egresoscaja/3830720200715114743995.pdf', 'Beneficiario Externo', '2020-03-10', 49, 0, 0, 'PEAJES', 2, 7, 46400, 'PEAJES', '2020-07-15 10:37:34', 1, 1, 1),
(1483, 'images/egresoscaja/7178120200715114813500.pdf', 'Beneficiario Externo', '2020-03-10', 49, 0, 0, 'VARIOS', 3, 15, 1149000, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 10:38:39', 1, 1, 1),
(1484, 'images/egresoscaja/6310720200715114821796.pdf', 'Beneficiario Externo', '2020-03-11', 49, 0, 0, 'TIERRA EL GOSEN', 4, 17, 3200, 'COMPRA', '2020-07-15 10:39:55', 1, 1, 1),
(1485, 'images/egresoscaja/3676820200715115351220.pdf', 'Beneficiario Externo', '2020-03-03', 49, 0, 0, 'MAQUINARIA Y CONSTRUCCION DANOVIS BUELVA', 3, 15, 1100000, 'ARREGLO RETRO CAT 336', '2020-07-15 10:42:44', 1, 1, 1),
(1486, 'images/egresoscaja/9062020200715115800459.pdf', 'Beneficiario Externo', '2020-03-13', 49, 0, 0, 'MAQUINARIA Y CONSTRUCCION DANOVIS BUELVA', 3, 15, 900000, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 10:46:56', 1, 1, 1),
(1487, 'images/egresoscaja/2247220200715122251949.pdf', 'Beneficiario Externo', '2020-03-13', 49, 0, 0, 'PEAJES', 2, 7, 153200, 'PEAJES', '2020-07-15 11:12:29', 1, 1, 1),
(1488, 'images/egresoscaja/6424220200715122310026.pdf', 'Beneficiario Externo', '2020-03-03', 49, 0, 0, 'TALLER Y LLANTERIA TOLUVIEJO', 3, 15, 275000, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 11:13:06', 1, 1, 1),
(1489, 'images/egresoscaja/7244420200715122318243.pdf', 'Beneficiario Externo', '2020-03-13', 49, 0, 0, 'VARIOS', 3, 15, 31000, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 11:14:16', 1, 1, 1),
(1490, 'images/egresoscaja/987220200715122326816.pdf', 'Beneficiario Externo', '2020-03-16', 49, 0, 0, 'REFRIELECTROCS EMMANUEL', 3, 15, 10000, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 11:16:51', 1, 1, 1),
(1491, 'images/egresoscaja/980120200715122924041.pdf', 'Beneficiario Externo', '2020-03-13', 49, 0, 0, 'EL PALACIO DEL RADIADOR', 3, 15, 530000, 'ARREGLO MULA', '2020-07-15 11:18:15', 1, 1, 1),
(1492, 'images/egresoscaja/8479720200715154940249.pdf', 'Beneficiario Externo', '2020-06-18', 49, 0, 0, 'PEAJES', 2, 7, 51000, 'PEAJES', '2020-07-15 14:45:49', 1, 1, 1),
(1493, 'images/egresoscaja/3499220200715154948423.pdf', 'Beneficiario Externo', '2020-06-19', 49, 0, 0, 'COMBUSTIBLE', 3, 10, 130000, 'COMBUSTIBLE', '2020-07-15 14:46:57', 1, 1, 1),
(1494, 'images/egresoscaja/676520200715155000806.pdf', 'Beneficiario Externo', '2020-06-18', 49, 0, 0, 'VARIOS', 2, 7, 95000, 'COMPRAS MENORES', '2020-07-15 14:48:12', 1, 1, 1),
(1495, 'images/egresoscaja/4308920200715155013062.pdf', 'Beneficiario Externo', '2020-06-19', 49, 0, 0, 'TALLER Y LLANTERIA TOLUVIEJO', 3, 15, 35000, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 14:49:10', 1, 1, 1),
(1496, 'images/egresoscaja/6124720200715160258619.pdf', 'Beneficiario Externo', '2020-06-19', 49, 0, 0, 'COMERCIAL TOLUVIEJO', 3, 15, 6700, 'MANTENIMIENTO Y REPUESTOS VARIOS', '2020-07-15 14:52:37', 1, 1, 1),
(1497, 'images/egresoscaja/12850contenido-no-disponible.jpg', 'Beneficiario Externo', '2019-08-04', 49, 0, 0, 'VARIOS', 3, 15, 598652, 'COMPRA', '2020-07-15 15:48:15', 1, 1, 1),
(1498, 'images/egresoscaja/1880820200722120035652.pdf', 'Beneficiario Externo', '2020-06-04', 50, 0, 0, 'PEAJES', 2, 7, 190400, 'PEAJES', '2020-07-22 10:49:43', 1, 1, 1),
(1499, 'images/egresoscaja/5754420200722120050492.pdf', 'Beneficiario Externo', '2020-06-05', 50, 0, 0, 'CARLOS DIAZ', 3, 15, 1200000, 'PAGO ARREGLO RETRO Y VIATICOS', '2020-07-22 10:51:04', 1, 1, 1),
(1500, 'images/egresoscaja/5132420200722120414179.pdf', 'Beneficiario Externo', '2020-06-09', 50, 0, 0, 'PEAJES', 2, 7, 43100, 'PEAJES', '2020-07-22 10:53:10', 1, 1, 1),
(1501, 'images/egresoscaja/5900720200722120422246.pdf', 'Beneficiario Externo', '2020-06-08', 50, 0, 0, 'LUBRICANTES DEL CARIBE', 3, 15, 360000, 'COMPRA', '2020-07-22 10:53:46', 1, 1, 1),
(1502, 'images/egresoscaja/6273720200722120649171.pdf', 'Beneficiario Externo', '2020-06-02', 50, 0, 0, 'DISTRACOM', 3, 10, 31014, 'COMBUSTIBLE', '2020-07-22 10:56:03', 1, 1, 1),
(1503, 'images/egresoscaja/6813220200722120705046.pdf', 'Beneficiario Externo', '2020-06-03', 50, 0, 0, 'VARIOS', 3, 15, 2480000, 'PAGO REPUESTO', '2020-07-22 10:57:03', 1, 1, 1),
(1504, 'images/egresoscaja/8257520200722121722492.pdf', 'Beneficiario Externo', '2020-06-03', 50, 0, 0, 'PEAJES', 2, 7, 229500, 'PEAJES', '2020-07-22 11:06:35', 1, 1, 1),
(1505, 'images/egresoscaja/628620200722121737613.pdf', 'Beneficiario Externo', '2020-06-02', 50, 0, 0, 'TALLER Y LLANTERIA TOLUVIEJO', 3, 15, 120000, 'MANTENIMIENTOS', '2020-07-22 11:07:08', 1, 1, 1),
(1506, 'images/egresoscaja/173920200722122044485.pdf', 'Beneficiario Externo', '2020-06-01', 50, 0, 0, 'PEAJES', 2, 7, 77900, 'PEAJES', '2020-07-22 11:09:54', 1, 1, 1),
(1507, 'images/egresoscaja/9208220200722122052699.pdf', 'Beneficiario Externo', '2020-06-01', 50, 0, 0, 'DISTRACOM', 3, 10, 799000, 'COMBUSTIBLE', '2020-07-22 11:10:36', 1, 1, 1),
(1508, 'images/egresoscaja/6354320200722122102496.pdf', 'Beneficiario Externo', '2020-06-01', 50, 0, 0, 'VARIOS', 3, 15, 1532000, 'MANTENIMIENTO Y COMPRA DE REPUESTOS', '2020-07-22 11:12:02', 1, 1, 1),
(1509, 'images/egresoscaja/1103420200722123120801.pdf', 'Beneficiario Externo', '2020-06-16', 50, 0, 0, 'PEAJES', 2, 7, 51000, 'PEAJES', '2020-07-22 11:19:23', 1, 1, 1),
(1510, 'images/egresoscaja/9481920200722123132882.pdf', 'Beneficiario Externo', '2020-06-16', 50, 0, 0, 'VARIOS', 3, 15, 1398000, 'MANTENIMIENTOS', '2020-07-22 11:20:54', 1, 1, 1),
(1515, 'images/egresoscaja/29400image.jpg', 'Beneficiario Externo', '2020-08-07', 33, 50, 50, 'Asoarel', 5, 30, 300000, 'Compra de arena lorica', '2020-08-14 17:01:03', 1, 1, 1),
(1516, 'images/egresoscaja/8679115975060457757231014085139232500.jpg', 'Beneficiario Externo', '2020-03-28', 33, 0, 0, 'Terpel', 2, 36, 5000, 'Pago combustible', '2020-08-15 10:37:41', 1, 1, 1),
(1517, 'images/egresoscaja/2152915975060457757231014085139232500.jpg', 'Beneficiario Externo', '2020-03-28', 33, 0, 0, 'Terpel', 2, 36, 5000, 'Pago combustible', '2020-08-15 10:37:41', 1, 1, 1),
(1518, 'images/egresoscaja/8156815975069627398728518927852478579.jpg', 'Beneficiario Externo', '2020-03-01', 33, 0, 0, 'Carlos D?az', 2, 7, 70000, 'Transporte jose daniel', '2020-08-15 10:55:54', 1, 1, 1),
(1519, 'images/egresoscaja/7892215975071951414306527674149177173.jpg', 'Beneficiario Externo', '2020-03-09', 33, 0, 0, 'Terpel', 3, 10, 20000, 'Pago combustible', '2020-08-15 10:59:52', 1, 1, 1),
(1520, 'images/egresoscaja/6531215975069627398728518927852478579.jpg', 'Beneficiario Externo', '2020-03-01', 33, 0, 0, 'Carlos D?az', 2, 7, 70000, 'Transporte jose daniel', '2020-08-15 10:55:54', 1, 1, 1),
(1521, 'images/egresoscaja/4257115975074051004509416072095042291.jpg', 'Beneficiario Externo', '2020-03-04', 33, 0, 0, 'Torcoroma', 2, 7, 110000, 'Pago vi?ticos', '2020-08-15 11:03:21', 1, 1, 1),
(1522, 'images/egresoscaja/1907715975075331221523628109922413044.jpg', 'Beneficiario Externo', '2020-03-04', 33, 0, 0, 'Si pruebo me quedo', 4, 19, 15000, 'Servicio comedor', '2020-08-15 11:05:31', 1, 1, 1),
(1523, 'images/egresoscaja/202361597507825297465089020832623167.jpg', 'Beneficiario Externo', '2020-03-05', 33, 0, 0, 'Comercial tolu viejo', 3, 12, 96000, 'Compra limpia hidromax', '2020-08-15 11:10:18', 1, 1, 1),
(1524, 'images/egresoscaja/8636915975080831192667085188961856058.jpg', 'Beneficiario Externo', '2020-03-05', 33, 0, 0, 'Ferreter?a el centavo menos', 5, 29, 2000, 'Compra material', '2020-08-15 11:14:41', 1, 1, 1),
(1525, 'images/egresoscaja/583911597508257308832541855480610029.jpg', 'Beneficiario Externo', '2020-03-05', 33, 0, 0, 'Forma multiusos', 5, 30, 5400, 'Compra bolsa, derza', '2020-08-15 11:17:30', 1, 1, 1),
(1526, 'images/egresoscaja/1917415975085079522156033536658407949.jpg', 'Beneficiario Externo', '2020-03-06', 33, 0, 0, 'Pedro bossio', 4, 26, 20000, 'Pago dia adicional en planta', '2020-08-15 11:21:46', 1, 1, 1),
(1527, 'images/egresoscaja/6022315975087178588628755932570699334.jpg', 'Beneficiario Externo', '2020-03-07', 33, 0, 0, 'Lubricantes y filtros medellin', 3, 12, 180000, 'Compra insumo', '2020-08-15 11:25:16', 1, 1, 1),
(1528, 'images/egresoscaja/6018915975090091018795262263437816975.jpg', 'Beneficiario Externo', '2020-03-09', 33, 0, 0, 'Comercial tolu viejo', 5, 29, 4900, 'Compra de Union yxy', '2020-08-15 11:30:07', 1, 1, 1),
(1529, 'images/egresoscaja/7024215975093965905037713881741454060.jpg', 'Beneficiario Externo', '2020-03-12', 33, 0, 0, 'Comercial tolu viejo', 3, 12, 46000, 'Galon de aceite', '2020-08-15 11:32:28', 1, 1, 1),
(1530, 'images/egresoscaja/203315975097714641419165066314131775.jpg', 'Beneficiario Externo', '2020-03-12', 33, 0, 0, 'Maki partes', 3, 12, 1680237, 'Compra de hardtec hidraulico', '2020-08-15 11:39:12', 1, 1, 1),
(1531, 'images/egresoscaja/9198715975099942575648737693071932180.jpg', 'Beneficiario Externo', '2020-08-12', 33, 0, 0, 'Almac?n las maquinas', 3, 15, 1336500, 'Compra dientes con pasadores para valoe retro 330', '2020-08-15 11:46:32', 1, 1, 1),
(1532, 'images/egresoscaja/7843615975103003378853659230266742888.jpg', 'Beneficiario Externo', '2020-08-16', 33, 0, 0, 'Comercial toluviejo', 3, 12, 225000, 'Gasto insumo', '2020-08-15 11:49:30', 1, 1, 1),
(1533, 'images/egresoscaja/2658315977583060247734600374832495638.jpg', 'Beneficiario Externo', '2020-03-13', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 20000, 'Pago bajada de llanta', '2020-08-18 08:45:01', 1, 1, 1),
(1534, 'images/egresoscaja/8114415977584920253174592132304454703.jpg', 'Beneficiario Externo', '2020-03-09', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 10000, 'Fabricaci?n borde de bateria', '2020-08-18 08:48:08', 1, 1, 1),
(1535, 'images/egresoscaja/6001715977586027635715030323402429084.jpg', 'Beneficiario Externo', '2020-03-17', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 95000, 'Pago varios', '2020-08-18 08:49:56', 1, 1, 1),
(1536, 'images/egresoscaja/8462515977587147672316499597913898423.jpg', 'Beneficiario Externo', '2020-03-17', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 35000, 'Pago varios', '2020-08-18 08:51:52', 1, 1, 1),
(1537, 'images/egresoscaja/7395915977588703615381530775711218388.jpg', 'Beneficiario Externo', '2020-03-17', 33, 0, 0, 'Lubricantes y filtros medellin', 3, 12, 55000, 'Compra de aceite', '2020-08-18 08:53:52', 1, 1, 1),
(1538, 'images/egresoscaja/7911615977591303966851155745701272645.jpg', 'Beneficiario Externo', '2020-03-17', 33, 0, 0, 'Radiadores koky', 3, 15, 250000, 'Pago varios', '2020-08-18 08:58:30', 1, 1, 1),
(1539, 'images/egresoscaja/2550615977593914934043477218098787629.jpg', 'Beneficiario Externo', '2020-03-18', 33, 0, 0, 'Don parrillla', 4, 18, 98400, 'Pago almuerzo', '2020-08-18 09:02:58', 1, 1, 1),
(1540, 'images/egresoscaja/8822615977596968055711194382548244063.jpg', 'Beneficiario Externo', '2020-03-17', 33, 0, 0, 'Comercial toluviejo', 3, 12, 430000, '2 limpian ursa', '2020-08-18 09:08:13', 1, 1, 1),
(1541, 'images/egresoscaja/4396615977598527788261207451752080408.jpg', 'Beneficiario Externo', '2020-03-17', 33, 0, 0, 'Comercial toluviejo', 3, 15, 27000, 'Tornillos', '2020-08-18 09:10:50', 1, 1, 1),
(1542, 'images/egresoscaja/7494815977599758372620984748039746767.jpg', 'Beneficiario Externo', '2020-03-18', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 10000, 'Bajada de llanta', '2020-08-18 09:12:39', 1, 1, 1),
(1543, 'images/egresoscaja/2282715977601362465295413281461113234.jpg', 'Beneficiario Externo', '2020-03-18', 33, 0, 0, 'Comercial toluviejo', 3, 15, 10800, 'Tornillo', '2020-08-18 09:15:33', 1, 1, 1),
(1544, 'images/egresoscaja/6545415977602705037883208403712545273.jpg', 'Beneficiario Externo', '2020-03-19', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 20000, 'Cambio de llanta', '2020-08-18 09:17:47', 1, 1, 1),
(1545, 'images/egresoscaja/7692015977603612102284060548407217636.jpg', 'Beneficiario Externo', '2020-03-20', 33, 0, 0, 'Petromil', 3, 10, 100984, 'Pago combustible', '2020-08-18 09:19:19', 1, 1, 1),
(1546, 'images/egresoscaja/9232615977605229035050005001916001780.jpg', 'Beneficiario Externo', '2020-03-20', 33, 0, 0, 'E.d.s pinar del rio', 3, 10, 50000, 'Pago combustible', '2020-08-18 09:22:00', 1, 1, 1),
(1547, 'images/egresoscaja/6260315977606674586407907293823298635.jpg', 'Beneficiario Externo', '2020-03-20', 33, 0, 0, 'Ferro Agro GM', 3, 12, 5000, 'Sinta teflon', '2020-08-18 09:24:21', 1, 1, 1),
(1548, 'images/egresoscaja/187115977608066708679172897142730943.jpg', 'Beneficiario Externo', '2020-03-20', 33, 0, 0, 'Restaurante mi ranchito', 4, 18, 23000, 'Pago almuerzos', '2020-08-18 09:26:43', 1, 1, 1),
(1549, 'images/egresoscaja/7474515977609570138828640587354204927.jpg', 'Beneficiario Externo', '2020-03-27', 33, 0, 0, 'Forma multiusos', 5, 30, 7400, 'varios', '2020-08-18 09:28:45', 1, 1, 1),
(1550, 'images/egresoscaja/2482915977612586177809691384066213798.jpg', 'Beneficiario Externo', '2020-02-27', 33, 0, 0, 'Hotel Day', 2, 7, 40000, 'Pago hotel Carlos san marcos', '2020-08-18 09:34:02', 1, 1, 1),
(1551, 'images/egresoscaja/7052715977614332566166462400834274193.jpg', 'Caja Sistema', '2020-03-12', 33, 49, 49, '', 0, 0, 1000000, 'Caja menor raul', '2020-08-18 09:37:09', 1, 1, 1),
(1552, 'images/egresoscaja/8773315977615419632210496095633453461.jpg', 'Caja Sistema', '2020-03-13', 33, 49, 49, '', 0, 0, 900000, 'Caja menor raul', '2020-08-18 09:39:00', 1, 1, 1),
(1553, 'images/egresoscaja/542641597761619731262104692412893296.jpg', 'Beneficiario Externo', '2020-03-19', 33, 0, 0, 'Distracom', 3, 10, 100000, 'Pago combustible', '2020-08-18 09:40:14', 1, 1, 1),
(1554, 'images/egresoscaja/5609915977617918448389100091345086706.jpg', 'Beneficiario Externo', '2020-03-12', 33, 0, 0, 'AGM desarrollos SAS', 5, 30, 712500, 'Compra de polvillo', '2020-08-18 09:42:17', 1, 1, 1),
(1555, 'images/egresoscaja/685615977621152593778673942089365125.jpg', 'Beneficiario Externo', '2020-06-03', 33, 0, 0, 'Distracom', 3, 10, 100000, 'Pago combustible', '2020-08-18 09:47:51', 1, 1, 1),
(1556, 'images/egresoscaja/4184415977624954413815468329113366932.jpg', 'Beneficiario Externo', '2020-03-06', 33, 0, 0, 'Carlos D?az', 3, 13, 10000, 'Ayuda bajada de marma monteria', '2020-08-18 09:54:51', 1, 1, 1),
(1557, 'images/egresoscaja/930661597762649426232390386400540995.jpg', 'Beneficiario Externo', '2020-06-27', 33, 0, 0, 'David santos', 4, 25, 1000000, 'Pago asesor?a planta de asfalto', '2020-08-18 09:57:26', 1, 1, 1),
(1558, 'images/egresoscaja/3450515977627726694137576937554114772.jpg', 'Beneficiario Externo', '2020-06-27', 33, 0, 0, 'Distracom', 3, 10, 23000, 'Pago combustible', '2020-08-18 09:59:31', 1, 1, 1),
(1559, 'images/egresoscaja/66415977628764688787354089736610365.jpg', 'Beneficiario Externo', '2020-06-30', 33, 0, 0, 'Lubricantes y filtros medellin', 3, 15, 17000, 'Pago tornillos', '2020-08-18 10:01:10', 1, 1, 1),
(1560, 'images/egresoscaja/403915977629950864971901373454245908.jpg', 'Beneficiario Externo', '2020-06-30', 33, 0, 0, 'Alfa supplies s.a.s', 5, 30, 81999, 'Pago botas , se?al estandar', '2020-08-18 10:03:12', 1, 1, 1),
(1561, 'images/egresoscaja/1542815977632779937387175171039672169.jpg', 'Beneficiario Externo', '2020-07-01', 33, 0, 0, 'Tofer M.D.E', 3, 15, 147075, 'Pago repuestos', '2020-08-18 10:07:55', 1, 1, 1),
(1562, 'images/egresoscaja/4011915977635084252950131589644099083.jpg', 'Beneficiario Externo', '2020-03-05', 33, 0, 0, 'Tofer M.D.E', 3, 15, 21092, 'Compra varios', '2020-08-18 10:11:45', 1, 1, 1),
(1563, 'images/egresoscaja/1584215977636445797038175030174625311.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'Redebam', 3, 10, 20000, 'Pago combustible', '2020-08-18 10:14:02', 1, 1, 1),
(1564, 'images/egresoscaja/5391215977638080607666520017107037186.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'Redebam', 3, 10, 50000, 'Pago combustible', '2020-08-18 10:16:45', 1, 1, 1),
(1565, 'images/egresoscaja/2723915977639084815011464149141815719.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'Comercial toluviejo', 3, 12, 96000, 'Pimpina hidromax', '2020-08-18 10:18:26', 1, 1, 1),
(1566, 'images/egresoscaja/141371597763994174504021736498689974.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'Montallanta la mejor', 3, 13, 40000, 'Arreglo de llanta', '2020-08-18 10:19:51', 1, 1, 1),
(1567, 'images/egresoscaja/1773815977641617444689027465678381353.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'Romova s.a.s', 3, 15, 28800, 'Compra de tubo', '2020-08-18 10:22:35', 1, 1, 1),
(1568, 'images/egresoscaja/9354015977642920398990586058266351459.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'Serv? maquinaria', 3, 15, 3000, 'Compra oting', '2020-08-18 10:24:49', 1, 1, 1),
(1569, 'images/egresoscaja/6507715977643972952198429005028199897.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'C.A camiones', 3, 12, 138000, 'Silicona, empaque', '2020-08-18 10:26:34', 1, 1, 1),
(1570, 'images/egresoscaja/3185715977650524852384716653378957874.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'Ra?l Vergara', 3, 13, 50000, 'Revisar y corregir  el?ctrico', '2020-08-18 10:37:22', 1, 1, 1),
(1571, 'images/egresoscaja/4071315977652999507904408563078492302.jpg', 'Beneficiario Externo', '2020-07-02', 33, 0, 0, 'Carlos D?az', 3, 12, 20000, 'Compra de silicona gris para el cargador', '2020-08-18 10:41:19', 1, 1, 1),
(1572, 'images/egresoscaja/6709515977654434336530459174746880249.jpg', 'Beneficiario Externo', '2020-07-03', 33, 0, 0, 'Jos? Daniel meza', 4, 26, 200000, 'Pago peajes', '2020-08-18 10:43:59', 1, 1, 1),
(1573, 'images/egresoscaja/4659415977658048213839089896458639593.jpg', 'Beneficiario Externo', '2020-07-03', 33, 0, 0, 'Egipciz', 4, 18, 75000, 'Pago almuerzo', '2020-08-18 10:47:25', 1, 1, 1),
(1574, 'images/egresoscaja/4178415977658667915615180472715843546.jpg', 'Beneficiario Externo', '2020-07-03', 33, 0, 0, 'Motocar, lavadero', 3, 13, 44000, 'Lavado de camioneta', '2020-08-18 10:51:04', 1, 1, 1),
(1575, 'images/egresoscaja/1996115977660008521964546879979387339.jpg', 'Beneficiario Externo', '2020-07-03', 33, 0, 0, 'Comercial toluviejo', 3, 12, 96000, 'Pimpina hidromax', '2020-08-18 10:53:18', 1, 1, 1),
(1576, 'images/egresoscaja/9593015977661061046645726777965197122.jpg', 'Beneficiario Externo', '2020-07-04', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 120000, 'Arreglo de llanta', '2020-08-18 10:55:04', 1, 1, 1),
(1577, 'images/egresoscaja/9637315977662111244412745726679960777.jpg', 'Beneficiario Externo', '2020-07-04', 33, 0, 0, 'Taller de mec?nica hermanos villalba', 3, 13, 230000, 'Cambio de empaque de culata', '2020-08-18 10:56:44', 1, 1, 1),
(1578, 'images/egresoscaja/3252015977664377114116827986612748820.jpg', 'Beneficiario Externo', '2020-07-06', 33, 0, 0, 'Ferreter?a el centavo menos', 5, 30, 30000, 'Candado', '2020-08-18 10:59:04', 1, 1, 1),
(1579, 'images/egresoscaja/2065315977665859551955752917847248161.jpg', 'Beneficiario Externo', '2020-07-06', 33, 0, 0, 'Comercial toluviejo', 3, 12, 98400, 'Aceite hidromax', '2020-08-18 11:03:04', 1, 1, 1),
(1580, 'images/egresoscaja/4328815977666850255936890234758390278.jpg', 'Beneficiario Externo', '2020-07-07', 33, 0, 0, 'Distracom', 3, 10, 100000, 'Pago combustible', '2020-08-18 11:04:38', 1, 1, 1),
(1581, 'images/egresoscaja/8469815977667721944675252064854144921.jpg', 'Beneficiario Externo', '2020-07-07', 33, 0, 0, 'Redebam', 3, 10, 30000, 'Pago combustible', '2020-08-18 11:06:10', 1, 1, 1),
(1582, 'images/egresoscaja/1181215977668544033825785441176026506.jpg', 'Beneficiario Externo', '2020-07-07', 33, 0, 0, 'La browniseria', 4, 18, 36000, 'Pago torta', '2020-08-18 11:07:31', 1, 1, 1),
(1583, 'images/egresoscaja/4784315977670070386086305192492378679.jpg', 'Beneficiario Externo', '2020-07-05', 33, 0, 0, 'Luz mila rosa', 4, 21, 500000, 'Abono a n?mina', '2020-08-18 11:10:05', 1, 1, 1),
(1584, 'images/egresoscaja/3944615977670965393838210288478399564.jpg', 'Beneficiario Externo', '2020-07-07', 33, 0, 0, 'Eventos pombo parrilla', 4, 18, 48900, 'Pago torta', '2020-08-18 11:11:34', 1, 1, 1),
(1585, 'images/egresoscaja/5625315977674527939202874443314517512.jpg', 'Beneficiario Externo', '2020-07-08', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 80000, 'Arreglo de llanta', '2020-08-18 11:17:29', 1, 1, 1),
(1586, 'images/egresoscaja/1376415977675525218474884234495702162.jpg', 'Beneficiario Externo', '2020-07-08', 33, 0, 0, 'Comercial toluviejo', 3, 12, 308000, 'Pimpina ursa, gal?n 15w40', '2020-08-18 11:19:11', 1, 1, 1),
(1587, 'images/egresoscaja/8762615977677084379114404474448422797.jpg', 'Beneficiario Externo', '2020-07-08', 33, 0, 0, 'Multi max', 5, 30, 60000, 'Compra alcohol', '2020-08-18 11:21:45', 1, 1, 1),
(1588, 'images/egresoscaja/213615977680391504188751682156483326.jpg', 'Beneficiario Externo', '2020-07-08', 33, 0, 0, 'Alfa supplies s.a.s', 5, 30, 312500, 'Varios', '2020-08-18 11:27:17', 1, 1, 1),
(1589, 'images/egresoscaja/6559415977683317884275921871195763218.jpg', 'Beneficiario Externo', '2020-07-09', 33, 0, 0, 'Ferreter?a el centavo menos', 3, 15, 7500, 'Varios', '2020-08-18 11:32:10', 1, 1, 1),
(1590, 'images/egresoscaja/5041115977685408585671151307106286840.jpg', 'Beneficiario Externo', '2020-07-09', 33, 0, 0, 'Lubricantes y filtros medellin', 3, 15, 55000, 'Compra tornillo', '2020-08-18 11:35:27', 1, 1, 1),
(1591, 'images/egresoscaja/3414215977686680248865105491325231512.jpg', 'Beneficiario Externo', '2020-07-09', 33, 0, 0, 'Ra?l Vergara', 3, 13, 20000, 'Compra de tiene y pegante', '2020-08-18 11:37:46', 1, 1, 1),
(1592, 'images/egresoscaja/7629415977687948277453695886101326803.jpg', 'Beneficiario Externo', '2020-07-09', 33, 0, 0, 'Ferroconstrucciones', 3, 12, 12000, 'Compra temflex', '2020-08-18 11:39:52', 1, 1, 1),
(1593, 'images/egresoscaja/9418315977689229246928010167104105183.jpg', 'Beneficiario Externo', '2020-07-08', 33, 0, 0, 'Neum?tica l.c', 3, 13, 30000, 'Fabricaci?n de sello', '2020-08-18 11:41:59', 1, 1, 1),
(1594, 'images/egresoscaja/5915215977691406623593027087683255462.jpg', 'Beneficiario Externo', '2020-07-09', 33, 0, 0, 'Rodolfo diaz', 4, 21, 150000, 'Anticipo de n?mina', '2020-08-18 11:45:38', 1, 1, 1),
(1595, 'images/egresoscaja/9116215977692385467881676832277644156.jpg', 'Beneficiario Externo', '2020-07-10', 33, 0, 0, 'Distracom', 3, 10, 70000, 'Pago combustible', '2020-08-18 11:47:17', 1, 1, 1),
(1596, 'images/egresoscaja/4030415977693199566168005016186117425.jpg', 'Beneficiario Externo', '2020-07-10', 33, 0, 0, 'Central de frenos', 3, 13, 208000, 'Pasadores , bujes , grasera', '2020-08-18 11:48:38', 1, 1, 1),
(1597, 'images/egresoscaja/1471915977694653425852836239336034937.jpg', 'Beneficiario Externo', '2020-07-10', 33, 0, 0, 'Taller metaltorno J.G', 3, 13, 30000, 'Cambio de buje', '2020-08-18 11:51:04', 1, 1, 1),
(1598, 'images/egresoscaja/8021615977695815648701217502805080930.jpg', 'Beneficiario Externo', '2020-07-10', 33, 0, 0, 'To camiones', 3, 15, 128000, 'Repuesto', '2020-08-18 11:52:57', 1, 1, 1),
(1599, 'images/egresoscaja/5213115977697185903791526618041854579.jpg', 'Beneficiario Externo', '2020-07-11', 33, 0, 0, 'Distracom', 3, 10, 57200, 'Pago combustible', '2020-08-18 11:55:17', 1, 1, 1),
(1600, 'images/egresoscaja/6945015977698199437458566356275584208.jpg', 'Beneficiario Externo', '2020-07-11', 33, 0, 0, 'EDS miramar', 3, 10, 70000, 'Pago combustible', '2020-08-18 11:56:57', 1, 1, 1),
(1601, 'images/egresoscaja/8383715977699140398819796941083689304.jpg', 'Beneficiario Externo', '2020-07-21', 33, 0, 0, 'Redebam', 3, 10, 80000, 'Pago combustible', '2020-08-18 11:58:30', 1, 1, 1),
(1602, 'images/egresoscaja/5372715977700083676840857876411456236.jpg', 'Beneficiario Externo', '2020-07-21', 33, 0, 0, 'Terpel', 3, 10, 80000, 'Pago combustible', '2020-08-18 12:00:06', 1, 1, 1),
(1603, 'images/egresoscaja/9224315977700823138629041755800348795.jpg', 'Beneficiario Externo', '2020-07-22', 33, 0, 0, 'Comercial toluviejo', 3, 12, 616000, 'Pimpina ursa, gal?n 15w40', '2020-08-18 12:01:17', 1, 1, 1),
(1604, 'images/egresoscaja/9252615977701888614936603819920046128.jpg', 'Beneficiario Externo', '2020-07-22', 33, 0, 0, 'Variedades nissi', 5, 30, 30000, 'Varios', '2020-08-18 12:02:48', 1, 1, 1),
(1605, 'images/egresoscaja/1911415977735708147595907093814141310.jpg', 'Beneficiario Externo', '2020-07-22', 33, 0, 0, 'Grupo empresarial', 3, 15, 35000, 'Pasador muelle kenworth', '2020-08-18 12:59:23', 1, 1, 1),
(1606, 'images/egresoscaja/119381597773775927447088677486450429.jpg', 'Beneficiario Externo', '2020-08-07', 33, 0, 0, 'Asociaci?n de areneros de lorica Asoarel', 5, 29, 300000, 'Compra de  arena', '2020-08-18 13:02:31', 1, 1, 1),
(1607, 'images/egresoscaja/6612215977740278575769204221791855848.jpg', 'Beneficiario Externo', '2020-08-08', 33, 0, 0, 'ARENACOR', 5, 29, 300000, 'Compra arena', '2020-08-18 13:06:58', 1, 1, 1),
(1608, 'images/egresoscaja/299415977741274445126609149836563404.jpg', 'Beneficiario Externo', '2020-08-10', 33, 0, 0, 'Asociaci?n de areneros de lorica Asoarel', 5, 29, 300000, 'Compra arena', '2020-08-18 13:08:45', 1, 1, 1),
(1609, 'images/egresoscaja/8251215977741826018274885509349954608.jpg', 'Beneficiario Externo', '2020-08-11', 33, 0, 0, 'ARENACOR', 5, 29, 300000, 'Compra de arena', '2020-08-18 13:09:40', 1, 1, 1),
(1610, 'images/egresoscaja/9617715977742526686384203718531683139.jpg', 'Beneficiario Externo', '2020-08-12', 33, 0, 0, 'ARENACOR', 5, 29, 300000, 'Compra de arena', '2020-08-18 13:10:51', 1, 1, 1),
(1611, 'images/egresoscaja/5745115977743258425664251929944142327.jpg', 'Beneficiario Externo', '2020-08-14', 33, 0, 0, 'ARENACOR', 5, 29, 300000, 'Compra de arena', '2020-08-18 13:12:03', 1, 1, 1),
(1612, 'images/egresoscaja/8292515977743912986561902209455016365.jpg', 'Beneficiario Externo', '2020-08-14', 33, 0, 0, 'Distracom', 3, 10, 100000, 'Pago combustible', '2020-08-18 13:13:08', 1, 1, 1),
(1613, 'images/egresoscaja/611915977746468717434740398068901515.jpg', 'Beneficiario Externo', '2020-08-14', 33, 0, 0, 'Restaurante popular', 4, 18, 290000, 'Pago almuerzo', '2020-08-18 13:17:22', 1, 1, 1),
(1614, 'images/egresoscaja/513081597774777338247373122379675156.jpg', 'Beneficiario Externo', '2020-08-11', 33, 0, 0, 'Almac?n racores y mangueras', 3, 15, 70000, 'Manguera', '2020-08-18 13:19:36', 1, 1, 1),
(1615, 'images/egresoscaja/2899915977749081071360452427745645313.jpg', 'Beneficiario Externo', '2020-08-14', 33, 0, 0, 'Alfa supplies s.a.s', 5, 30, 700369, 'Varios', '2020-08-18 13:21:46', 1, 1, 1),
(1616, 'images/egresoscaja/6885815977751919483102612551494734692.jpg', 'Beneficiario Externo', '2020-08-14', 33, 0, 0, 'Almac?n racores  y mangueras', 3, 15, 80000, 'Repuesto', '2020-08-18 13:26:27', 1, 1, 1),
(1617, 'images/egresoscaja/901215977777514431545853787257397447.jpg', 'Beneficiario Externo', '2020-02-29', 33, 0, 0, 'Peaje', 2, 7, 97800, 'Pago peaje mes febrero', '2020-08-18 14:00:34', 1, 1, 1),
(1618, 'images/egresoscaja/4193915977780193561139192376546414226.jpg', 'Beneficiario Externo', '2020-02-29', 33, 0, 0, 'Peaje', 2, 7, 118400, 'Pago peaje mes de febrero', '2020-08-18 14:13:37', 1, 1, 1),
(1619, 'images/egresoscaja/420015977781228332925943894942868916.jpg', 'Beneficiario Externo', '2020-02-29', 33, 0, 0, 'Peaje', 2, 7, 118000, 'Pago peaje febrero', '2020-08-18 14:15:20', 1, 1, 1),
(1620, 'images/egresoscaja/1699215977782396718509149426552521742.jpg', 'Beneficiario Externo', '2020-02-29', 33, 0, 0, 'Peaje', 2, 7, 62000, 'Pago peaje febrero', '2020-08-18 14:17:17', 1, 1, 1),
(1621, 'images/egresoscaja/5733415977783309674985255403494625273.jpg', 'Beneficiario Externo', '2020-03-31', 33, 0, 0, 'Peaje', 2, 7, 159400, 'Pago peaje marzo', '2020-08-18 14:18:49', 1, 1, 1),
(1622, 'images/egresoscaja/8054115977784299231196526163607381165.jpg', 'Beneficiario Externo', '2020-03-31', 33, 0, 0, 'Peaje', 2, 7, 94000, 'Pago peaje marzo', '2020-08-18 14:20:24', 1, 1, 1),
(1623, 'images/egresoscaja/5739715977785462443406367575054500567.jpg', 'Beneficiario Externo', '2020-03-31', 33, 0, 0, 'Peaje', 2, 7, 99500, 'Pago peaje marzo', '2020-08-18 14:22:20', 1, 1, 1),
(1624, 'images/egresoscaja/7463615977786515083430538814169473125.jpg', 'Beneficiario Externo', '2020-03-31', 33, 0, 0, 'Peaje', 2, 7, 111600, 'Pago peaje marzo', '2020-08-18 14:24:07', 1, 1, 1),
(1625, 'images/egresoscaja/2819715977787456288350679438723511816.jpg', 'Beneficiario Externo', '2020-03-31', 33, 0, 0, 'Peaje', 2, 7, 52000, 'Pago peaje marzo', '2020-08-18 14:25:43', 1, 1, 1),
(1626, 'images/egresoscaja/8707415977788369755410487380047861167.jpg', 'Beneficiario Externo', '2020-03-31', 33, 0, 0, 'Peaje', 2, 7, 150600, 'Pago peaje marzo', '2020-08-18 14:27:15', 1, 1, 1),
(1627, 'images/egresoscaja/6557315977789399116431063765247903275.jpg', 'Beneficiario Externo', '2020-03-31', 33, 0, 0, 'Peaje', 2, 7, 69800, 'Pago peaje marzo', '2020-08-18 14:28:55', 1, 1, 1),
(1628, 'images/egresoscaja/348315977790217324151479763775143672.jpg', 'Beneficiario Externo', '2020-03-31', 33, 0, 0, 'Peaje', 2, 7, 63900, 'Pago peaje marzo', '2020-08-18 14:30:19', 1, 1, 1),
(1629, 'images/egresoscaja/4214815977791696096387333106777035054.jpg', 'Beneficiario Externo', '2020-06-30', 33, 0, 0, 'Peaje', 2, 7, 68000, 'Pago peaje junio', '2020-08-18 14:32:34', 1, 1, 1),
(1630, 'images/egresoscaja/4465415977792620937160771826535518138.jpg', 'Beneficiario Externo', '2020-06-30', 33, 0, 0, 'Peaje', 2, 7, 25500, 'Pago peaje junio', '2020-08-18 14:34:20', 1, 1, 1),
(1631, 'images/egresoscaja/8149915977793435216731708471027013923.jpg', 'Beneficiario Externo', '2020-07-31', 33, 0, 0, 'Peaje', 2, 7, 68000, 'Pago peaje julio', '2020-08-18 14:35:38', 1, 1, 1),
(1632, 'images/egresoscaja/3156515977794924444871261754976013495.jpg', 'Beneficiario Externo', '2020-07-31', 33, 0, 0, 'Peaje', 2, 7, 68000, 'Pago peaje julio', '2020-08-18 14:38:03', 1, 1, 1),
(1633, 'images/egresoscaja/3580015977795827406394133452542524238.jpg', 'Beneficiario Externo', '2020-07-31', 33, 0, 0, 'Peaje', 2, 7, 17000, 'Pago peaje julio', '2020-08-18 14:39:40', 1, 1, 1),
(1634, 'images/egresoscaja/1143815986237544122167510082160349206.jpg', 'Beneficiario Externo', '2020-05-13', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 20000, 'Varios', '2020-08-28 09:09:10', 1, 1, 1),
(1635, 'images/egresoscaja/9085415986239394225377177857821229948.jpg', 'Beneficiario Externo', '2020-05-07', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 100000, 'Bajada de rueda', '2020-08-28 09:12:18', 1, 1, 1),
(1636, 'images/egresoscaja/5170315986240252522888420516462298083.jpg', 'Beneficiario Externo', '2020-05-04', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 0, 10000, 'Arreglo de llanta', '2020-08-28 09:13:35', 1, 1, 1),
(1637, 'images/egresoscaja/8698715986240891812385815150525303325.jpg', 'Beneficiario Externo', '2020-05-01', 33, 0, 0, 'Variedades nissi', 5, 30, 6500, 'Sharpiet cinta', '2020-08-28 09:14:47', 1, 1, 1),
(1638, 'images/egresoscaja/6417215986242422044329043747703009154.jpg', 'Beneficiario Externo', '2020-05-09', 33, 0, 0, 'Taller lencho', 3, 13, 30000, 'Extracci?n de esp?rragos', '2020-08-28 09:17:19', 1, 1, 1),
(1639, 'images/egresoscaja/7755515986243493027414873744880134650.jpg', 'Beneficiario Externo', '2020-05-12', 33, 0, 0, 'Almac?n racores  y mangueras', 3, 12, 80000, 'Manguera', '2020-08-28 09:19:04', 1, 1, 1),
(1640, 'images/egresoscaja/2447115986244364687953476056459223990.jpg', 'Beneficiario Externo', '2020-05-07', 33, 0, 0, 'Tornimuelle de sucre', 3, 15, 140000, 'Cruceta 334 mixta', '2020-08-28 09:20:33', 1, 1, 1),
(1641, 'images/egresoscaja/159115986245951553749064076617813679.jpg', 'Beneficiario Externo', '2020-05-07', 33, 0, 0, 'Taller metaltorno J.G', 3, 13, 150000, 'Endurezar collar y base de la bombona', '2020-08-28 09:23:13', 1, 1, 1),
(1642, 'images/egresoscaja/89221598624693090529071352025124716.jpg', 'Beneficiario Externo', '2020-05-07', 33, 0, 0, 'Central de frenos', 3, 13, 233000, 'Varios', '2020-08-28 09:24:50', 1, 1, 1),
(1643, 'images/egresoscaja/4048915986247729567706247544249139904.jpg', 'Beneficiario Externo', '2020-05-12', 33, 0, 0, 'Taller diaz', 3, 13, 140000, '3 d?as de parqueo trabajo de soldadura', '2020-08-28 09:26:11', 1, 1, 1),
(1644, 'images/egresoscaja/359181598624886093921976200371148511.jpg', 'Beneficiario Externo', '2020-05-12', 33, 0, 0, 'Comercial toluviejo', 3, 12, 78000, 'Varios', '2020-08-28 09:28:04', 1, 1, 1),
(1645, 'images/egresoscaja/140061598624979376932087760697495318.jpg', 'Beneficiario Externo', '2020-05-08', 33, 0, 0, 'Restaurante las delicias de mi padre', 4, 18, 45000, '3 comidas', '2020-08-28 09:29:36', 1, 1, 1),
(1646, 'images/egresoscaja/1969915986251864356053829560927424690.jpg', 'Beneficiario Externo', '2020-05-04', 33, 0, 0, 'Wilmiro', 2, 7, 140000, 'D?as de hotel toluviejo', '2020-08-28 09:33:05', 1, 1, 1),
(1647, 'images/egresoscaja/345415986252761826872553068462186378.jpg', 'Beneficiario Externo', '2020-05-01', 33, 0, 0, 'Roberto Ch?vez', 4, 25, 300000, 'Limpieza transformador', '2020-08-28 09:34:35', 1, 1, 1),
(1648, 'images/egresoscaja/2182015986254268288666745898483956857.jpg', 'Beneficiario Externo', '2020-05-01', 33, 0, 0, 'Freddy gonzalez', 3, 13, 100000, 'Parqueadero camioneta mes de mayo', '2020-08-28 09:37:05', 1, 1, 1),
(1649, 'images/egresoscaja/1164515986255354683835901718749010450.jpg', 'Beneficiario Externo', '2020-05-02', 33, 0, 0, 'Manuel ruiz', 4, 21, 100000, 'Anticip? de nomina', '2020-08-28 09:38:54', 1, 1, 1),
(1650, 'images/egresoscaja/8037115986256171964736663517051034595.jpg', 'Beneficiario Externo', '2020-05-13', 33, 0, 0, 'Freddy gonzalez', 4, 21, 120000, 'Adelant? de nomina', '2020-08-28 09:40:16', 1, 1, 1),
(1651, 'images/egresoscaja/8633415986256799287206334685978152714.jpg', 'Beneficiario Externo', '2020-05-09', 33, 0, 0, 'El tornillero', 3, 15, 12000, 'Trabarrosca', '2020-08-28 09:41:18', 1, 1, 1),
(1652, 'images/egresoscaja/9134015986257926043027747290485615889.jpg', 'Beneficiario Externo', '2020-05-09', 33, 0, 0, 'Hospedaje las hamacas restaurante', 4, 18, 36000, '3 comida', '2020-08-28 09:43:11', 1, 1, 1),
(1653, 'images/egresoscaja/3796315986260047575176339238309860332.jpg', 'Beneficiario Externo', '2020-05-07', 33, 0, 0, 'Central de frenos', 3, 13, 13000, 'Revendedores,  bujes', '2020-08-28 09:46:43', 1, 1, 1),
(1654, 'images/egresoscaja/1327915986260703684205721215336372953.jpg', 'Beneficiario Externo', '2020-05-09', 33, 0, 0, 'Victoria almac?n', 3, 12, 4000, 'Grasa', '2020-08-28 09:47:49', 1, 1, 1),
(1655, 'images/egresoscaja/966015986268018826672317667229562798.jpg', 'Beneficiario Externo', '2020-05-16', 33, 0, 0, 'Rigoberto pren', 4, 21, 100000, 'Anticip? de nomina', '2020-08-28 09:59:56', 1, 1, 1),
(1656, 'images/egresoscaja/7413815986268750755263859477547193428.jpg', 'Beneficiario Externo', '2020-05-16', 33, 0, 0, 'Juan martinez', 4, 21, 100000, 'Anticipo de nomina', '2020-08-28 10:01:14', 1, 1, 1),
(1657, 'images/egresoscaja/5092315986269308022250188277611509908.jpg', 'Beneficiario Externo', '2020-05-16', 33, 0, 0, 'Adri?n hernandez', 4, 21, 400000, 'Anticipo de nomina', '2020-08-28 10:02:10', 1, 1, 1),
(1658, 'images/egresoscaja/521515986269880584720147400264361004.jpg', 'Beneficiario Externo', '2020-05-18', 33, 0, 0, 'Tierra de gosen', 5, 30, 5400, 'Lapiceros', '2020-08-28 10:03:07', 1, 1, 1),
(1659, 'images/egresoscaja/9677215986270487313751120724750526607.jpg', 'Beneficiario Externo', '2020-05-21', 33, 0, 0, 'Juan martinez', 4, 21, 182000, 'Pago total dias de nomina de abril', '2020-08-28 10:04:08', 1, 1, 1),
(1660, 'images/egresoscaja/885431598627116107428306342778431255.jpg', 'Beneficiario Externo', '2020-05-21', 33, 0, 0, 'Adri?n hernandez', 4, 21, 100000, 'Pago total nomina abril', '2020-08-28 10:05:15', 1, 1, 1),
(1661, 'images/egresoscaja/6026815986271867125658270999936406.jpg', 'Beneficiario Externo', '2020-05-27', 33, 0, 0, 'Comercializadora de combustible del caribe', 3, 10, 35000, 'Combustible', '2020-08-28 10:06:26', 1, 1, 1),
(1662, 'images/egresoscaja/562815986272811677610229576355993707.jpg', 'Beneficiario Externo', '2020-05-10', 33, 0, 0, 'Ra?l Vergara', 4, 21, 50000, 'Anticipo de nomina', '2020-08-28 10:08:00', 1, 1, 1),
(1663, 'images/egresoscaja/175115986274184272452139166526681924.jpg', 'Beneficiario Externo', '2020-05-12', 33, 0, 0, 'Ferrolatina', 3, 15, 15500, 'Respuesto', '2020-08-28 10:08:57', 1, 1, 1),
(1664, 'images/egresoscaja/8617815986275010104721842881403796825.jpg', 'Beneficiario Externo', '2020-05-06', 33, 0, 0, 'Mois?s pacheco', 4, 25, 200000, 'Anticip? arreglo retro', '2020-08-28 10:11:39', 1, 1, 1),
(1665, 'images/egresoscaja/2972915986275965995654115380316441383.jpg', 'Beneficiario Externo', '2020-05-29', 33, 0, 0, 'Llantas y filtros el maizal', 3, 12, 38000, 'Hidr?ulico', '2020-08-28 10:13:15', 1, 1, 1),
(1666, 'images/egresoscaja/5361598627728060193596273605334832.jpg', 'Beneficiario Externo', '2020-05-05', 33, 0, 0, 'Nacional de racores y correa', 3, 13, 200000, 'Varios', '2020-08-28 10:15:27', 1, 1, 1),
(1667, 'images/egresoscaja/1314615986278353737531254512260543108.jpg', 'Beneficiario Externo', '2020-05-04', 33, 0, 0, 'Maki partes', 3, 15, 1310999, 'Llanta', '2020-08-28 10:17:14', 1, 1, 1),
(1668, 'images/egresoscaja/97681598627970384865481975160542786.jpg', 'Beneficiario Externo', '2020-05-26', 33, 0, 0, 'Mac center', 3, 15, 339900, '60 w magnate 2 power adapter', '2020-08-28 10:19:29', 1, 1, 1),
(1669, 'images/egresoscaja/3630815986281829348823709783922597362.jpg', 'Beneficiario Externo', '2020-05-05', 33, 0, 0, 'Jos? Daniel meza', 4, 19, 82000, 'Gastos personales', '2020-08-28 10:23:02', 1, 1, 1),
(1670, 'images/egresoscaja/2599915986282418667219742930844100710.jpg', 'Beneficiario Externo', '2020-05-06', 33, 0, 0, 'Jos? Daniel meza', 4, 19, 300000, 'Gastos personales', '2020-08-28 10:24:00', 1, 1, 1),
(1671, 'images/egresoscaja/6107915986283060052484572001071385063.jpg', 'Beneficiario Externo', '2020-05-31', 33, 0, 0, 'Peaje', 2, 7, 1555000, 'Pago peaje', '2020-08-28 10:25:05', 1, 1, 1),
(1672, 'images/egresoscaja/7962215986285902036225995574058520642.jpg', 'Beneficiario Externo', '2020-05-31', 33, 0, 0, 'Distracom', 2, 7, 832391, 'Pago peaje', '2020-08-28 10:29:47', 1, 1, 1),
(1673, 'images/egresoscaja/8301615986296672206119688023567698844.jpg', 'Beneficiario Externo', '2020-04-01', 33, 0, 0, 'Freddy gonzalez', 3, 14, 100000, 'Pago parqueadero camioneta', '2020-08-28 10:47:46', 1, 1, 1),
(1674, 'images/egresoscaja/6377015986299198322112596140871028295.jpg', 'Beneficiario Externo', '2020-03-24', 33, 0, 0, 'Trituradora freddy', 3, 11, 10000, 'Pago de agua', '2020-08-28 10:51:59', 1, 1, 1),
(1675, 'images/egresoscaja/9427215986300114962900173322446543850.jpg', 'Beneficiario Externo', '2020-04-02', 33, 0, 0, 'Operador retro alquiler', 3, 11, 50000, 'Pago extras empleado externo', '2020-08-28 10:53:30', 1, 1, 1),
(1676, 'images/egresoscaja/3045815986301197415506523845676836459.jpg', 'Beneficiario Externo', '2020-04-15', 33, 0, 0, 'Carlos D?az', 4, 21, 50000, 'Adelant? nomina', '2020-08-28 10:55:18', 1, 1, 1),
(1677, 'images/egresoscaja/4884515986301835643389749340647390990.jpg', 'Beneficiario Externo', '2020-03-24', 33, 0, 0, 'Juan martinez', 4, 26, 47000, 'Plan Internet b?scula', '2020-08-28 10:56:22', 1, 1, 1),
(1678, 'images/egresoscaja/643621598630424688330164537010098887.jpg', 'Beneficiario Externo', '2020-03-24', 33, 0, 0, 'Ana tous', 3, 11, 48000, 'Pago de comida del se?or luis', '2020-08-28 11:00:21', 1, 1, 1),
(1679, 'images/egresoscaja/2640115986305951117555230012042387905.jpg', 'Beneficiario Externo', '2020-02-04', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 20000, 'Varios', '2020-08-28 11:02:33', 1, 1, 1),
(1680, 'images/egresoscaja/5709615986306794308513825805128786185.jpg', 'Beneficiario Externo', '2020-04-05', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 15, 80000, 'Varios', '2020-08-28 11:04:38', 1, 1, 1),
(1681, 'images/egresoscaja/6684115986309145275586899637336447838.jpg', 'Beneficiario Externo', '2020-04-24', 33, 0, 0, 'Rafael Hern?ndez', 3, 11, 40000, 'Vi?ticos n?mero de asfalto', '2020-08-28 11:06:23', 1, 1, 1),
(1682, 'images/egresoscaja/3978915986310420287689603659321417441.jpg', 'Beneficiario Externo', '2020-04-24', 33, 0, 0, 'Rodolfo diaz', 4, 22, 50000, 'Pr?stamo a empleado', '2020-08-28 11:10:41', 1, 1, 1),
(1683, 'images/egresoscaja/2480215986312083994273443344546115501.jpg', 'Beneficiario Externo', '2020-04-24', 33, 0, 0, 'Franklin llanos', 3, 13, 50000, 'Montaje de llantas', '2020-08-28 11:13:26', 1, 1, 1),
(1684, 'images/egresoscaja/984351598631344243824523931922261000.jpg', 'Beneficiario Externo', '2020-04-24', 33, 0, 0, 'Manuel ruiz', 3, 13, 30000, 'Ensayos daberlys tierra alta', '2020-08-28 11:15:43', 1, 1, 1),
(1685, 'images/egresoscaja/5715115986314563236890639841675448843.jpg', 'Beneficiario Externo', '2020-04-24', 33, 0, 0, 'Jos? Daniel meza', 4, 38, 100000, 'Donaci?n comunidad cantera', '2020-08-28 11:17:35', 1, 1, 1),
(1686, 'images/egresoscaja/6756515986317471226432435030014107521.jpg', 'Beneficiario Externo', '2020-04-24', 33, 0, 0, 'Jos? Luis pineda', 3, 13, 100000, 'Pago llantero', '2020-08-28 11:22:25', 1, 1, 1),
(1687, 'images/egresoscaja/89115986318076958339848502503671933.jpg', 'Beneficiario Externo', '2020-04-27', 33, 0, 0, 'Wilmiro acevedo', 2, 7, 100000, 'Abono dias en hotel toluviejo', '2020-08-28 11:23:26', 1, 1, 1),
(1688, 'images/egresoscaja/5441415986318994141149186804018899976.jpg', 'Beneficiario Externo', '2020-04-27', 33, 0, 0, 'Vida y salud', 5, 30, 500000, 'Tapabocas', '2020-08-28 11:24:58', 1, 1, 1),
(1689, 'images/egresoscaja/5156115986320888685949005906702028881.jpg', 'Beneficiario Externo', '2020-04-27', 33, 0, 0, 'Lubricantes y filtros medellin', 3, 15, 103000, 'Repuesto', '2020-08-28 11:28:07', 1, 1, 1),
(1690, 'images/egresoscaja/958301598632207215831253816783597736.jpg', 'Beneficiario Externo', '2020-04-27', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 60000, '6 montadas de llantas', '2020-08-28 11:30:05', 1, 1, 1),
(1691, 'images/egresoscaja/2207715986323600425216236977508024971.jpg', 'Beneficiario Externo', '2020-04-27', 33, 0, 0, 'Adri?n hernandez', 4, 21, 50000, 'Anticipo de nomina', '2020-08-28 11:32:36', 1, 1, 1),
(1692, 'images/egresoscaja/2058315986324247135345517311631006111.jpg', 'Beneficiario Externo', '2020-04-27', 33, 0, 0, 'Katia Hern?ndez', 5, 30, 540000, 'Compra protocolo', '2020-08-28 11:33:42', 1, 1, 1),
(1693, 'images/egresoscaja/5199315986325578127944706999653060813.jpg', 'Beneficiario Externo', '2020-04-28', 33, 0, 0, 'Alfa supplies s.a.s', 5, 30, 300000, 'Mascarilla N95', '2020-08-28 11:35:35', 1, 1, 1),
(1694, 'images/egresoscaja/217531598632630934309538568072078670.jpg', 'Beneficiario Externo', '2020-04-28', 33, 0, 0, 'Ferreter?a el angulo', 3, 15, 29000, 'Varios', '2020-08-28 11:37:09', 1, 1, 1),
(1695, 'images/egresoscaja/8080215986327633185949360506489373121.jpg', 'Beneficiario Externo', '2020-04-28', 33, 0, 0, 'Ferreter?a el angulo', 3, 15, 98000, 'Angulo hierro', '2020-08-28 11:38:48', 1, 1, 1),
(1696, 'images/egresoscaja/8220715986328702985320897745040151343.jpg', 'Beneficiario Externo', '2020-04-28', 33, 0, 0, 'Freddy machado', 4, 26, 80000, 'Arreglo polic?as', '2020-08-28 11:40:52', 1, 1, 1),
(1697, 'images/egresoscaja/5802315986330076101384811777338260151.jpg', 'Beneficiario Externo', '2020-04-29', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 30000, 'Varios', '2020-08-28 11:43:26', 1, 1, 1),
(1698, 'images/egresoscaja/6440515986330802253966956427407774555.jpg', 'Beneficiario Externo', '2020-04-29', 33, 0, 0, 'Ferreter?a el centavo menos', 3, 15, 12500, 'Repuesto', '2020-08-28 11:44:39', 1, 1, 1),
(1699, 'images/egresoscaja/8567515986331464359056400528752073213.jpg', 'Beneficiario Externo', '2020-01-31', 33, 0, 0, 'Mois?s pacheco', 3, 14, 50000, 'Anticipo mec?nico', '2020-08-28 11:45:45', 1, 1, 1),
(1700, 'images/egresoscaja/3817815986332894113513202567765224368.jpg', 'Beneficiario Externo', '2020-04-30', 33, 0, 0, 'Taller el lata', 3, 12, 100000, 'Varios', '2020-08-28 11:48:07', 1, 1, 1),
(1701, 'images/egresoscaja/2834515986333915934897547307133095453.jpg', 'Beneficiario Externo', '2020-04-30', 33, 0, 0, 'Multi max', 5, 30, 131000, 'Varios', '2020-08-28 11:49:50', 1, 1, 1),
(1702, 'images/egresoscaja/9870615986334702687691031250391226005.jpg', 'Beneficiario Externo', '2020-03-22', 33, 0, 0, 'Comercializadora de combustible del caribe', 3, 10, 8460, 'Pago combustible', '2020-08-28 11:51:09', 1, 1, 1),
(1703, 'images/egresoscaja/2204515986335720922535576761937170943.jpg', 'Beneficiario Externo', '2020-03-23', 33, 0, 0, 'El centavo menos', 3, 15, 1500, '2 drc7', '2020-08-28 11:52:49', 1, 1, 1),
(1704, 'images/egresoscaja/9100515986336777065702627299577615863.jpg', 'Beneficiario Externo', '2020-03-24', 33, 0, 0, 'Comercial toluviejo', 3, 12, 118000, 'Aceite', '2020-08-28 11:54:36', 1, 1, 1);
INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(1705, 'images/egresoscaja/2315615986341901491233087311104409305.jpg', 'Beneficiario Externo', '2020-04-30', 33, 0, 0, 'Distracom', 2, 7, 331988, 'Pago peaje', '2020-08-28 12:03:05', 1, 1, 1),
(1706, 'images/egresoscaja/1329015986411896183595068658181729900.jpg', 'Beneficiario Externo', '2020-06-25', 33, 0, 0, 'Rodolfo', 5, 28, 50000, 'Compra bota dotaci?n', '2020-08-28 13:59:48', 1, 1, 1),
(1707, 'images/egresoscaja/2471315986413446972469836881774637802.jpg', 'Beneficiario Externo', '2020-06-13', 33, 0, 0, 'Carlos D?az', 5, 30, 45000, 'Gastos varios', '2020-08-28 14:02:16', 1, 1, 1),
(1708, 'images/egresoscaja/7894515986414407243619029241068342124.jpg', 'Beneficiario Externo', '2020-06-26', 33, 0, 0, 'Natalia Hern?ndez', 4, 26, 130000, 'Pago de aseo oficina y apartamento', '2020-08-28 14:03:59', 1, 1, 1),
(1709, 'images/egresoscaja/3015015986415983986703443354171521561.jpg', 'Beneficiario Externo', '2020-06-09', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 5000, 'Calibraci?n de llanta', '2020-08-28 14:05:53', 1, 1, 1),
(1710, 'images/egresoscaja/77251598641699602206061659857780092.jpg', 'Beneficiario Externo', '2020-06-01', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 30000, 'Apretada de tuerca', '2020-08-28 14:08:10', 1, 1, 1),
(1711, 'images/egresoscaja/458315986417838255944907735386418421.jpg', 'Beneficiario Externo', '2020-06-12', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 100000, 'Calibraci?n de llanta', '2020-08-28 14:09:25', 1, 1, 1),
(1712, 'images/egresoscaja/5169615986419189151671179606537136887.jpg', 'Beneficiario Externo', '2020-06-12', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 20000, 'Cambio de llanta', '2020-08-28 14:11:38', 1, 1, 1),
(1713, 'images/egresoscaja/3804115986420129157214105903995320327.jpg', 'Beneficiario Externo', '2020-06-13', 33, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 30000, 'Cambio de llanta', '2020-08-28 14:13:29', 1, 1, 1),
(1714, 'images/egresoscaja/8561915986420647912852007906179008269.jpg', 'Beneficiario Externo', '2020-06-26', 33, 0, 0, 'Comercial toluviejo', 3, 15, 22000, 'Aro', '2020-08-28 14:14:23', 1, 1, 1),
(1715, 'images/egresoscaja/2995415986421947447572813545259572195.jpg', 'Beneficiario Externo', '2020-06-25', 33, 0, 0, 'Comercial toluviejo', 3, 12, 116000, 'Aceite', '2020-08-28 14:16:33', 1, 1, 1),
(1716, 'images/egresoscaja/4842615986422468806060830028210274578.jpg', 'Beneficiario Externo', '2020-06-25', 33, 0, 0, 'Comercial toluviejo', 3, 15, 17800, 'Abrazadora , pvc', '2020-08-28 14:17:25', 1, 1, 1),
(1717, 'images/egresoscaja/9127715986423667025907164974974060529.jpg', 'Beneficiario Externo', '2020-06-12', 33, 0, 0, 'Comercial toluviejo', 3, 15, 30000, 'Correa', '2020-08-28 14:19:10', 1, 1, 1),
(1718, 'images/egresoscaja/9789015986424172028859912742653598598.jpg', 'Beneficiario Externo', '2020-06-18', 33, 0, 0, 'Comercial toluviejo', 3, 12, 135000, 'Aceite', '2020-08-28 14:20:16', 1, 1, 1),
(1719, 'images/egresoscaja/3171115986425422076555664685420566371.jpg', 'Beneficiario Externo', '2020-06-12', 33, 0, 0, 'Comercial toluviejo', 3, 12, 426500, 'Aceite', '2020-08-28 14:22:15', 1, 1, 1),
(1720, 'images/egresoscaja/8312215986426012991853918304840295077.jpg', 'Beneficiario Externo', '2020-06-13', 33, 0, 0, 'Comercial toluviejo', 3, 15, 4500, 'Orrings', '2020-08-28 14:23:20', 1, 1, 1),
(1721, 'images/egresoscaja/2881715986428074622417001880604252576.jpg', 'Beneficiario Externo', '2020-06-08', 33, 0, 0, 'Alvaro Miguel Contreras', 3, 15, 160000, 'Varios', '2020-08-28 14:25:02', 1, 1, 1),
(1722, 'images/egresoscaja/1693615986429808507914978636091689255.jpg', 'Beneficiario Externo', '2020-06-10', 33, 0, 0, 'Manuel Francisco Dias', 3, 14, 130000, 'Esc?ner mula', '2020-08-28 14:29:25', 1, 1, 1),
(1723, 'images/egresoscaja/715501598643065673359118564459949626.jpg', 'Beneficiario Externo', '2020-06-11', 33, 0, 0, 'Sargento luna', 3, 14, 100000, 'Escolta retro 320', '2020-08-28 14:31:04', 1, 1, 1),
(1724, 'images/egresoscaja/8824015986432932467363285973340902312.jpg', 'Beneficiario Externo', '2020-06-11', 33, 0, 0, 'Luis bostos', 3, 14, 350000, 'Alquiler cama baja retro 320', '2020-08-28 14:34:52', 1, 1, 1),
(1725, 'images/egresoscaja/5977515986433987616480463051451778669.jpg', 'Beneficiario Externo', '2020-06-08', 33, 0, 0, 'Pedro bossio', 4, 26, 80000, 'Pago dias pendiente', '2020-08-28 14:36:37', 1, 1, 1),
(1726, 'images/egresoscaja/4431115986436231718878322826283070457.jpg', 'Beneficiario Externo', '2020-06-01', 33, 0, 0, 'Katia Hern?ndez', 4, 21, 200000, 'Anticip? n?mina', '2020-08-28 14:40:22', 1, 1, 1),
(1727, 'images/egresoscaja/8870115986436731991653156937758070175.jpg', 'Beneficiario Externo', '2020-06-09', 33, 0, 0, 'Jos? Daniel meza', 4, 19, 60000, 'Gastos personales', '2020-08-28 14:41:12', 1, 1, 1),
(1728, 'images/egresoscaja/8178115986439211389012334649503406853.jpg', 'Beneficiario Externo', '2020-06-01', 33, 0, 0, 'Rafael Hern?ndez', 2, 7, 50000, 'Pago peaje , ACPM', '2020-08-28 14:45:20', 1, 1, 1),
(1729, 'images/egresoscaja/3900915986440136977167928311608324945.jpg', 'Beneficiario Externo', '2020-06-02', 33, 0, 0, 'Carlos D?az', 2, 36, 20000, 'Gasolina moto sincelejo', '2020-08-28 14:46:53', 1, 1, 1),
(1730, 'images/egresoscaja/9486315986441336842029975590377769428.jpg', 'Beneficiario Externo', '2020-06-09', 33, 0, 0, 'Pedro bossio', 4, 26, 20000, 'agua de la semana', '2020-08-28 14:48:53', 1, 1, 1),
(1731, 'images/egresoscaja/19401598644244625117424784860521677.jpg', 'Beneficiario Externo', '2020-06-24', 33, 0, 0, 'Juan martinez', 2, 5, 50000, 'Pago internet b?scula', '2020-08-28 14:50:43', 1, 1, 1),
(1732, 'images/egresoscaja/767601598645302343100489115051202332.jpg', 'Beneficiario Externo', '2020-06-11', 33, 0, 0, 'Ferrotubos', 5, 30, 569000, 'Compra pl?stico', '2020-08-28 15:08:00', 1, 1, 1),
(1733, 'images/egresoscaja/6919415986456072242825725763271611247.jpg', 'Beneficiario Externo', '2020-06-16', 33, 0, 0, 'Freddy gonzalez', 3, 14, 50000, 'Parqueadero camioneta', '2020-08-28 15:13:25', 1, 1, 1),
(1734, 'images/egresoscaja/990015986461202325698518659287760727.jpg', 'Beneficiario Externo', '2020-06-02', 33, 0, 0, 'Taller metaltorno J.G', 3, 13, 90000, 'Trabajo de trono', '2020-08-28 15:21:48', 1, 1, 1),
(1735, 'images/egresoscaja/9240615986463368554654725073702464293.jpg', 'Beneficiario Externo', '2020-06-24', 33, 0, 0, 'Guillermo moralez', 4, 19, 127500, 'Pago gasto se?or willermo', '2020-08-28 15:25:35', 1, 1, 1),
(1736, 'images/egresoscaja/8457815986470013397800464535282402028.jpg', 'Beneficiario Externo', '2020-06-25', 33, 0, 0, 'Ferro Agro GM', 3, 15, 28000, 'Llave, dado', '2020-08-28 15:36:29', 1, 1, 1),
(1737, 'images/egresoscaja/5197815986474273086931615884769656147.jpg', 'Beneficiario Externo', '2020-06-24', 33, 0, 0, 'Almac?n racores  y mangueras', 3, 15, 50000, 'Repuesto', '2020-08-28 15:43:35', 1, 1, 1),
(1738, 'images/egresoscaja/757015986482068478851455751910454587.jpg', 'Beneficiario Externo', '2020-06-08', 33, 0, 0, 'Carlos D?az', 2, 7, 20000, 'Vi?ticos', '2020-08-28 15:56:46', 1, 1, 1),
(1739, 'images/egresoscaja/6703315986488238731335135444591534867.jpg', 'Beneficiario Externo', '2020-06-09', 33, 0, 0, 'Mois?s mecanico', 3, 13, 20000, 'Manguera del bomb?n', '2020-08-28 16:07:03', 1, 1, 1),
(1740, 'images/egresoscaja/2307815986489221954788002197067077185.jpg', 'Beneficiario Externo', '2020-06-09', 33, 0, 0, 'Lubricantes del caribe', 3, 12, 60000, 'Filtro', '2020-08-28 16:08:41', 1, 1, 1),
(1741, 'images/egresoscaja/2152415986490408255655313618626860048.jpg', 'Beneficiario Externo', '2020-06-09', 33, 0, 0, 'Mois?s mecanico', 3, 13, 90000, 'Empaque de culata', '2020-08-28 16:10:31', 1, 1, 1),
(1742, 'images/egresoscaja/4838915986495987254343752158585385446.jpg', 'Beneficiario Externo', '2020-06-12', 33, 0, 0, 'Taller la troncal', 3, 13, 60000, 'Arreglo vidrio , mantenimiento desmonte y monte', '2020-08-28 16:19:58', 1, 1, 1),
(1743, 'images/egresoscaja/1554615986512768133179368142355935386.jpg', 'Beneficiario Externo', '2020-06-26', 33, 0, 0, 'Juan martinez', 4, 21, 50000, 'Anticip? n?mina', '2020-08-28 16:47:53', 1, 1, 1),
(1744, 'images/egresoscaja/8307415986513556286623209869409125437.jpg', 'Beneficiario Externo', '2020-06-26', 33, 0, 0, 'Katia Hern?ndez', 5, 30, 45600, 'Varios', '2020-08-28 16:49:14', 1, 1, 1),
(1745, 'images/egresoscaja/5826715986514615321098090144320192185.jpg', 'Beneficiario Externo', '2020-06-23', 33, 0, 0, 'Ferreter?a el centavo menos', 3, 15, 37500, 'Repuesto', '2020-08-28 16:51:00', 1, 1, 1),
(1746, 'images/egresoscaja/457415996666537338921015330885529275.jpg', 'Beneficiario Externo', '2020-08-08', 33, 0, 0, 'Soldadora los campanos', 3, 13, 20000, 'Arreglo de barilla de aceite', '2020-09-09 10:43:30', 1, 1, 1),
(1747, 'images/egresoscaja/8944715996666537338921015330885529275.jpg', 'Beneficiario Externo', '2020-08-08', 33, 0, 0, 'Soldadora los campanos', 3, 13, 20000, 'Arreglo de barilla de aceite', '2020-09-09 10:43:30', 1, 1, 1),
(1748, 'images/egresoscaja/7660815996670267972958175723814204061.jpg', 'Beneficiario Externo', '2020-09-07', 33, 0, 0, 'Restaurante popular', 4, 18, 200000, 'Pago almuerzo', '2020-09-09 10:57:04', 1, 1, 1),
(1749, 'images/egresoscaja/654915996673042902608706863353377282.jpg', 'Beneficiario Externo', '2020-09-05', 33, 0, 0, 'Tierra de gosen', 5, 30, 23400, 'Carpetas , bol?grafos', '2020-09-09 11:01:33', 1, 1, 1),
(1750, 'images/egresoscaja/5122915996675366681208844685532491650.jpg', 'Beneficiario Externo', '2020-09-08', 33, 0, 0, '', 4, 38, 120000, 'Pago de autenticaciones', '2020-09-09 11:05:18', 1, 1, 1),
(1751, 'images/egresoscaja/922121599668181864339443533817288949.jpg', 'Beneficiario Externo', '2020-09-08', 33, 0, 0, 'Freddy gonzalez', 4, 18, 208300, 'Pago almuerzo policia de carretera', '2020-09-09 11:16:11', 1, 1, 1),
(1752, 'images/egresoscaja/4110415996687890921554247666414911178.jpg', 'Beneficiario Externo', '2020-09-01', 33, 0, 0, 'Peaje', 2, 7, 322000, 'Pago peaje', '2020-09-09 11:26:19', 1, 1, 1),
(1753, 'images/egresoscaja/3319615996690288336013332300800613766.jpg', 'Beneficiario Externo', '2020-09-01', 33, 0, 0, 'Peaje', 2, 7, 259300, 'Pago peaje', '2020-09-09 11:30:26', 1, 1, 1),
(1754, 'images/egresoscaja/3122415996802989508355119807354607402.jpg', 'Beneficiario Externo', '2020-09-09', 33, 0, 0, 'To camiones', 3, 15, 35000, 'Pago pasador muelle kenworth', '2020-09-09 14:38:14', 1, 1, 1),
(1755, 'images/egresoscaja/9931115996804587376625962544349686871.jpg', 'Beneficiario Externo', '2020-09-09', 33, 0, 0, 'Distracom', 3, 10, 145823, 'Pago combustible', '2020-09-09 14:40:53', 1, 1, 1),
(1756, 'images/egresoscaja/8576415996806609747716012418496453921.jpg', 'Beneficiario Externo', '2020-09-09', 33, 0, 0, 'Ferreter?a el angulo', 3, 15, 200000, 'Pago repuesto', '2020-09-09 14:44:18', 1, 1, 1),
(1757, 'images/egresoscaja/1018415996809155199191331589147473843.jpg', 'Beneficiario Externo', '2020-09-09', 33, 0, 0, 'Peaje', 2, 7, 16000, 'Pago peaje', '2020-09-09 14:48:30', 1, 1, 1),
(1758, 'images/egresoscaja/71808contenido-no-disponible.jpg', 'Beneficiario Externo', '2020-08-30', 5, 0, 0, 'DICON', 3, 14, 5920000, 'CRUCE CON DICON', '2020-09-28 15:13:30', 1, 1, 1),
(1759, 'images/egresoscaja/948320200928163919612.pdf', 'Beneficiario Externo', '2020-08-04', 5, 0, 0, 'VARIOS', 3, 10, 500000, 'COMBUSTIBLE', '2020-09-28 15:30:37', 1, 1, 1),
(1760, 'images/egresoscaja/4222220200928164037697.pdf', 'Beneficiario Externo', '2020-08-30', 5, 0, 0, 'PEAJE RUTA DEL SOL', 2, 7, 360600, 'PEAJES', '2020-09-28 15:32:04', 1, 1, 1),
(1761, 'images/egresoscaja/7167620200928164145296.pdf', 'Beneficiario Externo', '2020-07-31', 5, 0, 0, 'PEAJES MONTES DE MARIA', 2, 7, 175000, 'PEAJES', '2020-09-28 15:33:19', 1, 1, 1),
(1762, 'images/egresoscaja/7194420200928164157828.pdf', 'Beneficiario Externo', '2020-08-20', 5, 0, 0, 'PEAJES LA ESPERANZA', 2, 7, 272000, 'PEAJES', '2020-09-28 15:34:05', 1, 1, 1),
(1763, 'images/egresoscaja/6087620200928164215028.pdf', 'Beneficiario Externo', '2020-07-15', 5, 0, 0, 'PEAJE SABANAGRADE', 2, 7, 150400, 'PEAJES', '2020-09-28 15:35:03', 1, 1, 1),
(1764, 'images/egresoscaja/1136320200928164224013.pdf', 'Beneficiario Externo', '2020-08-25', 5, 0, 0, 'PEAJE ZONA FRANCA', 2, 7, 65300, 'PEAJES', '2020-09-28 15:35:54', 1, 1, 1),
(1765, 'images/egresoscaja/4287620200928164233050.pdf', 'Beneficiario Externo', '2020-06-13', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 145500, 'PEAJES', '2020-09-28 15:37:21', 1, 1, 1),
(1766, 'images/egresoscaja/5341320200928165116243.pdf', 'Beneficiario Externo', '2020-07-06', 5, 0, 0, 'PEAJES RUTA DEL SOL', 2, 7, 210200, 'PEAJES', '2020-09-28 15:38:51', 1, 1, 1),
(1768, 'images/egresoscaja/7905516028623721758194832381490562620.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 239700, 'Peajes del 01-10 al 07-10', '2020-10-16 10:25:06', 1, 1, 1),
(1769, 'images/egresoscaja/7789916028624444993723421254408724502.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 359400, 'Peajes del 01-10 al 07-10', '2020-10-16 10:34:02', 1, 1, 1),
(1770, 'images/egresoscaja/502516028625578166141699387186568611.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 141400, 'Peajes del 01-10 al 07-10', '2020-10-16 10:35:52', 1, 1, 1),
(1771, 'images/egresoscaja/419771602862665680778237995050859298.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Peajes del 01-10 al 07-10', '2020-10-16 10:37:22', 1, 1, 1),
(1772, 'images/egresoscaja/2711416028627494058317415824185611665.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 342300, 'Peajes del 01-10 al 07-10', '2020-10-16 10:39:07', 1, 1, 1),
(1773, 'images/egresoscaja/4421216028629597821270846269096795479.jpg', 'Beneficiario Externo', '2020-09-01', 55, 0, 0, 'Peajes', 2, 7, 181800, 'Peajes del 28-09 al 30-09', '2020-10-16 10:40:45', 1, 1, 1),
(1774, 'images/egresoscaja/2429916028630751892827030123169281795.jpg', 'Beneficiario Externo', '2020-09-01', 55, 0, 0, 'Peajes', 2, 7, 40400, 'Peajes del 28-09 al 30-09', '2020-10-16 10:44:31', 1, 1, 1),
(1775, 'images/egresoscaja/7359616038351237125176363824718941398.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 338300, 'Pago peajes de volquetas', '2020-10-27 16:45:21', 1, 1, 1),
(1776, 'images/egresoscaja/1690816038352364849108340926153803540.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 319000, 'Pago peajes de volquetas', '2020-10-27 16:47:15', 1, 1, 1),
(1777, 'images/egresoscaja/5664816038353009182390448390578120906.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Pago peajes de volquetas', '2020-10-27 16:48:19', 1, 1, 1),
(1778, 'images/egresoscaja/2092716038353493173418481331756308370.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Pago peajes de volquetas', '2020-10-27 16:49:08', 1, 1, 1),
(1779, 'images/egresoscaja/3755516038354047962298287248152677275.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 429000, 'Pago peajes de volquetas', '2020-10-27 16:50:03', 1, 1, 1),
(1780, 'images/egresoscaja/116038354641026789469713591348905.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 373400, 'Pago peajes de volquetas', '2020-10-27 16:51:01', 1, 1, 1),
(1781, 'images/egresoscaja/7155216038355181132295025143475860412.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 375600, 'Pago peajes de volquetas', '2020-10-27 16:51:56', 1, 1, 1),
(1782, 'images/egresoscaja/3782616038962560278805743262724732306.jpg', 'Caja Sistema', '2020-10-14', 33, 55, 55, '', 0, 0, 700000, 'Pago peajes de volquetas', '2020-10-28 09:44:13', 1, 1, 1),
(1783, 'images/egresoscaja/6970116038968937736417563872225581607.jpg', 'Caja Sistema', '2020-10-16', 33, 55, 55, '', 0, 0, 750000, 'Pago peajes de volquetas', '2020-10-28 09:54:51', 1, 1, 1),
(1784, 'images/egresoscaja/1514716038969892528355288296964479181.jpg', 'Caja Sistema', '2020-10-20', 33, 55, 55, '', 0, 0, 410000, 'Pago peajes de volquetas', '2020-10-28 09:56:28', 1, 1, 1),
(1785, 'images/egresoscaja/1990316038973970202213397914223028189.jpg', 'Caja Sistema', '2020-10-20', 33, 55, 55, '', 0, 0, 775000, 'Pago peajes volquetas', '2020-10-28 10:03:16', 1, 1, 1),
(1786, 'images/egresoscaja/7643616038973970202213397914223028189.jpg', 'Caja Sistema', '2020-10-20', 33, 55, 55, '', 0, 0, 775000, 'Pago peajes volquetas', '2020-10-28 10:03:16', 1, 1, 1),
(1787, 'images/egresoscaja/2434116039031044061317737443090118569.jpg', 'Beneficiario Externo', '2020-10-22', 55, 0, 0, 'Taller y llanteria toluviejo', 3, 15, 10000, 'Dos tuercas , espagarragos para volqueta UQE-126', '2020-10-28 11:38:22', 1, 1, 1),
(1788, 'images/egresoscaja/534361603903286436395276588440582999.jpg', 'Beneficiario Externo', '2020-10-20', 55, 0, 0, 'Llanteria y engrasado', 3, 15, 15000, 'Engrasado general a volqueta GDY-167', '2020-10-28 11:41:05', 1, 1, 1),
(1789, 'images/egresoscaja/7376716039035103542618005744077779135.jpg', 'Beneficiario Externo', '2020-10-21', 55, 0, 0, 'Llanteria y engrasado sampues', 3, 15, 15000, 'Engrasado general a volqueta UQE-126', '2020-10-28 11:45:09', 1, 1, 1),
(1790, 'images/egresoscaja/2396716039036128941877244073416326307.jpg', 'Beneficiario Externo', '2020-10-14', 55, 0, 0, 'Llanteria toluviejo', 3, 15, 3000, 'crusor UQE-126', '2020-10-28 11:46:52', 1, 1, 1),
(1791, 'images/egresoscaja/4843116039037378854347038971269828013.jpg', 'Beneficiario Externo', '2020-10-09', 55, 0, 0, 'Taller y llanteria toluviejo', 3, 13, 15000, 'Apretada de esparragos de eje de transmision \r\nGDY-167', '2020-10-28 11:48:57', 1, 1, 1),
(1792, 'images/egresoscaja/409416039038459272801384279045903381.jpg', 'Beneficiario Externo', '2020-10-16', 55, 0, 0, 'Comercial toluviejo', 3, 15, 13000, 'Repuesto volqueta UQE-066', '2020-10-28 11:50:45', 1, 1, 1),
(1793, 'images/egresoscaja/878731603903934084740550276202426030.jpg', 'Beneficiario Externo', '2020-10-22', 55, 0, 0, 'Movistar', 2, 5, 40000, 'Pago plan telef?nico a Talia Rincon', '2020-10-28 11:52:13', 1, 1, 1),
(1794, 'images/egresoscaja/8339116040824087102248683228742935524.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 417900, 'Pago peajes de volquetas', '2020-10-30 13:26:48', 1, 1, 1),
(1795, 'images/egresoscaja/856716040826865667203778814752160696.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 337400, 'Pago peajes de volquetas', '2020-10-30 13:29:26', 1, 1, 1),
(1796, 'images/egresoscaja/6690516040827776126003473595314604154.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 99800, 'Pago peajes de volquetas', '2020-10-30 13:32:57', 1, 1, 1),
(1797, 'images/egresoscaja/4474016040828505824494478396519811885.jpg', 'Beneficiario Externo', '2020-10-27', 55, 0, 0, 'Llanteria los guayacanes', 3, 13, 25000, 'Bajada y montada de llanta \r\nBajada de una campana de volqueta UQE-126', '2020-10-30 13:34:10', 1, 1, 1),
(1798, 'images/egresoscaja/6136916049424698116211497412341015543.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Pago peajes de volquetas', '2020-11-09 12:21:02', 1, 1, 1),
(1799, 'images/egresoscaja/9138216049426707182228362370227316999.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Pago peajes de volquetas', '2020-11-09 12:24:27', 1, 1, 1),
(1800, 'images/egresoscaja/9650716049428415594861203991394613022.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Pago de peaje de volquetas', '2020-11-09 12:27:19', 1, 1, 1),
(1801, 'images/egresoscaja/9488016049431137918849573457191245659.jpg', 'Beneficiario Externo', '2020-10-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Pago de peaje de volquetas', '2020-11-09 12:29:21', 1, 1, 1),
(1802, 'images/egresoscaja/3730716049454678531823108083793834389.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peaje', 2, 7, 298500, 'Pago peajes de volquetas', '2020-11-09 13:11:06', 1, 1, 1),
(1803, 'images/egresoscaja/2499216049458945371923024072788377882.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Pago peajes de volquetas', '2020-11-09 13:18:11', 1, 1, 1),
(1804, 'images/egresoscaja/1100816049459793096454685195330979263.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 298500, 'Pago peajes de volquetas', '2020-11-09 13:19:37', 1, 1, 1),
(1805, 'images/egresoscaja/167216049463455037769514065251015606.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 445100, 'Pago peajes de volquetas', '2020-11-09 13:25:43', 1, 1, 1),
(1806, 'images/egresoscaja/347116049469471557576980765927070299.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 238800, 'Pago peajes de volquetas', '2020-11-09 13:35:34', 1, 1, 1),
(1807, 'images/egresoscaja/3941016049470255697706902488689052266.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 80800, 'Pago peajes de volquetas', '2020-11-09 13:37:05', 1, 1, 1),
(1808, 'images/egresoscaja/1146116049473367203984634444587425965.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 80800, 'Pago peajes de volquetas', '2020-11-09 13:42:15', 1, 1, 1),
(1809, 'images/egresoscaja/8989616049474371017817080487643610017.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 80800, 'Pago peajes de volquetas', '2020-11-09 13:43:53', 1, 1, 1),
(1810, 'images/egresoscaja/5391616049475160575241006283200740510.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 20200, 'Pago peajes de volquetas', '2020-11-09 13:45:15', 1, 1, 1),
(1811, 'images/egresoscaja/4725816050389347226945927682837034011.jpg', 'Caja Sistema', '2020-11-05', 55, 33, 33, '', 0, 0, 150000, 'Pagado a freddy', '2020-11-10 15:08:50', 1, 1, 1),
(1812, 'images/egresoscaja/8691920201112154706074.pdf', 'Beneficiario Externo', '2020-07-30', 5, 0, 0, 'PEAJES', 2, 7, 1378800, 'PEAJES JULIO', '2020-11-12 15:35:16', 1, 1, 1),
(1813, 'images/egresoscaja/9297520201112154706074.pdf', 'Beneficiario Externo', '2020-07-30', 5, 0, 0, 'PEAJES', 2, 7, 1378800, 'PEAJES JULIO', '2020-11-12 15:35:16', 1, 1, 1),
(1814, 'images/egresoscaja/889220201112160538164.pdf', 'Beneficiario Externo', '2020-10-01', 47, 0, 0, 'AGM DESARROLLOS', 5, 30, 290000, 'PAGO', '2020-11-12 15:54:20', 1, 1, 1),
(1815, 'images/egresoscaja/8856220201112160605198.pdf', 'Beneficiario Externo', '2020-10-15', 47, 0, 0, 'GRUPO OBINCO', 1, 33, 10000, 'SOBREGIRO', '2020-11-12 15:55:14', 1, 1, 1),
(1816, 'images/egresoscaja/903020201112160619056.pdf', 'Beneficiario Externo', '2020-10-15', 47, 0, 0, 'BANCO DE BOGOTA', 1, 3, 242000, 'INTERESES', '2020-11-12 15:56:15', 1, 1, 1),
(1817, 'images/egresoscaja/3884920201112160645698.pdf', 'Beneficiario Externo', '2020-10-29', 47, 0, 0, 'BANCO DE BOGOTA', 1, 3, 462864, 'INTERESES', '2020-11-12 15:57:18', 1, 1, 1),
(1818, 'images/egresoscaja/5766220201112160658148.pdf', 'Beneficiario Externo', '2020-11-12', 47, 0, 0, 'BANCO DE BOGOTA', 1, 3, 241650, 'INTERESES', '2020-11-12 15:58:11', 1, 1, 1),
(1819, 'images/egresoscaja/275820201112161835079.pdf', 'Beneficiario Externo', '2020-11-11', 47, 0, 0, 'SERVIENTREGA', 2, 6, 40350, 'ENVIOS', '2020-11-12 16:06:43', 1, 1, 1),
(1820, 'images/egresoscaja/4738820201112162141382.pdf', 'Beneficiario Externo', '2020-10-19', 47, 0, 0, 'PAPELERIA EL CID', 4, 17, 23000, 'PAPELERIA', '2020-11-12 16:08:36', 1, 1, 1),
(1821, 'images/egresoscaja/5604620201112162259198.pdf', 'Beneficiario Externo', '2020-10-22', 47, 0, 0, 'PEAJES', 2, 7, 116700, 'PEAJES CARTAGENA MONTERIA', '2020-11-12 16:09:49', 1, 1, 1),
(1822, 'images/egresoscaja/9442720201112162957438.pdf', 'Beneficiario Externo', '2020-10-23', 47, 0, 0, 'NATALIA HERNANDEZ', 2, 7, 97000, 'VIATICOS CARTAGENA MONTERIA', '2020-11-12 16:17:08', 1, 1, 1),
(1823, 'images/egresoscaja/9696720201112163013798.pdf', 'Beneficiario Externo', '2020-10-20', 47, 0, 0, 'NATALIA HERNANDEZ', 2, 7, 250000, 'VIATICOS CARTAGENA ENTREGA DE DOCUMENTOS BOLIVAR GANADOR', '2020-11-12 16:18:01', 1, 1, 1),
(1824, 'images/egresoscaja/8501420201112163313082.pdf', 'Beneficiario Externo', '2020-10-27', 47, 0, 0, 'LABORATORIO ESPECIALIZADO', 4, 17, 80000, 'PRUEBA COVID', '2020-11-12 16:20:22', 1, 1, 1),
(1825, 'images/egresoscaja/9843820201112163329722.pdf', 'Beneficiario Externo', '2020-10-09', 47, 0, 0, 'GRUPO OBINCO', 2, 7, 57100, 'COMPARTIR', '2020-11-12 16:23:09', 1, 1, 1),
(1826, 'images/egresoscaja/8746220201112163730830.pdf', 'Beneficiario Externo', '2020-11-07', 47, 0, 0, 'COADESING', 4, 17, 130000, 'FUMIGACION APTO MURANO', '2020-11-12 16:24:33', 1, 1, 1),
(1827, 'images/egresoscaja/1029420201112164322882.pdf', 'Beneficiario Externo', '2020-09-20', 47, 0, 0, 'SERVIENTREGA', 2, 6, 51600, 'ENVIOS', '2020-11-12 16:30:35', 1, 1, 1),
(1828, 'images/egresoscaja/2872720201112164709367.pdf', 'Beneficiario Externo', '2020-09-17', 47, 0, 0, 'SERVIENTREGA', 2, 6, 32550, 'envios', '2020-11-12 16:34:24', 1, 1, 1),
(1829, 'images/egresoscaja/6265720201112170036340.pdf', 'Beneficiario Externo', '2020-02-25', 47, 0, 0, 'deprisa', 2, 6, 210800, 'envio internacional', '2020-11-12 16:48:00', 1, 1, 1),
(1830, 'images/egresoscaja/5194120201112170028090.pdf', 'Beneficiario Externo', '2020-07-24', 47, 0, 0, 'PAPELERIA EL CID', 4, 17, 64700, 'papeleria', '2020-11-12 16:49:14', 1, 1, 1),
(1831, 'images/egresoscaja/9192320201112170019915.pdf', 'Beneficiario Externo', '2020-03-03', 47, 0, 0, 'MOVISTAR', 2, 5, 288118, 'PLANES JD', '2020-11-12 16:50:15', 1, 1, 1),
(1832, 'images/egresoscaja/8366420201112170011574.pdf', 'Beneficiario Externo', '2020-11-07', 47, 0, 0, 'MOVISTAR', 2, 5, 152000, 'PLANES JDMO', '2020-11-12 16:51:09', 1, 1, 1),
(1833, 'images/egresoscaja/4522320201112170003317.pdf', 'Beneficiario Externo', '2020-10-07', 47, 0, 0, 'MOVISTAR', 2, 5, 147400, 'PLANES JD', '2020-11-12 16:51:54', 1, 1, 1),
(1834, 'images/egresoscaja/909620201112165955127.pdf', 'Beneficiario Externo', '2020-02-07', 47, 0, 0, 'LA BROWNISERIA', 4, 17, 17000, 'TORTA', '2020-11-12 16:53:04', 1, 1, 1),
(1835, 'images/egresoscaja/9412220201112165933063.pdf', 'Beneficiario Externo', '2020-05-28', 47, 0, 0, 'EDS', 3, 10, 100000, 'COMBUSTIBLE', '2020-11-12 16:53:55', 1, 1, 1),
(1836, 'images/egresoscaja/305620201112165907554.pdf', 'Beneficiario Externo', '2020-09-01', 47, 0, 0, 'VARIOS', 4, 17, 97000, 'PAGO TAPABOCAS JD Y NOTARIA', '2020-11-12 16:55:13', 1, 1, 1),
(1837, 'images/egresoscaja/5548916052288624352979499188705451348.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 358200, 'Pago peajes de volquetas', '2020-11-12 19:54:21', 1, 1, 1),
(1838, 'images/egresoscaja/92016052290458099142080482337508545.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'peajes', 2, 7, 298500, 'Pago peajes de volquetas', '2020-11-12 19:57:11', 1, 1, 1),
(1839, 'images/egresoscaja/5772816052294448858159952867229472210.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 424100, 'Pago peajes de volquetas', '2020-11-12 20:03:50', 1, 1, 1),
(1840, 'images/egresoscaja/2313616052827128538112271471494923242.jpg', 'Caja Sistema', '2020-11-11', 55, 33, 33, '', 0, 0, 80000, 'Pago freddy', '2020-11-13 10:45:53', 1, 1, 1),
(1841, 'images/egresoscaja/882416052827709974449685343076244180.jpg', 'Caja Sistema', '2020-11-11', 55, 33, 33, '', 0, 0, 20000, 'Pago feeddy', '2020-11-13 10:52:49', 1, 1, 1),
(1842, 'images/egresoscaja/7300916052827709974449685343076244180.jpg', 'Caja Sistema', '2020-11-11', 55, 33, 33, '', 0, 0, 20000, 'Pago feeddy', '2020-11-13 10:53:54', 1, 1, 1),
(1843, 'images/egresoscaja/4926616052829226125637395010911972255.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 573300, 'Pago peajes de volquetas', '2020-11-13 10:55:21', 1, 1, 1),
(1844, 'images/egresoscaja/732816052830372193703050393071608685.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 537300, 'Pago peajes de volquetas', '2020-11-13 10:57:11', 1, 1, 1),
(1845, 'images/egresoscaja/3488216052834756091549126297370821473.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 447600, 'Pago peajes de volquetas', '2020-11-13 11:04:27', 1, 1, 1),
(1846, 'images/egresoscaja/170611605283524086859182066803538127.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 503700, 'Pago peajes de volquetas', '2020-11-13 11:05:22', 1, 1, 1),
(1847, 'images/egresoscaja/4367916052835758195196211041761224320.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 574600, 'Pago peajes de volquetas', '2020-11-13 11:06:14', 1, 1, 1),
(1848, 'images/egresoscaja/5757616052845541284704732385282078780.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 404500, 'Pago peajes de volquetas', '2020-11-13 11:22:32', 1, 1, 1),
(1849, 'images/egresoscaja/8276616052847697968650730470374366324.jpg', 'Beneficiario Externo', '2020-11-10', 55, 0, 0, 'Llanteria los guayacanes', 3, 13, 35000, 'Arreglo de una llanta WOX133', '2020-11-13 11:26:08', 1, 1, 1),
(1850, 'images/egresoscaja/2824516052848643523205191034348725221.jpg', 'Beneficiario Externo', '2020-11-07', 55, 0, 0, 'Llanteria y engrasado sampues', 3, 13, 25000, 'Engrasado general con tr?iler GDY-167', '2020-11-13 11:27:43', 1, 1, 1),
(1851, 'images/egresoscaja/7621216052849910303825909297914048538.jpg', 'Beneficiario Externo', '2020-11-11', 55, 0, 0, 'Variedades nissi', 4, 26, 6500, 'Compra de AZ', '2020-11-13 11:29:49', 1, 1, 1),
(1852, 'images/egresoscaja/1586016052851293721170383410169269128.jpg', 'Beneficiario Externo', '2020-11-10', 55, 0, 0, 'Taller', 3, 15, 40000, 'Cambio de llanta y arreglo de valacate', '2020-11-13 11:32:08', 1, 1, 1),
(1853, 'images/egresoscaja/5327016052852351344700153573169800397.jpg', 'Beneficiario Externo', '2020-11-09', 55, 0, 0, 'Tornimuelle de sucre', 3, 15, 28000, '2 pernos', '2020-11-13 11:33:51', 1, 1, 1),
(1854, 'images/egresoscaja/6233816052854026848717098152424539395.jpg', 'Beneficiario Externo', '2020-11-12', 55, 0, 0, 'Central de frenos', 3, 15, 25000, 'Un bombillo SNY617', '2020-11-13 11:36:42', 1, 1, 1),
(1855, 'images/egresoscaja/7939016055280567596298880671077372360.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 624300, 'Pago peajes de volquetas', '2020-11-16 06:59:48', 1, 1, 1),
(1856, 'images/egresoscaja/2808216055284245007364255299217858012.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 517400, 'Pago peajes de volquetas', '2020-11-16 07:06:16', 1, 1, 1),
(1857, 'images/egresoscaja/2601816055289877582809936591455953010.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peaje', 2, 7, 477600, 'Pago peajes de volquetas', '2020-11-16 07:16:19', 1, 1, 1),
(1858, 'images/egresoscaja/1033216055300156594517021767495671334.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 181800, 'Pago peajes de volquetas', '2020-11-16 07:33:33', 1, 1, 1),
(1859, 'images/egresoscaja/9871616055301125271062452098498682349.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 279800, 'Pago peajes de volquetas', '2020-11-16 07:35:08', 1, 1, 1),
(1860, 'images/egresoscaja/5983916055301892177444596022741178341.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 242400, 'Pago peajes de volquetas', '2020-11-16 07:36:28', 1, 1, 1),
(1861, 'images/egresoscaja/4554920201117180413344.pdf', 'Beneficiario Externo', '2020-08-29', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 147600, 'PEAJES VARIOS', '2020-11-17 17:51:01', 1, 1, 1),
(1862, 'images/egresoscaja/5201120201117180359017.pdf', 'Beneficiario Externo', '2020-10-09', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 108600, 'PEAJES VARIOS', '2020-11-17 17:52:13', 1, 1, 1),
(1863, 'images/egresoscaja/6607220201117180346481.pdf', 'Beneficiario Externo', '2020-09-21', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 177700, 'PEAJES VARIOS', '2020-11-17 17:53:00', 1, 1, 1),
(1864, 'images/egresoscaja/5797020201117180329219.pdf', 'Beneficiario Externo', '2020-10-02', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 109500, 'PEAJES VARIOS', '2020-11-17 17:53:51', 1, 1, 1),
(1865, 'images/egresoscaja/7467820201117180329219.pdf', 'Beneficiario Externo', '2020-10-24', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 45300, 'PEAJES VARIOS', '2020-11-17 17:54:35', 1, 1, 1),
(1866, 'images/egresoscaja/9793320201118104447334.pdf', 'Beneficiario Externo', '2020-10-02', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 109100, 'PEAJES', '2020-11-18 10:37:44', 1, 1, 1),
(1867, 'images/egresoscaja/6435020201118104507171.pdf', 'Beneficiario Externo', '2020-09-21', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 164100, 'PEAJES', '2020-11-18 10:39:06', 1, 1, 1),
(1868, 'images/egresoscaja/38920201118104525765.pdf', 'Beneficiario Externo', '2020-10-20', 5, 0, 0, 'PEAJES', 2, 7, 194700, 'PEAJES', '2020-11-18 10:39:58', 1, 1, 1),
(1869, 'images/egresoscaja/674820201118104543307.pdf', 'Beneficiario Externo', '2020-10-02', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 137800, 'PEAJES', '2020-11-18 10:40:45', 1, 1, 1),
(1870, 'images/egresoscaja/2056120201118104601565.pdf', 'Beneficiario Externo', '2020-10-16', 5, 0, 0, 'PEAJES', 2, 7, 154300, 'PEAJES', '2020-11-18 10:42:13', 1, 1, 1),
(1871, 'images/egresoscaja/8037420201118104620626.pdf', 'Beneficiario Externo', '2020-09-11', 5, 0, 0, 'PEAJE VARIOS', 2, 7, 98700, 'PEAJES', '2020-11-18 10:48:21', 1, 1, 1),
(1872, 'images/egresoscaja/250120201118104640451.pdf', 'Beneficiario Externo', '2020-09-07', 5, 0, 0, 'VARIOS', 4, 18, 255800, 'compras', '2020-11-18 10:49:23', 1, 1, 1),
(1873, 'images/egresoscaja/2873520201118104656141.pdf', 'Beneficiario Externo', '2020-10-27', 5, 0, 0, 'varios', 4, 18, 305882, 'compras', '2020-11-18 10:55:09', 1, 1, 1),
(1874, 'images/egresoscaja/823420201118104718998.pdf', 'Beneficiario Externo', '2020-09-12', 5, 0, 0, 'VARIOS', 3, 10, 303184, 'combustible', '2020-11-18 10:56:11', 1, 1, 1),
(1875, 'images/egresoscaja/6624320201118104731894.pdf', 'Beneficiario Externo', '2020-09-15', 5, 0, 0, 'hoteles via del mar', 4, 18, 300000, 'pago hotel', '2020-11-18 10:56:47', 1, 1, 1),
(1876, 'images/egresoscaja/2364720201118104802236.pdf', 'Beneficiario Externo', '2020-09-01', 5, 0, 0, 'VARIOS', 3, 10, 250000, 'COMBUSTIBLE', '2020-11-18 10:57:38', 1, 1, 1),
(1877, 'images/egresoscaja/5183720201118104814581.pdf', 'Beneficiario Externo', '2020-09-02', 5, 0, 0, 'LOS REMEDIOS', 3, 15, 57000, 'REPUESTOS', '2020-11-18 10:58:22', 1, 1, 1),
(1878, 'images/egresoscaja/8417220201118104833011.pdf', 'Beneficiario Externo', '2020-08-06', 5, 0, 0, 'GRUPO EMPRESARIAL ROMERO MENDOZA', 3, 15, 35000, 'REPUESTOS', '2020-11-18 10:59:33', 1, 1, 1),
(1879, 'images/egresoscaja/4542920201118104849279.pdf', 'Beneficiario Externo', '2020-08-06', 5, 0, 0, 'TITANIUM', 3, 15, 50000, 'REPUESTOS', '2020-11-18 11:00:18', 1, 1, 1),
(1880, 'images/egresoscaja/1163820201118104911287.pdf', 'Beneficiario Externo', '2020-10-30', 5, 0, 0, 'RESTAURANTES', 4, 18, 162603, 'COMIDAS', '2020-11-18 11:00:58', 1, 1, 1),
(1881, 'images/egresoscaja/43020201118104938651.pdf', 'Beneficiario Externo', '2020-09-30', 5, 0, 0, 'RESTAURANTES', 4, 18, 268100, 'COMIDAS', '2020-11-18 11:02:54', 1, 1, 1),
(1882, 'images/egresoscaja/3255620201118104950662.pdf', 'Beneficiario Externo', '2020-08-30', 5, 0, 0, 'RESTAURANTES', 4, 18, 222752, 'COMIDAS', '2020-11-18 11:03:37', 1, 1, 1),
(1883, 'images/egresoscaja/8791620201118105018973.pdf', 'Beneficiario Externo', '2020-07-20', 5, 0, 0, 'RESTAURANTES', 4, 18, 73846, 'COMIDAS', '2020-11-18 11:05:05', 1, 1, 1),
(1884, 'images/egresoscaja/354FACTURA DE VENTA_OSCT130149_890480041_.pdf', 'Beneficiario Externo', '2020-11-18', 47, 0, 0, 'camara de comercio de cartagena', 4, 17, 6100, 'certificado', '2020-11-18 13:11:48', 1, 1, 1),
(1885, 'images/egresoscaja/43872FACTURA DE VENTA_OSCT130149_890480041_.pdf', 'Beneficiario Externo', '2020-11-18', 47, 0, 0, 'camara de comercio de cartagena', 4, 17, 6100, 'certificado', '2020-11-18 13:11:48', 1, 1, 1),
(1886, 'images/egresoscaja/5921Comprobante de pago en linea (3).pdf', 'Beneficiario Externo', '2020-11-20', 47, 0, 0, 'camara de comercio de cartagena', 4, 17, 6100, 'certificado', '2020-11-20 08:47:10', 1, 1, 1),
(1887, 'images/egresoscaja/4616116058922737877851469143962333929.jpg', 'Beneficiario Externo', '2020-11-19', 55, 0, 0, 'Taller santo domingo sabio', 3, 13, 25000, 'GDY532', '2020-11-20 12:11:13', 1, 1, 1),
(1888, 'images/egresoscaja/8845616058923610623484854671843307453.jpg', 'Beneficiario Externo', '2020-11-13', 55, 0, 0, 'Isidro Rangel', 4, 26, 30000, 'Pago de examen de ingreso del conductor de volqueta SSY423', '2020-11-20 12:12:40', 1, 1, 1),
(1889, 'images/egresoscaja/216431605892574543118396831179665933.jpg', 'Beneficiario Externo', '2020-11-18', 55, 0, 0, 'Isidro Rangel', 4, 26, 200000, 'Pago a conductor de volqueta SSY423\r\nAutorizados por el ingeniero Jos? Daniel', '2020-11-20 12:16:13', 1, 1, 1),
(1890, 'images/egresoscaja/8149516060930404182307926355853593074.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 242400, 'Pago peajes de volquetas', '2020-11-22 19:57:19', 1, 1, 1),
(1891, 'images/egresoscaja/812916060933753991097209760685696598.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 242400, 'Pago peajes de volquetas', '2020-11-22 20:02:53', 1, 1, 1),
(1892, 'images/egresoscaja/3476616060940768245575065708590656077.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 466200, 'Pago peajes de volquetas', '2020-11-22 20:14:30', 1, 1, 1),
(1893, 'images/egresoscaja/1787216060943850337779192840996116857.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 242400, 'Pago peajes de volquetas', '2020-11-22 20:19:43', 1, 1, 1),
(1894, 'images/egresoscaja/463231606094764683356431940814513364.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 597000, 'Pago peajes de volquetas', '2020-11-22 20:26:02', 1, 1, 1),
(1895, 'images/egresoscaja/180971606095366624308050938835621346.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 477600, 'Pago peajes de volquetas', '2020-11-22 20:36:01', 1, 1, 1),
(1896, 'images/egresoscaja/215461606095506490953280565721977316.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 696500, 'Pago peajes de volquetas', '2020-11-22 20:38:24', 1, 1, 1),
(1897, 'images/egresoscaja/5193416060956894702920967649338893735.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 242400, 'Pago peajes de volquetas', '2020-11-22 20:41:25', 1, 1, 1),
(1898, 'images/egresoscaja/2456616060958699189105529902095606957.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 222200, 'Pago peajes de volquetas', '2020-11-22 20:44:26', 1, 1, 1),
(1899, 'images/egresoscaja/3174716060960603876741606746625340336.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 477600, 'Pago peajes de volquetas', '2020-11-22 20:47:38', 1, 1, 1),
(1900, 'images/egresoscaja/9897116060961865283787925490342085582.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 242400, 'Pago peajes de volquetas', '2020-11-22 20:49:44', 1, 1, 1),
(1901, 'images/egresoscaja/9425016060963702325067582026899261049.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 242400, 'Pago peajes de volquetas', '2020-11-22 20:51:29', 1, 1, 1),
(1902, 'images/egresoscaja/9303916060964820642214193117134035951.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 242400, 'Pago peajes de volquetas', '2020-11-22 20:54:40', 1, 1, 1),
(1903, 'images/egresoscaja/9069116060966330815521846035593183391.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 161000, 'Pago peajes de volquetas', '2020-11-22 20:57:11', 1, 1, 1),
(1904, 'images/egresoscaja/72011606155770411241482607931561367.jpg', 'Caja Sistema', '2020-11-23', 55, 33, 33, '', 0, 0, 150000, 'Caja menor Freddy', '2020-11-23 13:22:48', 1, 1, 1),
(1905, 'images/egresoscaja/4177016061589042722332188890023257831.jpg', 'Beneficiario Externo', '2020-11-23', 55, 0, 0, 'Mart?n martinez', 3, 15, 3000, 'Compra de tornillo pasador GDY538', '2020-11-23 14:14:57', 1, 1, 1),
(1906, 'images/egresoscaja/3955716061591748062259855711325302661.jpg', 'Beneficiario Externo', '2020-11-18', 55, 0, 0, 'Terpel', 2, 36, 5000, 'Compra de gasolina para retirar los peajes en toluviejo', '2020-11-23 14:19:33', 1, 1, 1),
(1907, 'images/egresoscaja/4792416061593136923766077849796527730.jpg', 'Beneficiario Externo', '2020-11-20', 55, 0, 0, 'EDS paradigma caribe', 3, 10, 58000, 'Compra de combustible GDY532', '2020-11-23 14:21:52', 1, 1, 1),
(1908, 'images/egresoscaja/5880716061605272561857756829234535653.jpg', 'Beneficiario Externo', '2020-11-11', 55, 0, 0, 'Llanteria el caucho y lubricantes', 3, 15, 25000, 'Montada de llanta y un parche GDY536', '2020-11-23 14:42:03', 1, 1, 1),
(1909, 'images/egresoscaja/7444916062554062412443546326090459779.jpg', 'Caja Sistema', '2020-11-24', 55, 33, 33, '', 0, 0, 50000, 'Pago Freddy Gonz?lez', '2020-11-24 17:03:25', 1, 1, 1),
(1910, 'images/egresoscaja/2706716067330872051803397379761510344.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 664100, 'Pago peajes de volquetas', '2020-11-30 05:44:45', 1, 1, 1),
(1911, 'images/egresoscaja/8537916067332197048843507546482461204.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 477600, 'Pago peajes de volquetas', '2020-11-30 05:46:56', 1, 1, 1),
(1912, 'images/egresoscaja/8327416067333990522054976360505564218.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 329700, 'Pago peajes de volquetas', '2020-11-30 05:49:52', 1, 1, 1),
(1913, 'images/egresoscaja/7617316067336405098519823806235930403.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 339800, 'Pago peajes de volquetas', '2020-11-30 05:53:35', 1, 1, 1),
(1914, 'images/egresoscaja/3370016067338042385006374275646238475.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 597000, 'Pago peajes de volquetas', '2020-11-30 05:56:42', 1, 1, 1),
(1915, 'images/egresoscaja/4828116067340537045818250609150760258.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 597000, 'Pago peajes de volquetas', '2020-11-30 06:00:53', 1, 1, 1),
(1916, 'images/egresoscaja/8150216067344005435706577237329682853.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 641600, 'Pago peajes de volquetas', '2020-11-30 06:05:08', 1, 1, 1),
(1917, 'images/egresoscaja/8725616067350013941235920231229822902.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 488600, 'Pago peajes de volquetas', '2020-11-30 06:12:48', 1, 1, 1),
(1918, 'images/egresoscaja/5417016067403678147562340547905497979.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 361800, 'Pago peajes de volquetas', '2020-11-30 07:45:45', 1, 1, 1),
(1919, 'images/egresoscaja/6244516067404248376957376368734740438.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 578600, 'Pago peajes de volquetas', '2020-11-30 07:47:04', 1, 1, 1),
(1920, 'images/egresoscaja/4651216067406366912271384244043175317.jpg', 'Beneficiario Externo', '2020-11-28', 55, 0, 0, 'Motocar lavadero', 3, 13, 80000, 'Lavado de volqueta y engrase', '2020-11-30 07:50:35', 1, 1, 1),
(1921, 'images/egresoscaja/5356020201130095000258.pdf', 'Beneficiario Externo', '2020-09-01', 49, 0, 0, 'PEAJES', 2, 7, 163000, 'PEAJES', '2020-11-30 09:37:37', 1, 1, 1),
(1922, 'images/egresoscaja/8275420201130095008977.pdf', 'Beneficiario Externo', '2020-08-31', 49, 0, 0, 'EDS EXITO', 3, 10, 130000, 'COMBUSTIBLE', '2020-11-30 09:38:42', 1, 1, 1),
(1923, 'images/egresoscaja/8354520201130095025711.pdf', 'Beneficiario Externo', '2020-08-31', 49, 0, 0, 'VARIOS', 3, 15, 930788, 'REPUESTOS VARIOS', '2020-11-30 09:40:22', 1, 1, 1),
(1924, 'images/egresoscaja/8547720201130095034166.pdf', 'Beneficiario Externo', '2020-08-28', 49, 0, 0, 'EMPLEADOS', 3, 11, 150000, 'GASTOS VARIOS', '2020-11-30 09:41:49', 1, 1, 1),
(1925, 'images/egresoscaja/2188820201130100205291.pdf', 'Beneficiario Externo', '2020-09-04', 49, 0, 0, 'PEAJES', 2, 7, 632000, 'peajes', '2020-11-30 09:49:54', 1, 1, 1),
(1926, 'images/egresoscaja/9916920201130100234080.pdf', 'Beneficiario Externo', '2020-09-02', 49, 0, 0, 'varios', 3, 10, 298000, 'combustible', '2020-11-30 09:50:42', 1, 1, 1),
(1927, 'images/egresoscaja/7281720201130100255266.pdf', 'Beneficiario Externo', '2020-09-04', 49, 0, 0, 'NATALIA HERNANDEZ', 4, 17, 270000, 'caja oficina', '2020-11-30 09:51:40', 1, 1, 1),
(1928, 'images/egresoscaja/6319820201130100857005.pdf', 'Beneficiario Externo', '2020-09-08', 49, 0, 0, 'PEAJES', 2, 7, 574500, 'peajes', '2020-11-30 10:02:31', 1, 1, 1),
(1929, 'images/egresoscaja/9640920201130101020894.pdf', 'Beneficiario Externo', '2020-09-04', 49, 0, 0, 'VARIOS', 3, 15, 2027598, 'VARIOS', '2020-11-30 10:04:23', 1, 1, 1),
(1930, 'images/egresoscaja/5760620201130101049403.pdf', 'Beneficiario Externo', '2020-09-10', 49, 0, 0, 'VARIOS', 3, 11, 398000, 'GASTOS', '2020-11-30 10:06:52', 1, 1, 1),
(1931, 'images/egresoscaja/2700220201130102148038.pdf', 'Beneficiario Externo', '2020-09-05', 49, 0, 0, 'MUNDO BANDAS', 3, 15, 760000, 'GRAPAS', '2020-11-30 10:08:23', 1, 1, 1),
(1932, 'images/egresoscaja/8429020201130102457064.pdf', 'Beneficiario Externo', '2020-09-09', 49, 0, 0, 'PEAJES', 2, 7, 38600, 'peajes', '2020-11-30 10:13:14', 1, 1, 1),
(1933, 'images/egresoscaja/1494120201130102559406.pdf', 'Beneficiario Externo', '2020-09-11', 49, 0, 0, 'VARIOS', 3, 15, 252400, 'VARIOS', '2020-11-30 10:41:21', 1, 1, 1),
(1934, 'images/egresoscaja/7350320201130102617118.pdf', 'Beneficiario Externo', '2020-09-09', 49, 0, 0, 'KATIA ALVAREZ', 4, 17, 150000, 'EXAMENES MEDICOS EMPLEADOS', '2020-11-30 10:44:15', 1, 1, 1),
(1935, 'images/egresoscaja/9495220201130102727654.pdf', 'Beneficiario Externo', '2020-09-07', 49, 0, 0, 'VARIOS', 3, 11, 120000, 'varios', '2020-11-30 10:45:13', 1, 1, 1),
(1936, 'images/egresoscaja/7073520201130112414532.pdf', 'Beneficiario Externo', '2020-09-11', 49, 0, 0, 'PEAJES', 2, 7, 59500, 'peajes', '2020-11-30 11:13:07', 1, 1, 1),
(1937, 'images/egresoscaja/9162220201130112422881.pdf', 'Beneficiario Externo', '2020-09-11', 49, 0, 0, 'VARIOS', 3, 10, 85894, 'COMBUSTIBLE', '2020-11-30 11:14:37', 1, 1, 1),
(1938, 'images/egresoscaja/2582520201130112440634.pdf', 'Beneficiario Externo', '2020-09-08', 49, 0, 0, 'VARIOS', 3, 15, 3220821, 'REPUESTOS VARIOS', '2020-11-30 11:15:31', 1, 1, 1),
(1939, 'images/egresoscaja/2685020201130112449896.pdf', 'Beneficiario Externo', '2020-09-11', 49, 0, 0, 'EMPLEADOS', 3, 11, 155000, 'GASTOS', '2020-11-30 11:17:17', 1, 1, 1),
(1940, 'images/egresoscaja/8736920201130114153587.pdf', 'Beneficiario Externo', '2020-09-15', 49, 0, 0, 'PEAJE VARIOS', 2, 7, 784100, 'PEAJES', '2020-11-30 11:23:14', 1, 1, 1),
(1941, 'images/egresoscaja/6550320201130114225695.pdf', 'Beneficiario Externo', '2020-09-13', 49, 0, 0, 'VARIOS', 3, 10, 557000, 'COMBUSTIBLE Y DEM?S', '2020-11-30 11:47:11', 1, 1, 1),
(1942, 'images/egresoscaja/4153820201130114703504.pdf', 'Beneficiario Externo', '2020-09-15', 49, 0, 0, 'VARIOS', 3, 15, 851010, 'VARIOS', '2020-11-30 11:49:16', 1, 1, 1),
(1943, 'images/egresoscaja/5110620201130114713659.pdf', 'Beneficiario Externo', '2020-09-15', 49, 0, 0, 'EMPLEADOS', 3, 11, 103000, 'varios', '2020-11-30 11:51:02', 1, 1, 1),
(1944, 'images/egresoscaja/9080920201130114713659.pdf', 'Beneficiario Externo', '2020-09-15', 49, 0, 0, 'EMPLEADOS', 3, 11, 103000, 'varios', '2020-11-30 11:51:02', 1, 1, 1),
(1945, 'images/egresoscaja/3910816068421083133761989822881443489.jpg', 'Caja Sistema', '2020-11-28', 55, 33, 33, '', 0, 0, 50000, 'Pago Freddy Gonz?lez', '2020-12-01 12:01:44', 1, 1, 1),
(1946, 'images/egresoscaja/1154316068421956803034525774361136144.jpg', 'Beneficiario Externo', '2020-11-28', 55, 0, 0, 'Taller de mec?nica hermanos villalba', 3, 15, 15000, 'Un diafragma UQE066', '2020-12-01 12:03:14', 1, 1, 1),
(1947, 'images/egresoscaja/5141416072626095562816738576494562928.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 321400, 'Pago peajes de volquetas', '2020-12-06 08:50:09', 1, 1, 1),
(1948, 'images/egresoscaja/8981916072627471695882878075403533196.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 306100, 'Pago peajes de volquetas', '2020-12-06 08:52:25', 1, 1, 1),
(1949, 'images/egresoscaja/7993416072628649533986246145894723435.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 230800, 'Pago peajes de volquetas', '2020-12-06 08:54:24', 1, 1, 1),
(1950, 'images/egresoscaja/3106416072629855566171883908192698716.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 345300, 'Pago peajes de volquetas', '2020-12-06 08:56:25', 1, 1, 1),
(1951, 'images/egresoscaja/7475216072630935238997701612278125720.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 359400, 'Pago peajes de volquetas', '2020-12-06 08:58:12', 1, 1, 1),
(1952, 'images/egresoscaja/1460916072631887418011926758237894547.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 497500, 'Pago peajes de volquetas', '2020-12-06 08:59:48', 1, 1, 1),
(1953, 'images/egresoscaja/1684316072632807376948100845287918821.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 597000, 'Pago peajes de volquetas', '2020-12-06 09:01:19', 1, 1, 1),
(1954, 'images/egresoscaja/5028816072634007972455350931468737264.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 473300, 'Pago peajes de volquetas', '2020-12-06 09:03:03', 1, 1, 1),
(1955, 'images/egresoscaja/1426316072634894008243572438913454574.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 477600, 'Pago peajes de volquetas', '2020-12-06 09:04:49', 1, 1, 1),
(1956, 'images/egresoscaja/755716072635781605703377894022875954.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 497500, 'Pago peajes de volquetas', '2020-12-06 09:06:17', 1, 1, 1),
(1957, 'images/egresoscaja/6678916072637199896737308209591286123.jpg', 'Beneficiario Externo', '2020-11-01', 55, 0, 0, 'Peajes', 2, 7, 497500, 'Pago peajes de volquetas', '2020-12-06 09:08:36', 1, 1, 1),
(1958, 'images/egresoscaja/2981416072638727402802736403030727672.jpg', 'Beneficiario Externo', '2020-12-03', 55, 0, 0, 'Comercial toluviejo', 3, 15, 4000, 'Abrazadera GDY538', '2020-12-06 09:11:11', 1, 1, 1);
INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(1959, 'images/egresoscaja/1614916072639963344856073793560362177.jpg', 'Beneficiario Externo', '2020-12-03', 55, 0, 0, 'Cesar gomez', 3, 13, 10000, 'Desvarada manguera radiador', '2020-12-06 09:13:15', 1, 1, 1),
(1960, 'images/egresoscaja/7082416072642123977292787009688294653.jpg', 'Beneficiario Externo', '2020-11-28', 55, 0, 0, 'Llanteria y engrasado sampues', 3, 13, 15000, 'Engrase general', '2020-12-06 09:16:51', 1, 1, 1),
(1961, 'images/egresoscaja/5059716072644264192260202240491563755.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Renaciente', 2, 7, 45000, 'Pago de pasajes conductor SNY617 por llevar veh?culo a Cartagena (kenworth)', '2020-12-06 09:20:24', 1, 1, 1),
(1962, 'images/egresoscaja/3274616072646049061712868885140420777.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Montallantas el viso', 3, 15, 24000, 'montada de llanta UQE126', '2020-12-06 09:23:23', 1, 1, 1),
(1963, 'images/egresoscaja/9933316072647138857081359390696904470.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Restaurante el reposo', 2, 7, 10000, 'Pago almuerzo conductor UQE066, viaje luruaco autorizados por amaury', '2020-12-06 09:25:10', 1, 1, 1),
(1964, 'images/egresoscaja/4732516072649050914510281899042055417.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Restaurante el reposo', 2, 7, 10000, 'Pago almuerzo conductor de GDY534 por viaje a luruaco autorizados por amaury', '2020-12-06 09:28:24', 1, 1, 1),
(1965, 'images/egresoscaja/8978116072650789053487694688380829914.jpg', 'Beneficiario Externo', '2020-11-21', 55, 0, 0, 'Llanteria los guayacanes', 3, 13, 15000, 'Cambio de llanta WOX133', '2020-12-06 09:31:18', 1, 1, 1),
(1966, 'images/egresoscaja/3553716072653519572594856703268837703.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'San geronimo', 3, 10, 70000, 'Pago combustible GDY167', '2020-12-06 09:35:50', 1, 1, 1),
(1967, 'images/egresoscaja/4535316072655778911248400359982338305.jpg', 'Beneficiario Externo', '2020-11-14', 55, 0, 0, 'Central de frenos', 3, 15, 8000, 'Bombillo', '2020-12-06 09:39:37', 1, 1, 1),
(1968, 'images/egresoscaja/8884716072656570476063014295658102600.jpg', 'Beneficiario Externo', '2020-12-24', 55, 0, 0, 'Terpel', 3, 10, 5000, 'Pago de gasolina al transporte para retirar el dinero de los peajes', '2020-12-06 09:40:56', 1, 1, 1),
(1969, 'images/egresoscaja/9951316072658360543146589988554616147.jpg', 'Beneficiario Externo', '2020-11-20', 55, 0, 0, 'Sergio bola?os', 3, 15, 30000, 'Pago alquiler de cadenas para sacar a volqueta GDY539 que estaba enterrada en la trocha v?a tablitas', '2020-12-06 09:43:55', 1, 1, 1),
(1970, 'images/egresoscaja/9642016072660651725803795759115880774.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'E.D.S el viso', 3, 10, 70000, 'Pago combustible volqueta UQE126 viaje luruaco', '2020-12-06 09:47:44', 1, 1, 1),
(1971, 'images/egresoscaja/3737216072661848962281546037530323118.jpg', 'Beneficiario Externo', '2020-11-22', 55, 0, 0, 'Movistar', 2, 5, 40000, 'Pago plan al tel?fono de thalia', '2020-12-06 09:49:44', 1, 1, 1),
(1972, 'images/egresoscaja/1412716072663261064597078221986733594.jpg', 'Beneficiario Externo', '2020-11-30', 55, 0, 0, 'Central de frenos', 3, 15, 56500, 'Manguera sopla cabina GDY538', '2020-12-06 09:52:05', 1, 1, 1),
(1973, 'images/egresoscaja/6253116072664532359013189993456231869.jpg', 'Beneficiario Externo', '2020-12-03', 55, 0, 0, 'Terpel', 3, 10, 5000, 'Pago de combustible al transporte para retirar el dinero de los peajes', '2020-12-06 09:54:12', 1, 1, 1),
(1974, 'images/egresoscaja/6744616072666422006397668887858944318.jpg', 'Beneficiario Externo', '2020-11-28', 55, 0, 0, 'Jorge Eliecer mercado', 3, 15, 150000, 'Arreglo de v?lvula de presi?n de parqueo UQE126 autorizados por amaury', '2020-12-06 09:57:21', 1, 1, 1),
(1975, 'images/egresoscaja/187791607608672792629803685553414207.jpg', 'Beneficiario Externo', '2020-11-23', 55, 0, 0, 'Policias', 4, 26, 40000, 'Pago polic?a por v?as externas viaje luruaco GDY535 UQE126', '2020-12-10 08:57:52', 1, 1, 1),
(1976, 'images/egresoscaja/6891916076384875253721740652267658723.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Jorge Ochoa', 2, 7, 10000, 'Pago de almuerzo al conductor de la GDY534 por motivo viaje luruaco', '2020-12-10 17:14:46', 1, 1, 1),
(1977, 'images/egresoscaja/7752816076385776254371631570160099513.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Juan baleta', 2, 7, 10000, 'Pago de almuerzo al conductor de la GDY535', '2020-12-10 17:16:17', 1, 1, 1),
(1978, 'images/egresoscaja/8169516076386843086715280291149700163.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Elkim flores', 2, 7, 10000, 'Pago de almuerzo al conductor UQE070 por viaje a luruaco', '2020-12-10 17:18:04', 1, 1, 1),
(1979, 'images/egresoscaja/9352916076387546371578276637197638995.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Osvaldo sampayo', 2, 7, 10000, 'Pago almuerzo conductor de GDY167 por motivo viaje luruaco', '2020-12-10 17:19:14', 1, 1, 1),
(1980, 'images/egresoscaja/8657216076388478286225892916531517437.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Fidel castro', 2, 7, 25000, 'Pago vi?ticos de conductor por motivo de llevada del vehiculo a la kenworth Cartagena', '2020-12-10 17:20:47', 1, 1, 1),
(1981, 'images/egresoscaja/3830316076389496183295912274983116590.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Jorge Ochoa', 2, 7, 20000, 'Pago almuerzo y cena de conductor viaje luruaco', '2020-12-10 17:22:23', 1, 1, 1),
(1982, 'images/egresoscaja/1461916076391448227219449718668035274.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Juan baleta', 2, 7, 20000, 'Pago almuerzo y cena de conductor GDY535 viaje luruaco', '2020-12-10 17:25:44', 1, 1, 1),
(1983, 'images/egresoscaja/7439616076404814145632061372349604624.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Sergio Bola?o', 2, 7, 10000, 'Pago de almuerzo conductor GDY539 viaje luruaco', '2020-12-10 17:48:00', 1, 1, 1),
(1984, 'images/egresoscaja/339631607640725085434900286735523048.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Ricardo peralta', 2, 7, 10000, 'Pago almuerzo conductor UQE066 viaje luruaco', '2020-12-10 17:52:04', 1, 1, 1),
(1985, 'images/egresoscaja/8302716076408288253456774630835077423.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Te?filo vega', 2, 7, 10000, 'Pago almuerzo UQE126 viaje luruaco', '2020-12-10 17:53:48', 1, 1, 1),
(1986, 'images/egresoscaja/314216076408901081093054809285730964.jpg', 'Beneficiario Externo', '2020-11-24', 55, 0, 0, 'Te?filo vega', 2, 7, 10000, 'Pago almuerzo UQE126 viaje luruaco', '2020-12-10 17:54:48', 1, 1, 1),
(1987, 'images/egresoscaja/1404816076409788007356584873651613586.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Guido elicer', 2, 7, 10000, 'Pago almuerzo conductor de GDY533 viaje luruaco', '2020-12-10 17:56:17', 1, 1, 1),
(1988, 'images/egresoscaja/2021816076412254021425099817640002235.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Harbey', 2, 7, 10000, 'Pago almuerzo conductor de GDY536 viaje luruaco', '2020-12-10 18:00:24', 1, 1, 1),
(1989, 'images/egresoscaja/7785416076413694904345045916911787007.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Martin martinez', 2, 7, 10000, 'Pago almuerzo conductor de GDY538 viaje luruaco', '2020-12-10 18:01:56', 1, 1, 1),
(1990, 'images/egresoscaja/1073716076417202945206138472061983273.jpg', 'Beneficiario Externo', '2020-11-25', 55, 0, 0, 'Jos? simahan', 2, 7, 10000, 'Pago almuerzo GDY532 viaje luruaco', '2020-12-10 18:08:36', 1, 1, 1),
(1991, 'images/egresoscaja/39618IMG_20201211_181713.jpg', 'Caja Sistema', '2020-12-08', 57, 55, 55, '', 0, 0, 600000, 'CAJA MENOR PEAJES', '2020-12-11 20:06:23', 1, 1, 1),
(1992, 'images/egresoscaja/86959Comprobante de pago en linea (4).pdf', 'Beneficiario Externo', '2020-12-09', 47, 0, 0, 'MOVISTAR', 2, 5, 311500, 'PAGO DE INTERNET JD', '2020-12-12 08:14:24', 1, 1, 1),
(1993, 'images/egresoscaja/1841120201212084308023.pdf', 'Beneficiario Externo', '2020-11-24', 47, 0, 0, 'PAPELERIA EL CID', 4, 17, 71400, 'PAPELERIA', '2020-12-12 08:30:50', 1, 1, 1),
(1994, 'images/egresoscaja/7898720201212084316315.pdf', 'Beneficiario Externo', '2020-12-10', 47, 0, 0, 'DAVIVIENDA', 4, 17, 929510, 'PAGO CUOTA ING XIOMARA', '2020-12-12 08:32:13', 1, 1, 1),
(1995, 'images/egresoscaja/981320201212084324402.pdf', 'Beneficiario Externo', '2020-12-07', 47, 0, 0, 'AGM DESARROLLOS', 5, 30, 3745923, 'PAGO POLVILLO', '2020-12-12 08:33:19', 1, 1, 1),
(1996, 'images/egresoscaja/8815820201212084339840.pdf', 'Beneficiario Externo', '2020-12-03', 47, 0, 0, 'BANCO DE BOGOTA', 1, 3, 543208, 'PAGO CUOTAS PRESTAMOS DE NOMINA', '2020-12-12 08:34:34', 1, 1, 1),
(1997, 'images/egresoscaja/9155620201212084347931.pdf', 'Beneficiario Externo', '2020-12-07', 47, 0, 0, 'MOVISTAR', 2, 5, 156000, 'PLANES JD', '2020-12-12 08:35:42', 1, 1, 1),
(1998, 'images/egresoscaja/5926920201212084356881.pdf', 'Beneficiario Externo', '2020-11-26', 47, 0, 0, 'SERVIENTREGA', 2, 6, 28100, 'ENVIOS', '2020-12-12 08:36:33', 1, 1, 1),
(1999, 'images/egresoscaja/2044WhatsApp Image 2020-12-12 at 7.45.27 PM (5).jpeg', 'Beneficiario Externo', '2020-12-08', 57, 0, 0, 'BANCOLOMBIA', 1, NULL, 5180, 'IMPUESTO GOBIERNO 4*1000', '2020-12-12 20:00:08', 1, 1, 1),
(2000, 'images/egresoscaja/14006WhatsApp Image 2020-12-12 at 7.45.27 PM (3).jpeg', 'Caja Sistema', '2020-12-09', 57, 55, 55, '', 0, 0, 300000, 'CAJA MENOR PEAJES', '2020-12-12 20:02:37', 1, 1, 1),
(2001, 'images/egresoscaja/65213WhatsApp Image 2020-12-12 at 7.45.26 PM (5).jpeg', 'Beneficiario Externo', '2020-12-09', 57, 0, 0, 'PANADERIA TOLUVIEJO CENTRO', 4, 17, 13000, 'BOTELLON DE AGUA', '2020-12-12 20:05:27', 1, 1, 1),
(2002, 'images/egresoscaja/35400WhatsApp Image 2020-12-12 at 7.45.26 PM (2).jpeg', 'Caja Sistema', '2020-12-09', 57, 55, 55, '', 0, 0, 600000, 'CAJA MENOR PEAJES', '2020-12-12 20:11:47', 1, 1, 1),
(2003, 'images/egresoscaja/62515WhatsApp Image 2020-12-12 at 7.45.25 PM (1).jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'BANCOLOMBIA', 1, 33, 8760, 'IMPUESTO GOBIERNO 4*1000', '2020-12-12 20:13:35', 1, 1, 1),
(2004, 'images/egresoscaja/59145WhatsApp Image 2020-12-12 at 7.45.27 PM (6).jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'ESNOIDER JOSE OLIVERO P.', 4, 23, 25000, 'PASAJES PARA IR AL MEDICO', '2020-12-12 20:15:31', 1, 1, 1),
(2005, 'images/egresoscaja/47819WhatsApp Image 2020-12-12 at 7.45.26 PM (1).jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'COMERCIAL TOLUVIEJO', 5, 30, 13000, 'MEDIO PLIEGO DE PAPEL HUMEDO PARA EMPAQUES', '2020-12-12 20:20:46', 1, 1, 1),
(2006, 'images/egresoscaja/99608WhatsApp Image 2020-12-12 at 8.25.01 PM.jpeg', 'Caja Sistema', '2020-12-10', 57, 55, 55, '', 0, 0, 1060000, 'CAJA MENOR PEAJES', '2020-12-12 20:22:42', 1, 1, 1),
(2007, 'images/egresoscaja/7127WhatsApp Image 2020-12-12 at 7.45.25 PM (2).jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'RODOLFO DIAZ HOYOS', 4, 21, 50000, 'ANTICIPO DE NOMINA', '2020-12-12 20:27:48', 1, 1, 1),
(2008, 'images/egresoscaja/347WhatsApp Image 2020-12-12 at 8.31.57 PM.jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'REPOSTERIA Y CONFITERIA LA MEJOR', 4, 17, 23900, 'COMPRA VASOS DESECHABLES, SERVILLETAS Y GOLOSINAS', '2020-12-12 20:29:47', 1, 1, 1),
(2009, 'images/egresoscaja/10230WhatsApp Image 2020-12-12 at 7.45.26 PM (3).jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'MUNDO PI?ATA Y VARIEDADES G.C.E', 4, 17, 31750, 'DECORACION PARA CUMPLEA?OS KATIA MARCELA', '2020-12-12 20:34:08', 1, 1, 1),
(2010, 'images/egresoscaja/84419WhatsApp Image 2020-12-12 at 7.45.24 PM.jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'LA CASA DEL MEDICO S.A.S.', 4, 23, 18500, 'TAPABOCAS MEDICO x 50 UNIDADES', '2020-12-12 20:36:05', 1, 1, 1),
(2011, 'images/egresoscaja/27477WhatsApp Image 2020-12-12 at 7.45.26 PM.jpeg', 'Beneficiario Externo', '2020-12-11', 57, 0, 0, 'BANCOLOMBIA', 1, 33, 9520, 'IMPUESTO GOBIERNO 4*1000', '2020-12-12 20:38:37', 1, 1, 1),
(2012, 'images/egresoscaja/36449WhatsApp Image 2020-12-12 at 7.45.26 PM (4).jpeg', 'Beneficiario Externo', '2020-12-11', 57, 0, 0, 'SUPER TIENDA TIERRA DE GOSEN', 4, 17, 10400, 'COMPRA DE CAFE Y AZUCAR', '2020-12-12 20:41:07', 1, 1, 1),
(2013, 'images/egresoscaja/63254WhatsApp Image 2020-12-12 at 7.45.25 PM.jpeg', 'Beneficiario Externo', '2020-12-11', 57, 0, 0, 'SUPER TIENDA TIERRA DE GOSEN', 4, 17, 5300, 'COMPRA ACIDO DESMANCHADOR PARA BA?O Y RECIBOS CAJA MENOR', '2020-12-12 20:47:11', 1, 1, 1),
(2014, 'images/egresoscaja/22171WhatsApp Image 2020-12-12 at 7.45.27 PM.jpeg', 'Beneficiario Externo', '2020-12-11', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE TAX 712 PARA ENTREGAR TRITURADO 1&quot; REMISION 9373', '2020-12-12 20:49:49', 1, 1, 1),
(2015, 'images/egresoscaja/72238WhatsApp Image 2020-12-12 at 7.45.27 PM (1).jpeg', 'Beneficiario Externo', '2020-12-11', 57, 0, 0, 'RESTAURANTE POPULAR', 4, 17, 120000, 'ALMUERZO EMPLEADOS ADMINISTRATIVOS', '2020-12-12 20:56:29', 1, 1, 1),
(2016, 'images/egresoscaja/29126WhatsApp Image 2020-12-12 at 7.45.27 PM (4).jpeg', 'Caja Sistema', '2020-12-11', 57, 55, 55, '', 0, 0, 2180000, 'CAJA MENOR PEAJES Y REFRIGERANTE', '2020-12-12 21:06:27', 1, 1, 1),
(2017, 'images/egresoscaja/18429WhatsApp Image 2020-12-10 at 6.25.19 PM.jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'COLOMBIA TELECOMUNICACIONES SA ESP', 2, 5, 40000, 'RECARGA CELULAR BASCULA', '2020-12-12 21:17:12', 1, 1, 1),
(2018, 'images/egresoscaja/4981WhatsApp Image 2020-12-14 at 6.05.32 PM.jpeg', 'Caja Sistema', '2020-12-12', 57, 55, 55, '', 0, 0, 200000, 'CAJA MENOR PEAJES', '2020-12-15 08:20:36', 1, 1, 1),
(2019, 'images/egresoscaja/69738WhatsApp Image 2020-12-14 at 6.05.33 PM (2).jpeg', 'Beneficiario Externo', '2020-12-12', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE TAX 712 ENTREGA MATERIAL COVE?AS REMISION 9431', '2020-12-15 08:25:22', 1, 1, 1),
(2020, 'images/egresoscaja/35186WhatsApp Image 2020-12-14 at 6.05.35 PM.jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE TAX 712 REMISION 9444 ENTREGA MATERIAL COVE?AS', '2020-12-15 08:29:42', 1, 1, 1),
(2021, 'images/egresoscaja/66503WhatsApp Image 2020-12-14 at 6.05.34 PM.jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE TAX 712  REMISION 9444 REGRESO ENTREGA MATERIAL COVE?AS', '2020-12-15 08:35:00', 1, 1, 1),
(2022, 'images/egresoscaja/91613WhatsApp Image 2020-12-14 at 6.05.31 PM.jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE TAX 712  REMISION 9464  ENTREGA MATERIAL COVE?AS', '2020-12-15 08:44:02', 1, 1, 1),
(2023, 'images/egresoscaja/46181WhatsApp Image 2020-12-14 at 6.05.34 PM (2).jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE TAX 712  REMISION 9464 REGRESO ENTREGA MATERIAL COVE?AS', '2020-12-15 08:46:58', 1, 1, 1),
(2024, 'images/egresoscaja/62288WhatsApp Image 2020-12-14 at 6.05.31 PM (1).jpeg', 'Beneficiario Externo', '2020-12-14', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE TAX 712  REMISION 9507  ENTREGA MATERIAL COVE?AS', '2020-12-15 08:49:06', 1, 1, 1),
(2025, 'images/egresoscaja/22994WhatsApp Image 2020-12-14 at 6.05.34 PM (1).jpeg', 'Beneficiario Externo', '2020-12-14', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE TAX 712  REMISION 9507 REGRESO ENTREGA MATERIAL COVE?AS', '2020-12-15 08:51:21', 1, 1, 1),
(2026, 'images/egresoscaja/18091WhatsApp Image 2020-12-14 at 6.05.32 PM (2).jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE UQE 066  REMISION 9443 ENTREGA MATERIAL COVE?AS', '2020-12-15 08:52:36', 1, 1, 1),
(2027, 'images/egresoscaja/89012WhatsApp Image 2020-12-14 at 6.05.32 PM (1).jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE UQE 066  REMISION 9443 REGRESO ENTREGA MATERIAL COVE?AS', '2020-12-15 08:54:45', 1, 1, 1),
(2028, 'images/egresoscaja/39678WhatsApp Image 2020-12-14 at 6.05.33 PM.jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE UQE 066  REMISION 9463 ENTREGA MATERIAL COVE?AS', '2020-12-15 08:56:02', 1, 1, 1),
(2029, 'images/egresoscaja/65544WhatsApp Image 2020-12-14 at 6.05.32 PM (3).jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'CONCESION RUTA AL MAR - 10134', 2, 7, 20200, 'PEAJE DOBLE TROQUE UQE 066  REMISION 9463 REGRESO ENTREGA MATERIAL COVE?AS', '2020-12-15 08:57:42', 1, 1, 1),
(2030, 'images/egresoscaja/30779WhatsApp Image 2020-12-14 at 6.05.33 PM (1).jpeg', 'Beneficiario Externo', '2020-12-14', 57, 0, 0, 'C.C- CARIBE S.A.S.', 5, 30, 5000, 'GASOLINA PARA EL LABORATORIO DE ASFALTO', '2020-12-15 08:59:43', 1, 1, 1),
(2031, 'images/egresoscaja/38409WhatsApp Image 2020-12-14 at 6.21.05 PM.jpeg', 'Beneficiario Externo', '2020-12-14', 57, 0, 0, 'PA CONCESION VIAL CORDOBA-SUCRE', 2, 7, 17000, 'PEAJE IDA Y REGRESO A SINCELEJO CAMIONETA RLL 367 COMPRA DE GRAPAS PARA LA CLASIFICADORA', '2020-12-15 09:19:44', 1, 1, 1),
(2032, 'images/egresoscaja/42698WhatsApp Image 2020-12-15 at 9.18.26 AM.jpeg', 'Caja Sistema', '2020-12-14', 57, 55, 55, '', 0, 0, 1013000, 'CAJA MENOR PEAJES', '2020-12-15 09:31:07', 1, 1, 1),
(2033, 'images/egresoscaja/29366WhatsApp Image 2020-12-15 at 9.18.39 AM.jpeg', 'Beneficiario Externo', '2020-12-15', 57, 0, 0, 'LA BODEGA - OSCAR GARCIA TABARES', 4, 17, 10500, 'BOTELLON DE AGUA', '2020-12-15 09:33:53', 1, 1, 1),
(2034, 'images/egresoscaja/40591WhatsApp Image 2020-12-15 at 10.16.29 AM.jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'BANCOLOMBIA', 1, 33, 1200, 'IMPUESTO GOBIERNO 4*1000', '2020-12-15 10:05:57', 1, 1, 1),
(2035, 'images/egresoscaja/58847WhatsApp Image 2020-12-15 at 10.03.23 AM.jpeg', 'Beneficiario Externo', '2020-12-14', 57, 0, 0, 'BANCOLOMBIA', 1, 33, 8400, 'IMPUESTO GOBIERNO 4*1000', '2020-12-15 10:19:40', 1, 1, 1),
(2036, 'images/egresoscaja/25271WhatsApp Image 2020-12-15 at 10.16.42 AM.jpeg', 'Beneficiario Externo', '2020-12-15', 57, 0, 0, 'JORGE REVUELTA', 4, 17, 7500, 'COMPRA PAQUETE VASOS $1.700 + PAPEL HIGIENICO $2.000 + FABULOSO $3.800', '2020-12-15 10:20:55', 1, 1, 1),
(2037, 'images/egresoscaja/20072WhatsApp Image 2020-12-16 at 6.51.47 AM.jpeg', 'Beneficiario Externo', '2020-12-03', 57, 0, 0, 'ANTONI ACOSTA', 4, 23, 30000, 'PASAJE CITA MEDICA', '2020-12-16 06:54:22', 1, 1, 1),
(2038, 'images/egresoscaja/70367WhatsApp Image 2020-12-16 at 6.51.48 AM.jpeg', 'Beneficiario Externo', '2020-12-14', 57, 0, 0, 'ANTONI ACOSTA', 4, 23, 30000, 'PASAJES CITA MEDICA', '2020-12-16 07:06:10', 1, 1, 1),
(2039, 'images/egresoscaja/29985WhatsApp Image 2020-12-16 at 6.51.48 AM (3).jpeg', 'Beneficiario Externo', '2020-12-15', 57, 0, 0, 'SUPER TIENDA TIERRA DE GOSEN', 4, 17, 8400, 'CAJA DE BOLIGRAFOS', '2020-12-16 07:07:41', 1, 1, 1),
(2040, 'images/egresoscaja/11041WhatsApp Image 2020-12-16 at 6.51.48 AM (2).jpeg', 'Beneficiario Externo', '2020-12-15', 57, 0, 0, 'LA TIENDA DEL CELULAR YOHNPIXELL', 4, 17, 20000, 'COMPRA MAUSE PARA THALIA RINCON', '2020-12-16 07:09:20', 1, 1, 1),
(2041, 'images/egresoscaja/77064WhatsApp Image 2020-12-14 at 6.05.32 PM.jpeg', 'Caja Sistema', '2020-12-15', 57, 55, 55, '', 0, 0, 1057000, 'CAJA MENOR PEAJES', '2020-12-16 07:11:52', 1, 1, 1),
(2042, 'images/egresoscaja/49376WhatsApp Image 2020-12-16 at 6.51.48 AM (1).jpeg', 'Beneficiario Externo', '2020-12-16', 57, 0, 0, 'ANTONI ACOSTA', 4, 23, 30000, 'PASAJES CITA MEDICA', '2020-12-16 07:13:04', 1, 1, 1),
(2043, 'images/egresoscaja/9121WhatsApp Image 2020-12-16 at 8.53.51 PM.jpeg', 'Caja Sistema', '2020-12-16', 57, 55, 55, '', 0, 0, 590000, 'CAJA MENOR PEAJES', '2020-12-16 20:43:38', 1, 1, 1),
(2044, 'images/egresoscaja/61944WhatsApp Image 2020-12-16 at 8.56.17 PM.jpeg', 'Caja Sistema', '2020-12-16', 57, 55, 55, '', 0, 0, 234000, 'CAJA MENOR PEAJES', '2020-12-16 21:08:09', 1, 1, 1),
(2045, 'images/egresoscaja/89303WhatsApp Image 2020-12-16 at 8.58.09 PM.jpeg', 'Caja Sistema', '2020-12-16', 57, 55, 55, '', 0, 0, 450000, 'CAJA MENOR PEAJES', '2020-12-16 21:09:24', 1, 1, 1),
(2046, 'images/egresoscaja/3248716084686772915308849996468532296.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Sergio Bola?o', 3, 16, 20000, 'Pago de almuerzo y polic?as por el viaje a luruaco GDY539', '2020-12-20 07:51:16', 1, 1, 1),
(2047, 'images/egresoscaja/9356616084689369477169860214273142631.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 593300, 'Pago peajes de volquetas', '2020-12-20 07:55:36', 1, 1, 1),
(2048, 'images/egresoscaja/8943016084692020386297754239837907062.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 517400, 'Pago peajes de volquetas', '2020-12-20 07:59:58', 1, 1, 1),
(2049, 'images/egresoscaja/585716084692956597271575575448378966.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 552900, 'Pago peajes de volquetas', '2020-12-20 08:01:33', 1, 1, 1),
(2050, 'images/egresoscaja/6494516084693745223554970358766335386.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 477600, 'Pago peajes de volquetas', '2020-12-20 08:02:52', 1, 1, 1),
(2051, 'images/egresoscaja/4148916084694514398299807023435530651.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 593300, 'Pago peajes de volquetas', '2020-12-20 08:04:09', 1, 1, 1),
(2052, 'images/egresoscaja/656451608469538429679513857870510593.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Luis Mar?n', 2, 7, 10000, 'Pgo almuerzo viaje luruaco GDY538', '2020-12-20 08:05:34', 1, 1, 1),
(2053, 'images/egresoscaja/3673216085163778666786421751635726464.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Luis marin', 2, 7, 20000, 'Pago de b?scula movil en Arroyo de piedra GDY538', '2020-12-20 21:06:17', 1, 1, 1),
(2054, 'images/egresoscaja/9380116085164804651154808017016011512.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Thalia rincon', 2, 7, 20000, 'Pago de taxi para ir a la oficina en sincelejo', '2020-12-20 21:08:00', 1, 1, 1),
(2055, 'images/egresoscaja/3926316085165636501479979293164803722.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Cesar gomez', 4, 21, 40000, 'Anticip? n?mina  GDY531', '2020-12-20 21:09:23', 1, 1, 1),
(2056, 'images/egresoscaja/9729916085168672823236963462307465340.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Ricardo peralta', 2, 7, 10000, 'Pago de almuerzo por viaje a luruaco UQE066', '2020-12-20 21:14:26', 1, 1, 1),
(2057, 'images/egresoscaja/1768816085170323581164824682363307967.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Elicer jacome', 2, 7, 10000, 'Pago de almuerzo por viaje a luruaco STR997', '2020-12-20 21:17:11', 1, 1, 1),
(2058, 'images/egresoscaja/1406416085171377302492558317022018630.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Jhon Freddy', 2, 7, 10000, 'Pago de almuerzo al conductor por viaje a luruaco UQE070', '2020-12-20 21:18:57', 1, 1, 1),
(2059, 'images/egresoscaja/4888116085172614988626753821712674740.jpg', 'Beneficiario Externo', '2020-12-14', 55, 0, 0, 'Jhon Freddy', 3, 16, 10000, 'Pago polic?as luruaco UQE070', '2020-12-20 21:20:59', 1, 1, 1),
(2060, 'images/egresoscaja/2144216085179444575314396620315154540.jpg', 'Beneficiario Externo', '2020-12-03', 55, 0, 0, 'Jhon Freddy', 2, 7, 30000, 'Pago vi?ticos para llevar veh?culo a la kenworth WOX133', '2020-12-20 21:32:23', 1, 1, 1),
(2061, 'images/egresoscaja/94301608518528719289045679849994595.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'B?scula', 3, 16, 280000, 'Pago de b?scula movil,  luruaco por 14 carros', '2020-12-20 21:40:18', 1, 1, 1),
(2062, 'images/egresoscaja/712316085188017676612705026224697302.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Ricardo peralta', 2, 7, 10000, 'Pago almuerzo al conductor UQE066 por viaje a luruaco', '2020-12-20 21:46:39', 1, 1, 1),
(2063, 'images/egresoscaja/6732616085190170248094538710887043348.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Elicer', 2, 7, 10000, 'Pago almuerzo viaje luruaco STR997', '2020-12-20 21:50:07', 1, 1, 1),
(2064, 'images/egresoscaja/6857016085191151203382956073700858224.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Guillermo', 2, 7, 10000, 'Pago almuerzo por viaje a luruaco UQE126', '2020-12-20 21:51:42', 1, 1, 1),
(2065, 'images/egresoscaja/4543116085192205961441752742440844221.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Jhon Freddy', 2, 7, 10000, 'Pago de almuerzo al conductor por viaje luruaco UQE070', '2020-12-20 21:53:39', 1, 1, 1),
(2066, 'images/egresoscaja/1279916085194167823692635382646240151.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Fidel Castro', 2, 7, 10000, 'Pago almuerzo viaje luruaco SNY617', '2020-12-20 21:56:55', 1, 1, 1),
(2067, 'images/egresoscaja/251616085195185172377114758529355156.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Sergio Bola?o', 2, 7, 10000, 'Pago almuerzo viaje luruaco', '2020-12-20 21:58:37', 1, 1, 1),
(2068, 'images/egresoscaja/5706216085196345295738306170513123885.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Richard', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY537', '2020-12-20 22:00:33', 1, 1, 1),
(2069, 'images/egresoscaja/6454616085201556432538111297470679599.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Luis marin', 2, 7, 10000, 'Pago almuerzo viaje luruaco HADY538', '2020-12-20 22:09:14', 1, 1, 1),
(2070, 'images/egresoscaja/8694816085202237334183968694875829938.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Jorge Ochoa', 0, 0, 10000, 'Pago almuerzo viaje luruaco UQT26', '2020-12-20 22:10:22', 1, 1, 1),
(2071, 'images/egresoscaja/9093416085456409238819305200957628682.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Jorge ochoa', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY534', '2020-12-21 05:14:00', 1, 1, 1),
(2072, 'images/egresoscaja/9900716085457853261675364574215398901.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Guido elicer', 2, 7, 10000, 'Pago almuerzo por viaje a luruaco GDY533', '2020-12-21 05:16:25', 1, 1, 1),
(2073, 'images/egresoscaja/3395516085458730041950976750609670820.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Jos? simahan', 2, 7, 10000, 'Pago almuerzo por viaje a luruaco GDY532', '2020-12-21 05:17:53', 1, 1, 1),
(2074, 'images/egresoscaja/6164116085459512748061045920326897607.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Osvaldo sampayo', 2, 7, 10000, 'Pago almuerzo por viaje a luruaco GDY167', '2020-12-21 05:19:11', 1, 1, 1),
(2075, 'images/egresoscaja/6306716085479779077337690230931900648.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Harbey', 2, 7, 10000, 'Pago almuerzo por viaje a luruaco GDY536', '2020-12-21 05:52:57', 1, 1, 1),
(2076, 'images/egresoscaja/403WhatsApp Image 2020-12-20 at 8.55.24 PM.jpeg', 'Beneficiario Externo', '2020-12-14', 57, 0, 0, 'TALLER Y LLANTERIA TOLUVIEJO', 3, 13, 10000, 'ARREGLO DE LLANTA Y CAMBIO DE CAUCHO DOBLE TROQUE TAX 712', '2020-12-21 05:51:35', 1, 1, 1),
(2077, 'images/egresoscaja/28686WhatsApp Image 2020-12-17 at 4.51.18 PM.jpeg', 'Beneficiario Externo', '2020-12-17', 57, 0, 0, 'COLOMBIA TELECOMUNICACIONES SA ESP', 2, 5, 40000, 'RECARGA CELULAR BASCULA', '2020-12-21 05:55:26', 1, 1, 1),
(2078, 'images/egresoscaja/82672WhatsApp Image 2020-12-20 at 8.54.52 PM (1).jpeg', 'Beneficiario Externo', '2020-12-17', 57, 0, 0, 'BOLSAS PIZARRO', 4, 17, 7500, '5 BOLSAS PLASTICAS PARA PUBLICAR', '2020-12-21 05:57:50', 1, 1, 1),
(2079, 'images/egresoscaja/91736WhatsApp Image 2020-12-20 at 8.54.52 PM (2).jpeg', 'Beneficiario Externo', '2020-12-17', 57, 0, 0, 'KATIA ALVAREZ', 4, 17, 10000, 'REFRESCO MERIENDA', '2020-12-21 05:59:46', 1, 1, 1),
(2080, 'images/egresoscaja/60727WhatsApp Image 2020-12-20 at 8.54.52 PM.jpeg', 'Beneficiario Externo', '2020-12-17', 57, 0, 0, 'COMERCIAL TOLUVIEJO', 3, 15, 3600, 'ABRAZADERA 4 UNIDADES', '2020-12-21 06:01:25', 1, 1, 1),
(2081, 'images/egresoscaja/63646WhatsApp Image 2020-12-20 at 8.55.25 PM.jpeg', 'Beneficiario Externo', '2020-12-16', 57, 0, 0, 'BANCOLOMBIA', 1, 33, 2390, 'IMPUESTO GOBIERNO 4*1000', '2020-12-21 06:03:11', 1, 1, 1),
(2082, 'images/egresoscaja/94060WhatsApp Image 2020-12-20 at 8.55.22 PM (2).jpeg', 'Beneficiario Externo', '2020-12-17', 57, 0, 0, 'BANCOLOMBIA', 1, 33, 12520, 'IMPUESTO GOBIERNO 4*1000', '2020-12-21 06:05:24', 1, 1, 1),
(2083, 'images/egresoscaja/65477WhatsApp Image 2020-12-20 at 8.55.24 PM (4).jpeg', 'Caja Sistema', '2020-12-17', 57, 55, 55, '', 0, 0, 940000, 'CAJA MENOR PEAJES', '2020-12-21 06:07:40', 1, 1, 1),
(2084, 'images/egresoscaja/89367WhatsApp Image 2020-12-20 at 8.55.24 PM (2).jpeg', 'Caja Sistema', '2020-12-18', 57, 55, 55, '', 0, 0, 1340000, 'CAJA MENOR PEAJES', '2020-12-21 06:09:41', 1, 1, 1),
(2085, 'images/egresoscaja/12933WhatsApp Image 2020-12-20 at 8.55.22 PM (1).jpeg', 'Beneficiario Externo', '2020-12-17', 57, 0, 0, 'TALLER Y LLANTERIA TOLUVIEJO', 3, 13, 160000, 'TRABAJO AL DOBLE TROQUE SZK 951 PERNOS RACHI Y PASADOR', '2020-12-21 06:12:06', 1, 1, 1),
(2086, 'images/egresoscaja/31354WhatsApp Image 2020-12-20 at 8.55.24 PM (1).jpeg', 'Beneficiario Externo', '2020-12-18', 57, 0, 0, 'BANCOLOMBIA', 1, 33, 5120, 'IMPUESTO GOBIERNO 4*1000', '2020-12-21 06:14:12', 1, 1, 1),
(2087, 'images/egresoscaja/30781WhatsApp Image 2020-12-20 at 8.55.23 PM.jpeg', 'Beneficiario Externo', '2020-12-17', 57, 0, 0, 'TALLER Y LLANTERIA TOLUVIEJO', 3, 13, 40000, 'ARREGLO DE LLANTA Y CAMBIO DE CAUCHO DOBLE TROQUE TAX 712', '2020-12-21 06:18:20', 1, 1, 1),
(2088, 'images/egresoscaja/5619WhatsApp Image 2020-12-20 at 8.55.23 PM (1).jpeg', 'Beneficiario Externo', '2020-12-18', 57, 0, 0, 'PA CONCESION VIAL CORDOBA-SUCRE', 2, 7, 17000, 'PEAJE IDA Y REGRESO A SINCELEJO CAMIONETA RLL 367 LLEVAR FACTURACION Y TRAMITES CAJA DE COMPENSACION FAMILIAR', '2020-12-21 06:22:54', 1, 1, 1),
(2089, 'images/egresoscaja/87645WhatsApp Image 2020-12-20 at 8.55.23 PM (2).jpeg', 'Beneficiario Externo', '2020-12-18', 57, 0, 0, 'DOTACIONES EL GUERRERO/ YURY OROZCO LOPEZ', 4, 23, 500000, 'ABONO DOTACION TRABAJADORES', '2020-12-21 06:24:47', 1, 1, 1),
(2090, 'images/egresoscaja/54087WhatsApp Image 2020-12-20  1.jpeg', 'Beneficiario Externo', '2020-12-18', 57, 0, 0, 'VARIEDADES NISSI', 4, 17, 26000, 'COMPRA RESMA PAPEL TAMA?O CARTA Y OFICIO', '2020-12-21 06:26:25', 1, 1, 1),
(2091, 'images/egresoscaja/9177WhatsApp Image 2020-12-20 at 8.55.22 PM.jpeg', 'Beneficiario Externo', '2020-12-18', 57, 0, 0, 'ENDER CAMACHO', 4, 17, 32000, '4 ALMUERZOS TRABAJADORES PLANTA ASFALTO (DOBLE TURNO)', '2020-12-21 06:28:36', 1, 1, 1),
(2092, 'images/egresoscaja/4048416085621437286832669119689878353.jpg', 'Beneficiario Externo', '2020-12-03', 55, 0, 0, 'Restaurante Kelly johana', 2, 7, 12000, 'Pago almuerzo al conductor por llevar veh?culo a la kenworth WOX133', '2020-12-21 09:49:02', 1, 1, 1),
(2093, 'images/egresoscaja/681516085623625349010361856310625030.jpg', 'Beneficiario Externo', '2020-12-15', 55, 0, 0, 'Cesar gomez', 2, 7, 10000, 'Pago almuerzo viaje a luruaco GDY531', '2020-12-21 09:52:41', 1, 1, 1),
(2094, 'images/egresoscaja/947611608562422108460985557165775463.jpg', 'Beneficiario Externo', '2020-12-15', 55, 0, 0, 'Cesar gomez', 3, 16, 20000, 'Pago de b?scula movil viaje luruaco GDY531', '2020-12-21 09:53:41', 1, 1, 1),
(2095, 'images/egresoscaja/7900116085625759567238265156425797736.jpg', 'Beneficiario Externo', '2020-12-15', 55, 0, 0, 'Jos? simahan', 3, 16, 20000, 'Pago de b?scula movil luruaco GDY532', '2020-12-21 09:56:14', 1, 1, 1),
(2096, 'images/egresoscaja/1801216085626573046666192243208889101.jpg', 'Beneficiario Externo', '2020-12-15', 55, 0, 0, 'Jos? simahan', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY532', '2020-12-21 09:57:33', 1, 1, 1),
(2097, 'images/egresoscaja/5250816085628293707385890615675398002.jpg', 'Beneficiario Externo', '2020-12-15', 55, 0, 0, 'Elicer jacome', 2, 7, 10000, 'Pago almuerzo por viaje a luruaco STR997', '2020-12-21 10:00:28', 1, 1, 1),
(2098, 'images/egresoscaja/9267516085628830438112751448007315411.jpg', 'Beneficiario Externo', '2020-12-15', 55, 0, 0, 'Sergio Bola?o', 2, 7, 10000, 'Pago almuerzo por viaje a luruaco GDY539', '2020-12-21 10:01:22', 1, 1, 1),
(2099, 'images/egresoscaja/7305316085629425677688124554724522967.jpg', 'Beneficiario Externo', '2020-12-15', 55, 0, 0, 'Sergio Bola?o', 3, 16, 20000, 'Pago b?scula movil luruaco GDY539', '2020-12-21 10:02:22', 1, 1, 1),
(2100, 'images/egresoscaja/3826216085630789006451229659740889370.jpg', 'Beneficiario Externo', '2020-12-15', 55, 0, 0, 'Osvaldo sampayo', 3, 13, 50000, 'Pago de alquiler de maquinaria para desvarar a la GDY167', '2020-12-21 10:04:37', 1, 1, 1),
(2101, 'images/egresoscaja/7491916085632397608560306442932508132.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'Llanteria aire puro', 3, 13, 10000, 'Calibre de llanta GDY167', '2020-12-21 10:07:18', 1, 1, 1),
(2102, 'images/egresoscaja/8276316085633060442454199411670466623.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Thalia rincon', 2, 7, 5000, 'Pago combustible para retirar peajes', '2020-12-21 10:08:25', 1, 1, 1),
(2103, 'images/egresoscaja/5973716085633857262118280156252602015.jpg', 'Beneficiario Externo', '2020-12-12', 55, 0, 0, 'E.D.S el viso', 3, 10, 60000, 'Pago combustible GDY539 viaje luruaco', '2020-12-21 10:09:42', 1, 1, 1),
(2104, 'images/egresoscaja/6859616085634416843834108555124580169.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Taller de mec?nica hermanos villalba', 3, 12, 240000, 'Compra refrigerantes GDY531', '2020-12-21 10:10:41', 1, 1, 1),
(2105, 'images/egresoscaja/96049WhatsApp Image 2020-12-21.jpeg', 'Beneficiario Externo', '2020-12-19', 57, 0, 0, 'CRISTOBAL DANIEL MERCADO R.', 4, 17, 16100, 'COMPRA DE CAFE Y AZUCAR', '2020-12-21 10:06:26', 1, 1, 1),
(2106, 'images/egresoscaja/8518316085635014475883172397304900030.jpg', 'Beneficiario Externo', '2020-12-13', 55, 0, 0, 'El amanecedero', 3, 15, 150000, 'Compra de 10 esp?rragos', '2020-12-21 10:11:40', 1, 1, 1),
(2107, 'images/egresoscaja/17752WhatsApp Image 2020-12-20 at 8.55.24 PM (3).jpeg', 'Caja Sistema', '2020-12-19', 57, 55, 55, '', 0, 0, 1000000, 'CAJA MENOR PEAJES', '2020-12-21 10:12:21', 1, 1, 1),
(2108, 'images/egresoscaja/85475WhatsApp Image 2020-12-20.jpeg', 'Beneficiario Externo', '2020-12-13', 57, 0, 0, 'PANADERIA TOLUVIEJO CENTRO', 4, 17, 13000, 'BOTELLON DE AGUA PARA LA OFICINA', '2020-12-21 10:13:59', 1, 1, 1),
(2109, 'images/egresoscaja/77589WhatsApp Image 2020-12-21 at 9.34.49 AM.jpeg', 'Beneficiario Externo', '2020-12-19', 57, 0, 0, 'C.C- CARIBE S.A.S.', 2, 36, 5000, 'GASOLINA MOTO PARA HACER VUELTAS EN TOLUVIEJO DE OBINCO', '2020-12-21 10:15:39', 1, 1, 1),
(2110, 'images/egresoscaja/3731716085638074888865102400118137126.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 438600, 'Pago peajes de volquetas', '2020-12-21 10:16:39', 1, 1, 1),
(2111, 'images/egresoscaja/5660816085639434742529447388375787356.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 497500, 'Pago peajes de volquetas', '2020-12-21 10:19:02', 1, 1, 1),
(2112, 'images/egresoscaja/13594WhatsApp Image 2020-12-21 at 9.34.48 AM (1).jpeg', 'Beneficiario Externo', '2020-12-19', 57, 0, 0, 'TALLER Y LLANTERIA TOLUVIEJO', 3, 13, 30000, 'ARREGLO LLANTA DOBLE TROQUE TAX 712', '2020-12-21 10:17:59', 1, 1, 1),
(2113, 'images/egresoscaja/3504616085639982767342058744643604059.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 124600, 'Pago peajes de volquetas', '2020-12-21 10:19:57', 1, 1, 1),
(2114, 'images/egresoscaja/79602WhatsApp Image 2020-12-21 at 9.34.49 AM (2).jpeg', 'Beneficiario Externo', '2020-12-19', 57, 0, 0, 'ROSA MARIA ANAYA', 4, 17, 133400, 'COMPRA 58 BOLSAS DE AGUA A $2.300 PARA LOS TRABAJADORES (2 AL 19 DICIEMBRE/2020)', '2020-12-21 10:21:07', 1, 1, 1),
(2115, 'images/egresoscaja/7061116085644244817198537116504928274.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 535100, 'Pago peajes de volquetas', '2020-12-21 10:27:03', 1, 1, 1),
(2116, 'images/egresoscaja/55664WhatsApp Image 2020-12-21 at 9.34.49 AM (1).jpeg', 'Beneficiario Externo', '2020-12-21', 57, 0, 0, 'SUPER TIENDA TIERRA DE GOSEN', 4, 17, 6400, 'COMPRA DE COMPROBANTES DE CAJA MENOR Y EGRESOS', '2020-12-21 10:27:21', 1, 1, 1),
(2117, 'images/egresoscaja/9034316085645291874207279799839988552.jpg', 'Beneficiario Externo', '2020-12-02', 55, 0, 0, 'Taller de mec?nica hermanos villalba', 3, 12, 60000, 'Compra de refrigerantes GDY531', '2020-12-21 10:28:48', 1, 1, 1),
(2118, 'images/egresoscaja/5294116085645898274618725061296944877.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'E.D.S el viso', 3, 10, 60000, 'Pago combustible por viaje luruaco GDY67', '2020-12-21 10:29:48', 1, 1, 1),
(2119, 'images/egresoscaja/4371916085648100112160299355468181314.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Thalia rincon', 3, 16, 240000, 'Pago de b?scula movil luruaco por 12  carros', '2020-12-21 10:33:28', 1, 1, 1),
(2120, 'images/egresoscaja/4546516085650220568230060378137728178.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Harbey', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY536', '2020-12-21 10:37:01', 1, 1, 1),
(2121, 'images/egresoscaja/5555716085650790467842196044337622590.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Juan Baleta', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY535', '2020-12-21 10:37:54', 1, 1, 1),
(2122, 'images/egresoscaja/59671WhatsApp Image 2020-12-21 at 10.36.46 AM.jpeg', 'Beneficiario Externo', '2020-12-21', 57, 0, 0, 'BANCOLOMBIA', 1, 33, 3040, 'IMPUESTO GOBIERNO 4*1000', '2020-12-21 10:31:20', 1, 1, 1),
(2123, 'images/egresoscaja/2887316085651197985707256315327002071.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Jorge ochoa', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY534', '2020-12-21 10:38:38', 1, 1, 1),
(2124, 'images/egresoscaja/8536916085651651315459143129790832258.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Guido elicer', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY532', '2020-12-21 10:39:23', 1, 1, 1),
(2125, 'images/egresoscaja/1169116085652083313072046712737791101.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Carlos Jos? simahan', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY533', '2020-12-21 10:40:06', 1, 1, 1),
(2126, 'images/egresoscaja/58360WhatsApp Image 2020-12-21 at 9.34.48 AM.jpeg', 'Beneficiario Externo', '2020-12-21', 57, 0, 0, 'LUIS NOVOA', 4, 21, 384102, 'SALARIO DEL 22 AL 30 NOVIEMBRE DE 2020', '2020-12-21 10:39:12', 1, 1, 1),
(2127, 'images/egresoscaja/5545416085652642888560837957278792424.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Te?filo vega', 2, 7, 10000, 'Pago almuerzo viaje luruaco UQE126', '2020-12-21 10:40:52', 1, 1, 1),
(2128, 'images/egresoscaja/448991608565331592376579206499390618.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Sampayo', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY167', '2020-12-21 10:42:10', 1, 1, 1),
(2129, 'images/egresoscaja/30411WhatsApp Image 2020-12-21 at 9.34.47 AM.jpeg', 'Beneficiario Externo', '2020-12-21', 57, 0, 0, 'CARLOS OLIVEROS', 4, 21, 383477, 'SALARIO DEL 21 AL 30 DE NOVIEMBRE DE 2020', '2020-12-21 10:41:44', 1, 1, 1),
(2130, 'images/egresoscaja/6892916085653783798388674548071564865.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Elicer jacome', 2, 7, 10000, 'Pago almuerzo viaje luruaco STR997', '2020-12-21 10:42:57', 1, 1, 1),
(2131, 'images/egresoscaja/12210160856551547953284213408409130.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Guille moreno', 2, 7, 10000, 'Pgo almuerzo viaje luruaco GDY539', '2020-12-21 10:44:48', 1, 1, 1),
(2132, 'images/egresoscaja/7211316085655857608499470039468396554.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Fidel castro', 2, 7, 10000, 'Pgo almuerzo viaje luruaco SNY617', '2020-12-21 10:46:25', 1, 1, 1),
(2133, 'images/egresoscaja/3731516085656579126358291567647512067.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Luis marin', 2, 7, 20000, 'Pago almuerzo y b?scula movil luruaco GDY538', '2020-12-21 10:47:37', 1, 1, 1),
(2134, 'images/egresoscaja/1573316085657051031083791874965831999.jpg', 'Beneficiario Externo', '2020-12-11', 55, 0, 0, 'Richard', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY537', '2020-12-21 10:48:25', 1, 1, 1),
(2135, 'images/egresoscaja/5485716085658365295306990480561443590.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Harbey', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY536', '2020-12-21 10:50:36', 1, 1, 1),
(2136, 'images/egresoscaja/4924416085658786686191621252640391865.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Carlos Jos? simahan', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY532', '2020-12-21 10:51:18', 1, 1, 1),
(2137, 'images/egresoscaja/8713816085659517304380082768613755742.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Juan baleta', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY535', '2020-12-21 10:52:30', 1, 1, 1),
(2138, 'images/egresoscaja/1368616085659975782664239091719539479.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Richard', 2, 7, 10000, 'Viaje almuerzo viaje luruaco GDY537', '2020-12-21 10:53:17', 1, 1, 1),
(2139, 'images/egresoscaja/5859916085660482072011996835515853510.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Luis marin', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY538', '2020-12-21 10:54:08', 1, 1, 1),
(2140, 'images/egresoscaja/2012516085661083805432667585334846810.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Sergio Bola?o', 2, 7, 10000, 'Pago almuerzo viaje luruaco GDY539', '2020-12-21 10:55:08', 1, 1, 1),
(2141, 'images/egresoscaja/1436116085662157922300968207068794945.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Elicer jacome', 2, 7, 20000, 'Pago almuerzo y policia  STR997', '2020-12-21 10:56:55', 1, 1, 1),
(2142, 'images/egresoscaja/4023716085670284627058865515124744150.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Carlos Jos? simahan', 3, 16, 20000, 'Abono policia luruaco GDY532', '2020-12-21 11:10:27', 1, 1, 1),
(2143, 'images/egresoscaja/422016085671209017375470954051070368.jpg', 'Beneficiario Externo', '2020-12-10', 55, 0, 0, 'Thalia rincon', 3, 16, 120000, 'Pago b?scula por 6 carros viaje luruaco', '2020-12-21 11:12:00', 1, 1, 1),
(2144, 'images/egresoscaja/24458WhatsApp Image 2020-12-21 at 11.09.27 AM.jpeg', 'Beneficiario Externo', '2020-12-04', 57, 0, 0, 'NAIDA XIOMARA QUI?ONES DELGADO', 4, 0, 500000, 'PRESTAMOS A LOS CONSORCIOS CDI', '2020-12-21 11:11:48', 1, 1, 1),
(2145, 'images/egresoscaja/68991WhatsApp Image 2020-12-21 at 11.04.13 AM.jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'NAIDA XIOMARA QUI?ONES DELGADO', 4, 0, 1000000, 'PRESTAMOS A LOS CONSORCIOS CDI', '2020-12-21 11:15:34', 1, 1, 1),
(2146, 'images/egresoscaja/8725316085676727287032883278571647310.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 79600, 'Pago peajes de volquetas', '2020-12-21 11:21:11', 1, 1, 1),
(2147, 'images/egresoscaja/1430416085678454303118405326889313958.jpg', 'Beneficiario Externo', '2020-12-09', 55, 0, 0, 'Elicer jacome', 2, 7, 10000, 'Pago almuerzo viaje luruaco STR997', '2020-12-21 11:24:04', 1, 1, 1),
(2148, 'images/egresoscaja/6857416085678931643153929506384232531.jpg', 'Beneficiario Externo', '2020-12-09', 55, 0, 0, 'Comercial toluviejo', 3, 15, 4600, 'Tornillo GDY538', '2020-12-21 11:24:52', 1, 1, 1),
(2149, 'images/egresoscaja/915716085679407011162543515395293598.jpg', 'Beneficiario Externo', '2020-11-22', 55, 0, 0, 'Motocar lavadero', 3, 13, 150000, 'Pago de lavada y engrase de carros', '2020-12-21 11:25:40', 1, 1, 1),
(2150, 'images/egresoscaja/2245916085680810057408775635421021913.jpg', 'Beneficiario Externo', '2020-12-09', 55, 0, 0, 'Biddio tapia', 3, 15, 50000, 'Montada de stop GDY537', '2020-12-21 11:28:00', 1, 1, 1),
(2151, 'images/egresoscaja/1089WhatsApp Image 2020-12-17 - 2.jpeg', 'Beneficiario Externo', '2020-12-10', 57, 0, 0, 'MASKETORTAS', 4, 17, 50000, 'COMPRA TORTA CUMPLEA?OS SISO KATIA ALVAREZ', '2020-12-21 11:26:44', 1, 1, 1),
(2152, 'images/egresoscaja/3632116085681372853829997532708671820.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 376300, 'Pago peajes de volquetas', '2020-12-21 11:28:56', 1, 1, 1),
(2153, 'images/egresoscaja/454816085683474586588672029464297307.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 104700, 'Pago peajes de volquetas', '2020-12-21 11:32:25', 1, 1, 1),
(2154, 'images/egresoscaja/711316085684354078614222559811516132.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 496600, 'Pago peajes de volquetas', '2020-12-21 11:33:53', 1, 1, 1),
(2155, 'images/egresoscaja/558021608568509089544480075389175459.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 334600, 'Pago peajes de volquetas', '2020-12-21 11:35:08', 1, 1, 1),
(2156, 'images/egresoscaja/7334916085685601931455245320301699329.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 378400, 'Pago peajes de volquetas', '2020-12-21 11:35:59', 1, 1, 1),
(2157, 'images/egresoscaja/9781516085686320861465749830468539437.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 444300, 'Pago peajes de volquetas', '2020-12-21 11:37:11', 1, 1, 1),
(2158, 'images/egresoscaja/2578316085686887202221839444598703497.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 344200, 'Pago peajes de volquetas', '2020-12-21 11:38:08', 1, 1, 1),
(2159, 'images/egresoscaja/9049716085688264374550640134031946947.jpg', 'Beneficiario Externo', '2020-12-01', 55, 0, 0, 'Peajes', 2, 7, 359500, 'Pago peajes de volquetas', '2020-12-21 11:40:25', 1, 1, 1),
(2160, 'images/egresoscaja/89703WhatsApp Image 2020-12-21 at 6.28.11 PM.jpeg', 'Beneficiario Externo', '2020-12-21', 57, 0, 0, 'PA CONCESION VIAL CORDOBA-SUCRE', 2, 7, 17000, 'PEAJE IDA Y REGRESO A SINCELEJO CAMIONETA RLL 367', '2020-12-22 06:10:40', 1, 1, 1),
(2161, 'images/egresoscaja/36769WhatsApp Image 2020-12-21 at 6.28.10 PM.jpeg', 'Beneficiario Externo', '2020-12-21', 57, 0, 0, 'MUNDO PI?ATA Y VARIEDADES G.C.E', 4, 17, 16000, 'COMPRA 4 VASOS MUGS', '2020-12-22 06:13:20', 1, 1, 1),
(2162, 'images/egresoscaja/22817WhatsApp Image 2020-12-21 at 6.28.11 PM (1).jpeg', 'Beneficiario Externo', '2020-12-21', 57, 0, 0, 'DISTRISUCRE', 3, 12, 66000, 'COMPRA 4 KILOS DE SOLDADURA 7018', '2020-12-22 06:16:05', 1, 1, 1),
(2163, 'images/egresoscaja/99260WhatsApp Image 2020-12-21 at 6.28.10 PM (1).jpeg', 'Beneficiario Externo', '2020-12-21', 57, 0, 0, 'COMERCIAL TOLUVIEJO', 3, 15, 21000, 'COMPRA 30 TORNILLOS 3/8&quot; x 1&quot;', '2020-12-22 06:18:07', 1, 1, 1),
(2164, 'images/egresoscaja/19214contenido-no-disponible.jpg', 'Beneficiario Externo', '2020-10-23', 54, 0, 0, 'FERRETERIA', 5, 29, 700000, 'COMPRA EN FERRETERIA', '2020-12-28 09:32:15', 1, 1, 1),
(2165, 'images/egresoscaja/33513WhatsApp Image 2021-01-07 at 11.30.44 AM.jpeg', 'Beneficiario Externo', '2020-12-22', 57, 0, 0, 'PA CONCESION VIAL CORDOBA-SUCRE', 2, 7, 25500, 'PEAJE CAMIONETA RLL 367 PARA IR A SINCELEJO A BUSCAR A NATALIA HERNANDEZ', '2021-01-07 11:05:23', 1, 1, 1),
(2166, 'images/egresoscaja/90860WhatsApp Image 2021-01-07 at 11.11.21 AM.jpeg', 'Beneficiario Externo', '2020-12-22', 57, 0, 0, 'COMERCIAL TOLUVIEJO', 3, 15, 14000, 'COMPRA 2 BORNES TIPO PESADO PARA PLANTA ELECTRICA', '2021-01-07 11:36:16', 1, 1, 1),
(2167, 'images/egresoscaja/12093WhatsApp Image 2021-01-07 at 11.12.44 AM.jpeg', 'Beneficiario Externo', '2021-01-02', 57, 0, 0, 'AUTO LAVADO LA CANDELARIA', 3, 12, 20000, 'LAVADO DE LA CAMIONETA RLL 367', '2021-01-07 11:41:53', 1, 1, 1),
(2168, 'images/egresoscaja/17734WhatsApp Image 2021-01-11 at 9.51.22 AM (1).jpeg', 'Beneficiario Externo', '2021-01-05', 57, 0, 0, 'PA CONCESION VIAL CORDOBA-SUCRE', 2, 7, 17000, 'PEAJE IDA Y REGRESO A SINCELEJO CAMIONETA RLL 367 LLEVAR REMISIONES Y CAMBIO ACEITE', '2021-01-11 10:15:10', 1, 1, 1),
(2169, 'images/egresoscaja/74187WhatsApp Image 2021-01-11 at 9.51.22 AM (1).jpeg', 'Beneficiario Externo', '2021-01-05', 57, 0, 0, 'PA CONCESION VIAL CORDOBA-SUCRE', 2, 7, 17000, 'PEAJE IDA Y REGRESO A SINCELEJO CAMIONETA RLL 367 LLEVAR REMISIONES Y CAMBIO ACEITE', '2021-01-11 10:15:10', 1, 1, 1),
(2170, 'images/egresoscaja/39415WhatsApp Image 2021-01-11 at 9.51.23 AM (1).jpeg', 'Beneficiario Externo', '2021-01-06', 57, 0, 0, 'PA CONCESION VIAL CORDOBA-SUCRE', 2, 7, 17000, 'PEAJE IDA Y REGRESO A SINCELEJO CAMIONETA RLL 367 DILIGENCIAS INGENIERO FREDY GONZALEZ', '2021-01-11 10:17:43', 1, 1, 1),
(2171, 'images/egresoscaja/92010WhatsApp Image 2021-01-11 at 9.51.24 AM (3).jpeg', 'Beneficiario Externo', '2021-01-06', 57, 0, 0, 'CONSORCIO CDI SUR BOLIVAR', 6, 32, 351800, 'PRESTAMO A LOS CDI PARA PAGO CUOTA CREDITO BANCOLOMBIA', '2021-01-11 10:22:39', 1, 1, 1),
(2172, 'images/egresoscaja/63290WhatsApp Image 2021-01-11 at 9.51.25 AM.jpeg', 'Beneficiario Externo', '2021-01-06', 57, 0, 0, 'SUPER TIENDA TIERRA DE GOSEN', 4, 17, 9900, 'COMPRA CAJA DE LAPICEROS Y PAR BATERIAS PARA EL TERMOMETRO', '2021-01-11 10:27:24', 1, 1, 1),
(2173, 'images/egresoscaja/90961WhatsApp Image 2021-01-11 at 9.51.22 AM (2).jpeg', 'Beneficiario Externo', '2021-01-06', 57, 0, 0, 'LA BODEGA - OSCAR GARCIA TABARES', 4, 17, 10500, 'BOTELLON DE AGUA PARA LA OFICINA', '2021-01-11 10:31:38', 1, 1, 1),
(2174, 'images/egresoscaja/44034WhatsApp Image 2021-01-11 at 9.51.20 AM (1).jpeg', 'Beneficiario Externo', '2021-01-06', 57, 0, 0, 'INTER RAPIDISIMO S.A.', 4, NULL, 20500, 'ENVIO DE BOTAS - DEVOLUCION', '2021-01-11 10:36:12', 1, 1, 1),
(2175, 'images/egresoscaja/37329WhatsApp Image 2021-01-11 at 9.51.20 AM (2).jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'BANCOLOMBIA', 1, NULL, 3190, 'IMPUESTO GOBIERNO 4*1000', '2021-01-11 10:39:47', 1, 1, 1),
(2176, 'images/egresoscaja/16401WhatsApp Image 2021-01-11 at 9.51.21 AM (1).jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'TECTONICO ZOMAC S.A.S.', 5, 29, 170000, 'COMPRA 100 BLOQUES 015 PARA AMPLIAR BA?O', '2021-01-11 10:48:58', 1, 1, 1);
INSERT INTO `egresos_caja` (`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`) VALUES
(2177, 'images/egresoscaja/24673WhatsApp Image 2021-01-11 at 9.51.24 AM (1).jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'PANADERIA TOLUVIEJO CENTRO', 4, 17, 1800, 'COMPRA DE PAQUETE DE VASOS', '2021-01-11 11:11:27', 1, 1, 1),
(2178, 'images/egresoscaja/93055WhatsApp Image 2021-01-11 at 9.51.21 AM (2).jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'FERRO AGRO GM', 5, 29, 10500, 'COMPRA DE CAJAS DE CLAVOS 2 1/2&quot; DE ACERO Y NORMAL PARA TRABAJO DE OFICINA', '2021-01-11 11:13:22', 1, 1, 1),
(2179, 'images/egresoscaja/80747WhatsApp Image 2021-01-11 at 9.51.24 AM (2).jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'FERRO AGRO GM', 5, 29, 100000, 'COMPRA 2 BULTOS DE CEMENTO, VARILLAS 3/8, ALAMBRE, CEPILLO DE ACERO Y FLEXOMETRO', '2021-01-11 11:16:15', 1, 1, 1),
(2180, 'images/egresoscaja/90274WhatsApp Image 2021-01-11 at 9.51.20 AM.jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'FERRO AGRO GM', 5, 29, 300000, 'TANQUE DE 1.000 LITROS PARA LA OFICINA', '2021-01-11 11:18:32', 1, 1, 1),
(2181, 'images/egresoscaja/2612WhatsApp Image 2021-01-11 at 9.51.24 AM.jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'FERRO AGRO GM', 5, 30, 9000, 'COMPRA 3 VARILLA ALUMINIO', '2021-01-11 11:21:34', 1, 1, 1),
(2182, 'images/egresoscaja/16012WhatsApp Image 2021-01-11 at 9.51.23 AM (2).jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'COMERCIAL TOLUVIEJO', 5, 30, 7500, 'COMPRA 20 TUERCAS 5/16  Y VARILLA ROSCADA  5/16 PARA LA CLASIFICADORA', '2021-01-11 11:24:42', 1, 1, 1),
(2183, 'images/egresoscaja/24207WhatsApp Image 2021-01-11 at 9.51.22 AM.jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'KOBA COLOMBIA S.A.S', 4, 17, 6250, 'COMPRA DE PA?O PARA LIMPIAR Y BOLSAS PLASTICAS PARA LA REMISIONES', '2021-01-11 11:27:25', 1, 1, 1),
(2184, 'images/egresoscaja/87168WhatsApp Image 2021-01-11 at 9.51.23 AM.jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'MADERAS Y MUEBLES LA BENDICION DE DIOS', 5, 29, 24000, 'COMPRA 2 TABLAS DE MADERA PARA TRABAJO EN LA OFICINA', '2021-01-11 11:32:42', 1, 1, 1),
(2185, 'images/egresoscaja/91711WhatsApp Image 2021-01-11 at 9.51.21 AM.jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'FERRO AGRO GM', 5, 30, 6000, 'COMPRA 2 VARILLAS DE SOLDADURA DE ALUMINIO', '2021-01-11 11:35:26', 1, 1, 1),
(2186, 'images/egresoscaja/91098WhatsApp Image 2021-01-11 at 11.48.25 AM (4).jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'AGENCIA NACIONAL DE INFRAESTRUCTURA', 2, NULL, 9400, 'PEAJE GARZONES IDA Y REGRESO CAMIONETA RLL 367 REUNION ING. FREDY GONZALEZ', '2021-01-11 12:01:19', 1, 1, 1),
(2187, 'images/egresoscaja/42622WhatsApp Image 2021-01-11 at 11.48.25 AM (3).jpeg', 'Beneficiario Externo', '2021-01-07', 57, 0, 0, 'PA CONCESION VIAL CORDOBA-SUCRE', 2, 7, 17000, 'PEAJE IDA Y REGRESO A SINCELEJO CAMIONETA RLL 367 DILIGENCIAS INGENIERO FREDY GONZALEZ', '2021-01-11 12:01:43', 1, 1, 1),
(2189, 'images/egresoscaja/97303WhatsApp Image 2021-01-11 at 11.48.25 AM (2).jpeg', 'Beneficiario Externo', '2021-01-08', 57, 0, 0, 'KOBA COLOMBIA S.A.S', 4, 17, 4750, 'BOLSA PARA PAPELERA Y VASOS DESECHABLES', '2021-01-11 12:06:40', 1, 1, 1),
(2190, 'images/egresoscaja/5824WhatsApp Image 2021-01-11 at 11.48.25 AM (1).jpeg', 'Beneficiario Externo', '2021-01-08', 57, 0, 0, 'SUPER TIENDA TIERRA DE GOSEN', 4, 17, 19500, 'COMPRA CAF?, CUCHARAS, AZUCAR Y SERVILLETAS', '2021-01-11 12:09:46', 1, 1, 1),
(2191, 'images/egresoscaja/1104WhatsApp Image 2021-01-11 at 11.48.26 AM.jpeg', 'Beneficiario Externo', '2021-01-08', 57, 0, 0, 'JORGE REVUELTA', 4, 17, 11000, 'COMPRA DE SACOS Y PAPEL HIGIENICO', '2021-01-11 12:14:50', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos_cuenta`
--

CREATE TABLE `egresos_cuenta` (
  `id_egreso_cuenta` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipo_egreso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuenta_beneficiada` int(11) NOT NULL,
  `beneficiario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `id_subrubro` int(11) NOT NULL,
  `caja_beneficiada` int(11) NOT NULL,
  `egreso_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cheque_id_cheque` int(11) NOT NULL,
  `valor_egreso` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado_egreso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `egreso_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `fecha_egreso` date NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca_equipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_equipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_trabajo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_equipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `placa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `propietario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_unidad` int(11) NOT NULL,
  `estado_equipo` int(11) NOT NULL,
  `equipo_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `modulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rend_interno` float NOT NULL,
  `unidad_interna` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rend_externo` float NOT NULL,
  `unidad_externa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sn_ver_estadistica` int(11) DEFAULT NULL,
  `gasolina` float NOT NULL,
  `gas` float NOT NULL,
  `acpm` float NOT NULL,
  `transmision` float NOT NULL,
  `hidraulico` float NOT NULL,
  `aceitemotor` float NOT NULL,
  `cantidadllantas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tamano` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `presion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acmotor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accaja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actransmision` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achidraulico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acservo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acgrasa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre_equipo`, `marca_equipo`, `serial_equipo`, `modelo`, `unidad_trabajo`, `tipo_equipo`, `placa`, `propietario`, `valor_unidad`, `estado_equipo`, `equipo_publicado`, `creado_por`, `marca_temporal`, `modulo`, `observaciones`, `rend_interno`, `unidad_interna`, `rend_externo`, `unidad_externa`, `sn_ver_estadistica`, `gasolina`, `gas`, `acpm`, `transmision`, `hidraulico`, `aceitemotor`, `cantidadllantas`, `referencia`, `tamano`, `presion`, `acmotor`, `accaja`, `actransmision`, `achidraulico`, `acservo`, `acgrasa`) VALUES
(688, 'DOBLE TROQUE AAA-123', 'INTERNACIONAL', '3HTWYAH3DN233376', 'S', 'KM', 'Volquetas', 'AAA-123', 'NOMADAS', 0, 0, 1, 1, '2021-01-25 19:45:11', 'Asf', 'ALGUNA', 0, '0', 0, '0', 1, 1, 1, 1, 1, 1, 1, '2', '2', '2', '2', '3', '3', '3', '3', '3', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos`
--

CREATE TABLE `formatos` (
  `id_midocumento` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_funcionario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `tipo_contrato` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_id_cargo` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `funcionario_publicado` int(11) NOT NULL,
  `estado_funcionario` int(11) NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salario` int(11) NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `imagen`, `documento`, `nombre_funcionario`, `fecha_ingreso`, `fecha_salida`, `tipo_contrato`, `cargo_id_cargo`, `observaciones`, `creado_por`, `marca_temporal`, `funcionario_publicado`, `estado_funcionario`, `empresa`, `arl`, `eps`, `salario`, `ciudad`, `direccion`, `celular`, `correo`) VALUES
(4, 'images/usuarios/1989801.jpg', '1231231', 'Funcionario Generico', '2019-03-12', '0000-00-00', 'Indefinido', 3, 'ninguna', 1, '2019-03-12 13:24:28', 1, 1, 'Demo', 'Demo', 'Demo', 0, 'Demo', 'Demo', 'Demo', 'Demo'),
(5, 'images/usuarios/24164default.png', '111111', 'PACHECO', '2019-03-21', '0000-00-00', 'Prestaci??n de Servicios', 2, 'Se ingresa temporalmente', 1, '2019-03-21 13:25:45', 0, 1, '', '', '', 0, '', '', '', ''),
(6, 'images/documentos/20535default.png', '22222', 'JAIRO', '2019-03-21', '0000-00-00', 'Prestaci??n de Servicios', 2, 'TEMPORAL', 1, '2019-03-21 17:25:48', 0, 1, '', '', '', 0, '', '', '', ''),
(7, 'images/documentos/39245imagen_no_disponible.jpg', '3333', 'JESUS', '2019-03-21', '0000-00-00', 'Prestaci??n de Servicios', 2, 'temporal', 1, '2019-03-21 18:27:05', 0, 1, '', '', '', 0, '', '', '', ''),
(8, 'images/documentos/457imagen_no_disponible.jpg', '4444', 'GUILLERMO', '2019-03-01', '0000-00-00', 'Prestaci??n de Servicios', 2, 'INGRSESO TEMPORAL', 1, '2019-03-28 10:26:46', 0, 1, '', '', '', 0, '', '', '', ''),
(9, 'images/documentos/36181imagen_no_disponible.jpg', '90990', 'Oscar Sajona', '2019-03-01', '0000-00-00', 'Prestaci??n de Servicios', 2, 'temporal', 1, '2019-04-01 12:16:45', 0, 1, '', '', '', 0, '', '', '', ''),
(10, 'images/documentos/41766imagen_no_disponible.jpg', '87987', 'Martin Lara', '2019-03-03', '0000-00-00', 'Prestaci??n de Servicios', 2, 'Temporal', 1, '2019-04-02 15:51:54', 0, 1, '', '', '', 0, '', '', '', ''),
(11, 'images/documentos/45031default.png', '897987', 'JOSE CALLA', '2019-03-01', '0000-00-00', 'Prestaci??n de Servicios', 2, 'TEMPORAL', 1, '2019-04-12 13:15:25', 0, 1, '', '', '', 0, '', '', '', ''),
(12, 'images/usuarios/11967default.png', '1111', 'Carlos Sierra', '2019-04-01', '0000-00-00', 'Prestaci??n de Servicios', 2, 'Ninguno', 1, '2019-04-16 07:25:10', 0, 1, '', '', '', 0, '', '', '', ''),
(13, '', '', '', '2069-12-31', '0000-00-00', '', 0, '', 0, '0000-00-00 00:00:00', 0, 0, '', '', '', 0, '', '', '', ''),
(14, '', '2222', 'Dagoberto Pacheco', '2019-04-01', '0000-00-00', 'Prestaci??n de Servicios', 2, 'Ninguna', 1, '2019-04-16 08:28:46', 0, 1, '', '', '', 0, '', '', '', ''),
(15, '', '33333', 'Ever Calle', '2019-04-01', '0000-00-00', 'Prestaci??n de Servicios', 2, 'Ninguno', 1, '2019-04-16 22:20:47', 0, 1, '', '', '', 0, '', '', '', ''),
(16, '', '4444', 'Enrique T', '2019-04-02', '0000-00-00', 'Prestaci??n de Servicios', 2, 'ninguno', 1, '2019-04-16 22:53:34', 0, 1, '', '', '', 0, '', '', '', ''),
(17, '', '5555', 'Willinton', '2019-04-02', '0000-00-00', 'Prestaci??n de Servicios', 2, 'Ninguna', 1, '2019-04-16 23:07:57', 0, 1, '', '', '', 0, '', '', '', ''),
(18, 'images/documentos/46040imagen_no_disponible.jpg', '1234567', 'Ing. Rafael', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 3, 'ok', 1, '2019-06-17 18:24:27', 0, 1, '', '', '', 0, '', '', '', ''),
(19, '', '31231231231', 'Adrian', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 3, 'ok', 1, '2019-06-17 18:26:03', 0, 1, '', '', '', 0, '', '', '', ''),
(20, 'images/documentos/69561default.png', '3173295492', 'Luis Contreras', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 4, 'Creado Temporalmente', 1, '2019-06-19 11:58:46', 0, 1, '', '', '', 0, '', '', '', ''),
(21, 'images/documentos/81925default.png', '3112949468', 'Walter Calles', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 4, 'Creado Temporal', 1, '2019-06-19 13:51:32', 0, 1, '', '', '', 0, '', '', '', ''),
(22, 'images/documentos/59260default.png', '3105440354', 'Carlos Celis', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 4, 'Creado Temporal', 1, '2019-06-19 13:52:25', 0, 1, '', '', '', 0, '', '', '', ''),
(23, 'images/documentos/65180default.png', '3183086810', 'Carlos Hoyos', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 4, 'Creado temporal', 1, '2019-06-19 13:54:02', 0, 1, '', '', '', 0, '', '', '', ''),
(24, 'images/documentos/18458default.png', '09809809', 'Guillermo Moreno', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 4, 'temporal', 1, '2019-06-21 09:27:40', 0, 1, '', '', '', 0, '', '', '', ''),
(25, 'images/documentos/34365default.png', '098230948209384', 'Euclides  Gonzalez', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 4, 'Temporal', 1, '2019-06-21 10:07:48', 0, 1, '', '', '', 0, '', '', '', ''),
(26, 'images/documentos/57707default.png', '09809809809', 'Cristian Sierra', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 4, 'Temporal', 1, '2019-06-21 10:19:29', 0, 1, '', '', '', 0, '', '', '', ''),
(27, 'images/documentos/46740default.png', '3013098908', 'Carlos Diaz', '2019-06-01', '0000-00-00', 'Prestaci?n de Servicios', 2, 'temporal', 1, '2019-06-21 16:33:35', 0, 1, '', '', '', 0, '', '', '', ''),
(28, 'images/documentos/30937default.png', '3103664499', 'Rafael Hernandez', '2019-06-01', '0000-00-00', 'Indefinido', 3, 'Temporal', 1, '2019-06-22 09:50:52', 0, 1, '', '', '', 0, '', '', '', ''),
(29, 'images/documentos/86864default.png', '3008088128', 'Raul Vergara', '2019-06-01', '0000-00-00', 'Indefinido', 3, 'Temporal', 1, '2019-06-22 09:52:15', 0, 1, '', '', '', 0, '', '', '', ''),
(30, 'images/documentos/79497default.png', '84094821', 'JOSE MEZA', '2019-06-01', '0000-00-00', 'Indefinido', 1, 'Temporal', 1, '2019-06-22 10:01:22', 1, 1, 'GRUPO OBINCO', '', '', 0, '', '', '', ''),
(31, 'images/usuarios/98043perfilsofia.jpg', '80761478', 'Fredy Orlando Gonzalez', '2019-06-11', '0000-00-00', 'Indefinido', 13, 'Administracion y coordinacion de las areas encargadas.', 1, '2019-07-01 20:02:17', 1, 1, 'GRUPO OBINCO', 'SURA', 'COMPENSAR', 3000000, 'Bogota', 'KR 77G 60-45 APTO 311', '3166976701', 'teksystem.co@gmail.com'),
(32, 'images/usuarios/89185foto obinco 1.jpeg', '92522066', 'MANUEL SANTIAGO RUIZ MARTINEZ', '2019-06-13', '2019-10-24', 'Indefinido', 9, 'Operador MULA', 5, '2019-07-02 09:10:15', 0, 1, '', 'sura', 'salud total', 1650000, 'coloso', 'CALLE 221B N? 7B - 45', '3108980073', ''),
(33, 'images/usuarios/76485FOTO WILMIRO ACEVEDO.jpg', '73352268', 'WILMIRO ACEVEDO HERRERA', '2019-04-04', '0000-00-00', 'Indefinido', 8, 'operador de planta de asfalto', 5, '2019-07-02 09:34:30', 1, 1, 'GRUPO OBINCO', 'sura', 'salud total', 3144000, 'TURBANA BOLIVAR', 'KR 25 LOTE 10', '3116561947-3126665700', 'wilmiroace@hotmail.com'),
(34, 'images/usuarios/73997aznate.jpeg', '1108761456', 'LUIS MANUEL AZNATE RICARDO', '2019-05-17', '0000-00-00', 'Indefinido', 23, 'AYUDANTE DE PLANTA', 5, '2019-07-02 09:43:07', 1, 1, 'GRUPO OBINCO', 'SURA', 'MUTUAL SER', 828116, 'TOLUVIEJO', 'BARRIO VELLA VISTA', '3127482520-3013624418', ''),
(35, 'images/usuarios/11809foto obinco 1.jpeg', '1050971947', 'CARLOS ALBERTO CELIS GARCIA', '2019-05-01', '2019-07-08', 'Indefinido', 4, 'CONDUCTOR DOBLE TROQUE', 5, '2019-07-02 09:55:16', 0, 1, '', 'SURA', 'SALUD TOTAL', 1500000, 'CARTAGENA', 'VILLA ROSITA, MANZANA C LOTE 5', '3105440354', 'juanagusquincelis@hotmail.com'),
(36, 'images/usuarios/22875FOTO LUIS CONTRERAS.jpg', '92277106', 'LUIS DAVID CONTRERAS ALVIZ', '2019-05-03', '0000-00-00', 'Indefinido', 4, 'CONDUCTOR DOBLE TROQUE', 5, '2019-07-02 09:58:57', 1, 1, 'GRUPO OBINCO', 'SURA', 'MUTUAL SER', 1500000, 'TOLUVIEJO', 'BARRIO EL CARMEN', '3016136379', 'luisdacoal@gmail.com'),
(37, 'images/usuarios/17595foto obinco 1.jpeg', '1047397075', 'RIGOBERTO DIAZ CHICO', '2018-03-15', '0000-00-00', 'Indefinido', 2, 'OPERADOR MINICARGADOR', 5, '2019-07-02 10:04:10', 0, 1, '', 'SURA', 'SALUD TOTAL', 1254000, 'CARTAGENA', 'KR 45 N? 35B - 210', '3058150771', 'chicolo1988@hotmail.com'),
(38, 'images/usuarios/91275foto obinco 1.jpeg', '1070819899', 'JAIRO GOMEZ SILGADO', '2019-05-03', '0000-00-00', 'Indefinido', 16, 'OPERADOR RETRO', 5, '2019-07-02 10:28:43', 0, 1, '', 'SURA', 'COOSALUD MOVILIDAD', 1500000, 'BOSCONIA', 'KR 13 N? 15 - 05', '3137263180', ''),
(39, 'images/usuarios/16898FOTO RAFAEL HERNANDEZ.jpg', '92099114', 'RAFAEL EDUARDO HERNANDEZ AMELL', '2017-10-17', '0000-00-00', 'Indefinido', 10, 'DIRECTOR DE PLANTA', 5, '2019-07-02 10:35:30', 0, 1, '', 'SURA', 'EPS SURA', 7860000, 'SINCELEJO', 'KRA 15 N?11 -61', '3103664499', 'rehernan82@hotmail.com'),
(40, 'images/usuarios/39538FOTO NATA HERNANDEZ.jpg', '1103119002', 'NATALIA LUCIA HERNANDEZ CANCHILA', '2019-05-17', '0000-00-00', 'Indefinido', 11, 'ASISTENTE ADMINISTRATIVA', 5, '2019-07-02 10:47:11', 1, 1, 'GRUPO OBINCO', 'SURA', 'SALUD TOTAL', 1400000, 'COROZAL', 'BARRIO SAN JOSE', '3006368905', 'natalia_henandez-21@hotmail.com'),
(41, 'images/usuarios/41985foto obinco 1.jpeg', '1108758186', 'CARLOS MARIO HOYOS VERGARA', '2019-05-03', '0000-00-00', 'Indefinido', 4, 'CONDUCTOR DOBLE TROQUE', 5, '2019-07-02 10:53:18', 0, 1, '', 'SURA', 'NUEVA EPS', 1500000, 'TOLUVIEJO', 'BARRIO EL CARMEN', '3183086810', ''),
(42, 'images/usuarios/91664foto obinco 1.jpeg', '73135151', 'CARLOS MANUEL MARTINEZ PATERNINA', '2018-02-08', '0000-00-00', 'Indefinido', 9, 'CONDUCTOR TRACTO MULA', 5, '2019-07-02 10:58:16', 0, 1, '', 'SURA', 'NUEVA EPS', 1650000, 'PASACABALLOS', 'CALLE DEL PUERTO  N? 18 - 18', '3116795442 - whp: 302-4495099', ''),
(43, 'images/usuarios/56882FOTO JULIO NAVARRO.jpg', '92095849', 'JULIO ALBERTO NAVARRO OLMOS', '2019-06-23', '0000-00-00', 'Indefinido', 3, 'CONDUCTOR DOBLE TROQUE', 5, '2019-07-02 11:25:53', 0, 1, 'GRUPO OBINCO', 'SURA', 'COOSALUD MOVILIDAD', 1500000, '', '', '3126566137', ''),
(44, 'images/usuarios/34013foto obinco 1.jpeg', '8372055', 'SEBASTIAN JOSE RUS MEJIA', '2019-05-24', '0000-00-00', 'Indefinido', 16, 'OPERADOR RETRO 320', 5, '2019-07-02 11:32:04', 0, 1, '', 'SURA', 'COOSALUD MOVILIDAD', 1600000, 'CAUCACIA', 'ALDEAS VERDES DE PARAGUAY', '3012805147', 'sebastianrus7@gmail.com'),
(45, 'images/usuarios/27626foto obinco 1.jpeg', '1102816452', 'DARIO MIGUEL NARVAEZ SIERRA', '2019-06-18', '2019-07-02', 'Indefinido', 12, 'CONTADOR', 5, '2019-07-02 11:40:31', 0, 1, '', 'SURA', 'SALUD TOTAL', 2000000, 'SINCELEJO', 'CALLE 39B N?19 - 132', '3008278104', 'darios0906@gmail.com'),
(46, 'images/usuarios/6583FOTO RAUL VERGARA.jpg', '3805918', 'RAUL ENRIQUE VERGARA URIBE', '2016-10-21', '0000-00-00', 'Indefinido', 6, 'JEFE DE EQUIPOS', 5, '2019-07-02 11:45:22', 0, 1, '', 'SURA', 'EPS SURA', 3626000, 'CARTAGENA', 'TRANS 51B N?21C - 68 APT 403', '3007230360', 'Rrvergara@administrativos .com'),
(47, 'images/usuarios/1789FOTO CARLOS DIAZ.jpg', '1073820905', 'CARLOS JOSE DIAZ JIMENEZ', '2019-06-21', '0000-00-00', 'Indefinido', 5, 'AYUDANTE DE EQUIPOS', 5, '2019-07-02 11:51:05', 1, 1, 'GRUPO OBINCO', 'SURA', 'COOMEVA', 1100000, 'SAN PELAYO', 'VEREDA COROZITOS', '3013098908', 'cjdiaz19911@hotmail.com'),
(48, 'images/usuarios/71569FOTO FREDDY.jpg', '1067713338', 'FREDY ENRIQUE MACHADO GOMEZ', '2019-06-13', '0000-00-00', 'Indefinido', 4, 'CONDUCTOR DOBLE TROQUE', 5, '2019-07-02 11:57:01', 0, 1, '', 'SURA', 'MEDIMAS EPS', 1500000, 'AGUSTIN CODAZZI', 'CALLE 12C N? 25 - 05', '3022154058-3235126876', ''),
(49, 'images/usuarios/17812foto obinco 1.jpeg', '5172187', 'GUILLERMO MORENO FLOREZ', '2019-06-26', '0000-00-00', 'Indefinido', 4, 'CONDUCTOR DOBLE TROQUE', 5, '2019-07-02 12:02:49', 0, 1, '', 'SURA', 'MEDIMAS EPS', 1500000, '', '', '3116775621', 'margarita.ayola1@hotmail.com'),
(50, 'images/usuarios/50312FOTO LUIS DEIVIS.jpg', '1108759434', 'LUIS DEIVIS JULIO CARRASCAL', '2019-05-17', '0000-00-00', 'Indefinido', 7, '1', 4, '2019-07-03 15:58:41', 1, 1, 'GRUPO OBINCO', 'SURA', 'MUTUAL SER', 828116, 'TOLUVIEJO', 'VEREDA ARROYO SECO', '3146082459-31354888597', ''),
(51, 'images/usuarios/24313WhatsApp Image 2019-07-02 at 9.23.34 AM (1).jpeg', '1003714938', 'ANDRES DUVAN DIAZ LAGARES', '2019-07-06', '0000-00-00', 'Indefinido', 7, '.', 5, '2019-07-05 09:50:12', 0, 1, '', 'SURA', 'SALUD TOTAL', 828116, 'SAN PELAYO', 'SAN PELAYO', '3133841689', ''),
(52, 'images/usuarios/51422FOTO EVER MARMOLEJO.jpg', '1108763540', 'EVER LUIS MARMOLEJO JIMENEZ', '2019-07-06', '0000-00-00', 'Indefinido', 16, '.', 5, '2019-07-05 09:54:10', 0, 1, '', 'SURA', 'SALUD TOTAL', 1500000, 'TOLUVIEJO', 'LA PALMIRA', '3135269507', ''),
(53, 'images/usuarios/66648WhatsApp Image 2019-07-02 at 9.23.34 AM (1).jpeg', '85486241', 'LUIS CARLOS ESPA?OL FERNANDEZ', '2019-04-01', '0000-00-00', 'Indefinido', 17, 'VIGILANTE', 4, '2019-07-08 10:25:21', 0, 1, '', 'POSITIVA', 'SALUD TOTAL', 828116, 'TOLUEVIEJO', 'TOLUVIEJO', '', ''),
(54, 'images/documentos/87334WhatsApp Image 2019-07-02 at 9.23.34 AM (1).jpeg', '1131066975', 'CARLOS ALBERTO HERRERA JIMENEZ', '2019-07-10', '0000-00-00', 'Indefinido', 4, '.', 5, '2019-07-09 11:47:04', 0, 1, '', 'SURA', 'SALUD TOTAL', 1500000, 'CODAZZI', 'CARRERA 40A N 3-51', '3005118102', ''),
(55, '', '73182884', 'BIBBIPJULIO TAPIA', '2019-07-11', '0000-00-00', 'Indefinido', 7, '.', 4, '2019-07-10 17:35:52', 0, 1, '', 'SURA', 'SALUD TOTAL', 1200000, 'SINCELEJO', 'PABLO VI SEGUNDA CALLE', '3103664499', ''),
(56, 'images/usuarios/65134FOTO ANDRES.jpg', '73182884', 'BIDDIO JULIO TAPIA', '2019-07-11', '0000-00-00', 'Indefinido', 18, '.', 4, '2019-07-10 17:35:52', 1, 1, 'GRUPO OBINCO', 'SURA', 'SALUD TOTAL', 1200000, 'SINCELEJO', 'PABLO VI SEGUNDA CALLE', '3176591879-3165462596', ''),
(57, 'images/usuarios/25976WhatsApp Image 2019-07-02 at 9.23.34 AM (1).jpeg', '1065623989', 'LUZMILA ROSA ZULETA GARCI', '2019-07-12', '0000-00-00', 'Indefinido', 1, '.', 4, '2019-07-11 15:55:11', 1, 1, 'GRUPO OBINCO', 'SURA', 'COOMEVA', 2000000, 'SANTA MARTA', 'CALLE 5 A #4-116', '3004965440', 'luzmilarosazuleta@hotmail.com'),
(58, 'images/usuarios/81122FOTO BIDIO.jpg', '1003068561', 'IVAN ANDRES VELASQUEZ HOYOS', '2019-06-27', '0000-00-00', 'Indefinido', 7, '.', 4, '2019-07-11 16:36:22', 0, 1, '', 'POSITIVA', 'FALTA', 828116, 'SINCELEJO', 'SINCELEJO', '3218857259', ''),
(59, 'images/usuarios/75332WhatsApp Image 2019-07-02 at 9.23.34 AM (1).jpeg', '1064789058', 'JADER ANDRES ESQUEA ACOSTA', '2019-07-15', '0000-00-00', 'Indefinido', 19, 'OPERADOR TRITURADORA', 5, '2019-07-13 08:12:02', 0, 1, '', 'SURA', 'CAJA COPI', 2200000, 'CHIRIGUANA', 'CHIRIGUANA', '3116503052', ''),
(60, 'images/usuarios/95015WhatsApp Image 2019-07-02 at 9.23.34 AM (1).jpeg', '1003718738', 'KEVIN ANDRES JIMENEZ MERCADO', '2019-07-12', '0000-00-00', 'Indefinido', 17, '.', 4, '2019-07-15 08:36:28', 0, 1, '', 'SURA', 'NA', 828116, '', '', '3127632847', ''),
(61, 'images/usuarios/86357FOTO LUIS VILLALBA.jpg', '78036287', 'LUIS FERNANDO VILLALBA DURANGO', '2019-07-23', '0000-00-00', 'Indefinido', 19, '.', 4, '2019-07-22 09:45:46', 1, 1, 'GRUPO OBINCO', 'SURA', 'COOMEVA', 2200000, 'CIENEGA DE ORO', 'CIENEGA DE ORO', '3135165184', ''),
(62, '', '988098', 'khskjh', '2019-07-26', '0000-00-00', 'Indefinido', 1, 'sdfsdf', 1, '2019-07-26 15:37:47', 0, 1, '', 'sfds', 'sdfs', 234234, 'sdfsdf', 'sdfsdf', 'sdfsd', 'sdfsdf'),
(63, 'images/usuarios/85767FOTO FRANGLIN.jpg', '1.067.871.000', 'FRANGLIN JOSE HERRERA SARMIENTO', '2019-07-27', '0000-00-00', 'Indefinido', 7, '.', 4, '2019-07-30 09:18:01', 1, 1, 'GRUPO OBINCO', 'SURA', 'COMPARTA', 828116, 'SINCELEJO', '', '3017867528-3224626082-3106625288', ''),
(64, 'images/usuarios/62433FOTO ANTONY ACOSTA.jpg', '100599168', 'ANTONI ANDRES ACOSTA TUIRAN', '2019-07-27', '0000-00-00', 'Indefinido', 7, '.', 4, '2019-07-30 09:20:21', 1, 1, 'GRUPO OBINCO', 'SURA', 'AMBUQ', 828116, 'SINCELEJO', '', '3024088965-3127482520', ''),
(65, 'images/usuarios/18918FOTO ARMANDO CARRASCAL.jpg', '92485023', 'ARMANDO CARRASCAL MERCADO', '2019-08-08', '0000-00-00', 'Indefinido', 2, '.', 4, '2019-08-08 17:33:32', 1, 1, 'GRUPO OBINCO', 'SURA', 'SALUD TOTAL', 1200000, 'TOLUVIEJO', 'TOLUVIEJO', '31065659875-3216720842', ''),
(66, 'images/usuarios/4560foto ober.jpg', '4023806', 'OBER JULIO GUTIERERZ', '2019-08-12', '0000-00-00', 'Indefinido', 16, '.', 4, '2019-08-20 15:14:50', 1, 1, 'GRUPO OBINCO', 'SURA', 'AMBUQ', 1500000, 'TOLUEVIEJO', 'TOLUVIEJO', '3135489587', ''),
(67, 'images/documentos/48975WhatsApp Image 2019-07-02 at 9.23.34 AM (1).jpeg', '73168016', 'ALEXIS ARROYO', '2019-08-30', '0000-00-00', 'Indefinido', 2, '.', 4, '2019-08-30 07:21:56', 0, 1, '', 'SURA', 'SALUD TOTAL', 1300000, 'TOLUVIEJO', 'TOLUVIEJO', '3148460618', ''),
(68, '', '1001939446', 'EMIL MARTINEZ ALVAREZ', '2019-09-21', '0000-00-00', 'Indefinido', 17, '.', 4, '2019-09-20 09:05:06', 0, 1, '', 'POSITIVA', 'COOMEVA', 828116, 'TOLUVIEJO', 'TOLUVIEJO', '321 2803444', ''),
(69, '', '92278060', 'DZAJITH JESSITH ACOSTA GARCIA', '2019-09-23', '0000-00-00', 'Indefinido', 7, 'DIGITADOR', 4, '2019-09-23 17:13:45', 0, 1, '', 'SURA', 'AMBUQ', 828116, 'TOLUVIEJO', '', '', ''),
(70, '', '12287261', 'MANUEL SEGUNDO RUIZ CASTILLA', '2019-10-04', '0000-00-00', 'Indefinido', 1, '.', 4, '2019-10-04 16:13:09', 0, 1, '', 'SURA', 'SALUD TOTAL', 2200000, 'SINCELEJO', 'SINCELEJO', '3133761716', ''),
(71, '', '1143340574', 'CAROLIN CASTILLO LOPEZ', '2019-10-09', '0000-00-00', 'Indefinido', 1, '.', 4, '2019-10-08 11:44:04', 0, 1, '', 'SURA', 'MUTUAL SER', 1200000, 'SINCELEJO', 'CALLE 25 B N? 13A-132', '3229127842', 'c.castillo90@outlook.com'),
(72, 'images/usuarios/98758FOTO ADRIAN.jpg', '1108766597', 'ADRIAN JOSE HERNANDEZ ARRIETA', '2019-10-16', '0000-00-00', 'Indefinido', 16, 'Conductor de Tracto cami?n', 9, '2019-10-19 08:31:25', 1, 1, 'GRUPO OBINCO', 'Sura', 'Mutual Ser', 1600000, 'Vereda Arroyo Seco', '', '3187699153-3205482870', ''),
(73, '', '92497957', 'Asterio Emilio Arias Cordoba', '2019-10-18', '0000-00-00', 'Indefinido', 3, 'Conductor', 9, '2019-10-19 10:50:08', 0, 1, '', 'Sura', 'Salud Total', 1500000, 'Tolu Viejo', '', '3107119921', ''),
(74, '', '78674467', 'Victor Miguel vergara Pastrana', '2019-10-28', '0000-00-00', 'Prestacion de Servicios', 4, 'Conductor de doble Troque', 4, '2019-10-26 10:05:16', 0, 1, '', 'Sura', 'Salud Total', 1500000, 'Tolu Viejo', 'Tolu Viejo', '3014710229', 'almanzahe255@gmai.com'),
(75, '', '1108760298', 'Juan Luis lvarez Garces', '2019-12-02', '0000-00-00', 'Prestacion de Servicios', 16, 'Operador de retro', 9, '2019-12-03 09:47:54', 0, 1, '', 'sura', 'salud total', 1500000, '', 'Toluviejo', '', ''),
(76, 'images/usuarios/8477FOTO ALVARO POLO.jpg', '1068416968', 'ALVARO POLO TORRES', '2019-12-03', '0000-00-00', 'Indefinido', 4, 'Conductor de doble troque', 9, '2019-12-03 09:51:40', 1, 1, 'A P', 'Sura', 'Caja copi', 1500000, 'TOLUVIEJO', 'TOLUVIEJO', '3205116394', ''),
(77, '', '92277934', 'Ramon Ignacio Alvarez Garces', '2019-12-03', '0000-00-00', 'Prestacion de Servicios', 4, 'Conductor de doble troque', 9, '2019-12-03 09:53:55', 0, 1, '', 'Sura', 'Salud total', 1500000, '', '', '', ''),
(78, '', '1108758886', 'Leonid Angel Acosta Rodriguez', '2019-12-04', '0000-00-00', 'Indefinido', 4, 'Conductor doble troque', 9, '2019-12-03 09:55:46', 0, 1, '', 'Sura', 'Caja copi', 1500000, '', '', '', ''),
(79, '', '1108759944', 'Roger David Pena Carrascal', '2019-12-09', '0000-00-00', 'Prestacion de Servicios', 3, 'Conductor volquete sencilla', 9, '2019-12-09 17:44:19', 0, 1, '', 'Sura', 'Salud total', 1300000, 'Toluviejo', 'Toluviejo', '3216720842-3163198924', ''),
(80, 'images/usuarios/27799FOTO RODOLFO DIAZ.jpg', '92277875', 'RODOLFO MANUEL DIAZ HOYOS', '2019-12-09', '0000-00-00', 'Prestacion de Servicios', 7, 'Ayudante de planta de asfalto', 9, '2019-12-09 17:48:17', 1, 1, 'GRUPO OBINCO', 'Sura', 'Salud total', 828116, 'Toluviejo', 'Toluviejo', '3209625454', ''),
(81, '', '1101814571', 'Delys Mariel Rodriguez Cardenas', '2019-12-19', '0000-00-00', 'Prestacion de Servicios', 11, 'PENDIENTE', 12, '2019-12-19 09:44:06', 0, 1, '', 'SURA', 'AMBUQ', 1200000, 'TOLU VIEJO', 'TOLU', '3208204855', 'rodriguezcardenasdm@gmail.com'),
(82, '', '78704554', 'HUGO ALBERTO GUERRA BARIOS (GASPAR)', '2019-12-14', '0000-00-00', 'Indefinido', 4, 'CONDUCTOR', 4, '2019-12-19 10:56:45', 0, 1, '', 'SURA', 'NUEVA EPS', 1500000, 'TOLU', '', '', ''),
(83, '', '92276832', 'LUIS FERNANDO VERGARA BANQUEZ', '2019-12-12', '0000-00-00', 'Indefinido', 7, 'AYUDANTE DE PLANTA', 4, '2019-12-19 10:59:36', 0, 1, '', 'SURA', 'CAJA COPI', 828116, '', '', '', ''),
(84, 'images/usuarios/884FOTO RIGOBERTO PRENS.jpg', '92521707', 'RIGOBERTO PREN MONTERROSA (GASPAR)', '2019-12-17', '0000-00-00', 'Indefinido', 4, 'CONDUCTOR', 4, '2019-12-19 11:06:38', 1, 1, 'GRUPO OBINCO', 'SURA', 'SALUD TOTAL', 1500000, '', '', '3215286109-3215213198', ''),
(85, '', '1005990511', 'JUAN SEBASTIAN MARTINEZ BANQUEZ', '2019-12-17', '0000-00-00', 'Prestacion de Servicios', 7, 'PLANILLAR Y DESPACHAR', 12, '2019-12-21 08:29:25', 1, 1, 'GRUPO OBINCO', 'SURA', 'FAMISANAR', 828116, 'TOLUVIEJO', 'TOLUVIEJO', '318599084-3137063315', 'THEPOPPINLAST@GMAIL.COM'),
(86, 'images/usuarios/14716FOTO PEDRO BOSSIO.jpg', '1051446092', 'PEDRO JAVIER BOSSIO', '2019-12-27', '0000-00-00', 'Indefinido', 7, 'AYUDANTE', 4, '2019-12-26 11:44:06', 0, 1, '', 'SURA', 'MUTUAL SER', 1128116, '', '', '3147230113-3044890525', ''),
(87, '', '1051446092', 'PEDRO JAVIER BOSSIO', '2019-12-27', '0000-00-00', 'Indefinido', 7, 'AYUDANTE', 4, '2019-12-26 11:44:06', 0, 1, '', 'SURA', 'MUTUAL SER', 1128116, '', '', '', ''),
(88, 'images/usuarios/68463FOTO ERICK.jpg', '1118856918', 'ERICK MANUEL RIVERA MONTES', '2020-01-11', '0000-00-00', 'Prestacion de Servicios', 7, 'APOYO  AL AREA DE PLANTA DE ASFALTO', 12, '2020-01-10 15:30:29', 1, 1, 'GRUPO OBINCO', 'SURA', 'COMPARTA', 877803, 'TOLUVIEJO', '', '302275863', ''),
(89, '', '1108762458', 'CINDY DAYANA BANQUET FUENTES', '2020-01-15', '0000-00-00', 'Indefinido', 11, 'DIGITADOR', 4, '2020-01-14 14:43:42', 0, 1, '', 'SURA', 'MUTUAL SER', 877803, 'TOLUVIEJO', 'TOLUVIEJO', '', ''),
(90, 'images/usuarios/51834FOTO WILMER.jpg', '1005990779', 'WILMER ALFONSO OLIVEROS MONTALVO', '2020-01-16', '0000-00-00', 'Indefinido', 7, 'DIGITADOR', 4, '2020-01-15 17:42:37', 0, 1, 'GRUPO OBINCO', 'SURA', 'SALUD VIDA', 877803, 'TOLUVIEJO', 'TOLUEVIEJO', '3105783977-3137504008', ''),
(91, '', '1005990779', 'WILMER ALFONSO OLIVEROS MONTALVO', '2020-01-16', '0000-00-00', 'Indefinido', 7, 'DIGITADOR', 4, '2020-01-15 17:42:37', 0, 1, '', 'SURA', 'SALUD VIDA', 877803, 'TOLUVIEJO', 'TOLUEVIEJO', '', ''),
(92, 'images/usuarios/210201844640e-7645-4250-bd95-02e318bcc396.jpg', '1102828579', 'KATIA MARCELA ALVAREZ GONZALEZ', '2020-01-30', '0000-00-00', 'Indefinido', 20, 'cumplir con lo establecido en el sg-sst', 12, '2020-03-04 13:24:46', 1, 1, 'GRUPO OBINCO', 'SURA', 'AMBUQ', 1200000, 'SINCELEJO', 'CORREGIMIENTO LA CHIVERA', '3222060238-3003395911', 'katialvarez25602@gmail.com'),
(93, '', '1104378388', 'YEISON MANUEL ORDO?EZ QUEVEDO', '2020-06-12', '0000-00-00', 'Indefinido', 16, 'descapotar	 (Retrero de el cauchal)', 12, '2020-06-24 14:01:07', 0, 1, '', 'sura', 'salud total', 1150000, 'chia-cundinamarca', '', '3114075638', 'yeisonordo?ez@hotmail.com'),
(94, '', '25202620', 'ANA THALIA RINCON VERGARA', '2020-08-06', '0000-00-00', 'Prestacion de Servicios', 11, 'PENDIENTE', 1, '2020-08-08 10:36:06', 0, 1, '', 'PENDIENTE', 'PENDIENTE', 0, 'SINCELEJO', 'SINCELEJO', '3015528218', 'thaliarincon@hotmail.com'),
(95, 'images/usuarios/89362foto yonys callejas contratista.jpg', '98.673.509', 'YONYS EDWIN CALLEJAS MONTOYA', '2020-06-09', '0000-00-00', 'Contratista', 21, 'CARGUE DEL MATERIAL', 12, '2020-08-28 14:48:27', 0, 1, '', 'SURAMERICANA', 'SALUD TOTAL', 0, 'TOLU VIEJO', '', '3155950139-3122512887 Edilma Montoya', 'CONTRATISTA AP'),
(96, 'images/documentos/77524foto yonairo melendez contratista.jpg', '8.204.002', 'yonairo melendez silva', '2020-06-09', '0000-00-00', 'Contratista', 21, 'RETRERO', 12, '2020-08-29 12:39:39', 0, 1, '', 'SURAMERICANA', 'MUTUAL', 0, 'TOLUVIEJO', '', '', 'CONTRATISTA AP'),
(97, 'images/usuarios/61378foto gerlin.jpg', '1.005.991.589', 'GERLIN DE JESUS PELUFO GONZALEZ', '2020-08-31', '0000-00-00', 'Indefinido', 4, 'CONDUCTOR', 12, '2020-09-01 12:09:22', 1, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'MUTUAL SER', 1500000, 'TOLUVIEJO-SUCRE', 'BARRIO VILLA ETY', '3045639629', 'geikey06@gmail.com'),
(98, '', '92.525.802', 'EBERTO ANTONIO PRENZ PATERNINA', '2020-09-02', '0000-00-00', 'Indefinido', 4, 'CONDUCTOR', 12, '2020-09-02 14:27:15', 0, 1, '', 'SURAMERICANA', 'MUTUAL SER', 1500000, 'LA GALLERA', 'CALLE LAS FLORES CRA 2 CALLE 1C-22', '3122320173', ''),
(99, '', '1.108.765.588', 'JOS?  ANTONIO RIVERA CORREA', '2020-08-31', '0000-00-00', 'Indefinido', 23, 'AYUDANTE', 12, '2020-09-02 14:54:47', 0, 1, '', 'SURAMERICANA', 'MUTUAL SER', 0, 'TOLUVIEJO', 'BARRIO SAN PABLO', '312 605 65 66', ''),
(100, '', '92.277.668', 'EBELIO DEL CRISTO HERN?NDEZ CONTRERAS', '2020-08-19', '0000-00-00', 'Indefinido', 22, 'OPERAR CLASIFICADORA', 12, '2020-09-02 15:00:50', 1, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'MUTUAL SER', 1400000, 'TOLUVIEJO', 'ARROYO SECO', '', ''),
(101, 'images/usuarios/56165FOTO JOSE.jpg', '1.108.765.588', 'JOSE ANTONIO RIVERA CORREA', '2020-08-31', '0000-00-00', 'Indefinido', 23, 'AYUDANTE', 12, '2020-09-02 15:15:54', 1, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'MUTUAL SER', 0, 'TOLUVIEJO', 'BARRIO SAN PABLO', '312 605 65 66', ''),
(102, 'images/usuarios/18569foto esnoider.jpg', '1.108.763.099', 'ESNOIDER JOS? OLIVERO PE?ATE', '2020-08-31', '0000-00-00', 'Indefinido', 23, 'AYUDANTE', 12, '2020-09-02 15:25:28', 1, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'mutual ser', 0, 'TOLUVIEJO', 'BARRIO ARROYO SECO', '312 507 05 71', 'esnoiderolivero@gmail.com'),
(103, 'images/usuarios/81135foto deibis.jpg', '1.108.762.003', 'DEIBIS JOSE PE?A BRAVO', '2020-09-07', '0000-00-00', 'Indefinido', 21, 'cargue', 12, '2020-09-05 13:02:06', 0, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'SALUD TOTAL', 1200000, 'TOLUVIEJO-SUCRE', 'CALLE 3-5-30 CENTRO MACAJAN', '310 6576606', 'dpenabravo@gmail.com'),
(104, '', '1.051.449.762', 'IVAN ANDRES MARRUGO MARRUGO', '2020-09-10', '0000-00-00', 'Indefinido', 7, 'CALDERISTA', 12, '2020-09-09 13:01:28', 0, 1, '', 'SURAMERICANA', 'MUTUAL SER', 1200000, 'CARTAGENA-BOLIVAR', 'BALLESTA- CALLE LAS FLORES', '3153494027', ''),
(105, '', '1.104.433.652', 'MOISES ARTURO PERCY FLOREZ', '2020-09-10', '0000-00-00', 'Indefinido', 25, 'OPERAR B?SCULA', 12, '2020-09-09 14:16:49', 0, 1, '', 'SURAMERICANA', 'MUTUAL SER', 877803, 'SAN MARCOS -SUCRE', 'CRA 15 #18D-08', '301 382 79 35', 'moper-15@hotmail.com'),
(106, 'images/usuarios/6355FOTO JOHN MORENO.jpg', '92.230.224', 'JOHN JANI MORENO CALDERON', '2020-09-10', '0000-00-00', 'Indefinido', 4, 'CARGUE DE MATERIAL', 12, '2020-09-09 14:34:40', 0, 1, '', 'SURAMERICANA', 'NUEVA EPS', 1500000, 'TOLU-SUCRE', 'BARRIO BRISAS DEL MAR CRA 6 # 6--33', '3103722318CLAUSOFITOLU@', 'clausofitolu@yahoo.com'),
(107, 'images/usuarios/96911FOTO JOHN OCORO.jpg', '1.027.998.592', 'JHON ANDRES OCORO YARCE', '2020-08-23', '0000-00-00', 'Contratista', 16, 'RETRERO', 12, '2020-09-18 08:52:56', 1, 1, '', 'SURAMERICANA', 'NUEVA EPS', 0, 'TOLUVIEJO', 'TOLUVIEJO', '3103952907', 'CONTRATISTA AP'),
(108, '', '1.017.214.249', 'YAN OQUENDO ARANGO', '2020-08-10', '0000-00-00', 'Contratista', 21, 'CARGADOR', 12, '2020-09-18 16:54:23', 0, 1, '', 'SUARAMERICANA', 'SURA', 0, 'TOLUVIEJO', 'TOLUVIEJO', '314 738 81 23', 'CONTRATISTA AP'),
(109, '', '6.650.133', 'JHON JAIVER PE?ARANDA HEREDIA', '2020-07-02', '0000-00-00', 'Contratista', 16, 'RETRERO', 12, '2020-09-19 07:52:19', 0, 1, '', 'SURAMERICANA', 'SURA', 0, 'TOLUVIEJO', 'TOLUVIEJO', '3137832478', 'CONTRATISTA AP'),
(110, 'images/usuarios/15140FOTO JUAN VOLQUETA.jpg', '1.103.217.776', 'JUAN ALFONSO BALETA SIERRA', '2020-08-25', '0000-00-00', 'Contratista', 4, 'CONDUCTOR', 12, '2020-09-19 08:04:55', 0, 1, '', 'COLMENA', 'MUTUAL SER', 877803, 'TOLUVIEJO', 'TOLUVIEJO', '3044032160', 'CONTRATISTA  V Y V'),
(111, '', '78.746.139', 'TEOFILO ENRIQUE VEGA ACOSTA', '2020-09-01', '0000-00-00', 'Contratista', 4, 'CONDUCTOR', 12, '2020-09-19 08:21:49', 0, 1, '', 'COLMENA', 'NUEVA EPS', 877803, 'TOLUVIEJO', 'TOLUVIEJO', '3006190016', 'CONTRATISTA V Y V'),
(112, 'images/usuarios/99842FOTO OSWALDO.jpg', '18.968.657', 'OSVALDO DE JESUS SAMPAYO SIERRA', '2020-08-04', '0000-00-00', 'Contratista', 4, 'CONDUCTOR', 12, '2020-09-19 09:56:52', 0, 1, '', 'COLMENA', 'MUTUAL SER', 877803, 'TOLUVIEJO', 'TOLUVIEJO', '3006190016', 'CONTRATISTA V Y V'),
(113, '', '25.202.620', 'ANA TALIA RINCON VERGARA', '2020-08-04', '0000-00-00', 'Contratista', 11, 'ASISTENTE LOGISTICA', 12, '2020-09-19 10:08:14', 0, 1, '', 'COLMENA', 'MUTUAL SER', 877803, 'SINCELEJO', 'SINCELEJO', '3174776947', 'CONTRATISTA V Y V'),
(114, '', '78.321.470', 'MIGUEL ANGEL HERRERA SOTELO', '2020-08-02', '0000-00-00', 'Contratista', 16, 'RETRERO', 12, '2020-09-19 11:05:42', 0, 1, '', 'SURAMERICANA', 'NUEVA EPS', 0, 'TOLUVIEJO', 'TOLUVIEJO', '3205062808', 'CONTRATISTA AP'),
(115, 'images/usuarios/56756FOTO GUSTAVO GALEANO.jpg', '1.101.454.332', 'GUSTAVO DAVID GALEANO GONZALEZ', '2020-09-17', '0000-00-00', 'Indefinido', 24, 'AYUDANTE', 12, '2020-09-22 11:51:35', 1, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'NUEVA EPS', 877803, 'TOLUVIEJO', 'TOLUVIEJO', '301 4729862', ''),
(116, '', '1.108.760.979', 'ALBEIRO JESUS CARDONA HERNANDEZ', '2020-09-11', '0000-00-00', 'Indefinido', 7, 'AYUDANTE', 12, '2020-09-26 11:58:48', 0, 1, '', 'SURAMERICANA', 'SALUD TOTAL', 877803, 'TOLUVIEJO', 'TOLUVIEJO', '3215990402', '.....'),
(117, '', '1.108.760.979', 'ALBEIRO JESUS CARDONA HERNANDEZ', '2020-09-11', '0000-00-00', 'Indefinido', 7, 'AYUDANTE', 12, '2020-09-28 12:03:41', 0, 1, '', 'SURAMERICANA', 'SALUD TOTAL', 877803, 'TOLUVIEJO', 'VEREDA VERSALLES', '321 599 04 02', 'albeirocardona0302@gmail.com'),
(118, 'images/usuarios/16186FOTO FRANCISCO.jpg', '1.108.761.891', 'FRANCISCO JAVIER MARIN NARVAEZ', '2020-09-05', '0000-00-00', 'Contratista', 4, 'conductor', 12, '2020-10-03 11:16:40', 0, 1, '', 'colmena', 'nueva eps', 877803, 'toluviejo', 'toluviejo', '3136919030', 'contratista v y v'),
(119, 'images/usuarios/82280foto jabit.jpg', '67.978.894', 'JABIT DEL ROSARIO NAVARRO', '2020-10-15', '0000-00-00', 'Contratista', 21, 'CARGUE DE MATERIAL', 12, '2020-10-15 09:10:02', 0, 1, '', 'SURAMERICANA', 'SURA', 0, 'TOLUVIEJO/ SUCRE', 'TOLUVIEJO', '3135884459', 'CONTRATISTA  AP'),
(120, '', '1.044.906.955', 'LUIS EDUARDO MARTINEZ HURTADO', '2020-10-20', '0000-00-00', 'Indefinido', 26, 'MANTENIMIENTO PREVENTIVO Y CORRECTIVO', 12, '2020-10-20 09:08:13', 1, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'NUEVA EPS', 1100000, 'CARTAGENA -BOLIVAR', 'BARRIO LA CRUZ', '3136280150', 'lumahu777@hotmail.com'),
(121, '', '8.049.153', 'FREDIS JULIO PERALTA', '2020-02-10', '0000-00-00', 'Contratista', 16, 'explotaci?n', 12, '2020-10-26 08:38:50', 0, 1, '', 'COLMENA', 'B', 0, 'SINCELEJO', 'BARRIO 2 DE SEPT -KRA 4A #15-262', '3128674096', 'FREDISJULIO@HOTMAIL.COM-  CONTRATISTA V Y V'),
(122, '', '92.524.042', 'ELVIS MARIA PEREZ PEREZ', '2020-11-04', '0000-00-00', 'Indefinido', 21, 'MEZCLAR', 12, '2020-11-04 08:48:09', 1, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'SALUD TOTAL', 1200000, 'TOLUVIEJO', 'BARRIO COSTA AZUL', '3126272690', ''),
(123, '', '92.226.998', 'ENDER CAMACHO FLOREZ', '2020-10-29', '0000-00-00', 'Indefinido', 10, 'MANTENIMIENTO', 12, '2020-11-05 10:33:51', 1, 1, 'GRUPO OBINCO', 'SURAMERICANA', 'SALUD TOTAL', 3700000, 'TOLU', 'CALLE 13A N? 9-55', '3166187504', 'endercf@gmail.com'),
(124, '', '92.276.844', 'ADRIAN SEGUNDO ARROYO MARTINEZ', '2020-11-05', '0000-00-00', 'Indefinido', 22, 'TRITURAR', 12, '2020-11-05 10:48:09', 1, 1, 'GRUPO OBINCO', 'SURA', 'NUEVA EPS', 1400000, 'TOLUVIEJO- SUCRE', 'BARRIO VILLA ETY', '3224571105', ''),
(125, '', '16.400.429', 'OMAR ALIRIO PEREZ DIAZ', '2020-11-03', '0000-00-00', 'Contratista', 21, 'NA', 12, '2020-11-13 12:20:11', 1, 1, 'A P', 'SURA', 'SURA', 0, 'TOLUVIEJO', 'TOLUVIEJO', '0000', ''),
(126, '', '92.277.187', 'CARLOS ARTURO ZABALA AVILEZ', '2020-11-22', '0000-00-00', 'Indefinido', 7, 'AYUDANTE', 12, '2020-11-23 15:17:47', 1, 1, 'GRUPO OBINCO', 'SURA', 'COMFASUCRE', 900000, 'TOLUVIEJO-SUCRE', 'TOLUVIEJO', '3116856852-3205852325', ''),
(127, '', '92.542.014', 'LUIS ALBERTO NOVOA GARCIA', '2020-11-21', '0000-00-00', 'Indefinido', 24, 'AYUDANTE', 12, '2020-11-23 15:28:58', 1, 1, 'GRUPO OBINCO', 'SURA', 'SALUD TOTAL', 877803, 'TOLUVIEJO', 'TOLUVIEJO', '3177314022', ''),
(128, '', '1.108.763.008', 'CARLOS ANDRES OLIVEROS ALVAREZ', '2020-11-21', '0000-00-00', 'Indefinido', 7, 'AYUDANTE', 12, '2020-11-23 16:06:49', 1, 1, 'GRUPO OBINCO', 'SURA', 'MUTUAL SER', 877803, 'TOLUVIEJO', 'TOLUVIEJO', '3187303295', ''),
(129, '', '60.322.451', 'NAIDA XIOMARA QUINONEZ DELGADO', '2020-11-24', '0000-00-00', 'Prestacion de Servicios', 29, 'INGENIERA CIVIL', 12, '2020-11-23 16:41:13', 1, 1, 'GRUPO OBINCO', 'POSITIVA', 'NUEVA EPS', 3500000, 'TOLUVIEJO', 'TOLUVIEJO', '300802629', ''),
(130, '', '1.193.029.616', 'ALEXANDER VILLALOBOS ROJAS', '2020-11-26', '0000-00-00', 'Indefinido', 25, 'LOGISTICA DE SALIDA DE VOLQUETAS', 12, '2020-11-25 16:47:57', 1, 1, 'GRUPO OBINCO', 'SURA', 'COMPARTA', 877803, 'TOLUVIEJO', 'TRANSV 1C CLL 12 SAN RAFAEL', '3215382202', ''),
(131, '', '92.229.252', 'JORGE MANUEL REVUELTA SANMARTIN', '2020-11-23', '0000-00-00', 'Indefinido', 30, 'OFICIOS VARIOS', 12, '2020-11-25 16:52:17', 1, 1, 'GRUPO OBINCO', 'SURA', 'NUEVA EPS', 877803, 'TOLU', 'KRA 2 CLL 1920 ARROYITO', '3148439745', ''),
(132, '', '1.102.825.769', 'CESAR ISMAEL GOMEZ RIOS', '2020-11-01', '0000-00-00', 'Contratista', 4, 'CONDUCIR', 12, '2020-11-26 14:20:51', 1, 1, 'V Y V', 'COLMENA', 'SALUD TOTAL', 0, 'TOLUVIEJO', 'TOLUVIEJO', '', ''),
(133, '', '12133', 'dsfdff', '2020-11-01', '0000-00-00', 'Contratista', 3, 'fff', 12, '2020-11-26 15:27:30', 0, 1, 'na', 'vn', 'na', 0, 'na', 'na', 'na', 'na'),
(134, '', '16161795', 'JHON ALEXANDER CUELLAR GARCIA', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-26 15:33:21', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(135, '', '10.884.098', 'JOSE CARLOS SIMAHAN RUIZ', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 08:02:45', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(136, '', '1.064,723.773', 'JORGE ELIECER OCHOA GARAVITO', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 08:12:44', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(137, '', '1.103.217.776', 'JUAN ALFONSO BALETA SIERRA', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 08:16:24', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(138, '', '1.102.857.046', 'HARBEY  YESID PINZON ZU?IGA', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 08:37:47', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(139, '', '1.102.876.603', 'RODRIGO ROBERTO CHICA RIOS', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 08:46:17', 0, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(140, '', '78.732.110', 'MARTIN JAVIER MARTINEZ VILLERA', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 08:49:17', 0, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(141, '', '1.081.925.299', 'SERGIO ANDRES BOLA?O  LLERENA', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 08:55:04', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(142, '', '92.544.656', 'JOHN FREDY DE JESUS MURIEL OQUENDO', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 09:05:48', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(143, '', '18.968.657', 'OSVALDO DE JESUS SAMPAYO SIERRA', '2020-08-04', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-27 09:28:31', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(144, '', '8.049.153', 'FREDYS JULIO PERALTA', '2020-02-10', '0000-00-00', 'Contratista', 16, 'NA', 12, '2020-11-27 09:32:51', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(145, '', '25.202.620', 'ANA TALIA RINCON VERGARA', '2020-08-04', '0000-00-00', 'Contratista', 11, 'NA', 12, '2020-11-27 09:35:43', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(146, '', '71.480.588', 'JOSE LEONARDO ZAPATA GALLEGO', '2020-11-24', '0000-00-00', 'Contratista', 21, 'NA', 12, '2020-11-27 11:06:55', 1, 1, 'A P', 'SURA', 'NUEVA EPS', 0, 'NA', 'NA', '3148127610', 'NA'),
(147, '', '6.650.133', 'JHON JAVIER PE?ARANDA HEREDIA', '2020-07-02', '0000-00-00', 'Contratista', 16, 'NA', 12, '2020-11-27 14:47:12', 1, 1, 'A P', 'SURA', 'NA', 0, 'NA', 'NA', 'NA', ''),
(148, '', '67.978.894', 'JABIT DEL ROSARIO NAVARRO', '2020-10-11', '0000-00-00', 'Contratista', 21, 'NA', 12, '2020-11-27 14:58:43', 1, 1, 'A P', 'SURA', 'NA', 0, 'NA', 'NA', '3135884459', 'NA'),
(149, '', '16161795', 'JOHN ALEXANDER CUELLAR', '2020-11-27', '0000-00-00', 'Contratista', 21, 'NA', 12, '2020-11-27 15:20:43', 0, 1, 'A P', 'SURA', 'NA', 0, 'NA', 'NA', '310508572', ''),
(150, '', '76.295.577', 'MARCO FIDEL NARVAEZ HERNANDEZ', '2020-06-03', '0000-00-00', 'Contratista', 16, 'NA', 12, '2020-11-27 16:05:33', 1, 1, 'A P', 'SURA', 'NA', 0, 'NA', 'NA', '', 'NA'),
(151, '', '92.277.867', 'LUIS MANUEL MARIN OLIVEROS', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-30 09:50:05', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(152, '', '92.277.072', 'RICARDO PERALTA BENITEZ', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-30 09:52:13', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(153, '', '92.231.199', 'ELKIN DE JESUS FLOREZ VILLEGAS', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-30 09:54:53', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(154, '', '92.499.756', 'GUIDO ELIECER CAMARGO DE LA ROSA', '2020-11-01', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-11-30 13:40:26', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(155, '', '1.104.422.164', 'WALTER JOSE CALLE DIAZ', '2020-11-20', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-12-02 08:51:28', 1, 1, 'GRUPO OBINCO', 'SURA', 'NUEVA EPS', 1500000, 'TOLUVIEJO', 'CLL 23 N 23', '3112949468', ''),
(156, '', '5172187', 'GUILLERMO MORENO FLORES', '2020-11-20', '0000-00-00', 'Indefinido', 4, 'NA', 12, '2020-12-02 09:27:12', 1, 1, 'GRUPO OBINCO', 'SURA', 'SANITAS', 0, 'TOLUVIEJO', 'TOLUVIEJO', '3116775621', ''),
(157, '', '1.062.909.589', 'ELICER JACOME QUINTERO', '2020-11-06', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-12-03 11:42:33', 1, 1, 'V Y V', 'SURA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(158, '', '8.436.044', 'EVER JHONNY GUERRA VILLA', '2020-12-01', '0000-00-00', 'Contratista', 21, 'NA', 12, '2020-12-05 07:48:52', 1, 1, 'A P', 'SURA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(159, '', '70.810.470', 'MARIO DE JESUS PALACIO SIERRA', '2020-12-05', '0000-00-00', 'Contratista', 16, 'NA', 12, '2020-12-05 08:08:54', 0, 1, 'A P', 'SURA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(160, '', '49607613', 'MARIA CLAUDIA GUTIERREZ OROZCO', '2019-12-01', '0000-00-00', 'Prestacion de Servicios', 11, 'NA', 12, '2020-12-09 10:02:03', 1, 1, 'GRUPO OBINCO', 'SURA', 'SANITAS', 300000, 'NA', 'NA', '3183764023', 'NA'),
(161, '', '70.810.470', 'MARIO DE JESUS PALACIO SIERRA', '2020-12-07', '0000-00-00', 'Contratista', 16, 'NA', 12, '2020-12-09 15:57:02', 1, 1, 'A P', 'NA', 'NA', 0, 'NA', 'NA', 'NA', 'NA'),
(162, '', '92.513.407', 'RICHAR ISAAC PATERNINA P?REZ', '2020-12-18', '0000-00-00', 'Contratista', 4, 'NA', 12, '2020-12-22 09:54:29', 1, 1, 'V Y V', 'COLMENA', 'NA', 0, 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documental`
--

CREATE TABLE `gestion_documental` (
  `id_registro` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `documento_id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `gestion_estado` int(11) NOT NULL,
  `gestion_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `gestion_documental`
--

INSERT INTO `gestion_documental` (`id_registro`, `imagen`, `documento_id_documento`, `modulo_id_modulo`, `cuenta_id_cuenta`, `alerta`, `fecha_expiracion`, `marca_temporal`, `gestion_estado`, `gestion_publicado`, `creado_por`) VALUES
(1, 'images/documentos/79724default.png', 5, 1, 3, 'Si', '2019-04-10', '2019-03-12 18:56:52', 1, 1, 1),
(2, 'images/documentos/76879REFORMA ACUERDO CONSORCIAL.pdf', 22, 1, 3, 'No', '1970-01-01', '2019-03-24 11:52:11', 1, 1, 2),
(3, 'No-Aplica', 9, 1, 3, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(4, 'No-Aplica', 12, 1, 3, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(5, 'No-Aplica', 23, 1, 3, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(6, 'images/documentos/75375Cedula Jose Daniel Meza.pdf', 6, 1, 3, 'No', '1970-01-01', '2019-03-24 12:05:47', 1, 1, 2),
(8, 'No-Aplica', 22, 1, 11, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(9, 'No-Aplica', 7, 1, 4, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(10, 'No-Aplica', 12, 1, 4, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(11, 'No-Aplica', 22, 1, 4, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(12, 'No-Aplica', 23, 1, 4, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(13, 'No-Aplica', 9, 1, 4, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(14, 'images/documentos/34191Cedula Jose Daniel Meza.pdf', 6, 1, 4, 'No', '1970-01-01', '2019-03-24 12:09:53', 1, 1, 2),
(15, 'images/documentos/51300Cedula Jose Daniel Meza.pdf', 6, 1, 9, 'No', '1970-01-01', '2019-03-24 12:11:00', 1, 1, 2),
(16, 'No-Aplica', 12, 1, 9, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(18, 'images/documentos/55462BROCHURE_2018.pdf', 23, 1, 6, 'Si', '2019-10-10', '2019-03-24 12:13:07', 1, 1, 2),
(20, 'images/documentos/27923ACTA INICIO OBRA E INTERV.pdf', 24, 1, 3, 'No', '1970-01-01', '2019-03-24 12:42:01', 1, 1, 2),
(21, 'No-Aplica', 24, 1, 10, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(27, 'images/documentos/22659RUP-OBINCO 2019.pdf', 9, 1, 5, 'No', '2069-12-31', '2019-04-30 14:39:59', 1, 1, 4),
(32, 'images/documentos/58253Brochure Grupo Obinco.pdf', 23, 1, 5, 'No', '2069-12-31', '2019-05-09 14:56:58', 1, 1, 1),
(34, 'images/documentos/10317Cedula Representante Legal Katherine.pdf', 6, 1, 10, 'No', '2069-12-31', '2019-05-10 09:09:25', 1, 1, 4),
(35, 'images/documentos/96051Cedula Elin Epinayu.pdf', 8, 1, 10, 'No', '2069-12-31', '2019-05-10 09:10:04', 1, 1, 4),
(36, 'images/documentos/43176RUP 06 MAYO 2019 MYM.pdf', 9, 1, 10, 'No', '2069-12-31', '2019-05-10 09:10:42', 1, 1, 4),
(37, 'images/documentos/33890CERTIFICACION BANCARIA MYM (2).pdf', 10, 1, 10, 'No', '2069-12-31', '2019-05-10 09:11:05', 1, 1, 4),
(38, 'images/documentos/51246ESTADOS FINANCIEROS MYM DIC 2018.pdf', 11, 1, 10, 'Si', '2019-12-31', '2019-05-10 09:11:32', 1, 1, 4),
(40, 'images/documentos/20919CAMARA COMERCIO 06 MAYO 2019 MYM.pdf', 12, 1, 10, 'No', '2069-12-31', '2019-05-10 09:12:31', 1, 1, 4),
(41, 'images/documentos/29312DECLARACION RENTA  2018 MYM.pdf', 13, 1, 10, 'Si', '2020-04-25', '2019-05-10 09:12:55', 1, 1, 4),
(48, '', 0, 0, 0, '', '2069-12-31', '0000-00-00 00:00:00', 0, 0, 0),
(49, 'No-Aplica', 7, 1, 10, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(50, 'No-Aplica', 22, 1, 10, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(51, 'No-Aplica', 23, 1, 10, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(52, 'No-Aplica', 7, 1, 5, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(53, 'No-Aplica', 22, 1, 5, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(54, 'No-Aplica', 24, 1, 5, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(55, 'No-Aplica', 24, 1, 6, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(56, 'No-Aplica', 22, 1, 6, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(57, 'No-Aplica', 7, 1, 6, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(58, 'No-Aplica', 7, 1, 6, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(62, 'images/documentos/58931RUT JOSE DANIEL MEZA.pdf', 5, 1, 4, 'No', '2069-12-31', '2019-05-30 09:40:39', 1, 1, 4),
(65, 'No-Aplica', 24, 1, 11, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(66, 'images/documentos/8189220190702150830217.pdf', 8, 1, 5, 'No', '2069-12-31', '2019-07-03 15:08:43', 1, 1, 4),
(73, 'images/documentos/23877Composicion Accionaria Grupo Obinco S.A.S 13 Agosto 2019.pdf', 35, 1, 5, 'No', '2069-12-31', '2019-08-20 09:51:12', 1, 1, 4),
(74, 'images/documentos/6857420190823092856976.pdf', 36, 1, 5, 'No', '2069-12-31', '2019-08-23 08:31:54', 1, 1, 4),
(78, 'images/documentos/94106RUT ACTUALIZADO MYM.pdf', 5, 1, 10, 'No', '2069-12-31', '2019-09-06 17:45:47', 1, 1, 4),
(94, 'images/documentos/497081115604820586.pdf', 13, 1, 5, 'Si', '2021-06-30', '2020-06-27 10:32:22', 1, 1, 4),
(96, 'images/documentos/13286INCOS.pdf', 11, 1, 11, 'No', '2069-12-31', '2020-07-21 14:40:16', 1, 1, 4),
(97, 'images/documentos/9085214. Cedula Miguel Andres Meza.pdf', 6, 1, 8, 'No', '2069-12-31', '2020-07-21 14:43:06', 1, 1, 4),
(98, 'images/documentos/1676714650706164.pdf', 5, 1, 11, 'No', '2069-12-31', '2020-07-23 14:19:36', 1, 1, 4),
(99, 'images/documentos/56959RUP INCOS.pdf', 9, 1, 11, 'No', '2069-12-31', '2020-07-23 17:05:55', 1, 1, 4),
(100, 'images/documentos/20997TP. CONTADOR Y REVISOR FISCAL.pdf', 8, 1, 6, 'No', '2069-12-31', '2020-07-29 10:38:36', 1, 1, 4),
(101, 'images/documentos/79154EEFF DICON.pdf', 11, 1, 6, 'No', '2069-12-31', '2020-07-29 10:39:14', 1, 1, 4),
(102, 'images/documentos/25002Cedula Jose Daniel Meza.pdf', 6, 1, 6, 'No', '2069-12-31', '2020-07-29 10:40:18', 1, 1, 4),
(103, 'No-Aplica', 23, 1, 9, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(104, 'No-Aplica', 7, 1, 9, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(105, 'No-Aplica', 36, 1, 9, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(106, 'No-Aplica', 37, 1, 9, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(107, 'No-Aplica', 35, 1, 9, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(108, 'images/documentos/65709COMPOSICION ACCIONARIA DICON.pdf', 35, 1, 6, 'No', '2069-12-31', '2020-07-29 10:48:19', 1, 1, 4),
(111, 'images/documentos/34595ESTADOS CDI BOLIVAR AVANZA.pdf', 11, 1, 7, 'No', '2069-12-31', '2020-08-12 08:55:20', 1, 1, 4),
(112, 'images/documentos/71221ESTDOS FINANCIROS  CONSORCIO BOLIVAR GANADOR 2019 y 2018.pdf', 11, 1, 9, 'No', '2069-12-31', '2020-08-12 08:55:49', 1, 1, 4),
(113, 'images/documentos/7883RUT UT.pdf', 5, 1, 9, 'No', '2069-12-31', '2020-08-12 10:44:42', 1, 1, 4),
(114, 'images/documentos/47777RUT BA.jpg', 5, 1, 7, 'No', '2069-12-31', '2020-08-12 11:24:14', 1, 1, 4),
(115, 'No-Aplica', 23, 1, 7, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(116, 'No-Aplica', 37, 1, 7, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(117, 'No-Aplica', 36, 1, 7, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(118, 'No-Aplica', 35, 1, 7, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(119, 'No-Aplica', 7, 1, 7, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(120, 'images/documentos/58947Acuerdo Consorcial CDI Bolivar Avaza (1).pdf', 22, 1, 7, 'No', '2069-12-31', '2020-08-12 11:25:05', 1, 1, 4),
(122, 'images/documentos/50279ACTA DE INICIO BOLIVAR GANADOR20160811_15251669.pdf', 24, 1, 9, 'No', '2069-12-31', '2020-08-12 11:32:00', 1, 1, 4),
(123, 'images/documentos/29635ACTA DE INICIO (CONSTRUCCI?N).pdf', 24, 1, 7, 'No', '2069-12-31', '2020-08-13 09:23:22', 1, 1, 4),
(124, 'No-Aplica', 9, 1, 7, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(125, 'No-Aplica', 8, 1, 7, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(126, 'No-Aplica', 12, 1, 7, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(127, 'images/documentos/47735CCB.pdf', 12, 1, 6, 'No', '2069-12-31', '2020-08-14 12:26:27', 1, 1, 4),
(128, 'images/documentos/65293RUP DICON 2019.pdf', 9, 1, 6, 'No', '2069-12-31', '2020-08-18 11:23:22', 1, 1, 4),
(129, 'images/documentos/86781certificaci?n bancaria Dicon.pdf', 10, 1, 6, 'No', '2069-12-31', '2020-08-18 11:23:53', 1, 1, 4),
(130, 'images/documentos/48755Declaraci?n de renta DICON 2019.pdf', 13, 1, 6, 'No', '2069-12-31', '2020-08-18 11:24:34', 1, 1, 4),
(131, 'No-Aplica', 37, 1, 6, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(132, 'No-Aplica', 36, 1, 6, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(133, 'images/documentos/69271RUT ACTUALIZADO DICON_unlocked.pdf', 5, 1, 6, 'No', '2069-12-31', '2020-09-15 14:44:37', 1, 1, 4),
(134, 'images/documentos/70382CERTIFICACION BANCARIA OBINCO (2).pdf', 10, 1, 5, 'No', '2069-12-31', '2020-10-05 08:46:11', 1, 1, 4),
(136, 'images/documentos/43803Registro Mercantil.pdf', 37, 1, 5, 'No', '2069-12-31', '2020-10-05 08:51:49', 1, 1, 4),
(137, 'images/documentos/50506COMPOSICION ACCIONARIA INCOS SAS.pdf', 35, 1, 11, 'No', '2069-12-31', '2020-10-05 09:29:38', 1, 1, 4),
(138, 'images/documentos/29444Andris Manuel Salas Cedula.pdf', 6, 1, 11, 'No', '2069-12-31', '2020-10-05 09:31:19', 1, 1, 4),
(139, 'images/documentos/24860Andris Manuel Salas Cedula.pdf', 7, 1, 11, 'No', '2069-12-31', '2020-10-05 09:34:12', 1, 1, 4),
(140, 'images/documentos/48044Tarjeta profesional Jessica.pdf', 8, 1, 11, 'No', '2069-12-31', '2020-10-05 09:34:39', 1, 1, 4),
(141, 'images/documentos/289691115605652565.pdf', 13, 1, 11, 'No', '2069-12-31', '2020-10-05 09:37:48', 1, 1, 4),
(142, 'No-Aplica', 23, 1, 11, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(143, 'No-Aplica', 36, 1, 11, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(144, 'images/documentos/79452C?mara de Comercio INCOS.pdf', 12, 1, 11, 'No', '2069-12-31', '2020-10-06 11:35:17', 1, 1, 4),
(145, 'images/documentos/50570C?mara de Comercio INCOS.pdf', 37, 1, 11, 'No', '2069-12-31', '2020-10-06 11:35:48', 1, 1, 4),
(147, 'images/documentos/570903. C?dula Representante legal Grupo Obinco S.A.S..pdf', 6, 1, 5, 'No', '2069-12-31', '2020-10-10 12:49:18', 1, 1, 4),
(149, 'images/documentos/67720Acuerdo Consorcial CDI Bolivar Ganador UT.pdf', 22, 1, 9, 'No', '2069-12-31', '2020-10-15 12:31:40', 1, 1, 4),
(151, 'images/documentos/684146. Estados Financieros Grupo Obinco S.A.S. 2019.pdf', 11, 1, 5, 'No', '2069-12-31', '2020-10-19 15:51:39', 1, 1, 4),
(153, 'images/documentos/696911. RUT Grupo Obinco.pdf', 5, 1, 5, 'No', '2069-12-31', '2020-11-20 09:07:43', 1, 1, 4),
(154, 'images/documentos/659112. C?mara de Comercio Grupo Obinco S.A.S.pdf', 12, 1, 5, 'No', '2069-12-31', '2020-11-20 09:08:17', 1, 1, 4),
(155, 'images/documentos/28568cdi bolivar avanza.pdf', 10, 1, 7, 'No', '2069-12-31', '2020-11-23 16:23:33', 1, 1, 4),
(156, 'images/documentos/3436720201123143504261.pdf', 6, 1, 7, 'No', '2069-12-31', '2020-11-23 16:24:21', 1, 1, 4),
(157, 'images/documentos/55093ut bolivar.pdf', 10, 1, 9, 'No', '2069-12-31', '2020-11-23 16:25:16', 1, 1, 4),
(158, 'No-Aplica', 8, 1, 9, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(159, 'No-Aplica', 9, 1, 9, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documentalemp`
--

CREATE TABLE `gestion_documentalemp` (
  `id_registro` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `documento_id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `gestion_estado` int(11) NOT NULL,
  `gestion_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `gestion_documentalemp`
--

INSERT INTO `gestion_documentalemp` (`id_registro`, `imagen`, `documento_id_documento`, `modulo_id_modulo`, `cuenta_id_cuenta`, `alerta`, `fecha_expiracion`, `marca_temporal`, `gestion_estado`, `gestion_publicado`, `creado_por`) VALUES
(6, 'images/documentosemp/1822920190702110659860.pdf', 26, 3, 35, 'No', '2069-12-31', '2019-07-02 10:03:57', 1, 1, 4),
(7, 'images/documentosemp/1313620190702110802348.pdf', 30, 3, 35, 'No', '2069-12-31', '2019-07-02 10:04:28', 1, 1, 4),
(8, 'images/documentosemp/158620190702110753776.pdf', 31, 3, 35, 'No', '2069-12-31', '2019-07-02 10:04:56', 1, 1, 4),
(9, 'images/documentosemp/8146520190702111329115.pdf', 27, 3, 35, 'No', '2069-12-31', '2019-07-02 10:08:34', 1, 1, 4),
(10, 'images/documentosemp/7045320190702112205871.pdf', 26, 3, 31, 'No', '2069-12-31', '2019-07-02 10:17:43', 1, 1, 4),
(12, 'images/documentosemp/4800720190702112520132.pdf', 26, 3, 32, 'No', '2069-12-31', '2019-07-02 10:21:12', 1, 1, 4),
(13, 'images/documentosemp/5526120190702112751415.pdf', 27, 3, 32, 'No', '2069-12-31', '2019-07-02 10:23:35', 1, 1, 4),
(14, 'images/documentosemp/6041520190702112800283.pdf', 30, 3, 32, 'No', '2069-12-31', '2019-07-02 10:24:08', 1, 1, 4),
(15, 'images/documentosemp/1704220190702112816805.pdf', 31, 3, 32, 'No', '2069-12-31', '2019-07-02 10:24:24', 1, 1, 4),
(16, 'images/documentosemp/8452620190702123702397.pdf', 26, 3, 33, 'No', '2069-12-31', '2019-07-02 11:33:21', 1, 1, 4),
(17, 'images/documentosemp/7138720190702123750879.pdf', 27, 3, 33, 'No', '2069-12-31', '2019-07-02 11:33:46', 1, 1, 4),
(18, 'images/documentosemp/61320190702123801301.pdf', 30, 3, 33, 'No', '2069-12-31', '2019-07-02 11:34:05', 1, 1, 4),
(19, 'images/documentosemp/5170120190702123811196.pdf', 31, 3, 33, 'No', '2069-12-31', '2019-07-02 11:34:23', 1, 1, 4),
(20, 'images/documentosemp/9604320190702124345466.pdf', 26, 3, 34, 'No', '2069-12-31', '2019-07-02 11:39:40', 1, 1, 4),
(21, 'images/documentosemp/7706620190702124353961.pdf', 27, 3, 34, 'No', '2069-12-31', '2019-07-02 11:40:20', 1, 1, 4),
(22, 'images/documentosemp/9245320190702124419389.pdf', 30, 3, 34, 'No', '2069-12-31', '2019-07-02 11:40:39', 1, 1, 4),
(23, 'images/documentosemp/7049320190702124435004.pdf', 31, 3, 34, 'No', '2069-12-31', '2019-07-02 11:40:55', 1, 1, 4),
(24, 'images/documentosemp/9211720190702124852156.pdf', 26, 3, 36, 'No', '2069-12-31', '2019-07-02 11:44:39', 1, 1, 4),
(26, 'images/documentosemp/6871620190702124913869.pdf', 30, 3, 36, 'No', '2069-12-31', '2019-07-02 11:45:23', 1, 1, 4),
(28, 'images/documentosemp/2691620190702125206806.pdf', 31, 3, 36, 'No', '2069-12-31', '2019-07-02 11:47:32', 1, 1, 4),
(29, 'images/documentosemp/1900820190702125156838.pdf', 27, 3, 36, 'No', '2069-12-31', '2019-07-02 11:48:10', 1, 1, 4),
(30, 'images/documentosemp/3225020190702125538566.pdf', 26, 3, 37, 'No', '2069-12-31', '2019-07-02 11:51:51', 1, 1, 4),
(31, 'images/documentosemp/575720190702125616914.pdf', 27, 3, 37, 'No', '2069-12-31', '2019-07-02 11:52:38', 1, 1, 4),
(32, 'images/documentosemp/3151620190702125643204.pdf', 31, 3, 37, 'No', '2069-12-31', '2019-07-02 11:53:02', 1, 1, 4),
(33, 'images/documentosemp/2542120190702125632858.pdf', 30, 3, 37, 'No', '2069-12-31', '2019-07-02 11:53:19', 1, 1, 4),
(34, 'images/documentosemp/9167120190702130033118.pdf', 26, 3, 38, 'No', '2069-12-31', '2019-07-02 11:57:06', 1, 1, 4),
(35, 'images/documentosemp/6998720190702130126008.pdf', 27, 3, 38, 'No', '2069-12-31', '2019-07-02 11:57:40', 1, 1, 4),
(36, 'images/documentosemp/2600820190702130134360.pdf', 30, 3, 38, 'No', '2069-12-31', '2019-07-02 11:58:01', 1, 1, 4),
(37, 'images/documentosemp/5475720190702130154045.pdf', 31, 3, 38, 'No', '2069-12-31', '2019-07-02 11:58:23', 1, 1, 4),
(38, 'images/documentosemp/6822320190702130202391.pdf', 29, 3, 38, 'No', '2069-12-31', '2019-07-02 11:58:46', 1, 1, 4),
(39, 'images/documentosemp/6758520190702130607710.pdf', 26, 3, 39, 'No', '2069-12-31', '2019-07-02 12:02:03', 1, 1, 4),
(40, 'images/documentosemp/6875220190702130618873.pdf', 27, 3, 39, 'No', '2069-12-31', '2019-07-02 12:02:41', 1, 1, 4),
(41, 'images/documentosemp/995420190702130627436.pdf', 30, 3, 39, 'No', '2069-12-31', '2019-07-02 12:03:05', 1, 1, 4),
(42, 'images/documentosemp/1114620190702130643774.pdf', 31, 3, 39, 'No', '2069-12-31', '2019-07-02 12:03:23', 1, 1, 4),
(43, 'images/documentosemp/7958520190702130954498.pdf', 26, 3, 40, 'No', '2069-12-31', '2019-07-02 12:06:42', 1, 1, 4),
(44, 'images/documentosemp/4889220190702131100447.pdf', 27, 3, 40, 'No', '2069-12-31', '2019-07-02 12:07:53', 1, 1, 4),
(45, 'images/documentosemp/9827820190702131108918.pdf', 29, 3, 40, 'No', '2069-12-31', '2019-07-02 12:08:21', 1, 1, 4),
(46, 'images/documentosemp/1233920190702131117338.pdf', 30, 3, 40, 'No', '2069-12-31', '2019-07-02 12:08:41', 1, 1, 4),
(47, 'images/documentosemp/3529020190702131127096.pdf', 31, 3, 40, 'No', '2069-12-31', '2019-07-02 12:09:22', 1, 1, 4),
(48, 'images/documentosemp/8355720190702131633051.pdf', 26, 3, 41, 'No', '2069-12-31', '2019-07-02 12:12:55', 1, 1, 4),
(49, 'images/documentosemp/5390120190702131706297.pdf', 27, 3, 41, 'No', '2069-12-31', '2019-07-02 12:14:54', 1, 1, 4),
(50, 'images/documentosemp/9746020190702131714910.pdf', 30, 3, 41, 'No', '2069-12-31', '2019-07-02 12:15:18', 1, 1, 4),
(51, 'images/documentosemp/9645320190702131724842.pdf', 29, 3, 41, 'No', '2069-12-31', '2019-07-02 12:15:40', 1, 1, 4),
(52, 'images/documentosemp/6174220190702131733899.pdf', 31, 3, 41, 'No', '2069-12-31', '2019-07-02 12:16:06', 1, 1, 4),
(53, 'No-Aplica', 32, 3, 40, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(54, 'images/documentosemp/5903620190702132311246.pdf', 26, 3, 42, 'No', '2069-12-31', '2019-07-02 12:20:44', 1, 1, 4),
(55, 'images/documentosemp/5861020190702132338831.pdf', 27, 3, 42, 'No', '2069-12-31', '2019-07-02 12:21:15', 1, 1, 4),
(56, 'images/documentosemp/1503320190702132655030.pdf', 30, 3, 42, 'No', '2069-12-31', '2019-07-02 12:22:01', 1, 1, 4),
(57, 'images/documentosemp/9282620190702132914575.pdf', 26, 3, 44, 'No', '2069-12-31', '2019-07-02 12:26:31', 1, 1, 4),
(58, 'images/documentosemp/1191220190702133014497.pdf', 27, 3, 44, 'No', '2069-12-31', '2019-07-02 12:26:56', 1, 1, 4),
(59, 'images/documentosemp/6705720190702133022803.pdf', 30, 3, 44, 'No', '2069-12-31', '2019-07-02 12:27:19', 1, 1, 4),
(60, 'images/documentosemp/2435320190702133032309.pdf', 31, 3, 44, 'No', '2069-12-31', '2019-07-02 12:27:41', 1, 1, 4),
(62, 'images/documentosemp/7854320190702150417572.pdf', 26, 3, 45, 'No', '2069-12-31', '2019-07-02 14:06:39', 1, 1, 4),
(63, 'images/documentosemp/3385120190702150830217.pdf', 27, 3, 45, 'No', '2069-12-31', '2019-07-02 14:07:26', 1, 1, 4),
(64, 'images/documentosemp/7223520190702150838753.pdf', 30, 3, 45, 'No', '2069-12-31', '2019-07-02 14:07:49', 1, 1, 4),
(65, 'images/documentosemp/5592220190702150850094.pdf', 29, 3, 45, 'No', '2069-12-31', '2019-07-02 14:08:11', 1, 1, 4),
(66, 'images/documentosemp/24531Cedula.pdf', 27, 3, 31, 'No', '2069-12-31', '2019-07-02 14:24:08', 1, 1, 4),
(67, 'images/documentosemp/6736120190702155240805.pdf', 28, 3, 31, 'No', '2069-12-31', '2019-07-02 14:48:01', 1, 1, 4),
(68, 'images/documentosemp/1344120190702155504530.pdf', 28, 3, 40, 'No', '2069-12-31', '2019-07-02 14:51:04', 1, 1, 4),
(69, 'images/documentosemp/9041720190702155701624.pdf', 28, 3, 45, 'No', '2069-12-31', '2019-07-02 14:52:31', 1, 1, 4),
(70, 'images/documentosemp/4551720190702163258107.pdf', 27, 3, 43, 'No', '2069-12-31', '2019-07-02 15:28:21', 1, 1, 4),
(71, 'images/documentosemp/1962620190702163306520.pdf', 30, 3, 43, 'No', '2069-12-31', '2019-07-02 15:28:49', 1, 1, 4),
(73, 'images/documentosemp/4255820190702163317517.pdf', 31, 3, 43, 'No', '2069-12-31', '2019-07-02 15:29:35', 1, 1, 4),
(74, 'images/documentosemp/337220190703090332218.pdf', 31, 3, 47, 'No', '2069-12-31', '2019-07-03 07:59:59', 1, 1, 4),
(75, 'images/documentosemp/9275720190703090807386.pdf', 26, 3, 47, 'No', '2069-12-31', '2019-07-03 08:04:20', 1, 1, 4),
(76, 'images/documentosemp/477020190703090843889.pdf', 27, 3, 47, 'No', '2069-12-31', '2019-07-03 08:05:00', 1, 1, 4),
(77, 'images/documentosemp/8329720190703090902979.pdf', 30, 3, 47, 'No', '2069-12-31', '2019-07-03 08:05:25', 1, 1, 4),
(78, 'images/documentosemp/2091720190703091311942.pdf', 26, 3, 46, 'No', '2069-12-31', '2019-07-03 08:10:25', 1, 1, 4),
(79, 'images/documentosemp/8773920190703091406434.pdf', 27, 3, 46, 'No', '2069-12-31', '2019-07-03 08:10:50', 1, 1, 4),
(80, 'images/documentosemp/7581020190703091425758.pdf', 30, 3, 46, 'No', '2069-12-31', '2019-07-03 08:11:43', 1, 1, 4),
(81, 'images/documentosemp/9773020190703091508788.pdf', 31, 3, 46, 'No', '2069-12-31', '2019-07-03 08:12:03', 1, 1, 4),
(82, 'images/documentosemp/484820190703091956390.pdf', 26, 3, 48, 'No', '2069-12-31', '2019-07-03 08:17:08', 1, 1, 4),
(83, 'images/documentosemp/6812720190703092136695.pdf', 27, 3, 48, 'No', '2069-12-31', '2019-07-03 08:17:44', 1, 1, 4),
(84, 'images/documentosemp/2505820190703092144809.pdf', 30, 3, 48, 'No', '2069-12-31', '2019-07-03 08:18:04', 1, 1, 4),
(85, 'images/documentosemp/4233220190703092154923.pdf', 31, 3, 48, 'No', '2069-12-31', '2019-07-03 08:18:22', 1, 1, 4),
(86, 'images/documentosemp/5613920190703100623184.pdf', 30, 3, 49, 'No', '2069-12-31', '2019-07-03 09:03:22', 1, 1, 4),
(87, 'images/documentosemp/9501GUILLERMO MORENO.pdf', 27, 3, 49, 'No', '2069-12-31', '2019-07-03 09:29:43', 1, 1, 4),
(88, 'images/documentosemp/97110GUILLEROMO MORENO.pdf', 31, 3, 49, 'No', '2069-12-31', '2019-07-03 10:23:05', 1, 1, 4),
(89, 'images/documentosemp/76739downloadservlet.pdf', 31, 3, 42, 'No', '2069-12-31', '2019-07-03 16:07:38', 1, 1, 4),
(90, 'images/documentosemp/6563220190704092819081.pdf', 26, 3, 50, 'No', '2069-12-31', '2019-07-04 08:24:40', 1, 1, 4),
(91, 'images/documentosemp/8227220190704092844134.pdf', 27, 3, 50, 'No', '2069-12-31', '2019-07-04 08:25:07', 1, 1, 4),
(93, 'images/documentosemp/314220190704092901440.pdf', 30, 3, 50, 'No', '2069-12-31', '2019-07-04 08:25:50', 1, 1, 4),
(94, 'images/documentosemp/8543520190704092910878.pdf', 31, 3, 50, 'No', '2069-12-31', '2019-07-04 08:26:04', 1, 1, 4),
(95, 'images/documentosemp/63142JOSE DANIEL MEZA ARL.pdf', 30, 3, 30, 'No', '2069-12-31', '2019-07-04 15:17:29', 1, 1, 4),
(96, 'images/documentosemp/98784Afiliacion Jose daniel Meza ARL.pdf', 31, 3, 30, 'No', '2069-12-31', '2019-07-05 10:01:39', 1, 1, 5),
(97, 'images/documentosemp/74074certificadoAfiliacion_C1003714938_2019-07-05T09_22_38-05_00.pdf', 30, 3, 51, 'No', '2069-12-31', '2019-07-05 10:07:39', 1, 1, 5),
(98, 'images/documentosemp/19544certificadoAfiliacion_C1108763540_2019-07-05T09_42_41-05_00.pdf', 30, 3, 52, 'No', '2069-12-31', '2019-07-05 10:08:32', 1, 1, 5),
(99, 'images/documentosemp/23934cedula andres diaz.pdf', 27, 3, 51, 'No', '2069-12-31', '2019-07-06 09:39:23', 1, 1, 4),
(100, 'images/documentosemp/3212520190706104636412.pdf', 27, 3, 52, 'No', '2069-12-31', '2019-07-06 09:41:45', 1, 1, 4),
(101, 'images/documentosemp/2772720190706105152340.pdf', 28, 3, 51, 'No', '2069-12-31', '2019-07-06 09:47:38', 1, 1, 4),
(102, 'images/documentosemp/9784520190708112853164.pdf', 27, 3, 53, 'No', '2069-12-31', '2019-07-08 10:35:07', 1, 1, 4),
(105, 'images/documentosemp/8822520190708112922362.pdf', 29, 3, 53, 'No', '2069-12-31', '2019-07-08 10:35:43', 1, 1, 4),
(106, 'images/documentosemp/7420820190708114742637.pdf', 28, 3, 52, 'No', '2069-12-31', '2019-07-08 10:43:30', 1, 1, 4),
(110, 'images/documentosemp/8386620190710184521309.pdf', 30, 3, 56, 'No', '2069-12-31', '2019-07-10 17:41:51', 1, 1, 4),
(112, 'images/documentosemp/1934020190711105716155.pdf', 31, 3, 51, 'No', '2069-12-31', '2019-07-11 09:52:34', 1, 1, 4),
(113, 'images/documentosemp/6188420190711110221265.pdf', 31, 3, 52, 'No', '2069-12-31', '2019-07-11 09:57:51', 1, 1, 4),
(114, 'images/documentosemp/84442HV LUZ MILA ZULETA GARCIA.pdf', 26, 3, 57, 'No', '2069-12-31', '2019-07-11 16:08:26', 1, 1, 4),
(115, 'images/documentosemp/7656420190711171539486.pdf', 30, 3, 57, 'No', '2069-12-31', '2019-07-11 16:10:38', 1, 1, 4),
(116, 'images/documentosemp/1984020190711171531242.pdf', 27, 3, 57, 'No', '2069-12-31', '2019-07-11 16:11:32', 1, 1, 4),
(117, 'images/documentosemp/45991Ivan Velasquez Arl (1).pdf', 30, 3, 58, 'No', '2069-12-31', '2019-07-11 16:39:04', 1, 1, 4),
(118, 'images/documentosemp/21223Afiliacion Luis Carlos Espa?oL ARL.pdf', 30, 3, 53, 'No', '2069-12-31', '2019-07-11 16:39:58', 1, 1, 4),
(119, 'images/documentosemp/575720190711190312271.pdf', 27, 3, 54, 'No', '2069-12-31', '2019-07-11 18:00:35', 1, 1, 4),
(120, 'images/documentosemp/6926820190711190320634.pdf', 30, 3, 54, 'No', '2069-12-31', '2019-07-11 18:00:56', 1, 1, 4),
(122, 'images/documentosemp/8132420190712100548983.pdf', 28, 3, 43, 'No', '2069-12-31', '2019-07-12 09:01:04', 1, 1, 4),
(123, 'images/documentosemp/6228820190712100859249.pdf', 28, 3, 41, 'No', '2069-12-31', '2019-07-12 09:03:53', 1, 1, 4),
(124, 'images/documentosemp/8593620190712101108636.pdf', 28, 3, 48, 'No', '2069-12-31', '2019-07-12 09:06:20', 1, 1, 4),
(125, 'images/documentosemp/8325120190712101329615.pdf', 28, 3, 42, 'No', '2069-12-31', '2019-07-12 09:07:42', 1, 1, 4),
(128, 'images/documentosemp/4898020190712104202006.pdf', 31, 3, 54, 'No', '2069-12-31', '2019-07-12 09:40:36', 1, 1, 4),
(129, 'images/documentosemp/7966520190712104950329.pdf', 26, 3, 56, 'No', '2069-12-31', '2019-07-12 09:45:19', 1, 1, 4),
(130, 'images/documentosemp/723520190712104959073.pdf', 27, 3, 56, 'No', '2069-12-31', '2019-07-12 09:45:46', 1, 1, 4),
(131, 'images/documentosemp/20732Escaneo1.jpg', 29, 3, 56, 'No', '2069-12-31', '2019-07-12 09:48:42', 1, 1, 4),
(132, 'images/documentosemp/2924620190712114605745.pdf', 31, 3, 56, 'No', '2069-12-31', '2019-07-12 10:41:59', 1, 1, 4),
(133, 'images/documentosemp/52637hoja de vida jader.pdf', 26, 3, 59, 'No', '2069-12-31', '2019-07-13 08:25:40', 1, 1, 4),
(134, 'images/documentosemp/5935320190713093143753.pdf', 27, 3, 59, 'No', '2069-12-31', '2019-07-13 08:26:43', 1, 1, 4),
(135, 'images/documentosemp/5533620190713093010884.pdf', 30, 3, 59, 'No', '2069-12-31', '2019-07-13 08:27:06', 1, 1, 4),
(136, 'images/documentosemp/6730720190715155851864.pdf', 31, 3, 57, 'No', '2069-12-31', '2019-07-15 14:55:13', 1, 1, 4),
(137, 'images/documentosemp/3768520190718164802770.pdf', 28, 3, 33, 'No', '2069-12-31', '2019-07-18 15:47:38', 1, 1, 4),
(139, 'images/documentosemp/8360certificadoAfiliacion_C78036287_2019-07-22T09_45_07-05_00.pdf', 30, 3, 61, 'No', '2069-12-31', '2019-07-22 09:47:57', 1, 1, 4),
(142, 'images/documentosemp/59132Luis Villalba 23-07-2019.pdf', 31, 3, 61, 'No', '2069-12-31', '2019-07-23 10:29:45', 1, 1, 4),
(143, 'images/documentosemp/1932120190725085938761.pdf', 28, 3, 54, 'No', '2069-12-31', '2019-07-25 07:56:50', 1, 1, 4),
(144, 'images/documentosemp/7819020190725090037828.pdf', 28, 3, 53, 'No', '2069-12-31', '2019-07-25 07:57:29', 1, 1, 4),
(145, 'images/documentosemp/77149KEVIN JIMENEZ - CELADOR OBINCO.pdf', 30, 3, 60, 'No', '2069-12-31', '2019-07-25 08:35:33', 1, 1, 4),
(146, 'images/documentosemp/2303620190726115804433.pdf', 30, 3, 63, 'No', '2069-12-31', '2019-07-30 10:02:25', 1, 1, 4),
(147, 'images/documentosemp/5000820190726115812690.pdf', 30, 3, 64, 'No', '2069-12-31', '2019-07-30 10:03:06', 1, 1, 4),
(149, 'images/documentosemp/64564WhatsApp Image 2019-08-08 at 8.09.24 AM.jpeg', 27, 3, 65, 'No', '2069-12-31', '2019-08-08 17:40:24', 1, 1, 4),
(150, 'images/documentosemp/3467220190808184418336.pdf', 30, 3, 65, 'No', '2069-12-31', '2019-08-08 17:39:50', 1, 1, 4),
(151, 'images/documentosemp/80581certificadoAfiliacion_C4023806_2019-08-20T15_14_48-05_00.pdf', 30, 3, 66, 'No', '2069-12-31', '2019-08-20 15:16:44', 1, 1, 4),
(152, 'images/documentosemp/3919120190820164520534.pdf', 26, 3, 66, 'No', '2069-12-31', '2019-08-20 15:43:29', 1, 1, 4),
(153, 'images/documentosemp/2197120190820164528601.pdf', 27, 3, 66, 'No', '2069-12-31', '2019-08-20 15:44:20', 1, 1, 4),
(154, 'images/documentosemp/6493720190820164537583.pdf', 29, 3, 66, 'No', '2069-12-31', '2019-08-20 15:45:02', 1, 1, 4),
(155, 'images/documentosemp/3258520190820170009254.pdf', 31, 3, 65, 'No', '2069-12-31', '2019-08-20 15:54:36', 1, 1, 4),
(156, 'images/documentosemp/93678WhatsApp Image 2019-08-30 at 7.20.01 AM.jpeg', 26, 3, 67, 'No', '2069-12-31', '2019-08-30 07:24:46', 1, 1, 4),
(157, 'images/documentosemp/39111certificadoAfiliacion_C73168016_2019-08-30T07_21_34-05_00.pdf', 30, 3, 67, 'No', '2069-12-31', '2019-08-30 07:25:02', 1, 1, 4),
(158, 'images/documentosemp/65893WhatsApp Image 2019-08-30 at 7.18.27 AM.jpeg', 27, 3, 67, 'No', '2069-12-31', '2019-08-30 07:25:25', 1, 1, 4),
(159, 'images/documentosemp/843174004091447.pdf', 31, 3, 67, 'No', '2069-12-31', '2019-09-17 10:00:20', 1, 1, 4),
(160, 'images/documentosemp/9437620190917111010302.pdf', 31, 3, 66, 'No', '2069-12-31', '2019-09-17 10:04:34', 1, 1, 4),
(161, 'images/documentosemp/24795certificadoAfiliacion_C92278060_2019-09-23T17_13_28-05_00.pdf', 30, 3, 69, 'No', '2069-12-31', '2019-09-23 17:15:17', 1, 1, 4),
(162, 'images/documentosemp/8606420190922150220420 (2).pdf', 27, 3, 69, 'No', '2069-12-31', '2019-09-23 17:15:43', 1, 1, 4),
(163, 'images/documentosemp/64783WhatsApp Image 2019-09-23 at 10.06.00 AM.jpeg', 31, 3, 64, 'Si', '2069-12-31', '2019-09-23 17:40:02', 1, 1, 4),
(164, 'images/documentosemp/2454Nuevo doc 2019-09-17 17.14.53_20190917171748.pdf', 27, 3, 64, 'No', '2069-12-31', '2019-09-23 17:40:51', 1, 1, 4),
(165, 'images/documentosemp/7925Nuevo doc 2019-09-18 08.37.31_20190918083755.pdf', 27, 3, 63, 'No', '2069-12-31', '2019-09-23 17:41:32', 1, 1, 4),
(166, 'images/documentosemp/47707WhatsApp Image 2019-09-23 at 10.06.00 AM (1).jpeg', 31, 3, 63, 'No', '2069-12-31', '2019-09-23 17:41:50', 1, 1, 4),
(167, 'images/documentosemp/76877ivan (1).pdf', 27, 3, 58, 'No', '2069-12-31', '2019-09-24 08:28:04', 1, 1, 4),
(168, 'images/documentosemp/4305920190927103925804.pdf', 31, 3, 58, 'No', '2069-12-31', '2019-09-27 09:35:49', 1, 1, 4),
(169, 'images/documentosemp/2557220190927103850726.pdf', 31, 3, 69, 'No', '2069-12-31', '2019-09-27 09:36:45', 1, 1, 4),
(170, 'images/documentosemp/83778cedula.pdf', 27, 3, 70, 'No', '2069-12-31', '2019-10-05 08:24:58', 1, 1, 4),
(171, 'images/documentosemp/84531certificadoAfiliacion_C12687261_2019-10-03T16_07_46-05_00 (2).pdf', 30, 3, 70, 'No', '2069-12-31', '2019-10-05 08:25:22', 1, 1, 4),
(172, 'images/documentosemp/5524DOC-20190905-WA0005 (1).pdf', 26, 3, 70, 'No', '2069-12-31', '2019-10-05 08:25:59', 1, 1, 4),
(173, 'images/documentosemp/97886Hoja de vida 10.09.2018 (1).pdf', 26, 3, 71, 'No', '2069-12-31', '2019-10-08 11:46:22', 1, 1, 4),
(174, 'images/documentosemp/60292Cedula (1).pdf', 27, 3, 71, 'No', '2069-12-31', '2019-10-08 11:46:40', 1, 1, 4),
(176, 'images/documentosemp/328251143340574_RB201905241042.pdf', 29, 3, 71, 'No', '2069-12-31', '2019-10-08 11:53:17', 1, 1, 4),
(177, 'images/documentosemp/93706certificadoAfiliacion_C1143340574_2019-10-08T11_42_15-05_00.pdf', 30, 3, 71, 'No', '2069-12-31', '2019-10-08 11:46:56', 1, 1, 4),
(178, 'images/documentosemp/30334certificadoAfiliacion_C1108766597_2019-10-15T17_04_42-05_00.pdf', 30, 3, 72, 'No', '2069-12-31', '2019-10-19 08:41:36', 1, 1, 9),
(179, 'images/documentosemp/50800cedula.pdf', 27, 3, 72, 'No', '2069-12-31', '2019-10-19 08:46:18', 1, 1, 9),
(181, 'images/documentosemp/12728Escaneo 31-10-2019 (2).pdf', 29, 3, 72, 'No', '2069-12-31', '2019-10-31 09:11:13', 1, 1, 9),
(182, 'images/documentosemp/41190constanciaAfiliacionTrabajador (11).pdf', 30, 3, 73, 'No', '2069-12-31', '2019-12-19 11:10:20', 1, 1, 4),
(183, 'images/documentosemp/12850constanciaAfiliacionTrabajador (12).pdf', 30, 3, 74, 'No', '2069-12-31', '2019-12-19 11:11:27', 1, 1, 4),
(184, 'images/documentosemp/77503constanciaAfiliacionTrabajador (13).pdf', 30, 3, 75, 'No', '2069-12-31', '2019-12-19 11:12:30', 1, 1, 4),
(185, 'images/documentosemp/46522constanciaAfiliacionTrabajador (14).pdf', 30, 3, 76, 'No', '2069-12-31', '2019-12-19 11:13:33', 1, 1, 4),
(186, 'images/documentosemp/64813constanciaAfiliacionTrabajador (15).pdf', 30, 3, 77, 'No', '2069-12-31', '2019-12-19 11:14:11', 1, 1, 4),
(187, 'images/documentosemp/45024constanciaAfiliacionTrabajador (16).pdf', 30, 3, 78, 'No', '2069-12-31', '2019-12-19 11:16:49', 1, 1, 4),
(188, 'images/documentosemp/68552constanciaAfiliacionTrabajador (17).pdf', 30, 3, 79, 'No', '2069-12-31', '2019-12-19 11:18:08', 1, 1, 4),
(189, 'images/documentosemp/53005constanciaAfiliacionTrabajador (18).pdf', 30, 3, 80, 'No', '2069-12-31', '2019-12-19 11:18:47', 1, 1, 4),
(190, 'images/documentosemp/29599certificadoAfiliacion_C1101814571_2019-12-18T14_55_10-05_00 (1).pdf', 30, 3, 81, 'No', '2069-12-31', '2019-12-19 11:19:55', 1, 1, 4),
(191, 'images/documentosemp/6916ARL.pdf', 30, 3, 82, 'No', '2069-12-31', '2019-12-19 11:20:31', 1, 1, 4),
(192, 'images/documentosemp/77843ARL.pdf', 30, 3, 84, 'No', '2069-12-31', '2019-12-19 11:21:56', 1, 1, 4),
(193, 'images/documentosemp/74948constanciaAfiliacionTrabajador (19).pdf', 30, 3, 83, 'No', '2069-12-31', '2019-12-19 11:22:57', 1, 1, 4),
(194, 'images/documentosemp/51859Screenshot_20191220-125306_CamScanner.jpg', 29, 3, 75, 'No', '2069-12-31', '2019-12-20 12:53:34', 1, 1, 12),
(195, 'images/documentosemp/13042Screenshot_20191221-095949_CamScanner.jpg', 29, 3, 77, 'No', '2069-12-31', '2019-12-21 09:58:25', 1, 1, 12),
(196, 'images/documentosemp/23711certificadoAfiliacion_C1005990511_2019-12-21T09_43_24-05_00 (2).pdf', 30, 3, 85, 'No', '2069-12-31', '2019-12-26 11:36:50', 1, 1, 4),
(197, 'images/documentosemp/26851certificadoAfiliacion_C1051446092_2019-12-26T11_48_38-05_00.pdf', 30, 3, 86, 'No', '2069-12-31', '2019-12-26 11:48:59', 1, 1, 4),
(198, 'images/documentosemp/61893Screenshot_20191227-094431_CamScanner.jpg', 31, 3, 79, 'No', '2069-12-31', '2019-12-27 09:45:36', 1, 1, 12),
(199, 'images/documentosemp/50415Screenshot_20191227-095040_CamScanner.jpg', 31, 3, 82, 'No', '2069-12-31', '2019-12-27 09:48:49', 1, 1, 12),
(200, 'images/documentosemp/78133Screenshot_20191227-103738_CamScanner.jpg', 27, 3, 84, 'No', '2069-12-31', '2019-12-27 10:36:56', 1, 1, 12),
(201, 'images/documentosemp/87203Screenshot_20191227-103807_CamScanner.jpg', 31, 3, 84, 'No', '2069-12-31', '2019-12-27 10:38:57', 1, 1, 12),
(203, 'images/documentosemp/2096Screenshot_20191227-104411_CamScanner.jpg', 31, 3, 81, 'No', '2069-12-31', '2019-12-27 10:44:54', 1, 1, 12),
(204, 'images/documentosemp/39280Screenshot_20191227-105040_Word.jpg', 29, 3, 81, 'No', '2069-12-31', '2019-12-27 10:50:56', 1, 1, 12),
(206, 'images/documentosemp/56883Screenshot_20191227-105752_CamScanner.jpg', 29, 3, 82, 'No', '2069-12-31', '2019-12-27 10:58:56', 1, 1, 12),
(207, 'images/documentosemp/34116Screenshot_20191227-105745_CamScanner.jpg', 29, 3, 76, 'No', '2069-12-31', '2019-12-27 10:59:52', 1, 1, 12),
(208, 'images/documentosemp/42827Screenshot_20191227-105758_CamScanner.jpg', 29, 3, 84, 'No', '2069-12-31', '2019-12-27 11:01:10', 1, 1, 12),
(210, 'images/documentosemp/74117Screenshot_20191227-105721_CamScanner.jpg', 29, 3, 79, 'No', '2069-12-31', '2019-12-27 11:07:34', 1, 1, 12),
(211, 'images/documentosemp/80428Screenshot_20191227-105702_CamScanner.jpg', 29, 3, 80, 'No', '2069-12-31', '2019-12-27 11:10:56', 1, 1, 12),
(212, 'images/documentosemp/82074Screenshot_20191227-122108_CamScanner.jpg', 27, 3, 77, 'No', '2069-12-31', '2019-12-27 12:19:55', 1, 1, 12),
(213, 'images/documentosemp/98691Screenshot_20191227-122116_CamScanner.jpg', 31, 3, 77, 'No', '2069-12-31', '2019-12-27 12:22:25', 1, 1, 12),
(214, 'images/documentosemp/31032Screenshot_20191227-122809_CamScanner.jpg', 31, 3, 76, 'No', '2069-12-31', '2019-12-27 12:28:35', 1, 1, 12),
(216, 'images/documentosemp/53597Screenshot_20191227-104131_CamScanner.jpg', 31, 3, 86, 'No', '2069-12-31', '2019-12-27 15:37:44', 1, 1, 12),
(217, 'images/documentosemp/60968Screenshot_20191230-080202_CamScanner.jpg', 30, 3, 31, 'No', '2069-12-31', '2019-12-30 08:02:13', 1, 1, 12),
(218, 'images/documentosemp/15796Screenshot_20191230-082957_CamScanner.jpg', 31, 3, 72, 'No', '2069-12-31', '2019-12-30 08:31:00', 1, 1, 12),
(219, 'images/documentosemp/66465Screenshot_20191230-090952_CamScanner.jpg', 29, 3, 52, 'No', '2069-12-31', '2019-12-30 09:10:22', 1, 1, 12),
(220, 'images/documentosemp/56416Screenshot_20191230-094435_CamScanner.jpg', 31, 3, 75, 'No', '2069-12-31', '2019-12-30 09:45:08', 1, 1, 12),
(221, 'images/documentosemp/90879Screenshot_20191230-094951_CamScanner.jpg', 27, 3, 75, 'No', '2069-12-31', '2019-12-30 09:50:10', 1, 1, 12),
(222, 'images/documentosemp/58549IMG-20191230-WA0046.jpg', 31, 3, 85, 'No', '2069-12-31', '2019-12-30 15:55:54', 1, 1, 12),
(223, 'images/documentosemp/22196Screenshot_20200104-100120_CamScanner.jpg', 27, 3, 73, 'No', '2069-12-31', '2020-01-04 10:03:15', 1, 1, 12),
(224, 'images/documentosemp/97955Screenshot_20200104-104319_CamScanner.jpg', 27, 3, 79, 'No', '2069-12-31', '2020-01-04 10:45:08', 1, 1, 12),
(227, 'images/documentosemp/85944Dzajith acosta garcia_compressed.pdf', 28, 3, 69, 'No', '2069-12-31', '2020-01-09 09:55:50', 1, 1, 12),
(228, 'images/documentosemp/30252franglin Herrera sarmiento_compressed.pdf', 28, 3, 63, 'No', '2069-12-31', '2020-01-09 10:00:52', 1, 1, 12),
(229, 'images/documentosemp/99260Ivan velasquez hoyos_compressed.pdf', 28, 3, 58, 'No', '2069-12-31', '2020-01-09 13:40:37', 1, 1, 12),
(230, 'images/documentosemp/7482Juan ?lvarez garc?s_compressed.pdf', 28, 3, 75, 'No', '2069-12-31', '2020-01-09 13:43:49', 1, 1, 12),
(232, 'images/documentosemp/14562Manuel Ruiz_compressed.pdf', 28, 3, 32, 'No', '2069-12-31', '2020-01-09 13:46:12', 1, 1, 12),
(233, 'images/documentosemp/45144Rafael Hern?ndez_compressed.pdf', 28, 3, 39, 'No', '2069-12-31', '2020-01-09 13:47:11', 1, 1, 12),
(234, 'images/documentosemp/59136Ram?n ?lvarez Garc?s_compressed.pdf', 28, 3, 77, 'No', '2069-12-31', '2020-01-09 13:48:29', 1, 1, 12),
(235, 'images/documentosemp/89155Ra?l vergara_compressed.pdf', 28, 3, 46, 'No', '2069-12-31', '2020-01-09 13:49:51', 1, 1, 12),
(236, 'images/documentosemp/52161Roger Pe?a carrascal_compressed.pdf', 28, 3, 79, 'No', '2069-12-31', '2020-01-09 13:50:44', 1, 1, 12),
(237, 'images/documentosemp/6270H. Adri?n Hern?ndez Arrieta.pdf', 26, 3, 72, 'No', '2069-12-31', '2020-01-09 15:39:48', 1, 1, 12),
(238, 'images/documentosemp/39678H. ?lvaro Polo.pdf', 26, 3, 76, 'No', '2069-12-31', '2020-01-09 15:41:38', 1, 1, 12),
(239, 'images/documentosemp/18254?lvaro polo.pdf', 28, 3, 76, 'No', '2069-12-31', '2020-01-09 15:42:09', 1, 1, 12),
(240, 'images/documentosemp/46094H. Armando Carrascal.pdf', 26, 3, 65, 'No', '2069-12-31', '2020-01-09 15:43:53', 1, 1, 12),
(241, 'images/documentosemp/83665H. Delys Rodr?guez.pdf', 26, 3, 81, 'No', '2069-12-31', '2020-01-09 15:48:07', 1, 1, 12),
(242, 'images/documentosemp/72714H. Ever marmolejo.pdf', 26, 3, 52, 'No', '2069-12-31', '2020-01-09 15:49:56', 1, 1, 12),
(243, 'images/documentosemp/73880H. Hugo Guerra Barrios.pdf', 26, 3, 82, 'No', '2069-12-31', '2020-01-09 15:51:06', 1, 1, 12),
(244, 'images/documentosemp/83610H. Juan ?lvarez Garc?s.pdf', 26, 3, 75, 'No', '2069-12-31', '2020-01-09 15:52:04', 1, 1, 12),
(245, 'images/documentosemp/69143H. Juan Mart?nez Banquez.pdf', 26, 3, 85, 'No', '2069-12-31', '2020-01-09 15:54:33', 1, 1, 12),
(246, 'images/documentosemp/1016H. Luis villalba durango.pdf', 26, 3, 61, 'No', '2069-12-31', '2020-01-09 15:56:44', 1, 1, 12),
(247, 'images/documentosemp/49282H. Ramon Alvarez Garc?s.pdf', 26, 3, 77, 'No', '2069-12-31', '2020-01-09 15:58:00', 1, 1, 12),
(248, 'images/documentosemp/93733H. Rodolfo D?az.pdf', 26, 3, 80, 'No', '2069-12-31', '2020-01-09 15:58:55', 1, 1, 12),
(249, 'images/documentosemp/33191H. Victor Vergara.pdf', 26, 3, 74, 'No', '2069-12-31', '2020-01-09 16:01:43', 1, 1, 12),
(250, 'images/documentosemp/97422NuevoDocumento 2020-01-09 16.40.23.pdf', 27, 3, 74, 'No', '2069-12-31', '2020-01-09 16:43:49', 1, 1, 12),
(251, 'images/documentosemp/83056certificadoAfiliacion_C1118856918_2020-01-10T15_28_00-05_00.pdf', 30, 3, 88, 'No', '2069-12-31', '2020-01-10 15:34:28', 1, 1, 12),
(252, 'images/documentosemp/6469certificadoAfiliacion_C1108762458_2020-01-14T14_56_43-05_00.pdf', 30, 3, 89, 'No', '2069-12-31', '2020-01-14 14:57:29', 1, 1, 4),
(253, 'images/documentosemp/56951WhatsApp Image 2020-01-14 at 2.11.35 PM (1).jpeg', 27, 3, 89, 'No', '2069-12-31', '2020-01-14 14:58:10', 1, 1, 4),
(256, 'images/documentosemp/30435certificacion yeison.pdf', 34, 3, 93, 'No', '2069-12-31', '2020-06-24 14:24:20', 1, 1, 12),
(260, 'images/documentosemp/70214certificacion yeison.pdf', 29, 3, 93, 'No', '2069-12-31', '2020-07-14 15:19:01', 1, 1, 12),
(262, 'images/documentosemp/36155cedula yeison.pdf', 27, 3, 93, 'No', '2069-12-31', '2020-07-14 16:33:18', 1, 1, 12),
(263, 'images/documentosemp/2828certi bancaria juan sebas martinez.pdf', 29, 3, 85, 'No', '2069-12-31', '2020-07-15 08:46:26', 1, 1, 12),
(264, 'images/documentosemp/77882CEDULA GERLIN.pdf', 27, 3, 97, 'No', '2069-12-31', '2020-09-02 15:54:57', 1, 1, 12),
(265, 'images/documentosemp/99477ARL GERLIN.pdf', 30, 3, 97, 'No', '2069-12-31', '2020-09-02 15:56:19', 1, 1, 12),
(267, 'No-Aplica', 33, 3, 97, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(268, 'images/documentosemp/94755ARL JOSE ANTONIO.pdf', 27, 3, 101, 'No', '2069-12-31', '2020-09-02 16:46:02', 1, 1, 12),
(269, 'images/documentosemp/26303ARL JOSE ANTONIO.pdf', 30, 3, 101, 'No', '2069-12-31', '2020-09-02 16:47:51', 1, 1, 12),
(271, 'No-Aplica', 33, 3, 92, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(272, 'images/documentosemp/15762certificado ARL evelio.pdf', 30, 3, 100, 'No', '2069-12-31', '2020-09-22 16:48:43', 1, 1, 12),
(273, 'images/documentosemp/31207CERTIFICACCION BANCARIA EBELIO.pdf', 29, 3, 100, 'No', '2069-12-31', '2020-09-22 16:51:40', 1, 1, 12),
(275, 'images/documentosemp/54942CEDULA ALVARO POLO.jpg', 27, 3, 76, 'No', '2069-12-31', '2020-09-22 17:06:59', 1, 1, 12),
(276, 'images/documentosemp/10314ALBEIRO CARDONA HERNANDEZ ARL.pdf', 30, 3, 116, 'No', '2069-12-31', '2020-09-28 12:43:03', 1, 1, 12),
(277, 'images/documentosemp/60491EPS GUSTAVO GAEANO GONZALEZ.pdf', 31, 3, 115, 'No', '2069-12-31', '2020-09-28 13:09:49', 1, 1, 12),
(278, 'images/documentosemp/23037GUSTAVO GALENO GONZALEZ.pdf', 30, 3, 115, 'No', '2069-12-31', '2020-09-28 13:15:19', 1, 1, 12),
(279, 'images/documentosemp/10811CERTIFICACION BANCARIA JOSE RIVERA.pdf', 29, 3, 101, 'No', '2069-12-31', '2020-09-28 13:23:47', 1, 1, 12),
(280, 'images/documentosemp/45528EXAMENES MED JOSE RIVERA.pdf', 33, 3, 101, 'No', '2069-12-31', '2020-09-28 13:25:17', 1, 1, 12),
(281, 'images/documentosemp/1102salud jose correa.pdf', 31, 3, 101, 'No', '2069-12-31', '2020-09-28 13:27:13', 1, 1, 12),
(282, 'images/documentosemp/95361CERTIFICACION BANCARIA GERLIN PELUFO.pdf', 29, 3, 97, 'No', '2069-12-31', '2020-10-01 08:22:08', 1, 1, 12),
(283, 'images/documentosemp/69515eps gerlin.pdf', 31, 3, 97, 'No', '2069-12-31', '2020-10-01 11:34:31', 1, 1, 12),
(285, 'images/documentosemp/97193ARL ESNOIDER OLIVERO.pdf', 30, 3, 102, 'No', '2069-12-31', '2020-10-01 13:34:22', 1, 1, 12),
(286, 'images/documentosemp/498EXAMEN MED EBELIO HERNANDEZ.pdf', 33, 3, 100, 'No', '2069-12-31', '2020-10-01 14:19:58', 1, 1, 12),
(287, 'images/documentosemp/10443CONTATO OBER JULIO.pdf', 28, 3, 66, 'No', '2069-12-31', '2020-10-15 14:56:13', 1, 1, 12),
(289, 'images/documentosemp/61592CONTRATO RIGOBERTO.pdf', 28, 3, 84, 'No', '2069-12-31', '2020-10-15 16:04:48', 1, 1, 12),
(290, 'images/documentosemp/46213CONTRATO ADRIAN.pdf', 28, 3, 72, 'No', '2069-12-31', '2020-10-16 09:45:08', 1, 1, 12),
(291, 'images/documentosemp/31212CONTRATO ERIKC.pdf', 28, 3, 88, 'No', '2069-12-31', '2020-10-16 09:49:07', 1, 1, 12),
(292, 'images/documentosemp/43691CONTRATO BIDDIO.pdf', 28, 3, 56, 'No', '2069-12-31', '2020-10-16 09:55:41', 1, 1, 12),
(293, 'images/documentosemp/83917CONTRATO ARMANDO.pdf', 28, 3, 65, 'No', '2069-12-31', '2020-10-16 11:38:50', 1, 1, 12),
(294, 'images/documentosemp/74902contrato antoni.pdf', 28, 3, 64, 'No', '2069-12-31', '2020-10-16 11:46:23', 1, 1, 12),
(296, 'images/documentosemp/93548CONTRATO LUIS VILLALBA.pdf', 28, 3, 61, 'No', '2069-12-31', '2020-10-16 11:51:23', 1, 1, 12),
(297, 'images/documentosemp/87995CONTRATO LUIS CONTRERAS.pdf', 28, 3, 36, 'No', '2069-12-31', '2020-10-16 11:54:37', 1, 1, 12),
(299, 'images/documentosemp/52054CONTRATO LUIS AZNATE.pdf', 28, 3, 34, 'No', '2069-12-31', '2020-10-16 12:01:24', 1, 1, 12),
(300, 'images/documentosemp/44185CONTRATO LUIS JULIO.pdf', 28, 3, 50, 'No', '2069-12-31', '2020-10-16 12:05:44', 1, 1, 12),
(301, 'images/documentosemp/32843CONTRATO JUANSE.pdf', 28, 3, 85, 'No', '2069-12-31', '2020-10-16 15:21:42', 1, 1, 12),
(302, 'images/documentosemp/1679ced juanse.pdf', 27, 3, 85, 'No', '2069-12-31', '2020-10-16 15:23:53', 1, 1, 12),
(303, 'images/documentosemp/48675arl katia.pdf', 30, 3, 92, 'No', '2069-12-31', '2020-10-17 08:47:05', 1, 1, 12),
(304, 'images/documentosemp/52626certi bancaria katia.pdf', 29, 3, 92, 'No', '2069-12-31', '2020-10-17 08:48:33', 1, 1, 12),
(305, 'images/documentosemp/55799CONTRATO GERLIN.pdf', 28, 3, 97, 'No', '2069-12-31', '2020-10-21 08:24:50', 1, 1, 12),
(306, 'images/documentosemp/51206HOJA DE VIDA GERLIN 2-1.pdf', 26, 3, 97, 'No', '2069-12-31', '2020-10-21 08:29:17', 1, 1, 12),
(307, 'images/documentosemp/28348CONTRATO JOHN JANI MORENO.pdf', 28, 3, 106, 'No', '2069-12-31', '2020-10-21 08:41:28', 1, 1, 12),
(309, 'images/documentosemp/57033CERTIFICACION BANCARIA JOHN MORENO.jpg', 29, 3, 106, 'No', '2069-12-31', '2020-10-21 09:09:31', 1, 1, 12),
(310, 'images/documentosemp/694eps john moreno.pdf', 31, 3, 106, 'No', '2069-12-31', '2020-10-21 09:18:03', 1, 1, 12),
(311, 'images/documentosemp/12725JOHN MORENO ARL.pdf', 30, 3, 106, 'No', '2069-12-31', '2020-10-21 09:41:33', 1, 1, 12),
(312, 'images/documentosemp/62629arl deibis pe?ate bravo.pdf', 30, 3, 103, 'No', '2069-12-31', '2020-10-21 16:28:15', 1, 1, 12),
(313, 'images/documentosemp/71234cedula deibis bravo.pdf', 27, 3, 103, 'No', '2069-12-31', '2020-10-21 16:32:05', 1, 1, 12),
(314, 'images/documentosemp/63533CONTRATO JOSE RIVERA.pdf', 28, 3, 101, 'No', '2069-12-31', '2020-10-21 16:39:57', 1, 1, 12),
(315, 'images/documentosemp/53501contrato esnoider oliveros.pdf', 28, 3, 102, 'No', '2069-12-31', '2020-10-21 16:43:09', 1, 1, 12),
(316, 'images/documentosemp/84503CONTRATO KATIA ALVAREZ.pdf', 28, 3, 92, 'No', '2069-12-31', '2020-10-22 13:53:47', 1, 1, 12),
(317, 'No-Aplica', 33, 3, 36, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(318, 'images/documentosemp/87638cer ban luis c.pdf', 29, 3, 36, 'No', '2069-12-31', '2020-10-22 15:26:42', 1, 1, 12),
(320, 'images/documentosemp/40107ced wilmer.pdf', 27, 3, 90, 'No', '2069-12-31', '2020-10-23 11:21:52', 1, 1, 12),
(321, 'images/documentosemp/14576hv  wilmer.pdf', 26, 3, 90, 'No', '2069-12-31', '2020-10-23 11:23:21', 1, 1, 12),
(322, 'No-Aplica', 33, 3, 90, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(323, 'No-Aplica', 33, 3, 33, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(324, 'No-Aplica', 33, 3, 34, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(325, 'No-Aplica', 33, 3, 39, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(326, 'images/documentosemp/82235cer bancariarafael.jpg', 29, 3, 39, 'No', '2069-12-31', '2020-10-23 11:49:04', 1, 1, 12),
(327, 'No-Aplica', 33, 3, 43, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(328, 'No-Aplica', 33, 3, 46, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(329, 'No-Aplica', 33, 3, 47, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(330, 'images/documentosemp/22694CONTRATO CARLOS DIAZ.pdf', 28, 3, 47, 'No', '2069-12-31', '2020-10-23 14:25:58', 1, 1, 12),
(331, 'No-Aplica', 33, 3, 56, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(332, 'No-Aplica', 33, 3, 50, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(333, 'No-Aplica', 33, 3, 61, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(334, 'images/documentosemp/77604ced luis.pdf', 27, 3, 61, 'No', '2069-12-31', '2020-10-23 14:40:41', 1, 1, 12),
(335, 'No-Aplica', 33, 3, 64, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(336, 'No-Aplica', 33, 3, 65, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(337, 'No-Aplica', 33, 3, 66, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(338, 'No-Aplica', 33, 3, 72, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(339, 'No-Aplica', 33, 3, 80, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(340, 'images/documentosemp/92472ced rodolfo.pdf', 27, 3, 80, 'No', '2069-12-31', '2020-10-23 15:02:10', 1, 1, 12),
(341, 'images/documentosemp/22043CONTRATO RODOLFO.pdf', 28, 3, 80, 'No', '2069-12-31', '2020-10-23 15:04:19', 1, 1, 12),
(342, 'No-Aplica', 33, 3, 84, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(343, 'No-Aplica', 33, 3, 85, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(344, 'No-Aplica', 33, 3, 86, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(345, 'images/documentosemp/84047CONTRATO PEDRO.pdf', 28, 3, 86, 'No', '2069-12-31', '2020-10-23 15:17:19', 1, 1, 12),
(346, 'images/documentosemp/77896ced pedro (1).jpg', 27, 3, 86, 'No', '2069-12-31', '2020-10-23 15:26:00', 1, 1, 12),
(347, 'images/documentosemp/33457hv pedro (1).pdf', 26, 3, 86, 'No', '2069-12-31', '2020-10-23 15:33:39', 1, 1, 12),
(348, 'No-Aplica', 33, 3, 88, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(349, 'images/documentosemp/37074eps erick.pdf', 31, 3, 88, 'No', '2069-12-31', '2020-10-23 15:42:46', 1, 1, 12),
(350, 'images/documentosemp/414ced erick.pdf', 27, 3, 88, 'No', '2069-12-31', '2020-10-23 15:45:20', 1, 1, 12),
(351, 'images/documentosemp/26518arl wilmer oliveros.pdf', 30, 3, 90, 'No', '2069-12-31', '2020-10-23 15:55:56', 1, 1, 12),
(353, 'images/documentosemp/42166cc katiaPersonal.pdf', 27, 3, 92, 'No', '2069-12-31', '2020-10-23 16:12:53', 1, 1, 12),
(354, 'images/documentosemp/74036HOJA DE VIDA 2019 Katia Marcela Alvarez.pdf', 26, 3, 92, 'No', '2069-12-31', '2020-10-23 16:14:20', 1, 1, 12),
(355, 'images/documentosemp/86596ced ebelio.pdf', 27, 3, 100, 'No', '2069-12-31', '2020-10-24 09:21:39', 1, 1, 12),
(356, 'images/documentosemp/23427CER BANCA GUSTAVO GALEANO.pdf', 29, 3, 115, 'No', '2069-12-31', '2020-10-26 12:10:58', 1, 1, 12),
(357, 'images/documentosemp/76890hv gustavo galeano.pdf', 26, 3, 115, 'No', '2069-12-31', '2020-10-26 12:11:44', 1, 1, 12),
(358, 'images/documentosemp/13535ced gustavo galeano.pdf', 27, 3, 115, 'No', '2069-12-31', '2020-10-26 12:12:48', 1, 1, 12),
(359, 'No-Aplica', 33, 3, 115, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(360, 'images/documentosemp/76988Contrato Gustavo galeano.pdf', 28, 3, 115, 'No', '2069-12-31', '2020-10-26 13:44:11', 1, 1, 12),
(361, 'No-Aplica', 29, 3, 47, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(362, 'No-Aplica', 29, 3, 43, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(363, 'images/documentosemp/51964hv ebelio (2).pdf', 26, 3, 100, 'No', '2069-12-31', '2020-10-27 08:59:52', 1, 1, 12),
(364, 'images/documentosemp/6088contrato ebelio.pdf', 28, 3, 100, 'No', '2069-12-31', '2020-10-27 09:00:54', 1, 1, 12),
(365, 'images/documentosemp/55206CERTI BANC RAUL.pdf', 29, 3, 46, 'No', '2069-12-31', '2020-10-27 09:40:47', 1, 1, 12),
(366, 'images/documentosemp/46899contrato wilmer.pdf', 28, 3, 90, 'No', '2069-12-31', '2020-10-27 10:25:07', 1, 1, 12),
(367, 'images/documentosemp/64350AR ELVIS PEREZ.pdf', 30, 3, 122, 'No', '2069-12-31', '2020-11-17 15:43:37', 1, 1, 12),
(368, 'images/documentosemp/3580ARL ADRIAN ARROYO.pdf', 30, 3, 124, 'No', '2069-12-31', '2020-11-17 15:53:10', 1, 1, 12),
(369, 'images/documentosemp/18284arl luis martinez.pdf', 30, 3, 120, 'No', '2069-12-31', '2020-11-30 09:28:54', 1, 1, 12),
(370, 'images/documentosemp/24312HOJA DE VIDA ENDER CAMACHO .pdf', 26, 3, 123, 'No', '2069-12-31', '2020-11-30 14:52:37', 1, 1, 12),
(371, 'images/documentosemp/40619ARL ENDER CAMACHO.pdf', 30, 3, 123, 'No', '2069-12-31', '2020-11-30 14:54:32', 1, 1, 12),
(372, 'No-Aplica', 33, 3, 124, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(374, 'images/documentosemp/52729ARL JORGE REVUELTA.pdf', 30, 3, 131, 'No', '2069-12-31', '2020-11-30 15:40:33', 1, 1, 12),
(375, 'images/documentosemp/20316CED ENDER CAMACHO.pdf', 27, 3, 123, 'No', '2069-12-31', '2020-11-30 16:06:00', 1, 1, 12),
(376, 'No-Aplica', 33, 3, 123, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(377, 'No-Aplica', 33, 3, 122, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(378, 'No-Aplica', 33, 3, 31, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(379, 'images/documentosemp/70387EPS FREDY GONZALEZ.pdf', 31, 3, 31, 'No', '2069-12-31', '2020-12-01 08:09:51', 1, 1, 12),
(380, 'images/documentosemp/19986CERT BAN FREDY GONZALEZ.pdf', 29, 3, 31, 'No', '2069-12-31', '2020-12-01 08:11:29', 1, 1, 12),
(381, 'No-Aplica', 33, 3, 102, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(382, 'No-Aplica', 33, 3, 102, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(383, 'images/documentosemp/82141EPS ESNOIDER OLIVEROS.pdf', 31, 3, 102, 'No', '2069-12-31', '2020-12-01 08:54:16', 1, 1, 12),
(384, 'images/documentosemp/67355cer ban esnoider.pdf', 29, 3, 102, 'No', '2069-12-31', '2020-12-01 08:55:28', 1, 1, 12),
(385, 'images/documentosemp/25957HOJA DE VIDA ESNOIDER OLIVEROS.pdf', 26, 3, 102, 'No', '2069-12-31', '2020-12-01 10:40:23', 1, 1, 12),
(386, 'images/documentosemp/2135CED ESNOIDER.pdf', 27, 3, 102, 'No', '2069-12-31', '2020-12-01 10:46:39', 1, 1, 12),
(387, 'images/documentosemp/52016HOJA DE VIDA JOSE RIVERA.pdf', 26, 3, 101, 'No', '2069-12-31', '2020-12-01 10:52:35', 1, 1, 12),
(388, 'images/documentosemp/85105CERT BANCARIA ADRIAN ARROYO.pdf', 29, 3, 124, 'No', '2069-12-31', '2020-12-01 11:01:50', 1, 1, 12),
(389, 'images/documentosemp/30733EPS RODOLFO.pdf', 31, 3, 80, 'No', '2069-12-31', '2020-12-02 09:37:52', 1, 1, 12),
(390, 'images/documentosemp/8108CERT BANC ELVIS PEREZ.pdf', 29, 3, 122, 'No', '2069-12-31', '2020-12-02 11:02:52', 1, 1, 12),
(391, 'images/documentosemp/81449CONTRATO ADRIAN ARROYO 2.pdf', 28, 3, 124, 'No', '2069-12-31', '2020-12-02 11:41:12', 1, 1, 12),
(392, 'images/documentosemp/8827CED ADRIAN ARROYO.pdf', 27, 3, 124, 'No', '2069-12-31', '2020-12-02 11:47:22', 1, 1, 12),
(393, 'images/documentosemp/93636HOJA DE VIDA ADRIAN ARROYO.pdf', 26, 3, 124, 'No', '2069-12-31', '2020-12-02 11:58:40', 1, 1, 12),
(394, 'images/documentosemp/98647CED ELVIS PEREZ.pdf', 27, 3, 122, 'No', '2069-12-31', '2020-12-02 12:11:44', 1, 1, 12),
(395, 'images/documentosemp/29041HOJA DE VIDA ELVIS PEREZ.pdf', 26, 3, 122, 'No', '2069-12-31', '2020-12-02 12:15:34', 1, 1, 12),
(396, 'images/documentosemp/57840IMG_20201202_0001.pdf', 28, 3, 122, 'No', '2069-12-31', '2020-12-02 12:24:02', 1, 1, 12),
(397, 'images/documentosemp/99619cer ban Deibis pe?a.pdf', 29, 3, 103, 'No', '2069-12-31', '2020-12-02 14:16:10', 1, 1, 12),
(398, 'images/documentosemp/1925hv Deibis pe?a.pdf', 26, 3, 103, 'No', '2069-12-31', '2020-12-02 14:18:48', 1, 1, 12),
(399, 'images/documentosemp/15465contrato deibis pe?a.pdf', 28, 3, 103, 'No', '2069-12-31', '2020-12-02 14:20:22', 1, 1, 12),
(400, 'No-Aplica', 33, 3, 103, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(401, 'images/documentosemp/75736CONTRATO ENDER CAMACHO.pdf', 28, 3, 123, 'No', '2069-12-31', '2020-12-02 14:23:01', 1, 1, 12),
(402, 'images/documentosemp/9743EPS KATIA ALVAREZ.pdf', 31, 3, 92, 'No', '2069-12-31', '2020-12-02 16:45:21', 1, 1, 12),
(403, 'images/documentosemp/32213EPS LUIS MARTINEZ.pdf', 31, 3, 120, 'No', '2069-12-31', '2020-12-02 16:52:49', 1, 1, 12),
(404, 'No-Aplica', 33, 3, 120, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(405, 'images/documentosemp/66840CERT BANC LUIS MARTINEZ.pdf', 29, 3, 120, 'No', '2069-12-31', '2020-12-02 17:01:08', 1, 1, 12),
(406, 'images/documentosemp/99158CED LUIS MARTINEZ.pdf', 27, 3, 120, 'No', '2069-12-31', '2020-12-02 17:09:34', 1, 1, 12),
(407, 'images/documentosemp/36244IMG_20201202_0002.pdf', 26, 3, 120, 'No', '2069-12-31', '2020-12-02 17:19:15', 1, 1, 12),
(408, 'images/documentosemp/45344EPS GUILLERMO MORENO.pdf', 31, 3, 124, 'No', '2069-12-31', '2020-12-03 09:30:10', 1, 1, 12),
(409, 'images/documentosemp/22957CERT BAN CARLOS ZABALA.pdf', 29, 3, 126, 'No', '2069-12-31', '2020-12-03 09:44:35', 1, 1, 12),
(410, 'images/documentosemp/59429ARL CARLOS ZABALA.pdf', 30, 3, 126, 'No', '2069-12-31', '2020-12-03 09:45:40', 1, 1, 12),
(411, 'images/documentosemp/40577ARL LUIS ALBERTO NOVOA GARCIA.pdf', 30, 3, 127, 'No', '2069-12-31', '2020-12-03 09:47:30', 1, 1, 12),
(412, 'images/documentosemp/65542EPS CARLOS OLIVEROS.pdf', 31, 3, 128, 'No', '2069-12-31', '2020-12-03 09:49:34', 1, 1, 12),
(413, 'images/documentosemp/81526ARL CARLOS OLIVEROS.pdf', 30, 3, 128, 'No', '2069-12-31', '2020-12-03 09:50:51', 1, 1, 12),
(414, 'images/documentosemp/83835HOJA DE VIDA NAIDA QUI?ONEZ.pdf', 26, 3, 129, 'No', '2069-12-31', '2020-12-03 09:53:43', 1, 1, 12),
(415, 'images/documentosemp/65826EPS ALEXANDER VILLALOBOS.jpg', 31, 3, 130, 'No', '2069-12-31', '2020-12-03 10:20:28', 1, 1, 12),
(416, 'images/documentosemp/91348ARL ALEXANDER VILLALOBOS.pdf', 30, 3, 130, 'No', '2069-12-31', '2020-12-03 10:21:20', 1, 1, 12),
(417, 'No-Aplica', 33, 3, 130, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(418, 'images/documentosemp/44715EPS JORGE REVUELTA.pdf', 31, 3, 131, 'No', '2069-12-31', '2020-12-03 10:25:57', 1, 1, 12),
(419, 'images/documentosemp/25296CED JORGE REVUELTA.pdf', 27, 3, 131, 'No', '2069-12-31', '2020-12-03 10:26:55', 1, 1, 12),
(420, 'images/documentosemp/46518ARL WALTER CALLE.pdf', 30, 3, 155, 'No', '2069-12-31', '2020-12-03 10:46:41', 1, 1, 12),
(421, 'images/documentosemp/35852CED WALTER CALLE.pdf', 27, 3, 155, 'No', '2069-12-31', '2020-12-03 10:47:52', 1, 1, 12),
(422, 'images/documentosemp/87316EPS GUILLERMO MORENO.pdf', 31, 3, 156, 'No', '2069-12-31', '2020-12-03 11:09:39', 1, 1, 12),
(423, 'images/documentosemp/30476ARL GUILLERMO MORENO.pdf', 30, 3, 156, 'No', '2069-12-31', '2020-12-03 11:11:01', 1, 1, 12),
(424, 'No-Aplica', 33, 3, 156, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(425, 'images/documentosemp/95247HOJA DE VIDA WALTER CALLE.pdf', 26, 3, 155, 'No', '2069-12-31', '2020-12-03 14:20:21', 1, 1, 12),
(426, 'No-Aplica', 33, 3, 155, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(427, 'images/documentosemp/22226HOJA DE VIDA GUILLERMO MORENO.pdf', 26, 3, 156, 'No', '2069-12-31', '2020-12-03 17:00:07', 1, 1, 12),
(429, 'images/documentosemp/63623HOJA DE VIDA LUIS NOVOA.pdf', 26, 3, 127, 'No', '2069-12-31', '2020-12-04 09:29:52', 1, 1, 12),
(430, 'No-Aplica', 33, 3, 127, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(431, 'images/documentosemp/29634CED LUIS NOVOA.pdf', 27, 3, 127, 'No', '2069-12-31', '2020-12-04 10:00:55', 1, 1, 12),
(432, 'No-Aplica', 33, 3, 126, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(433, 'images/documentosemp/27729CED CARLOS ZABALA.pdf', 27, 3, 126, 'No', '2069-12-31', '2020-12-04 10:44:53', 1, 1, 12),
(434, 'images/documentosemp/84631HOJA DE VIDA CARLOS ZABALA.pdf', 26, 3, 126, 'No', '2069-12-31', '2020-12-04 11:27:14', 1, 1, 12),
(435, 'No-Aplica', 33, 3, 128, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(436, 'images/documentosemp/39921CED CARLOS OLIVEROS.pdf', 27, 3, 128, 'No', '2069-12-31', '2020-12-04 11:48:19', 1, 1, 12),
(437, 'images/documentosemp/8234HOJA DE VIDA CARLOS OLIVEROS.pdf', 26, 3, 128, 'No', '2069-12-31', '2020-12-04 12:09:35', 1, 1, 12),
(438, 'images/documentosemp/5366CERT BANC CARLOS OLIVEROS.pdf', 29, 3, 128, 'No', '2069-12-31', '2020-12-04 12:10:37', 1, 1, 12),
(439, 'images/documentosemp/85689CONTRATO LUIS MARTINEZ 3.pdf', 28, 3, 120, 'No', '2069-12-31', '2020-12-04 14:51:32', 1, 1, 12),
(440, 'images/documentosemp/67066CED ALEXANDER VILLALOBOS.pdf', 27, 3, 130, 'No', '2069-12-31', '2020-12-04 15:47:34', 1, 1, 12),
(441, 'images/documentosemp/487hoja de vida alexander.pdf', 26, 3, 130, 'No', '2069-12-31', '2020-12-05 10:46:25', 1, 1, 12),
(442, 'images/documentosemp/49040ced guillermo moreno.pdf', 27, 3, 156, 'No', '2069-12-31', '2020-12-10 13:47:23', 1, 1, 12),
(443, 'images/documentosemp/82876contrato carlos oliveros.pdf', 28, 3, 128, 'No', '2069-12-31', '2020-12-14 14:54:09', 1, 1, 12),
(444, 'No-Aplica', 33, 3, 63, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(445, 'images/documentosemp/31534contrato carlos zabala.pdf', 28, 3, 126, 'No', '2069-12-31', '2020-12-15 09:38:51', 1, 1, 12),
(446, 'images/documentosemp/81708contrato luis novoa.pdf', 28, 3, 127, 'No', '2069-12-31', '2020-12-15 09:44:50', 1, 1, 12),
(447, 'images/documentosemp/37168CERTI BANCARIA LUIS NOVOA.pdf', 29, 3, 127, 'No', '2069-12-31', '2020-12-15 11:12:45', 1, 1, 12),
(448, 'images/documentosemp/52126CERT BANCARIA GUILLERMO MORENO.pdf', 29, 3, 156, 'No', '2069-12-31', '2020-12-15 11:22:08', 1, 1, 12),
(449, 'No-Aplica', 33, 3, 131, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(450, 'images/documentosemp/56561HOJA DE VIDA JORGE REVUELTA (2).pdf', 26, 3, 131, 'No', '2069-12-31', '2020-12-15 11:40:58', 1, 1, 12),
(451, 'images/documentosemp/99583CERTI BANCARIA JORGE REVUELTA.pdf', 29, 3, 131, 'No', '2069-12-31', '2020-12-15 11:54:25', 1, 1, 12),
(452, 'No-Aplica', 33, 3, 129, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(453, 'images/documentosemp/37469CED NAIDA QUI?ONEZ.pdf', 27, 3, 129, 'No', '2069-12-31', '2020-12-16 11:01:56', 1, 1, 12),
(454, 'images/documentosemp/61581ARL NAIDA QUI?ONEZ.pdf', 30, 3, 129, 'No', '2069-12-31', '2020-12-16 11:14:54', 1, 1, 12),
(455, 'images/documentosemp/1366CERT BANCARIA ALEXANDER.pdf', 29, 3, 130, 'No', '2069-12-31', '2020-12-16 11:24:55', 1, 1, 12),
(456, 'images/documentosemp/25605contrato jorge.pdf', 28, 3, 131, 'No', '2069-12-31', '2020-12-18 09:59:27', 1, 1, 12),
(457, 'images/documentosemp/68908contrato alexander villalobos (2).pdf', 28, 3, 130, 'No', '2069-12-31', '2020-12-22 09:06:13', 1, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documentaleq`
--

CREATE TABLE `gestion_documentaleq` (
  `id_registro` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `documento_id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `gestion_estado` int(11) NOT NULL,
  `gestion_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `gestion_documentaleq`
--

INSERT INTO `gestion_documentaleq` (`id_registro`, `imagen`, `documento_id_documento`, `modulo_id_modulo`, `cuenta_id_cuenta`, `alerta`, `fecha_expiracion`, `marca_temporal`, `gestion_estado`, `gestion_publicado`, `creado_por`) VALUES
(1, 'No-Aplica', 19, 2, 3, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(2, 'images/documentoseq/38183TartejaPropiedad.pdf', 16, 2, 68, 'No', '2069-12-31', '2019-04-16 16:02:19', 1, 1, 1),
(3, 'images/documentoseq/61013Factura.jpeg', 17, 2, 68, 'No', '2069-12-31', '2019-04-17 17:14:32', 1, 1, 1),
(4, 'images/documentoseq/59072Dian.jpeg', 19, 2, 68, 'No', '2069-12-31', '2019-04-17 17:14:58', 1, 1, 1),
(6, 'images/documentoseq/22387tarjeta de propiedad SQW 944.png', 16, 2, 56, 'No', '2069-12-31', '2019-04-30 08:02:55', 1, 1, 4),
(7, 'images/documentoseq/36549TECNICOMECANICA NUEVA.png', 21, 2, 56, 'Si', '2020-05-29', '2019-05-30 09:03:17', 1, 1, 4),
(9, 'images/documentoseq/17224TP WNL 374.png', 16, 2, 57, 'No', '2069-12-31', '2019-04-30 08:15:35', 1, 1, 4),
(10, 'images/documentoseq/61517TP EXCAVADORA.png', 16, 2, 58, 'No', '2069-12-31', '2019-04-30 16:44:18', 1, 1, 4),
(11, 'images/documentoseq/32067FC EXCAVADORA.png', 17, 2, 58, 'No', '2069-12-31', '2019-04-30 16:44:40', 1, 1, 4),
(12, 'images/documentoseq/94583DOC IMP EXCAVADORA.png', 19, 2, 58, 'No', '2069-12-31', '2019-04-30 16:45:10', 1, 1, 4),
(13, 'images/documentoseq/92168Leasing No 213089 - Vibrocompactador (MYM INGENIERIA).pdf', 18, 2, 16, 'No', '2069-12-31', '2019-05-24 15:06:18', 1, 1, 4),
(14, 'images/documentoseq/92906DI VIBROCOMPACTADOR.png', 19, 2, 16, 'No', '2069-12-31', '2019-05-24 15:09:21', 1, 1, 4),
(15, 'images/documentoseq/24474Leasing No 213090 - Motoniveladora (MYM INGENIERIA).pdf', 18, 2, 23, 'No', '2069-12-31', '2019-05-24 15:13:36', 1, 1, 4),
(16, 'images/documentoseq/6032DI MOTO.png', 19, 2, 23, 'No', '2069-12-31', '2019-05-24 15:15:10', 1, 1, 4),
(17, 'images/documentoseq/23712EIZ911.pdf', 20, 2, 3, 'No', '2069-12-31', '2019-05-24 15:26:59', 1, 1, 4),
(18, 'images/documentoseq/19406ANEXO 207187.pdf', 18, 2, 3, 'No', '2069-12-31', '2019-05-24 15:28:25', 1, 1, 4),
(19, 'images/documentoseq/96431Tarjeta de Propiedad.pdf', 16, 2, 4, 'No', '2069-12-31', '2019-05-24 15:30:33', 1, 1, 4),
(20, 'images/documentoseq/4011Soat.pdf', 15, 2, 4, 'No', '2069-12-31', '2019-05-24 15:30:58', 1, 1, 4),
(21, 'images/documentoseq/99095SEGURO DE AUTOM?VILES.pdf', 20, 2, 4, 'No', '2069-12-31', '2019-05-24 15:31:31', 1, 1, 4),
(22, 'images/documentoseq/71979ANEXO.pdf', 18, 2, 4, 'No', '2069-12-31', '2019-05-24 15:32:13', 1, 1, 4),
(23, 'images/documentoseq/36790declaraci?n de imprtaci?n.png', 19, 2, 72, 'No', '2069-12-31', '2019-05-28 14:17:16', 1, 1, 4),
(24, 'images/documentoseq/54879factura.png', 17, 2, 72, 'No', '2069-12-31', '2019-05-28 14:17:45', 1, 1, 4),
(25, 'images/documentoseq/49567tarjeta de propiedad.png', 16, 2, 72, 'No', '2069-12-31', '2019-05-28 14:18:16', 1, 1, 4),
(26, 'images/documentoseq/81929declaraci?n de Importaci?n.png', 19, 2, 71, 'No', '2069-12-31', '2019-05-28 14:21:42', 1, 1, 4),
(27, 'images/documentoseq/68377factura de compra.png', 17, 2, 71, 'No', '2069-12-31', '2019-05-28 14:22:09', 1, 1, 4),
(28, 'images/documentoseq/81478factura.png', 17, 2, 70, 'No', '2069-12-31', '2019-05-28 14:23:33', 1, 1, 4),
(30, 'images/documentoseq/21646poliza.png', 20, 2, 69, 'No', '2069-12-31', '2019-05-28 14:24:58', 1, 1, 4),
(31, 'images/documentoseq/10793factura.png', 17, 2, 75, 'No', '2069-12-31', '2019-05-28 16:20:59', 1, 1, 4),
(32, 'images/documentoseq/37296declaraci?n de importaci?n.png', 19, 2, 75, 'No', '2069-12-31', '2019-05-28 16:21:24', 1, 1, 4),
(33, 'images/documentoseq/10439tarjeta de propiedad.png', 16, 2, 75, 'No', '2069-12-31', '2019-05-28 16:21:46', 1, 1, 4),
(34, 'images/documentoseq/53139FC PLANTA A.png', 17, 2, 69, 'No', '2069-12-31', '2019-05-30 08:17:42', 1, 1, 4),
(35, 'images/documentoseq/36486FC BASCULA.png', 17, 2, 77, 'No', '2069-12-31', '2019-05-30 08:21:26', 1, 1, 4),
(36, 'images/documentoseq/62902FC PLANTA ELECTRICA.png', 17, 2, 78, 'No', '2069-12-31', '2019-05-30 08:26:48', 1, 1, 4),
(37, 'images/documentoseq/98722FC TANQUE ASFALTO.png', 17, 2, 79, 'No', '2069-12-31', '2019-05-30 08:29:57', 1, 1, 4),
(39, 'images/documentoseq/50102FC CAMIONETA DTW 296.png', 17, 2, 81, 'No', '2069-12-31', '2019-05-30 08:40:18', 1, 1, 4),
(40, 'images/documentoseq/26923FC NISSAN UEW 789.png', 17, 2, 82, 'No', '2069-12-31', '2019-05-30 08:42:43', 1, 1, 4),
(41, 'images/documentoseq/23004TP UEW 789.pdf', 16, 2, 82, 'No', '2069-12-31', '2019-05-30 08:49:14', 1, 1, 4),
(42, 'images/documentoseq/59637FC TORRE DE I.png', 17, 2, 83, 'No', '2069-12-31', '2019-05-30 08:54:32', 1, 1, 4),
(43, 'images/documentoseq/32487FC HIDROLAVADORA.png', 17, 2, 84, 'No', '2069-12-31', '2019-05-30 08:57:04', 1, 1, 4),
(44, 'images/documentoseq/97995FC Generador Gesan.png', 17, 2, 85, 'No', '2069-12-31', '2019-05-30 09:01:51', 1, 1, 4),
(45, 'images/documentoseq/42190Tarjeta de propiedad.png', 16, 2, 73, 'No', '2069-12-31', '2019-05-30 09:14:26', 1, 1, 4),
(47, 'images/documentoseq/15284soat.png', 15, 2, 73, 'Si', '2020-01-22', '2019-05-30 09:15:25', 1, 1, 4),
(48, 'images/documentoseq/97631tarjeta de propiedad.png', 16, 2, 74, 'No', '2069-12-31', '2019-05-30 09:18:20', 1, 1, 4),
(49, 'images/documentoseq/65501soat.png', 15, 2, 74, 'Si', '2019-10-05', '2019-05-30 09:18:41', 1, 1, 4),
(52, '', 0, 0, 0, '', '2069-12-31', '0000-00-00 00:00:00', 0, 0, 0),
(53, 'No-Aplica', 21, 2, 85, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(54, 'No-Aplica', 15, 2, 85, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(55, 'No-Aplica', 21, 2, 68, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(56, 'No-Aplica', 14, 2, 75, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(57, 'No-Aplica', 18, 2, 75, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(58, 'No-Aplica', 21, 2, 75, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(59, 'No-Aplica', 15, 2, 75, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(60, 'No-Aplica', 20, 2, 75, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(61, 'No-Aplica', 14, 2, 58, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(62, 'No-Aplica', 15, 2, 58, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(63, 'No-Aplica', 18, 2, 58, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(64, 'No-Aplica', 20, 2, 58, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(65, 'No-Aplica', 21, 2, 58, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(66, 'No-Aplica', 20, 2, 58, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(67, 'images/documentoseq/4688220190622122829137.pdf', 19, 2, 70, 'No', '2069-12-31', '2019-06-22 11:23:44', 1, 1, 4),
(68, 'No-Aplica', 21, 2, 70, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(69, 'No-Aplica', 20, 2, 70, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(70, 'No-Aplica', 15, 2, 70, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(71, 'No-Aplica', 14, 2, 70, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(72, 'No-Aplica', 18, 2, 70, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(73, 'No-Aplica', 16, 2, 70, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(74, 'images/documentoseq/9532620190622123345790.pdf', 16, 2, 86, 'No', '2069-12-31', '2019-06-22 11:29:17', 1, 1, 4),
(75, 'images/documentoseq/9733020190622123358998.pdf', 19, 2, 86, 'No', '2069-12-31', '2019-06-22 11:29:40', 1, 1, 4),
(77, 'No-Aplica', 21, 2, 86, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(79, 'images/documentoseq/2137420190622123927813.pdf', 17, 2, 86, 'No', '2069-12-31', '2019-06-22 11:34:44', 1, 1, 4),
(80, 'images/documentoseq/3501320190622124233048.pdf', 25, 2, 86, 'No', '2069-12-31', '2019-06-22 11:37:53', 1, 1, 4),
(81, 'No-Aplica', 14, 2, 86, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(82, 'No-Aplica', 15, 2, 86, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(83, 'No-Aplica', 18, 2, 86, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(84, 'No-Aplica', 20, 2, 86, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(85, 'images/documentoseq/4501220190622124732264.pdf', 16, 2, 87, 'No', '2069-12-31', '2019-06-22 11:42:48', 1, 1, 4),
(86, 'images/documentoseq/7351120190622130427443.pdf', 17, 2, 87, 'No', '2069-12-31', '2019-06-22 11:59:56', 1, 1, 4),
(87, 'images/documentoseq/7367320190622130603651.pdf', 19, 2, 87, 'No', '2069-12-31', '2019-06-22 12:01:17', 1, 1, 4),
(88, 'images/documentoseq/7746720190622130708838.pdf', 21, 2, 87, 'No', '2069-12-31', '2019-06-22 12:03:04', 1, 1, 4),
(89, 'images/documentoseq/6641820190622130844718.pdf', 20, 2, 87, 'No', '2069-12-31', '2019-06-22 12:04:03', 1, 1, 4),
(90, 'images/documentoseq/3842420190622130942351.pdf', 18, 2, 87, 'No', '2069-12-31', '2019-06-22 12:05:04', 1, 1, 4),
(91, 'No-Aplica', 25, 2, 87, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(92, 'No-Aplica', 15, 2, 87, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(93, 'No-Aplica', 14, 2, 87, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(94, 'images/documentoseq/3582620190622131138677.pdf', 15, 2, 81, 'Si', '2019-11-07', '2019-06-22 12:06:56', 1, 1, 4),
(95, 'images/documentoseq/4631220190622131147521.pdf', 16, 2, 81, 'No', '2069-12-31', '2019-06-22 12:07:44', 1, 1, 4),
(96, 'No-Aplica', 14, 2, 81, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(97, 'No-Aplica', 18, 2, 81, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(98, 'No-Aplica', 19, 2, 81, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(99, 'No-Aplica', 20, 2, 81, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(100, 'No-Aplica', 21, 2, 81, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(101, 'No-Aplica', 25, 2, 81, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(102, 'images/documentoseq/1348420190622131505906.pdf', 15, 2, 82, 'Si', '2020-02-10', '2019-06-22 12:10:17', 1, 1, 4),
(103, 'images/documentoseq/5449120190622131651530.pdf', 21, 2, 82, 'No', '2069-12-31', '2019-06-22 12:11:25', 1, 1, 4),
(104, 'No-Aplica', 25, 2, 82, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(105, 'No-Aplica', 18, 2, 82, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(106, 'No-Aplica', 19, 2, 82, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(107, 'No-Aplica', 20, 2, 82, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(108, 'No-Aplica', 14, 2, 82, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(109, 'images/documentoseq/9102520190622132101894.pdf', 16, 2, 88, 'No', '2069-12-31', '2019-06-22 12:16:26', 1, 1, 4),
(110, 'images/documentoseq/8337020190622132154131.pdf', 21, 2, 88, 'Si', '2019-07-26', '2019-06-22 12:17:15', 1, 1, 4),
(111, 'images/documentoseq/7610020190622132202553.pdf', 15, 2, 88, 'Si', '2019-12-20', '2019-06-22 12:17:42', 1, 1, 4),
(112, 'No-Aplica', 14, 2, 88, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(113, 'No-Aplica', 17, 2, 88, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(114, 'No-Aplica', 18, 2, 88, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(115, 'No-Aplica', 19, 2, 88, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(116, 'No-Aplica', 20, 2, 88, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(117, 'No-Aplica', 25, 2, 88, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(118, 'images/documentoseq/31523consulta-tu-soat_26_6_2019.pdf', 15, 2, 57, 'Si', '2020-06-26', '2019-06-26 08:21:13', 1, 1, 4),
(119, 'No-Aplica', 14, 2, 89, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(120, 'No-Aplica', 15, 2, 89, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(121, 'No-Aplica', 16, 2, 89, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(122, 'No-Aplica', 18, 2, 89, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(123, 'No-Aplica', 21, 2, 89, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(125, 'images/documentoseq/3609720190626104139171.pdf', 17, 2, 89, 'No', '2069-12-31', '2019-06-26 09:40:23', 1, 1, 4),
(126, 'images/documentoseq/52085TP WNL 432.png', 16, 2, 31, 'No', '2069-12-31', '2019-07-04 12:05:20', 1, 1, 4),
(127, 'images/documentoseq/58640WhatsApp Image 2019-06-27 at 2.07.19 PM.jpeg', 21, 2, 31, 'Si', '2019-10-31', '2019-07-04 12:07:06', 1, 1, 4),
(128, 'images/documentoseq/10418WhatsApp Image 2019-06-27 at 2.07.18 PM.jpeg', 15, 2, 31, 'No', '2069-12-31', '2019-07-04 12:07:59', 1, 1, 4),
(129, 'images/documentoseq/60031WhatsApp Image 2019-06-27 at 2.12.07 PM.jpeg', 21, 2, 34, 'No', '2069-12-31', '2019-07-04 12:10:20', 1, 1, 4),
(130, 'images/documentoseq/5620020190704144814194.pdf', 16, 2, 5, 'No', '2069-12-31', '2019-07-04 13:43:58', 1, 1, 4),
(131, 'images/documentoseq/2410420190704144822440.pdf', 16, 2, 17, 'No', '2069-12-31', '2019-07-04 13:44:41', 1, 1, 4),
(132, 'images/documentoseq/6824020190704144830600.pdf', 16, 2, 15, 'No', '2069-12-31', '2019-07-04 13:45:36', 1, 1, 4),
(133, 'images/documentoseq/21258WhatsApp Image 2019-11-01 at 3.23.25 PM.jpeg', 21, 2, 73, 'Si', '2020-06-26', '2019-11-01 15:26:57', 1, 1, 4),
(134, 'No-Aplica', 14, 2, 73, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(135, 'No-Aplica', 17, 2, 73, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(136, 'No-Aplica', 18, 2, 73, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(137, 'No-Aplica', 19, 2, 73, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(138, 'No-Aplica', 20, 2, 73, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(139, 'No-Aplica', 25, 2, 73, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(140, 'No-Aplica', 14, 2, 74, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(141, 'No-Aplica', 17, 2, 74, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(142, 'No-Aplica', 18, 2, 74, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(143, 'No-Aplica', 19, 2, 74, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(144, 'No-Aplica', 20, 2, 74, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(145, 'No-Aplica', 25, 2, 74, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(146, 'images/documentoseq/4781WhatsApp Image 2019-11-01 at 3.26.05 PM.jpeg', 21, 2, 74, 'Si', '2020-10-04', '2019-11-01 15:30:40', 1, 1, 4),
(147, 'No-Aplica', 14, 2, 57, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(148, 'No-Aplica', 17, 2, 57, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(149, 'No-Aplica', 18, 2, 57, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(150, 'No-Aplica', 19, 2, 57, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(151, 'No-Aplica', 20, 2, 57, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(152, 'images/documentoseq/54886WhatsApp Image 2019-11-01 at 3.48.18 PM.jpeg', 21, 2, 57, 'Si', '2020-09-05', '2019-11-01 16:24:36', 1, 1, 4),
(153, 'No-Aplica', 25, 2, 57, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(154, 'images/documentoseq/5200320191125115640464.pdf', 15, 2, 56, 'No', '2069-12-31', '2019-11-25 11:51:11', 1, 1, 4),
(155, 'No-Aplica', 31, 3, 64, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(156, 'No-Aplica', 14, 2, 5, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(157, 'No-Aplica', 15, 2, 5, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(158, 'No-Aplica', 15, 2, 5, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(160, 'No-Aplica', 18, 2, 449, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(161, 'No-Aplica', 19, 2, 449, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(162, 'No-Aplica', 25, 2, 449, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(164, 'No-Aplica', 14, 2, 449, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(165, 'No-Aplica', 14, 2, 449, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(166, 'No-Aplica', 19, 2, 193, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(167, 'No-Aplica', 14, 2, 193, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(168, 'No-Aplica', 14, 2, 193, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(169, 'No-Aplica', 17, 2, 193, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(170, 'images/documentoseq/90288UQE066 SOAT.pdf', 0, 2, 193, 'Si', '2021-10-17', '2020-10-27 13:02:24', 1, 1, 14),
(171, 'images/documentoseq/98668UQE066 SOAT.pdf', 15, 2, 193, 'Si', '2021-10-17', '2020-10-27 13:04:44', 1, 1, 14),
(172, 'images/documentoseq/14480DOCUMENTOS VEHICULOS-1-2.pdf', 16, 2, 193, 'No', '2069-12-31', '2020-10-27 13:07:38', 1, 1, 14),
(173, 'No-Aplica', 18, 2, 193, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(174, 'images/documentoseq/4812DOCUMENTOS VEHICULOS-3-4.pdf', 21, 2, 193, 'Si', '2020-12-03', '2020-10-27 13:13:33', 1, 1, 14),
(175, 'No-Aplica', 20, 2, 193, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(176, 'No-Aplica', 25, 2, 193, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(177, 'images/documentoseq/72201documentos conductor-2.pdf', 42, 2, 193, 'No', '2069-12-31', '2020-10-27 13:27:04', 1, 1, 14),
(178, 'images/documentoseq/86957DOCUMENTOS VEHICULOS-6.pdf', 43, 2, 193, 'No', '2069-12-31', '2020-10-27 13:27:36', 1, 1, 14),
(179, 'No-Aplica', 14, 2, 191, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(180, 'images/documentoseq/82678documentos volqueta-1-2 (1).pdf', 16, 2, 191, 'No', '2069-12-31', '2020-10-27 13:46:25', 1, 1, 14),
(181, 'images/documentoseq/90690documentos volqueta-4.pdf', 15, 2, 191, 'Si', '2020-11-19', '2020-10-27 13:47:42', 1, 1, 14),
(182, 'images/documentoseq/67602documentos volqueta-3.pdf', 21, 2, 191, 'Si', '2020-12-10', '2020-10-27 13:57:05', 1, 1, 14),
(183, 'No-Aplica', 18, 2, 191, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(184, 'No-Aplica', 17, 2, 191, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(185, 'No-Aplica', 19, 2, 191, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(186, 'No-Aplica', 20, 2, 191, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(187, 'No-Aplica', 25, 2, 191, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(188, 'images/documentoseq/15839documentos volqueta-5.pdf', 43, 2, 191, 'No', '2069-12-31', '2020-10-27 13:59:45', 1, 1, 14),
(189, 'images/documentoseq/34705documentos conductor-3.pdf', 42, 2, 191, 'No', '2069-12-31', '2020-10-27 14:05:21', 1, 1, 14),
(190, 'No-Aplica', 14, 2, 192, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(191, 'images/documentoseq/57876hoja de vida UQE126.pdf', 43, 2, 192, 'No', '2069-12-31', '2020-10-28 14:01:04', 1, 1, 14),
(192, 'images/documentoseq/44314vehiculo-3.pdf', 15, 2, 192, 'Si', '2020-12-26', '2020-10-28 14:03:32', 1, 1, 14),
(193, 'images/documentoseq/42901vehiculo-1.pdf', 16, 2, 192, 'No', '2069-12-31', '2020-10-28 14:06:21', 1, 1, 14),
(194, 'images/documentoseq/59031vehiculo-2.pdf', 21, 2, 192, 'Si', '2020-12-30', '2020-10-28 14:07:11', 1, 1, 14),
(195, 'No-Aplica', 25, 2, 192, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(196, 'No-Aplica', 20, 2, 192, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(197, 'No-Aplica', 18, 2, 192, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(198, 'No-Aplica', 17, 2, 192, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(199, 'No-Aplica', 19, 2, 192, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(200, 'images/documentoseq/18866documentos conductor-3.pdf', 42, 2, 192, 'No', '2069-12-31', '2020-10-28 14:15:02', 1, 1, 14),
(201, 'images/documentoseq/30395SOAT-GDY167.jpg', 15, 2, 449, 'Si', '2021-06-30', '2020-10-28 14:42:20', 1, 1, 14),
(202, 'images/documentoseq/31441Tarjeta Propiedad2.jpg', 16, 2, 449, 'No', '2069-12-31', '2020-10-28 14:44:10', 1, 1, 14),
(203, 'No-Aplica', 17, 2, 449, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(204, 'No-Aplica', 20, 2, 449, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(205, 'No-Aplica', 21, 2, 449, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(206, 'images/documentoseq/25583FOR 11-CMV018 HOJA DE VIDA DE MAQUINARIA.pdf', 43, 2, 449, 'No', '2069-12-31', '2020-10-28 14:46:08', 1, 1, 14),
(207, 'images/documentoseq/41852Licencia1.jpg', 42, 2, 449, 'No', '2069-12-31', '2020-10-28 14:47:30', 1, 1, 14),
(208, 'images/documentoseq/85903tarjeta de propiedad.pdf', 16, 2, 582, 'No', '2069-12-31', '2020-10-30 10:57:18', 1, 1, 14),
(209, 'No-Aplica', 14, 2, 582, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(210, 'No-Aplica', 21, 2, 582, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(211, 'images/documentoseq/75279tarjeta de propiedad.pdf', 16, 2, 583, 'No', '2069-12-31', '2020-10-30 11:08:45', 1, 1, 14),
(213, 'No-Aplica', 18, 2, 31, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(214, 'No-Aplica', 14, 2, 31, '', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documentalprov`
--

CREATE TABLE `gestion_documentalprov` (
  `id_registro` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `documento_id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `gestion_estado` int(11) NOT NULL,
  `gestion_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_caja`
--

CREATE TABLE `ingresos_caja` (
  `id_ingreso_caja` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipo_beneficiario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `caja_ppal` int(11) NOT NULL,
  `caja_id_caja` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `beneficiario` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `id_rubro` int(11) DEFAULT NULL,
  `id_subrubro` int(11) DEFAULT NULL,
  `valor_ingreso` int(11) NOT NULL,
  `observaciones` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `ingreso_publicado` int(11) NOT NULL,
  `estado_ingreso` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `ingreso_por_cuentas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ingresos_caja`
--

INSERT INTO `ingresos_caja` (`id_ingreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_ingreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_ingreso`, `observaciones`, `marca_temporal`, `ingreso_publicado`, `estado_ingreso`, `creado_por`, `ingreso_por_cuentas`) VALUES
(14, '', 'Cuenta', '2019-02-28', 4, 4, 5, '', NULL, NULL, 1896510, 'Egreso para ajuste de caja obinco', '2019-03-07 15:55:47', 1, 0, 1, 0),
(15, '', 'Cuenta', '2018-04-02', 6, 6, 3, '', NULL, NULL, 500000, 'Gastos 2018', '2019-03-03 10:18:04', 1, 0, 1, 0),
(16, '', 'Cuenta', '2018-04-12', 7, 7, 3, '', NULL, NULL, 4000000, ' Caja menor 2018', '2019-03-03 10:20:40', 1, 0, 1, 0),
(17, '', 'Cuenta', '2018-04-13', 6, 6, 3, '', NULL, NULL, 2000000, 'Gastos 2018', '2019-03-03 10:22:09', 1, 0, 1, 0),
(18, '', 'Cuenta', '2018-04-09', 6, 6, 3, '', NULL, NULL, 2000000, 'Gastos 2018', '2019-03-03 10:23:28', 1, 0, 1, 0),
(19, '', 'Cuenta', '2019-03-21', 4, 4, 5, '', NULL, NULL, 4000000, 'Caja menor', '2019-03-28 19:15:35', 1, 0, 1, 0),
(20, '', 'Cuenta', '2019-04-18', 8, 8, 5, '', NULL, NULL, 60000, 'caja menor\r\n', '2019-04-25 08:24:17', 1, 0, 1, 0),
(21, '', 'Cuenta', '2018-06-03', 45, 45, 3, '', NULL, NULL, 150000, 'caja menor', '2019-04-25 14:58:15', 1, 0, 1, 0),
(22, '', 'Cuenta', '2018-04-12', 44, 44, 3, '', NULL, NULL, 70000, 'caja menor\r\n', '2019-04-25 15:01:13', 1, 0, 1, 0),
(23, '', 'Cuenta', '2018-07-15', 22, 22, 3, '', NULL, NULL, 60000, 'caja menor', '2019-04-25 15:12:33', 1, 0, 1, 0),
(24, '', 'Cuenta', '2018-07-24', 43, 43, 3, '', NULL, NULL, 56000, 'caja menor', '2019-04-25 15:21:54', 1, 0, 1, 0),
(25, '', 'Cuenta', '2018-07-29', 42, 42, 3, '', NULL, NULL, 150000, 'caja menor', '2019-04-25 15:25:54', 1, 0, 1, 0),
(26, '', 'Cuenta', '2018-10-01', 41, 41, 3, '', NULL, NULL, 250000, 'caja menor', '2019-04-25 15:26:58', 1, 0, 1, 0),
(27, '', 'Cuenta', '2018-07-24', 40, 40, 3, '', NULL, NULL, 14000, 'caja menor', '2019-04-25 15:31:50', 1, 0, 1, 0),
(28, '', 'Cuenta', '2018-08-08', 38, 38, 3, '', NULL, NULL, 30000, 'caja menor', '2019-04-25 15:32:30', 1, 0, 1, 0),
(29, '', 'Cuenta', '2018-07-19', 37, 37, 3, '', NULL, NULL, 220000, 'caja menor', '2019-04-25 15:33:23', 1, 0, 1, 0),
(30, '', 'Cuenta', '2018-10-03', 36, 36, 3, '', NULL, NULL, 20000, 'caja menor', '2019-04-25 15:34:27', 1, 0, 1, 0),
(31, '', 'Cuenta', '2018-07-21', 35, 35, 3, '', NULL, NULL, 1535000, 'caja menor', '2019-04-25 15:34:58', 1, 0, 1, 0),
(32, '', 'Cuenta', '2018-07-05', 23, 23, 3, '', NULL, NULL, 220000, 'caja menor', '2019-04-25 15:50:53', 1, 0, 1, 0),
(33, '', 'Cuenta', '2018-06-26', 6, 6, 3, '', NULL, NULL, 42000, 'caja menor', '2019-04-25 15:51:46', 1, 0, 1, 0),
(34, '', 'Cuenta', '2018-06-19', 24, 24, 3, '', NULL, NULL, 35000, 'caja menor', '2019-04-25 15:52:24', 1, 0, 1, 0),
(35, '', 'Cuenta', '2018-07-24', 25, 25, 3, '', NULL, NULL, 40000, 'caja menor', '2019-04-25 15:53:01', 1, 0, 1, 0),
(36, '', 'Cuenta', '2018-06-25', 26, 26, 3, '', NULL, NULL, 17192, 'caja menor', '2019-04-25 15:53:36', 1, 0, 1, 0),
(37, '', 'Cuenta', '2018-08-03', 27, 27, 3, '', NULL, NULL, 40000, 'caja menor', '2019-04-25 15:54:25', 1, 0, 1, 0),
(38, '', 'Cuenta', '2018-06-25', 28, 28, 3, '', NULL, NULL, 50000, 'caja menor', '2019-04-25 15:54:58', 1, 0, 1, 0),
(39, '', 'Cuenta', '2018-07-26', 31, 31, 3, '', NULL, NULL, 18000, 'caja menor', '2019-04-25 15:55:30', 1, 0, 1, 0),
(40, '', 'Cuenta', '2018-07-25', 30, 30, 3, '', NULL, NULL, 340000, 'caja menor', '2019-04-25 15:56:26', 1, 0, 1, 0),
(41, '', 'Cuenta', '2018-06-21', 29, 29, 3, '', NULL, NULL, 15000, 'caja menor', '2019-04-25 15:57:04', 1, 0, 1, 0),
(42, '', 'Cuenta', '2018-06-21', 32, 32, 3, '', NULL, NULL, 700000, 'caja menor', '2019-04-25 15:57:46', 1, 0, 1, 0),
(43, '', 'Cuenta', '2018-07-25', 33, 33, 3, '', NULL, NULL, 320000, 'caja menor', '2019-04-25 15:58:43', 1, 0, 1, 0),
(44, '', 'Cuenta', '2018-07-21', 34, 34, 3, '', NULL, NULL, 210000, 'caja menor', '2019-04-25 15:59:25', 1, 0, 1, 0),
(45, '', 'Cuenta', '2018-07-16', 20, 20, 3, '', NULL, NULL, 15000, 'caja menor', '2019-04-25 16:55:49', 1, 0, 1, 0),
(46, '', 'Cuenta', '2018-07-05', 19, 19, 3, '', NULL, NULL, 20000, 'caja menor', '2019-04-25 16:56:34', 1, 0, 1, 0),
(47, '', 'Cuenta', '2018-06-26', 21, 21, 3, '', NULL, NULL, 10000, 'caja menor', '2019-04-25 16:57:04', 1, 0, 1, 0),
(48, '', 'Cuenta', '2018-06-27', 18, 18, 3, '', NULL, NULL, 20000, 'caja menor', '2019-04-25 16:57:40', 1, 0, 1, 0),
(49, '', 'Cuenta', '2018-07-06', 15, 15, 3, '', NULL, NULL, 150000, 'caja menor', '2019-04-25 16:58:18', 1, 0, 1, 0),
(50, '', 'Cuenta', '2018-06-12', 17, 17, 3, '', NULL, NULL, 90000, 'caja menor', '2019-04-25 16:58:59', 1, 0, 1, 0),
(51, '', 'Cuenta', '2018-06-25', 10, 10, 3, '', NULL, NULL, 30000, 'caja menor', '2019-04-25 17:24:24', 1, 0, 1, 0),
(52, '', 'Cuenta', '2018-07-30', 10, 10, 3, '', NULL, NULL, 0, 'caja menor', '2019-04-25 17:25:23', 1, 0, 1, 0),
(53, '', 'Cuenta', '2018-08-01', 13, 13, 3, '', NULL, NULL, 246000, 'caja menor', '2019-04-25 17:26:20', 1, 0, 1, 0),
(54, '', 'Cuenta', '2018-07-23', 11, 11, 3, '', NULL, NULL, 50000, 'caja menor', '2019-04-25 17:27:22', 1, 0, 1, 0),
(55, '', 'Cuenta', '2018-06-15', 16, 16, 3, '', NULL, NULL, 308833, 'caja menor', '2019-04-26 09:13:18', 1, 0, 1, 0),
(56, '', 'Cuenta', '2018-07-05', 14, 14, 3, '', NULL, NULL, 229880, 'caja menor', '2019-04-26 09:39:05', 1, 0, 1, 0),
(57, '', 'Cuenta', '2018-06-12', 9, 9, 3, '', NULL, NULL, 1563690, 'caja menor', '2019-04-26 16:39:07', 1, 0, 1, 0),
(58, '', 'Cuenta', '2019-04-20', 8, 8, 3, '', NULL, NULL, 60000, 'caja menor', '2019-04-29 14:08:57', 1, 0, 1, 0),
(60, '', 'Cuenta', '2018-07-30', 12, 12, 3, '', NULL, NULL, 110000, 'Movimiento a Caja', '2019-05-09 15:40:41', 1, 0, 1, 0),
(62, '', 'Cuenta', '2019-05-07', 46, 46, 5, '', NULL, NULL, 400000, 'CAJA MENOR', '2019-05-23 11:24:30', 1, 0, 1, 0),
(63, '', 'Cuenta', '2019-05-08', 46, 46, 5, '', NULL, NULL, 2000000, 'CAJA MENOR', '2019-05-23 11:26:39', 1, 0, 1, 0),
(64, '', 'Cuenta', '2019-04-23', 46, 46, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-05-23 11:29:48', 1, 0, 1, 0),
(65, '', 'Cuenta', '2019-04-29', 46, 46, 5, '', NULL, NULL, 2000000, 'CAJA MENOR', '2019-05-23 11:31:31', 1, 0, 1, 0),
(66, '', 'Cuenta', '2019-05-01', 5, 5, 5, '', NULL, NULL, 2000000, 'CAJA MENOR', '2019-05-23 12:00:48', 1, 0, 1, 0),
(67, '', 'Cuenta', '2019-05-10', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-05-23 12:05:56', 1, 0, 1, 0),
(68, '', 'Cuenta', '2019-05-15', 5, 5, 5, '', NULL, NULL, 400000, 'CAJA MENOR', '2019-05-23 12:06:46', 1, 0, 1, 0),
(69, '', 'Cuenta', '2019-05-17', 5, 5, 5, '', NULL, NULL, 1500000, 'CAJA MENOR', '2019-05-23 12:07:39', 1, 0, 1, 0),
(70, '', 'Cuenta', '2019-05-17', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-05-23 12:09:52', 1, 0, 1, 0),
(71, '', 'Cuenta', '2019-04-25', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-05-23 13:41:22', 1, 0, 1, 0),
(72, '', 'Cuenta', '2019-04-28', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-05-23 13:42:39', 1, 0, 1, 0),
(73, '', 'Cuenta', '2019-05-03', 50, 50, 5, '', NULL, NULL, 1000000, 'CAJA MENOR - arreglo de volqueta azul', '2019-05-23 13:47:46', 1, 0, 1, 0),
(74, '', 'Cuenta', '2019-05-16', 50, 50, 5, '', NULL, NULL, 2200000, 'CAJA MENOR', '2019-05-23 13:49:02', 1, 0, 1, 0),
(75, '', 'Cuenta', '2019-05-17', 50, 50, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-05-23 13:50:04', 1, 0, 1, 0),
(76, '', 'Cuenta', '2019-04-23', 50, 50, 5, '', NULL, NULL, 2263574, 'CAJA MENOR', '2019-05-23 13:50:51', 1, 0, 1, 0),
(77, '', 'Cuenta', '2019-04-25', 50, 50, 5, '', NULL, NULL, 1000000, 'CAJA MENOR -  arreglo de volqueta azul', '2019-05-23 13:51:56', 1, 0, 1, 0),
(78, '', 'Cuenta', '2019-05-06', 49, 49, 5, '', NULL, NULL, 2000000, 'CAJA MENOR', '2019-05-23 14:07:32', 1, 0, 1, 0),
(79, '', 'Cuenta', '2019-05-10', 49, 49, 5, '', NULL, NULL, 1500000, 'CAJA MENOR', '2019-05-23 14:09:44', 1, 0, 1, 0),
(80, '', 'Cuenta', '2019-04-23', 49, 49, 5, '', NULL, NULL, 1250000, 'CAJA MENOR - vi?ticos volqueta', '2019-05-23 14:10:32', 1, 0, 1, 0),
(81, '', 'Cuenta', '2019-04-29', 49, 49, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-05-23 14:14:21', 1, 0, 1, 0),
(82, '', 'Cuenta', '2019-04-25', 49, 49, 5, '', NULL, NULL, 850000, 'CAJA MENOR', '2019-05-23 14:15:37', 1, 0, 1, 0),
(83, '', 'Cuenta', '2019-04-24', 49, 49, 5, '', NULL, NULL, 1200000, 'CAJA MENOR', '2019-05-23 14:16:51', 1, 0, 1, 0),
(84, '', 'Cuenta', '2019-05-09', 48, 48, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-05-23 14:38:24', 1, 0, 1, 0),
(85, '', 'Cuenta', '2019-04-25', 48, 48, 5, '', NULL, NULL, 200000, 'CAJA MENOR', '2019-05-23 14:39:22', 1, 0, 1, 0),
(86, '', 'Cuenta', '2019-05-22', 46, 46, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-05-23 14:44:39', 1, 0, 1, 0),
(87, '', 'Cuenta', '2019-05-22', 47, 47, 5, '', NULL, NULL, 300000, 'CAJA MENOR', '2019-05-23 14:45:30', 1, 0, 1, 0),
(88, '', 'Cuenta', '2019-05-21', 47, 47, 5, '', NULL, NULL, 200000, 'CAJA MENOR', '2019-05-23 14:46:13', 1, 0, 1, 0),
(89, '', 'Cuenta', '2019-04-23', 49, 49, 5, '', NULL, NULL, 360000, 'CAJA MENOR', '2019-05-23 14:57:51', 1, 0, 1, 0),
(90, '', 'Cuenta', '2019-05-18', 50, 50, 5, '', NULL, NULL, 950000, 'CAJA MENOR', '2019-05-23 14:59:14', 1, 0, 1, 0),
(91, '', 'Cuenta', '2019-04-23', 47, 47, 5, '', NULL, NULL, 400000, 'CAJA MENOR', '2019-05-24 10:34:03', 1, 0, 1, 0),
(92, '', 'Cuenta', '2019-05-23', 5, 5, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-05-24 11:25:46', 1, 0, 1, 0),
(93, '', 'Cuenta', '2019-05-24', 46, 46, 5, '', NULL, NULL, 0, 'CAJA MENOR', '2019-05-27 14:14:24', 1, 0, 1, 0),
(94, '', 'Cuenta', '2019-05-21', 46, 46, 5, '', NULL, NULL, 2300000, 'CAJA MENOR', '2019-05-27 14:15:24', 1, 0, 1, 0),
(95, '', 'Cuenta', '2019-05-27', 47, 47, 5, '', NULL, NULL, 700000, 'CAJA MENOR', '2019-05-28 08:53:20', 1, 0, 1, 0),
(96, '', 'Cuenta', '2019-05-28', 47, 47, 5, '', NULL, NULL, 150000, 'CAJA MENOR', '2019-05-28 08:54:13', 1, 0, 1, 0),
(97, '', 'Cuenta', '2019-05-29', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-05-29 16:50:49', 1, 0, 1, 0),
(98, '', 'Cuenta', '2019-05-29', 47, 47, 5, '', NULL, NULL, 300000, 'CAJA MENOR', '2019-05-29 16:51:39', 1, 0, 1, 0),
(99, '', 'Cuenta', '2019-06-06', 47, 47, 5, '', NULL, NULL, 120000, 'CAJA MENOR', '2019-06-07 11:48:22', 1, 0, 1, 0),
(100, '', 'Cuenta', '2019-06-07', 47, 47, 5, '', NULL, NULL, 600000, 'CAJA MENOR', '2019-06-07 17:43:36', 1, 0, 1, 0),
(101, '', 'Cuenta', '2019-05-04', 46, 46, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-06-10 09:17:35', 1, 0, 1, 0),
(102, '', 'Cuenta', '2019-06-11', 47, 47, 5, '', NULL, NULL, 200000, 'CAJA MENOR', '2019-06-12 10:15:01', 1, 0, 1, 0),
(103, '', 'Cuenta', '2019-06-11', 47, 47, 5, '', NULL, NULL, 260000, 'CAJA MENOR', '2019-06-12 10:15:47', 1, 0, 1, 0),
(104, '', 'Cuenta', '2019-05-12', 47, 47, 5, '', NULL, NULL, 220000, 'CAJA MENOR', '2019-06-13 16:18:11', 1, 0, 1, 0),
(105, '', 'Cuenta', '2019-06-14', 47, 47, 5, '', NULL, NULL, 250000, 'CAJA MENOR', '2019-06-17 11:44:36', 1, 0, 1, 0),
(106, '', 'Cuenta', '2019-06-13', 50, 50, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-06-17 12:07:24', 1, 0, 1, 0),
(107, '', 'Cuenta', '2019-06-12', 50, 50, 5, '', NULL, NULL, 400000, 'CAJA MENOR', '2019-06-17 12:08:16', 1, 0, 1, 0),
(108, '', 'Cuenta', '2019-06-11', 50, 50, 5, '', NULL, NULL, 1500000, 'CAJA MENOR', '2019-06-17 12:09:29', 1, 0, 1, 0),
(109, '', 'Cuenta', '2019-06-11', 50, 50, 5, '', NULL, NULL, 300000, 'CAJA MENOR', '2019-06-17 12:14:13', 1, 0, 1, 0),
(110, '', 'Cuenta', '2019-06-13', 50, 50, 5, '', NULL, NULL, 200000, 'CAJA MENOR', '2019-06-17 13:05:02', 1, 0, 1, 0),
(112, '', 'Cuenta', '2019-06-06', 50, 50, 5, '', NULL, NULL, 2000000, 'CAJA MENOR', '2019-06-17 17:29:15', 1, 0, 1, 0),
(113, '', 'Cuenta', '2019-06-07', 50, 50, 5, '', NULL, NULL, 2500000, 'CAJA MENOR', '2019-06-17 17:31:38', 1, 0, 1, 0),
(114, '', 'Cuenta', '2019-05-31', 50, 50, 5, '', NULL, NULL, 1200000, 'CAJA MENOR', '2019-06-17 17:32:42', 1, 0, 1, 0),
(115, '', 'Cuenta', '2019-06-17', 50, 50, 5, '', NULL, NULL, 1700000, 'CAJA MENOR', '2019-06-17 17:34:38', 1, 0, 1, 0),
(116, '', 'Cuenta', '2019-06-17', 47, 47, 5, '', NULL, NULL, 3810000, 'caja menor', '2019-06-17 17:51:15', 1, 0, 1, 0),
(117, '', 'Cuenta', '2019-06-18', 47, 47, 5, '', NULL, NULL, 450000, 'CAJA MENOR', '2019-06-19 11:09:39', 1, 0, 1, 0),
(118, '', 'Cuenta', '2019-06-19', 33, 33, 5, '', NULL, NULL, 180000, 'CAJA MENOR', '2019-06-20 08:01:58', 1, 0, 1, 0),
(119, '', 'Cuenta', '2019-06-15', 33, 33, 5, '', NULL, NULL, 200000, 'CAJA MENOR', '2019-06-20 08:03:55', 1, 0, 1, 0),
(120, '', 'Cuenta', '2019-06-19', 5, 5, 5, '', NULL, NULL, 5000000, 'consignacion', '2019-06-20 14:10:06', 1, 0, 1, 0),
(121, '', 'Cuenta', '2019-06-17', 5, 5, 5, '', NULL, NULL, 3000000, 'CAJA MENOR', '2019-06-20 14:46:23', 1, 0, 1, 0),
(122, '', 'Cuenta', '2019-06-17', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-06-20 14:48:26', 1, 0, 1, 0),
(123, '', 'Cuenta', '2019-06-14', 5, 5, 5, '', NULL, NULL, 600000, 'CAJA MENOR', '2019-06-20 14:49:36', 1, 0, 1, 0),
(124, '', 'Cuenta', '2019-06-13', 5, 5, 5, '', NULL, NULL, 3000000, 'CAJA MENOR', '2019-06-20 14:50:53', 1, 0, 1, 0),
(125, '', 'Cuenta', '2019-06-22', 47, 47, 5, '', NULL, NULL, 200000, 'CAJA MENOR', '2019-06-22 12:26:52', 1, 0, 1, 0),
(126, '', 'Cuenta', '2019-06-13', 49, 49, 5, '', NULL, NULL, 3000000, 'CAJA MENOR', '2019-06-25 10:14:21', 1, 0, 1, 0),
(127, '', 'Cuenta', '2019-06-22', 49, 49, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-06-25 10:15:41', 1, 0, 1, 0),
(128, '', 'Cuenta', '2019-06-22', 49, 49, 5, '', NULL, NULL, 300000, 'CAJA MENOR', '2019-06-25 10:16:26', 1, 0, 1, 0),
(129, '', 'Cuenta', '2019-06-20', 50, 50, 5, '', NULL, NULL, 1500000, 'CAJA MENOR', '2019-06-25 10:41:37', 1, 0, 1, 0),
(130, '', 'Cuenta', '2019-06-18', 50, 50, 5, '', NULL, NULL, 700000, 'CAJA MENOR', '2019-06-25 10:42:27', 1, 0, 1, 0),
(132, '', 'Cuenta', '2019-05-24', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-06-25 13:52:51', 1, 0, 1, 0),
(133, '', 'Cuenta', '2019-05-30', 5, 5, 5, '', NULL, NULL, 2000000, 'CAJA MENOR', '2019-06-25 13:53:55', 1, 0, 1, 0),
(134, '', 'Cuenta', '2019-05-31', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-06-25 13:54:41', 1, 0, 1, 0),
(135, '', 'Cuenta', '2019-06-04', 5, 5, 5, '', NULL, NULL, 700000, 'CAJA MENOR', '2019-06-25 13:55:24', 1, 0, 1, 0),
(136, '', 'Cuenta', '2019-06-06', 5, 5, 4, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-06-25 13:56:28', 1, 0, 1, 0),
(137, '', 'Cuenta', '2019-06-18', 5, 5, 4, '', NULL, NULL, 3000000, 'CAJA MENOR', '2019-06-25 13:57:24', 1, 0, 1, 0),
(138, '', 'Cuenta', '2019-06-24', 50, 50, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-06-25 17:17:00', 1, 0, 1, 0),
(139, '', 'Cuenta', '2019-06-25', 50, 50, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-06-25 17:17:55', 1, 0, 1, 0),
(140, '', 'Cuenta', '2019-06-24', 49, 49, 5, '', NULL, NULL, 400000, 'CAJA MENOR', '2019-06-25 17:18:28', 1, 0, 1, 0),
(141, '', 'Cuenta', '2019-06-08', 49, 49, 5, '', NULL, NULL, 2570000, 'CAJA MENOR', '2019-06-25 17:19:49', 1, 0, 1, 0),
(142, '', 'Cuenta', '2019-06-07', 49, 49, 5, '', NULL, NULL, 5000000, 'CAJA MENOR', '2019-06-25 17:20:56', 1, 0, 1, 0),
(143, '', 'Cuenta', '2019-05-30', 49, 49, 5, '', NULL, NULL, 1500000, 'CAJA MENOR', '2019-06-25 17:23:30', 1, 0, 1, 0),
(144, '', 'Cuenta', '2019-05-30', 49, 49, 5, '', NULL, NULL, 920000, 'CAJA MENOR', '2019-06-25 17:24:14', 1, 0, 1, 0),
(145, '', 'Cuenta', '2019-06-18', 52, 52, 5, '', NULL, NULL, 272000, 'CAJA MENOR', '2019-06-27 09:02:37', 1, 0, 1, 0),
(146, '', 'Cuenta', '2019-06-25', 49, 49, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-07-02 09:08:41', 1, 0, 1, 0),
(147, '', 'Cuenta', '2019-06-28', 47, 47, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-07-02 10:52:26', 1, 0, 1, 0),
(148, '', 'Cuenta', '2019-06-06', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-07-04 10:42:34', 1, 0, 1, 0),
(149, '', 'Cuenta', '2019-06-18', 5, 5, 5, '', NULL, NULL, 3000000, 'CAJA MENOR', '2019-07-04 10:47:31', 1, 0, 1, 0),
(150, '', 'Cuenta', '2019-06-21', 5, 5, 5, '', NULL, NULL, 313400, 'CAJA MENOR', '2019-07-04 10:48:12', 1, 0, 1, 0),
(151, '', 'Cuenta', '2019-06-21', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-07-04 10:48:57', 1, 0, 1, 0),
(152, '', 'Cuenta', '2019-06-12', 5, 5, 5, '', NULL, NULL, 2000000, 'CAJA MENOR', '2019-07-04 10:49:47', 1, 0, 1, 0),
(153, '', 'Cuenta', '2019-06-12', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-07-04 10:50:49', 1, 0, 1, 0),
(154, '', 'Cuenta', '2019-06-11', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-07-04 10:51:38', 1, 0, 1, 0),
(155, '', 'Cuenta', '2019-06-28', 33, 33, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-07-04 10:53:57', 1, 0, 1, 0),
(156, '', 'Cuenta', '2019-11-06', 53, 53, 5, '', NULL, NULL, 741000, 'CAJA MENOR (Error en Transferencia, el resto lo devolvio)', '2019-07-05 08:06:36', 1, 0, 1, 0),
(157, '', 'Cuenta', '2019-07-03', 47, 47, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-07-08 09:11:30', 1, 0, 1, 0),
(158, '', 'Cuenta', '2019-07-04', 47, 47, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2019-07-08 09:12:18', 1, 0, 1, 0),
(159, '', 'Cuenta', '2019-06-12', 5, 5, 5, '', NULL, NULL, 700000, 'CAJA MENOR', '2019-07-08 11:11:23', 1, 0, 1, 0),
(160, '', 'Cuenta', '2019-06-18', 5, 5, 5, '', NULL, NULL, 100697, 'CAJA MENOR', '2019-07-08 11:13:17', 1, 0, 1, 0),
(161, '', 'Cuenta', '2019-06-18', 5, 5, 5, '', NULL, NULL, 176900, 'CAJA MENOR', '2019-07-08 11:14:40', 1, 0, 1, 0),
(162, '', 'Cuenta', '2019-07-11', 54, 54, 5, '', NULL, NULL, 2000000, 'CAJA MENOR ASIGNADA AL ING. RAFAEL PARA  GASTOS CANTERA ', '2019-07-15 09:35:19', 1, 0, 1, 0),
(163, '', 'Cuenta', '2019-06-28', 50, 50, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2019-07-15 13:51:47', 1, 0, 1, 0),
(164, '', 'Cuenta', '2019-07-06', 52, 52, 5, '', NULL, NULL, 250000, 'CAJA MENOR', '2019-07-15 15:58:41', 1, 0, 1, 0),
(165, '', 'Cuenta', '2019-07-26', 47, 47, 5, '', NULL, NULL, 100000, 'CM - NATALIA', '2019-08-03 10:07:28', 1, 0, 1, 0),
(166, '', 'Cuenta', '2019-07-31', 47, 47, 5, '', NULL, NULL, 190400, 'CM - NATALIA', '2019-08-03 10:40:40', 1, 0, 1, 0),
(167, '', 'Cuenta', '2019-07-15', 54, 54, 5, '', NULL, NULL, 2000000, 'CM - RAFAEL', '2019-08-03 11:18:25', 1, 0, 1, 0),
(168, '', 'Cuenta', '2019-07-24', 54, 54, 5, '', NULL, NULL, 1500000, 'CM - RAFAEL', '2019-08-03 11:19:08', 1, 0, 1, 0),
(169, '', 'Cuenta', '2019-08-01', 54, 54, 5, '', NULL, NULL, 200000, 'PAGO  PEAJES DE DOBLETROQUE A LA PALMA', '2019-08-08 06:27:41', 1, 0, 1, 0),
(170, '', 'Cuenta', '2019-08-01', 54, 54, 5, '', NULL, NULL, 2000000, 'CM RAFAEL', '2019-08-16 09:46:03', 1, 0, 1, 0),
(171, '', 'Cuenta', '2019-07-02', 49, 49, 5, '', NULL, NULL, 2000000, 'CM RAUL', '2019-08-16 11:05:22', 1, 0, 1, 0),
(172, '', 'Cuenta', '2019-07-16', 49, 49, 5, '', NULL, NULL, 1000000, 'CM RAUL', '2019-08-16 11:06:25', 1, 0, 1, 0),
(173, '', 'Cuenta', '2019-07-24', 49, 49, 5, '', NULL, NULL, 1500000, 'CM RAU', '2019-08-16 11:07:20', 1, 0, 1, 0),
(174, '', 'Cuenta', '2019-07-31', 49, 49, 5, '', NULL, NULL, 606400, 'CM RAUL', '2019-08-16 11:08:16', 1, 0, 1, 0),
(175, '', 'Cuenta', '2019-07-31', 49, 49, 5, '', NULL, NULL, 606400, 'CM RAUL', '2019-08-16 15:45:50', 1, 0, 1, 0),
(176, '', 'Cuenta', '2019-08-10', 47, 47, 5, '', NULL, NULL, 264000, 'CM NATALIA', '2019-08-20 08:08:25', 1, 0, 1, 0),
(177, '', 'Cuenta', '2019-08-14', 47, 47, 5, '', NULL, NULL, 1193006, 'CM NATALIA', '2019-08-20 08:09:08', 1, 0, 1, 0),
(178, '', 'Cuenta', '2019-07-02', 50, 50, 5, '', NULL, NULL, 500000, 'CM CARLOS', '2019-08-21 08:14:39', 1, 0, 1, 0),
(179, '', 'Cuenta', '2019-07-05', 50, 50, 5, '', NULL, NULL, 600000, 'CM CARLOS', '2019-08-21 08:15:58', 1, 0, 1, 0),
(180, '', 'Cuenta', '2019-07-09', 50, 50, 5, '', NULL, NULL, 500000, 'CM CARLOS', '2019-08-21 08:16:32', 1, 0, 1, 0),
(181, '', 'Cuenta', '2019-07-09', 50, 50, 5, '', NULL, NULL, 490000, 'CM CARLOS', '2019-08-21 08:17:08', 1, 0, 1, 0),
(182, '', 'Cuenta', '2019-07-10', 50, 50, 5, '', NULL, NULL, 300000, 'CM CARLOS', '2019-08-21 08:17:38', 1, 0, 1, 0),
(183, '', 'Cuenta', '2019-08-30', 49, 49, 5, '', NULL, NULL, 2000000, 'CM RAUL', '2019-09-24 10:52:16', 1, 0, 1, 0),
(184, '', 'Cuenta', '2019-09-05', 49, 49, 5, '', NULL, NULL, 2000000, 'CM RAUL', '2019-09-24 10:56:55', 1, 0, 1, 0),
(185, '', 'Cuenta', '2019-09-13', 49, 49, 5, '', NULL, NULL, 2000000, 'CM RAUL', '2019-09-24 12:27:19', 1, 0, 1, 0),
(186, '', 'Cuenta', '2019-09-20', 49, 49, 5, '', NULL, NULL, 2000000, 'CM RAUL', '2019-09-24 16:04:33', 1, 0, 1, 0),
(187, '', 'Cuenta', '2019-08-28', 5, 5, 5, '', NULL, NULL, 3794900, 'CM JOSE DANIEL', '2019-09-28 09:27:50', 1, 0, 1, 0),
(188, '', 'Cuenta', '2019-09-24', 47, 47, 5, '', NULL, NULL, 308994, 'CM NATALIA', '2019-09-28 09:29:55', 1, 0, 1, 0),
(189, '', 'Cuenta', '2019-09-24', 49, 49, 5, '', NULL, NULL, 2000000, 'CM RAUL', '2019-09-28 09:41:31', 1, 0, 1, 0),
(190, '', 'Cuenta', '2019-10-01', 49, 49, 5, '', NULL, NULL, 500000, 'CM RAUL', '2019-10-15 14:55:32', 1, 0, 1, 0),
(191, '', 'Cuenta', '2019-10-01', 49, 49, 5, '', NULL, NULL, 500000, 'CM RAUL', '2019-10-15 14:55:32', 1, 0, 1, 0),
(192, '', 'Cuenta', '2019-10-30', 5, 5, 5, '', NULL, NULL, 2437897, 'CM JOSE DANIEL', '2019-10-30 13:44:46', 1, 0, 1, 0),
(193, '', 'Cuenta', '2019-10-03', 49, 49, 5, '', NULL, NULL, 1000000, 'CM RAUL', '2019-10-31 14:18:14', 1, 0, 1, 0),
(194, '', 'Cuenta', '2019-10-11', 49, 49, 5, '', NULL, NULL, 4300000, 'CM RAUL', '2019-10-31 14:19:19', 1, 0, 1, 0),
(195, '', 'Cuenta', '2019-10-15', 49, 49, 5, '', NULL, NULL, 1500000, 'CM RAUL', '2019-10-31 14:20:20', 1, 0, 1, 0),
(196, '', 'Cuenta', '2019-10-16', 49, 49, 5, '', NULL, NULL, 160000, 'CM RAUL', '2019-10-31 14:21:09', 1, 0, 1, 0),
(197, '', 'Cuenta', '2019-10-17', 49, 49, 5, '', NULL, NULL, 800000, 'CM RAUL', '2019-10-31 14:21:46', 1, 0, 1, 0),
(198, '', 'Cuenta', '2019-10-18', 49, 49, 5, '', NULL, NULL, 1000000, 'CM RAUL', '2019-10-31 14:22:28', 1, 0, 1, 0),
(199, '', 'Cuenta', '2019-10-21', 49, 49, 5, '', NULL, NULL, 1500000, 'CM RAUL', '2019-10-31 14:23:17', 1, 0, 1, 0),
(200, '', 'Cuenta', '2018-10-24', 49, 49, 5, '', NULL, NULL, 1500000, 'CM RAUL', '2019-10-31 14:24:53', 1, 0, 1, 0),
(201, '', 'Cuenta', '2019-10-25', 49, 49, 5, '', NULL, NULL, 6000000, 'CM RAUL', '2019-11-08 15:07:05', 1, 0, 1, 0),
(202, '', 'Cuenta', '2019-10-30', 49, 49, 5, '', NULL, NULL, 2000000, 'CM RAUL', '2019-11-08 15:08:16', 1, 0, 1, 0),
(203, '', 'Cuenta', '2019-10-31', 49, 49, 5, '', NULL, NULL, 2500000, 'CM RAUL', '2019-11-08 15:34:49', 1, 0, 1, 0),
(204, '', 'Cuenta', '2019-11-01', 49, 49, 5, '', NULL, NULL, 2500000, 'CM RAUL', '2019-11-08 15:35:32', 1, 0, 1, 0),
(205, '', 'Cuenta', '2019-10-25', 47, 47, 5, '', NULL, NULL, 380000, 'CM NATALIA', '2019-11-08 15:53:09', 1, 0, 1, 0),
(206, '', 'Cuenta', '2019-10-30', 47, 47, 5, '', NULL, NULL, 200000, 'CM NATALIA', '2019-11-08 15:53:49', 1, 0, 1, 0),
(207, '', 'Cuenta', '2019-11-11', 5, 5, 5, '', NULL, NULL, 5512103, 'CM JOSE DANIEL', '2019-11-21 16:45:08', 1, 0, 1, 0),
(208, '', 'Cuenta', '2019-11-01', 47, 47, 5, '', NULL, NULL, 4980000, 'CM NATALIA NOVIEMBRE', '2019-12-05 15:13:45', 1, 0, 1, 0),
(209, '', 'Cuenta', '2019-12-04', 47, 47, 5, '', NULL, NULL, 290000, 'CM NATALIA', '2019-12-17 10:17:58', 1, 0, 1, 0),
(210, '', 'Cuenta', '2020-01-07', 47, 47, 5, '', NULL, NULL, 220000, 'CAJA MENOR ', '2020-01-28 16:48:16', 1, 0, 1, 0),
(211, '', 'Cuenta', '2020-01-30', 5, 5, 5, '', NULL, NULL, 8050000, 'cajas asignadas en diciembre y enero ', '2020-02-04 15:13:01', 1, 0, 1, 0),
(212, '', 'Cuenta', '2020-01-01', 47, 47, 5, '', NULL, NULL, 810000, 'CAJAS NATALIA ENERO', '2020-02-06 16:27:47', 1, 0, 1, 0),
(213, '', 'Caja Sistema', '2020-02-04', 47, 5, 0, '', 0, 0, 300000, 'TRANSLADO DE CAJA', '2020-02-06 16:50:03', 1, 1, 1, 0),
(214, '', 'Cuenta', '2020-02-20', 5, 5, 5, '', NULL, NULL, 3000000, 'CAJAS FEBRERO JD', '2020-02-29 11:40:11', 1, 0, 1, 0),
(215, '', 'Cuenta', '2019-11-27', 49, 49, 5, '', NULL, NULL, 5620000, 'CM NOVIEMBRE RAUL VERGARA ', '2020-06-24 09:00:57', 1, 0, 1, 0),
(216, '', 'Cuenta', '2019-12-30', 49, 49, 5, '', NULL, NULL, 13200000, 'CM DICIEMBRE RAUL VERGARA', '2020-06-24 09:02:43', 1, 0, 1, 0),
(217, '', 'Cuenta', '2020-01-30', 49, 49, 5, '', NULL, NULL, 18038000, 'CM ENERO RAUL VERGARA', '2020-06-24 09:04:37', 1, 0, 1, 0),
(218, '', 'Cuenta', '2020-02-29', 49, 49, 5, '', NULL, NULL, 4900000, 'CM FEBERO RAUL VERGARA', '2020-06-24 09:09:17', 1, 0, 1, 0),
(219, '', 'Cuenta', '2020-03-30', 49, 49, 5, '', NULL, NULL, 3300000, 'CM MARZO RAUL VERGARA', '2020-06-24 09:10:18', 1, 0, 1, 0),
(220, '', 'Cuenta', '2020-03-21', 5, 5, 5, '', NULL, NULL, 5900000, 'CM JDMO MARZO', '2020-06-25 09:39:08', 1, 0, 1, 0),
(221, '', 'Cuenta', '2020-04-30', 5, 5, 5, '', NULL, NULL, 1660000, 'CM JDMO ABRIL', '2020-06-25 09:42:22', 1, 0, 1, 0),
(222, '', 'Cuenta', '2020-05-07', 5, 5, 5, '', NULL, NULL, 1400000, 'CM JDMO', '2020-06-25 09:43:23', 1, 0, 1, 0),
(223, '', 'Cuenta', '2020-06-18', 49, 49, 5, '', NULL, NULL, 250000, 'CM RAUL VERGARA', '2020-07-15 15:07:56', 1, 0, 1, 0),
(224, '', 'Cuenta', '2020-02-27', 49, 49, 5, '', NULL, NULL, 600000, 'CM RAUL VERGARA', '2020-07-15 15:42:31', 1, 0, 1, 0),
(225, '', 'Cuenta', '2020-03-30', 50, 50, 5, '', NULL, NULL, 270000, 'CM CARLOS DIAZ MARZO', '2020-07-15 15:50:35', 1, 0, 1, 0),
(226, '', 'Cuenta', '2020-04-28', 50, 50, 5, '', NULL, NULL, 500000, 'CM CARLOS DIAZ', '2020-07-15 15:51:29', 1, 0, 1, 0),
(227, '', 'Cuenta', '2020-06-30', 50, 50, 5, '', NULL, NULL, 8000000, 'CM CARLOS DIAZ JUNIO', '2020-07-15 15:52:33', 1, 0, 1, 0),
(228, '', 'Cuenta', '2019-11-30', 33, 33, 5, '', NULL, NULL, 590000, 'CM FREDY G NOVIEMBRE', '2020-07-22 11:27:48', 1, 0, 1, 0),
(229, '', 'Cuenta', '2019-12-30', 33, 33, 5, '', NULL, NULL, 16500000, 'CM FREDY GONZALEZ DICIEMBRE', '2020-07-22 11:29:05', 1, 0, 1, 0),
(230, '', 'Cuenta', '2020-01-31', 33, 33, 5, '', NULL, NULL, 3080000, 'CM FREDY GONZALEZ ENERO', '2020-07-22 11:30:04', 1, 0, 1, 0),
(231, '', 'Cuenta', '2020-02-28', 33, 33, 5, '', NULL, NULL, 3600000, 'CM FREDY GONZALEZ FEBRERO', '2020-07-22 11:30:51', 1, 0, 1, 0),
(232, '', 'Cuenta', '2020-03-30', 33, 33, 5, '', NULL, NULL, 5000000, 'CM FREDY GONZALEZ MARZO', '2020-07-22 11:31:35', 1, 0, 1, 0),
(233, '', 'Caja Sistema', '2020-03-12', 49, 33, 0, '', 0, 0, 1000000, 'Caja menor raul', '2020-08-18 09:37:09', 1, 1, 1, 0),
(234, '', 'Caja Sistema', '2020-03-13', 49, 33, 0, '', 0, 0, 900000, 'Caja menor raul', '2020-08-18 09:39:00', 1, 1, 1, 0),
(235, '', 'Cuenta', '2020-03-24', 47, 47, 5, '', NULL, NULL, 240000, 'CM NATALIA', '2020-09-28 15:20:08', 1, 0, 1, 0),
(236, '', 'Cuenta', '2020-06-17', 47, 47, 5, '', NULL, NULL, 80000, 'CM NATALIA', '2020-09-28 15:21:08', 1, 0, 1, 0),
(237, '', 'Cuenta', '2020-07-30', 47, 47, 5, '', NULL, NULL, 410000, 'CM NATALIA', '2020-09-28 15:22:53', 1, 0, 1, 0),
(238, '', 'Cuenta', '2020-08-30', 47, 47, 5, '', NULL, NULL, 560000, 'CM NATALIA', '2020-09-28 15:23:44', 1, 0, 1, 0),
(240, '', 'Caja Sistema', '2020-10-14', 55, 33, 0, '', 0, 0, 700000, 'Pago peajes de volquetas', '2020-10-28 09:44:13', 1, 1, 1, 0),
(241, '', 'Caja Sistema', '2020-10-16', 55, 33, 0, '', 0, 0, 750000, 'Pago peajes de volquetas', '2020-10-28 09:54:51', 1, 1, 1, 0),
(242, '', 'Caja Sistema', '2020-10-20', 55, 33, 0, '', 0, 0, 410000, 'Pago peajes de volquetas', '2020-10-28 09:56:28', 1, 1, 1, 0),
(243, '', 'Caja Sistema', '2020-10-20', 55, 33, 0, '', 0, 0, 775000, 'Pago peajes volquetas', '2020-10-28 10:03:16', 1, 1, 1, 0),
(244, '', 'Caja Sistema', '2020-10-20', 55, 33, 0, '', 0, 0, 775000, 'Pago peajes volquetas', '2020-10-28 10:03:16', 1, 1, 1, 0),
(245, '', 'Cuenta', '2020-10-22', 5, 5, 5, '', NULL, NULL, 2100000, 'caja menor jose daniel meza', '2020-10-29 07:40:51', 1, 0, 1, 0),
(246, '', 'Cuenta', '2020-10-22', 5, 5, 5, '', NULL, NULL, 300000, 'caja menor jose daniel', '2020-10-29 07:42:46', 1, 0, 1, 0),
(247, '', 'Cuenta', '2020-10-22', 47, 47, 5, '', NULL, NULL, 200000, 'caja natalia', '2020-10-29 07:44:01', 1, 0, 1, 0),
(248, '', 'Cuenta', '2020-10-22', 5, 5, 5, '', NULL, NULL, 569940, 'compra con tarjeta debito obinco', '2020-10-29 07:46:59', 1, 0, 1, 0),
(249, '', 'Cuenta', '2020-10-22', 5, 5, 5, '', NULL, NULL, 195000, 'compra con tarjeta debito obinco', '2020-10-29 07:48:00', 1, 0, 1, 0),
(250, '', 'Cuenta', '2020-10-24', 47, 47, 5, '', NULL, NULL, 50000, 'caja natalia', '2020-10-29 07:49:04', 1, 0, 1, 0),
(251, '', 'Cuenta', '2020-10-26', 47, 47, 5, '', NULL, NULL, 570000, 'caja natalia', '2020-10-29 07:57:54', 1, 0, 1, 0),
(252, '', 'Cuenta', '2020-10-26', 33, 33, 5, '', NULL, NULL, 385000, 'reembolso a fredy por compra de tiquete bog-ctagena', '2020-10-29 07:58:59', 1, 0, 1, 0),
(253, '', 'Cuenta', '2020-10-27', 49, 49, 5, '', NULL, NULL, 900000, 'caja menor raul vergara', '2020-10-29 08:00:33', 1, 0, 1, 0),
(254, '', 'Cuenta', '2020-10-27', 5, 5, 5, '', NULL, NULL, 500000, 'caja jose daniel', '2020-10-29 08:01:39', 1, 0, 1, 0),
(255, '', 'Cuenta', '2020-10-27', 5, 5, 5, '', NULL, NULL, 429800, 'compra con la tarjeta debito obinco', '2020-10-29 08:02:45', 1, 0, 1, 0),
(256, '', 'Cuenta', '2020-10-27', 55, 55, 5, '', NULL, NULL, 1230000, 'dinero consignado a Talia Rincon para pago de peajes de mulas', '2020-10-29 08:07:16', 1, 0, 1, 0),
(257, '', 'Cuenta', '2020-10-20', 49, 49, 5, '', NULL, NULL, 600000, 'para pago de tecnomecanica de la mula ', '2020-10-29 08:11:39', 1, 0, 1, 0),
(258, '', 'Cuenta', '2020-10-28', 49, 49, 5, '', NULL, NULL, 500000, 'caja raul vergara', '2020-10-29 08:16:51', 1, 0, 1, 0),
(259, '', 'Cuenta', '2020-10-08', 49, 49, 5, '', NULL, NULL, 1000000, 'caja menor raul vergara ', '2020-11-10 10:53:45', 1, 0, 1, 0),
(260, '', 'Cuenta', '2020-10-01', 33, 33, 5, '', NULL, NULL, 300000, 'caja menor', '2020-11-10 11:02:58', 1, 0, 1, 0),
(261, '', 'Cuenta', '2020-10-01', 54, 54, 5, '', NULL, NULL, 700000, 'caja menor', '2020-11-10 11:04:39', 1, 0, 1, 0),
(262, '', 'Cuenta', '2020-10-01', 49, 49, 5, '', NULL, NULL, 1400000, 'CAJA MENOR RAUL', '2020-11-10 11:16:13', 1, 0, 1, 0),
(263, '', 'Cuenta', '2020-10-04', 5, 5, 5, '', NULL, NULL, 600000, 'CAJA MENOR', '2020-11-10 11:18:36', 1, 0, 1, 0),
(264, '', 'Cuenta', '2020-10-04', 5, 5, 5, '', NULL, NULL, 113100, 'COMPRA CON TARJETA JOSE DANIEL', '2020-11-10 11:20:12', 1, 0, 1, 0),
(265, '', 'Cuenta', '2020-10-04', 5, 5, 5, '', NULL, NULL, 259900, 'COMPORA EN ESTABLECIMIENTO CON TARJETA ', '2020-11-10 11:21:22', 1, 0, 1, 0),
(266, '', 'Cuenta', '2020-10-05', 33, 33, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2020-11-10 11:24:39', 1, 0, 1, 0),
(267, '', 'Cuenta', '2020-10-05', 49, 49, 5, '', NULL, NULL, 500000, 'CAJA MENOR', '2020-11-10 11:25:40', 1, 0, 1, 0),
(268, '', 'Cuenta', '2020-10-06', 49, 49, 5, '', NULL, NULL, 1300000, 'CAJA MEMOR', '2020-11-10 11:26:53', 1, 0, 1, 0),
(269, '', 'Cuenta', '2020-10-06', 49, 49, 5, '', NULL, NULL, 350000, 'CAJA MENOR', '2020-11-10 11:27:54', 1, 0, 1, 0),
(270, '', 'Cuenta', '2020-10-07', 47, 47, 5, '', NULL, NULL, 250000, 'CAJA MENOR', '2020-11-10 11:29:32', 1, 0, 1, 0),
(271, '', 'Cuenta', '2020-10-07', 49, 49, 5, '', NULL, NULL, 1644706, 'CAJA MENOR', '2020-11-10 11:30:39', 1, 0, 1, 0),
(272, '', 'Cuenta', '2020-10-07', 49, 49, 5, '', NULL, NULL, 300000, 'CAJA MENOR', '2020-11-10 11:31:59', 1, 0, 1, 0),
(273, '', 'Cuenta', '2020-10-07', 5, 5, 5, '', NULL, NULL, 134000, 'CAJA MENOR COMPRA CON TARJETA', '2020-11-10 11:36:09', 1, 0, 1, 0),
(274, '', 'Cuenta', '2020-10-09', 33, 33, 5, '', NULL, NULL, 305000, 'CAJA MENOR', '2020-11-10 11:42:33', 1, 0, 1, 0),
(275, '', 'Cuenta', '2020-10-09', 5, 5, 5, '', NULL, NULL, 240000, 'COMPRA CON TARJETA DEBITO', '2020-11-10 11:44:22', 1, 0, 1, 0),
(276, '', 'Cuenta', '2020-10-12', 5, 5, 5, '', NULL, NULL, 600000, 'CAJA MENOR', '2020-11-10 11:46:14', 1, 0, 1, 0),
(277, '', 'Cuenta', '2020-10-12', 5, 5, 5, '', NULL, NULL, 150000, 'CAJA MENOR', '2020-11-10 11:47:08', 1, 0, 1, 0),
(278, '', 'Cuenta', '2020-10-13', 49, 49, 5, '', NULL, NULL, 400000, 'CAJA MENOR', '2020-11-10 11:49:38', 1, 0, 1, 0),
(279, '', 'Cuenta', '2020-10-13', 47, 47, 5, '', NULL, NULL, 200000, 'CAJA MENOR', '2020-11-10 11:50:46', 1, 0, 1, 0),
(280, '', 'Cuenta', '2020-10-14', 33, 33, 5, '', NULL, NULL, 1000000, 'CAJA MENOR', '2020-11-10 11:54:58', 1, 0, 1, 0),
(281, '', 'Cuenta', '2020-10-14', 47, 47, 5, '', NULL, NULL, 26000, 'CAJA MENOR', '2020-11-10 11:56:12', 1, 0, 1, 0),
(282, '', 'Cuenta', '2020-10-15', 49, 49, 5, '', NULL, NULL, 580000, 'CAJA MENOR', '2020-11-10 11:57:56', 1, 0, 1, 0),
(283, '', 'Cuenta', '2020-10-16', 49, 49, 5, '', NULL, NULL, 650000, 'CAJA RAUL', '2020-11-10 14:07:09', 1, 0, 1, 0),
(284, '', 'Cuenta', '2020-10-16', 33, 33, 5, '', NULL, NULL, 800000, 'CAJA FREDY PARA PEAJES', '2020-11-10 14:08:44', 1, 0, 1, 0),
(285, '', 'Cuenta', '2020-10-16', 5, 5, 5, '', NULL, NULL, 1000000, 'CAJA JOSE ', '2020-11-10 14:12:22', 1, 0, 1, 0),
(286, '', 'Cuenta', '2020-10-18', 5, 5, 5, '', NULL, NULL, 300000, 'RETIRO POR CAJERO', '2020-11-10 14:15:45', 1, 0, 1, 0),
(287, '', 'Cuenta', '2020-10-18', 5, 5, 5, '', NULL, NULL, 300000, 'RETIRO POR CAJERO', '2020-11-10 14:29:08', 1, 0, 1, 0),
(288, '', 'Cuenta', '2020-10-19', 49, 49, 4, '', NULL, NULL, 120000, 'CAJA MENOR', '2020-11-10 14:30:03', 1, 0, 1, 0),
(289, '', 'Cuenta', '2020-10-19', 47, 47, 5, '', NULL, NULL, 100000, 'CAJA MENOR', '2020-11-10 14:31:07', 1, 0, 1, 0),
(290, '', 'Cuenta', '2020-10-20', 33, 33, 5, '', NULL, NULL, 800000, 'CAJA MENOR', '2020-11-10 14:32:05', 1, 0, 1, 0),
(291, '', 'Cuenta', '2020-10-20', 49, 49, 5, '', NULL, NULL, 800000, 'CAJA MENOR', '2020-11-10 14:35:31', 1, 0, 1, 0),
(292, '', 'Cuenta', '2020-10-20', 47, 47, 5, '', NULL, NULL, 250000, 'CAJA MENOR NATALIA', '2020-11-10 14:37:00', 1, 0, 1, 0),
(293, '', 'Cuenta', '2020-10-21', 5, 5, 5, '', NULL, NULL, 300000, 'RETIRO POR CAJERO JOSE', '2020-11-10 14:48:32', 1, 0, 1, 0),
(294, '', 'Cuenta', '2020-10-29', 5, 5, 5, '', NULL, NULL, 3500000, 'JOSE DANIEL-CM', '2020-11-10 15:00:06', 1, 0, 1, 0),
(295, '', 'Cuenta', '2020-10-30', 50, 50, 5, '', NULL, NULL, 100000, 'CAJA MENOR CARLOS DIAZ ', '2020-11-10 15:01:27', 1, 0, 1, 0),
(296, '', 'Cuenta', '2020-10-30', 33, 33, 5, '', NULL, NULL, 300000, 'CAJA FREDY', '2020-11-10 15:02:53', 1, 0, 1, 0),
(297, '', 'Cuenta', '2020-10-31', 33, 33, 5, '', NULL, NULL, 500000, 'CAJA MENOR FREDY', '2020-11-10 15:07:11', 1, 0, 1, 0),
(298, '', 'Caja Sistema', '2020-11-05', 33, 55, 0, '', 0, 0, 150000, 'Pagado a freddy', '2020-11-10 15:08:50', 1, 1, 1, 0),
(299, '', 'Cuenta', '2020-10-31', 33, 33, 5, '', NULL, NULL, 500000, 'CAJA MENOR FREDY', '2020-11-10 15:07:11', 1, 0, 1, 0),
(300, '', 'Cuenta', '2020-11-03', 5, 5, 5, '', NULL, NULL, 1500000, 'CAJA MENOR', '2020-11-13 05:25:38', 1, 0, 1, 0),
(301, '', 'Cuenta', '2020-11-03', 33, 33, 5, '', NULL, NULL, 750000, 'DINERO PARA ARREGLO DE TECHO OFICINA', '2020-11-13 05:31:08', 1, 0, 1, 0),
(302, '', 'Cuenta', '2020-11-03', 33, 33, 5, '', NULL, NULL, 150000, 'CAJA MENOR INSUMOS CANTERA', '2020-11-13 05:32:25', 1, 0, 1, 0),
(303, '', 'Cuenta', '2020-11-04', 46, 46, 5, '', NULL, NULL, 300000, 'CAJA MENOR', '2020-11-13 05:34:45', 1, 0, 1, 0),
(304, '', 'Cuenta', '2020-10-04', 55, 55, 5, '', NULL, NULL, 1000000, ' CAJA MENOR PARA  PEAJES', '2020-11-13 05:45:07', 1, 0, 1, 0),
(305, '', 'Cuenta', '2020-11-04', 55, 55, 5, '', NULL, NULL, 1500000, 'CAJA PARA PEAJES', '2020-11-13 05:46:49', 1, 0, 1, 0),
(306, '', 'Cuenta', '2020-11-06', 55, 55, 5, '', NULL, NULL, 280000, 'CAJA MENOR NATALIA', '2020-11-13 05:48:11', 1, 0, 1, 0),
(307, '', 'Cuenta', '2020-11-06', 55, 55, 5, '', NULL, NULL, 1300000, 'CAJA PARA PEAJES', '2020-11-13 05:50:57', 1, 0, 1, 0),
(308, '', 'Cuenta', '2020-11-07', 46, 46, 5, '', NULL, NULL, 500000, 'CAJA MENOR ENDER CAMACHO', '2020-11-13 05:53:19', 1, 0, 1, 0),
(309, '', 'Cuenta', '2020-11-07', 47, 47, 5, '', NULL, NULL, 50000, 'CAJA MENOR', '2020-11-13 05:56:36', 1, 0, 1, 0),
(310, '', 'Cuenta', '2020-11-08', 33, 33, 5, '', NULL, NULL, 800000, 'CAJA MENOR', '2020-11-13 05:57:40', 1, 0, 1, 0),
(311, '', 'Cuenta', '2020-11-09', 55, 55, 5, '', NULL, NULL, 356000, 'CAJA MANOR', '2020-11-13 06:00:59', 1, 0, 1, 0),
(312, '', 'Caja Sistema', '2020-11-11', 33, 55, 0, '', 0, 0, 80000, 'Pago freddy', '2020-11-13 10:45:53', 1, 1, 1, 0),
(313, '', 'Caja Sistema', '2020-11-11', 33, 55, 0, '', 0, 0, 20000, 'Pago feeddy', '2020-11-13 10:52:49', 1, 1, 1, 0),
(314, '', 'Caja Sistema', '2020-11-11', 33, 55, 0, '', 0, 0, 20000, 'Pago feeddy', '2020-11-13 10:53:54', 1, 1, 1, 0),
(315, '', 'Caja Sistema', '2020-11-23', 33, 55, 0, '', 0, 0, 150000, 'Caja menor Freddy', '2020-11-23 13:22:48', 1, 1, 1, 0),
(316, '', 'Caja Sistema', '2020-11-24', 33, 55, 0, '', 0, 0, 50000, 'Pago Freddy González', '2020-11-24 17:03:25', 1, 1, 1, 0),
(317, '', 'Caja Sistema', '2020-11-28', 33, 55, 0, '', 0, 0, 50000, 'Pago Freddy González', '2020-12-01 12:01:44', 1, 1, 1, 0),
(318, '', 'Cuenta', '2020-11-10', 55, 55, 5, '', NULL, NULL, 1500000, 'CAJA PARA PEAJES', '2020-12-10 17:18:15', 1, 0, 1, 0),
(319, '', 'Cuenta', '2020-11-11', 55, 55, 5, '', NULL, NULL, 800000, 'PEAJES CM', '2020-12-10 17:30:39', 1, 0, 1, 0),
(320, '', 'Cuenta', '2020-11-11', 47, 47, 5, '', NULL, NULL, 50000, 'caja', '2020-12-11 10:15:51', 1, 0, 1, 0),
(321, '', 'Cuenta', '2020-11-11', 55, 55, 5, '', NULL, NULL, 700000, 'caja peajes', '2020-12-11 10:34:19', 1, 0, 1, 0),
(322, '', 'Cuenta', '2020-11-11', 55, 55, 5, '', NULL, NULL, 300000, 'caja menor', '2020-12-11 10:35:31', 1, 0, 1, 0),
(323, '', 'Cuenta', '2020-11-12', 47, 47, 5, '', NULL, NULL, 300000, 'CM', '2020-12-11 10:36:26', 1, 0, 1, 0),
(324, '', 'Cuenta', '2020-11-12', 55, 55, 5, '', NULL, NULL, 1000000, 'CM', '2020-12-11 10:37:52', 1, 0, 1, 0),
(325, '', 'Cuenta', '2020-11-13', 55, 55, 5, '', NULL, NULL, 400000, 'CM', '2020-12-11 10:38:37', 1, 0, 1, 0),
(326, '', 'Cuenta', '2020-11-16', 47, 47, 5, '', NULL, NULL, 100000, 'CM', '2020-12-11 10:44:47', 1, 0, 1, 0),
(327, '', 'Cuenta', '2020-11-16', 46, 46, 5, '', NULL, NULL, 200000, 'CM', '2020-12-11 10:45:48', 1, 0, 1, 0),
(328, '', 'Cuenta', '2020-11-16', 55, 55, 5, '', NULL, NULL, 800000, 'CM', '2020-12-11 10:47:06', 1, 0, 1, 0),
(329, '', 'Cuenta', '2020-11-17', 46, 46, 5, '', NULL, NULL, 400000, 'CM', '2020-12-11 10:47:57', 1, 0, 1, 0),
(330, '', 'Cuenta', '2020-11-17', 55, 55, 5, '', NULL, NULL, 800000, 'CM', '2020-12-11 10:49:08', 1, 0, 1, 0),
(331, '', 'Cuenta', '2020-11-18', 47, 47, 5, '', NULL, NULL, 70000, 'CM', '2020-12-11 10:53:31', 1, 0, 1, 0),
(332, '', 'Cuenta', '2020-11-18', 33, 33, 5, '', NULL, NULL, 350000, 'CM', '2020-12-11 10:54:35', 1, 0, 1, 0),
(333, '', 'Cuenta', '2020-11-18', 55, 55, 5, '', NULL, NULL, 1000000, 'CM', '2020-12-11 10:56:06', 1, 0, 1, 0),
(334, '', 'Cuenta', '2020-11-19', 46, 46, 5, '', NULL, NULL, 300000, 'CM', '2020-12-11 11:05:03', 1, 0, 1, 0),
(335, '', 'Cuenta', '2020-11-19', 55, 55, 5, '', NULL, NULL, 700000, 'CM', '2020-12-11 11:06:26', 1, 0, 1, 0),
(336, '', 'Cuenta', '2020-11-20', 47, 47, 5, '', NULL, NULL, 1016000, 'CM', '2020-12-11 11:09:26', 1, 0, 1, 0),
(337, '', 'Cuenta', '2020-11-20', 59, 59, 5, '', NULL, NULL, 200000, 'CM', '2020-12-11 11:44:21', 1, 0, 1, 0),
(338, '', 'Cuenta', '2020-11-20', 55, 55, 5, '', NULL, NULL, 1000000, 'CM', '2020-12-11 11:45:12', 1, 0, 1, 0),
(339, '', 'Cuenta', '2020-11-20', 5, 5, 5, '', NULL, NULL, 1000000, 'CM', '2020-12-11 11:46:37', 1, 0, 1, 0),
(340, '', 'Cuenta', '2020-11-20', 33, 33, 5, '', NULL, NULL, 4116000, 'CM', '2020-12-11 11:47:40', 1, 0, 1, 0),
(341, '', 'Cuenta', '2020-11-21', 55, 55, 5, '', NULL, NULL, 1400000, 'CM', '2020-12-11 11:56:39', 1, 0, 1, 0),
(342, '', 'Cuenta', '2020-11-23', 55, 55, 5, '', NULL, NULL, 1500000, 'CM', '2020-12-11 12:01:01', 1, 0, 1, 0),
(343, '', 'Cuenta', '2020-11-23', 47, 47, 5, '', NULL, NULL, 550000, 'CM', '2020-12-11 15:50:32', 1, 0, 1, 0),
(344, '', 'Cuenta', '2020-11-23', 47, 47, 5, '', NULL, NULL, 950000, 'CM', '2020-12-11 16:06:49', 1, 0, 1, 0),
(345, '', 'Cuenta', '2020-11-23', 55, 55, 5, '', NULL, NULL, 650000, 'CM', '2020-12-11 16:08:00', 1, 0, 1, 0),
(346, '', 'Cuenta', '2020-11-24', 55, 55, 5, '', NULL, NULL, 200000, 'CM', '2020-12-11 16:13:12', 1, 0, 1, 0),
(347, '', 'Cuenta', '2020-11-24', 55, 55, 5, '', NULL, NULL, 1000000, 'CM', '2020-12-11 16:15:10', 1, 0, 1, 0),
(348, '', 'Cuenta', '2020-11-24', 46, 46, 5, '', NULL, NULL, 500000, 'CM', '2020-12-11 16:22:42', 1, 0, 1, 0),
(349, '', 'Cuenta', '2020-11-26', 33, 33, 5, '', NULL, NULL, 200000, 'CM', '2020-12-11 16:30:24', 1, 0, 1, 0),
(350, '', 'Cuenta', '2020-11-26', 5, 5, 5, '', NULL, NULL, 300000, 'CM', '2020-12-11 16:32:21', 1, 0, 1, 0),
(351, '', 'Cuenta', '2020-11-26', 50, 50, 5, '', NULL, NULL, 150000, 'CM', '2020-12-11 16:33:21', 1, 0, 1, 0),
(352, '', 'Cuenta', '2020-11-26', 58, 58, 5, '', NULL, NULL, 1200000, 'CM', '2020-12-11 16:34:17', 1, 0, 1, 0),
(353, '', 'Caja Sistema', '2020-12-08', 55, 57, 0, '', 0, 0, 600000, 'CAJA MENOR PEAJES', '2020-12-11 20:06:23', 1, 1, 1, 0),
(354, '', 'Caja Sistema', '2020-12-09', 55, 57, 0, '', 0, 0, 300000, 'CAJA MENOR PEAJES', '2020-12-12 20:02:37', 1, 1, 1, 0),
(355, '', 'Caja Sistema', '2020-12-09', 55, 57, 0, '', 0, 0, 600000, 'CAJA MENOR PEAJES', '2020-12-12 20:11:47', 1, 1, 1, 0),
(356, '', 'Caja Sistema', '2020-12-10', 55, 57, 0, '', 0, 0, 1060000, 'CAJA MENOR PEAJES', '2020-12-12 20:22:42', 1, 1, 1, 0),
(357, '', 'Caja Sistema', '2020-12-11', 55, 57, 0, '', 0, 0, 2180000, 'CAJA MENOR PEAJES Y REFRIGERANTE', '2020-12-12 21:06:27', 1, 1, 1, 0),
(358, '', 'Cuenta', '2020-11-27', 47, 47, 5, '', NULL, NULL, 200000, 'CAJA', '2020-12-14 11:32:29', 1, 0, 1, 0),
(359, '', 'Cuenta', '2020-11-27', 50, 50, 5, '', NULL, NULL, 220000, 'CAJA', '2020-12-14 11:33:43', 1, 0, 1, 0),
(360, '', 'Cuenta', '2020-11-27', 55, 55, 5, '', NULL, NULL, 800000, 'CAJA', '2020-12-14 11:34:45', 1, 0, 1, 0),
(361, '', 'Cuenta', '2020-11-27', 46, 46, 5, '', NULL, NULL, 500000, 'CAJA', '2020-12-14 11:35:50', 1, 0, 1, 0),
(362, '', 'Cuenta', '2020-11-27', 59, 59, 5, '', NULL, NULL, 100000, 'CAJA', '2020-12-14 11:36:48', 1, 0, 1, 0),
(363, '', 'Cuenta', '2020-11-28', 5, 5, 5, '', NULL, NULL, 300000, 'CAJA', '2020-12-14 11:48:18', 1, 0, 1, 0),
(364, '', 'Cuenta', '2020-11-28', 58, 58, 5, '', NULL, NULL, 800000, 'CAJA', '2020-12-14 11:49:50', 1, 0, 1, 0),
(365, '', 'Cuenta', '2020-11-28', 33, 33, 5, '', NULL, NULL, 250000, 'CAJA', '2020-12-14 12:03:30', 1, 0, 1, 0),
(366, '', 'Cuenta', '2020-11-29', 5, 5, 5, '', NULL, NULL, 100000, 'CAJA', '2020-12-14 12:04:52', 1, 0, 1, 0),
(367, '', 'Cuenta', '2020-11-29', 5, 5, 5, '', NULL, NULL, 600000, 'CAJA', '2020-12-14 12:06:47', 1, 0, 1, 0),
(368, '', 'Cuenta', '2020-11-30', 5, 5, 5, '', NULL, NULL, 2000000, 'CAJA ', '2020-12-14 12:09:39', 1, 0, 1, 0),
(369, '', 'Caja Sistema', '2020-12-12', 55, 57, 0, '', 0, 0, 200000, 'CAJA MENOR PEAJES', '2020-12-15 08:20:36', 1, 1, 1, 0),
(370, '', 'Cuenta', '2020-11-30', 55, 55, 5, '', NULL, NULL, 600000, 'CM THALIA', '2020-12-15 09:19:29', 1, 0, 1, 0),
(371, '', 'Caja Sistema', '2020-12-14', 55, 57, 0, '', 0, 0, 1013000, 'CAJA MENOR PEAJES', '2020-12-15 09:31:07', 1, 1, 1, 0),
(372, '', 'Caja Sistema', '2020-12-15', 55, 57, 0, '', 0, 0, 1057000, 'CAJA MENOR PEAJES', '2020-12-16 07:11:52', 1, 1, 1, 0),
(373, '', 'Caja Sistema', '2020-12-16', 55, 57, 0, '', 0, 0, 590000, 'CAJA MENOR PEAJES', '2020-12-16 20:43:38', 1, 1, 1, 0),
(374, '', 'Caja Sistema', '2020-12-16', 55, 57, 0, '', 0, 0, 234000, 'CAJA MENOR PEAJES', '2020-12-16 21:08:09', 1, 1, 1, 0),
(375, '', 'Caja Sistema', '2020-12-16', 55, 57, 0, '', 0, 0, 450000, 'CAJA MENOR PEAJES', '2020-12-16 21:09:24', 1, 1, 1, 0),
(376, '', 'Caja Sistema', '2020-12-17', 55, 57, 0, '', 0, 0, 940000, 'CAJA MENOR PEAJES', '2020-12-21 06:07:40', 1, 1, 1, 0),
(377, '', 'Caja Sistema', '2020-12-18', 55, 57, 0, '', 0, 0, 1340000, 'CAJA MENOR PEAJES', '2020-12-21 06:09:41', 1, 1, 1, 0),
(378, '', 'Caja Sistema', '2020-12-19', 55, 57, 0, '', 0, 0, 1000000, 'CAJA MENOR PEAJES', '2020-12-21 10:12:21', 1, 1, 1, 0),
(379, '', 'Cuenta', '2021-01-08', 57, 57, 10, '', NULL, NULL, 150000, 'hola mundo', '2021-01-08 15:44:42', 1, 0, 1, 1434),
(380, '', 'Cuenta', '2020-12-01', 55, 55, 5, '', NULL, NULL, 1280000, 'peajes', '2021-01-12 15:47:11', 1, 0, 1, 1437),
(381, '', 'Cuenta', '2020-12-02', 55, 55, 5, '', NULL, NULL, 1280000, 'CAJA PEAJES', '2021-01-12 16:01:21', 1, 0, 1, 1442),
(382, '', 'Cuenta', '2020-12-01', 58, 58, 5, '', NULL, NULL, 200000, 'CM', '2021-01-12 16:02:21', 1, 0, 1, 1443),
(383, '', 'Cuenta', '2020-12-03', 55, 55, 5, '', NULL, NULL, 1280000, 'PEAJES', '2021-01-12 16:25:42', 1, 0, 1, 1449),
(384, '', 'Cuenta', '2020-12-04', 59, 59, 5, '', NULL, NULL, 640000, 'CM', '2021-01-12 16:32:01', 1, 0, 1, 1452),
(385, '', 'Cuenta', '2020-12-04', 57, 57, 5, '', NULL, NULL, 500000, 'CM', '2021-01-12 16:33:19', 1, 0, 1, 1453),
(386, '', 'Cuenta', '2020-12-04', 46, 46, 5, '', NULL, NULL, 300000, 'CM', '2021-01-12 16:37:28', 1, 0, 1, 1455);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_cuenta`
--

CREATE TABLE `ingresos_cuenta` (
  `id_ingreso_cuenta` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `cuenta_aportante` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `concepto` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `ingreso_por` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `factura_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_ingreso` bigint(20) NOT NULL,
  `ingreso_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_cheque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `concepto_cheque` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_ingreso` int(11) NOT NULL,
  `ingreso_publicado` int(11) NOT NULL,
  `ingreso_por_cuentas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id_insumo` int(11) NOT NULL,
  `nombre_insumo` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `estado_insumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id_insumo`, `nombre_insumo`, `estado_insumo`) VALUES
(1, 'ACPM', 1),
(2, 'ACPM', 0),
(3, 'Arena Lavada', 1),
(4, 'Repuestos', 1),
(5, 'Ant Admon', 1),
(6, 'Agregados', 0),
(7, 'Arena Triturada', 1),
(8, 'Polvillo', 1),
(9, 'Grava 3/4&quot;', 1),
(10, 'Grava de 1/2&quot;', 1),
(11, 'Arena natural', 1),
(12, 'Asfalto modificado', 1),
(13, 'Full Oil', 1),
(14, 'Caja menor', 1),
(15, 'Otros', 1),
(16, 'Transporte', 1),
(17, 'Asfalto', 1),
(18, 'Nomina', 1),
(19, 'Mat/Serv Adecuacion', 1),
(20, 'Impuestos', 1),
(21, 'CHEQUERAS', 1),
(22, 'Gravament/Comisiones', 1),
(23, 'Terraje', 1),
(24, 'Aporte a Socios', 1),
(25, 'Gravilla', 1),
(26, 'Gastos Oficina', 1),
(27, 'MATERIAL DE CONSTRUCCION', 1),
(28, 'MENSAJERIA', 1),
(29, 'JORNALES DE AYUDANTE', 1),
(30, 'PRIMAS JUNIO', 0),
(31, 'Equipos', 1),
(32, 'Vigilancia', 1),
(33, 'Contratista', 1),
(34, 'SEGURIDAD SOCIAL', 0),
(35, 'ALQUILER DE TABLEROS', 1),
(36, 'ENERGIA ELECTRICA', 0),
(37, 'comision CAT', 1),
(38, 'SERVICIOS PUBLICOS', 1),
(39, 'revoltillo', 1),
(40, 'ALQUILER DE VOLQUETA', 1),
(41, 'EPP', 1),
(42, 'IVA TEMPORAL DE LA PLANTA DE ASFALTO', 0),
(43, 'Arena Cernida', 0),
(44, 'GASTOS ADMON', 1),
(45, 'ARRENDAMIENTO', 1),
(46, 'HONORARIOS TOPOGRAFIA', 1),
(47, 'PAGO PRESTAMOS', 1),
(48, 'LABORATORIOS', 1),
(49, 'ALQUILER DE CLASIFICADORA', 1),
(50, 'OSCAR SANCHEZ BAYONA', 1),
(51, 'Piedra Rajon', 1),
(52, 'Piedra Rajon', 1),
(53, 'ALQUILER DE TORRE DE ILUMINACION', 1),
(54, 'ASESORIA SG-SST', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `tipo_movimiento` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `m_funcionarios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_usuarios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_rubros` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_subrubro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_documentos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cuentas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_gestioncuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cajas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_equipos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_gestionequipos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_reportes` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `id_rol`, `id_usuario`, `m_funcionarios`, `m_usuarios`, `m_rubros`, `m_subrubro`, `m_documentos`, `m_cuentas`, `m_gestioncuenta`, `m_cajas`, `m_equipos`, `m_gestionequipos`, `m_reportes`) VALUES
(1, 1, 1, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(2, 1, 2, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(3, 3, 3, 'No', 'No', 'No', 'No', 'Si', 'No', 'Si', 'No', 'Si', 'Si', 'Si'),
(4, 3, 4, 'Si', 'No', 'No', 'No', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(6, 4, 6, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(7, 1, 7, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(8, 5, 9, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(9, 1, 10, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(10, 1, 11, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(11, 5, 12, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(12, 6, 13, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(13, 7, 14, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(14, 1, 16, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(15, 3, 18, 'Si', 'No', 'No', 'No', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(16, 8, 19, 'Si', 'No', 'No', 'No', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misdocumentos`
--

CREATE TABLE `misdocumentos` (
  `id_midocumento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `misdocumentos`
--

INSERT INTO `misdocumentos` (`id_midocumento`, `id_usuario`, `nombre_documento`, `imagen`, `fecha_expira`, `alerta`, `marca_temporal`, `creado_por`, `estado_midocumento`, `midocumento_publicado`) VALUES
(6, 1, 'VALIDACI??N', 'images/misdocumentos/13058default.png', '2019-03-07', 'Si', '2019-03-07 22:39:36', 1, 1, 0),
(7, 2, 'Registro Civil Valentina Meza Zuleta', 'images/misdocumentos/41665image.jpg', '0000-00-00', 'No', '2019-03-08 08:03:15', 2, 1, 0),
(8, 2, 'Registro Civil Valentina Meza Zuleta', 'images/misdocumentos/38470Archivo 2019-03-08 08.17.00.pdf', '0000-00-00', 'No', '2019-03-08 08:10:09', 2, 1, 0),
(9, 2, 'Retractaci??n Fiscal??a Elkin Javier Lopez', 'images/misdocumentos/59436Archivo 2019-03-08 08.22.14.pdf', '0000-00-00', 'No', '2019-03-08 08:14:10', 2, 1, 0),
(10, 2, 'Hoja de Vida Jose Daniel Meza', 'images/misdocumentos/1922Hoja de Vida 2018 jdm.pdf', '0000-00-00', 'Si', '2019-03-08 08:41:39', 1, 1, 0),
(11, 1, 'EJEMPLO', 'images/misdocumentos/87054default.png', '2019-03-08', 'Si', '2019-03-08 08:59:56', 1, 1, 0),
(12, 2, 'Certificaci??n Bancaria Bancolombia Jose Daniel Meza', 'images/misdocumentos/79711certificacion bancaria.pdf', '2020-01-30', 'Si', '2019-03-08 16:34:32', 1, 1, 0),
(13, 2, 'Certificaci??n Bancaria Banco Occidente Jose Daniel Meza', 'images/misdocumentos/16479Certicacion Jose D.pdf', '2019-09-18', 'Si', '2019-03-08 17:31:24', 2, 1, 0),
(14, 2, 'Cedula Jose Daniel Meza', 'images/misdocumentos/78906Cedula Jose Daniel Meza.pdf', '1970-01-01', 'No', '2019-03-24 12:06:45', 2, 1, 0),
(15, 2, 'Chequera Obinco-M', 'images/misdocumentos/1146846060167-9DB5-4A5C-AAEB-F116D5470ACC.jpeg', '2069-12-31', 'No', '2019-06-05 17:30:21', 2, 1, 0),
(16, 1, 'Certificado Bancolombia', 'images/misdocumentos/73517Certificado-Bancolombia.pdf', '2069-12-31', 'No', '2019-06-08 08:17:30', 1, 1, 1),
(17, 1, 'Cedula', 'images/misdocumentos/40880Cedula Fredy.pdf', '2069-12-31', 'No', '2019-06-08 08:29:39', 1, 1, 1),
(18, 1, 'Certificado Davivienda', 'images/misdocumentos/5464Certificado-Davivienda.pdf', '2019-07-19', 'Si', '2019-06-08 09:08:46', 1, 1, 1),
(19, 1, 'Registro Sara', 'images/misdocumentos/60725Registro Civil.pdf', '2069-12-31', 'No', '2019-06-08 09:09:44', 1, 1, 1),
(20, 1, 'RUT - FREDY', 'images/misdocumentos/72633Rut-Fredy Gonzalez.pdf', '2069-12-31', 'No', '2019-06-08 09:10:50', 1, 1, 1),
(21, 1, 'RUT - TEKSYSTEM', 'images/misdocumentos/82619RUT-TEKSYSTEM-2017.pdf', '2069-12-31', 'No', '2019-06-08 09:11:56', 1, 1, 1),
(22, 1, 'Registro - Fredy', 'images/misdocumentos/16975Registro_20170723172827.pdf', '2069-12-31', 'No', '2019-06-08 09:15:46', 1, 1, 1),
(23, 1, 'T.I Juana', 'images/misdocumentos/94602Tarjeta Identidad Juana_20180117160842.pdf', '2069-12-31', 'No', '2019-06-08 09:15:59', 1, 1, 1),
(24, 1, 'Diploma - SENA', 'images/misdocumentos/42305Diploma Tecnologo en Sistemas.pdf', '2069-12-31', 'No', '2019-06-08 09:16:36', 1, 1, 1),
(25, 1, 'Hoja de Vida 2019', 'images/misdocumentos/15283Hoja de Vida 2019.pdf', '2069-12-31', 'No', '2019-06-10 16:37:30', 1, 1, 1),
(26, 1, 'Radicado Oswaldo', 'images/misdocumentos/7363220190822095059713.pdf', '2069-12-31', 'No', '2019-08-22 08:54:23', 1, 1, 1),
(27, 1, 'Registro Juana', 'images/misdocumentos/91234Registro_Juana.pdf', '2069-12-31', 'No', '2019-09-17 11:32:20', 1, 1, 1),
(28, 1, 'Resoluci?n Facturaci?n Dian', 'images/misdocumentos/6684618763000656620.pdf', '2020-09-25', 'Si', '2019-09-25 08:03:02', 1, 1, 1),
(29, 4, 'CERTIFICACION BANCARIA', 'images/misdocumentos/5021Soporte - 2019-11-26T142143.066.pdf', '2069-12-31', 'No', '2019-11-26 14:21:55', 4, 1, 1),
(30, 1, 'Cedula Elsy', 'images/misdocumentos/89676cedula-elsy.pdf', '2069-12-31', 'No', '2020-01-03 12:58:43', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre_modulo`, `estado_modulo`) VALUES
(1, 'Cuentas', 1),
(2, 'Equipos', 1),
(3, 'Empleados', 1),
(4, 'Personal', 1),
(5, 'Proveedores', 1),
(6, 'Clientes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_inventario`
--

CREATE TABLE `movimientos_inventario` (
  `id` int(11) NOT NULL,
  `tipo_movimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos_inventario`
--

INSERT INTO `movimientos_inventario` (`id`, `tipo_movimiento`, `estado_reporte`, `reporte_publicado`) VALUES
(1, 'Cargue Inicial', 1, 1),
(2, 'Entraada x trituracion', 1, 1),
(3, 'Entrada x compra', 1, 1),
(4, 'Salida Mezcla', 1, 1),
(5, 'Salida Despacho', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `reportado_por` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_novedad` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_novedad` date NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_novedad` int(11) NOT NULL,
  `novedad_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`id`, `funcionario_id`, `reportado_por`, `tipo_novedad`, `fecha_novedad`, `imagen`, `observaciones`, `creado_por`, `estado_novedad`, `novedad_publicado`, `marca_temporal`) VALUES
(14, 4, 'Jose Daniel Meza', 'Llamado de atencion verbal', '2019-07-01', '', 'No ten?a puesto los EPP', 1, 1, 0, '2019-07-01 19:58:04'),
(15, 31, 'Fredy Gonzalez', 'Llamado de atencion verbal', '2019-07-02', 'images/novedades/51496Captura de pantalla 2019-06-04 a la(s) 1.21.10 p. m..png', '15 minutos de retardo', 1, 1, 0, '2019-07-02 08:38:23'),
(16, 45, 'Fredy Gonzalez', 'Retiro', '2019-07-02', '', 'Se le informa al empleado el causal del despido: No cumple con las condiciones laborales en el periodo de prueba.', 1, 1, 1, '2019-07-03 08:26:27'),
(17, 30, 'Fredy Gonzalez', 'Perdida de EPP', '2019-07-03', '', 'Jigj', 1, 1, 0, '2019-07-03 12:37:03'),
(18, 37, 'Fredy Gonzalez', 'Observacion', '2019-07-04', 'images/novedades/20965default.png', 'Operador  se encuentra laborando en Buenaventura bajo la n?mina de Obinco.', 1, 1, 1, '2019-07-04 12:05:37'),
(19, 45, 'Fredy Gonzalez', 'Observacion', '2019-07-03', '', 'LLEGO A LAS 3:00 PM HASTA LAS 6:00 PM', 1, 1, 1, '2019-07-04 14:28:51'),
(20, 45, 'Fredy Gonzalez', 'Dia no laborado', '2019-07-04', '', 'Hoy no estuvo en la oficina, me realizo llamada.', 1, 1, 1, '2019-07-04 14:29:22'),
(21, 35, 'Fredy Gonzalez', 'Retiro', '2019-07-08', '', 'el empleado voluntariamente notifico su renuncia a la empresa', 4, 1, 1, '2019-07-08 17:52:49'),
(22, 49, 'Fredy Gonzalez', 'Retiro', '2019-07-11', '', 'vuelve a M&amp;M', 4, 1, 1, '2019-07-12 09:14:34'),
(23, 58, 'Fredy Gonzalez', 'Observacion', '2019-07-13', '', 'Se deben 4 dias del mes pasado, se le informo que se le pagan en la proxima nomina.', 1, 1, 1, '2019-07-13 10:54:16'),
(24, 58, 'Fredy Gonzalez', 'Retiro', '2019-07-13', '', 'despido', 4, 1, 0, '2019-07-15 08:35:31'),
(25, 32, 'Fredy Gonzalez', 'Retiro', '2019-07-31', '', 'cambio de cargo a operador de mula', 4, 1, 1, '2019-08-01 17:14:09'),
(26, 42, 'Fredy Gonzalez', 'Retiro', '2019-07-31', '', 'renuncia voluntaria', 4, 1, 1, '2019-08-01 17:17:43'),
(27, 66, 'Natalia Hernandez', 'Observacion', '2019-08-20', '', 'INGRESO POR OPS EL 12 PERO SE LE PAGA EN NOMINA DESDE EL 21 DE AGOSTO', 4, 1, 1, '2019-08-20 15:17:08'),
(28, 48, 'Jose Daniel Meza', 'Observacion', '2019-08-20', '', 'Pagar extras por dias 17-18-19 de agosto.', 1, 1, 1, '2019-08-20 16:18:48'),
(29, 54, 'Fredy Gonzalez', 'Observacion', '2019-08-17', '', 'Pagar horario extra dia 17 de agosto , trabajo hasta las 6:30 pm con la camioneta RLL367', 1, 1, 1, '2019-08-20 16:22:50'),
(30, 47, 'Fredy Gonzalez', 'Permiso', '2019-08-14', '', 'Carlos estuvo de permiso por nacimiento del hijo, desde el dia 14 de agosto al 20 de agosto.', 1, 1, 1, '2019-08-20 16:24:27'),
(31, 66, 'Fredy Gonzalez', 'Observacion', '2019-08-20', '', 'Adicionar liquidacion o saldos pendientes de meses anteriores', 1, 1, 1, '2019-08-20 16:28:00'),
(32, 54, 'Fredy Gonzalez', 'Retiro', '2019-08-24', '', 'DESPIDO POR TERMINACI?N DE IBRA LABOR', 4, 1, 1, '2019-08-24 11:15:27'),
(33, 37, 'Fredy Gonzalez', 'Retiro', '2019-07-31', '', 'RETIRO POR ABANDONO DE PUESTO DE TRABAJO EN BUENAVENTURA', 4, 1, 0, '2019-08-24 11:16:44'),
(34, 53, 'Fredy Gonzalez', 'Memorando', '2019-09-01', '', 'Trabajador llego a las 8:45 a recibir el turno que era a las 6:00 am.', 1, 1, 1, '2019-09-06 20:38:14'),
(35, 58, 'Jose Daniel Meza', 'Llamado de atencion verbal', '2019-09-05', '', 'Se encontraba sentado sin hacer nada con el soldador', 1, 1, 1, '2019-09-06 20:40:40'),
(36, 67, 'Fredy Gonzalez', 'Observacion', '2019-09-18', '', 'descontar da?o a volqueta 45 mil pesos', 4, 1, 1, '2019-09-18 08:47:02'),
(37, 69, 'Fredy Gonzalez', 'Incapacidad', '2019-10-18', 'images/novedades/582967380E71B-5F0F-4F7A-AA73-4414773FDE36.jpeg', 'Se reporta indispuesto y acude al centro medico (Pendiente documento de incapacidad)', 9, 1, 1, '2019-10-18 16:32:45'),
(38, 69, 'Fredy Gonzalez', 'Llamado de atencion verbal', '2019-10-17', '', 'Se hace llamado de atenci?n al se?or Acosta por no acatar una instrucci?n de su jefe directo. \r\nDesacato que tuvo consecuencias negativas en el proceso productivo de este mismo d?a.', 9, 1, 1, '2019-10-18 16:34:14'),
(39, 32, 'Jose Daniel Meza', 'Retiro', '2019-10-24', '', 'despido por terminacion de contrato JD', 4, 1, 1, '2019-10-26 09:39:34'),
(40, 41, 'Jose Daniel Meza', 'Retiro', '2019-10-25', '', 'Despido por terminaci?n de contrato JD', 4, 1, 1, '2019-10-26 09:41:40'),
(41, 31, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', '6 HORAS EXTRAS ENTRE 12 Y 6 DE LA TARDE', 9, 1, 1, '2019-11-05 14:18:28'),
(42, 32, 'Caroline Castillo', 'Retiro', '2019-10-24', '', 'RETIRO POR TERMINACION DE CONTRATO', 9, 1, 0, '2019-11-05 14:24:27'),
(43, 32, 'Caroline Castillo', 'Retiro', '2019-10-24', '', 'RETIRO POR TERMINACI?N DE CONTRATO', 9, 1, 0, '2019-11-05 14:25:41'),
(44, 33, 'Caroline Castillo', 'Horas Extras', '2018-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 14:29:12'),
(45, 34, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 14:31:45'),
(46, 34, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL DOMINGO DE 7 AM A 12 PM', 9, 1, 1, '2019-11-05 14:32:17'),
(47, 31, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO ENTRE 7 AM  Y 12 PM', 9, 1, 1, '2019-11-05 14:39:52'),
(48, 33, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO ENTRE 7 AM Y 12 PM', 9, 1, 1, '2019-11-05 14:41:02'),
(49, 35, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 0, '2019-11-05 14:43:51'),
(50, 35, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 0, '2019-11-05 14:44:31'),
(51, 36, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 14:46:56'),
(52, 36, 'Caroline Castillo', 'Horas Extras', '2019-11-04', '', 'SE LABORO EL DOMINGO DE 7 AM A 12 PM', 9, 1, 0, '2019-11-05 14:47:18'),
(53, 37, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 0, '2019-11-05 14:48:34'),
(54, 37, 'Caroline Castillo', 'Horas Extras', '2019-11-04', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 14:48:59'),
(55, 38, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 14:50:42'),
(56, 38, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 0, '2019-11-05 14:51:55'),
(57, 43, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 14:54:23'),
(58, 43, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 14:54:40'),
(59, 38, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMONGO DE 7AM A 12PM', 9, 1, 0, '2019-11-05 14:57:40'),
(60, 36, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 14:59:51'),
(61, 46, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:02:48'),
(62, 46, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 15:03:05'),
(63, 47, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:05:30'),
(64, 47, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 15:05:51'),
(65, 52, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:07:04'),
(66, 52, 'Caroline Castillo', 'Horas Extras', '2019-11-04', '', 'SE LABORO EL SABADO  3 DE 6AM AL DOMINGO 4 , A 6AM', 9, 1, 1, '2019-11-05 15:07:44'),
(67, 48, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:11:27'),
(68, 48, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 15:11:54'),
(69, 38, 'Caroline Castillo', 'Horas Extras', '2009-11-04', '', 'SE LABORO EL SABADO 3 DE 6 PM A DOMINGO 4, A LAS 6AM', 9, 1, 1, '2019-11-05 15:14:03'),
(70, 56, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:16:55'),
(71, 56, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 15:17:13'),
(72, 58, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:18:43'),
(73, 58, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 15:19:07'),
(74, 61, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:21:24'),
(75, 61, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 15:21:43'),
(76, 63, 'Caroline Castillo', 'Horas Extras', '2018-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:23:09'),
(77, 63, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 15:23:30'),
(78, 64, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:24:35'),
(79, 64, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 15:24:51'),
(80, 65, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:26:05'),
(81, 65, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 15:26:24'),
(82, 66, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:27:22'),
(83, 66, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMONGO DE 7AM A 12 PM', 9, 1, 0, '2019-11-05 15:27:45'),
(84, 66, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL SABADO  2 DE 6PM  DOMINGO 3, A LAS 6AM', 9, 1, 1, '2019-11-05 15:28:42'),
(85, 67, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:31:12'),
(86, 67, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 15:31:35'),
(87, 69, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:32:45'),
(88, 69, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 15:33:02'),
(89, 69, 'Caroline Castillo', 'Horas Extras', '2019-11-04', '', 'LABORO EL LUNES FESTIVO ENTRE 7 Y 9 AM', 9, 1, 1, '2019-11-05 15:33:40'),
(90, 72, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:34:57'),
(91, 72, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 15:35:19'),
(92, 72, 'Caroline Castillo', 'Horas Extras', '2019-11-04', '', 'SE LABORO EL LUNES FESTIVO ENTRE 7 Y 9 AM', 9, 1, 1, '2019-11-05 15:35:49'),
(93, 73, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:37:14'),
(94, 73, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12 PM', 9, 1, 1, '2019-11-05 15:37:33'),
(95, 74, 'Caroline Castillo', 'Horas Extras', '2019-11-02', '', 'SE LABORO EL SABADO  DE 12 A 6 PM', 9, 1, 1, '2019-11-05 15:38:32'),
(96, 74, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 15:38:48'),
(97, 74, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'SE LABORO EL DOMINGO DE 7AM A 12PM', 9, 1, 1, '2019-11-05 15:38:48'),
(98, 37, 'Fredy Gonzalez', 'Retiro', '2019-07-31', '', 'despido por abandono de puesto de trabajo en buenaventura', 4, 1, 1, '2019-11-20 08:54:13'),
(99, 31, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro domingo 3 de noviembre entre las 7 y la 1 pm para un total de 6 horas extras.', 9, 1, 1, '2019-12-02 08:56:49'),
(100, 33, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro domingo 3 de noviembre entre las 7 y la 1 pm para un total de 6 horas extras.', 9, 1, 1, '2019-12-02 08:59:30'),
(101, 34, 'Caroline Castillo', 'Horas Extras', '2019-12-02', '', 'Laboro domingo 3 de noviembre entre las 7 y la 1 pm para un total de 6 horas extras.', 9, 1, 1, '2019-12-02 09:00:22'),
(102, 36, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro el domingo 03/11 entre las 7 y la 1 pm para un total de 6 horas extras.', 9, 1, 1, '2019-12-02 09:33:54'),
(103, 36, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro el domingo 03/11 entre las 7 y la 1 pm para un total de 6 horas extras.', 9, 1, 1, '2019-12-02 09:34:45'),
(104, 38, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro el domingo 03/11 entre las 7 y la 1 pm para un total de 6 horas extras.', 9, 1, 1, '2019-12-02 09:47:06'),
(105, 39, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro el domingo 03/11 entre las 7 y la 1 pm para un total de 6 horas extras.', 9, 1, 1, '2019-12-02 09:49:00'),
(106, 43, 'Caroline Castillo', 'Horas Extras', '2019-01-03', '', 'Laboro el domingo 03/11 entre las 7 y la 1 pm para un total de 6 horas extras.', 9, 1, 1, '2019-12-02 09:50:31'),
(107, 46, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro el 3 de noviembre entre las 7 y la 1 pm, para un total de 6 horas extras', 9, 1, 1, '2019-12-02 11:46:45'),
(108, 47, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro el 3 de noviembre entre las 7 y la 1 pm, para un total de 6 horas extras', 9, 1, 1, '2019-12-02 11:59:57'),
(109, 47, 'Caroline Castillo', 'Horas Extras', '2019-01-22', '', 'Laboro el 22 de noviembre entre las 7 y la 1 pm, para un total de 6 horas extras', 9, 1, 1, '2019-12-02 12:00:20'),
(110, 48, 'Caroline Castillo', 'Horas Extras', '2019-11-03', '', 'Laboro el 3 de noviembre entre las 7 y la 1 pm, para un total de 6 horas extras', 9, 1, 1, '2019-12-02 12:05:01'),
(111, 78, 'Caroline Castillo', 'Retiro', '2019-12-19', '', 'RENUNCIA VOLUNTARIA', 4, 1, 1, '2019-12-19 11:23:39'),
(112, 78, 'Fredy Gonzalez', 'Retiro', '2019-12-16', '', 'RETIRO POR MOTIVOS PERSONALES,CARTA DE RENUNCIA  RECIBIDA POR FREDI GONZALEZ', 12, 1, 1, '2019-12-19 14:49:16'),
(113, 69, 'Caroline Castillo', 'Horas Extras', '2019-12-23', '', 'Laboro los d?as Domingo 01-12-2019 y Domingo 15/12/2019', 12, 1, 1, '2019-12-23 08:15:50'),
(114, 65, 'Caroline Castillo', 'Horas Extras', '2019-12-23', '', 'Laboro los d?as Domingo 01/12/209   y Domingo 15/12/2019', 12, 1, 1, '2019-12-23 08:19:12'),
(115, 48, 'Caroline Castillo', 'Horas Extras', '2019-12-23', '', 'Laboro los d?as Domingo 01/12/2019 y Domingo 15/12/2019', 12, 1, 1, '2019-12-23 08:21:28'),
(116, 85, 'Caroline Castillo', 'Horas Extras', '2019-12-23', '', 'Labor? horas extras desde el d?a mi?rcoles 17/12/2019 hasta el d?a viernes 20/12/2019  \r\nSe debe pagar medio bono', 12, 1, 1, '2019-12-23 08:22:43'),
(117, 56, 'Caroline Castillo', 'Horas Extras', '2019-12-23', '', 'Labor? horas extras desde el d?a lunes 16/12/2019 hasta el d?a viernes 20/12/2019\r\nSe debe pagar medio bono', 12, 1, 1, '2019-12-23 08:28:23'),
(118, 58, 'Caroline Castillo', 'Horas Extras', '2019-12-23', '', 'Labor? horas extras desde el d?a lunes 16/12/2019 hasta el dia viernes 20/12/2019\r\nSe debe pagar medio bono', 12, 1, 1, '2019-12-23 08:30:46'),
(119, 80, 'Caroline Castillo', 'Horas Extras', '2019-12-23', '', 'Labor? horas extras desde el d?a lunes 16/12/2019 hasta el d?a viernes 20/12/2019\r\nSe debe pagar medio bono', 12, 1, 1, '2019-12-23 08:32:35'),
(120, 33, 'Caroline Castillo', 'Horas Extras', '2019-12-23', '', 'Labor? horas extras desde el d?a lunes 16/12/2019 hasta 20/12/2019\r\nSe debe pagar medio bono', 12, 1, 1, '2019-12-23 08:34:47'),
(121, 64, 'Caroline Castillo', 'Incapacidad', '2019-12-22', '', 'Incapacidad por los d?as 22 y 23 de Diciembre del 2019', 12, 1, 1, '2019-12-26 16:30:45'),
(122, 71, 'Caroline Castillo', 'Retiro', '2019-12-17', '', 'renuncia voluntaria', 4, 1, 1, '2019-12-27 15:33:58'),
(123, 69, 'Fredy Gonzalez', 'Retiro', '2020-01-13', '', 'despido', 4, 1, 1, '2020-01-14 14:17:45'),
(124, 81, 'Fredy Gonzalez', 'Retiro', '2020-01-13', '', 'renuncia voluntaria', 4, 1, 1, '2020-01-14 14:23:29'),
(125, 52, 'Fredy Gonzalez', 'Horas Extras', '2020-01-06', '', 'Dominical nocturno', 1, 1, 1, '2020-02-01 09:54:32'),
(126, 80, 'Fredy Gonzalez', 'Horas Extras', '2020-01-06', '', '2 Sabados - Despacho en la madrugada de asfalto Daberlis', 1, 1, 1, '2020-02-01 09:55:18'),
(127, 50, 'Fredy Gonzalez', 'Horas Extras', '2020-01-31', '', '1 Sabado de elecciones\r\n2 horas extras legales (Semana del 27 al 31 de Enero)', 1, 1, 1, '2020-02-01 09:57:00'),
(128, 34, 'Fredy Gonzalez', 'Horas Extras', '2020-01-31', '', '1 Sabado de elecciones\r\n2 horas extras legales (Semana del 27 al 31 de Enero)', 1, 1, 1, '2020-02-01 09:58:21'),
(129, 63, 'Fredy Gonzalez', 'Horas Extras', '2020-01-31', '', '1 sabado de elecciones\r\n2 horas extras legales (Semana del 27 al 31 de Enero)', 1, 1, 0, '2020-02-01 09:59:02'),
(130, 64, 'Fredy Gonzalez', 'Horas Extras', '2020-02-01', '', '2 horas extras legales (Semana del 27 al 31 de Enero)', 1, 1, 1, '2020-02-01 10:00:03'),
(131, 63, 'Fredy Gonzalez', 'Horas Extras', '2020-01-31', '', '2 horas extras legales (Semana del 27 al 31 de Enero)', 1, 1, 1, '2020-02-01 10:02:49'),
(132, 61, 'Fredy Gonzalez', 'Horas Extras', '2020-01-31', '', '2 horas extras legales (Semana del 27 al 31 de Enero)', 1, 1, 1, '2020-02-01 10:03:20'),
(133, 72, 'Fredy Gonzalez', 'Horas Extras', '2020-01-31', '', 'Bono al empleado del mes', 1, 1, 1, '2020-02-01 10:04:28'),
(134, 51, 'Fredy Gonzalez', 'Llamado de atencion escrito', '2020-01-28', 'images/novedades/26916image.jpg', 'Descuento de 10 galones de combustible a $9.220 por mala manipulacion al momento del tanqueo y no reportarlo al jefe inmediato', 1, 1, 1, '2020-02-01 10:05:35'),
(135, 51, 'Fredy Gonzalez', 'Llamado de atencion escrito', '2020-01-31', 'images/novedades/15311image.jpg', 'Llamado de atencion por escrito por no tener actualizado el reporte de combustible en Sofia.', 1, 1, 1, '2020-02-01 10:07:26'),
(136, 56, 'Fredy Gonzalez', 'Llamado de atencion escrito', '2020-01-31', 'images/novedades/36038image.jpg', 'Llamado de atencion por no portar sus elementos de dotacion y epp', 1, 1, 1, '2020-02-01 10:08:30'),
(137, 73, 'Fredy Gonzalez', 'Llamado de atencion escrito', '2020-02-06', '', 'incurrio en no cumplir con las pol?ticas de confidencialidad de la empresa las cuales estan implicitas en su contrato, adicional a esto se salto el conducto regular ya que no notifico a su jefe inmediato la solicitud de EPP y si lo hizo ante un tercero de la compa?ia, colocando en duda los procesos internos de la empresa.', 1, 1, 1, '2020-02-06 10:48:27'),
(138, 85, 'Fredy Gonzalez', 'Llamado de atencion verbal', '2020-02-06', '', 'Se hace llamado de atencion por no registrar una remision el dia 05 de Febrero', 1, 1, 1, '2020-02-06 10:50:00'),
(139, 85, 'Fredy Gonzalez', 'Horas Extras', '2020-01-31', '', 'Se reportan horas extras de 5 dias con doble turno que estuvo cuando salio DZahit', 1, 1, 1, '2020-02-06 10:50:35'),
(140, 79, 'Fredy Gonzalez', 'Observacion', '2020-02-01', '', 'DESDE EL 30 DE ENERO ESTA OPERANDO UNA VOLQUETA DOBLETROQUE', 4, 1, 1, '2020-02-11 16:03:06'),
(141, 51, 'Caroline Castillo', 'Retiro', '2020-02-22', '', 'renuncia voluntaria', 4, 1, 1, '2020-02-27 08:36:42'),
(142, 58, 'Fredy Gonzalez', 'Retiro', '2020-03-23', '', 'DESPIDO POR JUSTA CAUSA (CON EVIDENCIA)', 12, 1, 1, '2020-03-23 11:09:05'),
(143, 82, 'Fredy Gonzalez', 'Retiro', '2020-03-21', '', 'renuncia voluntaria', 12, 1, 1, '2020-03-24 09:13:39'),
(144, 31, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'REINICIO DE LABORES (VACACIONES FORZADAS POR CONSECUENCIAS DEL COVID-19)', 12, 1, 1, '2020-05-04 14:50:24'),
(145, 33, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'REINGRESO A LABORAR (DESPU?S DE VACACIONES FORZADAS POR PANDEMIA COVID-19)', 12, 1, 0, '2020-05-04 15:01:06'),
(146, 39, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'reingreso a la cantera despues de 15 dias de vacaciones anticipadas (covid-19)', 12, 1, 0, '2020-05-05 11:04:32'),
(147, 80, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'Reingreso (covid--19)', 12, 1, 1, '2020-05-05 11:30:49'),
(148, 86, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'reingreso (covid--19)', 12, 1, 1, '2020-05-05 11:33:35'),
(149, 33, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'Reingreso(covid-19)', 12, 1, 1, '2020-05-05 11:42:05'),
(150, 33, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'Reingreso(covid-19)', 12, 1, 0, '2020-05-05 11:43:15'),
(151, 85, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'Reingreso(covid-19)', 12, 1, 1, '2020-05-05 11:45:45'),
(152, 92, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'reingreso a laborar  despu?s de vacaciones  adelantadas(covid-19)', 12, 1, 1, '2020-05-05 11:57:26'),
(153, 48, 'Auxiliar Siso', 'Memorando', '2020-04-25', '', 'reingreso despu?s  de vacaciones anticipadas(covid-19)', 12, 1, 1, '2020-05-05 15:35:40'),
(154, 84, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'Reingreso despues de vacaiones anticipadas(covid 19)', 12, 1, 1, '2020-05-06 11:20:21'),
(155, 46, 'Auxiliar Siso', 'Memorando', '2020-04-28', '', 'Reingreso despues de vacaciones anticipadas(covid-19)', 12, 1, 0, '2020-05-06 11:26:06'),
(156, 46, 'Auxiliar Siso', 'Memorando', '2020-04-28', '', 'REINGRESO DESPUES DE VACCIONES (COVID 19)', 12, 1, 1, '2020-05-06 11:58:51'),
(157, 56, 'Auxiliar Siso', 'Memorando', '2020-04-28', '', 'REINGRESO DESPUES DE VACACIONES ANTICIPADAS(COVID-19)', 12, 1, 1, '2020-05-06 12:05:07'),
(158, 34, 'Auxiliar Siso', 'Memorando', '2020-04-29', '', 'REINGRESO (TRABAJO DOS DIAS )(COVID-19)', 12, 1, 0, '2020-05-06 12:07:27'),
(159, 72, 'Auxiliar Siso', 'Memorando', '2020-04-29', '', 'REINGRESO DESPUES DE VACACIONES ANTICIPADAS(COVID-19)', 12, 1, 1, '2020-05-06 12:10:10'),
(160, 47, 'Auxiliar Siso', 'Memorando', '2020-04-27', '', 'REINGRESO DESPUES DE VACACIONES ANTICIPADAS (COVID-19)', 12, 1, 1, '2020-05-06 12:12:53'),
(161, 88, 'Auxiliar Siso', 'Llamado de atencion escrito', '2020-03-09', '', 'por e no cumpliento de las normas de seguridad  establecidas.', 12, 1, 1, '2020-05-06 13:24:34'),
(162, 39, 'Auxiliar Siso', 'Memorando', '2020-05-11', '', 'hasta la fecha se laboro', 12, 1, 0, '2020-06-01 12:04:34'),
(163, 39, 'Auxiliar Siso', 'Memorando', '2020-04-24', '', 'regreso a labores despues de quince dias de vacaciones forzadas por covid-19', 12, 1, 1, '2020-06-01 12:16:45'),
(164, 39, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro hasta esta fecha', 12, 1, 1, '2020-06-01 12:26:18'),
(165, 31, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro en cantera hasta la fecha', 12, 1, 1, '2020-06-01 12:29:03'),
(166, 39, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'se reinician  labores nuevamente', 12, 1, 1, '2020-06-01 12:36:36'),
(167, 31, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'Reingreso a laborar a partir de la fecha', 12, 1, 1, '2020-06-01 12:38:16'),
(168, 33, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro hasta la fecha', 12, 1, 1, '2020-06-01 12:49:37'),
(169, 33, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'Reingreso a laborar a partir de la fecha', 12, 1, 1, '2020-06-01 12:52:21'),
(170, 86, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro hasta la fecha', 12, 1, 1, '2020-06-01 12:55:44'),
(171, 86, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'se reinician labores', 12, 1, 1, '2020-06-01 13:04:22'),
(172, 80, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro hasta la fecha', 12, 1, 1, '2020-06-01 13:15:57'),
(173, 80, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'Reinicio labores a partir de la fecha', 12, 1, 1, '2020-06-01 13:20:26'),
(174, 47, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'SE LABORO HASTA LA FECHA', 12, 1, 1, '2020-06-01 13:24:26'),
(175, 73, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'REINGRESO A LABORAR', 12, 1, 1, '2020-06-01 13:27:02'),
(176, 56, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'SE LABORO HASTA LA FECHA', 12, 1, 1, '2020-06-01 13:30:21'),
(177, 92, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'SE LABORO HASTA LA FECHA', 12, 1, 1, '2020-06-01 13:34:57'),
(178, 92, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'REINGRESO A LABORAR', 12, 1, 1, '2020-06-01 13:41:12'),
(179, 36, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones adelantadas por covid -19', 12, 1, 1, '2020-06-12 11:31:11'),
(180, 36, 'Auxiliar Siso', 'Novedad', '2020-06-10', '', 'Reingreso a labores a partir de la fecha', 12, 1, 1, '2020-06-12 11:45:26'),
(181, 56, 'Auxiliar Siso', 'Novedad', '2020-06-10', '', 'REINGRESO A LABORES A PARTIE DE LA FECHA', 12, 1, 1, '2020-06-13 09:18:09'),
(182, 63, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'SALIDA A VACACIONES ADELANTADAS POR PICO EPIDEMIOL?GICO (COVID-19)', 12, 1, 1, '2020-06-13 09:22:07'),
(183, 63, 'Auxiliar Siso', 'Novedad', '2020-06-10', '', 'REINGRESO A LABORAR A PARTIR DE LA FECHA', 12, 1, 1, '2020-06-13 09:26:37'),
(184, 50, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'VACACIONES FORZADAS POR PICO EPIDEMIOL?GICO (COVID-19)', 12, 1, 1, '2020-06-13 09:34:02'),
(185, 50, 'Auxiliar Siso', 'Novedad', '2020-06-10', '', 'REINICIO DE LABORES A PARTIR DE LA FECHA', 12, 1, 1, '2020-06-13 09:36:47'),
(186, 47, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'inicio de labores a partir de la fecha', 12, 1, 1, '2020-06-16 11:11:48'),
(187, 66, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones adelantadas por pico pand?mico (covid-19).', 12, 1, 1, '2020-06-16 11:25:30'),
(188, 66, 'Auxiliar Siso', 'Novedad', '2020-06-16', '', 'reingreso a laborar a partir de la fecha', 12, 1, 1, '2020-06-16 11:39:46'),
(189, 34, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones adelantadas por pico epidemiol?gico (covid-19)', 12, 1, 1, '2020-06-16 11:48:13'),
(190, 34, 'Auxiliar Siso', 'Novedad', '2020-04-29', '', 'reingreso a laborar (laboro 2 d?as)', 12, 1, 1, '2020-06-16 11:49:28'),
(191, 34, 'Auxiliar Siso', 'Novedad', '2020-06-11', '', 'reingreso a partir de la fecha', 12, 1, 1, '2020-06-16 11:54:24'),
(192, 43, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'se laboro hasta la fecha (vacaciones anticipadas por pico epidemiol?gico covid-19)', 12, 1, 1, '2020-06-16 12:34:46'),
(193, 43, 'Auxiliar Siso', 'Novedad', '2020-06-10', '', 'Reinicio de labores a partir de la fecha', 12, 1, 1, '2020-06-16 12:37:07'),
(194, 46, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro hasta la fecha', 12, 1, 1, '2020-06-16 12:41:12'),
(195, 46, 'Auxiliar Siso', 'Novedad', '2020-06-16', '', 'Reinicio a labores a partir de la fecha', 12, 1, 1, '2020-06-16 12:43:40'),
(196, 48, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro hasta la fecha', 12, 1, 1, '2020-06-16 12:47:48'),
(197, 52, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'salida vacaciones forzadas por pico epidemiol?gico (covid-19)', 12, 1, 1, '2020-06-16 12:50:16'),
(198, 56, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiol?gico (covid-19)', 12, 1, 1, '2020-06-16 13:00:31'),
(199, 61, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiol?gico (covid 19)', 12, 1, 1, '2020-06-16 13:04:51'),
(200, 61, 'Auxiliar Siso', 'Novedad', '2020-06-11', '', 'Reingreso a laborar a partir de la fecha', 12, 1, 1, '2020-06-16 13:07:20'),
(201, 64, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiol?gico  (covid-19).', 12, 1, 1, '2020-06-16 13:11:33'),
(202, 64, 'Auxiliar Siso', 'Novedad', '2020-06-11', '', 'Reingreso a laborar a partir de la fecha', 12, 1, 1, '2020-06-16 13:13:50'),
(203, 65, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiol?gico (covid-19)', 12, 1, 1, '2020-06-16 13:21:49'),
(204, 65, 'Auxiliar Siso', 'Novedad', '2020-04-24', '', 'Reingreso a labores a partir de la fecha.', 12, 1, 1, '2020-06-16 13:47:18'),
(205, 65, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro hasta la fecha', 12, 1, 1, '2020-06-16 14:06:01'),
(206, 65, 'Auxiliar Siso', 'Novedad', '2020-06-12', '', 'Reingreso a laborar a partir de la fecha', 12, 1, 1, '2020-06-16 14:07:49'),
(207, 72, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'se laboro hasta la fecha', 12, 1, 0, '2020-06-16 14:25:19'),
(208, 72, 'Auxiliar Siso', 'Novedad', '2020-06-01', '', 'Reingreso a laborar a partir de la fecha', 12, 1, 0, '2020-06-16 14:28:12'),
(209, 79, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiol?gico (covid-19)', 12, 1, 1, '2020-06-16 14:34:47'),
(210, 79, 'Auxiliar Siso', 'Retiro', '2020-06-16', '', 'Renuncia voluntaria', 12, 1, 1, '2020-06-16 14:36:12'),
(211, 84, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiol?gico (covid-19)', 12, 1, 1, '2020-06-16 14:44:26'),
(212, 86, 'Auxiliar Siso', 'Novedad', '2020-06-16', '', 'llamado de atenci?n por parquear moto en lugar prohibido', 12, 1, 0, '2020-06-16 16:01:59'),
(213, 86, 'Auxiliar Siso', 'Novedad', '2020-06-16', '', 'llamado de atenci?n por no usar los elementos de protecci?n personal.', 12, 1, 0, '2020-06-16 16:08:20'),
(214, 92, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por covid-19', 12, 1, 1, '2020-06-25 11:34:08'),
(215, 33, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por covid-19', 12, 1, 1, '2020-06-25 11:37:36'),
(216, 90, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones adelantadas por covid-19', 12, 1, 1, '2020-06-25 11:41:46'),
(217, 90, 'Auxiliar Siso', 'Novedad', '2020-06-25', '', 'Reingreso a laborar a partir de la fecha', 12, 1, 1, '2020-06-25 11:43:04'),
(218, 40, 'Fredy Gonzalez', 'Memorando', '2020-06-24', 'images/novedades/1881820200625132154353.pdf', 'no esta cumpliendo con la actualizacion y verificacion constante de la herramienta SOFIA la cual mantiene informado a los socios y directivos de la situacion financiera de la empresa, esperamos que se tomen las acciones correspondientes ya que por este mismo causal se habia realizado un llamado de atencion verbal anteriormente', 12, 1, 1, '2020-06-25 12:17:06'),
(219, 47, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pandemia(covid-19)', 12, 1, 1, '2020-07-01 09:44:03'),
(220, 39, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones', 12, 1, 1, '2020-07-01 10:05:51'),
(221, 46, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas (covid-19)', 12, 1, 1, '2020-07-01 10:09:26'),
(222, 48, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pandemia (covid-19)', 12, 1, 1, '2020-07-01 11:02:27'),
(223, 44, 'Auxiliar Siso', 'Novedad', '2020-06-08', '', 'renuncia voluntaria', 12, 1, 1, '2020-07-01 11:37:29'),
(224, 64, 'Auxiliar Siso', 'Permiso', '2020-06-30', '', 'permiso cita medica', 12, 1, 1, '2020-07-01 11:40:55'),
(225, 73, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiol?gico (covid-19)', 12, 1, 1, '2020-07-01 11:51:54'),
(226, 73, 'Auxiliar Siso', 'Novedad', '2020-06-04', '', 'se encuentra en casa a partir de la fecha (computador de la mula descompuesto)', 12, 1, 1, '2020-07-01 11:53:44'),
(227, 80, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiologico (covid-19)', 12, 1, 1, '2020-07-01 11:59:23'),
(228, 84, 'Auxiliar Siso', 'Novedad', '2020-05-11', '', 'laboro hasta la fecha', 12, 1, 1, '2020-07-01 12:02:33'),
(229, 88, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones forzadas a partir de la fecha', 12, 1, 1, '2020-07-01 12:06:10'),
(230, 72, 'Auxiliar Siso', 'Novedad', '2020-07-03', '', 'INICIA LABORES NOCTURNAS A PARTIR DE LA FECHA', 12, 1, 1, '2020-07-03 08:23:01'),
(231, 52, 'Auxiliar Siso', 'Novedad', '2020-07-07', '', 'REINGRESO A LABORAR A PARTIR DE LA FECHA', 12, 1, 1, '2020-07-07 11:32:45'),
(232, 56, 'Auxiliar Siso', 'Permiso', '2020-07-08', 'images/novedades/11565soporte biddio juio.pdf', 'cita oftalmologica', 12, 1, 1, '2020-07-09 16:49:54'),
(233, 86, 'Auxiliar Siso', 'Novedad', '2020-06-30', '', 'no se presento a laborar a partir de la fecha (esposa enferma)', 12, 1, 1, '2020-07-13 08:21:44'),
(234, 86, 'Auxiliar Siso', 'Novedad', '2020-07-13', '', 'Regreso a laborar a partir  de la fecha', 12, 1, 1, '2020-07-13 08:30:46'),
(235, 86, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pandemia mundial (covid-19)', 12, 1, 1, '2020-07-13 08:34:26'),
(236, 31, 'Auxiliar Siso', 'Novedad', '2020-03-24', '', 'vacaciones anticipadas por pico epidemiol?gico (covid-19)', 12, 1, 1, '2020-07-13 08:41:54'),
(237, 64, 'Auxiliar Siso', 'Permiso', '2020-07-16', '', 'permiso para cita m?dica (radiograf?a) horas de la ma?ana', 12, 1, 1, '2020-07-16 11:47:14'),
(238, 72, 'Auxiliar Siso', 'Observacion', '2020-07-16', '', 'Retoma turno de dia  a partir de la fecha', 12, 1, 1, '2020-07-16 11:55:47'),
(239, 50, 'Auxiliar Siso', 'Incapacidad', '2020-07-16', '', 'se mando para la casa por accidente laboral (se desprendio la u?a del dedo medio de la mano derecha) se ordena tenga reposo .', 12, 1, 1, '2020-07-16 12:13:00'),
(240, 63, 'Auxiliar Siso', 'Incapacidad', '2020-07-15', '', 'se encuentra en casa por enfermedad com?n.', 12, 1, 1, '2020-07-16 12:22:22'),
(241, 88, 'Auxiliar Siso', 'Novedad', '2020-07-22', '', 'despu?s de permanecer suspendido por motivo de pandemia, ingresa a laborar a partir de la fecha (22/07/2020) en turno de la noche (6.00 pm-6.00 am)', 12, 1, 1, '2020-07-29 14:14:07'),
(242, 88, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro en esta fecha de 1:00 pm-3:00 pm suministrando combustible (s?bado)', 12, 1, 1, '2020-07-29 15:13:03'),
(243, 88, 'Auxiliar Siso', 'Horas Extras', '2020-03-22', '', 'laboro en esta fecha de 07:00 am-11:00 am (domingo)', 12, 1, 1, '2020-07-29 15:27:11'),
(244, 88, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro en esta fecha de 7:00 am-4:00 pm (lunes festivo)', 12, 1, 1, '2020-07-29 15:32:20'),
(245, 90, 'Auxiliar Siso', 'Horas Extras', '2020-02-23', '', 'laboro en esta fecha de 8:18am-5:20pm (domingo)', 12, 1, 1, '2020-07-29 15:40:09'),
(246, 90, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro en esta fecha de 6:11 am-5:00 pm (lunes festivo)', 12, 1, 1, '2020-07-29 15:51:46'),
(247, 56, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro de 1:00 pm-3:00pm (sabado)', 12, 1, 1, '2020-07-29 15:54:28'),
(248, 56, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro lunes festivo de 7:00 am-5:00 pm', 12, 1, 1, '2020-07-29 15:59:07'),
(249, 72, 'Auxiliar Siso', 'Horas Extras', '2020-03-02', '', 'laboro en esta fecha desde las 6:00 pm-8:00 am', 12, 1, 1, '2020-07-29 16:06:58'),
(250, 72, 'Auxiliar Siso', 'Horas Extras', '2020-03-03', '', 'laboro desde las 6:00 pm -8:00 pm', 12, 1, 1, '2020-07-29 16:10:53'),
(251, 72, 'Auxiliar Siso', 'Horas Extras', '2020-03-07', '', 'laboro desde la 1:00 pm-2:00 pm', 12, 1, 1, '2020-07-29 16:14:49'),
(252, 72, 'Auxiliar Siso', 'Horas Extras', '2020-03-16', '', 'laboro desde las 6:00 pm-8.00pm', 12, 1, 1, '2020-07-29 16:16:27'),
(253, 72, 'Auxiliar Siso', 'Horas Extras', '2020-03-20', '', 'laboro desde la 1:00pm-3:00pm', 12, 1, 1, '2020-07-29 16:18:01'),
(254, 72, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro desde las 7:00 am-5:00 pm (festivo)', 12, 1, 1, '2020-07-29 16:19:57'),
(255, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-03', '', 'laboro de 6:00 am -05:00 pm', 12, 1, 1, '2020-07-29 16:22:37'),
(256, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-04', '', 'laboro desde las 6:00 am-5:00 pm', 12, 1, 1, '2020-07-29 16:24:28'),
(257, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-05', '', 'laboro desde las 6:00 am-5:00 pm', 12, 1, 1, '2020-07-29 16:28:09'),
(258, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-06', '', 'laboro desde las 06.00 am-05:00 pm', 12, 1, 1, '2020-07-29 16:29:44'),
(259, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-09', '', 'laboro desde las 6:00am-5:00pm', 12, 1, 1, '2020-07-29 16:31:24'),
(260, 52, 'Auxiliar Siso', 'Novedad', '2020-06-23', '', 'se presento a hacerle 3 DIAS  a ober', 12, 1, 1, '2020-07-30 12:53:57'),
(261, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-10', '', 'laboro desde las 6:00 am -5:00 pm', 12, 1, 1, '2020-07-31 15:42:13'),
(262, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-11', '', 'laboro desde las 6:00 am-5:00 pm', 12, 1, 1, '2020-07-31 15:45:18'),
(263, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-12', '', 'laboro desde las 6:00 am-5:00 pm', 12, 1, 1, '2020-07-31 15:48:34'),
(264, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-13', '', 'laboro desde las 6:00 am -5:00 pm', 12, 1, 1, '2020-07-31 15:51:22'),
(265, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-16', '', 'laboro desde las 6:00 am-5:00 pm', 12, 1, 1, '2020-07-31 16:34:07'),
(266, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-17', '', 'laboro en esta fecha de 6:00 am- 5:00 pm', 12, 1, 1, '2020-08-03 13:40:47'),
(267, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-08', '', 'laboro en esta fecha desde las 6:00 am-5:00 pm', 12, 1, 1, '2020-08-03 14:07:56'),
(268, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-18', '', 'laboro desde las 6:00 am-5:00 pm', 12, 1, 1, '2020-08-03 14:10:29'),
(269, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-20', '', 'laboro desde las 5:00am -6:00 pm', 12, 1, 1, '2020-08-03 14:16:12'),
(270, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-20', '', 'laboro desde las 6:00am-5:00pm', 12, 1, 1, '2020-08-03 14:18:02'),
(271, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro desde las 6:00 am-3:00 pm', 12, 1, 1, '2020-08-03 14:19:06'),
(272, 63, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro desde as 7:00 am-5:00pm', 12, 1, 1, '2020-08-03 14:20:01'),
(273, 61, 'Auxiliar Siso', 'Horas Extras', '2020-03-02', '', 'laboro el 02,03,04,05,06,09,10,11,12,13,16,17,18,19, y 20 desde las 6:00 am hasta las 5:00 pm', 12, 1, 1, '2020-08-03 14:24:48'),
(274, 61, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro desde las 6:00 am-3:00 pm', 12, 1, 1, '2020-08-03 14:30:37'),
(275, 61, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro desde las 7:00 am-5:00 pm', 12, 1, 1, '2020-08-03 14:42:01'),
(276, 50, 'Auxiliar Siso', 'Horas Extras', '2020-03-02', '', 'labor?  los d?as  02,03,04,05,06,09,10,11,12,13,16,17,18,19 y 20 desde las 6:00 am -5:00 pm', 12, 1, 1, '2020-08-03 14:56:59'),
(277, 50, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro  desde las 6:00 am -3:00 pm', 12, 1, 1, '2020-08-03 15:02:11'),
(278, 50, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro desde las 7:00 am-5:00 pm', 12, 1, 1, '2020-08-03 15:07:16'),
(279, 64, 'Auxiliar Siso', 'Horas Extras', '2020-03-02', '', 'laboro 02,03,04,05,06,09,10,11,12,13,16,17,18,19 y 20 desde las 6:00 am-5:00 pm', 12, 1, 1, '2020-08-03 16:21:44'),
(280, 64, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro desde las 6:00am-5:00pm', 12, 1, 1, '2020-08-03 16:24:29'),
(281, 64, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro de 7:00am -5:00pm', 12, 1, 1, '2020-08-03 16:57:39'),
(282, 65, 'Auxiliar Siso', 'Horas Extras', '2020-06-26', '', 'labor? los d?as  26,27,29 y 30 de junio desde las 6:00 am-5:00 pm (se pagan en n?mina de agosto)', 12, 1, 1, '2020-08-04 11:04:38'),
(283, 65, 'Auxiliar Siso', 'Horas Extras', '2020-07-01', '', 'labor? los d?as 01,02,03,04,06 y 07 de julio a partir de las 6:00 am -5:00 pm ( se pagan en n?mina de agosto)', 12, 1, 1, '2020-08-04 11:13:41'),
(284, 65, 'Auxiliar Siso', 'Horas Extras', '2020-07-08', '', 'laboro el 08,09,10,11,13 y 14 de julio desde las 6:00 am-5:00 pm (se cancelan en n?mina de agosto)', 12, 1, 1, '2020-08-04 11:30:49'),
(285, 65, 'Auxiliar Siso', 'Horas Extras', '2020-07-15', '', 'labor? los d?as 14,15,16,17,18,19 y 21 de julio desde las 6:00 am- 5:00 pm (se cancelan en n?mina de agosto)', 12, 1, 1, '2020-08-04 11:35:14'),
(286, 65, 'Auxiliar Siso', 'Horas Extras', '2020-07-22', '', 'labor? los d?as 22,23,24,25,27,28,29 y 30 de julio desde las 6:00 am-5:00 pm (se cancelan en nomina de agosto)', 12, 1, 1, '2020-08-04 11:40:46'),
(287, 85, 'Auxiliar Siso', 'Horas Extras', '2020-07-28', '', 'laboro desde las 6:25 am-6:10 pm (se pagan en n?mina de agosto)', 12, 1, 1, '2020-08-04 11:50:19'),
(288, 34, 'Auxiliar Siso', 'Horas Extras', '2020-03-02', '', 'laboro los d?as 02,03,04,05,06,09,10,11,12,13,16,17,18,19 y 20 de julio de 6:00am -5:00 pm', 12, 1, 1, '2020-08-04 12:02:27'),
(289, 34, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro desde las 6:00 am-3:00 pm', 12, 1, 1, '2020-08-04 12:06:21'),
(290, 34, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro desde las 7.00 am-5:00 pm', 12, 1, 1, '2020-08-04 12:08:40'),
(291, 85, 'Auxiliar Siso', 'Horas Extras', '2020-03-22', '', 'laboro desde las 7:00 am-3:00 pm', 12, 1, 1, '2020-08-04 13:32:56'),
(292, 85, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro desde las 7:00 am-3:00 pm', 12, 1, 1, '2020-08-04 13:41:28'),
(293, 85, 'Auxiliar Siso', 'Horas Extras', '2020-03-24', '', 'laboro desde las 7:00 am -4:00 pm', 12, 1, 1, '2020-08-04 13:43:05'),
(294, 80, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro de 6:00 am-3:00 pm', 12, 1, 1, '2020-08-04 14:06:10'),
(295, 80, 'Auxiliar Siso', 'Horas Extras', '2020-03-22', '', 'laboro de 5:00 am-12:00 pm', 12, 1, 1, '2020-08-04 14:12:29'),
(296, 80, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro desde las 5:00 am-5:00 pm', 12, 1, 1, '2020-08-04 14:15:58'),
(297, 65, 'Auxiliar Siso', 'Horas Extras', '2020-02-27', '', 'laboro desde las 6:00 am hasta las 6:00 pm', 12, 1, 1, '2020-08-04 15:34:31'),
(298, 65, 'Auxiliar Siso', 'Horas Extras', '2020-02-29', '', 'laboro desde las 6:00 am hasta las 2:00 pm', 12, 1, 1, '2020-08-04 15:37:04'),
(299, 65, 'Auxiliar Siso', 'Horas Extras', '2020-03-14', '', 'laboro desde las 6:00 am hasta las 4.00 pm', 12, 1, 1, '2020-08-04 15:50:54'),
(300, 65, 'Auxiliar Siso', 'Horas Extras', '2020-03-21', '', 'laboro de 1:00 pm-3:00 pm', 12, 1, 1, '2020-08-04 15:52:33'),
(301, 65, 'Auxiliar Siso', 'Horas Extras', '2020-03-22', '', 'laboro desde las 6.00 am hasta las 12:00 pm', 12, 1, 1, '2020-08-04 15:56:58'),
(302, 65, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro desde las 6:00 am hasta las 5:00pm', 12, 1, 1, '2020-08-04 15:58:04'),
(303, 79, 'Auxiliar Siso', 'Horas Extras', '2020-03-23', '', 'laboro desde la 7:00 am-5:00 pm', 12, 1, 1, '2020-08-04 16:57:04'),
(304, 47, 'Auxiliar Siso', 'Horas Extras', '2020-03-20', '', 'laboro de 4:00 am -9:00 pm', 12, 1, 1, '2020-08-04 17:03:21'),
(305, 33, 'Auxiliar Siso', 'Incapacidad', '2020-08-10', '', 'incapacidad durante  72 horas (3 d?as) a partir de la fecha. (otitis bacteriana aguda o?do derecho)', 12, 1, 1, '2020-08-11 08:22:35'),
(306, 33, 'Auxiliar Siso', 'Incapacidad', '2020-08-14', '', 'Despu?s de 3 d?as de incapacidad se reintegra a laborar presentando mejor?a', 12, 1, 1, '2020-08-14 16:28:25'),
(307, 48, 'Auxiliar Siso', 'Retiro', '2020-08-01', '', 'Renuncia voluntaria', 12, 1, 1, '2020-08-14 16:38:27'),
(308, 52, 'Auxiliar Siso', 'Retiro', '2020-07-29', '', 'LABORO HASTA LA FECHA POR DECISI?N PROPIA (AUN NO PASA CARTA DE RENUNCIA)', 12, 1, 1, '2020-08-20 15:48:40'),
(309, 86, 'Auxiliar Siso', 'Novedad', '2020-08-01', '', 'A PARTIR DE LA FECHA CAMBIA DE CARGO (OPERADOR DE CLASIFICADORA)', 12, 1, 1, '2020-08-20 16:41:22'),
(310, 88, 'Auxiliar Siso', 'Novedad', '2020-08-15', '', 'A PARTIR DE LA FECHA CAMBIA DE TURNO DE NOCHE PASA A DIA', 12, 1, 1, '2020-08-20 16:47:36'),
(311, 56, 'Auxiliar Siso', 'Llamado de atencion verbal', '2020-08-29', '', 'se le hace llamado de atenci?n verbal por hacer uso de la pulidora sin la guarda de seguridad, poniendo en peligro su integridad f?sica y la de sus compa?eros, haciendo caso omiso a las recomendaciones de seguridad dadas por parte del sst de la empresa.', 12, 1, 1, '2020-08-31 13:24:02'),
(312, 98, 'Auxiliar Siso', 'Retiro', '2020-09-03', '', 'LABORO SOLO UN  DIA Y NO SE PRESENTO MAS SIN MOTIVO ALGUNO', 12, 1, 1, '2020-09-05 16:44:24'),
(313, 76, 'Auxiliar Siso', 'Novedad', '2020-09-02', '', 'REINTEGRO', 12, 1, 1, '2020-09-10 14:48:15'),
(314, 105, 'Auxiliar Siso', 'Retiro', '2020-09-14', '', 'RENUNCIO', 12, 1, 1, '2020-09-15 11:46:29'),
(315, 104, 'Auxiliar Siso', 'Retiro', '2020-09-19', '', 'RENUNCIA VOLUNTARIA EL D?A  19 DE SEPT 2020', 12, 1, 1, '2020-09-21 15:18:18'),
(316, 116, 'Auxiliar Siso', 'Retiro', '2020-09-26', '', 'RENUNCIA VOLUNTARIA', 12, 1, 1, '2020-09-28 12:18:56'),
(317, 61, 'Auxiliar Siso', 'Novedad', '2020-09-03', '', 'A PARTIR DE LA FECHA 03/09/2020 TENDR? UN SALARIO DE $2.300.000 M?S UN BONO DE $900.000 POR DOBLE TURNO', 12, 1, 1, '2020-09-29 09:17:07'),
(318, 40, 'Fredy Gonzalez', 'Llamado de atencion escrito', '2020-10-01', '', 'en d?as anteriores de acuerdo a solicitud directa del gerente general, se le dio la instrucci?n de presentar las declaraciones de renta en las fechas establecidas, instrucci?n  a la cual hizo caso omiso teniendo esto afectaci?n directa en la parte financiera.', 12, 1, 1, '2020-10-01 10:10:44'),
(319, 43, 'Fredy Gonzalez', 'Memorando', '2020-09-15', 'images/novedades/15855MEMORANDO JULIO NAVARRO.pdf', 'se evidencia que no esta haciendo buen uso de su  equipo de trabajo, en poco tiempo a destruido parte de la cabina como es el  tablero de control de la volqueta de placa SZR O48, se ve a simple vista la falta de compromiso que tiene por el cuidado de su equipo de trabajo.', 12, 1, 1, '2020-10-08 16:23:27'),
(320, 95, 'Auxiliar Siso', 'Permiso', '2020-09-22', '', 'permiso a partir de la fecha', 12, 1, 1, '2020-10-13 12:13:55'),
(321, 95, 'Auxiliar Siso', 'Novedad', '2020-10-13', '', 'Reingreso de vacaciones', 12, 1, 1, '2020-10-13 12:15:25'),
(322, 34, 'Auxiliar Siso', 'Novedad', '2020-10-10', '', 'LICENCIA DE PATERNIDAD POR 8 DIAS HABILES A PARTIR DE LA FECHA', 12, 1, 1, '2020-10-13 12:22:48'),
(323, 76, 'Auxiliar Siso', 'Retiro', '2020-10-10', '', 'RENUNCIA VOLUNTARIA', 12, 1, 1, '2020-10-13 12:32:40'),
(324, 92, 'Auxiliar Siso', 'Incapacidad', '2020-10-07', '', 'INCAPACIDAD M?DICA  A PARTIR DE LA  FECHA', 12, 1, 1, '2020-10-13 12:35:06'),
(325, 92, 'Auxiliar Siso', 'Incapacidad', '2020-10-13', '', 'REINGRESO DESPU?S DE INCAPACIDAD', 12, 1, 1, '2020-10-13 13:12:34'),
(326, 96, 'Auxiliar Siso', 'Retiro', '2020-10-13', '', 'se hizo cambio de operador a partir de la fecha', 12, 1, 1, '2020-10-14 10:52:42'),
(327, 102, 'Auxiliar Siso', 'Incapacidad', '2020-10-16', '', 'INCAPACITADO A PARTIR DE LA FECHA POR INCIDENTE LABORAL(SE GOLPE? CON UNA PIEDRA)', 12, 1, 1, '2020-10-16 15:43:16'),
(328, 102, 'Auxiliar Siso', 'Incapacidad', '2020-10-19', '', 'REINGRESO DESPUES DE 3 DIAS DE INCAPACIDAD.', 12, 1, 1, '2020-10-19 16:36:12'),
(329, 34, 'Auxiliar Siso', 'Novedad', '2020-10-21', '', 'DESPUES DE LICENCIA DE PATERNIDAD EMPIEZA NUEVAMENTE LABORES', 12, 1, 1, '2020-10-22 10:58:41'),
(330, 102, 'Auxiliar Siso', 'Permiso', '2020-10-22', '', 'PERMISO PARA ASISTIR A CITA MEDICA (ACCIDENTE DE TRABAJO)', 12, 1, 1, '2020-10-22 11:24:52'),
(331, 92, 'Jose Daniel Meza', 'Memorando', '2020-10-21', 'images/novedades/57315memorando katia.pdf', 'dentro de la funciones de ?rea siso es velar que la planta se encuentre en orden y se cumpla los requerimientos establecido por el titulo minero , en d?as anteriores recibimos un comunicado por parte del titulo minero en donde se evidenciaron varias falencias de las cuales algunas no deber?an pasar si se tiene una persona a ese cargo , adicional a eso ya se le ha reiterado en varias ocasiones que la entrada a la cantera debe mantene limpia de maleza y esto ya es reiterativo y no se esta cumplien', 12, 1, 1, '2020-10-28 09:08:43'),
(332, 46, 'Jose Daniel Meza', 'Memorando', '2020-10-13', 'images/novedades/17783MEMORANDO RAUL 2.pdf', 'LAS FUNCIONES DEL JEFE DE EQUIPOS ES MANTENER LOS EQUIPOS OPERATIVOS,CON MANTENIMIENTOS PREVENTIVOS, CORRECTIVOS Y LIMPIEZA DE CADA UNO DE ELLOS.\r\nEN LAS ULTIMAS SEMANAS SE HA ENCONTRADO CARENCIA DE ESTAS LABORES .', 12, 1, 1, '2020-10-28 16:51:53'),
(333, 86, 'Auxiliar Siso', 'Retiro', '2020-11-03', '', 'RETIRO VOLUNTARIO', 12, 1, 1, '2020-11-04 07:39:26'),
(334, 43, 'Auxiliar Siso', 'Memorando', '2020-10-30', 'images/novedades/54497memorando julio navarro 2.pdf', 'NO CUMPLIO CON SU HORARIO NORMAL DE LABORES EN REPETIDAS OCASIONES.', 12, 1, 1, '2020-11-04 15:06:38'),
(335, 50, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/91299memorando luis deivis julio.pdf', 'POR NO CUMPLIR CON SU HORARIO NORMAL DE LABORES (SALIDA SIN AUTORIZACI?N PREVIA)', 12, 1, 1, '2020-11-04 15:12:57'),
(336, 106, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/99808memorando john moreno.pdf', 'NO CUMPLIO CON SU HORARIO LABORAL NORMAL', 12, 1, 1, '2020-11-04 15:31:10'),
(337, 64, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/60495memorando antoni acosta.pdf', 'NO CUMPLIO SU HORARIO LABORAL NORMAL.', 12, 1, 1, '2020-11-04 15:47:31'),
(338, 84, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/35475memorando rigoberto prens.pdf', 'NO CUMPLIO SU HORARIO NORMAL LABORAL', 12, 1, 1, '2020-11-04 15:58:05'),
(339, 102, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/69011memorando esnoider oliveros.pdf', 'NO CUMPLIO CON SU HORARIO LABORALL NORMAL.', 12, 1, 1, '2020-11-04 16:04:10'),
(340, 61, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/83670memorando luis villalba.pdf', 'NO CUMPLIO CON SU HORARIO LABORAL NORMAL.', 12, 1, 1, '2020-11-04 16:08:25'),
(341, 36, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/72781memorando luis contreras.pdf', 'NO CUMPLIO SU HORARIO NORMAL LABORAL', 12, 1, 1, '2020-11-04 16:17:30'),
(342, 97, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/38444memorando gerlin pelufo.pdf', 'NO CUMPLIO SU HORARIO LABORAL NORMAL', 12, 1, 1, '2020-11-04 16:52:38');
INSERT INTO `novedades` (`id`, `funcionario_id`, `reportado_por`, `tipo_novedad`, `fecha_novedad`, `imagen`, `observaciones`, `creado_por`, `estado_novedad`, `novedad_publicado`, `marca_temporal`) VALUES
(343, 34, 'Auxiliar Siso', 'Memorando', '2020-10-28', '', 'NO LABORO SU HORARIO NORMAL', 12, 1, 1, '2020-11-04 17:00:48'),
(344, 101, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/22056memorando jose rivera.pdf', 'SALIO ANTES DE TERMINAR SU TURNO NORMAL LABORAL', 12, 1, 1, '2020-11-04 17:04:11'),
(345, 63, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/73353memorando franglin.pdf', 'SALIO ANTES DE TERMINAR SU JORNADA LABORAL', 12, 1, 1, '2020-11-04 17:07:03'),
(346, 46, 'Auxiliar Siso', 'Retiro', '2020-10-28', 'images/novedades/4958REIRO RAUL VERGARA.pdf', 'RETIRO', 12, 1, 1, '2020-11-05 09:32:47'),
(347, 39, 'Auxiliar Siso', 'Retiro', '2020-10-28', '', 'RETIRO', 12, 1, 1, '2020-11-05 09:49:35'),
(348, 65, 'Auxiliar Siso', 'Memorando', '2020-10-28', 'images/novedades/28257armando llamado de atencion.pdf', 'SALIDA ANTES DE TERMINAR LA JORNADA NORMAL LABORAL', 12, 1, 1, '2020-11-10 11:29:39'),
(349, 43, 'Auxiliar Siso', 'Memorando', '2020-11-12', 'images/novedades/86902MEMORANDO JULIO NAVARRO 3.pdf', 'EN LAS ULTIMAS SEMANAS SE HA ENCONTRADO CARENCIA DE ESTAS LABORES, CON LA VOLQUETA QUE TIENE A CARGO SZR-048 SE ENCONTRABA EN UN DETERIORO FUERA DE LO COM?N, BOLSAS, PL?STICOS Y OTROS ELEMENTOS QUE NO DEBEN SER UTILIZADOS DURANTE LA OPERACI?N.', 12, 1, 1, '2020-11-12 16:03:56'),
(350, 100, 'Auxiliar Siso', 'Incapacidad', '2020-10-29', 'images/novedades/72131CERTI INCAPACIDAD EBELIO.jpg', 'ENFERMEDAD COM?N', 12, 1, 1, '2020-11-12 16:10:38'),
(351, 101, 'Auxiliar Siso', 'Incapacidad', '2020-11-18', 'images/novedades/57615INCAPACIDAD JOSE RIVERA.pdf', 'incapacidad por enfermedad com?n (tres d?as a partir de la fecha)', 12, 1, 1, '2020-11-20 12:07:27'),
(352, 106, 'Auxiliar Siso', 'Retiro', '2020-11-20', 'images/novedades/96222CARTA RENUNCIA JOHN MORENO.pdf', 'RENUNCIA VOLUNTARIA', 12, 1, 1, '2020-11-20 12:22:35'),
(353, 90, 'Auxiliar Siso', 'Retiro', '2020-11-20', 'images/novedades/12862RENUNCIA WILMER.pdf', 'RENUNCIA VOLUNTARIA', 12, 1, 1, '2020-11-21 08:51:42'),
(354, 43, 'Auxiliar Siso', 'Retiro', '2020-11-22', '', 'DESPIDO POR JUSTA CAUSA', 12, 1, 0, '2020-11-21 11:43:16'),
(355, 43, 'Auxiliar Siso', 'Retiro', '2020-11-21', 'images/novedades/39620DESPIDO JULIO NAVARRO.pdf', 'DESPIDO POR JUSTA CAUSA', 12, 1, 1, '2020-11-21 11:47:41'),
(356, 131, 'Auxiliar Siso', 'Perdida de EPP', '2020-12-16', '', 'EL RADIO DE COMUNICACI?N QUE LE FUE ENTREGADO FUE ROBADO EN LA CIUDAD DE SINCELEJO', 12, 1, 0, '2020-12-16 16:52:05'),
(357, 61, 'Auxiliar Siso', 'Permiso', '2020-12-16', '', 'ESTUVO DE PERMISO TOD EL DIA(GRADO DE HIJA)', 12, 1, 1, '2020-12-18 10:24:56'),
(358, 61, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', 'LABORO DE 6:00 AM-10:00 PM DOMINGO', 12, 1, 1, '2020-12-18 10:26:25'),
(359, 61, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '6:00 AM-2:00 PM FESTIVO', 12, 1, 1, '2020-12-18 10:29:28'),
(360, 61, 'Auxiliar Siso', 'Horas Extras', '2020-11-08', '', '6:00 AM-3:00 PM', 12, 1, 1, '2020-12-18 10:30:46'),
(361, 34, 'Auxiliar Siso', 'Horas Extras', '2020-10-31', '', '07:00 AM-12.00PM (CAPACITACI?N )', 12, 1, 1, '2020-12-18 10:35:26'),
(362, 34, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '6:00 AM-2:00 PM (DOMINGO)', 12, 1, 1, '2020-12-18 10:37:34'),
(363, 34, 'Auxiliar Siso', 'Horas Extras', '2020-11-08', '', '6:00 AM-3:00 PM(DOMINGO)', 12, 1, 1, '2020-12-18 10:41:11'),
(364, 34, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '6:00 AM-3:00 PM', 12, 1, 1, '2020-12-18 10:53:53'),
(365, 63, 'Auxiliar Siso', 'Horas Extras', '2020-10-31', '', '7:00 AM-12:00 M (CAPACITACI?N)', 12, 1, 1, '2020-12-19 08:43:35'),
(366, 103, 'Auxiliar Siso', 'Retiro', '2020-12-18', 'images/novedades/5247CARTA DE RENUNCIA DEIBIS PE?A.pdf', 'RENUNCIA VOLUNTARIA', 12, 1, 1, '2020-12-19 10:29:44'),
(367, 63, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '6:00 AM-2:00 PM', 12, 1, 1, '2020-12-19 10:37:04'),
(368, 63, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '5:00 PM-02:00 AM(FESTIVO)', 12, 1, 1, '2020-12-19 10:38:57'),
(369, 63, 'Auxiliar Siso', 'Horas Extras', '2020-11-08', '', '6:00 AM-03:00 PM(DOMINGO)', 12, 1, 1, '2020-12-19 10:40:22'),
(370, 101, 'Auxiliar Siso', 'Horas Extras', '2020-10-31', '', '7:00 AM-12:00 M (CAPACITACI?N)', 12, 1, 1, '2020-12-19 11:05:17'),
(371, 101, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '05:00 PM-2:00 AM (FESTIVO)', 12, 1, 1, '2020-12-19 11:06:45'),
(372, 101, 'Auxiliar Siso', 'Horas Extras', '2020-11-08', '', '06:00 AM-03:00 PM (DOMINGO)', 12, 1, 1, '2020-12-19 11:08:05'),
(373, 36, 'Auxiliar Siso', 'Horas Extras', '2020-10-31', '', '7.00 AM-12:00 M(CAPACITACI?N)', 12, 1, 1, '2020-12-19 11:11:12'),
(374, 36, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '2:00 PM-10:00 PM (DOMINGO)', 12, 1, 1, '2020-12-19 11:21:59'),
(375, 36, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '6.00 AM-2:00 PM (FESTIVO)', 12, 1, 1, '2020-12-19 11:24:51'),
(376, 66, 'Auxiliar Siso', 'Horas Extras', '2020-10-30', '', '7:00 AM-12:00 PM (CAPACITACI?N)', 12, 1, 1, '2020-12-19 11:27:08'),
(377, 66, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '2:00 PM-10:00 PM', 12, 1, 1, '2020-12-19 11:28:29'),
(378, 66, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '6:00 AM-2:00 PM(DOMINGO)', 12, 1, 1, '2020-12-22 10:39:08'),
(379, 66, 'Auxiliar Siso', 'Horas Extras', '2020-11-22', '', '6:00 AM-2:00 PM (DOMINGO)', 12, 1, 1, '2020-12-22 10:40:54'),
(380, 102, 'Auxiliar Siso', 'Horas Extras', '2020-10-30', '', '8:00 AM-12:00 PM (CAPACITACI?N)', 12, 1, 1, '2020-12-22 10:45:54'),
(381, 102, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '2:00 PM-10:00 PM (DOMINGO)', 12, 1, 1, '2020-12-22 10:48:20'),
(382, 102, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '6:00 AM-3:00 PM (FESTIVO)', 12, 1, 1, '2020-12-22 10:50:43'),
(383, 50, 'Auxiliar Siso', 'Horas Extras', '2020-10-30', '', '7:00 AM-12:00 PM (CAPACITACI?N)', 12, 1, 1, '2020-12-22 10:54:06'),
(384, 50, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '2:00 PM-10:00 PM (DOMINGO)', 12, 1, 1, '2020-12-22 10:56:52'),
(385, 50, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '6:00 PM-2:00 PM (FESTIVO)', 12, 1, 1, '2020-12-22 10:58:50'),
(386, 97, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '7:00 AM-12:00 PM (FESTIVO)', 12, 1, 1, '2020-12-22 11:01:21'),
(387, 97, 'Auxiliar Siso', 'Horas Extras', '2020-11-22', '', '6:00AM - 2:00PM (DOMINGO)', 12, 1, 1, '2020-12-22 11:03:43'),
(388, 126, 'Auxiliar Siso', 'Horas Extras', '2020-11-22', '', '11:00AM-7:00PM (DOMINGO)', 12, 1, 1, '2020-12-22 11:07:00'),
(389, 126, 'Auxiliar Siso', 'Horas Extras', '2020-11-24', '', '7:00AM-7:00PM', 12, 1, 1, '2020-12-22 11:10:18'),
(390, 126, 'Auxiliar Siso', 'Horas Extras', '2020-11-25', '', '7:00 AM-7.00PM', 12, 1, 1, '2020-12-22 11:12:26'),
(391, 126, 'Auxiliar Siso', 'Horas Extras', '2020-11-26', '', '4:00AM-7:00PM', 12, 1, 1, '2020-12-22 11:14:16'),
(392, 126, 'Auxiliar Siso', 'Horas Extras', '2020-11-27', '', '3:00AM-7:00PM', 12, 1, 1, '2020-12-22 11:17:14'),
(393, 126, 'Auxiliar Siso', 'Horas Extras', '2020-11-28', '', '3:00 AM-2:00 PM', 12, 1, 1, '2020-12-22 11:19:46'),
(394, 126, 'Auxiliar Siso', 'Horas Extras', '2020-11-29', '', '12:00PM-4:00PM', 12, 1, 1, '2020-12-22 11:21:11'),
(395, 128, 'Auxiliar Siso', 'Horas Extras', '2020-11-24', '', '7:00AM-7:00PM', 12, 1, 1, '2020-12-22 11:25:08'),
(396, 128, 'Auxiliar Siso', 'Horas Extras', '2020-11-25', '', '7:00AM-7:00PM', 12, 1, 1, '2020-12-22 11:27:06'),
(397, 128, 'Auxiliar Siso', 'Horas Extras', '2020-11-27', '', '3:00AM-7:00PM', 12, 1, 1, '2020-12-22 11:28:24'),
(398, 128, 'Auxiliar Siso', 'Horas Extras', '2020-11-28', '', '3:00AM-2:00PM', 12, 1, 1, '2020-12-22 11:29:41'),
(399, 128, 'Auxiliar Siso', 'Horas Extras', '2020-11-29', '', '12:00AM-4:00PM', 12, 1, 1, '2020-12-22 11:31:20'),
(400, 128, 'Auxiliar Siso', 'Horas Extras', '2020-11-30', '', '3:00AM-5:00PM', 12, 1, 1, '2020-12-22 11:32:49'),
(401, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-22', '', '6:00AM-6:00PM(DOMINGO)', 12, 1, 1, '2020-12-22 11:35:00'),
(402, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-23', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 11:36:28'),
(403, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-24', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 11:37:25'),
(404, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-25', '', '6:00PM-8:00PM', 12, 1, 1, '2020-12-22 11:40:31'),
(405, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-26', '', '6:00PM-6:00PM', 12, 1, 1, '2020-12-22 12:33:56'),
(406, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-05', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 14:51:10'),
(407, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-09', '', '6:00PM- 6:00AM', 12, 1, 1, '2020-12-22 14:55:53'),
(408, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-13', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 14:57:09'),
(409, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-15', '', '9:00AM-2:00PM', 12, 1, 1, '2020-12-22 14:58:11'),
(410, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-17', '', '6:00AM-6:00PM', 12, 1, 1, '2020-12-22 14:59:17'),
(411, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-18', '', '6:00AM-6:00PM', 12, 1, 1, '2020-12-22 15:01:16'),
(412, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-20', '', '6:00AM-6:00PM', 12, 1, 1, '2020-12-22 15:02:00'),
(413, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-19', '', '6:00AM-6:00PM', 12, 1, 1, '2020-12-22 15:04:25'),
(414, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-21', '', '2:00PM-10:00PM', 12, 1, 1, '2020-12-22 15:05:35'),
(415, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-22', '', '6:00AM-5:00PM', 12, 1, 1, '2020-12-22 15:07:00'),
(416, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-23', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 15:08:54'),
(417, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-24', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 15:10:29'),
(418, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-26', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 15:11:43'),
(419, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-27', '', '10:00AM-6:00PM', 12, 1, 1, '2020-12-22 15:14:18'),
(420, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-28', '', '6:00AM-6:00PM', 12, 1, 1, '2020-12-22 15:15:20'),
(421, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-29', '', '6:00AM-6:00PM', 12, 1, 1, '2020-12-22 15:17:04'),
(422, 124, 'Auxiliar Siso', 'Horas Extras', '2020-11-30', '', '6:00AM-8:00PM', 12, 1, 1, '2020-12-22 15:20:04'),
(423, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-27', '', '6:00PM-7:00PM', 12, 1, 1, '2020-12-22 16:04:56'),
(424, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-28', '', '2:00PM-10:00PM', 12, 1, 1, '2020-12-22 16:16:17'),
(425, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-29', '', '6:00AM-5:00PM', 12, 1, 1, '2020-12-22 16:28:09'),
(426, 127, 'Auxiliar Siso', 'Horas Extras', '2020-11-30', '', '6:00AM-2:00PM', 12, 1, 1, '2020-12-22 16:29:42'),
(427, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-04', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 16:32:18'),
(428, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-05', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 16:33:58'),
(429, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-06', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 16:35:51'),
(430, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-07', '', '2:00PM-10:00PM', 12, 1, 1, '2020-12-22 16:37:48'),
(431, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-09', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 16:39:20'),
(432, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-10', '', '6:00PM-6:00AM', 12, 1, 1, '2020-12-22 16:40:55'),
(433, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-11', '', '6:00PM-6.00AM', 12, 1, 1, '2020-12-22 16:46:08'),
(434, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-12', '', '6:00pm-6:00am', 12, 1, 1, '2020-12-23 09:03:44'),
(435, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-13', '', '6.00AM-6:00PM', 12, 1, 1, '2020-12-23 09:36:49'),
(436, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-14', '', '2:00PM-10:00PM', 12, 1, 1, '2020-12-23 09:38:00'),
(437, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-17', '', '6:00AM-6:00PM', 12, 1, 1, '2020-12-23 09:38:55'),
(438, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-18', '', '6.00AM-6:00PM', 12, 1, 1, '2020-12-23 09:44:19'),
(439, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-18', '', '17, 18, 19, 20 Y 21 LABORO DE 6:00AM-6:00PM', 12, 1, 1, '2020-12-23 09:45:31'),
(440, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-23', '', 'SE LABOR? DESDE LAS 6:00 AM-6:00 PM LOS D?AS  23, 24, 25,26 Y 27.', 12, 1, 1, '2020-12-28 09:15:53'),
(441, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-28', '', '2:00 PM-10:00 PM', 12, 1, 1, '2020-12-28 09:34:50'),
(442, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-29', '', '6:00 AM- 5:00 PM (DOMINGO)', 12, 1, 1, '2020-12-28 09:37:28'),
(443, 122, 'Auxiliar Siso', 'Horas Extras', '2020-11-30', '', '6:00 AM-6:00 PM', 12, 1, 1, '2020-12-28 09:38:48'),
(444, 84, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '6:00 AM-2.00 PM (DOMINGO)', 12, 1, 1, '2020-12-28 09:41:16'),
(445, 84, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '5:00 PM- 2:00 AM ( FESTIVO)', 12, 1, 1, '2020-12-28 09:42:25'),
(446, 85, 'Auxiliar Siso', 'Horas Extras', '2020-11-20', '', '4:00 AM-8:00 PM', 12, 1, 1, '2020-12-28 09:51:49'),
(447, 85, 'Auxiliar Siso', 'Horas Extras', '2020-11-22', '', '3:40 PM- 7:00 PM (DOMINICAL)', 12, 1, 1, '2020-12-28 09:53:46'),
(448, 85, 'Auxiliar Siso', 'Horas Extras', '2020-11-23', '', '5:00 AM- 7:00 PM', 12, 1, 1, '2020-12-28 09:57:13'),
(449, 85, 'Auxiliar Siso', 'Horas Extras', '2020-11-24', '', '4:00 AM- 8:00 PM', 12, 1, 1, '2020-12-28 09:58:08'),
(450, 85, 'Auxiliar Siso', 'Horas Extras', '2020-12-25', '', '4.30 AM-8:00 PM', 12, 1, 1, '2020-12-28 09:59:20'),
(451, 85, 'Auxiliar Siso', 'Horas Extras', '2020-11-26', '', '4:20 AM- 8:00 PM', 12, 1, 1, '2020-12-28 10:00:15'),
(452, 85, 'Auxiliar Siso', 'Horas Extras', '2020-11-27', '', '4:20 AM- 8:00 PM', 12, 1, 1, '2020-12-28 10:01:59'),
(453, 72, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '6:00 AM- 6:00 PM (DOMINGO)', 12, 1, 1, '2020-12-28 10:03:29'),
(454, 72, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '6:00 AM- 2:00 PM ( FESTIVO)', 12, 1, 1, '2020-12-28 10:11:55'),
(455, 120, 'Auxiliar Siso', 'Llamado de atencion escrito', '2020-12-28', 'images/novedades/17089llamado de atencion luis matinez.pdf', 'LLEGADA TARDE', 12, 1, 1, '2020-12-28 13:52:31'),
(456, 72, 'Auxiliar Siso', 'Horas Extras', '2020-11-03', '', '6:00 AM- 6:00 PM (03, 04, 05, 06,08, 09, 10, 11, 12 Y 13)', 12, 1, 1, '2020-12-28 14:58:36'),
(457, 72, 'Auxiliar Siso', 'Horas Extras', '2020-11-14', '', '6:00 AM- 2:00 PM', 12, 1, 1, '2020-12-28 15:02:24'),
(458, 72, 'Auxiliar Siso', 'Horas Extras', '2020-11-16', '', '6:00 AM- 6:00 PM ( FESTIVO)', 12, 1, 1, '2020-12-28 15:27:17'),
(459, 72, 'Auxiliar Siso', 'Horas Extras', '2020-11-17', '', '6:00 AM- 6:00 PM (17, 18, 19 Y 20 )', 12, 1, 1, '2020-12-28 15:29:16'),
(460, 72, 'Auxiliar Siso', 'Horas Extras', '2020-11-22', '', '6:00 AM- 5:00 PM (FESTIVO)', 12, 1, 1, '2020-12-28 15:31:36'),
(461, 72, 'Auxiliar Siso', 'Horas Extras', '2020-11-23', '', '6:00 AM- 6:00 PM (23, 24, 25, 26 Y 27)', 12, 1, 1, '2020-12-28 15:53:29'),
(462, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-28', '', '6:00 AM 6:00 PM (28, 29, 30 Y 31 )', 12, 1, 1, '2020-12-28 16:04:21'),
(463, 115, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '6.00 AM- 2:00 PM ( DOMINGO)', 12, 1, 1, '2020-12-28 16:50:24'),
(464, 115, 'Auxiliar Siso', 'Horas Extras', '2020-11-03', '', '6:00 AM - 6:00 PM (03, 04, 05 Y 06 )', 12, 1, 1, '2020-12-28 16:51:52'),
(465, 115, 'Auxiliar Siso', 'Horas Extras', '2020-11-07', '', '6:00 am- 2:00 pm ( domingo)', 12, 1, 1, '2020-12-29 08:27:23'),
(466, 115, 'Auxiliar Siso', 'Horas Extras', '2020-11-09', '', '6:00 am- 6:00 pm ( 09, 10, 11, 12, 13, 14, 15 y 16)', 12, 1, 1, '2020-12-29 08:36:33'),
(467, 115, 'Auxiliar Siso', 'Horas Extras', '2020-11-08', '', '7:00 am- 5:00 pm( domingo)', 12, 1, 1, '2020-12-29 08:54:19'),
(468, 115, 'Auxiliar Siso', 'Horas Extras', '2020-11-17', '', '6:00 pm- 5:00 am', 12, 1, 1, '2020-12-29 08:55:43'),
(469, 115, 'Auxiliar Siso', 'Horas Extras', '2020-11-18', '', '6:00 pm- 6:00 am(18, 19 y 20)', 12, 1, 1, '2020-12-29 08:57:38'),
(470, 115, 'Auxiliar Siso', 'Horas Extras', '2020-11-23', '', '6:00 am- 6:00 pm (23, 24, 25,26 y 27)', 12, 1, 1, '2020-12-29 08:59:14'),
(471, 88, 'Auxiliar Siso', 'Horas Extras', '2020-10-27', '', '6:00 am- 6:00 pm (27, 28, 29, 30 y 31)', 12, 1, 1, '2020-12-29 09:08:16'),
(472, 88, 'Auxiliar Siso', 'Horas Extras', '2020-11-01', '', '6:00 am- 6:00 pm (domingo)', 12, 1, 1, '2020-12-29 09:13:22'),
(473, 88, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '6.00 am- 6:00 pm (festivo)', 12, 1, 1, '2020-12-29 09:18:43'),
(474, 88, 'Auxiliar Siso', 'Horas Extras', '2020-11-03', '', '6:00 am- 6:00 pm(03, 04, 05, 06, 07, 09, 10, 11, 12, 13, 14, 14, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26 y 27)', 12, 1, 1, '2020-12-29 09:23:14'),
(475, 120, 'Auxiliar Siso', 'Dia no laborado', '2020-12-21', '', 'NO SE PRESENTO A LABORAR', 12, 1, 1, '2021-01-04 09:52:23'),
(476, 56, 'Auxiliar Siso', 'Horas Extras', '2020-12-13', '', 'DOMINICA (8:00 AM- 12:00 PM)', 12, 1, 1, '2021-01-04 10:04:41'),
(477, 56, 'Auxiliar Siso', 'Horas Extras', '2020-12-18', '', '7:00AM - 7:00 PM', 12, 1, 1, '2021-01-04 10:10:53'),
(478, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-01', '', '4:40 AM- 5:00 PM', 12, 1, 1, '2021-01-04 10:19:19'),
(479, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-02', '', '4:00 AM- 5:00 PM', 12, 1, 1, '2021-01-04 10:20:17'),
(480, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-03', '', '4:00 AM- 5:00 PM', 12, 1, 1, '2021-01-04 10:21:09'),
(481, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-04', '', '4:00 AM- 5:00 PM', 12, 1, 1, '2021-01-04 10:22:43'),
(482, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-05', '', '6:00 AM- 12:00 PM', 12, 1, 1, '2021-01-04 10:23:58'),
(483, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-05', '', '6:00 AM- 12:00 PM', 12, 1, 0, '2021-01-04 10:23:58'),
(484, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-09', '', '5:00 AM- 5:00 PM', 12, 1, 1, '2021-01-04 16:48:45'),
(485, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-11', '', '2:00 AM- 12:00 PM', 12, 1, 1, '2021-01-04 16:53:05'),
(486, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-12', '', '2:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 07:56:12'),
(487, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-14', '', '4.00 am- 4:00 pm', 12, 1, 1, '2021-01-05 07:57:24'),
(488, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-15', '', '4:00 am- 4:00 pm', 12, 1, 1, '2021-01-05 07:58:20'),
(489, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-16', '', '6:21 am- 5:10 pm', 12, 1, 1, '2021-01-05 08:00:12'),
(490, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-17', '', '6:15 am- 5:17 pm', 12, 1, 1, '2021-01-05 08:01:52'),
(491, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-18', '', '1:39 am- 2:10 pm', 12, 1, 1, '2021-01-05 08:03:13'),
(492, 80, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '2:35 am- 7:50 am (Domingo)', 12, 1, 1, '2021-01-05 08:05:22'),
(493, 88, 'Auxiliar Siso', 'Horas Extras', '2020-11-27', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 08:07:50'),
(494, 88, 'Auxiliar Siso', 'Horas Extras', '2020-11-28', '', '6:00 am - 6:00 pm', 12, 1, 1, '2021-01-05 08:08:52'),
(495, 88, 'Auxiliar Siso', 'Horas Extras', '2020-11-30', '', '6:00 am- 6.00 pm', 12, 1, 1, '2021-01-05 08:09:39'),
(496, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-01', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 08:21:36'),
(497, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-02', '', '6:00 am- 6.00 pm', 12, 1, 1, '2021-01-05 08:48:32'),
(498, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-03', '', '6:00 am - 6:00 pm', 12, 1, 1, '2021-01-05 08:49:23'),
(499, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-04', '', '6.00 am - 6:00 pm', 12, 1, 1, '2021-01-05 08:50:01'),
(500, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-05', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 08:51:15'),
(501, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-06', '', '6.00 am - 6:00 pm', 12, 1, 1, '2021-01-05 08:51:59'),
(502, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-09', '', '6.00 am - 6:00 pm', 12, 1, 1, '2021-01-05 08:52:40'),
(503, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-09', '', '6.00 am - 6:00 pm', 12, 1, 1, '2021-01-05 08:52:40'),
(504, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-09', '', '6.00 am - 6:00 pm', 12, 1, 1, '2021-01-05 08:52:40'),
(505, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-10', '', '6: 00 am  6:00 pm', 12, 1, 1, '2021-01-05 08:53:24'),
(506, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-11', '', '6:00 am - 6:00 pm', 12, 1, 1, '2021-01-05 08:54:05'),
(507, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-12', '', '6.00 am- 6:00 pm', 12, 1, 1, '2021-01-05 08:55:18'),
(508, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-13', '', 'Domingo', 12, 1, 1, '2021-01-05 08:56:16'),
(509, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-14', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 09:28:55'),
(510, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-15', '', '6.00 am- 6. 00 pm', 12, 1, 1, '2021-01-05 09:32:46'),
(511, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-16', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 09:36:45'),
(512, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-17', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 09:37:32'),
(513, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-18', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:19:51'),
(514, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-19', '', '6:00 am-6:00 pm', 12, 1, 1, '2021-01-05 10:21:01'),
(515, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', 'Domingo', 12, 1, 1, '2021-01-05 10:22:56'),
(516, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-21', '', '6:00 am- 6:00 pm (21, 22, 23, 28 y 29)', 12, 1, 1, '2021-01-05 10:24:06'),
(517, 88, 'Auxiliar Siso', 'Horas Extras', '2020-12-24', '', '6:00 am- 12:00pm', 12, 1, 1, '2021-01-05 10:25:42'),
(518, 66, 'Auxiliar Siso', 'Horas Extras', '2020-12-08', '', '6:00 am- 12:00 pm (domingo)', 12, 1, 1, '2021-01-05 10:29:06'),
(519, 66, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '6:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 10:30:07'),
(520, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-03', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:33:18'),
(521, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-04', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:35:04'),
(522, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-09', '', '6:00am- 6:00 pm', 12, 1, 1, '2021-01-05 10:35:56'),
(523, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-11', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:38:28'),
(524, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-14', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:39:11'),
(525, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-15', '', '6.00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:39:58'),
(526, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-15', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:41:17'),
(527, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-17', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:55:34'),
(528, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-18', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-05 10:56:30'),
(529, 122, 'Auxiliar Siso', 'Horas Extras', '2020-12-21', '', '6:00 am- 6:00 pm  ( 2 y 22)', 12, 1, 1, '2021-01-05 10:57:11'),
(530, 115, 'Auxiliar Siso', 'Horas Extras', '2020-12-03', '', '6:00 am- 6:00 pm (03, 04, 09, 10, 11, 12, 14, 15, 16, 17, 18 y 21)', 12, 1, 1, '2021-01-05 11:54:17'),
(531, 115, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '6:00 am- 2:00 pm (Domingo)', 12, 1, 1, '2021-01-05 11:59:48'),
(532, 100, 'Auxiliar Siso', 'Horas Extras', '2020-12-03', '', '6:00 am- 6:00 pm (03, 04, 09, 11, 14, 15, 16, 17, 18 y 21)', 12, 1, 1, '2021-01-05 12:02:55'),
(533, 100, 'Auxiliar Siso', 'Horas Extras', '2020-12-03', '', '6:00 am- 6:00 pm (03, 04, 09, 11, 14, 15, 16, 17, 18 y 21)', 12, 1, 1, '2021-01-05 12:02:55'),
(534, 100, 'Auxiliar Siso', 'Horas Extras', '2020-12-06', '', '6:00 am- 2:00 pm (Domingo)', 12, 1, 1, '2021-01-05 12:06:49'),
(535, 100, 'Auxiliar Siso', 'Horas Extras', '2020-12-08', '', '3.00 pm- 8:00 pm', 12, 1, 1, '2021-01-05 12:08:48'),
(536, 100, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '6:00 am- 2:00 pm ( Domingo)', 12, 1, 1, '2021-01-05 12:10:10'),
(537, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-01', '', '4:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:09:15'),
(538, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-02', '', '3:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:10:25'),
(539, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-03', '', '3:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:11:18'),
(540, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-04', '', '3:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:12:51'),
(541, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-06', '', '6:00 am- 3:00 pm ( Domingo)', 12, 1, 1, '2021-01-05 15:14:11'),
(542, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-08', '', '9:00 am- 3:00 pm', 12, 1, 1, '2021-01-05 15:15:07'),
(543, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-09', '', '4:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:16:00'),
(544, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-11', '', '1:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 15:20:22'),
(545, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-12', '', '1:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 15:21:28'),
(546, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-14', '', '2:00 am - 4:00 pm', 12, 1, 1, '2021-01-05 15:24:20'),
(547, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-18', '', '1:00 am- 2:00 pm', 12, 1, 1, '2021-01-05 15:25:32'),
(548, 126, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '2:00 am- 11:00 am', 12, 1, 1, '2021-01-05 15:27:07'),
(549, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-01', '', '4:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:29:06'),
(550, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-02', '', '3:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:30:31'),
(551, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-03', '', '3:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 15:31:17'),
(552, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-04', '', '3:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:36:05'),
(553, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-05', '', '6:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 15:36:56'),
(554, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-06', '', '12:30 pm- 4:00 pm', 12, 1, 1, '2021-01-05 15:39:29'),
(555, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-09', '', '4:00 am- 5:00 pm', 12, 1, 1, '2021-01-05 15:40:38'),
(556, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-11', '', '1:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 15:41:50'),
(557, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-11', '', '1:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 15:41:50'),
(558, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-11', '', '1:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 15:41:50'),
(559, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-14', '', '2:00 am- 4:00 pm', 12, 1, 1, '2021-01-05 15:44:18'),
(560, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-12', '', '1:00 am- 12:00 pm', 12, 1, 1, '2021-01-05 15:45:18'),
(561, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-18', '', '1:oo am - 2:00 pm', 12, 1, 1, '2021-01-05 15:47:02'),
(562, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '2:00 am- 11:00 am', 12, 1, 1, '2021-01-05 15:50:48'),
(563, 128, 'Auxiliar Siso', 'Horas Extras', '2020-12-19', '', '1:00 am- 10:00 am', 12, 1, 1, '2021-01-05 15:52:50'),
(564, 131, 'Auxiliar Siso', 'Horas Extras', '2020-12-08', '', '11:20 am- 3:10 pm', 12, 1, 1, '2021-01-05 15:54:34'),
(565, 131, 'Auxiliar Siso', 'Horas Extras', '2020-12-10', '', '6:45 am- 8:30 pm', 12, 1, 1, '2021-01-05 15:55:59'),
(566, 131, 'Auxiliar Siso', 'Horas Extras', '2020-12-10', '', '6:45 am- 8:30 pm', 12, 1, 1, '2021-01-05 15:55:59'),
(567, 131, 'Auxiliar Siso', 'Horas Extras', '2020-12-10', '', '6:45 am- 8:30 pm', 12, 1, 1, '2021-01-05 15:55:59'),
(568, 131, 'Auxiliar Siso', 'Horas Extras', '2020-12-16', '', '6:55 am- 7:18 pm', 12, 1, 1, '2021-01-05 15:57:09'),
(569, 131, 'Auxiliar Siso', 'Horas Extras', '2020-12-17', '', '6:45 am . 6:25 am', 12, 1, 1, '2021-01-05 15:58:53'),
(570, 72, 'Auxiliar Siso', 'Horas Extras', '2000-12-01', '', '6:00 pm .6::00 am', 12, 1, 1, '2021-01-05 16:01:30'),
(571, 72, 'Auxiliar Siso', 'Horas Extras', '2020-12-01', '', '6:00 am- 6:00 pm. (01, 07, 08, 09, 10, 11, 13, 14, 18, 20, 21, 22 y 23)', 12, 1, 1, '2021-01-05 16:04:49'),
(572, 97, 'Auxiliar Siso', 'Horas Extras', '2020-12-08', '', '6:00 am- 12:00 am ( festivo)', 12, 1, 1, '2021-01-05 16:16:13'),
(573, 61, 'Auxiliar Siso', 'Horas Extras', '2020-12-08', '', '6:00 am- 12:00 pm ( festivo)', 12, 1, 1, '2021-01-05 16:20:34'),
(574, 61, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '6:00 am- 2:00 pm ( Domingo)', 12, 1, 1, '2021-01-05 16:22:56'),
(575, 34, 'Auxiliar Siso', 'Horas Extras', '2020-12-08', '', '6:00 am- 12:00 pm ( festivo)', 12, 1, 1, '2021-01-05 16:24:44'),
(576, 34, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '6:00 am-12:00 pm (festivo)', 12, 1, 1, '2021-01-05 16:26:14'),
(577, 34, 'Auxiliar Siso', 'Horas Extras', '2020-12-20', '', '6:00 am- 2:00 pm(domingo)', 12, 1, 1, '2021-01-05 16:43:50'),
(578, 36, 'Auxiliar Siso', 'Horas Extras', '2020-12-08', '', '6:00 am- 2:00 pm ( festivo)', 12, 1, 1, '2021-01-05 16:46:00'),
(579, 34, 'Auxiliar Siso', 'Horas Extras', '2020-10-10', '', '6:00 am- 10:00 am (cercado)', 12, 1, 1, '2021-01-06 09:06:12'),
(580, 101, 'Auxiliar Siso', 'Horas Extras', '2020-10-10', '', '6:00 am- 10:00 am ( cercado)', 12, 1, 1, '2021-01-06 09:27:49'),
(581, 63, 'Auxiliar Siso', 'Horas Extras', '2020-10-10', '', '6:00 am- 10:00 am', 12, 1, 1, '2021-01-06 09:32:32'),
(582, 56, 'Auxiliar Siso', 'Horas Extras', '2020-10-10', '', 'montaje de l?minas', 12, 1, 1, '2021-01-06 09:34:31'),
(583, 88, 'Auxiliar Siso', 'Horas Extras', '2020-09-29', '', '6:00 am- 6:00 pm (29 y 30)', 12, 1, 1, '2021-01-06 09:36:59'),
(584, 88, 'Auxiliar Siso', 'Horas Extras', '2020-10-01', '', '6:00 am- 6:00 pm (01, 02, 03, 05, 06, 07, 08, 09, 10, 12, 13, 14, 15, 16, 17, 19, 20, 21, 22, 23, 24 y 26)', 12, 1, 1, '2021-01-06 09:42:24'),
(585, 72, 'Auxiliar Siso', 'Horas Extras', '2020-10-01', '', '6:00 am- 6:00 pm (01, 02, 03, 05, 06, 07, 08, 09, 10, 12, 13, 14, 15, 16, 17, 19, 22, 23, 24, 26 y 27)', 12, 1, 1, '2021-01-06 09:47:25'),
(586, 72, 'Auxiliar Siso', 'Horas Extras', '2020-10-20', '', '6:00 am- 7:00 pm', 12, 1, 1, '2021-01-06 10:03:56'),
(587, 72, 'Auxiliar Siso', 'Horas Extras', '2020-10-21', '', '5:00 am- 6:00 pm', 12, 1, 1, '2021-01-06 10:05:49'),
(588, 100, 'Auxiliar Siso', 'Horas Extras', '2020-10-01', '', '6:00 am- 6:00 pm (01, 02, 05, 06, 07, 08, 09, 12, 13, 14, 15 y 16)', 12, 1, 1, '2021-01-06 10:08:27'),
(589, 100, 'Auxiliar Siso', 'Horas Extras', '2020-10-19', '', '6:00 am- 8:00 pm', 12, 1, 1, '2021-01-06 10:11:11'),
(590, 100, 'Auxiliar Siso', 'Horas Extras', '2020-10-20', '', '6:00 am- 6:00 pm (20, 21, 22, 23 y 26)', 12, 1, 1, '2021-01-06 10:15:40'),
(591, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-01', '', '6:00 am- 6:00 pm (01, 02, 03, 05, 06, 07, 08 y 09)', 12, 1, 1, '2021-01-06 10:22:22'),
(592, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-10', '', '6:00 am- 2:00 pm', 12, 1, 1, '2021-01-06 10:24:27'),
(593, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-13', '', '6:00 am- 6.00 pm(13, 14, 15 y 16)', 12, 1, 1, '2021-01-06 10:26:57'),
(594, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-17', '', '6:00 am- 2:00 pm', 12, 1, 1, '2021-01-06 10:29:24'),
(595, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-19', '', '6:00 am-8:00 pm', 12, 1, 1, '2021-01-06 10:31:44'),
(596, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-20', '', '6:00 am- 6:00 pm (21, 22 y 23)', 12, 1, 1, '2021-01-06 10:33:15'),
(597, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-24', '', '6:00 am- 12:00 pm', 12, 1, 1, '2021-01-06 10:35:31'),
(598, 115, 'Auxiliar Siso', 'Horas Extras', '2020-10-26', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-06 10:36:46'),
(599, 85, 'Auxiliar Siso', 'Llamado de atencion escrito', '2020-08-29', 'images/novedades/38682llamado de atencion juanse.pdf', 'como operador de bascula debe realizar el peso de entrada y salida de cualquier vehiculo y no lo esta haciendo.', 12, 1, 1, '2021-01-06 10:45:59'),
(600, 66, 'Auxiliar Siso', 'Llamado de atencion escrito', '2020-08-12', 'images/novedades/13065llamado de atencion ober.pdf', 'por desechos ordinarios regados en el ?rea de explotaci?n', 12, 1, 1, '2021-01-06 11:11:49'),
(601, 36, 'Auxiliar Siso', 'Llamado de atencion escrito', '2020-09-12', 'images/novedades/35715llamado de atencion luis contreras.pdf', 'mal  orden y aseo en las diferentes ?reas de labores', 12, 1, 1, '2021-01-06 11:53:33'),
(602, 84, 'Auxiliar Siso', 'Horas Extras', '2020-09-12', 'images/novedades/9651llamado de atencion rigoberto.pdf', 'orden y aseo', 12, 1, 1, '2021-01-06 12:03:31'),
(603, 47, 'Auxiliar Siso', 'Horas Extras', '2020-09-09', '', '7:00 am- 7:00 pm', 12, 1, 1, '2021-01-07 10:58:41'),
(604, 47, 'Auxiliar Siso', 'Horas Extras', '2020-09-11', '', '7:00 am- 5:00 pm', 12, 1, 1, '2021-01-07 11:01:52'),
(605, 47, 'Auxiliar Siso', 'Horas Extras', '2020-09-12', '', '7:00 am- 3:00 pm', 12, 1, 1, '2021-01-07 11:02:58'),
(606, 47, 'Auxiliar Siso', 'Horas Extras', '2020-09-14', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-07 11:04:07'),
(607, 47, 'Auxiliar Siso', 'Horas Extras', '2020-09-15', '', '7:00 am -6:00 pm', 12, 1, 1, '2021-01-07 11:05:48'),
(608, 47, 'Auxiliar Siso', 'Horas Extras', '2020-09-16', '', '7:00 am- 8:00 pm', 12, 1, 1, '2021-01-07 11:11:36'),
(609, 101, 'Auxiliar Siso', 'Horas Extras', '2020-09-10', '', '8:30 am- 1:05 pm', 12, 1, 1, '2021-01-07 11:13:55'),
(610, 115, 'Auxiliar Siso', 'Horas Extras', '2020-09-17', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-07 11:16:26'),
(611, 115, 'Auxiliar Siso', 'Horas Extras', '2020-09-18', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-07 11:17:37'),
(612, 115, 'Auxiliar Siso', 'Horas Extras', '2020-09-21', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-07 11:18:43'),
(613, 115, 'Auxiliar Siso', 'Horas Extras', '2020-09-19', '', '6:00 am- 12:00 pm', 12, 1, 1, '2021-01-07 11:20:34'),
(614, 115, 'Auxiliar Siso', 'Horas Extras', '2020-09-22', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-07 11:22:08'),
(615, 115, 'Auxiliar Siso', 'Horas Extras', '2020-09-23', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-07 11:31:33'),
(616, 115, 'Auxiliar Siso', 'Horas Extras', '2020-09-25', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-07 11:32:50'),
(617, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-29', '', '7:05 am-5:00 pm', 12, 1, 1, '2021-01-07 11:35:24'),
(618, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-30', '', '6:20 am - 12:30 pm (domingo)', 12, 1, 1, '2021-01-07 11:37:00'),
(619, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-31', '', '7:00 am- 6:20 pm', 12, 1, 1, '2021-01-07 12:02:27'),
(620, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-03', '', '7:00 am- 6:30 pm', 12, 1, 1, '2021-01-07 12:31:33'),
(621, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-04', '', '6:10 am- 6:50 pm', 12, 1, 1, '2021-01-07 14:40:11'),
(622, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-08', '', '8:00 am 8:30 pm', 12, 1, 1, '2021-01-07 14:41:51'),
(623, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-05', '', '6:10 am- 5:00 pm', 12, 1, 1, '2021-01-07 14:43:46'),
(624, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-09', '', '6:19 am- 7:30 pm', 12, 1, 1, '2021-01-07 14:45:11'),
(625, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-10', '', '6:07 am- 6:00 pm', 12, 1, 1, '2021-01-07 14:47:39'),
(626, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-17', '', '6:30 am- 8:00 pm', 12, 1, 1, '2021-01-07 14:49:47'),
(627, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-12', '', '6:20 am - 7:00 pm', 12, 1, 1, '2021-01-07 14:52:26'),
(628, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-13', '', '6:00 am- 12:00 pm (dominica)', 12, 1, 1, '2021-01-07 14:54:06'),
(629, 85, 'Auxiliar Siso', 'Horas Extras', '2020-09-14', '', '6:05 am- 6:10 pm', 12, 1, 1, '2021-01-07 14:55:52'),
(630, 56, 'Auxiliar Siso', 'Horas Extras', '2020-09-26', '', '4 horas', 12, 1, 1, '2021-01-07 14:58:41'),
(631, 72, 'Auxiliar Siso', 'Horas Extras', '2020-09-03', '', '6:00 am- 6:00 pm (03, 04, 05, 07, 08, 09, 10, 11, 12, 14, 15, 16, 18, 19, 21, 22, 23, 24, 25 y 28)', 12, 1, 1, '2021-01-07 15:02:49'),
(632, 72, 'Auxiliar Siso', 'Horas Extras', '2020-09-17', '', '6:00 am- 8:00 pm', 12, 1, 1, '2021-01-07 15:25:17'),
(633, 72, 'Auxiliar Siso', 'Horas Extras', '2020-09-26', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-07 15:30:22'),
(634, 80, 'Auxiliar Siso', 'Horas Extras', '2020-09-01', '', '6:00 am- 6:00 pm (01, 02, 03 y 04)', 12, 1, 1, '2021-01-07 15:38:16'),
(635, 80, 'Auxiliar Siso', 'Horas Extras', '2020-09-05', '', '2:00 pm -5:00 pm', 12, 1, 1, '2021-01-07 15:40:42'),
(636, 80, 'Auxiliar Siso', 'Horas Extras', '2020-09-07', '', '6:00 am- 6:00 pm ( 07, 08, 09, 10, 11, 12, 14, 15, 17, 18, 19, 21 y 22)', 12, 1, 1, '2021-01-07 15:41:53'),
(637, 80, 'Auxiliar Siso', 'Horas Extras', '2020-09-23', '', '6:00 am- 5:00 pm (23 y 24)', 12, 1, 1, '2021-01-07 15:46:28'),
(638, 100, 'Auxiliar Siso', 'Horas Extras', '2020-09-04', '', '6:00 pm- 6:00 am (04, 10, 11, 14, 15, 16, 17, 18, 21, 22, 23, 24 y 28)', 12, 1, 1, '2021-01-07 15:59:04'),
(639, 88, 'Auxiliar Siso', 'Horas Extras', '2020-09-04', '', '6:00 am- 6:00 pm (04, 15, 16, 17, 18, 19, 21, 23, 24, 25, 26 y 28)', 12, 1, 1, '2021-01-07 16:02:33'),
(640, 88, 'Auxiliar Siso', 'Horas Extras', '2020-09-22', '', '6:00 am- 8:00 pm', 12, 1, 1, '2021-01-07 16:06:03'),
(641, 80, 'Auxiliar Siso', 'Horas Extras', '2020-10-31', '', '5:56 am- 9:54 pm', 12, 1, 1, '2021-01-07 16:15:42'),
(642, 80, 'Auxiliar Siso', 'Horas Extras', '2020-11-02', '', '5:26 am- 6:03 pm ( festivo)', 12, 1, 1, '2021-01-07 16:33:16'),
(643, 80, 'Auxiliar Siso', 'Horas Extras', '2020-11-03', '', '5:56 am-5:40 pm', 12, 1, 1, '2021-01-07 16:41:50'),
(644, 80, 'Auxiliar Siso', 'Horas Extras', '2020-11-05', '', '5:37 am- 6:01', 12, 1, 1, '2021-01-07 16:44:11'),
(645, 80, 'Auxiliar Siso', 'Horas Extras', '2020-11-06', '', '3:37 am-6:34 pm', 12, 1, 1, '2021-01-07 16:51:13'),
(646, 72, 'Auxiliar Siso', 'Llamado de atencion escrito', '2021-01-08', 'images/novedades/95747llamado de atencion adrian h.pdf', 'hizo caso omiso a las recomendaciones de seguridad dadas por el ?rea sst', 12, 1, 1, '2021-01-08 11:56:14'),
(647, 80, 'Auxiliar Siso', 'Horas Extras', '2020-01-02', '', '7:00 am- 4:00 pm', 12, 1, 1, '2021-01-09 09:42:37'),
(648, 80, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '7:00 am- 4:00 pm', 12, 1, 1, '2021-01-09 09:45:01'),
(649, 80, 'Auxiliar Siso', 'Horas Extras', '2020-08-19', '', '5:00 am- 7:00 pm', 12, 1, 1, '2021-01-09 09:45:55'),
(650, 80, 'Auxiliar Siso', 'Horas Extras', '2020-08-22', '', '1.00 pm- 5:00 pm', 12, 1, 1, '2021-01-09 09:48:05'),
(651, 80, 'Auxiliar Siso', 'Horas Extras', '2020-08-24', '', '1:00 am- 5:00 pm', 12, 1, 1, '2021-01-09 09:49:32'),
(652, 80, 'Auxiliar Siso', 'Horas Extras', '2020-08-25', '', '1:00 am- 5:00 pm', 12, 1, 1, '2021-01-09 09:51:00'),
(653, 80, 'Auxiliar Siso', 'Horas Extras', '2020-08-26', '', '1:00 am- 5:00 am', 12, 1, 1, '2021-01-09 09:51:44'),
(654, 80, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '1:00 am- 5:00 am', 12, 1, 1, '2021-01-09 10:00:57'),
(655, 80, 'Auxiliar Siso', 'Horas Extras', '2020-08-28', '', '1:00 am- 5:00 am', 12, 1, 1, '2021-01-09 10:02:19'),
(656, 56, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '7:00 am- 4:00 pm', 12, 1, 1, '2021-01-09 10:05:03'),
(657, 56, 'Auxiliar Siso', 'Horas Extras', '2020-08-14', '', '5:oo pm- 6:00 pm', 12, 1, 1, '2021-01-09 10:05:56'),
(658, 66, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '7:00 am- 4:00 pm', 12, 1, 1, '2021-01-09 10:30:36'),
(659, 66, 'Auxiliar Siso', 'Horas Extras', '2020-08-21', '', '6:34 am- 5:00 pm', 12, 1, 1, '2021-01-09 10:48:28'),
(660, 66, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '7:00 am - 8:00 pm', 12, 1, 1, '2021-01-09 10:50:12'),
(661, 66, 'Auxiliar Siso', 'Horas Extras', '2020-08-28', '', '7:00 am- 8:00 pm', 12, 1, 1, '2021-01-09 10:51:31'),
(662, 36, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '7:00 am- 4:00 pm (festivo)', 12, 1, 1, '2021-01-09 10:55:17'),
(663, 36, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '5:00 pm- 8:00 pm', 12, 1, 1, '2021-01-09 10:56:34'),
(664, 36, 'Auxiliar Siso', 'Horas Extras', '2020-08-28', '', '5:00 pm- 8:00 pm', 12, 1, 1, '2021-01-09 11:11:46'),
(665, 61, 'Auxiliar Siso', 'Horas Extras', '2020-07-28', '', '5:00 pm- 8:00 pm', 12, 1, 1, '2021-01-09 11:33:35'),
(666, 50, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '5:00 pm- 8:00 pm', 12, 1, 1, '2021-01-09 11:47:08'),
(667, 50, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '7:00 am- 4:00 pm', 12, 1, 1, '2021-01-09 11:55:08'),
(668, 34, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '7:00 am - 4:00 pm', 12, 1, 1, '2021-01-09 12:19:28'),
(669, 34, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '5:00 pm- 8:00 pm', 12, 1, 1, '2021-01-09 12:23:52'),
(670, 34, 'Auxiliar Siso', 'Horas Extras', '2020-08-28', '', '5:00 pm- 8:00 pm', 12, 1, 1, '2021-01-09 12:26:53'),
(671, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-01', '', '6:00 am- 12:00 pm', 12, 1, 1, '2021-01-09 12:32:50'),
(672, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-03', '', '6:00 am- 1:00 pm', 12, 1, 1, '2021-01-09 13:30:37'),
(673, 65, 'Auxiliar Siso', 'Horas Extras', '2020-01-04', '', '6:00 am-5:00 pm', 12, 1, 1, '2021-01-09 13:32:04'),
(674, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-05', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-09 13:48:28'),
(675, 65, 'Auxiliar Siso', 'Horas Extras', '2020-01-06', '', '6:00 am-5:00 pm', 12, 1, 1, '2021-01-09 13:51:43'),
(676, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '6:00 am- 4:00 pm (festivo)', 12, 1, 1, '2021-01-09 14:02:47'),
(677, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-08', '', '6:00 am- 12:00 pm', 12, 1, 1, '2021-01-09 14:05:23'),
(678, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-10', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-09 14:21:06'),
(679, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-11', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 07:48:49'),
(680, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-12', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 07:51:49'),
(681, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-13', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 08:00:00'),
(682, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-14', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 08:01:14'),
(683, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-15', '', '6:00 am- 2:00 pm', 12, 1, 1, '2021-01-12 08:01:58'),
(684, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-18', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 08:03:04'),
(685, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-19', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 08:04:29'),
(686, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-20', '', '6:00 am- 7:00 pm', 12, 1, 1, '2021-01-12 08:05:41'),
(687, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-21', '', '7:00 am- 7:00 pm', 12, 1, 1, '2021-01-12 08:06:44'),
(688, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-22', '', '6:00 am- 1:00 pm', 12, 1, 1, '2021-01-12 08:08:05'),
(689, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-24', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 08:09:24'),
(690, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-25', '', '6:00 am- 6:00 pm', 12, 1, 1, '2021-01-12 08:15:26'),
(691, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-26', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 08:16:23'),
(692, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-26', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 08:24:13'),
(693, 65, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '6:00 am- 8:00 pm', 12, 1, 1, '2021-01-12 08:57:19'),
(694, 65, 'Auxiliar Siso', 'Horas Extras', '2002-08-28', '', '6:00 am - 8:00 pm', 12, 1, 1, '2021-01-12 08:58:13'),
(695, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-01', '', '6:19 am- 3:20 pm', 12, 1, 1, '2021-01-12 09:01:11'),
(696, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-03', '', '6:06 am- 5:40 pm', 12, 1, 1, '2021-01-12 09:03:15'),
(697, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-05', '', '6:26 am- 6:00 pm', 12, 1, 1, '2021-01-12 09:06:12'),
(698, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '7:17 am- 4:25 pm', 12, 1, 1, '2021-01-12 09:07:43'),
(699, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-08', '', '7:00 am - 1:00 pm', 12, 1, 1, '2021-01-12 09:10:07'),
(700, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-24', '', '7:00 am- 5:30 pm', 12, 1, 1, '2021-01-12 09:23:52'),
(701, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-25', '', '7:00 am- 6:20 pm', 12, 1, 1, '2021-01-12 09:27:13'),
(702, 85, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '7:00 am- 8:00 pm', 12, 1, 1, '2021-01-12 09:28:35'),
(703, 85, 'Auxiliar Siso', 'Horas Extras', '2002-08-28', '', '7:05 am- 8:10 pm', 12, 1, 1, '2021-01-12 09:32:49'),
(704, 84, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '7:00 am-4:00 pm', 12, 1, 1, '2021-01-12 10:17:14'),
(705, 84, 'Auxiliar Siso', 'Horas Extras', '2020-08-21', '', '6:41 am- 5:00 pm', 12, 1, 1, '2021-01-12 10:23:36'),
(706, 84, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '6:28 am- 19:59 pm', 12, 1, 1, '2021-01-12 10:24:41'),
(707, 84, 'Auxiliar Siso', 'Horas Extras', '2020-08-28', '', '5:00 am- 8:00 pm', 12, 1, 1, '2021-01-12 10:30:02'),
(708, 88, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', 'festivo', 12, 1, 1, '2021-01-12 10:34:07'),
(709, 88, 'Auxiliar Siso', 'Horas Extras', '2020-08-19', '', '5.00 am- 7:00 pm', 12, 1, 1, '2021-01-12 10:35:46'),
(710, 88, 'Auxiliar Siso', 'Horas Extras', '2020-08-22', '', '1:00 pm- 5:00 pm', 12, 1, 1, '2021-01-12 10:37:18'),
(711, 72, 'Auxiliar Siso', 'Horas Extras', '2020-08-07', '', '6:00 am - 5:00 pm (festivo)', 12, 1, 1, '2021-01-12 10:40:27'),
(712, 72, 'Auxiliar Siso', 'Horas Extras', '2020-08-21', '', '6:00 am -?7:00 pm', 12, 1, 1, '2021-01-12 10:41:42'),
(713, 72, 'Auxiliar Siso', 'Horas Extras', '2020-08-27', '', '6:00 am - 8:00 pm', 12, 1, 1, '2021-01-12 10:42:47'),
(714, 72, 'Auxiliar Siso', 'Horas Extras', '2020-08-28', '', '6:00 am- 8:00 pm', 12, 1, 1, '2021-01-12 10:44:43'),
(715, 72, 'Auxiliar Siso', 'Horas Extras', '2020-08-29', '', '6:00 am- 5:00 pm', 12, 1, 1, '2021-01-12 10:48:23'),
(716, 72, 'Auxiliar Siso', 'Horas Extras', '2020-08-30', '', 'domingo', 12, 1, 1, '2021-01-12 11:00:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `estado_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `estado_producto`) VALUES
(1, 'BASE', 0),
(2, 'BASE', 0),
(3, 'BASE G', 1),
(4, 'MEZCLA ASFALTICA', 1),
(5, 'MEZCLA MODIFICADA', 1),
(6, 'RECEBO', 1),
(7, 'SUBBASE', 1),
(8, 'TRITURADO 1/2', 1),
(9, 'TRITURADO 3/4', 1),
(10, 'Recuperacion de Cartera', 1),
(11, 'Prestamo a socios', 1),
(12, 'Transporte de Materiales', 1),
(13, 'IMPRIMACION', 0),
(14, 'Movimiento de Tierra', 1),
(15, 'PIEDRA RAJON', 1),
(16, 'ARENA DE TRITURACION', 1),
(17, 'TRITURADO 1', 1),
(18, 'Triturado de 1- 1/2', 1),
(19, 'ANULADA', 1),
(20, 'ARENA LAVADA', 1),
(21, 'TRITURADO 3/8', 1),
(22, 'PIEDRA CHINA', 1),
(23, 'POLVILLO', 1),
(24, 'POLVILLO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `estado_proveedor`) VALUES
(1, 'AGREROCA', 1),
(2, 'DIAN (ANTERIOR ADMIN)', 1),
(3, 'ORGANIZACION TERPEL', 1),
(4, 'ROBERT CHAVEZ', 1),
(5, 'SURA', 1),
(6, 'HOTEL BOSTON', 1),
(7, 'SUR-DOS LTDA', 1),
(8, 'FERRETERIA EL CENTAVO MENOS', 1),
(9, 'FILTROS Y LLANTAS EL MAIZAL', 1),
(10, 'ALEX QUIROX', 1),
(11, 'TEOFILO TORRES', 1),
(12, 'COMERCIALIZADORA DE COMBUSTIBLE DEL CARIBE S.A.S.', 1),
(13, 'LOGISTICA Y CONSTRUCCIONES DEL CARIBE ZOMAC SAS', 1),
(14, 'CONCRETOS INDUSTRIALES DE SUCRE SAS', 1),
(15, 'TRANSAGRO SA', 1),
(16, 'ARCONCAS SAS', 1),
(17, 'M &amp; MJ CONSTRUCCIONES SAS', 1),
(18, 'TORFER MDE', 1),
(19, 'EMPLEADOS', 1),
(20, 'ENRIQUE GUERRERO', 1),
(21, 'AGREGADOS DEL ATLANTICO', 1),
(22, 'ALCALDIA DE BARRANQUILLA', 1),
(23, 'ALESSIO FRIERI COZZARELLI', 1),
(24, 'ALQUIEXPRESS SAS', 1),
(25, 'ASFALCARGO', 1),
(26, 'ALTA CONSTRUCCIONES SAS', 1),
(27, 'BIOTRANS SAS', 1),
(28, 'BUSCATUCARRO.COM SAS', 1),
(29, 'DINACOL', 1),
(30, 'DISACIVIL SAS', 1),
(31, 'DISAGRECAR SAS', 1),
(32, 'VIANA ESCOBAR CUEVAS', 1),
(33, 'EQUIMAQ GLOBAL SAS', 1),
(34, 'EQUITERRA SA', 1),
(35, 'INGECOST', 1),
(36, 'JYR INGENIERIA Y TRANSPORTES SAS', 1),
(37, 'MAQUINARIAS INDUSTRIALES Y AGRICOLAS DEL CARIBE SAS', 1),
(38, 'LOGISTICA MULTIMODAL ESPECIALIZADA LME SAS', 1),
(39, 'NEGOCIOS MULTIPLES DE COLOMBIA SAS', 1),
(40, 'OMAR DANIEL GARCIA NAVAS', 1),
(41, 'MANUFACTURAS Y PROCESOS INDUSTRIALES LTDA', 1),
(42, 'PROSEGUR', 1),
(43, 'SATRACK', 1),
(44, 'SUPER ESTACION SAN ANTONIO SAS', 1),
(45, 'SABALZA &amp; PUELLO GLOBAL ADVISERS SAS', 1),
(46, 'SERVICEMAN SAS', 1),
(47, 'SMA CONSTRUCTORES SAS', 1),
(48, 'TIGO', 1),
(49, 'TRANSPORTE Y AGREGADOS JOHAN SAS', 1),
(50, 'WACKER NEUSON', 1),
(51, 'HUMBERTO QUINTERO', 1),
(52, 'ZIMA', 1),
(53, 'DAVIVIENDA', 1),
(54, 'COMUNICACIONES REDES Y ENLACES', 1),
(55, 'CONFIAR INMOBILIARIA SAS', 1),
(56, 'TORNIMUELLE DE SUCRE', 1),
(57, 'LASK MAQUINARIA Y CONSTRUCCIONES SAS', 1),
(58, 'MORALES FRANCO JHON HENIS DE JESUS', 1),
(59, 'CONSTRUCTORA GLOBAL DE LA COSTA SAS', 1),
(60, 'NEUMATICA DEL CARIBE S.A', 1),
(61, 'JAIRO RINCON', 1),
(62, 'APORTES EN LINEA', 1),
(63, 'ALFREDO DOMINGUEZ', 1),
(64, 'ELECTRICARIBE', 1),
(65, 'DICON SAS', 1),
(66, 'Caterpillar', 1),
(67, 'Ricardo feria', 1),
(68, 'Grupo minero de sucre', 1),
(69, 'Ricardo Feris', 1),
(70, 'Mar?a salina guerra', 1),
(71, 'Maria salima guerra', 1),
(72, 'franklin llanos', 1),
(73, 'angela ballestero', 1),
(74, 'ALFA', 1),
(75, 'RICARDO VARGAS', 1),
(76, 'ANDRES GOMEZ', 1),
(77, 'SUDECO', 1),
(78, 'BANCOLOMBIA', 1),
(79, 'BANCOLOMBIA', 1),
(80, 'SEGURIDAD NAPOLES', 1),
(81, 'JORGE LUIS FERIS HIJO', 1),
(82, 'GECOLSA', 1),
(83, 'ALVARO HERNANDEZ', 1),
(84, 'KYMAX', 1),
(85, 'GASPAR', 1),
(86, 'metrologia', 1),
(87, 'AGROCAT', 1),
(88, 'JOSE QUINONES', 1),
(89, 'CARLOS GUERRERO', 1),
(90, 'LUIS DIAZ', 1),
(91, 'BASCULAS RAFAEL DEL TORO', 1),
(92, 'AMG DESARROLLOS SAS', 1),
(93, 'CONSTRUCCIONES Y EQUIPOS CEAL (CHEO BARUC)', 1),
(94, 'PAPELERIA EMILY', 1),
(95, 'BASCULA RAFAEL DEL TORO', 1),
(96, 'JHON FIGUEROA', 1),
(97, 'SUDECO', 1),
(98, 'SAAD TALLER', 1),
(99, 'DABERLYS ARRIETA', 1),
(100, 'MAURICIO MAITE', 1),
(101, 'MAURICIO MAITE', 1),
(102, 'AAA TOLUVIEJO', 1),
(103, 'JORGE BANQUET', 1),
(104, 'BANCO ITAU', 1),
(105, 'BANCO DE BOGOTA', 1),
(106, 'CARLOS JOSE GOMEZ', 1),
(107, 'MUNDO BANDAS', 1),
(108, 'GRUPO OBINCO', 1),
(109, 'LUIS MIGUEL', 1),
(110, 'ALBERTO VERGARA', 1),
(111, 'CG SOLUCIONES EN LOGISTICA', 1),
(112, 'AGREGADOS LA PAZ ROA', 1),
(113, 'VICPIMAR', 1),
(114, 'V &amp; V LOGITECH', 1),
(115, 'TRANSPORTE MORRSOQUILLO', 1),
(116, 'DIAN (NUEVA ADMIN)', 1),
(117, 'OSCAR SANCHEZ BAYONA', 1),
(118, 'ELECTROSYSTEM', 1),
(119, 'CONSTRUCCIONES AP', 1),
(120, 'AUTOMUNDIAL', 1),
(121, 'SIMON MONTOYA', 1),
(122, 'SIGILFREDO TAPIA', 1),
(123, 'MEGA  EQUIPOS SAS', 1),
(124, 'LUIS RAFAEL', 1),
(125, 'ALEJANDRO MORALES', 1),
(126, 'DARIO BOHORQUEZ', 1),
(127, 'SOLUTED', 1),
(128, 'SERVIFUEGO', 1),
(129, 'MEGA CONSTRUCCIONES DE COLOMBIA', 1),
(130, 'SANDRA TATIANA SANDOVAL GALLO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_abonos`
--

CREATE TABLE `reporte_abonos` (
  `id` int(11) NOT NULL,
  `fecha_abono` date NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `reporte_id_factura` int(11) NOT NULL,
  `reporte_id_prestamo` int(11) NOT NULL,
  `reporte_id_cuentaxpagar` int(11) NOT NULL,
  `valor_abono` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_bandas_trituradora`
--

CREATE TABLE `reporte_bandas_trituradora` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `distribucion` float NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reporte_bandas_trituradora`
--

INSERT INTO `reporte_bandas_trituradora` (`id`, `fecha_reporte`, `producto_id_producto`, `distribucion`, `creado_por`, `estado_reporte`, `reporte_publicado`, `marca_temporal`, `observaciones`) VALUES
(1, '2020-07-21', 6, 15, 39, 1, 1, '2020-07-20 17:26:18', 'AFORO REALIZADO EL 21 DE JULIO'),
(2, '2020-07-21', 17, 25, 39, 1, 1, '2020-07-20 17:30:58', 'AFORO REALIZADO EL 21 DE JULIO'),
(3, '2020-07-21', 16, 30, 39, 1, 1, '2020-07-20 17:30:58', 'AFORO REALIZADO EL 21 DE JULIO'),
(4, '2020-07-21', 8, 20, 39, 1, 1, '2020-07-20 17:33:08', 'AFORO REALIZADO EL 21 DE JULIO'),
(5, '2020-07-21', 18, 20, 39, 1, 1, '2020-07-20 17:33:08', 'AFORO REALIZADO EL 21 DE JULIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_combustibles`
--

CREATE TABLE `reporte_combustibles` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `punto_despacho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recibido_por` int(11) NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `indicador` float NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reporte_combustibles`
--

INSERT INTO `reporte_combustibles` (`id`, `fecha_reporte`, `equipo_id_equipo`, `despachado_por`, `punto_despacho`, `recibido_por`, `valor_m3`, `cantidad`, `indicador`, `creado_por`, `estado_reporte`, `reporte_publicado`, `marca_temporal`, `observaciones`) VALUES
(3044, '2021-01-26', 688, 72, 'Estacion de Servicio', 130, 7320, 100.1, 123.9, 1, 1, 1, '2021-01-26 20:49:57', 'DEMO'),
(3045, '2021-01-26', 688, 72, 'Estacion de Servicio', 130, 7560, 100.1, 123.9, 16, 1, 1, '2021-01-26 20:41:12', 'DEMO'),
(3046, '2021-01-26', 688, 72, 'Estacion de Servicio', 130, 7560, 100.1, 123.9, 16, 1, 0, '2021-01-26 20:41:12', 'DEMO'),
(3047, '2021-01-27', 688, 72, 'Estacion de Servicio', 130, 7900, 29.5, 1443, 26, 1, 1, '2021-01-27 03:05:02', 'TANQUEO EN BOMBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_compras`
--

CREATE TABLE `reporte_compras` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `insumo_id_insumo` int(11) NOT NULL,
  `subrubro_id_subrubro` int(11) NOT NULL,
  `proveedor_id_proveedor` int(11) NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `vence` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `pago_con` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beneficiario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reporte_compras`
--

INSERT INTO `reporte_compras` (`id`, `imagen`, `fecha_reporte`, `insumo_id_insumo`, `subrubro_id_subrubro`, `proveedor_id_proveedor`, `valor_m3`, `cantidad`, `vence`, `creado_por`, `estado_reporte`, `reporte_publicado`, `marca_temporal`, `pago_con`, `beneficiario`, `observaciones`) VALUES
(2971, '0', '2021-01-27', 44, 6, 0, 120000, 1, 0, 16, 1, 1, '2021-01-27 04:33:46', 'Efectivo', 'PEAJES', 'DEMO'),
(2972, '0', '2021-02-11', 1, 36, 0, 1200000, 1, 0, 16, 1, 1, '2021-01-27 04:34:55', 'Efectivo', 'BOMBA', 'OK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_comprasinsumos`
--

CREATE TABLE `reporte_comprasinsumos` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `insumo_id_insumo` int(11) NOT NULL,
  `proveedor_id_proveedor` int(11) NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `vence` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_despachos`
--

CREATE TABLE `reporte_despachos` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `transportado_por` int(11) NOT NULL,
  `despachador_tm` int(11) NOT NULL,
  `tipo_despacho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `viajes` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_despachosclientes`
--

CREATE TABLE `reporte_despachosclientes` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `remision` int(11) NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `transporte` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `kilometraje` float NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `viajes` int(11) NOT NULL,
  `radicada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_radicada` date NOT NULL,
  `factura` int(11) NOT NULL,
  `pagado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reporte_despachosclientes`
--

INSERT INTO `reporte_despachosclientes` (`id`, `imagen`, `fecha_reporte`, `remision`, `cliente_id_cliente`, `producto_id_producto`, `equipo_id_equipo`, `despachado_por`, `transporte`, `kilometraje`, `valor_m3`, `cantidad`, `viajes`, `radicada`, `fecha_radicada`, `factura`, `pagado`, `creado_por`, `estado_reporte`, `reporte_publicado`, `marca_temporal`, `observaciones`) VALUES
(10974, 'images/remisiones/9025701.jpg', '2021-01-27', 1, 21, 16, 688, 76, 'Si', 100, 450, 15, 1, 'No', '0000-00-00', 0, 'No', 26, 1, 1, '2021-01-27 02:59:27', 'RECOGER MATERIAL EN CANTERA'),
(10975, 'images/remisiones/7531001.jpg', '2021-01-27', 2, 21, 16, 688, 76, 'Si', 193, 450, 14, 1, 'No', '0000-00-00', 0, 'No', 26, 1, 1, '2021-01-27 02:59:27', 'RECOGER MATERIAL EN CANTERA'),
(10976, 'images/remisiones/5922301.jpg', '2021-01-27', 3, 21, 16, 688, 76, 'Si', 92, 450, 15, 1, 'No', '0000-00-00', 0, 'No', 26, 1, 1, '2021-01-27 02:59:27', 'RECOGER MATERIAL EN CANTERA'),
(10977, 'images/remisiones/4490601.jpg', '2021-01-27', 4, 21, 16, 688, 76, 'Si', 80, 450, 15, 1, 'No', '0000-00-00', 0, 'No', 26, 1, 1, '2021-01-27 02:59:27', 'RECOGER MATERIAL EN CANTERA'),
(10978, 'images/remisiones/6966501.jpg', '2021-02-02', 5, 21, 16, 688, 145, 'Si', 123, 550, 17, 1, 'No', '0000-00-00', 0, 'No', 26, 1, 1, '2021-01-27 03:27:24', 'demo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_equipos`
--

CREATE TABLE `reporte_equipos` (
  `id_reporte` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `funcionario_id_funcionario` int(11) NOT NULL,
  `valor_reporte` int(11) NOT NULL,
  `num_trabajado` float NOT NULL,
  `dias_trabajados` int(11) NOT NULL,
  `unidad_trabajo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_galones` float NOT NULL,
  `valor_combustible` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `actividad` longtext COLLATE utf8_unicode_ci NOT NULL,
  `repuesto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `num_factura` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reporte_equipos`
--

INSERT INTO `reporte_equipos` (`id_reporte`, `equipo_id_equipo`, `fecha_reporte`, `funcionario_id_funcionario`, `valor_reporte`, `num_trabajado`, `dias_trabajados`, `unidad_trabajo`, `num_galones`, `valor_combustible`, `observaciones`, `actividad`, `repuesto`, `marca_temporal`, `creado_por`, `reporte_publicado`, `estado_reporte`, `num_factura`) VALUES
(1260, 688, '2021-01-26', 31, 0, 0, 0, '0', 0, 200000, 'dos', 'uno', 'tres', '2021-01-26 20:10:15', 16, 0, 1, '456'),
(1261, 688, '2021-01-26', 31, 0, 0, 0, '0', 0, 913000, 'SE EXPLOTA 1 LLANTA DE TRACCIÓN', 'CAMBIO DE LLANTAS', 'LLANTA R22.5', '2021-01-26 22:04:30', 1, 1, 1, '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_facturas`
--

CREATE TABLE `reporte_facturas` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_horas`
--

CREATE TABLE `reporte_horas` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `punto_despacho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recibido_por` int(11) NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `indicador` float NOT NULL,
  `hora_inactiva` float NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reporte_horas`
--

INSERT INTO `reporte_horas` (`id`, `fecha_reporte`, `equipo_id_equipo`, `despachado_por`, `punto_despacho`, `recibido_por`, `valor_m3`, `cantidad`, `indicador`, `hora_inactiva`, `creado_por`, `estado_reporte`, `reporte_publicado`, `marca_temporal`, `observaciones`) VALUES
(2915, '2021-01-26', 688, 72, '0', 31, 0, 1220, 1000, 220, 1, 1, 1, '2021-01-26 22:27:21', 'ok'),
(2916, '2021-01-26', 688, 72, '0', 31, 0, 1220, 1000, 220, 1, 1, 0, '2021-01-26 21:44:31', 'ok'),
(2917, '2021-01-26', 688, 72, '0', 31, 0, 1220, 1000, 220, 1, 1, 0, '2021-01-26 21:44:31', 'ok'),
(2918, '2021-01-26', 688, 72, '0', 31, 0, 1220, 1000, 220, 1, 1, 0, '2021-01-26 21:44:31', 'ok');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_prestamos`
--

CREATE TABLE `reporte_prestamos` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `fecha_final` date NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `valor_prestamo` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `estado_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_ventas`
--

CREATE TABLE `reporte_ventas` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `estado_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reporte_ventas`
--

INSERT INTO `reporte_ventas` (`id`, `fecha_reporte`, `cliente_id_cliente`, `producto_id_producto`, `valor_m3`, `cantidad`, `creado_por`, `estado_reporte`, `reporte_publicado`, `marca_temporal`, `estado_pago`, `observaciones`) VALUES
(536, '2021-01-27', 21, 12, 1000000, 1, 16, 1, 1, '2021-01-27 04:28:53', 'Cxc', 'demo'),
(537, '2021-02-10', 21, 12, 3000000, 1, 16, 1, 1, '2021-01-27 04:31:05', 'Contado', 'DEMO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Super Admin'),
(2, 'Equipos'),
(4, 'Conductor'),
(5, 'Siso'),
(6, 'Cliente'),
(7, 'Admin Volquetas'),
(8, 'Jefe Planta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id_rubro` int(11) NOT NULL,
  `nombre_rubro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id_rubro`, `nombre_rubro`) VALUES
(1, 'BANCOS'),
(2, 'COMUNICACION TRANSPORTE Y OTROS'),
(3, 'EQUIPOS'),
(4, 'GASTOS ADMINISTRATIVOS'),
(5, 'MATERIALES Y SUMINISTROS'),
(6, 'MOVIMIENTOS FINANCIEROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_nomina`
--

CREATE TABLE `soporte_nomina` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_soporte` date NOT NULL,
  `tipo_soporte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_soporte` int(11) NOT NULL,
  `soporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `funcionario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `soporte_nomina`
--

INSERT INTO `soporte_nomina` (`id`, `imagen`, `fecha_soporte`, `tipo_soporte`, `observaciones`, `creado_por`, `estado_soporte`, `soporte_publicado`, `marca_temporal`, `funcionario_id`) VALUES
(5, 'images/soportespago/78276ACTA WNL 374 Y TZK 546.pdf', '2019-07-03', 'Pago de nomina', 'Validacion', 1, 1, 0, '2019-07-01 20:00:06', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subrubros`
--

CREATE TABLE `subrubros` (
  `id_subrubro` int(11) NOT NULL,
  `rubro_id_rubro` int(11) NOT NULL,
  `nombre_subrubro` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado_subrubro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subrubros`
--

INSERT INTO `subrubros` (`id_subrubro`, `rubro_id_rubro`, `nombre_subrubro`, `estado_subrubro`) VALUES
(1, 1, 'DESEMBOLSOS CREDITOS', 1),
(2, 1, 'INGRESO -Solo facturas - Anticipos', 1),
(3, 1, 'PAGO DE CREDITOS', 1),
(4, 1, 'CHEQUERAS', 1),
(5, 2, 'COMUNICACION -recarga, planes', 1),
(6, 2, 'GASTOS DE MENSAJERIA', 1),
(7, 2, 'VIATICOS - colectivos, taxis,peajes,tiquetes', 1),
(8, 3, 'ADQUISICION - leasing y compra', 1),
(9, 3, 'ALQUILER DE MAQUINARIA', 1),
(10, 3, 'COMBUSTIBLE', 1),
(11, 3, 'GASTOS DE OPERADORES', 1),
(12, 3, 'INSUMOS DE MAQUINARIA - aceite, grasa, etc', 1),
(13, 3, 'MANO DE OBRA', 1),
(14, 3, 'MOVILIZACION DE EQUIPO', 1),
(15, 3, 'REPUESTOS', 1),
(16, 3, 'TRAMITES', 1),
(17, 4, 'GASTOS DE OFICINA - servicios pub, arriendo, etc', 1),
(18, 4, 'GASTOS DE REPRESENTACION', 1),
(19, 4, 'GASTOS PERSONALES', 1),
(20, 4, 'IMPUESTOS', 1),
(21, 4, 'NOMINA', 1),
(22, 4, 'PRESTAMOS A EMPLEADOS', 1),
(23, 4, 'SALUD OCUPACIONAL', 1),
(24, 4, 'SEGUROS', 1),
(25, 4, 'PRESTACION DE SERVICIOS - (vigilancia, subcontratistas... )', 1),
(26, 4, 'CAJA MENOR', 1),
(27, 4, 'COMPROMISOS', 1),
(28, 5, 'DOTACION DE PERSONAL', 1),
(29, 5, 'MATERIALES DE CONSTRUCCION', 1),
(30, 5, 'INSUMOS VARIOS', 1),
(31, 5, 'SERVICIO - Transporte de material', 1),
(32, 6, 'PRESTAMO A SOCIOS', 1),
(33, 1, 'GRAVAMENT MOVIMIENTO FINANCIERO - Cuota de Manejo, Intereses', 1),
(35, 1, 'VALIDA', 0),
(36, 2, 'GASOLINA', 0),
(37, 5, 'SERVICIO - VOLADURA', 1),
(38, 4, 'TRAMITES ADMINISTRATIVOS', 1),
(39, 5, 'INSUMOS MEZCLA ASFALTICA', 1),
(40, 6, 'PRESTAMO A CUENTA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios_activos`
--

CREATE TABLE `t_usuarios_activos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `otros` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_usuarios_activos`
--

INSERT INTO `t_usuarios_activos` (`id`, `id_usuario`, `codigo`, `otros`, `start`, `expire`, `ip`) VALUES
(1, 1, 'bfbef9b8c69ab7cb8eb70a7e15a388e5', 'fredy.gonzalez@teksystem.co', '1551311615', '1551311615', ''),
(2, 2, '491bcd1eb8494aae96db61a0ddc751e5', 'jmeza', '1551322949', '1551322949', ''),
(3, 3, 'fbe53b10743e6e51c75481fb883434eb', 'tania.c', '1551986848', '1551986848', ''),
(4, 4, '9346c1aa6b171eabd5388e45223da178', 'natalia.h', '1555004490', '1555004490', ''),
(5, 5, 'f871d4a6e9e2a11ad9a828cad0cee36d', 'dario.h', '1561579044', '1561579044', ''),
(6, 6, 'fb36febb607683853ad1958b75bd16c6', 'duvan', '1566795238', '1566795238', ''),
(7, 7, 'd389c62073eeb7f682c6f6523443d657', 'luzmila', '1568133527', '1568133527', ''),
(8, 8, 'a72108825a348d0f6f30511e91338e32', 'raul', '1568232357', '1568232357', ''),
(9, 9, '7f44181cca5e09cca1ad4142af83c9dc', 'c.castillo', '1571432802', '1571432802', ''),
(10, 10, 'f591e7c013416f4939001defad3e287f', 'orodriguez', '1573647367', '1573647367', ''),
(11, 11, 'f591e7c013416f4939001defad3e287f', 'mmeza', '1573647394', '1573647394', ''),
(12, 12, '5b963b9f047625a7a2cb4eb4b11177f8', 'd.rodriguez', '1576766362', '1576766362', ''),
(13, 13, '5f87065b7b9c28fa21ba5d8c12ff0677', 'megavias', '1580744355', '1580744355', ''),
(14, 14, '63acd43437867343b076a56c33d42a2f', 'thalia', '1596897787', '1596897787', ''),
(15, 15, '90634566c9b31801fd96a53615550321', 'truecargo', '1597507675', '1597507675', ''),
(16, 16, '6cbffed7d78dee0ad96e072fa2528fce', 'Admin', '1598885016', '1598885016', ''),
(17, 17, '94d2bfccad084fb18eb7b51c7824c909', 'sanonofre', '1603893134', '1603893134', ''),
(18, 18, '550db941a0f6f3e3d33a6fda4ffc70d8', 'nairaqd', '1606338143', '1606338143', ''),
(19, 19, 'f0c828cca7fdc46ded0d9d1fe28fb252', 'ender.c', '1606754823', '1606754823', ''),
(20, 0, '16ed33317c2a3fd4ed0ace4010545a47', 'demo', '1610831940', '1610831940', ''),
(21, 26, 'bfbef9b8c69ab7cb8eb70a7e15a388e5', 'equipos@gmail.com', '1611728685', '1611728685', ''),
(22, 28, 'bfbef9b8c69ab7cb8eb70a7e15a388e5', 'jefeplanta@gmail.com', '1611738892', '1611738892', ''),
(23, 29, 'bfbef9b8c69ab7cb8eb70a7e15a388e5', 'siso@gmail.com', '1611739006', '1611739006', ''),
(24, 27, 'bfbef9b8c69ab7cb8eb70a7e15a388e5', 'conductor@gmail.com', '1611766557', '1611766557', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id_rol` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `estado_usuario` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `imagen`, `nombre_usuario`, `telefono`, `email`, `celular`, `documento`, `rol_id_rol`, `username`, `pass`, `estado_usuario`, `cod_cliente`, `cod_proveedor`) VALUES
(16, 'images/usuarios/32958default.jpg', 'Admin2', '7777777', 'admin@gmail.com', '77777', 'Admin2', 1, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 0),
(24, 'images/usuarios/8886201.jpg', 'Rafael', '2886194', 'notiene@gmial.com', '2886194', '232345', 1, 'notiene@gmial.com', '4654bbe0a0074175fd24c997805831cf', 1, 0, 1),
(25, 'images/usuarios/4474701.jpg', 'Equipos', '123', 'notiene@gmial.com', '123', '123', 2, 'notiene@gmial.com', '21232f297a57a5a743894a0e4a801fc3', 0, 1, 1),
(26, 'images/usuarios/7965001.jpg', 'Equipos', '22222', 'equipos@gmail.com', '22222', '12345', 2, 'equipos@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 1),
(27, 'images/usuarios/9706701.jpg', 'conductor', '12345', 'conductor@gmail.com', '12345', '12345', 4, 'conductor@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 1),
(28, 'images/usuarios/3264901.jpg', 'Jefe de planta', '12345', 'jefeplanta@gmail.com', '12345', '12345', 8, 'jefeplanta@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 0),
(29, 'images/usuarios/8442001.jpg', 'Siso', '12345', 'siso@gmail.com', '12345', '12345', 5, 'siso@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apu`
--
ALTER TABLE `apu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categorias_folder`
--
ALTER TABLE `categorias_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id_cheque`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `documentos_varios`
--
ALTER TABLE `documentos_varios`
  ADD PRIMARY KEY (`id_midocumento`);

--
-- Indices de la tabla `documentos_variosemp`
--
ALTER TABLE `documentos_variosemp`
  ADD PRIMARY KEY (`id_midocumento`);

--
-- Indices de la tabla `documentos_varioseq`
--
ALTER TABLE `documentos_varioseq`
  ADD PRIMARY KEY (`id_midocumento`);

--
-- Indices de la tabla `egresos_caja`
--
ALTER TABLE `egresos_caja`
  ADD PRIMARY KEY (`id_egreso_caja`);

--
-- Indices de la tabla `egresos_cuenta`
--
ALTER TABLE `egresos_cuenta`
  ADD PRIMARY KEY (`id_egreso_cuenta`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`id_midocumento`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indices de la tabla `gestion_documental`
--
ALTER TABLE `gestion_documental`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `gestion_documentalemp`
--
ALTER TABLE `gestion_documentalemp`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `gestion_documentaleq`
--
ALTER TABLE `gestion_documentaleq`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `gestion_documentalprov`
--
ALTER TABLE `gestion_documentalprov`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `ingresos_caja`
--
ALTER TABLE `ingresos_caja`
  ADD PRIMARY KEY (`id_ingreso_caja`);

--
-- Indices de la tabla `ingresos_cuenta`
--
ALTER TABLE `ingresos_cuenta`
  ADD PRIMARY KEY (`id_ingreso_cuenta`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id_insumo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `misdocumentos`
--
ALTER TABLE `misdocumentos`
  ADD PRIMARY KEY (`id_midocumento`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `movimientos_inventario`
--
ALTER TABLE `movimientos_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `reporte_abonos`
--
ALTER TABLE `reporte_abonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_bandas_trituradora`
--
ALTER TABLE `reporte_bandas_trituradora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_combustibles`
--
ALTER TABLE `reporte_combustibles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_compras`
--
ALTER TABLE `reporte_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_comprasinsumos`
--
ALTER TABLE `reporte_comprasinsumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_despachos`
--
ALTER TABLE `reporte_despachos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_despachosclientes`
--
ALTER TABLE `reporte_despachosclientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_equipos`
--
ALTER TABLE `reporte_equipos`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `reporte_facturas`
--
ALTER TABLE `reporte_facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_horas`
--
ALTER TABLE `reporte_horas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_prestamos`
--
ALTER TABLE `reporte_prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_ventas`
--
ALTER TABLE `reporte_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id_rubro`);

--
-- Indices de la tabla `soporte_nomina`
--
ALTER TABLE `soporte_nomina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subrubros`
--
ALTER TABLE `subrubros`
  ADD PRIMARY KEY (`id_subrubro`);

--
-- Indices de la tabla `t_usuarios_activos`
--
ALTER TABLE `t_usuarios_activos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apu`
--
ALTER TABLE `apu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `categorias_folder`
--
ALTER TABLE `categorias_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id_cheque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `documentos_varios`
--
ALTER TABLE `documentos_varios`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT de la tabla `documentos_variosemp`
--
ALTER TABLE `documentos_variosemp`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `documentos_varioseq`
--
ALTER TABLE `documentos_varioseq`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `egresos_caja`
--
ALTER TABLE `egresos_caja`
  MODIFY `id_egreso_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2192;

--
-- AUTO_INCREMENT de la tabla `egresos_cuenta`
--
ALTER TABLE `egresos_cuenta`
  MODIFY `id_egreso_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1456;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;

--
-- AUTO_INCREMENT de la tabla `formatos`
--
ALTER TABLE `formatos`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de la tabla `gestion_documental`
--
ALTER TABLE `gestion_documental`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `gestion_documentalemp`
--
ALTER TABLE `gestion_documentalemp`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;

--
-- AUTO_INCREMENT de la tabla `gestion_documentaleq`
--
ALTER TABLE `gestion_documentaleq`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT de la tabla `gestion_documentalprov`
--
ALTER TABLE `gestion_documentalprov`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ingresos_caja`
--
ALTER TABLE `ingresos_caja`
  MODIFY `id_ingreso_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT de la tabla `ingresos_cuenta`
--
ALTER TABLE `ingresos_cuenta`
  MODIFY `id_ingreso_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `misdocumentos`
--
ALTER TABLE `misdocumentos`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `movimientos_inventario`
--
ALTER TABLE `movimientos_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `reporte_abonos`
--
ALTER TABLE `reporte_abonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1104;

--
-- AUTO_INCREMENT de la tabla `reporte_bandas_trituradora`
--
ALTER TABLE `reporte_bandas_trituradora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reporte_combustibles`
--
ALTER TABLE `reporte_combustibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3048;

--
-- AUTO_INCREMENT de la tabla `reporte_compras`
--
ALTER TABLE `reporte_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2973;

--
-- AUTO_INCREMENT de la tabla `reporte_comprasinsumos`
--
ALTER TABLE `reporte_comprasinsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1307;

--
-- AUTO_INCREMENT de la tabla `reporte_despachos`
--
ALTER TABLE `reporte_despachos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4872;

--
-- AUTO_INCREMENT de la tabla `reporte_despachosclientes`
--
ALTER TABLE `reporte_despachosclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10979;

--
-- AUTO_INCREMENT de la tabla `reporte_equipos`
--
ALTER TABLE `reporte_equipos`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1262;

--
-- AUTO_INCREMENT de la tabla `reporte_facturas`
--
ALTER TABLE `reporte_facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `reporte_horas`
--
ALTER TABLE `reporte_horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2919;

--
-- AUTO_INCREMENT de la tabla `reporte_prestamos`
--
ALTER TABLE `reporte_prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `reporte_ventas`
--
ALTER TABLE `reporte_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=538;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `soporte_nomina`
--
ALTER TABLE `soporte_nomina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subrubros`
--
ALTER TABLE `subrubros`
  MODIFY `id_subrubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `t_usuarios_activos`
--
ALTER TABLE `t_usuarios_activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
