<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{
    public $load;
    public $m_project;
    public $input;
    public $uri;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_project');
    }

    function index()
    {
        // $data['_title'] = $tittle;
        $data['_script'] = 'project/project_js';
        $data['_view'] = 'project/project';
        $data['data_service'] = $this->m_project->m_data_service();
        $this->load->view('layout/index', $data);
    }
}
