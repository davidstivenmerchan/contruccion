import { ajax } from './ajax.js';


const buscadorUser = ( tipUser , value, $tableClass ) => {
    ajax({
        url: `buscador.php?query=${tipUser}&id=${value}`,
        method: 'GET', 
        cbSuccess : ( { data } ) => {
            const $table = document.querySelector(`.${$tableClass}`); 
            let html = "";
            data.forEach( el => {
                html += `
                    <tr class="datos">
                        <td> ${el.documento} </td>
                        <td> ${el.nomTipDocu} </td>
                        <td> ${el.codCarnet} </td>
                        <td> ${el.nombres} </td>
                        <td> ${el.apellidos} </td>
                        <td> ${el.fechaNacimiento} </td>
                        <td> ${el.nomGenero} </td>
                        <td> ${el.correoSena} </td>
                        <td> ${el.telefono} </td>
                        <td class="imgs">
                            <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit usuario"  data-usuario="${el.documento}">
                            <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove usuario"  data-usuario="${el.documento}">               
                        </td>
                    </tr>
                `;
            });

            $table.innerHTML = `
            <tr class="titulo">
                <td>Documento</td>
                <td>Tipo Documento</td>
                <td>Cod Carnet</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Fecha Nacimiento</td>
                <td>Genero</td>
                <td>Correo SENA</td>
                <td>Telefono</td>
                <td class="acciones">Acciones</td>
            </tr>
            <tbody>
                ${
                    ( html !== '' )
                        ? html
                        : '<tr class="undefined"><td>No se encontratron usuarios </td><tr>'
                    
                }
            </tbody>
            `;
        }   
    });
}

export default buscadorUser;