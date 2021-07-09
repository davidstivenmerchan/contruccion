import { ajax } from "./ajax.js";


const editPeriferico = ( id ) => {
    const tabla = 'periferico';
    ajax({
        url: `acciones.php?tabla=${tabla}&id=${id}`,
        method: 'GET',
        cbSuccess: ( { data } ) => {
            console.log(data)
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML = `
                <form class="formmodal formmodaltipos" id="editPeriferico">  
                    <div class="cerrarmodal">X</div> 
                    <input type="hidden" name="idestadoaprobacion" value="${data[0].id}">
                    <label for="esta_aprobacion"> ID </label>
                    <input type="text" name="iddisable" id="esta_aprobacion" placeholder="${data[0].id}" disabled>
                
                    <label for="">Tipo de periferico</label>
                    <select name="select_tip_periferico" id="select_tip_periferico">
                        <option value="${data[0].idTipoPeriferico}">${data[0].nomPeriferico}</option>
                        ${ajax({
                            url: 'acciones.php?tabla=tip_periferico',
                            method: 'GET',
                            cbSuccess: ( { data:datos } ) => {
                                const $select = document.getElementById('select_tip_periferico');
                                let html;
                                datos.forEach( el => {
                                    ( el.id !== data[0].idTipoPeriferico )
                                        ? html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                                        : null;
                                });
                                $select.innerHTML += html;
                            }
                        })}
                    </select>
                    <select name="select_marca" id="">

                    </select>

                    <label for="nameesta_aprobacion"> tipo de aprobacionsitivo</label>
                    <input type="text" name="nameesta_aprobacion" id="nameesta_aprobacion" class="estado_aprobacions" id="estado_aprobacions" value="${data[0].nameTipo}">
                    <input type="submit" value="actualizar"/>   
                </form>
            `;
        }
    });
}

export default editPeriferico;