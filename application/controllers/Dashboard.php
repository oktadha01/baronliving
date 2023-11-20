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

		$data['_title'] = 'Jasa desain arsitektur, interior, dan kontraktor berkualitas dan terpercaya';
		$data['_script'] = 'dashboard/index_js';
		$data['_view'] = 'dashboard/index';
		$data['data_service'] = $this->m_dashboard->m_service();
		$data['data_portfolio'] = $this->m_dashboard->m_portfolio();
		$data['data_artikel'] = $this->m_dashboard->m_artikel();
		$this->load->view('layout/index', $data);
	}
}
