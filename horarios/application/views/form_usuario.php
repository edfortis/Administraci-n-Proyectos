
<div class="container margen">
    <div class="row">
        <div class="col-12-lg">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 ">
      
                <?php echo validation_errors();?>
                <?php if(isset($nickname)){
                    echo form_open("CUsuario/index/$idUsuario");
                }else{
                    echo form_open("CUsuario");
                }
                ?>   
                
                <div class="form-group">
                    <label class="label-uv" for="usuario">Usuario</label>
                    <input class="form-control" type="text" maxlength="80" name="nickname" <?php if(isset($nickname)){?> value="<?=$nickname?>"<?php } ?> />
                </div>
                <div class="form-group">
                    <label class="label-uv" for="pass">Contraseña</label>
                    <input class="form-control" type="password" maxlength="10" name="contrasena"  />
                </div>
                <div class="form-group">
                    <label class="label-uv" for="checkPass">Confirmar</label>
                    <input class="form-control" type="password" maxlength="10" name="checkPass" />
                    <input type="hidden" value="2" />
                </div>
                <div class="form-group">
                    <label class="label-uv" for="perfil">Perfil</label>
                    <select class="form-control" name="perfil">
                        <option value="1" <?php if(isset($perfil)){?> selected <?php } ?> >Docente</option>
                        <option value="2" <?php if(isset($perfil)){?> selected <?php } ?> >Administrador</option>
                    </select>
                </div>
                <input type="hidden" name="tabla" value="2" />
                <button type="submit" class="btn btn-default">Guardar</button>
                
                </form>
            </div>
        </div>
    </div>
</div>
