<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Informes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url("/assets/datatables/datatables.min.css") ?>" /> 
     
    <style>
        .table {
            font-size: 12px;

        }

        .table tbody tr td {
            padding-top: 0px;
            padding-bottom: 0px;
        }
    </style>

</head>

<body class="bg-dark">

    <?php $this->load->view("plantillas/enlaces"); ?>

    <div class="container col-sm col-md-6 bg-dark text-warning" id="mensajes"></div>
    <div class="container col-md-6 col-sm mt-3 bg-dark">
        <h3 class="text-light text-center">INFORMES (CLIENTES)</h3>

        <div class="row">

            <div class="col-sm col-md-4">
                <label class="text-light">Estado de cliente:</label>
                <div class="form-check">
                    <input id="r1"  onchange="refillTable()" class="form-check-input" type="radio"  checked value="0" name="opc">
                    <label class="form-check-label text-light" for="r1" >
                        Todos
                    </label>
                </div>
                <div class="form-check">
                    <input id="r2" onchange="refillTable()" class="form-check-input" type="radio"   value="P" name="opc">
                    <label class="form-check-label text-light" for="r2" >
                        Pendiente
                    </label>
                </div>
                <div class="form-check">
                    <input id="r3" onchange="refillTable()" class="form-check-input" type="radio"   value="A" name="opc">
                    <label class="form-check-label text-light" for="r3" >
                        Aprobado
                    </label>
                </div>
                <div class="form-check">
                    <input id="r4" onchange="refillTable()"  class="form-check-input" type="radio" value="R" name="opc">
                    <label class="form-check-label text-light" for="r4" >
                        Rechazado
                    </label>
                </div>
            </div>
            <div class="col-sm col-md-4">
                <label class="text-light" >Desde:  </label>
                <select class="form-control" id="mes1" onchange="monthValidate(event)">
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
                    <option value="12">Diciembre</option>
                </select>
                <label class="text-light" >Hasta:  </label>
                <select class="form-control" id="mes2" onchange="monthValidate(event)">
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
            </div>
            <div class="col-sm col-md-4">

                <!--seleccionar anio -->
                <label class="text-light" >A&ntilde;o:  </label>
                <select class="form-control" onchange="refillTable()"  name="anio">
                <?php  for($i= date("yy"); $i >= 2000; $i--){ ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php  }?>
                </select>
                <label class="text-light" >Empresa:  </label>
                <select class="form-control" onchange="refillTable()"   name="empresa"> 
                    <option value="0"></option>
                    <option value="1">Majuvi</option>
                    <option value="2">Contrata</option>
                    <option value="3">J S/F</option>
                    <option value="4">Triton</option>  
                </select> 
            </div>

            <?php if( $this->session->userdata("tipo") == "S" || $this->session->userdata("tipo") == "A"){ ?>
            <div class="col-sm col-md-4">
                <label class="text-light" >CI vendedor:  </label>
            <input class="form-control" type="text" id="vendedor-ci" onkeydown="(function(ev){ if(ev.keyCode==13){ refillTable();}})(event)"  oninput="numericInput(event)"  />
            </div>
            <?php }else{ ?>
            <input  type="hidden" id="vendedor-ci" value="<?= $this->session->userdata("id")  ?>"  />
            <?php } ?>


        </div>
    </div>

    <div class="container col-sm col-md-6 bg-dark">

        <div class="mt-2 btn-group btn-group-sm" role="group" aria-label="Basic example">
            <a download="nombre_archivo" id="pdf" class="btn btn-success" href="/crediweb/cliente/generarPdf" >PDF</a>
            <button  id="excel" class="btn btn-success" onclick="getDataForXls()">Excel</button>
        </div>

        <div id="pdfv">
            
              
              <div class="table-wrapper-scroll-y my-custom-scrollbar pt-1 pr-1 text-light bg-light">
                    <table id="tabla" class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered  table-hover table-sm">
                        <thead class="thead-dark ">
                            <th>Ci</th><th>Nombres</th><th>Telefono</th>
                            <?php if( $this->session->userdata("tipo")!="V" ): ?> 
                            <th>Vendedor</th>
                            <?php endif; ?>
                        </thead>
                        <tbody>
                            <?php foreach($list as $item){?>
                            <tr class="<?= (($item->estado== "P")? "table-secondary" :  ($item->estado=="A"?"table-success":"table-danger")) ?>">
                                <td>
                                <?= $item->cedula ?> 
                                    <h6 class="<?= (($item->estado== "P")? "text-secondary" :  ($item->estado=="A"?"text-success":"text-danger")) ?>">
                                                        <?="(".(($item->estado== "P")? "PENDIENTE" :  ($item->estado=="A"?"APROBADO":"RECHAZADO")).")" ?>
                                    </h6>
                                </td> 
                                <td><?= $item->nombres." ". $item->apellidos  ?></td> 
                                <td><?= $item->telefono ?></td>  
                                <?php if( $this->session->userdata("tipo")!="V" ): ?> 
                                    <td><?= $item->vendedor ?></td>
                                <?php endif; ?> 
                                
                            </tr>
                                            
                            <?php } ?>
                        </tbody>
                    </table>
              </div>
            
        </div>
    </div>


    <script type="text/javascript" src="../assets/jquery/jquery-3.4.1.min.js"></script>
    <script  type="text/javascript" src="../assets/jquery/popper.min.js"  ></script>
    <script type="text/javascript" src="../assets/xls_gen/xlsx.full.min.js" ></script>
    <script type="text/javascript" src="../assets/xls_gen/FileSaver.min.js" ></script>
    <script src="../assets/bootstrap/bootstrap.min.js"></script>
        <!-- DATATABLES -->
    <script src="<?= base_url("/assets/datatables/datatables.min.js")?>"  ></script>
    <script type="text/javascript" src="../assets/my_js.js<?="?v=".rand() ?>"></script>

    <script>


            $('#tabla').DataTable( ); 

            let paramtrs= {};

            refillTable();

        /**validaciones de meses */
        function monthValidate( ev){
            if( ev.target.id == "mes1"){
                if( parseInt(ev.target.value) > parseInt($("#mes2").val()) ){ ev.target.value=1; console.log("mes 1 mayor") } 
            }
            if( ev.target.id == "mes2"){
                if( parseInt(ev.target.value) < parseInt($("#mes1").val()) ){ev.target.value=12;}
            }
            refillTable();
        }
      
        

        function getDataForXls(){
            let showMsg= function(){  $("#mensajes").html("Creando archivo xls/xlsx..."); };
            settingParams();
           //Obtencion de datos de la base de datos para cargarlo a un archivo xls 
            let rutaxls="/crediweb/cliente/list";
            let dta= { 
                url:  rutaxls ,
                method:"post", 
                data: paramtrs, 
                success:  (res)=>{createWorkBook(res,"Clientes")},
                beforeSend: showMsg }
            $.ajax( dta); 
        }




      

        function settingParams(){
            let vendedor= ( $("#vendedor-ci").val()=="")?"0": $("#vendedor-ci").val();
            let m1= $("#mes1").val(); let m2= $("#mes2").val();
            let empresaFondo= $("select[name=empresa]").val();
            let anio=  $("select[name=anio]").val();
            let estado=  $("input[type=radio][name=opc]:checked").val();
            paramtrs= {
                     "vendedor": vendedor,
                      "estado": estado,
                       "mes1": m1,
                        "mes2": m2,
                        "empresa": empresaFondo,
                        "anio": anio
                    };
        }
 
        
        /***Actualizacion de tabla */

        function cleanTable(){
            $("table tbody").empty();//vacia la tabla
        }
        function pdfFileUrl(){// Formacion de la url para descargar el pdf
            let vendedor= paramtrs.vendedor;
            let m1= paramtrs.mes1; let m2= paramtrs.mes2;let anio=  paramtrs.anio;
            let empresaFondo=paramtrs.empresa;  let estado= paramtrs.estado;
            let rutapdf="/crediweb/cliente/generarPdf";
            //estado - vendedor - mes desde  - mes hasta - empresa
            $("#pdf").attr("href", rutapdf+ "/"+ estado+ "/"+ vendedor+"/"+m1+"/"+m2+"/"+empresaFondo+"/"+anio);
        }



        function refillTable( ){
            cleanTable();
            let filling= function( datos){
                let lst= JSON.parse( datos); 
                lst.forEach( (lst)=>{
                    let s_row=`  <tr class="${(( lst.estado== "P")? "table-secondary" :  (lst.estado=="A"?"table-success":"table-danger")) }">
                        <td>
                        ${ lst.cedula}
                            <h6 class="${(( lst.estado== "P")? "text-secondary" :  (lst.estado=="A"?"text-success":"text-danger")) }">
                            ${(( lst.estado== "P")? "PENDIENTE" :  (lst.estado=="A"?"APROBADO":"RECHAZADO")) }
                            </h6>
                        </td> 
                        <td>  ${lst.nombres+" "+  lst.apellidos}  </td> 
                        <td>${lst.telefono}</td>  
                        <?php if( $this->session->userdata("tipo")!="V" ): ?> 
                            <td>${lst.vendedor}</td> 
                        <?php endif; ?>  
                       
                        </tr>`;
                    $("table tbody").append( s_row);
                });
                $("#mensajes").html("");
                pdfFileUrl();//crear url para descargar en pdf
                                            };
            
            let showMsg= function(){   $("#mensajes").html("Espere un momento...");  }
            settingParams();
            let dta= { url:  "/crediweb/cliente/list", data: paramtrs, method:"post", success: filling, beforeSend: showMsg };
            $.ajax( dta); 
        }

    </script>



</body>
                

</html>