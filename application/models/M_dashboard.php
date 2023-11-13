<?php
class M_dashboard extends CI_Model
{

    function m_service()
    {
        $this->db->select('*');
        $this->db->from('service');
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

    function m_arsitektur()
    {
        $this->db->select('*');
        $this->db->from('service');
        $this->db->join('project_service', 'project_service.id_service_project = service.id_service');
        $this->db->join('project', 'project.project_id = project_service.tittle_service');
        $this->db->ORDER_BY('project_service.id_service_project', 'RANDOM');
        $this->db->LIMIT('4');
        $query = $this->db->get();
        return $query->result();
    }
    function m_artikel()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->ORDER_BY('id_berita', 'desc');
        $this->db->LIMIT('3');
        $query = $this->db->get();
        return $query->result();
    }
}
