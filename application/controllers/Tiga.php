<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiga extends CI_Controller {

    public function index()
    {
        $data['konten']="tiga";
        $this->load->view('template', $data, FALSE);        
    }

}

/* End of file Dashboard.php */
