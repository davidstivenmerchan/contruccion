import { getHTML } from "./admin.js";
import { ajax } from "./ajax.js";


const editTipPeriferico = ( id ) => {
    const tabla = 'tip_periferico';

    ajax({
        url: `./acciones.php?id=${id}&tabla=${tabla}`,
        method: 'GET',
        cbSuccess: ( {data} ) => {
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML = `
            <form class="formmodal formmodaltipos" id="tip_periferico" >
            <div class="cerrarmodal">X</div>
            <input type="hidden" name="idtipDispo" value="${data[0].id}">
            <label for="marca"> ID </label>
            <input type="text" name="iddisable" id="marca" placeholder="${data[0].id}" disabled>
        
            <label for="namemarca"> tipo de dispositivo</label>
            <input type="text" name="nameTipPeriferico" id="namemarca" class="marcass" id="marcass" value="${data[0].nameTipo}">
            <input type="submit" value="actualizar"/>
            </form>
            `;


            document.addEventListener('submit' , e =>{
                if(e.target.matches("#tip_periferico")){

                    document.querySelector('.formmodal').classList.add('desplazar');
                    setTimeout(() => document.querySelector('.alert').classList.remove('ver'), 1000)
                    ajax({
                        url: './acciones.php',
                        method: 'PUT',
                        cbSuccess: ( data) => {
                            setTimeout(()=> {
                                Swal.fire({
                                    title: 'Exito',
                                    text: data.statusText,
                                    icon: 'success',
                                    confirmButtonText: 'aceptar'
                                });
                            }, 1300);
                            
                            const $main = document.querySelector('main');
                            getHTML({
                                url: 'pag_admin/equipos.php',
                                success: (html) => $main.innerHTML = html,
                                error: (error) => $main.innerHTML = `<h1> ${error} </h1>`

                            })
                        }, 
                        data: {
                            tabla,
                            id: parseInt(e.target.idtipDispo.value),
                            nomTipPeriferico: e.target.nameTipPeriferico.value,
                        }
                    })
                }
            });
        }
    });
}

export default editTipPeriferico;