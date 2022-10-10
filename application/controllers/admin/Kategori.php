<?php  

class Kategori extends CI_Controller{
    public function index()
	{
		$data['kategori'] = $this->db->get('tb_kategori')->result();

		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kategori/index', $data);
        $this->load->view('templates_admin/footer');
	}

	public function tambah(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = $this->input->post();

			$this->db->insert('tb_kategori',$data);

			redirect('admin/kategori');
		} else {
			$this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/kategori/tambah_kategori');
            $this->load->view('templates_admin/footer');
		}
	}

	public function edit($id){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = $this->input->post();
			
			$this->db->where('id', $id);
			$this->db->update('tb_kategori',$data);

			redirect('admin/kategori');
		} else {
			$row = $this->db->get_where('tb_kategori',['id'=>$id])->row();

			$data = [
				'row' => $row
			];

			$this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/kategori/save',$data);
            $this->load->view('templates_admin/footer');
		}
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('tb_kategori');

		if ($this->db->error()['code'] == 1451) {
			$this->session->set_flashdata('error', 'Tidak bisa hapus data, karena data sudah berelasi');
		}
		redirect('admin/kategori');
	}
}