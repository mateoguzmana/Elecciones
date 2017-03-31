<?php

//VALIDAR SI USUARIO EXISTE

if (count($userInformation) == 0):
    echo 'No se encontraron coincidencias de usuario.';
else:

//VALIDAR SI ESTADO DEL USUARIO
/*
 * 0: Sin Votar
 * 1: Voto Electronico
 * 2: Voto Fisico
 */

$status = $userInformation['Estado'];
if ($status == 0):
    $image = "<img src='" . Yii::app()->request->baseUrl . "/images/check.png' />";
elseif ($status == 1):
    $image = "<img src='" . Yii::app()->request->baseUrl . "/images/voted.png' />";
else:
    $image = "<img src='" . Yii::app()->request->baseUrl . "/images/invalid.png' />";
endif;

?>

<table class="tg">
    <tr>
        <th class="tg-58iv">C&eacute;dula</th>
        <th class="tg-58iv">Nombre</th>
        <th class="tg-58iv">Direcci&oacute;n</th>
        <th class="tg-58iv">Tel&eacute;fono</th>
        <th class="tg-58iv">Celular</th>
        <th class="tg-58iv">Habilitado en Sistema<br></th>
    </tr>
    <tr>
        <td class="tg-nnmv"><?php echo $userInformation['CedulaAsociado']; ?></td>
        <td class="tg-nnmv"><?php echo $userInformation['NombreIntegrado']; ?></td>
        <td class="tg-nnmv"><?php echo $userInformation['Direccion']; ?></td>
        <td class="tg-nnmv"><?php echo $userInformation['Telefono']; ?></td>
        <td class="tg-nnmv"><?php echo $userInformation['Celular']; ?></td>
        <td class="tg-nnmv"><?php echo $image; ?></td>
    </tr>
</table>

<input type="hidden" id="user" name="user" value="<?php echo $userInformation['CedulaAsociado']; ?>" />

<?php if ($status == 0): ?>
<div class="row" style="padding-top:1.2em;">
    <div style="text-align:center;">
        <button id="changeToFisic" class="btn btn-darkblue">Cambiar a votaci&oacute;n f&iacute;sica</button>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>

<script type="text/javascript">
    $("#changeToFisic").click(function () {
        var user = $("#user").val();
        $.ajax({
            data: {
                'user': user
            },
            url: 'index.php?r=Votacion/AjaxUnableUser',
            type: 'POST',
            beforeSend: function() {

            },
            success: function(response) {
                $("#information").html(response);
            }
        });
    });
</script>