

export const editTipoDispo = ( id ) =>{
    const tabla = 'tipo_dispositivo';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal"id="tipodispositivo" >
        <input type="hidden" name="id" value="${data[0].id}">
        <label for="tipodispo"> ID </label>
        <input type="text" name="iddisable" id="tipodispo" placeholder="${data[0].id}" disabled>
    
        <label for="nametip_dispo"> tipo de dispositivo</label>
        <input type="text" name="nametip_dispo" id="nametip_dispo" class="tipo_dispo" id="tipo_dispo" value="${data[0].nameTipo}">
        <input type="submit" value="actualizar"/>
        </form>
        `;
        console.log(data);
    })
    .catch( err => console.error(err) );

}