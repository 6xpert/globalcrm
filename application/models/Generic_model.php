<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Generic_model extends CI_Model
{
    public function GetData($table, $where = false, $sort_colume = false, $sort_type = false)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        if ($sort_colume && $sort_type) {
            $this->db->order_by($sort_colume, $sort_type);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    public function GetDataIvoice($table, $where = false, $sort_colume = false, $sort_type = false)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        if ($sort_colume && $sort_type) {
            $this->db->order_by($sort_colume, $sort_type);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }

    function InsertData($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function Update($table, $where, $set)
    {
        $this->db->where($where);
        $this->db->update($table, $set);
    }
    public function Delet($table, $where)
    {
        $this->db->delete($table, $where);
        // echo $this->db->last_query();
    }
    function LoginData($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userEmail', $email);
        $this->db->where('userPass', $pass);
        $this->db->where('userStatus', 1);
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
}
