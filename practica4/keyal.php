<?php
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

$regA = fopen("registroa.txt", "a+");
$todo = fread($regA, filesize("registroa.txt"));
$alumnos = explode("\n", $todo);
$alumno = explode(":", $alumnos[$id]);
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
        <h3>Manejo de arreglos</h3>
        <ul class="button-group" >
            <li><a href="./index.php" class="button">Alumnos</a></li>
            <li><a href="./maestros.php" class="button">Maestros</a></li>
        </ul>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <ul class="pricing-table">
                <li class="title">Detalle de indice</li>
                <li class="description"><?php echo $alumno[0] ?></li>
                <li class="description"><?php echo $alumno[1] ?></li>
                <li class="description"><?php echo $alumno[2] ?></li>
                <li class="description"><?php echo $alumno[3] ?></li>
                <li class="description"><?php echo $alumno[4] ?></li>
              </ul>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>