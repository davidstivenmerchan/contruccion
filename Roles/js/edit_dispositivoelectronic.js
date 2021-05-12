export const editdispoelectronico = ( id ) =>{
    const tabla = 'dispositivo_electronico';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal"id="dispositivo_electro" >
        <div class="cerrarmodal">X</div>
        <input type="hidden" name="id" value="${data[0].serial}">
        <label for="dispositivo_electronico"> Serial </label>
        <input type="text" name="iddisable" id="dispositivo_electronico" placeholder="${data[0].serial}" disabled>
    
        <label for="namedispositivo_electronico"> Placa Sena </label>
        <input type="text" name="namedispositivo_electronico" id="namedispositivo_electronico" class="dispositivo_electros" id="dispositivo_electros" value="${data[0].placa_sena}">

        <label for="namedispositivo_electronico"> Tipo Dispositivo </label>
        <input type="text" name="namedispositivo_electronico" id="namedispositivo_electronico" class="dispositivo_electros" id="dispositivo_electros" value="${data[0].nom_tipo_dispositivo}">

        <label for="namedispositivo_electronico"> Nombre Dispositivo  </label>
        <input type="text" name="namedispositivo_electronico" id="namedispositivo_electronico" class="dispositivo_electros" id="dispositivo_electros" value="${data[0].nom_dispositivo}">

        <label for="namedispositivo_electronico"> Estado Disponibilidad  </label>
        <input type="text" name="namedispositivo_electronico" id="namedispositivo_electronico" class="dispositivo_electros" id="dispositivo_electros" value="${data[0].nom_estado_disponibilidad}">

        <label for="namedispositivo_electronico"> Estado Dispositivo  </label>
        <input type="text" name="namedispositivo_electronico" id="namedispositivo_electronico" class="dispositivo_electros" id="dispositivo_electros" value="${data[0].nom_estado_dispositivo}">

        <label for="namedispositivo_electronico"> Marca  </label>
        <input type="text" name="namedispositivo_electronico" id="namedispositivo_electronico" class="dispositivo_electros" id="dispositivo_electros" value="${data[0].nom_marca}">

        <input type="submit" value="actualizar"/>
        </form>
        `;
        const $formModal = document.querySelector('.formmodal');
        $formModal.classList.remove('desplazar');
        console.log(data)
    })
    .catch( err => console.error(err) );
}