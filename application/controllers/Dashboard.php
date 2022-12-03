<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}

	function index()
	{

		$data['_title'] = 'Baron Living Studio';
		$data['_script'] = 'dashboard/index_js';
		$data['_view'] = 'dashboard/index';
		$data['data_architec'] = $this->m_dashboard->m_architecture();
		$data['data_portfolio'] = $this->m_dashboard->m_portfolio();
		$this->load->view('layout/index', $data);
	}
}
