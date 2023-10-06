const btnIzquierda = document.querySelector(".bton-izquierda"), 
      btnDerecha = document.querySelector(".bton-derecha"),
      slider = document.querySelector("#slider"),
      sliderSeccion = document.querySelectorAll(".slider-seccion");

console.log(sliderSeccion)

btnIzquierda.addEventListener("click", e => moverIzquierda());
btnDerecha.addEventListener("click", e => moverDerecha());

setInterval(() => {
    moverDerecha();
}, 4000);

let operacion = 0,
    contador = 0,
    anchoImagen = 100 / sliderSeccion.length;

function moverDerecha() {
    if (contador >= sliderSeccion.length-1) {
        contador = 0;
        operacion = 0
        slider.style.transform = `translate(-${operacion}%)`;
        return;
    }
    contador++;

    operacion = operacion + anchoImagen;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "all ease .6s"
    
}

function moverIzquierda() {
    contador--;
    if (contador < 0) {
        contador = sliderSeccion.length-1;
        operacion = anchoImagen * (sliderSeccion.length-1 );
        slider.style.transform = `translate(-${operacion}%)`;
        return;
    }
    operacion = operacion - anchoImagen;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "all ease .6s";

}