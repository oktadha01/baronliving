<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public $load;
	public $m_artikel;
	public $input;
	public $uri;
	public $db;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_artikel');
	}

	function index()
	{

		$data['_title'] = 'ARTIKEL PT KANPA';
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		// $data['data_berita_left'] = $this->m_artikel->m_data_berita_left();
		// $data['data_berita_center'] = $this->m_artikel->m_data_berita_center();
		// $data['data_perum'] = $this->m_artikel->m_data_perum();
		// $data['data_tipe'] = $this->m_artikel->m_data_tipe();
		$this->load->view('layout/index', $data);
	}

	public function get_berita()
	{
		$output = '';
		$this->load->model('m_artikel');
		$data = $this->m_artikel->m_data_berita_infinity($this->input->post('limit'), $this->input->post('start'));
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$judul_berita = $row->judul_berita;
				$tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);

				$output .= '
				<div class="col-lg-6 col-12 ">
				<article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="' . base_url('upload') . '/' . $row->foto_berita . '" alt="" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="' . base_url('Artikel/page/') . $tittle_news . '">' . $row->judul_berita . '</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="' . $row->tgl_berita . '">' . $row->tgl_berita . '</time></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> ' . $row->view_berita . ' Views</li>
                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        ' . $row->meta_desk . '
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="blog-details.html">Read More</a>
                                </div>

                            </article>
				</div>
				';
			}
		}
		echo $output;
	}

	function page()
	{
		$tittle = $this->uri->segment(3);
		$judul_berita = preg_replace("![^a-z0-9]+!i", " ", $tittle);

		$sql = "SELECT * FROM berita WHERE judul_berita='$judul_berita'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $meta) {
				$id_berita = $meta->id_berita;
				$meta_desk = $meta->meta_desk;
				$meta_foto = $meta->meta_foto;
			}
		} else {
		}

		$data['_title'] = $judul_berita;
		$data['_metafoto'] = base_url('upload').'/'.$meta_foto;
		$data['_description'] = 'PT Kanpa ' . $judul_berita . ' - ' . $meta_desk;
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/page_artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		$data['data_berita_5'] = $this->m_artikel->m_data_berita_5();
		$data['data_berita_detail'] = $this->m_artikel->m_data_berita_detail($judul_berita);
		$data['data_artikel_berita'] = $this->m_artikel->m_data_artikel_berita();
		$data['data_foto_berita'] = $this->m_artikel->m_data_foto_berita();
		$this->load->view('layout/index', $data);
		$add_view = $meta->view_berita + 1;
		$update_view = $this->db->set('view_berita', $add_view)
			->where('id_berita', $id_berita)
			->update('berita');
		return $update_view;
	}
	function tag()
	{
		$tag = $this->uri->segment(3);
		$tag_berita = preg_replace("![^a-z0-9]+!i", " ", $tag);
		$data['_title'] = 'tag';
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/tag_artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		$this->load->view('layout/index', $data);
	}

	public function get_berita_tag()
	{
		$output = '';
		$this->load->model('m_artikel');
		$tag_berita = $this->input->post('tag_berita');
		$start = $this->input->post('start');
		$limit = $this->input->post('limit');
		$data = $this->m_artikel->m_data_berita_tag($start, $limit, $tag_berita);
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$judul_berita = $row->judul_berita;
				$tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);

				$output .= '
				<div class="col-lg-6 col-12 ">
				<article class="d-flex flex-column">

				<div class="post-img">
					<img src="' . base_url('upload') . '/' . $row->foto_berita . '" alt="" class="img-fluid">
				</div>

				<h2 class="title">
					<a href="' . base_url('Artikel/page/') . $tittle_news . '">' . $row->judul_berita . '</a>
				</h2>

				<div class="meta-top">
					<ul>
						<li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="' . $row->tgl_berita . '">' . $row->tgl_berita . '</time></li>
						<li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> ' . $row->view_berita . ' Views</li>
					</ul>
				</div>

				<div class="content">
					<p>
						' . $row->meta_desk . '
					</p>
				</div>

				<div class="read-more mt-auto align-self-end">
					<a href="blog-details.html">Read More</a>
				</div>

			</article>
				</div>
				';
			}
		}
		echo $output;
	}
}
