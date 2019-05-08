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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<title>Registar usuarios</title>
</head>
<body>
	 <section class="section">
		<div class="container">
			<h1 class="title">Registrar un usuario con informacion dimanica - Framework Bulma css</h1>
			<h2 class="subtitle">
				Este ejemplo va a cargar por defecto valores tomados de una API para luego guardar los datos.
			</h2>
		</div>
	</section>
	<div class="columns is-mobile">
		<div class="column is-4 is-offset-4">
			<form id="form_registro_usuario">
				<div class="field">
					<p class="control has-icons-left has-icons-right">
						<input class="input" type="text" placeholder="Tus nombres" name="nombre" id="nombre">
						<span class="icon is-small is-left">
							<i class="fas fa-user-tie"></i>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control has-icons-left">
						<input class="input" type="text" placeholder="Tu primer apellido" name="apellido_p" id="apellido_p">
						<span class="icon is-small is-left">
							<i class="fas fa-user-tie"></i>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control has-icons-left">
						<input class="input" type="text" placeholder="Tu segundo apellido" name="apellido_s" id="apellido_s">
						<span class="icon is-small is-left">
							<i class="fas fa-user-tie"></i>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control has-icons-left">
						<input class="input" type="text" placeholder="Tu numero cedula" name="cedula" id="cedula">
						<span class="icon is-small is-left">
							<i class="fas fa-hashtag"></i>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control has-icons-left">
						<input class="input" type="text" placeholder="Tu e-mail" name="email" id="email">
						<span class="icon is-small is-left">
							<i class="fas fa-envelope"></i>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control has-icons-left">
						<input class="input" type="password" placeholder="Tu clave" name="clave" id="clave">
						<span class="icon is-small is-left">
							<i class="fas fa-unlock"></i>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control">
						<button type="submit" class="button is-success is-fullwidth">Registrarme..!</button>
					</p>
				</div>
			</form>
		</div>
	</div>


<script type="text/javascript">
	var javascript_URL = '<?= URL; ?>';
</script>
<script src="<?= URL; ?>public/js/sweetalert.min.js"></script>
<script src="<?= URL ?>public/js/faker_es.min.js"></script>
<script src="<?= URL . 'public/js/app_registro.js?version=' . microtime(); ?> "></script>
</body>
</html>