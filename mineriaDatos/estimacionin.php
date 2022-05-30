<?php
$valores=$_POST['valores'];
$promediox=$_POST['promediox'];
$Y=$_POST['Y'];
$X=$Y=$_POST['X'];
$pendiente=$_POST['pendiente'];
echo"Estimacion: <br></br>";

//print_r($_POST);
echo $valores."<br></br>";
$vloprom=$valores-$promediox;
echo $vloprom."<br></br>";
$vloprom2=$vloprom**2;
echo $vloprom2."<br></br>";
$grafica=$X+($pendiente*$vloprom)+($_POST['Y']*$vloprom2);
echo $grafica;echo "<br></br>";
echo "Para graficar es: (".$valores.",".$grafica.")";echo "<br></br>";
echo"Para hacer otra estimacion picar el boton de regresar y cargar los datos";


?>