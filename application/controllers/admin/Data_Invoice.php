<?php  

class Data_Invoice extends CI_Controller
{
    
    public function __construct(){
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
        $data['data_invoice_active']="active";
        $data['data_kategori_active']="";
        $data['data_slider_active']="";
        $data['data_pelanggan_active']="";
        $data['data_pendapatan_active']="";
        $data['data_admin_active']="";

        $search = @$_GET['cari'];
        $search_status = @$_GET['cari_status'];

        $data['search'] = $search;
        $data['search_status'] = $search_status;

        $query = $this->db->query("SELECT COUNT(id) as count FROM tb_invoice");
        $data['jumlah_data_invoice'] = $query->row();

        if ($search != "" AND $search_status != "Pilih Status") {
            if (is_numeric($search)) {
                $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice WHERE (id like $search) AND (status like '%$search_status%') ORDER BY id DESC")->result();
            } else {
                $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice WHERE (nama like '%$search%') AND (status like '%$search_status%') ORDER BY id DESC")->result();
            }
        }  elseif($search != "") {
            if (is_numeric($search)) {
                $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice WHERE (id like $search) ORDER BY id DESC")->result();
            } else {
                $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice WHERE (nama like '%$search%')  ORDER BY id DESC")->result();
            }
        } elseif($search_status != "Pilih Status"){
            $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice WHERE (status like '%$search_status%')  ORDER BY id DESC")->result();
        }else {
            $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice ORDER BY id DESC ")->result();
        }

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar',$data);
        $this->load->view('admin/data_invoice/index',$data);
        $this->load->view('admin/template/footer');
    }

    public function detail($id)
    {
        $data['dashboard_admin_active']="";
        $data['data_barang_active']="";
        $data['data_invoice_active']="active";
        $data['data_kategori_active']="";
        $data['data_slider_active']="";
        $data['data_pelanggan_active']="";
        $data['data_pelanggan_active']=""; 
        $data['data_pendapatan_active']="";
        $data['data_admin_active']="";

        $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice WHERE id = $id LIMIT 1 ")->row();
        $data['data_pesanan'] = $this->db->query("SELECT * FROM tb_pesanan WHERE id_invoice = $id")->result();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/data_invoice/detail',$data);
        $this->load->view('admin/template/footer');
    }
    
    public function updatestatus($id) {
        $data = $this->input->post();
        $this->db->set('status',$data['status']);
        $this->db->where('id',$id);
        $this->db->update('tb_invoice');
        
        $pesanan = $this->db->get_where('tb_pesanan',['id_invoice'=>$id])->result();
        
        if ($data['status'] == 'Selesai') {
            foreach($pesanan as $item) {
                $this->db->set('terjual', 'terjual+'.$item->jumlah, FALSE);
                $this->db->where('id_brg',$item->id_brg);
                $this->db->update('tb_barang');
            }
        }
        
        redirect('admin/data_invoice/detail/'.$id);
    }

    public function unduh()
    {     
        $this->load->library('pdfgenerator');
        $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice ORDER BY id DESC ")->result();
        $html = $this->load->view('admin/data_invoice/unduh',$data, true); 
        $file_pdf = 'Data_Invoice_Warung_Marena';
        $paper = 'A4';
        $orientation = 'landscape';
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
    }

    public function unduh_detail($id)
    {     
        $this->load->library('pdfgenerator');
        $data['data_invoice'] = $this->db->query("SELECT * FROM tb_invoice WHERE id = $id LIMIT 1 ")->row();
        $data['data_pesanan'] = $this->db->query("SELECT * FROM tb_pesanan WHERE id_invoice = $id")->result();
        $html = $this->load->view('admin/data_invoice/unduh_detail',$data, true); 
        $file_pdf = 'Data_Invoice_Warung_Marena';
        $paper = 'A4';
        $orientation = 'landscape';
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
    }
}