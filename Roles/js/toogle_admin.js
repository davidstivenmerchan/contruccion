
export const aparecer = ( element ) => { // creo la funcion y la exporto
        debugger;
        (element === 'form') //examino si el elemnto que llega corresponde con el elemento que tiene la clase form
          ? document.querySelector(`.${element}`).classList.remove('invisible') // si es asi le quito una clase que lo mantiene oculto
          : document.querySelector(`.${element}`).classList.add('visible'); // si no corresponde con esa clase le agrego una clase visible
}

export const desaparecer = ( elementos ) => {
    elementos.forEach ( form => {
      debugger;
        ( form === 'form' )
          ? document.querySelector(`.${form}`).classList.add('invisible')
          : document.querySelector(`.${form}`).classList.remove('visible');
    });
    
}