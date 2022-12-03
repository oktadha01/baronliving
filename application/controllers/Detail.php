<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_detail');
    }

    function data()
    {
        $tittle = $this->uri->segment(3);

        $data['_title'] = $tittle;
        $data['_script'] = 'detail/detail_js';
        $data['_view'] = 'detail/detail';
        $data['detail_service'] = $this->m_detail->m_detail_service($tittle);
        $this->load->view('layout/index', $data);
    }
    function project()
    {
        $tittle = $this->uri->segment(3);
        $id_project = $this->uri->segment(4);
        $data['_title'] = $tittle;
        $data['_script'] = 'detail/detail_js';
        $data['_view'] = 'detail/detail_project';
        $data['detail_project'] = $this->m_detail->m_detail_project($id_project);
        $this->load->view('layout/index', $data);
        
        $sql = "SELECT * FROM project_service WHERE id_project = $id_project ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $project) {
                $add_view = $project->view + 1;
            }
        }
        $update_view = $this->db->set('view', $add_view)
            ->where('id_project', $id_project)
            ->update('project_service');
        return $update_view;
    }
}
