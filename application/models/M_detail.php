<?php
class M_detail extends CI_Model
{
    function m_data_service()
    {
        $this->db->select('*');
        $this->db->from('service');
        // $this->db->where('tittle_service', $tittle);
        $this->db->order_by('id_service', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_detail_service($tittle_service)
    {
        if ($tittle_service == 'all') {

            $this->db->select('*');
            $this->db->from('service');
            // $this->db->where('tittle_service', $tittle_service);
            $this->db->order_by('id_service', 'desc');
            $query = $this->db->get();
            return $query->result();
        } else {

            $this->db->select('*');
            $this->db->from('service');
            $this->db->where('tittle_service', $tittle_service);
            $this->db->order_by('id_service', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
    }

    function m_konsep_project($tittle_service)
    {
        if ($tittle_service == 'Arsitektur' || $tittle_service == 'Kontraktor') {
            $this->db->select('project.konsep_project as data_konsep');
            $this->db->from('project');
            $this->db->join('project_service', 'project.project_id = project_service.tittle_project');
            $this->db->join('service', 'service.id_service = project_service.id_service_project');
            $this->db->where('service.tittle_service', $tittle_service);
            $this->db->where('konsep_project !=', ' ');
            $this->db->Group_by('konsep_project');
            $query = $this->db->get();
            return $query->result();
        } elseif ($tittle_service == 'Desain Interior' || $tittle_service == 'Custom Furnitur') {
            $this->db->select('foto.tittle_foto_service as data_konsep');
            $this->db->from('foto');
            $this->db->join('project_service', 'foto.id_foto_service = project_service.id_project');
            $this->db->join('service', 'service.id_service = project_service.id_service_project');
            $this->db->where('service.tittle_service', $tittle_service);
            $this->db->where('foto.tittle_foto_service !=', ' ');
            $this->db->Group_by('foto.tittle_foto_service');
            $query = $this->db->get();
            return $query->result();
        }
    }

    function m_project($id_service, $konsep)
    {
        // $id_service = '1';
        // $konsep = 'Kamar Tidur';
        $this->db->select('*');
        $this->db->from('service');
        $this->db->join('project_service', 'service.id_service = project_service.id_service_project');
        $this->db->join('project', 'project.project_id = project_service.tittle_project');
        // $this->db->join('foto', 'foto.id_foto_service = project_service.id_project');
        $this->db->join('(SELECT * FROM foto ORDER BY RAND()) AS foto_rand', 'foto_rand.id_foto_service = project_service.id_project');
        $this->db->where('project_service.id_service_project', $id_service);
        if ($konsep == '') {
            $this->db->Group_by('project_service.id_project');
            $this->db->order_by('RAND()');
            // $this->db->order_by('foto.id_foto');
        } else {

            if ($id_service == '1') { //Arsitektur
                $this->db->where('project.konsep_project', $konsep);
                $this->db->Group_by('project_service.id_project', $konsep);
            } else if ($id_service == '2') { //Desain Interior
                $this->db->like('foto_rand.tittle_foto_service', $konsep);
                $this->db->Group_by('project_service.id_project', $konsep);
            } else if ($id_service == '3') { // Custom Furnitur
                $this->db->like('foto_rand.tittle_foto_service', $konsep);
                $this->db->Group_by('project_service.id_project', $konsep);
            } else if ($id_service == '4') { // Custom Furnitur
                $this->db->where('project.konsep_project', $konsep);
                $this->db->Group_by('project_service.id_project', $konsep);
            }
        }
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
