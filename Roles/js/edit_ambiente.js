import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";

export const editAmbiente = ( id ) =>{
    const tabla = 'ambiente';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then(({ data }) => {
         console.log(data)
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        
        <form class="formmodal formmodaldispo"id="ambiente" >
        <div class="cerrarmodal dispocerrar">X</div>
        <input type="hidden" name="id_ambiente" value="${data[0].id}">
        <label for="id_ambiente"> Id ambiente </label>
        <input type="text" name="idserial" id="id_ambiente" disabled value="${data[0].id}">


        <label for="nom_ambiente"> Nombre Ambiente  </label>
        <input type="text" name="nom_ambiente" id="nom_ambiente" class="nom_ambiente" value="${data[0].nameAmbiente}">

        <label for="select_nave"> Ambiente  </label>
        <select name="select_nave" id="select_nave" >
            <option value="${data[0].id_nave}"> ${data[0].nave} </option>
            ${ajax({
                url: "./acciones.php?tabla=nave",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_nave');
                    console.log(datos)
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].id_nave)
                          ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                          : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select>

        


        <input type="submit" value="actualizar"/>
        </form>
        `;
        const $formModal = document.querySelector('.formmodal');
        $formModal.classList.remove('desplazar');
        console.log(data)
    })
    .catch( err => console.error(err) );

    document.addEventListener('submit' , (e) => {
        document.querySelector('.formmodal').classList.add('desplazar');
        setTimeout( ()=> document.querySelector('.alert').classList.remove('ver'), 1000 );
        e.preventDefault();
        if(e.target.matches('#ambiente')){
            ajax({
                url: './acciones.php',
                method: 'PUT',
                cbSuccess: async ( data ) => {
                    await setTimeout( () => {
                        Swal.fire({
                            title: 'Cambio Exitoso',
                            text: data.statusText,
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });
                    }, 1200);

                    const $main = document.querySelector('main');

                    getHTML({
                        url: 'pag_admin/ambientes.php',
                        success: (html) => $main.innerHTML = html,
                        error: (error) => $main.innerHTML = `<h1>${error}</h1>`,
                    });
                },
                data: {
                    tabla: 'ambiente',
                    id_ambiente : e.target.id_ambiente.value,
                    nom_ambiente : e.target.nom_ambiente.value,
                    select_nave: parseInt(e.target.select_nave.value),
                }
            });
        }
    });
}