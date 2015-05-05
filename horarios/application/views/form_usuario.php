<div class="container margen">
    <div class="row">
        <div class="col-12-lg">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 ">
      
                <?php echo validation_errors();?>
                <?php echo form_open("CUsuario");?>
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input class="form-control" type="text" maxlength="80" name="nickname" />
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <input class="form-control" type="password" maxlength="10" name="contrasena" />
                </div>
                <div class="form-group">
                    <label for="checkPass">Confirmar</label>
                    <input class="form-control" type="password" maxlength="10" name="checkPass" />
                </div>
                <button type="submit" class="btn btn-default">Guardar</button>
            </div>
        </div>
    </div>
</div>
