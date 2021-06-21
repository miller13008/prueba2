<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_C extends CI_Controller {
    public function __construct(){      
		parent::__construct(); 
        if(!$this -> session -> userdata('logged_in')) redirect('Login');
        $this -> load -> model('Main_M');
	}
    
    
	public function index($data = NULL)
	{
        $this->session->usuariCotxe =  'e350';
        $data['nombreC'] = "Xavier Ponds";
        $data['cocheC'] = "T418";
        $data['matriculaC'] = "123456CFG";


        $data['nomPag'] = "Web de información personal";
        $data['infoPag'] = "Estás en la página principal de la web per la introducció de kilometres";
        
        
		$this -> load -> view('template/header',$data);
        $this -> load -> view('template/footer'); 
	}
    
    public function entrarKilometres()
	{   
        $data['nomPag'] = "Consulta de kilometres";
        $data['infoPag'] = "Aquest apartat serveix per inserir els kilometros";
		$this -> load -> view('template/header',$data);
        $this -> load -> view('pages/entrarkilometres');
        $this -> load -> view('template/footer'); 
	}
    
    public function consultaKilometres()
	{
        $data['nomPag'] = "Consulta de kilometres";
        $data['infoPag'] = "Aquest apartat serveix per consultar els kilometros";;
		$this -> load -> view('template/header',$data);
        $this -> load -> view('pages/consultaKilometres');
        $this -> load -> view('template/footer'); 
	}

    
    public function formulario()
	{
        $data['nomPag'] = "formulario";
        $data['infoPag'] = "Aquest apartat serveix per dar de alta baja y modificar cotxes";;
		$this -> load -> view('template/header',$data);
        $this -> load -> view('pages/formulario');
        $this -> load -> view('template/footer'); 

    }
	
    
}
