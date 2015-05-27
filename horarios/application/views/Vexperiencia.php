<!--
    Tabla de Experiencia
-->
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
            <tr><td><a href="<?php echo base_url();?>CExperiencia"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span></button></a></td></tr>
            <tr><th>Nombre</th><th>NRC</th><th>Bloque</th><th>Seccion</th><th>Creditos</th><th>Licenciatura</th></tr>
            <!--'nombre','nrc','bloque','seccion','creditos','Licenciaturas_idLicenciatura-->
           
            <?php foreach ($items as $item){ ?>
                <tr><td><?=$item->nombre?></td>
                    <td><?=$item->nrc?></td>
                    <td><?=$item->bloque?></td>
                    <td><?=$item->seccion?></td>
                    <td><?=$item->creditos?></td>
                    <td><?=$item->Licenciaturas_idLicenciatura?></td>

                    <td>
                    <a href="<?php echo base_url();?>CExperiencia/index/<?=$item->idExperiencia?>" title="Modificar" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></a>
                    <a href="<?php echo base_url();?>CExperiencia/eliminar_experiencia/<?=$item->idExperiencia?>" title="Borrar" onclick="return confirm('estas seguro?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                  </td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>