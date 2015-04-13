<!--
    Tabla de Productos
-->
   
   <div class="container">
   </ br>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-4">
                <p>los post</p>
                <?php var_dump($post)?>
                <p>el archivo file</p>
                <?php var_dump($file)?>
            </div>
            <div class="col-md-4">
              <?php echo validation_errors();?>
              <?php echo form_open_multipart("procesar/agregar_producto");?>
              <div class="form-group">
                <label for="nombre_producto">Nombre Producto</label>
                <input type="text" class="form-control" name="nombre_producto">
                
              </div>
              <div class="form-group">
                <label for="img">Imagen</label>
                <input type="file" class="btn btn-primary" name="img">
                <p class="help-block">Busca una imagen en tu disco</p>
              </div>
              <div class="form-group">
                <label for="idtalla">Talla</label>
                <select name="idtalla" class="form-control">
                    <?php foreach ($talla as $tallas){ ?>
                        <option value="<?=$tallas['idtalla']?>"><?=$tallas['numero_talla']?></option>    
                    <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="idcolor">Color</label>
                <select name="idcolor" class="form-control">
                    <?php foreach ($color as $colores){ ?>
                        <option value="<?=$colores['idcolor']?>"><?=$colores['nombre_color']?></option>
                    <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" name="precio">
              </div>
              <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="text" class="form-control" name="cantidad">
              </div>
              
              <button type="submit" class="btn btn-default">Guardar</button>
            </form>
            </div>
            
        </div>
    </div>

