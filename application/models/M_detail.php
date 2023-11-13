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
    function m_detail_project($tittle_project, $service)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('project_service', 'project_service.tittle_project = project.project_id');
        $this->db->join('service', 'service.id_service = project_service.id_service_project');
        $this->db->where('nm_project', $tittle_project);
        if ($service == 'all') {
        } else {

            $this->db->where('tittle_service', $service);
        }
        // $this->db->order_by('id_project', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_service($tittle_project)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('project_service', 'project_service.tittle_project = project.project_id');
        $this->db->join('service', 'service.id_service = project_service.id_service_project');
        $this->db->where('nm_project', $tittle_project);
        // $this->db->order_by('id_project', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_foto_project($tittle_project, $service)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('project_service', 'project_service.tittle_project = project.project_id');
        $this->db->join('service', 'service.id_service = project_service.id_service_project');
        $this->db->join('foto', 'foto.id_foto_service = project_service.id_project');
        $this->db->where('nm_project', $tittle_project);
        if ($service == 'all') {
        } else {

            $this->db->where('tittle_service', $service);
        }
        // $this->db->order_by('id_project', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}
