<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom404 extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        // load base_url
        $this->load->helper('url');
    }

    public function index()
    {

        $this->output->set_status_header('404');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->load->view('error404');
    }
    public function signout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Silahkan Login Kembali!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
        );
        redirect('auth/login');
    }
}
