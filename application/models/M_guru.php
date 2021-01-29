<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_guru extends CI_Model
{

  public function getAll()
  {
    $data=$this->db->get('user');
    return $data->result();
  }

  public function getById($id)
  {
    $args = array('id_guru' =>$id);
    $data=$this->db->get_where('guru',$args);
    return $data->row();
  }

  public function getProjectByIdGuru($id)
  {
    $args = array('id_guru' =>$id);
    $data=$this->db->get_where('project',$args);
    return $data->result();
  }




  public function getByUserId($id)
  {
    $args = array('id_user' =>$id);
    $data=$this->db->get_where('guru',$args);
    return $data->row();
  }

  public function updateByUserId($id,$data)
  {
    $this->db->where('id_user',$id);
    $hasil = $this->db->update('guru',$data);
    return $hasil;
  }

  public function addProject($data)
  {
    $hasil = $this->db->insert('project',$data);
  }

  public function addGuru($data)
  {
    $hasil = $this->db->insert('guru',$data);
  }

  public function deleteRecord($id)
  {
    $this->db->where('id_user',$id);
    $this->db->delete('user');
  }
}
?>
