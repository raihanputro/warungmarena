<?php 

class Model_kategori extends CI_Model{
    public function data_sembako(){
        return $this->db->get_where('tb_barang', array('kategori' => 'Sembako'));
    }

    public function data_jajanan(){
        return $this->db->get_where('tb_barang', array('kategori' => 'Jajanan'));
    }

    public function data_mainan(){
        return $this->db->get_where('tb_barang', array('kategori' => 'Mainan'));
    }

    public function data_atk(){
        return $this->db->get_where('tb_barang', array('kategori' => 'Atk'));
    }
}