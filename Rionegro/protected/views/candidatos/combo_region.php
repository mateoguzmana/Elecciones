<?php

foreach ($consulta as $fila_consulta) {
  echo  "<option value='" . $fila_consulta['IdRegion'] . "'>" . $fila_consulta['Nombre'] . "</option>";
}
echo "~".$fila_consulta['Nombre'];
?>