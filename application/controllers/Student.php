<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('department_model');
        $data = array();
        if (!$this->session->userdata('userlogin')){
            redirect('user/login');
        }
    }

    public function addstudent (){

        $data = array();
        $data['title'] = 'Add New Student';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['getAllDepartment'] = $this->department_model->getAllDepartment($data);
        $data['content'] = $this->load->view('inc/studentadd',$data, true);
        $this->load->view('home', $data);

    }

    public function addStudentForm(){
        $data['name'] = $this->input->post('name');
        $data['dep'] = $this->input->post('dep');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['session'] = $this->input->post('session');
        $data['batch'] = $this->input->post('batch');

        $name = $data['name'];
        $dep = $data['dep'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $session = $data['session'];
        $batch = $data['batch'];

        if(empty($name) && empty($dep) && empty($roll) && empty($reg) && empty($session) && empty($batch)){
            $sdata =array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("student/addstudent");

        }else{
            $this->student_model->saveStudent($data);
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>Data Added Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("student/addstudent");
        }
    }


    //student list coding started from here.....

    public function studentlist (){

        $data = array();
        $data['title'] = 'Student List';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['getAllStudent'] = $this->student_model->getAllStudent($data);
        $data['content'] = $this->load->view('inc/liststudent',$data, true);
        $this->load->view('home', $data);

    }

    public function editstudent($id){
        $data = array();
        $data['title'] = 'Edit Student';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['getDepartment'] = $this->department_model->getAllDepartment($data);
        $data['stuById'] = $this->student_model->getStudentById($id);
        $data['content'] = $this->load->view('inc/studentedit',$data, true);
        $this->load->view('home', $data);

    }

    public function updateStudent(){

        $data['id'] = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['dep'] = $this->input->post('dep');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['session'] = $this->input->post('session');
        $data['batch'] = $this->input->post('batch');

        $id = $data['id'];
        $name = $data['name'];
        $dep = $data['dep'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $session = $data['session'];;
        $batch = $data['batch'];

        if(empty($name) && empty($dep) && empty($roll) && empty($reg) && empty($session) && empty($batch)){
            $sdata =array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("student/editstudent/".$id);

        }else{
            $this->student_model->eupdatestudent($data);
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>Data Updated Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("student/editstudent/".$id);
        }


    }

    public function deletestudent($id){
        $this->student_model->deletestudentData($id);
        $sdata =array();
        $sdata['msg'] = "<span style='color: green'>Data Deleted Successfully</span>";
        $this->session->set_flashdata($sdata);
        redirect("student/studentlist");
    }




}
