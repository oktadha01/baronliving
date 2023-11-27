<?php
class M_project extends CI_Model
{
    function m_data_service()
    {
        $this->db->select('*');
        $this->db->from('service');
        // $this->db->where('tittle_service', $tittle);
        $this->db->order_by('id_service', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}
