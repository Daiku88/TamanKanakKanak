<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Login extends KodeAceh_Controller {

    public function __construct()
    {
        parent::__construct();
        $id = session('id');
        if (!empty($id)){
            redirect('admin');
        }
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function cek()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Nama Pengguna','required');
        $this->form_validation->set_rules('password','Kata Sandi','required');

        if ($this->form_validation->run() == FALSE)
        {
            set_message('danger',$this->form_validation->first_error());
            redirect('login');
        }
        else
        {   
            $user = $this->input->post('username');
            $pass = $this->input->post('password');

            $res = $this->db->get_where('pengguna',array('username'=>$user));

            if ($res->num_rows() == 1)
            {   
                /* karena hash custom, pengecekan password diluar database*/
                $row = $res->row_array();

                if (verify_password($pass,$row['password']))
                {
                    if ($row['level'] == 'admin'){
                    /* INGAT!!!, 
                    level, wilayah_id, pegawai_id sudah tersimpan di session...
                    */
                    $this->session->set_userdata($row);
                    redirect('admin');

                    } else if ($row['level'] == 'operator'){
                        $this->session->set_userdata($row);
                        redirect('operator');

                    } else if ($row['level'] == 'pimpinan'){
                        $this->session->set_userdata($row);
                        redirect('pimpinan');
                    }
                }
            }

            set_message('error','Username atau Password salah.');
            redirect('login');
        }
    }
}