<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller{
    public function __construct(){
		parent::__construct();
		$this->load->model('model_karyawan');
	}
	
	public function index()
	{
		$this->load->view('form_tambah_karyawan');
		
	}
	public function data_karyawan(){
		$data['karyawan']=$this->model_karyawan->select_karyawan();
		$this->load->view('view_data_karyawan',$data);
	}
	public function tambah_karyawan(){
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('no_telp','Nomor Telepon atau handphone','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[4]|max_length[200]');
		if($this->form_validation->run()==FALSE){
			$this->load->view('form_tambah_karyawan');
		}else{
			$data_karyawan=array(
				'nama_lengkap'=>set_value('nama_lengkap'),
				'jenis_kelamin'=>set_value('jenis_kelamin'),
				'no_telp'=>set_value('no_telp'),
				'email'=>set_value('email'),
				'alamat'=>set_value('alamat')
			);

			$this->model_karyawan->tambah_karyawan($data_karyawan);
			$this->session->set_flashdata('pesan','Karyawan Berhasil Di tambah');
			redirect('karyawan/data_karyawan');
			$ini['karyawan']= $this->model_karyawan->get_karyawan_by_id($id);
			$this->load->view('form_edit_karyawan',$id);
		}
	}
	public function edit_karyawan(){
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('no_telp','Nomor Telepon atau handphone','required|numeric|min_length[10]|max_length[16]');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[4]|max_length[200]');
		if($this->form_validation->run()==FALSE){
			$this->load->view('form_tambah_karyawan');
		}else{
			$data_karyawan=array(
				'nama_lengkap'=>set_value('nama_lengkap'),
				'jenis_kelamin'=>set_value('jenis_kelamin'),
				'no_telp'=>set_value('no_telp'),
				'email'=>set_value('email'),
				'alamat'=>set_value('alamat')
			);

			$this->model_karyawan->update_karyawan($data_karyawan);
			$this->session->set_flashdata('pesan','Karyawan Berhasil Di tambah');
			redirect('karyawan/data_karyawan');
		}
	}
}