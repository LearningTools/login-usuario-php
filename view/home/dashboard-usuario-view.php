<!DOCTYPE html>
<html lang="es">
<head>
	<!--permiten al navegador mostrar las páginas web que no cumplen con los estándares como si corrieran en versiones anteriores de IE-->
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--para especificar el color de la barra de dirreciones del navegador movil-->
	<meta name="theme-color" content="">
	<meta name="MobileOptimized" content="width">
	<meta name="HandheldFriendly" content="true">
	<!--Para conseguir que al abrir la web esta se vea sin ningún marco del navegador en pantalla-->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!--modificar mínimamente la barra de estado de Apple en la parte superior en tono traslucido-->
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- meta etiquetas para el seo-->
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/bulma.min.css">
	<title></title>
</head>
<body>
<?php
	if (empty($_SESSION['sesion_usuario'])) :
		$casa = URL;
			header("location: $casa");
	else :
?>
<section class="hero is-medium is-primary is-bold">
	<div class="hero-body">
		<div class="container">
			<h1 class="title">
				Hola : <?= $data_usuario->nombres; ?>
			</h1>
			<h2 class="subtitle">
				Bienvenido al sistema de usuario
			</h2>
			<a href="<?php echo URL. 'home/log_out/' ?>" class="tag is-info is-medium">Cerrar session</a>
		</div>
	</div>
</section>
<?php endif ?>
</body>
</html>