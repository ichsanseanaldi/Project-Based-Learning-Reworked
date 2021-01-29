<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_kelompok extends CI_Model
{
  public function getKelompok($id)
  {
    $args = array('id_kelompok' =>$id);
    $data=$this->db->get_where('kelompok',$args);
    return $data->row();
  }

  public function getAnggota($id)
  {
    $args = array('id_kelompok' =>$id);
    $data=$this->db->get_where('anggota',$args);
    return $data->result();
  }

  public function getProject($id)
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

  public function getSingleTahap($id)
  {
    $args = array('id_tahap'=>$id);
    $data=$this->db->get_where('tahap',$args);
    return $data->row();
  }

  public function getPP($id)
  {
    $args = array('id_project' =>$id);
    $data=$this->db->get_where('soal_pendahuluan',$args);
    return $data->result();
  }

  public function addJP($arg){

    $this->db->insert('jawaban_pendahuluan',$arg);
  }

  public function addJT($arg)
  {
    $this->db->insert('jawaban_tahap',$arg);
  }

  public function enlightment($id_kelompok,$id_project)
  {
    $sql = "SELECT
              tahap.id_tahap,tahap.nama_tahap,jawaban_tahap.selesai,jawaban_tahap.nilai
            FROM
            	tahap
            LEFT JOIN
            	jawaban_tahap
            ON
            	tahap.id_tahap = jawaban_tahap.id_tahap AND id_kelompok = $id_kelompok
            WHERE
              id_project = $id_project";

    $query = $this->db->query($sql);
    return $query->result();
  }

  public function UpdateStatus($id){
    $arg = array('is_PP' => 'yes');
    $this->db->where('id_kelompok',$id);
    $this->db->update('kelompok',$arg);
  }


}
?>
