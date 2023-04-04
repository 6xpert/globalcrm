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
    public function GetMaxID($table,$colum){
        $this->db->select('max('.$colum.') as result');
        $this->db->from($table);
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
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
    function GetAdminStaff($where=false){
        $this->db->select('*');
        $this->db->from('adminStaffLink sl');
        $this->db->join('users u', 'sl.userID=u.userID');
        if ($where) {
            $this->db->where($where);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetRepresenitnCountriesWithCountryName($where=false){
        $this->db->select('*');
        $this->db->from('representingCountries rc');
        $this->db->join('countries c', 'rc.country_id=c.country_id');
        if ($where) {
            $this->db->where($where);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetFollowUpWithUser($where=false){
        $this->db->select('*');
        $this->db->from('leadFollowUp fu');
        $this->db->join('users u', 'u.userID=fu.addeby');
        if ($where) {
            $this->db->where($where);
        }
        $this->db->order_by('fu.followUpID', 'desc');

        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    public function GetUniversitiesInSortedForm($table, $where = false)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        $this->db->order_by('uni_name', 'asc');
      
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetIntstitutsWithCountries($where=false,$like=false,$reverseorder=false,$limit=false,$start=false){
        $this->db->select('*');
        $this->db->from('universities uni');
        $this->db->join('countries c', 'uni.repCountryID=c.country_id');
        if ($where) {
            $this->db->where($where);
        }
        if($reverseorder){
            $this->db->order_by("uni.uni_id", "desc");
        }
        if($limit){
            $this->db->limit($limit, $start);
        }
        if($like){
            $this->db->like('uni.uni_name', $like);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetAllCourses($where=false,$reverseorder=false,$like=false){
        $this->db->select('*');
        $this->db->from('courses co');
        $this->db->join('universities u', 'u.uni_id=co.uni_id');
        $this->db->join('courseLevels cl', 'co.courseLevelID=cl.courseLevelID','left');
        $this->db->join('courseCategory ccat', 'co.courseCatID=ccat.courseCatID','left');
        $this->db->join('countries con', 'u.repCountryID=con.country_id');
        if ($where) {
            $this->db->where($where);
        }
        if($reverseorder){
            $this->db->order_by("co.courseID", "desc");
        }
        if($like){
            $this->db->like('co.CourseName', $like);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    //manage branch office
    function GetAllBranchOffices($where=false,$reverseorder=false,$like=false){
        $this->db->select('*');
        $this->db->from('branchOffice b');
        $this->db->join('users u', 'u.userID=b.userID');
        if ($where) {
            $this->db->where($where);
        }
        if($reverseorder){
            $this->db->order_by("b.branchID", "desc");
        }
        if($like){
            $this->db->like('b.branchName', $like);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetLeadInfo($where=false,$like=false){
        $this->db->select('*');
        $this->db->from('leads l');
        $this->db->join('leadSource ls', 'ls.sourceID=l.sourceID');
        $this->db->order_by("l.leadID", "desc");
        if ($where) {
            $this->db->where($where);
        }
        if($like){
            $this->db->like($like);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetLeadCoursesWithDetails($where=false){
        $this->db->select('*');
        $this->db->from('leadSelectedCourses lc');
        $this->db->join('leads l', 'lc.leadID=l.leadID');
        $this->db->join('countries c', 'c.country_id=lc.repCountryID');
        $this->db->join('universities u', 'u.uni_id=lc.uni_id');
        $this->db->join('courses co', 'co.courseID=lc.courseID');
        $this->db->join('courseIntake ci', 'ci.courseIntakeID=lc.courseIntakeID');
        if($where){
            $this->db->where($where);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetAgentAccessUniversity($where=false){
        $this->db->select('*');
        $this->db->from('agentUniversityAccess ac');
        $this->db->join('universities u', 'ac.uni_id=u.uni_id');
        $this->db->join('countries c', 'u.repCountryID=c.country_id');
        if($where){
            $this->db->where($where);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetAgentData($where=false){
        $this->db->select('*');
        $this->db->from('agents a');
        $this->db->join('countries c', 'a.companyCountry=c.country_id');
        if($where){
            $this->db->where($where);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GetTaskList($where=false){
        $this->db->select('*');
        $this->db->from('tasks t');
        $this->db->join('users u', 'u.userID=t.assignTo');
        if($where){
            $this->db->where($where);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    function GettaskResponses($where=false){
        $this->db->select('*');
        $this->db->from('taskResponse tr');
        $this->db->join('tasks t', 't.taskID=tr.taskID');
        $this->db->join('users u', 'u.userID=tr.responseBy');
        if($where){
            $this->db->where($where);
        }
        $q = $this->db->get();
        //    die($this->db->last_query());
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    
}
