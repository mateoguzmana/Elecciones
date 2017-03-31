/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var votesArray = new Array();
var candidatesArray = new Array();
var selectedZone;

$(document).ready(function () {

    // When user is logged for vote, called this function for verified number votes availables
    verifyVotes();

    $("#selectVotingArea").click(function () {
        //VALIDAR QUE SELECCIONE POR LO MENOS UN RADIO BUTTON
        if (!$("input:radio[name='zona']:checked").val())
        {
            $('#_alert .text-modal-body').html('No se ha seleccionado ninguna zona de votación.');
            $('#_alert').modal('show');
            return false;
        }
        else
        {
            var mensaje = '¿Está seguro que ' + $("input:radio[name='zona']:checked").parent().find("span").html() +
                          ' corresponde a su zona de votación?';
            $('#_alertVerification .modal-content').css('width', '750px');
            $('#_alertVerification .modal-content').css('margin-left', '-180px');
            $('#_alertVerification .modal-content').css('margin-top', '150px');
            $('#_alertVerification .modal-footer').css('margin-top', '0');
            $('#_alertVerification .modal-footer').css('padding', '4px 17px');
            $('#_alertVerification .modal-footer button:first').click(confirmZone);
            $('#_alertVerification .text-modal-body').html(mensaje);
            $('#_alertVerification').modal('show');
        }
    });

    $("#vote").click(function () {
        //VALIDAR QUE SELECCIONE POR LO MENOS UN RADIO BUTTON
        if (!$("input:radio[name='candidato']:checked").val())
        {
            $('#_alert .text-modal-body').html('No se ha seleccionado ningún candidato.');
            $('#_alert').modal('show');
            return false;
        }
        else
        {
            var mensaje = '¿Está seguro de registrar su voto por el candidato ' +
                          $("input:radio[name='candidato']:checked").parent().find("span").html() + '?';
            $('#_alertVerification .modal-content').css('width', '750px');
            $('#_alertVerification .modal-content').css('margin-left', '-180px');
            $('#_alertVerification .modal-content').css('margin-top', '150px');
            $('#_alertVerification .modal-footer').css('margin-top', '0');
            $('#_alertVerification .modal-footer').css('padding', '4px 17px');
            $('#_alertVerification .modal-footer button:first').click(confirmVote);
            $('#_alertVerification .text-modal-body').html(mensaje);
            $('#_alertVerification').modal('show');
        }
    });
});

function confirmZone() {
    $('#selectedZone').attr("action", "index.php?r=votacion/elejirCandidato");
    $("#zone").val($("input:radio[name='zona']:checked").val());
    $("#selectedZone").submit();
}

function confirmVote() {
    $('#candidateToVote').attr("action", "index.php?r=votacion/registrarVoto");
    $("#candidate").val($("input:radio[name='candidato']:checked").val());
    $("#candidateToVote").submit();
}

$("#document").keypress(function() {
    $(".dysplay_error").hide();
});

$("#search").click(function (){
    var document = $("#document").val();
    if (document === "") {
        $(".dysplay_error").show();
    } else {
        $.ajax({
            data: {
                'document': document
            },
            url: 'index.php?r=Votacion/AjaxUserInformation',
            type: 'POST',
            beforeSend: function() {
                $("#document").val("");
            },
            success: function(response) {
                $("#information").html(response);
            }
        });
    }
});

$("#checkAll").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
});

function generarGraficos() {
    var numberOfChecked = $('td > input:checkbox:checked').length;
    if (numberOfChecked === 0) {
        $('#_alert .text-modal-body').html('Seleccione por lo menos una zona para generar las estadísticas.');
        $('#_alert').modal('show');
    } else {
        var contador = 0;
        var zonas = new Array();
        $('td > input:checkbox:checked').each(function () {
            zonas[contador] = $(this).val();
            contador++;
        });
        $.ajax({
            data: {
                'zonas': zonas
            },
            url: 'index.php?r=FuerzaVentas/AjaxGenerateStatistical',
            type: 'POST',
            beforeSend: function () {
                $("#reportes").html('<center><img src="images/loader.gif" /> Cargando</center>');
            },
            success: function (response) {
                $("#reportes").html(response);
            }
        });
    }
}

$("#btnBack").click(function (){
    window.location.href = 'index.php?r=votacion/reportegeneral';
});

function sendFisicVotes(idRegion) {
    //VALIDAR QUE SELECCIONE NO EXISTAN INPUTS VACIOS
    var count = 0;
    selectedZone = idRegion;
    $("input[name=cantidad_" + idRegion + "]").each(function(event) {
        var cantidad = $(this).val();
        if (cantidad !== "")
        {
            votesArray[count] = $(this).val();
            candidatesArray[count] = this.id;
        }
        else
        {
            $('#_alert .text-modal-body').html('Existen candidatos con una cantidad de votos vacío, por favor verifique.');
            $('#_alert').modal('show');
            event.stopPropagation();
        }
        count++;
    });
    var mensaje = '¿Está seguro de registrar los votos?';
    $('#_alertVerification .modal-content').css('width', '750px');
    $('#_alertVerification .modal-content').css('margin-left', '-180px');
    $('#_alertVerification .modal-content').css('margin-top', '150px');
    $('#_alertVerification .modal-footer').css('margin-top', '0');
    $('#_alertVerification .modal-footer').css('padding', '4px 17px');
    $('#_alertVerification .modal-footer button:first').click(confirmFisicVote);
    $('#_alertVerification .text-modal-body').html(mensaje);
    $('#_alertVerification').modal('show');
}

function confirmFisicVote()
{
    $('#registerFisicVotes').attr("action", "index.php?r=votacion/registrarvotoFisico");
    $("#candidates").val(candidatesArray);
    $("#quantities").val(votesArray);
    $("#zone").val(selectedZone);
    $("#registerFisicVotes").submit();
}

// This function is for verified vote's number, because when user is logged it's verfied if has available votes.
function verifyVotes(){
    $.ajax({
        url: 'index.php?r=votacion/AjaxVerifyNumVotes',
        type: 'POST',
        success: function (response) {
            $("#_alertNumVotes .text-modal-body").html("Señor usuario, recuerde que cuenta con "+response+" votos disponibles.");
            $('#_alertNumVotes').modal('show');
        }
    });

}
