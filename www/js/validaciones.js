function validaRegistro(){
	var nombre 			= document.getElementById('nombre');
	var apellidop 		= document.getElementById('apellidop');
	var apellidom		= document.getElementById('apellidom');
	var sexo 			= document.getElementById('sexo');
	var direccion 		= document.getElementById('direccion');
	var numeroExterior 	= document.getElementById('numexterior');
	var numeroInterior 	= document.getElementById('numerointerior');
	var localidad		= document.getElementById('localidad');
	var municipio		= document.getElementById('municipio');
	var estado			= document.getElementById('estado');
	var telefono		= document.getElementById('telefono');
	var fechaNacimiento = document.getElementById('fechaNacimiento');
	var mail			= document.getElementById('mail');
	var pass1			= document.getElementById('pass1');
	var pass2			= document.getElementById('pass2');


	if (nombre.selectedIndex==0){

	

		//Creo el elemento con la clase error
		var div = document.createElement('div');
		div.setAttribute('class','error');
		div.setAttribute('id','nombre_error');
		
		//Creo el texto9
		var msg = document.createTextNode('Debes ingresar un nombre');
		//Al div le agrego el mensaje
		div.appendChild(msg);
		
		//Insertar el mensaje en el dom
		form.insertBefore(div,status.nextSibling);
	}

campo.checked

var regex = /^\d{5}$/
regex.test(campo.value)

}



function validaContacto(){
	var enviar = true;
	var nombre = document.getElementById("nombre").value;
	if (!(/^\D[a-zA-Z\s]+$/.test(nombre)) || (/(select).*(from).*/.test(nombre))){
		document.getElementById("nombre").setAttribute('class', 'form-control error');
	  	enviar = false;
	}else{
		document.getElementById("nombre").setAttribute('class', 'form-control ');
	}

	var email = document.getElementById("email").value;
    if( !(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email))){
		document.getElementById("email").setAttribute('class', 'form-control error');
	    enviar = false;
	}else{
		document.getElementById("email").setAttribute('class', 'form-control ');
	}

	var mensaje= document.getElementById("mensaje").value;
	if(mensaje == ""){
		document.getElementById("mensaje").setAttribute('class', 'form-control  error');
		enviar = false;
	}		
	else{
		document.getElementById("mensaje").setAttribute('class', 'form-control');

	}
	return enviar;
}

function quitarErrorClass(field){

	switch (field){
		case 1: document.getElementById("nombre").setAttribute('class', 'form-control');
			break;
		case 2: document.getElementById("email").setAttribute('class', 'form-control');
			break;
		case 3: document.getElementById("mensaje").setAttribute('class', 'form-control');
			break;
		case 4: document.getElementById("pass").setAttribute('class', 'form-control');
			break;
	}
	
}

function validaLogin(){
	
	var enviar = true;
	var email  = document.getElementById("email").value;
    if( !(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email))){
		document.getElementById("email").setAttribute('class', 'form-control error');
	    enviar = false;
	}else{
		document.getElementById("email").setAttribute('class', 'form-control ');
	}

	var pass = document.getElementById("pass").value;
	if( pass == null || pass.length < 8 || /^\s+$/.test(pass) ) {
		document.getElementById("pass").setAttribute('class', 'form-control  error');
	  enviar = false;
	}else{
		document.getElementById("pass").setAttribute('class', 'form-control ');
	}
	return enviar;
}