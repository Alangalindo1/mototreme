<?php
include("db.php");
$Nombre= '';
$Tipo_Moto= '';
$Marca= '';
$Modelo= '';
$color= '';
$Motor= '';
$Pais_origen = '';

if  (isset($_GET['Id_Moto'])) {
  $Id_Moto = $_GET['Id_Moto'];
  $query = "SELECT * FROM Moto WHERE Id_Moto=$Id_Moto";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $Nombre = $row['Nombre'];
    $Tipo_Moto = $row['Tipo_Moto'];
    $Marca = $row['Marca'];
    $Modelo = $row['Modelo'];
    $color = $row['color'];
    $Motor = $row['Motor'];
  }
}

if (isset($_POST['update'])) {
  $Id_Moto = $_GET['Id_Moto'];

  $Nombre = $_POST['Nombre'];
  $Tipo_Moto = $_POST['Tipo_Moto'];
  $Marca = $_POST['Marca'];
  $Modelo = $_POST['Modelo'];
  $color = $_POST['color'];
  $Motor = $_POST['Motor'];

  $query = "UPDATE Moto set Nombre = '$Tipo_Moto', Tipo_Moto = '$Nombre', Marca = '$Marca', Modelo = '$Modelo', color = '$color', Motor = '$Motor' WHERE Id_Moto=$Id_Moto";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?Id_Moto=<?php echo $_GET['Id_Moto']; ?>" method="POST">
        <div class="form-group">
        <input name="Nombre"  type="text" class="form-control" value="<?php echo $Nombre;?> " placeholder="Nombre">
        </div>
        <div class="form-group">
        <input name="Tipo_Moto"  type="text" class="form-control" value="<?php echo $Tipo_Moto;?>" placeholder=" Tipo_Moto">
        </div>
        <div class="form-group">
        <input name="Marca"  type="text" class="form-control" value="<?php echo $Marca;?>" placeholder="Marca">
        </div>
        <div class="form-group">
        <input name="Modelo"  type="text" class="form-control" value="<?php echo $Modelo;?>" placeholder="Modelo">
        </div>
        <div class="form-group">
          <input name="color" type="text" class="form-control" value="<?php echo $color; ?>" placeholder="color">
        </div>
        <div class="form-group">
          <input name="Motor" type="text" class="form-control" value="<?php echo $Motor; ?>" placeholder="Motor">
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>