<?php 

class Dashboard extends CI_Controller
{
  
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('role') != 'Admin'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('auth/login');
        }
    }

    public function index() {
      $data['dashboard_admin_active']="active";
      $data['data_barang_active']="";
      $data['data_invoice_active']="";
      $data['data_kategori_active']="";
      $data['data_slider_active']="";
      $data['data_pelanggan_active']="";
      $data['data_pendapatan_active']="";
      $data['data_admin_active']="";
      
      $query = $this->db->query("SELECT * FROM tb_invoice WHERE status='Selesai'");
      $data['pendapatan'] = $query->result_array();
      
      $query = $this->db->query("SELECT COUNT(id) as count FROM tb_invoice WHERE status='Pending'");
      $data['belumproses'] = $query->row();

      $query = $this->db->query("SELECT COUNT(id) as count FROM tb_user  WHERE role='Pelanggan'");
      $data['jumlah_pelanggan'] = $query->row();

      $query = $this->db->query("SELECT COUNT(id) as count FROM tb_invoice");
      $data['jumlah_invoice'] = $query->row();

      $query = $this->db->query("SELECT COUNT(id) as count FROM tb_user  WHERE role='Admin'");
      $data['jumlah_admin'] = $query->row();

      $query = $this->db->query("SELECT COUNT(id) as count FROM tb_invoice ");
      $data['jumlah_invoice_terbaru'] = $query->row();

      $query = $this->db->query("SELECT COUNT(id) as count FROM tb_user WHERE role='Pelanggan' ");
      $data['jumlah_pelanggan_terbaru'] = $query->row();

      $data['data_user'] = $this->db->query("SELECT * FROM tb_user WHERE role='Pelanggan' ORDER BY id DESC LIMIT 5")->result();

      $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice ORDER BY id DESC LIMIT 5")->result();
      
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar',$data);
        $this->load->view('admin/dashboard_admin/dashboard',$data);
        $this->load->view('admin/template/footer');
    }

}