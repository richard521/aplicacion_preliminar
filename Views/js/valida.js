function valida(){
	tipo = document.getElementById('Tipo_usuario').value;
	nombre = document.getElementById('Nombre').value;
	apellido = document.getElementById('Apellido').value;
	clave = document.getElementById('Clave').value;
	email = document.getElementById('Email').value;
	telefono = document.getElementById('Telefono').value;
	expresion = /\w+@\w+\.+[a-z]/;

	if (nombre === ""){
		swal({
			title: "",
			text:"El campo nombre es obligatorio",
			type: "info",
		});
		document.getElementById('Nombre').focus();
		return false;
	}
	else if (nombre.length>30){
		swal({
			title: "",
			text:"El campo nombre no puede contener mas de 30 caracteres",
			type: "info",
		});
		document.getElementById('Nombre').focus();
		return false;
	}
	else if (nombre.length<3){
		swal({
			title: "",
			text:"El campo nombre no puede contener menos de 3 caracteres",
			type: "info",
		});
		document.getElementById('Nombre').focus();
		return false;
	}
	else if (apellido === ""){
		swal({
			title: "",
			text:"El campo apellido es obligatorio",
			type: "info",
		});
		document.getElementById('Apellido').focus();
		return false;
	}
	else if (apellido.length>50){
		swal({
			title: "",
			text:"El campo apellido no puede contener mas de 50 caracteres",
			type: "info",
		});
		document.getElementById('Apellido').focus();
		return false;
	}
	else if (apellido.length<3){
		swal({
			title: "",
			text:"El campo apellido no puede contener menos de 3 caracteres",
			type: "info",
		});
		document.getElementById('Apellido').focus();
		return false;
	}
	else if (clave === ""){
		swal({
			title: "",
			text:"El campo contraseña es obligatorio",
			type: "info",
		});
		document.getElementById('Clave').focus();
		return false;
	}
	else if (clave.length>30){
		swal({
			title: "",
			text:"El campo contraseña no puede contener mas de 30 caracteres",
			type: "info",
		});
		document.getElementById('Clave').focus();
		return false;
	}
	else if (clave.length<8){
		swal({
			title: "",
			text:"El campo contraseña debe contener almenos 8 caracteres",
			type: "info",
		});
		document.getElementById('Clave').focus();
		return false;
	}
	else if (email === ""){
		swal({
			title: "",
			text:"El campo email es obligatorio",
			type: "info",
		});
		document.getElementById('Email').focus();
		return false;
	}
	else if (!expresion.test(email)){
		swal({
			title: "",
			text:"Por favor ingrese un correo valido. Ejemplo (fusion@look.com) ",
			type: "info",
		});
		document.getElementById('Email').focus();
		return false;
	}
	else if (telefono === ""){
		swal({
			title: "",
			text:"El campo telefono es obligatorio",
			type: "info",
		});
		document.getElementById('Telefono').focus();
		return false;
	}
	else if (telefono.length>20){
		swal({
			title: "",
			text:"El campo telefono no puede contener mas de 20 caracteres",
			type: "info",
		});
		document.getElementById('Telefono').focus();
		return false;
	}
	else if (telefono.length<7){
		swal({
			title: "",
			text:"El campo telefono no puede contener menos de 7 caracteres",
			type: "info",
		});
		document.getElementById('Telefono').focus();
		return false;
 	}
}
