<?php

namespace Mini\Controller;
use Mini\Model\Usuarios;

class Ajax_responseController
{


	public function validar_form_login_usuario()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$obj_usuario = new Usuarios();
			$login_usuario = $obj_usuario->validar_form_login_usario_db($_POST);
			echo json_encode($login_usuario);
		}
	} // end metodo


	public function validar_cedula_usuario()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$valor_cedula = $_POST['cedula'];
			$obj_usuario = new Usuarios();
			$validar_cedula = $obj_usuario->validar_cedula_exist_usuario($valor_cedula);
			// Validamos con el valor 1, indicando que si encontro un resultado igual
			if ($validar_cedula == 1) {
				echo json_encode($validar_cedula);
			} else{
				echo json_encode($validar_cedula);
			}
		}
	}


	public function validar_email_usuario()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$valor_email = $_POST['email'];
			$obj_usuario = new Usuarios();
			$validar_email = $obj_usuario->validar_email_exist_usuario($valor_email);
			if ($validar_email == 1) {
				echo json_encode($validar_email);
			} else{
				echo json_encode($validar_email);
			}
		}
	}


	public function guardar_registro_usuario(){

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos_post = $_POST;
			$obj_usuario = new Usuarios();
			$guardar_registro = $obj_usuario->insertar_usuario($datos_post);
			if ($guardar_registro['estado'] == 1) {
				echo json_encode($guardar_registro);
				session_start();
				$_SESSION['sesion_usuario'] = $guardar_registro['id_usuario'];
			} else{
				echo json_encode(0);
			}
		}
	} // end metodo
} // end class