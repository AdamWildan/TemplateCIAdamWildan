<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dua extends CI_Controller {

    public function index()
    {
        $data['konten']="dua";
        $this->load->view('template', $data, FALSE);        
    }

}

/* End of file Dashboard.php */
