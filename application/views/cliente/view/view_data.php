<?php  $this->load->view("cliente/edit/view_foto") ?>   

    <div class="row mt-1 ">
        <div class="col-sm-12 col-md-3 ">
               <label class="text-light" for="cedula">CI</label>  <input class="form-control" type="text"  name="ci" readonly value="<?= $datos->cedula?>"/>
                <label class="text-light" for="nombres">Nombres</label>   <input class="form-control"   type="text" name="nombres" readonly value="<?= $datos->nombres?>" />
                <label class="text-light" for="apellidos">Apellidos</label>  <input class="form-control"  type="text" name="apellidos" readonly value="<?= $datos->apellidos?>"/>
                <label class="text-light" for="domicilio">Direccion</label>   <input class="form-control"  type="text" name="direccion" readonly value="<?= $datos->domicilio?>" />
        </div>

        <div  class="col-sm-12 col-md-3 ">
            <label class="text-light" for="ciudad">Ciudad</label> 
            <input class="form-control"   type="text" name="ciudad" readonly  value="<?= $datos->ciudad?>"/>  
            <label class="text-light" for="est_civil">Estado civil</label>
            <select  id="civil" class="form-control"   name="est_civil" disabled >
                    <option value="0"> </option>
                    <option value="S">Soltero/a</option>
                    <option value="S">Soltero/a</option>
                    <option value="C">Casado/a</option>
                    <option value="V">Viudo/a</option>
            </select>  
            <label class="text-light" for="telefono">Telefono 1</label> <input class="form-control"  type="text" name="telefono1" readonly value="<?= $datos->telefono?>" />
            <label class="text-light" for="celular">Telefono 2</label>  <input class="form-control"  type="text" name="telefono2" readonly  value="<?= $datos->celular?>"/>
           
        </div>

        <div class="col-sm-12 col-md-3 ">
            <label class="text-light" for="salario">Salario</label>  <input class="form-control"  type="text" name="salario"  readonly value="<?= $datos->salario?>"/>
            <label class="text-light" for="trabajo">Trabajo:</label>  <input class="form-control"  type="text" name="trabajo"  readonly  value="<?= $datos->trabajo?>"/>
            <label class="text-light" for="teletrabajo">Teletrabajo:</label>  <input class="form-control"  type="text" name="teletrabajo"  readonly value="<?= $datos->teletrabajo?>"/>
            <label class="text-light" for="monto">Importe solicitado</label> <input class="form-control"  type="text" name="monto" readonly  value="<?= $datos->monto?>"/>
        </div>

        <div class="col-sm-12 col-md-3 ">
             <?php if($datos->estado!="P" ): ?>
                <label class="text-light" for="monto">Importe Aprobado</label>
                <input class="form-control"  type="text" name="monto" readonly  value="<?= $datos->monto_a?>"/>
             <?php else: ?>
                <label class="text-light" for="estado">Estado</label>
                <input class="form-control"  type="text" name="estado" readonly  value="<?= $datos->estado=="P"?"(PENDIENTE)": ($datos->estado=="R"?"(RECHAZADO)":"(APROBADO)")?>"/>
            <?php  endif; ?>
            <label class="text-light" for="empresa">Empresa</label> 
             <select id="empresa" class="form-control"   name="empresa" disabled  >
                            <option value="0"></option>
                             <option value="1">Majuvi</option>
                              <option value="2">Contrata</option>
                               <option value="3">J S/F</option>
                                <option value="4">Triton</option>  
                </select> 
           <label class="text-light" for="observacion">Observaci&oacute;n</label> 
            <textarea rows="1" class="form-control"  name="observacion"  readonly >   <?= $datos->observacion?></textarea>
        
        </div>


        <div class="col-sm-12 col-md-6 text-light"> 
        </div>
    </div>
               
    <script>
        document.getElementById("civil").value= "<?=$datos->est_civil?>"; 
        document.getElementById("empresa").value= "<?=$datos->empresa?>"; 
    </script>       