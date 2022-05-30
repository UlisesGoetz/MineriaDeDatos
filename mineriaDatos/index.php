<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
</head>
<body>
    <!-- Aqui empieza el nav -->
<div>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/credits.html">
            <img src="./img/logo_fesc.png" alt="" width="60" height="44" class="d-inline-block align-text-top">
            Bienvenido a Mineria de datos. Seleccione que quiere hacer
          </a>
        </div>
      </nav>
</div>
    <!-- Aqui termina nav y empiezan las tarjetas -->
<div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card text-bg-info mb-3">
            <img src="./img/RegresionMultiple.png" style="max-width: 300px;">
            <Form action="./regresionM.php" method="post" > 
            <p class="card-text">Ingresa el numero de valores para la Regresion Multiple:  <input type="number" placeholder="Nombre" name="nombre"></p>
                   
          <a  class="btn btn-dark"><input type="submit" value="Enviar este formulario" /></a>
       |   </Form>
        </div>
      </div>/
    </div>
    <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card text-bg-info mb-3">
            <img src="./img/RelacionEntreVariables.jpg" style="max-width: 300px;">
            <Form action="./MedidAsosDosVar/med1.php" method="post" > 
            <p class="card-text">Medidas de asociación entre dos variables.:  <input type="number" placeholder="Nombre" name="nombre"></p>
                   
          <a  class="btn btn-dark"><input type="submit" value="Enviar este formulario" /></a>
       |   </Form>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card text-bg-info mb-3">
            <img src="./img/DatosCualitativos.jpg" style="max-width: 300px;">
            <Form action="./GraficoDatosCual/dC1.php" method="post" > 
            <p class="card-text">Grafico de datos cuatitativos.:  <input type="number" placeholder="Nombre" name="nombre"></p>
                   
          <a  class="btn btn-dark"><input type="submit" value="Enviar este formulario" /></a>
       |   </Form>
        </div>
      </div>
    </div>

  <div class="card border-primary mb-3">
    <h5 class="card text-bg-secondary mb-3">Special title treatment</h5>
    <p class="card text-bg-secondary mb-3">With supporting text below as a natural lead-in to additional content.</p>
    <img src="./img/SeriesDeTiempo.png" style="max-width: 300px;" style="justify-content: center;">
    <Form action="./seriedtiempo.php" method="post" > 
            <p class="card-text">Ingresa el numero de valores para la Serie de tiempo:  <input type="number" placeholder="Nombre" name="nombre"></p>
                   
          <a  class="btn btn-dark"><input type="submit" value="Enviar este formulario si es par" /></a>
          </Form>
          <Form action="./serieTiempoin.php" method="post" > 
            <p class="card-text">Ingresa el numero de valores para la Serie de tiempo:  <input type="number" placeholder="Nombre" name="nombre"></p>
                   
          <a  class="btn btn-dark"><input type="submit" value="Enviar este formulario si es inpar" /></a>
          </Form>
          
  </div>
  
</div>
</body>
</html>