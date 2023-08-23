<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">FORMULARIO DE REGISTRO DE SALIDAS</h4>
            <form class="forms-sample" method="POST" action="../php/guardar_salidas.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="TipoDoc">Tipo de Documento</label>
                    <input type="text" class="form-control" id="TipoDoc" name="TipoDoc" placeholder="Ejemplo carta...">
                </div>
                <div class="form-group">
                    <label for="ckeditor">Descripción</label>
                    <textarea name="descripcion" id="ckeditor" class="form-control ckeditor" id="" cols="30" rows="15" placeholder="Descripcion del documento"></textarea>                    
                </div>
                <div class="form-group">
                    <label for="palabrasClaves">Palabras Claves del Documento</label>
                    <input type="text" class="form-control" id="palabrasClaves" name="palabrasClaves" placeholder="Ejemplo solicitud de...">
                </div>
                <div class="form-group">
                    <label for="fechaFirma">¿Cuando de Firmo el documento?</label>
                    <input type="date" class="form-control" id="fechaFirma" name="fechaFirma" placeholder="Ejemplo solicitud de..."> 
                </div>
                <div class="form-group">
                    <label for="importe">Importe</label>
                    <input type="text" class="form-control" id="importe" name="importe" placeholder="Ejemplo 1.000.000">
                </div>
                <div class="form-group">
                    <label for="archivo">Selecciona el Documento</label>
                    <input type="file" class="form-control" id="archivo" name="archivo" placeholder="Ejemplo solicitud de...">
                </div>
                <div class="form-group">
                    <label for="institucion"> Procede de...</label>
                    <select class="form-control" aria-label=".form-select-lg example" id="institucion" name="institucion" required>
                        <option selected value="">seleccione una Institucion.....</option>
                        <?php while ($institucion = mysqli_fetch_array($instituciones)) { ?>
                            <option value="<?php echo $institucion['Id']; ?>"><?php echo $institucion['Nombre_Corto']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary me-2">GUARDAR</button> 
                <a href="./salidas.php" class="btn btn-light">CANCELAR</a>
            </form>
        </div>
    </div>
</div>