<?php  
class Slider extends CI_Controller
{
    
	public function index()
	{
		$data['barang'] = $this->db->get('tb_slider')->result();	
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/slider/index',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
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
		redirect('admin/slider/index');
	}


	public function hapus($id)
	{
		$where = array('id'=>$id);
		$get = $this->db->get_where('tb_slider',$where)->row();
		$path = './uploads/slider/';
		unlink($path.$get->gambar);
		$this->db->where($where);
		$this->db->delete('tb_slider');
		redirect('admin/slider/index');
	}
}
?>