<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Agregar cliente</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <link rel="stylesheet" href="<?= base_url("/assets/bootstrap/bootstrap.min.css") ?>" /> 
        <link rel="stylesheet" href="<?= base_url("/assets/awesomplete/awesomplete.css") ?>" /> 
        
        
    </head>
    <body class="bg-dark">


    <?php   $this->load->view("plantillas/enlaces"); ?>
   
       <div id="create-client" class="container col-sm col-md-8 bg-dark">
       <h3 class="text-light">Agregar cliente</h3>

        <?php echo  form_open_multipart('cliente/create', array("onsubmit"=> "verificar(event)")); ?>
               
                <div class="row mt-1 ">
                    <div class="col-sm-12 col-md-6"> 
                        <label class="text-light" >Cedula (anverso)</label>
                        <input type="file"  class="form-control"  name="foto1"  onchange="show_loaded_image(event,'#f-1')" /> 
                        <div  class="container mt-1 w-100" id="f-1"  >
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label class="text-light">Cedula (reverso)</label> 
                        <input type="file"  class="form-control"  name="foto2"  onchange="show_loaded_image(event,'#f-2')" /> 
                        <div  class="container mt-1 w-100" id="f-2"  >
                        </div>
                    </div>
                    
                </div> 
        
        
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <label class="text-light" for="cedula">(*)CI</label>
                        <input class="form-control" type="text"  id="ci" name="cedula" oninput="numericInput(event)" />
                        <label  class="text-light" for="nombres">(*)Nombres</label>
                        <input class="form-control" type="text" name="nombres"  maxlength="40" />
                        <label  class="text-light" for="apellidos">(*)Apellidos</label>
                        <input class="form-control"  type="text" name="apellidos" maxlength="40"  />
                    </div><!--fin col -->

                    <div  class="col-sm-12 col-md-3">
                        <label  class="text-light" for="domicilio">(*)Direccion</label>
                        <input class="form-control"  type="text" name="domicilio"  maxlength="80" />
                        <label   class="text-light"for="telefono">(*)Telefono</label>
                        <input class="form-control" type="text" name="telefono"  maxlength="20"  />
                        <label  class="text-light" for="celular">Celular</label>
                        <input class="form-control"  type="text" name="celular" maxlength="20"   />
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <label  class="text-light" for="salario">Salario</label>
                        <input class="form-control"  type="text" name="salario" oninput="numericInput(event)" />
                        <label  class="text-light" for="est_civil">Estado civil</label>
                        <select  class="form-control"   name="est_civil" >
                            <option value="0"></option>
                            <option value="S">Soltero/a</option>
                            <option value="C">Casado/a</option>
                            <option value="V">Viudo/a</option>
                        </select> 
                        <label  class="text-light"  for="trabajo">Trabajo:</label>
                        <input class="form-control"  type="text" name="trabajo" maxlength="30"/> 
                    
                    </div><!--fin col -->

                
                    
                    <div class="col-sm-12 col-md-3">
                        <label   class="text-light"  for="teletrabajo">Teletrabajo:</label>
                        <input  class="form-control" type="text" name="teletrabajo" maxlength="20"/>  
                        <label   class="text-light"  for="ciudad">Ciudad:</label>
                        <input  class="form-control awesomplete"  type="text" name="ciudad" id="autociu"   maxlength="30" />
                        <br>
                        <?php  if( $this->session->userdata("tipo")=="S"):?>
                            <input placeholder="VENDEDOR/A" class="form-control mt-1 awesomplete"  id="autovendedor" type="text" name="vendedor"  />
                        <?php  endif;?>
                        <?php  if( $this->session->userdata("tipo")=="V"):?>
                            <input  type="hidden" name="vendedor" value="<?= $this->session->userdata("id")?>"  />
                        <?php  endif;?>
                        <input type="hidden" name="estado" value="P" />       
                        <label   class="text-light" for="monto">(*)Importe solicitado:</label>
                        <input class="form-control" type="text" name="monto" oninput="numericInput(event)" /> 
                        
                        <?php  if( $this->session->userdata("tipo")!="V"):?>
                        <label   class="text-light" for="empresa">(*)Empresa:</label>
                        <select class="form-control"   name="empresa">  
                            <option value="0"></option>
                             <option value="1">Majuvi</option>
                              <option value="2">Contrata</option>
                               <option value="3">J S/F</option>
                                <option value="4">Triton</option>  
                        </select>
                        <?php endif; ?>

                    </div> <!--end col --> 
                </div><!--end row-->
                 

                <div class="row mt-1 "> 
                    <div class="col-sm-12 col-md-4">   <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </div> 
            </form>
            <div class="container col-sm col-md-6 bg-dark text-warning" id="mensajes"></div> 
        </div>
        


        <script type="text/javascript" src= "<?= base_url("/assets/jquery/jquery-3.4.1.min.js") ?>" ></script>
        <script src="<?= base_url("/assets/jquery/popper.min.js")?>"  ></script>
        <script src="<?= base_url("/assets/bootstrap/bootstrap.min.js")?>"  ></script>

        <script src="<?= base_url("/assets/awesomplete/awesomplete.js") ?>" async></script>
        <script type="text/javascript" src="<?= base_url("/assets/my_js.js")."?v=".rand() ?>" ></script>

        
        <script type="text/javascript"> 

        //ingreso numero de cedula
        function clienteCiIngresado(){
            let cedula= $("#ci").val();
            if( cedula == ""){ alert("Por favor ingrese el numero de cedula");return false; }
            else{ return true;}
        }
        
        function clienteNomIngresado(){
            let ar= $("input[type=text][name=nombres]").val();
            if( ar == ""){ alert("Por favor ingrese el nombre");return false; }
            else{ return true;}
        }
        function clienteApeIngresado(){
            let ar= $("input[type=text][name=apellidos]").val();
            if( ar == ""){ alert("Por favor ingrese el apellido");return false; }
            else{ return true;}
        }

        function clienteDomiIngresado(){
            let ar= $("input[type=text][name=domicilio]").val();
            if( ar == ""){ alert("Por favor ingrese el domicilio");return false; }
            else{ return true;}
        }
        function clienteTelIngresado(){
            let ar= $("input[type=text][name=telefono]").val();
            if( ar == ""){ alert("Por favor ingrese al menos un numero de telefono");return false; }
            else{ return true;}
        }

        function clienteMontoIngresado(){
            let ar= $("input[type=text][name=monto]").val();
            if( ar == ""){ alert("Por favor ingrese el monto");return false; }
            else{ return true;}
        }
        function camposLlenos(){
            return ( clienteCiIngresado() && clienteNomIngresado()  && clienteApeIngresado() &&
             clienteDomiIngresado() && clienteTelIngresado() && clienteMontoIngresado());
        }

        //evitar registro de clientes existentes
        function clienteYaExiste(  evt){
            return new Promise( (exito, fallo)=>{
                let cedula= $("#ci").val();
                $("#mensajes").html("Espere un momento...");
                $.get( "/crediweb/cliente/get/"+cedula,  function(ar){
                    
                    let res= JSON.parse( ar );
                    if( "error"  in res) //cliente no existe, y no lo tiene ningun vendedor, proceder entonces
                    {
                        exito( evt);
                       
                    }
                    else{ 
                        $("#mensajes").html("");
                        alert("Este cliente ya esta registrado");  
                        $("#ci").val();
                        fallo();}
                } );
            }); 
        }



        function vendedorCiValido(){
            if( Object.keys( $("#autovendedor") ).length ){
                let cedVend= $("#autovendedor").val();
                if(listaDeVendedores.length){
                    let res=listaDeVendedores.filter( (ar)=> ar.value == cedVend);
                    if( res.length==0){
                        alert("El numero de cedula del vendedor no es valido.");
                        return false;
                    }  return true;
                }
            } return true;
        }


        function verificar( evt){
            evt.preventDefault();
            if( camposLlenos() &&  vendedorCiValido()){
                clienteYaExiste(  evt).
                then( function( evt){
                    peticionWithMsg(evt, '#create-client');
                });
            }; 
        }



        //Autocompletado de ciudades
            $(document).ready(function(){    
                autoCompleteCiudades(document.getElementById("autociu"));  });  
                <?php  if( $this->session->userdata("tipo")=="S"):?>
                    autoCompleteVendedores(document.getElementById("autovendedor")) ;  
                <?php  endif;?>
                       
                 
        </script>




        </body>
</html>