<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footprint extends CI_Controller {



		public function __construct(){

		parent::__construct();

		$this->load->helper('url');
		


	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function aboutus()
	{

		$data['placeholder'] = '';
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('about_us',$data);
	}

	public function termsofuse()
	{
		$data['placeholder'] = '';
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('terms_of_use',$data);
	}


	public function privacypolicy()
	{
		$data['placeholder'] = '';
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('privacy_policy',$data);
	}


	public function cookiepolicy()
	{
		$data['placeholder'] = '';
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('cookie_policy',$data);
	}

}
