<?php 

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') != '2'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('auth/login');
        }
        
        $this->user = $this->db->get_where('tb_user',['username'=>$this->session->userdata('username')])->row();
    }

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->Model_barang->find($id);

        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => $_POST['qty'],
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg
        );

        $this->cart->insert($data);
        redirect('welcome');
    }
    
    public function detail_keranjang()
    {
        $data['user'] = $this->user;
        $user_id = $this->session->userdata('userid');
        
        $data['wishlist'] = $this->db->query("SELECT A.* FROM tb_barang A INNER JOIN tb_wishlist B ON A.id_brg=B.id_brg WHERE B.user_id=$user_id")->result();
        $data['kategori'] = $this->db->get('tb_kategori')->result();
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('keranjang',$data);
        $this->load->view('templates/footer');
    }
    
    
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome/index');
    }
    
    public function update_item($rowid)
    {
        $data = [
            'rowid' => $rowid,
            'qty' => $_GET['qty']
        ];
        $this->cart->update($data);
        redirect('dashboard/detail_keranjang');
    }
    
    public function pembayaran()
    {
        $data['user'] = $this->user;
        $data['kategori'] = $this->db->get('tb_kategori')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('pembayaran');
        $this->load->view('templates/footer',$data);
    }

    public function proses_pesanan()
    {
        $is_processed = $this->Model_invoice->index();
        $post = $this->input->post();
        if($is_processed['status']){
            $this->cart->destroy();
            
            $data['metode'] = $post['metode'];
            $data['id'] = $is_processed['id'];
            $data['user'] = $this->user;
            $data['kategori'] = $this->db->get('tb_kategori')->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$data);
            $this->load->view('proses_pesanan',$data);
            $this->load->view('templates/footer');
        }else{
            echo "Maaf pesanan anda gagal diproses!";
        }
    }

    public function detail($id_brg)
    {
        $data['barang'] = $this->Model_barang->detail_brg($id_brg);
        $data['user'] = $this->user;
        $data['kategori'] = $this->db->get('tb_kategori')->result();
        $user_id = $this->session->userdata('userid');
        
        $data['wishlist'] = $this->db->get_where('tb_wishlist',['user_id'=>$user_id,'id_brg'=>$id_brg])->row();
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('detail_barang',$data);
        $this->load->view('templates/footer');
    }
    
    public function upload($id) {
        $config['upload_path']          = './uploads/bukti/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048;
 
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('file')) 
        {
            $error = $this->upload->display_errors();
            var_dump($error);
        
        }
        else 
        {
            $filename = $this->upload->data();
            $filename = $filename['file_name'];
            
            $this->db->set('bukti',$filename);
            $this->db->where('id',$id);
            $this->db->update('tb_invoice');
            
            redirect('dashboard/berhasilproses');
        }
    }
    
    public function berhasilproses() {
        $data['user'] = $this->user;
        $data['kategori'] = $this->db->get('tb_kategori')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('berhasil_proses');
        $this->load->view('templates/footer');
    }
    
    public function profil(){
        $username = $this->session->userdata('username');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = $this->input->post();
            
            $gambar         = $_FILES['foto']['name'];
            
            if ($data['password'] == '') {
                unset($data['password']);
            }
            $gambarold = $data['gambarold'];
            unset($data['gambarold']);
            
            
            if ($gambar==''){$gambar = $gambarold;}else{
                $config ['upload_path'] = './uploads/foto/';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';
    
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto')){
                    echo "Gambar Gagal di Upload!";
                }else {
                    $gambar=$this->upload->data('file_name');
                }
            }
            
            $data['foto'] = $gambar;
            
            $this->db->where('username', $username);
            $this->db->update('tb_user', $data);
            redirect('dashboard/profil');
        } else {
            $data['profil'] = $this->db->get_where('tb_user',['username'=>$username])->row();
            $data['user'] = $this->user;
            $data['kategori'] = $this->db->get('tb_kategori')->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$data);
            $this->load->view('profil',$data);
            $this->load->view('templates/footer');
        }
    }
    
    public function pesanan() {
        $data['pesanan'] = $this->db->get_where('tb_invoice',['user_id'=>$this->session->userdata('userid')])->result();
        $data['user'] = $this->user;
        $data['kategori'] = $this->db->get('tb_kategori')->result();
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('pesanan',$data);
        $this->load->view('templates/footer');
    }
    
    public function upload_bukti($id) {
        $data['id'] = $id;
        $data['from'] = 'upload';
        $data['user'] = $this->user;
        $data['kategori'] = $this->db->get('tb_kategori')->result();
        $data['invoice'] = $this->db->get_where('tb_invoice',['id'=>$id])->row();
        $data['pesanan'] = $this->Model_invoice->ambil_id_pesanan($id);
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('proses_pesanan',$data);
        $this->load->view('templates/footer');
    }
    
    public function tambah_wishlist($id_brg) {
        $user_id = $this->session->userdata('userid');
        $status = $_POST['status'];
        
        if ($status=='add') {
            $insert = [
                'user_id' => $user_id,
                'id_brg' => $id_brg
            ];
            
            $this->db->insert('tb_wishlist',$insert);
        } else {
            $this->db->where('user_id',$user_id);
            $this->db->where('id_brg',$id_brg);
            $this->db->delete('tb_wishlist');
        }
        
        redirect('dashboard/detail/'.$id_brg);
    }
    
    public function kategori($id) {
        $search = @$_GET['cari'];
        
        // $query = "SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id";
        
        // if ($search != "") {
        //     $query = "SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id WHERE A.nama_brg like '%$search%'";
        // }
        
        $data['kategori'] = $this->db->get('tb_kategori')->result();
        
        $this->db->where('kategori_id',$id);
        if ($search != "") {
            $this->db->where("nama_brg like '%$search%'");
        }
        $data['barang'] = $this->db->get('tb_barang')->result();
        
        $data['user'] = $this->user;
        $data['slider'] = $this->db->get('tb_slider')->result();
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('kategori',$data);
        $this->load->view('templates/footer');
    }
    
} 