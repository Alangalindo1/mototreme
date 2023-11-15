<?php

include('db.php');

if (isset($_POST['saveMoto'])) {
  $Nombre = $_POST['Nombre'];
  $Tipo_Moto= $_POST['Tipo_Moto'];
  $Marca = $_POST['Marca'];
  $Modelo = $_POST['Modelo'];
  $color = $_POST['color'];
  $Motor = $_POST['Motor'];
  $query = "INSERT INTO Moto( Nombre, Tipo_Moto, Marca, Modelo, color, Motor) VALUES ('$Nombre', '$Tipo_Moto', '$Marca', '$Modelo', '$color', '$Motor')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>