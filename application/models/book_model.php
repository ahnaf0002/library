<?php
/**
 * Created by PhpStorm.
 * User: Suzon Khan
 * Date: 1/23/2020
 * Time: 11:44 PM
 */

class Book_Model extends CI_Model{
    public function saveBook($data){
        $this->db->insert('tbl_book',$data);
    }

    public  function getAllBook(){

        $this->db->select('*');
        $this->db->from('tbl_book');
        $this->db->order_by('book_id','desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;

    }
    public function getBookById($book_id){

        $this->db->select('*');
        $this->db->from('tbl_book');
        $this->db->where('book_id',$book_id);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

    public function updatebook($data){
        $this->db->set('bookname',$data['name']);
        $this->db->set('dep',$data['dep']);
        $this->db->set('author',$data['author']);
        $this->db->where('book_id',$data['id']);
        $this->db->update('tbl_book');
    }

    public function deletebookData($book_id){
        $this->db->where('book_id',$book_id);
        $this->db->delete('tbl_book');
    }


}