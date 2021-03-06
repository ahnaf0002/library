
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $data = array();
    }

    public function login (){
        $this->load->view('login');
    }
    public function loginform()
    {
        $data['user'] = $this->input->post('user');
        $data['pass'] = $this->input->post('pass');
        $check = $this->user_model->check_login($data);
        if ($check){
            $sdata = array();
            $sdata['user_id'] = $check->user_id;
            $sdata['userlogin'] = TRUE;
            $this->session->set_userdata($sdata);
            redirect('Library');
        }else{
            $sdata =array();
            $sdata['msg'] = "<span style='color: green'>User & Pass Doesn't Match</span>";
            $this->session->set_flashdata($sdata);
            redirect("user/login");
        }
    }
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('userlogin',FALSE);
        $this->session->sess_destroy();
        redirect("user/login");



    }

}