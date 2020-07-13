<?php  echo form_open_multipart("cliente/edit/{$datos->cedula}", array("onsubmit" => "verificarAntesDelEnvio(event)") ) ; ?>
               
    <p class="text-right"> 
        <span class="badge badge-pill badge-primary" style="font-size: 14px;">  Vendedor: <?= $datos->vendedor." ".$datos->nombrevend?></span>   
    </p>


    

    <?php  $this->load->view("cliente/edit/view_foto") ?>    

    <div class="row">
        <div class="col-sm col-md-6">
        <button class="btn btn-info w-100"  type="submit"  >Confirmar</button>
        </div>
    </div>

    <div class="row">
        <div class="col-sm col-md-4">
            <label class="text-light" for="cedula">CI</label> <input class="form-control" type="text"  name="cedula" readonly value="<?= $datos->cedula?>"/>
            <label class="text-light" for="nombres">Nombre completo:</label>   <input class="form-control" type="text" name="nombres"  disabled   value="<?= $datos->nombres." ".$datos->apellidos ?>" />      
            <label class="text-light" for="domicilio">Direccion</label>  <input  class="form-control" type="text" name="domicilio"  <?= $this->session->userdata("tipo") == "A"?"disabled":""?>  maxlength="80" value="<?= $datos->domicilio?>" />
            <label class="text-light" for="telefono">Telefono</label>  <input class="form-control" type="text" name="telefono" <?= $this->session->userdata("tipo") == "A"?"disabled":""?>  maxlength="20"  value="<?= $datos->telefono?>" />
            <label class="text-light"  for="celular">Celular </label>  <input class="form-control" type="text" name="celular"  <?= $this->session->userdata("tipo") == "A"?"disabled":""?> maxlength="20"   value="<?= $datos->celular?>"/>      
        </div> 
        <div  class="col-sm col-md-4">
            <label class="text-light" for="ciudad">Ciudad:</label>  <input  type="text" name="ciudad" class="form-control mt-1"   value="<?= $datos->ciudad?>"   <?= $this->session->userdata("tipo") == "A"?"disabled":""?>/>
            <label class="text-light" for="est_civil">Estado civil</label> 
            <select disabled  class="form-control"  name="est_civil"  <?= $this->session->userdata("tipo") == "A"?"disabled":""?> >
                        <option value="0"></option>
                        <option value="S">Soltero/a</option>
                        <option value="C">Casado/a</option>
                        <option value="V">Viudo/a</option>
            </select>
            <label class="text-light"  for="salario">Salario</label>  <input  class="form-control" type="text" name="salario"   <?= $this->session->userdata("tipo") == "A"?"disabled":""?>  value="<?= $datos->salario?>"    oninput="numericInput(event)"  />
            <label class="text-light" for="trabajo">Trabajo:</label> <input class="form-control" type="text" maxlength="30" name="trabajo" <?= $this->session->userdata("tipo") == "A"?"disabled":""?>   value="<?= $datos->trabajo?>"/>
            <label class="text-light" for="teletrabajo">Teletrabajo:</label>  <input class="form-control" maxlength="20"  type="text" name="teletrabajo" <?= $this->session->userdata("tipo") == "A"?"disabled":""?>   value="<?= $datos->teletrabajo?>"/>  
        </div>
        <div class="col-sm col-md-4">
            <label class="text-light"  for="estado">Estado de cr&eacute;dito</label>
            <select  <?= $datos->estado== "P" ? "": "disabled" ?>  class="form-control bg-primary text-light" onchange="habilitarMonto(event)"  name="estado" > 
                    <option class="bg-secondary  text-light" value="P">Pendiente</option>
                    <option class="bg-success  text-light" value="A" >Aprobado</option>
                    <option  class="bg-danger  text-light"value="R">Rechazado</option>
                </select >  

              
            <label class="text-light" for="monto_a">Importe Aprobado</label> 
            <div class="form-check form-check-inline">
                        <input disabled name="retirado"  class="form-check-input" type="checkbox" value="S" id="retired">
                        <label class="form-check-label text-warning" for="retired">
                            Retirado
                        </label>
            </div> 
            <input  id="montoa" class="form-control" disabled type="text" name="monto_a"   oninput="numericInput(event)"  />
                 
             

            <label class="text-light"  for="monto">Importe solicitado:</label> <input class="form-control" type="text" name="monto" <?= $this->session->userdata("tipo") == "A"?"disabled":""?>   oninput="numericInput(event)"  value="<?= $datos->monto?>"/>
            <label   class="text-light" for="empresa">(*)Empresa:</label>
            <select <?= $datos->estado== "P" ? "": "disabled" ?>  class="form-control"   name="empresa">  
                <option value="0"></option>
                <option value="1">Majuvi</option>
                <option value="2">Contrata</option>
                <option value="3">J S/F</option>
                <option value="4">Triton</option>  
            </select> 
            <label class="text-light" for="observacion">Observaci&oacute;n</label> 
            <textarea rows="1" class="form-control"  name="observacion"  > <?= $datos->observacion?></textarea>
           
        </div><!--end col-->
    </div>
     
 </form> 
 <script>
    function habilitarMonto( ev){ 
        document.getElementById("montoa").disabled= !(ev.target.value == "A"); 
        document.getElementById("retired").disabled= !(ev.target.value == "A"); 
    }
 </script>