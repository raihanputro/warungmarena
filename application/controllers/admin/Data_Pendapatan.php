<?php  
class Data_Pendapatan extends CI_Controller
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
		$data['data_pelanggan_active']="";
		$data['data_pendapatan_active']="active";
        $data['data_admin_active']="";

		$data['data_pendapatan'] = $this->db->query("SELECT * FROM tb_invoice WHERE status='Selesai' ")->result();
        $data['a_href'] = base_url('admin/data_pendapatan/unduh/');

        $query = $this->db->query("SELECT COUNT(id) as count FROM tb_invoice WHERE status='Selesai'");
        $data['jumlah_data_pendapatan'] = $query->row();

		if (@$_GET['dari'])
        {
            $dari = @$_GET['dari'];
            $sampai = @$_GET['sampai'];
    
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            $query = $this->db->query("SELECT * FROM tb_invoice WHERE DATE(tgl_pesan) BETWEEN '$_GET[dari]' AND '$_GET[sampai]' AND status='Selesai' ");
            $data['data_pendapatan'] = $query->result();
            $data['a_href'] = base_url().'admin/data_pendapatan/unduh/'.$dari.'/'.$sampai;
        }
	
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/data_pendapatan/index',$data);
		$this->load->view('admin/template/footer');
	}

	public function unduh()
    {     
        $dari =  $this->uri->segment(4);
        $sampai =  $this->uri->segment(5);

        $this->load->library('pdfgenerator');
        $data['data_pendapatan'] = $this->db->query("SELECT * FROM tb_invoice WHERE status='Selesai' ")->result();

		if($dari)
        {
            $query = $this->db->query("SELECT * FROM tb_invoice WHERE DATE(tgl_pesan) BETWEEN '$dari' AND '$sampai' AND status='Selesai' ");
            $data['data_pendapatan'] = $query->result();
        }

        $html = $this->load->view('admin/data_pendapatan/unduh',$data, true); 
        $file_pdf = 'Data_Pendapatan_Warung_Marena';
        $paper = 'A4';
        $orientation = 'landscape';
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
    }
}
?>