<?php  echo form_open_multipart("cliente/edit/{$datos->cedula}", array("onsubmit" => "verificarAntesDelEnvio(event)") ) ; ?>
               


    
    <?php  $this->load->view("cliente/edit/view_foto") ?>    

    <div class="row">
        <div class="col-sm col-md-3">
            <label class="text-light" for="cedula">(*)CI</label>
            <input class="form-control" type="text"  name="cedula" readonly value="<?= $datos->cedula?>"/>
            <label class="text-light" for="nombres">(*)Nombres</label>  <input class="form-control" type="text" name="nombres" <?= $this->session->userdata("tipo") == "A"?"readonly":""?> maxlength="40" value="<?= $datos->nombres?>" />
            <label class="text-light" for="apellidos">(*)Apellidos</label> <input class="form-control" type="text" name="apellidos" <?= $this->session->userdata("tipo") == "A"?"readonly":""?> maxlength="40"  value="<?= $datos->apellidos?>"/>
        </div><!--end col-->

        <div class="col-sm col-md-3">
            <label class="text-light" for="domicilio">(*)Direccion</label>   <input  class="form-control" type="text" name="domicilio"  <?= $this->session->userdata("tipo") == "A"?"readonly":""?>  maxlength="80" value="<?= $datos->domicilio?>" />
            <label class="text-light" for="telefono">Telefono</label>  <input class="form-control" type="text" name="telefono"    maxlength="20"  value="<?= $datos->telefono?>" />
            <label class="text-light"  for="celular">Celular </label>  <input class="form-control" type="text" name="celular"   maxlength="20"   value="<?= $datos->celular?>"/>
        </div>
        <div class="col-sm col-md-3">
            <label class="text-light"  for="salario">Salario</label> <input class="form-control" type="text" name="salario"    oninput="numericInput(event)"  value="<?= $datos->salario?>"/>
            <label class="text-light mt-1" for="ciudad">Ciudad</label>  <input  type="text" name="ciudad" class="form-control"  id="autociu" value="<?= $datos->ciudad?>"   />
            <label class="text-light" for="est_civil">Estado civil</label> 
            <select  class="form-control" disabled name="est_civil"  >  <option value="0"></option> <option value="S">Soltero/a</option> <option value="C">Casado/a</option> <option value="V">Viudo/a</option>
            </select>
        </div><!--end col-->

        <div class="col-sm col-md-3"> 
            <label class="text-light" for="trabajo">Trabajo:</label>   <input class="form-control" type="text" maxlength="30" name="trabajo"    value="<?= $datos->trabajo?>"/>
            <label class="text-light" for="teletrabajo">Teletrabajo:</label>  <input class="form-control" maxlength="20"  type="text" name="teletrabajo"    value="<?= $datos->teletrabajo?>"/>
           
            <input type="hidden" name="vendedor" value="<?= $datos->vendedor?>"/>
             
            <label class="text-light" for="observacion">Observaci&oacute;n</label> 
            <textarea rows="1" class="form-control" disabled  name="observacion"  > <?= $datos->observacion?></textarea>
        </div><!--end col-->


    </div><!--end row-->

    <div class="row">
        <div class="col-sm col-md-3">
            <label class="text-light"  for="monto">Importe solicitado</label>
            <input class="form-control" type="text" name="monto"  <?= $datos->estado== "P" ? "": "readonly" ?> oninput="numericInput(event)"  value="<?= $datos->monto?>"/>   
        </div>
        <div class="col-sm col-md-3">
        <?php if($datos->estado== "A"): ?>
                <label class="text-light"  for="monto_a">Importe Aprobado</label>
                <input class="form-control" type="text" name="monto_a"  readonly  value="<?= $datos->monto_a?>"/>
            <?php else: ?>
                <label  class="text-light" for="est_prest"> Estado: </label> 
                <input type="text" class="form-control" disabled value="<?= $datos->estado=="P"?"(PENDIENTE)": ($datos->estado=="R"?"(RECHAZADO)":"(APROBADO)")?>">
            <?php  endif; ?>
        </div>
        <div class="col-sm col-md-3">
                <label   class="text-light" for="empresa">Empresa:</label>
                <select class="form-control"   name="empresa" disabled>
                    <option value="0"></option> <option value="1">Majuvi</option> <option value="2">Contrata</option> <option value="3">J S/F</option> <option value="4">Triton</option>  
                </select> 
        </div>
        <div class="col-sm col-md-3"> 
            <label class="text-light">Retiro:</label>
            <input type="text" class="form-control" disabled value="<?= ($datos->retirado== "S")?"(RETIRADO)":"(SIN RETIRAR)" ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm col-md-4">
        <button class="btn btn-info mt-1"  type="submit"  >Guardar</button> 
        </div>
    </div>
 </form> 