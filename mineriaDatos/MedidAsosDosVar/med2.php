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

    echo "(x-promediox)^2: " ;
    for ($i = 1; $i <= $n; $i++) {
        $xpxp[$i]=($xmx[$i])**2;
        
        echo $xpxp[$i].  "<table><tr>
        </table> ";
    }
    echo "La sumatoria de (x-promediox)^2 es: ". array_sum($xpxp). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "y-¬y: ";
    for ($i = 1; $i <= $n; $i++) {
        $_xy[$i]=$array_y[$i]-$promedioy;
        echo   "<table><tr>
        <td> $_xy[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de y-¬y es: ". array_sum($_xy). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "(y-¬y)^2: ";
    for ($i = 1; $i <= $n; $i++) {
        $x1x1[$i]=$_xy[$i]**2;
        echo   "<table><tr>
        <td> $x1x1[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de (y-¬y)^2 es: ". array_sum($x1x1). "<br></br>";
    echo"-----------------------------------------------------<br></br>";
    echo "(x-¬x)(y-¬y): ";
    for ($i = 1; $i <= $n; $i++) {
        $xmyprom[$i]=$_xy[$i]*$xmx[$i];
        echo   "<table><tr>
        <td>  $xmyprom[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de (y-¬y)^2 es: ". array_sum($xmyprom). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "Covarianza: <br></br>";
    $covarianza=array_sum($xmyprom)/($n-1);
    echo "La Covarianza es : ". array_sum($xmyprom)/($n-1). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "Desviacion estandar: <br></br>";
    
    echo "Desviacion estandar de x es  : ". sqrt( array_sum($xpxp)/($n-1)). "<br></br>";
    
    $desvestanx=sqrt( array_sum($xpxp)/($n-1));
    $desvestany=sqrt( array_sum($x1x1)/($n-1));
    echo "Desviacion estandar de y es  : ". sqrt( array_sum($x1x1)/($n-1)). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "Coeficiente de correlacion de Person: <br></br>";
    
    echo "Coeficiente de correlacion de Person:  : ". ( $covarianza/($desvestanx*$desvestany)). "<br></br>";

    echo"-----------------------------------------------------<br></br>";

    echo "Coeficiente de Determinacion de Person: <br></br>";
    
    echo "Coeficiente de correlacion de Person:  : ".((($covarianza/($desvestanx*$desvestany)))**2*100). "<br></br>";

    echo"-----------------------------------------------------<br></br>";

    for ($i = 1; $i <= $n; $i++) {
        $quy =('INSERT INTO `medidasdosvaria` values(
        '.$array_x[$i].',
        '.$array_y[$i].',
        '.$xmx[$i].',
        '.$xpxp[$i].',
        '.$_xy[$i].',
        '.$x1x1[$i].',
        '.$xmyprom[$i].')');
        $query = $con->query($quy); // Ejecutar la consulta SQL
    }
    
   
