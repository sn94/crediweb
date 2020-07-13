 
                        <table id="example" class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered  table-hover table-sm">
                            <thead class="thead-dark ">
                                <th>Ci</th><th>Nombres</th><th>Telefono</th><th>Vendedor</th>
                                <th></th>  
                            </thead>
                            <tbody>
                                <?php foreach($list as $item){?>
                                <tr  class="<?= (($item->estado== "P")? "table-secondary" :  ($item->estado=="A"?"table-success":"table-danger")) ?>">
                                    <td>
                                        <a href="/crediweb/cliente/view/<?= $item->cedula ?>"><?= $item->cedula ?> </a>
                                        <h6 class="<?= (($item->estado== "P")? "text-secondary" :  ($item->estado=="A"?"text-success":"text-danger")) ?>">
                                            <?="(".(($item->estado== "P")? "PENDIENTE" :  ($item->estado=="A"?"APROBADO":"RECHAZADO")).")" ?>
                                        </h6>
                                    </td> 
                                    <td id="nom-<?= $item->cedula ?>"><?= $item->nombres." ". $item->apellidos  ?></td>
                                    <td><?= $item->telefono ?></td>   
                                    <td>   <?=  $item->vendedor ?> </td>  
                                    <td>
                                    <?php if(($item->estado== "P")){ ?>
                                        <a   class="w-100 btn btn-danger"    href="/crediweb/cliente/edit/<?= $item->cedula ?>">
                                         Aprobar/rechazar 
                                        </a>
                                    <?php }else{
                                        if(($item->estado== "A")  && ($item->retirado== "N")){ ?>
                                        <button type="button"   class="w-100 btn btn-danger" onclick="confirmarRetiro(  <?= $item->cedula ?>)"  >
                                         Confirmar retiro
                                        </button>
                                    <?php }  else{  echo "-"; }  } ?>
                                    </td>  
                                </tr>
                                
                                <?php } ?>
                            </tbody>
                        </table>
            
        


       <script> 

       var confirmarRetiro; 


   $(document).ready( function(){
            $('#example').DataTable(); 


                confirmarRetiro= function( ced){
                let conf= confirm("Confirmar retiro de dinero?");
                if( conf){
                        let ruta="/crediweb/cliente/retirado/"+ced;
                        $.get( ruta, function( res){
                        let resp= JSON.parse(res);
                        if( "error" in resp) alert( resp.error);
                        else alert(resp.ok);
                        });
                }
                }/** end func */
    }); 
    </script>
 