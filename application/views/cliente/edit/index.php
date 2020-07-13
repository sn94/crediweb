<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Editar cliente</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url("/assets/bootstrap/bootstrap.min.css") ?>" /> 
        <link rel="stylesheet" href="<?= base_url("/assets/awesomplete/awesomplete.css") ?>" /> 

        <style>
        .input-group-text{
            padding: 0px;
        }
        .button-search{
            height: 100%;
            width:100%;
            margin: 0px;
        }
        </style>
        <script>
            var  verificarAntesDelEnvio;
        </script>

    </head>
    <body class="bg-dark">
     
        <?php    $this->load->view("plantillas/enlaces");  ?>

        <div class="container col-md-6 col-sm bg-dark">
           
            <h3 class="text-light text-center">
                <?=   $this->session->userdata("tipo") == "A"? "Aprobar/rechazar credito" : "Editar cliente" ?> 
            </h3>
        </div><!--end container -->

        <!--div que envuelve al formulario de edicion -->
        <div id="edit-client" class="container col-sm col-md-8 bg-dark"> 
            <?php 
                if( $this->session->userdata("tipo")=="S" ) 
                $this->load->view("cliente/edit/edit_data_s", $datos ) ;
                if( $this->session->userdata("tipo")=="A" ) 
                $this->load->view("cliente/edit/edit_data_a", $datos ) ;
                if( $this->session->userdata("tipo")=="V" ) 
                $this->load->view("cliente/edit/edit_data_v", $datos ) ;
            ?>
                
        </div><!--end div edit client -->

        <!--div mensajes -->
        <div class="container col-sm col-md-6 bg-dark text-warning" id="mensajes"></div> 
        <!--end div mensajes -->

        
        <script type="text/javascript" src= "<?= base_url("/assets/jquery/jquery-3.4.1.min.js") ?>" ></script>
        <script src="<?= base_url("/assets/jquery/popper.min.js")?>"  ></script>
        <script src="<?= base_url("/assets/bootstrap/bootstrap.min.js")?>"  ></script>
        <script src="<?= base_url("/assets/awesomplete/awesomplete.js") ?>" async></script>
        <script type="text/javascript" src=<?= base_url("/assets/my_js.js")."?v=".rand()  ?> ></script>
        <script>
        
        /** Verifica si el credito ha sido aprobado o no */
        function estadoDeCredito (){ 
             let ci= $("#ci-busq").val();
            $.get( "/crediweb/cliente/confirmar/"+ci,  function(res){
                    let res_json= JSON.parse( res);  
                    if( "confirmado" in res_json){  alert(  res_json.confirmado);   } 
            });
        }

        /** /** PROMISE - Verifica si el credito ha sido aprobado o no **/
        function creditoParaConfirmar( exito, fallo){
            new Promise((resolver, rechazar) => {
                    //la peticion
                    let ci= $("input[name=cedula]").val();
                    console.log( ci);
                        $.get( "/crediweb/cliente/confirmar/"+ci,  function(res){
                        try{
                                let res_json= JSON.parse( res);  
                                if( "confirmado" in res_json){ alert(  res_json.confirmado); 
                                }else{                       exito();   }
                        }catch(er){  console.log("json error"); }
                        });
            }) .then(exito).catch( fallo);

        }

        

        function checkErrorBeforeEdit(res){
                try{ //El mensaje de error 
                    let res_json= JSON.parse( res);  
                    if( "error" in res_json){    //No existe cliente
                        alert(  res_json.error);   
                        $("#ci-busq").val("");  
                        $("#mensajes").html("");
                    }
                }
                catch(er){
                    <?php   if( $this->session->userdata("tipo") == "A"){ ?>
                    estadoDeCredito();//verifica si credito ha sido APROBADO O RECHAZADO
                    <?php  } ?> 
                    $( "#edit-client").html( res );//mostrar datos de cliente
                    $("#mensajes").html("");//borrar mensaje de estado 
                }
            }


        //Busqueda de cliente por cedula
            function buscarCliente(ev){
                ev.preventDefault();
              
                let ruta=  ev.target.action;
                let ci= $("#ci-busq").val();
                $.ajax({
                    url: ruta+"/"+ci,
                    method:"get",
                    success: checkErrorBeforeEdit,
                    beforeSend: function(){
                        $("#mensajes").html("Espere un momento...");
                    }

                }); 

            }

         
         
         


            verificarAntesDelEnvio= function(evt){
                evt.preventDefault();
                new Promise((exito, fallo)=>{
                    evt.preventDefault();
                    <?php   if( $this->session->userdata("tipo") == "A"){ ?>
                        creditoParaConfirmar(
                            ()=>{ 
                                peticionWithMsg(evt,'#edit-client');
                                exito();
                                },
                            ()=>{ 
                                console.log("No puede ser aprobado ni rechazado");
                                exito(); }
                        );
                    <?php  } ?> 


                    <?php   if( $this->session->userdata("tipo") != "A"){ ?> 
                        peticionWithMsg(evt,'#edit-client'); 
                        exito();
                    <?php  } ?>
                }).then( function(){   $("#ci-busq").val(""); });

            }




            
            //Autocompletado de ciudades
            $(document).ready(function(){   
            autoCompleteCiudades(document.getElementById("autociu"));
            
             $('select[name=est_civil]').val('<?= $datos->est_civil?>');
             $('select[name=estado]').val('<?= $datos->estado?>'); 
             $('select[name=empresa]').val('<?= $datos->empresa?>'); 
                
                
            });   
           



        </script>

    </body>
</html>