<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
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

    function jasa()
    {
        $konsep = preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(5));
        $tittle_service = preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(3));

        if ($tittle_service == 'Arsitektur') {
            $add_text = ' dengan Konsep ';
        } else {
            $add_text = ' ';
        }
        if ($konsep == '') {
            $lokasi = preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(4));
            $_title_text = 'Jasa ' . $tittle_service;
        } else {
            $lokasi = preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(6));
            $_title_text = 'Jasa ' . $tittle_service . $add_text . $konsep;
        }
        if (!empty($lokasi)) {

            $original_string = $lokasi; // Change this to test with other strings
            $substring_to_add = "di ";
            // Check if the string starts with 'di' without a space (case-insensitive)
            if (stripos($original_string, 'di') === 0 && stripos($original_string, $substring_to_add) !== 0) {
                // Separate 'di' from the rest of the string
                $original_string = $substring_to_add . substr($original_string, 2);
            }
            // Check if the string starts with 'di ' (case-insensitive)
            if (stripos($original_string, $substring_to_add) !== 0) {
                // If it does not, add 'di ' to the beginning
                $original_string = $substring_to_add . $original_string;
            }

            // Capitalize the first letter after "di " and each subsequent word
            $words = explode(' ', $original_string);
            foreach ($words as $key => $word) {
                if ($key > 0) {
                    $words[$key] = ucfirst($word);
                }
            }
            $original_string = implode(' ', $words);
        } else {
            $original_string = '';
        }
        $data['lokasi'] = $lokasi;
        $data['_title'] = $_title_text . ' ' . $original_string;
        $data['detail_service'] = $this->m_detail->m_detail_service($tittle_service);
        foreach ($data['detail_service'] as $rows) {
            $id_service = $rows->id_service;
            $data['_description'] = $_title_text . ' ' . $original_string . ' ' . $rows->desc;
        }
        $data['project'] = $this->m_detail->m_project($id_service, $konsep);
        $data['konsep'] = $this->m_detail->m_konsep_project($tittle_service);
        $data['_script'] = 'detail/detail_js';
        $data['_view'] = 'detail/detail';
        $data['data_service'] = $this->m_detail->m_data_service();
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
        $data['_metafoto'] = base_url('upload') . '/service/' . $meta_foto;
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
