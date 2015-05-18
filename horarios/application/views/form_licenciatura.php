<div class="container margen">
    <div class="row">
        <div class="col-12-lg">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 ">
      
                <?php echo validation_errors();?>
                <?php echo form_open("CLicenciatura");?>
                <div class="form-group">
                    <label for="nombre">Nombre Licenciatura</label>
                    <input class="form-control" type="text" maxlength="80" name="nombre" />
                </div>
                <div class="form-group">
                    <label for="creditosTotal">Creditos</label>
                    <input class="form-control" type="text" maxlength="3" name="creditosTotal" />
                </div>
                <button type="submit" class="btn btn-default">Guardar</button>

            </div>
                <button type="submit" class="btn btn-default">Cancelar</button>
        </div>
    </div>
</div>
