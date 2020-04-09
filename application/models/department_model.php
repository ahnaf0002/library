<?php
/**
 * Created by PhpStorm.
 * User: Suzon Khan
 * Date: 1/23/2020
 * Time: 11:44 PM
 */

class Department_Model extends CI_Model
{
    public function saveDepartment($data)
    {
        $this->db->insert('tbl_department', $data);
    }

    public  function getAllDepartment(){

        $this->db->select('*');
        $this->db->from('tbl_department');
        $this->db->order_by('dep_id','desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;

    }
    public  function getDepartmentById($dep_id){

        $this->db->select('*');
        $this->db->from('tbl_department');
        $this->db->where('dep_id',$dep_id);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;

    }

    public  function updateDepartment($data){


        $this->db->set('department',$data['department']);

        $this->db->where('dep_id',$data['dep_id']);
        $this->db->update('tbl_department');

    }

    public function deleteDepartment($dep_id){
        $this->db->where('dep_id',$dep_id);
        $this->db->delete('tbl_department');
    }


 public function getDepartment($sdepid){
     $this->db->select('*');
     $this->db->from('tbl_department');
     $this->db->where('dep_id',$sdepid);
     $qresult = $this->db->get();
     $result = $qresult->row();
     return $result;
 }



}