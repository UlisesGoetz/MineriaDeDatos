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

    
    echo "La sumatoria de y es: ". array_sum($array_y) . "<br></br>";
    echo "El promedio de y es ". array_sum($array_y)/$n. "<br></br>";
    $promediox=array_sum($array_x)/$n;
    $promedioy=array_sum($array_y)/$n;

    echo"-----------------------------------------------------<br></br>";

    echo "La lista contiene : <br></br>" ;
    for ($i = 1; $i <= $n; $i++) {
        echo $array_x[$i].   "<table><tr>
        </table> ";
    }


    echo"-----------------------------------------------------<br></br>";

    echo "Frecuencia: <br></br>" ;
    for ($i = 1; $i <= $n; $i++) {
        $xmx[$i]=$array_y[$i]; 
        echo $xmx[$i].  " <table><tr>
        </table> ";
    }
    echo "La sumatoria de Frecuencia es: ". array_sum($xmx). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "Frecuencia Relativa: <br></br>" ;
    for ($i = 1; $i <= $n; $i++) {
        $Fr[$i]=$array_y[$i]/array_sum($xmx); 
        echo $Fr[$i].  " <table><tr>
        </table> ";
    }
    echo "La sumatoria de Frecuencia Relativa es: ". array_sum($Fr). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "Frecuencia Relativa porcentaje: <br></br>" ;
    for ($i = 1; $i <= $n; $i++) {
        $Frp[$i]=$Fr[$i]*100; 
        echo  $Frp[$i].  " <table><tr>
        </table> ";
    }
    echo "La sumatoria de Frecuencia Relativa porcentaje es: ". array_sum($Frp). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "Angulo: <br></br>" ;
    for ($i = 1; $i <= $n; $i++) {
        $Frp360[$i]=$Fr[$i]*360; 
        echo  $Frp360[$i].  " <table><tr>
        </table> ";
    }
    echo "La sumatoria de Frecuencia Relativa porcentaje es: ". array_sum($Frp360). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    echo "El valor mas repetido es: " ;
    

   
   

    echo max( $array_y);
    echo key($array_y);
    echo "La sumatoria de Frecuencia Relativa porcentaje es: ". array_sum($Frp360). "<br></br>";
    echo"-----------------------------------------------------<br></br>";

    for ($i = 1; $i <= $n; $i++) {
        $quy =('INSERT INTO graficadedatos values(
        "'.$array_x[$i].'",
        '.$array_y[$i].',
        '.$xmx[$i].',
        '.$Frp[$i].',
        '.$Frp360[$i].')');
        $query = $con->query($quy); // Ejecutar la consulta SQL
    }
    
