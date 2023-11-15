<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD Moto FORM -->
      <div class="card card-body">
        <form action="saveMoto.php" method="POST">
          <div class="form-group">
            <input name="Nombre" rows="2" class="form-control" placeholder="Nombre"></input>
          </div>
          <div class="form-group">
            <input type="TEXT" name="Tipo_Moto" class="form-control" placeholder="Tipo_Moto"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Marca" class="form-control" placeholder="Marca"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Modelo" class="form-control" placeholder="Modelo"></input>
          </div>
          <div class="form-group">
            <input type="text" name="color" class="form-control" placeholder="color"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Motor" class="form-control" placeholder="Motor"></input>
          </div>
          <input type="submit" name="saveMoto" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Tipo_Moto</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>color</th>
            <th>Motor</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM Moto";
          $result_Moto = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_Moto)) { ?>
          <tr>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Tipo_Moto']; ?></td>
            <td><?php echo $row['Marca']; ?></td>
            <td><?php echo $row['Modelo']; ?></td>
            <td><?php echo $row['color']; ?></td>
            <td><?php echo $row['Motor']; ?></td>
            <td>
              <a href="edit.php?Id_Moto=<?php echo $row['Id_Moto']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deletetbl_Moto.php?Id_Moto=<?php echo $row['Id_Moto']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>