<html>
    <head>
        <title>Inicio de Sesión</title> 
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet"> 
        <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="col-lg-12">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    
                    <div class="container-login">
                        <div class="login-cabezera">
                            <p>Inicio de Sesión</p>
                        </div>
                        <?php echo validation_errors();?>
                        <?php echo form_open("login/validar");?>
                        <div class="form-group">
                            <label for="nickname">Usuario</label>
                            <input type="text" class="form-control" name="nickname" />
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña</label>
                            <input type="password" class="form-control" name="pass" />
                        </div>
                        <button type="submit" class="btn btn-default">Iniciar</button>
                        <a href="<?php echo base_url();?>CUsuario"><button type="button" class="btn btn-default">Registrarme</button></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>