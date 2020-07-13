<!DOCTYPE html>
<html lang="es">
<head>
  <title>Exportar tablas HTML a EXCEL utilizando el plugin jQuery TableExport</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="../assets/xls_gen/tableexport.css"  rel="stylesheet" type="text/css">

</head>
<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Exportar datos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
 
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">
      <h3>Exportar tablas HTML a EXCEL utilizando el plugin jQuery TableExport</h3>
		<H4>Población por paises</H4>
      <div class="table-responsive">
                            <table class="table table-striped table-bordered" >
							
							
                                <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>País</th>
                                    <th>Población</th>
                                    <th>% de la población mundial</th>
                                    <th>Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>中华人民共和国 (People's Republic of China)</td>
                                    <td>1,370,570,000</td>
                                    <td>18.9%</td>
                                    <td>June 24, 2015</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>India</td>
                                    <td>1,273,140,000</td>
                                    <td>17.6%</td>
                                    <td>June 24, 2015</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>United States "USA"</td>
                                    <td>321,268,000</td>
                                    <td>4.43%</td>
                                    <td>June 24, 2015</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Indonesia</td>
                                    <td>255,461,700</td>
                                    <td>3.52%</td>
                                    <td>July 1, 2015</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Brazil</td>
                                    <td>204,503,000</td>
                                    <td>2.82%</td>
                                    <td>June 24, 2015</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Pakistan</td>
                                    <td>190,156,000</td>
                                    <td>2.62%</td>
                                    <td>June 24, 2015</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Nigeria</td>
                                    <td>183,523,000</td>
                                    <td>2.53%</td>
                                    <td>July 1, 2015</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Bangladesh</td>
                                    <td>126,880,000</td>
                                    <td>2.19%</td>
                                    <td>June 24, 2015</td>
                                </tr>
                                
                            </tbody></table>
                        </div>
      
      <hr class="d-sm-none">
    </div>
    
  </div>
</div>

	<footer class="footer fixed-bottom">
      <div class="container">
        <span class="text-muted">Obed Alvarado &copy 2018</span>
      </div>
    </footer>

</body>
<!-- Llamar a los complementos javascript-->
<script src="../assets/xls_gen/jquery-1.12.4.min.js"></script>
<script src="../assets/xls_gen/FileSaver.min.js"></script>
<script src="../assets/xls_gen/Blob.min.js" ></script>
<script src="../assets/xls_gen/xls.core.min.js" ></script>
<script src="../assets/xls_gen/tableexport.js" ></script>
<script>
$(document).ready( function(){
    $("table").tableExport({
	formats: ["xlsx","txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
	position: 'button',  // Posicion que se muestran los botones puedes ser: (top, bottom)
	bootstrap: false,//Usar lo estilos de css de bootstrap para los botones (true, false)
	fileName: "ListadoPaises",    //Nombre del archivo 
});
});
</script>
</html>
