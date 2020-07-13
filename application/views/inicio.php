<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>INICIO</title>
	<link rel="stylesheet" href="<?= base_url("/assets/bootstrap/bootstrap.min.css") ?>" /> 
         

 
</head>
<body class="bg-dark" >

	<div id="container bg-dark">

		<div class="jumbotron  bg-dark">
		 
			<h1 class="display-4 text-light text-center">Cr&eacute;ditos</h1>
			<p class="lead text-light text-center">
				 <strong> "<?= $this->session->userdata("nombres") ?>"</strong>
				<span class="m-0 badge badge-primary"> <?= $this->session->userdata("tipo")=="S" ?"SUPERVISOR": ( $this->session->userdata("tipo")=="V" ? "VENDEDOR": "ADMINISTRATIVO" ) ?></span> 
				<?php  if( isset($comisiones)  ):?>
				<p class="text-center">
				<button type="button" class="btn btn-primary mx-auto">
					Comisi&oacute;n acumulada: <span class="badge badge-light"><?=  $comisiones ?> Gs.</span>
				</button> 
				</p>
				<?php  endif; ?>
			</p> 
			
			<a style="display:block;" class="text-light text-center" href="/crediweb/usuario/sign_out" role="button">Cerrar sesi&oacute;n</a>
			
			
		</div>


		<?php
		$columnW=  $this->session->userdata("tipo")=="S" ? "col-md-3" :"col-md-4";
		?>


		<div class="container ">

			<div class="row">
				<div class="col-sm <?=$columnW ?> mb-1">
					<a href="/crediweb/cliente" class="w-100 btn btn-primary">Clientes</a>
				</div>

				<?php  //Solo SE HABILITA PARA SUPERVISOR
						if ($this->session->userdata("tipo") == "S"): ?> 
							<div class="col-sm  <?=$columnW ?> mb-1">
								<a href="/crediweb/usuario" class="w-100 btn btn-primary">Usuarios</a>
							</div>
				<?php  endif;?>

				<div class="col-sm <?=$columnW ?> mb-1">
					<a  href="/crediweb/cliente/estadistica"    class="w-100 btn btn-primary">Estadisticas</a>
				</div>

				<div class="col-sm <?=$columnW ?> mb-1">
					<button type="button" onclick="unavailableFeature()" class="w-100 btn btn-primary">Tareas</button>
				</div>
			</div>
							
			 
			 
		 
		</div>


	 
		
		 
		<div class="container-fluid border border-secondary mt-5 bg-dark">
			<p class="text-center text-light my-auto" style="font-size:11px;">  <span class="text-warning" >☆</span> Pentalfa Inform&aacute;tica </p>
		</div>
	</div>



	<script type="text/javascript" src= "<?= base_url("/assets/jquery/jquery-3.4.1.min.js") ?>" ></script>
	<script src="<?= base_url("/assets/bootstrap/bootstrap.min.js")?>"  ></script>
	<script>

		function unavailableFeature(){
			alert("OPCION NO DISPONIBLE EN ESTA VERSION");
		}
	</script>

</body>
</html>