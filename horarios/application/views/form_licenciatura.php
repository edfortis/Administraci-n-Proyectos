<div class="container margen">
    <div class="row">
        <div class="col-12-lg">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 ">
      
                <?php echo validation_errors();?>
                <?php if(isset($nombre)){
                    echo form_open("CLicenciatura/index/$idLicenciatura");
                }else{
                    echo form_open("CLicenciatura");
                }
                ?>   
                <div class="form-group">
                    <label for="nombre">Nombre Licenciatura</label>
                    <input class="form-control" type="text" maxlength="80" name="nombre"  <?php if(isset($nombre)){?> value="<?=$nombre?>"<?php } ?> />
                </div>
                <div class="form-group">
                    <label for="creditosTotal">Creditos</label>
                    <input class="form-control" type="text" maxlength="3" name="creditosTotal"  <?php if(isset($creditosTotal)){?> value="<?=$creditosTotal?>"<?php } ?> />
                </div>
                <input type="hidden" name="tabla" value="2" />
                <button type="submit" class="btn btn-default">Guardar</button>

            </div>
               
        </div>
    </div>
</div>
