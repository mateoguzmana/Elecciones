/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('.salirElecciones').click(function () {
    $('#_alertSalirUsuarios .text-modal-body').html('Esta seguro que desea salir del modulo de Elecciones?');
    $('#_alertSalirUsuarios').modal('show');
});

$("#addElecciones").click(function() {
    window.location.href = 'index.php?r=Elecciones/Create';
});

$("#viewElecciones").click(function() {
    window.location.href = 'index.php?r=Elecciones/Index';
});
