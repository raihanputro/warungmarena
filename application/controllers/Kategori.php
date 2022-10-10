<?php

class Kategori extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->user = $this->db->get_where('tb_user',['username'=>$this->session->userdata('username')])->row();    
    }
    
    public function sembako()
    {
        $data['sembako'] = $this->Model_kategori->data_sembako()->result();
        $data['user'] = $this->user;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('sembako',$data);
        $this->load->view('templates/footer');
    }

    public function jajanan()
    {
        $data['jajanan'] = $this->Model_kategori->data_jajanan()->result();
        $data['user'] = $this->user;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('jajanan',$data);
        $this->load->view('templates/footer');
    }
    public function mainan()
    {
        $data['mainan'] = $this->Model_kategori->data_mainan()->result();
        $data['user'] = $this->user;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('mainan',$data);
        $this->load->view('templates/footer');
    }
    public function atk()
    {
        $data['atk'] = $this->Model_kategori->data_atk()->result();
        $data['user'] = $this->user;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('atk',$data);
        $this->load->view('templates/footer');
    }
    
    public function search()
    {
        $search = $_GET['search'];
        
        $data['search'] = $this->db->like('nama_brg',$search,'both')->get('tb_barang')->result();
        $data['user'] = $this->user;
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('search',$data);
        $this->load->view('templates/footer');
    }
}