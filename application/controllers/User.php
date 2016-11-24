<?php
session_start();
class User extends CI_Controller { 
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User_modele');
    }

    //Controlleur Connexion
    function connexion(){
        $data['loginclient'] = 'loginclient';
        $data['titre']="Connexion";
        //Rend les champs obligatoires
        $this->form_validation->set_rules('loginclient','login','required');
        $this->form_validation->set_rules('mdpclient','mdp', 'required');
        
        if($this->form_validation->run() === FALSE){
            /*Chargement de la vue*/
            $this->load->view('templates/header',$data);
            $this->load->view('connexion/Connexion_vue',$data);
            $this->load->view('templates/footer');
        }
        else{
           $loginclient = $this->input->post('loginclient');
           $mdpclient = $this->input->post('mdpclient');
            if ($this->Connexion_modele->ifClientExist($loginclient, $mdpclient)){
                $this->session->idclient = ;
                $this->session->loginclient = 
                $newdata = array(
                    'loginclient' => $this->User_modele->getClientLogin($loginclient),
                    'idclient' => $this->User_modele->getClientId($loginclient),
                    'logged_in' => TRUE)
                $this->session->set_userdata($newdata);
                $this->load->view('connexion/success',$data);
            }
            else{
                echo 'Mot de passe ou login inexistant';
            }
        }
    }


        
public function deconnexion()
{       
	$this->load->view('connexion/success');
        //	Détruit la session
        $array_items = array('loginclient', 'idclient');
        $this->session->unset_userdata($array_items);

	//	Redirige vers la page d'accueil
	redirect('Connexion/formulaire');
}
}
