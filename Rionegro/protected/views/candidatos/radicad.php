<?php
foreach ($consulta as $fila_consulta) {
  echo  $fila_consulta['maximo'];
  echo  '~'.$fila_consulta['texto1'];
  echo  '~'.$fila_consulta['texto2'];
  echo  '~'.$fila_consulta['texto3'].'~';
}
?>