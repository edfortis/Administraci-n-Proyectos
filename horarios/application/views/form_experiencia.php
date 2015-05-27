<div class="container margen">
    <div class="row">
        <div class="col-12-lg">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 ">
      
                <?php echo validation_errors();?>
                <?php echo form_open("CExperiencia");?>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" maxlength="80" name="nombre" />
                </div>
                <div class="form-group">
                    <label for="nrc">NRC</label>
                    <input class="form-control" type="text" maxlength="10" name="nrc" />
                </div>
                <div class="form-group">
                    <label for="bloque">Bloque</label>
                    <input class="form-control" type="text" maxlength="80" name="bloque" />
                </div>
                <div class="form-group">
                    <label for="seccion">Seccion</label>
                    <input class="form-control" type="text" maxlength="10" name="seccion" />
                </div>
                <div class="form-group">
                    <label for="creditos">Creditos</label>
                    <input class="form-control" type="text" maxlength="10" name="creditos" />
                </div>
                <div class="form-group">
                    <label for="nombreLicenciatura">Licenciatura</label>
                    <input class="form-control" type="text" maxlength="80" name="nombreLicenciatura" />
                </div>
                <button type="submit" class="btn btn-default">Guardar</button>
            </div>
        </div>
    </div>
</div>
