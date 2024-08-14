<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$user = $this->session->userdata('user');
		if (!$user) {
			redirect('auth');
		}
	}
	private function _view($file, $data = null)
	{
		// if($file != null){}
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		if ($data != null) {
			$this->load->view('admin/laporan/' . $file, $data);
		} else {
			$this->load->view('admin/laporan/' . $file);
		}
		$this->load->view('layouts/footer');
	}

	public function barang()
	{
		$this->_view('barang/index');
	}
	public function penjualan()
	{
		// Ambil parameter tanggal dari GET request
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		// Validasi tanggal
		if ($tanggal_awal && $tanggal_akhir) {
			// Ambil data berdasarkan filter tanggal
			$data = $this->M_laporan->getFilteredPenjualan($tanggal_awal, $tanggal_akhir);
		} else {
			// Jika tidak ada filter, data default (kosong)
			$data = [];
			$tanggal_awal = '';
			$tanggal_akhir = '';
		}

		// Tampilkan view dengan data yang sudah difilter (atau data default)
		$this->_view('penjualan/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir
		]);
	}


	public function pembelian()
	{
		// Ambil parameter tanggal dari GET request
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		// Validasi tanggal
		if ($tanggal_awal && $tanggal_akhir) {
			// Ambil data berdasarkan filter tanggal
			$data = $this->M_laporan->getFilteredPembelian($tanggal_awal, $tanggal_akhir);
		} else {
			// Jika tidak ada filter, data default (kosong)
			$data = [];
			$tanggal_awal = '';
			$tanggal_akhir = '';
		}

		// Tampilkan view dengan data yang sudah difilter (atau data default)
		$this->_view('pembelian/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir
		]);
	}
	public function transaksi()
	{
		// Ambil parameter tanggal dari GET request
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		// Validasi tanggal
		if ($tanggal_awal && $tanggal_akhir) {
			// Ambil data berdasarkan filter tanggal
			$data = $this->M_laporan->getFilteredTransaksi($tanggal_awal, $tanggal_akhir);
		} else {
			// Jika tidak ada filter, data default (kosong)
			$data = [];
			// Nilai default untuk tanggal
			$tanggal_awal = '';
			$tanggal_akhir = '';
		}

		// Tampilkan view dengan data yang sudah difilter (atau data default)
		$this->_view('transaksi/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir
		]);
	}

	public function return()
	{
		// Ambil parameter dari GET request
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');
		$status = $this->input->get('status', TRUE); // Filter XSS

		// Validasi tanggal
		if ($tanggal_awal && $tanggal_akhir) {
			// Ambil data berdasarkan filter tanggal dan status
			$data = $this->M_laporan->getFilteredReturn($tanggal_awal, $tanggal_akhir, $status);
		} else {
			// Jika tidak ada filter, data default (kosong)
			$data = [];
			$tanggal_awal = '';
			$tanggal_akhir = '';
			$status = 'semua';
		}

		// Tampilkan view dengan data yang sudah difilter (atau data default)
		$this->_view('return/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir,
			'status' => $status
		]);
	}


	public function hutang()
	{
		// Ambil parameter dari GET request
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		// Validasi tanggal
		if ($tanggal_awal && $tanggal_akhir) {
			// Ambil data berdasarkan filter tanggal
			$data = $this->M_laporan->getFilteredHutang($tanggal_awal, $tanggal_akhir);
		} else {
			// Jika tidak ada filter, data default (kosong)
			$data = [];
			$tanggal_awal = '';
			$tanggal_akhir = '';
		}

		// Tampilkan view dengan data yang sudah difilter (atau data default)
		$this->_view('hutang/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir
		]);
	}

	public function piutang()
	{
		// Ambil parameter dari GET request
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		// Validasi tanggal
		if ($tanggal_awal && $tanggal_akhir) {
			// Ambil data berdasarkan filter tanggal
			$data = $this->M_laporan->getFilteredPiutang($tanggal_awal, $tanggal_akhir);
		} else {
			// Jika tidak ada filter, data default (kosong)
			$data = [];
			$tanggal_awal = '';
			$tanggal_akhir = '';
		}

		// Tampilkan view dengan data yang sudah difilter (atau data default)
		$this->_view('piutang/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir
		]);
	}
	public function keuangan()
	{
		// Ambil parameter dari GET request
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');
		$status = $this->input->get('status');

		// Validasi tanggal
		if ($tanggal_awal && $tanggal_akhir) {
			// Ambil data berdasarkan filter tanggal dan status
			$data = $this->M_laporan->getFilteredKeuangan($tanggal_awal, $tanggal_akhir, $status);
		} else {
			// Jika tidak ada filter, data default (kosong)
			$data = [];
			$tanggal_awal = '';
			$tanggal_akhir = '';
			$status = 'semua';
		}

		// Tampilkan view dengan data yang sudah difilter (atau data default)
		$this->_view('keuangan/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir,
			'status' => $status
		]);
	}

	public function barang_keluar()
	{
		// Ambil parameter tanggal dari GET request
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		// Validasi tanggal
		if ($tanggal_awal && $tanggal_akhir) {
			// Ambil data berdasarkan filter tanggal
			$data = $this->M_laporan->getFilteredBarangKeluar($tanggal_awal, $tanggal_akhir);
		} else {
			// Jika tidak ada filter, data default (kosong)
			$data = [];
			// Parameter tanggal tidak ada
			$tanggal_awal = '';
			$tanggal_akhir = '';
		}

		// Tampilkan view dengan data yang sudah difilter (atau data default)
		$this->_view('barang_keluar/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir
		]);
	}


	public function Printbarang()
	{
		// $data = $this->M_laporan->getPrintBarang();
		$this->load->view('admin/laporan/barang/cetak', [
			'data' => $this->M_laporan->getPrintBarang()
		]);
	}
	public function PrintPenjualan()
	{
		// $data = $this->M_laporan->getPrintPenjualan();
		$this->load->view('admin/laporan/penjualan/cetak', [
			'data' => $this->M_laporan->getPrintPenjualan()
		]);
	}
	
	public function PrintPembelian()
	{
		// $data = $this->M_laporan->getPrintPembelian();
		$this->load->view('admin/laporan/pembelian/cetak', [
			'data' => $this->M_laporan->getPrintPembelian()
		]);
	}
	public function PrintTransaksi()
	{
		// $data = $this->M_laporan->getPrintPenjualan();
		$this->load->view('admin/laporan/transaksi/cetak', [
			'data' => $this->M_laporan->getPrintTransaksi()
		]);
	}
	public function PrintReturn()
	{
		// $data = $this->M_laporan->getPrintPenjualan();
		$this->load->view('admin/laporan/return/cetak', [
			'data' => $this->M_laporan->getPrintReturn()
		]);
	}
	public function PrintPiutang()
	{
		// $data = $this->M_laporan->getPrintPenjualan();
		$this->load->view('admin/laporan/piutang/cetak', [
			'data' => $this->M_laporan->getPrintPiutang()
		]);
	}
	public function PrintHutang()
	{
		// $data = $this->M_laporan->getPrintPenjualan();
		$this->load->view('admin/laporan/hutang/cetak', [
			'data' => $this->M_laporan->getPrintHutang()
		]);
	}
	public function PrintKeuangan()
	{
		// $data = $this->M_laporan->getPrintPenjualan();
		$this->load->view('admin/laporan/keuangan/cetak', [
			'data' => $this->M_laporan->getPrintKeuangan()
		]);
	}
	public function PrintBarangKeluar()
	{
		$this->load->view('admin/laporan/Barang_Keluar/cetak', [
			'data' => $this->M_laporan->getPrintBarangKeluar()
		]);
	}
	public function filterBarangKeluar()
	{
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		// Validasi tanggal
		if (!$tanggal_awal || !$tanggal_akhir) {
			show_error('Tanggal awal dan akhir harus diisi.');
		}

		// Ambil data berdasarkan filter tanggal
		$data = $this->M_laporan->getFilteredBarangKeluar($tanggal_awal, $tanggal_akhir);

		// Tampilkan view dengan data yang sudah difilter
		$this->load->view('admin/laporan/Barang_Keluar/index', [
			'data' => $data,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir
		]);
	}

}
