
export const editEstadodisponibilidad = ( id ) =>{
    const tabla = 'estado_disponibilidad';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal"id="estado_disponibilidad" >
        <div class="cerrarmodal">X</div>
        <input type="hidden" name="id" value="${data[0].id}">
        <label for="esta_disponibilidad"> ID </label>
        <input type="text" name="iddisable" id="esta_disponibilidad" placeholder="${data[0].id}" disabled>
    
        <label for="nameesta_disponibilidad"> tipo de disponibilidadsitivo</label>
        <input type="text" name="nameesta_disponibilidad" id="nameesta_disponibilidad" class="estado_disponibilidads" id="estado_disponibilidads" value="${data[0].nameTipo}">
        <input type="submit" value="actualizar"/>
        </form>
        `;
        const $formModal = document.querySelector('.formmodal');
        $formModal.classList.remove('desplazar');
    })
    .catch( err => console.error(err) );

}