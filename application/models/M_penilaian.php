<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_penilaian extends CI_Model
{

  public function getSingleProject($id)
  {
    $args = array('id_project' =>$id);
    $data=$this->db->get_where('project',$args);
    return $data->row();
  }

  public function getsingleTahap($id)
  {
    $args = array('id_tahap' =>$id);
    $data = $this->db->get_where('tahap',$args);
    return $data->row();
  }

  public function getRejoice($id)
  {
    $this->db->select('*');
    $this->db->from('jawaban_tahap');
    $this->db->join('kelompok','jawaban_tahap.id_kelompok = kelompok.id_kelompok','inner');
    $this->db->join('tahap','jawaban_tahap.id_tahap = tahap.id_tahap','inner');
    $this->db->where('tahap.id_tahap',$id);
    $query = $this->db->get();
    return $query->result();
  }

  public function updateNilai($ids,$arg)
  {
    $this->db->where($ids);
    $this->db->update('jawaban_tahap',$arg);
  }


}
?>
