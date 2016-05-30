function validaRegistro(){
	var enviar = true;

	var nombre 	= document.getElementById('nombre').value;
	if (!(/^\D[a-zA-Z\s]+$/.test(nombre)) || (/(select).*(from).*/.test(nombre))){
		document.getElementById("nombre").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}else{
		document.getElementById("nombre").setAttribute('class', 'form-control input-md');
	}

	var apellidop = document.getElementById('apellidop').value;	
	if (!(/^\D[a-zA-Z\s]+$/.test(apellidop)) || (/(select).*(from).*/.test(apellidop))){
		document.getElementById("apellidop").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}else{
		document.getElementById("apellidop").setAttribute('class', 'form-control input-md');
	}

	var apellidom = document.getElementById('apellidom').value;
	if (!(/^\D[a-zA-Z\s]+$/.test(apellidom)) || (/(select).*(from).*/.test(apellidom))){
		document.getElementById("apellidom").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}else{
		document.getElementById("apellidom").setAttribute('class', 'form-control input-md');
	}

	var sexo = document.getElementById('sexo').selectedIndex;
	if(sexo < 0 || sexo > 1) {
		document.getElementById("sexo").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}else{
		document.getElementById("sexo").setAttribute('class', 'form-control input-md');
	}

	var domicilio 		= document.getElementById('domicilio');
	if( domicilio.value ){
		document.getElementById("domicilio").setAttribute('class', 'form-control input-md');
	} else {
		document.getElementById("domicilio").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}

	//var numeroExterior 	= document.getElementById('numexterior');
	//var numeroInterior 	= document.getElementById('numerointerior');

	var colonia		= document.getElementById('colonia');
	if( colonia.value ){
		document.getElementById("colonia").setAttribute('class', 'form-control input-md');
	} else {
		document.getElementById("colonia").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}
	var municipio		= document.getElementById('municipio');
	if( municipio.value ){
		document.getElementById("municipio").setAttribute('class', 'form-control input-md');
	} else {
		document.getElementById("municipio").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}
	var estado			= document.getElementById('estado');
	if( estado.value ){
		document.getElementById("estado").setAttribute('class', 'form-control input-md');
	} else {
		document.getElementById("estado").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}
	
	var telefono		= document.getElementById('telefono').value;
	if (!(/^[\d]{2,4}[-]*([\d]{2}[-]*){2}[\d]{2}$/.test(telefono)) || (/(select).*(from).*/.test(telefono))){
		document.getElementById("telefono").setAttribute('class', 'form-control input-md error');
	  	enviar =  false;
	}else{
		document.getElementById("telefono").setAttribute('class', 'form-control input-md');
	}

	var dateEntered = $('#fechanacimiento').val();
	var fecha=moment(dateEntered, ["DD-MM-YYYY", "YYYY-MM-DD"]);
	if (!moment().isAfter(fecha)  || !fecha.isValid()) {
	  document.getElementById("fechanacimiento").setAttribute('class', 'form-control input-md error');
      enviar = false;
	} else {
	  document.getElementById("fechanacimiento").setAttribute('class', 'form-control input-md');
	}

	var mail = document.getElementById('mail').value;
	if( !(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(mail))){
		document.getElementById("mail").setAttribute('class', 'form-control error');
	    enviar = false;
	}else{
		document.getElementById("mail").setAttribute('class', 'form-control ');
	}

	var pass1	= document.getElementById('pass1').value;
	if( pass1 == null || pass1.length < 8 || /^\s+$/.test(pass1) ) {
		document.getElementById("pass1").setAttribute('class', 'form-control  error');
	    enviar = false;
	}else{
		document.getElementById("pass1").setAttribute('class', 'form-control ');
	}

	var pass2	= document.getElementById('pass2').value;
	if( pass2 == null || pass2.length < 8 || /^\s+$/.test(pass2) ) {
		document.getElementById("pass2").setAttribute('class', 'form-control  error');
	    enviar = false;
	}else{
		document.getElementById("pass2").setAttribute('class', 'form-control ');
	}

	
	return enviar;
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
	document.getElementById( field ).setAttribute('class', 'form-control');
	
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

function cifrar(){
	var input_password = document.getElementById("pass1").value;
	var hash = sha1(input_password);
	document.getElementById("pass1").value = hash ;
	document.getElementById("pass2").value = hash ;
}

function cifrarLogin()
{
	var input_password = document.getElementById("pass").value;
	var hash = sha1(input_password);
	document.getElementById("pass").value = hash ;
}
