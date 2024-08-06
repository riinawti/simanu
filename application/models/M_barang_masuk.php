<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang_masuk extends CI_Model
{
    public function getData()
    {
        // $this->db->select('tbl_pembelian.*,tbl_barang.nama_barang,,tbl_barang.harga,tbl_pembelian_detail.qty');
        // $this->db->from('tbl_pembelian');
        // $this->db->join('tbl_suplier', 'tbl_suplier.id_suplier = tbl_pembelian.suplier_id');
        // $this->db->join('tbl_pembelian_detail', 'tbl_pembelian_detail.pembelian_id = tbl_pembelian.id_pembelian');
        // $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_pembelian_detail.barang_id');

        $this->db->select('*');
        $this->db->from('tbl_pembelian');
        $this->db->join('tbl_suplier', 'tbl_suplier.id_suplier = tbl_pembelian.suplier_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataByID($id)
    {
        $this->db->select('tbl_pembelian.*,tbl_barang.nama_barang,tbl_barang.harga,tbl_pembelian_detail.qty,tbl_pembelian_detail.harga_beli');
        $this->db->from('tbl_pembelian');
        $this->db->join('tbl_suplier', 'tbl_suplier.id_suplier = tbl_pembelian.suplier_id');
        $this->db->join('tbl_pembelian_detail', 'tbl_pembelian_detail.pembelian_id = tbl_pembelian.id_pembelian');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_pembelian_detail.barang_id');
        $this->db->where('tbl_pembelian_detail.pembelian_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_last_kode()
    {
        $this->db->select('kd_beli');
        $this->db->order_by('id_pembelian', 'DESC');
        $query = $this->db->get('tbl_pembelian', 1);
        return $query->row();
    }
    public function setData($file = null)
    {
        $last_kode = $this->get_last_kode();

        if ($last_kode) {
            $last_number = substr($last_kode->kd_beli, -3);
            $new_number = str_pad($last_number + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $new_number = '001';
        }
        $new_kode = 'BM' . $new_number;
        $data = [
            'kd_beli' => $new_kode,
            'tanggal' => $this->input->post('tanggal'),
            'suplier_id' => $this->input->post('suplier_id'),
            'metode' => $this->input->post('metode'),
        ];
        $this->db->insert('tbl_pembelian', $data);

        // Menyimpan data obat terkait dalam tabel 'tbl_pelayanan_obat'
        $barang = $this->input->post('barang');
        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga_beli');
        $idpembelian = $this->db->insert_id();
        // var_dump($barang);
        // die;
        // Inisialisasi total
        $total = 0;

        if ($barang && $jumlah && $harga && count($barang) === count($jumlah) && count($jumlah) === count($harga)) {
            $count = count($barang);
            for ($i = 0; $i < $count; $i++) {
                $this->db->insert('tbl_pembelian_detail', [
                    'pembelian_id' => $idpembelian,
                    'barang_id' => $barang[$i],
                    'qty' => $jumlah[$i],
                    'harga_beli' => $harga[$i]
                ]);

                // Tambahkan ke total
                $total += $harga[$i] * $jumlah[$i];

                // Update stok
                $this->db->set('stok', 'stok + ' . (int)$jumlah[$i], FALSE);
                $this->db->set('harga_beli', $harga[$i]);
                $this->db->where('id_barang', $barang[$i]);
                $this->db->update('tbl_barang');

                // Debug logging
                if ($this->db->affected_rows() > 0) {
                    log_message('info', 'Stok barang ID ' . $barang[$i] . ' berhasil diupdate.');
                } else {
                    log_message('error', 'Stok barang ID ' . $barang[$i] . ' gagal diupdate.');
                }
            }
        } else {
            // Tangani kasus ketika data tidak sesuai
            log_message('error', 'Data barang, jumlah, atau harga tidak valid.');
        }

        if ($this->input->post('metode') == 'kredit') {
            $this->db->insert('tbl_hutang', [
                'kd_hutang' => 'HT-' . random_string('alnum', 3),
                'pembelian_id' => $idpembelian,
                'total' => $total,
                'sisa' => $total
            ]);
        }
        date_default_timezone_set('Asia/Makassar');
        $this->db->insert('tbl_keuangan', [
            'tanggal' => date("Y-m-d H:i:s"),
            'total' => $total,
            'status' => 'keluar',
            'keterangan' => 'pembelian'
        ]);
    }


    // public function setData($file = null)
    // {
    //     // Data pembelian
    //     $data = [
    //         'kd_beli' => $this->input->post('kode'),
    //         'tanggal' => $this->input->post('tanggal'),
    //         'suplier_id' => $this->input->post('suplier_id'),
    //         'metode' => $this->input->post('metode'),
    //     ];
    //     $this->db->insert('tbl_pembelian', $data);

    //     // Menyimpan data obat terkait dalam tabel 'tbl_pembelian_detail'
    //     $barang = $this->input->post('barang');
    //     $jumlah = $this->input->post('jumlah');
    //     $harga = $this->input->post('harga');
    //     $idpembelian = $this->db->insert_id();

    //     // Inisialisasi total
    //     $total = 0;

    //     // Pastikan obat, qty, dan harga ada dan berjumlah sama
    //     if ($barang && $jumlah && $harga && count($barang) === count($jumlah) && count($jumlah) === count($harga)) {
    //         $count = count($barang);
    //         for ($i = 0; $i < $count; $i++) {
    //             // Validasi bahwa harga tidak kosong atau null
    //             if (isset($harga[$i]) && $harga[$i] !== '') {
    //                 $this->db->insert('tbl_pembelian_detail', [
    //                     'pembelian_id' => $idpembelian,
    //                     'barang_id' => $barang[$i],
    //                     'qty' => $jumlah[$i],
    //                     'harga_beli' => $harga[$i]
    //                 ]);

    //                 // Tambahkan ke total
    //                 $total += $harga[$i] * $jumlah[$i];

    //                 // Update stok
    //                 $this->db->set('stok', 'stok + ' . (int)$jumlah[$i], FALSE);
    //                 $this->db->where('id_barang', $barang[$i]);
    //                 $this->db->update('tbl_barang');
    //             } else {
    //                 // Tambahkan log error atau tangani error sesuai kebutuhan
    //                 log_message('error', 'Harga untuk barang ID ' . $barang[$i] . ' kosong atau null.');
    //             }
    //         }
    //     } else {
    //         // Tangani kasus ketika data tidak sesuai
    //         log_message('error', 'Data barang, jumlah, atau harga tidak valid.');
    //     }

    //     // Jika metode kredit, simpan ke tabel hutang
    //     if ($this->input->post('metode') == 'kredit') {
    //         $this->db->insert('tbl_hutang', [
    //             'kd_hutang' => 'HT-' . random_string('alnum', 3),
    //             'pembelian_id' => $idpembelian,
    //             'total' => $total,
    //             'sisa' => $total
    //         ]);
    //     }

    //     // Simpan ke tabel keuangan
    //     date_default_timezone_set('Asia/Makassar');
    //     $this->db->insert('tbl_keuangan', [
    //         'tanggal' => date("Y-m-d H:i:s"),
    //         'total' => $total,
    //         'status' => 'keluar',
    //         'keterangan' => 'pembelian'
    //     ]);
    // }


    public function updateData($file = null)
    {
        $data = [
            'kd_beli' => $this->input->post('kode'),
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan' => $this->input->post('satuan'),
            'kategori_id' => $this->input->post('kategori_id'),
            'harga' => $this->input->post('harga')
        ];
        if ($file != null) {
            $data['foto'] = $file;
        }
        $this->db->where('id_barang', $this->input->post('id'));
        $this->db->update('tbl_barang', $data);
    }

    public function jumlah()
    {
        return $this->db->get('tbl_barang')->num_rows();
    }
}
