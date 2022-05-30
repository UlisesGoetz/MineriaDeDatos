<?php

$nombre=$_POST['nombre'];

echo "<Form action='./prueba.php' method='post' >";
for ($i = 1; $i <= $nombre; $i++) {
  echo "<input type='number' placeholder='valor y $i ' name='valory$i' step='any'> <br></br>";
 
}

echo "<Form action='./prueba.php' method='post' >";
echo "-------------------------------------------------------------------------------<br></br>";
for ($i = 1; $i <= $nombre; $i++) {
  echo "<input type='number' placeholder='valor x1 $i  ' name='valorx1$i' step='any'> <br></br>";
 
}
echo "-------------------------------------------------------------------------------<br></br>";

echo "<Form action='./prueba.php' method='post' >";
for ($i = 1; $i <= $nombre; $i++) {
  echo "<input type='number' placeholder='valor x2 $i  ' name='valorx2$i' step='any'> <br></br>";
 
}
echo "<p>Caja de texto: <input type='hidden' name='texto' value='$nombre'> <input type='submit' value='Enviar este formulario' />"
?>
