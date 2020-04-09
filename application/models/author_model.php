<?php
/**
 * Created by PhpStorm.
 * User: Suzon Khan
 * Date: 1/23/2020
 * Time: 11:44 PM
 */

class Author_Model extends CI_Model
{
    public function saveAuthor($data)
    {
        $this->db->insert('tbl_author', $data);
    }

    public  function getAllAuthor(){

        $this->db->select('*');
        $this->db->from('tbl_author');
        $this->db->order_by('auth_id','desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;

    }
    public  function getAuthorById($auth_id){

        $this->db->select('*');
        $this->db->from('tbl_author');
        $this->db->where('auth_id',$auth_id);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;

    }

    public  function updateAuthor($data){


        $this->db->set('author',$data['author']);

        $this->db->where('auth_id',$data['auth_id']);
        $this->db->update('tbl_author');

    }

    public function deleteAuthor($auth_id){
        $this->db->where('auth_id',$auth_id);
        $this->db->delete('tbl_author');
    }


    public function getAuthor($sdepid){
        $this->db->select('*');
        $this->db->from('tbl_author');
        $this->db->where('auth_id',$sdepid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }



}