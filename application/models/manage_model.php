<?php
/**
 * Created by PhpStorm.
 * User: Suzon Khan
 * Date: 1/23/2020
 * Time: 11:44 PM
 */

class Manage_Model extends CI_Model
{

    public function getBookByDep($dep){

        $this->db->select('*');
        $this->db->from('tbl_book');
        $this->db->where('dep',$dep);
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
    }

//    public function getAuthorByDep($dep){
//
//        $this->db->select('*');
//        $this->db->from('tbl_book');
//        $this->db->where('author',$dep);
//        $qresult = $this->db->get();
//        $result = $qresult->result();
//        return $result;
//    }

    public  function getAllIssueData(){

        $this->db->select('*');
        $this->db->from('tbl_issue');
        $this->db->order_by('issue_id','desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;

    }

    public function deleteissueData($issue_id){
        $this->db->where('issue_id',$issue_id);
        $this->db->delete('tbl_issue');
    }


    public function saveIssueData($data)
    {
        $this->db->insert('tbl_issue', $data);
    }

    public function getstubyreg($reg){

        $this->db->select('*');
        $this->db->from('tbl_issue');
        $this->db->where('reg',$reg);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

}
