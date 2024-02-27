<?php
$nombrePgina = "Ingreso correcto";
include 'plantilla.php';
include 'header.php';
?>
<div class="mensaje-exito">
    <h3>Ingreso OK del vehiculo</h3>
    <p>El nuevo vehiculo ha sido ingresado corectamente</p>
</div>
<?php include 'footer.php'; ?>

<script>
    //redirigir automaticamentede 2segundos
    setTimeout(function (){
        window.location.href ="nuevoIngreso.php";
    }, 2000);
    </script>
