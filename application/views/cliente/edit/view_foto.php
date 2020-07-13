<div class="row mt-1 ">
        <?php  if( $datos->foto1 && $datos->foto2):?>
            <div class="col-sm-12 col-md-6"> 
                            <label class="text-light" >Cedula (anverso)</label>
                            <input type="file"  class="form-control"  name="foto1"  onchange="show_loaded_image(event,'#f-1')"/> 
                            <div  class="container mt-1 w-100" id="f-1"  > 
                                <?php if( $datos->foto1):?>
                                    <img src="../../<?=  $datos->foto1?>" style="width:100%;max-height:200px;" >
                                <?php endif;?> 
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="text-light">Cedula (reverso)</label> 
                            <input type="file"  class="form-control"  name="foto2"  onchange="show_loaded_image(event,'#f-2')" /> 
                            <div  class="container mt-1 w-100" id="f-2"  >
                            <?php if( $datos->foto2):?>
                                    <img src="../../<?=  $datos->foto2?>" style="width:100%;max-height:200px;" >
                                <?php endif;?> 
                            </div>
                        </div>
        <?php   else: ?>
            <div class="col-sm-12 col-md-6 text-warning">  Sin im&aacute;genes de C&eacute;dula de identidad
            </div>
        <?php   endif; ?>          
    </div> 