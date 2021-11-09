<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tipe'] = $this->Admin_model->countRumah();
        $data['lokasi'] = $this->db->get('lokasi_rumah')->result_array();
        $data['title'] = 'Dashboard';
        $data['konsumen'] = $this->Admin_model->konsumen();
        $data['rumah'] = $this->Admin_model->rumah();
        $data['transaksi'] = $this->Admin_model->transaksi();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function role()
    {
        $data['title'] = 'Role User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/head', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'role' => $this->input->post('role')
            ];
            $this->db->insert('user_role', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Role user berhasil ditambahkan!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
            );
            redirect('administrator/role');
        }
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('template/footer', $data);
    }
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Hak Akses Berhasil Diubah
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
        );
    }
    public function bank()
    {
        $data['title'] = 'Bank';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bank'] = $this->db->get('bank')->result_array();

        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim');
        $this->form_validation->set_rules('nama_bank', 'Bank', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/head', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/bank', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'no_rek' => $this->input->post('no_rek'),
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'nama_bank' => $this->input->post('nama_bank'),
                'is_active' => 1,
            ];
            $this->db->insert('bank', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Bank Berhasil Ditambahkan!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
            );
            redirect('administrator/bank');
        }
    }
    public function edit_bank($id)
    {
        $data['title'] = 'Edit Bank';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bank'] = $this->db->get_where('bank', ['id' => $id])->row_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/edit_bank', $data);
        $this->load->view('template/footer', $data);
    }
    public function savebank()
    {
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim');
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required|trim');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim');

        $nama_bank = $this->input->post('nama_bank');
        $no_rek = $this->input->post('no_rek');
        $nama_pemilik = $this->input->post('nama_pemilik');

        $this->db->set('no_rek', $no_rek);
        $this->db->set('nama_pemilik', $nama_pemilik);
        $this->db->set('nama_bank', $nama_bank);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('bank');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Data Bank Berhasil Diupdate!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
        );
        redirect('administrator/bank');
    }
    public function delete_bank($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bank');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Bank Berhasil Dihapus!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('administrator/bank');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('template/footer', $data);
    }
    public function rumah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $data['title'] = 'Data Rumah';
        $data['kategori'] = $this->db->get('tipe_rumah')->result_array();
        $data['lokasi'] = $this->db->get('lokasi_rumah')->result_array();
        $data['list'] = $this->db->get('list_rumah')->result_array();
        $data['rumah'] = $this->Admin_model->getRumah();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/rumah', $data);
        $this->load->view('template/footer', $data);
    }

    public function save_kategori()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

        $data = [
            'kategori' => $this->input->post('kategori')
        ];
        $this->db->insert('tipe_rumah', $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Tipe Rumah Berhasil Ditambahkan!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('administrator/rumah');
    }
    public function save_lokasi()
    {
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim');

        $data = [
            'lokasi' => $this->input->post('lokasi'),
            'unit' => $this->input->post('unit')
        ];
        $this->db->insert('lokasi_rumah', $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Lokasi Rumah Berhasil Ditambahkan!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('administrator/rumah');
    }
    public function save_rumah()
    {

        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('luas', 'luas', 'required');
        $this->form_validation->set_rules('blok', 'Blok', 'required|trim');


        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '1048';
            $config['upload_path'] = './rumah/';
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $ktp = $this->upload->data('file_name');
                // $this->input->post('image', $ktp);
            }
        }
        $tipe_id = $this->input->post('tipe_id');
        $harga = $this->input->post('harga');
        $lokasi_id = $this->input->post('lokasi_id');
        $deskripsi = $this->input->post('deskripsi');
        $luas = $this->input->post('luas');
        $blok = $this->input->post('blok');
        $image = $upload_image;
        $is_active = 1;
        $date_created = time();

        $this->db->set('tipe_id', $tipe_id);
        $this->db->set('harga', $harga);
        $this->db->set('lokasi_id', $lokasi_id);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('luas', $luas);
        $this->db->set('blok', $blok);
        $this->db->set('image', $image);
        $this->db->set('is_active', $is_active);
        $this->db->set('date_created', $date_created);
        $this->db->insert('list_rumah');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        Rumah berhasil ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('administrator/rumah');
    }
    public function delete_rumah($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('list_rumah');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Rumah Berhasil Dihapus!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('administrator/rumah');
    }
    public function delete_tipe_rumah($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tipe_rumah');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Rumah Berhasil Dihapus!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('administrator/rumah');
    }
    public function delete_lokasi_rumah($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('lokasi_rumah');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Lokasi Rumah Berhasil Dihapus!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('administrator/rumah');
    }
    public function user()
    {
        $data['title'] = 'User Management';
        $this->load->model('Admin_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['getuser'] = $this->Admin_model->getUser();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('template/footer', $data);
    }
    public function aktif_user($id)
    {
        $is_active = 0;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        User Berhasil di Non Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('administrator/user');
    }
    public function non_aktif_user($id)
    {
        $is_active = 1;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        User Berhasil di Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('administrator/user');
    }
    public function save_edit_user()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');

        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');

        $this->db->set('email', $email);
        $this->db->set('nama', $nama);
        $this->db->set('no_hp', $no_hp);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        User Berhasil di Ubah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('administrator/user');
    }
    public function edit_user($id)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['users'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/edit_user', $data);
        $this->load->view('template/footer', $data);
    }
    public function adduser()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Role', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required');

        $data = [
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id'),
            'image' => 'default.png',
            'no_hp' => $this->input->post('no_hp'),
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('user', $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              User Berhasil Ditambahkan
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('administrator/user');
    }
    public function transaksi()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['bayar'] = $this->Admin_model->getTransaksi();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('template/footer', $data);
    }
    public function edittipe($id)
    {
        $data['title'] = 'Edit Tipe';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tipe'] = $this->db->get_where('tipe_rumah', ['id' => $id])->row_array();


        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/edit_tipe', $data);
        $this->load->view('template/footer', $data);
    }

    public function savetipe()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

        $kategori = $this->input->post('kategori');

        $this->db->set('kategori', $kategori);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tipe_rumah');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        Tipe Rumah Berhasil Diubah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('administrator/rumah');
    }
    public function editlokasi($id)
    {
        $data['title'] = 'Edit Lokasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lokasi'] = $this->db->get_where('lokasi_rumah', ['id' => $id])->row_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/edit_lokasi', $data);
        $this->load->view('template/footer', $data);
    }

    public function savelokasi()
    {
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim');

        $lokasi = $this->input->post('lokasi');
        $unit = $this->input->post('unit');

        $this->db->set('lokasi', $lokasi);
        $this->db->set('unit', $unit);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('lokasi_rumah');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        Lokasi Rumah Berhasil Diubah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('administrator/rumah');
    }
    public function detailrumah($id)
    {
        $data['title'] = 'Detail Rumah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['rumah'] = $this->Admin_model->countRumahById($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/detail_rumah', $data);
        $this->load->view('template/footer', $data);
    }
    public function nonaktif($id)
    {
        $is_active = 0;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('bank');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                       Bank Berhasil di Non Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('administrator/bank');
    }
    public function aktif($id)
    {
        $is_active = 1;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('bank');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                       Bank Berhasil di Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('administrator/bank');
    }
}
