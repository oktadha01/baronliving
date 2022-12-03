<?php
class M_detail extends CI_Model
{
    function m_detail_service($tittle)
    {
        $this->db->select('*');
        $this->db->from('service');
        $this->db->where('tittle_service', $tittle);
        $this->db->order_by('id_service', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_detail_project($id_project)
    {
        $this->db->select('*');
        $this->db->from('project_service');
        $this->db->where('id_project', $id_project);
        $this->db->order_by('id_project', 'desc');
        $query = $this->db->get();
        return $query->result();
        
        
    }
}
