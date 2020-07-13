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
       <script type="text/javascript" src="<?= base_url("/assets/my_js.js")."?v=".rand() ?>"></script>
        
        <script src="../assets/graficos/anychart-base.min.js"></script>

        <style>
                html, body, #container {
                    width: 100%;
                    height: 100%;
                    margin: 0;
                    padding: 0;
                }
        </style>
    </head>
    <body class="bg-dark"> 

        <?php   $this->load->view("plantillas/enlaces"); ?>

        
        <div id="container">
        </div>

    
        <script>
        $('.dropdown-toggle').dropdown();


        //obtener datos de cliente

        function getClientDataToGraph(){
            $.get(  "/crediweb/cliente/totalClientes", function(res){

                try{
                    let obj= JSON.parse( res);
                    let normal_p= {  fill: "#ffff00",    hatchFill: "percent50" };
                    let normal_r= {  fill: "#ff0000",    hatchFill: "percent50" };
                    let normal_a= {  fill: "#00ff00",    hatchFill: "percent50" };
                    let hover_p= {  fill: "#ffffaa",    hatchFill: "percent50" };
                    let hover_r= {  fill: "#ffbbbb",    hatchFill: "percent50" };
                    let hover_a= {  fill: "#ddff00",    hatchFill: "percent50" };

                    let dataGraphic= obj.map( (reg)=>{
                        let sett1= ( reg.estado== "P")? normal_p: ( reg.estado== "A")? normal_a: normal_r;
                        let sett2= ( reg.estado== "P")? hover_p: ( reg.estado== "A")? hover_a: hover_r;
                        let descr= ( reg.estado== "P")? "PENDIENTE": ( reg.estado== "A")? "APROBADO": "RECHAZADO";
                       let row=    { x: descr, value: reg.total};
                       //row.normal= sett1; row.hover= sett2;
                       return row;
                          }); 
                    graficar( dataGraphic);

                }catch( er){
                    console.log( er);
                }
            });
                
        }

        function graficar(  data ){
            // create a chart
            chart = anychart.column();
            // add a data series
            series = chart.column( data);


            // create a chart and set the data
            chart = anychart.pie(data);  
            // configure outlines
            chart.normal().outline().enabled(true);
            chart.normal().outline().width("5%");

            chart.hovered().outline().width("10%");

            chart.selected().outline().width("3");
            chart.selected().outline().fill("#455a64");
            chart.selected().outline().stroke(null);
            chart.selected().outline().offset(2);

            // set the position of labels
            chart.labels().position("outside");
            chart.labels().fontSize(18); 
            chart.labels().fontWeight(900);
            // font color
            chart.labels().fontColor("#000000");
            
            // set the alignment of the legend 
            chart.legend().itemsLayout(   'horizontal-expandable');
            // set the chart title
            chart.title("Total de clientes: segun estado del credito");
            // set the container id
            chart.container("container");
            // initiate drawing the chart
            chart.draw();
        }

 
 



        getClientDataToGraph();

        </script>

    </body>
</html>