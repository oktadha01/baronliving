<?php
class M_service extends CI_Model
{

    function m_data_service($tittle)
    {
        $this->db->select('*');
        $this->db->from('service');
        $this->db->where('tittle_service', $tittle);
        $this->db->order_by('id_service', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_select_project()
    {
        $this->db->select('*');
        $this->db->from('project');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_foto_service($id_service)
    {
        $this->db->select('*');
        $this->db->from('foto');
        $this->db->where('id_foto_service', $id_service);
        $this->db->order_by('id_foto', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_service_project($id_service)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('project_service', 'project_service.tittle_project = project.project_id');
        $this->db->where('id_service_project', $id_service);
        $this->db->order_by('id_project', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_save_add_project($data)
    {
        $result = $this->db->insert('project', $data);
        return $result;
    }

    function m_edit_desc_service($id_service, $desc)
    {
        $update = $this->db->set('desc', $desc)
            ->where('id_service', $id_service)
            ->update('service');
        return $update;
    }
    function m_save_project($id_service, $desc_project, $tittle_project)
    {
        $data = array(
            'id_service_project' => $id_service,
            'tittle_project' => $tittle_project,
            'desc_project' => $desc_project,
        );
        $result = $this->db->insert('project_service', $data);
        return $result;
    }
    function m_edit_project($id_project, $project_id, $tittle_project, $desc_project)
    {
        $update_nmproject = $this->db->set('nm_project', $tittle_project)
            ->where('project_id', $project_id)
            ->update('project');
        $update_desc = $this->db->set('desc_project', $desc_project)
            ->where('id_project', $id_project)
            ->update('project_service');
        return $update_nmproject;
        return $update_desc;
    }
    function m_save_foto_service($id_foto_service, $foto_service, $tittle_foto_service, $orientasi_foto)
    {
        $data = array(
            'id_foto_service' => $id_foto_service,
            'foto_service' => $foto_service,
            'tittle_foto_service' => $tittle_foto_service,
            'orientasi_foto' => $orientasi_foto,
        );
        $result = $this->db->insert('foto', $data);
        return $result;
    }

    function m_edit_foto_service($id_foto, $foto_service, $tittle_foto_service, $orientasi_foto)
    {
        $update_foto = $this->db->set('foto_service', $foto_service)
            ->set('tittle_foto_service', $tittle_foto_service)
            ->set('orientasi_foto', $orientasi_foto)
            ->where('id_foto', $id_foto)
            ->update('foto');
        return $update_foto;
    }
    function m_edit_tittle_foto_service($id_foto, $tittle_foto_service, $orientasi_foto)
    {

        $update = $this->db->set('tittle_foto_service', $tittle_foto_service)
            ->set('orientasi_foto', $orientasi_foto)
            ->where('id_foto', $id_foto)
            ->update('foto');
        return $update;
    }

    function m_hapus_foto_service($id_foto)
    {
        $delete_foto = $this->db->where('id_foto', $id_foto)
            ->delete('foto');
        return $delete_foto;
    }
}
