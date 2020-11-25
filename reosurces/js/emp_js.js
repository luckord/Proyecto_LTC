function eliminar (id ){
    let borrar = confirm("Seguro,desea eliminar el empleado");
    if(borrar){
        window.open('../Controlador/Emp/Emp_Eliminar.php?id='+id);
    }
}


