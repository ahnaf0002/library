<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('author_model');
        $this->load->model('department_model');
        $data = array();
        if (!$this->session->userdata('userlogin')){
            redirect('user/login');
        }
    }

    public function addbook()
    {

        $data = array();
        $data['title'] = 'Add New Student';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header', $data, true);
        $data['footer'] = $this->load->view('inc/footer', '', true);
        $data['sidebar'] = $this->load->view('inc/sidebar', '', true);
        $data['getAllDepartment'] = $this->department_model->getAllDepartment($data);
        $data['getAllAuthor'] = $this->author_model->getAllAuthor($data);
        $data['content'] = $this->load->view('inc/bookadd', $data, true);
        $this->load->view('home', $data);

    }

    public function addBookForm(){
        $data['bookname'] = $this->input->post('bookname');
        $data['dep'] = $this->input->post('dep');
        $data['author'] = $this->input->post('author');




        $name = $data['bookname'];
        $dep = $data['dep'];
        $author = $data['author'];

        if(empty($name) && empty($dep) && empty($author)){
            $sdata =array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("book/addbook");

        }else{
            $this->book_model->saveBook($data);
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>Data Added Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("book/addbook");
        }
    }

    public function booklist (){

        $data = array();
        $data['title'] = 'Book List';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['getAuthor'] = $this->author_model->getallAuthor();
        $data['getAllBook'] = $this->book_model->getAllBook();
        $data['content'] = $this->load->view('inc/listbook',$data, true);
        $this->load->view('home', $data);

    }

    public function editbook($book_id){
        $data = array();
        $data['title'] = 'Edit Student';
        //$data['desc'] = 'Library Management System is my first codeigniter project';
        $data['header'] = $this->load->view('inc/header',$data,true);
        $data['footer'] = $this->load->view('inc/footer','', true);
        $data['sidebar'] = $this->load->view('inc/sidebar','', true);
        $data['getDepartment'] = $this->department_model->getAllDepartment($data);
        $data['getAuthor'] = $this->author_model->getAllAuthor($data);
        $data['bookById'] = $this->book_model->getBookById($book_id);
        $data['content'] = $this->load->view('inc/bookedit',$data, true);
        $this->load->view('home', $data);

    }

    public function updateBook()
    {

        $data['id'] = $this->input->post('book_id');
        $data['name'] = $this->input->post('bookname');
        $data['dep'] = $this->input->post('dep');
        $data['author'] = $this->input->post('author');


        $id = $data['id'];
        $name = $data['name'];
        $dep = $data['dep'];
        $author = $data['author'];


        if (empty($name) && empty($dep) && empty($author)) {
            $sdata = array();
            $sdata['msg'] = "<span style='color: red'>Field must not be empty</span>";
            $this->session->set_flashdata($sdata);
            redirect("book/editbook/" . $id);

        } else {
            $this->book_model->updatebook($data);
            $sdata = array();
            $sdata['msg'] = "<span style='color: green'>Book Data Updated Successfully</span>";
            $this->session->set_flashdata($sdata);
            redirect("book/editbook/" . $id);
        }

    }

    public function deletebook($book_id){
        $this->book_model->deletebookData($book_id);
        $sdata =array();
        $sdata['msg'] = "<span style='color: green'>Book Data Deleted Successfully</span>";
        $this->session->set_flashdata($sdata);
        redirect("book/booklist");
    }



    }

