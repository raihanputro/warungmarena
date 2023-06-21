<?php  

class Data_Kategori extends CI_Controller
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
		$data['data_kategori_active']="active";
		$data['data_slider_active']="";
		$data['data_pelanggan_active']="";
		$data['data_pendapatan_active']="";
		$data['data_admin_active']="";

		$query = $this->db->query("SELECT COUNT(id) as count FROM tb_kategori");
      	$data['jumlah_data_kategori'] = $query->row();

		$search = @$_GET['cari'];

        if ($search != "") {
			if (is_numeric($search)) {
				$data['data_kategori'] = $this->db->query("SELECT * FROM tb_kategori WHERE (id like $search)")->result();
			} else {
				$data['data_kategori'] = $this->db->query("SELECT * FROM tb_kategori WHERE (nama like '%$search%')")->result();
			}
        } else {
            $data['data_kategori'] = $this->db->get('tb_kategori')->result();
        }

		$this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar',$data);
        $this->load->view('admin/data_kategori/index', $data);
        $this->load->view('admin/template/footer');
	}

	public function tambah(){
		$data['dashboard_admin_active']="";
		$data['data_barang_active']="";
		$data['data_invoice_active']="";
		$data['data_kategori_active']="active";
		$data['data_slider_active']="";
		$data['data_pelanggan_active']="";
		$data['data_pendapatan_active']="";
		$data['data_admin_active']="";
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = $this->input->post();

			$this->db->insert('tb_kategori',$data);

			redirect('admin/data_kategori');
		} else {
			$this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/data_kategori/tambah');
            $this->load->view('admin/template/footer');
		}
	}

	public function edit($id){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = $this->input->post();
			
			$this->db->where('id', $id);
			$this->db->update('tb_kategori',$data);

			redirect('admin/data_kategori/index');
		} else {
			$row = $this->db->get_where('tb_kategori',['id'=>$id])->row();

			$data = [
				'row' => $row
			];

			$data['dashboard_admin_active']="";
			$data['data_barang_active']="";
			$data['data_invoice_active']="";
			$data['data_kategori_active']="active";
			$data['data_slider_active']="";
			$data['data_pelanggan_active']="";
			$data['data_pendapatan_active']="";
			$data['data_admin_active']="";

			$this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar',$data);
            $this->load->view('admin/data_kategori/edit',$data);
            $this->load->view('admin/template/footer');
		}
	}

	public function hapus($id) {
		$this->db->where('id', $id);
		$this->db->delete('tb_kategori');

		if ($this->db->error()['code'] == 1451) {
			$this->session->set_flashdata('error', 'Tidak bisa hapus data, karena data sudah berelasi');
		}
		redirect('admin/data_kategori');
	}

	public function unduh()
    {     
        $this->load->library('pdfgenerator');
		$data['data_kategori'] = $this->db->get('tb_kategori')->result();
        $html = $this->load->view('admin/data_kategori/unduh',$data, true); 
        $file_pdf = 'Data_Kategori_Warung_Marena';
        $paper = 'A4';
        $orientation = 'landscape';
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
    }

}