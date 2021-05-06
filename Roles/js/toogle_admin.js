
export const aparecer = ( element ) => {
        document.querySelector(`.${element}`).classList.add('visible');
}

export const desaparecer = ( elementos ) => {
    elementos.forEach ( form => document.querySelector(`.${form}`).classList.remove('visible'));
}