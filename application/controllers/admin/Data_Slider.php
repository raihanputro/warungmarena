<?php  
class Data_Slider extends CI_Controller
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
		$data['data_slider_active']="active";
		$data['data_pelanggan_active']="";
		$data['data_pendapatan_active']="";
		$data['data_admin_active']="";

		$search = @$_GET['cari'];

		$query = $this->db->query("SELECT COUNT(id) as count FROM tb_slider");
      	$data['jumlah_data_slider'] = $query->row();

        if ($search != "") {
            $data['data_slider'] = $this->db->query("SELECT * FROM tb_slider WHERE (id like '%$search%')")->result();
        } else {
            $data['data_slider'] = $this->db->get('tb_slider')->result();	
        }

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/data_slider/index',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$gambar = $_FILES['gambar']['name'];

			if($gambar=''){}else{
				$config['upload_path'] = "./uploads/slider";
				$config['allowed_types'] = "jpg|jpeg|png|gif";

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar'))
				{
					echo "Gambar Gagal Diupload";
				}
				else
				{
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = array (
				'gambar' => $gambar
			);

			$this->db->insert('tb_slider',$data);
			redirect('admin/data_slider/index');
		} else {
			$data['dashboard_admin_active']="";
			$data['data_barang_active']="";
			$data['data_invoice_active']="";
			$data['data_kategori_active']="";
			$data['data_slider_active']="active";
			$data['data_pelanggan_active']="";
			$data['data_pendapatan_active']="";
			$data['data_admin_active']="";

			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/data_slider/tambah');
			$this->load->view('admin/template/footer');
		}
	}

	public function hapus($id)
	{
		$where = array('id'=>$id);
		$get = $this->db->get_where('tb_slider',$where)->row();
		$path = './uploads/slider/';
		unlink($path.$get->gambar);
		$this->db->where($where);
		$this->db->delete('tb_slider');
		redirect('admin/data_slider/index');
	}

	public function unduh()
    {     
        $this->load->library('pdfgenerator');
		$data['data_slider'] = $this->db->get('tb_slider')->result();	
        $html = $this->load->view('admin/data_slider/unduh',$data, true); 
        $file_pdf = 'Data_Slider_Warung_Marena';
        $paper = 'A4';
        $orientation = 'landscape';
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
    }
}
?>