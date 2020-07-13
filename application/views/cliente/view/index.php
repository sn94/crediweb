<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cliente</title>
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
     
        <?php    $this->load->view("plantillas/enlaces");  ?>
        <div class="container col-md-6 col-sm bg-dark">
           
            <h3 class="text-light text-center">
                Datos de Cliente
            </h3>
        </div><!--end container -->

        <!--div que envuelve al formulario de edicion -->
        <div id="view-client" class="container col-sm col-md-8 bg-dark"> 
            <?php  $this->load->view("cliente/view/view_data", $datos ) ?>
        </div><!--end div edit client -->

        <!--div mensajes -->
        <div class="container col-sm col-md-6 bg-dark text-warning" id="mensajes"></div> 
        <!--end div mensajes -->

        
        <script type="text/javascript" src= "<?= base_url("/assets/jquery/jquery-3.4.1.min.js") ?>" ></script>
        <script src="<?= base_url("/assets/jquery/popper.min.js")?>"  ></script>
        <script src="<?= base_url("/assets/bootstrap/bootstrap.min.js")?>"  ></script> 
        <script type="text/javascript" src=<?= base_url("/assets/my_js.js")."?v=".rand()  ?> ></script>
       
       

    </body>
</html>