--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `rol_user` int(1) NOT NULL COMMENT '1=administrador, & 2=usuario',
  `estado_usuario` int(1) NOT NULL COMMENT '1 = activo, && 0 = no activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidoP`, `apellidoM`, `cedula`, `correo`, `clave`, `rol_user`, `estado_usuario`) VALUES
(3, 'Teodoro', 'Rico', 'Esparza', '79088571', 'Teodoro_Rico.51@yahoo.com', '$2y$10$TJ2YsANVbooI/.F.MKnZ4OKM6UKQ85S.zZuQgCzWlC5/vklwC4LI6', 2, 0),
(4, 'Luis', 'Cortés', 'Reyna', '209109213', 'Luis_Cortes.13@yahoo.com', '$2y$10$2fkaAw1hw93qlBVT.dPYFurAG2kdiTRenmnTMKmJufQR71BETshEi', 2, 1);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;