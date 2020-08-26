<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Section_model extends CI_Model
{

    function __construct()
    {
        $this->table = 'sections';
    }

    public function insert($data = array())
    {
        if (!empty($data)) {
            // Insert member data 
            $insert = $this->db->insert($this->table, $data);

            // Return the status 
            return $insert ? $this->db->insert_id() : false;
        }
        return false;
    }
    public function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("section_is_active","1");

        if (array_key_exists("where", $params)) {
            foreach ($params['where'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params)) {
                $this->db->where('section_id', $params['id']);
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
            $update = $this->db->update($this->table, $data, array('section_id' => $id));

            // Return the status 
            return $update ? true : false;
        }
        return false;
    }
    public function delete($id)
    {
        // Delete member data 
        $delete = $this->db->delete($this->table, array('section_id' => $id));

        // Return the status 
        return $delete ? true : false;
    }

    public function getSectionName($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('section_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        }
        return false;
    }
}
