<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Result_model extends CI_Model
{

    function __construct()
    {
        $this->table = 'results';
    }

    public function getAllStudents()
    {
        $this->db->select('*');
        $this->db->from('results r');
        $this->db->join('students st', 'r.result_student_id = st.student_id', 'left');
        $this->db->join('classes c', 'r.result_student_class_id = c.class_id', 'left');
        $this->db->join('sections s', 'r.result_student_class_section_id = s.section_id', 'left');
        $this->db->where('r.result_is_active', '1');
        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        return $result;
    }
}
