/*
//Variables
const formulario = document.querySelector("#formualario");
const nombre = document.querySelector("#nombre");
const apellido = document.querySelector("#apellido");
const edad = document.querySelector("#edad");
const correo = document.querySelector("#email");
const btonEnviar = document.querySelector("#boton");
const listaDatos = document.querySelector("#datos");
let datos = [];

//Eventos

document.addEventListener("DOMContentLoaded", () => {
    recuperandoLocal();
    btonEnviar.addEventListener("click", guardaDatos)
})



//Funciones

function guardaDatos(e) {
    e.preventDefault();


    if (validadCampos()) {
        const datosFormulario = {
            nombre: nombre.value,
            apellido: apellido.value,
            edad: edad.value,
            correo: correo.value,
            id: Date.now()
        }

        //agrenado al arrays
        datos = [...datos, datosFormulario];

        //añadiendo al HTML
        datosHTML(datos);

        //Guardando informacion en LocalStorage
        guardaInformacion(datos);

        formulario.reset();
    }


}

function datosHTML(informacion){
    limpiandoHTML();
    informacion.forEach((datos)=>{
        const {nombre, apellido, edad, correo, id} = datos
        const ul = document.createElement("ul");
        ul.className = "datos";
        ul.innerHTML = `Nombre: ${nombre} - Apellido: ${apellido} - Edad:${edad} - Correo:${correo} <a href"#" id="${id}" class="info" >X</a>`;
        listaDatos.appendChild(ul);
        
    })
}

function guardaInformacion(array){
    const datosString = JSON.stringify(array);
    localStorage.setItem("informacion", datosString);
}

function mensaje(mensaje, tipo) {
    console.log(mensaje);
}

function limpiandoHTML(){
    while(listaDatos.firstChild){
        listaDatos.removeChild(listaDatos.firstChild);
    }
}

function recuperandoLocal(){
    const informacion = JSON.parse(localStorage.getItem("informacion"));
    datos = informacion;
    datosHTML(datos);
}

function validadCampos() {
    if (nombre.value != "" && apellido.value != "" && edad.value != "" && correo.value != "") {
        const er = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        if (!er.test(correo.value)) {
            mensaje("El correo es invalido");
            return;
        }
        return true;

    } else {
        mensaje("Los campòs son obligatorios");
        return;
    }
}
*/