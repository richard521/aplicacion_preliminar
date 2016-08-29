function validar(){
	email = document.getElementById('Email').value;
	clave = document.getElementById('Clave').value;
	expresion = /\w+@\w+\.+[a-z]/;

	if (email === "" && clave === ""){
		swal("Correo y contraseña obligatorios");
		document.getElementById('Email').focus();
		return false;
	}
	else if (email === ""){
		swal("El campo email es obligatorio");
		document.getElementById('Email').focus();
		return false;
	}
	else if (clave === ""){
		swal("La contraseña es obligatoria para iniciar sesion");
		document.getElementById('Clave').focus();
		return false;
	}
	else if (clave.length>30){
		swal("Contraseña incorrecta");
		document.getElementById('Clave').focus();
		return false;
	}
	else if (clave.length<8){
		swal("Contraseña incorrecta");
		document.getElementById('Clave').focus();
		return false;
	}
	else if (!expresion.test(email)){
		swal("Por favor ingrese un correo valido");
		document.getElementById('Email').focus();
		return false;
	}
}