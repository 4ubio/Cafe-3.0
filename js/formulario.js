//Obtener elemento formulario y sus elementos input
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

//Expresiones regulares
const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{1,25}$/, 
	correo: /^[a-zA-Z0-9_.+-]+@[iest]{4,4}\.[edu]{3,3}\.[mx]{2,2}$/,
	id: /^\d{5,5}$/ // 5 numeros.
}

const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`${campo}`).classList.remove('incorrecto');
        document.getElementById(`${campo}`).classList.add('correcto');
        document.querySelector(`#${campo} i`).classList.remove('fa-circle-xmark');
        document.querySelector(`#${campo} i`).classList.add('fa-circle-check');
    }else{
        document.getElementById(`${campo}`).classList.add('incorrecto');
        document.querySelector(`#${campo} i`).classList.add('fa-circle-xmark');
        document.querySelector(`#${campo} i`).classList.remove('fa-circle-check');
    }
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "email":
            validarCampo(expresiones.correo, e.target, 'email');
        break;
        case "name":
            validarCampo(expresiones.nombre, e.target, 'name');
        break;
        case "lastname":
            validarCampo(expresiones.nombre, e.target, 'lastname');
        break;
        case "ID_IEST":
            validarCampo(expresiones.id, e.target, 'idiest');
        break;
        case "password":
            validarCampo(expresiones.password, e.target, 'password');
        break;
    }
}

//Para cada input ejecutar la función anterior
inputs.forEach((input) => {
    //Cuando se suelte la tecla
    input.addEventListener('keyup', validarFormulario);
    //Cuando se da click fuera del campo
    input.addEventListener('blur', validarFormulario);
});