<?php include './template/header.php' ?>

<?php
include_once './model/conexion.php';
$sentencia = $bd->query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($persona);
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <!-- inicio alertas -->
      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {

      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Atención:</strong> Debe rellenar todos los datos para continuar.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {

      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registrado:</strong> Se registraron los datos
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {

      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>¡Error!</strong> Vuelve a intentar
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {

      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Editado:</strong> Se han actualizado los datos correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {

      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Eliminado:</strong> Se han eliminado los datos correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>
      <!-- fin alertas -->
      <div class="card">
        <div class="card-header">
          Lista de personas
        </div>
        <div class="p-4 mb-5 ">
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Signo</th>
                <th scope="col" colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>

              <?php
              foreach ($persona as $dato) {
              ?>

                <tr>
                  <td scope="row"><?php echo $dato->codigo ?></td>
                  <td><?php echo $dato->nombre ?></td>
                  <td><?php echo $dato->edad ?></td>
                  <td><?php echo $dato->signo ?></td>
                  <td><a href="editar.php?codigo=<?php echo $dato->codigo ?>"><i class="text-sucess bi bi-pencil-square"></i></a></td>
                  <td><a onclick="return confirm('¿Estás seguro de eliminar los datos?')" href="eliminar.php?codigo=<?php echo $dato->codigo ?>"><i class="text-danger bi bi-trash-fill"></i></a></td>
                </tr>

              <?php
              }
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Ingresar datos:
        </div>
        <form action="registrar.php" class="p-4" method="POST">
          <div class="mb-3">
            <label for="" class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="txtNombre" autofocus required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Edad: </label>
            <input type="number" class="form-control" name="txtEdad" autofocus required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Signo: </label>
            <input type="text" class="form-control" name="txtSigno" autofocus required>
          </div>
          <div class="d-grid mb-3">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary mb-5" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include './template/footer.php' ?>