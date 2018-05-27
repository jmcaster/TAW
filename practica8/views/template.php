<!--Es la plantilla que vera el usuario al ejecutar la aplicación -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>Template</title>
        <!-- Compiled and minified CSS -->

        

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>




        <style type="text/css">
            body{
                text-align: center;
                }
            section{
                margin: 0 auto;
                width: 85%;
            }
            form input{
                width: 50%;
            }
        </style>

    </head>


<body>

<?php include "modules/navegacion.php"; ?>


<section>

<?php 

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

 ?>

</section>
<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
    //Inicializacion para elementos SELECT de los formularios
    $(document).ready(function(){
        $('select').formSelect();
    });
    //Inicializacion para los elementos de seleccion de fecha
    $(document).ready(function(){
        $('.datepicker').datepicker();
    });
    //Inicializacion para los elementos de seleccion de hora
    $(document).ready(function(){
        $('.timepicker').timepicker();
    });
</script>
</body>
</html>