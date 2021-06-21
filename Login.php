<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){      
		parent::__construct();
        $this->load->library('Auth_AD');
        
	}
    
    public function index($data = NULL){
        
        if(!$this->auth_ad->is_authenticated()){
            $this -> load -> view('login/login',$data);   
        }else{         
            redirect('Main_C');
        }
        
    }
    
    public function login(){
        
        $user = strtolower($this -> input -> post('user'));
        $pass = $this -> input -> post('password');
        
        if($this ->auth_ad -> login($user, $pass)){
            
        if(($this -> auth_ad -> in_group($user,"SASA_AdminsWeb")) or($user=="noemi.polo")){
                $this -> session -> nivellAcces = "Admins";
                $this -> session -> nivellAccesUsers = "3";
                $this -> session -> usuariAD=$user;
   
                redirect('Main_C');
            }else if($this -> auth_ad -> in_group($user,"SASA_caps_seccio")){
                $this -> session -> nivellAcces = "Cap Seccio";
                $this -> session -> nivellAccesUsers = "2";
                $this -> session -> usuariAD=$user;

                redirect('Main_C');
            }else if($this -> auth_ad -> in_group($user,"SASA_UsuarisWeb")){
                $this -> session -> nivellAcces = "treballador";
                $this -> session -> nivellAccesUsers = "1";
                $this -> session -> usuariAD=$user;

                redirect('Main_C');
            }else{
                $this -> auth_ad -> logout(); 
                $data['msg'] = "No tens permis per accedir a la intranet";
                $this -> index($data);
            }
            
        }else{
            $data['msg'] = "Autentificació incorrecta";
            $this -> index($data);
        }

    }
    public function logout(){
        
        if($this->session->userdata('logged_in')){
            $this -> auth_ad -> logout();    
        }
        redirect('Login');
        
    }
    
}
