<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
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

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsumen/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function rumah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Konsumen_model');
        $data['rumah'] = $this->Konsumen_model->getRumah();
        $data['tipe'] = $this->db->get('tipe_rumah')->result_array();
        $data['title'] = 'List Rumah';

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsumen/rumah', $data);
        $this->load->view('template/footer', $data);
    }
    public function detailrumah($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Konsumen_model');
        $data['rumah'] = $this->Konsumen_model->getRumahById($id);
        $data['title'] = 'Detail Rumah';

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsumen/detail_rumah', $data);
        $this->load->view('template/footer', $data);
    }
    public function transaksi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Konsumen_model');
        $data['title'] = 'Transaksi';

        // $data['bayar'] = $this->Konsumen_model->getTransaksi();
        $data['bayar'] = $this->Konsumen_model->getNewById();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsumen/transaksi', $data);
        $this->load->view('template/footer', $data);
    }
    public function view_invoice($id)
    {
        $data['title'] = 'Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Konsumen_model');
        $data['invoice'] = $this->Konsumen_model->getInvoice($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsumen/invoice', $data);
        $this->load->view('template/footer', $data);
    }
    public function checkout($id)
    {
        $data['title'] = 'Lanjutkan Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Konsumen_model');
        $data['check'] = $this->Konsumen_model->getCheckout($id);
        $data['bank'] = $this->db->get_where('bank', ['is_active' => 1])->result_array();
        $data['order'] = $this->Konsumen_model->order($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsumen/checkout', $data);
        $this->load->view('template/footer', $data);
    }
    public function beli($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Konsumen_model');
        $data['title'] = 'Beli Rumah';

        $data['rumah'] = $this->Konsumen_model->getRumahById($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsumen/beli', $data);
        $this->load->view('template/footer', $data);
    }
    public function metodepembayaran($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Konsumen_model');
        $data['title'] = 'Pilih Metode Pembayaran';

        $data['rumah'] = $this->Konsumen_model->getRumahById($id);
        $data['metode'] = $this->db->get('metode_transaksi')->result_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsumen/pilih_metode', $data);
        $this->load->view('template/footer', $data);
    }

    public function save_metode()
    {
        $this->form_validation->set_rules('metode_id', 'Metode', 'required');

        $kode_transaksi = $this->input->post('kode_transaksi');
        $metode_id = $this->input->post('metode_id');
        $user_id   = $this->input->post('user_id');
        $harga_rumah = $this->input->post('harga_rumah');
        $total     = 1;
        $rumah_id  = $this->input->post('rumah_id');
        $tipe_id  = $this->input->post('tipe_id');
        $lokasi_id  = $this->input->post('lokasi_id');
        $status_pembayaran     = 'Pending';
        $date_created = time();

        $this->db->set('kode_transaksi', $kode_transaksi);
        $this->db->set('metode_id', $metode_id);
        $this->db->set('user_id', $user_id);
        $this->db->set('harga_rumah', $harga_rumah);
        $this->db->set('total', $total);
        $this->db->set('rumah_id', $rumah_id);
        $this->db->set('tipe_id', $tipe_id);
        $this->db->set('lokasi_id', $lokasi_id);
        $this->db->set('status_pembayaran', $status_pembayaran);
        $this->db->set('date_created', $date_created);

        $this->db->insert('metode_bayar');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                    Metode Pembayarn Berhasil Disimpan. Silahkan selesaikan pembayaran
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('konsumen/transaksi');
    }
    public function buktibayar()
    {
        $tanggal_bayar = time();
        $bank_id = $this->input->post('bank_id');
        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '5048';
            $config['upload_path'] = './bukti/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('bank_id', $bank_id);
        $this->db->set('tanggal_bayar', $tanggal_bayar);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('metode_bayar');


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                    Bukti Pembayaran Berhasil Diupload! Silahkan tunggu beberapa saat. Konfirmasi pembayaran anda dengan menghubungi WhatsApp Perusahaan 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('konsumen/transaksi');
    }
    public function buktibayarkpr()
    {
        $tanggal_bayar = time();
        // cek jika ada gambar yang akan diupload
        $bank_id = $this->input->post('bank_id');
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '5048';
            $config['upload_path'] = './bukti/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('bank_id', $bank_id);
        $this->db->set('tanggal_bayar', $tanggal_bayar);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('metode_bayar');


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                    Bukti Pembayaran KPR Berhasil Diupload
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('konsumen/transaksi');
    }
}
