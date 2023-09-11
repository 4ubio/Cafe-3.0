CREATE TABLE `usuarios` (
  `id_iest` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `tipo` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_iest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `tiempo` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `nombre_platillo` varchar(100) DEFAULT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `cliente` varchar(100) DEFAULT NULL,
  `id_iest` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_producto` (`id_producto`),
  KEY `id_iest` (`id_iest`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_iest`) REFERENCES `usuarios` (`id_iest`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id_iest`, `nombre`, `apellido`, `email`, `password`, `tipo`) VALUES (1, '', '', 'Admin', '$2y$10$VVixMghlEJ8mI5rYlWg7IOmLkG.8WvMzqVcKUwIXdfvTxsk/1oK3O', 1);