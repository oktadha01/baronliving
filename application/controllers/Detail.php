<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public $load;
    public $m_detail;
    public $input;
    public $uri;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_detail');
    }

    function data()
    {
        $tittle_service = $this->uri->segment(3);
        $tittle = preg_replace("![^a-z0-9]+!i", " ", $tittle_service);

        $data['_title'] = $tittle;
        $data['_script'] = 'detail/detail_js';
        $data['_view'] = 'detail/detail';
        $data['detail_service'] = $this->m_detail->m_detail_service($tittle);
        $this->load->view('layout/index', $data);
    }
    function project()
    {
        $tittle_service = $this->uri->segment(3);
        $tittle = $this->uri->segment(4);
        $tittle_project = preg_replace("![^a-z0-9]+!i", " ", $tittle);
        $service = preg_replace("![^a-z0-9]+!i", " ", $tittle_service);
        $data['detail_project'] = $this->m_detail->m_detail_project($tittle_project, $service);
        foreach ($data['detail_project'] as $row) {
            $meta_foto = $row->foto_meta_service;
            $meta_desk = $row->desc_project;
        }
        $data['_title'] = $tittle_project;
        $data['_metafoto'] = base_url('upload').'/service/'.$meta_foto;
        $data['_description'] = 'Baron Living Studio - ' . $tittle_project . ' - ' . $meta_desk;
        $data['_script'] = 'detail/detail_js';
        $data['_view'] = 'detail/detail_project';
        $data['service'] = $this->m_detail->m_service($tittle_project);
        $data['foto_project'] = $this->m_detail->m_foto_project($tittle_project, $service);
        $this->load->view('layout/index', $data);

        // $sql = "SELECT * FROM project_service WHERE id_project = $id_project ";
        // $query = $this->db->query($sql);
        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $project) {
        //         $add_view = $project->view + 1;
        //     }
        // }
        // $update_view = $this->db->set('view', $add_view)
        //     ->where('id_project', $id_project)
        //     ->update('project_service');
        // return $update_view;
    }
}
