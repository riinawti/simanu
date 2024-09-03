<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hutang extends CI_Model
{
    public function getData()
    {
        // return $this->db->get('tbl_hutang')->result_array();
        $this->db->select('*');
        $this->db->from('tbl_hutang');
        $this->db->join('tbl_pembelian', 'tbl_pembelian.id_pembelian = tbl_hutang.pembelian_id');
        $this->db->join('tbl_suplier', 'tbl_suplier.id_suplier = tbl_pembelian.suplier_id');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataByID($id)
    {
        return $this->db->get_where('tbl_hutang', array('id_hutang' => $id))->row_array();
    }



    public function updateData()
    {
        $data = [
            'tanggal_tempo' => $this->input->post('tanggal_tempo'),
            'total' => $this->input->post('total'),
        ];
        $this->db->where('id_hutang', $this->input->post('id'));
        $this->db->update('tbl_hutang', $data);
    }

    
}
