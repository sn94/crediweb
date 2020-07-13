 
                        <table id="example" class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered  table-hover table-sm">
                            <thead class="thead-dark ">
                                <th>Ci</th><th>Nombres</th><th>Telefono</th> <th>Vendedor</th>
                                <th></th>  <th></th> 
                               
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
                                    <td>  <?=  $item->vendedor ?> </td>   
                                    <td>
                                        <a   class="btn btn-light"    href="/crediweb/cliente/edit/<?= $item->cedula ?>">
                                        <img src="<?= base_url("assets/img/edit.png")?>" />
                                        </a>
                                    </td>
                                    <td> 
                                        <?php if( $item->estado != "A"): ?>
                                            <button   class="btn btn-light"  onclick="preguntarParaBorrar('<?= $item->cedula ?> ');"  >
                                            <img src="<?= base_url("assets/img/del.png")?>" />
                                            </button>
                                        <?php else: ?>
                                        -
                                        <?php endif;  ?>
                                        
                                    </td> 
                                    
                                </tr>
                                
                                <?php } ?>
                            </tbody>
                        </table>
     
      
     
        <script>
        
             

            function preguntarParaBorrar(cedula){
                if(confirm("Borrar datos de "+$("#nom-"+cedula).text() + "?" ) ){
                    $.get("/crediweb/cliente/del/"+cedula, function(res){
                        if( parseInt(res) ){
                             alert("Cliente eliminado");
                             //eliminar fila de la tabla
                             $("#nom-"+cedula).parent().remove();
                        }
                    });
                }
            }
            

          

           $(document).ready( function(){
            $('#example').DataTable(); 
           });

          

        </script>

 