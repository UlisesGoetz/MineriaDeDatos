<?php
//-----base de datos
    $con = new mysqli('localhost','root','','mineriadatos');
    //$quy =('INSERT INTO usuarios values(null,"Carloass","Carlasos",15)');
    //$query = $con->query($quy); // Ejecutar la consulta SQL
    
    //------------------Base de datos


    //$valory=$_POST['valory'.$i];
  
    $n= ( empty($_POST['texto']) ) ? NULL : $_POST['texto'];
    //echo $n;
    $array_y=[];
    $array_x=[];
    $ap=15;

    for ($i = 1; $i <= $n; $i++) {
        $array_y[$i]=  $_POST['valory'.$i];
        $array_x[$i]= $_POST['valorx'.$i];
    }

    
  

    echo "La sumatoria de x es: ". array_sum($array_x) . "<br></br>";
    echo "La sumatoria de y es: ". array_sum($array_y) . "<br></br>";
    echo "El promedio de x es ". array_sum($array_x)/$n. "<br></br>";
    echo "El promedio de y es ". array_sum($array_y)/$n. "<br></br>";
    $promediox=array_sum($array_x)/$n;
    $promedioy=array_sum($array_y)/$n;


    echo"-----------------------------------------------------<br></br>";

    echo "x-promediox: " ;
    for ($i = 1; $i <= $n; $i++) {
        $xmx[$i]=$array_x[$i]-($promediox);
        echo $xmx[$i].  "<table><tr>
        </table> ";
    }
    echo "La sumatoria de x-promediox es: ". array_sum($xmx). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "_x^2 " ;
    for ($i = 1; $i <= $n; $i++) {
        $xpxp[$i]=($xmx[$i])**2;
        
        echo $xpxp[$i].  "<table><tr>
        </table> ";
    }
    echo "La sumatoria de _x^2 es: ". array_sum($xpxp). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "_x^4: ";
    for ($i = 1; $i <= $n; $i++) {
        $xpxp4[$i]=($xmx[$i])**4;
        
        echo $xpxp4[$i].  "<table><tr>
        </table> ";
        
    }
    echo "La sumatoria de _x^4 es: ". array_sum($xpxp4). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "_x*y: ";
    for ($i = 1; $i <= $n; $i++) {
        $xy[$i]=$xmx[$i]*$array_y[$i];
        echo   "<table><tr>
        <td> $xy[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de _x*y es: ". array_sum($xy). "<br></br>";
    echo"-----------------------------------------------------<br></br>";
    echo "_x^2*y: ";
    for ($i = 1; $i <= $n; $i++) {
        $x2y[$i]=$xpxp[$i]*$array_y[$i];
        echo   "<table><tr>
        <td> $x2y[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de _x*^2y es: ". array_sum($x2y). "<br></br>";
    echo"-----------------------------------------------------<br></br>";
    echo"ecuaciones <br></br>";

   
    echo "El sistema de ecuaciones es el siguiente: " 
    .array_sum($array_y) ."=" .$n."a+".array_sum($xpxp)."b<br></br>";
    echo "El sistema de ecuaciones es el siguiente: " 
    .array_sum($x2y) ."=" .array_sum($xpxp)."a+".array_sum($xpxp4)."b<br></br>";
    $pendiente=array_sum($xy)/array_sum($xpxp);


    for ($i = 1; $i <= $n; $i++) {
        $quy =('INSERT INTO seriesdetiempo values(
        '.$array_x[$i].',
        '.$array_y[$i].',
        '.$xmx[$i].',
        '.$xpxp[$i].',
        '.$xpxp4[$i].',
        '.$xy[$i].',
        '.$x2y[$i].')');
        $query = $con->query($quy); // Ejecutar la consulta SQL
    }
    

$a11=$n ;
$a12=array_sum($xpxp);
$a13=0;
$b1=array_sum($array_y);
$a21=array_sum($xpxp);
$a22=array_sum($xpxp4);
$a23=0;
$b2=array_sum($x2y);
$a31=0;
$a32=0;
$a33=0;
$b3=0;
$D=($a11*$a22)+($a12*$a23)+($a13*$a21)-($a11*$a23)-($a12*$a21)-($a13*$a22);
$DX=($b1*$a22)+($a12*$a23)+($a13*$b2)-($b1)-($a12*$b2)-($a13*$a22);
$DY=($a11*$b2)+($b1*$a23)+($a13*$a21)-($a11*$a23)-($b1*$a21)-($a13*$b2);
$DZ=($a11*$a22)+($a12*$b2)+($b1*$a21)-($a11*$b2)-($a12*$a21)-($b1*$a22);
$X=$DX/$D;
$Y=$DY/$D;
$Z=$DZ/$D;
?>
<b>
<hr>
SISTEMAS DE TRES ECUACIONES CON TRES INCOGNITAS
UTILIZANDO LAS FORMULAS DE CRAMER
<hr>
<table border=3>
<tr align="center">
<?php
//echo"<th>X</th>";echo"<th>Y</th>";
//echo"<th>Z</th>";echo"<th>X</th>";
//echo"<th>Y</th>";
?>
</tr>
<tr align="center">
<?php
//echo"<th>&nbsp;+&nbsp;</th>";echo"<th>&nbsp;+&nbsp;</th>";
//echo"<th>+&nbsp;-</th>";echo"<th>&nbsp;-&nbsp;</th>";
//echo"<th>&nbsp;-&nbsp;</th>";
?>
</tr>
<tr align="center">
<?php

?>
</tr>
<tr align="center">
<?php
//echo "<td>".$a21."</td>";echo"<td>".$a22."</td>";
//echo "<td>".$a23."</td>";
//echo "<td>".$a21."</td>";echo"<td>".$a22."</td>";
?>
</tr>
<tr align="center">
<?php
//echo"<td>".$a31."</td>";echo"<td>".$a32."</td>";
//echo"<td>".$a33."</td>";
//echo"<td>".$a31."</td>";echo"<td>".$a32."</td>";
?>
</tr>
</table>
<?php
//echo"Det. A = (".$a11."*".$a22."*".$a33.")+(".$a12."*".$a23."*".$a31.")+(".$a13."*".$a21."*".$a32.")-(".$a11."*".$a23."*".$a32.")-(".$a12."*" . $a21."*".$a33.")-(".$a13."*".$a22."*".$a31.")";
//echo "<br>El valor de la Det. A:".$D;
?>
<hr>
<table border=3>
<tr align="center">
<?php
echo"<th>A</th>";echo"<th>Y</th>";
echo"<th>Z</th>";
echo"<th>A</th>";echo"<th>Y</th>";
?>
</tr>
<tr align="center">
<?php
echo"<th>&nbsp;+&nbsp;</th>";echo"<th>&nbsp;+&nbsp;</th>";
echo"<th>+&nbsp;-</th>";
echo"<th>&nbsp;-&nbsp;</th>";echo"<th>&nbsp;-&nbsp;</th>";
?>
</tr>
<tr align="center">
<?php
echo"<td>".$b1."</td>";echo"<td>".$a12."</td>";
echo"<td>".$a13."</td>";
echo"<td>".$b1."</td>";echo"<td>".$a12."</td>";
?>
</tr>
<tr align="center">
<?php
echo "<td>".$b2."</td>";echo"<td>".$a22."</td>";
echo"<td>".$a23."</td>";
echo "<td>".$b2."</td>";echo"<td>".$a22."</td>";
?>
</tr>
<tr align="center">
<?php
echo"<td>".$b3."</td>";echo"<td>".$a32."</td>";
echo"<td>".$a33."</td>";
echo"<td>".$b3."</td>";echo"<td>".$a32."</td>";
?>
</tr>
</table>
<?php
echo "Det C = (".$b1."*".$a22."*".$a33.")+(".$a12."*".$a23."*".$b3.")+(".$a13."*".$b2."*".$a32.")-(".$b1."*".$a23."*".$a32.")-(".$a12."*".

$b2."*".$a33.")-(".$a13."*".$a22."*".$b3.")";
echo "<br>El valor de la Det. DC:".$DX;
//echo "<br>C=".$DX." / ".$D." = ".$X;
?>
<hr>
<table border=3>
<tr align="center">
<?php
echo"<th>X</th>";echo"<th>A</th>";
echo"<th>Z</th>";
echo"<th>X</th>";echo"<th>A</th>";
?>
</tr>
<tr align="center">
<?php
echo"<th>&nbsp;+&nbsp;</th>";echo"<th>&nbsp;+&nbsp;</th>";
echo"<th>+&nbsp;-</th>";
echo"<th>&nbsp;-&nbsp;</th>";echo"<th>&nbsp;-&nbsp;</th>";
?>
</tr>
<tr align="center">
<?php
echo"<td>".$a11."</td>";echo"<td>".$b1."</td>";
echo"<td>".$a13."</td>";
echo"<td>".$a11."</td>";echo"<td>".$b1."</td>";
?>
</tr>
<tr align="center">
<?php
echo "<td>".$a21."</td>";echo"<td>".$b2."</td>";
echo"<td>".$a23."</td>";
echo "<td>".$a21."</td>";echo"<td>".$b2."</td>";
?>
</tr>
<tr align="center">
<?php
echo"<td>".$a31."</td>";echo"<td>".$b3."</td>";
echo"<td>".$a33."</td>";
echo"<td>".$a31."</td>";echo"<td>".$b3."</td>";
?>
</tr>
</table>
<?php
echo "Det A = (".$a11."*".$b2."*".$a33.")+(".$b1."*".$a23."*".$a31.")+(".$a13."*".$a21."*".$b3.")-(".$a11."*".$a23."*".$b3.")-(".$b1."*". $a21."*".$a33.")-(".$a13."*".$b2."*".$a31.")";
echo "<br>El valor de la Det. DA:".$DY;
echo "<br>C=".$DY." / ".$D." = ".$Y;
?>
<hr>
<table border=3>
<tr align="center">
<?php
//echo"<th>X</th>";echo"<th>Y</th>";
//echo"<th>A</th>";
//echo"<th>X</th>";echo"<th>Y</th>";
?>
</tr>
<tr align="center">
<?php
//echo"<th>&nbsp;+&nbsp;</th>";echo"<th>&nbsp;+&nbsp;</th>";
//echo"<th>+&nbsp;-</th>";
//echo"<th>&nbsp;-&nbsp;</th>";echo"<th>&nbsp;-&nbsp;</th>";
?>
</tr>
<tr align="center">
<?php
//echo"<td>".$a11."</td>";echo"<td>".$a12."</td>";
//echo"<td>".$b1."</td>";
//echo"<td>".$a11."</td>";echo"<td>".$a12."</td>";
?>
</tr>
<tr align="center">
<?php
//echo "<td>".$a21."</td>";echo"<td>".$a22."</td>";
//echo"<td>".$b2."</td>";
//echo "<td>".$a21."</td>";echo"<td>".$a22."</td>";
?>
</tr>
<tr align="center">
<?php
//echo"<td>".$a31."</td>";echo"<td>".$a32."</td>";
//echo"<td>".$b3."</td>";
//echo"<td>".$a31."</td>";echo"<td>".$a32."</td>";
?>
</tr>
</table>
<?php
//echo "Det Z = (".$a11."*".$a22."*".$b3.")+(".$a12."*".$b2."*".$a31.")+(".$b1."*".$a21."*".$a32.")-(".$a11."*".$b2."*".$a32.")-(".$a12."*".$a21. "*".$b3.")-(".$b1."*".$a22."*".$a31.")";
//echo "<br>El valor de la Det. DZ:".$DZ;
//echo "<br>Z=".$DZ." / ".$D." = ".$Z;
echo "A = ". (array_sum($array_y)-array_sum($xpxp)*$Y)/$n;
$X=(array_sum($array_y)-array_sum($xpxp)*$Y)/$n;
echo"-----------------------------------------------------<br></br>";
echo "Pendiente= ". $pendiente."<br></br>";

echo"-----------------------------------------------------<br></br>";
echo"Estimacion , escribe tu valor: <br></br>";
echo "<Form action='./estimacionin.php' method='post' >";
echo '<input type="number" placeholder="valores" name="valores">';
echo "<p>Caja de texto:<input type='hidden' name='pendiente' value='$pendiente'> <input type='hidden' name='Y' value='$Y'>Caja de texto: <input type='hidden' name='X' value='$X'> <input type='hidden' name='promediox' value='$Y'>Caja de texto: <input type='hidden' name='promediox' value='$promediox'><input type='submit' value='Enviar este formulario' />";




?>

