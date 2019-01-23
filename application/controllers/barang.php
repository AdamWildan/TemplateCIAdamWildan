<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function index()
    {
        $data['konten']="v_barang";
        $this->load->model('barang_model');
        $data['data_barang']=$this->barang_model->get_barang();
        $this->load->model('kategori_model'); 
        $data['data_kategori']=$this->kategori_model->get_kategori();
        $this->load->view('template', $data, FALSE);       
    }
    public function simpan_barang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required', array('required' => 'data harus diisi'));
        $this->form_validation->set_rules('harga_barang', 'Harga barang', 'trim|required', array('required' => 'data harus diisi'));
        $this->form_validation->set_rules('stok', 'Stok barang', 'trim|required', array('required' => 'data harus diisi'));
        $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'trim|required', array('required' => 'data harus diisi'));

        if ($this->form_validation->run() == TRUE){
            $this->load->model('barang_model', 'bar');
            $masuk=$this->bar->masuk_db();
            if($masuk==true){
                $this->session->set_flashdata('pesan', 'sukses masuk');    
            }
            else{
                $this->session->set_flashdata('pesan', 'gagal masuk'); 
            }
            redirect(base_url('index.php/barang'),'refresh');
    } 
    else
    {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect(base_url('index.php/barang'),'refresh');
        
    }
    }

    public function get_detail_barang($id_barang='')
    {
        $this->load->model('barang_model');
        $data_detail=$this->barang_model->detail_barang($id_barang);
        echo json_encode($data_detail);
    }

    public function update_barang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'trim|required');

        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/barang'),'refresh');            
        } 
        else 
        {
            $this->load->model('barang_model');
            $proses_update=$this->barang_model->update_barang();
            if($proses_update){
                $this->session->set_flashdata('pesan', 'sukses update');             
            }
            else{
                $this->session->set_flashdata('pesan', 'gagal update');             
            }
            
            redirect(base_url('index.php/barang'),'refresh');
        }
    }

    public function deleteBarang($id_barang)
    {
        $this->load->model('barang_model');
        $prosesDelete = $this->barang_model->deleteBarang($id_barang);

        if ($prosesDelete == TRUE) {
            $this->session->set_flashdata('pesan','Sukses Hapus Data');    
        } else {
            $this->session->set_flashdata('pesan','Gagal Hapus Data');
        }

        redirect(base_url('index.php/barang'),'refresh');

    }

}

/* End of file Barang.php */