<?php


class Usuario_model extends CI_Model {


    public function __construct(){
        parent::__construct();
		$this->load->database();
	 }



     public function add(){
        $datos= $this->input->post();
        $datos['fecha_alta']= date("yy-m-d");
        $datos['pass']=   password_hash($datos['pass'],  PASSWORD_DEFAULT );
        $this->db->insert('usuarioz', $datos);   
     }

  

     public function get( $ci ){  
         $dts= $this->db->get_where('usuarioz', array('cedula' => $ci ))->row();
        
         return $dts;
     }


     public function getByName( $n ){  
      $dts= $this->db->get_where('usuarioz', array('usuario' => $n ))->row();
     
      return $dts;
  }


     public function list( $opc= "0"){
        $params= NULL;
        $mes= date("m");
        if(  $opc != "0"){$this->db->where( "tipousuario", $opc); }
         
        $datos=  $this->db->get('usuarioz' );
        return $datos->result();
     }
   
     public function list_array(){
      $mes= date("m");
      $this->db->select( "cedula,nombres,usuario");
      $this->db->from("usuarioz");
      $this->db->where( 'month(fecha_alta)' , $mes );
      $datos=  $this->db->get();//sin parametros
      return $datos->result_array();
   }

   public function list_vendedores(){
      $this->db->select("cedula, nombres");
      $dt=$this->db->get_where("usuarioz", array("tipousuario"=>"V") );
      return $dt->result();
   }

   public function comision_acumulada( $ced ){
      $this->db->select("ifnull( round((SUM(clientez.monto_a)*usuarioz.comision)/100),0) as total");
      $this->db->from("clientez");
      $this->db->join("usuarioz", "clientez.vendedor=usuarioz.cedula");
      $this->db->where( "clientez.estado", "A");
      $this->db->where( "clientez.retirado", "S");
      $this->db->where( "usuarioz.tipousuario", "V");
      $this->db->where( "clientez.vendedor", $ced);
      $dt=$this->db->get( );
      return $dt->row();
   }


   public function passwordUpdate(){
      $datos= $this->input->post();
      $this->db->set('pass', $datos['clave-n'], FALSE);
      $this->db->where('cedula',  $datos['cedula']);
      return $this->db->update('usuarioz'); 
   }

     public function edit(){
        $datos= $this->input->post();
        if( isset( $datos['pass'] ) )
        $datos['pass']= password_hash($datos['pass'],  PASSWORD_DEFAULT );
        
        $this->db->where("cedula", $datos['cedula']);
        $this->db->update('usuarioz', $datos);
     }

     public function del( $ci){
      $this->db->where("cedula", $ci);
      return $this->db->delete('usuarioz');
     }



     public function  correctPassword( $passinput, $nick ){
        $usr= $this->getByName(  $nick);
        return password_verify( $passinput,  $usr->pass  );
     }



     /** REGISTRA EL ACCESO DE UN USUARIO EN LA BD TRAS INICIAR SESION
      * POSTERIORMENTE ESTE REGISTRO ES BORRADO AL CERRAR LA SESION
      *SU UTILIDAD RADICA EN EVITAR VARIOS ACCESOS DE UN MISMO USUARIO A LA VEZ
      */
     public function accessLogged( $cedula ){
        //verificar si ya existe acceso
        $rr= $this->db->get_where( "accesos", array('id_usuario' => $cedula) )->row() ;
        if( $rr ){
         return   array('error' => "Este usuario ya inicio sesion" ); 
        }else{
            $dts= array("id_usuario"=> $cedula);
            $r= $this->db->insert("accesos", $dts);
            if($r){
               return   array('OK' => "Acceso libre" ); 
            }else{
               return   array('error' => "Error de red" ); 
            }   
        }
     }




     public function accessLoggedOut( $cedula ){
      //verificar si ya existe acceso
      if( $this->db->get_where( "accesos", array('id_usuario' => $cedula)  )->row()    ){
          $dts= array("id_usuario"=> $cedula);
          $r= $this->db->delete("accesos", $dts);//liberar acceso
          if($r){
             return   array('OK' => "Acceso libre" ); 
          }else{
             return   array('error' => "Error de red" ); 
          }   
      } return array('error' => "no hay registro" ); 
   }


}


?>