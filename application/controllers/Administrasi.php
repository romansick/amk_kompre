<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Dashboard';
        $this->load->model('Admin_model');
        // $data['tipe'] = $this->Admin_model->countRumah();
        // $data['lokasi'] = $this->Admin_model->countRumahByLokasi();
        $data['lokasi'] = $this->db->get('lokasi_rumah')->result_array();
        $data['konsumen'] = $this->Admin_model->konsumen();
        $data['rumah'] = $this->Admin_model->rumah();
        $data['transaksi'] = $this->Admin_model->transaksi();
        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['bayar'] = $this->Admin_model->getTransaksi();


        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/transaksi', $data);
        $this->load->view('template/footer', $data);
    }
    public function view_invoice($id)
    {
        $data['title'] = 'Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['invoice'] = $this->Admin_model->getInvoice($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/invoice', $data);
        $this->load->view('template/footer', $data);
    }
    public function konsumen()
    {
        $data['title'] = 'Data Konsumen';
        $this->load->model('Admin_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['getuser'] = $this->Admin_model->dataKonsumen();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/user', $data);
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
        $this->load->view('administrasi/rumah', $data);
        $this->load->view('template/footer', $data);
    }

    public function detailrumah($id)
    {
        $data['title'] = 'Detail Rumah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['rumah'] = $this->Admin_model->countRumahById($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/detail_rumah', $data);
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
        $this->load->view('administrasi/edit_tipe', $data);
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
        redirect('administrasi/rumah');
    }
    public function editlokasi($id)
    {
        $data['title'] = 'Edit Lokasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lokasi'] = $this->db->get_where('lokasi_rumah', ['id' => $id])->row_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/edit_lokasi', $data);
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
        redirect('administrasi/rumah');
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
        redirect('administrasi/rumah');
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
        redirect('administrasi/rumah');
    }
    public function edit_rumah($id)
    {
        $data['title'] = 'Edit Rumah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Administrasi_model');
        $data['list'] = $this->Administrasi_model->getRumah($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/edit_rumah', $data);
        $this->load->view('template/footer', $data);
    }
    public function save_edit_rumah()
    {
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('blok', 'Blok', 'required');

        $harga = $this->input->post('harga');
        $luas = $this->input->post('luas');
        $deskripsi = $this->input->post('deskripsi');
        $blok = $this->input->post('blok');

        $this->db->set('harga', $harga);
        $this->db->set('luas', $luas);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('blok', $blok);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('list_rumah');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Data Rumah Berhasil Diubah!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('administrasi/rumah');
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
        redirect('administrasi/rumah');
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
        redirect('administrasi/rumah');
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
        redirect('administrasi/rumah');
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
        redirect('administrasi/rumah');
    }
    public function user()
    {
        $data['title'] = 'Data Konsumen';
        $this->load->model('Admin_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['getuser'] = $this->Admin_model->getKonsumen();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/user', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_user($id)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['users'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('administrasi/edit_user', $data);
        $this->load->view('template/footer', $data);
    }
}
