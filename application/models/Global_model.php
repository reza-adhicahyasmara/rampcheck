<?php defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{

  function insert($table, $data)
  {
    $this->db->insert($table, $data);
    return $this->db->affected_rows();
  }
  function update($table, $where, $data)
  {
    $this->db->set($data);
    $this->db->where($where);
    return $this->db->update($table);
  }
  function delete($table, $data)
  {
    $this->db->where($data);
    return $this->db->delete($table);
  }
  function get_all($table)
  {
    return $this->db->get($table);
  }
  function get_by_id($table, $param)
  {
    $this->db->select('*');
    $this->db->where($param);
    return $this->db->get($table);
  }
  function insertcallback($table, $data)
  {
    return ($this->db->insert($table, $data))  ?   $this->db->insert_id()  :   false;
  }
  function getRampcheck($where = null)
  {
    $this->db->select('rampcheck.*, master_bus.*, master_sopir.*');
    $this->db->from('rampcheck');
    $this->db->join('master_bus', 'master_bus.id_bus=rampcheck.id_bus', 'left');
    $this->db->join('master_sopir', 'master_sopir.id_sopir=rampcheck.id_sopir', 'left');
    if ($where) {
      $this->db->where($where);
    }
    return $this->db->get();
  }
}
