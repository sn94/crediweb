<?php  echo form_open_multipart("cliente/edit/{$datos->cedula}", array("onsubmit" => "verificarAntesDelEnvio(event)") ) ; ?>
               
    <p class="text-right"> 
        <span class="badge badge-pill badge-primary" style="font-size: 14px;"> Vendedor: <?= $datos->vendedor." ".$datos->nombrevend?></span>   
    </p>

    <?php  $this->load->view("cliente/edit/view_foto") ?>    

    <div class="row">
        <div class="col-sm col-md-4">
            <label class="text-light" for="cedula">CI</label> <input class="form-control" type="text"  name="cedula" readonly value="<?= $datos->cedula?>"/>
            <label class="text-light"  for="estado">Estado de cr&eacute;dito</label>
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">  <div class="input-group-text"> <button class="btn btn-info button-search"  type="submit"  >Confirmar</button></div>
                </div>
                <select class="form-control bg-primary text-light"   name="estado" >  <option class="bg-secondary  text-light" value="P">Pendiente</option> <option class="bg-success  text-light" value="A" >Aprobado</option> <option  class="bg-danger  text-light"value="R">Rechazado</option>
                </select >     
            </div> 
            <label class="text-light" for="observacion">Observaci&oacute;n</label> <textarea rows="1" class="form-control"  name="observacion"  > <?= $datos->observacion?></textarea>
            
            <label class="text-light" for="nombres">Nombres</label> <input class="form-control" type="text" name="nombres"  maxlength="40" value="<?= $datos->nombres?>" />
            <label class="text-light" for="apellidos">Apellidos</label> <input class="form-control" type="text" name="apellidos"  maxlength="40"  value="<?= $datos->apellidos?>"/>
            <label class="text-light" for="domicilio">Direccion</label> <input  class="form-control" type="text" name="domicilio"     maxlength="80" value="<?= $datos->domicilio?>" />
             
            
        </div><!--end col-->
        <div class="col-sm col-md-4">
                <label class="text-light" for="ciudad">Ciudad</label>   <input  type="text" name="ciudad" class="form-control"  id="autociu" value="<?= $datos->ciudad?>"  />
                 <label class="text-light" for="telefono">Telefono</label>
                <input class="form-control" type="text" name="telefono"   maxlength="20"  value="<?= $datos->telefono?>" />
                <label class="text-light"  for="celular">Celular </label>
                <input class="form-control" type="text" name="celular"   maxlength="20"   value="<?= $datos->celular?>"/>
                <label class="text-light"  for="salario">Salario</label>
                <input class="form-control" type="text" name="salario"   oninput="numericInput(event)"   value="<?= $datos->salario?>"/>
               
                <label class="text-light" for="est_civil">Estado civil</label> 
                <select  class="form-control"  name="est_civil"  >
                        <option value="0"></option>
                        <option value="S">Soltero/a</option>
                        <option value="C">Casado/a</option>
                        <option value="V">Viudo/a</option>
                </select>
                 
        </div><!--end col-->
        <div class="col-sm col-md-4">
                 <label class="text-light" for="trabajo">Trabajo:</label>
                <input class="form-control" type="text" maxlength="30" name="trabajo"   value="<?= $datos->trabajo?>"/>
                <label class="text-light" for="teletrabajo">Teletrabajo:</label>
                <input class="form-control" maxlength="20"  type="text" name="teletrabajo"  value="<?= $datos->teletrabajo?>"/>
                <label   class="text-light" for="empresa">(*)Empresa:</label>
                <select class="form-control"   name="empresa">
                            <option value="0"></option>
                             <option value="1">Majuvi</option>
                              <option value="2">Contrata</option>
                               <option value="3">J S/F</option>
                                <option value="4">Triton</option>  
                </select> 
                <label class="text-light"  for="monto">Importe solicitado</label> 
                <input class="form-control" type="text" name="monto"     oninput="numericInput(event)"  value="<?= $datos->monto?>"/>
                
                <label class="text-light"  for="monto_a">Importe Aprobado</label>
                <input class="form-control" type="text" name="monto_a"      oninput="numericInput(event)"  value="<?= $datos->monto_a?>"/>
                
                <button class="btn btn-info mt-1"  type="submit"  >Guardar</button>
        </div><!--end col-->

    </div><!--end row-->

 </form> 