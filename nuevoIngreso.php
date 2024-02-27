<?php
$nombrePagina = "Nuevo Ingreso";
include 'plantilla.php';
include 'header.php';


//varificar si se a enviado el formulario
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
  //capturar datos del formulario
  $tipoVehiculo = $_POST["tipoVehiculo"];
  $marca = $_POST["marca"];
  $color = $_POST["color"];
  $placa = $_POST["placa"];
  $observaciones = $_POST["observaciones"];

  // realizar la conexion a la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $basedatos = "parking_plus_db";

  //crear una conexion
  $conexion = new mysqli($servername, $username, $password, $basedatos);

  //verificar la conexion
  if($conexion->connect_error) {
    die("la conexion a la base de datos tuvo un error" .$conexion->connect_error);
  }

  //armar la consulta sql para la inserccion 
  $insertar = "INSERT INTO vehiculos (tipoVehiculo, marca, color, placa, observaciones)
  VALUES ('$tipoVehiculo', '$marca', '$color', '$placa', '$observaciones') ";

  //Ejecutar la consulta
  if($conexion->query($insertar) === TRUE) {
    //redirigir al archivo exito.php dedspues d4e la insercion en el BD

    header("location:exito.php");
    exit;
  }
  else{
    echo"Error:" . $insertar ."<br>" . $conexion->error;
  }
  //cerrar la conexion
     
  $conexion->close();
}
?>

<div class="contenedor-nuevo-ingreso">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="nuevoIngreso" method="post">
    <h3>Información del Vehículo</h3>

    <div class="control-form">
      <label>Tipo Vehículo</label>
      <select name="tipoVehiculo">
        <option value="carro">Carro</option>
        <option value="moto">Moto</option>
        <option value="otro">Otro</option>
      </select>
    </div>
    <div class="control-form">
      <label>Marca:</label>
      <input type="text" id="marca" name="marca"/>
    </div>
    <div class="control-form">
      <label>Color:</label>
      <input type="text" id="color" name="color" />
    </div>
    <div class="control-form">
      <label>Placa:</label>
      <input type="text" id="placa" name="placa" />
    </div>
    <div class="control-form">
      <label>Observaciones:</label>
      <input type="text" id="observaciones" name="observaciones" />
    </div>
    <button class="botonNuevoVehiculo" type="submit">Ingresar vehiculo</button>
  </form>
</div>

<?php include 'footer.php'; ?>