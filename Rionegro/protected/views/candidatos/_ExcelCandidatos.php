<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=Candidatos.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1"  cellspacing="0">
    <thead>
        <tr>
            <th>
                <?php echo utf8_decode("Nro Candidato"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Nombres"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Documento"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Dirección"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Teléfono"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Email"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Nro Radicado"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Fecha Inscripción"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Celular"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Elección"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Región"); ?>
            </th>
            <th>
                <?php echo utf8_decode("Barrio o Municipio"); ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($TotalCandidatos as $ItemCandidato): ?>
        <tr>
            <td>
                <?php echo utf8_decode($ItemCandidato['IdCandidato']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Nombres']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Documento']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Direccion']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Telefono']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Email']); ?>
            </td>
            <td>
                <pre> <?php echo utf8_decode($ItemCandidato['NroRadicado']); ?> </pre>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['FechaInscripcion']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Celular']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Eleccion']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Region']); ?>
            </td>
            <td>
                <?php echo utf8_decode($ItemCandidato['Barrio']); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>