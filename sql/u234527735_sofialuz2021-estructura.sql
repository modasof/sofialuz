-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2021 a las 20:49:06
-- Versión del servidor: 10.5.12-MariaDB-cll-lve
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
-- Base de datos: `u234527735_sofialuz2021`
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
  `soporte` varchar(1200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id_caja` int(11) NOT NULL,
  `nombre_caja` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `saldo_inicial` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `estado_caja` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `caja_publicada` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `creada_por` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campamento`
--

CREATE TABLE `campamento` (
  `id_campamento` int(11) NOT NULL,
  `nombre_campamento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad_campamento` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion_campamento` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `responsable_campamento` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_cargo` int(11) NOT NULL,
  `cargo_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriainsumos`
--

CREATE TABLE `categoriainsumos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_folder`
--

CREATE TABLE `categorias_folder` (
  `id` int(11) NOT NULL,
  `categoria_ppal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_folder` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_folder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheques`
--

CREATE TABLE `cheques` (
  `id_cheque` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `numero_cheque` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_cheque` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `concepto_cheque` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `valor_cheque` int(11) NOT NULL,
  `fecha_cheque` date NOT NULL,
  `cheque_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_cheque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `estado_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones_item`
--

CREATE TABLE `cotizaciones_item` (
  `id` int(11) NOT NULL,
  `proveedor_id_proveedor` int(11) NOT NULL,
  `cotizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `medio_pago` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `valor_cot` int(11) NOT NULL,
  `requisicion_id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `usuario_creador` int(11) NOT NULL,
  `usuario_aprobador` int(11) NOT NULL,
  `estado_cotizacion` int(11) NOT NULL,
  `ordencompra_num` int(11) NOT NULL,
  `insumo_id_insumo` int(11) NOT NULL,
  `servicio_id_servicio` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `vr_unitario` int(11) NOT NULL,
  `cantidadcot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuenta` int(11) NOT NULL,
  `nombre_cuenta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cc_cuenta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `numero_cuenta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cuenta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `banco` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `representante` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `saldo_inicial` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `estado_cuenta` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `cuenta_publicada` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `nombre_destino` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrada_ins`
--

CREATE TABLE `detalle_entrada_ins` (
  `id` int(11) NOT NULL,
  `cotizacion_item_id` int(11) NOT NULL,
  `oc_id` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `entrada_id` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado_detalle_entrada` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `entrada_por` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pagos_ordenescompra`
--

CREATE TABLE `detalle_pagos_ordenescompra` (
  `id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `egreso_id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado_pago` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida_ins`
--

CREATE TABLE `detalle_salida_ins` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `requisicion_id` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `salida_id` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado_detalle_salida` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `salida_por` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_varios`
--

CREATE TABLE `documentos_varios` (
  `id_midocumento` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `id_folder` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_variosemp`
--

CREATE TABLE `documentos_variosemp` (
  `id_midocumento` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `id_folder` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_varioseq`
--

CREATE TABLE `documentos_varioseq` (
  `id_midocumento` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_variosprov`
--

CREATE TABLE `documentos_variosprov` (
  `id_midocumento` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos_caja`
--

CREATE TABLE `egresos_caja` (
  `id_egreso_caja` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `tipo_beneficiario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_egreso` date NOT NULL,
  `caja_ppal` int(11) NOT NULL,
  `caja_id_caja` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `beneficiario` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `identificacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_rubro` int(11) DEFAULT NULL,
  `id_subrubro` int(11) DEFAULT NULL,
  `valor_egreso` int(11) NOT NULL,
  `observaciones` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `egreso_publicado` int(11) NOT NULL,
  `estado_egreso` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `aplica_equipo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos_cuenta`
--

CREATE TABLE `egresos_cuenta` (
  `id_egreso_cuenta` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `tipo_egreso` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cuenta_beneficiada` int(11) NOT NULL,
  `beneficiario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `id_subrubro` int(11) NOT NULL,
  `caja_beneficiada` int(11) NOT NULL,
  `egreso_en` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cheque_id_cheque` int(11) NOT NULL,
  `valor_egreso` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `estado_egreso` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `egreso_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `fecha_egreso` date NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_ins`
--

CREATE TABLE `entradas_ins` (
  `id_entrada_ins` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `tipo_entrada` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `nombre_equipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marca_equipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `serial_equipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `unidad_trabajo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_equipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `placa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `propietario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valor_activo` float NOT NULL,
  `motor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `peso` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `estado_equipo` int(11) NOT NULL,
  `equipo_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `modulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `comision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipostemporales`
--

CREATE TABLE `equipostemporales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `unidadmedida_id` int(11) NOT NULL,
  `publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipotipomantenimiento`
--

CREATE TABLE `equipotipomantenimiento` (
  `id` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `tipomantenimiento_id_tipomantenimiento` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE `estaciones` (
  `id_estacion` int(11) NOT NULL,
  `nombre_estacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_estacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosreq`
--

CREATE TABLE `estadosreq` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `publicado` int(11) NOT NULL,
  `color` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_compras`
--

CREATE TABLE `facturas_compras` (
  `id` int(11) NOT NULL,
  `proveedor_id_proveedor` int(11) NOT NULL,
  `facturanum` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `valor_total` int(11) NOT NULL,
  `valor_ret` int(11) NOT NULL,
  `valor_iva` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_factura` int(11) NOT NULL,
  `factura_publicada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos`
--

CREATE TABLE `formatos` (
  `id_midocumento` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_funcionario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `tipo_contrato` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_id_cargo` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `funcionario_publicado` int(11) NOT NULL,
  `estado_funcionario` int(11) NOT NULL,
  `empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `arl` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `eps` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `salario` int(11) NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documental`
--

CREATE TABLE `gestion_documental` (
  `id_registro` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `documento_id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `gestion_estado` int(11) NOT NULL,
  `gestion_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documentalemp`
--

CREATE TABLE `gestion_documentalemp` (
  `id_registro` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `documento_id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `gestion_estado` int(11) NOT NULL,
  `gestion_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documentaleq`
--

CREATE TABLE `gestion_documentaleq` (
  `id_registro` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `documento_id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `gestion_estado` int(11) NOT NULL,
  `gestion_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documentalprov`
--

CREATE TABLE `gestion_documentalprov` (
  `id_registro` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `documento_id_documento` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `gestion_estado` int(11) NOT NULL,
  `gestion_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_caja`
--

CREATE TABLE `ingresos_caja` (
  `id_ingreso_caja` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `tipo_beneficiario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `caja_ppal` int(11) NOT NULL,
  `caja_id_caja` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `beneficiario` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `identificacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_rubro` int(11) DEFAULT NULL,
  `id_subrubro` int(11) DEFAULT NULL,
  `valor_ingreso` int(11) NOT NULL,
  `observaciones` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `ingreso_publicado` int(11) NOT NULL,
  `estado_ingreso` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `ingreso_por_cuentas` int(11) NOT NULL,
  `ingreso_por_caja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_cuenta`
--

CREATE TABLE `ingresos_cuenta` (
  `id_ingreso_cuenta` int(11) NOT NULL,
  `cuenta_id_cuenta` int(11) NOT NULL,
  `cuenta_aportante` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `ingreso_por` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `factura_num` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valor_ingreso` bigint(20) NOT NULL,
  `ingreso_en` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `num_cheque` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `concepto_cheque` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_ingreso` int(11) NOT NULL,
  `ingreso_publicado` int(11) NOT NULL,
  `ingreso_por_cuentas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id_insumo` int(11) NOT NULL,
  `nombre_insumo` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `estado_insumo` int(11) NOT NULL,
  `unidadmedida_id` int(11) DEFAULT NULL,
  `categoriainsumo_id` int(11) NOT NULL,
  `parametrizado` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadminima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumoscampamento`
--

CREATE TABLE `insumoscampamento` (
  `id` int(11) NOT NULL,
  `insumo_id_insumo` int(11) NOT NULL,
  `campamento_id_campamento` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha_modificado` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumoscampamentohistorial`
--

CREATE TABLE `insumoscampamentohistorial` (
  `id` int(11) NOT NULL,
  `insumo_id_insumo` int(11) NOT NULL,
  `campamento_id_campamento` int(11) NOT NULL,
  `movimiento_inventario_id` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `m_clientes` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_productos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_insumos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_proveedores` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_carpetas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_usuarios` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_funcionarios` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_documentos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_rubros` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_subrubro` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_destinos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_proyectos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_estaciones` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_empleados` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_gdocempleados` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_novedades` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_cuentas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_gdoccuentas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_cajas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_consolidadocajas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_equipos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_gdocequipos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_campamentos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_mantenimientos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_ventas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_ventasalquiler` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_cuentasxpagar` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_compras` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_comprainsumos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_despachos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_combustible` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_horas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_horasmq` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_informe1` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `m_concreto` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `m_categoriains` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misdocumentos`
--

CREATE TABLE `misdocumentos` (
  `id_midocumento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expira` date NOT NULL,
  `alerta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_midocumento` int(11) NOT NULL,
  `midocumento_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientositem`
--

CREATE TABLE `movimientositem` (
  `id` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `estado_mov_item` int(11) NOT NULL,
  `insumo_id_insumo` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_inventario`
--

CREATE TABLE `movimientos_inventario` (
  `id` int(11) NOT NULL,
  `tipo_movimiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `reportado_por` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_novedad` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_novedad` date NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_novedad` int(11) NOT NULL,
  `novedad_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenescompra`
--

CREATE TABLE `ordenescompra` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `valor_total` int(11) NOT NULL,
  `valor_retenciones` int(11) NOT NULL,
  `valor_iva` int(11) NOT NULL,
  `estado_orden` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `proveedor_id_proveedor` int(11) NOT NULL,
  `medio_pago` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `usuario_creador` int(11) NOT NULL,
  `rubro_id` int(11) NOT NULL,
  `subrubro_id` int(11) NOT NULL,
  `vencimiento` int(11) NOT NULL,
  `factura` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_recibido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `compra_de` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `estado_producto` int(11) NOT NULL,
  `insumos_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosinsumos`
--

CREATE TABLE `productosinsumos` (
  `id` int(11) NOT NULL,
  `insumo_id_insumo` int(11) NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha_modificado` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_proveedor` int(11) NOT NULL,
  `nit` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefonos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_combustibles`
--

CREATE TABLE `reporte_combustibles` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `punto_despacho` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `recibido_por` int(11) NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `indicador` float NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `autorizado` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_compras`
--

CREATE TABLE `reporte_compras` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
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
  `pago_con` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `beneficiario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_comprasinsumos`
--

CREATE TABLE `reporte_comprasinsumos` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
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
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `campamento_id_campamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `tipo_despacho` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `viajes` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_despachosclientes`
--

CREATE TABLE `reporte_despachosclientes` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `remision` int(11) NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `transporte` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `kilometraje` float NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `valor_material` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `viajes` int(11) NOT NULL,
  `radicada` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_radicada` date NOT NULL,
  `factura` int(11) NOT NULL,
  `pagado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `campamento_id_campamento` int(11) DEFAULT NULL,
  `id_destino_origen` int(11) NOT NULL,
  `id_destino_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_despachosconcreto`
--

CREATE TABLE `reporte_despachosconcreto` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `remision` int(11) NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `transporte` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `kilometraje` float NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `valor_material` int(11) NOT NULL,
  `contador1` int(11) NOT NULL,
  `contador2` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `viajes` int(11) NOT NULL,
  `radicada` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_radicada` date NOT NULL,
  `factura` int(11) NOT NULL,
  `pagado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `campamento_id_campamento` int(11) DEFAULT NULL,
  `id_destino_origen` int(11) NOT NULL,
  `id_destino_destino` int(11) NOT NULL,
  `proyecto_id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_despachosconcretodetalle`
--

CREATE TABLE `reporte_despachosconcretodetalle` (
  `id` int(11) NOT NULL,
  `reporte_despachosconcreto_id` int(11) DEFAULT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `unidad_trabajo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `num_galones` float NOT NULL,
  `valor_combustible` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `actividad` longtext COLLATE utf8_spanish_ci NOT NULL,
  `repuesto` longtext COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `num_factura` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_estado_equipos`
--

CREATE TABLE `reporte_estado_equipos` (
  `id` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `estado_sel` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado_publicado` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_facturas`
--

CREATE TABLE `reporte_facturas` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_horas`
--

CREATE TABLE `reporte_horas` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `punto_despacho` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `recibido_por` int(11) NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `indicador` float NOT NULL,
  `hora_inactiva` float NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_horasmq`
--

CREATE TABLE `reporte_horasmq` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `despachado_por` int(11) NOT NULL,
  `punto_despacho` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `recibido_por` int(11) NOT NULL,
  `valor_m3` int(11) NOT NULL,
  `valor_hora_operador` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `indicador` float NOT NULL,
  `hora_inactiva` float NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_reporte` int(11) NOT NULL,
  `reporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `proyecto_id_proyecto` int(11) NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `equipo_adicional` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_equipo_adicional` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `estado_pago` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `estado_pago` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `cantidaddespachos` int(11) DEFAULT NULL,
  `num_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisiciones`
--

CREATE TABLE `requisiciones` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `solicitado_por` int(11) NOT NULL,
  `requisicion_num` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `proyecto_id_proyecto` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `usuario_creador` int(11) NOT NULL,
  `requisicion_publicada` int(11) NOT NULL,
  `estado_id_requisicion` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `tipo_requisicion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rq_area` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisiciones_items`
--

CREATE TABLE `requisiciones_items` (
  `id` int(11) NOT NULL,
  `actividad` longtext COLLATE utf8_spanish_ci NOT NULL,
  `insumo_id_insumo` int(11) NOT NULL,
  `servicio_id_servicio` int(11) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `cantidad` float NOT NULL,
  `fecha_entrega` date NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `requisicion_id` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `usuario_creador` int(11) NOT NULL,
  `estado_item` int(11) NOT NULL,
  `tipo_req` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `ordencompra_num` int(11) NOT NULL,
  `duplicado_de` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id_rubro` int(11) NOT NULL,
  `nombre_rubro` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas_ins`
--

CREATE TABLE `salidas_ins` (
  `id_salida_ins` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `proyecto_id_proyecto` int(11) NOT NULL,
  `requisicion_id` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `recibido_por` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `tipo_salida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado_salida` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_recepcion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `unidadmedida_id` int(11) NOT NULL,
  `publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_nomina`
--

CREATE TABLE `soporte_nomina` (
  `id` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_soporte` date NOT NULL,
  `tipo_soporte` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `estado_soporte` int(11) NOT NULL,
  `soporte_publicado` int(11) NOT NULL,
  `marca_temporal` datetime NOT NULL,
  `funcionario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subrubros`
--

CREATE TABLE `subrubros` (
  `id_subrubro` int(11) NOT NULL,
  `rubro_id_rubro` int(11) NOT NULL,
  `nombre_subrubro` longtext COLLATE utf8_spanish_ci NOT NULL,
  `estado_subrubro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomantenimiento`
--

CREATE TABLE `tipomantenimiento` (
  `id_tipomantenimiento` int(11) NOT NULL,
  `nombre_tipomantenimiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_tipomantenimiento` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `frecuencia_tipomantenimiento` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazabilidad_items`
--

CREATE TABLE `trazabilidad_items` (
  `id` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `usuario_creador` int(11) NOT NULL,
  `estadoreq_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `marca_temporal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios_activos`
--

CREATE TABLE `t_usuarios_activos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `otros` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `start` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `expire` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `navegador` longtext COLLATE utf8_spanish_ci NOT NULL,
  `sistemaoperativo` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_medida`
--

CREATE TABLE `unidades_medida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `publicado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadmedida`
--

CREATE TABLE `unidadmedida` (
  `id_unidadmedida` int(11) NOT NULL,
  `nombre_unidadmedida` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `estado_unidadmedida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id_rol` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `estado_usuario` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_despachos`
--

CREATE TABLE `ventas_despachos` (
  `id` int(11) NOT NULL,
  `reporteventa_id` int(11) NOT NULL,
  `reportedespachocliente_id` int(11) NOT NULL,
  `fecha_modificado` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webservice_distracom`
--

CREATE TABLE `webservice_distracom` (
  `id` int(11) NOT NULL,
  `Control` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `EntregadoA` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Centrocosto` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `EstacionID` int(11) NOT NULL,
  `Estacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaFinal` datetime NOT NULL,
  `Volumen` float(18,10) NOT NULL,
  `Kilometraje` int(11) NOT NULL,
  `Valor` float(19,7) NOT NULL,
  `ValorTotal` float(38,14) NOT NULL,
  `Combustible` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Cedula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `vale` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `Empleado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Centro` int(11) NOT NULL,
  `Subcentro` int(11) NOT NULL,
  `KilometrosGPS` int(11) NOT NULL,
  `Tarjeta` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Indices de la tabla `campamento`
--
ALTER TABLE `campamento`
  ADD PRIMARY KEY (`id_campamento`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categoriainsumos`
--
ALTER TABLE `categoriainsumos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `cotizaciones_item`
--
ALTER TABLE `cotizaciones_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `detalle_entrada_ins`
--
ALTER TABLE `detalle_entrada_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pagos_ordenescompra`
--
ALTER TABLE `detalle_pagos_ordenescompra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_salida_ins`
--
ALTER TABLE `detalle_salida_ins`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `documentos_variosprov`
--
ALTER TABLE `documentos_variosprov`
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
-- Indices de la tabla `entradas_ins`
--
ALTER TABLE `entradas_ins`
  ADD PRIMARY KEY (`id_entrada_ins`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `equipostemporales`
--
ALTER TABLE `equipostemporales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipotipomantenimiento`
--
ALTER TABLE `equipotipomantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  ADD PRIMARY KEY (`id_estacion`);

--
-- Indices de la tabla `estadosreq`
--
ALTER TABLE `estadosreq`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas_compras`
--
ALTER TABLE `facturas_compras`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `insumoscampamento`
--
ALTER TABLE `insumoscampamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insumoscampamentohistorial`
--
ALTER TABLE `insumoscampamentohistorial`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `movimientositem`
--
ALTER TABLE `movimientositem`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `ordenescompra`
--
ALTER TABLE `ordenescompra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `productosinsumos`
--
ALTER TABLE `productosinsumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`);

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
-- Indices de la tabla `reporte_despachosconcreto`
--
ALTER TABLE `reporte_despachosconcreto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_despachosconcretodetalle`
--
ALTER TABLE `reporte_despachosconcretodetalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_equipos`
--
ALTER TABLE `reporte_equipos`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `reporte_estado_equipos`
--
ALTER TABLE `reporte_estado_equipos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `reporte_horasmq`
--
ALTER TABLE `reporte_horasmq`
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
-- Indices de la tabla `requisiciones`
--
ALTER TABLE `requisiciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requisiciones_items`
--
ALTER TABLE `requisiciones_items`
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
-- Indices de la tabla `salidas_ins`
--
ALTER TABLE `salidas_ins`
  ADD PRIMARY KEY (`id_salida_ins`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `tipomantenimiento`
--
ALTER TABLE `tipomantenimiento`
  ADD PRIMARY KEY (`id_tipomantenimiento`);

--
-- Indices de la tabla `trazabilidad_items`
--
ALTER TABLE `trazabilidad_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_usuarios_activos`
--
ALTER TABLE `t_usuarios_activos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  ADD PRIMARY KEY (`id_unidadmedida`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas_despachos`
--
ALTER TABLE `ventas_despachos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `webservice_distracom`
--
ALTER TABLE `webservice_distracom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apu`
--
ALTER TABLE `apu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `campamento`
--
ALTER TABLE `campamento`
  MODIFY `id_campamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoriainsumos`
--
ALTER TABLE `categoriainsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_folder`
--
ALTER TABLE `categorias_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id_cheque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizaciones_item`
--
ALTER TABLE `cotizaciones_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_entrada_ins`
--
ALTER TABLE `detalle_entrada_ins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pagos_ordenescompra`
--
ALTER TABLE `detalle_pagos_ordenescompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_salida_ins`
--
ALTER TABLE `detalle_salida_ins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos_varios`
--
ALTER TABLE `documentos_varios`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos_variosemp`
--
ALTER TABLE `documentos_variosemp`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos_varioseq`
--
ALTER TABLE `documentos_varioseq`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos_variosprov`
--
ALTER TABLE `documentos_variosprov`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `egresos_caja`
--
ALTER TABLE `egresos_caja`
  MODIFY `id_egreso_caja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `egresos_cuenta`
--
ALTER TABLE `egresos_cuenta`
  MODIFY `id_egreso_cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entradas_ins`
--
ALTER TABLE `entradas_ins`
  MODIFY `id_entrada_ins` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipostemporales`
--
ALTER TABLE `equipostemporales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipotipomantenimiento`
--
ALTER TABLE `equipotipomantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  MODIFY `id_estacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadosreq`
--
ALTER TABLE `estadosreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas_compras`
--
ALTER TABLE `facturas_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formatos`
--
ALTER TABLE `formatos`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestion_documental`
--
ALTER TABLE `gestion_documental`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestion_documentalemp`
--
ALTER TABLE `gestion_documentalemp`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestion_documentaleq`
--
ALTER TABLE `gestion_documentaleq`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestion_documentalprov`
--
ALTER TABLE `gestion_documentalprov`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresos_caja`
--
ALTER TABLE `ingresos_caja`
  MODIFY `id_ingreso_caja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresos_cuenta`
--
ALTER TABLE `ingresos_cuenta`
  MODIFY `id_ingreso_cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumoscampamento`
--
ALTER TABLE `insumoscampamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumoscampamentohistorial`
--
ALTER TABLE `insumoscampamentohistorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `misdocumentos`
--
ALTER TABLE `misdocumentos`
  MODIFY `id_midocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientositem`
--
ALTER TABLE `movimientositem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientos_inventario`
--
ALTER TABLE `movimientos_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenescompra`
--
ALTER TABLE `ordenescompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productosinsumos`
--
ALTER TABLE `productosinsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_abonos`
--
ALTER TABLE `reporte_abonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_bandas_trituradora`
--
ALTER TABLE `reporte_bandas_trituradora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_combustibles`
--
ALTER TABLE `reporte_combustibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_compras`
--
ALTER TABLE `reporte_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_comprasinsumos`
--
ALTER TABLE `reporte_comprasinsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_despachos`
--
ALTER TABLE `reporte_despachos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_despachosclientes`
--
ALTER TABLE `reporte_despachosclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_despachosconcreto`
--
ALTER TABLE `reporte_despachosconcreto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_despachosconcretodetalle`
--
ALTER TABLE `reporte_despachosconcretodetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_equipos`
--
ALTER TABLE `reporte_equipos`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_estado_equipos`
--
ALTER TABLE `reporte_estado_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_facturas`
--
ALTER TABLE `reporte_facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_horas`
--
ALTER TABLE `reporte_horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_horasmq`
--
ALTER TABLE `reporte_horasmq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_prestamos`
--
ALTER TABLE `reporte_prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_ventas`
--
ALTER TABLE `reporte_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requisiciones`
--
ALTER TABLE `requisiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requisiciones_items`
--
ALTER TABLE `requisiciones_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salidas_ins`
--
ALTER TABLE `salidas_ins`
  MODIFY `id_salida_ins` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `soporte_nomina`
--
ALTER TABLE `soporte_nomina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subrubros`
--
ALTER TABLE `subrubros`
  MODIFY `id_subrubro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipomantenimiento`
--
ALTER TABLE `tipomantenimiento`
  MODIFY `id_tipomantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trazabilidad_items`
--
ALTER TABLE `trazabilidad_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_usuarios_activos`
--
ALTER TABLE `t_usuarios_activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  MODIFY `id_unidadmedida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas_despachos`
--
ALTER TABLE `ventas_despachos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webservice_distracom`
--
ALTER TABLE `webservice_distracom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
