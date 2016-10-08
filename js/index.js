var click = "no";
$(function () {
    $('#registrar').on('click',registrar);
    cargarDepartamentos();
});

function registrar() {
    if (click == "si") {

    }else if (click == "no") {
        var Nombre = document.getElementById('nombre').value;
        var Apellido = document.getElementById('apellido').value;
        var Cedula = document.getElementById('cedula').value;
        var Celular = document.getElementById('celular').value;
        var Fecha = document.getElementById('fechaNacimiento').value;
        var Especialidad = document.getElementById('especialidad').value;
        var LugarTrabajo = document.getElementById('lugarTrabajo').value;
        var Direccion = document.getElementById('direccion').value;
        var Departamento = document.getElementById('departamento').value;
        var Ciudad = document.getElementById('ciudad').value;
        var Correo = document.getElementById('correo').value;
        if (Nombre === "" || Nombre === null || Apellido === "" || Apellido === null || Celular === "" || Celular === null || Fecha === "" || Fecha === null || Especialidad === "" || Especialidad === null || LugarTrabajo === "" || LugarTrabajo === null || Direccion === "" || Direccion === null || Correo === "" || Correo === null|| Departamento === "0" || Ciudad === "" || Ciudad === null) {
            $('#mensaje').html("Llenar todos los datos!");
            $('#modal').openModal();
            click = "no";
            return false;
        }else {
            $.ajax({
                type: 'POST',
                url: 'registrar.php',
                data:('nombre='+Nombre+'&apellido='+Apellido+'&cedula='+Cedula+'&celular='+Celular+'&fechaNacimiento='+Fecha+'&especialidad='+Especialidad+'&lugarTrabajo='+LugarTrabajo+'&direccion='+Direccion+'&departamento='+Departamento+'&ciudad='+Ciudad+'&correo='+Correo)
            }).done(function(respuesta){
                document.getElementById('nombre').value = "";
                document.getElementById('apellido').value = "";
                document.getElementById('cedula').value = "";
                document.getElementById('celular').value = "";
                document.getElementById('fechaNacimiento').value = "";
                document.getElementById('especialidad').value = "";
                document.getElementById('lugarTrabajo').value = "";
                document.getElementById('departamento').value = "";
                document.getElementById('ciudad').value = "";
                document.getElementById('direccion').value = "";
                document.getElementById('correo').value = "";
                $('#mensaje').html("Datos registrados correctamente");
                $('#modal').openModal();
                click = "no";
                }
            );
        }
    }
}

function cargarDepartamentos() {
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 100
    });
    $("#departamento").load("departamentos.txt");
}

function cargarCiudad(id) {
    if (id == "0") {
        $("#ciudad").html('');
    }else {
        $("#ciudad").load(id+".txt");
    }
}

function ValNumero(Control){
    Control.value=Solo_Numerico(Control.value);
}

function Solo_Numerico(variable){
    Numer=parseInt(variable);
    var keycode = window.event.keyCode;
    if (isNaN(Numer)){
        return "";
    }
    return Numer;
}

function lettersOnly(input) {
    var regex = /[^a-zA-Z. ]/gi;
    input.value = input.value.replace(regex, "");
}

function valCaracEsp(e){
    var keycode;
    if (window.event) {
        keycode = window.event.keyCode;
    }else if (event) {
        keycode = event.keyCode;
    }else if (e) {
        keycode = e.which;
    }else {
        return true;
    }
    if((keycode == 32) || (keycode >= 48 && keycode <= 57) || (keycode >= 65 && keycode <= 90) || (keycode >= 97 && keycode <= 110) || (keycode >= 110 && keycode <= 122) || (keycode == 190) ){
        return true;
    }else{
        return false;
    }
    return true;
}
