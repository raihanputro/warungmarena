<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
    {
        $search = @$_GET['cari'];
        
        $query = "SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id";
        
        if ($search != "") {
            $query = "SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id WHERE A.nama_brg like '%$search%'";
        }
        
        // $data['barang'] = $this->Model_barang->tampil_data()->result();
        $data['barang'] = $this->db->query($query)->result();
        $this->db->query('SELECT A.*,B.nama as kategori FROM tb_barang A LEFT JOIN tb_kategori B ON A.kategori_id=B.id');
        $data['user'] = $this->db->get_where('tb_user',['username'=>$this->session->userdata('username')])->row();
        $data['kategori'] = $this->db->get('tb_kategori')->result();
        $data['slider'] = $this->db->get('tb_slider')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
