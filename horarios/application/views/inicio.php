 <!-- Page Content -->
    <div class="container">
         
        <!-- Marketing Icons Section -->
        
        <!-- /.row -->

        <!-- form section -->
        <div class="row">
            <div class="col-lg-12">
              
               <div class="col-md-3 col-sm-4">
               <?php echo form_open('sitio/cargar/inicio');?>
               <div class="form-group label-uv">
                  <label for="carrera">Carrera</label>
                  <select class="form-control" name="carrera">
                  <?php foreach ($Licenciatura as $item){ ?>
                      
                    <option value="<?=$item->Licenciaturas_idLicenciatura?>"><?=$item->nombre?></option>     
                  
                  <?php }?>
                  </select> 
               </div>
               </div>
               <div class="col-md-3 col-sm-4">
                 <div class="form-group label-uv">
                  <label for="carrera">Materia</label>
                  <select class="form-control" name="carrera">
                  <?php foreach ($Experiencia as $item){ ?>
                    <option value="<?=$item->Experiencias_idExperiencia?>"><?=$item->nombre?></option>     
                  <?php }?>
                  </select> 
               </div>    
               </div>
               </form>
            
            <div class="col-md-3 col-sm-4">
                
                    <br />
                    <button type="button" class="btn btn-default" id="btn-guardar"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                    <button type="button" class="btn btn-default" id="btn-revert" ><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                    
            </div>
         </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-3">
                    <div class="panel  ">
                        <div class="panel-heading radio-cabecera cabecera-panel">Horas disponibles</div>
                        <br />
                        <div class="caja-tiempo color-verde draggable" id="draggable" ><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>
                        <div class="caja-tiempo color-verde draggable" id="draggable" ><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>
                        <div class="caja-tiempo color-verde draggable" id="draggable" ><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>
                        <div class="caja-tiempo color-verde draggable" id="draggable" ><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>
                        <div class="caja-tiempo color-verde draggable" id="draggable" ><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>
                        <div class="caja-tiempo color-verde draggable" id="draggable" ><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="tabs">
                      <ul class="cabecera-panel">
                        <li><a class="label-uv" href="#tabs-1">Salon 1</a></li>
                        <li><a class="label-uv" href="ajax/content1.html">Salon 2</a></li>
                        <li><a class="label-uv" href="ajax/content2.html">Salon 3</a></li>
                        <li><a class="label-uv" href="ajax/content3-slow.php">Salon 4</a></li>
                        <li><a class="label-uv" href="ajax/content4-broken.php">Salon 5</a></li>
                      </ul>
                      <div id="tabs-1">
                        <div class="panel panel-default">
                              <!-- Default panel contents -->
                              <div class="panel-heading">Arrastra tus horas aqui!</div>
                            
                              <!-- Table -->
                              <table class="table table-condensed table-bordered">
                                <tr><th>Horario</th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th></tr>
                                <tr><td>7:00-7:59</td><td class="fijarse" id="L1"></td><td class="fijarse" id="M1"></td><td class="fijarse" id="X1"></td><td class="fijarse" id="J1"></td><td class="fijarse" id="V1"></td></tr>
                                <tr><td>8:00-8:59</td><td class="fijarse" id="L2"></td><td class="fijarse" id="M2"></td><td class="fijarse" id="X2"></td><td class="fijarse" id="J2"></td><td class="fijarse" id="V2"></td></tr>
                                <tr><td>9:00-9:59</td><td class="fijarse" id="L3"></td><td class="fijarse" id="M3"></td><td class="fijarse" id="X3"></td><td class="fijarse" id="J3"></td><td class="fijarse" id="V3"></td></tr>
                                <tr><td>10:00-10:59</td><td class="fijarse" id="L4"></td><td class="fijarse" id="M4"></td><td class="fijarse" id="X4"></td><td class="fijarse" id="J4"></td><td class="fijarse" id="V4"></td></tr>
                                <tr><td>11:00-11:59</td><td class="fijarse" id="L5"></td><td class="fijarse" id="M5"></td><td class="fijarse" id="X5"></td><td class="fijarse" id="J5"></td><td class="fijarse" id="V5"></td></tr>
                                <tr><td>12:00-12:59</td><td class="fijarse" id="L6"></td><td class="fijarse" id="M6"></td><td class="fijarse" id="X6"></td><td class="fijarse" id="J6"></td><td class="fijarse" id="V6"></td></tr>
                                <tr><td>13:00-13:59</td><td class="fijarse" id="L7"></td><td class="fijarse" id="M7"></td><td class="fijarse" id="X7"></td><td class="fijarse" id="J7"></td><td class="fijarse" id="V7"></td></tr>
                                <tr><td>14:00-14:59</td><td class="fijarse" id="L8"></td><td class="fijarse" id="M8"></td><td class="fijarse" id="X8"></td><td class="fijarse" id="J8"></td><td class="fijarse" id="V8"></td></tr>
                                <tr><td>15:00-15:59</td><td class="fijarse" id="L9"></td><td class="fijarse" id="M9"></td><td class="fijarse" id="X9"></td><td class="fijarse" id="J9"></td><td class="fijarse" id="V9"></td></tr>
                                <tr><td>16:00-16:59</td><td class="fijarse" id="L10"></td><td class="fijarse" id="M10"></td><td class="fijarse" id="X10"></td><td class="fijarse" id="J10"></td><td class="fijarse" id="V10"></td></tr>
                                <tr><td>17:00-17:59</td><td class="fijarse" id="L11"></td><td class="fijarse" id="M11"></td><td class="fijarse" id="X11"></td><td class="fijarse" id="J11"></td><td class="fijarse" id="V11"></td></tr>
                                <tr><td>18:00-18:59</td><td class="fijarse" id="L12"></td><td class="fijarse" id="M12"></td><td class="fijarse" id="X12"></td><td class="fijarse" id="J12"></td><td class="fijarse" id="V12"></td></tr>
                                <tr><td>19:00-19:59</td><td class="fijarse" id="L12"></td><td class="fijarse" id="M13"></td><td class="fijarse" id="X13"></td><td class="fijarse" id="J13"></td><td class="fijarse" id="V13"></td></tr>
                                <tr><td>20:00-20:59</td><td class="fijarse" id="L14"></td><td class="fijarse" id="M14"></td><td class="fijarse" id="X14"></td><td class="fijarseJ" id="J14"></td><td class="fijarse" id="v14"></td></tr>
                                
                                
                              </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        
        

        <hr>