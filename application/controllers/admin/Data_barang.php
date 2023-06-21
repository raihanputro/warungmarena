<?php 

class Data_barang extends CI_Controller
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
          redirect('welcome');
        }
    }

    public function index()
    {
        $data['dashboard_admin_active']="";
        $data['data_barang_active']="active";
        $data['data_invoice_active']="";
        $data['data_kategori_active']="";
        $data['data_slider_active']="";
        $data['data_pelanggan_active']="";
        $data['data_pendapatan_active']="";
        $data['data_admin_active']="";

        $data['data_kategori'] = $this->db->get('tb_kategori')->result();

        $search = @$_GET['cari'];
        $search_kategori = @$_GET['cari_kategori'];
        
        $data['search'] = $search;
        $data['search_kategori'] = $search_kategori;

        $query = $this->db->query("SELECT COUNT(id_brg) as count FROM tb_barang");
         $data['jumlah_data_barang'] = $query->row();

        if ($search != "" AND $search_kategori != "Pilih Kategori") {
            if (is_numeric($search)) {
                $data['data_barang'] = $this->db->query("SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id WHERE (A.id_brg like $search) AND (B.nama like '%$search_kategori%') ")->result();
            } else {
                $data['data_barang'] = $this->db->query("SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id WHERE (A.nama_brg like '%$search%') AND (B.nama like '%$search_kategori%') ")->result();
            }
        }  elseif($search != "") {
            if (is_numeric($search)) {
                $data['data_barang'] = $this->db->query("SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id WHERE (A.id_brg like $search)")->result();
            } else {
                $data['data_barang'] = $this->db->query("SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id WHERE (A.nama_brg like '%$search%')")->result();
            }
        } elseif($search_kategori != "Pilih Kategori"){
            $data['data_barang'] = $this->db->query("SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id WHERE (B.nama like '%$search_kategori%')")->result();
        }else {
            $data['data_barang'] = $this->db->query("SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id  ")->result();
        }


        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/data_barang/index', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah()
    {
        $data['dashboard_admin_active']="";
        $data['data_barang_active']="active";
        $data['data_invoice_active']="";
        $data['data_kategori_active']="";
        $data['data_slider_active']="";
        $data['data_pelanggan_active']="";
        $data['data_pendapatan_active']="";
        $data['data_admin_active']="";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_brg       = $this->input->post('nama_brg');
            $keterangan     = $this->input->post('keterangan');
            $kategori       = $this->input->post('kategori_id');
            $harga          = $this->input->post('harga');
            $stok           = $this->input->post('stok');
            $gambar         = $_FILES['gambar']['name'];
            if ($gambar =''){}else{
                $config ['upload_path'] = './uploads/gambar_barang';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar Gagal di Upload!";
                }else {
                    $gambar=$this->upload->data('file_name');
                }
            }
            $data = array(
                'nama_brg'      => $nama_brg,
                'keterangan'    => $keterangan,
                'kategori_id'      => $kategori,
                'harga'         => $harga,
                'stok'          => $stok,
                'gambar'        => $gambar
            );
           
            $this->db->insert('tb_barang',$data);
            redirect('admin/data_barang/index');
        } else {
            $data['data_kategori'] = $this->db->get('tb_kategori')->result();
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar',$data);
            $this->load->view('admin/data_barang/tambah', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->input->post();
            $nama_brg       = $this->input->post('nama_brg');
            $keterangan     = $this->input->post('keterangan');
            $kategori       = $this->input->post('kategori_id');
            $harga          = $this->input->post('harga');
            $stok           = $this->input->post('stok');
            $gambar_old     = $this->input->post('gambar_old');
            $gambar         = $_FILES['gambar']['name'];
            
            if ($gambar==''){$gambar = $gambar_old;}else{
                $config ['upload_path'] = './uploads/gambar_barang';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar Gagal di Upload!";
                }else {
                    $gambar=$this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_brg'      => $nama_brg,
                'keterangan'    => $keterangan,
                'kategori_id'      => $kategori,
                'harga'         => $harga,
                'stok'          => $stok,
                'gambar'        => $gambar
            );

            $this->db->where('id_brg', $id);
			$this->db->update('tb_barang',$data);
            
            redirect('admin/data_barang/index');
        } else {

            $row = $this->db->get_where('tb_barang',['id_brg'=>$id])->row();

            $data = [
                'row' => $row
            ];
    
            $data['data_kategori'] = $this->db->get('tb_kategori')->result();
            
            $data['dashboard_admin_active']="";
            $data['data_barang_active']="active";
            $data['data_invoice_active']="";
            $data['data_kategori_active']="";
            $data['data_slider_active']="";
            $data['data_pelanggan_active']="";
            $data['data_pendapatan_active']="";
            $data['data_admin_active']="";
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar',$data);
            $this->load->view('admin/data_barang/edit', $data);
            $this->load->view('admin/template/footer');
        }
       
    }
    
    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->Model_barang->hapus_data($where,'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function unduh()
    {     
        $this->load->library('pdfgenerator');
        $data['data_barang'] = $this->db->query("SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id")->result();
        $html = $this->load->view('admin/data_barang/unduh',$data, true); 
        $file_pdf = 'Data_Barang_Warung_Marena';
        $paper = 'A4';
        $orientation = 'landscape';
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
    }
}