<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {
    public function index() {
        if ($this->isLogged()){
            switch ($this->session->userdata('role')){
                case '1':
                    redirect(base_url('welcome'));
                    break;
                case '2':
                    if ($this->session->userdata('help') === '1'){
                        $this->load->view('public/tour/presentation');
                    }
                    break;
            }
        }
    }
    
    public function init($flow = 0) {
        if ($this->isLogged()){
            switch ($flow) {
                case 0:
                    $this->load->view('public/tour/presheader');
                    break;
                case 1:
                    $this->load->view('public/tour/preshome');
                    break;
                case 2:
                    $this->load->view('public/tour/presmap');
                    break;
                case 3:
                    $this->load->view('public/tour/presmapg');
                    break;
                case 4:
                    $this->load->view('public/tour/presmapr');
                    break;
                case 5:
                    $this->load->view('public/tour/presmapo');
                    break;
                case 6:
                    $this->load->view('public/tour/presdeact');
                    break;
                case 7:
                    $this->load->view('public/tour/presflow');
                    break;
                case 8:
                    $this->load->view('public/tour/presentrance');
                    break;
                case 9:
                    $this->load->view('public/tour/presvisitors');
                    break;
                case 10:
                    $this->load->view('public/tour/presnewvis');
                    break;
                default:
                    $this->load->view('public/tour/presheader');
                    break;
            }
        }
    }
    
    public function skip() {
        if ($this->isLogged()){
            redirect(base_url('welcome'));
        }
    }
    
    public function review() {
        if ($this->isLogged()){
            redirect(base_url('welcome'));
        }
    }
  
////////// Métodos de informações --------------------------------------------
    public function isLogged(){
        if ($this->session->userdata('loggedin') === TRUE){
            return true;
        }else {
            redirect(base_url('login'));
        }
    }    
//////////////////////////////////////////////////////////////////////////////
}