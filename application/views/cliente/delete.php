<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Borrar cliente</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url("/assets/bootstrap/bootstrap.min.css") ?>" /> 
       
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

    </head>
    <body class="bg-dark">
      
        <?php  $this->load->view("plantillas/enlaces");  ?> 


        <div class="container col-md-6 col-sm bg-dark">
        <h3 class="text-light">Borrar cliente</h3>
        <?php
        $attributes = array('method' => 'get',  'onsubmit' => "buscarCliente(event)");
        echo form_open('cliente/getforread', $attributes); ?>
                <h5 class="text-light">Buscar</h5>


                <div class="input-group mb-2 mr-sm-2">
                    <input class="form-control" type="text"  id="ci-busq" oninput="numericInput(event)"/>
              
                    <div class="input-group-prepend">
                        <div class="input-group-text"> <button type="submit" class="btn btn-info button-search" > Ok</button></div>
                    </div>
                   
                </div>
 
        </form>
          
        </div>

        <div id="btndel"   class="container col-md-6 col-sm invisible  bg-dark"> 
            <button class="btn btn-info btn-sm" type="button"  onclick="confirmarBorrar()">Borrar</button>
        </div>
 
       
        <div id="del-client" class="container col-md-6 col-sm bg-dark"> 
         
        </div>


   


        
    <script type="text/javascript" src= "<?= base_url("/assets/jquery/jquery-3.4.1.min.js") ?>" ></script>
    <script src="<?= base_url("/assets/jquery/popper.min.js")?>"  ></script>
    <script src="<?= base_url("/assets/bootstrap/bootstrap.min.js")?>"  ></script>


    <script type="text/javascript" src=<?= base_url("/assets/my_js.js") ?> ></script>
      

        <script>

            function mostrarBotonBorrar(){
                $("#btndel").removeClass("invisible").addClass("visible");
            }

            
            function ocultarBotonBorrar(){
                $("#btndel").removeClass("visible").addClass("invisible");
            }
              function checkErrorBeforeDelete(res){
                try{ //El mensaje de error 
                    let res_json= JSON.parse( res); console.log( res_json);
                    if( "error" in res_json){   
                         alert(  res_json.error);
                         $("#ci-busq").val("")  ;
                    }
                }
                catch(er){
                    $( "#del-client").html( res ); 
                    $("#ci-busq").val("")  ;
                    mostrarBotonBorrar();
                }
            }


            function buscarCliente(ev){
                ev.preventDefault();
                let ruta=  ev.target.action;
                let ci= $("#ci-busq").val();
                $.get( ruta+"/"+ci,  function(res){  checkErrorBeforeDelete(res ); }  ) ;
                
            }

            function showResult( res){
                $( "#del-client").html( res );
                ocultarBotonBorrar();

            }
        
            function confirmarBorrar(){
              let resp=   confirm("Seguro que desea borrar este registro?");
              if( resp){
                  let ci= $("input[type=text][name=ci]").val();
                  let url=  "<?= base_url("/cliente/delete/") ?>"+ ci; 
                  $.get( url, showResult);
              }else{
                $( "#del-client").html( "" ); $("#ci-busq").val("");
              }
            }

        </script>

    </body>
</html>