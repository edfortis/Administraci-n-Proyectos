<!--
    Tabla de Productos
-->
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
            <tr><td><a href="<?php echo base_url();?>procesar/agregar_producto"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span></button></a></td></tr>
            <tr><th>Nombre</th><th>Talla</th><th>Cantidad</th><th>Precio</th><th>Acciones</th></tr>
            <?php foreach ($items as $item){ ?>
                <tr><td><?=$item->nombre_producto?></td><td><?=$item->numero_talla?></td><td><?=$item->cantidad?></td>
                    <td><?=$item->precio?></td><td><a class="btn btn-default" href="#" role="button">borrar</a></td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>

