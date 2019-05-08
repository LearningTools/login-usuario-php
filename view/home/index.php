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
	<title>Login | inicia session</title>
</head>
<body>
	 <section class="section">
		<div class="container">
			<h1 class="title">Ejemplo login por ajax - Framework Bulma css</h1>
			<h2 class="subtitle">
				Se valida que la cedula del usuario exista en la base de datos, que este activo, y la clave sea la correcta, encriptada por <em>password_hash</em>
			</h2>

			<article class="message">
				<div class="message-header">
					<p>Tabla de informacion para usar el loguin con los parametros expuestos arriba</p>
				</div>
				<div class="message-body">
					<table class="table is-hoverable is-fullwidth">
						<thead>
							<tr>
								<th>Nombre usuario</th>
								<th>Cedula</th>
								<th>Clave</th>
								<th>Rol usuario</th>
								<th>Estado usuario</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Teodoro Rico Esparza</td>
								<td>79088571</td>
								<td>12345</td>
								<td>2 = usuario</td>
								<td>0 = no activo</td>
							</tr>
							<tr>
								<td>Luis Cortés Reyna</td>
								<td>209109213</td>
								<td>12345</td>
								<td>2 = usuario</td>
								<td>1 = activo</td>
							</tr>
						</tbody>
					</table> 
				</div>
			</article>
		</div>
	</section>
	<div class="columns is-mobile">
		<div class="column is-4 is-offset-4">
			<form id="form_login_usuario">
				<div class="field">
					<p class="control has-icons-left has-icons-right">
						<input class="input" type="text" placeholder="Tu numero de cedula" name="cedula" id="cedula">
						<span class="icon is-small is-left">
							<i class="fas fa-user"></i>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control has-icons-left">
						<input class="input" type="password" placeholder="Tu clave" name="clave" id="clave">
						<span class="icon is-small is-left">
							<i class="fas fa-lock"></i>
						</span>
					</p>
				</div>
				<div class="field">
					<p class="control">
						<button type="submit" class="button is-success is-fullwidth">Inicia sesion</button>
					</p>
				</div>
			</form>
		</div>
	</div>


	<div class="columns is-mobile">
		<div class="column is-4 is-offset-4">
			<div class="field">
				<div class="control">
					<a href="<?php URL; ?>registro/" class="button is-link is-medium is-fullwidth"">Registar un usuario</a>
				</div>
			</div>
		</div>
	</div>



<script type="text/javascript">
	var javascript_URL = '<?= URL; ?>';
</script>
<script src="<?= URL; ?>public/js/sweetalert.min.js"></script>
<script src="<?= URL . 'public/js/app_login.js?version=' . microtime(); ?> "></script>
</body>
</html>
