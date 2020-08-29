<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fee_Sheet_model extends CI_Model
{

    function __construct()
    {
        $this->table = 'fee_sheets';
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
        $this->db->where("fees_is_active","1");

        if (array_key_exists("where", $params)) {
            foreach ($params['where'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params)) {
                $this->db->where('fees_id', $params['id']);
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
            $update = $this->db->update($this->table, $data, array('fees_id' => $id));

            // Return the status 
            return $update ? true : false;
        }
        return false;
    }
    public function delete($id)
    {
        // Delete member data 
        $delete = $this->db->delete($this->table, array('fees_id' => $id));

        // Return the status 
        return $delete ? true : false;
    }

    public function getFeeSheetName($id)
    {
        $query = $this
                ->db
                ->select('*')
                ->from($this->table)
                ->where('fees_id', $id)
                ->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        }
        return false;
    }

    public function getAllStudents()
    {
        $query = $this
                ->db->select('fs.*,st.student_name,c.class_name,s.section_name')
                ->from('fee_sheets fs')
                ->join('students st', 'fs.fees_student_id = st.student_id', 'left')
                ->join('sections s', 'fs.fees_student_class_section_id = s.section_id', 'left')
                ->join('classes c', 'fs.fees_student_class_id = c.class_id', 'left')
                ->where('fs.fees_is_active', '1')
                ->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        return $result;
    }
    public function getStudentsForFee()
    {
        $array = array('Month(fs.created) !=' => 'Month(NOW()', 'Year(fs.created) !=' => 'Year(NOW())', 'st.student_is_active' => '1');
        $query = $this->db->select('fs.*')
                ->from('fee_sheets fs')
                ->join('students st' ,'fs.fees_student_id = st.student_id')
                ->join('sections s', 'fs.fees_student_class_section_id = s.section_id')
                ->join('classes c', 'fs.fees_student_class_id = c.class_id')
                ->where($array)
                ->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        return $result;
    }
}