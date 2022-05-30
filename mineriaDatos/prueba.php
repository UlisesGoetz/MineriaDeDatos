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
    $array_x1=[];
    $array_x2=[];
    $ap=15;

    for ($i = 1; $i <= $n; $i++) {
        $array_y[$i]=  $_POST['valory'.$i];
        $array_x1[$i]= $_POST['valorx1'.$i];
        $array_x2[$i]=$_POST['valorx2'.$i];
        

        
    }

    
  

    echo "La sumatoria de y1 es: ". array_sum($array_y) . "<br></br>";
    echo "La sumatoria de x1 es: ". array_sum($array_x1) . "<br></br>";
    echo "La sumatoria de x2 es: " .array_sum($array_x2) . "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "x1*y: " ;
    for ($i = 1; $i <= $n; $i++) {
        $x1y1[$i]=$array_y[$i]*$array_x1[$i];
        echo   "<table><tr>
        <td> $x1y1[$i] </td></tr>
        </table> ";

    }
    echo "La sumatoria de x1*xy es: ". array_sum($x1y1). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "x2*y: ";
    for ($i = 1; $i <= $n; $i++) {
        $x2y1[$i]=$array_y[$i]*$array_x2[$i];
        echo   "<table><tr>
        <td> $x1y1[$i] </td></tr>
        </table> ";
    }
    echo "La sumatoria de x2*xy es: ". array_sum($x2y1). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "x2*x1: ";
    for ($i = 1; $i <= $n; $i++) {
        $x2x1[$i]=$array_x1[$i]*$array_x2[$i];
        echo   "<table><tr>
        <td> $x2x1[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de x2*xy es: ". array_sum($x2x1). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "x1^2: ";
    for ($i = 1; $i <= $n; $i++) {
        $x1x1[$i]=$array_x1[$i]*$array_x1[$i];
        echo   "<table><tr>
        <td> $x1x1[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de x2^2 es: ". array_sum($x1x1). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "x2^2: ";
    for ($i = 1; $i <= $n; $i++) {
        $x2x2[$i]=$array_x2[$i]*$array_x2[$i];
        echo   "<table><tr>
        <td> $x2x2[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de x2^2 es: ". array_sum($x2x2). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "y^2: ";
    for ($i = 1; $i <= $n; $i++) {
        $yy[$i]=$array_y[$i]*$array_y[$i];
        echo   "<table><tr>
        <td> $yy[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de y^2 es: ". array_sum($yy). "<br></br>";
    echo"-----------------------------------------------------<br></br>";


    for ($i = 1; $i <= $n; $i++) {
        $quy =('INSERT INTO regresionmultiple values('.$array_y[$i].',
        '.$array_x1[$i].',
        '.$array_x2[$i].',
        '.$x1y1[$i].',
        '.$x2y1[$i].',
        '.$x2x1[$i].',
        '.$x1x1[$i].',
        '.$x2x2[$i].',
        '.$yy[$i].')');
        $query = $con->query($quy); // Ejecutar la consulta SQL
    }



   

    echo "El sistema de ecuaciones es el siguiente: " .array_sum($array_y) ."=" .$n."a+".array_sum($array_x1)."b+".array_sum($array_x2)."c<br></br>";
    echo "El sistema de ecuaciones es el siguiente: " .array_sum($x1y1) ."=" .array_sum($array_x1)."a+".array_sum($x1x1)."b+".array_sum($x2x1)."c<br></br>";
    echo "El sistema de ecuaciones es el siguiente: " .array_sum($x2y1) ."=" .array_sum($array_x2)."a+".array_sum($x2x1)."b+".array_sum($x2x2)."c<br></br>";



$a11=$n ;
$a12=array_sum($array_x1);
$a13=array_sum($array_x2);
$b1=array_sum($array_y);
$a21=array_sum($array_x1);
$a22=array_sum($x1x1);
$a23=array_sum($x2x1);
$b2=array_sum($x1y1);
$a31=array_sum($array_x2);
$a32=array_sum($x2x1);
$a33=array_sum($x2x2);
$b3=array_sum($x2y1) ;
$D=($a11*$a22*$a33)+($a12*$a23*$a31)+($a13*$a21*$a32)-($a11*$a23*$a32)-($a12*$a21*$a33)-($a13*$a22*$a31);
$DX=($b1*$a22*$a33)+($a12*$a23*$b3)+($a13*$b2*$a32)-($b1*$a23*$a32)-($a12*$b2*$a33)-($a13*$a22*$b3);
$DY=($a11*$b2*$a33)+($b1*$a23*$a31)+($a13*$a21*$b3)-($a11*$a23*$b3)-($b1*$a21*$a33)-($a13*$b2*$a31);
$DZ=($a11*$a22*$b3)+($a12*$b2*$a31)+($b1*$a21*$a32)-($a11*$b2*$a32)-($a12*$a21*$b3)-($b1*$a22*$a31);
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
echo"<th>X</th>";echo"<th>Y</th>";
echo"<th>Z</th>";echo"<th>X</th>";
echo"<th>Y</th>";
?>
</tr>
<tr align="center">
<?php
echo"<th>&nbsp;+&nbsp;</th>";echo"<th>&nbsp;+&nbsp;</th>";
echo"<th>+&nbsp;-</th>";echo"<th>&nbsp;-&nbsp;</th>";
echo"<th>&nbsp;-&nbsp;</th>";
?>
</tr>
<tr align="center">
<?php
echo"<td>".$a11."</td>";echo"<td>".$a12."</td>";
echo"<td>".$a13."</td>";
echo"<td>".$a11."</td>";echo"<td>".$a12."</td>";
?>
</tr>
<tr align="center">
<?php
echo "<td>".$a21."</td>";echo"<td>".$a22."</td>";
echo "<td>".$a23."</td>";
echo "<td>".$a21."</td>";echo"<td>".$a22."</td>";
?>
</tr>
<tr align="center">
<?php
echo"<td>".$a31."</td>";echo"<td>".$a32."</td>";
echo"<td>".$a33."</td>";
echo"<td>".$a31."</td>";echo"<td>".$a32."</td>";
?>
</tr>
</table>
<?php
echo"Det. A = (".$a11."*".$a22."*".$a33.")+(".$a12."*".$a23."*".$a31.")+(".$a13."*".$a21."*".$a32.")-(".$a11."*".$a23."*".$a32.")-(".$a12."*" . $a21."*".$a33.")-(".$a13."*".$a22."*".$a31.")";
echo "<br>El valor de la Det. A:".$D;
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
echo "Det X = (".$b1."*".$a22."*".$a33.")+(".$a12."*".$a23."*".$b3.")+(".$a13."*".$b2."*".$a32.")-(".$b1."*".$a23."*".$a32.")-(".$a12."*".

$b2."*".$a33.")-(".$a13."*".$a22."*".$b3.")";
echo "<br>El valor de la Det. DX:".$DX;
echo "<br>X=".$DX." / ".$D." = ".$X;
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
echo "Det Y = (".$a11."*".$b2."*".$a33.")+(".$b1."*".$a23."*".$a31.")+(".$a13."*".$a21."*".$b3.")-(".$a11."*".$a23."*".$b3.")-(".$b1."*". $a21."*".$a33.")-(".$a13."*".$b2."*".$a31.")";
echo "<br>El valor de la Det. DY:".$DY;
echo "<br>Y=".$DY." / ".$D." = ".$Y;
?>
<hr>
<table border=3>
<tr align="center">
<?php
echo"<th>X</th>";echo"<th>Y</th>";
echo"<th>A</th>";
echo"<th>X</th>";echo"<th>Y</th>";
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
echo"<td>".$a11."</td>";echo"<td>".$a12."</td>";
echo"<td>".$b1."</td>";
echo"<td>".$a11."</td>";echo"<td>".$a12."</td>";
?>
</tr>
<tr align="center">
<?php
echo "<td>".$a21."</td>";echo"<td>".$a22."</td>";
echo"<td>".$b2."</td>";
echo "<td>".$a21."</td>";echo"<td>".$a22."</td>";
?>
</tr>
<tr align="center">
<?php
echo"<td>".$a31."</td>";echo"<td>".$a32."</td>";
echo"<td>".$b3."</td>";
echo"<td>".$a31."</td>";echo"<td>".$a32."</td>";
?>
</tr>
</table>
<?php
echo "Det Z = (".$a11."*".$a22."*".$b3.")+(".$a12."*".$b2."*".$a31.")+(".$b1."*".$a21."*".$a32.")-(".$a11."*".$b2."*".$a32.")-(".$a12."*".$a21. "*".$b3.")-(".$b1."*".$a22."*".$a31.")";
echo "<br>El valor de la Det. DZ:".$DZ;
echo "<br>Z=".$DZ." / ".$D." = ".$Z;

echo"<br></br>";
echo"-----------------------------------------------------<br></br>";
echo"Estimacion , escribe tu valor: <br></br>";
    echo "<Form action='./prueba2.php' method='post' >";
    echo '<input type="any" placeholder="x1" name="x1">';
    echo '<input type="any" placeholder="x2" name="x2">';
    echo "<p>Caja de texto:<input type='hidden' name='y' value='$Y'> <input type='hidden' name='x' value='$X'>Caja de texto: <input type='hidden' name='z' value='$Z'> <input type='submit' value='Enviar este formulario' />";

?>
