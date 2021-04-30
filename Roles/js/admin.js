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
        url: 'pag_admin/home.php',
        success: (html) => $main.innerHTML = html,
        error: (error) => $main.innerHTML = `<h1> ${error} </h1>`
    });
});

const $elemento = document.querySelectorAll('.navigation ul li a');
console.log($elemento);
$elemento.forEach( el =>{
    el.addEventListener('click' , (e) => {
        e.preventDefault();
        // console.log(el.href);
        getHTML({
            url: el.href,
            success: (html) => $main.innerHTML = html,
            error: (error) => $main.innerHTML = `<h1> ${error} </h1>`
        });
    });
});