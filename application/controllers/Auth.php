<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth');
    }
    public function index()
    {
        $data['title'] = "Login Lapak Tani";

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            viewAuth('login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {

                if ($user['is_active'] == 1) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == "admin") {
                        redirect('Admin');
                    } elseif ($user['role'] == "kurir") {
                        redirect('Kurir');
                    } else {
                        redirect('User_penjualan');
                    }
                } else {
                    $this->session->set_flashdata('pesan_kesalahan', 'Akun Anda Belum Aktif');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('pesan_kesalahan', 'Password Anda Salah!');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('pesan_kesalahan', 'Email Belum Terdaftar!');
            redirect('Auth');
        }
    }

    public function registrasi()
    {
        $data['title'] = "Registrasi Lapak Tani";

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jeni_Kelamin', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor Headphone', 'required|trim');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password Tidak Sesuai',
            'min_length' => 'Password Terlalu Pendek Minimal 5 Karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            viewAuth('registrasi', $data);
        } else {
            $this->Model_auth->registrasi();
            $token = base64_encode(random_bytes(32));
            $this->Model_auth->token($token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('pesan', 'Behasil Registrasi! Activasi Akun Yang Dikirim Ke Email Anda');
            redirect('Auth');
        }
    }

    public function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'antonisaputra335@gmail.com',
            'smtp_pass' => 'tfaxmgwskcynpjdj',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('antonisaputra335@gmail.com', 'antoni saputra');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Click link untuk verifikasi akun lapak tani : <a href="' . base_url() . 'Auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activasi Akun Lapak Tani</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click link untuk reset password akun lapak tani : <a href="' . base_url() . 'Auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password Akun Lapak Tani</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email =  $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->where('email', $email);
                    $this->db->update('user', ['is_active' => 1]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('pesan', 'Verifikasi Akun Berhasil');
                    redirect('Auth');
                } else {

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('pesan_kesalahan', 'Activasi ' . $email . ' Sudah Kadaluarsa!');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('pesan_kesalahan', 'Token Anda Salah!');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('pesan_kesalahan', 'Email Tidak Terdaftar!');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', 'Anda Berhasil Keluar!');
        redirect('Auth');
    }

    public function lupa_password()
    {
        $data['title'] = "Lupa Password";

        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            viewAuth('lupa_password', $data);
        } else {
            $email = $this->input->post('email');

            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $this->Model_auth->token($token);

                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('pesan', 'Silahkan Cek Email Untuk Verifikasi Akun Email Anda!');
                redirect('Auth/lupa_password');
            } else {
                $this->session->set_flashdata('pesan_kesalahan', 'Email Tidak Terdaftar Atau Belum Verifikasi');
                redirect('Auth/lupa_password');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();

            if($user_token){
                $this->session->set_userdata('reset_email',$email);
                $this->gantiPassword();
            }else{
                $this->session->set_flashdata('pesan_kesalahan', 'Token Salah!');
                redirect('Auth/lupa_password');    
            }
        } else {
            $this->session->set_flashdata('pesan_kesalahan', 'Email Salah!');
            redirect('Auth/lupa_password');
        }
    }

    public function gantiPassword(){

        if(!$this->session->userdata('reset_email')){
            redirect('Auth');
        }

        $data['title'] = "Ganti Password";
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password Tidak Sesuai',
            'min_length' => 'Password Terlalu Pendek Minimal 5 Karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password Baru', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false){
            viewAuth('ganti_password', $data);
        }else{
            $this->Model_auth->gantiPassword();
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('pesan', 'Anda Berhasil Keluar!');
            redirect('Auth');
        }
    }
}
