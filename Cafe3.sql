CREATE TABLE `usuarios` (
  `id_iest` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `tipo` int(3) DEFAULT NULL,
  `estado` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_iest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `tiempo` int(3) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;;

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
  `area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_producto` (`id_producto`),
  KEY `id_iest` (`id_iest`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_iest`) REFERENCES `usuarios` (`id_iest`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;;

INSERT INTO `usuarios` (`id_iest`, `nombre`, `apellido`, `email`, `password`, `tipo`, `estado`) VALUES
(1, '', '', 'Admin', '$2y$10$VVixMghlEJ8mI5rYlWg7IOmLkG.8WvMzqVcKUwIXdfvTxsk/1oK3O', 1, 'Activo'),
(2, '', '', 'Admin_pedidos', '$2y$10$8taiHlQ7eq7qGL4xNKdopO0HZz0tDeVI.xFZDKvXiAWj9i/yFdbR2', 2, 'Activo'),
(19666, 'Sebastián', 'Rubio Quiroz', 'sebastian.rubio@iest.edu.mx', '$2y$10$juAE0Vmp3GLuHumt.4zDGOyiKJj6VdN9jRrspJREfCMyP2fYdz1GG', 0, 'Activo');

INSERT INTO `menu` (`id`, `nombre`, `foto`, `precio`, `descripcion`, `estado`, `tiempo`, `categoria`, `area`, `hora_fin`, `hora_inicio`) VALUES
(1, 'Hamburguesa', '3a590a2c109371c39e264c9bf6745e1b.jpg', 75.00, 'Deliciosa hamburguesa', 'Disponible', 10, 'Rápida', 'Café', '19:00:00', '13:00:00'),
(2, 'Boneless BBQ', '7a4fa4f58cf5ee44b21c9c356b9c6583.jpg', 90.00, 'Deliciosos Boneless BBQ', 'Disponible', 10, 'Rápida', 'Café', '19:00:00', '13:00:00'),
(3, 'Boneless Buffalo', 'd8a06cbc26bc4dfc218b8d4e828ab69c.jpg', 90.00, 'Deliciosos Boneless Buffalo', 'Disponible', 10, 'Rápida', 'Café', '19:00:00', '13:00:00'),
(4, 'Chilaquiles', '7ca6e2291977633780aaa5583ea7b64d.jpg', 60.00, 'Deliciosos chilaquiles', 'Disponible', 10, 'Mexicana', 'Café', '19:00:00', '13:00:00'),
(5, 'Flautas', 'd1a1e65071795ef48f72d5bcd8d1b815.jpg', 80.00, 'Deliciosas flautas', 'Disponible', 10, 'Mexicana', 'Café', '19:00:00', '13:00:00'),
(6, 'Sandwich de pollo', 'b5ce47739d4bbc1949572e0f1c763ab1.jpg', 60.00, 'Delicioso sandwich de pollo', 'Disponible', 10, 'Saludables', 'Café', '19:00:00', '13:00:00'),
(7, 'Panini', '26efcaabe4d552cacd05cbf39f53b918.jpg', 50.00, 'Delicioso panini de peperoni', 'Disponible', 10, 'Rápida', 'Paninis', '19:00:00', '13:00:00'),
(8, 'Ensalada', 'bfe685e5e1ca67075a8fca45500a956f.jpg', 70.00, 'Deliciosa ensalada', 'Disponible', 10, 'Saludables', 'Café', '19:00:00', '13:00:00'),
(9, 'Ensalada', 'bfe685e5e1ca67075a8fca45500a956f.jpg', 70.00, 'Deliciosa ensalada', 'Disponible', 10, 'Saludables', 'Paninis', '19:00:00', '13:00:00'),
(10, 'Frappé', '761020a599be53265f274eeddabbc2e1.jpg', 50.00, 'Delicioso frappé', 'Disponible', 10, 'Bebidas', 'Snacks', '19:00:00', '13:00:00'),
(11, 'Gorditas', '10a7077bac62d214e2f7b3331486dbae.jpg', 50.00, '5 deliciosas gorditas', 'Disponible', 10, 'Mexicana', 'Pérgola', '19:00:00', '13:00:00'),
(12, 'Tacos de harina', '194a34fa1a8f577607021741d52376a8.jpg', 50.00, '5 deliciosos tacos de harina', 'Disponible', 10, 'Desayunos', 'Pérgola', '19:00:00', '13:00:00'),
(13, 'Molletes', 'a0a415c418b54d7b24255e1182df3f14.jpg', 70.00, '2 deliciosos molletes', 'Disponible', 10, 'Desayunos', 'Pérgola', '19:00:00', '13:00:00');