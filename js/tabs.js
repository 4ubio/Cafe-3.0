let pagina = 1;

document.addEventListener('DOMContentLoaded', function() {
    mostrarSeccion();
    cambiarSeccion();
});

function mostrarSeccion() {
    const seccionAnterior = document.querySelector('.show_section');
    if( seccionAnterior ) {
        seccionAnterior.classList.remove('show_section');
    }

    const seccionActual = document.querySelector(`#paso-${pagina}`);
    seccionActual.classList.add('show_section');

    const tabAnterior = document.querySelector('.tabs .actual');
    if(tabAnterior) {
        tabAnterior.classList.remove('actual');
    }

    const tab = document.querySelector(`[data-paso="${pagina}"]`);
    tab.classList.add('actual');
}

function cambiarSeccion() {
    const enlaces = document.querySelectorAll('.tabs button');

    enlaces.forEach( enlace => {
        enlace.addEventListener('click', e => {
            e.preventDefault();
            pagina = parseInt(e.target.dataset.paso);

            mostrarSeccion();
        })
    })
}