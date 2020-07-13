<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("America/Asuncion");
		$this->load->model("Usuario_model");
	 }


	public function index()
	{
		if( $this->session->userdata("tipo")== "V"){//SOLO VENDEDOR
			$comisiones= $this->Usuario_model->comision_acumulada( $this->session->userdata("id"));
			 
			$this->load->view("inicio", array("comisiones"=> $comisiones->total ));	
		}else{ $this->load->view("inicio");	 }
	  
	}


}
