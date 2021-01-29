<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_project extends CI_Model
{

  public function getById($id)
  {
    $args = array('id_project' =>$id);
    $data=$this->db->get_where('project',$args);
    return $data->row();
  }

  public function getTahapan($id)
  {
    $args = array('id_project' =>$id);
    $data=$this->db->get_where('tahap',$args);
    return $data->result();
  }

  public function addTahapan($data)
  {
    $this->db->insert('tahap',$data);
  }

  public function getsingleKelompok($id)
  {
    $args = array('id_kelompok' =>$id);
    $data = $this->db->get_where('kelompok',$args);
    return $data->row();
  }

  public function getAnggota($id)
  {
    $args = array('id_kelompok' =>$id);
    $data = $this->db->get_where('anggota',$args);
    return $data->result();
  }


  public function getsingleTahap($id)
  {
    $args = array('id_tahap' =>$id);
    $data = $this->db->get_where('tahap',$args);
    return $data->row();
  }

  public function getKelompok($id)
  {
    $args = array('id_project'=>$id);
    $data = $this->db->get_where('kelompok',$args);
    return $data->result();
  }

  public function addKelompok($data)
  {

    $this->db->insert('kelompok',$data);
  }

  public function addAnggota($data)
  {

    $this->db->insert('anggota',$data);
  }

  public function deleteTahap($id)
  {
    $this->db->where('id_tahap',$id);
    $this->db->delete('tahap');
  }

  public function getJawabanTahap($id)
  {
    $arg = array('id_tahap' =>$id);
    $data = $this->db->get_where('jawaban_tahap',$arg);
    return $data->result();
  }

  public function deleteProject($id)
  {
    $this->db->where('id_project',$id);
    $this->db->delete('project');
  }

  public function updateProject($id,$data)
  {
    $this->db->where('id_project',$id);
    $hasil = $this->db->update('project',$data);
    return $hasil;
  }

  public function updateTahap($id,$data)
  {
    $this->db->where('id_tahap',$id);
    $hasil = $this->db->update('tahap',$data);
    return $hasil;
  }

  public function deleteKelompok($id)
  {
    $this->db->where('id_kelompok',$id);
    $this->db->delete('kelompok');
  }

  public function getJawabanTahapByIdKelompok($id)
  {
    $arg = array('id_kelompok' =>$id);
    $data = $this->db->get_where('jawaban_tahap',$arg);
    return $data->result();
  }


}
?>
