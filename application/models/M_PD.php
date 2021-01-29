<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_PD extends CI_Model
{


  public function getByIdProject($id)
  {
    $args = array('id_project'=>$id);
    $data=$this->db->get_where('soal_pendahuluan',$args);
    return $data->result();
  }

  public function getProject($id)
  {
    $args = array('id_project' =>$id);
    $data=$this->db->get_where('project',$args);
    return $data->row();
  }

  public function addRecord($data)
  {
    $hasil = $this->db->insert('soal_pendahuluan',$data);
  }

  public function updateStatus($data,$id)
  {
    $this->db->where('id_project',$id);
    $hasil = $this->db->update('project',$data);
    return $hasil;
  }

  public function getKelompok($id)
  {
      $args = array('id_project' => $id);
      $data = $this->db->get_where('kelompok',$args);
      return $data->result();
  }

  public function Rejoice($id)
  {
    $this->db->select('*');
    $this->db->from('soal_pendahuluan');
    $this->db->join('jawaban_pendahuluan','soal_pendahuluan.id_pendahuluan = jawaban_pendahuluan.id_pendahuluan','inner');
    $this->db->join('kelompok','jawaban_pendahuluan.id_kelompok = kelompok.id_kelompok');
    $this->db->where('kelompok.id_kelompok',$id);
    $query=$this->db->get();
    return $query->result();
  }

  public function deletePP($id)
  {
    $this->db->where('id_pendahuluan',$id);
    $this->db->delete('soal_pendahuluan');
  }

  public function NilaiPP($id,$arg)
  {
    $this->db->where('id_kelompok',$id);
    $this->db->update('kelompok',$arg);
  }

}
?>
