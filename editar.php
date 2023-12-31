<?php

    include_once "templates/header.php";

?>

<?php

    if(!isset($_GET['codigo'])){
        header("location:index.php?mensaje=error");
        exit();
    }

    include_once "model/conexion.php";
    $codigo = $_GET['codigo'];

    $sentencia = $bd -> prepare("SELECT * FROM persona WHERE codigo = ?;");
    $sentencia -> execute([$codigo]);
    $persona = $sentencia -> fetch(PDO::FETCH_OBJ);
    // print_r($persona);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="txtNombre" required value="<?php echo $persona -> nombre ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad</label>
                        <input type="number" class="form-control" name="txtEdad" required value="<?php echo $persona -> edad ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo</label>
                        <input type="text" class="form-control" name="txtSigno" required value="<?php echo $persona -> signo ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona -> codigo ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    include_once "templates/footer.php";

?>