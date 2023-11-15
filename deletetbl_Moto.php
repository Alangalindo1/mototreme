<?php

include("db.php");

if(isset($_GET['Id_Moto'])) {
  $Id_Moto = $_GET['Id_Moto'];
  $query = "DELETE FROM Moto WHERE Id_Moto = $Id_Moto";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Consulta fallida.");
  }

  $_SESSION['message'] = 'Borrado con Exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>