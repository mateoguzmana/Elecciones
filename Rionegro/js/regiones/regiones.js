/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('.salirRegiones').click(function () {
    $('#_alertSalirUsuarios .text-modal-body').html('Esta seguro que desea salir del modulo de Regiones?');
    $('#_alertSalirUsuarios').modal('show');
});
