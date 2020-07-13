<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?= base_url("/assets/bootstrap/bootstrap.min.css") ?>" /> 
        <style>
        input[type=text],input[type=password], .btn{
            border-radius: 25px;
        }
        </style>

        
        
    </head>
    <body class="bg-dark">
     
        <div class="container col-md-3 col-sm"> 

                        <div id="test"></div>
                        <h1 class="text-center text-light">Login</h1>

                        <?php 
                            if( isset( $errorSesion) ){
                                $this->load->view("plantillas/error", array("mensaje"=> $errorSesion ));

                            }
                        ?>
                        <div id="login" class="container-fluid">

                        <?php echo form_open('usuario/sign_in'); ?>
                                <label class="text-light " for="usua">Usuario</label>
                                <input   class="form-control" type="text" id="usu"  name="usua"   />
                                <br>
                                <label class="text-light" for="pass">Password</label>
                                <input    class="form-control" type="password" id="pass" name="pass"    /> 
                                <br>
                                <input type="hidden"  name="tipo" id="tipouser" />
                                <button class="btn btn-success  col-sm col-md-12" type="submit">Ingresar</button>
                            </form>
                        </div> 
                        <div class="container-fluid text-warning" id="mensajes"></div>
                
        </div>


    <script type="text/javascript" src= "<?= base_url("/assets/jquery/jquery-3.4.1.min.js") ?>" ></script>
    <script src="<?= base_url("/assets/bootstrap/bootstrap.min.js")?>"  ></script>

    <script type="text/javascript" src="<?= base_url("/assets/my_js.js") ?>" ></script>
   
   
   <script> 

    var tipoDeUsuario="";

    /**EXISTE USUARIO? */
    function userExists(){
        return new Promise((exito, fallo)=>{
            let name= $("#usu").val();
            $.ajax( { async: false, url:"/crediweb/usuario/getByName/"+name, success:function(res){
                let obj= JSON.parse(  res );
                if( "error" in obj){   alert("El usuario "+name+" no existe"); fallo();
                }else{   $("#tipouser").val(  obj.tipousuario );    exito();   }
            }}
            );
        });
        
    }
    /**nick ingresado */
    function nickIngresado(){
        if( $("#usu").val() == "")
       { alert("Ingrese su nick"); $("#usu").focus();
        return false;}  return true; 
    }
    /** PASSWORD INGRESADA */
    function passwordIngresado(){
        if( $("#pass").val() == "")
       { alert("Ingrese su clave");
        return false;}  return true; 
    }

     
 
       

       

 
        


    function ciudades(){
        $.get("/crediweb/assets/ciudades.json", function( res){
            console.log( res);
            document.getElementById("test").innerHTML= res;
        } );
    }


    
      </script>
  
        </body>
</html>