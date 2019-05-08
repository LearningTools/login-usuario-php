<?php

namespace Mini\Model;
use Mini\Core\Model;
// Para hacer uso del la clase helper hacemos uso del namespace, si si va usar en otro modelo debes comentar el que no estes usando y llamarlo en el otro modelo
use Mini\Libs\Helper;
// Tambien tendremos que incluir el archivo
include APP . 'Libs/helper.php';

class Usuarios extends Model
{

	function validar_form_login_usario_db($data)
	{
		$sql = "SELECT id, cedula, clave, rol_user, estado_usuario FROM usuarios WHERE cedula = :cc";
		$stmt = $this->db->prepare($sql);
		$parametros = array(':cc' =>$data['cedula']);
		//echo'[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parametros);  exit();
		try{
			$stmt->execute($parametros);
			$resultado = $stmt->fetch();
			// Si el resultado de la consulta es vacia se devuelve un array de respuesta
			if (empty($resultado)) {
				return array('estado_respuesta' => 0);
				//Validamos que la cedula exista
			} else if($stmt->rowCount() == 1){
				//
					if (password_verify($data['clave'], $resultado->clave)) {
							$resultado->estado_clave = 1;
							$resultado->estado_respuesta = 1;
							session_start();
							$_SESSION['sesion_usuario'] = $resultado->id;
							return $resultado;
					} else{
							$resultado->estado_respuesta = 1;
							$resultado->estado_clave = 0;
							return $resultado;
					}

				// Validamos 
			} else if($resultado->estado_usuario == 0){
				return array('estado_usuario' => 0);
			}

		}catch(\Exception $e){
			return $e->getCode();
		}
	}


	function insertar_usuario($array)
	{
		$sql = "INSERT INTO usuarios (nombres, apellidoP, apellidoM, cedula, correo, clave, rol_user, estado_usuario)
		VALUES (:nombre, :apellido1, :apellido2, :numero, :email, :pass, :rol, :estado)";
		$stmt = $this->db->prepare($sql);
		$pass_secure = password_hash($array['clave'], PASSWORD_BCRYPT);
		$parametros = array(
							':nombre'    => $array['nombre'],
							':apellido1' => $array['apellido_p'],
							':apellido2' => $array['apellido_s'],
							':numero'    => $array['cedula'],
							':email'     => $array['email'],
							':pass'      => $pass_secure,
							':rol'       => 2,
							':estado'    => 1
						);
		//echo'[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parametros);  exit();
		try{
			$stmt->execute($parametros);
			// arreglo de informacion
			$respuesta = array(
									'estado'     => 1,
									'id_usuario' => $this->db->lastInsertid()
								);
			// se valida que alla un registro agregado
			if ($stmt->rowCount() == 1) {
				return $respuesta;
			} else{
				// se devuelve el estado de la inserccion como cero.
				return array('estado' => 0);
			}
		} catch(\Exception $e){
			return $e->getCode();
		}
		// //Array de datos
		// $resp = array(
		// 		'status' => 1,
		// 		'insert_id' => $this->db->lastInsertid()
		// );
		// 	if ($stmt->rowCount() == 1) {
		// 			return $resp;
		// 	} else {
		// 		// asignamos al array en el indice status volor 0
		// 		return array('status' => 0);
		// 		//return $resp['status'] = 0;
		// 	}


	}// cierre funcion insertar


	function obtener_toda_info_usuario($id)
	{
		$sql = 'SELECT * FROM usuarios WHERE id = :ID';
		$stmt = $this->db->prepare($sql);
		$parametro = array(':ID' => $id);

		//echo'[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parametro);  exit();

		// Intentar el resultado de la informacion
		try{
			$stmt->execute($parametro);

			if ($stmt->rowCount() == 1) {
					return $stmt->fetch();
			}
		} catch(\Exception $e){
				return $e->getCode();
		}

	}


	function validar_cedula_exist_usuario($valor)
	{
		$sql = "SELECT cedula FROM usuarios WHERE cedula = :cc";
		$stmt = $this->db->prepare($sql);
		$parametro = array(':cc' => $valor);
		//echo'[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parametro);  exit();
		try{
			$stmt->execute($parametro);
			$resultado = $stmt->fetchAll();
			// Si el resultado es vacio devuelve cero, osea que no encontro nada
			if (empty($resultado)) {
				return 0;
			} else{
				return 1;
			}
		} catch(\Exception $e){
			return $e->getCode();
		}
	}


	function validar_email_exist_usuario($valor)
	{
		$sql = "SELECT correo FROM usuarios WHERE correo = :email";
		$stmt = $this->db->prepare($sql);
		$parametro = array(':email' => $valor);
		//echo'[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parametro);  exit();
		try{
			$stmt->execute($parametro);
			$resultado = $stmt->fetchAll();
			// Si el resultado es vacio devuelve cero, osea que no encontro nada
			if (empty($resultado)) {
				return 0;
			} else{
				return 1;
			}
		} catch(\Exception $e){
			return $e->getCode();
		}
	}




}