<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('author_model');
        $data = array();
        if (!$this->session->userdata('userlogin')){
            redirect('user/login');
        }

    }

    public function addauthor (){

        $data = array();
        $data['title'] = 'Add New Author';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['content'] = $this->load->view('inc/authoradd','', true);
        $this->load->view('home', $data);

    }

    public function addAuthForm(){

        $data['author'] = $this->input->post('author');

        $dep = $data['author'];


        if(empty($dep)){
            $sdata =array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("author/addauthor");

        }else{
            $this->author_model->saveAuthor($data);
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>Author Added Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("author/addauthor");
        }
    }

    public function authorlist (){

        $data = array();
        $data['title'] = 'Author List';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['getAllAuthor'] = $this->author_model->getAllAuthor($data);
        $data['content'] = $this->load->view('inc/listauthor',$data, true);
        $this->load->view('home', $data);

    }

    public function editauthor($auth_id){

        $data = array();
        $data['title'] = 'Edit Author';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['authById'] = $this->author_model->getAuthorById($auth_id);
        $data['content'] = $this->load->view('inc/authoredit',$data, true);
        $this->load->view('home', $data);


    }

    public function updateAuthor(){

        $data['author'] = $this->input->post('author');
        $data['auth_id'] = $this->input->post('auth_id');


        $auth = $data['author'];
        $auth_id = $data['auth_id'];


        if(empty($auth)){
            $sdata =array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("author/editauthor/".$auth_id);

        }else{
            $this->author_model->updateAuthor($data);
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>Author Added Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("author/editauthor/".$auth_id);
        }


    }
    public function deleteauthor($auth_id){

        $this->author_model->deleteAuthor($auth_id);
        $sdata =array();
        $sdata['msg'] = "<span style='color: green'>Author Deleted Successfully</span>";
        $this->session->set_flashdata($sdata);
        redirect("author/authorlist");

    }



}