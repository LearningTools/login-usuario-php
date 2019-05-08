<?php

namespace Mini\Controller;
use Mini\Model\Usuarios;


class DashboardController
{
	
	public function index()
	{
		//cargar objecto
		$obj_usuario = new Usuarios();
		session_start();
		// sesion usuario tiene el id del usuario que se registro
		ob_clean();
		$data_usuario = $obj_usuario->obtener_toda_info_usuario($_SESSION['sesion_usuario']);
		//load view
		require APP . 'view/home/dashboard-usuario-view.php';
	}
}