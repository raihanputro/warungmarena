<?php  
ob_start();
class Data_Pelanggan extends CI_Controller
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
    
	public function index()
	{
        $data['dashboard_admin_active']="";
        $data['data_barang_active']="";
        $data['data_invoice_active']="";
        $data['data_kategori_active']="";
        $data['data_slider_active']="";
        $data['data_pelanggan_active']="active";
        $data['data_pendapatan_active']="";
        $data['data_admin_active']="";

        $search = @$_GET['cari'];
        $search_role = @$_GET['cari_role'];
        
        $data['search'] = $search;
        $data['search_role'] = $search_role;

        $query = $this->db->query("SELECT COUNT(id) as count FROM tb_user WHERE role='pelanggan'");
        $data['jumlah_data_pelanggan'] = $query->row();

        if($search != "") {
            if (is_numeric($search)) {
                $data['data_pelanggan'] = $this->db->query("SELECT * FROM tb_user WHERE (id like $search) and (role='pelanggan')")->result();
            } else {
                $data['data_pelanggan'] = $this->db->query("SELECT * FROM tb_user WHERE (nama like '%$search%') and (role='pelanggan') ")->result();
            }
        } else {
            $data['data_pelanggan'] = $this->db->query("SELECT * FROM tb_user WHERE (role='pelanggan')")->result();
        }

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/data_pelanggan/index',$data);
		$this->load->view('admin/template/footer');
    }

    public function unduh()
    {     
        $this->load->library('pdfgenerator');
        $data['data_pelanggan'] = $this->db->query("SELECT * FROM tb_user WHERE role='pelanggan'")->result();
        $html = $this->load->view('admin/data_pelanggan/unduh',$data, true); 
        $file_pdf = 'Data_Pelanggan_Warung_Marena';
        $paper = 'A4';
        $orientation = 'landscape';
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
    }
}
?>