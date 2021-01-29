<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_admin extends CI_Model
{

  public function getAll()
  {
    $data=$this->db->get('user');
    return $data->result();
  }

  public function getById($id)
  {
    $args = array('id_user' =>$id);
    $data=$this->db->get_where('user',$args);
    return $data->row();
  }

  public function updateById($id,$data)
  {
    $this->db->where('id_user',$id);
    $hasil = $this->db->update('user',$data);
    return $hasil;
  }

  public function addRecord($data)
  {
    $hasil = $this->db->insert('user',$data);
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
