<!--
    Tabla de Productos
-->
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
            <tr><td><a href="<?php echo base_url();?>procesar/agregar_producto"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span></button></a></td></tr>
            <tr><th>Nombre</th><th>Talla</th><th>Color</th><th>Tipo</th><th>Cantidad</th><th>Precio</th><th>Acciones</th></tr>
            
            <?php foreach ($items as $item){ ?>
                <tr><td><?=$item->nombre_producto?></td>
                    <td><?=$item->numero_talla?></td>
                    <td><?=$item->nombre_color?></td>
                    <td><?=$item->nombre_tipo?></td>
                    <td><?=$item->cantidad?></td>
                    <td><?=$item->precio?></td>
                    <td><a href="<?php echo base_url();?>procesar/modificar_producto/<?=$item->idproducto?>" title="Modificar" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></a>
                    <a href="<?php echo base_url();?>procesar/delete_producto/<?=$item->idproducto?>" title="Borrar" onclick="return confirm('estas seguro?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>

