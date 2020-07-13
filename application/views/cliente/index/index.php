<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Clientes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         
        <link rel="stylesheet" href="<?= base_url("/assets/bootstrap/bootstrap.min.css") ?>" /> 
        <link rel="stylesheet" href="<?= base_url("/assets/datatables/datatables.min.css") ?>" /> 
        <style >
            .table{
                font-size: 12px;
                
            }
            .table tbody tr td{
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>
        <script type="text/javascript" src= "<?= base_url("/assets/jquery/jquery-3.4.1.min.js") ?>" ></script>
        <script src="<?= base_url("/assets/jquery/popper.min.js")?>"  ></script>
        <script src="<?= base_url("/assets/bootstrap/bootstrap.min.js")?>"  ></script>
        <!-- DATATABLES -->
        <script src="<?= base_url("/assets/datatables/datatables.min.js")?>"  ></script>
         <!--excel-->
         <script type="text/javascript" src="<?= base_url("/assets/xls_gen/xlsx.full.min.js") ?>"></script>
        <script type="text/javascript" src="<?= base_url("/assets/xls_gen/FileSaver.min.js") ?>"></script>
        <script type="text/javascript" src="<?= base_url("/assets/my_js.js")."?v=".rand() ?>"></script>
        

    </head>
    <body class="bg-dark"> 

        <?php   $this->load->view("plantillas/enlaces"); ?>

        <div class="container col-md-6  col-sm mt-3 bg-dark p-0">
            <div class="row"> 
                
            <?php
            if( $this->session->userdata("tipo")=="S" ){
                $this->load->view("cliente/index/opc_s"); 
            }
            if( $this->session->userdata("tipo")=="A" ){
                $this->load->view("cliente/index/opc_a"); 
            }
            if( $this->session->userdata("tipo")=="V" ){
                $this->load->view("cliente/index/opc_v"); 
            }
            ?>

            <div class="col col-md-4 pt-0 pr-0 pl-1">
                    <?php  $this->load->view("cliente/index/reports_button"); ?>
                    <div class="container col-sm col-md-6 bg-dark text-warning" id="mensajes"></div>
                    </div>
            </div>

            </div><!--end row -->
        </div><!--end container -->

        <div class="container col-md-6  col-sm p-0 mt-2">
            <h3 class="text-center text-light">Clientes del mes</h3>
            <select   id="mes" onchange="refillTable()">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12" selected>Diciembre</option>
            </select>
            <select  onchange="refillTable()"  id="anio">
                <?php  for($i= date("yy"); $i >= 2000; $i--){ ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php  }?>
                </select>

            <div id="update-table" class="table-wrapper-scroll-y my-custom-scrollbar pt-1 pr-1 text-light bg-light">
            <?php
                $param= array("list"=>$list);
                    if( $this->session->userdata("tipo")=="S" ){
                        $this->load->view("cliente/index/index_s",  $param);
                    }
                    if( $this->session->userdata("tipo")=="A" ){
                        $this->load->view("cliente/index/index_a", $param);
                    }
                    if( $this->session->userdata("tipo")=="V" ){
                        $this->load->view("cliente/index/index_v", $param);
                    }
                
            ?>
        
            </div>
            

        </div>
      
 


        
        <script>
           
            var parametrs= { };
                //INICIALIZAR MES
            $("#mes").val(   (new Date().getMonth()+1) );
            refillTable();




            function settingParams(){//Para consultas
                let vendedor= <?= $this->session->userdata("tipo")=="V" ? $this->session->userdata("id"):"0"  ?>;
                let m2= $("#mes").val(); 
                let anio=  $("#anio").val();
                parametrs= {
                        "vendedor": vendedor,
                        "estado": "0",
                        "mes1": m2,
                            "mes2": m2,
                            "empresa": "0",
                            "anio": anio
                        };
                //configurar el enlace al pdf
                pdfFileUrl();
            }
 
         


         function getDataForXls(){
            let showMsg= function(){  $("#mensajes").html("Creando archivo xls/xlsx...");     }; 
            let rutaxls="/crediweb/cliente/list";
           //Obtencion de datos de la base de datos para cargarlo a un archivo xls
            let dta= { 
                url:  rutaxls,
                method:"post", 
                data: parametrs, 
                success: (res)=>{createWorkBook(res); }, 
                beforeSend: showMsg }
            $.ajax( dta); 
        }

        function pdfFileUrl(){// Formacion de la url para descargar el pdf
        let rutapdf= "/crediweb/cliente/generarPdf"
            vendedor= parametrs.vendedor;
            let m1= parametrs.mes1; let m2= parametrs.mes2;
            let empresaFondo=parametrs.empresa;
            let anio=  parametrs.anio;
            let estado= "0";
            //estado - vendedor - mes desde  - mes hasta - empresa
            console.log("cambiando href");
            $("#pdf").attr("href", rutapdf+ "/"+ estado+ "/"+ vendedor+"/"+m1+"/"+m2+"/"+empresaFondo+"/"+anio);
        }

        
        $('.dropdown-toggle').dropdown();



        function cleanTable(){
            $("table tbody").empty();//vacia la tabla
        }
        //recargar tabla
         function refillTable( ){
            cleanTable();
            let filling= function( datos){
                $("#update-table").html( datos );
                $("#mensajes").html(""); 
                pdfFileUrl();
                                            };
            
            let showMsg= function(){  $("#mensajes").html("Espere un momento..."); }
            settingParams();
            let dta= { url:  "/crediweb/cliente/listView",
                 data: parametrs, 
                 method:"post", success: filling, beforeSend: showMsg };
            $.ajax( dta); 
        }


        </script>

    </body>
</html>