function confirmarEliminar() {

    var res = confirm("¿Está seguro que desea elimar esta tarea?");

    if (res == true) {
        return true;
    } else {
        return false;
    }

}