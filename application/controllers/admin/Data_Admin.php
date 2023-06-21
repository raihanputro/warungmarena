<?php  
ob_start();
class Data_Admin extends CI_Controller
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
        $data['data_pendapatan_active']="";
        $data['data_admin_active']="active";

        $search = @$_GET['cari'];
        
        $data['search'] = $search;

        $query = $this->db->query("SELECT COUNT(id) as count FROM tb_user WHERE role='admin'");
        $data['jumlah_data_admin'] = $query->row();

        if ($search != "") {
            if (is_numeric($search)) {
                $data['data_admin'] = $this->db->query("SELECT * FROM tb_user WHERE (id like $search) AND (role = 'admin')")->result();
            } else {
                $data['data_admin'] = $this->db->query("SELECT * FROM tb_user WHERE (nama like '%$search%') AND (role = 'admin')")->result();
            }
        } else {
            $data['data_admin'] = $this->db->query("SELECT * FROM tb_user WHERE (role = 'admin')")->result();
        }

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/data_admin/index',$data);
		$this->load->view('admin/template/footer');
    }

	public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['user'] = $this->db->query("SELECT * FROM tb_user")->result();
            $nama     = $this->input->post('nama');
            $username    = $this->input->post('username');
            $password       = $this->input->post('password');
            $alamat          = $this->input->post('alamat');
            $rt = $this->input->post('rt');
            $hp           = $this->input->post('hp');
            $role = $this->input->post('role');
            $foto         = $_FILES['foto']['name'];
            if ($foto =''){}else{
                $config ['upload_path'] = './uploads/foto/';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto')){
                    echo "Foto Gagal di Upload!";
                }else {
                    $foto=$this->upload->data('file_name');
                }
            }
            $data = array(
                'nama'      => $nama,
                'username'    => $username,
                'password'      => $password,
                'alamat'         => $alamat,
                'rt' => $rt,
                'hp'          => $hp,
                'role'          => $role,
                'foto'        => $foto
            );

            $this->db->insert('tb_user',$data);
            redirect('admin/data_user/index');
        } else {
            $data['dashboard_admin_active']="";
            $data['data_barang_active']="";
            $data['data_invoice_active']="";
            $data['data_kategori_active']="";
            $data['data_slider_active']="";
            $data['data_pelanggan_active']="";
            $data['data_pendapatan_active']="";
            $data['data_admin_active']="active";

			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/data_pelanggan/tambah');
			$this->load->view('admin/template/footer');
        }
    }

	public function edit($id)
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->input->post();
            $nama     = $this->input->post('nama');
            $username    = $this->input->post('username');
            $email    = $this->input->post('email');
            $alamat          = $this->input->post('alamat');
            $rt          = $this->input->post('rt');
            $hp           = $this->input->post('hp');
            $foto         = $_FILES['foto']['name'];
            $foto_old = $data['foto_old'];
            unset($data['foto_old']);
            
            if ($foto==''){$foto = $foto_old;}else{
                $config ['upload_path'] = './uploads/foto/';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto')){
                    echo "Foto Gagal di upload!";
                }else {
                    $foto=$this->upload->data('file_name');
                }
            }

            $data = array(
                'nama'      => $nama,
                'username'    => $username,
                'email'         => $email,
                'alamat' => $alamat,
                'rt' => $rt,
                'hp'          => $hp,
                'foto'        => $foto
            );
	
			$this->db->where('id', $id);
			$this->db->update('tb_user',$data);

            redirect('admin/data_admin/index');
        } else {
            $row = $this->db->get_where('tb_user',['id'=>$id])->row();

			$data = [
				'row' => $row
			];

            $data['dashboard_admin_active']="";
            $data['data_barang_active']="";
            $data['data_invoice_active']="";
            $data['data_kategori_active']="";
            $data['data_slider_active']="";
            $data['data_pelanggan_active']="";
            $data['data_pendapatan_active']="";
            $data['data_admin_active']="active";

            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/data_admin/edit', $data);
            $this->load->view('admin/template/footer');
        }
    }

	public function hapus($id)
    {
        $this->db->where('id', $id);
		$this->db->delete('tb_user');

        redirect('admin/data_user/index');
    }

    public function unduh()
    {     
        $this->load->library('pdfgenerator');
        $data['data_admin'] = $this->db->query("SELECT * FROM tb_user WHERE (role = 'admin')")->result();
        $html = $this->load->view('admin/data_admin/unduh',$data, true); 
        $file_pdf = 'Data_admin_Warung_Marena';
        $paper = 'A4';
        $orientation = 'landscape';
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
    }
}
?>