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
		$this->_view('penjualan/index');
	}
	public function transaksi()
	{
		$this->_view('transaksi/index');
	}
	public function return()
	{
		$this->_view('return/index');
	}
	public function hutang()
	{
		$this->_view('hutang/index');
	}
	public function piutang()
	{
		$this->_view('piutang/index');
	}
	public function keuangan()
	{
		$this->_view('keuangan/index');
	}
	public function barang_keluar()
	{
		$this->_view('barang_keluar/index');
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
}
