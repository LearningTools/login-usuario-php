/********Definimos variables globales*******/
// variable que contiene el elemento del formulario de registro
var form_registro_user = document.querySelector('#form_registro_usuario');
// Variable que contiene el elemento del formulario de login
var form_login_user = document.querySelector('#form_login_usuario');
// Variables que deben estar iniciadas en cero de forma global para que afecte los campos del registro del usuario
var estado_cedula = 0;
var estado_email = 0;
/******** Evento que se ejecuta cuando la pagina ya alla cargado*******/
window.addEventListener("load", function () {

	if (form_login_user) {
		form_login_user.addEventListener('submit', function(e){
			e.preventDefault();
			validar_form_login();
		});
	}


	// Llamado a la funcion que genera informacion aleatoria con fakerJS
	data_fake_random();
	//Validar que un campo que acepte solo numeros, enviamos solo el campo que se quiere validar del formulario .clave
	form_registro_user.cedula.addEventListener('keypress', function(e){
		if (!validar_campo_numero(event)){
			e.preventDefault();
		}
	});


	// Ejecutamos las funciones si existen en el DOM o la pagina por ejemplo
	if (form_registro_user) {
		form_registro_user.addEventListener('submit', function(e){
			e.preventDefault();
			validar_cedula_usuario();
		});
	}


}); // Cierre del evento load

/************ Mis funciones *************/


function validar_campo_numero(e){
	var key = e.charCode;
	return key >= 48 && key <= 57;
}


function data_fake_random(){
	//variables del formulario
	var nombre = document.querySelector('#nombre');
	var apellido_p = document.querySelector('#apellido_p');
	var apellido_s = document.querySelector('#apellido_s');
	var cedula = document.querySelector('#cedula');
	var email = document.querySelector('#email');
	var clave = document.querySelector('#clave');

	nombre.value = faker.name.firstName();
	apellido_p.value = faker.name.lastName();
	apellido_s.value = faker.name.lastName();
	cedula.value = faker.random.number(123456789);
	email.value = general_correo_usuario(nombre.value, apellido_p.value);
	clave.value = '12345';
}


function general_correo_usuario(nombre, apellido){

	var tipo_correos = ['@hotmail', '@gmail','@yahoo'];
	for(i = 0; tipo_correos.length > i; i++){
		resultado = nombre.replace(/ /g, "") +'_' + apellido + '.' + Math.floor(Math.random() * (9 - 1)) + 1 + tipo_correos[i] + '.com';
	}
	return resultado;
}


function validar_cedula_usuario(){
	var url = javascript_URL + 'ajax_response/validar_cedula_usuario/';
	var parametro = new FormData();
	cedula = form_registro_user.cedula.value;
	parametro.append('cedula', cedula);
	ajaxAsync("POST", "", "json", url, parametro, function(res) {
		console.log('respuesta cedula => '+ res);
		if (res == 1) {
			Swal.fire({
				type: 'error',
				title: 'Huyyy...',
				text: 'Al parecer este numero de cedula ya se encuentra registrado..!'
			}).then((result) => {
				//Igualamos el estado de la cedula a 1
				estado_cedula= 1;
				// Agregamos estilo de color al campo de la cedula
				form_registro_user.cedula.style.color = '#ff3860';
				// Agregamos la clase del framework para que ilumine el elemento de rojo
				form_registro_user.cedula.classList.add('is-danger');
			}); // end then
		} else{
			validar_email_usuario();
		}
	}); // end ajaxAsync
}


function validar_email_usuario(){
	var url = javascript_URL + 'ajax_response/validar_email_usuario/';
	var parametro = new FormData();
	email = form_registro_user.email.value;
	parametro.append('email', email);
	ajaxAsync("POST", "", "json", url, parametro, function(res) {
		console.log('respuesta email => ' + res);
		if (res == 1) {
			Swal.fire({
				type: 'error',
				title: 'Huyyy...',
				text: 'Al parecer este correo ya se encuentra registrado..!'
			}).then((result) => {
				form_registro_user.cedula.style.color = '#363636';
				form_registro_user.cedula.classList.remove('is-danger');
				//Igualamos el estado de la cedula a 1
				estado_email= 1;
				// Agregamos estilo de color al campo de la cedula
				form_registro_user.email.style.color = '#ff3860';
				// Agregamos la clase del framework para que ilumine el elemento de rojo
				form_registro_user.email.classList.add('is-danger');
			}); // end then
		} else{
			enviar_formulario_usuario();
		}
	});//end ajaxAsync
}


function enviar_formulario_usuario(){
	var url = javascript_URL + 'ajax_response/guardar_registro_usuario/';
	var parametro = new FormData(form_registro_user);
	ajaxAsync("POST", "", "json", url, parametro, function(res) {
		console.log(res);
		if (res.estado == 1) {
			Swal.fire({
				type: 'success',
				title: 'Exitoso...',
				text: 'Los datos fueron guardados con exito!'
			}).then((result) => {
				// enviando al usuario al dashboard, despues de registrarse
				window.location.href = javascript_URL + 'dashboard/'
			});
		} else{
			Swal.fire({
				type: 'error',
				title: 'Huyyy...',
				text: 'Parece que hubo un error inesperado..!'
			})
		}
	}); // end ajaxAsync
}


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