<?php

class Auth extends CI_Controller
{

    public function masuk()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email wajib diisi!', 'valid_email' => 'Alamat email tidak valid!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim',  ['required' => 'Password wajib diisi!']);

        if($this->form_validation->run() == false)
        {
            $this->load->view('auth/masuk');
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->query("SELECT * FROM tb_user WHERE (email like '%$email%')")->row();

            if($user) {
                if($user->aktivasi == 1) {
                    if(password_verify($password, $user->password)) {

                    $this->session->set_userdata('userid', $user->id);
                    $this->session->set_userdata('username', $user->username);
                    $this->session->set_userdata('role', $user->role);

                        switch ($user->role) {
                            case 'Admin':
                                redirect('admin/dashboard');
                                break;
        
                            case 'Pelanggan':
                                redirect('welcome');
                                break;
                            
                            default:
                                # code...
                                break;
                        }
                    } else {
                        $this->session->set_flashdata('pesan', '<p class="form-input-error">Password salah!</p>');
                        redirect('auth/masuk');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<p class="form-input-error">Email belum di aktivasi!</p>');
                    redirect('auth/masuk');
                }
            } else {
                $this->session->set_flashdata('pesan', '<p class="form-input-error">Email tidak terdaftar!</p>');
                redirect('auth/masuk');
            }
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_dash', 
            [
                'required' => 'Username wajib diisi!',
                'alpha_dash' => 'Tidak boleh ada spasi!'
            ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', 
            [
                'required' => 'Email wajib diisi!',
                'valid_email' => 'Alamat email tidak valid!',
                'is_unique' => 'Email sudah terdaftar!'
            ]
        );
        $this->form_validation->set_rules('password_1', 'Password_1', 'required|trim|min_length[5]|matches[password_2]', 
            [
                'required' => 'Password wajib diisi!',
                'matches' => 'Password tidak cocok!',
                'min_length' => 'password minimal 5 karakter!'
            ]
        );
        $this->form_validation->set_rules('password_2', 'Password_2', 'required|trim|matches[password_1]');

        if($this->form_validation->run() == false){
            $this->load->view('auth/daftar');
        }else{
            $data = array(
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password_1'), PASSWORD_DEFAULT),
                'role' => 'Pelanggan',
                'aktivasi' => 0,
                'tgl_buat' => time()
            );

            $token = base64_encode(random_bytes(32));

            $user_token = array(
                'email' => $this->input->post('email', true),
                'token' => $token,
                'tgl_dibuat' => time()
            );

            $this->db->insert('tb_user', $data);
            $this->db->insert('tb_token_user', $user_token);

            $this->kirimEmail($token, 'verifikasi');

            $this->session->set_flashdata('pesanaktivasi', '<p class="form-input-error-aktivasi succses">Silahkan cek kotak masuk dan spam email kamu ya! Mimin udah kirim link aktivasi nya loh!</p>');
            redirect('auth/masuk');
        }
    }

    private function kirimEmail($token, $type) 
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'warungmarena461@gmail.com',
            'smtp_pass' => 'wmfhqcobkbjaqmeg',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",    
        ];   
        
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('warungmarena461', 'Warung Marena');
        $this->email->to($this->input->post('email'));

        if($type == 'verifikasi') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link ini untuk verifikasi akun kamu! <a href="'. base_url() . 'auth/verifikasi?email='. $this->input->post('email') . '&token=' . urlencode($token) .'">Aktivasi!</a>');   
        } elseif($type == 'lupa_password') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password akun kamu! <a href="'. base_url() . 'auth/reset_password?email='. $this->input->post('email') . '&token=' . urlencode($token) .'">Reset Password!</a>');   
        }

        if($this->email->send()){
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verifikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        $token_user = $this->db->get_where('tb_token_user', ['token' => $token])->row_array();

        if($user) {
            if($token_user) {
                if(time() - $token_user['tgl_dibuat'] < (60*60*24)) {
                    $this->db->set('aktivasi', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tb_user');
                    $this->db->delete('tb_token_user', ['email' => $email]);

                    $this->session->set_flashdata('pesanaktivasi', '<p class="form-input-error-aktivasi succses">Aktivasi akun berhasil! Silahkan Masuk!');
                    redirect('auth/masuk');
                } else {
                    $this->db->delete('tb_token_user', ['email' => $email]);

                    $this->session->set_flashdata('pesanaktivasi', '<p class="form-input-error-aktivasi">Aktivasi akun gagal! Token expired!');
                    redirect('auth/masuk');
                }
            } else {
                $this->session->set_flashdata('pesanaktivasi', '<p class="form-input-error-aktivasi">Aktivasi akun gagal! Token tidak valid!</p>');
                redirect('auth/masuk');
            }
        } else {
            $this->session->set_flashdata('pesanaktivasi', '<p class="form-input-error-aktivasi">Aktivasi akun gagal! Salah email!</p>');
            redirect('auth/masuk');
        }
    }  

    public function lupa_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', 
            [
                'required' => 'Email wajib diisi!',
                'valid_email' => 'Alamat email tidak valid!',
            ]
        );

        if($this->form_validation->run() == false){
            $this->load->view('auth/lupa_password');
        }else{
            $email = $this->input->post('email');
            $user = $this->db->get_where('tb_user', ['email' => $email, 'aktivasi' => 1])->row_array();

            if($user) {
                $token = base64_encode(random_bytes(32));

                $user_token = array(
                    'email' => $this->input->post('email', true),
                    'token' => $token,
                    'tgl_dibuat' => time()
                );

                $this->db->insert('tb_token_user', $user_token);
                $this->kirimEmail($token, 'lupa_password');

                $this->session->set_flashdata('pesanresetpassword', '<p class="form-input-error-aktivasi succses">Cek email kamu untuk me-reset password!</p>');
                redirect('auth/lupa_password');


            } else {
                $this->session->set_flashdata('pesan', '<p class="form-input-error-aktivasi">Email tidak terdaftar atau belum aktif!</p>');
                redirect('auth/lupa_password');
            }
        }

    }

    public function reset_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        $token_user = $this->db->get_where('tb_token_user', ['token' => $token])->row_array();

        if($user) {
            if($token_user) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubah_password();
            } else {
                $this->session->set_flashdata('pesanaktivasi', '<p class="form-input-error-aktivasi">Reset password gagal! Token tidak valid!</p>');
                redirect('auth/masuk');
            }
        } else {
            $this->session->set_flashdata('pesanaktivasi', '<p class="form-input-error-aktivasi">Reset password akun gagal! Salah email!</p>');
            redirect('auth/masuk');
        }
    }  

    public function ubah_password() 
    {
        if(!$this->session->userdata('reset_email')) {
            redirect('auth/masuk');
        };

        $token = $this->input->get('token');
        $token_user = $this->db->get_where('tb_token_user', ['token' => $token])->row_array();

        $this->form_validation->set_rules('password_1', 'Password_1', 'required|trim|min_length[5]|matches[password_2]', 
        [
            'required' => 'Password wajib diisi!',
            'matches' => 'Password tidak cocok!',
            'min_length' => 'password minimal 5 karakter!'
        ]);

        $this->form_validation->set_rules('password_2', 'Password_2', 'required|trim|matches[password_1]', 
        [
            'required' => 'Ulangi password wajib diisi!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('auth/ubah_password');
        }else{
            $password = password_hash($this->input->post('password_1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');
            $this->db->delete('tb_token_user', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('pesanaktivasi', '<p class="form-input-error-aktivasi succses">Reset password akun berhasil! Silahkan Masuk!');
            redirect('auth/masuk');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth/masuk');
        
    }
}