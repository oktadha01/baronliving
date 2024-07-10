<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalkulate_estimasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function kitchen_set()
	{

		$data['_title'] = 'Kalkulator interior design, menghitung estimasi biaya';
		$data['_script'] = 'kalkulator/kitchenset/index_js';
		$data['_view'] = 'kalkulator/kitchenset/index';
		$this->load->view('layout/index', $data);
	}

	function Lemari()
	{

		$data['_title'] = 'Kalkulator interior design, menghitung estimasi biaya';
		$data['_script'] = 'kalkulator/lemari/index_js';
		$data['_view'] = 'kalkulator/lemari/index';
		$this->load->view('layout/index', $data);
	}
}
