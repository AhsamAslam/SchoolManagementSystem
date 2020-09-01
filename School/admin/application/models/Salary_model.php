<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Salary_model extends CI_Model
{

    function __construct()
    {
        $this->table = 'salaries';
    }

    public function insert($data = array())
    {
        if (!empty($data)) {
            // Insert member data 
        //   echo "<pre>"; print_r($studentsData); exit();
            // foreach ($data as $data){
            $insert = $this->db->insert($this->table, $data);
            // } 
            // Return the status 
            return $insert ? $this->db->insert_id() : false;
        }
        return false;
    }

    public function insertArray($data = array())
    {
        if (!empty($data)) {
            // Insert member data 
        //   echo "<pre>"; print_r($studentsData); exit();
            foreach ($data as $data){
            $insert = $this->db->insert($this->table, $data);
            } 
            // Return the status 
            return $insert ? $this->db->insert_id() : false;
        }
        return false;
    }

    public function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("salary_is_active","1");

        if (array_key_exists("where", $params)) {
            foreach ($params['where'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params)) {
                $this->db->where('salary_id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('created', 'desc');
                if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit'], $params['start']);
                } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit']);
                }

                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }

        // Return fetched data 
        return $result;
    }
    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {

            // Update member data 
            $update = $this->db->update($this->table, $data, array('salary_id' => $id));

            // Return the status 
            return $update ? true : false;
        }
        return false;
    }
    public function delete($id)
    {
        // Delete member data 
        $delete = $this->db->delete($this->table, array('salary_id' => $id));

        // Return the status 
        return $delete ? true : false;
    }

    public function getSalary($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('salary_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        }
        return false;
    }

    public function getAllTeachers()
    {
        $this->db->select('*');
        $this->db->from('salaries s');
        $this->db->join('teachers t', 's.salary_teacher_id = t.teacher_id', 'left');
        $this->db->where('s.salary_is_active', '1');
        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        return $result;
    }

    public function getTeachersForSalary()
    {
        $array = array('Month(s.created) !=' => 'Month(NOW()', 'Year(s.created) !=' => 'Year(NOW())', 't.teacher_is_active' => '1');
        $query = $this->db->select('s.*')
                ->from('salaries s')
                ->join('teachers t' ,'s.salary_teacher_id = t.teacher_id')
                ->where($array)
                ->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        return $result;
    }
}
