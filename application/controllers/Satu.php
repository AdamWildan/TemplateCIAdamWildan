<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Satu extends CI_Controller {

    public function index()
    {
        $data['konten']="satu";
        $this->load->view('template', $data, FALSE);        
    }

}

/* End of file Dashboard.php */
