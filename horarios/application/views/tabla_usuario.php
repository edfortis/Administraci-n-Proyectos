<!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Usuarios
                </h1>
            </div>
            <div class="col-lg-12">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <?php echo validation_errors();?>
                    <?php echo form_open("login/validar");?>
                    <div class="form-group">
                        <label for="nombre">Nombre Usuario</label>
                        <input type="text" class="form-control" name="nombre" />
                    </div>
                    <button type="submit" class="btn btn-default">Iniciar</button>
                    </form>
                    
                </div>
            </div>
            </div>
     </div>
