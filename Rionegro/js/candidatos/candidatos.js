/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('.salirElecciones').click(function () {
    $('#_alertSalirUsuarios .text-modal-body').html('Esta seguro que desea salir del modulo de Candidatos?');
    $('#_alertSalirUsuarios').modal('show');
});

function eleccion() {
    elegido = $("#eleccion").val();
    if (elegido === '') {
        document.getElementById('veleccion').innerHTML = 'El Campo Elección No Puede Quedar Vacío.';
        return
    }
    else {
        document.getElementById('veleccion').innerHTML = '';

    }
    region = $("#barrio").val();

    if (region === '') {
        document.getElementById('vbarrio').innerHTML = 'El Campo Barrio No Puede Quedar Vacío.';
        return
    }
    else {
        document.getElementById('vbarrio').innerHTML = '';

    }
    nombres = $("#nombres").val();
    if (nombres === '') {
        document.getElementById('vnombres').innerHTML = 'El Campo Nombres No Puede Quedar Vacío.';
        return
    }
    else {
        document.getElementById('vnombres').innerHTML = '';

    }
    codigo_candidato = $("#codigo_candidato").val();

    nro_documento = $("#nro_documento").val();
    if (nro_documento === '') {
        document.getElementById('vnro_documento').innerHTML = 'El Campo Numero Documento No Puede Quedar Vacío.';
        return
    }
    else {
        document.getElementById('vnro_documento').innerHTML = '';

    }
    direccion = $("#direccion").val();
    if (direccion === '') {
        document.getElementById('vdireccion').innerHTML = 'El Campo Dirección No Puede Quedar Vacío.';
        return
    }
    else {
        document.getElementById('vdireccion').innerHTML = '';

    }
    telefono = $("#telefono").val();
    if (telefono === '') {
        document.getElementById('vtelefono').innerHTML = 'El Campo Teléfono No Puede Quedar Vacío.';
        return
    }
    else {
        document.getElementById('vtelefono').innerHTML = '';
    }
    celular = $("#celular").val();
    if (celular === '') {
        document.getElementById('vcelular').innerHTML = 'El Campo Celular No Puede Quedar Vacío.';
        return
    }
    else {
        document.getElementById('vcelular').innerHTML = '';
    }


    email = $("#email").val();
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (regex.test($('#email').val().trim())) {
            document.getElementById('vemail').innerHTML = '';
    }
    else {
        document.getElementById('vemail').innerHTML = 'La Dirección De Correo No Es Valida ';
        return
    }
    

    foto = $("#foto").val();
    if (foto === '') {
        document.getElementById('vfoto').innerHTML = 'El Campo Foto No Puede Quedar Vacio.';
        return
    }
    else {
        document.getElementById('vfoto').innerHTML = '';

    }


    $('#_alertConfirmation .text-modal-body').html('Está seguro de postular su candidatura?');
    $('#_alertConfirmation').modal('show');
}

function guardar_form_candidatos() {
    $('#_alertConfirmation').modal('hide');
    elegido = $("#eleccion").val();

    region = $("#region").val();
    nombres = $("#nombres").val();
    apellidos = $("#apellidos").val();

    nro_documento = $("#nro_documento").val();
    direccion = $("#direccion").val();
    telefono = $("#telefono").val();
    email = $("#email").val();
    foto = $("#foto").val();

    $.post("index.php?r=candidatos/AjaxRadicado", {elegido: elegido}, function (data) {

        var valoresdata = data.split("~");
        document.getElementById('radicado').value = elegido + '-' + valoresdata[0];
        document.getElementById('codigo_candidato').value = valoresdata[0];

    });
    
    codigo_candidato = $("#codigo_candidato").val();
    radicado = $("#radicado").val();

    /*  $('#_alertConfirmation').modal('hide');      
     $('#_alert .text-modal-body').html('El Codigo Del candidato Es: '+codigo_candidato+' Y El Radicado Es :'+radicado);
     $('#_alert').modal('show'); */
    $('#form_candidato').submit();
    $('.contentpanel').html('<center><img src="images/loader.gif" /> Cargando</center>');
}



function FilterInput(event) {
    var chCode = ('charCode' in event) ? event.charCode : event.keyCode;

    if (chCode == 8 || chCode == 0)
    {
        return chCode;
    } else {
        if (chCode > 47 & chCode < 58)
        {
            return chCode;
        } else {
            return false;
        }
    }
}

function showPicture(picture)
{
    $('#foto-modal').html('<img src="../Cooperen/Archivos/Fotos/' + picture + '" alt="Foto" height="300" width="300" />');
    $('#_alertaFoto').modal('show');
}

$("#showExcel").click(function() {
    window.location.href = 'index.php?r=candidatos/excelexport';
});