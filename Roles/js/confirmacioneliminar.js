function confirmacion(e){
    if(confirm("¿Estas seguro que desea eliminar este registro?")){
        return true;
    }else{
        e.prevenDefault();
    }
}
let linkDelete = document.querySelectorAll(".clickborrar");
for (var i=0; i<linkDelete.length;i++){
    linkDelete[i].addEventListener('click',confirmacion);
}