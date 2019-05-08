<?php

namespace Mini\Controller;
use Mini\Model\Usuarios;
class RegistroController
{

	// public function insertar()
	// {
	// 	$array = $_POST;
	// 	$model = new Usuarios();
	// 	$insertar = $model->insert_user($array);
	// 	if ($insertar['status'] == 1) {
	// 		ob_clean();
	// 		session_start();
	// 		$_SESSION['user_id'] = $insertar['insert_id'];
	// 		echo json_encode($insertar);
	// 	}
	// }

	public function index()
	{
		// load view
		require APP . 'view/home/registrar-usuario-view.php';
	}
}