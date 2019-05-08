/********Definimos variables globales*******/
// Variable que contiene el contenido del formulario
var form_login_usuario = document.querySelector('#form_login_usuario');
/******** Evento que se ejecuta cuando la pagina ya alla cargado*******/
window.addEventListener("load", function () {

	//Validar que un campo que acepte solo numeros, enviamos solo el campo que se quiere validar del formulario .clave
	form_login_usuario.cedula.addEventListener('keypress', function(e){
		if (!validar_campo_numero(event)){
			e.preventDefault();
		}
	});
	// Ejecutamos las funciones si existen en el DOM o la pagina por ejemplo
	if (form_login_usuario) {
		// Evento click de ejemplo
		form_login_usuario.addEventListener("submit", function (e) {
			e.preventDefault()
			// Ejecucion de la funcion
			validar_form_login_usuario();
		});
	}

}); // Cierre del evento load

/************ Mis funciones *************/
function validar_campo_numero(e){
	var key = e.charCode;
	return key >= 48 && key <= 57;
}


function validar_form_login_usuario(){
	var cedula = document.querySelector('#cedula');
	var clave = document.querySelector('#clave');

	if (cedula.value == '') {
		Swal.fire({
			type: 'error',
			title: 'Oops...',
			text: 'El campo de la cedula no puede ir vacio!'
		});
		return false;
	} else if(clave.value == ''){
		Swal.fire({
			type: 'error',
			title: 'Oops...',
			text: 'El campo de la clave no puede ir vacio!'
		});
		return false;
	}
	envio_ajax_form_login_usuario();
}


function envio_ajax_form_login_usuario(){
	var url = javascript_URL + 'ajax_response/validar_form_login_usuario/';
	var parametro = new FormData(form_login_usuario);
	ajaxAsync("POST", "", "json", url, parametro, function(res) {
		console.log(res);
		if (res.estado_respuesta == 0) {
			Swal.fire({
				type: 'error',
				title: 'Oops...',
				text: 'El numero de la cedula no se encuentra en la base de datos!'
			});
			return false;
		} else if(res.estado_usuario == 0){
				Swal.fire({
					type: 'error',
					title: 'Oops...',
					text: 'Tu usuario se encuentra sin acceso a la plataforma..!'
				});
				return false;
		} else if(res.estado_clave == 0){
			Swal.fire({
				type: 'error',
				title: 'Oops...',
				text: 'La clave es in correcta..!'
			});
			return false;
		} else if(res.estado_respuesta == 1 && res.estado_clave == 1){
			Swal.fire({
				type: 'success',
				title: 'Genial...',
				text: 'Te vamos a dirigiar a la plataforma..!'
			}).then((result) => {
				window.location.href = javascript_URL + "dashboard/";
			});
		}
	}); // end ajaxAsync
}

// function ajax_send_registro_data(){
// 	url = javascript_URL + "registro/insertar/";
// 	var parametros = new FormData(form_registro);  

// ajaxAsync("POST", "", "json", url, parametros, function(res) {  
// 	if (res.status == 1) {
// 				alert('El usuario se agrego con exito');
// 				console.log(res);
// 				window.location.href = javascript_URL + 'ofertas/';
// 				// setTimeout(function(){
// 				// 		window.location.href = javascript_URL + 'ofertas/';
// 				// 	}, 3000);
// 	} else{
// 				alert('Hubo un error al ingresar los datos');
// 				console.log(res);
// 		}
// 		//res.insert_id;
// });

// }// cierre funcion

function ajaxAsync(method = "POST", headerType = "", respType = "", url = "", parametros = "", callBack) {
	var xhr = new XMLHttpRequest();

	// abro la conexion
	xhr.open(method, url, true);

	// Send the proper header information along with the request.
	if (headerType === "form")
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	// typo de dato a recibir
	xhr.responseType = respType;

	// evaluo el estado y respuesta
	xhr.onload = function(e) {
		if (xhr.readyState === 4) {
				if (xhr.status === 200) {
						callBack(xhr.response);
				} else {
						return false;
					}
		}
	}; // cierre onload

	// callback para error
	xhr.onerror = function(e) {
		return false;
	};

	// envio de parametros POST
	xhr.send(parametros);
}