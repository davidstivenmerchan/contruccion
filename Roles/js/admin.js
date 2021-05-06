import { aparecer, desaparecer } from './toogle_admin.js';

const $main = document.querySelector("main");

const getHTML = ({ url , success , error }) => {

    const xhr = new XMLHttpRequest();
    xhr.addEventListener('readystatechange' , e => {
        if(xhr.readyState !== 4) return ;

        if(xhr.status >= 200 && xhr.status < 300){
            // peticion exitosa
            const html = xhr.responseText; // guardo el HTML 
            success(html);
        }else{
            // hubo un error
            let message = xhr.statusText || "ocurrio un error";
            error(`Error ${xhr.status} -- ${message}`);
        }
    });
    xhr.open("GET" , url);
    xhr.send();
} 

document.addEventListener('DOMContentLoaded' , e => {
    getHTML({
        url: 'pag_admin/principal.html',
        success: (html) => $main.innerHTML = html,
        error: (error) => $main.innerHTML = `<h1> ${error} </h1>`
    });
});

const $elemento = document.querySelectorAll('.navigation ul li a');
console.log($elemento);
$elemento.forEach( el =>{
    el.addEventListener('click' , (e) => {
        if(el.classList.contains('salir')) return;
        e.preventDefault();
        // console.log(el.href);
        if(el.classList.contains('primero')) return ;

        getHTML({
            url: el.href,
            success: (html) => $main.innerHTML = html,
            error: (error) => $main.innerHTML = `<h1> ${error} </h1>`
        });
    });
}); 



/** a */
document.addEventListener('click' , e => {

    const formularios = [ 'form' , 'form1' , 'form2'];

    if(e.target.matches('.aparecer')){
        const [ , primera ] = e.target.classList;
        const elemento = document.querySelector(`.${primera}`).getAttribute('data-form');
        const nuevoArray = formularios.filter( (formulario )=> formulario !== elemento )
        desaparecer( nuevoArray )
        aparecer( elemento );
    }
    if(e.target.matches('.cerrar')){
        const [ , primera ] = e.target.classList;
        const elemento = document.querySelector(`.${primera}`).getAttribute('data-form');
        desaparecer( [ elemento ] );
    }
});