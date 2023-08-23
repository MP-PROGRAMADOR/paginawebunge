<div class="row">
    <div class="col-lg-6 mb-2">
        <a href="../users/nuevaEntrada.php" class="btn btn-primary"><i class="mdi mdi-account-plus"></i></a>
    </div>
</div>



<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'insertado') {
?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> su registro ha tenido Exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>

<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado') {
?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> su Actualizacion ha tenido Exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>

<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> ERROR!</strong> Hubo un error.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>


<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> Su Registro se ha Eliminado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>



<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table id="tablaEntrada" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nº Registro</th>
                            <th>Fecha Registro</th>
                            <th>Tipo de Documento</th>
                            <th>Descripción</th>
                            <th>Procedencia</th>
                            <th>Fecha Firma</th>
                            <th>Importe</th>
                            <th>Archivo</th>
                            <td>ACCIONES</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row_entradas = $entradas->fetch_assoc()) {  ?>

                            <?php
                            $datos = $row_entradas['Id'];

                            ?>

                            <tr>
                                <td> <?= $row_entradas['NumRegistro']; ?></td>
                                <td> <?= $row_entradas['FechaRegistro']; ?></td>
                                <td> <?= $row_entradas['TipoDoc']; ?></td>
                                <td> <?= $row_entradas['Descripcion']; ?></td>
                                <?php
                                $procedencia = $row_entradas['Procedencia']; 
                                $buscarProcedencia = "SELECT * FROM instituciones WHERE Id = '$procedencia'";
                                $Resultprocedencia = $conn->query($buscarProcedencia);

                                while ($filasEntradas = $Resultprocedencia->fetch_assoc()) {

                                ?>
                                    <td> <?= $filasEntradas['Nombre']; ?></td>
                                <?php  } ?>

                                <td> <?= $row_entradas['FechaFirma']; ?></td>
                                <td> <?= $row_entradas['Importe']; ?></td>
                                <td> <a class="btn btn-primary me-2" href="../documentos/entradas/<?= $row_entradas['Archivo']; ?>" download="Entrada-<?= $row_entradas['NumRegistro']; ?>"><i class="mdi mdi-download"></i></a></td>
                                <td>
                                    <a class="btn btn-success me-2" href="../users/detallesEntradas.php?id=<?php echo $row_entradas['Id']; ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-eye"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-warning me-2" href="../users/editarInstitucion.php?id=<?php echo $row_entradas['Id']; ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil"></i></a>
                                </td>
                                <!-- <td>
                                    <a class="btn btn-danger me-2" href=" #" onclick="agregarForm('<?php echo $datos; ?>');" data-bs-toggle="modal" data-bs-target="#eliminaModalInstitucion"><i class="mdi mdi-delete"></i></a>
                                </td> -->
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../admin/ModaleliminarInstitucion.php'    ?>



<script>
    $('#tablaEntrada').DataTable();
</script>


<script>
    // boton eliminar codigo del modal..

    // agregar datos al formulario
    function agregarForm(datos) {
        var d = datos.split('||');
        // alert("los datos son: "+d);
        // return false;
        $('#Id').val(d[0]);

    }
</script>