<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_login extends CI_Model
{


  public function getUserPass($args)
  {
    $data=$this->db->get_where('user',$args);
    return $data->row();
  }

  public function getUserPassK($args)
  {
    $data=$this->db->get_where('Kelompok',$args);
    return $data->row();
  }


}





















 ?>
