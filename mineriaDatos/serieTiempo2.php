<?php
//-----base de datos
    $con = new mysqli('localhost','root','','prueba_db');
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

    echo "(x-promediox)*2: " ;
    for ($i = 1; $i <= $n; $i++) {
        $xpxp[$i]=($xmx[$i])*2;
        
        echo $xpxp[$i].  "<table><tr>
        </table> ";
    }
    echo "La sumatoria de (x-promediox)*2 es: ". array_sum($xpxp). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "_x*y: ";
    for ($i = 1; $i <= $n; $i++) {
        $_xy[$i]=2*$xmx[$i]*$array_y[$i];
        echo   "<table><tr>
        <td> $_xy[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de _x*y es: ". array_sum($_xy). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "_x^2: ";
    for ($i = 1; $i <= $n; $i++) {
        $x1x1[$i]=(2*$xmx[$i])**2;
        echo   "<table><tr>
        <td> $x1x1[$i] </td></tr>
        </table> ";
        
    }
    echo "La sumatoria de _x^2 es: ". array_sum($x1x1). "<br></br>";
    echo"-----------------------------------------------------<br></br>";
    echo"Pendiente: <br></br>". array_sum($_xy)/array_sum($x1x1)."<br></br>";
    $pendiente = array_sum($_xy)/array_sum($x1x1);
    echo"-----------------------------------------------------<br></br>";
    echo"Ordenada: <br></br>". $promedioy."<br></br>";
    echo"-----------------------------------------------------<br></br>";
    echo"Estimacion , escribe tu valor: <br></br>";
    echo "<Form action='./estimacion.php' method='post' >";
    echo '<input type="number" placeholder="valores" name="valores">';
    echo "<p>Caja de texto:<input type='hidden' name='pendiente' value='$pendiente'> <input type='hidden' name='promediox' value='$promediox'>Caja de texto: <input type='hidden' name='promedioy' value='$promedioy'> <input type='submit' value='Enviar este formulario' />";



