-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 04:32:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_citas`
--

USE consultorio;
CREATE TABLE `agenda_citas` (
  `IDagenda` int primary key auto_increment,
  `Paciente` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Horario` varchar(30) NOT NULL,
  `Motivo` varchar(100) NOT NULL,
  `Dentista_asig` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `Idpaciente` int primary key auto_increment,
  `Nombre` varchar(30) NOT NULL,
  `ApellidoP` varchar(30) NOT NULL,
  `ApellidoM` varchar(10) NOT NULL,
  `Edad` varchar(15) NOT NULL,
  `Fecha_Nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_med`
--

CREATE TABLE `receta_med` (
  `IDMedic` int primary key auto_increment,
  `Medicamento` varchar(50) NOT NULL,
  `Hora` varchar(20) NOT NULL,
  `Dias` varchar(10) NOT NULL,
  `Dentista` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
