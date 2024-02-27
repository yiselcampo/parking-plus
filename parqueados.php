<?php
$nombrePagina ="Parquedos" ;
include 'plantilla.php';
include 'header.php';
 // realizar la conexion a la base de datos
 $servername = "localhost";
 $username = "root";
 $password = "";
 $basedatos = "parking_plus_db";

 //crear una conexion
 $conexion = new mysqli($servername, $username, $password, $basedatos);

 //verificar la conexion
 if($conexion->connect_error) {
   die("la conexion a la base de datos tuvo un error" . $conexion->connect_error);
 }
 //consultar los vehiculos parqueados
 $vehiculosParqueados = "SELECT * FROM vehiculos WHERE estado ='parqueado'";
 $resultado = $conexion->query($vehiculosParqueados);

 //obtener los datos como un array multiimensional
 $vehiculos = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<div class="contenedor-listado-parqueado">
    <h3>Vehiculos Parqueados</h3>

    <table class="tabla">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Ingreso</th>
            </tr>
        </thead>
        <?php
          if(!empty($vehiculos)){
            foreach($vehiculos as $vehiculo) {
                echo "<tr>";
                echo "<td>";

              if ($vehiculo["tipoVehiculo"] == "carro") {
                  echo "<i class='fa-solid fa-car'></i>";
               } elseif ($vehiculo["tipoVehiculo"] == "moto") {
                echo "<i class='fa-solid fa-motorcycle'></i>";
               }else {
                echo "<i class='fa-solid fa-bullseye'></i>";
               }
              echo $vehiculo["placa"] . "</td>";

              echo "<td>" . $vehiculo["fechaHoraIngreso"] . "</td>";
              echo "</tr>" ;

            }
          } else {
            echo "<tr><td colspan='5'> No Hay Vehiculos Parqueados</td> </tr>" ;
          }


        ?>


    </table>
</div>
<?php include'footer.php'; ?>