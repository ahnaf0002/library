<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userlogin')){
            redirect('user/login');
        }
    }
    public function index()
    {
        $this->home();
    }

    public function home (){

        $data = array();
        $data['title'] = 'Library Management System';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['content'] = $this->load->view('inc/content','', true);
        $this->load->view('home', $data);

    }
}
