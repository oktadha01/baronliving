<?php
class M_dashboard extends CI_Model
{

    function m_architecture()
    {
        $this->db->select('*');
        $this->db->from('service');
        $this->db->join('project_service', 'project_service.id_service_project = service.id_service');
        $this->db->join('foto', 'foto.id_foto_service = project_service.id_project');
        $this->db->GROUP_BY('service.id_service');
        // $this->db->order_by('id_jp', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_portfolio()
    {
        $this->db->select('*');
        $this->db->from('service');
        $this->db->join('project_service', 'project_service.id_service_project = service.id_service');
        $this->db->ORDER_BY('project_service.id_service_project', 'RANDOM');
        $this->db->LIMIT('4');
        $query = $this->db->get();
        return $query->result();
    }
}
