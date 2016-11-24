<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Reservations extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Reservations_modele');
        $this->load->library('session');
    }
    
    public function afficher($numclient = 0)
    {
        /*Condition pour vérifier que le client a bien été indiqué dans 
        l'URL*/

        if ($numclient == 0){
            show_404(); //Erreur 404
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        /* Données à transmettre à la vue */        
        $data['titre']="Mes réservations";
        $data['num']=$numclient;
        $data['reservations'] = $this->Reservations_modele->get_client($numclient);

        $this->form_validation->set_rules('numsejour','numsejour','required');
            /*Chargement de la vue */

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('reservations/afficher',$data);
            $this->load->view('templates/footer',$data);
        }
        else{
            $data['numsejour'] = $this->input->post('numsejour');
            redirect('reservations/supprime/'.$data['numsejour']);
             
        }
    }

    public function supprime($numsejour = 0){

        if ($numsejour ==0){
            //show_404(); //Erreur 404
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['titre']="supprimé";
        $data['reservations'] = $this->Reservations_modele->get_reserv($numsejour);
        $data['numclient'] = $this->db->
        $this->form_validation->set_rules('numsejour', "numsejour", 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('reservations/supprime',$data);
            $this->load->view('templates/footer',$data);
        }
        else{
            $data["numsejour"] = $this->input->post('numsejour');
            $this->Reservations_modele->delete_reserv($data["numsejour"]);
            redirect('reservations/afficher/1');
        }
        
    }
    
    public function create($idclient = 1){
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['titre'] = "Créer une Réservation";
        
        $this->form_validation->set_rules('idclient', "id du Client", 'required');
        $this->form_validation->set_rules('arrive', "Date d'arrivée", 'required');
        $this->form_validation->set_rules('depart', "Date de départ", 'required');
        $this->form_validation->set_rules('nb', 'Nombres de personnes', 'required');
        $this->form_validation->set_rules('lieu', 'Lieu', 'required');
        $this->form_validation->set_rules('men', 'Ménage', 'required');
        $this->form_validation->set_rules('chambre', 'Type de chambre', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('reservations/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $data['idclient'] = $this->input->post('idclient');
            $this->Reservations_modele->set_reserv();
            redirect('reservations/afficher/'. $data['idclient']);
        }
       
    }
}