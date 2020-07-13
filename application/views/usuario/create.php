<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Agregar usuario</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url("/assets/bootstrap/bootstrap.min.css") ?>" /> 
        
        
    </head>
    <body class="bg-dark">
     
       
    <?php  $this->load->view("plantillas/enlaces");  ?> 


       <div class="container col-md-6 col-sm bg-dark" id="create-user">
       <h3 class="text-light">Agregar usuario</h3>
        <?php echo form_open('usuario/create', array("onsubmit"=> "verificar(event) ",  "autocomplete"=>"new-password" )); ?>
        
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label class="text-light" for="cedula">(*)CI</label>
                    <input autofocus id="ci" class="form-control" type="text"  name="cedula" oninput="numericInput(event)"    />
                    <label class="text-light" for="nombres">(*)Nombre completo</label>
                    <input   class="form-control" type="text" name="nombres"  maxlength="50" />
                    <label class="text-light" for="telefono">(*)Telefono </label>
                    <input     class="form-control" type="text" name="telefono"  maxlength="20"    />
                    <label class="text-light" for="celular">Celular</label>
                    <input      class="form-control"  type="text" name="celular" maxlength="20"   />
                    <label class="text-light" for="email">Email</label>
                    <input    class="form-control" type="text" name="email" maxlength="50"  />
                </div>
                <div class="col-sm-12 col-md-6">
                    <label class="text-light" for="observacion">Observacion</label>
                    <textarea    class="form-control"   name="observacion"></textarea>
                    <label class="text-light" for="usuario">(*)Usuario </label>
                    <input   value=""  class="form-control" type="text" id="nick" name="usuario"  maxlength="20"   />
                    <label class="text-light" for="pass">(*)Password</label>
                    <input    class="form-control" type="password" id="pass-nick"  name="pass" maxlength="20"   />
                    <label class="text-light" for="tipousuario">(*)Tipo de usuario:</label>
                    <select      class="form-control"  name="tipousuario" >
                        <option value="V">Vendedor</option>
                        <option value="A">Administrativo</option> 
                        <option value="S">Supervisor</option> 
                    </select>
                    <label class="text-light" for="comision">(*)Comisi&oacute;n </label>
                    <input   oninput="numericInput(event)"   class="form-control" type="text" name="comision"  maxlength="2"   />
                    <button class="mt-1 btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        
             
            </form>
        </div>


               
        <script type="text/javascript" src= "<?= base_url("/assets/jquery/jquery-3.4.1.min.js") ?>" ></script>
        <script  type="text/javascript" src="<?= base_url("/assets/jquery/popper.min.js")?>"  ></script>
        <script src="<?= base_url("/assets/bootstrap/bootstrap.min.js")?>"  ></script>

        <script type="text/javascript" src="<?= base_url("/assets/my_js.js")."?v=".rand()  ?>" ></script>
        <script>

          



            //CAMPOS CON DATOS
            function camposLlenos(){
               let cedula= $("form input[name=cedula]").val();
               let noms= $("form input[name=nombres]").val();
               let tel= $("form input[name=telefono]").val();
               let usu= $("form input[name=usuario]").val();
               let pass= $("form input[name=pass]").val();

               if(  cedula && noms && tel && usu && pass)    return true;
               else{
                   if(!cedula) alert("Ingrese el numero de cedula");
                   if(!noms) alert("Ingrese el nombre completo");
                   if(!tel) alert("Ingrese al menos un telefono de contacto");
                   if(!usu) alert("Ingrese el nick de usuario");
                   if(!pass) alert("Ingrese una clave de usuario");
                   return false;
               } 
            }


                /***Cedula */
                  //Existe numero de cedula
            function existeNumeroCedula(){
               return new Promise( (exito, fallo)=>{
                   let cedula= $("#ci").val();
                    $.get( "/crediweb/usuario/get/"+cedula,  function(ar){ 
                                        let res= JSON.parse( ar );
                                        if( "error"  in res)     exito();
                                        else{
                                            alert("Un usuario con cedula Nro "+cedula+" ya existe");
                                            $("#ci").val("");
                                            $("#ci").focus();
                                            fallo();
                                            }
                                    } );
               });
            }

            




            //evitar registrar  nicks ya existentes
            function usuarioYaExiste(){ 
                  return new Promise( (exito, fallo)=>{
                    let nick= $("#nick").val();
                    $.get( "/crediweb/usuario/getByName/"+nick,  function(ar){
                        let res= JSON.parse( ar );
                        if( "error"  in res) {  console.log("usu valido"); exito(); }
                        else{
                            alert("El nick '"+ nick+"' ya esta registrado");
                            $("#nick").focus();
                            fallo();
                        }
                        } );
                });
            }

            


            function verificar( evt){
                evt.preventDefault();
                $("button[type=submit]").attr("disabled", true);
                if( camposLlenos() ){    
                    /*** */
                    Promise.all( [existeNumeroCedula(), usuarioYaExiste( ) ]).
                    then(     ([res1, res2])=>{  peticion( evt, "#create-user"); }    ).
                    catch(  (err)=>{  console.log("No se pudo validar");  } );  
                    /***** */
                }else{      console.log("falta llenar campos");    }
            }

        </script>





        </body>
</html>