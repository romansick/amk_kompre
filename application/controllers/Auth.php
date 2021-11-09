<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->model('Auth_model');
        $this->load->model('Konsumen_model');
        $data['rumah'] = $this->Konsumen_model->getRumah();
        $data['tipe'] = $this->db->get('tipe_rumah')->result_array();
        $data['user'] = $this->Auth_model->getKaryawan();
        $data['title'] = 'AMK';
        $this->load->view('template/header_auth', $data);
        $this->load->view('auth/index', $data);
        $this->load->view('template/footer_auth');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'login';
            $this->load->view('template/header_auth', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('template/footer_auth');
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
            // usernya aktif
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id'  => $user['role_id'],
                        'id' => $user['id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('administrator');
                    } else if ($user['role_id'] == 3) {
                        redirect('konsumen');
                    } else if ($user['role_id'] == 2) {
                        redirect('pimpinan');
                    } else if ($user['role_id'] == 7) {
                        redirect('keuangan');
                    } else if ($user['role_id'] == 4) {
                        redirect('administrasi');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                                Password Salah!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                    );
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Username Tidak Aktif!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                );
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Username Tidak Terdaftar!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
            );
            redirect('auth/login');
        }
    }

    public function register()
    {
        $data['title'] = 'Registrasi';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password terlalu pendek. Minimal 6 karakter!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_auth', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('template/footer_auth');
        } else {
            $data = [
                'email'        => htmlspecialchars($this->input->post('email', true)),
                'nama'         => htmlspecialchars($this->input->post('nama', true)),
                'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image'        => 'default.png',
                'no_hp'        => htmlspecialchars($this->input->post('no_hp', true)),
                'role_id'      => 3,
                'is_active'    => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Berhasil Registrasi! Silahkan Login
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
            );
            redirect('auth/login');
        }
    }

    // registrasi konsumen
    public function registrasikonsumen()
    {
        $data['title'] = 'Registrasi';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password terlalu pendek. Minimal 6 karakter!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_auth', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('template/footer_auth');
        } else {
            $data = [
                'email'        => htmlspecialchars($this->input->post('email', true)),
                'nama'         => htmlspecialchars($this->input->post('nama', true)),
                'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image'        => 'default.png',
                'no_hp'        => htmlspecialchars($this->input->post('no_hp', true)),
                'role_id'      => 3,
                'is_active'    => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Berhasil Registrasi! Silahkan Login
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
            );
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Berhasil Logout!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
        );
        redirect('auth/login');
    }
}
