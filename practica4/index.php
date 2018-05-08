<?php

$regA = fopen("registroa.txt", "a+");
$todo = fread($regA, filesize("registroa.txt"));
$alumnos = explode("\n", $todo);

fclose($regA);

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>
    
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Ejemplos de listado en array</h3>
        <ul class="button-group" >
            <li><a href="#" class="button" style="background-color: lightblue !important;">Alumnos</a></li>
            <li><a href="maestros.php" class="button">Maestros</a></li>
            <li><a href="agregara.php" class="button" style="background-color: #dfdfdf !important; margin-left: 340px;">Agregar</a></li>
        </ul>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($alumnos){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Matricula</th>
                    <th width="250">Nombre</th>
                    <th width="250">Carrera</th>
                    <th width="250">Email</th>
                    <th width="250">Telefono</th>
                    <th width="250">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  
                  for ($i=0; $i < count($alumnos); $i++) {
                    $al = explode(":", $alumnos[$i]);
                    
                  //foreach( $al_access as $id => $user ){ 
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $al[0]; ?></td>
                    <td><?php echo $al[1]; ?></td>
                    <td><?php echo $al[2]; ?></td>
                    <td><?php echo $al[3]; ?></td>
                    <td><?php echo $al[4]; ?></td>
                    <td><a href="./keyal.php?id=<?php echo $i; ?>" class="button radius tiny secondary">Ver detalles</a></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo count($alumnos); ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
                No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>

    </div>

    <?php require_once('footer.php'); ?>
  </body>
</html>