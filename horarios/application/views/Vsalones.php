<!--
    Tabla de Usuarios
-->
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
            <tr><td><a href="<?php echo base_url();?>CSalon"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span></button></a></td></tr>
            <tr><th>Nombre</th><th>Acciones</th></tr>
           
          <?php foreach ($items as $item){ ?>
                
                <tr><td><?=$item->nombre?></td>                                                                            
                  <td>
                    
                                                     
                    <a href="<?php echo base_url();?>CSalon/index/<?=$item->idSalon?>" title="Modificar" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></a>
                    <a href="<?php echo base_url();?>CSalon/eliminar_salon/<?=$item->idSalon?>" title="Borrar" onclick="return confirm('estas seguro?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                  </td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
      
        <hr>


      