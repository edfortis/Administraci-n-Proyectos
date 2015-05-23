<!--
    Formaulario de la tabla salones 
-->
<div class="container margen">
    <div class="row">
        <div class="col-12-lg">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 ">
      
                <?php echo validation_errors();?>
                <?php if(isset($nombre)){
                    echo form_open("CSalon/index/$idSalon");
                }else{
                    echo form_open("CSalon");
                }
                ?>   
                
                <div class="form-group">
                    <label class="label-uv" for="nombre">Salón</label>
                    <input class="form-control" type="text" maxlength="80" name="nombre" <?php if(isset($nombre)){?> value="<?=$nombre?>"<?php } ?> />
                </div>              
                <input type="hidden" name="tabla" value="2" />
                <button type="submit" class="btn btn-default">Guardar</button>
                
                </form>
            </div>
        </div>
    </div>
</div>
