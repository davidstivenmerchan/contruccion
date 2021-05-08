export const scroollBoton = (boton) => {
    const $boton = document.querySelector(boton);

    window.addEventListener('scroll' , e => {
        // hay dos propiedades para determinar cuanto la barra se alejado de la parte superios
        // window.pageYOffset y document.documentElement.scrollTOp

        let scroollTop = window.pageYOffset || document.documentElement.scrollTop;

        ( scroollTop > 250 )
           ? $boton.classList.remove('hidden')
           : $boton.classList.add('hidden');
    });

    document.addEventListener('click' , (e) => {
        if(e.target.matches(boton)){
            window.scrollTo({
                behavior: 'smooth',
                top: 0
            });
        }
    });
}