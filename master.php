<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function index()
	{
		$this->load->view('dashboard');
	}

	function m_dokter()
	{
		$this->load->model('m_data');
		$data['tb_dokter'] = $this->m_data->tampil_data('tb_dokter')->result();
		$this->load->view('template/sidebar');
		$this->load->view('template/header');
		$this->load->view('master/dokter',$data);
		$this->load->view('template/footer');
	}

	function tambah_dokter()
	{
		$this->load->model('m_data');
		$data['tb_dokter'] = $this->m_data->tampil_data('tb_dokter')->result();
		$this->load->view('template/sidebar');
		$this->load->view('template/header');
		$this->load->view('master/dokter_tambah',$data);
		$this->load->view('template/footer');
	}

	function aksi_tambah_dokter()
	{
		$nama_dokter 		= $this->input->post('nama_dokter');
		$alamat	= $this->input->post('alamat');
		$no_telepon		= $this->input->post('no_telepon');

		$data = array(
				'nama_dokter' 			=> $nama_dokter,
				'alamat'	 	=> $alamat,
				'no_telepon'		 	=> $no_telepon,
			);

		$this->load->model('m_data');
		$this->m_data->input_data($data,'tb_dokter');
		redirect('master/m_dokter');
	}

	function edit_dokter($id)
	{
		$this->load->model('m_data');
		$where = array('id_dokter' => $id);
		$data['tb_dokter'] = $this->m_data->edit_data($where,'tb_dokter')->result();
		$data['tb_dokter'] = $this->m_data->tampil_data('tb_dokter')->result();
		$this->load->view('template/sidebar');
		$this->load->view('template/header');
		$this->load->view('master/dokter_edit',$data);
		$this->load->view('template/footer');
	}

	function update_dokter()
	{

		$id 		= $this->input->post('id_dokter');
		$nama_dokter 		= $this->input->post('nama_dokter');
		$alamat	= $this->input->post('alamat_dokter');
		$no_telepon		= $this->input->post('no_telepon');

		$data = array(
				'nama_dokter' 			=> $nama_dokter,
				'alamat'	 	=> $alamat,
				'no_telepon'		 	=> $no_telepon,
			);

		$where = array('id_dokter' => $id);
		$this->load->model('m_data');
		$this->m_data->update_data($where,'tb_dokter',$data);
		redirect('master/m_dokter');
	}

	function m_spesialis()
	{
		$this->load->model('m_data');
		$data['spesialis'] = $this->m_data->tampil_data('spesialis')->result();
		$this->load->view('template/sidebar');
		$this->load->view('template/header');
		$this->load->view('master/spesialis',$data);
		$this->load->view('template/footer');
	}


	function tambah_spesialis()
	{
		$this->load->view('template/sidebar');
		$this->load->view('template/header');
		$this->load->view('master/spesialis_tambah');
		$this->load->view('template/footer');
	}

	function aksi_tambah_spesialis()
	{
		$nama 		= $this->input->post('nama');

		$data = array(
				'nama' 			=> $nama,
			);

		$this->load->model('m_data');
		$this->m_data->input_data($data,'spesialis');
		redirect('master/m_spesialis');
	}

	function hapus($id)
	{
		$this->load->model('m_data');
		$where = array('id_dokter' => $id);
		$this->m_data->hapus_data($where,'dokter');
		redirect('master/m_dokter');
	}
}
