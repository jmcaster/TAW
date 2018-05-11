<?php 
  error_reporting(0);
  require_once 'database_details.php';
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
 
      <div class="large-10 columns">
        <h3>Ejemplos de listado en array</h3>
        <ul class="button-group" >
            <li><a href="#" class="button" style="background-color: lightblue !important;">Usuarios</a></li>
            <li><a href="register.php" class="button" style="background-color: #dfdfdf !important; margin-left: 555px;">Agregar</a></li>
        </ul>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php 
                //$r = getUsers();
                $res = $con->query("SELECT * FROM users");
                if($res->num_rows>0){ 

              ?>
              <table>
                <thead>
                  <tr>
                    <th width="30">ID</th>
                    <th width="200">Nombre</th>
                    <th width="150">Email</th>
                    <th width="100">Contraseña</th>
                    <th width="60">Telefono</th>
                    <th width="480">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  
                  //for ($i=0; $i < count($users); $i++) {
                    //$al = explode(":", $u[$i]);
                    
                  //foreach( $al_access as $id => $user ){ 
                  $i=0;
                  while($r = $res->fetch_assoc()){
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['email']; ?></td>
                    <td><?php echo $r['password']; ?></td>
                    <td><?php echo $r['tel']; ?></td>
                    <td>
                      <a href="./key.php?id=<?php echo $i; ?>" class="button radius tiny secondary" style="display: inline-block; float: left;">Detalles</a>
                      <a href="./update.php?id=<?php echo $i; ?>" onclick="<?=update($i)?>" class="button radius tiny info" style="display: inline-block; float: left;">Modificar</a>
                      <a href="./delete.php?id=<?php echo $i; ?>" class="button radius tiny" style="display: inline-block; background-color: #dd5044;">Eliminar</a>
                    </td>
                  </tr>
                  <?php $i++;} ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php $res->num_rows; ?></td>
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