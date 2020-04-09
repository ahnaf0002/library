<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('department_model');
        $data = array();

        if (!$this->session->userdata('userlogin')){
            redirect('user/login');
        }
    }

    public function adddepartment (){

        $data = array();
        $data['title'] = 'Add New Department';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['content'] = $this->load->view('inc/departmentadd','', true);
        $this->load->view('home', $data);

    }

    public function addDepForm(){

        $data['department'] = $this->input->post('department');

        $dep = $data['department'];


        if(empty($dep)){
            $sdata =array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("department/adddepartment");

        }else{
            $this->department_model->saveDepartment($data);
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>Department Added Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("department/adddepartment");
        }
    }

    public function departmentlist (){

        $data = array();
        $data['title'] = 'Department List';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['getAllDepartment'] = $this->department_model->getAllDepartment($data);
        $data['content'] = $this->load->view('inc/listdepartment',$data, true);
        $this->load->view('home', $data);

    }

    public function editdepartment($dep_id){

            $data = array();
            $data['title'] = 'Edit Department';
            //$data['desc'] = 'Library Management System is my first codeigniter project';
            $data['header'] = $this->load->view('inc/header',$data,true);
            $data['footer'] = $this->load->view('inc/footer','', true);
            $data['sidebar'] = $this->load->view('inc/sidebar','', true);
            $data['depById'] = $this->department_model->getDepartmentById($dep_id);
            $data['content'] = $this->load->view('inc/departmentedit',$data, true);
            $this->load->view('home', $data);


    }

    public function updateDepartment(){

        $data['department'] = $this->input->post('department');
        $data['dep_id'] = $this->input->post('dep_id');


        $dep = $data['department'];
        $dep_id = $data['dep_id'];


        if(empty($dep)){
            $sdata =array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("department/editdepartment/".$dep_id);

        }else{
            $this->department_model->updateDepartment($data);
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>Department Added Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("department/editdepartment/".$dep_id);
        }


    }
    public function deletedepartment($dep_id){

        $this->department_model->deleteDepartment($dep_id);
        $sdata =array();
        $sdata['msg'] = "<span style='color: green'>Department Deleted Successfully</span>";
        $this->session->set_flashdata($sdata);
        redirect("department/departmentlist");

    }



}