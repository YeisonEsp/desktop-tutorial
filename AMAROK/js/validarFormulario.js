
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const select = document.getElementById('idciudad');
var botonValidarFormulario = document.getElementById('btnValidarForm');
botonValidarFormulario.disabled = true;

const expresiones = {
    documento: /^([0-9]{8}|[0-9]{10})$/,
    nombre: /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(?:\s+[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+){1,5}(?:\s+[-\sa-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)?$/,
    direccion: /^.{12,68}$/,
    telefono: /^\d{10}$/,
    correo: /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/,
    password: /^.{8,20}$/
}

const campos = {
    clientdoc: false,
    idciudad:  false,
    clientnom: false,
    clientdir: false,
    clienttel: false,
    clientema: false,
    clientcon: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "clientdoc":
            validarCampo(expresiones.documento, e.target, e.target.name);
        break;
        case "idciudad":
            validarCampoSelect(e.target.name);
        break;
        case "clientnom":
            validarCampo(expresiones.nombre, e.target, e.target.name);
        break;
        case "clientdir":
            validarCampo(expresiones.direccion, e.target, e.target.name);
        break;
        case "clienttel":
            validarCampo(expresiones.telefono, e.target, e.target.name);
        break;
        case "clientema":
            validarCampo(expresiones.correo, e.target, e.target.name);
        break;
        case "clientcon":
            validarCampo(expresiones.password, e.target, e.target.name);
        break;
    }
    if(campos.clientdoc && campos.idciudad && campos.clientnom && campos.clientdir && campos.clienttel && campos.clientema && campos.clientcon) {
        botonValidarFormulario.disabled = false;
    } else {
        botonValidarFormulario.disabled = true;
    }
}

const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.querySelector(`#grupo-${campo}-cliente .formulario-texto-error`).classList.remove('formulario-texto-error-active');
        campos[campo] = true;
    } else {
        document.querySelector(`#grupo-${campo}-cliente .formulario-texto-error`).classList.add('formulario-texto-error-active');
        campos[campo] = false;
    }
    console.log(campos.clientdoc, campos.clientnom, campos.clientdir, campos.clienttel, campos.clientema, campos.clientcon);
}

function validarCampoSelect(campo) {
    if(select.value==='Seleccionar una Ciudad'){
        document.querySelector(`#grupo-idciudad-cliente .formulario-texto-error`).classList.add('formulario-texto-error-active');
        campos[campo] = false;
    } else {
        campos[campo] = true;
        document.querySelector(`#grupo-idciudad-cliente .formulario-texto-error`).classList.remove('formulario-texto-error-active');
    }
    console.log(campos.idciudad);
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

select.addEventListener('change', validarFormulario);
select.addEventListener('blur', validarFormulario);
