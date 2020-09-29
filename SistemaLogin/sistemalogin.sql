CREATE DATABASE IF NOT EXISTS `sistemalogin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistemalogin`;
--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL auto_increment,
  `nombre` varchar(500) NOT NULL,
  `apellidop` varchar(500) NOT NULL,
  `apellidom` varchar(500) NOT NULL,
  `genero` varchar(500) NOT NULL,
  `edad` int(10) NOT NULL,
  `estadocivil` varchar(500) NOT NULL,
  `correo` varchar(500) NOT NULL,
  `nivel` varchar(500) NOT NULL,
  `grado` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `login` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;