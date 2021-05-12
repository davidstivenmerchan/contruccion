
export const editEstadoDispositivo = ( id ) =>{
    const tabla = 'estado_dispositivo';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal"id="estado_dispo" >
        <input type="hidden" name="id" value="${data[0].id}">
        <label for="esta_dispo"> ID </label>
        <input type="text" name="iddisable" id="esta_dispo" placeholder="${data[0].id}" disabled>
    
        <label for="nameesta_dispo"> tipo de dispositivo</label>
        <input type="text" name="nameesta_dispo" id="nameesta_dispo" class="estado_dispos" id="estado_dispos" value="${data[0].nameTipo}">
        <input type="submit" value="actualizar"/>
        </form>
        `;
        console.log(data);
    })
    .catch( err => console.error(err) );

}