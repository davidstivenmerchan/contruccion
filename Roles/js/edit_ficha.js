import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";

export const editFicha = ( id ) =>{
    const tabla = 'fichas';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then(({ data }) => {
         console.log(data)
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        
        <form class="formmodal formmodaltipos"id="fichasEdit" >
        <div class="cerrarmodal dispocerrar">X</div>
        <input type="hidden" name="numero_ficha" value="${data[0].ficha}">
        <label for="numero_ficha"> numero ficha </label>
        <input type="text" name="ficha" id="" disabled value="${data[0].ficha}">

        <label for="select_jornada"> Jornada </label>
        <select name="select_jornada" id="select_jornada" >
            <option value="${data[0].id_jornada}"> ${data[0].nom_jornada} </option>
            ${ajax({
                url: "./acciones.php?tabla=jornada",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_jornada');
                    console.log(datos)
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].id_jornada)
                          ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                          : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select>

        <label for="select_ambiente"> Ambiente  </label>
        <select name="select_ambiente" id="select_ambiente" >
            <option value="${data[0].id_ambiente}"> ${data[0].n_ambiente} </option>
            ${ajax({
                url: "./acciones.php?tabla=ambiente",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_ambiente');
                    console.log(datos)
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].id_ambiente)
                          ? $html += `<option value="${el.id}"> ${el.nameAmbiente} </option>`
                          : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select>

        <label for="select_formacion"> Formacion  </label>
        <select name="select_formacion" id="select_formacion" >
            <option value="${data[0].id_formacion}"> ${data[0].nom_formacion} </option>
            ${ajax({
                url: "./acciones.php?tabla=formacion",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_formacion');
                    console.log(datos)
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].id_formacion)
                          ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                          : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select>

        <label for="select_instructor"> Instructor  </label>
        <select name="select_instructor" id="select_instructor" >
            <option value="${data[0].documento}"> ${data[0].nombres} </option>
            ${ajax({
                url: "./acciones.php?tabla=instructores",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_instructor');
                    console.log(datos)
                    let $html ;
                    datos.forEach( el => {
                        ( el.documento !== data[0].documento)
                          ? $html += `<option value="${el.documento}"> ${el.nombres} </option>`
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
        if(e.target.matches('#fichasEdit')){
        
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
                    tabla: 'fichas',
                    numero_ficha : parseInt(e.target.numero_ficha.value),
                    select_jornada : parseInt(e.target.select_jornada.value),
                    select_ambiente : parseInt(e.target.select_ambiente.value),
                    select_formacion: parseInt(e.target.select_formacion.value),
                    select_instructor: parseInt(e.target.select_instructor.value),
                }
                
            });
        }       
    });
}