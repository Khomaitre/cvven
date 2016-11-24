<?php
session_start();
class Connexion extends CI_Controller { 
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Connexion_modele');
    }

    //Controlleur Connexion
    function formulaire(){
        $data['loginclient'] = 'loginclient';
        $data['mdpclient'] = 'mdpclient';
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
                $_SESSION['idclient'] = $this->Connexion_modele->getClientId($loginclient);
                $_SESSION['loginclient'] = $loginclient;
                $_SESSION['mdpclient'] = $mdpclient;
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
            
        unset($_SESSION['loginclient']);
        unset($_SESSION['mdpclient']);
        unset($_SESSION['role']);
        session_destroy();

	//	Redirige vers la page d'accueil
	redirect('Connexion/formulaire');
}
}
        
        
        
        
        
/*        
    function check_database($mdpclient){
       //Field validation succeeded.  Validate against database
       $loginclient = $this->input->post('loginclient');

       //query the database
       $result = $this->user->login($loginclient, $mdpclient);

       if($result)
       {
         $sess_array = array();
         foreach($result as $row)
         {
           $sess_array = array(
             'loginclient' => $row->loginclient
           );
           $this->session->set_userdata('logged_in', $sess_array);
         }
         return TRUE;
       }
       else
       {
         $this->form_validation->set_message('check_database', 'Invalid username or password');
         return false;
       }
    }
*/

