// import ajax from "./ajax";

export const editMarca = ( id ) =>{
    const tabla = 'marca';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal"id="marcas" >
        <div class="cerrarmodal">X</div>
        <input type="hidden" name="id" value="${data[0].id}">
        <label for="marca"> ID </label>
        <input type="text" name="iddisable" id="marca" placeholder="${data[0].id}" disabled>
    
        <label for="namemarca"> tipo de dispositivo</label>
        <input type="text" name="namemarca" id="namemarca" class="marcass" id="marcass" value="${data[0].nameTipo}">
        <input type="submit" value="actualizar"/>
        </form>
        `;
        const $formModal = document.querySelector('.formmodal');
        $formModal.classList.remove('desplazar');

    })
    .catch( err => console.error(err) );

    document.addEventListener('submit' , (e) => {
        e.preventDefault();
        
        if(e.target.matches('#marcas')){
            console.log('me estoy enviando ñero que emocion tan hpta');
            ajax({
                url: './acciones.php',
                method: 'PUT',
                cbSuccess: ( data =>{

                }),
                // data
            });
        }
    });


}