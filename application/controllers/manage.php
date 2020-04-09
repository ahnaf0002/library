<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('department_model');
        $this->load->model('book_model');
        $this->load->model('manage_model');
        $this->load->model('author_model');
        function disable_cache() {
            $this->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
            $this->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            $this->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
            $this->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
            $this->set_header('Pragma: no-cache');

        }

        $data = array();
        if (!$this->session->userdata('userlogin')){
            redirect('user/login');
        }
        $this->output->enable_profiler(TRUE);
    }

    public function addissuebook (){

        $data = array();
        $data['title'] = 'Issue Book';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['getAllDepartment'] = $this->department_model->getAllDepartment($data);
        $data['content'] = $this->load->view('inc/issuebookadd',$data, true);
        $this->load->view('home', $data);

    }

    public function getBookByDepId($dep)
    {

        $getAllBook = $this->manage_model->getBookByDep($dep);

        $output = null;
        $output .= '<option value="0">Select One</option>';
        foreach ($getAllBook as $book) {

            $output .= '<option value="' . $book->book_id . '">' . $book->bookname . '</option>';
        }
        echo $output;
    }


//    }
//    public function getAuthorByDepId($dep){
//
//        $getAllAuthor = $this->manage_model->getAuthorByDep($dep);
//
//        $output = null;
//        $output .= '<option value="authorvalue">Select One</option>';
//        foreach ($getAllAuthor as $author){
//
//            $output .= '<option value="'.$author->book_id.'">'.$author->author.'</option>';
//        }
//        echo $output;
//
//
//    }


    public function addIssueForm(){
        $data['name'] = $this->input->post('name');
        $data['dep'] = $this->input->post('dep');
        $data['bookname'] = $this->input->post('bookname');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['session'] = $this->input->post('session');
        $data['batch'] = $this->input->post('batch');

        $name = $data['name'];
        $dep = $data['dep'];
        $bookname = $data['bookname'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $session = $data['session'];
        $batch = $data['batch'];

        if(empty($name) && empty($dep) && empty($bookname) && empty($roll) && empty($reg) && empty($session) && empty($batch)){
            $sdata =array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("manage/addissuebook");

        }else{
            $this->manage_model->saveIssueData($data);
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>Issue Data Added Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("manage/addissuebook");
        }
    }

    public function issuelist (){

        $data = array();
        $data['title'] = 'Issue List';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['IssueData'] = $this->manage_model->getAllIssueData($data);
        $data['content'] = $this->load->view('inc/listissue',$data, true);
        $this->load->view('home', $data);



    }
    public function deleteissue($issue_id){
        $this->manage_model->deleteissueData($issue_id);
        $sdata =array();
        $sdata['msg'] = "<span style='color: green'>Data Deleted Successfully</span>";
        $this->session->set_flashdata($sdata);
        redirect("manage/issuelist");
    }
    public function viewIssue ($reg){

        $data = array();
        $data['title'] = 'View List';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['stuByReg'] = $this->manage_model->getstubyreg($reg);
        $data['content'] = $this->load->view('inc/viewstudent',$data, true);
        $this->load->view('home', $data);

    }






}