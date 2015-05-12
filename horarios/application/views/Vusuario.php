<!--
    Tabla de Usuarios
-->
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
            <tr><td><a href="<?php echo base_url();?>CUsuario"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span></button></a></td></tr>
            <tr><th>Nombre</th><th>Perfil</th><th>Estado</th><th>Acciones</th></tr>
           
            <?php foreach ($items as $item){ ?>
                 <?php 
                if($item->perfil == 1)
                {
                    $perfil = 'Docente';
                }else if($item->perfil == 2)
                {
                    $perfil = 'Administrador';
                }
            ?>
                <tr><td><?=$item->nickname?></td>
                    <td><?=$perfil?></td>
                    <td><?php if($item->activado == 1){echo 'Activado';}else{echo 'Desactivado';}?></td>
                    
                  <td>
                    <?php 
                    if($item->activado != 1){
                        
                    ?>
                    <a href="<?php echo base_url();?>CUsuario/activar/<?=$item->idUsuario?>" title="Activar Cuenta" ><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a> 
                    <?php
                        }else{
                    ?>
                    <a href="<?php echo base_url();?>CUsuario/desactivar/<?=$item->idUsuario?>" title="Desactivar Cuenta" ><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
                    <?php
                        } 
                    ?>
                    <a href="<?php echo base_url();?>CUsuario/index/<?=$item->idUsuario?>" title="Modificar" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></a>
                    <a href="<?php echo base_url();?>CUsuario/eliminar_usuario/<?=$item->idUsuario?>" title="Borrar" onclick="return confirm('estas seguro?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                  </td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
      
        <hr>


      