<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Model_Karyawan extends CI_Model{
    public function tambah_karyawan($data){
        $this->db->insert('karyawan',$data);
    }
    public function select_karyawan(){
        $hasil=$this->db->get('karyawan');
        if($hasil->num_rows()>0){
            return $hasil->result();
        }else{
            return false;
        }
    }
    public function delete_karyawan($id){
        $this->db->where('id',$id)->delete('karyawan');
    }
    public function get_karyawan_by_id($id){
        $this->db->where('id',$id)
                ->limit(1)
                ->get('karyawan');
        if($hasil->num_rows()>0){
            return $hasil->row();
        }
        else{
            return false;
        }
    }
    public function update_karyawan($id,$data){
        $this->db->where('id',$id)->update('karyawan',$data);
    }
}