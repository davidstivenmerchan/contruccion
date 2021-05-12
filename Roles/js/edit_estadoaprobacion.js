
export const editEstadoAprobacion = ( id ) =>{
    const tabla = 'estado_aprobacion';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal"id="estado_aprobacion" >
        <input type="hidden" name="id" value="${data[0].id}">
        <label for="esta_aprobacion"> ID </label>
        <input type="text" name="iddisable" id="esta_aprobacion" placeholder="${data[0].id}" disabled>
    
        <label for="nameesta_aprobacion"> tipo de aprobacionsitivo</label>
        <input type="text" name="nameesta_aprobacion" id="nameesta_aprobacion" class="estado_aprobacions" id="estado_aprobacions" value="${data[0].nameTipo}">
        <input type="submit" value="actualizar"/>
        </form>
        `;
        console.log(data);
    })
    .catch( err => console.error(err) );

}